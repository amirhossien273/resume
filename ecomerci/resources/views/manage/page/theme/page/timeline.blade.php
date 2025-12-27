@section('title')
    جدول زمانی
@endsection
@extends('manage.layout.app')
@section('style')
<!-- Vertical Timeline css -->
<link href="{{ asset('/assets/manage/plugins/vertical-timeline/vertical-timeline.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <div class="card m-b-30">
    <section class="timeline timeline-js">
        <div class="timeline-container">
            <div class="timeline-block block-js">
                <div class="timeline-img timeline-img-primary img-js"><i class="feather icon-flag"></i></div>
                <div class="timeline-content content-js">
                    <h4>تأسیس شرکت</h4>
                    <p>متن نمونه لورم ایپسوم به طور معمول متنی بی‌معنی در صنعت چاپ و صفحه‌آرایی است. لورم ایپسوم به طور قانونی متعلق به دوره‌های ۱۵۰۰ ساله است، وقتی یک چاپگر ناشناخته یک کتاب نمونه گرفت و آن را بازچینی کرد تا یک کتاب نمونه از نوع و متن ساخت.</p>
                    <span class="timeline-date">جولای ۲۰۱۹</span>
                </div>
            </div>
            <div class="timeline-block block-js">
                <div class="timeline-img timeline-img-primary img-js"><i class="feather icon-flag"></i></div>
                <div class="timeline-content content-js">
                    <h4>نمایش در بورس</h4>
                    <p>متن نمونه لورم ایپسوم به طور معمول متنی بی‌معنی در صنعت چاپ و صفحه‌آرایی است. لورم ایپسوم به طور قانونی متعلق به دوره‌های ۱۵۰۰ ساله است، وقتی یک چاپگر ناشناخته یک کتاب نمونه گرفت و آن را بازچینی کرد تا یک کتاب نمونه از نوع و متن ساخت.</p>
                    <span class="timeline-date">مارس ۲۰۱۹</span>
                </div>
            </div>
            <div class="timeline-block block-js">
                <div class="timeline-img timeline-img-primary img-js"><i class="feather icon-flag"></i></div>
                <div class="timeline-content content-js">
                    <h4>ورود به بخش خرده‌فروشی</h4>
                    <p>متن نمونه لورم ایپسوم به طور معمول متنی بی‌معنی در صنعت چاپ و صفحه‌آرایی است. لورم ایپسوم به طور قانونی متعلق به دوره‌های ۱۵۰۰ ساله است، وقتی یک چاپگر ناشناخته یک کتاب نمونه گرفت و آن را بازچینی کرد تا یک کتاب نمونه از نوع و متن ساخت.</p>
                    <span class="timeline-date">ژانویه ۲۰۱۹</span>
                </div>
            </div>
            <div class="timeline-block block-js">
                <div class="timeline-img timeline-img-primary img-js"><i class="feather icon-flag"></i></div>
                <div class="timeline-content content-js">
                    <h4>دستیابی به میل‌استون ۲۵۰ فروشگاه در سراسر جهان</h4>
                    <p>متن نمونه لورم ایپسوم به طور معمول متنی بی‌معنی در صنعت چاپ و صفحه‌آرایی است. لورم ایپسوم به طور قانونی متعلق به دوره‌های ۱۵۰۰ ساله است، وقتی یک چاپگر ناشناخته یک کتاب نمونه گرفت و آن را بازچینی کرد تا یک کتاب نمونه از نوع و متن ساخت.</p>
                    <span class="timeline-date">اوت ۲۰۱۸</span>
                </div>
            </div>
            <div class="timeline-block block-js">
                <div class="timeline-img timeline-img-primary img-js"><i class="feather icon-flag"></i></div>
                <div class="timeline-content content-js">
                    <h4>شروع عملیات در سوئیس</h4>
                    <p>متن نمونه لورم ایپسوم به طور معمول متنی بی‌معنی در صنعت چاپ و صفحه‌آرایی است. لورم ایپسوم به طور قانونی متعلق به دوره‌های ۱۵۰۰ ساله است، وقتی یک چاپگر ناشناخته یک کتاب نمونه گرفت و آن را بازچینی کرد تا یک کتاب نمونه از نوع و متن ساخت.</p>
                    <span class="timeline-date">مه ۲۰۱۸</span>
                </div>
            </div>
            <div class="timeline-block block-js">
                <div class="timeline-img timeline-img-primary img-js"><i class="feather icon-flag"></i></div>
                <div class="timeline-content content-js">
                    <h4>میل‌استون - پوشش 24٪ از بازار الکترونیک</h4>
                    <p>متن نمونه لورم ایپسوم به طور معمول متنی بی‌معنی در صنعت چاپ و صفحه‌آرایی است. لورم ایپسوم به طور قانونی متعلق به دوره‌های ۱۵۰۰ ساله است، وقتی یک چاپگر ناشناخته یک کتاب نمونه گرفت و آن را بازچینی کرد تا یک کتاب نمونه از نوع و متن ساخت.</p>
                    <span class="timeline-date">فوریه ۲۰۱۸</span>
                </div>
            </div>
        </div>
    </section>
    </div>
</div>
<!-- End Contentbar -->
@endsection
@section('script')
<!-- Timeline js -->
<script src="{{ asset('/assets/manage/plugins/vertical-timeline/vertical-timeline.js') }}"></script>
@endsection
