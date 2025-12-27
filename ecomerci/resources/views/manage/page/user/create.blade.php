@section('title')
     ثبت کاربر
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
                        <h5 class="card-title">ثبت کاربر جدید</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle"></h6>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('manage.users.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer01">نام</label>
                                    <input type="text" class="form-control " id="first_name" name="first_name" placeholder="نام" value="" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer02">نام خانوادگی</label>
                                    <input type="text" class="form-control " id="last_name" name="last_name" placeholder="نام خانوادگی" value="" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">ایمیل</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control " id="email" name="email" placeholder="ایمیل" value="" aria-describedby="inputGroupPrepend3" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">شماره همراه</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control " id="phone" name="phone" placeholder="شماره همراه" value="" aria-describedby="inputGroupPrepend3" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">رمز عبور</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control " id="password" name="password" placeholder="رمز عبور" value="" aria-describedby="inputGroupPrepend3" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServerUsername">تکرار رمز عبور</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control " id="password_confirmation"  name="password_confirmation" placeholder="تکرار رمز عبور" value="" aria-describedby="inputGroupPrepend3" required>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group col-md-4 mb-3">
                                <label  for="inputGroupSelect01">سطح دسترسی</label>
                                <div class="input-group">
                                    <select class="custom-select" id="role" name="role">
                                        <option selected="">انتخاب کنید...</option>
                                        <option value="admin">ادمین سایت</option>
                                        <option value="customer">کاربر</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">ثبت کاربر</button>
                        </form>
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
    <!-- Tabledit js -->
    <script src="{{ asset('/assets/manage/plugins/tabledit/jquery.tabledit.js') }}"></script>
    <script src="{{ asset('/assets/manage/js/custom/custom-table-editable.js') }}"></script>
@endsection
