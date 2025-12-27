@section('title')
    به زودی
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
                        <img src="/assets/manage/images/error/coming-soon.svg" class="img-fluid error-image" alt="به زودی">
                        <h4 class="error-subtitle mb-4">سایت در حال ساخت است.</h4>
                        <p class="mb-4">به زودی باز خواهیم گشت. از صبر و شکیبایی شما متشکریم.</p>
                        <div class="counter-box">
                            <div id="counter"></div>
                        </div>
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
