@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/pages', 'name' => trans('Pages::pages.pages')];
    $action = action('\Uistacks\Pages\Controllers\PagesController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $pageNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Pages::pages.page')];
        $action = action('\Uistacks\Pages\Controllers\PagesController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Pages::pages.page')];
    }
@endphp

@extends('admin.master')
@section('title')
    {{ trans('Pages::pages.pages') }}: {{ $pageNameMode }} CMS
@endsection
@section('content')
    <!-- Include Media model -->
    @include('Media::modals.modal')
    <!-- end include Media model -->

    <!-- Include Media model -->
    @include('Media::modals.gallery-modal')
    <!-- end include Media model -->

    <div class="card">
        <div class="card-body">
            <form id="frm_create_edit" action="{{ $action }}" method="POST" role="form">
                @if($method === 'PATCH')
                    <input type="hidden" name="_method" value="PATCH">
                @endif
                @csrf
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">{{ $pageNameMode }} CMS Page</legend>
                    <div class="row">
                        <!-- Language field -->
                        @include('Core::fields.languages')
                        <div class="col-md-12">

                            @include('Core::groups.languages', [
                                'fields' => [
                                    0 => [
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'name',
                                            'name' => trans('Core::operations.name'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->title)) ? $item->trans->title : ""
                                        ]
                                    ]
                                ]
                            ])

                            @include('Core::groups.languages', [
                                'fields' => [
                                    0 => [
                                        'type' => 'textarea',
                                        'properties' => [
                                            'field_name' => 'description',
                                            'name' => trans('Pages::pages.description'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->body)) ? $item->trans->body : ""
                                        ]
                                    ],
                                    1 =>[
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'page_seo_title',
                                            'name' => trans('Pages::pages.page_seo_title'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->page_seo_title)) ? $item->trans->page_seo_title : ""
                                        ]

                                    ],
                                    2 =>[
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'page_meta_keywords',
                                            'name' => trans('Pages::pages.page_meta_keywords'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->page_meta_keywords)) ? $item->trans->page_meta_keywords : ""
                                        ]

                                    ],
                                    3 => [
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

                            <div class="form-group ">
                                <label for="section">{{trans('Pages::pages.page_status')}}</label>
                                <select id="page_status" class="form-control" name="page_status_ar">
                                    <option value="">{{trans('Pages::pages.select')}}</option>
                                    <option value="1" @if(isset($item->published) && $item->published =="1") selected="selected" @endif >{{trans('Pages::pages.publish')}}</option>
                                    <option value="2" @if(isset($item->published) && $item->published =="2") selected="selected" @endif >{{trans('Pages::pages.unpublish')}}</option>
                                </select>
                            </div>
                            <div class="checkbox">
                                <label><input name="back" type="checkbox" value="1" class="minimal-blue mb-1" @if(old('back') == 1) checked @endif> {{$backFieldLabel}}</label>
                            </div>

                            <button type="submit" id="btn_create" class="btn btn-outline-success btn-block"><i class="material-icons">save</i> {{ $submitButton }}</button>
                        </div>
                    </div>
                </fieldset>
            </form>
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

    <!--jquery-dependency-fields -->
    <script src="/vendor/core/js/jquery-dependency-fields/scripts.js"></script>
    <!--end jquery-dependency-fields -->

    {{--added for ckeditor start here--}}
    {{--<script src="{{url('/')}}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>--}}
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description_en' );
    </script>
    {{--added for ckeditor end here--}}
@endsection