@section('title')
    گالری
@endsection
@extends('manage.layout.app')
@section('style')

@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="gallery-filter-box text-center m-b-30">
                            <div class="gallery-filter">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><a class="filter-item current" data-filter="*">همه</a>
                                    </li>
                                    <li class="list-inline-item"><a class="filter-item"
                                                                    data-filter=".latest">جدیدترین</a></li>
                                    <li class="list-inline-item"><a class="filter-item" data-filter=".fashion">مد</a>
                                    </li>
                                    <li class="list-inline-item"><a class="filter-item" data-filter=".popular">محبوب</a>
                                    </li>
                                    <li class="list-inline-item"><a class="filter-item" data-filter=".trending">داغ</a>
                                    </li>
                                    <li class="list-inline-item"><a class="filter-item" data-filter=".sale">تخفیف</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="gallery-item-box">
                            <div class="gallery-item-box">
                                <div class="grid row justify-content-md-center">
                                    <div class="grid-item col-sm-6 col-md-6 col-lg-4 col-xl-3 latest">
                                        <div class="gallery-box">
                                            <div class="gallery-preview">
                                                <img src="/assets/manage/images/gallery/gallery-1.jpg" class="img-fluid"
                                                     alt="تصویر گالری"/>
                                            </div>
                                            <div class="gallery-content">
                                                <p>جدیدترین</p>
                                                <h5><a href="#">تی‌شرت</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-item col-sm-6 col-md-6 col-lg-4 col-xl-3 fashion">
                                        <div class="gallery-box">
                                            <div class="gallery-preview">
                                                <img src="/assets/manage/images/gallery/gallery-2.jpg" class="img-fluid"
                                                     alt="تصویر گالری"/>
                                            </div>
                                            <div class="gallery-content">
                                                <p>مد</p>
                                                <h5><a href="#">جینز</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-item col-sm-6 col-md-6 col-lg-4 col-xl-3 popular">
                                        <div class="gallery-box">
                                            <div class="gallery-preview">
                                                <img src="/assets/manage/images/gallery/gallery-3.jpg" class="img-fluid"
                                                     alt="تصویر گالری"/>
                                            </div>
                                            <div class="gallery-content">
                                                <p>محبوب</p>
                                                <h5><a href="#">پیراهن</a></h5>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="grid-item col-sm-6 col-md-6 col-lg-4 col-xl-3 trending">
                                        <div class="gallery-box">
                                            <div class="gallery-preview">
                                                <img src="/assets/manage/images/gallery/gallery-4.jpg" class="img-fluid"
                                                     alt="تصویر گالری"/>
                                            </div>
                                            <div class="gallery-content">
                                                <p>در حال مد</p>
                                                <h5><a href="#">لباس</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-item col-sm-6 col-md-6 col-lg-4 col-xl-3 sale">
                                        <div class="gallery-box">
                                            <div class="gallery-preview">
                                                <img src="/assets/manage/images/gallery/gallery-5.jpg" class="img-fluid"
                                                     alt="تصویر گالری"/>
                                            </div>
                                            <div class="gallery-content">
                                                <p>تخفیف</p>
                                                <h5><a href="#">ساری</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-item col-sm-6 col-md-6 col-lg-4 col-xl-3 latest">
                                        <div class="gallery-box">
                                            <div class="gallery-preview">
                                                <img src="/assets/manage/images/gallery/gallery-6.jpg" class="img-fluid"
                                                     alt="تصویر گالری"/>
                                            </div>
                                            <div class="gallery-content">
                                                <p>جدیدترین</p>
                                                <h5><a href="#">کفش</a></h5>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="grid-item col-sm-6 col-md-6 col-lg-4 col-xl-3 fashion">
                                        <div class="gallery-box">
                                            <div class="gallery-preview">
                                                <img src="/assets/manage/images/gallery/gallery-7.jpg" class="img-fluid"
                                                     alt="تصویر گالری"/>
                                            </div>
                                            <div class="gallery-content">
                                                <p>مد</p>
                                                <h5><a href="#">کمربند</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-item col-sm-6 col-md-6 col-lg-4 col-xl-3 popular">
                                        <div class="gallery-box">
                                            <div class="gallery-preview">
                                                <img src="/assets/manage/images/gallery/gallery-8.jpg" class="img-fluid"
                                                     alt="تصویر گالری"/>
                                            </div>
                                            <div class="gallery-content">
                                                <p>محبوب</p>
                                                <h5><a href="#">عینک آفتابی</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-item col-sm-6 col-md-6 col-lg-4 col-xl-3 trending">
                                        <div class="gallery-box">
                                            <div class="gallery-preview">
                                                <img src="/assets/manage/images/gallery/gallery-9.jpg" class="img-fluid"
                                                     alt="تصویر گالری"/>
                                            </div>
                                            <div class="gallery-content">
                                                <p>در حال مد</p>
                                                <h5><a href="#">ساعت</a></h5>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="grid-item col-sm-6 col-md-6 col-lg-4 col-xl-3 sale">
                                        <div class="gallery-box">
                                            <div class="gallery-preview">
                                                <img src="/assets/manage/images/gallery/gallery-10.jpg"
                                                     class="img-fluid" alt="تصویر گالری"/>
                                            </div>
                                            <div class="gallery-content">
                                                <p>فروش</p>
                                                <h5><a href="#">دستبند</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-item col-sm-6 col-md-6 col-lg-4 col-xl-3 fashion">
                                        <div class="gallery-box">
                                            <div class="gallery-preview">
                                                <img src="/assets/manage/images/gallery/gallery-11.jpg"
                                                     class="img-fluid" alt="تصویر گالری"/>
                                            </div>
                                            <div class="gallery-content">
                                                <p>مد</p>
                                                <h5><a href="#">انگشتر</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-item col-sm-6 col-md-6 col-lg-4 col-xl-3 sale">
                                        <div class="gallery-box">
                                            <div class="gallery-preview">
                                                <img src="/assets/manage/images/gallery/gallery-12.jpg"
                                                     class="img-fluid" alt="تصویر گالری"/>
                                            </div>
                                            <div class="gallery-content">
                                                <p>فروش</p>
                                                <h5><a href="#">زنجیر</a></h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@section('script')
    <!-- Isotope js -->
    <script src="{{ asset('/assets/manage/plugins/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/assets/manage/js/custom/custom-gallery.js') }}"></script>
@endsection
