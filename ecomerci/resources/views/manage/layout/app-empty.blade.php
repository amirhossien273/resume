<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Shabdar is a bootstrap minimal & clean admin template">
    <meta name="keywords"
          content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Mohsen Fathipour">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('/assets/manage/images/favicon.ico') }}">
    <!-- Start CSS -->
    @yield('style')
    <link href="{{ asset('/assets/manage/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/manage/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/manage/css/yekanbakh.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/manage/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/manage/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/manage/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- End CSS -->
</head>
<body class="vertical-layout">


<!-- Start Containerbar -->
<div id="containerbar" class="containerbar authenticate-bg">
    @yield('content')
</div>
<!-- End Containerbar -->

<!-- Start JS -->
<script src="{{ asset('/assets/manage/js/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/manage/js/popper.min.js') }}"></script>
<script src="{{ asset('/assets/manage/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/manage/js/modernizr.min.js') }}"></script>
<script src="{{ asset('/assets/manage/js/detect.js') }}"></script>
<script src="{{ asset('/assets/manage/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('/assets/manage/js/vertical-menu.js') }}"></script>
<script src="{{ asset('/assets/manage/plugins/switchery/switchery.min.js') }}"></script>
@yield('script')
<!-- Core JS -->
<script src="{{ asset('/assets/manage/js/core.js') }}"></script>
<!-- End JS -->
</body>
</html>






