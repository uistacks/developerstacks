@php
    $pageTitle = trans('Users::users.users');
    $itemTitle = trans('Users::users.user');
    $role = 'users';

    $breadcrumbs = [
                        ['url' => '', 'name' => $pageTitle]
    ];

    $dbTable = '';
    if(isset($items[0]) && $items[0]->getTable() !== null){
        $dbTable = $items[0]->getTable();
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
                <a class="btn btn-sm btn-outline-primary" href="{{ action('\Uistacks\Users\Controllers\UsersController@create')}}"><i class="material-icons">add</i> {{ trans('Core::operations.create') }} {{ $itemTitle }}</a>
            </div>
        </div>

        <div class="card-body">
            @if($items->count() || $_GET)
                @include('Users::users.filter')
            @endif
        </div>
        @if($items->count())
        <form method="POST" action="{{ action('\Uistacks\Users\Controllers\UsersController@bulkOperations')}}" id="bulk" class="form-inline">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="check_all" id="checkall">
                        </th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $k => $item)
                        <tr class="@if($k % 2 == 0) even @else odd @endif pointer" @if($item->trans) data-title="{{ $item->trans->name }}" @endif>

                            <td>
                                <input type="checkbox" name="ids[]" class="check_list" value="{{$item->id}}">
                            </td>
                            <td>
                                @if(isset($item->media) && isset($item->media->main_image) && isset($item->media->main_image->styles['thumbnail']))
                                    <img width="60" height="60" src="{{url('/')}}/{{ $item->media->main_image->styles['thumbnail'] }}" alt="">
                                @else
                                    <img src="{{ asset('public/images/select_main_img.png') }}" width="60">
                                @endif
                            </td>
                            <td class="user_name_col_{{$item->id}}">{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                @if($item->updated_at)
                                    {{ $item->updated_at }}
                                @else
                                    {{ trans('Core::operations.nothing')}}
                                @endif
                            </td>
                            <td>
                                <div id="enable_div{!! $item->id!!}"  @if ($item->active == 1)  style="display:inline-block" @else style="display:none;" @endif >
                                    <a class="badge badge-success" title="" onClick="changeStatus({!! $item->id !!}, 0);" href="javascript:void(0);" id="status_{!! $item->id !!}">{{ trans('Core::operations.active') }}</a>
                                </div>
                                <div id="disable_div{!! $item->id !!}" @if ($item->active == 0) style="display:inline-block" @else  style="display:none;" @endif >
                                    <a class="badge badge-danger" title="" onClick="changeStatus({!! $item->id !!}, 1);" href="javascript:void(0);" id="status_{!! $item->id !!}">{{ trans('Core::operations.inactive') }}</a>
                                </div>
                            </td>
                            <td style="width: 100px;">
                                <a class="badge badge-success" href="{{ action('\Uistacks\Users\Controllers\UsersController@edit', $item->id) }}"><i class="material-icons" >edit</i></a>
                                <a class="badge badge-danger" onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="{{ $item->id }}" @if($item->trans) data-title="{{ $item->trans->name }}" @endif href="#full-width"><i class="material-icons" >delete</i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="form-group" style="padding: 10px;">
                <label for="operation" class="col-form-label col-lg-5">{{ trans('Core::operations.with_select') }}</label>
                <div class="col-lg-7">
                    <select name="operation" id="operation" class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0" required="required">
                        <option value="">- {{ trans('Core::operations.select') }} -</option>
                        <option value="activate">{{ trans('Core::operations.activate') }}</option>
                        <option value="deactivate">{{ trans('Core::operations.deactivate') }}</option>
                        <option value="delete">{{ trans('Core::operations.delete') }}</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2 mr-sm-2 ml-sm-2 mb-sm-0">{{ trans('Core::operations.go') }}</button>

            <div class="form-group row">
                <div class="count @if($items->hasPages()) col-lg-4 @else mr-sm-2 ml-sm-2 mb-sm-0 @endif"><i class="fa fa-folder-o"></i> {{ $items->total() }} {{ trans('Core::operations.item') }}</div>
                <div class="col-lg-8 justify-content-end" style="text-align: right;"> {!! $items->render() !!} </div>
            </div>

        </form>
        @else
            <div class="text-center">
                @if($_GET)
                    <h1>{{ trans('admin.no_results_found') }} <a href="{{ action('\Uistacks\Users\Controllers\UsersController@index', $role)}}">{{ trans('admin.back') }}</a></h1>
                @else
                    <h1>{{ trans('admin.no_data_added_before') }} <a href="{{ action('\Uistacks\Users\Controllers\UsersController@create', $role)}}">{{ trans('Users::users.create') }} {{ $itemTitle }}</a></h1>
                @endif
            </div>
        @endif
    </div>

@endsection
@section('footer')
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