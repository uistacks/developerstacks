@php
    $pageTitle = 'Banners';
    $itemTitle = 'Banner';
    $breadcrumbs = [
    ['url' => '', 'name' => trans('Banners::banners.banners')]
    ];
    $dbTable = '';
    if($items->count()){
    $dbTable = $items[0]['table'];
    }
@endphp
@extends('admin.master')
@section('title')
    {{ trans('Banners::banners.banners') }}
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
                <a class="btn btn-sm btn-outline-primary" href="{{ action('\Uistacks\Banners\Controllers\BannersController@create')}}"><i class="material-icons">add</i> {{ trans('Core::operations.create') }} {{ $itemTitle }}</a>
            </div>
        </div>
        <div class="card-body">
            @if($items->count() || $_GET)
                @include('Banners::banners.filter')
            @endif
        </div>
        @if($items->count())
            <form method="POST" action="{{ action('\Uistacks\Banners\Controllers\BannersController@bulkOperations')}}" id="bulk" class="form-inline">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>
                                <input type="checkbox" name="check_all" id="checkall">
                            </th>
                            <th>Title</th>
                            <th>{{trans('Banners::banners.image')}}</th>
                            <th>{{trans('Banners::banners.start_at')}}</th>
                            <th>{{trans('Banners::banners.end_at')}}</th>
                            <th>{{trans('Banners::banners.name')}}</th>
                            <th>{{ trans('Core::operations.status') }}</th>
                            <th>{{ trans('Core::operations.operations') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>
                                    <input type="checkbox" name="ids[]" class="check_list" value="{{$item->id}}">
                                </td>
                                <td class="user_name_col_{{$item->id}}">
                                    @if($item->trans)
                                        {{ $item->trans->name }}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($item->trans->banner_img) && file_exists(public_path('/uploads/banners').'/'.$item->trans->banner_img))
                                        <img width="60" height="60" src="{{url('/uploads/banners')}}/{{ $item->trans->banner_img }}" alt="">
                                    @else
                                        <img src="{{ asset('images/select_main_img.png') }}" width="60">
                                    @endif
                                </td>
                                <td>
                                    {{ date('Y-m-d',strtotime($item->start_date))  }}
                                </td>
                                <td>
                                    {{ date('Y-m-d',strtotime($item->end_date))  }}
                                </td>
                                <td>{{ $item->trans->name }}</td>
                                <td>
                                    @if($item->active == true)
                                        <label class="badge badge-success">{{ trans('Core::operations.active') }}</label>
                                    @else
                                        <label class="badge badge-danger" >{{ trans('Core::operations.inactive') }}</label>
                                @endif
                                <td>
                                    <a class="badge badge-success" href="{{ action('\Uistacks\Banners\Controllers\BannersController@edit', $item->id) }}"><i class="fa fa-edit"></i> {{ trans('Core::operations.edit') }}</a>
                                    <a class="badge badge-danger" onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="{{ $item->id }}" href="#full-width"><i class="fa fa-trash"></i> {{ trans('Core::operations.delete') }}</a>
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
                    <h1>{{ trans('admin.no_results_found') }} <a href="{{ action('\Uistacks\Banners\Controllers\BannersController@index')}}">{{ trans('admin.back') }}</a></h1>
                @elseif(Request::is(''.Lang::getlocale().'/admin/banners'))
                    <h1>{{ trans('admin.no_data_added_before') }} <a href="{{ action('\Uistacks\Banners\Controllers\BannersController@create')}}">Create Banner</a></h1>
                @endif
            </div>
        @endif
    </div>
@endsection
@section('footer')
    <script src="{{ asset('assets/js/index-operations.js') }}"></script>
@endsection