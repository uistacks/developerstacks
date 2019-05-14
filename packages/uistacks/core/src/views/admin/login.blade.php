<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} - @yield('title', 'Administrator Login')</title>
    <link href="{{ url('/') }}/assets/images/logo.png" rel="shortcut icon" />
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
    {{--    <script src="{{ asset('assets/js/plugins.js') }}"></script>--}}
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- /theme JS files -->

</head>
<body>
<!-- Page content -->
<div class="page-content">
    <!-- Main content -->
    <div class="content-wrapper">
        <div class="section b-white pt-5">
            <div class="content container">
                <div class="section-title text-center mb-4">
                    <h1 class="mb-2 font-weight-light">Get an access to <span class="font-weight-semibold">{{ config('app.name') }}</span> Administrator Login</h1>
                    {{--<div class="text-grey">If you want to submit bug report, track all changes in files, request a new feature, contribute to the project, get latest code and updates before official release or simply participate in discussions, fill in all inputs and request an access to private repository on Github. This service is not automated so kindly expect a minor delay.</div>--}}
                </div>

                <div class="d-flex justify-content-center align-items-center pt-1">
                    <form class="quform w-100 w-sm-auto wmin-sm-400" method="post" action="{{ action('\Uistacks\Core\Controllers\AdminLoginController@postAdmin') }}">
                        @csrf
                        <div class="card mb-5">
                            <div class="card-body quform-elements">
                                <div class="text-center mb-3">
                                    {{--<i class="icon-github icon-3x text-slate-800 pt-2 mb-3 mt-1"></i>--}}
                                    <img src="{{ url('/') }}/assets/images/logo.png" class="text-slate-800" style="width: 100px;" />
                                    <h5 class="mb-0">{{ config('app.name') }}</h5>
                                    <span class="d-block text-muted">Administrator Login</span>
                                </div>

                                <div class="form-group">
                                    <label class="">
                                        Your email
                                        <span class="text-danger ml-1">*</span>
                                    </label>

                                    <div class="">
                                        <div class="form-group-feedback form-group-feedback-right quform-input">
                                            <input type="email" class="form-control bg-light" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}"/>
                                            <div class="form-control-feedback">
                                                <i class="icon-mention text-muted"></i>
                                            </div>
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="">
                                        Your Password
                                        <span class="text-danger ml-1">*</span>
                                    </label>

                                    <div class="">
                                        <div class="form-group-feedback form-group-feedback-right quform-input">
                                            <input type="password" class="form-control bg-light" name="password" id="password" placeholder="Enter password">
                                            <div class="form-control-feedback">
                                                <i class="icon-key text-muted"></i>
                                            </div>
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-block bg-indigo text-uppercase">
                                        Submit
                                        <i class="icon-paperplane ml-2"></i>
                                    </button>
                                </div>
                                <div class="form-group text-center text-muted content-divider">
                                    <a href=""><span class="px-2">Forgot Your Password?</span></a>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->
</body>
</html>