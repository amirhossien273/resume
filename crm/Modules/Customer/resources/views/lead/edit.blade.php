<x-layout.default>
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <div class="pt-5 grid grid-cols-12 lg:grid-cols-12">
        <div class="panel">
            <div class="mb-5">
                <h3 class="text-lg font-bold mb-5">ویرایش لید </h3>
                <form action="{{ route('lead.update', $lead->id) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <!-- نوع و وضعیت مشتری -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block mb-1 font-medium"> </label>
                            <div class="flex gap-4">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="type" class="form-radio"
                                           value="person"
                                        {{ old('type', $lead->type) === 'person' ? 'checked' : '' }}>
                                    <span class="mr-2">حقیقی</span>
                                </label>

                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="type" class="form-radio"
                                           value="company"
                                        {{ old('type', $lead->type) === 'company' ? 'checked' : '' }}>
                                    <span class="mr-2">حقوقی</span>
                                </label>
                            </div>
                            @error('type')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <!-- نام شرکت و تلفن -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 hidden" id="company_info">
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <label for="company" class="col-span-4 text-right">نام شرکت</label>
                            <input name="company" id="company" type="text"
                                   class="form-input col-span-8"
                                   value="{{ old('company', $lead->company) }}" required/>
                            @error('company')
                            <span class="text-danger text-sm col-span-12">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <label for="phone" class="col-span-4 text-right">تلفن شرکت</label>
                            <input name="company_phone" id="phone" type="text" class="form-input col-span-8"
                                   value="{{ old('company', $lead->company_phone) }}"
                                    />
                            @error('company_phone')
                            <span class="text-danger text-sm col-span-12">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- نام و نام خانوادگی -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <label for="firstname" class="col-span-4 text-right">نام</label>
                            <input name="firstname" id="firstname" type="text"
                                   class="form-input col-span-8"
                                   value="{{ old('firstname', $lead->firstname) }}" required />
                            @error('firstname')
                            <span class="text-danger text-sm col-span-12">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-12 gap-2 items-center">
                            <label for="lastname" class="col-span-4 text-right">نام خانوادگی</label>
                            <input name="lastname" id="lastname" type="text"
                                   class="form-input col-span-8"
                                   value="{{ old('lastname', $lead->lastname) }}" required />
                            @error('lastname')
                            <span class="text-danger text-sm col-span-12">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- موبایل و کدملی -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <label for="mobile" class="col-span-4 text-right">موبایل</label>
                            <input name="mobile" id="mobile" type="text"
                                   class="form-input col-span-8"
                                   value="{{ old('mobile', $lead->mobile) }}" required />
                            @error('mobile')
                            <span class="text-danger text-sm col-span-12">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-12 gap-2 items-center">
                            <label for="national_code" class="col-span-4 text-right">کدملی</label>
                            <input name="national_code" id="national_code" type="text"
                                   class="form-input col-span-8"
                                   value="{{ old('national_code', $lead->national_code) }}" />
                            @error('national_code')
                            <span class="text-danger text-sm col-span-12">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- ایمیل و صنف -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <label for="business" class="col-span-4 text-right">صنف</label>
                            <select name="business_id" id="business_id"
                                    class="selectize col-span-8">
                                @foreach($businesses as $business)
                                    <option value="{{ $business->id }}"
                                        {{ old('business_id', $lead->business_id) == $business->id ? 'selected' : '' }}>
                                        {{ $business->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('business_id')
                            <span class="text-danger text-sm col-span-12">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <label for="email" class="col-span-4 text-right">ایمیل</label>
                            <input name="email" id="email" type="email"
                                   class="form-input col-span-8"
                                   value="{{ old('email', $lead->email) }}" />
                            @error('email')
                            <span class="text-danger text-sm col-span-12">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- استان و شهر -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="grid grid-cols-12 gap-2 items-center">
                            <label for="province" class="col-span-4 text-right">استان</label>
                            <select name="province_id" id="province"
                                    class="selectize col-span-8">
                                <option value="">انتخاب کنید</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}"
                                        {{ old('province_id', $lead->province_id) == $province->id ? 'selected' : '' }}>
                                        {{ $province->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('province_id')
                            <span class="text-danger text-sm col-span-12">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-12 gap-2 items-center">
                            <label for="city" class="col-span-4 text-right">شهر</label>
                            <select name="city_id" id="city"
                                    class="selectize col-span-8">
                                <option value="">انتخاب کنید</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ old('city_id', $lead->city_id) == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('city_id')
                            <span class="text-danger text-sm col-span-12">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- آدرس -->
                    <div class="grid grid-cols-12 gap-2 items-center">
                        <label for="address" class="col-span-2 text-right">آدرس</label>
                        <textarea name="address" id="address" minlength="20" rows="3" class="form-textarea col-span-10"
                                  required>{{ old('address', $lead->address) }}</textarea>
                        @error('address')
                        <span class="text-danger text-sm col-span-12">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-6">بروزرسانی</button>
                </form>
            </div>
        </div>
    </div>

    <script src="/assets/js/nice-select2.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                        { transform: 'translateY(-30px)', opacity: 0 },
                        { transform: 'translateY(0)', opacity: 1 }
                    ], {
                        duration: 500,
                        easing: 'ease-out',
                        fill: 'forwards'
                    });

                    companyInputs.forEach(i => i.disabled = false);

                } else {
                    const animation = companyInfo.animate([
                        { transform: 'translateY(0)', opacity: 1 },
                        { transform: 'translateY(-30px)', opacity: 0 }
                    ], {
                        duration: 300,
                        easing: 'ease-in',
                        fill: 'forwards'
                    });

                    animation.onfinish = () => {
                        companyInfo.classList.add('hidden');
                    };
                    companyInputs.forEach(i => i.disabled = true);
                }
            }

            // بارگذاری اولیه فرم بر اساس مقدار موجود مشتری
            toggleCompanySection();

            // هر تغییر در نوع مشتری، بخش شرکت را بروزرسانی کند
            typeRadios.forEach(radio => {
                radio.addEventListener('change', toggleCompanySection);
            });

            // ==== Bind اولیه برای province و city ====
            document.querySelectorAll('.selectize').forEach(function(select) {
                NiceSelect.bind(select, {
                    placeholder: "انتخاب کنید",
                    searchable: true
                });
            });

            // ==== بارگذاری شهرها در حالت ادیت ====
            let provinceSelect = document.getElementById('province');
            let citySelect = document.getElementById('city');

            function loadCities(provinceId, preselected = null) {

                fetch('/cities/' + provinceId)
                    .then(response => response.json())
                    .then(data => {

                        // حذف nice-select قبلی
                        if (citySelect.nextSibling && citySelect.nextSibling.classList.contains('nice-select')) {
                            citySelect.nextSibling.remove();
                        }

                        // پاک کردن لیست
                        citySelect.innerHTML = '';
                        let defaultOption = document.createElement('option');
                        defaultOption.value = '';
                        defaultOption.textContent = 'انتخاب کنید';
                        citySelect.appendChild(defaultOption);

                        // افزودن گزینه‌ها
                        data.forEach(city => {
                            let option = document.createElement('option');
                            option.value = city.id;
                            option.textContent = city.name;

                            if (preselected && parseInt(preselected) === city.id) {
                                option.selected = true;
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
            provinceSelect.addEventListener('change', function() {
                loadCities(this.value);
            });

        });
    </script>

</x-layout.default>
