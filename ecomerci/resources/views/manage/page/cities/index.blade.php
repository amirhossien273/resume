@section('title')
    شهرها
@endsection
@extends('manage.layout.app')

@section('style')
    <style>
        .widgetbar {
            text-align: left;
        }
    </style>
@endsection

@section('rightbar-content')
    <div class="contentbar">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-8 col-lg-8">
                                <h5 class="card-title">لیست شهرها</h5>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="widgetbar">
                                    <a href="{{ route('manage.cities.create') }}" class="btn btn-primary-rgba">
                                        <i class="feather icon-plus ml-2"></i>اضافه کردن شهر
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>نام</th>
                                        <th>استان</th>
                                        <th>کد تلفن</th>
                                        <th>الویت نمایش</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cities as $key => $city)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $city->title }}</td>
                                            <td>{{ $city->province->title }}</td>
                                            <td>{{ $city->phone_code }}</td>
                                            <td>{{ $city->show_order }}</td>
                                            <td>
                                                <a href="{{ route('manage.cities.edit', $city->id) }}" class="btn btn-primary btn-sm">ویرایش</a>
                                                <form action="{{ route('manage.cities.destroy', $city->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('آیا مطمئن هستید؟');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
