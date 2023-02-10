<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('/')}}admin/assets/images/favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <title>Portfolio | @yield('title')</title>
    {{--   css--}}
    @stack('before-style')
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/plugins/bootstrap/css/bootstrap.min.css">
    @stack('page-style')
<!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/css/style.min.css">
</head>

<body class="theme-blush">

<!-- Page Loader -->
@include('admin.includes.page-loader')
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
{{--right sidebar--}}
@include('admin.includes.right-sidebar')
{{--left sidebar--}}
@include('admin.includes.left-sidebar')
{{--@yield('body')--}}

<!-- Main Content -->
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>@yield('title')</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="zmdi zmdi-home"></i> Aero</a>
                    </li>
                    @if (trim($__env->yieldContent('parentPageTitle')))
                        <li class="breadcrumb-item">@yield('parentPageTitle')</li>
                    @endif
                    @if (trim($__env->yieldContent('title')))
                        <li class="breadcrumb-item active">@yield('title')</li>
                    @endif
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                        class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                        class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @yield('content')
    </div>
</section>

@stack('before-script')
<!-- Jquery Core Js -->
<script src="{{asset('/')}}admin/assets/bundles/libscripts.bundle.js"></script>
<!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{asset('/')}}admin/assets/bundles/vendorscripts.bundle.js"></script>
<!-- slimscroll, waves Scripts Plugin Js -->
<script src="{{asset('/')}}admin/assets/bundles/mainscripts.bundle.js"></script>
{{--extend more js--}}
@stack('page-script')

</body>
</html>
