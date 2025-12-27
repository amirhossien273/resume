@extends('front.layout.app')


@section('page')
    <!--End header-->
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('front.home')}}" rel="nofollow">صفحه اول<i class="fi-rs-home mr-5"></i></a>
                    <span></span> صفحه <span></span> در باره ما
                </div>
            </div>
        </div>
        <div class="page-content pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <section class="row align-items-center mb-50">
                            <div class="col-lg-6">
                                <img src="{{ setting('imgAbute') }}" alt="" class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4" />
                            </div>
                            <div class="col-lg-6">
                                <div class="pr-25">
                                    <h2 class="mb-30">به سمیع عطار خوش آمدید</h2>
                                    <p class="mb-25">ما در سمیع عطار با هدف ارائه‌ی محصولات باکیفیت و ارگانیک در حوزه‌ی عطاری و سلامت آغاز به کار کرده‌ایم. مجموعه‌ی ما با تکیه بر تجربه‌ای چندین ساله و اشتیاق به ترویج سبک زندگی سالم، انواع محصولات طبیعی و گیاهی شامل داروهای گیاهی، دمنوش‌های درمانی، ادویه‌های خالص، روغن‌های طبیعی و عرقیات گیاهی را به شما عزیزان ارائه می‌دهد.</p>
                                    <p class="mb-25">در سمیع عطار، به کیفیت، اصالت و رضایت مشتریان اهمیت ویژه‌ای می‌دهیم. تمامی محصولات ما با دقت بالا و از بهترین منابع تهیه شده‌اند تا اطمینان حاصل کنیم که سلامت شما در اولویت قرار دارد.</p>
                                    <p class="mb-25">چه شما به دنبال تقویت سلامتی، زیبایی طبیعی یا طعم‌های بی‌نظیر در آشپزی باشید، سمیع عطار همراه شماست.</p>
                                    <p class="mb-50">با ما تجربه‌ای متفاوت از خرید آنلاین را تجربه کنید و از اصالت محصولات و خدمات مشتریان حرفه‌ای لذت ببرید.</p>
                                    {{-- <div class="carausel-3-columns-cover position-relative">
                                        <div id="carausel-3-columns-arrows"></div>
                                        <div class="carausel-3-columns" id="carausel-3-columns">
                                            <img src="assets/front/imgs/page/about-2.png" alt="" />
                                            <img src="assets/front/imgs/page/about-3.png" alt="" />
                                            <img src="assets/front/imgs/page/about-4.png" alt="" />
                                            <img src="assets/front/imgs/page/about-2.png" alt="" />
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </section>
                        {{-- <section class="row align-items-center mb-50">
                            <div class="row mb-50 align-items-center">
                                <div class="col-lg-7 pr-30">
                                    <img src="assets/front/imgs/page/about-5.png" alt="" class="mb-md-3 mb-lg-0 mb-sm-4" />
                                </div>
                                <div class="col-lg-5">
                                    <h4 class="mb-20 text-muted">Our performance</h4>
                                    <h1 class="heading-1 mb-40">Your Partner for e-commerce grocery solution</h1>
                                    {{-- <p class="mb-30">Ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p> --}}
                                    {{-- <p>Pitatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia</p> --}}
                                {{-- </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                                    <h3 class="mb-30">Who we are</h3>
                                    <p>Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.</p>
                                </div>
                                <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                                    <h3 class="mb-30">Our history</h3>
                                    <p>Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.</p>
                                </div>
                                <div class="col-lg-4">
                                    <h3 class="mb-30">Our mission</h3>
                                    <p>Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.</p>
                                </div>
                            </div>
                        </section>  --}}
                    </div>
                </div>
            </div>
            {{-- <section class="container mb-50 d-none d-md-block">
                <div class="row about-count">
                    <div class="col-lg-1-5 col-md-6 text-center mb-lg-0 mb-md-5">
                        <h1 class="heading-1"><span class="count">12</span>+</h1>
                        <h4>Glorious years</h4>
                    </div>
                    <div class="col-lg-1-5 col-md-6 text-center">
                        <h1 class="heading-1"><span class="count">36</span>+</h1>
                        <h4>Happy clients</h4>
                    </div>
                    <div class="col-lg-1-5 col-md-6 text-center">
                        <h1 class="heading-1"><span class="count">58</span>+</h1>
                        <h4>Projects complete</h4>
                    </div>
                    <div class="col-lg-1-5 col-md-6 text-center">
                        <h1 class="heading-1"><span class="count">24</span>+</h1>
                        <h4>Team advisor</h4>
                    </div>
                    <div class="col-lg-1-5 text-center d-none d-lg-block">
                        <h1 class="heading-1"><span class="count">26</span>+</h1>
                        <h4>Products Sale</h4>
                    </div>
                </div>
            </section> --}}
            {{-- <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <section class="mb-50">
                            <h2 class="title style-3 mb-40 text-center">Our Team</h2>
                            <div class="row">
                                <div class="col-lg-4 mb-lg-0 mb-md-5 mb-sm-5">
                                    <h6 class="mb-5 text-brand">Our Team</h6>
                                    <h1 class="mb-30">Meet Our Expert Team</h1>
                                    <p class="mb-30">Proin ullamcorper pretium orci. Donec necscele risque leo. Nam massa dolor imperdiet neccon sequata congue idsem. Maecenas malesuada faucibus finibus.</p>
                                    <p class="mb-30">Proin ullamcorper pretium orci. Donec necscele risque leo. Nam massa dolor imperdiet neccon sequata congue idsem. Maecenas malesuada faucibus finibus.</p>
                                    <a href="#" class="btn">View All Members</a>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="team-card">
                                                <img src="assets/front/imgs/page/about-6.png" alt="" />
                                                <div class="content text-center">
                                                    <h4 class="mb-5">H. Merinda</h4>
                                                    <span>CEO & Co-Founder</span>
                                                    <div class="social-network mt-20">
                                                        <a href="#"><img src="assets/front/imgs/theme/icons/icon-facebook-brand.svg" alt="" /></a>
                                                        <a href="#"><img src="assets/front/imgs/theme/icons/icon-twitter-brand.svg" alt="" /></a>
                                                        <a href="#"><img src="assets/front/imgs/theme/icons/icon-instagram-brand.svg" alt="" /></a>
                                                        <a href="#"><img src="assets/front/imgs/theme/icons/icon-youtube-brand.svg" alt="" /></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="team-card">
                                                <img src="assets/front/imgs/page/about-8.png" alt="" />
                                                <div class="content text-center">
                                                    <h4 class="mb-5">Dilan Specter</h4>
                                                    <span>Head Engineer</span>
                                                    <div class="social-network mt-20">
                                                        <a href="#"><img src="assets/front/imgs/theme/icons/icon-facebook-brand.svg" alt="" /></a>
                                                        <a href="#"><img src="assets/front/imgs/theme/icons/icon-twitter-brand.svg" alt="" /></a>
                                                        <a href="#"><img src="assets/front/imgs/theme/icons/icon-instagram-brand.svg" alt="" /></a>
                                                        <a href="#"><img src="assets/front/imgs/theme/icons/icon-youtube-brand.svg" alt="" /></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div> --}}
        </div>
    </main>
@endsection
