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
            <h5 class="card-title">{{ $pageTitle }}</h5>
            <div class="header-elements">
                <div class="navbar-right">
                    <a class="btn btn-success" href="{{ action('\Uistacks\Users\Controllers\AdminController@create')}}"><i class="fa fa-plus-circle"></i> {{ trans('Core::operations.create') }} {{ $itemTitle }}</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if($items->count() || $_GET)
                @include('Users::users.admin-filter')
            @endif
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Eugene</td>
                    <td>Kopyov</td>
                    <td>@Kopyov</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Victoria</td>
                    <td>Baker</td>
                    <td>@Vicky</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>James</td>
                    <td>Alexander</td>
                    <td>@Alex</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Franklin</td>
                    <td>Morrison</td>
                    <td>@Frank</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('footer')
    <!--jquery-dependency-fields -->
    <script src="/vendor/core/js/jquery-dependency-fields/scripts.js"></script>
    <!--end jquery-dependency-fields -->
    <script src="{{ asset('public/admin-assets/js/index-operations.js') }}"></script>
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
