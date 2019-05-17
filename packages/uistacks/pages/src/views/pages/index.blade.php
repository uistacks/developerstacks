@php
    $pageTitle = 'CMS';
    $itemTitle = 'Cms';
    $breadcrumbs = [
                        ['url' => '', 'name' => trans('Pages::pages.pages')]
    ];
    $dbTable = '';
    if($items->count()){
        $dbTable = $items[0]['table'];
    }
@endphp

@extends('admin.master')
@section('title')
    {{ trans('Pages::pages.pages') }}: List CMS
@endsection
@section('content')

    <!-- Include single delete confirmation model -->
    @include('Core::modals.confirm-delete')
    <!-- Include bulk delete confirmation model -->
    @include('Core::modals.bulk-confirm-delete')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">List CMS</h5>
            <div class="header-elements">
                <a class="btn btn-sm btn-outline-primary" href="{{ action('\Uistacks\Pages\Controllers\PagesController@create')}}"><i class="material-icons">add</i> {{ trans('Core::operations.create') }} {{ $itemTitle }}</a>
            </div>
        </div>

        @if($items->count())
            <form method="POST" action="{{ action('\Uistacks\Pages\Controllers\PagesController@bulkOperations')}}" id="bulk" class="form-inline">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>{{ trans('Core::operations.id') }}</th>
                            <th>{{ trans('Pages::pages.name') }}</th>
                            <th>{{ trans('Pages::pages.url') }}</th>
                            <th>{{ trans('Core::operations.status') }}</th>
                            <th>{{ trans('Core::operations.operations') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr @if($item->trans) data-title="{{ $item->trans->name }}" @endif>
                                <td>{{ $item->id }}</td>
                                <td>
                                    @if($item->trans)
                                        {{ $item->trans->title }}
                                    @endif
                                </td>
                                <td>
                                    @if($item->page_url)
                                        <a href="javascript:void(0);" onclick='return window.open("{{url('/')}}/{{ Lang::getLocale() }}/pages/{{$item->page_url}}" , "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=200,width=1024,height=600");' >{{url('/')}}/{{ Lang::getLocale() }}/pages/{{$item->page_url}}</a>
                                    @endif
                                </td>
                                <td>
                                @if($item->published == 1)
                                    {{ trans('Core::operations.active') }}
                                @else
                                    {{ trans('Core::operations.inactive') }}
                                @endif
                                <td>
                                    <a href="{{ action('\Uistacks\Pages\Controllers\PagesController@edit', $item->id) }}"><i class="fa fa-edit"></i> {{ trans('Core::operations.edit') }}</a>
                                    {{--<a onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="{{ $item->id }}" @if($item->trans) data-title="{{ $item->trans->name }}" @endif href="#full-width"><i class="fa fa-trash"></i> {{ trans('Core::operations.delete') }}</a>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="form-group row">
                    <div class="count @if($items->hasPages()) col-lg-4 @else mr-sm-2 ml-sm-2 mb-sm-0 @endif"><i class="fa fa-folder-o"></i> {{ $items->total() }} {{ trans('Core::operations.item') }}</div>
                    <div class="col-lg-8 justify-content-end" style="text-align: right;"> {!! $items->render() !!} </div>
                </div>
            </form>
        @else
            <div class="text-center">
                @if($_GET)
                    <h1>{{ trans('admin.no_results_found') }} <a href="{{ action('\Uistacks\Pages\Controllers\PagesController@index')}}">{{ trans('admin.back') }}</a></h1>
                @elseif(Request::is(''.Lang::getlocale().'/admin/pages'))
                    <h1>{{ trans('admin.no_data_added_before') }} <a href="{{ action('\Uistacks\Pages\Controllers\PagesController@create')}}">Create CMS</a></h1>
                @endif
            </div>
        @endif
    </div>

@endsection
@section('footer')
{{--    <script src="{{ asset('assets/js/index-operations.js') }}"></script>--}}
@endsection