@section('title')
    قیمت‌گذاری
@endsection
@extends('manage.layout.app')
@section('style')

@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row align-items-center justify-content-center">
        <!-- Start col -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body p-0">
                    <div class="pricing text-center">
                        <div class="pricing-top">
                            <h4 class="text-success mb-0">شروع کننده</h4>
                            <img src="/assets/manage/images/pricing/pricing-starter.svg" class="img-fluid my-4" alt="پکیج شروع کننده">
                            <div class="pricing-amount">
                                <h3 class="text-success mb-0"><sup>$</sup>۹۹</h3>
                                <h6 class="pricing-duration">سالیانه</h6>
                            </div>
                        </div>
                        <div class="pricing-middle">
                            <ul class="list-group">
                                <li class="list-group-item"><i class="feather icon-check ml-2"></i>فضای دیسک ۱۰۰ گیگابایت</li>
                                <li class="list-group-item"><i class="feather icon-check ml-2"></i>۱۰ ایمیل</li>
                                <li class="list-group-item"><i class="feather icon-check ml-2"></i>۵ دامنه</li>
                                <li class="list-group-item"><i class="feather icon-x mr-2"></i>گواهی SSL</li>
                                <li class="list-group-item"><i class="feather icon-x mr-2"></i>پشتیبانی ۲۴/۷</li>
                            </ul>
                        </div>
                        <div class="pricing-bottom pricing-bottom-basic">
                            <div class="pricing-btn">
                                <button type="button" class="btn btn-success font-16">خرید</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body p-0">
                    <div class="pricing text-center">
                        <p class="text-center text-white mb-0"><span class="badge badge-primary text-uppercase rounded-top-0 font-16">محبوب</span></p>
                        <div class="pricing-top">
                            <h3 class="text-primary mb-0">پریمیوم</h3>
                            <img src="/assets/manage/images/pricing/pricing-premium.svg" class="img-fluid price-pro-image my-4" alt="پکیج پریمیوم">
                            <div class="pricing-amount">
                                <h2 class="text-primary mb-0"><sup>$</sup>۲۹۹</h2>
                                <h5 class="pricing-duration">سالیانه</h5>
                            </div>
                        </div>
                        <div class="pricing-middle">
                            <ul class="list-group">
                                <li class="list-group-item"><i class="feather icon-check ml-2"></i>فضای دیسک ۱۰ گیگابایت</li>
                                <li class="list-group-item"><i class="feather icon-check ml-2"></i>۱ ایمیل</li>
                                <li class="list-group-item"><i class="feather icon-check ml-2"></i>۱ دامنه</li>
                                <li class="list-group-item"><i class="feather icon-check ml-2"></i>گواهی SSL</li>
                                <li class="list-group-item"><i class="feather icon-x mr-2"></i>پشتیبانی ۲۴/۷</li>
                            </ul>
                        </div>
                        <div class="pricing-bottom pricing-bottom-professional">
                            <div class="pricing-btn">
                                <button type="button" class="btn btn-primary font-16">خرید</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card m-b-30">
                <div class="card-body p-0">
                    <div class="pricing text-center">
                        <div class="pricing-top">
                            <h4 class="text-info mb-0">نهایی</h4>
                            <img src="/assets/manage/images/pricing/pricing-ultimate.svg" class="img-fluid my-4" alt="پکیج نهایی">
                            <div class="pricing-amount">
                                <h3 class="text-info mb-0"><sup>$</sup>۴۹۹</h3>
                                <h6 class="pricing-duration">سالیانه</h6>
                            </div>
                        </div>
                        <div class="pricing-middle">
                            <ul class="list-group">
                                <li class="list-group-item"><i class="feather icon-check ml-2"></i>فضای دیسک ۱ ترابایت</li>
                                <li class="list-group-item"><i class="feather icon-check ml-2"></i>۱۰۰ ایمیل</li>
                                <li class="list-group-item"><i class="feather icon-check ml-2"></i>۵۰ دامنه</li>
                                <li class="list-group-item"><i class="feather icon-check ml-2"></i>گواهی SSL</li>
                                <li class="list-group-item"><i class="feather icon-check ml-2"></i>پشتیبانی ۲۴/۷</li>
                            </ul>
                        </div>
                        <div class="pricing-bottom pricing-bottom-enterprise">
                            <div class="pricing-btn">
                                <button type="button" class="btn btn-info font-16">خرید</button>
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
