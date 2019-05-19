@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/banners', 'name' => trans('Banners::banners.banners')];
    $action = action('\Uistacks\Banners\Controllers\BannersController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
    $pageNameMode = trans('Core::operations.edit');
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Banners::banners.banner')];
    $action = action('\Uistacks\Banners\Controllers\BannersController@update', $item->id);
    $method = 'PATCH';
    $backFieldLabel = trans('admin.back_after_update');
    $submitButton = trans('admin.update');
    }else{
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Banners::banners.banner')];
    }
@endphp

@extends('admin.master')
@section('title')
    {{ trans('Banners::banners.banner') }}: {{ $pageNameMode }} {{ trans('Banners::banners.banner') }}
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-material-datetimepicker.css') }}" />
    <style>
        .dtp-btn-cancel {
            float: left;
        }
    </style>
@endsection
@section('content')

    <!-- Include Media model -->
    @include('Media::modals.modal')
    <!-- end include Media model -->
    <!-- Include Media model -->
    @include('Media::modals.gallery-modal')
    <!--<link href="{{ asset('assets/css/pages/tables-rtl.css') }}" rel="stylesheet" />-->

    <link href="{{ asset('media-dev.css') }}" rel="stylesheet" />
    <!-- end include Media model -->
    <div class="card">
        <div class="card-body">
            <form action="{{ $action }}" method="POST" role="form" enctype="multipart/form-data" >
                @if($method === 'PATCH')
                    <input type="hidden" name="_method" value="PATCH">
                @endif
                @csrf
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Create Banner</legend>
                    <div class="row">
                        <div class="col-md-8">
                            @include('Core::groups.languages', [
                                'fields' => [
                                    0 => [
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'name',
                                            'name' => trans('Core::operations.name'),
                                            'placeholder' => ''
                                        ]
                                    ]
                                ]
                            ])
                            <div class="form-group ">
                                <label for="section">{{trans('Banners::banners.image')}}</label>
                                @if(Request::is('*/edit'))
                                    <input type="file" name="banner_img" id="banner_img"  />
                                @else
                                    <input type="file" name="banner_img" id="banner_img"   />
                                @endif
                                <input type="hidden" name="banner_img_old" id="banner_img_old" @if(isset($item)) value="{{ $item->trans->banner_img }}" @endif />
                            </div>
                            @if(isset($item->trans->banner_img) && file_exists(public_path('/uploads/banners').'/'.$item->trans->banner_img))
                                <img width="60" height="60" src="{{url('/uploads/banners')}}/{{ $item->trans->banner_img }}" alt="">
                            @else
                                <img src="{{ url('/') }}/assets/images/qurative-org.png" width="60">
                            @endif

                            <div class="form-group">
                                <label for="URL">URL</label>
                                <input @if(isset($item->trans->url)) value="{{ $item->trans->url }}" @endif type="text" value="" id="banner_object_url" name="banner_object_url" class="form-control" >
                                For Example:- http:// |your domain|.com
                            </div>

                            @include('Core::fields.input_text', [
                                    'field_name' => 'start_date',
                                    'name' => trans('Banners::banners.start_at'),
                                    'placeholder' => trans('Banners::banners.start_at'),
                                    'value' => isset($item) ? old('start_date',$item->start_date) : ""
                                ])
                            @include('Core::fields.input_text', [
                                    'field_name' => 'end_date',
                                    'name' => trans('Banners::banners.end_at'),
                                    'placeholder' => trans('Banners::banners.end_at'),
                                    'value' => isset($item) ? old('end_date',$item->end_date) : ""
                                ])
                        </div>
                        <div class="col-md-4 sidbare">
                            <!-- Language field -->
                        @include('Core::fields.languages')
                        <!-- End Language field -->

                            @include('Core::fields.checkbox', [
                                'field_name' => 'active',
                                'name' => trans('admin.active'),
                                'placeholder' => ''
                            ])
                            <div class="checkbox">
                                <label><input name="back" type="checkbox" value="1" class="minimal-blue" @if(old('back') == 1) checked @endif> {{$backFieldLabel}}</label>
                            </div>

                            <button type="submit" class="btn btn-outline-success btn-block"><i class="material-icons mr-2">save</i>{{ $submitButton }}</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
@section('footer')
    <script type="text/javascript" src="{{ asset('assets/js/moment-with-locales.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-material-datetimepicker.js') }}"></script>
    <script>
        $(document).ready(function()
        {
            $('#end_date').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
            $('#start_date').bootstrapMaterialDatePicker({ weekStart: 0, time: false }).on('change', function(e, date)
            {
                $('#end_date').bootstrapMaterialDatePicker('setMinDate', date);
            });
        });
    </script>

    {{--<script src="{{ asset('assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/pickers/daterangepicker.js') }}"></script>--}}
@endsection