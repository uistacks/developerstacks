@php
    $breadcrumbs = [
                        ['url' => '', 'name' => trans('Locations::locations.locations')]
    ];
    $dbTable = '';
    if($items->count()){
        $dbTable = $items[0]['table'];
    }
@endphp
@extends('admin.master')
@section('page_title')
    {{ trans('Locations::locations.locations') }}
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('public/website_assets/raty-master/lib/jquery.raty.css') }}">
    <script src="{{ asset('public/website_assets/raty-master/lib/jquery.raty.js') }}" type="text/javascript"></script>
    <!-- Include single delete confirmation model -->
    @include('Core::modals.confirm-delete')
    <!-- Include bulk delete confirmation model -->
    @include('Core::modals.bulk-confirm-delete')
    <div class="row">
        <div class="col-md-12">
            <div class="admin-top-operation">
                <a class="btn btn-default" href="{{ action('\Uistacks\Locations\Controllers\StatesController@create')}}">{{ trans('Core::operations.create') }} {{ trans('Locations::locations.location') }}</a>
            </div>
            @if($items->count() || $_GET)
                @include('Locations::states.filter')
            @endif
            @if($items->count())
                <form method="POST" action="{{ action('\Uistacks\Locations\Controllers\StatesController@bulkOperations')}}" id="bulk" class="form-inline">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="check_all" id="checkall">
                                </th>
                                <th>State</th>
                                <th>Country</th>
                                <th>{{ trans('Core::operations.created_at') }}</th>
                                <th>{{ trans('Core::operations.updated_at') }}</th>
                                <th>{{ trans('Core::operations.status') }}</th>
                                <th>{{ trans('Core::operations.operations') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $key => $item)
                                <tr @if($item->trans) data-title="{{ $item->trans->name }}" @endif>
                                    <td>
                                        <input type="checkbox" name="ids[]" class="check_list" value="{{$item->id}}">
                                    </td>
                                    <td class="user_name_col_{{$item->id}}">
                                        @if($item->trans)
                                            {{ $item->trans->name }}
                                        @endif
                                    </td>
                                    <td>
                                    @if($item->country)
                                    {{ $item->country->trans->name }}
                                    @endif
                                    </td>

                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>

                                        @if($item->active == true)
                                            <label class="label label-success">{{ trans('Core::operations.active') }}</label>
                                        @else
                                            <label class="label label-danger">{{ trans('Core::operations.inactive') }}</label>
                                        @endif
                                    <td>
                                        <a href="{{ action('\Uistacks\Locations\Controllers\StatesController@edit', $item->id) }}"><i class="fa fa-edit"></i> {{ trans('Core::operations.edit') }}</a>
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
                        <h1>{{ trans('admin.no_results_found') }} <a href="{{ action('\Uistacks\Locations\Controllers\StatesController@index')}}">{{ trans('admin.back') }}</a></h1>
                    @elseif(Request::is(''.Lang::getlocale().'/admin/locations'))
                        <h1>{{ trans('admin.no_data_added_before') }} <a href="{{ action('\Uistacks\Locations\Controllers\StatesController@create')}}">{{ trans('Core::operations.create') }} {{ trans('Locations::locations.location') }}</a></h1>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('public/admin_assets/js/index-operations.js') }}"></script>
@endsection