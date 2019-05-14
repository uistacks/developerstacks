@php
    $faqNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/faqs', 'name' => trans('Faqs::faqs.faqs')];
    $action = action('\Uistacks\Faqs\Controllers\FaqsController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $faqNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Faqs::faqs.faq')];
        $action = action('\Uistacks\Faqs\Controllers\FaqsController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Faqs::faqs.faq')];
    }
@endphp
@extends('admin.master')
@section('page_title')
    {{ trans('Faqs::faqs.faqs') }}: {{ $faqNameMode }} {{ trans('Faqs::faqs.faq') }}
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
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> {{ $faqNameMode }} {{ trans('Faqs::faqs.faq') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ $action }}" method="POST" role="form">
                        @if($method === 'PATCH')
                            <input type="hidden" name="_method" value="PATCH">
                        @endif
                        {{ csrf_field() }}
                        <div class="col-md-9">
                            @include('Core::groups.languages', [
                                'fields' => [
                                    0 => [
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'name',
                                            'name' => trans('Faqs::faqs.name'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->name)) ? $item->trans->name : ""
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
                                            'name' => trans('Faqs::faqs.description'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->description)) ? $item->trans->description : ""
                                        ]
                                    ]
                                ]
                            ])
                        </div>
                        <div class="col-md-3">
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
    <!--jquery-dependency-fields -->
    <script src="/vendor/core/js/jquery-dependency-fields/scripts.js"></script>
    <!--end jquery-dependency-fields -->
    {{--added for ckeditor start here--}}
    {{--<script src="{{url('/')}}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>--}}
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'description_ar' );
        CKEDITOR.replace( 'description_en' );
        $(document).ready(function () {
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
        });
    </script>
    {{--added for ckeditor end here--}}
@endsection