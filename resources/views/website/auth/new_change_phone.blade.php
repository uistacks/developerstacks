@extends('website.master')
@section('page_title')
رقم الهاتف الجديد
@endsection
@section('content')
<div class="well login-box">
    <form action="{{ action('WebsiteController@newChangePhonePost') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <legend> رقم الهاتف الجديد</legend>
        @include('website.blocks.page-message')
        <div class="form-group label-floating">
            <label for="phone" class="control-label">رقم الهاتف الجديد</label>
            <input id="phone" name="phone" type="phone" class="form-control"  value="{{ old('phone') }}"/>
        
        <p class="help-block">مثال: 9665XXXXXXXX ، 05XXXXXXXX، 5XXXXXXXX  يرجى التأكد من كتابة رقم الهاتف المحمول الصحيح حتى تتلقى رمز التنشيط.</p>
        </div>
       
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success btn-login-submit">التحقق</button>
        </div>
    </form>
</div>
@endsection
