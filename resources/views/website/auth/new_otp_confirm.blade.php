@extends('website.master')
@section('page_title')
كلمة السر لمرة واحدة
@endsection
@section('content')
<div class="well login-box">
    <form action="{{ action('WebsiteController@newPhoneConfirmPost') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <legend>كلمة السر لمرة واحدة</legend>
        @include('website.blocks.page-message')
        <div class="form-group label-floating">
            <label for="phone_code" class="control-label"> كلمة السر لمرة واحدة</label>
            <input id="phone_code" name="phone_code" type="text" class="form-control"  value="{{ old('phone') }}"/>
        <input name="phone" value="{{$item->phone}}" type="hidden">
        </div>
       
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success btn-login-submit">التحقق</button>
        </div>
    </form>
</div>
@endsection
