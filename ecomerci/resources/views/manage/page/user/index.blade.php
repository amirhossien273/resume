@section('title')
    نمایش کاربران
@endsection
@extends('manage.layout.app')
@section('style')
    <style>
        .widgetbar{
            text-align: left;
        }
    </style>
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
                        <div class="row align-items-center">
                            <div class="col-md-8 col-lg-8">
                                <h5 class="card-title">لیست تمامی کاربران</h5>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="widgetbar">
                                    <a href="{{route('manage.users.create')}}" class="btn btn-primary-rgba"><i class="feather icon-plus ml-2"></i>اضافه کردن کاربر</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle"></h6>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام / نام خانوادگی</th>
                                    <th>شماره همراه</th>
                                    <th>ایمیل</th>   
                                    <th>نقش</th>                                 
                                    <th>وضعیت</th>                                 
                                    <th>#</th>                                 
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role}}</td>
                                            <td>
                                                @if($user->blocked_at == null)
                                                   فعال
                                                @else
                                                   غیر فعال
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->blocked_at == null)
                                                <a href="{{route('manage.users.block', $user->id)}}" class="btn btn-danger btn-sm">غیر فعال <i class="fa fa-lock"></i></a>
                                                @else
                                                <a href="{{route('manage.users.unblock', $user->id)}}" class="btn btn-success btn-sm"> فعال <i class="fa fa-unlock-alt"></i></a>
                                                @endif
                                                <form action="{{ route('manage.users.destroy', $user->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">حذف کاربر <i class="fa fa-remove"></i></button>
                                                </form>
                                                <a href="{{route('manage.users.edit', $user->id)}}" class="btn btn-primary btn-sm">ویرایش <i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
    <!-- Tabledit js -->
    <script src="{{ asset('/assets/manage/plugins/tabledit/jquery.tabledit.js') }}"></script>
    <script src="{{ asset('/assets/manage/js/custom/custom-table-editable.js') }}"></script>
@endsection
