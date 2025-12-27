
@php
    $products  = $products  ?? \Modules\Product\App\Models\Product::all();
    $types     = $types     ?? \Modules\Transaction\App\Models\TransactionType::all();
    $provinces = $provinces ?? \Modules\Customer\App\Models\Province::all();
    $users     = $users     ?? \Modules\Auth\App\Models\User::select('id','first_name','last_name')->where('id', '!=', auth()->id())->get();
@endphp
<form action="{{ route('transaction.store') }}" method="POST">
    @csrf
<div class="box">
    <div class="flex xl:flex-row flex-col gap-2.5">

        <div class=" flex w-full gap-4">
            <div class="panel w-1/2 xl:mt-0 mt-6 p-4 rounded">
                <div class="mt-4">
                    <label for="customer_search">جستجوی مشتری</label>
                    <input id="customer_search" type="text"
                           placeholder="نام مشتری را وارد کنید" class="form-input" />
                    <div class="text-gray-500 text-sm">در حال جستجو...</div>
                    <div class="text-danger text-sm"></div>
                </div>

                <div class=" w-full xl:mt-0 mt-6 p-4 rounded">

                    <div class="mt-4 mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 font-medium"> </label>
                            <div class="flex gap-4">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="type" class="form-radio type" value="person"
                                            {{ old('type') == 'person' ? 'checked' : '' }}/>
                                    <span class="mr-2">حقیقی</span>
                                </label>

                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="radio" name="type" class="form-radio type" value="company"
                                            {{ old('type') == 'company' ? 'checked' : '' }}/>
                                    <span class="mr-2">حقوقی</span>
                                </label>
                                @error('type')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="mt-3 mb-3 hidden" id="company_info">
                        <div class="grid sm:grid-cols-2 grid-cols-1 gap-4">
                            <div>
                                <label for="company">نام شرکت</label>
                                <input name="company" id="company" type="text" class="form-input w-full"
                                       value="{{ old('company') }}" />
                                @error('company')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="phone">تلفن شرکت</label>
                                <input name="company_phone" id="phone" type="text"
                                       value="{{ old('company_phone') }}" class="form-input w-full" />
                                @error('company_phone')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 grid-cols-1 gap-4">
                        <div>
                            <label for="firstname">نام</label>
                            <input id="firstname" type="text" name="firstname" class="form-input w-full"
                                   value="{{ old('firstname') }}" />
                            @error('firstname')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="lastname">نام خانوادگی</label>
                            <input id="lastname" type="text" name="lastname" class="form-input w-full"
                                   value="{{ old('lastname') }}" />
                            @error('lastname')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="mobile">موبایل</label>
                            <input id="mobile" type="text" name="mobile"
                                   class="form-input flatpickr-input w-full" value="{{ old('mobile') }}" />
                            @error('mobile')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 mt-4 grid-cols-1 gap-4">
                        <div>
                            <label for="business_id">صنف</label>
                            <select name="business_id" id="business_id" class="selectize w-full" >
                                <option value="">انتخاب کنید</option>
                                @foreach(\Modules\Customer\App\Models\Business::all() as $business)
                                    <option
                                        value="{{ $business->id }}" {{ old('business_id') == $business->id ? 'selected' : '' }}>{{ $business->name }}</option>
                                @endforeach
                            </select>
                            @error('business_id')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="customers_type">نوع مشتری</label>
                            <select name="customers_type" id="customers_type" class="selectize w-full" >
                                <option value="">انتخاب کنید</option>
                                <option
                                    value="consumer" {{ old('customers_type') == 'consumer' ? 'selected' : '' }}>
                                    مصرف کننده
                                </option>
                                <option
                                    value="coworker" {{ old('customers_type') == 'coworker' ? 'selected' : '' }}>
                                    همکار
                                </option>
                                <option value="agent" {{ old('customers_type') == 'agent' ? 'selected' : '' }}>
                                    پخش کننده یا نماینده
                                </option>
                            </select>
                            @error('customers_type')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 grid grid-cols-2 gap-4 items-center">
                        <div>
                            <label for="province" class="text-right block">استان</label>
                            <select name="province_id" id="province" class="selectize w-full">
                                <option value="">انتخاب کنید</option>
                                @foreach(\Modules\Customer\App\Models\Province::all() as $province)
                                    <option
                                        value="{{ $province->id }}" {{ old('province_id') == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
                                @endforeach
                            </select>
                            @error('province_id')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="city" class="text-right block">شهر</label>
                            <select name="city_id" id="city" class="selectize w-full">
                                <option value="">انتخاب کنید</option>
                            </select>
                            @error('city_id')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="address">آدرس</label>
                        <textarea id="address" name="address" rows="3"
                                  class="form-textarea w-full">{{ old('address') }}</textarea>
                        @error('address')
                        <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="panel w-1/2 xl:mt-0 mt-6 p-4 rounded">
                <div class="mt-4 grid sm:grid-cols-2 grid-cols-1 gap-4">
                    <div>
                        <label for="name">نام معامله</label>
                        <input id="name" type="text" name="name" class="form-input"
                               placeholder="نام معامله" value="{{ old('name') }}" readonly />
                        @error('name')
                        <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="product_id">محصول</label>
                        <select name="product_id" id="product_id" class="form-input">
                            <option value="">انتخاب محصول</option>
                            @foreach(\Modules\Product\App\Models\Product::all() as $product)
                                <option
                                    value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                        <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 grid sm:grid-cols-2 grid-cols-1 gap-4">
                    <div>
                        <label for="approximate_amount">مبلغ احتمالی (تومان)</label>
                        <input id="approximate_amount" type="text" name="approximate_amount_display"
                               class="form-input"
                               placeholder="مبلغ حدودی"
                               value="{{ number_format(old('approximate_amount')) }}" />

                        <input type="hidden" name="approximate_amount" id="approximate_amount_hidden"
                               value="{{ old('approximate_amount') }}">

                        @error('approximate_amount')
                        <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="type_id">نوع آشنایی</label>
                        <select name="type_id" id="type_id" class="form-input">
                            <option value="">انتخاب نوع آشنایی</option>
                            @foreach(\Modules\Transaction\App\Models\TransactionType::all() as $type)
                                <option
                                    value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_id')
                        <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 grid sm:grid-cols-2 grid-cols-1 gap-4">
                    <div x-data="form">
                        <label for="payment_method">تاریخ پیشنهادی خاتمه</label>
                        <input id="basic" x-model="date1" name="deal_closed_at" class="form-input" />
                    </div>
                </div>

                <!-- =================== بخش همکاران (فقط درصدی) =================== -->
                <div class="mt-6 w-full" x-data="sharesFormCreate()" x-init="init()">
                    <div class="flex items-center gap-4 mb-3">
                        <label class="font-medium block">همکاران معامله</label>
                        <button type="button" class="btn btn-dark my-4 btn-sm">
                            مجموع درصد
                            <span class="badge my-0 bg-white-light text-black ltr:ml-4 rtl:mr-4" x-text="totalShare+'%'"></span>
                        </button>

                    </div>

                    <div class="space-y-2">

                        <template x-for="(responsible, index) in responsibles" :key="index">
                            <div>
                                <div class="flex items-start gap-6">
                                <div class="w-2/3">
                                    <select :name="'responsibles[' + index + '][user_id]'"
                                            x-model="responsible.user_id"
                                            :id="'userSelect' + index"
                                            class="form-input w-full">
                                        <option value="">انتخاب همکار</option>
                                        <template x-for="user in availableUsers(index)" :key="user.id">
                                            <option :value="user.id" x-text="user.first_name + ' ' + user.last_name"></option>
                                        </template>
                                    </select>

                                </div>

                                <div class="w-1/6 relative">
                                    <input type="number" min="0" max="100" step="1"
                                           :name="'responsibles['+index+'][share_value]'"
                                           x-model.number="responsible.share_value"
                                           class="form-input w-full pr-8 text-center"
                                           placeholder="درصد" />
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 mr-2">%</span>

                                </div>

                                <input type="hidden" :name="'responsibles['+index+'][share_type]'" value="percentage" />

                                <div class="w-1/8 flex justify-end mr-3">
                                    <button type="button"
                                            @click="removeShare(index)"
                                            class="btn btn-outline-danger btn-sm !px-3"
                                            title="حذف">
                                        حذف
                                    </button>
                                </div>
                            </div>
                                <!-- خطاها (خارج از flex) -->
                                <div class="flex gap-6 text-xs text-danger mt-1">
                                    <div class="w-2/3">
                                        <template x-if="errorFor(index, 'user_id')">
                                            <span x-text="errorFor(index, 'user_id')"></span>
                                        </template>
                                    </div>

                                    <div class="w-1/6">
                                        <template x-if="errorFor(index, 'share_value')">
                                            <span x-text="errorFor(index, 'share_value')"></span>
                                        </template>
                                    </div>

                                    <div class="w-1/8"></div>
                                </div>

                            </div>
                        </template>

                    </div>

                    <div class="mt-4 flex items-center justify-between">
                        <button type="button"
                                @click="addShare()"
                                class="btn btn-primary btn-sm !px-4 !py-2 !rounded-lg"
                                title="افزودن همکار">+</button>
                    </div>
                </div>
                <!-- =================== پایان بخش همکاران =================== -->

                <div class="mt-4 w-full h-screen">
                    <label for="description">توضیحات</label>
                    <textarea name="description" id="description" class="form-input"
                              placeholder="توضیحات تراکنش">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="creator_type" value="{{ \Modules\Auth\App\Models\User::class }}">
                <input type="hidden" name="product_type"
                       value="{{ \Modules\Product\App\Models\Product::class }}">
                <input type="hidden" name="customer_type"
                       value="{{ \Modules\Customer\App\Models\Customer::class }}">
                <input type="hidden" name="responsible_type" value="{{ \Modules\Auth\App\Models\User::class }}">
                <input type="hidden" name="customer_id" id="customer_id" value="{{ old('customer_id') }}">
                <div class="mt-4">
                    <input type="hidden" name="redirect" value="{{ $redirect ?? url()->previous() }}">
                    <button type="submit" class="btn btn-primary">ایجاد تراکنش</button>
                </div>
            </div>
        </div>
    </div></div>
</form>
<style>


</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="/assets/js/flatpicker-fa.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jalaali-js/dist/jalaali.js"></script>
<script src="/assets/js/nice-select2.js"></script>

<script>

    document.addEventListener('DOMContentLoaded', function(e) {
        function updateDealName() {
            const first = (document.getElementById('firstname')?.value || '').trim();
            const last = (document.getElementById('lastname')?.value || '').trim();
            const dealNameInput = document.getElementById('name');
            if (!dealNameInput) return;

            const full = `${first} ${last}`.trim();
            dealNameInput.value = full ? `معامله-${full}` : '';
        }

        window.updateDealName = updateDealName;

        const firstEl = document.getElementById('firstname');
        const lastEl = document.getElementById('lastname');
        if (firstEl) firstEl.addEventListener('input', updateDealName);
        if (lastEl) lastEl.addEventListener('input', updateDealName);

        updateDealName();

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
                    { transform: 'translateY(-30px)', opacity: 0 }, // شروع بالا
                    { transform: 'translateY(0)', opacity: 1 }      // پایان جای اصلی
                ], {
                    duration: 1000,      // مدت زمان 0.5 ثانیه
                    easing: 'ease-out',
                    fill: 'forwards'    // بعد از انیمیشن المان در جای خود باقی بماند
                });

                companyInputs.forEach(i => i.disabled = false);
            } else {

                const animation = companyInfo.animate([
                    { transform: 'translateY(0)', opacity: 1 },
                    { transform: 'translateY(-30px)', opacity: 0 }
                ], {
                    duration: 500,
                    easing: 'ease-in',
                    fill: 'forwards'
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

        // default
        var els = document.querySelectorAll('.selectize');
        els.forEach(function(select) {
            NiceSelect.bind(select, {
                placeholder: 'انتخاب کنید',
                searchable: true
            });
        });

        const oldCity = "{{ old('city_id', '') }}";
        const oldProvince = "{{ old('province_id', '') }}";

        if (oldProvince) {
            loadCities(oldProvince, oldCity);
        }

    });

    document.addEventListener('alpine:init', () => {
        Alpine.data('form', () => ({
            date1: '',
            init() {

                const { toJalaali } = jalaali;
                const today = new Date();
                const j = toJalaali(today.getFullYear(), today.getMonth() + 1, today.getDate());
                this.date1 = `${j.jy}-${String(j.jm).padStart(2, '0')}-${String(j.jd).padStart(2, '0')}`;
                flatpickr(document.getElementById('basic'), {
                    dateFormat: 'Y-m-d',
                    defaultDate: this.date1,
                    locale: 'fa'
                });
            },
            shares: [],
            addShare() {
                this.shares.push({
                    user_id: '',
                    user_name: '',
                    type: '',
                    amount: ''
                });
            },
            removeShare(index) {
                this.shares.splice(index, 1);
            },
            updateUserName(index) {
                const selected = @json(\Modules\Auth\App\Models\User::all());
                const user = selected.find(u => u.id == this.shares[index].user_id);
                this.shares[index].user_name = user ? user.first_name + ' ' + user.last_name : '';
            }
        }));
    });

    document.getElementById('customer_search').addEventListener('input', function() {
        let query = this.value;
        let loadingDiv = this.nextElementSibling;
        let errorDiv = loadingDiv.nextElementSibling;

        if (query.length < 2) {
            loadingDiv.textContent = '';
            errorDiv.textContent = '';
            return;
        }

        loadingDiv.textContent = 'در حال جستجو...';
        errorDiv.textContent = '';

        document.getElementById('firstname').value = '';
        document.getElementById('firstname').readOnly = false;
        document.getElementById('lastname').value = '';
        document.getElementById('lastname').readOnly = false;
        document.getElementById('mobile').value = '';
        document.getElementById('mobile').readOnly = false;
        document.getElementById('address').value = '';
        document.getElementById('address').readOnly = false;
        document.getElementById('city').value = null;
        document.getElementById('province').value = null;
        document.getElementById('customers_type').readOnly = false;
        document.getElementById('customers_type').value = null;
        document.getElementById('business_id').readOnly = false;
        document.getElementById('business_id').value = null;


        const radios = document.querySelectorAll('.type');
        const typeValue = document.querySelector('input.type:checked')?.value;
        radios.forEach(radio => {
            radio.checked = false;
        });

        if (typeValue === 'company') {
            document.getElementById('company').value = '';
            document.getElementById('company').readOnly = false;
            document.getElementById('phone').value = '';
            document.getElementById('phone').readOnly = false;
        }

        const provinceSelect = document.getElementById('province');
        const citySelect = document.getElementById('city');
        const businessSelect = document.getElementById('business_id');
        const customerTypeSelect = document.getElementById('customers_type');

        if (provinceSelect) {

            destroyNice(provinceSelect);
            const options = Array.from(provinceSelect.options).map(p =>
                `<option value="${p.value}" ${p.value == '' ? 'selected' : ''}>${p.textContent}</option>`
            );
            provinceSelect.innerHTML = options.join('');
            NiceSelect.bind(provinceSelect);
        }

        if (citySelect) {
            setNiceSelect(citySelect, '', 'انتخاب کنید');
        }
        if (businessSelect) {

            destroyNice(businessSelect);
            const options = Array.from(businessSelect.options).map(p =>
                `<option value="${p.value}" ${p.value == '' ? 'selected' : ''}>${p.textContent}</option>`
            );
            businessSelect.innerHTML = options.join('');
            NiceSelect.bind(businessSelect);
        }
        if (customerTypeSelect) {

            destroyNice(customerTypeSelect);
            const options = Array.from(customerTypeSelect.options).map(p =>
                `<option value="${p.value}" ${p.value == '' ? 'selected' : ''}>${p.textContent}</option>`
            );
            customerTypeSelect.innerHTML = options.join('');
            NiceSelect.bind(customerTypeSelect);
        }


        fetch(`/transaction/customer/search?query=${query}`)
            .then(res => res.json())
            .then(data => {
                loadingDiv.textContent = '';

                if (data.error) {
                    errorDiv.textContent = data.error;
                    ['firstname', 'lastname', 'mobile', 'address', 'city', 'province', 'business_id', 'customers_type','type'].forEach(id => {
                        document.getElementById(id).value = '';
                    });
                    return;
                }

                document.getElementById('firstname').value = data.firstname;
                document.getElementById('firstname').readOnly = true;
                document.getElementById('lastname').value = data.lastname;
                document.getElementById('lastname').readOnly = true;
                document.getElementById('mobile').value = data.mobile;
                document.getElementById('mobile').readOnly = true;
                document.getElementById('address').value = data.address;
                document.getElementById('address').readOnly = true;
                document.getElementById('city').readOnly = true;
                document.getElementById('city').value = data.city_id;
                document.getElementById('province').readOnly = true;
                document.getElementById('province').value = data.province_id;
                document.getElementById('customers_type').readOnly = true;
                document.getElementById('customers_type').value = data.customer_type;
                document.getElementById('business_id').readOnly = true;
                document.getElementById('business_id').value = data.business_id;
                document.getElementById('customer_id').value = data.id;

                radios.forEach(radio => {
                    if (radio.value === data.type) {
                        radio.checked = true;
                        radio.dispatchEvent(new Event('change'));
                    }
                });

                if (typeValue === 'company') {
                    document.getElementById('company').value = data.company;
                    document.getElementById('company').readOnly = true;
                    document.getElementById('phone').value = data.company_phone;
                    document.getElementById('phone').readOnly = true;
                }


                if (provinceSelect) {

                    destroyNice(provinceSelect);
                    const options = Array.from(provinceSelect.options).map(p =>
                        `<option value="${p.value}" ${p.value == data.province_id ? 'selected' : ''}>${p.textContent}</option>`
                    );
                    provinceSelect.innerHTML = options.join('');
                    NiceSelect.bind(provinceSelect);
                }

                if (citySelect) {
                    setNiceSelect(citySelect, data.city_id, data.city_name);
                }
                if (businessSelect) {
                    setNiceSelect(businessSelect, data.business_id, data.business_name);
                }
                if (customerTypeSelect) {
                    setNiceSelect(customerTypeSelect, data.customer_type, data.customer_type_label);
                }

                if (window.updateDealName) window.updateDealName();
            })
            .catch(err => {
                loadingDiv.textContent = '';
                errorDiv.textContent = 'خطا در جستجو!';
                console.error(err);
            });
    });
    function disableNice(select) {
        select.disabled = true;
        const nice = select.nextElementSibling;
        if (nice && nice.classList.contains('nice-select')) {
            nice.classList.add('disabled');
            nice.style.pointerEvents = 'none';
            nice.style.opacity = '0.6';
        }
    }
    function destroyNice(select) {
        if (
            select.nextSibling &&
            select.nextSibling.classList.contains('nice-select')
        ) {
            select.nextSibling.remove();
        }
    }

    function setNiceSelect(select, value, label) {
        destroyNice(select);
        select.innerHTML = `<option selected value="${value}">${label}</option>`;
        select.value = value;
        NiceSelect.bind(select);
    }

    let provinceSelect = document.getElementById('province');
    let citySelect = document.getElementById('city');

    function loadCities(provinceId, preselected) {

        fetch('/cities/' + provinceId)
            .then(response => response.json())
            .then(data => {

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

                if (preselected) {
                    citySelect.value = preselected;
                }
                // Bind مجدد
                NiceSelect.bind(citySelect, {
                    placeholder: 'انتخاب کنید',
                    searchable: true
                });


            });
    }

    provinceSelect.addEventListener('change', function() {
        loadCities(this.value);
    });

    window.responsibleErrors = @json($errors->get('responsibles.*'));
    function sharesFormCreate() {
        return {
            responsibles: @json(old('responsibles', [['user_id' => '', 'share_value' => '0']])),
            users: @json($users),
            errors: window.responsibleErrors ?? {},

            errorFor(index, field) {
                return this.errors[`responsibles.${index}.${field}`]?.[0] ?? null;
            },
            init() {
                if (this.responsibles.length === 0) {
                    this.responsibles.push({ user_id: '', share_value: 0 });
                }
            },
            addShare() {
                this.responsibles.push({ user_id: '', share_value: 0 });
            },
            removeShare(index) {
                this.responsibles.splice(index, 1);
                // if (this.responsibles.length === 0) {
                //     this.responsibles.push({ user_id: '', share_value: 0 });
                // }
            },
            get totalShare() {
                return this.responsibles.reduce((sum, r) => {
                    const v = Number(r.share_value);
                    return sum + (isNaN(v) ? 0 : v);
                }, 0);
            },
            availableUsers(index) {
                const selected = this.responsibles
                    .map((r, i) => i !== index ? String(r.user_id || '') : null)
                    .filter(v => v && v !== '');

                return this.users.filter(u => {
                    const uid = String(u.id);
                    const current = String(this.responsibles[index].user_id || '');
                    return !selected.includes(uid) || uid === current;
                });
            },
            totalShareClass() {
                return (this.totalShare === 100) ? 'text-green-500' : 'text-danger';
            },

        };
    }
    const oldResponsibles = @json(old('responsibles', [['user_id' => '', 'share_value' => 0]]));
    oldResponsibles.map((responsible, index) => {
        setTimeout(()=>{
            const selectEl = document.getElementById('userSelect' + index);
            if (selectEl) selectEl.value = responsible.user_id;
        },200)

    });

</script>
<script>
    const displayInput = document.getElementById('approximate_amount');
    const hiddenInput = document.getElementById('approximate_amount_hidden');

    function formatNumberWithCommas(x) {
        if (!x) return '';
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    displayInput.addEventListener('input', (e) => {
        // حذف هر چیزی غیر از عدد
        let value = e.target.value.replace(/\D/g, '');
        // نمایش با کاما
        displayInput.value = formatNumberWithCommas(value);
        // مقدار واقعی بدون کاما به hidden input
        hiddenInput.value = value;
    });
</script>
