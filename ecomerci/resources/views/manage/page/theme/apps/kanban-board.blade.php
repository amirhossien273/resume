@section('title')
    تخته کانبان
@endsection
@extends('manage.layout.app')
@section('style')
    <!-- Dragula css -->
    <link href="{{ asset('/assets/manage/plugins/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">کارهای انجام نشده</h5>
                    </div>
                    <div class="card-body">
                        <div id="kanban-board-one">
                            <div class="card border m-b-20">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="kanban-tag">
                                                <span class="badge badge-primary-inverse font-14">فوری</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="kanban-menu">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                            type="button" id="KanbanBoardButton1" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="KanbanBoardButton1">
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-refresh-ccw ml-2"></i>همگام‌سازی</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-edit-2 ml-2"></i>ویرایش</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-trash ml-2"></i>حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="font-16 my-3">آدرس را در صفحه تماس با ما بروزرسانی کنید</h5>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="kanban-comment">
                                                <span class="font-14"><i class="feather icon-message-circle ml-2"></i>۵</span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="kanban-users">
                                                <div class="avatar-group">
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="آمی آدامز">
                                                            <img src="/assets/manage/images/users/men.svg" alt="avatar"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="آمی آدامز">
                                                            <img src="/assets/manage/images/users/women.svg"
                                                                 alt="avatar" class="rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="آمی آدامز">
                                                            <img src="/assets/manage/images/users/boy.svg" alt="avatar"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border m-b-20">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="kanban-tag">
                                                <span class="badge badge-success-inverse font-14">بازبینی</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="kanban-menu">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                            type="button" id="KanbanBoardButton2" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="KanbanBoardButton2">
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-refresh-ccw ml-2"></i>همگام‌سازی</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-edit-2 ml-2"></i>ویرایش</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-trash ml-2"></i>حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="font-16 my-3">سیم‌کشی برای پروژه آینده توسعه وب ایجاد کنید</h5>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="kanban-comment">
                                                <span class="font-14"><i class="feather icon-message-circle ml-2"></i>۸</span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="kanban-users">
                                                <div class="avatar-group">
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="آمی آدامز">
                                                            <img src="/assets/manage/images/users/men.svg" alt="avatar"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="آمی آدامز">
                                                            <img src="/assets/manage/images/users/women.svg"
                                                                 alt="avatar" class="rounded-circle">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border m-b-20">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="kanban-tag">
                                                <span class="badge badge-danger-inverse font-14">تیم پروژه</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="kanban-menu">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                            type="button" id="KanbanBoardButton3" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="KanbanBoardButton3">
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-refresh-ccw ml-2"></i>همگام‌سازی</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-edit-2 ml-2"></i>ویرایش</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-trash ml-2"></i>حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="font-16 my-3">چکیده نهایی را برای استراتژی پادکست زنده ایجاد
                                                کنید، همراه با ارائه اولیه.</h5>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="kanban-comment">
                                                <span class="font-14"><i class="feather icon-message-circle ml-2"></i>۲</span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="kanban-users">
                                                <div class="avatar-group">
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="آمی آدامز">
                                                            <img src="/assets/manage/images/users/men.svg" alt="avatar"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border m-b-20">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="kanban-tag">
                                                <span class="badge badge-info-inverse font-14">حسابداری</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="kanban-menu">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                            type="button" id="KanbanBoardButton4" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="KanbanBoardButton4">
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-refresh-ccw ml-2"></i>همگام‌سازی</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-edit-2 ml-2"></i>ویرایش</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-trash ml-2"></i>حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="font-16 my-3">فرم 16 کارمندان را برای ارائه اظهارنامه مالی دولتی
                                                پردازش کنید.</h5>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="kanban-comment">
                                                <span class="font-14"><i class="feather icon-message-circle ml-2"></i>۲</span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="kanban-users">
                                                <div class="avatar-group">
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="آمی آدامز">
                                                            <img src="/assets/manage/images/users/men.svg" alt="avatar"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary-rgba btn-block btn-lg font-16">
                            <i class="feather icon-plus ml-2"></i>وظیفه جدید
                        </button>

                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">در حال انجام</h5>
                    </div>
                    <div class="card-body">
                        <div id="kanban-board-two">
                            <div class="card border m-b-20">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="kanban-tag">
                                                <span class="badge badge-success-inverse font-14">بروزرسانی_۰۲</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="kanban-menu">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                            type="button" id="KanbanBoardButton5" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="KanbanBoardButton5">
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-refresh-ccw ml-2"></i>همگام‌سازی</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-edit-2 ml-2"></i>ویرایش</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-trash ml-2"></i>حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="font-16 my-3">پایان آزمون اپلیکیشن زنده برای خانه هوشمند.</h5>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="kanban-comment">
                                                <span class="font-14"><i class="feather icon-message-circle ml-2"></i>۵</span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="kanban-users">
                                                <div class="avatar-group">
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/men.svg" alt="آواتار"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/women.svg"
                                                                 alt="آواتار" class="rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/boy.svg" alt="آواتار"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border m-b-20">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="kanban-tag">
                                                <span class="badge badge-primary-inverse font-14">تیم هسته</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="kanban-menu">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                            type="button" id="KanbanBoardButton6" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="KanbanBoardButton6">
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-refresh-ccw ml-2"></i>همگام‌سازی</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-edit-2 ml-2"></i>ویرایش</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-trash ml-2"></i>حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="font-16 my-3">تهیه کاغذهای سفید برای سیستم پرداخت جدید.</h5>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="kanban-comment">
                                                <span class="font-14"><i class="feather icon-message-circle ml-2"></i>۸</span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="kanban-users">
                                                <div class="avatar-group">
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/men.svg" alt="آواتار"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/women.svg"
                                                                 alt="آواتار" class="rounded-circle">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border m-b-20">
                                <img class="card-img-top" src="/assets/manage/images/ui-cards/ui-cards-1.jpg"
                                     alt="تصویر کارت">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="kanban-tag">
                                                <span class="badge badge-danger-inverse font-14">محصول</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="kanban-menu">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                            type="button" id="KanbanBoardButton7" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="KanbanBoardButton7">
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-refresh-ccw ml-2"></i>همگام‌سازی</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-edit-2 ml-2"></i>ویرایش</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-trash ml-2"></i>حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="font-16 my-3">تغییر در زاویه چند عکس از جلسه عکاسی شماره ۵</h5>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="kanban-comment">
                                                <span class="font-14"><i class="feather icon-message-circle ml-2"></i>۲</span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="kanban-users">
                                                <div class="avatar-group">
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/men.svg" alt="آواتار"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary-rgba btn-block btn-lg font-16">
                            <i class="feather icon-plus ml-2"></i>افزودن وظیفه
                        </button>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">در بررسی</h5>
                    </div>
                    <div class="card-body">
                        <div id="kanban-board-three">
                            <div class="card border m-b-20">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="kanban-tag">
                                                <span class="badge badge-primary-inverse font-14">پیشنهاد خروجی</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="kanban-menu">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                            type="button" id="KanbanBoardButton8" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="KanbanBoardButton8">
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-refresh-ccw ml-2"></i>همگام‌سازی</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-edit-2 ml-2"></i>ویرایش</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-trash ml-2"></i>حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="font-16 my-3">تأیید بودجه با سام برای خروجی شرکتی روز شنبه.</h5>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="kanban-comment">
                                                <span class="font-14"><i class="feather icon-message-circle ml-2"></i>5</span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="kanban-users">
                                                <div class="avatar-group">
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/men.svg" alt="avatar"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/women.svg"
                                                                 alt="avatar" class="rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/boy.svg" alt="avatar"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border m-b-20">
                                <img class="card-img-top" src="/assets/manage/images/ui-cards/ui-cards-2.jpg"
                                     alt="تصویر کارت">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="kanban-tag">
                                                <span class="badge badge-success-inverse font-14">ویدئو محصول</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="kanban-menu">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                            type="button" id="KanbanBoardButton9" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="KanbanBoardButton9">
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-refresh-ccw ml-2"></i>همگام‌سازی</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-edit-2 ml-2"></i>ویرایش</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-trash ml-2"></i>حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="font-16 my-3">آپلود ویدئو تجاری جدید برای تبلیغات آنلاین.</h5>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="kanban-comment">
                                                <span class="font-14"><i class="feather icon-message-circle ml-2"></i>8</span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="kanban-users">
                                                <div class="avatar-group">
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/men.svg" alt="avatar"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/women.svg"
                                                                 alt="avatar" class="rounded-circle">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border m-b-20">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="kanban-tag">
                                                <span class="badge badge-secondary-inverse font-14">یادآوری</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="kanban-menu">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                            type="button" id="KanbanBoardButton10"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="KanbanBoardButton10">
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-refresh-ccw ml-2"></i>همگام‌سازی</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-edit-2 ml-2"></i>ویرایش</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-trash ml-2"></i>حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="font-16 my-3">به‌روزرسانی تصاویر اسلایدر در shabdar.mohsenfathipour.com برای
                                                رویداد جدید.</h5>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="kanban-comment">
                                                <span class="font-14"><i class="feather icon-message-circle ml-2"></i>2</span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="kanban-users">
                                                <div class="avatar-group">
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/men.svg" alt="avatar"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary-rgba btn-block btn-lg font-16">
                            <i class="feather icon-plus ml-2"></i>افزودن وظیفه
                        </button>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6 col-xl-3">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">تکمیل شده</h5>
                    </div>

                    <div class="card-body">
                        <div id="kanban-board-four">
                            <div class="card border m-b-20">
                                <img class="card-img-top" src="/assets/manage/images/ui-cards/ui-cards-3.jpg"
                                     alt="تصویر کارت">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="kanban-tag">
                                                <span class="badge badge-primary-inverse font-14">تنظیمات بازخورد</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="kanban-menu">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                            type="button" id="KanbanBoardButton11"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu" aria-labelledby="KanbanBoardButton11">
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-refresh-ccw ml-2"></i>همگام‌سازی</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-edit-2 ml-2"></i>ویرایش</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-trash ml-2"></i>حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="font-16 my-3">محصولات #985 و #987 باید برای تنظیمات بازتاب بهبود
                                                یابند.</h5>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="kanban-comment">
                                                <span class="font-14"><i class="feather icon-message-circle ml-2"></i>5</span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="kanban-users">
                                                <div class="avatar-group">
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/men.svg" alt="آواتار"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/women.svg"
                                                                 alt="آواتار"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/boy.svg" alt="آواتار"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border m-b-20">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="kanban-tag">
                                                <span
                                                    class="badge badge-success-inverse font-14">شبکه‌های اجتماعی</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="kanban-menu">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                            type="button" id="KanbanBoardButton12"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="KanbanBoardButton12">
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-refresh-ccw ml-2"></i>همگام‌سازی</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-edit-2 ml-2"></i>ویرایش</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-trash ml-2"></i>حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="font-16 my-3">مجموعه تبلیغاتی کاروسل برای محصول جدید ایجاد
                                                کنید.</h5>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="kanban-comment">
                                                <span class="font-14"><i class="feather icon-message-circle ml-2"></i>8</span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="kanban-users">
                                                <div class="avatar-group">
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/men.svg" alt="آواتار"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/women.svg"
                                                                 alt="آواتار"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border m-b-15">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="kanban-tag">
                                                <span class="badge badge-danger-inverse font-14">فوری</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="kanban-menu">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                            type="button" id="KanbanBoardButton13"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><i
                                                            class="feather icon-more-vertical-"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="KanbanBoardButton13">
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-refresh-ccw ml-2"></i>همگام‌سازی</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-edit-2 ml-2"></i>ویرایش</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="feather icon-trash ml-2"></i>حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="font-16 my-3">آزمون پایانی برای وب‌اپلیکیشن شبکه‌های اجتماعی 3.0
                                                را تمام کنید.</h5>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="kanban-comment">
                                                <span class="font-14"><i class="feather icon-message-circle ml-2"></i>2</span>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="kanban-users">
                                                <div class="avatar-group">
                                                    <div class="avatar">
                                                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="امی آدامز">
                                                            <img src="/assets/manage/images/users/men.svg" alt="آواتار"
                                                                 class="rounded-circle">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary-rgba btn-block btn-lg font-16"><i
                                class="feather icon-plus ml-2"></i>افزودن وظیفه
                        </button>
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
    <!-- Dragula js -->
    <script src="{{ asset('/assets/manage/plugins/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('/assets/manage/js/custom/custom-kanban.js') }}"></script>
@endsection
