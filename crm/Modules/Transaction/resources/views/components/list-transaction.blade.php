<div x-data="tasks">
    <div class="box-edit">
    <button @click="addTasksModal = true" class="text-success border border-success rounded p-2 hover:bg-green-50" x-tooltip="فعالیت جدید">
        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
    </button>
    </div>
    @foreach($transaction->tasks as $key => $task)
    <div style="position: relative;" class="box-tasks p-5 mt-6">
        <div  class="">
            <div class="box-edit">
                <button  @click="$refs.modal_{{ $task->id }}.classList.remove('hidden')" class="text-success " x-tooltip="ویرایش فعالیت">
                    <svg style="width: 20px;height: 20px;" viewBox="0 0 24 24" fill="none" class="w-4.5 h-4.5">
                        <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"/>
                        <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5"/>
                    </svg>
                </button>
                <button @click="$refs.delete_modal_{{ $task->id }}.classList.remove('hidden')" class="text-danger " x-tooltip="حذف فعالیت">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M11.5956 22.0001H12.4044C15.1871 22.0001 16.5785 22.0001 17.4831 21.1142C18.3878 20.2283 18.4803 18.7751 18.6654 15.8686L18.9321 11.6807C19.0326 10.1037 19.0828 9.31524 18.6289 8.81558C18.1751 8.31592 17.4087 8.31592 15.876 8.31592H8.12405C6.59127 8.31592 5.82488 8.31592 5.37105 8.81558C4.91722 9.31524 4.96744 10.1037 5.06788 11.6807L5.33459 15.8686C5.5197 18.7751 5.61225 20.2283 6.51689 21.1142C7.42153 22.0001 8.81289 22.0001 11.5956 22.0001Z" fill="currentColor"></path>
                        <path d="M3 6.38597C3 5.90152 3.34538 5.50879 3.77143 5.50879L6.43567 5.50832C6.96502 5.49306 7.43202 5.11033 7.61214 4.54412C7.61688 4.52923 7.62232 4.51087 7.64185 4.44424L7.75665 4.05256C7.8269 3.81241 7.8881 3.60318 7.97375 3.41617C8.31209 2.67736 8.93808 2.16432 9.66147 2.03297C9.84457 1.99972 10.0385 1.99986 10.2611 2.00002H13.7391C13.9617 1.99986 14.1556 1.99972 14.3387 2.03297C15.0621 2.16432 15.6881 2.67736 16.0264 3.41617C16.1121 3.60318 16.1733 3.81241 16.2435 4.05256L16.3583 4.44424C16.3778 4.51087 16.3833 4.52923 16.388 4.54412C16.5682 5.11033 17.1278 5.49353 17.6571 5.50879H20.2286C20.6546 5.50879 21 5.90152 21 6.38597C21 6.87043 20.6546 7.26316 20.2286 7.26316H3.77143C3.34538 7.26316 3 6.87043 3 6.38597Z" fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.42543 11.4815C9.83759 11.4381 10.2051 11.7547 10.2463 12.1885L10.7463 17.4517C10.7875 17.8855 10.4868 18.2724 10.0747 18.3158C9.66253 18.3592 9.29499 18.0426 9.25378 17.6088L8.75378 12.3456C8.71256 11.9118 9.01327 11.5249 9.42543 11.4815Z" fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5747 11.4815C14.9868 11.5249 15.2875 11.9118 15.2463 12.3456L14.7463 17.6088C14.7051 18.0426 14.3376 18.3592 13.9254 18.3158C13.5133 18.2724 13.2126 17.8855 13.2538 17.4517L13.7538 12.1885C13.795 11.7547 14.1625 11.4381 14.5747 11.4815Z" fill="currentColor"></path>
                    </svg>
                </button>
            </div>
            <div class="flex items-center gap-2">
                <h3 class="font-bold font-nunito">{{$task->title->title}}</h3>
                <span style="font-size: 12px;" class="px-3 py-1 rounded {{$task->status_color}}">{{$task->status->label()}}</span>
            </div>
            <div class="flex gap-4 text-xs mt-3">
                <div class="flex items-center gap-1">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.75 2.5C7.75 2.08579 7.41421 1.75 7 1.75C6.58579 1.75 6.25 2.08579 6.25 2.5V4.07926C4.81067 4.19451 3.86577 4.47737 3.17157 5.17157C2.47737 5.86577 2.19451 6.81067 2.07926 8.25H21.9207C21.8055 6.81067 21.5226 5.86577 20.8284 5.17157C20.1342 4.47737 19.1893 4.19451 17.75 4.07926V2.5C17.75 2.08579 17.4142 1.75 17 1.75C16.5858 1.75 16.25 2.08579 16.25 2.5V4.0129C15.5847 4 14.839 4 14 4H10C9.16097 4 8.41527 4 7.75 4.0129V2.5Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 11.161 22 10.4153 21.9871 9.75H2.0129C2 10.4153 2 11.161 2 12V14C2 17.7712 2 19.6569 3.17157 20.8284C4.34315 22 6.22876 22 10 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14V12ZM14 12.25C13.0335 12.25 12.25 13.0335 12.25 14V16C12.25 16.9665 13.0335 17.75 14 17.75C14.9665 17.75 15.75 16.9665 15.75 16V14C15.75 13.0335 14.9665 12.25 14 12.25ZM14 13.75C13.8619 13.75 13.75 13.8619 13.75 14V16C13.75 16.1381 13.8619 16.25 14 16.25C14.1381 16.25 14.25 16.1381 14.25 16V14C14.25 13.8619 14.1381 13.75 14 13.75ZM10.787 12.3071C11.0673 12.4232 11.25 12.6967 11.25 13V17C11.25 17.4142 10.9142 17.75 10.5 17.75C10.0858 17.75 9.75 17.4142 9.75 17V14.8107L9.53033 15.0303C9.23744 15.3232 8.76256 15.3232 8.46967 15.0303C8.17678 14.7374 8.17678 14.2626 8.46967 13.9697L9.96967 12.4697C10.1842 12.2552 10.5068 12.191 10.787 12.3071Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <span>{{ $task->due_date }}</span>
                </div>
                <div class="flex items-center gap-1">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.7915 2H11.2089C9.67059 2 8.90146 2 8.35306 2.43992C7.80465 2.87983 7.6378 3.63065 7.30411 5.13228L7.23936 5.42365C8.21852 5 9.59408 5 12.0001 5C14.4062 5 15.7818 5 16.761 5.42373L16.6962 5.13228C16.3625 3.63065 16.1957 2.87983 15.6473 2.43992C15.0989 2 14.3297 2 12.7915 2Z" fill="currentColor"></path>
                            <path d="M7.23926 18.5763C8.21842 19 9.594 19 12.0001 19C14.4062 19 15.7817 19 16.7609 18.5763L16.6961 18.8677C16.3624 20.3693 16.1956 21.1202 15.6472 21.5601C15.0988 22 14.3297 22 12.7914 22H11.2088C9.6705 22 8.90137 22 8.35297 21.5601C7.80456 21.1202 7.63771 20.3693 7.30401 18.8677L7.23926 18.5763Z" fill="currentColor"></path>
                            <path opacity="0.5" d="M6.77772 18.3259C7.78661 19 9.19108 19 12 19C14.8089 19 16.2134 19 17.2223 18.3259C17.659 18.034 18.034 17.659 18.3259 17.2223C19 16.2134 19 14.8089 19 12C19 9.19108 19 7.78661 18.3259 6.77772C18.034 6.34096 17.659 5.96596 17.2223 5.67412C16.2134 5 14.8089 5 12 5C9.19108 5 7.78661 5 6.77772 5.67412C6.34096 5.96596 5.96596 6.34096 5.67412 6.77772C5 7.78661 5 9.19108 5 12C5 14.8089 5 16.2134 5.67412 17.2223C5.96596 17.659 6.34096 18.034 6.77772 18.3259Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 8.25C12.4142 8.25 12.75 8.58579 12.75 9V11.7576L14.5198 13.4594C14.8184 13.7465 14.8277 14.2213 14.5406 14.5198C14.2535 14.8184 13.7787 14.8277 13.4802 14.5406L11.4802 12.6175C11.3331 12.4761 11.25 12.2809 11.25 12.0769V9C11.25 8.58579 11.5858 8.25 12 8.25Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <span>{{ $task->task_time }}</span>
                </div>
            </div>
            <div class="mt-3">
                <span>توضیحات:</span>
                <p class="mt-3  text-gray-500 dark:text-gray-300 text-sm leading-relaxed">{{ $task->description }}</p>
            </div>
        </div>
    </div>

    <!-- =================== Edit Task Modal =================== -->
    <div x-ref="modal_{{ $task->id }}" class="fixed inset-0 bg-black/60 z-[999] hidden">
        <div class="flex items-center justify-center min-h-screen px-4" @click.self="$refs.modal_{{ $task->id }}.classList.add('hidden')">

            <div class="panel bg-white rounded-lg max-w-5xl w-full relative">
                <button class="absolute top-4 right-4" @click="$refs.modal_{{ $task->id }}.classList.add('hidden')">
                    ✕
                </button>
                <h3 class="text-lg font-medium p-4 border-b">
                    ویرایش فعالیت: {{ $task->title->title }}
                </h3>
                <div class="p-5">
                    <x-task::edit-task :redirect="route('transaction.show', $transaction->id)" :task="$task"/>
                </div>
            </div>
        </div>
    </div>

    <!-- =================== Delete Task Modal =================== -->
    <div x-ref="delete_modal_{{ $task->id }}" class="fixed inset-0 bg-black/60 z-[999] hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4" @click.self="$refs.delete_modal_{{ $task->id }}.classList.add('hidden')">
            <div class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8" @click.stop >
                <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                    <h5 class="font-bold text-lg">⚠️ تأیید حذف</h5>
                    <button type="button" class="text-white-dark hover:text-dark" @click="$refs.delete_modal_{{ $task->id }}.classList.add('hidden')" > ✕</button>
                </div>
                <div class="p-5">
                    <p class="text-lg">
                        آیا مطمئن هستید که می‌خواهید تسک
                        <strong class="text-primary">
                            {{ $task->title->title }}
                        </strong>
                        را حذف کنید؟
                    </p>

                    <form
                        action="{{ route('tasks.destroy', $task->id) }}"
                        method="POST"
                        class="mt-8 flex justify-end gap-3"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="button"
                            class="btn btn-outline-dark"
                            @click="$refs.delete_modal_{{ $task->id }}.classList.add('hidden')"
                        >
                            لغو
                        </button>

                        <button
                            type="submit"
                            class="btn btn-danger"
                        >
                            حذف کن
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    <!-- =================== Add Task Modal =================== -->
    <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto hidden"
        :class="addTasksModal && '!block'">
        <div class="flex items-center justify-center min-h-screen px-4"
            @click.self="addTasksModal = false">
            <div x-show="addTasksModal"
                class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full max-w-3xl w-[90%] my-8">
                <button type="button"
                    class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark"
                    @click="addTasksModal = false">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
                <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]">ثبت فعالیت برای {{$transaction->name}}</h3>
                <div class="p-5">
                    <x-task::add-task :redirect="route('transaction.show', $transaction->id)" />
                </div>
            </div>
        </div>
    </div>

</div>



<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("tasks", () => ({
            addTasksModal: false,
        }));
    });
</script>