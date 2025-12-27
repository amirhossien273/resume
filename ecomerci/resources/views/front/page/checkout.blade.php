@extends('front.layout.app')

@section('page')
    <style>
        .select2-container {
            z-index: 9999 !important;
        }
        .address-card {
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 1rem;
            margin-bottom: 1rem;
            position: relative;
            transition: all 0.3s ease;
        }
        .address-card:hover {
            border-color: #0d6efd;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }
        .address-card.selected {
            border-color: #0d6efd;
            background-color: #f8f9fa;
        }
        .address-actions {
            position: absolute;
            left: 1rem;
            top: 1rem;
        }
        .address-detail {
            margin-bottom: 0.5rem;
        }
        .address-label {
            font-weight: 600;
            color: #6c757d;
        }
        .address-value {
            color: #212529;
        }
        #editAddressModal .modal-content {
            padding: 1rem;
        }
    </style>
    <main class="main">
        <div class="py-3 bg-light">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}"><i class="fas fa-home me-2"></i> صفحه اول</a></li>
                        <li class="breadcrumb-item active" aria-current="page">پرداخت محصول</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container my-5">
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <h1 class="h2 mb-3">ثبت نهایی سفارش</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="mb-4">انتخاب آدرس</h4>

                            @if ($errors->has('address_id'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ $errors->first('address_id') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @php
                                $addresses = \App\Models\Address::where('user_id', auth()->user()->id)
                                    ->with('city')->get();
                            @endphp

                            @if(count($addresses) > 0)
                                @foreach($addresses as $address)
                                    <div class="address-card @if($loop->first && !old('address_id')) selected @endif" id="addressCard-{{ $address->id }}">
                                        <div class="address-actions">
                                            <form action="{{ route('front.user.addresses.destroy', $address->id) }}" method="POST" class="d-inline delete-address-form">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="redirect_to" value="checkout">
                                                <button type="submit" class="btn btn-sm btn-outline-danger me-2">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                            <button class="btn btn-sm btn-outline-primary edit-address-btn"
                                                    data-address-id="{{ $address->id }}"
                                                    data-first-name="{{ $address->first_name }}"
                                                    data-last-name="{{ $address->last_name }}"
                                                    data-phone="{{ $address->phone }}"
                                                    data-mobile="{{ $address->mobile }}"
                                                    data-title="{{ $address->title }}"
                                                    data-province-id="{{ $address->province_id }}"
                                                    data-city-id="{{ $address->city_id }}"
                                                    data-content="{{ $address->content }}"
                                                    data-postal-code="{{ $address->postal_code }}">
                                                <i class="far fa-edit"></i>
                                            </button>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input checkboxAddress" type="radio" name="radio"
                                                   id="address-{{ $address->id }}" value="{{ $address->id }}"
                                                   @if($loop->first && !old('address_id')) checked @endif>
                                            <label class="form-check-label fw-bold" for="address-{{ $address->id }}">
                                                <h6>{{ $address->title }}</h6>
                                            </label>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6 address-detail">
                                                <span class="address-label">شهر:</span>
                                                <span class="address-value">{{ $address->city->title }}</span>
                                            </div>
                                            <div class="col-md-6 address-detail">
                                                <span class="address-label">نام و نام خانوادگی:</span>
                                                <span class="address-value">{{ $address->first_name }} {{ $address->last_name }}</span>
                                            </div>
                                            <div class="col-md-6 address-detail">
                                                <span class="address-label">تلفن همراه:</span>
                                                <span class="address-value">{{ $address->mobile }}</span>
                                            </div>
                                            <div class="col-md-6 address-detail">
                                                <span class="address-label">تلفن ثابت:</span>
                                                <span class="address-value">{{ $address->phone }}</span>
                                            </div>
                                            <div class="col-md-6 address-detail">
                                                <span class="address-label">کد پستی:</span>
                                                <span class="address-value">{{ $address->postal_code }}</span>
                                            </div>
                                            <div class="col-12 address-detail">
                                                <span class="address-label">آدرس:</span>
                                                <span class="address-value">{{ $address->content }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addressModal">
                                    <i class="fas fa-plus me-2"></i> ثبت آدرس جدید
                                </button>
                            @else
                                <div class="alert alert-danger">
                                    جهت تکمیل فرآیند سفارش، ثبت اطلاعات آدرس الزامی است. لطفاً ابتدا آدرس خود را وارد نمایید.
                                </div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addressModal">
                                    <i class="fas fa-plus me-2"></i> ثبت آدرس جدید
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-end justify-content-between mb-3">
                                <h4 class="mb-0">سفارش شما</h4>
                                @php
                                    $total = 0;
                                    foreach ($carts as $key => $cart) {
                                        $total += $cart->quantity * $cart->productItem->price;
                                    }
                                    $total_voucher = $total;
                                @endphp
                                @isset($voucher)
                                    @php
                                        $total_voucher -= $voucher->discount_price ?? 0;
                                        $total_voucher -= ($total_voucher * ($voucher->discount_percent ?? 0) / 100);
                                    @endphp
                                @endisset
                                <h5 class="mb-0">{{ number_format($total_voucher) }} تومان</h5>
                            </div>

                            <hr>

                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td width="80">
                                                <img src="{{ $cart->productItem->firstMedia?->media_uri ?? '/assets/front/images/product-default-img.png' }}" alt="{{ $cart->productItem->product->title }}" class="img-fluid rounded" style="max-height: 60px;">
                                            </td>
                                            <td>
                                                <h6 class="mb-1">
                                                    <a href="{{ route('front.product.show', [$cart->productItem->product->unique_id, $cart->productItem->product->slug]) }}" class="text-decoration-none">
                                                        {{ $cart->productItem->product->title }}
                                                    </a>
                                                </h6>
                                                <span class="text-muted">x {{ $cart->quantity }}</span>
                                            </td>
                                            <td class="text-end">
                                                {{ number_format($cart->productItem->price) }} تومان
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="bg-light p-3 rounded mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>قیمت:</span>
                                    <span>{{ number_format($total) }} تومان</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>تخفیف:</span>
                                    <span>
                                    @isset($voucher)
                                            @php
                                                $discountPrice = $voucher->discount_price ?? 0;
                                                $discountPercent = $voucher->discount_percent ?? 0;
                                            @endphp

                                            @if($discountPrice > 0 || $discountPercent > 0)
                                                @if($discountPrice > 0)
                                                    {{ number_format($discountPrice) }} تومان
                                                @endif
                                                @if($discountPrice > 0 && $discountPercent > 0)
                                                    +
                                                @endif
                                                @if($discountPercent > 0)
                                                    {{ $discountPercent }}٪
                                                @endif
                                            @else
                                                -
                                            @endif
                                        @else
                                            -
                                        @endisset
                                </span>
                                </div>
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>جمع کل:</span>
                                    <span>{{ number_format($total_voucher) }} تومان</span>
                                </div>
                            </div>

                            <div class="alert alert-info">
                                <p class="mb-0">هزینه ارسال برای شهر <strong>{{ \App\Models\City::where('id', setting('exceptionDelivery'))->first()->title }}</strong> رایگان است، اما برای سایر شهرها مبلغ <strong>{{ number_format(setting('delivery')) }}</strong> تومان به‌صورت پس‌کرایه دریافت می‌شود.</p>
                            </div>

                            <div class="mt-4">
                                <h5 class="mb-3">روش پرداخت</h5>
                                <div class="text-center mb-3">
                                    <img src="{{ url('assets/front/imgs/theme/behpardakht_logo.svg') }}" alt="درگاه پرداخت به پرداخت" class="img-fluid" style="max-height: 60px;">
                                </div>

                                <form action="{{ route('front.order.store') }}" method="POST" id="checkoutForm">
                                    @csrf
                                    <input type="hidden" name="address_id" id="address_id" value="{{ old('address_id', $addresses->first()->id ?? '') }}">
                                    <input type="hidden" name="voucher_code" value="{{ request()->get('voucher') }}">
                                    <input type="hidden" name="payment_gateway_id" value="1">

                                    <button type="submit" class="btn btn-primary w-100 py-3">
                                        <i class="fas fa-arrow-left me-2"></i> ثبت سفارش
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Address Modal -->
        <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addressModalLabel">ثبت آدرس جدید</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('front.user.addresses.store') }}">
                        @csrf
                        <div class="modal-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="sameAsMe">
                                <label class="form-check-label" for="sameAsMe">گیرنده خودم هستم</label>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">نام</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', '') }}">
                                    @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">نام خانوادگی</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', '') }}">
                                    @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label">تلفن ثابت</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', '') }}">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="mobile" class="form-label">شماره همراه</label>
                                    <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile', '') }}">
                                    @error('mobile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="title" class="form-label">عنوان آدرس</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="مثال: خانه، محل کار و ..." value="{{ old('title', '') }}">
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="province_id" class="form-label">استان</label>
                                    <select class="form-select @error('province_id') is-invalid @enderror" id="province_id" name="province_id">
                                        <option value="">انتخاب استان</option>
                                        @foreach (\App\Models\Province::query()->orderBy("show_order")->get() as $province)
                                            <option value="{{ $province->id }}" {{ old('province_id', '') == $province->id ? 'selected' : '' }}>{{ $province->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="city_id" class="form-label">شهر</label>
                                    <select class="form-select @error('city_id') is-invalid @enderror" id="city_id" name="city_id">
                                        <option value="">ابتدا استان را انتخاب کنید</option>
                                    </select>
                                    @error('city_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="content" class="form-label">آدرس کامل</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3">{{ old('content', '') }}</textarea>
                                    @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="postal_code" class="form-label">کد پستی</label>
                                    <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code', '') }}">
                                    @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="checkout" value="1">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                            <button type="submit" class="btn btn-primary">ثبت آدرس</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Address Modal -->
        <div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAddressModalLabel">ویرایش آدرس</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" id="editAddressForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="editSameAsMe">
                                <label class="form-check-label" for="editSameAsMe">گیرنده خودم هستم</label>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="edit_first_name" class="form-label">نام</label>
                                    <input type="text" class="form-control" id="edit_first_name" name="first_name">
                                </div>

                                <div class="col-md-6">
                                    <label for="edit_last_name" class="form-label">نام خانوادگی</label>
                                    <input type="text" class="form-control" id="edit_last_name" name="last_name">
                                </div>

                                <div class="col-md-6">
                                    <label for="edit_phone" class="form-label">تلفن ثابت</label>
                                    <input type="text" class="form-control" id="edit_phone" name="phone">
                                </div>

                                <div class="col-md-6">
                                    <label for="edit_mobile" class="form-label">شماره همراه</label>
                                    <input type="text" class="form-control" id="edit_mobile" name="mobile">
                                </div>

                                <div class="col-12">
                                    <label for="edit_title" class="form-label">عنوان آدرس</label>
                                    <input type="text" class="form-control" id="edit_title" name="title" placeholder="مثال: خانه، محل کار و ...">
                                </div>

                                <div class="col-md-6">
                                    <label for="edit_province_id" class="form-label">استان</label>
                                    <select class="form-select" id="edit_province_id" name="province_id">
                                        <option value="">انتخاب استان</option>
                                        @foreach (\App\Models\Province::query()->orderBy("show_order")->get() as $province)
                                            <option value="{{ $province->id }}">{{ $province->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="edit_city_id" class="form-label">شهر</label>
                                    <select class="form-select" id="edit_city_id" name="city_id">
                                        <option value="">ابتدا استان را انتخاب کنید</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="edit_content" class="form-label">آدرس کامل</label>
                                    <textarea class="form-control" id="edit_content" name="content" rows="3"></textarea>
                                </div>

                                <div class="col-md-6">
                                    <label for="edit_postal_code" class="form-label">کد پستی</label>
                                    <input type="text" class="form-control" id="edit_postal_code" name="postal_code">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="redirect_to" value="checkout">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var addressModal = new bootstrap.Modal(document.getElementById('addressModal'));
                addressModal.show();
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Same as me checkbox functionality
            const sameAsMeCheckbox = document.getElementById('sameAsMe');
            const firstNameInput = document.getElementById('first_name');
            const lastNameInput = document.getElementById('last_name');
            const mobileInput = document.getElementById('mobile');

            sameAsMeCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    firstNameInput.value = '{{ auth()->user()->first_name }}';
                    lastNameInput.value = '{{ auth()->user()->last_name }}';
                    mobileInput.value = '{{ auth()->user()->phone }}';

                    firstNameInput.readOnly = true;
                    lastNameInput.readOnly = true;
                    mobileInput.readOnly = true;
                } else {
                    firstNameInput.value = '';
                    lastNameInput.value = '';
                    mobileInput.value = '';

                    firstNameInput.readOnly = false;
                    lastNameInput.readOnly = false;
                    mobileInput.readOnly = false;
                }
            });

            // Edit same as me checkbox
            const editSameAsMeCheckbox = document.getElementById('editSameAsMe');
            const editFirstNameInput = document.getElementById('edit_first_name');
            const editLastNameInput = document.getElementById('edit_last_name');
            const editMobileInput = document.getElementById('edit_mobile');

            editSameAsMeCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    editFirstNameInput.value = '{{ auth()->user()->first_name }}';
                    editLastNameInput.value = '{{ auth()->user()->last_name }}';
                    editMobileInput.value = '{{ auth()->user()->phone }}';

                    editFirstNameInput.readOnly = true;
                    editLastNameInput.readOnly = true;
                    editMobileInput.readOnly = true;
                } else {
                    editFirstNameInput.value = '';
                    editLastNameInput.value = '';
                    editMobileInput.value = '';

                    editFirstNameInput.readOnly = false;
                    editLastNameInput.readOnly = false;
                    editMobileInput.readOnly = false;
                }
            });

            // Address selection
            document.querySelectorAll('.checkboxAddress').forEach(radio => {
                radio.addEventListener('change', function() {
                    // Remove selected class from all cards
                    document.querySelectorAll('.address-card').forEach(card => {
                        card.classList.remove('selected');
                    });

                    // Add selected class to current card
                    this.closest('.address-card').classList.add('selected');
                    document.getElementById('address_id').value = this.value;
                });
            });

            // Province and city selection for add form
            const provincesAndCities = @json(\App\Models\Province::with('cities')->get());

            $('#province_id').select2({
                placeholder: "انتخاب استان",
                allowClear: true
            });

            $('#city_id').select2({
                placeholder: "انتخاب شهر",
                allowClear: true
            });

            $('#province_id').on('change', function() {
                const provinceId = this.value;
                const citySelect = $('#city_id');

                citySelect.empty().append('<option value="">در حال دریافت شهرها...</option>');
                citySelect.prop('disabled', true);

                if (provinceId) {
                    const province = provincesAndCities.find(p => p.id == provinceId);
                    citySelect.empty().append('<option value="">انتخاب شهر</option>');

                    if (province && province.cities) {
                        province.cities.forEach(city => {
                            citySelect.append(new Option(city.title, city.id));
                        });
                    }

                    citySelect.prop('disabled', false).trigger('change');
                } else {
                    citySelect.empty().append('<option value="">ابتدا استان را انتخاب کنید</option>');
                    citySelect.prop('disabled', false);
                }
            });

            // Province and city selection for edit form
            $('#edit_province_id').select2({
                placeholder: "انتخاب استان",
                allowClear: true
            });

            $('#edit_city_id').select2({
                placeholder: "انتخاب شهر",
                allowClear: true
            });

            $('#edit_province_id').on('change', function() {
                const provinceId = this.value;
                const citySelect = $('#edit_city_id');

                citySelect.empty().append('<option value="">در حال دریافت شهرها...</option>');
                citySelect.prop('disabled', true);

                if (provinceId) {
                    const province = provincesAndCities.find(p => p.id == provinceId);
                    citySelect.empty().append('<option value="">انتخاب شهر</option>');

                    if (province && province.cities) {
                        province.cities.forEach(city => {
                            citySelect.append(new Option(city.title, city.id));
                        });
                    }

                    citySelect.prop('disabled', false).trigger('change');
                } else {
                    citySelect.empty().append('<option value="">ابتدا استان را انتخاب کنید</option>');
                    citySelect.prop('disabled', false);
                }
            });

            // Edit address modal handling
            const editAddressModal = new bootstrap.Modal(document.getElementById('editAddressModal'));
            const editAddressForm = document.getElementById('editAddressForm');

            document.querySelectorAll('.edit-address-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const addressId = this.getAttribute('data-address-id');
                    editAddressForm.action = `/user/addresses/${addressId}`;

                    document.getElementById('edit_first_name').value = this.getAttribute('data-first-name');
                    document.getElementById('edit_last_name').value = this.getAttribute('data-last-name');
                    document.getElementById('edit_phone').value = this.getAttribute('data-phone');
                    document.getElementById('edit_mobile').value = this.getAttribute('data-mobile');
                    document.getElementById('edit_title').value = this.getAttribute('data-title');
                    document.getElementById('edit_content').value = this.getAttribute('data-content');
                    document.getElementById('edit_postal_code').value = this.getAttribute('data-postal-code');

                    // Set province and city
                    const provinceId = this.getAttribute('data-province-id');
                    const cityId = this.getAttribute('data-city-id');

                    $('#edit_province_id').val(provinceId).trigger('change');

                    // Wait for cities to load
                    setTimeout(() => {
                        $('#edit_city_id').val(cityId).trigger('change');
                    }, 500);

                    editAddressModal.show();
                });
            });

            // Form submission validation
            document.getElementById('checkoutForm').addEventListener('submit', function(e) {
                if (!document.getElementById('address_id').value && {{ count($addresses) > 0 ? 'true' : 'false' }}) {
                    e.preventDefault();
                    alert('لطفاً یک آدرس را انتخاب کنید');
                }
            });

            // Delete address confirmation
            document.querySelectorAll('.delete-address-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('آیا از حذف این آدرس مطمئن هستید؟')) {
                        e.preventDefault();
                    }
                });
            });

            // Initialize province cities if there was an error
            @if(old('province_id'))
            $('#province_id').trigger('change');
            $('#city_id').val('{{ old("city_id") }}').trigger('change');
            @endif
        });
    </script>
@endsection
