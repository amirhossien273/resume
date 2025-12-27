@section('title')
    صورتحساب
@endsection
@extends('manage.layout.app')
@section('style')

@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- End row -->
        <div class="row justify-content-center">
            <!-- Start col -->
            <div class="col-md-12 col-lg-10 col-xl-10">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="invoice">
                            <div class="invoice-head">
                                <div class="row">
                                    <div class="col-12 col-md-7 col-lg-7">
                                        <div class="invoice-logo">
                                            <img src="/assets/manage/images/logo.svg" class="img-fluid"
                                                 alt="invoice-logo">
                                        </div>
                                        <h4>شرکت طراحی اوربیتر</h4>
                                        <p>همکاری کامل در راه‌حل‌های وب</p>
                                        <p class="mb-0">خیابان ۲۱، برج تیتانیوم، تایمز اسکوئر، کمپوس نوادا، نیوجرسی -
                                            ۵۵۹۸۶، آمریکا.</p>
                                    </div>
                                    <div class="col-12 col-md-5 col-lg-5">
                                        <div class="invoice-name">
                                            <h5 class="text-uppercase mb-3">صورتحساب</h5>
                                            <p class="mb-1">شماره : #۹۸۷۶۵</p>
                                            <p class="mb-0">۱۵ ژوئیه، ۲۰۱۹</p>
                                            <h4 class="text-success mb-0 mt-3">$۱۱۸۰</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-billing">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <div class="invoice-address">
                                            <h6 class="mb-3">صورتحساب به نام</h6>
                                            <h6 class="text-muted">امی آدامز</h6>
                                            <ul class="list-unstyled pr-0">
                                                <li>خیابان ردبود، ساختومان منهتن، ویت‌استون، نیویورک، نیویورک-۱۱۳۵۷</li>
                                                <li>+۱-۹۸۷۶۵۴۳۲۱۰</li>
                                                <li>amyadams@email.com</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <div class="invoice-address">
                                            <h6 class="mb-3">ارسال به</h6>
                                            <h6 class="text-muted">امی آدامز</h6>
                                            <ul class="list-unstyled pr-0">
                                                <li>خیابان ردبود، ساختومان منهتن، ویت‌استون، نیویورک، نیویورک-۱۱۳۵۷</li>
                                                <li>+۱-۹۸۷۶۵۴۳۲۱۰</li>
                                                <li>amyadams@email.com</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <div class="invoice-address">
                                            <div class="card">
                                                <div class="card-body bg-info-rgba text-center">
                                                    <h6>روش پرداخت</h6>
                                                    <p><i class="mdi mdi-paypal text-info font-40"></i></p>
                                                    <p>با استفاده از PayPal</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-summary">
                                <div class="table-responsive ">
                                    <table class="table table-borderless">
                                        <thead>
                                        <tr>
                                            <th scope="col">شناسه</th>
                                            <th scope="col">تصویر</th>
                                            <th scope="col">محصول</th>
                                            <th scope="col">تعداد</th>
                                            <th scope="col">قیمت</th>
                                            <th scope="col" class="text-left">جمع کل</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">۱</th>
                                            <td><img src="/assets/manage/images/ecommerce/product_01.svg"
                                                     class="img-fluid" width="35" alt="product"></td>
                                            <td>ساعت اپل</td>
                                            <td>۱</td>
                                            <td>$۱۰</td>
                                            <td class="text-left">$۵۰۰</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">۲</th>
                                            <td><img src="/assets/manage/images/ecommerce/product_02.svg"
                                                     class="img-fluid" width="35" alt="product"></td>
                                            <td>آیفون اپل</td>
                                            <td>۲</td>
                                            <td>$۲۰</td>
                                            <td class="text-left">$۲۰۰</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">۳</th>
                                            <td><img src="/assets/manage/images/ecommerce/product_03.svg"
                                                     class="img-fluid" width="35" alt="product"></td>
                                            <td>آیپد اپل</td>
                                            <td>۳</td>
                                            <td>$۳۰</td>
                                            <td class="text-left">$۳۰۰</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-summary-total">
                                <div class="row">
                                    <div class="col-md-12 order-2 order-lg-1 col-lg-5 col-xl-6">
                                        <div class="order-note">
                                            <p class="mb-3"><span class="badge badge-info-inverse font-14">این یک سفارش ارسال رایگان است</span>
                                            </p>
                                            <h6>توجه ویژه برای این سفارش:</h6>
                                            <p>لطفاً با کیسه‌های هوایی محصول بسته‌بندی کنید و با دقت رفتار کنید.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 order-1 order-lg-2 col-lg-7 col-xl-6">
                                        <div class="order-total table-responsive">
                                            <table class="table table-borderless text-left">
                                                <tbody>
                                                <tr>
                                                    <td>جمع کل:</td>
                                                    <td>$1000.00</td>
                                                </tr>
                                                <tr>
                                                    <td>هزینه ارسال:</td>
                                                    <td>$0.00</td>
                                                </tr>
                                                <tr>
                                                    <td>مالیات (18%) :</td>
                                                    <td>$180.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="f-w-7 font-18"><h5>مبلغ قابل پرداخت:</h5></td>
                                                    <td class="f-w-7 font-18"><h5>$1180.00</h5></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-meta">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <div class="invoice-meta-box">
                                            <h6 class="mb-3">شرایط و مقررات</h6>
                                            <ul class="pl-3 pr-3">
                                                <li>کالاها پس از فروش قابل بازگشت نیستند.</li>
                                                <li>ما در قبال آسیب‌های ناشی از پست مسئولیت داریم.</li>
                                                <li>موضوعات مشمول دیوان عدالت نیویورک می‌باشند.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <div class="invoice-meta-box">
                                            <h6 class="mb-3">تماس با ما</h6>
                                            <ul class="list-unstyled pr-0">
                                                <li>
                                                    www.example.com
                                                    <i class="feather icon-aperture ml-2"></i>
                                                </li>
                                                <li>
                                                    demo@example.com
                                                    <i class="feather icon-mail ml-2"></i>
                                                </li>
                                                <li>
                                                    +9876543210
                                                    <i class="feather icon-phone ml-2"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <div class="invoice-meta-box text-left">
                                            <h6 class="mb-0">امضای مجاز</h6>
                                            <img src="/assets/manage/images/general/signature.svg"
                                                 class="img-fluid my-3" alt="امضا">
                                            <p class="mb-0">جنیفر سی. دو</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-footer">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <p class="mb-0">با تشکر از تجارت شما.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="invoice-footer-btn">
                                            <a href="javascript:window.print()"
                                               class="btn btn-primary-rgba py-1 font-16">
                                                <i class="feather icon-printer ml-2"></i>چاپ
                                            </a>
                                            <a href="#" class="btn btn-success-rgba py-1 font-16">
                                                <i class="feather icon-send ml-2"></i>ارسال
                                            </a>
                                        </div>
                                    </div>
                                </div>
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

@endsection
