@php
    $pageNameMode = trans('Messages::messages.reply');
    $breadcrumbs[] =  ['url' => '/'.Lang::getLocale().'/admin/messages', 'name' => trans('Messages::messages.messages')];
    $action = action('\Innoflame\Messages\Controllers\MessagesController@reply', $item->id);
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('Messages::messages.reply');
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Messages::messages.reply').' '.trans('Messages::messages.message')];
@endphp

@extends('website.master')
@section('page_title')
@endsection
@section('content')
    <div class="profile">
        <div class="container">

            {{--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidemenuprofile">--}}
            {{--                @include('website.profile.menu')--}}
            {{--</div>--}}
            @include('website.blocks.page-message')
            <div class="tab-content well profiledata col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div role="tabpanel" class="tab-pane fade in active" id="vtab1">
                    <a class="btn btn-raised btn-warning editbtn" href="javascript:history.go(-1);"><i class="fa fa-backward"></i> </a>
                    <h3>{{ trans('Core::operations.show') }}</h3>
                    <div class="clearfix"></div>
                    <br>

                    <form action="{{ $action }}" method="GET" role="form">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <tbody>
                                    @if(isset($user_id) && $user_id == $message[0]->receiver_id)
                                        <tr>
                                            <td><b>{{ "من" }}:</b></td>
                                            <td>{{ $message[0]->from_name }}</td>
                                        </tr>
                                        @if($message[0]->sender_phone_show == '1')
                                        <tr>
                                            <td><b>{{ "رقم الجوال"}}:</b></td>
                                            <td>{{ $message[0]->from_phone }}</td>
                                        </tr>
                                        @endif
                                        @if($message[0]->sender_email_show == '1')
                                        <tr>
                                            <td><b>{{ "البريد الالكتروني"  }}:</b></td>
                                            <td>{{ $message[0]->from_email }}</td>
                                        </tr>
                                        @endif
                                    @else
                                        <tr>
                                            <td><b>{{ "من" }}:</b></td>
                                            <td>{{ $message[0]->name }}</td>
                                        </tr>
                                        @if($message[0]->receiver_phone_show == '1')
                                        <tr>
                                            <td><b>{{ "رقم الجوال"}}:</b></td>
                                            <td>{{ $message[0]->phone }}</td>
                                        </tr>
                                        @endif
                                        @if($message[0]->receiver_email_show == '1')
                                        <tr>
                                            <td><b>{{ "البريد الالكتروني"  }}:</b></td>
                                            <td>{{ $message[0]->email }}</td>
                                        </tr>
                                        @endif
                                    @endif
                                    {{--@if($item->user_id > '0')--}}
                                    {{--<tr>--}}
                                    {{--<td><b>{{ trans('Messages::messages.from_user')}}:</b></td>--}}
                                    {{--<td>{{ $item->owner->name }}</td>--}}
                                    {{--</tr>--}}
                                    {{--@endif--}}
                                    <tr>
                                        <td><b>{{ "موضوع الرسالة" }}:</b></td>
                                        <td>{{ $item->subject }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>{{ "الرسالة"  }}:</b></td>
                                        <td>{{ $item->message}} </td>
                                    </tr>
                                    @if($item->itemReply)
                                        <tr>
                                            <td><b>{{ "رد"}}:</b></td>
                                            <td>{{ $item->itemReply->message}} </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            {{--@if($item->replied == false)--}}
                            {{--<button type="submit" class="btn btn-block btn-primary">{{ $submitButton }}</button>--}}
                            {{--@endif--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection