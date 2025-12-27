@section('title')
    بازسازی
@endsection

@extends('manage.layout.app-empty')

@section('style')
@endsection

@section('content')
    <!-- Start Container -->
    <div class="container">
        <div class="auth-box error-box">
            <!-- Start row -->
            <div class="row no-gutters align-items-center justify-content-center">
                <!-- Start col -->
                <div class="col-md-8 col-lg-6">
                    <div class="text-center">
                        <img src="/assets/manage/images/logo.svg" class="img-fluid error-logo" alt="لوگو">
                        <img src="/assets/manage/images/error/maintenance.svg" class="img-fluid error-image"
                             alt="تعمیر و نگهداری">
                        <h4 class="error-subtitle mb-4">سیستم در دست تعمیر است</h4>
                        <p class="mb-4">از اینکه مشکل ایجاد کرده‌ایم، به شما عذر می‌خواهیم. لطفاً بعداً مراجعه کنید.</p>
                        <a href="{{url('/theme/')}}" class="btn btn-primary font-16"><i
                                class="feather icon-home mr-2"></i> به داشبورد بازگردید</a>
                    </div>
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
