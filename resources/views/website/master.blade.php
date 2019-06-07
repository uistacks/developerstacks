<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} - @yield('title', 'Home')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <style>
        .section-title:after {
            content: '';
            display: block;
            width: 100px;
            height: 2px;
            margin: 10px auto 0;
            background: linear-gradient(to right,#f077ff,#6283ff);
            border-radius: 100px;
        }
    </style>
    @yield('header')
</head>
<body>
<input type="hidden" id="base_path" value="{{url('/')}}/" />
<!-- Page content -->
<div class="page-content">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Hero unit -->
        <div class="section gradient-1">
            <!-- Main navbar -->
        @include('website.regions.header')
        <!-- /main navbar -->

            <!-- Jumbotron -->
        @yield('banner')
        <!-- /jumbotron -->

        </div>
        <!-- /hero unit -->

    @yield('content')

    <!-- Footer -->
    @include('website.regions.footer')
    <!-- /footer -->

    </div>
    <!-- /main content -->

</div>
<!-- Core JS files -->
<script src="{{ asset('assets/js/main/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/pickadate/picker.js') }}"></script>
<script src="{{ asset('assets/js/plugins/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<!-- /core JS files -->
<!-- Theme JS files -->
{{--<script src="{{ asset('assets/js/plugins/ui/sticky.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/pages/navbar_multiple_sticky.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>--}}
<!-- /theme JS files -->
@include('website.blocks.message')
@yield('footer')
</body>
</html>