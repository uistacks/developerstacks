@extends('website.master')
@section('page_title')
إستعادة كلمة المرور
@endsection
@section('content')
<div class="well login-box col-lg06">
    <legend>إستعادة كلمة المرور</legend>
    @include('website.blocks.page-message')
    <div class="forgetpass">
        <a id="mobile" href="#">
            <div class="resetviamobile col-xs-6 adsactive"><i class="fa fa-mobile  fa-5x" aria-hidden="true"><br>
            <h4>من خلال الجوال</h4></i>
        </div>
        </a>
        <a id="email" href="#">
            <div class="resetviamail col-xs-6"><i class="fa fa-envelope-o  fa-5x" aria-hidden="true"><br> <h4>من خلال البريد الالكترونى</h4></i> </div>
        </a>
        <div class="clearfix"></div>
    </div>
    <div class="mobile">
        <form action="{{ action('WebsiteController@forgotPasswordUserValidation') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group label-floating">
                <label class="control-label" for="focusedInput2">رقم الجوال</label>
                <input type="text" name="phone" class="form-control" id="focusedInput2" value="{{ old('phone') }}">
                     <p class="help-block">مثال: 9665XXXXXXXX ، 05XXXXXXXX، 5XXXXXXXX  يرجى التأكد من كتابة رقم الهاتف المحمول الصحيح حتى تتلقى رمز التنشيط.</p>
      
            </div>
            <br>
            <button type="submit" class="btn btn-success btn-login-submit">تأكيد</button>
        </form>
        {{-- <div class="codeinput">
            <div class="form-group label-floating">
                <label class="control-label" for="focusedInput2">الكود</label>
                <input class="form-control" id="focusedInput2" type="text">
                <p class="help-block">برجاء ادخال رقم الكود </p>
            </div>
            <input class="btn btn-success btn-login-submit" value="تفعيل" />
        </div> --}}
    </div>
    <div class="email">
        <form action="{{ action('WebsiteController@forgotPasswordUserValidation') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group label-floating">
                <label class="control-label" for="focusedInput2">البريد الالكترونى</label>
                <input type="mail" class="form-control" id="focusedInput2" name="email" value="{{ old('email') }}">
                <p class="help-block">يرجى إدخال البريد الإلكتروني </p>
            </div>
            <br>
            <button type="submit" class="btn btn-success btn-login-submit">تأكيد</button>
        </form>
    </div>
</div>
@endsection