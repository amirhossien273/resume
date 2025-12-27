@section('title')
    ورود
@endsection

@extends('manage.layout.app-empty')

@section('style')
@endsection

@section('content')
    <!-- Start Container -->
    <div class="container">
        <div class="auth-box login-box">
            <!-- Start row -->
            <div class="row no-gutters align-items-center justify-content-center">
                <!-- Start col -->
                <div class="col-md-6 col-lg-5">
                    <!-- Start Auth Box -->
                    <div class="auth-box-right">
                        <div class="card">
                            <div class="card-body">
                                <form action="#">
                                    <div class="form-head">
                                        <a href="/theme/" class="logo"><img src="/assets/manage/images/logo.svg" class="img-fluid" alt="لوگو"></a>
                                    </div>
                                    <h4 class="text-primary my-4">ورود!</h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" placeholder="نام کاربری را وارد کنید" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" placeholder="رمز عبور را وارد کنید" required>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-checkbox text-right">
                                                <input type="checkbox" class="custom-control-input" id="rememberme">
                                                <label class="custom-control-label font-14" for="rememberme">مرا به خاطر بسپار</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="forgot-psw">
                                                <a id="forgot-psw" href="user-forgotpsw" class="font-14">رمز عبور را فراموش کرده‌اید؟</a>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg btn-block font-18">ورود</button>
                                </form>
                                <div class="login-or">
                                    <h6 class="text-muted">یا</h6>
                                </div>
                                <div class="social-login text-center">
                                    <button type="submit" class="btn btn-primary-rgba font-18"><i class="mdi mdi-facebook ml-2"></i>فیس‌بوک</button>
                                    <button type="submit" class="btn btn-danger-rgba font-18"><i class="mdi mdi-google ml-2"></i>گوگل</button>
                                </div>
                                <p class="mb-0 mt-3">حساب کاربری ندارید؟ <a href="user-register">ثبت نام کنید</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- End Auth Box -->
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
    </div>
    <!-- End Container -->
@endsection

@section('script')
@endsection
