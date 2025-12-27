@extends('front.layout.app')


@section('page')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('front.home')}}" rel="nofollow">صفحه اول<i class="fi-rs-home mr-5"></i></a>
                    <span></span> صفحه <span></span> پروفایل
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <img class="border-radius-15" src="{{ setting('imgRegister') }}"  alt="" />
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <form method="POST" action="{{ route('front.auth.phone-verified') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="code" placeholder="کد ارسال شده" value="{{ old('code') }}"  />
                                                @error('code')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <input type="text" name="captcha" placeholder="کد امنیتی" required />
                                                    @error('captcha')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <img id="captcha-image" style="border-radius: 10px;" src="{{ route('front.captcha.generate') }}" alt="CAPTCHA Image" class="mx-3">
                                                <a onclick="reloadCaptcha()"><img style="width: 20px; height: 20px;" src="{{ url('assets/front/imgs/theme/icons/refresh.svg') }}" alt="Reload"></a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up" name="otp">تایید کد</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function reloadCaptcha() {
            var captchaImage = document.getElementById('captcha-image');
            var timestamp = new Date().getTime(); // Add timestamp to URL to force browser to reload image
            captchaImage.src = "{{ route('front.captcha.generate') }}?t=" + timestamp;
            return false; // Prevent default anchor behavior
        }
    </script>
@endsection
