@php
    $breadcrumbs = [
                        ['url' => '', 'name' => trans('Countries::countries.countries')]
    ];

    $dbTable = '';
    if($items->count()){
        $dbTable = $items[0]['table'];
    }

@endphp

@extends('admin.master')
@section('page_title')
{{ trans('Countries::countries.countries') }}
@endsection
@section('content')

<!-- Include single delete confirmation model -->
@include('Core::modals.confirm-delete')
<!-- Include bulk delete confirmation model -->
@include('Core::modals.bulk-confirm-delete')

<div class="row">
    <div class="col-md-12">

        <div class="admin-top-operation">
            <a class="btn btn-default" href="{{ action('\Uistacks\Locations\Controllers\CountriesController@create')}}">Create Country</a>
        </div>

        @if($items->count() || $_GET)
            @include('Locations::countries.filter')
        @endif

        @if($items->count())
            <form method="POST" action="{{ action('\Uistacks\Locations\Controllers\CountriesController@bulkOperations')}}" id="bulk" class="form-inline">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="check_all" id="checkall">
                                </th>
                                <th>{{ trans('Core::operations.id') }}</th>
                                <th>Country</th>
                                <th>{{ trans('Core::operations.author') }}</th>
                                <th>{{ trans('Core::operations.last_update_by') }}</th>
                                <th>{{ trans('Core::operations.created_at') }}</th>
                                <th>{{ trans('Core::operations.updated_at') }}</th>
                                <th>{{ trans('Core::operations.status') }}</th>
                                <th>{{ trans('Core::operations.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr @if($item->trans) data-title="{{ $item->trans->name }}" @endif>
                                    <td>
                                        <input type="checkbox" name="ids[]" class="check_list" value="{{$item->id}}">
                                    </td>
                                    <td>{{ $item->id }}</td>
                                    <td class="user_name_col_{{$item->id}}">
                                        @if(isset($item->flag))
                                        @php
                                            $exist_flag = url('/').'/public/images/flags/'.strtolower($item->iso2).'.png';
                                                if (file_exists($exist_flag)) {
                                                    $exist_flag = $exist_flag;
                                                } else {
                                                    $exist_flag = url('/').'/public/images/flags/'.strtolower($item->iso2).'.png';
                                                }
                                        @endphp
                                        <img src="{{isset($item->iso2) ? $exist_flag : ""}}" alt="{{ strtolower($item->iso2).'.png' }}" />
                                        @endif
                                        @if($item->trans)
                                            {{ ucwords(strtolower($item->trans->name)) }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->author)
                                            {{ $item->author->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->lastUpdateBy)
                                            {{ $item->lastUpdateBy->name }}
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        @if($item->active == true)
                                            {{ trans('Core::operations.active') }}
                                        @else
                                            {{ trans('Core::operations.inactive') }}
                                        @endif
                                    <td>
                                       <a href="{{ action('\Uistacks\Locations\Controllers\CountriesController@edit', $item->id) }}"><i class="fa fa-edit"></i> {{ trans('Core::operations.edit') }}</a>
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
                    <h1>{{ trans('admin.no_results_found') }} <a href="{{ action('\Uistacks\Locations\Controllers\CountriesController@index')}}">{{ trans('admin.back') }}</a></h1>
                @elseif(Request::is(''.Lang::getlocale().'/admin/countries'))
                    <h1>{{ trans('admin.no_data_added_before') }} <a href="{{ action('\Uistacks\Locations\Controllers\CountriesController@create')}}">{{ trans('Core::operations.create') }} Country</a></h1>
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
    <script src="{{ asset('public/admin_assets/js/index-operations.js') }}"></script>
@endsection