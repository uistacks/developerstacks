@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/tutorials', 'name' => trans('Tutorials::tutorials.tutorials')];
    $action = action('\UiStacks\Tutorials\Controllers\TutorialsController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
    $pageNameMode = trans('Core::operations.edit');
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Tutorials::tutorials.tutorials')];
    $action = action('\UiStacks\Tutorials\Controllers\TutorialsController@update', $item->id);
    $method = 'PATCH';
    $backFieldLabel = trans('admin.back_after_update');
    $submitButton = trans('admin.update');
    }else{
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Tutorials::tutorials.tutorial')];
    }
@endphp

@extends('admin.master')
@section('page_title')
    {{trans('Tutorials::tutorials.tutorial')}}
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('public/media-dev.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/website_assets/css/autocomplete/chosen.css') }}">
@endsection
@section('content')
    <!-- Include Media model -->
    @include('Media::modals.modal')
    <!-- end include Media model -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        {{trans('Tutorials::tutorials.tutorial')}}
                    </h3>
                </div>
                <div class="panel-body">
                    {{--<form class="form-horizontal" name="frm_tutorials_update" id="frm_tutorials_update" role="form"  method="post" >--}}
                    <form action="{{ $action }}" method="POST" role="form" >
                        @if($method === 'PATCH')
                            <input type="hidden" name="_method" value="PATCH">
                        @endif
                        {!! csrf_field() !!}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-9">
                                        @php
                                            $options = [];
                                            $options[] = ['value' => '', 'name' => '-- '.trans('Core::operations.select').' --'];
                                            if(isset($courses) && $courses->count()){
                                                foreach ($courses as $course) {
                                                    $courseName = '';
                                                    if($course->trans){
                                                        $courseName = ucwords(strtolower($course->trans->name));
                                                    }
                                                    $options[] = ['value' => $course->id, 'name' => $courseName];
                                                }
                                            }
                                           // dd($options);
                                        @endphp

                                        @include('Core::fields.select', [
                                            'field_name' => 'course_id',
                                            'name' => trans('Tutorials::tutorials.courses'),
                                            'options' => $options
                                        ])

                                        <div class="form-group clearfix">
                                            <label for="section_id" > {{ucfirst(trans('Tutorials::tutorials.section'))}}</label>
                                            <select id="section_id" name="section_id" class="form-control">
                                                <option value="">- {{trans('Core::operations.select').' '.ucfirst(trans('Tutorials::tutorials.section'))}} -</option>
                                                @if(isset($sections) && $sections->count())
                                                    @foreach($sections as $section)
                                                        @if(isset($item->section_id))
                                                            <option value="{{ $section->id }}" @if($section->id == old('area',$item->section_id)) selected @endif>{{ $section->trans->title }}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    {{--<option value="">- {{ucfirst(trans('Tutorials::tutorials.section'))}} -</option>--}}
                                                @endif
                                            </select>
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
                                                        'field_name' => 'body',
                                                        'name' => trans('Pages::pages.description'),
                                                        'placeholder' => ''
                                                    ]
                                                ],
                                                2 =>[
                                                    'type' => 'input_text',
                                                    'properties' => [
                                                        'field_name' => 'seo_title',
                                                        'name' => trans('Pages::pages.page_seo_title'),
                                                        'placeholder' => ''
                                                    ]

                                                ],
                                                3 =>[
                                                    'type' => 'input_text',
                                                    'properties' => [
                                                        'field_name' => 'meta_keywords',
                                                        'name' => trans('Pages::pages.page_meta_keywords'),
                                                        'placeholder' => ''
                                                    ]

                                                ],
                                                4 => [
                                                    'type' => 'textarea',
                                                    'properties' => [
                                                        'field_name' => 'meta_description',
                                                        'name' => trans('Pages::pages.page_meta_description'),
                                                        'placeholder' => ''
                                                    ]
                                                ]
                                            ]
                                        ])
                                    </div>
                                    <div class="col-md-3 sidbare">
                                        <!-- Media main image -->
                                        <div class="form-group {{ $errors->has('main_image_id') ? 'has-error': '' }}" style="text-align: center;">
                                            <label style="display: block;">{{ trans('Users::users.avatar') }}</label>

                                            <a data-toggle="modal" data-target="#inno_media_modal" href="javascript:void(0)" media-data-button-name="{{ trans('Core::operations.select') }}ر{{ trans('Users::users.avatar') }}" media-data-field-name="main_image_id" media-data-required>
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
                                </div>
                            </div>

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
    <script src="{{ asset('public/media-dev.js')}}"></script>
    <!--end media -->
    <script src="{{ asset('public/website_assets/js/autocomplete/chosen.jquery.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#course_id").chosen();
            $("#section_id").chosen();
            // Load country areas
            $('#course_id').off().on("change", function() {
                loadCountryAreas(this.value);
            });
            var oldcountry = "{{ old('course_id') }}";
            if (oldcountry != '') {
                loadCountryAreas(oldcountry);
            }
        });
        function loadCountryAreas(id) {
            $("#section_id option").remove();
            $.get("{{url('/')}}/{{ Lang::getLocale() }}/admin/course-section/" + id, function(data) {
                $("#section_id").append($("<option></option>").attr("value", "").text("-- {{trans('Core::operations.select'). " ". ucfirst(trans('Tutorials::tutorials.section'))}} --"));
                for (var i = 0; i < data.sections.length; i++) {
                    $("#section_id").append($("<option></option>").attr("value", data.sections[i].id).text(data.sections[i].trans.title));
//                $("#area").chosen();
                    // Check if old data equal area
                    var oldArea = "{{ old('section_id') }}";
                    if (oldArea != '') {
                        $('#section_id').val(oldArea);
                    }
                }
                $("#section_id").trigger("chosen:updated");
                $("#section_id").chosen();
            });
        }
    </script>
    {{--<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>--}}
    <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
    <script type="text/javascript">
        //        CKEDITOR.replace('body_en');
        //        CKEDITOR.replace('body_ar');
        var editor1 = CKEDITOR.replace( 'body_en', {
//            fullPage: true,
            allowedContent: true,
            extraAllowedContent : 'div',
//            height: 250,
            // Define the toolbar groups as it is a more accessible solution.
            /*toolbarGroups: [
                {"name":"basicstyles","groups":["basicstyles"]},
                {"name":"links","groups":["links"]},
                {"name":"paragraph","groups":["list","blocks"]},
                {"name":"document","groups":["mode"]},
                {"name":"insert","groups":["insert"]},
                {"name":"styles","groups":["styles"]},
                {"name":"about","groups":["about"]}
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'*/
        } );
        editor1.on('instanceReady', function() {
            // Output self-closing tags the HTML4 way, like <br>.
            this.dataProcessor.writer.selfClosingEnd = '>';
            // Use line breaks for block elements, tables, and lists.
            var dtd = CKEDITOR.dtd;
            for ( var e in CKEDITOR.tools.extend( {}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent ) ) {
                this.dataProcessor.writer.setRules( e, {
                    indent: true,
                    breakBeforeOpen: true,
                    breakAfterOpen: true,
                    breakBeforeClose: true,
                    breakAfterClose: true
                });
            }
            // Start in source mode.
//            this.setMode('source');
        });

        $(document).ready(function () {
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
        });
    </script>
@endsection