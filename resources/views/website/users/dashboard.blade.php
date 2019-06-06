@php
    $breadcrumbs[] =  ['url' => '', 'name' => 'Dashboard'];
@endphp
@extends('website.layouts.app-dash')
@section('title')
    Dashboard
@endsection
@section('header')

@endsection
@section('content')

        <!-- Page header -->
        <div class="page-header">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

                <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
                    <div class="btn-group">
                        <button type="button" class="btn bg-indigo-400"><i class="icon-stack2 mr-2"></i> New report</button>
                        <button type="button" class="btn bg-indigo-400 dropdown-toggle" data-toggle="dropdown"></button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header">Actions</div>
                            <a href="#" class="dropdown-item"><i class="icon-file-eye"></i> View reports</a>
                            <a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit reports</a>
                            <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> Statistics</a>
                            <div class="dropdown-header">Export</div>
                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to PDF</a>
                            <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to CSV</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content pt-0">

            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media mb-3">
                            <div class="media-body">
                                <h6 class="font-weight-semibold mb-0">Server maintenance</h6>
                                <span class="text-muted">Until 1st of June</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-cog3 icon-2x text-indigo-400 opacity-75"></i>
                            </div>
                        </div>

                        <div class="progress mb-2" style="height: 0.125rem;">
                            <div class="progress-bar bg-indigo-400" style="width: 67%">
                                <span class="sr-only">67% Complete</span>
                            </div>
                        </div>

                        <div>
                            <span class="float-right">67%</span>
                            Re-indexing
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media mb-3">
                            <div class="media-body">
                                <h6 class="font-weight-semibold mb-0">Services status</h6>
                                <span class="text-muted">April, 19th</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-pulse2 icon-2x text-danger-400 opacity-75"></i>
                            </div>
                        </div>

                        <div class="progress mb-2" style="height: 0.125rem;">
                            <div class="progress-bar bg-danger-400" style="width: 80%">
                                <span class="sr-only">80% Complete</span>
                            </div>
                        </div>

                        <div>
                            <span class="float-right">80%</span>
                            Partly operational
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media mb-3">
                            <div class="mr-3 align-self-center">
                                <i class="icon-cog3 icon-2x text-blue-400 opacity-75"></i>
                            </div>

                            <div class="media-body">
                                <h6 class="font-weight-semibold mb-0">Server maintenance</h6>
                                <span class="text-muted">Until 1st of June</span>
                            </div>
                        </div>

                        <div class="progress mb-2" style="height: 0.125rem;">
                            <div class="progress-bar bg-blue" style="width: 67%">
                                <span class="sr-only">67% Complete</span>
                            </div>
                        </div>

                        <div>
                            <span class="float-right">67%</span>
                            Re-indexing
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media mb-3">
                            <div class="mr-3 align-self-center">
                                <i class="icon-pulse2 icon-2x text-success-400 opacity-75"></i>
                            </div>

                            <div class="media-body">
                                <h6 class="font-weight-semibold mb-0">Services status</h6>
                                <span class="text-muted">April, 19th</span>
                            </div>
                        </div>

                        <div class="progress mb-2" style="height: 0.125rem;">
                            <div class="progress-bar bg-success-400" style="width: 80%">
                                <span class="sr-only">80% Complete</span>
                            </div>
                        </div>

                        <div>
                            <span class="float-right">80%</span>
                            Partly operational
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invoices -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card border-left-3 border-left-danger rounded-left-0">
                        <div class="card-body">
                            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                <div>
                                    <h6 class="font-weight-semibold">Leonardo Fellini</h6>
                                    <ul class="list list-unstyled mb-0">
                                        <li>Invoice #: &nbsp;0028</li>
                                        <li>Issued on: <span class="font-weight-semibold">2015/01/25</span></li>
                                    </ul>
                                </div>

                                <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                    <h6 class="font-weight-semibold">$8,750</h6>
                                    <ul class="list list-unstyled mb-0">
                                        <li>Method: <span class="font-weight-semibold">SWIFT</span></li>
                                        <li class="dropdown">
                                            Status: &nbsp;
                                            <a href="#" class="badge bg-danger-400 align-top dropdown-toggle" data-toggle="dropdown">Overdue</a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item active"><i class="icon-alert"></i> Overdue</a>
                                                <a href="#" class="dropdown-item"><i class="icon-alarm"></i> Pending</a>
                                                <a href="#" class="dropdown-item"><i class="icon-checkmark3"></i> Paid</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item"><i class="icon-spinner2 spinner"></i> On hold</a>
                                                <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Canceled</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
											<span>
												<span class="badge badge-mark border-danger mr-2"></span>
												Due:
												<span class="font-weight-semibold">2015/02/25</span>
											</span>

                            <ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
                                <li class="list-inline-item">
                                    <a href="#" class="text-default"><i class="icon-eye8"></i></a>
                                </li>
                                <li class="list-inline-item dropdown">
                                    <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item"><i class="icon-printer"></i> Print invoice</a>
                                        <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit invoice</a>
                                        <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove invoice</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-left-3 border-left-success rounded-left-0">
                        <div class="card-body">
                            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                <div>
                                    <h6 class="font-weight-semibold">Rebecca Manes</h6>
                                    <ul class="list list-unstyled mb-0">
                                        <li>Invoice #: &nbsp;0027</li>
                                        <li>Issued on: <span class="font-weight-semibold">2015/02/24</span></li>
                                    </ul>
                                </div>

                                <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                    <h6 class="font-weight-semibold">$5,100</h6>
                                    <ul class="list list-unstyled mb-0">
                                        <li>Method: <span class="font-weight-semibold">Paypal</span></li>
                                        <li class="dropdown">
                                            Status: &nbsp;
                                            <a href="#" class="badge bg-success-400 align-top dropdown-toggle" data-toggle="dropdown">Paid</a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="icon-alert"></i> Overdue</a>
                                                <a href="#" class="dropdown-item"><i class="icon-alarm"></i> Pending</a>
                                                <a href="#" class="dropdown-item active"><i class="icon-checkmark3"></i> Paid</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item"><i class="icon-spinner2 spinner"></i> On hold</a>
                                                <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Canceled</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
											<span>
												<span class="badge badge-mark border-success mr-2"></span>
												Due:
												<span class="font-weight-semibold">2015/03/24</span>
											</span>

                            <ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
                                <li class="list-inline-item">
                                    <a href="#" class="text-default"><i class="icon-eye8"></i></a>
                                </li>
                                <li class="list-inline-item dropdown">
                                    <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item"><i class="icon-printer"></i> Print invoice</a>
                                        <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit invoice</a>
                                        <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove invoice</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /invoices -->

        </div>
        <!-- /content area -->

@endsection
@section('footer')
    <script type="text/javascript">
    </script>
@stop