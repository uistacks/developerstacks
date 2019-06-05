@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/messages', 'name' => trans('Messages::messages.messages')];
    $action = action('\UiStacks\Messages\Controllers\MessagesController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $pageNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Messages::messages.ad')];
        $action = action('\UiStacks\Messages\Controllers\MessagesController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Messages::messages.ad')];
    }
@endphp

@extends('admin.master')
@section('page_title')
    {{ trans('Messages::messages.messages') }}: {{ $pageNameMode }} {{ trans('Messages::messages.ad') }}
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
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> {{ $pageNameMode }} {{ trans('Messages::messages.ad') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ $action }}" method="POST" role="form" >
                        @if($method === 'PATCH')
                            <input type="hidden" name="_method" value="PATCH">
                        @endif
                        {{ csrf_field() }}
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="control-label">Subject</label>
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                       value="{{ old('subject') }}">
                            </div>

                            <!-- Message Form Input -->
                            <div class="form-group">
                                <label class="control-label">Message</label>
                                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                            </div>

                            @if($users->count() > 0)
                                <div class="checkbox">
                                    @foreach($users as $user)
                                        <label title="{{ $user->name }}">
                                            <input type="checkbox" name="recipients[]" value="{{ $user->id }}">{!!$user->name!!}</label>
                                    @endforeach
                                </div>
                            @endif
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

    <!--end jquery-dependency-fields -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script type="text/javascript">
        //    CKEDITOR.replace('scripts');
    </script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>--}}
    <link rel="stylesheet" href="{{ asset('public/jquery-timepicker-addon-master/jquery-ui-timepicker-addon.css') }}">
    <script src="{{ asset('public/jquery-timepicker-addon-master/jquery-ui-timepicker-addon.js') }}"></script>
    <script src="{{ asset('public/jquery-timepicker-addon-master/jquery-ui-sliderAccess.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            /*$("#start_at").datepicker({
             changeMonth: true,
             changeYear: true,
             startDate: '-0d',
             dateFormat: "mm/dd/yy",
             minDate: '0',
             autoclose: true,
             onSelect: function(selected) {
             var minDate = new Date(Date.parse(selected));
             minDate.setDate(minDate.getDate() + 1);
             $("#end_at").datepicker("option", "minDate", minDate);
             //                $("#end_at").datepicker("option", "minDate", selected)
             }
             });
             $("#end_at").datepicker({
             changeMonth: true,
             changeYear: true,
             startDate: '0d',
             dateFormat: "mm/dd/yy",
             minDate: '1',
             autoclose: true,
             onSelect: function(selected) {
             $("#start_at").datepicker("option", "maxDate", selected)
             }
             });*/

            /*var startDateTextBox = $('#start_at');
             var endDateTextBox = $('#end_at');

             $.timepicker.datetimeRange(
             startDateTextBox,
             endDateTextBox,
             {
             minDate: '+1d',
             //time
             minInterval: (1000*60*60), // 1hr
             dateFormat: 'dd M yy',
             timeFormat: 'HH:mm:ss',
             start: {}, // start picker options
             end: {} // end picker options
             }
             );*/

            var startDateTextBox = $('#start_at');
            var endDateTextBox = $('#end_at');

            startDateTextBox.datetimepicker({
                minDate: '+0d',
                dateFormat: 'yy-mm-dd',
                timeFormat: 'HH:mm:ss',
//                minInterval: (1000*60*60), // 1hr
                onClose: function(dateText, inst) {
                    if (endDateTextBox.val() != '') {
                        var testStartDate = startDateTextBox.datetimepicker('getDate');
                        var testEndDate = endDateTextBox.datetimepicker('getDate');
                        if (testStartDate > testEndDate) {
                            endDateTextBox.datetimepicker('setDate', testStartDate);
//                            endDateTextBox.datetimepicker({
//                                minInterval: (1000 * 60 * 60), // 1hr
//                            });
                        }
                    }
                    else {
                        endDateTextBox.val(dateText);
                    }
                },
                onSelect: function (selectedDateTime){
                    endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
                }
            });
            endDateTextBox.datetimepicker({
                minDate: '+0d',
                dateFormat: 'yy-mm-dd',
                timeFormat: 'HH:mm:ss',
//                minInterval: (1000*60*60), // 1hr
                onClose: function(dateText, inst) {
                    if (startDateTextBox.val() != '') {
                        var testStartDate = startDateTextBox.datetimepicker('getDate');
                        var testEndDate = endDateTextBox.datetimepicker('getDate');
                        if (testStartDate > testEndDate)
                            startDateTextBox.datetimepicker('setDate', testEndDate);
                    }
                    else {
                        startDateTextBox.val(dateText);
                    }
                },
                onSelect: function (selectedDateTime){
                    startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
                }
            });

        });
    </script>
@endsection