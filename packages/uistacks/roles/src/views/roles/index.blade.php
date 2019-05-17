@php
    $pageTitle = 'Roles';
    $itemTitle = 'Role';
    $breadcrumbs = [
                        ['url' => '', 'name' => trans('Roles::roles.roles')]
    ];
    $dbTable = '';
    if($items->count()){
        $dbTable = $items[0]['table'];
    }
@endphp
@extends('admin.master')
@section('title')
    {{ trans('Roles::roles.roles') }}
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
                <a class="btn btn-sm btn-outline-primary" href="{{ action('\Uistacks\Roles\Controllers\RolesController@create')}}"><i class="material-icons">add</i> {{ trans('Core::operations.create') }} {{ $itemTitle }}</a>
            </div>
        </div>

        <div class="card-body">
            @if($items->count() || $_GET)
                @include('Roles::roles.filter')
            @endif
        </div>
        @if($items->count())
            <form method="POST" action="{{ action('\Uistacks\Roles\Controllers\RolesController@bulkOperations')}}" id="bulk" class="form-inline">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>
                                <input type="checkbox" name="check_all" id="checkall">
                            </th>
                            <th>{{ trans('Core::operations.id') }}</th>
                            <th>{{ trans('Core::operations.name') }}</th>
                            <th>{{ trans('Core::operations.created_at') }}</th>
                            <th>{{ trans('Core::operations.updated_at') }}</th>
                            <th>{{ trans('Core::operations.status') }}</th>
                            <th>{{ trans('Core::operations.operations') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr @if($item->trans) data-title="{{ $item->trans->title }}" @endif>
                                <td>
                                    <input type="checkbox" name="ids[]" class="check_list" value="{{$item->id}}">
                                </td>
                                <td>{{ $item->id }}</td>
                                <td class="user_name_col_{{$item->id}}">
                                    @if($item->trans)
                                        {{ $item->trans->title }}
                                    @endif
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    @if($item->active == true)
                                        <label class="badge badge-success">{{ trans('Core::operations.active') }}</label>
                                    @else
                                        <label class="badge badge-danger" >{{ trans('Core::operations.inactive') }}</label>
                                @endif
                                <td>
                                    <a class="badge badge-success" href="{{ action('\Uistacks\Roles\Controllers\RolesController@edit', $item->id) }}"><i class="material-icons" >edit</i></a>
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
                    <h1>{{ trans('admin.no_results_found') }} <a href="{{ action('\Uistacks\Roles\Controllers\RolesController@index')}}">{{ trans('admin.back') }}</a></h1>
                @elseif(request()->is(''. app()->getlocale().'/admin/roles'))
                    <h1>{{ trans('admin.no_data_added_before') }} <a href="{{ action('\Uistacks\Roles\Controllers\RolesController@create')}}">{{ trans('Users::users.create') }} {{ $itemTitle }}</a></h1>
                @endif
            </div>
        @endif
    </div>

@endsection
@section('footer')
    <script src="{{ asset('assets/js/index-operations.js') }}"></script>
@endsection