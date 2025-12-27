@section('title')
    ثبت نام
@endsection

@extends('manage.layout.app-empty')

@section('style')
@endsection

@section('content')
    <!-- Start Container -->
    <div class="container">
        <div class="auth-box register-box">
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
                                    <h4 class="text-primary my-4">ثبت نام!</h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" placeholder="نام کاربری را وارد کنید" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="ایمیل را وارد کنید" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" placeholder="رمز عبور را وارد کنید" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="re-password" placeholder="رمز عبور را مجدداً وارد کنید" required>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-sm-12">
                                            <div class="custom-control custom-checkbox text-right">
                                                <input type="checkbox" class="custom-control-input" id="terms">
                                                <label class="custom-control-label font-14" for="terms">من با شرایط و مقررات اربیتر موافقم</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg btn-block font-18">ثبت نام</button>
                                </form>
                                <p class="mb-0 mt-3">قبلاً حساب کاربری دارید؟ <a href="user-login">وارد شوید</a></p>
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
