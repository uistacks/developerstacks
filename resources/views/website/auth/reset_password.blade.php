@extends('website.master')
@section('content')
    <div class="cms-pages faq-page">
        <div class="container">
            @include('website.home.blocks.top-head')
            <div class="login">
                <div class="main-blog-sec">

                    <div class="about-section">
                        <div class="	">
                            <div class="comm-head cms-head">{{ trans('project.reset_your_password') }}</div>
                            <form id="reset_password1" action="{{ action('WebsiteController@postResetPassword', [$userId]) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                {{--<legend>تحديث كلمة المرور</legend>--}}
                                @include('website.blocks.page-message')
                                <div class="form-group">
                                    <label for="password" class="control-label">{{ trans('project.password') }}</label>
                                    <input id="password" name="password" type="password" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation" class="control-label">{{ trans('project.confirm_password') }}</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" />
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-success btn-login-submit">{{ trans('project.submit') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')

@stop