@php
    if($confirmationType == 'confirm_account'){
        $pageTitle = 'تفعيل الحساب';
        $action = action('WebsiteController@postConfirmCode', $userId);
    }elseif($confirmationType == 'retrieve_password'){
        $pageTitle = 'إسترداد كلمة المرور';
        $action = action('WebsiteController@postConfirmCodeRetrievePassword', $userId);
    }
@endphp
@extends('website.master')
@section('page_title')
{{$pageTitle}}
@endsection
@section('content')
<div class="well login-box">
    <form action="{{ $action }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <legend>{{$pageTitle}}</legend>
        @include('website.blocks.message')
        <div class="form-group label-floating">
            <label class="control-label" for="code"> رمزالتحقق </label>
            <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}">
            <p class="help-block"> برجاء ادخال الكود</p>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success btn-login-submit">تأكيد</button>
        <br>
    </form>
</div>
@endsection
@section('footer')

@endsection