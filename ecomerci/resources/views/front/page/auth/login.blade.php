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
                        <div class="row">
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <img class="border-radius-15"  src="{{ setting('imgLogin') }}"  alt="" />
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">ورود</h1>
                                            <p class="mb-30">حساب کاربری ندارید؟ <a href="{{ route('front.auth.register') }}">اینجا کلیک کنید </a></p>
                                        </div>
                                        <form method="POST" action="{{ route('front.auth.login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="phone" placeholder="شماره همراه" value="{{ old('phone') }}" required />
                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" placeholder="رمز عبور" required />
                                                @error('password')
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
                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                                        <label class="form-check-label" for="exampleCheckbox1"><span>مرا بخاطر بسپار</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="{{ route('front.auth.forgot-password') }}">رمز عبور خود را فراموش کرده اید؟</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up" name="login">ورود</button>
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
