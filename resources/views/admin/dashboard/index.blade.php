@extends('admin.master')
@section('header')
    <!--page level css -->

    <!--end of page level css-->
@endsection
@section('title')
    Admin Dashboard
@endsection
@section('content-header')
@section('content')
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card card-body">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-pointer icon-3x text-success-400"></i>
                    </div>

                    <div class="media-body text-right">
                        <h3 class="font-weight-semibold mb-0">652,549</h3>
                        <span class="text-uppercase font-size-sm text-muted">total clicks</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-enter6 icon-3x text-indigo-400"></i>
                    </div>

                    <div class="media-body text-right">
                        <h3 class="font-weight-semibold mb-0">245,382</h3>
                        <span class="text-uppercase font-size-sm text-muted">total visits</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="font-weight-semibold mb-0">54,390</h3>
                        <span class="text-uppercase font-size-sm text-muted">total comments</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-bubbles4 icon-3x text-blue-400"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="font-weight-semibold mb-0">389,438</h3>
                        <span class="text-uppercase font-size-sm text-muted">total orders</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-bag icon-3x text-danger-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <!--page level js -->
    <!-- Theme JS files -->
    <script src="{{ asset('assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/pickers/daterangepicker.js') }}"></script>

    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    <!-- /theme JS files -->
    <!--end of page level js-->
@endsection