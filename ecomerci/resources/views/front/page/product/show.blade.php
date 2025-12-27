@extends('front.layout.app')


@section('page')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('front.home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i> خانه</a>
                    <span></span> <a href="{{route('front.product.index')}}">
                        {{ $product->category->title }}
                    </a> <span></span>{{ $product->title }}
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
                        <div class="row mb-50 mt-30">
                            <div class="col-md-5 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        @foreach ($product->media as $media)
                                            <figure class="border-radius-10">
                                                <img src="{{ $media->media_uri }}" alt="{{ $product->title }}" />
                                            </figure>
                                        @endforeach
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails">
                                        @foreach ($product->media as $media)
                                           <div><img src="{{ $media->media_uri }}" alt="{{ $product->title }}" /></div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- End Gallery -->
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <div class="detail-info pr-30 pl-30">
                                    {{-- <span class="stock-status out-stock"> تخفیف ویژه </span> --}}
                                    <h2 class="title-detail">{{ $product->title }}</h2>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (32 نظر)</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left d-flex align-items-baseline">
                                            @if (!empty($productItem))
                                            <span class="current-price text-brand">

                                                {{ number_format( $productItem->price ) }}
                                            </span>
                                            <small class="text-muted ms-2"> تومان</small>
                                             @else
                                             <span class="current-price text-brand">ناموجود</span>
                                            @endif

                                            @if(!empty($productItem->strikethrough_price))
                                                <span>
                                                    <span class="old-price font-md ml-15">{{ $productItem->strikethrough_price }}</span>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="short-desc mb-30">
                                        <p class="font-lg">
                                            {{ $product->intro }}
                                        </p>
                                    </div>
                                    <div class="attr-detail attr-size mb-30">
                                        <strong class="mr-10">
                                            @if (!empty($productItem))
                                            @foreach ($productItem->variationOptions as $variationOption)
                                               {{$variationOption->variation->title}}:
                                               <br />
                                            @endforeach
                                            @endif
                                        </strong>
                                        <ul class="list-filter size-filter font-small">
                                            @foreach ($product->productItems as $productItemF)
                                              <li class="{{ ($productItemF->id === $productItem->id) ? 'active' : '' }}">
                                                <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug, 'productItem' => $productItemF->id]) }}">
                                                    @foreach ($productItemF->variationOptions as $variationOption)
                                                        {{$variationOption->title}}
                                                        <br />
                                                    @endforeach
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="detail-extralink mb-50">
                                        @if (!empty($productItem))
                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">1</span>
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                        @endif
                                        <div class="product-extra-link2">
                                            @if (!empty($productItem))
                                            <form action="{{ route('front.cart.store', $productItem->id) }}" method="POST">
                                                @csrf
                                                <input value="{{ $productItem->id }}" type="hidden" name="product_item_id" />
                                                <input id="quantity" value="1" type="hidden" name="quantity" />
                                                <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>اضافه به سبد</button>
                                                {{-- <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a> --}}
                                                {{-- <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a> --}}
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="font-xs">
                                        <ul class="float-start">
                                            @if (!empty($productItem))
                                            @foreach ($productItem->variationOptions as $variationOption)
                                               <li class="mb-5">{{ $variationOption->variation->title }}: <a href="#">{{ $variationOption->title }}</a></li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">توضیحات</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">اطلاعات اضافی</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                                    </li> -->
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                                    </li> -->
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            <p>{{ $product->content }}</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Additional-info">
                                        <ul class="mr-50 float-start">
                                            @foreach ($product->attributeOptions as $attributeOption)
                                                <li class="mb-5">{{$attributeOption->attribute->title}}: <span class="text-brand">{{$attributeOption->title}}</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="Vendor-info">
                                        <div class="vendor-logo d-flex mb-30">
                                            <img src="{{url('assets/front/imgs/vendor/vendor-18.svg')}}" alt="" />
                                            <div class="vendor-name ml-15">
                                                <h6>
                                                    <a href="vendor-details-2.html">Noodles Co.</a>
                                                </h6>
                                                <div class="product-rate-cover text-end">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 90%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="contact-infor mb-50">
                                            <li><img src="{{url('assets/front/imgs/theme/icons/icon-location.svg')}}" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                                            <li><img src="{{url('assets/front/imgs/theme/icons/icon-contact.svg')}}" alt="" /><strong>Contact Seller:</strong><span>(+91) - 540-025-553</span></li>
                                        </ul>
                                        <div class="d-flex mb-55">
                                            <div class="mr-30">
                                                <p class="text-brand font-xs">Rating</p>
                                                <h4 class="mb-0">92%</h4>
                                            </div>
                                            <div class="mr-30">
                                                <p class="text-brand font-xs">Ship on time</p>
                                                <h4 class="mb-0">100%</h4>
                                            </div>
                                            <div>
                                                <p class="text-brand font-xs">Chat response</p>
                                                <h4 class="mb-0">89%</h4>
                                            </div>
                                        </div>
                                        <p>Noodles & Company is an American fast-casual restaurant that offers international and American noodle dishes and pasta in addition to soups and salads. Noodles & Company was founded in 1995 by Aaron Kennedy and is headquartered in Broomfield, Colorado. The company went public in 2013 and recorded a $457 million revenue in 2017.In late 2018, there were 460 Noodles & Company locations across 29 states and Washington, D.C.</p>
                                    </div>
                                    <div class="tab-pane fade" id="Reviews">
                                        <!--Comments-->
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">Customer questions & answers</h4>
                                                    <div class="comment-list">
                                                        <div class="single-comment justify-content-between d-flex mb-30">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="{{url('assets/front/imgs/blog/author-2.png')}}" alt="" />
                                                                    <a href="#" class="font-heading text-brand">Sienna</a>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="d-flex justify-content-between mb-10">
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="font-xs text-muted">December 4, 2024 at 3:12 pm </span>
                                                                        </div>
                                                                        <div class="product-rate d-inline-block">
                                                                            <div class="product-rating" style="width: 100%"></div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-comment justify-content-between d-flex mb-30 ml-30">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="{{url('assets/front/imgs/blog/author-3.png')}}" alt="" />
                                                                    <a href="#" class="font-heading text-brand">Brenna</a>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="d-flex justify-content-between mb-10">
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="font-xs text-muted">December 4, 2024 at 3:12 pm </span>
                                                                        </div>
                                                                        <div class="product-rate d-inline-block">
                                                                            <div class="product-rating" style="width: 80%"></div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="{{url('assets/front/imgs/blog/author-4.png')}}" alt="" />
                                                                    <a href="#" class="font-heading text-brand">Gemma</a>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="d-flex justify-content-between mb-10">
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="font-xs text-muted">December 4, 2024 at 3:12 pm </span>
                                                                        </div>
                                                                        <div class="product-rate d-inline-block">
                                                                            <div class="product-rating" style="width: 80%"></div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4 class="mb-30">Customer reviews</h4>
                                                    <div class="d-flex mb-30">
                                                        <div class="product-rate d-inline-block mr-15">
                                                            <div class="product-rating" style="width: 90%"></div>
                                                        </div>
                                                        <h6>4.8 out of 5</h6>
                                                    </div>
                                                    <div class="progress">
                                                        <span>5 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>4 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>3 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>2 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                                    </div>
                                                    <div class="progress mb-30">
                                                        <span>1 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                                    </div>
                                                    <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--comment form-->
                                        <div class="comment-form">
                                            <h4 class="mb-15">Add a review</h4>
                                            <div class="product-rate d-inline-block mb-30"></div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    <form class="form-contact comment_form" action="#" id="commentForm">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="name" id="name" type="text" placeholder="Name" />
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="email" id="email" type="email" placeholder="Email" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="website" id="website" type="text" placeholder="Website" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="button button-contactForm">Submit Review</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h2 class="section-title style-1 mb-30">محصولات مرتبط</h2>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    @foreach ($products as $product)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{ route('front.product.show', ['unique_id' => $product->unique_id, 'slug' => $product->slug]) }}
" tabindex="0">
                                                            @isset($product->media[0])
                                                                <img class="default-img" src="{{ $product->media[0]->media_uri }}" alt="" />
                                                            @endisset
                                                            @if (isset($product->media[1]) && !empty($product->media[1]))
                                                               <img class="hover-img" src="{{ $product->media[1]->media_uri }}" alt="" />
                                                            @endif
                                                        </a>
                                                    </div>

                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        @if (!empty($productItem))
                                                            @if ($productItem->is_special)
                                                                <span class="hot">ویژه</span>
                                                                @elseif ($productItem->is_new)
                                                                    <span class="new">جدید</span>
                                                                @elseif ($productItem->is_on_sale)
                                                                    <span class="sale">حراج</span>
                                                                @elseif ($productItem->is_best_seller)
                                                                    <span class="best">پر فروش ترین</span>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="{{route('front.product.index')}}" tabindex="0">{{ $product->title }}</a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span> </span>
                                                    </div>
                                                    <div class="product-price">
                                                        @if (!empty($productItem))
                                                        <span>{{ $productItem->price }} تومان </span>
                                                        @endif
                                                        {{-- <span class="old-price">$245.8</span> --}}
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

