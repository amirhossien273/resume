@section('title')
    تسویه حساب
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
                        <h5 class="card-title">چک‌اوت چند مرحله‌ای</h5>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-5">
                                <div id="basic-form-wizard">
                                    <div>
                                        <h3>ورود</h3>
                                        <section>
                                            <h4 class="text-center font-22 mb-5">ورود</h4>
                                            <div class="form-group">
                                                <label for="username">نام کاربری</label>
                                                <input type="text" class="form-control" id="username">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">رمز عبور</label>
                                                <input type="password" class="form-control" id="password">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   id="rememberMe">
                                                            <label class="custom-control-label" for="rememberMe">مرا به
                                                                خاطر بسپار</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="forgot-psw-link">
                                                            <a href="#">رمز عبور را فراموش کرده‌ام؟</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-lg btn-block py-2 font-18">
                                                ورود
                                            </button>
                                            <div class="partition">
                                                <hr>
                                                <h6><span>یا با</span></h6>
                                            </div>
                                            <div class="social-login text-center">
                                                <div class="button-list">
                                                    <button type="button" class="btn btn-round btn-primary-rgba"><i
                                                            class="feather icon-facebook"></i></button>
                                                    <button type="button" class="btn btn-round btn-danger-rgba">G
                                                    </button>
                                                </div>
                                            </div>
                                            <p class="text-center mb-0 mt-3">حساب کاربری ندارید؟ <a href="">همین حالا
                                                    ثبت نام کنید</a></p>
                                        </section>
                                        <h3>صورت‌حساب</h3>
                                        <section>
                                            <h4 class="text-center font-22 mb-5">آدرس صورت‌حساب</h4>
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="billingFirstName">نام</label>
                                                        <input type="text" class="form-control" id="billingFirstName">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="billingLastName">نام خانوادگی</label>
                                                        <input type="text" class="form-control" id="billingLastName">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="billingAddress">آدرس تحویل</label>
                                                    <input type="text" class="form-control" id="billingAddress">
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="billingCity">شهر</label>
                                                        <input type="text" class="form-control" id="billingCity">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="billingState">استان</label>
                                                        <select id="billingState" class="form-control">
                                                            <option selected>استان را انتخاب کنید</option>
                                                            <option value="california">کالیفرنیا</option>
                                                            <option value="texas">تگزاس</option>
                                                            <option value="alaska">آلاسکا</option>
                                                            <option value="queensland">کویینزلند</option>
                                                            <option value="victoria">ویکتوریا</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="billingMobileNumber">شماره موبایل</label>
                                                        <input type="text" class="form-control"
                                                               id="billingMobileNumber">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="billingZipcode">کد پستی</label>
                                                        <input type="text" class="form-control" id="billingZipcode">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="shippingCheck">
                                                        <label class="custom-control-label" for="shippingCheck">آدرس
                                                            تحویل همان آدرس بالا باشد</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </section>
                                        <h3>پرداخت</h3>
                                        <section>
                                            <h4 class="text-center font-22 mb-5">پرداخت</h4>
                                            <ul class="nav nav-pills justify-content-center custom-tab-button mb-3"
                                                id="pills-tab-button" role="tablist">
                                                <li class="nav-item ml-1">
                                                    <a class="nav-link border active" id="pills-card-tab-button"
                                                       data-toggle="pill" href="#pills-card-button" role="tab"
                                                       aria-controls="pills-card-button" aria-selected="true"><span
                                                            class="tab-btn-icon"><i
                                                                class="feather icon-credit-card"></i></span>کارت</a>
                                                </li>
                                                <li class="nav-item ml-0">
                                                    <a class="nav-link border" id="pills-paypal-tab-button"
                                                       data-toggle="pill" href="#pills-paypal-button" role="tab"
                                                       aria-controls="pills-paypal-button" aria-selected="false"><span
                                                            class="tab-btn-icon"><i class="mdi mdi-paypal"></i></span>پیپال</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent-button">
                                                <div class="tab-pane fade show active" id="pills-card-button"
                                                     role="tabpanel" aria-labelledby="pills-card-tab-button">
                                                    <div class='card-wrapper'></div>
                                                    <form class="card-form">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="cardnumber">شماره کارت</label>
                                                                <input type="text" class="form-control"
                                                                       name="cardnumber" id="cardnumber">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="cardfullname">نام کامل</label>
                                                                <input type="text" class="form-control"
                                                                       name="cardfullname" id="cardfullname">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="cardexpiry">تاریخ انقضا</label>
                                                                <input type="text" class="form-control"
                                                                       name="cardexpiry" id="cardexpiry">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="cardcvc">کد امنیتی</label>
                                                                <input type="text" class="form-control" name="cardcvc"
                                                                       id="cardcvc">
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit"
                                                                    class="btn btn-primary btn-lg btn-block py-2 font-18">
                                                                پرداخت
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="pills-paypal-button" role="tabpanel"
                                                     aria-labelledby="pills-paypal-tab-button">
                                                    <button type="button"
                                                            class="btn btn-primary btn-lg btn-block py-2 mt-5 font-18">
                                                        پرداخت از طریق پیپال
                                                    </button>
                                                </div>
                                            </div>
                                        </section>
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
    <!-- Form Step js -->
    <script src="{{ asset('/assets/manage/plugins/jquery-step/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('/assets/manage/js/custom/custom-form-wizard.js') }}"></script>
    <!-- Card js -->
    <script src="{{ asset('/assets/manage/plugins/creditcard/card.js') }}"></script>
    <script src="{{ asset('/assets/manage/js/custom/custom-creditcard.js') }}"></script>
@endsection
