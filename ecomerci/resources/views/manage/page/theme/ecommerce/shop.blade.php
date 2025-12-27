@section('title')
    فروشگاه
@endsection
@extends('manage.layout.app')
@section('style')
    <!-- Range Slider css -->
    <link href="{{ asset('/assets/manage/plugins/ion-rangeSlider/ion.rangeSlider.css') }}" rel="stylesheet"
          type="text/css">
@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-4 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">دسته‌بندی‌ها</h5>
                            </div>
                            <div class="col-3">
                                <ul class="list-inline-group text-right mb-0 pl-0">
                                    <li class="list-inline-item mr-0 font-12"><a href="#"><i class="feather icon-refresh-cw font-16 text-primary ml-1"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="all" checked="">
                            <label class="custom-control-label" for="all">همه</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="accessories">
                            <label class="custom-control-label" for="accessories">لوازم جانبی</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="computer">
                            <label class="custom-control-label" for="computer">کامپیوتر</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="mobile">
                            <label class="custom-control-label" for="mobile">موبایل</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="headphone">
                            <label class="custom-control-label" for="headphone">هدفون</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="camera">
                            <label class="custom-control-label" for="camera">دوربین</label>
                        </div>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">قیمت</h5>
                            </div>
                            <div class="col-3">
                                <ul class="list-inline-group text-right mb-0 pl-0">
                                    <li class="list-inline-item mr-0 font-12"><a href="#"><i class="feather icon-refresh-cw font-16 text-primary ml-1"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <input id="range-slider-prefix">
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">رنگ‌ها</h5>
                            </div>
                            <div class="col-3">
                                <ul class="list-inline-group text-right mb-0 pl-0">
                                    <li class="list-inline-item mr-0 font-12"><a href="#"><i class="feather icon-refresh-cw font-16 text-primary ml-1"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-3">
                        <div class="custom-checkbox-button">
                            <div class="form-check-inline checkbox-primary">
                                <input type="checkbox" id="customCheckboxInline5" name="customCheckboxInline2" checked>
                                <label for="customCheckboxInline5"></label>
                            </div>
                            <div class="form-check-inline checkbox-secondary">
                                <input type="checkbox" id="customCheckboxInline6" name="customCheckboxInline2">
                                <label for="customCheckboxInline6"></label>
                            </div>
                            <div class="form-check-inline checkbox-success">
                                <input type="checkbox" id="customCheckboxInline7" name="customCheckboxInline2">
                                <label for="customCheckboxInline7"></label>
                            </div>
                            <div class="form-check-inline checkbox-danger">
                                <input type="checkbox" id="customCheckboxInline8" name="customCheckboxInline2">
                                <label for="customCheckboxInline8"></label>
                            </div>
                            <div class="form-check-inline checkbox-warning">
                                <input type="checkbox" id="customCheckboxInline9" name="customCheckboxInline2">
                                <label for="customCheckboxInline9"></label>
                            </div>
                            <div class="form-check-inline checkbox-info">
                                <input type="checkbox" id="customCheckboxInline10" name="customCheckboxInline2">
                                <label for="customCheckboxInline10"></label>
                            </div>
                            <div class="form-check-inline checkbox-light">
                                <input type="checkbox" id="customCheckboxInline11" name="customCheckboxInline2">
                                <label for="customCheckboxInline11"></label>
                            </div>
                            <div class="form-check-inline checkbox-dark">
                                <input type="checkbox" id="customCheckboxInline12" name="customCheckboxInline2">
                                <label for="customCheckboxInline12"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">نوع گارانتی</h5>
                            </div>
                            <div class="col-3">
                                <ul class="list-inline-group text-right mb-0 pl-0">
                                    <li class="list-inline-item mr-0 font-12"><a href="#"><i class="feather icon-refresh-cw font-16 text-primary ml-1"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
                            <label class="custom-control-label" for="customRadio1">گارانتی 1 ساله</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2">گارانتی عضویت</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label v-a-m" for="customRadio4">گارانتی در محل</label>
                        </div>
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0">برچسب‌ها</h5>
                            </div>
                            <div class="col-3">
                                <ul class="list-inline-group text-right mb-0 pl-0">
                                    <li class="list-inline-item mr-0 font-12"><a href="#"><i class="feather icon-refresh-cw font-16 text-primary ml-1"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="badge-list">
                            <a href="#" class="badge badge-seondary-inverse">جدید</a>
                            <a href="#" class="badge badge-seondary-inverse">آخرین</a>
                            <a href="#" class="badge badge-seondary-inverse">ویژه</a>
                            <a href="#" class="badge badge-seondary-inverse">محبوب</a>
                            <a href="#" class="badge badge-seondary-inverse">داغ</a>
                            <a href="#" class="badge badge-seondary-inverse">تخفیف</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-8 col-xl-9">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">محصولات</h5>
                    </div>
                    <div class="card-body">
                        <!-- Start row -->
                        <div class="row align-items-center ecommerce-sortby">
                            <!-- Start col -->
                            <div class="col-md-12 col-lg-12 col-xl-4">
                                <select class="form-control" id="productSortBy">
                                    <option>قیمت - از پایین به بالا</option>
                                    <option>قیمت - از بالا به پایین</option>
                                    <option>جدیدترین</option>
                                    <option>محبوبیت</option>
                                    <option>میانگین امتیاز</option>
                                </select>
                            </div>
                            <!-- End col -->
                            <!-- Start col -->
                            <div class="col-md-12 col-lg-12 col-xl-8">
                                <div class="button-list">
                                    <button type="button" class="btn btn-round btn-primary-rgba"><i class="feather icon-grid"></i></button>
                                    <button type="button" class="btn btn-round btn-secondary-rgba"><i class="feather icon-list"></i></button>
                                </div>
                            </div>
                            <!-- End col -->
                        </div>
                        <!-- End row -->
                        <!-- Start row -->
                        <div class="row">
                            <!-- Start col -->
                            <div class="col-lg-6 col-xl-4">
                                <div class="product-bar m-b-30">
                                    <div class="product-head">
                                        <a href="ecommerce-single-product"><img
                                                src="/assets/manage/images/ecommerce/product_img_01.jpg"
                                                class="img-fluid" alt="محصول"></a>
                                        <p><span class="badge badge-success font-14">25٪ تخفیف</span></p>
                                    </div>
                                    <div class="product-body py-3">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="d-inline-block">
                                                    <span class="text-uppercase font-12 f-w-6">ساعت</span>
                                                </div>
                                                <div class="d-inline-block float-left">
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star"></i>
                                                    <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h6 class="mt-1 mb-3">ساعت اپل</h6>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="text-right">
                                                    <h5 class="f-w-7 mb-0"><sup class="font-14">$</sup>350</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-left">
                                                    <button type="button" class="btn btn-primary-rgba font-18"><i
                                                            class="feather icon-shopping-bag"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End col -->
                            <!-- Start col -->
                            <div class="col-lg-6 col-xl-4">
                                <div class="product-bar m-b-30">
                                    <div class="product-head">
                                        <a href="ecommerce-single-product"><img
                                                src="/assets/manage/images/ecommerce/product_img_02.jpg"
                                                class="img-fluid" alt="محصول"></a>
                                        <p><span class="badge badge-primary font-14">جدید</span></p>
                                    </div>
                                    <div class="product-body py-3">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="d-inline-block">
                                                    <span class="text-uppercase font-12 f-w-6">صدا</span>
                                                </div>
                                                <div class="d-inline-block float-left">
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star"></i>
                                                    <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h6 class="mt-1 mb-3">هدفون بی‌سیم اپل</h6>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="text-right">
                                                    <h5 class="f-w-7 mb-0"><sup class="font-14">$</sup>120</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-left">
                                                    <button type="button" class="btn btn-primary-rgba font-18"><i
                                                            class="feather icon-shopping-bag"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End col -->
                            <!-- Start col -->
                            <div class="col-lg-6 col-xl-4">
                                <div class="product-bar m-b-30">
                                    <div class="product-head">
                                        <a href="ecommerce-single-product"><img
                                                src="/assets/manage/images/ecommerce/product_img_03.jpg"
                                                class="img-fluid" alt="محصول"></a>
                                        <p><span class="badge badge-danger font-14">تخفیف قیمت</span></p>
                                    </div>
                                    <div class="product-body py-3">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="d-inline-block">
                                                    <span class="text-uppercase font-12 f-w-6">تلفن</span>
                                                </div>
                                                <div class="d-inline-block float-left">
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star"></i>
                                                    <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h6 class="mt-1 mb-3">آیفون اپل XR</h6>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="text-right">
                                                    <h5 class="f-w-7 mb-0"><sup class="font-14">$</sup>1110</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-left">
                                                    <button type="button" class="btn btn-primary-rgba font-18"><i
                                                            class="feather icon-shopping-bag"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End col -->
                            <!-- Start col -->
                            <div class="col-lg-6 col-xl-4">
                                <div class="product-bar m-b-30">
                                    <div class="product-head">
                                        <a href="ecommerce-single-product"><img
                                                src="/assets/manage/images/ecommerce/product_img_04.jpg"
                                                class="img-fluid" alt="محصول"></a>
                                        <p><span class="badge badge-success font-14">فروش</span></p>
                                    </div>
                                    <div class="product-body py-3">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="d-inline-block">
                                                    <span class="text-uppercase font-12 f-w-6">تبلت</span>
                                                </div>
                                                <div class="d-inline-block float-left">
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star"></i>
                                                    <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h6 class="mt-1 mb-3">آیپد مینی اپل</h6>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="text-right">
                                                    <h5 class="f-w-7 mb-0"><sup class="font-14">$</sup>430</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-left">
                                                    <button type="button" class="btn btn-primary-rgba font-18"><i
                                                            class="feather icon-shopping-bag"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End col -->
                            <!-- Start col -->
                            <div class="col-lg-6 col-xl-4">
                                <div class="product-bar m-b-30">
                                    <div class="product-head">
                                        <a href="ecommerce-single-product"><img
                                                src="/assets/manage/images/ecommerce/product_img_05.jpg"
                                                class="img-fluid" alt="محصول"></a>
                                        <p><span class="badge badge-warning font-14">مد</span></p>
                                    </div>
                                    <div class="product-body py-3">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="d-inline-block">
                                                    <span class="text-uppercase font-12 f-w-6">لپ‌تاپ</span>
                                                </div>
                                                <div class="d-inline-block float-left">
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star"></i>
                                                    <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h6 class="mt-1 mb-3">مک‌بوک اپل ایر</h6>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="text-right">
                                                    <h5 class="f-w-7 mb-0"><sup class="font-14">$</sup>1700</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-left">
                                                    <button type="button" class="btn btn-primary-rgba font-18"><i
                                                            class="feather icon-shopping-bag"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End col -->
                            <!-- Start col -->
                            <div class="col-lg-6 col-xl-4">
                                <div class="product-bar m-b-30">
                                    <div class="product-head">
                                        <a href="ecommerce-single-product"><img
                                                src="/assets/manage/images/ecommerce/product_img_06.jpg"
                                                class="img-fluid" alt="محصول"></a>
                                        <p><span class="badge badge-info font-14">محبوب</span></p>
                                    </div>
                                    <div class="product-body py-3">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="d-inline-block">
                                                    <span class="text-uppercase font-12 f-w-6">رایانه رومیزی</span>
                                                </div>
                                                <div class="d-inline-block float-left">
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star text-warning"></i>
                                                    <i class="feather icon-star"></i>
                                                    <i class="feather icon-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h6 class="mt-1 mb-3">رایانه رومیزی اپل</h6>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <div class="text-right">
                                                    <h5 class="f-w-7 mb-0"><sup class="font-14">$</sup>2100</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-left">
                                                    <button type="button" class="btn btn-primary-rgba font-18"><i
                                                            class="feather icon-shopping-bag"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End col -->
                        </div>
                        <!-- Start row -->
                    </div>
                </div>
                <div class="card m-b-30">
                    <div class="card-body ecommerce-pagination">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-xl-6">
                                <p>نمایش ۱ تا ۲ از ۱۲ مورد</p>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <nav aria-label="مثالی از ناوبری صفحه">
                                    <ul class="pagination mb-0">
                                        <li class="page-item"><a class="page-link" href="#">قبلی</a></li>
                                        <li class="page-item"><a class="page-link" href="#">۱</a></li>
                                        <li class="page-item"><a class="page-link" href="#">۲</a></li>
                                        <li class="page-item"><a class="page-link" href="#">بعدی</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@section('script')
    <!-- Range Slider js -->
    <script src="{{ asset('/assets/manage/plugins/ion-rangeSlider/ion.rangeSlider.min.js') }}"></script>
    <!-- eCommerce Shop Page js -->
    <script src="{{ asset('/assets/manage/js/custom/custom-ecommerce-shop-page.js') }}"></script>
@endsection
