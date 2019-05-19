<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} - @yield('title', 'Administrator Login')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('assets/js/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('assets/js/plugins/ui/sticky.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/pages/navbar_multiple_sticky.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- /theme JS files -->

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
        @include('website.home.blocks.banner')
        <!-- /jumbotron -->


            <!-- Tabs navigation -->
            <div class="bg-dark-alpha mt-1">
                <div class="container px-0 px-sm-2">
                    <ul class="nav nav-tabs nav-tabs-light flex-nowrap text-nowrap overflow-auto nav-justified border-0 mb-0">
                        <li class="nav-item">
                            <a href="#bs4" class="nav-link active" data-toggle="tab">Bootstrap 4</a>
                        </li>
                        <li class="nav-item">
                            <a href="#bs3" class="nav-link" data-toggle="tab">Bootstrap 3</a>
                        </li>
                        <li class="nav-item">
                            <a href="#github" class="nav-link" data-toggle="tab">Github access</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://kopyov.ticksy.com" class="nav-link" target="_blank">Support</a>
                        </li>
                        <li class="nav-item">
                            <a href="#hire" class="nav-link" data-toggle="tab">Customization</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /tabs navigation -->

        </div>
        <!-- /hero unit -->

    @yield('content')

    <!-- Footer -->
    @include('website.regions.footer')
    <!-- /footer -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->
</body>
</html>