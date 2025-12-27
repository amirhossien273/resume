<x-layout.default>

    <script src="/assets/js/simple-datatables.js"></script>

    <div x-data="flowTable">

        <div class="panel mt-6">
            <div class="flex items-center justify-between">
                <h5 class="font-semibold text-lg">لیست فرآیند</h5>
            </div>

            <div class="flex items-center justify-between btn-left">
                <a href="{{ route('flows.create') }}"  class="btn btn-primary">
                    ایجاد فرآیند جدید
                </a>
            </div>

            <table id="flowsTable" class="whitespace-nowrap"></table>
        </div>

        <!-- Delete Modal -->
        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
             :class="isDeleteModalOpen && '!block'">

            <div class="flex items-center justify-center min-h-screen px-4"
                 @click.self="isDeleteModalOpen = false">

                <div x-show="isDeleteModalOpen"
                     x-transition x-transition.duration.300
                     class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">

                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <h5 class="font-bold text-lg">⚠️ تأیید حذف</h5>
                        <button type="button" class="text-white-dark hover:text-dark"
                                @click="isDeleteModalOpen = false">
                            ✕
                        </button>
                    </div>

                    <div class="p-5">
                        <p class="text-lg">
                            آیا مطمئن هستید که می‌خواهید فرآیند
                            <strong class="text-primary" x-text="deletingFlowName"></strong>
                            را حذف کنید؟
                        </p>
                        <form :action="`{{ route('flows.destroy', '') }}/${deletingFlowId}`"
                              method="POST" x-ref="deleteForm" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>

                        <div class="flex justify-end items-center mt-8 gap-3">
                            <button type="button" class="btn btn-outline-dark"
                                    @click="isDeleteModalOpen = false">لغو</button>
                            <button type="button" class="btn btn-danger"
                                    @click="$refs.deleteForm.submit()">حذف کن</button>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- Steps Modal -->
        <div
            x-show="isStepsModalOpen"
            x-cloak
            x-transition
            class="fixed inset-0 z-[999] flex items-center justify-center bg-black/60"
            @click.self="isStepsModalOpen = false">

            <div class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8 bg-white dark:bg-[#121c2c]"
                 x-show="isStepsModalOpen"
                 x-transition
                 x-transition.duration.300>

                <div class="flex items-center justify-between px-5 py-3 bg-[#fbfbfb] dark:bg-[#121c2c]">
                    <h5 class="font-bold text-lg">
                        مراحل فرآیند: <span x-text="currentFlowName"></span>
                    </h5>
                    <button type="button" class="text-black dark:text-white"
                            @click="isStepsModalOpen = false">
                        ✕
                    </button>
                </div>

                <div class="p-5 space-y-3">
                    <template x-for="step in currentFlowSteps" :key="step.id">
                        <div class="p-2 rounded border bg-gray-50 dark:bg-gray-800">
                            <span x-text="step.order + '. ' + step.name"></span>
                        </div>
                    </template>
                    <template x-if="currentFlowSteps.length === 0">
                        <p class="text-gray-500">مراحل موجود نیست</p>
                    </template>
                </div>
            </div>
        </div>

    </div>

    <style>
        .rtl .dataTable-search {
            margin-right: inherit !important;
        }
        .btn-left{
            left: 35px;
            position: absolute;
        }
    </style>
    <script>
        document.addEventListener("alpine:init", () => {

            Alpine.data("flowTable", () => ({

                isDeleteModalOpen: false,
                deletingFlowId: null,
                deletingFlowName: '',
                isStepsModalOpen: false,
                currentFlowSteps: [],
                currentFlowName: '',

                init() {


                    const flows = @json($flows);   // ← داده‌های فرآیندها
                    function translateSlug(slug) {
                        switch (slug) {
                            case 'sale':
                                return 'فروش';
                            case 'transaction':
                                return 'معامله';
                            case 'customer-service':
                                return 'خدمات مشتری';
                            default:
                                return '-';
                        }
                    }

                    const rows = flows.data.map((f) => [
                        f.name ?? '-',
                        f.description ?? '-',
                        translateSlug(f.slug),
                        ''
                    ]);

                    new simpleDatatables.DataTable('#flowsTable', {
                        data: {
                            headings: [
                                'نام فرآیند',
                                'توضیحات',
                                'نوع',
                                '<div class="text-center">عملیات</div>'
                            ],
                            data: rows
                        },

                        perPage: 10,
                        searchable: true,
                        perPageSelect: [10, 20, 50, 100],

                        labels: {
                            placeholder: "جستجو...",
                            perPage: "{select} رکورد در هر صفحه",
                            noRows: "هیچ فرآیندی یافت نشد",
                            info: "نمایش {end} از {rows} رکورد",
                            next: "بعدی",
                            previous: "قبلی",
                        },

                        columns: [
                            {
                                select: 3,
                                sortable: false,
                                render: (data, cell, row) => {
                                    const flow = flows.data[row.dataIndex];
                                    return `
                                        <div class="flex justify-center items-center gap-2">

                                            <a href="/flows/${flow.id}/edit" x-tooltip="ویرایش"
                                               class="text-primary">
                                               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-4.5 h-4.5">
                                                <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"/>
                                                <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5"/>
                                            </svg>
                                            </a>

                                            <button type="button" x-tooltip="حذف"  class="text-danger delete-btn"
                                                data-id="${flow.id}"
                                                data-name="${flow.name}">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-5 h-5">
                                                    <path opacity="0.5" d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                    <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                    <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                    <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                    <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                </svg>
                                            </button>
 <button type="button" x-tooltip="مشاهده مراحل" class="text-info steps-btn"
    data-steps='${JSON.stringify(flow.steps ?? [])}'
    data-name="${flow.name}" title="مشاهده مراحل">

    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>

                                        </div>`;
                                }
                            }
                        ],

                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        }

                    });

                    // Event delegation برای دکمه‌های delete
                    document.addEventListener('click', (e) => {
                        const btn = e.target.closest('.delete-btn');
                        if (!btn) return;
                        const id = btn.dataset.id;
                        const name = btn.dataset.name;
                        this.deleteFlow(id, name);
                    });

                    // Steps button delegation
                    document.addEventListener('click', (e) => {
                        const btn = e.target.closest('.steps-btn');
                        if (!btn) return;
                        const steps = JSON.parse(btn.dataset.steps || '[]');
                        const name = btn.dataset.name;
                        this.viewSteps(steps, name);
                    });
                },

                deleteFlow(id, name) {
                    this.deletingFlowId = id;
                    this.deletingFlowName = name;
                    this.isDeleteModalOpen = true;
                },

                viewSteps(steps, name) {
                    this.currentFlowSteps = steps;  // ← همین نام که تو modal هست
                    this.currentFlowName = name;    // ← همین نام
                    this.isStepsModalOpen = true;
                }

            }));
        });
    </script>

</x-layout.default>
