@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => action('\Uistacks\Categories\Controllers\SubCategoriesController@index', $catId), 'name' => 'Sub '. trans('Categories::categories.categories')];
    $action = action('\Uistacks\Categories\Controllers\SubCategoriesController@store',$catId);
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $pageNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.'Sub '.trans('Categories::categories.category')];
        $action = action('\Uistacks\Categories\Controllers\SubCategoriesController@update',[$catId, $item->id]);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.'Sub '.trans('Categories::categories.category')];
    }
@endphp

@extends('admin.master')
@section('page_title')
{{ trans('Categories::categories.categories') }}: {{ $pageNameMode }} Sub {{ trans('Categories::categories.category') }}
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('public/media-dev.css')}}" />
@endsection
@section('content')
<!-- Include Media model -->
@include('Media::modals.modal')
<!-- end include Media model -->

<!-- Include Media model -->
@include('Media::modals.gallery-modal')
<!-- end include Media model -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> {{ $pageNameMode }} Sub {{ trans('Categories::categories.category') }}</h3>
            </div>
            <div class="panel-body">
                <form action="{{ $action }}" method="POST" role="form" >
                    @if($method === 'PATCH')
                        <input type="hidden" name="_method" value="PATCH">
                    @endif
                    {{ csrf_field() }}
                    <div class="col-md-9">
                        <div class="form-group">
                            <label class="">Category Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" disabled name="menuName" value="{{ $category->trans->name }}"/>
                            </div>
                        </div>
                        @include('Core::groups.languages', [
                            'fields' => [
                                0 => [
                                    'type' => 'input_text',
                                    'properties' => [
                                        'field_name' => 'name',
                                        'name' => trans('Core::operations.name'),
                                        'placeholder' => ''
                                    ]
                                ],
                                1 => [
                                    'type' => 'textarea',
                                    'properties' => [
                                        'field_name' => 'description',
                                        'name' => trans('Core::operations.description'),
                                        'placeholder' => ''
                                    ]
                                ]
                            ]
                        ])

                        @if(isset($category->trans) && $category->trans->name == "SIDES")
                            <input type="text" class="form-control" name="size" value="{{ isset($item->size) ? $item->size : "" }}"/>
                        @endif
                    </div>
                    <div class="col-md-3 sidbare">
                        <!-- Media main image -->
                        <div class="form-group {{ $errors->has('main_image_id') ? 'has-error': '' }}" style="text-align: center;">
                            <label style="display: block;">{{ trans('Users::users.avatar') }}</label>

                            <a data-toggle="modal" data-target="#qurative_media_modal" href="javascript:void(0)" media-data-button-name="{{ trans('Core::operations.select') }} Image" media-data-field-name="main_image_id" media-data-required>
                                <div class="media-item">
                                    @if(isset($item->media) && isset($item->media->main_image) && isset($item->media->main_image->styles['thumbnail']))
                                        <img src="{{url('/')}}/{{ $item->media->main_image->styles['thumbnail'] }}" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                        <input type="hidden" name="main_image_id" value="{{$item->media->main_image->id}}">
                                    @else
                                        <img src="{{ asset('public/images/select_main_img.png') }}" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                    @endif
                                </div>
                            </a>
                        </div>

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
                        
                        <button type="submit" class="btn btn-block btn-primary">{{ $submitButton }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<!--Language -->
@include('Core::language.scripts.scripts')
<!--end Language -->

<!--Media -->
@include('Media::scripts.scripts')
<script src="{{ asset('public/media-dev.js')}}"></script>
<!--end media -->
<!--jquery-dependency-fields -->
<script src="/vendor/core/js/jquery-dependency-fields/scripts.js"></script>
<!--end jquery-dependency-fields -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#lang-en').attr('onClick','return false');
        $('#lang-ar').attr('onClick','return false');
    });
</script>
@endsection