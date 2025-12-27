<x-layout.default>

    <link href="{{ Vite::asset('resources/css/fullcalendar.min.css') }}" rel='stylesheet' />
        <script src="https://cdn.jsdelivr.net/npm/jalaali-js/dist/jalaali.js"></script>
    <script src='/assets/js/fullcalendar.min.js'></script>
    <div x-data="calendar">
        <div class="panel">
            <div class="mb-5">
                <div class="mb-4 flex items-center sm:flex-row flex-col sm:justify-between justify-center">
                    <div class="sm:mb-0 mb-4">
                        <div class="text-lg font-semibold ltr:sm:text-left rtl:sm:text-right text-center">تاریخ تسک ها</div>
                        <div class="flex items-center mt-2 flex-wrap sm:justify-start justify-center">
                            @foreach([
                                'pending'=>'در انتظار',
                                'in_progress'=>'درحال انجام',
                                'done'=>'انجام شده',
                                'finished'=>'پایان یافته',
                                'canceled'=>'لغو شده'
                            ] as $key => $label)
                                <div class="flex items-center ltr:mr-4 rtl:ml-4">
                                    <div class="h-2.5 w-2.5 rounded-sm ltr:mr-2 rtl:ml-2 {{ $key == 'pending' ? 'bg-primary' : ($key == 'in_progress' ? 'bg-info' : ($key == 'done' || $key == 'finished' ? 'bg-success' : 'bg-danger')) }}"></div>
                                    <div>{{ $label }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto hidden"
                        :class="isAddEventModal && '!block'">
                        <div class="flex items-center justify-center min-h-screen px-4"
                            @click.self="isAddEventModal = false">
                            <div x-show="isAddEventModal" x-transition x-transition.duration.300
                                class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full max-w-lg w-[90%] my-8">
                                <button type="button"
                                    class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark"
                                    @click="isAddEventModal = false">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]"
                                    x-text="'Add Event'"></h3>
                                <div class="p-5">
                                    <x-task::add-task :redirect="route('calendar.view')"  />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto hidden"
                        :class="isAddEventModalShow && '!block'">
                        <div class="flex items-center justify-center min-h-screen px-4"
                            @click.self="isAddEventModalShow = false">
                            <div x-show="isAddEventModalShow" x-transition x-transition.duration.300
                                class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full max-w-lg w-[90%] my-8">
                                <button type="button"
                                    class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark"
                                    @click="isAddEventModalShow = false">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]"
                                    x-text="'Add Event'"></h3>
                                <div class="p-5">
                                    <div class="mb-5 flex gap-4 items-center">
                                        <span class="text-gray-500">نام تسک:</span>
                                        <span class="font-medium"  x-text="params.data?.title?.title"></span>

                                        <span class="text-gray-500">نام معامعله:</span>
                                        <span class="font-medium"  x-text="params.data?.src?.name"></span>
                                        
                                    </div>

                                    <div class="mb-5">
                                        <label for="description">توضیحات  :</label>
                                        <p id="description" name="description" id="description" class="form-textarea min-h-[130px]"
                                            placeholder="Enter Event Description" x-text="params.description"></p>
                                    </div>
                                        <div class="mb-5">
                                            <label>وضعیت:</label>
                                            @foreach(Modules\Task\App\Enums\TaskStatus::cases() as $status)
                                                <label class="inline-flex cursor-pointer ltr:mr-3 rtl:ml-3">
                                                    <input
                                                        type="radio"
                                                        class="form-radio 
                                                            {{ $status === Modules\Task\App\Enums\TaskStatus::Pending ? 'text-primary' : 
                                                            ($status === Modules\Task\App\Enums\TaskStatus::InProgress ? 'text-info' :
                                                            ($status === Modules\Task\App\Enums\TaskStatus::Done || $status === Modules\Task\App\Enums\TaskStatus::Finished ? 'text-success' : 'text-danger')) }}"
                                                        name="badge"
                                                        value="{{ $status->value }}"
                                                        x-model="params.data.status"
                                                    />
                                                    <span class="ltr:pl-2 rtl:pr-2">{{ $status->label() }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                         </div>
                                        <div class="flex justify-end items-center mt-8">
                                            <!-- <button type="button" class="btn btn-outline-danger"
                                                @click="isAddEventModal = false">Cancel</button>
                                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                x-text="params.id ? 'Update Event' : 'Create Event'"></button> -->
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calendar-wrapper" id='calendar'></div>
            </div>
        </div>
    </div>

    <style>
    .fc-timegrid-event-harness {
        position: absolute;
        padding: 32px;
    }
    </style>
        
    <script>
        window.tasks = @json($tasks);
    </script>

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
    </script>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("calendar", () => ({
                defaultParams: ({
                    id: null,
                    title: '',
                    start: '',
                    end: '',
                    data: {},
                    description: '',
                    type: 'primary'
                }),
                params: {
                    id: null,
                    title: '',
                    start: '',
                    end: '',
                    data: {
                        status: 'primary'
                    },
                    description: '',
                    type: 'primary'
                },
                isAddEventModal: false,
                isAddEventModalShow: false,
                minStartDate: '',
                minEndDate: '',
                calendar: null,
                now: new Date(),
                events: [],
                jalaliToGregorian(jalaliDate) {
                    const [jy, jm, jd] = jalaliDate.split("-").map(Number);
                    const g = jalaali.toGregorian(jy, jm, jd);
                    const month = g.gm < 10 ? "0" + g.gm : g.gm;
                    const day = g.gd < 10 ? "0" + g.gd : g.gd;
                    return `${g.gy}-${month}-${day}`;
                },
                mapStatus(status) {
                    const map = {
                        pending: 'info',        
                        in_progress: 'primary',   
                        done: 'success',          
                        finished: 'success',      
                        canceled: 'danger'        
                    };
                    return map[status] || 'info'; 
                },
                gregorianToJalali(dateObj) {
                    const gY = dateObj.getFullYear();
                    const gM = dateObj.getMonth() + 1;
                    const gD = dateObj.getDate();

                    const j = jalaali.toJalaali(gY, gM, gD);
                    const pad = n => String(n).padStart(2, '0');

                    return `${j.jy}-${pad(j.jm)}-${pad(j.jd)}`;
                },

                extractTime(dateObj) {
                    const pad = n => String(n).padStart(2, '0');
                    return `${pad(dateObj.getHours())}:${pad(dateObj.getMinutes())}:00`;
                },
                updateEventDate(event) {
                    const start = event.start;
                    const due_date = this.gregorianToJalali(start);
                    const task_time = this.extractTime(start);
                        fetch(`/tasks/${event.id}/update-datetime`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                due_date: due_date,
                                task_time: task_time
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            coloredToast('success', 'زمان تسک با موفقیت بروزرسانی شد!');
                        })
                        .catch(() => {
                            coloredToast('error', 'خطا در بروزرسانی زمان تسک');
                        });
                },
                init() {
                    this.events = window.tasks.map(task => {
                        const startDate = this.jalaliToGregorian(task.due_date);
                        const startDateTime = `${startDate}T${task.task_time}`;
                        const endDateObj = new Date(startDateTime);
                        endDateObj.setHours(endDateObj.getHours() + 1);

                        const pad = n => String(n).padStart(2, '0');

                        const endDateTime =
                            endDateObj.getFullYear() + '-' +
                            pad(endDateObj.getMonth() + 1) + '-' +
                            pad(endDateObj.getDate()) + 'T' +
                            pad(endDateObj.getHours()) + ':' +
                            pad(endDateObj.getMinutes()) + ':' +
                            pad(endDateObj.getSeconds());
                        return {
                            id: task.id,
                            title: task.title.title + " " + task.src.name,
                            start: startDateTime,
                            end: endDateTime,
                            className: this.mapStatus(task.status),
                            data: task,
                            description: task.description,
                            extendedProps: {
                                src: task.src,
                            }
                        }
                    });
                    var calendarEl = document.getElementById('calendar');
                    this.calendar = new FullCalendar.Calendar(calendarEl, {
                        locale: 'fa',
                        direction: 'rtl',
                        firstDay: 6, // شنبه
                        initialView: 'dayGridMonth',
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay',
                        },
                        buttonText: {
                            today: 'امروز',
                            month: 'ماه',
                            week: 'هفته',
                            day: 'روز',
                            list: 'لیست'
                        },
                        editable: true,
                        dayMaxEvents: true,
                        selectable: true,
                        droppable: true,
                        eventClick: (event) => {
                            this.editEvent(event);
                        },
                        select: (event) => {
                            this.editDate(event)
                        },

                        eventDrop: (info) => {
                            this.updateEventDate(info.event);
                        },
                        events: this.events,
                    });
                    this.calendar.render();

                    this.$watch('$store.app.sidebar', () => {
                        setTimeout(() => {
                            this.calendar.render();
                        }, 300);
                    });
                },

                getMonth(dt, add = 0) {
                    let month = dt.getMonth() + 1 + add;
                    return dt.getMonth() < 10 ? '0' + month : month;
                },

                editEvent(data) {
                    this.params = JSON.parse(JSON.stringify(this.defaultParams));
                    if (data) {
                        let obj = JSON.parse(JSON.stringify(data.event));
                        const startDate = new Date(obj.start);
                        const j = jalaali.toJalaali(startDate.getFullYear(), startDate.getMonth() + 1, startDate.getDate());
                        const pad = n => String(n).padStart(2, '0');

                        const due_date = `${j.jy}-${pad(j.jm)}-${pad(j.jd)}`; 
                        const task_time = `${pad(startDate.getHours())}:${pad(startDate.getMinutes())}`; 
                        this.$nextTick(() => {
                                flatpickr("#task_time", {
                                    enableTime: true,
                                    noCalendar: true,
                                    dateFormat: "H:i",
                                    time_24hr: true,
                                    defaultDate: task_time,
                                    locale: 'fa'
                                });
                                flatpickr(document.getElementById('due_date'), {
                                    dateFormat: 'Y-m-d',
                                    defaultDate: due_date,
                                    locale: 'fa',
                                });
     
                            });
                        this.params = {
                            id: obj.id ? obj.id : null,
                            title: obj.title ? obj.title : null,
                            due_date: due_date,
                            task_time: task_time,
                            data: obj.title ? obj.extendedProps.data : null,
                            type: obj.classNames ? obj.classNames[0] : 'primary',
                            description: obj.extendedProps ? obj.extendedProps.description : '',
                        };
                        console.log("this.paramsthis.params: ", this.params);
                        // console.log("this.paramsthis.objobjobjobj: ", obj);
                        this.minStartDate = new Date();
                        this.minEndDate = this.dateFormat(obj.start);

                        if(obj.id){
                          this.isAddEventModalShow = true;
                          return;
                        }

                    } else {
                        this.minStartDate = new Date();
                        this.minEndDate = new Date();
                    }

                    this.isAddEventModal = true;

                },

                editDate(data) {
                    let obj = {
                        event: {
                            start: data.start,
                            end: data.end
                        },
                    };
                    this.editEvent(obj);
                },

                dateFormat(dt) {
                    dt = new Date(dt);
                    const month = dt.getMonth() + 1 < 10 ? '0' + (dt.getMonth() + 1) : dt.getMonth() +
                    1;
                    const date = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
                    const hours = dt.getHours() < 10 ? '0' + dt.getHours() : dt.getHours();
                    const mins = dt.getMinutes() < 10 ? '0' + dt.getMinutes() : dt.getMinutes();
                    dt = dt.getFullYear() + '-' + month + '-' + date + 'T' + hours + ':' + mins;
                    return dt;
                },

                saveEvent() {
                    if (!this.params.title) {
                        return true;
                    }
                    if (!this.params.start) {
                        return true;
                    }
                    if (!this.params.end) {
                        return true;
                    }

                    if (this.params.id) {
                        //update event
                        let event = this.events.find((d) => d.id == this.params.id);
                        event.title = this.params.title;
                        event.start = this.params.start;
                        event.end = this.params.end;
                        event.description = this.params.description;
                        event.className = this.params.type;
                    } else {
                        //add event
                        let maxEventId = 0;
                        if (this.events) {
                            maxEventId = this.events.reduce(
                                (max, character) => (character.id > max ? character.id : max),
                                this.events[0].id
                            );
                        }

                        let event = {
                            id: maxEventId + 1,
                            title: this.params.title,
                            start: this.params.start,
                            end: this.params.end,
                            description: this.params.description,
                            className: this.params.type,
                        };
                        this.events.push(event);
                    }
                    this.calendar.getEventSources()[0].refetch()
                    this.showMessage('Event has been saved successfully.');
                    this.isAddEventModal = false;
                },

                startDateChange(event) {
                    const dateStr = event.target.value;
                    if (dateStr) {
                        this.minEndDate = this.dateFormat(dateStr);
                        this.params.end = '';
                    }
                },

                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px',
                    });
                }
            }));
        });
    </script>

</x-layout.default>
