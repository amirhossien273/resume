@extends('front.layout.app')

@section('page')
    <main class="main">
        <section class="home-slider position-relative mb-30">
            <div class="container">
                <div class="home-slide-cover mt-30">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        @foreach ($sliders as $slider)
                            <a @isset($slider->url) href="{{ $slider->url }}" @endisset class="single-hero-slider single-animation-wrap"
                                 style="background-image: url({{ $slider->getFirstMediaUrl('slider') }})">
                                <div class="slider-content">
                                    <h1 class="display-6 mb-40 text-white">
                                        {{ $slider->title }}
                                    </h1>
                                    <p class="mb-65 text-white">{{ $slider->intro }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
        </section>
        <!--End hero slider-->
        <section class="popular-categories section-padding">
            <div class="container wow animate__animated animate__fadeIn">
                <div class="section-title">
                    <div class="title">
                        <h3>دسته بندی ها</h3>
                        <ul class="list-inline nav nav-tabs links">
                            @php
                                $categories = \App\Models\Category::query()->where('is_active', true)->orderBy('show_order')->get();
                               $color_bk = ['bg-9', 'bg-10', 'bg-11', 'bg-12', 'bg-13', 'bg-14', 'bg-15'];
                            @endphp
                            @if (count($categories) !== 0)
                                @foreach ($categories->chunk(6)[0] as $category)
                                    <li class="list-inline-item nav-item"><a class="nav-link"
                                                                             href="{{route('front.product.index_with_category', $category->slug)}}">{{ $category->title }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                         id="carausel-10-columns-arrows"></div>
                </div>
                <div class="carausel-10-columns-cover position-relative">
                    <div class="carausel-10-columns" id="carausel-10-columns">
                        @foreach ($categories as $category)
                            <div class="card-2 {{ $color_bk[rand(0, 6)] }} wow animate__animated animate__fadeInUp"
                                 data-wow-delay=".1s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="{{route('front.product.index_with_category', $category->slug)}}"><img
                                            src="{{ $category->getFirstMediaUrl("category") }}"
                                            alt="{{ $category->title }}"/></a>
                                </figure>
                                <h6>
                                    <a href="{{route('front.product.index_with_category', $category->slug)}}">{{ $category->title }}</a>
                                </h6>
                                {{-- <span>26 محصول</span> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--End category slider-->
        <section class="banners mb-25">
            <div class="container">
                <div class="row">
                    @foreach ($banners as $banner)
                        <div class="col-lg-4 col-md-6">
                            <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                <img src="{{ $banner->getFirstMediaUrl('banner') }}" alt=""/>
                                <div class="banner-text">
                                    <h4>{{ $banner->title }}</h4>
                                    <a href="{{ $banner->link }}" class="btn btn-xs">بخرید <i
                                            class="fi-rs-arrow-small-left"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--End banners-->

        <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>محصولات</h3>
                    <ul class="nav nav-tabs links" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                                    data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                                    aria-selected="true">همه
                            </button>
                        </li>
                        @if (count($categories) !== 0)
                            @foreach ($categories->chunk(6)[0] as $category)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab"
                                            data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two"
                                            aria-selected="false">{{ $category->title }}</button>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @foreach ($firstPageProducts as $product)
                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                         data-wow-delay=".1s">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">
                                                    <img class="default-img" src="{{ $product->media[0]->media_uri }}"
                                                         alt=""/>
                                                    @if (isset($product->media[1]) && !empty($product->media[1]))
                                                        <img class="hover-img" src="{{ $product->media[1]->media_uri }}"
                                                             alt=""/>
                                                    @else
                                                        <img class="hover-img" src="{{ $product->media[0]->media_uri }}"
                                                             alt=""/>
                                                    @endif
                                                </a>
                                            </div>
                                            @isset($product->productItems[0])
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    @if ($product->productItems[0]->is_special)
                                                        <span class="hot">ویژه</span>
                                                    @elseif ($product->productItems[0]->is_new)
                                                        <span class="new">جدید</span>
                                                    @elseif ($product->productItems[0]->is_on_sale)
                                                        <span class="sale">حراج</span>
                                                    @elseif ($product->productItems[0]->is_best_seller)
                                                        <span class="best">پر فروش ترین</span>
                                                    @endif
                                                </div>
                                            @endisset
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="{{route('front.product.index')}}">{{ $product->category->title }}</a>
                                            </div>
                                            <h2>
                                                <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">{{ $product->title }}</a>
                                            </h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">توسط <a
                                                        href="vendor-details-1.html">سمیع عطار</a></span>
                                            </div>
                                            @isset($product->productItems[0])
                                                <div class="product-card-bottom">
                                                    <div class="product-price">
                                                        <span>{{ number_format($product->productItems[0]->price)}} </span>
                                                        <small class="text-muted">تومان</small>
                                                        {{-- <span class="old-price">250,000</span> --}}
                                                    </div>
                                                    <div class="add-cart">
                                                        <a class="add"
                                                           href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
"><i
                                                                class="fi-rs-shopping-cart mr-5"></i> خرید </a>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="product-card-bottom">
                                                    <div class="product-price text-secondary">
                                                        <span>ناموجود</span>
                                                    </div>
                                                </div>
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!--end product card-->
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab one-->
                </div>
                <!--End tab-content-->
            </div>
        </section>
        <!--Products Tabs-->
        {{-- <section class="section-padding pb-5">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn">
                    <h3 class="">پرفروش های روزانه</h3>
                </div>
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                        <div class="banner-img style-2">
                            <div class="banner-text">
                                <h2 class="mb-100">محصولات ارگانیک</h2>
                                <a href="{{route('front.product.index')}}" class="btn btn-xs">بخرید <i
                                        class="fi-rs-arrow-small-left"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel"
                                 aria-labelledby="tab-one-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                         id="carausel-4-columns-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                        @foreach ($bestSellerProducts as $product)
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}">
                                                            <img class="default-img"
                                                                 src="{{ $product->media[0]->media_uri }}" alt=""/>
                                                            @if (isset($product->media[1]) && !empty($product->media[1]))
                                                                <img class="hover-img"
                                                                     src="{{ $product->media[1]->media_uri }}" alt=""/>
                                                            @else
                                                                <img class="hover-img"
                                                                     src="{{ $product->media[0]->media_uri }}" alt=""/>
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div
                                                        class="product-badges product-badges-position product-badges-mrg">
                                                        @if ($product->productItems[0]->is_special)
                                                            <span class="hot">ویژه</span>
                                                        @elseif ($product->productItems[0]->is_new)
                                                            <span class="new">جدید</span>
                                                        @elseif ($product->productItems[0]->is_on_sale)
                                                            <span class="sale">حراج</span>
                                                        @elseif ($product->productItems[0]->is_best_seller)
                                                            <span class="best">پر فروش ترین</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="{{route('front.product.index')}}">{{ $product->category->title }}</a>
                                                    </div>
                                                    <h2>
                                                        <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}">{{ $product->title }}</a>
                                                    </h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-card-bottom">
                                                        <div class="product-price">
                                                            <span>{{ number_format($product->productItems[0]->price)}} تومان </span>
                                                            {{-- <span class="old-price">250,000</span> --}}
                                                        {{-- </div>
                                                        <div class="add-cart">
                                                            <a class="add"
                                                               href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}"><i
                                                                    class="fi-rs-shopping-cart mr-5"></i> خرید </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!--End Best حراجs-->
        {{-- <section class="section-padding pb-5">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
                    <h3 class="">معاملات روز</h3>
                    <a class="show-all" href="{{route('front.product.index')}}">
                        <i class="fi-rs-angle-left"></i>
                        All Deals
                    </a>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <div class="product-img-action-wrap">
                                <div class="product-img">
                                    <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">
                                        <img src="assets/front/imgs/banner/banner-5.png" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="deals-countdown-wrap">
                                    <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                                </div>
                                <div class="deals-content">
                                    <h2><a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">چهار تخمه فله</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">توسط <a href="vendor-details-1.html">سمیع عطار</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>250,000</span>
                                            <span class="old-price">$33.8</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="{{route('front.cart')}}"><i class="fi-rs-shopping-cart mr-5"></i> خرید </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img">
                                    <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">
                                        <img src="assets/front/imgs/banner/banner-6.png" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="deals-countdown-wrap">
                                    <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"></div>
                                </div>
                                <div class="deals-content">
                                    <h2><a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">سدر شوشتر زبر</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">توسط <a href="vendor-details-1.html">Old El Paso</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>150,000</span>
                                            <span class="old-price">$26.8</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="{{route('front.cart')}}"><i class="fi-rs-shopping-cart mr-5"></i> خرید </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 d-none d-lg-block">
                        <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <div class="product-img-action-wrap">
                                <div class="product-img">
                                    <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">
                                        <img src="assets/front/imgs/banner/banner-7.png" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="deals-countdown-wrap">
                                    <div class="deals-countdown" data-countdown="2027/03/25 00:00:00"></div>
                                </div>
                                <div class="deals-content">
                                    <h2><a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">سدر سابیده نرم</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (3.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">توسط <a href="vendor-details-1.html">Progresso</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>120,000</span>
                                            <span class="old-price">138,000</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="{{route('front.cart')}}"><i class="fi-rs-shopping-cart mr-5"></i> خرید </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 d-none d-xl-block">
                        <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            <div class="product-img-action-wrap">
                                <div class="product-img">
                                    <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">
                                        <img src="assets/front/imgs/banner/banner-8.png" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="deals-countdown-wrap">
                                    <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"></div>
                                </div>
                                <div class="deals-content">
                                    <h2><a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">فلفل شاخ بزی</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (3.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">توسط <a href="vendor-details-1.html">Yoplait</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>158,000</span>
                                            <span class="old-price">168,000</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="{{route('front.cart')}}"><i class="fi-rs-shopping-cart mr-5"></i> خرید </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!--End Deals-->
        <section class="section-padding mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp"
                         data-wow-delay="0">
                        <h4 class="section-title style-1 mb-30 animated animated">حراج</h4>
                        <div class="product-list-small animated animated">
                            @foreach ($saleProducts as $product)
                                <article class="row align-product-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
"><img
                                                src="{{ $product->media[0]->media_uri }}" alt="{{ $product->title }}"/></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">{{ $product->title }}</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>{{ number_format($product->productItems[0]->price)}} تومان </span>
                                            {{-- <span class="old-price">338,000</span> --}}
                                        </div>
                                    </div>
                                </article>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp"
                         data-wow-delay=".1s">
                        <h4 class="section-title style-1 mb-30 animated animated">ویژه</h4>
                        <div class="product-list-small animated animated">
                            @foreach ($specialProducts as $product)
                                <article class="row align-product-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
"><img
                                                src="{{ $product->media[0]->media_uri }}" alt="{{ $product->title }}"/></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">{{ $product->title }}</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>{{ number_format($product->productItems[0]->price)}} تومان </span>
                                            {{-- <span class="old-price">338,000</span> --}}
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                    <div
                        class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp"
                        data-wow-delay=".2s">
                        <h4 class="section-title style-1 mb-30 animated animated">جدید</h4>
                        <div class="product-list-small animated animated">
                            @foreach ($newProducts as $product)
                                <article class="row align-product-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
"><img
                                                src="{{ $product->media[0]->media_uri }}" alt="{{ $product->title }}"/></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">{{ $product->title }}</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>{{ number_format($product->productItems[0]->price)}} تومان </span>
                                            {{-- <span class="old-price">338,000</span> --}}
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                    <div
                        class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp"
                        data-wow-delay=".3s">
                        <h4 class="section-title style-1 mb-30 animated animated">رتبه برتر</h4>
                        <div class="product-list-small animated animated">
                            @foreach ($bestSellerProducts as $product)
                                <article class="row align-product-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
"><img
                                                src="{{ $product->media[0]->media_uri }}" alt="{{ $product->title }}"/></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">{{ $product->title }}</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>{{ number_format($product->productItems[0]->price)}} تومان </span>
                                            {{-- <span class="old-price">338,000</span> --}}
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End 4 columns-->
    </main>
@endsection
