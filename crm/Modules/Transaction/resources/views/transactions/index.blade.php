
<x-layout.default>

    <script src="/assets/js/simple-datatables.js"></script>
    <div x-data="transactionTable">

        <div class="panel mt-6">
            <div class="flex items-center justify-between">
                <h5 class="font-semibold text-lg">لیست معاملات</h5>
            </div>
            <form x-data="form" x-ref="filterForm" method="GET"
                  action="{{ route('transaction.index') }}"
                  x-show="showFilter"
                  x-transition
                  class="w-full mb-6 mt-5 p-4 border rounded bg-gray-50"
                  @submit.prevent="validateForm">

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    <div>
                        <label class="block text-sm">از تاریخ</label>
                        <input id="fromDate" x-model="date1" name="from" class="form-input w-full"/>
                    </div>

                    <div>
                        <label class="block text-sm">تا تاریخ</label>
                        <input id="toDate" x-model="date2"  name="to" class="form-input w-full">
                    </div>

                    <div>
                        <label class="block text-sm">وضعیت</label>
                        <select name="status" class="form-select w-full" x-model="status">
                            <option value="">همه</option>
                            <option value="running">در حال اجرا</option>
                            <option value="success">موفق</option>
                            <option value="failed">ناموفق</option>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <button class="btn btn-outline-primary w-full md:w-auto">
                            اعمال فیلتر
                        </button>
                        <button type="button" class="btn btn-outline-dark" @click="resetForm()">پاک کردن</button>
                        <a href="{{ route('transaction.export', request()->query()) }}"
                           class="btn btn-outline-success w-full md:w-auto">
                            خروجی اکسل
                        </a>
                    </div>
                </div>
                <p x-show="errorMessage" class="text-danger mt-2" x-text="errorMessage"></p>
            </form>
            <div class="flex items-center justify-between gap-2 btn-left">
                <a href="{{ route('transaction.create') }}"  class="btn btn-primary">
                ایجاد معامله جدید
                </a>
                <button type="button"
                        class="btn btn-secondary "
                        @click="showFilter = !showFilter">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         width="20"
                         height="20"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.5"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M3 4h18L14 13v5l-4 2v-7L3 4z"/>
                    </svg>

                    فیلتر
                </button>
            </div>


            <table id="transactionsTable" class="whitespace-nowrap"></table>
        </div>

        <!-- Delete Modal -->
        <div class="fixed inset-0 bg-black/60 z-[999] hidden overflow-y-auto"
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
                            آیا مطمئن هستید که می‌خواهید معامله
                            <strong class="text-primary" x-text="deletingName"></strong>
                            را حذف کنید؟
                        </p>

                        <form :action="`{{ route('transaction.destroy', '') }}/${deletingId}`"
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
        <!-- Change Status Modal -->
        <div class="fixed inset-0 bg-black/60 z-[999] hidden overflow-y-auto"
             :class="isStatusModalOpen && '!block'">
            <div class="flex items-center justify-center min-h-screen px-4"
                 @click.self="isStatusModalOpen = false">

                <div x-show="isStatusModalOpen"
                     x-transition x-transition.duration.300
                     class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">

                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <h5 class="font-bold text-lg">تغییر وضعیت معامله</h5>
                        <button type="button" class="text-white-dark hover:text-dark"
                                @click="isStatusModalOpen = false">✕</button>
                    </div>

                    <div class="p-5">
                        <form :action="`/transaction/${statusTransactionId}/change-status`" method="POST" x-ref="statusForm">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label class="block mb-2 font-medium">وضعیت جدید</label>
                                <select name="status" class="form-select w-full" x-model="selectedStatus">
                                    <option value="running">در حال اجرا</option>
                                    <option value="success">موفق</option>
                                    <option value="failed">ناموفق</option>
                                </select>

                                <div class="mt-3"
                                    x-show="selectedStatus === 'failed'"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 -translate-y-4"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 -translate-y-4"
                                    x-cloak
                                >
                                    <label class="block mb-2 font-medium">دلیل ناموفق شدن</label>
                                    <select
                                        name="failed_reason_id"
                                        class="form-select w-full"  x-model="failedReasonId"
                                        :required="selectedStatus === 'failed'"
                                    >
                                        <option value="">انتخاب کنید</option>
                                        @foreach($reasons as $reason)
                                            <option value="{{ $reason->id }}">{{ $reason->title }}</option>
                                        @endforeach
                                    </select>
                                    <textarea name="failed_description" x-model="failedDescription" class="form-textarea mt-3 w-full" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="flex justify-end gap-3 mt-4">
                                <button type="button" class="btn btn-outline-dark"
                                        @click="isStatusModalOpen = false">لغو</button>
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

        .dataTable-container,
        .dataTable-wrapper,
        .dataTable-table {
            overflow: visible !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="/assets/js/flatpicker-fa.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jalaali-js/dist/jalaali.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

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
                title: message,
            });
        };

        @if(session('success'))
        coloredToast('success', '{{ session('success') }}');
        @endif
    </script>
    <script>


        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                date1: '{{ request("from") ?? "" }}',
                date2: '{{ request("to") ?? "" }}',
                status: '{{ request("status") ?? "" }}',
                errorMessage: '',
                hasQuery: {{ request()->hasAny(['from','to']) ? 'true' : 'false' }},

                init() {
                    const { toJalaali } = jalaali;
                    const today = new Date();
                    const oneYearAgo = new Date();
                    oneYearAgo.setFullYear(today.getFullYear() - 1);

                    if (!this.date1 && {{ request()->has('from') ? 'false' : 'true' }}) {
                        const j = toJalaali(oneYearAgo.getFullYear(), oneYearAgo.getMonth() + 1, oneYearAgo.getDate());
                        this.date1 = `${j.jy}-${String(j.jm).padStart(2, '0')}-${String(j.jd).padStart(2, '0')}`;
                    }

                    if (!this.date2 && {{ request()->has('to') ? 'false' : 'true' }}) {
                        const j = toJalaali(today.getFullYear(), today.getMonth() + 1, today.getDate());
                        this.date2 = `${j.jy}-${String(j.jm).padStart(2, '0')}-${String(j.jd).padStart(2, '0')}`;
                    }

                    flatpickr("#fromDate", {
                        dateFormat: "Y-m-d",
                        locale: "fa",
                        defaultDate: this.date1,
                        onChange: (selectedDates, dateStr) => this.date1 = dateStr
                    });

                    flatpickr("#toDate", {
                        dateFormat: "Y-m-d",
                        locale: "fa",
                        defaultDate: this.date2,
                        onChange: (selectedDates, dateStr) => this.date2 = dateStr
                    });
                },

                validateDates() {
                    if (!this.date1 || !this.date2) {
                        return true;
                    }

                    const fromParts = this.date1.split('-').map(Number);
                    const toParts = this.date2.split('-').map(Number);

                    const from = new Date(fromParts[0], fromParts[1]-1, fromParts[2]);
                    const to = new Date(toParts[0], toParts[1]-1, toParts[2]);

                    const diffDays = (to - from) / (1000 * 60 * 60 * 24);

                    if (diffDays < 0) {
                        this.errorMessage = "تاریخ 'تا' نمی‌تواند قبل از تاریخ 'از' باشد.";
                        return false;
                    }

                    if (diffDays > 365) {
                        this.errorMessage = "فاصله بین دو تاریخ نمی‌تواند بیش از یک سال باشد.";
                        return false;
                    }

                    this.errorMessage = '';
                    return true;
                },
                validateForm(event) {
                    if (!this.validateDates()) {
                        event.preventDefault(); // جلوگیری از ارسال فرم
                    } else {
                        this.$refs.filterForm.submit();
                    }
                },
                resetForm() {
                    this.date1 = '';
                    this.date2 = '';
                    this.status = '';
                    this.errorMessage = '';
                }
            }));

            Alpine.data("transactionTable", () => ({
                transactions : @json($transactions),
                showFilter: {{ request()->hasAny(['from','to','status']) ? 'true' : 'false' }},

                isDeleteModalOpen: false,
                deletingId: null,
                deletingName: '',
                isStatusModalOpen: false,
                statusTransactionId: null,
                selectedStatus: '',
                failedReasonId : '',
                failedDescription : '',
              issueInvoice(transactionId) {
                fetch(`/invoices/issue/${transactionId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                }).then(res => res.json())
                    .then(data => {
                        // بعد از صدور، مقدار issued رو true کن و صفحه رو رفرش کن
                        location.reload();
                    });
            },

                init() {

                    const transactions = @json($transactions);


                    const rows = transactions.map((t) => [
                        t.name ?? '-',
                        t.customer
                            ? t.customer.full_name
                            : '-',
                        t.customer
                            ? t.customer.city.province?.name
                            : '-',
                        t.customer
                            ? t.customer.city?.name
                            : '-',
                        t.product?.name ?? '-',
                        t.amount
                            ? new Intl.NumberFormat().format(t.amount) + ' تومان'
                            : '-',
                        t.approximate_amount
                            ? new Intl.NumberFormat().format(t.approximate_amount) + ' تومان'
                            : '-',
                        t.transaction_type?.name ?? '-',
                        t.deal_closed_at ?? '-',
                        t.created_at ? this.formatDate(t.created_at) : '-',
                        t.status,
                        ''
                    ]);

                    new simpleDatatables.DataTable('#transactionsTable', {
                        data: {
                            headings: [
                                'نام معامله',
                                'مشتری',
                                'استان',
                                'شهر',
                                'محصول',
                                'مبلغ',
                                'مبلغ تقریبی',
                                'نوع آشنایی',
                                'تاریخ پیشنهادی',
                                'تاریخ ایجاد',
                                'وضعیت',
                                '<div class="text-center">عملیات</div>'
                            ],
                            data: rows
                        },

                        perPage: 25,
                        searchable: true,
                        labels: {
                            placeholder: "جستجو...",
                            perPage: "{select} رکورد در هر صفحه",
                            noRows: "هیچ داده‌ای وجود ندارد",
                            info: "نمایش {end} از {rows} رکورد",
                            next: "بعدی",
                            previous: "قبلی",
                        },
                        columns: [
                            {
                                select: 10,
                                sortable: false,
                                render: (data, cell, row) => {
                                    const item = transactions[row.dataIndex];
                                    let color = '';
                                    let text = '';

                                    switch(item.status) {
                                        case 'running':
                                            color = 'orange';
                                            text = 'در حال اجرا';
                                            break;
                                        case 'success':
                                            color = 'green';
                                            text = 'موفق';
                                            break;
                                        case 'failed':
                                            color = 'red';
                                            text = 'ناموفق';
                                            break;
                                        default:
                                            color = 'gray';
                                            text = '-';
                                    }

                                    return `<span class="px-2 py-1 rounded text-white" style="background-color: ${color}">${text}</span>`;
                                }
                            },
                            {
                                select:11,
                                sortable: false,
                                render: (data, cell, row) => {

                                    const item = transactions[row.dataIndex];

                                    let invoiceButton = '';
                                    if(item.status === 'success') {
                                        let invoiceButton = `<div class="flex justify-center">
<div class="theme-dropdown relative inline-block  z-[9999]">

    <button
        type="button"
        class="flex rounded-md border border-[#e0e6ed] px-3 py-1.5 text-sm font-semibold btn-info"
        onclick="toggleInvoiceDropdown(this, ${item.id}, ${item.invoice_id ? 'true' : 'false'})"
    >
        پیش‌فاکتور
        <svg class="h-4 w-4 ms-1" viewBox="0 0 24 24" fill="none">
            <path d="M19 9L12 15L5 9"
                  stroke="currentColor"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    </button>

   <div class="invoice-dropdown absolute z-[9999] hidden w-full rounded bg-white text-dark shadow">
        <ul class="text-sm w-full">
              <!-- نمایش -->
    <li class="hover:bg-gray-100 hover:text-primary">
        <a class="flex items-center gap-1 px-3 py-2"
           href="/invoices/${item.invoice_id}/pdf"
           target="_blank">
            <!-- SVG نمایش -->
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-4 h-4 shrink-0"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.25 12c0-4.556 4.03-7.5 9.75-7.5s9.75 2.944 9.75 7.5-4.03 7.5-9.75 7.5S2.25 16.556 2.25 12z"/>
                <circle cx="12" cy="12" r="3.25"/>
            </svg>
            نمایش
        </a>
    </li>

    <!-- دانلود -->
    <li class="hover:bg-gray-100 hover:text-primary">
        <a class="flex items-center gap-1 px-3 py-2"
           href="/invoices/${item.invoice_id}/pdf/download">
            <!-- SVG دانلود (همونی که دادی، فقط سایز شده) -->
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-4 h-4 shrink-0"
                 viewBox="0 0 24 24"
                 fill="none">
                <path d="M8 22H16C18.8284 22 20.2426 22 21.1213 21.1213C22 20.2426 22 18.8284 22 16V15C22 12.1716 22 10.7574 21.1213 9.87868C20.3529 9.11029 19.175 9.01385 17 9.00195"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M7 9.00195C4.82497 9.01406 3.64706 9.11051 2.87868 9.87889C2 10.7576 2 12.1718 2 15V16C2 18.8284 2 20.2426 2.87868 21.1213C3.17848 21.4211 3.54062 21.6186 4 21.749"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M12 2V15M12 15L9 11.5M12 15L15 11.5"
                      stroke="currentColor" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            دانلود
        </a>
    </li>

    <!-- چاپ -->
    <li class="hover:bg-gray-100 hover:text-primary">
        <button
            class="flex w-full items-center gap-1 px-3 py-2"
            onclick="window.open('/invoices/${item.invoice_id}/pdf','_blank').print()">
            <!-- SVG چاپ -->
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-4 h-4 shrink-0"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M7 8V3h10v5M6 14H5a2 2 0 01-2-2v-1a2 2 0 012-2h14a2 2 0 012 2v1a2 2 0 01-2 2h-1M7 14h10v7H7v-7z"/>
            </svg>
            چاپ
        </button>
    </li>
        </ul>
    </div>
</div></div>
`;


                                        return invoiceButton;
                                    }
                                    return `
                                        <div class="flex justify-center items-center gap-2">
                                            <a href="/transaction/${item.id}"
                                                class="text-secondary" x-tooltip="نمایش">
                                               <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="w-4 h-4 shrink-0"
                                                     fill="none"
                                                     viewBox="0 0 24 24"
                                                     stroke="currentColor"
                                                     stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M2.25 12c0-4.556 4.03-7.5 9.75-7.5s9.75 2.944 9.75 7.5-4.03 7.5-9.75 7.5S2.25 16.556 2.25 12z"/>
                                                    <circle cx="12" cy="12" r="3.25"/>
                                                </svg>
                                            </a>
                                            <button type="button"
                                                class="flex justify-center items-center gap-2"
                                                @click="openStatusModal(${item.id}, '${item.status}')"
                                                x-tooltip="تغییر وضعیت">

                                               <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="w-4 h-4"
                                                     fill="none"
                                                     viewBox="0 0 24 24"
                                                     stroke="currentColor"
                                                     stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M4 4v6h6M20 20v-6h-6M20 8A8 8 0 006.3 6.3M4 16a8 8 0 0013.7 1.7"/>
                                                </svg>


                                            </button>
                                            <a href="/transaction/${item.id}/edit"
                                                class="text-primary" x-tooltip="ویرایش">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-4.5 h-4.5">
                                                    <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"/>
                                                    <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5"/>
                                                </svg>
                                            </a>
                                            <button type="button" class="text-danger delete-btn"
                                                data-id="${item.id}"
                                                data-name="${item.name}" x-tooltip="حذف">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-5 h-5">
                                                    <path opacity="0.5" d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                    <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                    <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                    <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                    <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                </svg>
                                            </button>

                                    ${invoiceButton}
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

                    // delete click events
                    document.addEventListener('click', (e) => {
                        const btn = e.target.closest('.delete-btn');
                        if (!btn) return;

                        this.deleteItem(btn.dataset.id, btn.dataset.name);
                    });
                },

                deleteItem(id, name) {
                    this.deletingId = id;
                    this.deletingName = name;
                    this.isDeleteModalOpen = true;
                },
                openStatusModal(id, currentStatus) {
                    this.statusTransactionId = id;
                    this.selectedStatus = currentStatus;

                    // پیدا کردن معامله
                    const transaction = this.transactions.find(t => t.id === id);

                    if(transaction && transaction.status === 'failed') {
                        this.failedReasonId = transaction.failed_reason?.id || '';
                        this.failedDescription = transaction.failed_description || '';
                    } else {
                        this.failedReasonId = '';
                        this.failedDescription = '';
                    }

                    this.isStatusModalOpen = true;
                },
                formatDate(date) {
                    const dt = new Date(date);
                    return dt.toLocaleDateString("fa-IR");
                },

            }));
        });

        function toggleInvoiceDropdown(btn) {
            document.querySelectorAll('.invoice-dropdown').forEach(el => {
                if (!btn.nextElementSibling.isSameNode(el)) {
                    el.classList.add('hidden');
                }
            });

            btn.nextElementSibling.classList.toggle('hidden');
        }

        document.addEventListener('click', (e) => {
            if (!e.target.closest('.theme-dropdown')) {
                document.querySelectorAll('.invoice-dropdown')
                    .forEach(el => el.classList.add('hidden'));
            }
        });


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</x-layout.default>
