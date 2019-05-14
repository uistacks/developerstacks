@extends('website.master')
@section('page_title')
Sign Up
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
                            <h4>Create your account</h4>
                            <p>Already have an account?  <a href="{{ action('Auth\LoginController@login') }}">Click here</a> to login</p>
                        </div>
                        <div class="sign-body">
                            <form>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control" placeholder="First Name" type="text">
                                            <div class="form-icons"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control" placeholder="Last Name " type="text">
                                            <div class="form-icons"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control" placeholder="User  Name " type="text">
                                            <div class="form-icons"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="form-group row">
                                 <div class="col-sm-12">
                                  <div class="sin-inp relative">
                                   <input class="form-control" placeholder="Mobile" type="text">
                                   <div class="form-icons"><i class="fa fa-mobile"></i></div>
                                  </div>
                                 </div>
                                </div>-->
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
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control" placeholder="Confirm Password" type="password">
                                            <div class="form-icons"><i class="fa fa-lock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control" placeholder="Date Of Birth" type="password">
                                            <div class="form-icons"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="cust-select icon-sele relative">
                                            <select class="form-control">
                                                <option>Gender</option>
                                                <option>Male</option>
                                                <option>Fe-male</option></select>
                                            <div class="form-icons"><i class="fa fa-male"></i></div>
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
                                            <button class="btn btn-orange cust-btn animate text-uppercase" type="button">register</button>
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
@section('footer')

@endsection