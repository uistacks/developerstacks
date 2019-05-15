@php
    $pageTitle = 'List '.trans('Users::users.admin'). ' Users';
    $itemTitle = trans('Users::users.admin');
    $role = 'admin';
    $breadcrumbs = [
                        ['url' => '', 'name' => $pageTitle]
    ];

    $dbTable = '';
    if($items->count()){
        $dbTable = $items[0]['table'];
    }

@endphp

@extends('admin.master')
@section('title')
    {{ $pageTitle }}
@endsection
@section('content')
    <!-- Include single delete confirmation model -->
    @include('Core::modals.confirm-delete')
    <!-- Include bulk delete confirmation model -->
    @include('Core::modals.bulk-confirm-delete')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Row toggler</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            Example usage of a <code>row toggler</code>. This responsive table will automatically add the <code>"toggler"</code> to the first column by default. The "toggler" is the plus/minus icon which expands and collapses the row when a table breakpoint has fired. You can specify which of your columns is the toggle column (the column which has the toggle icon) by adding <code>data-toggle="true"</code>.
        </div>

        <table class="table table-togglable table-hover tablet breakpoint footable-loaded footable">
            <thead>
            <tr>
                <th data-hide="phone" class="footable-visible footable-first-column">First Name</th>
                <th data-toggle="true" class="footable-visible">Last Name</th>
                <th data-hide="phone,tablet" style="display: none;">Job Title</th>
                <th data-hide="phone,tablet" style="display: none;">DOB</th>
                <th data-hide="phone" class="footable-visible">Status</th>
                <th class="text-center footable-visible footable-last-column" style="width: 30px;"><i class="icon-menu-open2"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr class="">
                <td class="footable-visible footable-first-column">Marth</td>
                <td class="footable-visible"><span class="footable-toggle"></span><a href="#">Enright</a></td>
                <td style="display: none;">Traffic Court Referee</td>
                <td style="display: none;">22 Jun 1972</td>
                <td class="footable-visible"><span class="badge badge-success">Active</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr><tr class="footable-row-detail" style="display: none;"><td class="footable-row-detail-cell" colspan="4"><div class="footable-row-detail-inner"><div class="footable-row-detail-row"><div class="footable-row-detail-name">Job Title:</div><div class="footable-row-detail-value">Traffic Court Referee</div></div><div class="footable-row-detail-row"><div class="footable-row-detail-name">DOB:</div><div class="footable-row-detail-value">22 Jun 1972</div></div></div></td></tr>
            <tr>
                <td class="footable-visible footable-first-column">Jackelyn</td>
                <td class="footable-visible"><span class="footable-toggle"></span>Weible</td>
                <td style="display: none;"><a href="#">Airline Transport Pilot</a></td>
                <td style="display: none;">3 Oct 1981</td>
                <td class="footable-visible"><span class="badge badge-secondary">Inactive</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="footable-visible footable-first-column">Aura</td>
                <td class="footable-visible"><span class="footable-toggle"></span>Hard</td>
                <td style="display: none;">Business Services Sales Representative</td>
                <td style="display: none;">19 Apr 1969</td>
                <td class="footable-visible"><span class="badge badge-danger">Suspended</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="footable-visible footable-first-column">Nathalie</td>
                <td class="footable-visible"><span class="footable-toggle"></span><a href="#">Pretty</a></td>
                <td style="display: none;">Drywall Stripper</td>
                <td style="display: none;">13 Dec 1977</td>
                <td class="footable-visible"><span class="badge badge-info">Pending</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="footable-visible footable-first-column">Sharan</td>
                <td class="footable-visible"><span class="footable-toggle"></span>Leland</td>
                <td style="display: none;">Aviation Tactical Readiness Officer</td>
                <td style="display: none;">30 Dec 1991</td>
                <td class="footable-visible"><span class="badge badge-secondary">Inactive</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="footable-visible footable-first-column">Maxine</td>
                <td class="footable-visible"><span class="footable-toggle"></span><a href="#">Woldt</a></td>
                <td style="display: none;"><a href="#">Business Services Sales Representative</a></td>
                <td style="display: none;">17 Oct 1987</td>
                <td class="footable-visible"><span class="badge badge-info">Pending</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="footable-visible footable-first-column">Sylvia</td>
                <td class="footable-visible"><span class="footable-toggle"></span><a href="#">Mcgaughy</a></td>
                <td style="display: none;">Hemodialysis Technician</td>
                <td style="display: none;">11 Nov 1983</td>
                <td class="footable-visible"><span class="badge badge-danger">Suspended</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="footable-visible footable-first-column">Lizzee</td>
                <td class="footable-visible"><span class="footable-toggle"></span><a href="#">Goodlow</a></td>
                <td style="display: none;">Technical Services Librarian</td>
                <td style="display: none;">1 Nov 1961</td>
                <td class="footable-visible"><span class="badge badge-danger">Suspended</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
@section('footer')
    <script src="{{ asset('assets/js/plugins/tables/footable/footable.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/table_responsive.js') }}"></script>
    <!--jquery-dependency-fields -->
    {{--<script src="/vendor/core/js/jquery-dependency-fields/scripts.js"></script>--}}
    <!--end jquery-dependency-fields -->
    <script src="{{ asset('assets/js/index-operations.js') }}"></script>
    <script>
        function changeStatus(user_id, user_status)
        {
            /* changing the user status*/
            var obj_params = new Object();
            obj_params.user_id = user_id;
            obj_params.user_status = user_status;
            jQuery.get("{{url('/')}}/users/change-status", obj_params, function (msg) {
                if (msg.error == "1")
                {
                    alert("Sorry, the operation failed");
                }
                else
                {
                    /* toogling the bloked and active div of user*/
                    if (user_status == 0)
                    {
                        $("#disable_div" + user_id).css('display', 'inline-block');
                        $("#enable_div" + user_id).css('display', 'none');
                    }
                    else
                    {
                        $("#enable_div" + user_id).css('display', 'inline-block');
                        $("#disable_div" + user_id).css('display', 'none');
                    }
                }

            }, "json");

        }
    </script>
@endsection
