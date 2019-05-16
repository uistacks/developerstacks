@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => action('\Uistacks\Categories\Controllers\CategoriesController@index'), 'name' => trans('Categories::categories.categories')];
    $action = action('\Uistacks\Categories\Controllers\CategoriesController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $pageNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Categories::categories.category')];
        $action = action('\Uistacks\Categories\Controllers\CategoriesController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Categories::categories.category')];
    }
@endphp

@extends('admin.master')
@section('page_title')
    {{ trans('Categories::categories.categories') }}: {{ $pageNameMode }} {{ trans('Categories::categories.category') }}
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
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> {{ $pageNameMode }} {{ trans('Categories::categories.category') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ $action }}" method="POST" role="form" >
                        @if($method === 'PATCH')
                            <input type="hidden" name="_method" value="PATCH">
                        @endif
                        {{ csrf_field() }}
                        <div class="col-md-9">

                        @php
                            $options[] = ['value' => '0', 'name' => 'No Parent'];
                            if(isset($categories) && $categories->count()){
                                foreach ($categories as $k => $catItem) {
                                    $catName = '';
                                    if($catItem->trans){
                                        $catName = $catItem->trans->name;
                                    }
                                    $options[] = ['value' => $catItem->id, 'name' => $catName];
                                }
                            }
                            $value = '';
                            if(isset($item) && $item->parent_id){
                                $value = $item->parent_id;
                            }
                        @endphp

                        @include('Core::fields.select', [
                            'field_name' => 'parent_id',
                            'name' => "Category",
                            'options' => $options,
                            'value' => $value
                        ])

                            <!-- <div class="form-group">
                                <label for="parent_id">{{ trans('Core::operations.with_select') }}</label>
                                <select name="parent_id" id="parent_id" class="form-control" required="required">
                                    <option value="0">No Parent</option>
                                    @if(isset($categories))
                                        @foreach($categories as $k => $catItem)
                                        <option value="{{ $catItem->id }}">{{ $catItem->trans->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div> -->

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
                            @include('Core::fields.input_text', [
                                'field_name' => 'class_name',
                                'name' => "Class Name",
                                'placeholder' => ''
                            ])
                            @include('Core::groups.languages', [
                                'fields' => [
                                    0 =>[
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'page_seo_title',
                                            'name' => trans('Pages::pages.page_seo_title'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->page_seo_title)) ? $item->trans->page_seo_title : ""
                                        ]

                                    ],
                                    1 =>[
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'page_meta_keywords',
                                            'name' => trans('Pages::pages.page_meta_keywords'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->page_meta_keywords)) ? $item->trans->page_meta_keywords : ""
                                        ]

                                    ],
                                    2 => [
                                        'type' => 'textarea',
                                        'properties' => [
                                            'field_name' => 'page_meta_description',
                                            'name' => trans('Pages::pages.page_meta_description'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->page_meta_descriptions)) ? $item->trans->page_meta_descriptions : ""
                                        ]
                                    ]
                                ]
                            ])

                        </div>
                        <div class="col-md-3 sidbare">
                        <!-- Media main image -->
                        <div class="form-group {{ $errors->has('main_image_id') ? 'has-error': '' }}" style="text-align: center;">
                                <label style="display: block;">{{ trans('Users::users.avatar') }}</label>

                                <a data-toggle="modal" data-target="#qurative_media_modal" href="javascript:void(0)" media-data-button-name="{{ trans('Core::operations.select') }}ر{{ trans('Users::users.avatar') }}" media-data-field-name="main_image_id" media-data-required>
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
                            <!-- End Media main image -->

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
    <!--end media -->
<!--Media -->
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