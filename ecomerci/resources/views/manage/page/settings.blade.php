

@section('تنظیمات')
      تنظیمات 
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
                        <h5 class="card-title">تنظیمات سایت</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle"></h6>
                    </div>
                    <form method="POST" action="{{ route('manage.settings.update') }}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    
                        <div class="col-md-12 mb-3">
                            <div><h6 class="p-3">صفحه ورود</h6></div>
                            
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">انتخاب عکس ورود</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="imgLogin" name="imgLogin" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="imgLogin">انتخاب عکس ورود</label>
                                        <small class="form-text text-muted">اگر نمی خواهید تصویر را تغییر دهید خالی بگذارید.</small>
                                    </div>
                                    <div class="mt-2 col-md-12 mb-3">
                                        <img style="width: 100%;" src="{{ $settings['imgLogin'] }}" alt="">
                                    </div>
                                </div>
    
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">تیتر ورود</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control " id="titleLogin" name="titleLogin" placeholder="هزینه ارسال" value="{{ $settings['titleLogin'] }}" aria-describedby="inputGroupPrepend3"  >
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 mb-3">
                            <div><h6 class="p-3">صفحه ثبت نام</h6></div>
                            
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">انتخاب عکس ثبت نام</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="imgRegister" name="imgRegister" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="imgRegister">انتخاب عکس ثبت نام</label>
                                        <small class="form-text text-muted">اگر نمی خواهید تصویر را تغییر دهید خالی بگذارید.</small>
                                    </div>
                                    <div class="mt-2 col-md-12 mb-3">
                                        <img style="width: 100%;" src="{{ $settings['imgRegister'] }}" alt="">
                                    </div>
                                </div>
    
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">تیتر ثبت نام</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control " id="titleRegister" name="titleRegister" placeholder="هزینه ارسال" value="{{ $settings['titleRegister'] }}" aria-describedby="inputGroupPrepend3"  >
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 mb-3">
                            <div><h6 class="p-3">صفحه فراموشی رمز عبور</h6></div>
                            
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">انتخاب عکس فراموشی رمز عبور</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="imgForget" name="imgForget" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="imgForget">انتخاب عکس فراموشی رمز عبور</label>
                                        <small class="form-text text-muted">اگر نمی خواهید تصویر را تغییر دهید خالی بگذارید.</small>
                                    </div>
                                    <div class="mt-2 col-md-12 mb-3">
                                        <img style="width: 100%;" src="{{ $settings['imgForget'] }}" alt="">
                                    </div>
                                </div>
    
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">تیتر فراموشی رمز عبور</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control " id="titleForget" name="titleForget" placeholder="هزینه ارسال" value="{{ $settings['titleForget'] }}" aria-describedby="inputGroupPrepend3"  >
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 mb-3">
                            <div><h6 class="p-3">صفحه درباره ما</h6></div>
                            
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">انتخاب عکس درباره ما</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="imgAbute" name="imgAbute" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="imgAbute">انتخاب عکس درباره ما</label>
                                        <small class="form-text text-muted">اگر نمی خواهید تصویر را تغییر دهید خالی بگذارید.</small>
                                    </div>
                                    <div class="mt-2 col-md-12 mb-3">
                                        <img style="width: 100%;" src="{{ $settings['imgAbute'] }}" alt="">
                                    </div>
                                </div>
    
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">تیتر درباره ما</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control " id="titleAbute" name="titleAbute" placeholder="هزینه ارسال" value="{{ $settings['titleAbute'] }}" aria-describedby="inputGroupPrepend3"  >
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 mb-3">
                            <div><h6 class="p-3">صفحه تماس با ما</h6></div>
                            
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">انتخاب عکس تماس باما</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="imgContact" name="imgContact" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="imgContact">انتخاب عکس تماس باما</label>
                                        <small class="form-text text-muted">اگر نمی خواهید تصویر را تغییر دهید خالی بگذارید.</small>
                                    </div>
                                    <div class="mt-2 col-md-12 mb-3">
                                        <img style="width: 100%;" src="{{ $settings['imgContact'] }}" alt="">
                                    </div>
                                </div>
    
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">تیتر تماس باما</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control " id="titleContact" name="titleContact" placeholder="هزینه ارسال" value="{{ $settings['titleContact'] }}" aria-describedby="inputGroupPrepend3"  >
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 row">
                            <div class="col-md-4 mb-3">
                                <label for="validationServerUsername">هزینه ارسال</label>
                                <div class="input-group">
                                    <input type="text" class="form-control " id="delivery" name="delivery" placeholder="هزینه ارسال" value="{{ $settings['delivery'] }}" aria-describedby="inputGroupPrepend3"  >
                                </div>
                            </div>
    
                            <div class="col-md-4 mb-3">
                                <label for="validationServerUsername">حداقل مبلغ خرید</label>
                                <div class="input-group">
                                    <input type="text" class="form-control " id="minCartPrice" name="minCartPrice" placeholder="حداقل مبلغ خرید" value="{{ $settings['minCartPrice'] }}" aria-describedby="inputGroupPrepend3"  >
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationServerUsername">شهر رایگان هزینه ارسال</label>
                                <select class="form-control select-active w-100" name="exceptionDelivery" id="exceptionDelivery">
                                    <option value="">انتخاب استان</option>
                                    @foreach (\App\Models\City::all() as $city)
                                        <option value="{{ $city->id }}" {{ $settings['exceptionDelivery'] == $city->id ? 'selected' : '' }}>{{ $city->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <button class="btn btn-primary" type="submit">ذخیره تنظیمات</button>
                        </div>    
                    
                    </form>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@section('script')
    <!-- Tabledit js -->
    <script src="{{ asset('/assets/manage/plugins/tabledit/jquery.tabledit.js') }}"></script>
    <script src="{{ asset('/assets/manage/js/custom/custom-table-editable.js') }}"></script>
@endsection

