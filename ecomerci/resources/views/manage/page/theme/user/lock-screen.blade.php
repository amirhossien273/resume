@section('title')
    قفل صفحه
@endsection

@extends('manage.layout.app-empty')

@section('style')
@endsection

@section('content')
    <!-- Start Container -->
    <div class="container">
        <div class="auth-box lock-screen-box">
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
                                    <h4 class="text-primary my-4">صفحه قفل شده!</h4>
                                    <p class="mb-4">برای دسترسی به پروفایل، رمزعبور را وارد کنید.</p>
                                    <div class="user-logo mb-4">
                                        <img src="/assets/manage/images/users/boy.svg" class="rounded-circle img-fluid" alt="تصویر کاربر">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" placeholder="رمزعبور" required>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg btn-block font-18">ورود</button>
                                </form>
                                <p class="mb-0 mt-3">شما نیستید؟ به <a href="user-login">ورود</a> بروید</p>
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
