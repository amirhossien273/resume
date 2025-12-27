<x-layout.default>

    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <div class="pt-5 grid grid-cols-12 lg:grid-cols-12">

        <div class="panel">
            <h3 class="text-lg font-bold mb-5">افزودن مشتری جدید</h3>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div
                        class="flex items-center p-3.5 rounded text-danger bg-danger-light dark:bg-danger-dark-light mb-3">
                        <span class="ltr:pr-2 rtl:pl-2">{{ $error }}</span>
                    </div>
                @endforeach
            @endif
            <form action="{{ route('customer.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- نوع و وضعیت مشتری -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block mb-1 font-medium"> </label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="radio" name="type" class="form-radio" value="person" required  {{ old('type') == 'person' ? 'checked' : '' }}/>
                                <span class="mr-2">حقیقی</span>
                            </label>

                            <label class="inline-flex items-center cursor-pointer">
                                <input type="radio" name="type" class="form-radio" value="company" required  {{ old('type') == 'company' ? 'checked' : '' }}/>
                                <span class="mr-2">حقوقی</span>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- نام شرکت و تلفن -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 hidden" id="company_info">
                    <div class="grid grid-cols-12 gap-2 items-center">
                        <label for="company" class="col-span-4 text-right">نام شرکت</label>
                        <input name="company" id="company" type="text" class="form-input col-span-8" value="{{ old('company') }}" required/>
                    </div>
                    <div class="grid grid-cols-12 gap-2 items-center">
                        <label for="phone" class="col-span-4 text-right">تلفن شرکت</label>
                        <input name="company_phone" id="phone" type="text"  value="{{ old('company_phone') }}" class="form-input col-span-8"/>
                    </div>


                </div>
                <!-- نام و نام خانوادگی -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="grid grid-cols-12 gap-2 items-center">
                        <label for="firstname" class="col-span-4 text-right">نام</label>
                        <input name="firstname" id="firstname" type="text" class="form-input col-span-8" value="{{ old('firstname') }}" required />
                    </div>

                    <div class="grid grid-cols-12 gap-2 items-center">
                        <label for="lastname" class="col-span-4 text-right">نام خانوادگی</label>
                        <input name="lastname" id="lastname" type="text" class="form-input col-span-8" value="{{ old('lastname') }}" required />
                    </div>
                </div>

                <!-- موبایل و کدملی -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="grid grid-cols-12 gap-2 items-center">
                        <label for="mobile" class="col-span-4 text-right">شماره موبایل</label>
                        <input name="mobile" id="mobile" type="text" class="form-input col-span-8" value="{{ old('mobile') }}" required />
                    </div>

                    <div class="grid grid-cols-12 gap-2 items-center">
                        <label for="national_code" class="col-span-4 text-right">کدملی</label>
                        <input name="national_code" id="national_code" type="text" class="form-input col-span-8" value="{{ old('national_code') }}"/>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="grid grid-cols-12 gap-2 items-center">
                        <label for="customer_type" class="col-span-4 text-right">نوع مشتری</label>
                        <select name="customer_type" id="customer_type" class="selectize col-span-8" required>
                           <option value="consumer" {{ old('customer_type') == 'consumer' ? 'selected' : '' }}>مصرف کننده</option>
                           <option value="coworker" {{ old('customer_type') == 'coworker' ? 'selected' : '' }}>همکار</option>
                           <option value="agent" {{ old('customer_type') == 'agent' ? 'selected' : '' }}>پخش کننده یا نماینده</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-12 gap-2 items-center">
                        <label for="business_id" class="col-span-4 text-right">صنف</label>
                        <select name="business_id" id="business_id" class="selectize col-span-8" required>
                            @foreach($businesses as $business)
                                <option value="{{ $business->id }}" {{ old('business_id') == $business->id ? 'selected' : '' }}>{{ $business->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- ایمیل و صنف  -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="grid grid-cols-12 gap-2 items-center">
                        <label for="email" class="col-span-4 text-right">ایمیل</label>
                        <input name="email" id="email" type="email" class="form-input col-span-8" value="{{ old('email') }}"/>
                    </div>
                    <div class="grid grid-cols-12 gap-2 items-center">
                        <label for="postal_code" class="col-span-4 text-right">کدپستی</label>
                        <input name="postal_code" id="postal_code" type="text" class="form-input col-span-8" value="{{ old('postal_code') }}"/>
                    </div>
                </div>

                <!-- استان و شهر -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="grid grid-cols-12 gap-2 items-center">
                        <label for="province" class="col-span-4 text-right">استان</label>
                        <select name="province_id" id="province" class="selectize col-span-8" required>
                            @foreach($provinces as $province)
                                <option value="{{ $province->id }}"
                                    {{ old('province_id') == $province->id ? 'selected' : '' }}>
                                    {{ $province->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-12 gap-2 items-center">
                        <label for="city" class="col-span-4 text-right">شهر</label>
                        <select name="city_id" id="city" class="selectize col-span-8" required>
                        </select>
                    </div>
                </div>

                <!-- آدرس -->
                <div class="grid grid-cols-12 gap-2 items-center">
                    <label for="address" class="col-span-2 text-right">آدرس</label>
                    <textarea name="address" id="address" minlength="20" rows="3" class="form-textarea col-span-10"
                              required>{{ old('address') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-6">ثبت مشتری</button>
            </form>
        </div>

    </div>
    <script src="/assets/js/nice-select2.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(e) {
            //company info
            const typeRadios = document.querySelectorAll('input[name="type"]');
            const companyInfo = document.getElementById('company_info');
            const companyInputs = companyInfo.querySelectorAll('input');

            function toggleCompanySection() {
                const selected = document.querySelector('input[name="type"]:checked')?.value;

                if (selected === 'company') {
                    companyInfo.classList.remove('hidden', 'opacity-0');

                    // انیمیشن واقعی از بالا به پایین + Fade
                    companyInfo.animate([
                        { transform: "translateY(-30px)", opacity: 0 }, // شروع بالا
                        { transform: "translateY(0)", opacity: 1 }      // پایان جای اصلی
                    ], {
                        duration: 1000,      // مدت زمان 0.5 ثانیه
                        easing: "ease-out",
                        fill: "forwards"    // بعد از انیمیشن المان در جای خود باقی بماند
                    });

                    companyInputs.forEach(i => i.disabled = false);
                } else {

                    const animation = companyInfo.animate([
                        { transform: "translateY(0)", opacity: 1 },
                        { transform: "translateY(-30px)", opacity: 0 }
                    ], {
                        duration: 500,
                        easing: "ease-in",
                        fill: "forwards"
                    });

                    animation.onfinish = () => {
                        companyInfo.classList.add('hidden'); // بعد از fade کامل، مخفی شود
                    };
                    companyInputs.forEach(i => i.disabled = true);
                }
            }

            toggleCompanySection();

            typeRadios.forEach(radio => {
                radio.addEventListener('change', toggleCompanySection);
            });

            // default select

                var els = document.querySelectorAll('.selectize');
                els.forEach(function(select) {
                    NiceSelect.bind(select, {
                        placeholder: "انتخاب کنید",
                        searchable: true
                    });
                });

            const oldCity = "{{ old('city_id', '') }}";
            const oldProvince = "{{ old('province_id', '') }}";
            if(oldProvince){
                loadCities(oldProvince, oldCity);
            }

        });

        // ==== بارگذاری شهرها در حالت ادیت ====
        let provinceSelect = document.getElementById("province");
        let citySelect = document.getElementById("city");

        function loadCities(provinceId, preselected) {

            fetch('/cities/' + provinceId)
                .then(response => response.json())
                .then(data => {

                    // حذف nice-select قبلی
                    if (
                        citySelect.nextElementSibling &&
                        citySelect.nextElementSibling.classList.contains('nice-select')
                    ) {
                        citySelect.nextElementSibling.remove();
                    }

                    // پاک کردن لیست
                    citySelect.innerHTML = '';

                    // افزودن گزینه‌ها
                    data.forEach(city => {
                        let option = document.createElement('option');
                        option.value = city.id;
                        option.textContent = city.name;

                        if (preselected && parseInt(preselected) === city.id) {
                            option.setAttribute('selected', 'selected');
                        }

                        citySelect.appendChild(option);
                    });

                    // Bind مجدد
                    NiceSelect.bind(citySelect, {
                        placeholder: "انتخاب کنید",
                        searchable: true
                    });


                });
        }

        // ==== 2. بارگذاری شهرها هنگام تغییر استان ====
        provinceSelect.addEventListener("change", function () {
            loadCities(this.value);
        });


    </script>
</x-layout.default>
