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
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- /theme JS files -->

</head>
<body>
<!-- Page content -->
<div class="page-content">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Hero unit -->
        <div class="section gradient-1">
            <!-- Main navbar -->
            <div class="navbar navbar-expand-md navbar-dark" style="background-color: rgba(0,0,0,0.075); border-bottom-color: rgba(255,255,255,0.35)">
                <div class="container">
                    <div class="navbar-brand wmin-0 mr-5">
                        <a href="index.html" class="d-inline-block">
                            <img src="{{ asset('assets/images/logo_light.png') }}" alt="">
                        </a>
                    </div>

                    <div class="d-md-none">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                            <i class="icon-tree5"></i>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar-mobile">
                        <ul class="navbar-nav ml-md-auto">
                            <li class="nav-item">
                                <a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328/comments" class="navbar-nav-link" target="_blank">
                                    Comments
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://themeforest.net/item/limitless-responsive-web-application-kit/reviews/13080328" class="navbar-nav-link" target="_blank">
                                    Reviews
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank">
                                    Support
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /main navbar -->


            <!-- Jumbotron -->
            <div class="jumbotron text-white rounded-0 mb-0">
                <div class="container text-center">
                    <h1 class="display-4 font-weight-thin"><span class="font-weight-light">Limitless</span> - responsive web application kit</h1>
                    <p class="lead mb-4">A powerful admin template. One style, 5 layouts, hundreds of components, thousands of pages and unlimited possibilities!</p>

                    <div class="pt-3">
                        <a href="demo/bs4/Template/layout_1/LTR/default/full/index.html" class="btn bg-dark text-uppercase font-size-sm line-height-sm font-weight-semibold py-2 px-3 shadow  d-block d-sm-inline-block mb-3 mb-sm-0" target="_blank">
                            Live preview
                            <i class="icon-circle-right2 ml-2"></i>
                        </a>
                        <a href="http://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="btn bg-pink-400 text-uppercase font-size-sm line-height-sm font-weight-semibold py-2 px-3 ml-sm-4 shadow  d-block d-sm-inline-block" target="_blank">
                            Purchase
                            <i class="icon-cart ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
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


        <!-- Tab content -->
        <div class="tab-content">
            <div class="tab-pane fade active show" id="bs4">

                <!-- Version links toolbar -->
                <div class="section bg-white py-3">
                    <div class="content container text-center">
                        <ul class="list-inline list-inline-dotted mb-0">
                            <li class="list-inline-item">
                                <a href="demo/bs4/Documentation/index.html" class="font-weight-semibold" target="_blank">
                                    <i class="icon-stack2 mr-2"></i>
                                    Documentation
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="demo/bs4/Documentation/other_changelog.html" class="font-weight-semibold" target="_blank">
                                    <i class="icon-history mr-2"></i>
                                    Changelog
                                    <span class="badge badge-pill bg-dark ml-2">2.2</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /version links toolbar -->


                <!-- Main layout preview -->
                <div class="section border-top pt-5">
                    <div class="content container text-center">
                        <div class="section-title text-center mb-4">
                            <h1 class="mb-2 font-weight-light"><span class="font-weight-semibold">Limitless</span> - main layout preview</h1>
                            <div class="text-grey">Main layout includes a full set of elements, components, extensions, custom pages, widgets, charts and layout options. Child layouts are shells and include only layout related pages, but support all available components from the main layout. SCSS files are well structured so that you can easily find necessary one, whether it's a component or layout.</div>
                        </div>

                        <div class="pt-2 mb-5">
                            <a href="demo/bs4/Template/layout_1/LTR/default/full/index.html" class="btn bg-indigo text-uppercase font-size-sm line-height-sm font-weight-semibold d-block d-sm-inline-block py-2 px-3 mb-3 mb-sm-0 shadow" target="_blank">
                                Default theme demo
                                <i class="icon-circle-right2 ml-2"></i>
                            </a>

                            <a href="demo/bs4/Template/layout_1/LTR/material/full/index.html" class="btn bg-indigo text-uppercase font-size-sm line-height-sm font-weight-semibold d-block d-sm-inline-block py-2 px-3 ml-sm-3 shadow" target="_blank">
                                Material theme demo
                                <i class="icon-circle-right2 ml-2"></i>
                            </a>
                        </div>

                        <div class="img-preview-multi">
                            <img src="{{ asset('assets/images/browsers.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <!-- /main layout preview -->


                <!-- Project numbers -->
                <div class="section gradient-8 text-white py-2">
                    <div class="content container text-center">
                        <div class="row">
                            <div class="col-6 col-sm-3 font-weight-light my-2">
                                <h1 class="font-weight-light mb-0">250+</h1>
                                components and options
                            </div>
                            <div class="col-6 col-sm-3 font-weight-light my-2">
                                <h1 class="font-weight-light mb-0">500+</h1>
                                support tickets resolved
                            </div>
                            <div class="col-6 col-sm-3 font-weight-light my-2">
                                <h1 class="font-weight-light mb-0">36+</h1>
                                months of development
                            </div>
                            <div class="col-6 col-sm-3 font-weight-light my-2">
                                <h1 class="font-weight-light mb-0">8000+</h1>
                                happy customers
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /project numbers -->


                <!-- Child layouts preview -->
                <div class="section bg-white border-top pt-5 pb-4">
                    <div class="content container">
                        <div class="section-title text-center mb-4 pb-3">
                            <h1 class="mb-2 font-weight-light"><span class="font-weight-semibold">Child</span> layouts preview</h1>
                            <div class="text-grey">Child layouts include only layout related pages, this makes all layouts extremely easy to maintain and new layouts can be developed faster. Although components are not included, all styles exist in CSS files, which means all components and all options from the main layout are supported. You can use all of them in all layouts.</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5 mr-md-3">
                                    <div class="card-img-actions mb-4 shadow">
                                        <img class="card-img img-fluid" src="{{ asset('assets/images/layouts/layout_2.png') }}" alt="">
                                        <div class="card-img-actions-overlay card-img">
                                            <div>
                                                <div class="mb-2">Select theme:</div>
                                                <div class="btn-toolbar justify-content-center">
                                                    <div class="btn-group">
                                                        <a href="demo/bs4/Template/layout_2/LTR/default/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Default
                                                        </a>

                                                        <a href="demo/bs4/Template/layout_2/LTR/material/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Material
                                                        </a>

                                                        <div class="btn-group">
                                                            <a href="#" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase dropdown-toggle mb-1 shadow" data-toggle="dropdown" target="_blank">
                                                                RTL
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-right bg-blue">
                                                                <a href="demo/bs4/Template/layout_2/RTL/default/full/index.html" class="dropdown-item">Default</a>
                                                                <a href="demo/bs4/Template/layout_2/RTL/material/full/index.html" class="dropdown-item">Material</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="font-weight-semibold mb-2">
                                        Child <span class="font-weight-light">layout #1</span>
                                    </h5>

                                    <span class="text-muted">The most popular modern layout with main light navbar, transparent page header and full height dark sidebar. Logo has 2 options depending on sidebar width.</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-5 ml-md-3">
                                    <div class="card-img-actions mb-4 shadow">
                                        <img class="card-img img-fluid" src="{{ asset('assets/images/layouts/layout_3.png') }}" alt="">
                                        <div class="card-img-actions-overlay card-img">
                                            <div>
                                                <div class="mb-2">Select theme:</div>
                                                <div class="btn-toolbar justify-content-center">
                                                    <div class="btn-group">
                                                        <a href="demo/bs4/Template/layout_3/LTR/default/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Default
                                                        </a>

                                                        <a href="demo/bs4/Template/layout_3/LTR/material/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Material
                                                        </a>

                                                        <div class="btn-group">
                                                            <a href="#" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase dropdown-toggle mb-1 shadow" data-toggle="dropdown" target="_blank">
                                                                RTL
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-right bg-blue">
                                                                <a href="demo/bs4/Template/layout_3/RTL/default/full/index.html" class="dropdown-item">Default</a>
                                                                <a href="demo/bs4/Template/layout_3/RTL/material/full/index.html" class="dropdown-item">Material</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="font-weight-semibold mb-2">
                                        Child <span class="font-weight-light">layout #2</span>
                                    </h5>

                                    <span class="text-muted">Layout with full width navbar and page header. Sidebar is a part of content and can be either stretched vertically or displayed as a block element with auto height.</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5 pt-md-1 mr-md-3">
                                    <div class="card-img-actions mb-4 shadow">
                                        <img class="card-img img-fluid" src="{{ asset('assets/images/layouts/layout_4.png') }}" alt="">
                                        <div class="card-img-actions-overlay card-img">
                                            <div>
                                                <div class="mb-2">Select theme:</div>
                                                <div class="btn-toolbar justify-content-center">
                                                    <div class="btn-group">
                                                        <a href="demo/bs4/Template/layout_4/LTR/default/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Default
                                                        </a>

                                                        <a href="demo/bs4/Template/layout_4/LTR/material/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Material
                                                        </a>

                                                        <div class="btn-group">
                                                            <a href="#" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase dropdown-toggle mb-1 shadow" data-toggle="dropdown" target="_blank">
                                                                RTL
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-right bg-blue">
                                                                <a href="demo/bs4/Template/layout_4/RTL/default/full/index.html" class="dropdown-item">Default</a>
                                                                <a href="demo/bs4/Template/layout_4/RTL/material/full/index.html" class="dropdown-item">Material</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="font-weight-semibold mb-2">
                                        Child <span class="font-weight-light">layout #3</span>
                                    </h5>

                                    <span class="text-muted">Full width layout with multiple static or fixed navbars and horizontal multi level navigation (single or multiple columns). Sidebar is a part of content and optional.</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-5 pt-md-1 ml-md-3">
                                    <div class="card-img-actions mb-4 shadow">
                                        <img class="card-img img-fluid" src="{{ asset('assets/images/layouts/layout_5.png') }}" alt="">
                                        <div class="card-img-actions-overlay card-img">
                                            <div>
                                                <div class="mb-2">Select theme:</div>
                                                <div class="btn-toolbar justify-content-center">
                                                    <div class="btn-group">
                                                        <a href="demo/bs4/Template/layout_5/LTR/default/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Default
                                                        </a>

                                                        <a href="demo/bs4/Template/layout_5/LTR/material/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Material
                                                        </a>

                                                        <div class="btn-group">
                                                            <a href="#" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase dropdown-toggle mb-1 shadow" data-toggle="dropdown" target="_blank">
                                                                RTL
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-right bg-blue">
                                                                <a href="demo/bs4/Template/layout_5/RTL/default/full/index.html" class="dropdown-item">Default</a>
                                                                <a href="demo/bs4/Template/layout_5/RTL/material/full/index.html" class="dropdown-item">Material</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="font-weight-semibold mb-2">
                                        Child <span class="font-weight-light">layout #4</span>
                                    </h5>

                                    <span class="text-muted">Layout with multiple navbar and dark page header in between. All top components have the same dark background color, content has extra horizontal spacing.</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5 pt-md-1 mr-md-3">
                                    <div class="coming-soon">
                                        <img src="{{ asset('assets/images/layouts/soon_1.jpg') }}" class="img-fluid rounded mb-4 shadow">
                                        <h3 class="opacity-75 mb-0">Coming soon</h3>
                                    </div>

                                    <h5 class="font-weight-semibold mb-2">
                                        Child <span class="font-weight-light">layout #5</span>
                                    </h5>

                                    <span class="text-muted">Minimalistic layout with multi level sidebar in 2 width options: normal (with collapsible multi level navigation) and small (with sliding full height navigation).</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-5 pt-md-1 ml-md-3">
                                    <div class="coming-soon">
                                        <img src="{{ asset('assets/images/layouts/soon_2.jpg') }}" class="img-fluid rounded mb-4 shadow">
                                        <h3 class="opacity-75 mb-0">Coming soon</h3>
                                    </div>

                                    <h5 class="font-weight-semibold mb-2">
                                        Child <span class="font-weight-light">layout #6</span>
                                    </h5>

                                    <span class="text-muted">Clean layout with transparent sidebar and light content area. Simple and elegant, this layout is a mix of classic styling and new modern look and feel.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /childs layouts preview -->

            </div>

            <div class="tab-pane fade" id="bs3">

                <!-- Version links toolbar -->
                <div class="section bg-white py-3">
                    <div class="content container text-center">
                        <ul class="list-inline list-inline-dotted mb-0">
                            <li class="list-inline-item">
                                <a href="demo/bs3/Documentation/index.html" class="font-weight-semibold" target="_blank">
                                    <i class="icon-stack2 mr-2"></i>
                                    Documentation
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="demo/bs3/Documentation/other_changelog.html" class="font-weight-semibold" target="_blank">
                                    <i class="icon-history mr-2"></i>
                                    Changelog
                                    <span class="badge badge-pill bg-dark ml-2">2.2</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /version links toolbar -->


                <!-- Child layouts preview -->
                <div class="section border-top pt-5 pb-4">
                    <div class="content container">
                        <div class="section-title text-center mb-4 pb-3">
                            <h1 class="mb-2 font-weight-light"><span class="font-weight-semibold">Limitless</span> layouts preview</h1>
                            <div class="text-grey">Limitless is based on 2 Bootstrap versions. Although Bootstrap 3 is officially in maintenance mode, Limitless still includes this version, but with a main focus on Bootstrap 4. This means nothing new is planned for this version, but all reported bugs will be surely fixed. Bear that in mind when you start a new project.</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5 mr-md-3">
                                    <div class="card-img-actions mb-4 shadow">
                                        <img class="card-img img-fluid" src="{{ asset('assets/images/layouts/layout_1.png') }}" alt="">
                                        <div class="card-img-actions-overlay card-img">
                                            <div>
                                                <div class="mb-2">Select theme:</div>
                                                <div class="btn-toolbar justify-content-center">
                                                    <div class="btn-group">
                                                        <a href="demo/bs3/Template/layout_1/LTR/default/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Default
                                                        </a>

                                                        <a href="demo/bs3/Template/layout_1/LTR/material/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Material
                                                        </a>

                                                        <div class="btn-group">
                                                            <a href="#" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase dropdown-toggle mb-1 shadow" data-toggle="dropdown" target="_blank">
                                                                RTL
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-right bg-blue">
                                                                <a href="demo/bs3/Template/layout_1/RTL/default/full/index.html" class="dropdown-item">Default</a>
                                                                <a href="demo/bs3/Template/layout_1/RTL/material/full/index.html" class="dropdown-item">Material</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="font-weight-semibold mb-2">
                                        Limitless <span class="font-weight-light">layout #1</span>
                                    </h5>

                                    <span class="text-muted">Classic application design style, with single dark navbar and sidebar. Main sidebar supports 2 modes: collapsed (icons only) and expanded (icons and text).</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-5 ml-md-3">
                                    <div class="card-img-actions mb-4 shadow">
                                        <img class="card-img img-fluid" src="{{ asset('assets/images/layouts/layout_2.png') }}" alt="">
                                        <div class="card-img-actions-overlay card-img">
                                            <div>
                                                <div class="mb-2">Select theme:</div>
                                                <div class="btn-toolbar justify-content-center">
                                                    <div class="btn-group">
                                                        <a href="demo/bs3/Template/layout_2/LTR/default/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Default
                                                        </a>

                                                        <a href="demo/bs3/Template/layout_2/LTR/material/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Material
                                                        </a>

                                                        <div class="btn-group">
                                                            <a href="#" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase dropdown-toggle mb-1 shadow" data-toggle="dropdown" target="_blank">
                                                                RTL
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-right bg-blue">
                                                                <a href="demo/bs3/Template/layout_2/RTL/default/full/index.html" class="dropdown-item">Default</a>
                                                                <a href="demo/bs3/Template/layout_2/RTL/material/full/index.html" class="dropdown-item">Material</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="font-weight-semibold mb-2">
                                        Limitless <span class="font-weight-light">layout #2</span>
                                    </h5>

                                    <span class="text-muted">The most popular modern layout with main light navbar, transparent page header and full height dark sidebar. Logo has 2 options depending on sidebar width.</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5 pt-md-1 mr-md-3">
                                    <div class="card-img-actions mb-4 shadow">
                                        <img class="card-img img-fluid" src="{{ asset('assets/images/layouts/layout_3.png') }}" alt="">
                                        <div class="card-img-actions-overlay card-img">
                                            <div>
                                                <div class="mb-2">Select theme:</div>
                                                <div class="btn-toolbar justify-content-center">
                                                    <div class="btn-group">
                                                        <a href="demo/bs3/Template/layout_3/LTR/default/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Default
                                                        </a>

                                                        <a href="demo/bs3/Template/layout_3/LTR/material/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Material
                                                        </a>

                                                        <div class="btn-group">
                                                            <a href="#" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase dropdown-toggle mb-1 shadow" data-toggle="dropdown" target="_blank">
                                                                RTL
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-right bg-blue">
                                                                <a href="demo/bs3/Template/layout_3/RTL/default/full/index.html" class="dropdown-item">Default</a>
                                                                <a href="demo/bs3/Template/layout_3/RTL/material/full/index.html" class="dropdown-item">Material</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="font-weight-semibold mb-2">
                                        Limitless <span class="font-weight-light">layout #3</span>
                                    </h5>

                                    <span class="text-muted">Layout with full width navbar and page header. Sidebar is a part of content and can be either stretched vertically or displayed as a block element with auto height.</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-5 pt-md-1 ml-md-3">
                                    <div class="card-img-actions mb-4 shadow">
                                        <img class="card-img img-fluid" src="{{ asset('assets/images/layouts/layout_4.png') }}" alt="">
                                        <div class="card-img-actions-overlay card-img">
                                            <div>
                                                <div class="mb-2">Select theme:</div>
                                                <div class="btn-toolbar justify-content-center">
                                                    <div class="btn-group">
                                                        <a href="demo/bs3/Template/layout_4/LTR/default/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Default
                                                        </a>

                                                        <a href="demo/bs3/Template/layout_4/LTR/material/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Material
                                                        </a>

                                                        <div class="btn-group">
                                                            <a href="#" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase dropdown-toggle mb-1 shadow" data-toggle="dropdown" target="_blank">
                                                                RTL
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-right bg-blue">
                                                                <a href="demo/bs3/Template/layout_4/RTL/default/full/index.html" class="dropdown-item">Default</a>
                                                                <a href="demo/bs3/Template/layout_4/RTL/material/full/index.html" class="dropdown-item">Material</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="font-weight-semibold mb-2">
                                        Limitless <span class="font-weight-light">layout #4</span>
                                    </h5>

                                    <span class="text-muted">Full width layout with multiple static or fixed navbars and horizontal multi level navigation (single or multiple columns). Sidebar is a part of content and optional.</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5 pt-md-1 mr-md-3">
                                    <div class="card-img-actions mb-4 shadow">
                                        <img class="card-img img-fluid" src="{{ asset('assets/images/layouts/layout_5.png') }}" alt="">
                                        <div class="card-img-actions-overlay card-img">
                                            <div>
                                                <div class="mb-2">Select theme:</div>
                                                <div class="btn-toolbar justify-content-center">
                                                    <div class="btn-group">
                                                        <a href="demo/bs3/Template/layout_5/LTR/default/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Default
                                                        </a>

                                                        <a href="demo/bs3/Template/layout_5/LTR/material/full/index.html" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase mb-1 shadow" target="_blank">
                                                            Material
                                                        </a>

                                                        <div class="btn-group">
                                                            <a href="#" class="btn bg-blue font-weight-semibold font-size-sm line-height-sm text-uppercase dropdown-toggle mb-1 shadow" data-toggle="dropdown" target="_blank">
                                                                RTL
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-right bg-blue">
                                                                <a href="demo/bs3/Template/layout_5/RTL/default/full/index.html" class="dropdown-item">Default</a>
                                                                <a href="demo/bs3/Template/layout_5/RTL/material/full/index.html" class="dropdown-item">Material</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="font-weight-semibold mb-2">
                                        Limitless <span class="font-weight-light">layout #5</span>
                                    </h5>

                                    <span class="text-muted">Layout with multiple navbar and dark page header in between. All top components have the same dark background color, content has extra horizontal spacing.</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-5 pt-md-1 ml-md-3">
                                    <div class="coming-soon">
                                        <img src="{{ asset('assets/images/layouts/soon_1.jpg') }}" class="img-fluid rounded mb-4 shadow">
                                        <h3 class="opacity-75 mb-0">Coming soon</h3>
                                    </div>

                                    <h5 class="font-weight-semibold mb-2">
                                        Limitless <span class="font-weight-light">layout #6</span>
                                    </h5>

                                    <span class="text-muted">Minimalistic layout with multi level sidebar in 2 width options: normal (with collapsible multi level navigation) and small (with sliding full height navigation).</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /childs layouts preview -->

            </div>

            <div class="tab-pane fade" id="github">

                <!-- Github form -->
                <div class="section b-white pt-5">
                    <div class="content container">
                        <div class="section-title text-center mb-4">
                            <h1 class="mb-2 font-weight-light">Get an access to <span class="font-weight-semibold">Github repository</span></h1>
                            <div class="text-grey">If you want to submit bug report, track all changes in files, request a new feature, contribute to the project, get latest code and updates before official release or simply participate in discussions, fill in all inputs and request an access to private repository on Github. This service is not automated so kindly expect a minor delay.</div>
                        </div>

                        <div class="d-flex justify-content-center align-items-center pt-1">
                            <form class="quform w-100 w-sm-auto wmin-sm-400" action="quform/_process.php" method="post" enctype="multipart/form-data">
                                <div class="card mb-5">
                                    <div class="card-body quform-elements">
                                        <div class="text-center mb-3">
                                            <i class="icon-github icon-3x text-slate-800 pt-2 mb-3 mt-1"></i>
                                            <h5 class="mb-0">Limitless repository</h5>
                                            <span class="d-block text-muted">Request access</span>
                                        </div>

                                        <div class="form-group">
                                            <label class="">
                                                Github username
                                                <span class="text-danger ml-1">*</span>
                                            </label>

                                            <div class="">
                                                <div class="form-group-feedback form-group-feedback-right quform-input">
                                                    <input type="text" class="form-control bg-light" name="github" id="github" placeholder="Enter username">
                                                    <div class="form-control-feedback">
                                                        <i class="icon-github text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="">
                                                Your email
                                                <span class="text-danger ml-1">*</span>
                                            </label>

                                            <div class="">
                                                <div class="form-group-feedback form-group-feedback-right quform-input">
                                                    <input type="email" class="form-control bg-light" name="email" id="email" placeholder="Enter email">
                                                    <div class="form-control-feedback">
                                                        <i class="icon-mention text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="">
                                                License code
                                                <span class="text-danger ml-1">*</span>
                                            </label>

                                            <div class="">
                                                <div class="form-group-feedback form-group-feedback-right quform-input">
                                                    <input type="text" class="form-control bg-light" name="license" id="license" placeholder="Enter code">
                                                    <div class="form-control-feedback">
                                                        <i class="icon-checkmark3 text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group quform-input">
                                            <label>Type the word <span class="text-danger ml-1">*</span></label>
                                            <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <img src="{{ asset('assets/images/captcha_img.png') }}" class="rounded-left" alt="captcha">
                                                    </span>

                                                <div class="form-group-feedback form-group-feedback-right">
                                                    <input type="text" class="form-control bg-light border-left-0" name="captcha" id="captcha" placeholder="Enter the word">
                                                    <div class="form-control-feedback">
                                                        <i class="icon-key text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Send request
                                                <i class="icon-paperplane ml-2"></i>
                                            </button>
                                        </div>

                                        <div class="form-group text-center text-muted content-divider">
                                            <span class="px-2">Don't have a license?</span>
                                        </div>

                                        <div class="form-group mb-0">
                                            <a href="http://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="btn bg-pink-400 btn-block">Purchase</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /github form -->

            </div>

            <div class="tab-pane fade" id="hire">

                <!-- Hire me form -->
                <div class="section b-white pt-5">
                    <div class="content container">
                        <div class="section-title text-center mb-4">
                            <h1 class="mb-2 font-weight-light">
                                <span class="font-weight-semibold">Customization</span> service request</h1>
                            <div class="text-grey">If you need to customize Limitless to match your branding or business needs, nobody knows its code better than developer who has created it. Please fill in the form below or contact me directly to discuss possible cooperation. Please keep in mind that all fields are required. Permanent full time positions are also considered.</div>
                        </div>

                        <div class="d-flex justify-content-center align-items-center pt-1">
                            <form class="quform w-100 w-sm-auto wmin-sm-400" action="quform/_process-hire.php" method="post" enctype="multipart/form-data">
                                <div class="card mb-5">
                                    <div class="card-body quform-elements">
                                        <div class="text-center mb-3">
                                            <i class="icon-droplets icon-3x text-slate-800 pt-2 mb-3 mt-1"></i>
                                            <h5 class="mb-0">Limitless customization</h5>
                                            <span class="d-block text-muted">Share project details</span>
                                        </div>

                                        <div class="form-group">
                                            <label>Your name <span class="text-danger ml-1">*</span></label>
                                            <div class="form-group-feedback form-group-feedback-right quform-input">
                                                <input type="text" class="form-control bg-light" name="custom_name" placeholder="Enter name">
                                                <div class="form-control-feedback">
                                                    <i class="icon-user text-muted"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Your email <span class="text-danger ml-1">*</span></label>
                                            <div class="form-group-feedback form-group-feedback-right quform-input">
                                                <input type="email" class="form-control bg-light" name="custom_email" placeholder="Enter email">
                                                <div class="form-control-feedback">
                                                    <i class="icon-mention text-muted"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Start date <span class="text-danger ml-1">*</span></label>
                                            <div class="form-group-feedback form-group-feedback-right quform-input">
                                                <input type="text" class="form-control bg-light date-picker" name="custom_date" placeholder="Enter date">
                                                <div class="form-control-feedback">
                                                    <i class="icon-alarm-add text-muted"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group quform-input">
                                            <label>Budget <span class="text-danger ml-1">*</span></label>
                                            <select class="form-control form-control-select2" name="custom_budget" data-placeholder="Select budget" data-container-css-class="bg-light border text-default">
                                                <option></option>
                                                <option value="1">$0 - $100</option>
                                                <option value="2">$101 - $500</option>
                                                <option value="3">$501 - $1000</option>
                                                <option value="4">$1001 - $2000</option>
                                                <option value="5">$2001 - $4000</option>
                                                <option value="6">$4001+</option>
                                            </select>
                                        </div>

                                        <div class="form-group quform-input">
                                            <label>Description <span class="text-danger ml-1">*</span></label>
                                            <textarea cols="2" rows="4" class="form-control bg-light" name="custom_description" placeholder="Enter text"></textarea>
                                        </div>

                                        <div class="form-group quform-input">
                                            <label>Type the word <span class="text-danger ml-1">*</span></label>
                                            <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <img src="{{ asset('assets/images/captcha_img.png') }}" class="rounded-left" alt="captcha">
                                                    </span>

                                                <div class="form-group-feedback form-group-feedback-right">
                                                    <input type="text" class="form-control bg-light border-left-0" name="custom_captcha" id="custom_captcha" placeholder="Enter the word">
                                                    <div class="form-control-feedback">
                                                        <i class="icon-key text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Send request
                                                <i class="icon-paperplane ml-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /hire me form -->

            </div>
        </div>
        <!-- /tab content -->


        <!-- Customers list -->
        <div class="section gradient-2 text-white py-5">
            <div class="content container text-center">
                <div class="section-title mb-5">
                    <h1 class="mb-2">
                        <span class="font-weight-light">Used by over</span>
                        <span class="font-weight-semibold">8000 customers worldwide</span>
                    </h1>
                    <span class="opacity-75">Limitless is a popular UI kit used by market leaders in various fields: in own internal and external applications, 3rd party software and subsidiary projects</span>
                </div>

                <!-- Slideshow -->
                <div id="customers" class="carousel slide" data-ride="carousel" data-interval="5500">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_usps.png') }}" class="opacity-75 mb-4 mb-xl-0" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_rbs.png') }}" class="opacity-75 mb-4 mb-xl-0" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_mc.png') }}" class="opacity-75 mb-4 mb-xl-0" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_mizuho.png') }}" class="opacity-75" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_sberbank.png') }}" class="opacity-75" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_ing.png') }}" class="opacity-75" height="30" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_paypal.png') }}" class="opacity-75 mb-4 mb-xl-0" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_va.png') }}" class="opacity-75 mb-4 mb-xl-0" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_anthem.png') }}" class="opacity-75 mb-4 mb-xl-0" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_kpn.png') }}" class="opacity-75" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_verizon.png') }}" class="opacity-75" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_dutch_railways.png') }}" class="opacity-75" height="30" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_nomura.png') }}" class="opacity-75 mb-4 mb-xl-0" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_rr.png') }}" class="opacity-75 mb-4 mb-xl-0" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_merck.png') }}" class="opacity-75 mb-4 mb-xl-0" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_gamesys.png') }}" class="opacity-75" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_nissan.png') }}" class="opacity-75" height="30" alt="">
                                </div>
                                <div class="col-6 col-sm-4 col-xl-2">
                                    <img src="{{ asset('assets/images/logos/logo_boi.png') }}" class="opacity-75" height="30" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /slideshow -->

            </div>
        </div>
        <!-- /customers list -->


        <!-- Highlights -->
        <div class="section bg-white pt-5">
            <div class="content container">
                <div class="section-title text-center mb-5">
                    <h1 class="mb-2">
                        <span class="font-weight-light">Why</span>
                        <span class="font-weight-semibold">Limitless template?</span>
                    </h1>
                    <span class="text-muted">Limitless is based on 2 version of popular Bootstrap framework and includes all default components and more than 200 third party integrated libraries, including full localisation support, starter kit and tons of layout options. Besides perfectly crafted code and pixel perfect design, core Limitless features are:</span>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="media mb-5">
                            <div class="mr-3">
                                <i class="icon-stack text-teal-400 icon-2x mt-1"></i>
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold mb-1">1000+ HTML pages</h6>
                                Limitless template includes over 1000 static HTML pages, all of them are ready for integration
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media mb-5">
                            <div class="mr-3">
                                <i class="icon-file-css text-teal-400 icon-2x mt-1"></i>
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold mb-1">Fully based on LESS and SCSS</h6>
                                BS3 version is fully based on LESS, BS4 version is based on SCSS, with automated compilation
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media mb-5">
                            <div class="mr-3">
                                <i class="icon-puzzle4 text-teal-400 icon-2x mt-1"></i>
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold mb-1">Hundreds of components</h6>
                                Includes extended BS components, 100+ plugins and extensions and extended layout options
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="media mb-5">
                            <div class="mr-3">
                                <i class="icon-graph text-teal-400 icon-2x mt-1"></i>
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold mb-1">Data visualization</h6>
                                Includes ECharts, Dimple, C3.js, Google charting libraries and advanced native D3.js charts
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media mb-5">
                            <div class="mr-3">
                                <i class="icon-sphere text-teal-400 icon-2x mt-1"></i>
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold mb-1">Translation ready</h6>
                                Limitless supports i18next library integration, which allows you to translate your content on-the-fly
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media mb-5">
                            <div class="mr-3">
                                <i class="icon-stack2 text-teal-400 icon-2x mt-1"></i>
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold mb-1">Multi level navigation</h6>
                                Supports collapsible and accordion vertical nav, multi level horizontal nav and mega menu
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="media mb-5">
                            <div class="mr-3">
                                <i class="icon-file-text2 text-teal-400 icon-2x mt-1"></i>
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold mb-1">Detailed documentation</h6>
                                Comes with very detailed docs and includes options, features and descriptions with screenshots
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media mb-5">
                            <div class="mr-3">
                                <i class="icon-files-empty text-teal-400 icon-2x mt-1"></i>
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold mb-1">Starter kit</h6>
                                Each layout includes a set of blank pages with basic functionality to simplify development process
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media mb-5">
                            <div class="mr-3">
                                <i class="icon-grid7 text-teal-400 icon-2x mt-1"></i>
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold mb-1">5 ready-to-use layouts</h6>
                                Includes most common layout types, based on responsive grid and supports up to 4 sidebars
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="media mb-5">
                            <div class="mr-3">
                                <i class="icon-droplets text-teal-400 icon-2x mt-1"></i>
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold mb-1">Color system</h6>
                                Includes optional, but recommended custom color system, based on Material Design palettes
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media mb-5">
                            <div class="mr-3">
                                <i class="icon-cube3 text-teal-400 icon-2x mt-1"></i>
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold mb-1">Set of custom pages</h6>
                                A set of pre-built custom pages: search, galleries, registrations, logins, users, error pages, chats etc.
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media mb-5">
                            <div class="mr-3">
                                <i class="icon-menu2 text-teal-400 icon-2x mt-1"></i>
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold mb-1">Advanced mega menu</h6>
                                Supports horizontal navigation with advanced mega menu and extended components
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /highlights -->


        <!-- Footer -->
        <div class="section gradient-6 text-white pt-5">
            <div class="content container text-center pb-4">
                <div class="section-title pb-4">
                    <h1 class="mb-2">
                        <span class="font-weight-light">Join Limitless community.</span>
                        <span class="font-weight-semibold">Once and for a lifetime.</span>
                    </h1>
                    <span class="opacity-75">Limitless offers 2 licenses - Regular and Extended. Each license is issued once at the time of purchase and does not require extension. All updates are always free for all existing and new customers. Support is provided under Envato support regulations and does not include customization.</span>
                </div>

                <a href="http://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="btn bg-warning btn-block btn-lg text-uppercase font-weight-semibold p-2 my-2 shadow"><div class="my-1">Purchase Limitless</div></a>
            </div>

            <div class="navbar navbar-expand-lg navbar-dark bg-dark-alpha border-0">
                <div class="container">
                    <div class="text-center d-lg-none w-100">
                        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                            <i class="icon-unfold mr-2"></i>
                            Footer
                        </button>
                    </div>

                    <div class="navbar-collapse collapse" id="navbar-footer">
                            <span class="navbar-text">
                                &copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                            </span>

                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /footer -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->
</body>
</html>