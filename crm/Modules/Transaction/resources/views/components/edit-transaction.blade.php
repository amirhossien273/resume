
    <div class="box">
        <div class="flex xl:flex-row flex-col gap-2.5">
            <div class=" flex w-full gap-4">
                <div class=" flex w-full gap-4">
                    <div class="panel customer w-1/2 xl:mt-0 mt-6 p-4 rounded">
                        <div class=" w-full xl:mt-0 mt-6 p-4 rounded">
                            <div class="mt-4 mb-4 grid grid-cols-1 md:grid-cols-2 gap-4" x-data>
                                <div>

                                    <div class="flex gap-4">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="radio" name="type" class="form-radio type" value="person"
                                                   {{ $transaction->customer->type == 'person' ? 'checked' : '' }}
                                                   @click.prevent />
                                            <span class="mr-2">حقیقی</span>
                                        </label>

                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="radio" name="type" class="form-radio type" value="company"
                                                   {{ $transaction->customer->type == 'company' ? 'checked' : '' }}
                                                   @click.prevent />
                                            <span class="mr-2">حقوقی</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 mb-3" x-data="{ customerType: '{{ $transaction->customer->type }}' }"
                                 x-show="customerType === 'company'">
                                <div class="grid sm:grid-cols-2 grid-cols-1 gap-4">
                                    <div>
                                        <label for="company">نام شرکت</label>
                                        <input name="company" id="company" type="text" class="form-input w-full"
                                               value="{{ $transaction->customer->company }}" readonly />
                                    </div>
                                    <div>
                                        <label for="phone">تلفن شرکت</label>
                                        <input name="company_phone" id="phone" type="text" class="form-input w-full"
                                               value="{{ $transaction->customer->company_phone }}" readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 grid sm:grid-cols-2 grid-cols-1 gap-4">
                                <div>
                                    <label for="firstname">نام</label>
                                    <input id="firstname" type="text" name="firstname"
                                           value="{{$transaction->customer->firstname}}" class="form-input w-full"
                                           readOnly />
                                </div>
                                <div>
                                    <label for="lastname">نام خانوادگی</label>
                                    <input id="lastname" type="text" name="lastname"
                                           value="{{$transaction->customer->lastname}}" class="form-input w-full"
                                           readOnly />
                                </div>
                                <div>
                                    <label for="mobile">موبایل</label>
                                    <input id="mobile" type="text" name="mobile"
                                           value="{{$transaction->customer->mobile}}"
                                           class="form-input flatpickr-input w-full" readOnly />
                                </div>
                            </div>
                            <div class="grid sm:grid-cols-2 mt-4 grid-cols-1 gap-4">
                                <div>
                                    <label for="business_id">صنف</label>
                                    <input id="business" type="text" name="business"
                                           class="form-input flatpickr-input w-full"
                                           value="{{$transaction->customer->business?->name}}" readOnly />
                                </div>
                                <div>
                                    <label for="customers_type">نوع مشتری</label>
                                    <input id="customers_type_label" type="text" name="customers_type_label"
                                           class="form-input flatpickr-input w-full"
                                           value="{{$transaction->customer->customer_type_label}}" readOnly />
                                </div>
                            </div>
                            <div class="mt-4 grid grid-cols-2 gap-4 items-center">
                                <div>
                                    <label for="province" class="text-right block">استان</label>
                                    <input id="province" type="text" name="province"
                                           class="form-input flatpickr-input w-full"
                                           value="{{$transaction->customer->province->name}}" readOnly />
                                </div>
                                <div>
                                    <label for="city" class="text-right block">شهر</label>
                                    <input id="city" type="text" name="city" class="form-input flatpickr-input w-full"
                                           value="{{$transaction->customer->city->name}}" readOnly />
                                </div>
                            </div>

                            <div class="mt-4">
                                <label for="address">آدرس</label>
                                <textarea id="address" name="address" rows="3" class="form-textarea w-full"
                                          readOnly>{{$transaction->customer->address}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel w-1/2 xl:mt-0 mt-6 p-4 rounded">
                        <form action="{{ route('transaction.update', $transaction->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mt-4 grid sm:grid-cols-2 grid-cols-1 gap-4">
                                <div>
                                    <label for="name">نام معامله</label>
                                    <input id="name" type="text" name="name" class="form-input"
                                           value="{{ old('name', $transaction->name) }}" readonly />
                                </div>

                                <div>
                                    <label for="product_id">محصول</label>
                                    <select name="product_id" id="product_id" class="form-input" disabled>
                                        @foreach(\Modules\Product\App\Models\Product::all() as $product)
                                            <option
                                                value="{{ $product->id }}" {{ $transaction->product_id == $product->id ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="product_id" value="{{ $transaction->product_id }}">
                                </div>
                            </div>

                            <div class="mt-4 grid sm:grid-cols-2 grid-cols-1 gap-4">
                                <div>
                                    <label for="approximate_amount">مبلغ احتمالی</label>
                                    <input id="approximate_amount" type="text" name="approximate_amount_display"
                                           class="form-input"
                                           value="{{ old('approximate_amount', number_format($transaction->approximate_amount)) }}" />

                                    <input type="hidden" name="approximate_amount" id="approximate_amount_hidden"
                                           value="{{ old('approximate_amount', $transaction->approximate_amount) }}">

                                </div>

                                <div>
                                    <label for="type_id">نوع آشنایی</label>
                                    <select name="type_id" id="type_id" class="form-input" disabled>
                                        @foreach(\Modules\Transaction\App\Models\TransactionType::all() as $type)
                                            <option
                                                value="{{ $type->id }}" {{ $transaction->type_id == $type->id ? 'selected' : '' }}>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="type_id" value="{{ $transaction->type_id }}">
                                </div>
                            </div>

                            <div class="mt-4 grid sm:grid-cols-2 grid-cols-1 gap-4">
                                <div x-data="form">
                                    <label>تاریخ پیشنهادی خاتمه</label>
                                    <input id="basic" x-model="date1" name="deal_closed_at" class="form-input"
                                           value="{{ old('deal_closed_at', $transaction->deal_closed_at) }}" />
                                </div>

                                <div>
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-input">
                                        @foreach(['running' => 'در حال اجرا', 'success' => 'موفق', 'failed' => 'ناموفق'] as $key => $value)
                                            <option
                                                value="{{ $key }}" {{ $transaction->status == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mt-4 w-full h-screen">
                                <label for="description">توضیحات</label>
                                <textarea name="description" id="description"
                                          class="form-input">{{ old('description', $transaction->description) }}</textarea>
                            </div>

                            @php
                                $initialResponsibles = $transaction->responsibles
                                    ? $transaction->responsibles->map(function ($r) {
                                        return [
                                            'user_id'     => (string) ($r->model_id ?? ''),
                                            'share_value' => (int) ($r->share_value ?? 0),
                                            'responsible_id' => $r->id,
                                        ];
                                    })->values()
                                    : collect([]);


                                 $alpineResponsibles = $initialResponsibles->isNotEmpty()
                                    ? $initialResponsibles
                                    : collect(old('responsibles', [['user_id' => '', 'share_value' => 0]]));

                            @endphp

                                <!-- =================== بخش همکاران (فقط درصدی) =================== -->
                            <div class="mt-6 w-full" x-data="sharesFormEdit()" x-init="init()">
                                <div class="flex items-center gap-4 mb-3">
                                    <label class="font-medium block">همکاران معامله</label>

                                    <button type="button" class="btn btn-dark my-4 btn-sm">
                                        مجموع درصد
                                        <span class="badge my-0 bg-white-light text-black ltr:ml-4 rtl:mr-4"
                                              x-text="totalShare+'%'"></span>
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
                                                            <template x-for="user in availableUsers(index)"
                                                                      :key="user.id">
                                                                <option :value="user.id"
                                                                        x-text="user.first_name + ' ' + user.last_name"></option>
                                                            </template>

                                                            </option>
                                                        </select>

                                                    </div>

                                                    <div class="w-1/6 relative">
                                                        <input type="number"
                                                               min="0" max="100" step="1"
                                                               :name="'responsibles['+index+'][share_value]'"
                                                               x-model.number="responsible.share_value"
                                                               class="form-input w-full pr-8 text-center"
                                                               placeholder="درصد" />
                                                        <span
                                                            class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400">%</span>

                                                    </div>

                                                    <input type="hidden" :name="'responsibles['+index+'][share_type]'"
                                                           value="percentage" />

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
                                            title="افزودن همکار">+
                                    </button>
                                </div>
                            </div>

                            <!-- =================== پایان بخش همکاران =================== -->


                            <input type="hidden" name="creator_type" value="{{ \Modules\Auth\App\Models\User::class }}">
                            <input type="hidden" name="product_type"
                                   value="{{ \Modules\Product\App\Models\Product::class }}">
                            <input type="hidden" name="customer_type"
                                   value="{{ \Modules\Customer\App\Models\Customer::class }}">
                            <input type="hidden" name="responsible_type"
                                   value="{{ \Modules\Auth\App\Models\User::class }}">

                            <div class="mt-4">
                                <input type="hidden" name="redirect" value="{{$redirect}}">
                                <button type="submit" class="btn btn-primary">ویرایش تراکنش</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="/assets/js/flatpicker-fa.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jalaali-js/dist/jalaali.js"></script>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                date1: '',
                init() {
                    this.date1 = "{{ $transaction->deal_closed_at }}";
                    flatpickr(document.getElementById('basic'), {
                        dateFormat: 'Y-m-d',
                        defaultDate: this.date1,
                        locale: 'fa',
                    });
                }
            }));
        });
    </script>


    <script>
        window.responsibleErrors = @json($errors->get('responsibles.*'));
        function sharesFormEdit() {
            return {
                responsibles: @json($alpineResponsibles),
                users: @js(\Modules\Auth\App\Models\User::select('id','first_name','last_name')->where('id', '!=', auth()->id())->get()),
                errors: window.responsibleErrors ?? {},

                errorFor(index, field) {
                    return this.errors[`responsibles.${index}.${field}`]?.[0] ?? null;
                },

                init() {
                    if (this.responsibles.length === 0) {
                        this.responsibles.push({ user_id: '', share_value: 0 });
                    }
                    this.responsibles.forEach((r, index) => {
                        setTimeout(() => {
                            const selectEl = document.getElementById('userSelect' + index);
                            if (selectEl) selectEl.value = r.user_id;
                        }, 200);
                    });
                },
                addShare() {
                    if (this.totalShare >= 100) return;
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
                totalShareClass() {
                    return (this.totalShare === 100) ? 'text-green-500' : 'text-danger';
                },
                availableUsers(index) {
                    const selected = this.responsibles
                        .map((r, i) => i !== index ? String(r.user_id || '') : null)
                        .filter(v => v && v !== '');

                    return this.users.filter(u => !selected.includes(String(u.id)));
                },
            }
        }

        const initialResponsibles = @json($initialResponsibles);
        initialResponsibles.map((responsible, index) => {
            setTimeout(()=>{
                const selectEl = document.getElementById('userSelect' + index);
                // console.log("selectEl: ", selectEl);
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

