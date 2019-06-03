@extends('website.master')
@section('title')
    Sign Up
@endsection
@section('content')
    <div class="section b-white pt-1">
        <div class="content container">
            <div class="section-title text-center mb-2">
                <h1 class="mb-2 font-weight-light">Create your account with <span class="font-weight-semibold">{{ config('app.name') }}</span></h1>
                {{--<div class="text-grey">If you want to submit bug report, track all changes in files, request a new feature, contribute to the project, get latest code and updates before official release or simply participate in discussions, fill in all inputs and request an access to private repository on Github. This service is not automated so kindly expect a minor delay.</div>--}}
            </div>

            <div class="d-flex justify-content-center align-items-center pt-1">
                <form class="w-100 w-sm-auto wmin-sm-400" method="post" action="{{ route('website.signup') }}" autocomplete="off">
                    @csrf
                    <div class="card mb-5">
                        <div class="card-body quform-elements">
                            <div class="text-center mb-3">
                                {{--<i class="icon-github icon-3x text-slate-800 pt-2 mb-3 mt-1"></i>--}}
                                <img src="{{ url('/') }}/assets/images/logo.png" class="text-slate-800" style="width: 100px;" />
                                <h5 class="mb-0">{{ config('app.name') }}</h5>
                                <span class="d-block text-muted">User Login</span>
                            </div>

                            <div class="form-group">
                                <label class="">
                                    Full Name
                                    <span class="text-danger ml-1">*</span>
                                </label>
                                <div class="">
                                    <div class="form-group-feedback form-group-feedback-right quform-input">
                                        <input type="text" class="form-control bg-light @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter your full name" value="{{ old('name') }}"/>
                                        <div class="form-control-feedback">
                                            <i class="icon-user text-muted"></i>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">
                                    Phone
                                    <span class="text-danger ml-1">*</span>
                                </label>
                                <div class="">
                                    <div class="form-group-feedback form-group-feedback-right quform-input">
                                        <input type="text" class="form-control bg-light @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Enter your phone number" value="{{ old('phone') }}"/>
                                        <div class="form-control-feedback">
                                            <i class="icon-mobile text-muted"></i>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">
                                    Your email
                                    <span class="text-danger ml-1">*</span>
                                </label>
                                <div class="">
                                    <div class="form-group-feedback form-group-feedback-right quform-input">
                                        <input type="text" class="form-control bg-light @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}"/>
                                        <div class="form-control-feedback">
                                            <i class="icon-mention text-muted"></i>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">
                                    Your Password
                                    <span class="text-danger ml-1">*</span>
                                </label>

                                <div class="">
                                    <div class="form-group-feedback form-group-feedback-right quform-input">
                                        <input type="password" class="form-control bg-light @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter password">
                                        <div class="form-control-feedback">
                                            <i class="icon-key text-muted"></i>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="">
                                    Confirm Password
                                    <span class="text-danger ml-1">*</span>
                                </label>

                                <div class="">
                                    <div class="form-group-feedback form-group-feedback-right quform-input">
                                        <input type="password" class="form-control bg-light @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Enter confirmation password">
                                        <div class="form-control-feedback">
                                            <i class="icon-key text-muted"></i>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-block bg-indigo text-uppercase">
                                    Submit
                                    <i class="icon-paperplane ml-2"></i>
                                </button>
                            </div>
                            <div class="form-group text-center text-muted content-divider">
                                <p class="px-2">Already have an account?  <a href="{{ action('Auth\LoginController@login') }}">Click here</a> to login</p>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer')

@endsection