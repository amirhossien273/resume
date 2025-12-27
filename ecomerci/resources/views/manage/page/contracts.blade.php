

@section('تنظیمات')
      تماس باما 
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
                        <h5 class="card-title">تماس باما</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>نام</th>
                                    <th>ایمیل</th>
                                    <th>شماره تلفن</th>
                                    <th>موضوع</th>
                                    <th>پیغام</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contracts as $key => $contract)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $contract->name }}</td>
                                            <td>{{ $contract->email }}</td>
                                            <td>{{ $contract->telephone }}</td>
                                            <td>{{ $contract->subject }}</td>
                                            <td>{{ $contract->message }} </td>
                                            <td>
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

