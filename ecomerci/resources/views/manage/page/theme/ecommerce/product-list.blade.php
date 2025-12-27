@section('title')
    لیست محصولات
@endsection
@extends('manage.layout.app')
@section('style')

@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title mb-0">همه محصولات</h5>
                            </div>
                            <div class="col-6">
                                <ul class="list-inline-group text-left mb-0 pl-0">
                                    <li class="list-inline-item">
                                        <div class="form-group mb-0 amount-spent-select">
                                            <select class="form-control" id="formControlSelect">
                                                <option>همه</option>
                                                <option>هفته گذشته</option>
                                                <option>ماه گذشته</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>شناسه</th>
                                    <th>تصویر</th>
                                    <th>نام</th>
                                    <th>موجودی</th>
                                    <th>قیمت</th>
                                    <th>دسته‌بندی‌ها</th>
                                    <th>برچسب‌ها</th>
                                    <th>سفارش‌ها</th>
                                    <th>تاریخ</th>
                                    <th>اقدامات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">#1</th>
                                    <td><img src="/assets/manage/images/ecommerce/product_01.svg" class="img-fluid"
                                             width="35" alt="product"></td>
                                    <td>لپ‌تاپ اپل MacBook Pro</td>
                                    <td class="text-success">موجود</td>
                                    <td>۱۹۵,۰۰۰ دلار</td>
                                    <td>الکترونیک، کامپیوتر</td>
                                    <td><span class="badge badge-secondary-inverse ml-2">بازی</span><span
                                            class="badge badge-secondary-inverse">محبوب</span></td>
                                    <td>۲۰۵</td>
                                    <td>۰۲/۰۶/۲۰۱۹</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-product-detail" class="btn btn-success-rgba"><i
                                                    class="feather icon-edit-2"></i></a>
                                            <a href="page-product-detail" class="btn btn-danger-rgba"><i
                                                    class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#2</th>
                                    <td><img src="/assets/manage/images/ecommerce/product_02.svg" class="img-fluid"
                                             width="35" alt="product"></td>
                                    <td>لپ‌تاپ دل Alienware</td>
                                    <td class="text-success">موجود</td>
                                    <td>۸۵,۰۰۰ دلار</td>
                                    <td>الکترونیک، کامپیوتر</td>
                                    <td><span class="badge badge-secondary-inverse ml-2">قدیمی</span><span
                                            class="badge badge-secondary-inverse">تخفیف</span></td>
                                    <td>۵۸۵</td>
                                    <td>۳۰/۰۵/۲۰۱۹</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-product-detail" class="btn btn-success-rgba"><i
                                                    class="feather icon-edit-2"></i></a>
                                            <a href="page-product-detail" class="btn btn-danger-rgba"><i
                                                    class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#3</th>
                                    <td><img src="/assets/manage/images/ecommerce/product_03.svg" class="img-fluid"
                                             width="35" alt="product"></td>
                                    <td>لپ‌تاپ ایسر Predator Helios</td>
                                    <td class="text-danger">تمام شده</td>
                                    <td>۹۷,۰۰۰ دلار</td>
                                    <td>الکترونیک، کامپیوتر</td>
                                    <td><span class="badge badge-secondary-inverse ml-2">محبوب</span><span
                                            class="badge badge-secondary-inverse">بازی</span></td>
                                    <td>۶۸۰</td>
                                    <td>۲۴/۰۵/۲۰۱۹</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-product-detail" class="btn btn-success-rgba"><i
                                                    class="feather icon-edit-2"></i></a>
                                            <a href="page-product-detail" class="btn btn-danger-rgba"><i
                                                    class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#4</th>
                                    <td><img src="/assets/manage/images/ecommerce/product_04.svg" class="img-fluid"
                                             width="35" alt="product"></td>
                                    <td>لپ‌تاپ ایسوس ROG Strix</td>
                                    <td class="text-success">موجود</td>
                                    <td>۷۵,۰۰۰ دلار</td>
                                    <td>الکترونیک، کامپیوتر</td>
                                    <td><span class="badge badge-secondary-inverse ml-2">داغ</span><span
                                            class="badge badge-secondary-inverse">جدید</span></td>
                                    <td>۷۸۵</td>
                                    <td>۲۰/۰۵/۲۰۱۹</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-product-detail" class="btn btn-success-rgba"><i
                                                    class="feather icon-edit-2"></i></a>
                                            <a href="page-product-detail" class="btn btn-danger-rgba"><i
                                                    class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#5</th>
                                    <td><img src="/assets/manage/images/ecommerce/product_01.svg" class="img-fluid"
                                             width="35" alt="product"></td>
                                    <td>لپ‌تاپ Razer Blade Pro 17</td>
                                    <td class="text-success">موجود</td>
                                    <td>۸۱,۰۰۰ دلار</td>
                                    <td>الکترونیک، کامپیوتر</td>
                                    <td><span class="badge badge-secondary-inverse ml-2">محبوب</span><span
                                            class="badge badge-secondary-inverse">جدید</span></td>
                                    <td>۲۳۰</td>
                                    <td>۱۰/۰۵/۲۰۱۹</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-product-detail" class="btn btn-success-rgba"><i
                                                    class="feather icon-edit-2"></i></a>
                                            <a href="page-product-detail" class="btn btn-danger-rgba"><i
                                                    class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#6</th>
                                    <td><img src="/assets/manage/images/ecommerce/product_02.svg" class="img-fluid"
                                             width="35" alt="product"></td>
                                    <td>لپ‌تاپ اچ‌پی Spectre x360</td>
                                    <td class="text-danger">تمام شده</td>
                                    <td>۶۸,۰۰۰ دلار</td>
                                    <td>الکترونیک، کامپیوتر</td>
                                    <td><span class="badge badge-secondary-inverse ml-2">برگزیده</span><span
                                            class="badge badge-secondary-inverse">داغ</span></td>
                                    <td>۴۳۵</td>
                                    <td>۰۲/۰۵/۲۰۱۹</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-product-detail" class="btn btn-success-rgba"><i
                                                    class="feather icon-edit-2"></i></a>
                                            <a href="page-product-detail" class="btn btn-danger-rgba"><i
                                                    class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">#7</th>
                                    <td><img src="/assets/manage/images/ecommerce/product_03.svg" class="img-fluid"
                                             width="35" alt="product"></td>
                                    <td>لپ‌تاپ لنوو Legion Y530</td>
                                    <td class="text-success">موجود</td>
                                    <td>۸۸,۰۰۰ دلار</td>
                                    <td>الکترونیک، کامپیوتر</td>
                                    <td><span class="badge badge-secondary-inverse ml-2">جدید</span><span
                                            class="badge badge-secondary-inverse">جدید</span></td>
                                    <td>۳۹۵</td>
                                    <td>۳۰/۰۴/۲۰۱۹</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="page-product-detail" class="btn btn-success-rgba"><i
                                                    class="feather icon-edit-2"></i></a>
                                            <a href="page-product-detail" class="btn btn-danger-rgba"><i
                                                    class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
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

@endsection
