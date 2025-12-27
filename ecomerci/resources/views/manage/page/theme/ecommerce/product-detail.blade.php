@section('title')
    جزئیات محصول
@endsection
@extends('manage.layout.app')
@section('style')
<!-- Summernote css -->
<link href="{{ asset('/assets/manage/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" type="text/css" />
<!-- Dropzone css -->
<link href="{{ asset('/assets/manage/plugins/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-8 col-xl-9">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">جزئیات محصول</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="productTitle" class="col-sm-12 col-form-label">عنوان محصول</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control font-20" id="productTitle" placeholder="عنوان">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">توضیحات</label>
                            <div class="col-sm-12">
                                <div class="summernote">این محصول نمونه است.</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">جزئیات دیگر</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="nav flex-column nav-pills" id="v-pills-product-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link mb-2 active" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true"><i class="feather icon-feather ml-2"></i>عمومی</a>
                                <a class="nav-link mb-2" id="v-pills-stock-tab" data-toggle="pill" href="#v-pills-stock" role="tab" aria-controls="v-pills-stock" aria-selected="false"><i class="feather icon-box ml-2"></i>موجودی</a>
                                <a class="nav-link mb-2" id="v-pills-shipping-tab" data-toggle="pill" href="#v-pills-shipping" role="tab" aria-controls="v-pills-shipping" aria-selected="false"><i class="feather icon-truck ml-2"></i>حمل و نقل</a>
                                <a class="nav-link mb-2" id="v-pills-advanced-tab" data-toggle="pill" href="#v-pills-advanced" role="tab" aria-controls="v-pills-advanced" aria-selected="false"><i class="feather icon-settings ml-2"></i>پیشرفته</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-8">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="tab-content" id="v-pills-product-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
                                    <form>
                                        <div class="form-group row">
                                            <label for="regularPrice" class="col-sm-4 col-form-label">قیمت ($)</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="regularPrice" placeholder="100">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label for="salePrice" class="col-sm-4 col-form-label">قیمت فروش ($)</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="salePrice" placeholder="50">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="v-pills-stock" role="tabpanel" aria-labelledby="v-pills-stock-tab">
                                    <form>
                                        <div class="form-group row">
                                            <label for="sku" class="col-sm-4 col-form-label">کد SKU</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="sku" placeholder="SKU001">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="stockStatus" class="col-sm-4 col-form-label">وضعیت موجودی</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="stockStatus">
                                                    <option value="instock">موجود در انبار</option>
                                                    <option value="outofstock">ناموجود در انبار</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label for="stockQuantity" class="col-sm-4 col-form-label">تعداد</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="stockQuantity" placeholder="100">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="v-pills-shipping" role="tabpanel" aria-labelledby="v-pills-shipping-tab">
                                    <form>
                                        <div class="form-group row">
                                            <label for="weight" class="col-sm-4 col-form-label">وزن (کیلوگرم)</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="weight" placeholder="0">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label for="shippingClass" class="col-sm-4 col-form-label">کلاس حمل و نقل</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="shippingClass">
                                                    <option value="noshipping">بدون حمل و نقل</option>
                                                    <option value="freeshipping">حمل و نقل رایگان</option>
                                                    <option value="fixedshiping">حمل و نقل ثابت</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="v-pills-advanced" role="tabpanel" aria-labelledby="v-pills-advanced-tab">
                                    <form>
                                        <div class="form-group row mb-0">
                                            <label for="purchaseNote" class="col-sm-3 col-form-label">یادداشت خرید</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="purchaseNote" id="purchaseNote" rows="3" placeholder="یادداشت خرید"></textarea>
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
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-4 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">دسته‌بندی‌ها</h5>
                </div>
                <div class="card-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="accessories" checked>
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
                    <h5 class="card-title">رنگ‌ها</h5>
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
                    <h5 class="card-title">برچسب‌ها</h5>
                </div>
                <div class="card-body">
                    <div class="product-tags">
                        <span class="badge badge-secondary-inverse">جدید</span>
                        <span class="badge badge-secondary-inverse">آخرین</span>
                        <span class="badge badge-secondary-inverse">متداول</span>
                        <span class="badge badge-secondary-inverse">محبوب</span>
                        <span class="badge badge-secondary-inverse">فروش</span>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="add-product-tags">
                        <form>
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="افزودن برچسب" aria-label="Search" aria-describedby="button-addonTags">
                                <div class="input-group-append">
                                    <button class="input-group-text" type="submit" id="button-addonTags">افزودن</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">گالری تصاویر محصول</h5>
                </div>
                <div class="card-body">
                    <div class="d-inline-block mb-1">
                        <img src="/assets/manage/images/ecommerce/product_gallery_01.jpg" alt="تصویر گرد" class="img-fluid rounded">
                    </div>
                    <div class="d-inline-block mb-1">
                        <img src="/assets/manage/images/ecommerce/product_gallery_02.jpg" alt="تصویر گرد" class="img-fluid rounded">
                    </div>
                    <div class="d-inline-block mb-1">
                        <img src="/assets/manage/images/ecommerce/product_gallery_03.jpg" alt="تصویر گرد" class="img-fluid rounded">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary-rgba btn-lg btn-block">افزودن گالری</button>
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
<!-- Summernote js -->
<script src="{{ asset('/assets/manage/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Dropzone js -->
<script src="{{ asset('/assets/manage/plugins/dropzone/dist/dropzone.js') }}"></script>
<!-- eCommerce Page js -->
<script src="{{ asset('/assets/manage/js/custom/custom-ecommerce-product-detail-page.js') }}"></script>
@endsection
