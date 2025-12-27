<x-layout.default>

    <script src="/assets/js/simple-datatables.js"></script>

    {{-- Routes (IMPORTANT) --}}
    <script>
        window.FLOW_RULE_ROUTES = {
            store: @json(route('flows.rules.store')),
            update: @json(route('flows.rules.update', ['rule' => '__ID__'])),
            destroy: @json(route('flows.rules.destroy', ['rule' => '__ID__'])),
        };
    </script>

    <div x-data="ruleTable">

        <div class="panel mt-6">
            <div class="flex items-center justify-between">
                <h5 class="font-semibold text-lg">مدیریت قوانین گردش‌کار</h5>
            </div>

            <div class="flex items-center justify-between btn-left">
                <button type="button" class="btn btn-primary" @click="openCreateModal()">
                    افزودن قانون جدید
                </button>
            </div>

            <table id="rulesTable" class="whitespace-nowrap mt-6"></table>
        </div>

        <!-- Delete Modal (مثل نمونه flows) -->
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
                            آیا مطمئن هستید که می‌خواهید قانون
                            <strong class="text-primary" x-text="deletingRuleName"></strong>
                            را حذف کنید؟
                        </p>

                        <form :action="FLOW_RULE_ROUTES.destroy.replace('__ID__', deletingRuleId)"
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

        {{-- Create / Edit Modal --}}
        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
             :class="isFormModalOpen && '!block'">

            <div class="flex items-center justify-center min-h-screen px-4"
                 @click.self="closeFormModal()">

                <div x-show="isFormModalOpen"
                     x-transition
                     x-transition.duration.300
                     class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-md my-8">

                    <!-- Header -->
                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <h5 class="font-bold text-lg"
                            x-text="formMode === 'create' ? 'افزودن قانون' : 'ویرایش قانون'"></h5>

                        <button type="button" class="text-white-dark hover:text-dark"
                                @click="closeFormModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                 class="w-6 h-6">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="p-5">
                        <form :action="formAction" method="POST" class="space-y-5">
                            @csrf
                            <template x-if="formMode === 'edit'">
                                <input type="hidden" name="_method" value="PUT">
                            </template>

                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-6">
                                    <label>گردش‌کار</label>
                                    <select class="form-select" name="flow_id"
                                            x-model="form.flow_id" @change="syncSteps()" required>
                                        <option value="" disabled>انتخاب کنید</option>
                                        @foreach($flows as $flow)
                                            <option value="{{ $flow->id }}">{{ $flow->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-span-6">
                                    <label>عنوان تسک</label>
                                    <select class="form-select" name="task_title_id"
                                            x-model="form.task_title_id" required>
                                        <option value="" disabled>انتخاب کنید</option>
                                        @foreach($taskTitles as $title)
                                            <option value="{{ $title->id }}">{{ $title->name ?? $title->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-span-6">
                                    <label>مرحله مبدا</label>
                                    <select class="form-select" name="from_step_id"
                                            x-model="form.from_step_id">
                                        <option value="">عمومی</option>
                                        <template x-for="s in availableSteps" :key="s.id">
                                            <option :value="s.id" x-text="`${s.order}. ${s.name}`"></option>
                                        </template>
                                    </select>
                                </div>

                                <div class="col-span-6">
                                    <label>مرحله مقصد</label>
                                    <select class="form-select" name="to_step_id"
                                            x-model="form.to_step_id" required>
                                        <option value="" disabled>انتخاب کنید</option>
                                        <template x-for="s in availableSteps" :key="s.id">
                                            <option :value="s.id" x-text="`${s.order}. ${s.name}`"></option>
                                        </template>
                                    </select>
                                </div>

                                <div class="col-span-12">
                                    <label class="flex gap-2 items-center">
                                        <input type="checkbox" class="form-checkbox"
                                               :checked="form.is_active"
                                               @change="form.is_active = $event.target.checked ? 1 : 0">
                                        <span>فعال باشد</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-end items-center mt-8 gap-3">
                                <button type="button" class="btn btn-outline-dark"
                                        @click="closeFormModal()">لغو</button>
                                <button type="submit" class="btn btn-primary">ذخیره</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <style>
        .rtl .dataTable-search { margin-right: inherit !important; }
        .btn-left { left: 35px; position: absolute; }
    </style>

    <script>
        document.addEventListener("alpine:init", () => {

            Alpine.data("ruleTable", () => ({

                // modals
                isDeleteModalOpen: false,
                deletingRuleId: null,
                deletingRuleName: '',

                isFormModalOpen: false,
                formMode: 'create',
                formAction: FLOW_RULE_ROUTES.store,

                // data
                rulesPayload: @json($rules),
                flowStepsByFlow: @json($flowStepsByFlow),

                // form
                form: {
                    id: null,
                    flow_id: '',
                    task_title_id: '',
                    from_step_id: '',
                    to_step_id: '',
                    is_active: 1,
                },

                availableSteps: [],

                // datatable instance
                dt: null,

                init() {
                    this.initTable(this.rulesPayload);

                    // event delegation for action buttons inside datatable
                    document.addEventListener('click', (e) => {
                        const del = e.target.closest('.delete-rule-btn');
                        if (del) {
                            const rule = JSON.parse(del.dataset.rule);
                            this.deleteRule(rule);
                            return;
                        }

                        const edit = e.target.closest('.edit-rule-btn');
                        if (edit) {
                            this.openEditModal(JSON.parse(edit.dataset.rule));
                            return;
                        }
                    });
                },

                openCreateModal() {
                    this.formMode = 'create';
                    this.formAction = FLOW_RULE_ROUTES.store;
                    this.form = { flow_id:'', task_title_id:'', from_step_id:'', to_step_id:'', is_active:1 };
                    this.availableSteps = [];
                    this.isFormModalOpen = true;
                },

                openEditModal(rule) {
                    this.formMode = 'edit';
                    this.formAction = FLOW_RULE_ROUTES.update.replace('__ID__', rule.id);
                    this.form = {
                        id: rule.id,
                        flow_id: String(rule.flow_id),
                        task_title_id: String(rule.task_title_id),
                        from_step_id: rule.from_step_id ? String(rule.from_step_id) : '',
                        to_step_id: rule.to_step_id ? String(rule.to_step_id) : '',
                        is_active: rule.is_active ? 1 : 0,
                    };
                    this.syncSteps();
                    this.isFormModalOpen = true;
                },

                closeFormModal() { this.isFormModalOpen = false; },

                deleteRule(rule) {
                    this.deletingRuleId = rule.id;

                    const flowName = rule.flow?.name ?? '-';
                    const taskName = rule.task_title?.name ?? rule.task_title?.title ?? '-';
                    this.deletingRuleName = `${flowName} / ${taskName}`;

                    this.isDeleteModalOpen = true;
                },

                syncSteps() {
                    const steps = this.flowStepsByFlow[this.form.flow_id] || [];
                    this.availableSteps = steps.sort((a,b) => a.order - b.order);
                },

                initTable(dataList) {
                    const rows = (dataList || []).map((r) => ([
                        r.flow?.name ?? '-',
                        r.task_title?.name ?? r.task_title?.title ?? '-',
                        r.from_step?.name ?? 'عمومی',
                        r.to_step?.name ?? '-',
                        r.is_active ? 'فعال' : 'غیرفعال',
                        ''
                    ]));

                    if (this.dt) {
                        this.dt.destroy();
                        this.dt = null;
                    }

                    this.dt = new simpleDatatables.DataTable('#rulesTable', {
                        data: {
                            headings: [
                                'گردش‌کار',
                                'عنوان تسک',
                                'مبدا',
                                'مقصد',
                                'وضعیت',
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
                            noRows: "هیچ قانونی یافت نشد",
                            info: "نمایش {end} از {rows} رکورد",
                            next: "بعدی",
                            previous: "قبلی",
                        },

                        columns: [
                            {
                                select: 5,
                                sortable: false,
                                render: (data, cell, row) => {
                                    const rule = (dataList || [])[row.dataIndex];

                                    return `
                                        <div class="flex justify-center items-center gap-2">

                                            <button type="button" x-tooltip="ویرایش"
                                                    class="text-primary edit-rule-btn"
                                                    data-rule='${JSON.stringify(rule)}'>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-4.5 h-4.5">
                                                    <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"/>
                                                    <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5"/>
                                                </svg>
                                            </button>

                                            <button type="button" x-tooltip="حذف"
                                                    class="text-danger delete-rule-btn"
                                                    data-rule='${JSON.stringify(rule)}'>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-5 h-5">
                                                    <path opacity="0.5" d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                    <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                    <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                    <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                    <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                </svg>
                                            </button>

                                        </div>
                                    `;
                                }
                            }
                        ],

                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        }
                    });
                },

            }));
        });
    </script>

</x-layout.default>
