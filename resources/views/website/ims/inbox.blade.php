@extends('website.master')
@section('page_title')
@endsection
@section('content')
    <div class="profile">
        <div class="container">
            @include('website.blocks.page-message')
            {{--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidemenuprofile">--}}
{{--                @include('website.profile.menu')--}}
            {{--</div>--}}
            <div class="tab-content well profiledata col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div role="tabpanel" class="tab-pane fade in active" id="vtab1">
                    <a class="btn btn-raised btn-warning editbtn" href="<?php  echo url('/')."/".Lang::getlocale()."/"."inbox";  ?>">صندوق الوارد</a>
                    <a class="btn btn-raised btn-warning editbtn" href="<?php  echo url('/')."/".Lang::getlocale()."/"."sent-box";  ?>">الرسائل المرسلة</a>
                    <h3>صندوق الوارد</h3>
                    <div class="clearfix"></div>
                    <br>

                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>{{ 'المستخدم' }}</th>
                            <th>{{ "موضوع الرسالة" }}</th>
                            <th>{{ "البريد الالكتروني" }}</th>
                            <th>{{ "حالة الرد" }}</th>
                            <th>{{ trans('Core::operations.operations') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_msgs as $item)
                            <tr data-title="{{ $item->subject }}">
                                <td>
                                    @if(isset($item->name))
                                        {{ $item->name }}
                                    @endif
                                </td>
                                <td>
                                    {{ $item->subject }}
                                </td>
                                @if($item->email_show == '1')
                                <td>
                                    {{ $item->email }}
                                </td>
                                @else
                                    <td>
                                    {{ '----' }}
                                    </td>
                                @endif
                                <td>
                                    @if($item->replied == true)
                                        {{ "تم الرد" }}
                                    @else
                                        {{ "لم يتم الرد" }}
                                    @endif
                                </td>
                                <td>
                                    @if($item->replied == false)
                                        <a href="{{ url('/')."/".Lang::getlocale()."/"."reply-msg/". $item->id }}"><i class="fa fa-reply"></i> {{ "رد " }}</a>
                                    @endif
                                    <a href="{{ url('/')."/".Lang::getlocale()."/"."delete-inbox-msg/". $item->id }}" onclick="return confirm('هل تريد حقا حذف هذا العنصر؟');" ><i class="fa fa-trash"></i> {{ trans('Core::operations.delete') }}</a>
                                    <a href="{{ url('/')."/".Lang::getlocale()."/"."view-msg/". $item->id }}" ><i class="fa fa-eye"></i> {{ trans('Core::operations.show') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection