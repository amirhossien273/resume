@extends('front.layout.app')


@section('page')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('front.home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i> خانه</a>
                    <span></span> <a href="{{route('front.product.index')}}">
                        صفحه
                    </a> <span></span>شگفت انگیز
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="product-detail accordion-detail">
                        <div class="row mt-60">
                            <div class="col-12">
                                <div class="row related-products">
                                    @foreach ($products as $product)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
" tabindex="0">
                                                            <img class="default-img" src="{{ $product->media[0]->media_uri }}" alt="" />
                                                            @if (isset($product->media[1]) && !empty($product->media[1]))
                                                               <img class="hover-img" src="{{ $product->media[1]->media_uri }}" alt="" />
                                                            @else
                                                               <img class="hover-img" src="{{ $product->media[0]->media_uri }}" alt="" />
                                                            @endif
                                                        </a>
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
                                                        <a href="{{route('front.product.index')}}">{{ $product->category->title }}</a>
                                                    </div>
                                                    <h2><a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
">{{ $product->title }}</a></h2>
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
                                                            @if (!empty($product->productItems) && isset($product->productItems[0]))
                                                                <span>{{ number_format($product->productItems[0]->price)}} تومان </span>
                                                                @else
                                                                <span>ناموجود</span>
                                                            @endif
                                                            {{-- <span class="old-price">250,000</span> --}}
                                                        </div>
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
    </main>
@endsection

