@section('title')
    ایجاد ایمیل
@endsection
@extends('manage.layout.app')
@section('style')
    <!-- Summernote css -->
    <link href="{{ asset('/assets/manage/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-3">
                <div class="email-leftbar">
                    <div class="card m-b-30">
                        <div class="card-header text-center">
                            <a href="apps-email-compose" class="btn btn-danger-rgba btn-lg btn-block py-2 px-0 font-18">
                                <i class="feather icon-plus ml-2"></i>ایجاد پیام
                            </a>
                        </div>
                        <div class="card-body">
                            <ul class="list-group pr-0">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="apps-email-inbox" class="active"><i class="feather icon-inbox ml-2"></i>صندوق ورودی</a>
                                    <span class="badge badge-primary-inverse text-primary">9</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-star ml-2"></i>ستاره‌دار</a>
                                    <span class="badge badge-secondary-inverse">2</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-clock ml-2"></i>تأخیر کرده</a>
                                    <span class="badge badge-secondary-inverse">3</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-send ml-2"></i>ارسال شده</a>
                                    <span class="badge badge-secondary-inverse">4</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-file ml-2"></i>پیش‌نویس‌ها</a>
                                    <span class="badge badge-secondary-inverse">5</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-award ml-2"></i>مهم</a>
                                    <span class="badge badge-secondary-inverse">6</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-alert-octagon ml-2"></i>هرزنامه</a>
                                    <span class="badge badge-secondary-inverse">7</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#"><i class="feather icon-trash ml-2"></i>زباله‌دان</a>
                                    <span class="badge badge-secondary-inverse">8</span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-9">
                <div class="email-rightbar">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">پیام جدید</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group row">
                                    <label for="emailTo" class="col-sm-2 col-form-label">به</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="emailTo" placeholder="ایمیل">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="emailCc" class="col-sm-2 col-form-label">کپی به</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="emailCc" placeholder="کپی">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="emailBcc" class="col-sm-2 col-form-label">کپی مخفی به</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="emailBcc" placeholder="کپی مخفی">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="emailSubject" class="col-sm-2 col-form-label">موضوع</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="emailSubject" placeholder="موضوع">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="emailSubject" class="col-sm-2 col-form-label">پیام</label>
                                    <div class="col-sm-10">
                                        <div class="summernote">سلام روز خوب از اوربیتر</div>
                                    </div>
                                </div>
                                <div class="form-group row text-left">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary-rgba my-1"><i class="feather icon-send ml-2"></i>ارسال</button>
                                        <button type="submit" class="btn btn-success-rgba my-1"><i class="feather icon-save ml-2"></i>ذخیره</button>
                                        <button type="submit" class="btn btn-danger-rgba my-1"><i class="feather icon-trash ml-2"></i>حذف</button>
                                    </div>
                                </div>
                            </form>
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
    <!-- Summernote js -->
    <script src="{{ asset('/assets/manage/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('/assets/manage/js/custom/custom-email.js') }}"></script>
@endsection
