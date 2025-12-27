@section('title')
    فراموشی رمزعبور
@endsection

@extends('manage.layout.app-empty')

@section('style')
@endsection

@section('content')
    <!-- Start Container -->
    <div class="container">
        <div class="auth-box forgot-password-box">
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
                                    <h4 class="text-primary my-4">فراموشی رمزعبور؟</h4>
                                    <p class="mb-4">آدرس ایمیل خود را وارد کنید تا دستورالعمل بازنشانی رمزعبور دریافت کنید.</p>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="ایمیل را وارد کنید" required>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg btn-block font-18">ارسال ایمیل</button>
                                </form>
                                <p class="mb-0 mt-3">رمزعبور را به یاد داشته باشید؟ <a href="user-login">وارد شوید</a></p>
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
