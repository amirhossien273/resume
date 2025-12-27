<!DOCTYPE html>
<html lang="ar" dir="rtl" class="rtl">
<head>
    <meta charset="utf-8"/>
    <title>عطاری سمیع - سمیع عطار</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:title" content=""/>
    <meta property="og:type" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/front/imgs/theme/favicon.svg"/>

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/front/css/all.min.css">
    <link rel="stylesheet" href="{{url('assets/front/css/plugins/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{url('assets/front/css/main.css?v=6.0')}}"/>
    @yield('style')
</head>

<body>

@section('Modal')
@show


<!-- Quick view -->
<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src="{{url('assets/front/imgs/shop/product-16-2.jpg')}}" alt="product image"/>
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{url('assets/front/imgs/shop/product-16-1.jpg')}}" alt="product image"/>
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{url('assets/front/imgs/shop/product-16-3.jpg')}}" alt="product image"/>
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{url('assets/front/imgs/shop/product-16-4.jpg')}}" alt="product image"/>
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{url('assets/front/imgs/shop/product-16-5.jpg')}}" alt="product image"/>
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{url('assets/front/imgs/shop/product-16-6.jpg')}}" alt="product image"/>
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{url('assets/front/imgs/shop/product-16-7.jpg')}}" alt="product image"/>
                                </figure>
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                <div><img src="{{url('assets/front/imgs/shop/thumbnail-3.jpg')}}" alt="product image"/>
                                </div>
                                <div><img src="{{url('assets/front/imgs/shop/thumbnail-4.jpg')}}" alt="product image"/>
                                </div>
                                <div><img src="{{url('assets/front/imgs/shop/thumbnail-5.jpg')}}" alt="product image"/>
                                </div>
                                <div><img src="{{url('assets/front/imgs/shop/thumbnail-6.jpg')}}" alt="product image"/>
                                </div>
                                <div><img src="{{url('assets/front/imgs/shop/thumbnail-7.jpg')}}" alt="product image"/>
                                </div>
                                <div><img src="{{url('assets/front/imgs/shop/thumbnail-8.jpg')}}" alt="product image"/>
                                </div>
                                <div><img src="{{url('assets/front/imgs/shop/thumbnail-9.jpg')}}" alt="product image"/>
                                </div>
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <span class="stock-status out-stock"> Sale Off </span>
                            <h3 class="title-detail"><a href="{{route('front.product.index')}}" class="text-heading">آویشن
                                    سابیده</a></h3>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">$38</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15">26% Off</span>
                                        <span class="old-price font-md ml-15">$52</span>
                                    </span>
                                </div>
                            </div>
                            <div class="detail-extralink mb-30">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <span class="qty-val">1</span>
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart"><i
                                            class="fi-rs-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                            <div class="font-xs">
                                <ul>
                                    <li class="mb-5">Vendor: <span class="text-brand">سمیع عطار</span></li>
                                    <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2024</span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header-area header-style-1 header-height-2">
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1 py-1">
                    <a href="{{route('front.home')}}"><img src="{{url('assets/front/imgs/theme/logo.svg')}}"
                                                           alt="logo"/></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="{{ route('front.product.index') }}" method="GET">
                            <select class="select-active" name="categry_id">
                                <option value="">دسته بندی ها</option>
                                @foreach (\App\Models\Category::get() as $category)
                                   <option value="{{ $category->id }}" @if( $category->id ==  request()->get('categry_id') ) selected @endif>{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <input name="search" value="{{ request()->get('search') }}" type="text" placeholder=" محصول خود را وارد کنید خود را انتخاب کنید..."/>
                        </form>
                    </div>
                    <div class="header-action-right">
                        @auth
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    @php
                                        $carts = \App\Models\CartItem::where('creator_id', auth()->user()->id)
                                        ->with(['productItem' => function($query) {
                                            $query->with(['product' => function($query) {
                                                $query->with('media');
                                            }]);
                                        }])->get();
                                        $total = 0;
                                    @endphp
                                    <a class="mini-cart-icon" href="{{route('front.cart')}}">
                                        <img alt="Nest" src="{{url('assets/front/imgs/theme/icons/icon-cart.svg')}}"/>
                                        @if(count($carts) !== 0)
                                           <span class="pro-count blue">{{ count($carts) }}</span>
                                        @endif
                                    </a>
                                    <a href="{{route('front.cart')}}"><span class="lable">سبد خرید</span></a>
                                    @if(count($carts) !== 0)
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            <ul>
                                                @foreach ($carts as $cart)
                                                <li>
                                                    <div class="shopping-cart-img">
                                                        <a alt="{{ $cart->productItem->product->title }}" href="{{route('front.product.show', ['unique_id' => $cart->productItem->product->unique_id, 'slug' => $cart->productItem->product->slug])}}">
                                                            <img alt="Nest" src="{{ $cart->productItem->product->media->first()?->media_uri ?? '/assets/front/images/product-default-img.png' }}"/>
                                                        </a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4>
                                                            <a href="{{route('front.product.show', ['unique_id' => $cart->productItem->product->unique_id, 'slug' => $cart->productItem->product->slug])}}">
                                                                {{ $cart->productItem->product->title }}
                                                            </a>
                                                        </h4>
                                                        <h4><span>{{ $cart->quantity }} × </span>{{ number_format($cart->productItem->price) }}</h4>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="{{ route('front.cart.destroy', $cart) }}"><i class="fi-rs-cross-small"></i></a>
                                                    </div>
                                                </li>
                                                @php
                                                   $total +=  $cart->quantity * $cart->productItem->price
                                                @endphp
                                                @endforeach
                                            </ul>
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <h4>  قیمت کل   <span>  {{ number_format($total) }} </span></h4>
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="{{route('front.cart')}}" class="outline">مشاهده سبد خرید</a>
                                                    <!-- <a href="{{route('front.checkout.index')}}">Checkout</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="{{route('front.user.profile')}}">
                                        <img class="svgInject" alt="Nest"
                                            src="{{url('assets/front/imgs/theme/icons/icon-user.svg')}}"/>
                                    </a>
                                    <a href="{{route('front.user.profile')}}"><span
                                            class="lable ml-0">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="{{route('front.user.profile')}}"><i
                                                        class="fi fi-rs-user mr-10"></i>پروفایل</a>
                                            </li>
                                            <li>
                                                <a href="{{route('front.user.profile')}}"><i
                                                        class="fi fi-rs-location-alt mr-10"></i>سفارشات</a>
                                            </li>
                                            <li>
                                                <a href="{{route('front.user.profile')}}"><i
                                                        class="fi fi-rs-label mr-10"></i>اطلاعات</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('front.auth.logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>خروج</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a href="{{route('front.user.profile')}}">
                                        <img class="svgInject" alt="Nest"
                                            src="{{url('assets/front/imgs/theme/icons/icon-user.svg')}}"/>
                                    </a>
                                    <a href="{{route('front.user.profile')}}"><span
                                            class="lable ml-0">حساب کاربری</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="{{route('front.auth.login')}}"><i
                                                        class="fi fi-sign-in-alt mr-10"></i>ورود</a>
                                            </li>
                                            <li>
                                                <a href="{{route('front.auth.register')}}"><i
                                                        class="fi fi-rs mr-10"></i>ثبت نام</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none px-3">
                    <a href="{{route('front.home')}}"><img src="{{url('assets/front/imgs/theme/logo.svg')}}"
                                                           alt="logo"/></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <span class="et"></span>تمامی دسته بندی ها
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            @php
                               $categories = \App\Models\Category::get();
                            @endphp
                            @foreach($categories as $index => $category)
                                <div class="d-flex categori-dropdown-inner">
                                    <ul class="col-6">
                                        @if(isset($categories[$index * 2]))
                                            <li>
                                                <a href="{{ route('front.product.index_with_category', $categories[$index * 2]->slug ) }}">
                                                    <img src="{{ url('assets/front/imgs/theme/icons/' . $categories[$index * 2]->icon) }}" alt=""/>
                                                    {{ $categories[$index * 2]->title }}
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                    <ul class="end col-6">
                                        @if(isset($categories[$index * 2 + 1]))
                                            <li>
                                                <a href="{{ route('front.product.index_with_category', $categories[$index * 2 + 1]->slug) }}">
                                                    <img src="{{ url('assets/front/imgs/theme/icons/' . $categories[$index * 2 + 1]->icon) }}" alt=""/>
                                                    {{ $categories[$index * 2 + 1]->title }}
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li class="hot-deals"><img src="{{url('assets/front/imgs/theme/icons/icon-hot.svg')}}"
                                                           alt="hot deals"/><a href="{{route('front.product.amazing')}}">شگفت
                                        انگیز</a></li>

                                <li>
                                    <a href="{{route('front.product.index')}}">محصولات</a>
                                </li>
                                <li>
                                    <a href="{{route('front.contact')}}">تماس باما</a>
                                </li>
                                <li>
                                    <a href="{{route('front.about')}}">درباره ما</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{url('assets/front/imgs/theme/icons/icon-headphone.svg')}}" alt="hotline"/>
                    <p><a href="tel:09031346614">09031346614</a><span>پشتیبانی 24/7 </span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    @auth
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            @php
                                $carts = \App\Models\CartItem::where('creator_id', auth()->user()->id)
                                ->with(['productItem' => function($query) {
                                    $query->with(['product' => function($query) {
                                        $query->with('media');
                                    }]);
                                }])->get();
                                $total = 0;
                            @endphp
                            <a class="mini-cart-icon" href="{{route('front.cart')}}">
                                <img alt="Nest" src="{{url('assets/front/imgs/theme/icons/icon-cart.svg')}}"/>
                                @if(count($carts) !== 0)
                                    <span class="pro-count blue">{{ count($carts) }}</span>
                                @endif
                            </a>
                            <a href="{{route('front.cart')}}"><span class="lable">سبد خرید</span></a>
                            @if(count($carts) !== 0)
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        @foreach ($carts as $cart)
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a alt="{{ $cart->productItem->product->title }}" href="{{route('front.product.show', ['unique_id' => $cart->productItem->product->unique_id, 'slug' => $cart->productItem->product->slug])}}">
                                                    <img src="{{ $cart->productItem->firstMedia?->media_uri ?? '/assets/front/images/product-default-img.png' }}" />

                                                </a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4>
                                                    <a href="{{route('front.product.show', ['unique_id' => $cart->productItem->product->unique_id, 'slug' => $cart->productItem->product->slug])}}">
                                                        {{ $cart->productItem->product->title }}
                                                    </a>
                                                </h4>
                                                <h4><span>{{ $cart->quantity }} × </span>{{ number_format($cart->productItem->price) }}</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="{{ route('front.cart.destroy', $cart) }}"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        @php
                                            $total +=  $cart->quantity * $cart->productItem->price
                                        @endphp
                                        @endforeach
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>قیمت کل <span>{{ number_format($total) }}</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{route('front.cart')}}" class="outline">مشاهده سبد خرید</a>
                                            <!-- <a href="{{route('front.checkout.index')}}">Checkout</a> -->
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{route('front.home')}}"><img src="{{url('assets/front/imgs/theme/logo.svg')}}"
                                                       alt="logo"/></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="{{ route('front.product.index') }}" method="GET">
                    <input type="text" name="search" placeholder="نام محصول خود را وارد کنید..."/>
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                           <a href="{{route('front.product.amazing')}}">شگفت انگیز</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{route('front.product.index')}}">محصولات</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{route('front.contact')}}">تماس باما</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{route('front.about')}}">درباره ما</a>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="d-flex justify-content-start single-mobile-header-info">
                    @auth
                        <a href="{{route('front.user.profile')}}"><span class="lable ml-0 me-2">حساب کاربری</span>
                        @else
                        <a href="{{ route('front.auth.login') }}"><i class="fi-rs-user me-2"></i>ورود / ثبت نام </a>
                    @endauth
                </div>
                <div class="d-flex justify-content-start single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones me-2"></i> <a href="tel:09031346614">09031346614</a></a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">دنبال کنید:</h6>
                <a href="#"><img src="{{url('assets/front/imgs/theme/icons/icon-facebook-white.svg')}}" alt=""/></a>
                <a href="#"><img src="{{url('assets/front/imgs/theme/icons/icon-twitter-white.svg')}}" alt=""/></a>
                <a href="#"><img src="{{url('assets/front/imgs/theme/icons/icon-instagram-white.svg')}}" alt=""/></a>
                <a href="#"><img src="{{url('assets/front/imgs/theme/icons/icon-pinterest-white.svg')}}" alt=""/></a>
                <a href="#"><img src="{{url('assets/front/imgs/theme/icons/icon-youtube-white.svg')}}" alt=""/></a>
            </div>
            <div class="site-copyright"> © تمامی حقوق محفوظ است.</div>
        </div>
    </div>
</div>
<!--End header-->
@yield("page")
<footer class="main">
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                                أخرین اخبار سمیع عطار را
                                <br>
                                در ایمیل خود داشته باشید.
                            </h2>
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="ایمیل خود را وارد کنید"/>
                                <button class="btn" type="submit">عضویت</button>
                            </form>
                        </div>
                        <img src="{{url('assets/front/imgs/banner/banner-footer.png')}}" alt="newsletter"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay="0">
                        <div class="banner-icon">
                            <img src="{{url('assets/front/imgs/adv/hot-price-64.png')}}" alt=""/>
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">تضمین بهترین قیمت</h3>
                            <p>همیشه و برای همه</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay=".1s">
                        <div class="banner-icon">
                            <img src="{{url('assets/front/imgs/adv/fast-delivery-64.png')}}" alt=""/>
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">تحویل سریع</h3>
                            <p>در کمترین زمان</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay=".2s">
                        <div class="banner-icon">
                            <img src="{{url('assets/front/imgs/adv/free-delivery-60.png')}}" alt=""/>
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">ارسال رایگان شهر اهواز</h3>
                            <p>در همان روز</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay=".3s">
                        <div class="banner-icon">
                            <img src="{{url('assets/front/imgs/adv/quality-64.png')}}" alt=""/>
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">مرغوب ترین کالاها</h3>
                            <p>با کیفیت ترین و مرغوب ترین</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay=".4s">
                        <div class="banner-icon">
                            <img src="{{url('assets/front/imgs/adv/24-hours-64.png')}}" alt=""/>
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">پشتیبانی ۲۴ ساعته</h3>
                            <p>همواره همراه شما</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay=".5s">
                        <div class="banner-icon">
                            <img src="{{url('assets/front/imgs/theme/icons/icon-6.svg')}}" alt=""/>
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Safe delivery</h3>
                            <p>طی 30 روز</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp"
                         data-wow-delay="0">
                        <div class="logo mb-30">
                            <a href="{{route('front.home')}}" class="mb-15"><img
                                    src="{{url('assets/front/imgs/theme/logo.svg')}}" alt="logo"/></a>
                            <p class="font-lg text-heading">عطاری سمیع</p>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="{{url('assets/front/imgs/theme/icons/icon-location.svg')}}" alt=""/><strong>آدرس: </strong>
                                <span>اهواز - مجتمع بنکداران - خ مولوی - انتهای فاز سه</span></li>
                            <li><img src="{{url('assets/front/imgs/theme/icons/icon-contact.svg')}}" alt=""/><strong>شماره
                                    تماس:</strong><span><a href="tel:09031346614">09031346614</a></span></li>
                            <li><img src="{{url('assets/front/imgs/theme/icons/icon-email-2.svg')}}" alt=""/><strong>ایمیل:</strong><span><a href="mailto:info@samieattar.com">info@samieattar.com</a>	</span>
                            </li>
                            <li><img src="{{url('assets/front/imgs/theme/icons/icon-clock.svg')}}" alt=""/><strong>ساعت
                                    کاری:</strong><span>8:00 - 17:30</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4 class="widget-title">دسترسی سریع</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="{{route('front.about')}}">درباره ما</a></li>
                        <li><a href="{{route('front.product.index')}}">محصولات</a></li>
                        <li><a href="{{route('front.contact')}}">تماس باما</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="widget-title">حساب کاربری</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="{{ route('front.auth.register') }}">ثبت نام</a></li>
                        <li><a href="{{ route('front.auth.login') }}">سبد خرید</a></li>
                        <li><a href="{{ route('front.auth.login') }}">سفارش من</a></li>
                    </ul>
                </div>
                {{-- <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <h4 class="widget-title">محصولات محبوب</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">آرد سوخاری</a></li>
                        <li><a href="#">حناسدر</a></li>
                        <li><a href="#">جوشانده</a></li>
                        <li><a href="#">اکسین</a></li>
                        <li><a href="#">گیاه</a></li>
                        <li><a href="#">بذر لعابی</a></li>
                        <li><a href="#">چای</a></li>
                    </ul>
                </div> --}}
                <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp"
                     data-wow-delay=".5s">
                    <p class="mb-20">درگاه های پرداخت امن</p>
                      <img style="width: 150px;height: 100px;" class="" src="{{url('assets/front/imgs/theme/behpardakht_logo.svg')}}" alt=""/>
                    <p>
                        <a referrerpolicy='origin' target='_blank' href='https://trustseal.enamad.ir/?id=509863&Code=agZYpjX9r3gXLMMDdVnhcpzgm89OG3bL'><img referrerpolicy='origin' src='https://trustseal.enamad.ir/logo.aspx?id=509863&Code=agZYpjX9r3gXLMMDdVnhcpzgm89OG3bL' alt='' style='cursor:pointer' code='agZYpjX9r3gXLMMDdVnhcpzgm89OG3bL'></a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">&copy; 2024, <strong class="text-brand">سمیع عطار</strong> - آرتیبرگ <br/>تمامی
                    حقوق محفوظ است.</p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                <div class="hotline d-lg-inline-flex mr-30">
                    <img src="{{url('assets/front/imgs/theme/icons/phone-call.svg')}}" alt="hotline"/>
                    <p><a href="tel:09031346614">09031346614</a><span>از ساعت 8:00 - 22:00</span></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>دنبال کنید:</h6>
                    <a href="#"><img src="{{url('assets/front/imgs/theme/icons/icon-facebook-white.svg')}}" alt=""/></a>
                    <a href="#"><img src="{{url('assets/front/imgs/theme/icons/icon-twitter-white.svg')}}" alt=""/></a>
                    <a href="#"><img src="{{url('assets/front/imgs/theme/icons/icon-instagram-white.svg')}}"
                                     alt=""/></a>
                    <a href="#"><img src="{{url('assets/front/imgs/theme/icons/icon-pinterest-white.svg')}}"
                                     alt=""/></a>
                    <a href="#"><img src="{{url('assets/front/imgs/theme/icons/icon-youtube-white.svg')}}" alt=""/></a>
                </div>
                <p class="font-sm">۱۵٪ تخفیف با دنبال کردن شبکه های اجتماعی</p>
            </div>
        </div>
    </div>
</footer>
<!-- Preloader Start -->
<!-- <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="text-center">
                        <img src="assets/front/imgs/theme/loading.gif" alt="" />
                    </div>
                </div>
            </div>
        </div> -->
<!-- Vendor JS-->
<script src="{{url('assets/front/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{url('assets/front/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{url('assets/front/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{url('assets/front/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('assets/front/js/plugins/slick.js')}}"></script>
<script src="{{url('assets/front/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{url('assets/front/js/plugins/waypoints.js')}}"></script>
<script src="{{url('assets/front/js/plugins/wow.js')}}"></script>
<script src="{{url('assets/front/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{url('assets/front/js/plugins/magnific-popup.js')}}"></script>
<script src="{{url('assets/front/js/plugins/select2.min.js')}}"></script>
<script src="{{url('assets/front/js/plugins/counterup.js')}}"></script>
<script src="{{url('assets/front/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{url('assets/front/js/plugins/images-loaded.js')}}"></script>
<script src="{{url('assets/front/js/plugins/isotope.js')}}"></script>
<script src="{{url('assets/front/js/plugins/scrollup.js')}}"></script>
<script src="{{url('assets/front/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{url('assets/front/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{url('assets/front/js/plugins/jquery.elevatezoom.js')}}"></script>
<!-- Template  JS -->
<script src="{{url('assets/front/js/main.js?v=6.0')}}"></script>
<script src="{{url('assets/front/js/shop.js?v=6.0')}}"></script>
@yield('script')
</body>
</html>
