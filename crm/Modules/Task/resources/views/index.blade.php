<x-layout.default>

    <script src="/assets/js/simple-datatables.js"></script>

    <div x-data="taskTable">
        <div class="panel mt-6">
            <div class="flex items-center justify-between">
                <h5 class="font-semibold text-lg">لیست وظایف</h5>
            </div>

            <div class="flex items-center justify-between btn-left">
                <a href="{{ route('tasks.create') }}"  class="btn btn-primary">
                    ایجاد وظیفه جدید
                </a>
            </div>

            <table id="tasksTable" class="whitespace-nowrap"></table>
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
                                @click="isDeleteModalOpen = false">✕</button>
                    </div>

                    <div class="p-5">
                        <p class="text-lg">
                            آیا مطمئن هستید که می‌خواهید تسک
                            <strong class="text-primary" x-text="deletingTaskTitle"></strong>
                            را حذف کنید؟
                        </p>
                        <form :action="`/tasks/${deletingTaskId}`" method="POST" x-ref="deleteForm" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>

                        <div class="flex justify-end items-center mt-8 gap-3">
                            <button type="button" class="btn btn-outline-dark" @click="isDeleteModalOpen = false">لغو</button>
                            <button type="button" class="btn btn-danger" @click="$refs.deleteForm.submit()">حذف کن</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Assign Modal -->
        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto"
             :class="isAssignModalOpen && '!block'">

            <div class="flex items-center justify-center min-h-screen px-4"
                 @click.self="isAssignModalOpen = false">

                <div x-show="isAssignModalOpen"
                     x-transition
                     x-transition.duration.300
                     class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">

                    <!-- Header -->
                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <h5 class="font-bold text-lg">اساین تسک</h5>
                        <button type="button" class="text-white-dark hover:text-dark"
                                @click="isAssignModalOpen = false">✕</button>
                    </div>

                    <!-- Body -->
                    <div class="p-5">
                        <form method="POST" :action="`/tasks/${assigningTaskId}/assign`" x-ref="assignForm">
                            @csrf
                            <input type="hidden" name="task_id" :value="assigningTaskId">

                            <label class="font-medium">انتخاب کارشناسان:</label>
                            <select name="assignees[]" x-model="selectedAssignees" multiple class="form-select mt-2 w-full border p-2 rounded" required>
                                <template x-for="user in users" :key="user.id">
                                    <option :value="user.id" x-text="user.first_name + ' ' + user.last_name"></option>
                                </template>
                            </select>

                            <!-- Buttons -->
                            <div class="flex justify-end items-center mt-4 gap-3">
                                <button type="button" class="btn btn-outline-dark" @click="isAssignModalOpen = false">لغو</button>
                                <button type="submit" class="btn btn-primary">ثبت</button>
                            </div>
                        </form>
                    </div>

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

            Alpine.data("taskTable", () => ({

                isDeleteModalOpen: false,
                deletingTaskId: null,
                deletingTaskTitle: '',
                isAssignModalOpen: false,
                assigningTaskId: null,
                selectedAssignees: [],
                users: @json($users),

                init() {
                    const tasks = @json($tasks);
                    const allowedStatuses = @json(\Modules\Task\App\Models\Task::getLabels());
                    const rows = tasks.map(task => [
                        task.src ? task.src.name : '-',
                        task.title ? task.title.title : '-',
                        task.description ?? '-',
                        allowedStatuses[task.status] ?? task.status ?? '-',
                        task.assignees
                            .map(a => a.user ? `${a.user.first_name} ${a.user.last_name}` : '-')
                            .join(', '),
task.due_date,
                        task.task_time ?? '-',
                        '' 
                    ]);

                    new simpleDatatables.DataTable('#tasksTable', {
                        data: {
                            headings: [
                                'تسک مربوط به',
                                'عنوان',
                                'توضیحات',
                                'وضعیت',
                                'کارشناسان',
                                'سررسید',
                                'ساعت',
                                '<div class="text-center">عملیات</div>'
                            ],
                            data: rows
                        },
                        perPage: 10,
                        searchable: true,
                        perPageSelect: [10, 20, 50, 100],

                        columns: [
                            {
                                select: 7,
                                sortable: false,
                                render: (data, cell, row) => {
                                    const task = tasks[row.dataIndex];
                                    return `
                <div class="flex justify-center items-center gap-2">
                    <a href="/tasks/${task.id}/edit" class="text-primary" x-tooltip="ویرایش">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-4.5 h-4.5">
                            <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"/>
                            <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5"/>
                        </svg>
                    </a>
                    <button type="button" x-tooltip="حذف" class="text-danger delete-btn"
                        data-id="${task.id}"
                        data-title="${task.title}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-5 h-5">
                            <path opacity="0.5" d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </button>
<button type="button" x-tooltip="انتساب کارشناس" class="text-success assign-btn"
        data-id="${task.id}" title="Assign Task">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
         viewBox="0 0 24 24" fill="none" stroke="currentColor"
         stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
         class="w-5 h-5">
        <path d="M15 19v-6"></path>
        <path d="M12 16h6"></path>
        <path d="M8 7a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z"></path>
        <path d="M4 20v-2a4 4 0 0 1 4-4h2"></path>
    </svg>
</button>

                </div>`;
                                }
                            }
                        ]
                        ,

                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        },

                        labels: {
                            placeholder: "جستجو...",
                            perPage: "{select} رکورد در هر صفحه",
                            noRows: "هیچ تسکی یافت نشد",
                            info: "نمایش {end} از {rows} رکورد",
                            next: "بعدی",
                            previous: "قبلی",
                        }
                    });

                    document.addEventListener('click', (e) => {
                        const btn = e.target.closest('.delete-btn');
                        if (!btn) return;
                        const id = btn.dataset.id;
                        const title = btn.dataset.title;
                        this.deleteTask(id, title);
                    });
                    document.addEventListener('click', (e) => {
                        const btn = e.target.closest('.delete-btn');
                        if (btn) {
                            const id = btn.dataset.id;
                            const title = btn.dataset.title;
                            this.deleteTask(id, title);
                        }
                        const assignBtn = e.target.closest('.assign-btn');
                        if (assignBtn) {
                            const id = assignBtn.dataset.id;
                            this.openAssignModal(id);
                        }
                    });
                },

                deleteTask(id, title) {
                    this.deletingTaskId = id;
                    this.deletingTaskTitle = title;
                    this.isDeleteModalOpen = true;
                },
                openAssignModal(taskId) {
                    this.assigningTaskId = taskId;
                    this.selectedAssignees = []; // خالی کردن انتخاب‌های قبلی
                    this.isAssignModalOpen = true;
                }

            }));
        });
    </script>

</x-layout.default>
