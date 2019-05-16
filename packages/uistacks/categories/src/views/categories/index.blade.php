@php
    $breadcrumbs = [
                        ['url' => '', 'name' => trans('Categories::categories.categories')]
    ];
    $dbTable = '';
    if($items->count()){
        $dbTable = $items[0]['table'];
    }
@endphp
@extends('admin.master')
@section('page_title')
    {{ trans('Categories::categories.categories') }}
@endsection
@section('content')
    <!-- Include single delete confirmation model -->
    @include('Core::modals.confirm-delete')
    <!-- Include bulk delete confirmation model -->
    @include('Core::modals.bulk-confirm-delete')
    <div class="row">
        <div class="col-md-12">
            <div class="admin-top-operation">
                <a class="btn btn-default" href="{{ action('\Uistacks\Categories\Controllers\CategoriesController@create')}}">{{ trans('Core::operations.create') }} {{ trans('Categories::categories.category') }}</a>
            </div>
            @if($items->count() || $_GET)
                @include('Categories::categories.filter')
            @endif
            @if($items->count())
                <form method="POST" action="{{ action('\Uistacks\Categories\Controllers\CategoriesController@bulkOperations')}}" id="bulk" class="form-inline">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="check_all" id="checkall">
                                </th>
                                <th>{{ trans('Core::operations.id') }}</th>
                                <th>{{ trans('Categories::categories.name') }}</th>
                                <th>Parent</th>
                                <th>Image</th>
                            <!-- <th>{{ trans('Core::operations.author') }}</th> -->
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
                                        @if($item->trans)
                                            {{ $item->trans->name }}
                                        @endif
                                    </td>
                                    <td class="user_name_col_{{$item->id}}">
                                        @if(isset($item->parents) && count($item->parents) > 0)
                                            {{ $item->parents[0]->trans->name }}
                                        @else
                                            --
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->lastUpdateBy)
                                            <div class="media v-middle">
                                                <div class="media-left">
                                                    <div class="icon-block width-100 bg-grey-100">
                                                        <a data-toggle="modal" data-target="#qurative_media_modal" href="javascript:void(0)" media-data-button-name="{{ trans('Core::operations.select') }} {{ trans('Stores::stores.store_main_img') }}" media-data-field-name="main_image_id" media-data-required>
                                                            <div class="media-item">
{{--                                                                @if(isset($item->media) && isset($item->media->main_image) && isset($item->media->main_image->styles['small']) && file_exists(url('/').'/'.$item->media->main_image->styles['small']))--}}
                                                                @if(isset($item->media) && isset($item->media->main_image) && isset($item->media->main_image->styles['small']))
                                                                    <img src="{{url('/')}}/{{ $item->media->main_image->styles['small'] }}" >
                                                                    <input type="hidden" name="main_image_id" value="{{$item->media->main_image->id}}" alt="people" class="img-circle width-80">
                                                                @else
                                                                    <img src="{{ url('/') }}/public/website_assets/img/user.png" alt="people" class="img-circle width-80">
                                                                @endif
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->author)
                                            {{ $item->author->name }}
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
                                        {{--<a href="{{ action('\Uistacks\Categories\Controllers\SubCategoriesController@index', $item->id) }}"><i class="fa fa-edit"></i> Sub Categories</a>--}}
                                        <a class="btn btn-sm btn-success" href="{{ action('\Uistacks\Categories\Controllers\CategoriesController@edit', $item->id) }}"><i class="fa fa-edit"></i> {{ trans('Core::operations.edit') }}</a>
                                        {{--<a onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="{{ $item->id }}" @if($item->trans) data-title="{{ $item->trans->name }}" @endif href="#full-width"><i class="fa fa-trash"></i> {{ trans('Core::operations.delete') }}</a>--}}
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
                        <h1>{{ trans('admin.no_results_found') }} <a href="{{ action('\Uistacks\Categories\Controllers\CategoriesController@index')}}">{{ trans('admin.back') }}</a></h1>
                    @elseif(Request::is(''.Lang::getlocale().'/admin/categories'))
                        <h1>{{ trans('admin.no_data_added_before') }} <a href="{{ action('\Uistacks\Categories\Controllers\CategoriesController@create')}}">{{ trans('Core::operations.create') }} {{ trans('Categories::categories.category') }}</a></h1>
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