<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} - @yield('title', 'Administrator')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    @yield('header')
</head>

<body>

<!-- Main navbar -->
@include('admin.regions.header')
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            <span class="font-weight-semibold">Navigation</span>
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->


        <!-- Sidebar content -->
    @include('admin.regions.sidebar')
    <!-- /sidebar content -->

    </div>
    <!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        @include('admin.regions.breadcrumb')
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

            @yield('content')

        </div>
        <!-- /content area -->
        <!-- Footer -->
    @include('admin.regions.footer')
    <!-- /footer -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->
<!-- Core JS files -->
<script src="{{ asset('assets/js/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
{{--    <script src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>--}}
<!-- /core JS files -->
<script src="{{ asset('assets/js/app.js') }}"></script>
@yield('footer')
</body>
</html>