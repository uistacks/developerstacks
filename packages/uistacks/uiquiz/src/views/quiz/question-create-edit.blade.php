@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/topics/', 'name' => trans('Uiquiz::quiz.topics')];
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/questions', 'name' => trans('Uiquiz::quiz.questions')];
    $action = action('\UiStacks\Uiquiz\Controllers\QuestionsController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
    $pageNameMode = trans('Core::operations.edit');
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Uiquiz::quiz.questions')];
    $action = action('\UiStacks\Uiquiz\Controllers\QuestionsController@update', $item->id);
    //$action = action('\UiStacks\Uiquiz\Controllers\QuestionsController@update');
    $method = 'PATCH';
    $backFieldLabel = trans('admin.back_after_update');
    $submitButton = trans('admin.update');
    }else{
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Uiquiz::quiz.question')];
    }
@endphp

@extends('admin.master')
@section('page_title')
    {{trans('Uiquiz::quiz.questions')}}
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('public/media-dev.css')}}" />
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
                        {{trans('Uiquiz::quiz.question')}}
                    </h3>
                </div>
                <div class="panel-body">
                    {{--<form class="form-horizontal" name="frm_questions_update" id="frm_questions_update" role="form"  method="post" >--}}
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
                                            if(isset($topics) && $topics->count()){
                                                foreach ($topics as $topic) {
                                                    $topicName = '';
                                                    if($topic->trans){
                                                        $topicName = ucwords(strtolower($topic->trans->title));
                                                    }
                                                    $options[] = ['value' => $topic->id, 'name' => $topicName];
                                                }
                                            }
                                           // dd($options);
                                        @endphp
                                        @include('Core::fields.select', [
                                            'field_name' => 'topic_id',
                                            'name' => trans('Uiquiz::quiz.topic'),
                                            'options' => $options,
                                            'required' => 'required',
                                        ])
                                        {{--<p class="help-block"></p>--}}
                                        {{--@if($errors->has('topic'))--}}
                                        {{--<p class="help-block">--}}
                                        {{--{{ $errors->first('topic') }}--}}
                                        {{--</p>--}}
                                        {{--@endif--}}

                                        @include('Core::groups.languages', [
                                            'fields' => [
                                                0 => [
                                                    'type' => 'textarea',
                                                    'properties' => [
                                                        'field_name' => 'question_text',
                                                        'name' => 'Question text*',
                                                        'placeholder' => ''
                                                    ]
                                                ]
                                            ]
                                        ])
                                        @if(!Request::is('*/edit'))
                                            @include('Core::groups.languages', [
                                                'fields' => [
                                                    0 => [
                                                        'type' => 'input_text',
                                                        'properties' => [
                                                            'field_name' => 'option1',
                                                            'name' => 'Option #1',
                                                            'placeholder' => ''
                                                        ]
                                                    ],
                                                    1 => [
                                                        'type' => 'input_text',
                                                        'properties' => [
                                                            'field_name' => 'option2',
                                                            'name' => 'Option #2',
                                                            'placeholder' => ''
                                                        ]
                                                    ],
                                                    2 => [
                                                        'type' => 'input_text',
                                                        'properties' => [
                                                            'field_name' => 'option3',
                                                            'name' => 'Option #3',
                                                            'placeholder' => ''
                                                        ]
                                                    ],
                                                    3 => [
                                                        'type' => 'input_text',
                                                        'properties' => [
                                                            'field_name' => 'option4',
                                                            'name' => 'Option #4',
                                                            'placeholder' => ''
                                                        ]
                                                    ],
                                                    4 => [
                                                        'type' => 'input_text',
                                                        'properties' => [
                                                            'field_name' => 'option5',
                                                            'name' => 'Option #5',
                                                            'placeholder' => ''
                                                        ]
                                                    ],

                                                ]
                                            ])
                                            <div class="form-group">
                                                {!! Form::label('correct', 'Correct', ['class' => 'control-label']) !!}
                                                {!! Form::select('correct', $correct_options, old('correct'), ['class' => 'form-control']) !!}
                                                <p class="help-block"></p>
                                                @if($errors->has('correct'))
                                                    <p class="help-block">
                                                        {{ $errors->first('correct') }}
                                                    </p>
                                                @endif
                                            </div>

                                        @endif

                                        @include('Core::groups.languages', [
                                            'fields' => [
                                                0 => [
                                                    'type' => 'textarea',
                                                    'properties' => [
                                                        'field_name' => 'code_snippet',
                                                        'name' => 'Code snippet',
                                                        'placeholder' => ''
                                                    ]
                                                ],
                                                1 => [
                                                    'type' => 'textarea',
                                                    'properties' => [
                                                        'field_name' => 'answer_explanation',
                                                        'name' => 'Answer explanation',
                                                        'placeholder' => ''
                                                    ]
                                                ],
                                                2 => [
                                                    'type' => 'input_text',
                                                    'properties' => [
                                                        'field_name' => 'more_info_link',
                                                        'name' => 'More info link',
                                                        'placeholder' => ''
                                                    ]
                                                ]

                                            ]
                                        ])


                                    </div>
                                    <div class="col-md-3 sidbare">
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
    <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
    <script type="text/javascript">
//        CKEDITOR.replace('code_snippet_en');
        $(document).ready(function () {
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
        });
    </script>
@endsection