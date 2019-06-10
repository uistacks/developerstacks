@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/topics/', 'name' => trans('Uiquiz::quiz.topics')];
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/questions', 'name' => trans('Uiquiz::quiz.questions')];
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/questions-options', 'name' => trans('Uiquiz::quiz.questions-options')];
    $action = action('\UiStacks\Uiquiz\Controllers\QuestionsOptionsController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
    $pageNameMode = trans('Core::operations.edit');
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Uiquiz::quiz.question-option')];
    $action = action('\UiStacks\Uiquiz\Controllers\QuestionsOptionsController@update', $item->id);
    //$action = action('\UiStacks\Uiquiz\Controllers\QuestionsOptionsController@update');
    $method = 'PATCH';
    $backFieldLabel = trans('admin.back_after_update');
    $submitButton = trans('admin.update');
    }else{
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Uiquiz::quiz.question')];
    }
@endphp

@extends('admin.master')
@section('page_title')
    {{trans('Uiquiz::quiz.questions-options')}}
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
                        {{trans('Uiquiz::quiz.question-option')}}
                    </h3>
                </div>
                <div class="panel-body">
                    {{--<form class="form-horizontal" name="frm_questions-options_update" id="frm_questions-options_update" role="form"  method="post" >--}}
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
                                            if(isset($questions) && $questions->count()){
                                                foreach ($questions as $question) {
                                                    $questionName = '';
                                                    if($question->trans){
                                                        $questionName = $question->trans->question_text;
                                                    }
                                                    $options[] = ['value' => $question->id, 'name' => $questionName];
                                                }
                                            }
                                           //dd($questions);
                                        @endphp
                                        @include('Core::fields.select', [
                                            'field_name' => 'question_id',
                                            'name' => trans('Uiquiz::quiz.question'),
                                            'options' => $options
                                        ])
                                        <p class="help-block"></p>
                                        @if($errors->has('question_id'))
                                            <p class="help-block">
                                                {{ $errors->first('question_id') }}
                                            </p>
                                        @endif

                                        @include('Core::groups.languages', [
                                            'fields' => [
                                                0 => [
                                                        'type' => 'input_text',
                                                        'properties' => [
                                                            'field_name' => 'option',
                                                            'name' => 'Option*',
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
                                            'field_name' => 'correct',
                                            'name' => "Correct",
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->correct) && $item->trans->correct == 1) ? 1 : "0",
                                            'checked' => (isset($item->trans->correct) && $item->trans->correct == 1) ? "checked" : "",
                                        ])
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
    <script type="text/javascript">

        $(document).ready(function () {
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
        });
    </script>
@endsection