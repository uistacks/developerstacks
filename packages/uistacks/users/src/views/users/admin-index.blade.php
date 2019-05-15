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
            <h5 class="card-title">Dashed border</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if($items->count() || $_GET)
                @include('Users::users.admin-filter')
            @endif
        </div>


        <form method="POST" action="{{ action('\Uistacks\Users\Controllers\AdminController@bulkOperations')}}" id="bulk" class="form-inline">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="table-responsive">
                <table class="table table-bordered">
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
                            <td>{{ $item->name }}</td>
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
                            <td class="w-25">
                                <a class="btn btn-sm btn-outline-success" href="{{ action('\Uistacks\Users\Controllers\AdminController@edit', $item->id) }}"><i class="icon-database-edit2"></i> {{ trans('Core::operations.edit') }}</a>
                                <a class="btn btn-sm btn-outline-danger" onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="{{ $item->id }}" @if($item->trans) data-title="{{ $item->trans->name }}" @endif href="#full-width"><i class="fa fa-trash"></i> {{ trans('Core::operations.delete') }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="form-group">
                <label for="operation">{{ trans('Core::operations.with_select') }}</label>
                <select name="operation" id="operation" class="form-control" required="required">
                    <option value="">- {{ trans('Core::operations.select') }} -</option>
                    <option value="activate">{{ trans('Core::operations.activate') }}</option>
                    <option value="deactivate">{{ trans('Core::operations.deactivate') }}</option>
                    <option value="delete">{{ trans('Core::operations.delete') }}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{ trans('Core::operations.go') }}</button>

            <div class="table-footer">
                <div class="count"><i class="fa fa-folder-o"></i> {{ $items->total() }} {{ trans('Core::operations.item') }}</div>
                <div class="pagination-area"> {!! $items->render() !!} </div>
            </div>

        </form>
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
