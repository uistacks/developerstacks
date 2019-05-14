@extends('website.master')
@section('page_title')

@endsection
@section('content')
@include('website.blocks.page-message')
    <div class="well login-box ">
              
        <form method="post" action="<?php  echo url('/')."/".Lang::getlocale()."/"."create-msg/". $user_info->id;  ?>">
            <div class="row">
                <div class="clearfix"></div>
                <div class="col-md-12 titlealign  ">
                    <h3>إنشاء رسالتك</h3>
                </div>
                <div class="col-md-12 contact-us-form">
                    <div class="form-group">
                        <label for="email">إنشاء رسالتك</label>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i></span>
                            <input type="hidden" class="form-control" id="email" readonly="readonly" value="{{$user_info->email}}" />
                           <input type="text" class="form-control" readonly="readonly" value="{{$user_info->name}}" />
                            <input type="hidden" class="form-control" name="user_id" readonly="readonly" value="{{$user_info->id}}" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="mobile">العنوان </label>
                            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-open fa-2x" aria-hidden="true"></i>
						</span>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="أدخل الموضوع" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">رسالة</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="أدخل الرسالة"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary pull-right send-message" id="btnContactUs">ارسال الرساله</button>
                </div>
            </div>
        </form>
    </div>
@endsection