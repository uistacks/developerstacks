@php
    $pageTitle = trans('Users::users.users');
    $itemTitle = trans('Users::users.user');
    $role = 'users';

    $breadcrumbs = [
                        ['url' => '', 'name' => $pageTitle]
    ];

    $dbTable = '';
    if($items->count()){
        $dbTable = $items[0]['table'];
    }

@endphp

@extends('admin.master')
@section('page_title')
    {{ $pageTitle }}
@endsection
@section('content')
    <!-- Include single delete confirmation model -->
    @include('Core::modals.confirm-delete')
    <!-- Include bulk delete confirmation model -->
    @include('Core::modals.bulk-confirm-delete')

    <div class="row">
        <div class="col-md-12">
            <div class="admin-top-operation">
                <a class="btn btn-default" href="{{ action('\Uistacks\Users\Controllers\UsersController@create')}}">{{ trans('Core::operations.create') }} {{ $itemTitle }}</a>
            </div>
            @if($items->count() || $_GET)
                @include('Users::users.filter')
            @endif

            @if($items->count())
                <form method="POST" action="{{ action('\Uistacks\Users\Controllers\UsersController@bulkOperations')}}" id="bulk" class="form-inline">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th>
                                    <input type="checkbox" name="check_all" id="checkall" class="">
                                </th>
                                <th class="column-title">{{ trans('Core::operations.image') }}</th>
                                <th class="column-title">{{ trans('Core::operations.name') }}</th>
                                <th class="column-title">{{ trans('Core::operations.mobile') }}</th>
                                <th class="column-title">{{ trans('Core::operations.email') }}</th>
                                <th class="column-title">{{ trans('Core::operations.author') }}</th>
                                <th class="column-title">{{ trans('Core::operations.last_update_by') }}</th>
                                <th class="column-title">{{ trans('Core::operations.created_at') }}</th>
                                <th class="column-title">{{ trans('Core::operations.updated_at') }}</th>
                                <th class="column-title">{{ trans('Core::operations.status') }}</th>
                                {{--@if(Request::segment(4)== 'admin')--}}
                                {{--<th class="column-title">--}}
                                {{--{{ trans('Core::operations.permission') }}--}}
                                {{--</th>--}}
                                {{--@endif--}}
                                <th class="column-title">{{ trans('Core::operations.operations') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $k => $item)
                                <tr class="@if($k % 2 == 0) even @else odd @endif pointer" @if($item->trans) data-title="{{ $item->trans->name }}" @endif>
                                    <td class="a-center ">
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
                                    <td>
                                        @if($item->author)
                                            {{ $item->author->name }}
                                        @else
                                            {{ trans('Users::users.registerd_from_website')}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->lastUpdatedBy)
                                            {{ $item->lastUpdatedBy->name }}
                                        @else
                                            {{ trans('Core::operations.nothing')}}
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        @if($item->updated_at)
                                            {{ $item->updated_at }}
                                        @else
                                            {{ trans('Core::operations.nothing')}}
                                        @endif
                                    </td>
                                    <td>
                                        {{--@if($item->active == true)--}}
                                        {{--{{ trans('Core::operations.active') }}--}}
                                        {{--@else--}}
                                        {{--{{ trans('Core::operations.inactive') }}--}}
                                        {{--@endif--}}
                                        <div id="enable_div{!! $item->id!!}"  @if ($item->active == 1)  style="display:inline-block" @else style="display:none;" @endif >
                                            <a class="label label-success" title="" onClick="changeStatus({!! $item->id !!}, 0);" href="javascript:void(0);" id="status_{!! $item->id !!}">{{ trans('Core::operations.active') }}</a>
                                        </div>
                                        <div id="disable_div{!! $item->id !!}" @if ($item->active == 0) style="display:inline-block" @else  style="display:none;" @endif >
                                            <a class="label label-danger" title="" onClick="changeStatus({!! $item->id !!}, 1);" href="javascript:void(0);" id="status_{!! $item->id !!}">{{ trans('Core::operations.inactive') }}</a>
                                        </div>
                                    {{--@if(Request::segment(4)== 'admin')--}}
                                    {{--<td>--}}
                                    {{--<a class="btn btn-sm btn-danger" href="{{ action('\Uistacks\Users\Controllers\UsersController@givePermission', [$role, $item->id]) }}"><i class="fa fa-edit"></i> {{ trans('Core::operations.permission') }}</a>--}}
                                    {{--</td>--}}
                                    {{--@endif--}}
                                    <td class=" last">
                                        <a href="{{ action('\Uistacks\Users\Controllers\UsersController@edit', $item->id) }}"><i class="fa fa-edit"></i> {{ trans('Core::operations.edit') }}</a>
                                        <a onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="{{ $item->id }}" @if($item->trans) data-title="{{ $item->trans->name }}" @endif href="#full-width"><i class="fa fa-trash"></i> {{ trans('Core::operations.delete') }}</a>
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
                    alert("عذرا، أخفقت العملية");
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