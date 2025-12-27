<x-layout.default>

    <script src="/assets/js/simple-datatables.js"></script>

    <div x-data="ticketsTable">
        <div class="panel mt-6">
            <div class="flex items-center justify-between">
                <h5 class="font-semibold text-lg">لیست تیکت‌ها</h5>
            </div>

            <div class="flex items-center justify-between btn-left">
                <a href="{{ route('tickets.create') }}" class="btn btn-primary">
                    ایجاد تیکت جدید
                </a>
            </div>

            <table id="ticketsTable" class="whitespace-nowrap"></table>
        </div>

        {{-- Delete Modal --}}
        <div class="fixed inset-0 bg-black/60 z-[999] hidden"
             :class="isDeleteModalOpen && '!block'">

            <div class="flex items-center justify-center min-h-screen px-4"
                 @click.self="isDeleteModalOpen = false">

                <div class="panel w-full max-w-lg">
                    <h5 class="font-bold text-lg mb-4">⚠️ تأیید حذف</h5>

                    <p>
                        آیا از حذف تیکت
                        <strong class="text-primary" x-text="deletingTicketSubject"></strong>
                        مطمئن هستید؟
                    </p>

                    <form :action="`/tickets/${deletingTicketId}`" method="POST" x-ref="deleteForm">
                        @csrf
                        @method('DELETE')
                    </form>

                    <div class="flex justify-end gap-3 mt-6">
                        <button class="btn btn-outline-dark" @click="isDeleteModalOpen = false">
                            لغو
                        </button>
                        <button class="btn btn-danger" @click="$refs.deleteForm.submit()">
                            حذف
                        </button>
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
        document.addEventListener('alpine:init', () => {

            Alpine.data('ticketsTable', () => ({

                isDeleteModalOpen: false,
                deletingTicketId: null,
                deletingTicketSubject: '',

                init() {
                    const tickets = @json($tickets);
                    const badgeByType = (value, type) => {
                        if (!value) return '-';

                        const map = {
                            status: {
                                open:        { label: 'باز',        class: 'bg-info' },
                                in_progress: { label: 'در حال بررسی', class: 'bg-warning' },
                                closed:      { label: 'بسته شده',    class: 'bg-success' },
                            },
                            priority: {
                                low:    { label: 'کم',     class: 'bg-secondary' },
                                medium: { label: 'متوسط',  class: 'bg-info' },
                                high:   { label: 'زیاد',   class: 'bg-danger' },
                            }
                        };

                        const item = map[type]?.[value];

                        if (!item) return '-';

                        return `
                        <span class="badge ${item.class}">
                            ${item.label}
                        </span>
                    `;
                    };
                    const rows = tickets.data.map(ticket => [
                        ticket.subject,
                        ticket.ticketable
                            ? ticket.ticketable.name ?? '—'
                            : '—',

                        badgeByType(ticket.status, 'status'),
                        badgeByType(ticket.priority, 'priority'),
                        ticket.assignee
                            ? `${ticket.assignee.first_name} ${ticket.assignee.last_name}`
                            : '—',
                        ''
                    ]);

                    new simpleDatatables.DataTable('#ticketsTable', {
                        data: {
                            headings: [
                                'موضوع',
                                'معامله',
                                'وضعیت',
                                'اولویت',
                                'کارشناس',
                                '<div class="text-center">عملیات</div>',
                            ],
                            data: rows
                        },

                        perPage: 10,
                        searchable: true,

                        columns: [
                            {
                                select: 5,
                                sortable: false,
                                render: (data, cell, row) => {
                                    const ticket = tickets.data[row.dataIndex];

                                    return `
                                        <div class="flex justify-center gap-2">

                                            <a href="/tickets/${ticket.id}/edit"
                                               class="text-primary" title="ویرایش">
                                               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-4.5 h-4.5">
                                                <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"/>
                                                <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5"/>
                                            </svg>
                                            </a>

                                            <button type="button"
                                                class="text-danger delete-btn"
                                                data-id="${ticket.id}"
                                                data-subject="${ticket.subject}">
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

                        labels: {
                            placeholder: 'جستجو...',
                            noRows: 'هیچ تیکتی یافت نشد',
                            info: 'نمایش {end} از {rows} تیکت',
                            perPage: '{select} در هر صفحه',
                        },
                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        }
                    });

                    document.addEventListener('click', e => {
                        const btn = e.target.closest('.delete-btn');
                        if (!btn) return;

                        this.deletingTicketId = btn.dataset.id;
                        this.deletingTicketSubject = btn.dataset.subject;
                        this.isDeleteModalOpen = true;
                    });
                }
            }));
        });
    </script>

</x-layout.default>
