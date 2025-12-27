@extends('front.layout.app')


@section('page')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('front.home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> صفحه <span></span> پروفایل
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 m-auto">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <img class="border-radius-15" src="assets/imgs/page/forgot_password.svg" alt="" />
                                    <h2 class="mb-15 mt-15">رمز عبور خود را فراموش کرده اید؟</h2>
                                </div>
                                <form action="{{ route('front.auth.forgot-password') }}" method="post">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" required="" name="phone" placeholder="شماره همراه" />
                                        @error('phone')
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
                                        <button type="submit" class="btn btn-heading btn-block hover-up" name="login">ارسال کد</button>
                                    </div>
                                </form>
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
