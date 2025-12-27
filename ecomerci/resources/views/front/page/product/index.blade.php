@extends('front.layout.app')


@section('page')
    <main class="main">
        <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h1 class="mb-15">{{ isset($category->title) ? $category->title : 'همه دسته بندی ها'}}</h1>
                            <div class="breadcrumb">
                                <a href="{{route('front.home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i> خانه</a>
                                <span></span> فروشگاه <span></span>{{ isset($category->title) ? $category->title : 'همه دسته بندی ها'}}
                            </div>
                        </div>
                        <div class="col-xl-9 text-end d-none d-xl-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5"><div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>ما <strong class="text-brand">{{ $products->total() }}</strong> مورد برای شما پیدا کردیم!</p>
                        </div>
                        {{-- <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span>نمایش:<i class="fi-rs-apps"></i></span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> ۵۰ <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">۵۰</a></li>
                                        <li><a href="#">۱۰۰</a></li>
                                        <li><a href="#">۱۵۰</a></li>
                                        <li><a href="#">۲۰۰</a></li>
                                        <li><a href="#">همه</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span>مرتب‌سازی بر اساس:<i class="fi-rs-apps-sort"></i></span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> <i class="fi-rs-angle-small-down"></i> برجسته</span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">برجسته</a></li>
                                        <li><a href="#">قیمت: کم به زیاد</a></li>
                                        <li><a href="#">قیمت: زیاد به کم</a></li>
                                        <li><a href="#">تاریخ انتشار</a></li>
                                        <li><a href="#">میانگین امتیاز</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="product-list mb-50">
                        @foreach ($products as $product)
                            <div class="product-cart-wrap">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <div class="product-img-inner">
                                            <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">
                                                @if (!empty($product->media) && isset($product->media[0]))
                                                    <img class="default-img" src="{{ $product->media[0]->media_uri }}" alt="{{ $product->title }}" />
                                                    @if (isset($product->media[1]) && !empty($product->media[1]))
                                                        <img class="hover-img" src="{{ $product->media[1]->media_uri }}" alt="{{ $product->title }}" />
                                                    @else
                                                        <img class="hover-img" src="{{ $product->media[0]->media_uri }}" alt="{{ $product->title }}" />
                                                    @endif
                                                @else
                                                    <img class="default-img" src="{{ asset('front-assets/imgs/shop/product-1-1.jpg') }}" alt="{{ $product->title }}" />
                                                    <img class="hover-img" src="{{ asset('front-assets/imgs/shop/product-1-1.jpg') }}" alt="{{ $product->title }}" />
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        @if (!empty($product->productItems) && isset($product->productItems[0]))
                                            @if ($product->productItems[0]->is_special)
                                                <span class="hot">ویژه</span>
                                                @elseif ($product->productItems[0]->is_new)
                                                    <span class="new">جدید</span>
                                                @elseif ($product->productItems[0]->is_on_sale)
                                                    <span class="sale">حراج</span>
                                                @elseif ($product->productItems[0]->is_best_seller)
                                                    <span class="best">پر فروش ترین</span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="{{route('front.product.index')}}">{{ $product->category ? $product->category->title : 'بدون دسته‌بندی' }}</a>
                                    </div>
                                    <h2><a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">{{ $product->title }}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        {{-- <span class="ml-30">500g</span> --}}
                                    </div>
                                    <p class="mt-15 mb-15">{{ $product->intro }}</p>

                                    <div class="product-price">
                                        @if (!empty($product->productItems) && isset($product->productItems[0]))
                                          <span>{{ number_format($product->productItems[0]->price)}} تومان </span>
                                          @else
                                           <span>ناموجود</span>
                                        @endif
                                        {{-- <span class="old-price">$245.8</span> --}}
                                    </div>

                                    @if (!empty($product->productItems) && isset($product->productItems[0]))
                                    <div class="mt-30 d-flex align-items-center">
                                        {{-- <form action="{{ route('front.cart.store') }}" method="POST">
                                            @csrf --}}
                                               {{-- <input value="{{ $product->productItems[0]->id }}" type="hidden" name="product_item_id" /> --}}
                                            {{-- <input value="1" type="hidden" name="quantity" /> --}}
                                            <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}" aria-label="Buy now" class="btn" ><i class="fi-rs-shopping-cart ml-5"></i>نمایش محصول</a>
                                        {{-- </form> --}}
                                        {{-- <a href="#" class="add-wishlish ml-30 text-body font-sm font-heading font-weight-bold"><i class="fi-rs-shuffle mr-5"></i>Add Compare</a> --}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!--product grid-->
                    <div class="pagination-area mt-20 mb-20">
                        <nav aria-label="Page navigation example">
                            {{ $products->links('front.include.pagination') }}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">دسته بندی</h5>
                        <ul>
                            @php
                                $categories = \App\Models\Category::with(['products'])->get();
                            @endphp
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{route('front.product.index_with_category', $category->slug)}}">{{ $category->title }}</a><span class="count">{{ count($category->products) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                        <h5 class="section-title style-1 mb-30">محصولا جدید</h5>
                        @php
                            $newProducts = \App\Models\Product::whereHas('productItems', function ($query) {
                                $query->where('is_new', true);
                            })->with(['productItems' => function ($query) {
                            $query->where('is_new', true);
                            }, 'media'])->get();
                        @endphp
                        @foreach ($newProducts as $product)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{ $product->media[0]->media_uri }}" alt="{{ $product->title }}" />
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="shop-product-detail.html">{{ $product->title }}</a></h5>
                                    <p class="price mb-0 mt-5">{{ number_format($product->productItems[0]->price)}} تومان </p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
