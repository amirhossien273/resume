@extends('front.layout.app')

@section('style')
    <style>
        .google-map {
            padding: 50px 0 100px;
        }

        .google-map iframe {
            width: 100%;
            height: 400px;
            border-radius: 40px;
            filter: grayscale(100%);
            transition: all 0.3s ease-out;
        }

        .google-map iframe:hover {
            filter: grayscale(0%);
        }

    </style>
@endsection
@section('page')
    <!--End header-->
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('front.home')}}" rel="nofollow">صفحه اول<i class="fi-rs-home mr-5"></i></a>
                    <span></span> صفحه <span></span> تماس با ما
                </div>
            </div>
        </div>
        <div class="page-content pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        {{-- <section class="row align-items-end mb-50">
                            <div class="col-lg-4 mb-lg-0 mb-md-5 mb-sm-5">
                                <h4 class="mb-20 text-brand">How can help you ?</h4>
                                <h1 class="mb-30">Let us know how we can help you</h1>
                                <p class="mb-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <h5 class="mb-20">01. Visit Feedback</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <h5 class="mb-20">02. Employer Services</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                    </div>
                                    <div class="col-lg-6 mb-lg-0 mb-4">
                                        <h5 class="mb-20 text-brand">03. Billing Inquiries</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5 class="mb-20">04.General Inquiries</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                    </div>
                                </div>
                            </div>
                        </section> --}}
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <section class="mb-50">

                            {{--<div class="row mb-60">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <h4 class="mb-15 text-brand">Office</h4>
                                    205 North Michigan Avenue, Suite 810<br />
                                    Chicago, 60601, USA<br />
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
                                    <abbr title="Email">Email: </abbr>contact@Evara.com<br />
                                    <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>
                                </div>
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <h4 class="mb-15 text-brand">Studio</h4>
                                    205 North Michigan Avenue, Suite 810<br />
                                    Chicago, 60601, USA<br />
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
                                    <abbr title="Email">Email: </abbr>contact@Evara.com<br />
                                    <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="mb-15 text-brand">Shop</h4>
                                    205 North Michigan Avenue, Suite 810<br />
                                    Chicago, 60601, USA<br />
                                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
                                    <abbr title="Email">Email: </abbr>contact@Evara.com<br />
                                    <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>
                                </div>
                            </div>--}}


                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="contact-from-area padding-20-row-col">
                                        <h5 class="text-brand mb-10">فرم تماس </h5>
                                        <h2 class="mb-10">برای ما پیامی بفرستید </h2>
                                        <p class="text-muted mb-30 font-sm">ایمیل شما منتشر نخواهد شد. فیلدهای ضروری با
                                            * مشخص شده‌اند.</p>
                                        <form class="contact-form-style mt-30" id="contact-form"
                                              action="{{ route('front.contract.submit') }}" method="post">
                                            @csrf

                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="name" placeholder="نام" type="text"
                                                               value="{{ old('name') }}"/>
                                                        @error('name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="email" placeholder="ایمیل" type="email"
                                                               value="{{ old('email') }}"/>
                                                        @error('email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="telephone" placeholder="شماره همراه" type="tel"
                                                               value="{{ old('telephone') }}"/>
                                                        @error('telephone')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="input-style mb-20">
                                                        <input name="subject" placeholder="موضوع" type="text"
                                                               value="{{ old('subject') }}"/>
                                                        @error('subject')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="textarea-style mb-30">
                                                        <textarea name="message" placeholder="پیغام"
                                                                  required>{{ old('message') }}</textarea>
                                                        @error('message')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <button class="submit submit-auto-width" type="submit">ارسال
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pl-50 d-lg-block d-none">
                                    <img class="border-radius-15 mt-50" src="{{ setting('imgContact') }}" alt=""/>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">


                        <!-- Google Map Section Start -->
                        <div class="google-map wow fadeInUp" data-wow-delay="0.25s" id="location-address">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6477.712452117607!2d48.7197492!3d31.2567039!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2s31.2567039%2C48.7197492!5e0!3m2!1sen!2snl!4v1732140512585!5m2!1sen!2snl"
                                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Google Map Section End -->
                        <script src="https://www.google.com/recaptcha/api.js?render=6LcyuocqAAAAACAt8QyJLu7106gaF_zEjwvHtp-S"></script>
                        <script>
                            grecaptcha.ready(function () {
                                grecaptcha.execute('6LcyuocqAAAAACAt8QyJLu7106gaF_zEjwvHtp-S', {action: 'homepage'}).then(function (token) {
                                    document.getElementById('g-recaptcha-response').value = token;
                                });
                            });
                        </script>


                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
@endsection
