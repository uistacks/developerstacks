@php
    $breadcrumbs = [
                        ['url' => '', 'name' => trans('Contactus::contactus.contactus')]
    ];

    $dbTable = '';
@endphp

@extends('admin.master')
@section('page_title')
    {{ trans('Contactus::contactus.contactus') }}
@endsection
@section('header')
    <!-- datetimepicker-->
    <link href="{{ asset('public/admin_assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen" />
    <!-- End datetimepicker -->
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light  bac-cust-tab">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        {{--<span class="caption-subject font-blue-madison bold uppercase">{{trans('Contactus::contactus.request_view')}}</span>--}}
                    </div>
                    <div class="">
                        <ul class="nav nav-tabs">
                            <li class="@if(!($errors->has('email') || $errors->has('subject') || $errors->has('message'))) active @endif">
                                <a href="#tab_1_1" data-toggle="tab">{{trans('Contactus::contactus.request_details')}}</a>
                            </li>
                            <li class="@if(($errors->has('email') || $errors->has('subject') || $errors->has('message'))) active @endif">
                                <a href="#tab_1_3" data-toggle="tab">{{trans('Contactus::contactus.post_reply')}}</a>
                            </li>
                            <li class="">
                                <a href="#tab_1_2" data-toggle="tab">{{trans('Contactus::contactus.your_replies')}}</a>
                            </li>

                        </ul>
                    </div>
                </div>
                @if (session('profile-updated'))
                    <div class="alert alert-success">
                        {{ session('profile-updated') }}
                    </div>
                @endif
                @if (session('password-update-fail'))
                    <div class="alert alert-danger">
                        {{ session('password-update-fail') }}
                    </div>
                @endif
                <div class="portlet-body">
                    <div class="tab-content">
                        <!-- PERSONAL INFO TAB -->
                        <div class="tab-pane @if(!($errors->has('email') || $errors->has('subject') || $errors->has('message'))) active @endif" id="tab_1_1">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label class="control-label col-sm-4"><b>{{trans('Contactus::contactus.order_type')}}:</b></label>
                                    <div class="col-sm-5">
                                        <label class="control-label">
                                            @if(isset($request) && $request->section_id)
                                                <?php
                                                $sec = Uistacks\Contactus\Models\ContactusSectionTrans::where(array('section_id' => $request->section_id,'lang' => Lang::getlocale()))->first();
                                                if (isset($sec)) {
                                                    echo $sec->name;
                                                }
                                                ?>
                                            @endif
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-4"><b>{{trans('Contactus::contactus.commercial_stores')}}:</b></label>
                                    <div class="col-sm-5">
                                        <label class="control-label">@if(isset($request)){{$request->store_name}}@endif</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-4"><b>{{trans('Contactus::contactus.commercial_stores_instagram_link')}}:</b></label>
                                    <div class="col-sm-5">
                                        <label class="control-label">@if(isset($request)){{$request->store_url}}@endif</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-4"><b>{{trans('Contactus::contactus.email')}}:</b></label>
                                    <div class="col-sm-5">
                                        <label class="control-label">@if(isset($request)){{$request->contact_email}}@endif</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-4"><b>{{trans('Contactus::contactus.mobile')}}:</b></label>
                                    <div class="col-sm-5">
                                        <label class="control-label">@if(isset($request)){{$request->contact_phone}}@endif</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-4"><b>{{trans('Contactus::contactus.date')}}:</b></label>
                                    <div class="col-sm-5">
                                        <label class="control-label">@if(isset($request)){{$request->created_at->format('d M, Y')}}@endif</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-4"><b>{{trans('Contactus::contactus.message')}}:</b></label>
                                    <div class="col-sm-5">
                                        <label class="control-label">@if(isset($request)){!! $request->contact_message !!}@endif</label>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane @if(($errors->has('email') || $errors->has('subject') || $errors->has('message'))) active @endif" id="tab_1_3">
                            @if(isset($request))
                                <form role="form" class="form-horizontal" method="post" action="{{url('/')}}/{{Lang::getLocale() }}/admin/contactus/request-reply/{{$request->contact_id}}" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    <h4>{{trans('Contactus::contactus.fill_form')}}</h4>
                                    <div class="form-group @if ($errors->has('email')) has-error @endif">
                                        <label class="control-label col-sm-4"><b>{{trans('Contactus::contactus.email_from')}}:</b></label>
                                        <div class="col-sm-5">
                                            <input class="form-control" name="email" value="{{old('email',$contact_email)}}" readonly=""/>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group @if ($errors->has('message')) has-error @endif">
                                        <label class="control-label col-sm-4"><b>{{trans('Contactus::contactus.message')}}:</b></label>
                                        <div class="col-sm-5">
                                            <textarea class="form-control" id="reply_message" name="message">{{old('message')}}</textarea>
                                            @if ($errors->has('message'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('message') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group @if ($errors->has('message')) has-error @endif">
                                        <label class="control-label col-sm-4"></label>
                                        <div class="col-sm-5">
                                            <button type="submit" class="btn btn-md btn-primary">{{trans('Contactus::contactus.post_reply')}}</button>

                                        </div>
                                    </div>
                                </form>
                            @else
                                <div class="text-center alert alert-danger">
                                    {{ trans('Core::operations.no_records') }}
                                </div>
                            @endif
                        </div>
                        <!-- CHANGE PASSWORD TAB -->
                        <div class="tab-pane" id="tab_1_2">

                            <div class="chat-blok ">
                                @if(isset($request) && $request->is_reply== 1)
                                    <ul>
                                        @foreach($request->replies()->orderBy('created_at','desc')->get() as $key=>$reply)
                                            <li>
                                                <div class="cht-msg " >
                                                    {{--<div class="media-left">--}}
                                                        {{--<span class="c-text-name">Joy J</span>--}}
                                                    {{--</div>--}}
                                                    <div class="media-body">
                                                        <div class="c-text">{!! $reply->reply_message !!}</div>
                                                        <div class="chat-info">
                                                            <ul>
                                                                <li>
                                                                    <span><i class="fa fa-calendar"></i>{{$reply->created_at->format('d M, Y')}}</span>
                                                                </li>
                                                                <li>
                                                                    <span><i class="fa fa-envelope "></i>{{$reply->reply_email}}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            {{--<li>--}}
                                            {{--<div class="cht-msg " >--}}
                                            {{--<div class="media-left">--}}
                                            {{--<span class="c-text-name">Joy J</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="media-body">--}}
                                            {{--<div class="c-text"> sdadas sdadas sdadas sdadas </div>--}}
                                            {{--<div class="chat-info">--}}
                                            {{--<ul>--}}
                                            {{--<li>--}}
                                            {{--<span><i class="fa fa-calendar"></i> 28-11-1991</span>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                            {{--<span><i class="fa fa-envelope "></i>{{$reply->reply_email}}</span>--}}
                                            {{--</li>--}}
                                            {{--</ul>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            {{--</li>--}}
                                        @endforeach
                                    </ul>
                                @else
                                    <br/>
                                    <div class="text-center alert alert-danger">
                                        {{ trans('Core::operations.no_records') }}
                                    </div>
                                @endif
                            </div>
                            {{--<form role="form">--}}
                                {{--<div class="text-center">--}}
                                    {{--@if(isset($request) && $request->is_reply== 1)--}}
                                        {{--@foreach($request->replies()->orderBy('created_at','desc')->get() as $key=>$reply)--}}
                                            {{--<div class="form-group row">--}}
                                                {{--<div class="col-sm-9">--}}
                                                    {{--<label class="control-label">{{$reply->reply_email}} <i class="fa fa-calendar"></i> {{$reply->created_at->format('d M, Y')}}</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group row">--}}
                                                {{--<div class="col-sm-9">--}}
                                                    {{--<label class="">{{$reply->reply_subject}}</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group row">--}}
                                                {{--<div class="col-sm-8">{{trans('Contactus::contactus.reply')}}:--}}
                                                    {{--<label class="control-label">{!! $reply->reply_message !!}</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--@endforeach--}}
                                    {{--@else--}}
                                        {{--<br/>--}}
                                        {{--<div class="text-center alert alert-danger">--}}
                                            {{--{{ trans('Core::operations.no_records') }}--}}
                                        {{--</div>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <!--Language -->
    @include('Core::language.scripts.scripts')
    <!--end Language -->

    <!--datetime picker for time filter-->
    <script type="text/javascript" src="{{ asset('public/admin_assets/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
    <script src="{{ asset('public/admin_assets/js/pages/pickers.js') }}"></script>
    <!--end datetime picker for time filter-->
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('reply_message');
    </script>
@endsection