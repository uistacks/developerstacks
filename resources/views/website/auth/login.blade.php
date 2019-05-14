@extends('website.master')
@section('page_title')
    Sign in your account
@endsection
@section('content')
    <div class="inner-banner back-img relative" style="background-image:url({{ url('/') }}/public/website-assets/images/blog2.jpg)">
        {{--<div class="inner-cap">
            <div class="ttl-blog">
                About <span>Us</span>
            </div>
            <div class="sm-text-contact">
                I like the geometric visual, bold typo, easy grid and the well balan ced
                whitespace. Gallery PhotoCreative Corporate, CommunityCompany Profile,
                Agency and other.
            </div>
        </div>--}}
    </div>
    <section class="middle-sec inner-pages">
        <div class="main-faq-sec">
            <div class="container">
                <div class="inner-faq">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="sign-form">
                            <div class="sign-head ">
                                <h4>Sign in your account</h4>
                                <p>Don’t have an account? <a href="{{ action('Auth\RegisterController@register') }}">Click here</a> to register</p>
                            </div>
                            <div class="sign-body">
                                <form>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <div class="sin-inp relative">
                                                <input class="form-control" placeholder="Email" type="text">
                                                <div class="form-icons"><i class="fa fa-envelope"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <div class="sin-inp relative">
                                                <input class="form-control" placeholder="Password" type="password">
                                                <div class="form-icons"><i class="fa fa-lock"></i></div>
                                                <div class="forg-paswd text-right"><a href="javascript:void(0)">Forgot your password?</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <div class="sign-terms sign-head"><p>By logging in you agree to our <a href="{{ action('CmsController@showPage', ['terms-conditions']) }}" target="_blank">Terms &amp; Conditions.</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <div class="sin-btn text-center">
                                                <button class="btn btn-orange cust-btn animate text-uppercase" type="button">sign in</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection