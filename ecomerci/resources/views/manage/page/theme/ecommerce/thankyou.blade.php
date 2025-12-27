@section('title')
    متشکریم
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
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">سفارش تأیید شده</h5>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <div class="thankyou-content text-center my-5">
                                    <img src="/assets/manage/images/ecommerce/thankyou.svg" class="img-fluid mb-5"
                                         alt="تشکر">
                                    <h2 class="text-success">متشکریم !!!</h2>
                                    <p class="my-4">سفارش شما با موفقیت ثبت شده است. شماره سفارش شما
                                        #9869572
                                        می‌باشد.</p>
                                    <div class="button-list">
                                        <button type="button" class="btn btn-primary-rgba font-16"><i
                                                class="feather icon-map-pin ml-2"></i>پیگیری سفارش
                                        </button>
                                        <button type="button" class="btn btn-success font-16"><i
                                                class="feather icon-file-text ml-2"></i>مشاهده فاکتور
                                        </button>
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

@endsection
