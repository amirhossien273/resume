@section('title')
     ویرایش کاربر
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
                        <h5 class="card-title">ویرایش کاربر </h5>
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
                        <form method="POST" action="{{ route('manage.users.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="first_name">نام</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="نام" value="{{ old('first_name', $user->first_name) }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="last_name">نام خانوادگی</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="نام خانوادگی" value="{{ old('last_name', $user->last_name) }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="email">ایمیل</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="ایمیل" value="{{ old('email', $user->email) }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="phone">شماره همراه</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="شماره همراه" value="{{ old('phone', $user->phone) }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="password">رمز عبور</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="رمز عبور">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="password_confirmation">تکرار رمز عبور</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="تکرار رمز عبور">
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-3">
                                <label for="role">سطح دسترسی</label>
                                <select class="custom-select" id="role" name="role" required>
                                    <option value="" disabled selected>انتخاب کنید...</option>
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>ادمین سایت</option>
                                    <option value="customer" {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>کاربر</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">ویرایش کاربر</button>
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
