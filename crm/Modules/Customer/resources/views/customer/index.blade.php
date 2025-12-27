<x-layout.default>


    <script src="/assets/js/simple-datatables.js"></script>

    <div x-data="multipleTable">

        <div class="panel mt-6">
            <div class="flex items-center justify-between">
                <h5 class="font-semibold text-lg">لیست مشتریان</h5>
            </div>

            <div class="flex items-center justify-between btn-left">
                <a href="{{ route('customer.create') }}"  class="btn btn-primary">
                    ایجاد مشتری جدید
                </a>
            </div>

            <table id="myTable1" class="whitespace-nowrap"></table>
        </div>
        <!-- Modal Delete Customer -->
        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="isDeleteModalOpen && '!block'">
            <div class="flex items-center justify-center min-h-screen px-4" @click.self="isDeleteModalOpen = false">
                <div x-show="isDeleteModalOpen" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <h5 class="font-bold text-lg">تأیید حذف</h5>
                        <button type="button" class="text-white-dark hover:text-dark" @click="isDeleteModalOpen = false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>

                    <div class="p-5">
                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                            <p class="text-lg">
                                آیا مطمئن هستید که می‌خواهید مشتری
                                <strong class="text-primary" x-text="deletingCustomerName"></strong>
                                را حذف کنید؟ این عمل قابل بازگشت نیست.
                            </p>
                        </div>

                        <form :action="`/customer/${deletingCustomerId}`" method="POST" x-ref="deleteForm" class="hidden">
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
                        <h5 class="font-bold text-lg">انتساب کارشناس به مشتری</h5>
                        <button type="button" class="text-white-dark hover:text-dark"
                                @click="isAssignModalOpen = false">
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

                        <p class="text-lg dark:text-white-dark/70 font-medium mb-4">
                            انتخاب کارشناس برای
                            <strong class="text-primary" x-text="assignCustomerName"></strong>
                        </p>

                        <form method="POST" action="{{ route('customer.assignUser') }}"
                              x-ref="assignForm">
                            @csrf
                            <input type="hidden" name="customer_id" x-model="assignCustomerId">

                            <label class="font-medium">انتخاب کارشناس:</label>
                            <select name="user_id" class="form-select mt-2" required>
                                <option value="">-- انتخاب کنید --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}"
                                            :selected="assignUserId == {{ $user->id }}">
                                        {{ $user->full_name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>

                        <!-- Buttons -->
                        <div class="flex justify-end items-center mt-8 gap-3">
                            <button type="button" class="btn btn-outline-dark"
                                    @click="isAssignModalOpen = false">لغو</button>

                            <button type="button" class="btn btn-primary"
                                    @click="$refs.assignForm.submit()">ثبت</button>
                        </div>

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

            Alpine.data("multipleTable", () => ({
                // delete customer
                isDeleteModalOpen: false,
                deletingCustomerId: null,
                deletingCustomerName: '',

                // assign user
                isAssignModalOpen: false,
                assignCustomerId: null,
                assignCustomerName: '',
                assignUserId: null,

                init() {
                    // داده‌های مشتریان از کنترلر
                    const customers = @json($customers);

                    // ساخت آرایه سازگار با دیتاتیبل
                    const rows = customers.data.map((c, index) => [
                        c.firstname ?? '-',
                        c.lastname ?? '-',
                        c.mobile ?? '-',
                        c.company ?? '-',
                        c.business_name ?? '-',
                        c.province?.name ?? '-',
                        c.city?.name ?? '-',
                        c.created_at ? this.formatDate(c.created_at) : '-',
                        c.type_label ? `<span class="badge ${c.type === 'company' ? 'bg-warning' : 'bg-secondary'}">${c.type_label}</span>` : '-',
                        ''
                    ]);

                    new simpleDatatables.DataTable('#myTable1', {
                        data: {
                            headings: [
                                'نام',
                                'نام خانوادگی',
                                'موبایل',
                                'شرکت',
                                'صنف',
                                'استان',
                                'شهر',
                                'تاریخ ثبت',
                                'نوع',
                                '<div class="text-center">عملیات</div>'],
                            data: rows
                        },
                        perPage: 10,
                        searchable: true,
                        perPageSelect: [10, 20, 50, 100],
                        labels: {
                            placeholder: "جستجو...", // متن placeholder جستجو
                            perPage: "{select} رکورد در هر صفحه", // متن انتخاب تعداد رکورد در صفحه
                            noRows: "هیچ داده‌ای وجود ندارد", // زمانی که داده نیست
                            // info: "نمایش {start} تا {end} از {rows} رکورد", // نمایش اطلاعات
                            info: "نمایش {end} از {rows} رکورد", // نمایش اطلاعات
                            next: "بعدی", // دکمه بعدی
                            previous: "قبلی", // دکمه قبلی
                        },
                        columns: [
                            {
                                select: 9,
                                sortable: false,
                                render: (data, cell, row) => {
                                    const customer = customers.data[row.dataIndex];
                                    const customerId = customer.id;
                                    const customerName = customer.firstname +' '+ customer.lastname;

                                    return `<div class="flex justify-center items-center gap-2">
                                        <a href="/customer/${customerId}/edit" x-tooltip="ویرایش" class="text-primary">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-4.5 h-4.5">
                                                <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"/>
                                                <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5"/>
                                            </svg>
                                        </a>
                                        <button type="button" x-tooltip="انتساب به کارشناس"
                                                @click="$event.preventDefault(); $event.stopPropagation(); $data.assignCustomer(${customerId}, '${customerName}', ${customer.userable_id ?? 'null'})"
                                                class="text-success">
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
                                        <button type="button" x-tooltip="حذف"
                                            @click="$event.preventDefault(); $event.stopPropagation(); $data.deleteCustomer(${customerId}, '${customerName}')"
                                            class="text-danger">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-5 h-5">
                                                <path opacity="0.5" d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                            </svg>
                                        </button>
                                    </div>`;
                                }
                            }],
                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        }

                    });
                },
                deleteCustomer(customerId, customerName) {
                    this.deletingCustomerId = customerId;
                    this.deletingCustomerName = customerName;
                    this.isDeleteModalOpen = true;
                },
                assignCustomer(customerId, customerName, userId) {
                    this.assignCustomerId = customerId;
                    this.assignCustomerName = customerName;
                    this.assignUserId = userId;
                    this.isAssignModalOpen = true;
                },
                formatDate(date) {
                    const dt = new Date(date);
                    return dt.toLocaleDateString("fa-IR");
                },

            }));
        });
    </script>


</x-layout.default>
