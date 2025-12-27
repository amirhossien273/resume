<x-layout.default>
    @if(empty($flow))
        <div class="flex items-center justify-center min-h-[60vh]">
            <div class="panel text-center p-10 max-w-xl">
                <h2 class="text-xl font-semibold mb-4">
                    فرایند کاری تعریف نشده است
                </h2>
                <p class="text-gray-500 mb-6">
                    برای مشاهده و مدیریت معاملات، ابتدا باید فرایند کاری ایجاد کنید.
                </p>

                <a href="{{ route('flows.create') }}"
                   class="btn btn-primary">
                    ایجاد فرایند کاری
                </a>
            </div>
        </div>
    @else

    <div x-data="showTransaction">

        <div class="fixed inset-0 bg-black/60 z-[999] overflow-y-auto hidden"
             :class="isAddTransactionEditModal && '!block'">

            <div class="flex items-center justify-center min-h-screen px-4 py-8"
                 @click.self="isAddTransactionEditModal = false">

                <div x-show="isAddTransactionEditModal"
                     class="panel border-0 p-0 rounded-2xl overflow-hidden w-[96vw] max-w-5xl my-0 shadow-2xl">

                    <div class="px-6 py-4 bg-[#0b1220] border-b border-white/10 flex items-center justify-between">
                        <h3 class="text-lg font-medium text-white">ایجاد معامله جدید</h3>

                        <button type="button"
                                class="text-white/70 hover:text-white"
                                @click="isAddTransactionEditModal = false">
                            ✕
                        </button>
                    </div>

                    <div class="p-6 max-h-[75vh] overflow-y-auto tx-modal-body">
                        <x-transaction::create-transaction :redirect="route('transaction.flow')" />
                    </div>

                </div>
            </div>
        </div>

        <script src="/assets/js/Sortable.min.js"></script>

        <div x-data="scrumboard">
            <div class="relative pt-5">
                <div class="perfect-scrollbar h-full -mx-2">
                    <div class="overflow-x-auto flex items-start flex-nowrap gap-5 pb-2 px-2">
                        <template x-for="(project, index) in projectList" :key="project.id">
                            <div class="panel w-80 flex-none">
                                <div class="flex justify-between mb-5">
                                    <h4 x-text="project.title" class="text-base font-semibold"></h4>
                                    <button
                                        x-show="index === 0"
                                        type="button"
                                        class="btn btn-sm btn-outline-success"
                                        @click="isAddTransactionEditModal = true"

                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                             stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </div>

                                <div class="sortable-list min-h-[150px]" :data-id="project.id">
                                    <div class="relative mb-3">
                                        <input type="text"
                                               class="form-input ltr:pl-9 rtl:pr-9 ltr:sm:pr-4 rtl:sm:pl-4 ltr:pr-9 rtl:pl-9 peer sm:bg-transparent bg-gray-100 placeholder:tracking-widest"
                                               placeholder="جستجو (نام معامله / شهر مشتری)..."
                                               x-model.debounce.300ms="searchByProject[project.id]" />
                                        <button type="button"
                                                class="absolute w-9 h-9 inset-0 ltr:right-auto rtl:left-auto appearance-none peer-focus:text-primary">
                                            <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor"
                                                        stroke-width="1.5" opacity="0.5" />
                                                <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                                      stroke-linecap="round" />
                                            </svg>
                                        </button>
                                    </div>

                                    <template x-for="task in filteredTasks(project)" :key="task.id">
                                        <div
                                            class="shadow relative p-3 pb-5 rounded-md mb-5 space-y-3 cursor-move border-l-4"
                                            :style="STATUS_STYLES[task.status]"
                                            :data-id="task.id">
                                            <div style="position: absolute; left: 10px;">
                                                <span class="text-xs px-2 py-1 rounded-full"
                                                      :class="task.status_color_bg"
                                                      x-text="task.status_lable"
                                                ></span>
                                            </div>
                                            <div class="text-base font-medium" x-text="task.name"></div>
                                            <p class="break-all" x-text="task.description || ''"></p>
                                            <div class="flex gap-2 items-center flex-wrap">
                                                <template x-if="task.tags?.length">
                                                    <template x-for="(tag , i) in task.tags" :key="i">
                                                        <div class="btn px-2 py-1 flex btn-outline-primary">
                                                            <span x-text="tag"></span>
                                                        </div>
                                                    </template>
                                                </template>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <div class="font-medium flex items-center hover:text-primary">
                                                    <span x-text="task.date || ''"></span>
                                                </div>
                                            </div>
                                            <div class="">
                                                <a :href="`/transaction/${task.id}`" class="mt-2 btn btn-secondary">نمایش
                                                    در صفحه جدید</a>
                                            </div>
                                        </div>
                                    </template>

                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="/assets/js/flatpicker-fa.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jalaali-js/dist/jalaali.js"></script>
        <script src="/assets/js/nice-select2.js"></script>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('showTransaction', () => ({
                    activeTab: 'general',
                    isAddTransactionEditModal: false,
                    isCustomerEditModal: false
                }));
            });
        </script>

        <script>
            const STATUS_STYLES = {
                running: 'border-left-color:#3b82f6; background:#fbf1e2;',
                success: 'border-left-color:#22c55e; background:#e8f5e9;',
                failed: 'border-left-color:#ef4444; background:#fdecea;'
            };

            const coloredToast = (color, message) => {
                const toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-start',
                    showConfirmButton: false,
                    timer: 3000,
                    showCloseButton: true,
                    animation: false,
                    customClass: {
                        popup: `color-${color}`
                    },
                    target: document.getElementById(color + '-toast')
                });
                toast.fire({
                    title: message
                });
            };

            document.addEventListener('alpine:init', () => {
                Alpine.data('scrumboard', () => ({
                    searchByProject: {},
                    projectList: [
                            @foreach ($flow['steps'] as $step)
                        {
                            id: {{ $step['id'] }},
                            title: "{{ $step['name'] }}",
                            tasks: [
                                    @foreach ($transactions as $transaction)

                                    @if ($transaction['flowable']['current_step_id'] == $step['id'])
                                    {
                                        id: {{ $transaction['id'] }},
                                        name: @json($transaction['name']),
                                        description: @json(\Illuminate\Support\Str::limit($transaction['description'] ?? '', 80)),
                                        date: @json(\Carbon\Carbon::parse($transaction['created_at'])->format('d M, Y')),
                                        status: @json($transaction['status'] ?? 'running'),
                                        status_color_bg: @json($transaction['status_color']),
                                        status_lable: @json($transaction['status_key']),
                                        customer: @json($transaction['customer'] ?? null),
                                        tags: [],
                                    },

                            @endif
                                @endforeach
                            ]
                        },
                        @endforeach
                    ],
                    filteredTasks(project) {

                        const q = (this.searchByProject[project.id] || '').trim().toLowerCase();
                        console.log(q);
                        if (!q) return project.tasks;

                        return project.tasks.filter(t => {
                            const name = (t.name || '').toLowerCase();

                            const city = (t.customer?.city?.name || '').toLowerCase();
                            const province = (t.customer?.city?.province?.name || '').toLowerCase();

                            return name.includes(q) || city.includes(q) || province.includes(q);
                        });
                    },
                    openCreatePopup() {
                        const tpl = document.getElementById('create-transaction-popup-template');
                        if (!tpl) return;

                        Swal.fire({
                            title: 'ایجاد معامله جدید',
                            html: `<div class="text-right">${tpl.innerHTML}</div>`,
                            width: '80%',
                            showConfirmButton: false,
                            showCloseButton: true,
                            didOpen: (popup) => {
                                const container = popup.querySelector('.swal2-html-container');
                                if (!container) return;

                                const root = container.querySelector('[data-tx-create-root]') || container;
                                const redirectInput = root.querySelector('input[name="redirect"]');
                                if (redirectInput) {
                                    redirectInput.value = window.location.href;
                                }

                            }

                        });
                    },

                    init() {
                        this.initializeSortable();
                    },

                    initializeSortable() {
                        setTimeout(() => {
                            const sortableLists = document.querySelectorAll('.sortable-list');
                            sortableLists.forEach(list => {
                                Sortable.create(list, {
                                    animation: 200,
                                    group: 'name',
                                    ghostClass: 'sortable-ghost',
                                    dragClass: 'sortable-drag',
                                    onEnd: (evt) => {
                                        this.updateTaskStep(evt.item.dataset.id, evt.to.dataset.id);
                                    }
                                });
                            });
                        });
                    },

                    updateTaskStep(taskId, newStepId) {
                        taskId = parseInt(taskId);
                        newStepId = parseInt(newStepId);

                        let task = null;
                        let oldProject = null;

                        this.projectList.forEach(project => {
                            const index = project.tasks.findIndex(t => t.id === taskId);
                            if (index !== -1) {
                                task = project.tasks.splice(index, 1)[0];
                                oldProject = project;
                            }
                        });
                        if (task) {

                            const newProject = this.projectList.find(p => p.id === newStepId);
                            if (newProject) {
                                newProject.tasks.push(task);

                                fetch(`/transaction/${task.id}/update-step`, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({ step_id: newStepId })
                                }).then(res => res.json())
                                    .then(data => {
                                        coloredToast('success', 'تغییرات با موفقیت انجام شد!');
                                    });
                            }
                        }
                    }
                }));
            });
        </script>

    </div>
    @endif

</x-layout.default>
