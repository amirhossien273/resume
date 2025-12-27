@extends('front.layout.app')

@section('page')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <main class="main">
        <div class="py-3 bg-light">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('front.home')}}"><i class="fa fa-home me-2"></i> خانه</a></li>
                        <li class="breadcrumb-item active" aria-current="page">سبد خرید</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container my-5">
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <h1 class="h2 mb-3">سبد خرید</h1>
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">تعداد <span class="text-primary">{{ count($carts) }}</span> محصول در سبد خرید</h6>
                        @if(count($carts) > 0)
                            <a href="{{ route('front.cart.remove_all') }}" class="text-danger text-decoration-none"><i class="fa fa-trash me-2"></i>پاک کردن سبد خرید</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mb-4">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(count($carts) !== 0)
                        <div class="card mb-4">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                        <tr>
                                            <th scope="col" colspan="2" class="ps-4">محصولات</th>
                                            <th scope="col">قیمت</th>
                                            <th scope="col" class="text-center">تعداد</th>
                                            <th scope="col">جمع</th>
                                            <th scope="col" class="pe-4 text-end">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $total = 0;
                                            $hamle = \App\Models\Setting::where('id', 1)->first()->value;
                                        @endphp
                                        @foreach ($carts as $cart)
                                            @php
                                                $total += $cart->quantity * $cart->productItem->price;
                                            @endphp
                                            <tr class="align-middle">
                                                <td class="ps-4 d-block mx-auto" style="width: 100px;">
                                                    <img src="{{ $cart->productItem->firstMedia?->media_uri ?? '/assets/front/images/product-default-img.png' }}" alt="{{ $cart->productItem->product->title }}" class="img-fluid rounded" style="max-height: 80px;">
                                                </td>
                                                <td>
                                                    <h6 class="mb-1">
                                                        <a class="text-decoration-none" href="{{route('front.product.show', ['unique_id' => $cart->productItem->product->unique_id, 'slug' => $cart->productItem->product->slug])}}">
                                                            {{ $cart->productItem->product->title }}
                                                        </a>
                                                    </h6>
                                                </td>
                                                <td>
                                                    <span class="text-muted">{{ number_format($cart->productItem->price) }} تومان</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="input-group" style="max-width: 200px;">
                                                            <input type="text" class="form-control text-center qty-val" value="{{ $cart->quantity }}" readonly>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">{{ number_format($cart->quantity * $cart->productItem->price)}} تومان</span>
                                                </td>
                                                <td class="pe-4 text-end">
                                                    <a href="{{ route('front.cart.destroy', $cart) }}" class="btn btn-sm btn-outline-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title mb-3">کد تخفیف</h5>
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="voucher" placeholder="کد تخفیف">
                                        <button class="btn btn-primary py-1" type="submit">اعمال</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    @else
                        <div class="card">
                            <div class="card-body text-center py-5">
                                <div class="mb-4">
                                    <i class="fa fa-shopping-cart fa-4x text-muted"></i>
                                </div>
                                <h4 class="mb-3">سبد خرید شما خالی است</h4>
                                <p class="text-muted mb-4">می‌توانید برای مشاهده محصولات به صفحه فروشگاه بروید</p>
                                <a href="{{ route('front.product.index') }}" class="btn btn-primary">مشاهده محصولات</a>
                            </div>
                        </div>
                    @endif
                </div>

                @if(count($carts) !== 0)
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-4">خلاصه سفارش</h5>

                                <ul class="list-group list-group-flush mb-4">
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        <span class="text-muted">قیمت</span>
                                        <span>{{ number_format($total) }} تومان</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        <span class="text-muted">تخفیف</span>
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
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 border-bottom-0">
                                        @isset($voucher)
                                            @php
                                                $total -= $voucher->discount_price ?? 0;
                                                $total -= ($total * ($voucher->discount_percent ?? 0) / 100);
                                            @endphp
                                        @endisset
                                        <span class="fw-bold">جمع کل</span>
                                        <span class="fw-bold">{{ number_format($total) }} تومان</span>
                                    </li>
                                </ul>

                                <a href="{{ route('front.checkout.index', isset($voucher) ? ['voucher' => $voucher->code] : []) }}" class="btn btn-primary w-100 py-3">
                                    <i class="fa fa-arrow-left ms-2"></i> ادامه به پرداخت
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
\
