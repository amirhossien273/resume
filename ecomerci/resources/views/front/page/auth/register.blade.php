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
                                <img class="border-radius-15" src="{{ setting('imgRegister') }}" alt="" />
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">ایجاد حساب کاربری</h1>
                                            <p class="mb-30">از قبل یک حساب کاربری دارید؟ <a href="{{ route('front.auth.login') }}">ورود</a></p>
                                        </div>
                                        <form method="POST" action="{{ route('front.auth.register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="first_name" placeholder="نام" value="{{ old('first_name') }}"  />
                                                @error('first_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="last_name" placeholder="نام خانوادگی" value="{{ old('last_name') }}"  />
                                                @error('last_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="phone" placeholder="شماره همراه" value="{{ old('phone') }}"  />
                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" placeholder="رمز عبور"  />
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password_confirmation" placeholder="تکرار رمز عبور"  />
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
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="" />
                                                        <label class="form-check-label" for="exampleCheckbox12"><span>با قوانین موافقم</span></label>
                                                    </div>
                                                </div>
                                                <a target="_blank" href="{{ route('front.privacy') }}"><i class="fi-rs-book-alt mr-5 text-muted"></i>خواندن قوانین</a>
                                            </div>
                                            <div class="form-group mb-30">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold">ثبت نام</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <div class="card-login mt-115">
                                    <a href="#" class="social-login facebook-login">
                                        <img src="assets/imgs/theme/icons/logo-facebook.svg" alt="" />
                                        <span>Continue with Facebook</span>
                                    </a>
                                    <a href="#" class="social-login google-login">
                                        <img src="assets/imgs/theme/icons/logo-google.svg" alt="" />
                                        <span>Continue with Google</span>
                                    </a>
                                    <a href="#" class="social-login apple-login">
                                        <img src="assets/imgs/theme/icons/logo-apple.svg" alt="" />
                                        <span>Continue with Apple</span>
                                    </a>
                                </div>
                            </div> --}}
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

