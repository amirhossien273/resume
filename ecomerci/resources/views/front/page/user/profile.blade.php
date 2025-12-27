@extends('front.layout.app')

@section('page')
        <main class="main pages">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('front.home')}}" rel="nofollow"><i
                                        class="fa fa-home me-2"></i>صفحه اول</a></li>
                            <li class="breadcrumb-item active" aria-current="page">پروفایل</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="page-content pt-150 pb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <div class="row">
                                <!-- Sidebar Menu -->
                                <div class="col-md-3">
                                    <div class="dashboard-menu card shadow-sm">
                                        <div class="card-body p-0">
                                            <ul class="nav flex-column" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link {{ request()->routeIs('front.user.profile') ? 'active' : '' }}"
                                                       href="{{ route('front.user.profile') }}">
                                                        <i class="fas fa-sliders-h me-2"></i>داشبورد
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ request()->routeIs('front.user.orders') ? 'active' : '' }}"
                                                       href="{{ route('front.user.orders') }}">
                                                        <i class="fas fa-shopping-bag me-2"></i>سفارشات
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ request()->routeIs('front.user.address') ? 'active' : '' }}"
                                                       href="{{ route('front.user.address') }}">
                                                        <i class="fas fa-map-marker-alt me-2"></i>آدرس ها
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ request()->routeIs('front.user.account') ? 'active' : '' }}"
                                                       href="{{ route('front.user.account') }}">
                                                        <i class="fas fa-user me-2"></i>حساب کاربری
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-danger"
                                                       href="{{ route('front.auth.logout') }}">
                                                        <i class="fas fa-sign-out-alt me-2"></i>خروج
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Main Content -->
                                <div class="col-md-9">
                                    <div class="tab-content account dashboard-content ps-md-4">
                                        <!-- Dashboard Tab -->
                                        <div
                                            class="tab-pane fade {{ request()->routeIs('front.user.profile') ? 'active show' : '' }}"
                                            id="dashboard">
                                            <div class="card shadow-sm">
                                                <div class="card-header bg-light">
                                                    @include('partials.alerts')
                                                    <h3 class="mb-0">سلام {{ auth()->user()->full_name }}</h3>
                                                </div>
                                                <div class="card-body">
                                                    <p class="mb-0">
                                                        داشبورد حساب کاربری شما. از اینجا می توانید سفارشات خود را بررسی
                                                        کنید،
                                                        <a href="{{ route('front.user.orders') }}">سفارشات خود را مدیریت
                                                            کنید</a>،
                                                        <a href="{{ route('front.user.address') }}">آدرس های حمل و نقل
                                                            را ویرایش نمایید</a> و
                                                        <a href="{{ route('front.user.account') }}">اطلاعات حساب
                                                            کاربری</a> خود را به روزرسانی کنید.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Orders Tab -->
                                        <div
                                            class="tab-pane fade {{ request()->routeIs('front.user.orders') ? 'active show' : '' }}"
                                            id="orders">
                                            <div class="card shadow-sm">
                                                <div class="card-header bg-light">
                                                    @include('partials.alerts')
                                                    <h3 class="mb-0">سفارشات شما</h3>
                                                </div>
                                                <div class="card-body">
                                                    @php
                                                        $orders = \App\Models\Order::query()
                                                            ->with('orderItems.product', 'transaction')
                                                            ->where('creator_id', auth()->user()->id)
                                                            ->orderBy('id', 'desc')
                                                            ->get();
                                                    @endphp

                                                    @forelse ($orders as $order)
                                                        <div class="order-card card mb-3 border">
                                                            <div class="card-body">
                                                                <div class="row g-3">
                                                                    <div class="col-md-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="fas fa-user text-muted me-2"></i>
                                                                            <div>
                                                                                <small class="text-muted d-block">تحویل
                                                                                    گیرنده:</small>
                                                                                <span>{{ $order->address->first_name }} {{ $order->address->last_name }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="fas fa-phone text-muted me-2"></i>
                                                                            <div>
                                                                                <small class="text-muted d-block">شماره
                                                                                    تماس:</small>
                                                                                <span>{{ $order->address->mobile }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="fas fa-calendar text-muted me-2"></i>
                                                                            <div>
                                                                                <small
                                                                                    class="text-muted d-block">تاریخ:</small>
                                                                                <span>{{ jdate($order->created_at)->format('Y/m/d H:i') }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="fas fa-receipt text-muted me-2"></i>
                                                                            <div>
                                                                                <small class="text-muted d-block">شناسه
                                                                                    پرداخت:</small>
                                                                                <span>{{ $order->transaction ? $order->transaction->ref_number : 'بدون پرداخت' }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                                                            <div>
                                                                                <small
                                                                                    class="text-muted d-block">آدرس:</small>
                                                                                <span
                                                                                    class="text-truncate d-inline-block"
                                                                                    style="max-width: 200px;"
                                                                                    title="{{ $order->address->content }}">
                                                                                {{ $order->address->content }}
                                                                            </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="fas fa-hashtag text-muted me-2"></i>
                                                                            <div>
                                                                                <small class="text-muted d-block">کد
                                                                                    سفارش:</small>
                                                                                <span>{{ $order->unique_id }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="fas fa-truck text-muted me-2"></i>
                                                                            <div>
                                                                                <small class="text-muted d-block">کد
                                                                                    رهگیری:</small>
                                                                                <span>{{ $order->post_tracking_code ?: 'ثبت نشده' }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="fas fa-wallet text-muted me-2"></i>
                                                                            <div>
                                                                                <small class="text-muted d-block">مبلغ
                                                                                    کل:</small>
                                                                                <span>{{ number_format($order->final_price) }} تومان</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="fas fa-info-circle text-muted me-2"></i>
                                                                            <div>
                                                                                <small
                                                                                    class="text-muted d-block">وضعیت:</small>
                                                                                <span
                                                                                    class="badge bg-{{ $order->state_color }}">{{ $order->state_text }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <button
                                                                    class="btn btn-sm btn-outline-primary mt-3 toggle-order-details">
                                                                    <i class="fas fa-chevron-down me-1"></i>
                                                                    نمایش جزئیات سفارش
                                                                </button>

                                                                <div class="order-details mt-3" style="display: none;">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered table-hover">
                                                                            <thead class="table-light">
                                                                            <tr class="text-center">
                                                                                <th width="5%">#</th>
                                                                                <th width="15%">عکس</th>
                                                                                <th>نام محصول</th>
                                                                                <th width="10%">وضعیت</th>
                                                                                <th width="10%">تعداد</th>
                                                                                <th width="15%">قیمت واحد</th>
                                                                                <th width="15%">قیمت کل</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach ($order->orderItems as $key => $orderItem)
                                                                                <tr class="text-center">
                                                                                    <td>{{ $key + 1 }}</td>
                                                                                    <td>
                                                                                        <img
                                                                                            src="{{ is_string($orderItem->product_images) && !empty($orderItem->product_images) && is_array(json_decode($orderItem->product_images, true)) ? json_decode($orderItem->product_images)[0] : '/assets/front/images/product-default-img.png' }}"
                                                                                            class="img-thumbnail"
                                                                                            style="width: 80px; height: 80px; object-fit: cover;"
                                                                                            alt="{{ $orderItem->product_title }}">
                                                                                    </td>
                                                                                    <td>{{ $orderItem->product_title }}</td>
                                                                                    <td>
                                                                                        <span
                                                                                            class="badge bg-{{ $orderItem->state_color }}">
                                                                                            {{ $orderItem->state_text }}
                                                                                        </span>
                                                                                    </td>
                                                                                    <td>
                                                                                        تعداد: {{ $orderItem->sent_quantity }}</td>
                                                                                    <td>{{ number_format($orderItem->product_unit_price) }}
                                                                                        تومان
                                                                                    </td>
                                                                                    <td>{{ number_format($orderItem->product_unit_price * $orderItem->sent_quantity) }}
                                                                                        تومان
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="alert alert-info text-center">
                                                            <i class="fas fa-info-circle me-2"></i>
                                                            هیچ سفارشی ثبت نکرده اید.
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Addresses Tab -->
                                        <div
                                            class="tab-pane fade {{ request()->routeIs('front.user.address') ? 'active show' : '' }}"
                                            id="address">
                                            <div class="card shadow-sm">
                                                <div
                                                    class="card-header bg-light d-flex justify-content-between align-items-center">
                                                    <h3 class="mb-0">آدرس ها</h3>
                                                    <a href="{{ route('front.user.address.create') }}"
                                                       class="btn btn-sm btn-primary">
                                                        <i class="fas fa-plus me-1"></i> آدرس جدید
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    @php
                                                        $addresses = \App\Models\Address::where('user_id', auth()->user()->id)
                                                            ->with('city')
                                                            ->get();
                                                    @endphp

                                                    @if($addresses->isNotEmpty())
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead class="table-light">
                                                                <tr>
                                                                    <th>عنوان</th>
                                                                    <th>شهر</th>
                                                                    <th>آدرس</th>
                                                                    <th>کد پستی</th>
                                                                    <th>نام گیرنده</th>
                                                                    <th>تلفن</th>
                                                                    <th width="100px">عملیات</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($addresses as $address)
                                                                    <tr>
                                                                        <td>{{ $address->title }}</td>
                                                                        <td>{{ $address->city->title }}</td>
                                                                        <td>
                                                                            <span class="text-truncate d-inline-block"
                                                                                  style="max-width: 200px;"
                                                                                  title="{{ $address->content }}">
                                                                                {{ $address->content }}
                                                                            </span>
                                                                        </td>
                                                                        <td>{{ $address->postal_code }}</td>
                                                                        <td>{{ $address->full_name }}</td>
                                                                        <td>{{ $address->mobile }}</td>
                                                                        <td class="text-center">
                                                                            <div class="btn-group btn-group-sm">
                                                                                <a href="{{ route('front.user.address.create', ['addreessId' => $address->id]) }}"
                                                                                   class="btn btn-sm btn-outline-primary"
                                                                                   title="ویرایش">
                                                                                    <i class="fas fa-edit"></i>
                                                                                </a>

                                                                                <form
                                                                                    action="{{ route('front.user.addresses.destroy', $address->id) }}"
                                                                                    method="POST" class="d-inline">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                            class="btn btn-sm btn-outline-danger"
                                                                                            title="حذف"
                                                                                            onclick="return confirm('آیا از حذف این آدرس مطمئن هستید؟')">
                                                                                        <i class="fas fa-trash"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    @else
                                                        <div class="alert alert-info text-center">
                                                            <i class="fas fa-info-circle me-2"></i>
                                                            هیچ آدرسی ثبت نکرده اید.
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Address Create/Edit Tab -->
                                        <div
                                            class="tab-pane fade {{ request()->routeIs('front.user.address.create') ? 'active show' : '' }}"
                                            id="addressCreate">
                                            <div class="card shadow-sm">
                                                <div class="card-header bg-light">
                                                    <h3 class="mb-0">{{ isset($address) ? 'ویرایش آدرس' : 'افزودن آدرس جدید' }}</h3>
                                                </div>
                                                <div class="card-body">
                                                    @php
                                                        $address = null;
                                                        if(request()->has('addreessId')) {
                                                            $address = \App\Models\Address::query()
                                                                ->where('id', request()->addreessId)
                                                                ->with('city')
                                                                ->first();
                                                        }
                                                    @endphp

                                                    <form method="POST"
                                                          action="{{ $address ? route('front.user.addresses.update', $address->id) : route('front.user.addresses.store') }}">
                                                        @csrf
                                                        @if($address)
                                                            @method('PUT')
                                                        @endif

                                                        @include('partials.errors')

                                                        <!-- Same as me checkbox -->
                                                        <div class="form-check mb-4">
                                                            <input class="form-check-input" type="checkbox"
                                                                   id="sameAsMe" style="width: 1.2em; height: 1.2em;">
                                                            <label class="form-check-label" for="sameAsMe">
                                                                گیرنده خودم هستم
                                                            </label>
                                                        </div>

                                                        <div class="row g-3">
                                                            <!-- Name Fields -->
                                                            <div class="col-md-6">
                                                                <label for="first_name" class="form-label">نام <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="first_name"
                                                                       name="first_name"
                                                                       value="{{ old('first_name', $address->first_name ?? '') }}"
                                                                       required>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="last_name" class="form-label">نام خانوادگی
                                                                    <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="last_name"
                                                                       name="last_name"
                                                                       value="{{ old('last_name', $address->last_name ?? '') }}"
                                                                       required>
                                                            </div>

                                                            <!-- Contact Fields -->
                                                            <div class="col-md-6">
                                                                <label for="phone" class="form-label">تلفن ثابت</label>
                                                                <input type="text" class="form-control" id="phone"
                                                                       name="phone"
                                                                       value="{{ old('phone', $address->phone ?? '') }}">
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="mobile" class="form-label">شماره همراه <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="mobile"
                                                                       name="mobile"
                                                                       value="{{ old('mobile', $address->mobile ?? '') }}"
                                                                       required>
                                                            </div>

                                                            <!-- Address Title -->
                                                            <div class="col-12">
                                                                <label for="title" class="form-label">عنوان آدرس <small>(مانند:
                                                                        خانه، محل کار)</small></label>
                                                                <input type="text" class="form-control" id="title"
                                                                       name="title"
                                                                       value="{{ old('title', $address->title ?? '') }}"
                                                                       placeholder="عنوان آدرس">
                                                            </div>

                                                            <!-- Province and City -->
                                                            <div class="col-md-6">
                                                                <label for="province_id" class="form-label">استان <span
                                                                        class="text-danger">*</span></label>
                                                                <select class="form-select select2" id="province_id"
                                                                        name="province_id" required>
                                                                    <option value="">انتخاب استان</option>
                                                                    @foreach (\App\Models\Province::query()->orderBy("show_order")->with('cities')->get() as $province)
                                                                        <option value="{{ $province->id }}"
                                                                            {{ old('province_id', $address->city->province_id ?? '') == $province->id ? 'selected' : '' }}>
                                                                            {{ $province->title }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="city_id" class="form-label">شهر <span
                                                                        class="text-danger">*</span></label>
                                                                <select class="form-select select2" id="city_id"
                                                                        name="city_id" required>
                                                                    <option value="">انتخاب شهر</option>
                                                                    @if(isset($address))
                                                                        @foreach(\App\Models\City::query()->where('province_id', $address->city->province_id)->orderBy("show_order")->get() as $city)
                                                                            <option value="{{ $city->id }}"
                                                                                {{ old('city_id', $address->city_id ?? '') == $city->id ? 'selected' : '' }}>
                                                                                {{ $city->title }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>

                                                            <!-- Address Details -->
                                                            <div class="col-12">
                                                                <label for="content" class="form-label">آدرس دقیق <span
                                                                        class="text-danger">*</span></label>
                                                                <textarea class="form-control" id="content"
                                                                          name="content" rows="3"
                                                                          required>{{ old('content', $address->content ?? '') }}</textarea>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="postal_code" class="form-label">کد
                                                                    پستی</label>
                                                                <input type="text" class="form-control" id="postal_code"
                                                                       name="postal_code"
                                                                       value="{{ old('postal_code', $address->postal_code ?? '') }}">
                                                            </div>

                                                            <div class="col-12 mt-4">
                                                                <button type="submit" class="btn btn-primary px-4">
                                                                    <i class="fas fa-save me-1"></i> ذخیره آدرس
                                                                </button>
                                                                <a href="{{ route('front.user.address') }}"
                                                                   class="btn btn-outline-secondary px-4">
                                                                    <i class="fas fa-times me-1"></i> انصراف
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Account Details Tab -->
                                        <div
                                            class="tab-pane fade {{ request()->routeIs('front.user.account') ? 'active show' : '' }}"
                                            id="account-detail">
                                            <div class="card shadow-sm">
                                                <div class="card-header bg-light">
                                                    <h3 class="mb-0">اطلاعات حساب کاربری</h3>
                                                </div>
                                                <div class="card-body">
                                                    <form method="POST" action="{{ route('front.user.update') }}">
                                                        @csrf
                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <label class="form-label">نام <span class="text-danger">*</span></label>
                                                                <input
                                                                    class="form-control @error('first_name') is-invalid @enderror"
                                                                    name="first_name"
                                                                    value="{{ old('first_name', auth()->user()->first_name) }}"
                                                                    required>
                                                                @error('first_name')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label">نام خانوادگی <span
                                                                        class="text-danger">*</span></label>
                                                                <input
                                                                    class="form-control @error('last_name') is-invalid @enderror"
                                                                    name="last_name"
                                                                    value="{{ old('last_name', auth()->user()->last_name) }}"
                                                                    required>
                                                                @error('last_name')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label">شماره همراه <span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control"
                                                                       value="{{ auth()->user()->phone }}"
                                                                       disabled>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label">جنسیت</label>
                                                                <select
                                                                    class="form-select @error('gender_enum') is-invalid @enderror"
                                                                    name="gender_enum">
                                                                    <option value="">انتخاب کنید</option>
                                                                    <option
                                                                        value="{{ \App\Enums\UserGenderEnum::FEMALE }}"
                                                                        {{ old('gender_enum', auth()->user()->gender_enum) == \App\Enums\UserGenderEnum::FEMALE ? 'selected' : '' }}>
                                                                        زن
                                                                    </option>
                                                                    <option
                                                                        value="{{ \App\Enums\UserGenderEnum::MALE }}"
                                                                        {{ old('gender_enum', auth()->user()->gender_enum) == \App\Enums\UserGenderEnum::MALE ? 'selected' : '' }}>
                                                                        مرد
                                                                    </option>
                                                                </select>
                                                                @error('gender_enum')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label">رمز عبور جدید</label>
                                                                <input type="password"
                                                                       class="form-control @error('password') is-invalid @enderror"
                                                                       name="password">
                                                                @error('password')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                                <small class="text-muted">در صورت عدم تمایل به تغییر رمز
                                                                    عبور، این فیلد را خالی بگذارید.</small>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label">تکرار رمز عبور</label>
                                                                <input type="password"
                                                                       class="form-control @error('cpassword') is-invalid @enderror"
                                                                       name="cpassword">
                                                                @error('cpassword')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-12 mt-4">
                                                                <button type="submit" class="btn btn-primary px-4">
                                                                    <i class="fas fa-save me-1"></i> ذخیره تغییرات
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @endsection

        @section('script')
            <script>
                $(document).ready(function () {
                    // Same as me functionality
                    $('#sameAsMe').change(function () {
                        const isChecked = $(this).is(':checked');
                        const userData = {
                            first_name: '{{ auth()->user()->first_name }}',
                            last_name: '{{ auth()->user()->last_name }}',
                            mobile: '{{ auth()->user()->phone }}'
                        };

                        if (isChecked) {
                            $('#first_name').val(userData.first_name).prop('readonly', true);
                            $('#last_name').val(userData.last_name).prop('readonly', true);
                            $('#mobile').val(userData.mobile).prop('readonly', true);
                        } else {
                            $('#first_name').val('').prop('readonly', false);
                            $('#last_name').val('').prop('readonly', false);
                            $('#mobile').val('').prop('readonly', false);
                        }
                    });

                    // Toggle order details
                    $('.toggle-order-details').click(function () {
                        const detailsDiv = $(this).siblings('.order-details');
                        const icon = $(this).find('i');

                        detailsDiv.slideToggle(function () {
                            if (detailsDiv.is(':visible')) {
                                icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
                            } else {
                                icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
                            }
                        });
                    });

                    // Initialize Select2
                    $('.select2').select2({
                        placeholder: "انتخاب کنید",
                        allowClear: true
                    });

                    // Province and city dynamic dropdown
                    const provincesAndCities = @json(\App\Models\Province::with('cities')->get());

                    $('#province_id').on('change', function () {
                        const provinceId = $(this).val();
                        const citySelect = $('#city_id');

                        citySelect.empty().append('<option value="">انتخاب شهر</option>');

                        if (provinceId) {
                            const province = provincesAndCities.find(p => p.id == provinceId);

                            if (province) {
                                province.cities.forEach(city => {
                                    citySelect.append(new Option(city.title, city.id));
                                });
                            }
                        }

                        citySelect.trigger('change');
                    });
                });
            </script>
        @endsection
