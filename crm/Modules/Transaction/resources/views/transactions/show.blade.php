<x-layout.default>

    <div x-data="showTransaction">

        <div class="mb-12 flex items-center rounded-b-md bg-[#DBE7FF] dark:bg-[#141F31]">
            <ul class="mx-auto flex items-center gap-5 overflow-auto whitespace-nowrap px-3 py-4.5 xl:gap-8">

                <!-- General -->
                <li
                    class="group flex min-w-[120px] cursor-pointer flex-col items-center justify-center gap-4 rounded-md px-8 py-2.5 text-center text-[#506690] duration-300 hover:bg-white hover:text-primary dark:hover:bg-[#1B2E4B]"
                    :class="{ 'bg-white text-primary dark:bg-[#1B2E4B]': activeTab === 'general' }"
                    @click="activeTab = 'general'">

                    <!-- SVG -->
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M16 4.00195C18.175 4.01406 19.3529 4.11051 20.1213 4.87889C21 5.75757 21 7.17179 21 10.0002V16.0002C21 18.8286 21 20.2429 20.1213 21.1215C19.2426 22.0002 17.8284 22.0002 15 22.0002H9C6.17157 22.0002 4.75736 22.0002 3.87868 21.1215C3 20.2429 3 18.8286 3 16.0002V10.0002C3 7.17179 3 5.75757 3.87868 4.87889C4.64706 4.11051 5.82497 4.01406 8 4.00195" stroke="currentColor" stroke-width="1.5"></path>
                        <path d="M8 14H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M7 10.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M9 17.5H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M8 3.5C8 2.67157 8.67157 2 9.5 2H14.5C15.3284 2 16 2.67157 16 3.5V4.5C16 5.32843 15.3284 6 14.5 6H9.5C8.67157 6 8 5.32843 8 4.5V3.5Z" stroke="currentColor" stroke-width="1.5"></path>
                    </svg>

                    <h5 class="font-bold text-black dark:text-white">فعالیت ها</h5>
                </li>

                <!-- Quick Support -->
                <li
                    class="group flex min-w-[120px] cursor-pointer flex-col items-center justify-center gap-4 rounded-md px-8 py-2.5 text-center text-[#506690]"
                    :class="{ 'bg-white text-primary dark:bg-[#1B2E4B]': activeTab === 'quick-support' }"
                    @click="activeTab = 'quick-support'">

                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.082 3.01787L20.1081 3.76741L20.082 3.01787ZM16.5 3.48757L16.2849 2.76907V2.76907L16.5 3.48757ZM13.6738 4.80287L13.2982 4.15375L13.2982 4.15375L13.6738 4.80287ZM3.9824 3.07501L3.93639 3.8236L3.9824 3.07501ZM7 3.48757L7.19136 2.76239V2.76239L7 3.48757ZM10.2823 4.87558L9.93167 5.5386L10.2823 4.87558ZM13.6276 20.0694L13.9804 20.7312L13.6276 20.0694ZM17 18.6335L16.8086 17.9083H16.8086L17 18.6335ZM19.9851 18.2229L20.032 18.9715L19.9851 18.2229ZM10.3724 20.0694L10.0196 20.7312H10.0196L10.3724 20.0694ZM7 18.6335L7.19136 17.9083H7.19136L7 18.6335ZM4.01486 18.2229L3.96804 18.9715H3.96804L4.01486 18.2229ZM2.75 16.1437V4.99792H1.25V16.1437H2.75ZM22.75 16.1437V4.93332H21.25V16.1437H22.75ZM20.0559 2.26832C18.9175 2.30798 17.4296 2.42639 16.2849 2.76907L16.7151 4.20606C17.6643 3.92191 18.9892 3.80639 20.1081 3.76741L20.0559 2.26832ZM16.2849 2.76907C15.2899 3.06696 14.1706 3.6488 13.2982 4.15375L14.0495 5.452C14.9 4.95981 15.8949 4.45161 16.7151 4.20606L16.2849 2.76907ZM3.93639 3.8236C4.90238 3.88297 5.99643 3.99842 6.80864 4.21274L7.19136 2.76239C6.23055 2.50885 5.01517 2.38707 4.02841 2.32642L3.93639 3.8236ZM6.80864 4.21274C7.77076 4.46663 8.95486 5.02208 9.93167 5.5386L10.6328 4.21257C9.63736 3.68618 8.32766 3.06224 7.19136 2.76239L6.80864 4.21274ZM13.9804 20.7312C14.9714 20.2029 16.1988 19.6206 17.1914 19.3587L16.8086 17.9083C15.6383 18.2171 14.2827 18.8702 13.2748 19.4075L13.9804 20.7312ZM17.1914 19.3587C17.9943 19.1468 19.0732 19.0314 20.032 18.9715L19.9383 17.4744C18.9582 17.5357 17.7591 17.6575 16.8086 17.9083L17.1914 19.3587ZM10.7252 19.4075C9.71727 18.8702 8.3617 18.2171 7.19136 17.9083L6.80864 19.3587C7.8012 19.6206 9.0286 20.2029 10.0196 20.7312L10.7252 19.4075ZM7.19136 17.9083C6.24092 17.6575 5.04176 17.5357 4.06168 17.4744L3.96804 18.9715C4.9268 19.0314 6.00566 19.1468 6.80864 19.3587L7.19136 17.9083ZM21.25 16.1437C21.25 16.8295 20.6817 17.4279 19.9383 17.4744L20.032 18.9715C21.5062 18.8793 22.75 17.6799 22.75 16.1437H21.25ZM22.75 4.93332C22.75 3.47001 21.5847 2.21507 20.0559 2.26832L20.1081 3.76741C20.7229 3.746 21.25 4.25173 21.25 4.93332H22.75ZM1.25 16.1437C1.25 17.6799 2.49378 18.8793 3.96804 18.9715L4.06168 17.4744C3.31831 17.4279 2.75 16.8295 2.75 16.1437H1.25ZM13.2748 19.4075C12.4825 19.8299 11.5175 19.8299 10.7252 19.4075L10.0196 20.7312C11.2529 21.3886 12.7471 21.3886 13.9804 20.7312L13.2748 19.4075ZM13.2982 4.15375C12.4801 4.62721 11.4617 4.65083 10.6328 4.21257L9.93167 5.5386C11.2239 6.22189 12.791 6.18037 14.0495 5.452L13.2982 4.15375ZM2.75 4.99792C2.75 4.30074 3.30243 3.78463 3.93639 3.8236L4.02841 2.32642C2.47017 2.23065 1.25 3.49877 1.25 4.99792H2.75Z" fill="currentColor"></path>
                        <path opacity="0.5" d="M12 5.854V20.9999" stroke="currentColor" stroke-width="1.5"></path>
                        <path opacity="0.5" d="M5 9L9 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path opacity="0.5" d="M5 13L9 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path opacity="0.5" d="M19 13L15 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M19 5.5V9.51029C19 9.78587 19 9.92366 18.9051 9.97935C18.8103 10.035 18.6806 9.97343 18.4211 9.85018L17.1789 9.26011C17.0911 9.21842 17.0472 9.19757 17 9.19757C16.9528 9.19757 16.9089 9.21842 16.8211 9.26011L15.5789 9.85018C15.3194 9.97343 15.1897 10.035 15.0949 9.97935C15 9.92366 15 9.78587 15 9.51029V6.95002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>

                    <h5 class="font-bold text-black dark:text-white">یادداشت ها</h5>
                </li>

                <!-- Free Updates -->
                <li
                    class="group flex min-w-[120px] cursor-pointer flex-col items-center justify-center gap-4 rounded-md px-8 py-2.5 text-center text-[#506690]"
                    :class="{ 'bg-white text-primary dark:bg-[#1B2E4B]': activeTab === 'free-updates' }"
                    @click="activeTab = 'free-updates'">

                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 14V11.7979C22 11.4227 21.9978 10.75 21.9978 10.75L22 10H2V10.75V14C2 17.7712 2 19.6569 3.17157 20.8284C4.34315 22 6.22876 22 10 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14Z" fill="currentColor"></path>
                        <path opacity="0.5" d="M11 4L10.4497 3.44975C10.1763 3.17633 10.0396 3.03961 9.89594 2.92051C9.27652 2.40704 8.51665 2.09229 7.71557 2.01738C7.52976 2 7.33642 2 6.94975 2C6.06722 2 5.62595 2 5.25839 2.06935C3.64031 2.37464 2.37464 3.64031 2.06935 5.25839C2 5.62595 2 6.06722 2 6.94975V9.25V10H22L21.9531 9.25C21.8809 8.20117 21.6973 7.51276 21.2305 6.99383C21.1598 6.91514 21.0849 6.84024 21.0062 6.76946C20.1506 6 18.8345 6 16.2021 6H15.8284C14.6747 6 14.0979 6 13.5604 5.84678C13.2651 5.7626 12.9804 5.64471 12.7121 5.49543C12.2237 5.22367 11.8158 4.81578 11 4Z" fill="currentColor"></path>
                    </svg>

                    <h5 class="font-bold text-black dark:text-white">پیوست ها</h5>
                </li>

                <!-- Pricing -->
                <li
                    class="group flex min-w-[120px] cursor-pointer flex-col items-center justify-center gap-4 rounded-md px-8 py-2.5 text-center text-[#506690]"
                    :class="{ 'bg-white text-primary dark:bg-[#1B2E4B]': activeTab === 'pricing' }"
                    @click="activeTab = 'pricing'">

                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 12C3 15.7712 3 19.6569 4.31802 20.8284C5.63604 22 7.75736 22 12 22C16.2426 22 18.364 22 19.682 20.8284C21 19.6569 21 15.7712 21 12" stroke="currentColor" stroke-width="1.5"></path>
                        <path d="M14.6603 14.2019L20.6676 12.3997C21.2631 12.2211 21.5609 12.1317 21.7498 11.9176C21.7866 11.8759 21.8199 11.8312 21.8492 11.784C22 11.5415 22 11.2307 22 10.6089C22 8.15877 22 6.9337 21.327 6.10659C21.1977 5.94763 21.0524 5.80233 20.8934 5.67298C20.0663 5 18.8412 5 16.3911 5H7.60893C5.15877 5 3.9337 5 3.10659 5.67298C2.94763 5.80233 2.80233 5.94763 2.67298 6.10659C2 6.9337 2 8.15877 2 10.6089C2 11.2307 2 11.5415 2.15078 11.784C2.18015 11.8312 2.21341 11.8759 2.25021 11.9176C2.43915 12.1317 2.7369 12.2211 3.3324 12.3997L9.33968 14.2019" stroke="currentColor" stroke-width="1.5"></path>
                        <path d="M6.5 5C7.32344 4.97913 8.15925 4.45491 8.43944 3.68032C8.44806 3.65649 8.4569 3.62999 8.47457 3.57697L8.50023 3.5C8.54241 3.37344 8.56351 3.31014 8.58608 3.254C8.87427 2.53712 9.54961 2.05037 10.3208 2.00366C10.3812 2 10.4479 2 10.5814 2H13.4191C13.5525 2 13.6192 2 13.6796 2.00366C14.4508 2.05037 15.1262 2.53712 15.4144 3.254C15.4369 3.31014 15.458 3.37343 15.5002 3.5L15.5259 3.57697C15.5435 3.62968 15.5524 3.65656 15.561 3.68032C15.8412 4.45491 16.6766 4.97913 17.5 5" stroke="currentColor" stroke-width="1.5"></path>
                        <path d="M14 12.5H10C9.72386 12.5 9.5 12.7239 9.5 13V15.1615C9.5 15.3659 9.62448 15.5498 9.8143 15.6257L10.5144 15.9058C11.4681 16.2872 12.5319 16.2872 13.4856 15.9058L14.1857 15.6257C14.3755 15.5498 14.5 15.3659 14.5 15.1615V13C14.5 12.7239 14.2761 12.5 14 12.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>

                    <h5 class="font-bold text-black dark:text-white">تیکت ها</h5>
                </li>

                <!-- Hosting -->
                <li
                    class="group flex min-w-[120px] cursor-pointer flex-col items-center justify-center gap-4 rounded-md px-8 py-2.5 text-center text-[#506690]"
                    :class="{ 'bg-white text-primary dark:bg-[#1B2E4B]': activeTab === 'hosting' }"
                    @click="activeTab = 'hosting'">

                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 7L14.6203 14.3347C13.6227 15.3263 13.1238 15.822 12.5051 15.822C11.8864 15.8219 11.3876 15.326 10.3902 14.3342L10.1509 14.0962C9.15254 13.1035 8.65338 12.6071 8.03422 12.6074C7.41506 12.6076 6.91626 13.1043 5.91867 14.0977L2 18M22 7V12.5458M22 7H16.4179" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>

                    <h5 class="font-bold text-black dark:text-white">کاریز معامله</h5>
                </li>

            </ul>
        </div>
        @if($invite)
            <div class="invite-alert mb-10" id="invite-alert-{{ $invite->id }}">
                <div class="flex items-center gap-3 p-3.5 rounded
            text-danger bg-danger-light dark:bg-danger-dark-light">

                    <!-- Close -->
                    <button type="button"
                            class="hover:opacity-80 text-danger"
                            onclick="this.closest('.invite-alert').remove()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                             viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.5"
                             stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>

                    <!-- Message -->
                    <span class="flex-1 text-sm">
                <strong class="ltr:mr-1 rtl:ml-1">دعوت به همکاری!</strong>
                شما برای این معامله با <b>{{ $invite->share_value }}٪</b> سهم دعوت شده‌اید.
            </span>

                    <!-- Actions -->
                    <div class="flex gap-2 ltr:ml-auto rtl:mr-auto">
                        <form class="invite-action-form" method="POST"
                              action="{{ route('responsibles.reject', $invite) }}">
                            @csrf
                            <button type="submit"
                                    class="px-4 py-2 rounded-md
                                   bg-danger text-white
                                   hover:bg-danger-dark transition">
                                رد
                            </button>
                        </form>

                        <form class="invite-action-form" method="POST"
                              action="{{ route('responsibles.accept', $invite) }}">
                            @csrf
                            <button type="submit"
                                    class="px-4 py-2 rounded-md
                                   bg-success text-white
                                   hover:bg-success-dark transition">
                                تایید
                            </button>
                        </form>
                    </div>

                </div>
            </div>

            <script>
                (function () {
                    const alertEl = document.getElementById('invite-alert-{{ $invite->id }}');
                    if (!alertEl) return;

                    const forms = alertEl.querySelectorAll('.invite-action-form');

                    forms.forEach((form) => {
                        form.addEventListener('submit', async (e) => {
                            e.preventDefault();

                            const btn = form.querySelector('button[type="submit"]');
                            const oldText = btn?.innerText;
                            if (btn) {
                                btn.disabled = true;
                                btn.style.opacity = '0.7';
                                btn.style.cursor = 'not-allowed';
                                btn.innerText = '...';
                            }

                            try {
                                const res = await fetch(form.action, {
                                    method: 'POST',
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest',
                                        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                                        'Accept': 'application/json',
                                    },
                                });

                                if (!res.ok) throw new Error('Request failed');

                                const data = await res.json();
                                if (data && data.success) {
                                    // حذف alert بعد موفقیت
                                    alertEl.remove();

                                    // اگر میخوای همون لحظه UI هم آپدیت بشه:
                                    // location.reload();
                                } else {
                                    throw new Error('Invalid response');
                                }
                            } catch (err) {
                                // اگر دوست داشتی پیام خطا هم بذار
                                if (btn) {
                                    btn.disabled = false;
                                    btn.style.opacity = '';
                                    btn.style.cursor = '';
                                    btn.innerText = oldText;
                                }
                                console.error(err);
                                alert('خطا در ثبت پاسخ. دوباره تلاش کنید.');
                            }
                        });
                    });
                })();
            </script>
        @endif

        <!-- Content -->
        <div class="flex xl:flex-row flex-col gap-2.5">
            <div class="flex w-full gap-4">
                <div class="panel w-1/3 xl:mt-0 mt-6 p-4 rounded  ">
                    <x-transaction::details-transaction :transaction="$transaction"/>
                </div>
                <div class="panel w-2/3  xl:mt-0  mt-6 p-4 rounded">
                    <div x-show="activeTab === 'general'">
                        <h3 class="font-bold mb-4 font-nunito">فعالیت ها <span class="font-iransans" style="font-size: 11px;">(نمایش فعالیت ها در <a href="#"  @click.prevent="window.open('{{ route('calendar.view') }}', 'calendarWindow', 'width=800,height=600,top=100,left=100,scrollbars=yes,resizable=yes')" class="text-primary underline">تقویم</a>)</span></h3>
                        <x-transaction::list-transaction :transaction="$transaction"/>
                    </div>
                    <div x-show="activeTab === 'quick-support'">
                        <h3 class="font-bold mb-4 font-nunito ">یادداشت ها</h3>
                    </div>
                    <div x-show="activeTab === 'free-updates'">
                        <h3 class="font-bold mb-4 font-nunito">پیوست ها</h3>
                    </div>
                    <div x-show="activeTab === 'pricing'">
                        <h3 class="font-bold mb-4 font-nunito">تیکت ها</h3>
                    </div>
                    <div x-show="activeTab === 'hosting'">
                        <h3 class="font-bold mb-4 font-nunito">کاریز معامله <span class="font-iransans" style="font-size: 11px;">(<a href="#"  @click.prevent="window.open('{{ route('transaction.flow') }}', 'calendarWindow', 'width=800,height=600,top=100,left=100,scrollbars=yes,resizable=yes')" class="text-primary underline">نمایش کاریز معامله</a>)</span></h3>
                        <x-transaction::flow-histories :transaction="$transaction"/>
                </div>
            </div>
        <div>

        <!-- =================== Edit Transaction Modal =================== -->
        <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto hidden"
            :class="isAddTransactionEditModal && '!block'">
            <div class="flex items-center justify-center min-h-screen px-4"
                @click.self="isAddTransactionEditModal = false">
                <div x-show="isAddTransactionEditModal"
                    class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full max-w-lg w-[90%] my-8">
                    <button type="button"
                        class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark"
                        @click="isAddTransactionEditModal = false">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]">ویرایش {{$transaction->name}}</h3>
                    <div class="p-5">
                        <x-transaction::edit-transaction :redirect="route('transaction.show', $transaction->id)" :transaction="$transaction" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =================== Edit Customer Modal =================== -->
    <div class="fixed inset-0 bg-[black]/60 z-[999] overflow-y-auto hidden"
        :class="isCustomerEditModal && '!block'">
        <div class="flex items-center justify-center min-h-screen px-4"
            @click.self="isCustomerEditModal = false">
            <div x-show="isCustomerEditModal"
                class="panel border-0 p-0 rounded-lg overflow-hidden md:w-full max-w-5xl w-[90%] my-8">
                <button type="button"
                    class="absolute top-4 ltr:right-4 rtl:left-4 text-white-dark hover:text-dark"
                    @click="isCustomerEditModal = false">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
                <h3 class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]">ویرایش {{$transaction->name}}</h3>
                <div class="p-5">
                   <x-customer::edit-customer :redirect="route('transaction.show', $transaction->id)" :customer="$transaction->customer" />
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>

    <style>
        .box-edit{
            position: absolute;
            left: 10px;
            top:10px
        }
        .p-5 .box .flex .flex .flex .customer{
            display: none;
        }
        .p-5 .box .flex .flex .flex .panel{
            width: 100%;
        }
        .box-tasks{
            background: #c3c5c93d;
            border-radius: 7px;
        }
    </style>

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
            Alpine.data("showTransaction", () => ({
                activeTab: 'general',
                isAddTransactionEditModal: false,
                isCustomerEditModal: false,
            }));
        });

    </script>
        <script>
            function handleInvite(url) {
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            const alert = document.getElementById('invite-alert');
                            if (alert) {
                                alert.classList.add('opacity-0');
                                setTimeout(() => alert.remove(), 300);
                            }
                        }
                    })
                    .catch(err => console.error(err));
            }
        </script>

</x-layout.default>
