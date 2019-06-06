@php
    $breadcrumbs[] =  ['url' => route('user-dashboard'), 'name' => 'Dashboard'];
    $breadcrumbs[] =  ['url' => '', 'name' => 'Edit Profile'];
@endphp
@extends('website.layouts.app-dash')
@section('page_title')
    Edit Profile
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('public/media-dev.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-material-datetimepicker.css') }}" />
@endsection
@section('content')
    <!-- Inner container -->
    <div class="d-md-flex align-items-md-start">
        <!-- Right content -->
        <div class="tab-content w-100 overflow-auto">
            <div class="tab-pane fade active show" id="profile">

                <!-- Profile info -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Edit Profile information</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" href="{{ route('user-dashboard') }}"><i class="icon-backward"></i> Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ action('UserController@updateProfile') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" />
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name">Full name</label>
                                        <div class="form-group-feedback form-group-feedback-right">
                                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') border-danger @enderror" />
                                            @error('name')
                                            <div class="form-control-feedback text-danger">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="form-text text-danger">{{ $errors->first('name') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone">Phone #</label>
                                        <div class="form-group-feedback form-group-feedback-right">
                                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control @error('phone') border-danger @enderror">
                                            @error('phone')
                                            <div class="form-control-feedback text-danger">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="form-text text-danger">{{ $errors->first('phone') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <div class="form-group-feedback form-group-feedback-right">
                                            <input type="text" name="email" readonly="readonly" value="{{ old('email', $user->email) }}" class="form-control @error('email') border-danger @enderror">
                                            @error('email')
                                            <div class="form-control-feedback text-danger">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="form-text text-danger">{{ $errors->first('email') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="username">Username</label>
                                        <div class="form-group-feedback form-group-feedback-right">
                                            <input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control @error('username') border-danger @enderror">
                                            @error('username')
                                            <div class="form-control-feedback text-danger">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="form-text text-danger">{{ $errors->first('username') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="birthdate">Dob</label>
                                        <div class="form-group-feedback form-group-feedback-right">
                                            <input type="text" name="birthdate" id="birthdate" value="{{ old('birthdate', $user->dob) }}" class="form-control @error('birthdate') border-danger @enderror">
                                            @error('birthdate')
                                            <div class="form-control-feedback text-danger">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="form-text text-danger">{{ $errors->first('birthdate') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gender">Gender</label>
                                        <div class="form-group-feedback form-group-feedback-right">
                                            {{--<input type="text" name="gender" value="{{ old('gender', $user->gender) }}" class="form-control @error('gender') border-danger @enderror">--}}
                                            <select name="gender" class="form-control form-control-lg">
                                                <option value="0">Select Gender</option>
                                                <option value="1" @if ($user->gender == '1')
                                                    {{'selected="selected"'}}
                                                        @endif >Male</option>
                                                <option value="2" @if ($user->gender == '2')
                                                    {{'selected="selected"'}}
                                                        @endif >FeMale</option>
                                            </select>
                                            @error('gender')
                                            <div class="form-control-feedback text-danger">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="form-text text-danger">{{ $errors->first('gender') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="address">Address line</label>
                                        <div class="form-group-feedback form-group-feedback-right">
                                            <input type="text" name="address" value="{{ old('address', $user->address) }}" class="form-control @error('address') border-danger @enderror">
                                            @error('address')
                                            <div class="form-control-feedback text-danger">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="form-text text-danger">{{ $errors->first('address') }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /profile info -->

            </div>

        </div>
        <!-- /right content -->

    </div>
    <!-- /inner container -->
@endsection
@section('footer')
    <!--Media -->
    @include('Media::scripts.scripts')
    <!--end media -->
    <script src="{{asset('public/media-dev.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#set-choosed-file').on('click', function () {
                if($("input[name*='main_image_id']").val() !== undefined){
//                   alert($("input[name*='main_image_id']").val());
                    $('#frm_change_picture').submit();
                }
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/moment-with-locales.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-material-datetimepicker.js') }}"></script>
    <script>
        $(document).ready(function()
        {
            $('#birthdate').bootstrapMaterialDatePicker({
                weekStart: 0,
                maxDate : new Date(new Date().getTime() - (60*24*60*60*1000)),
                time: false,
                format: 'YYYY-MM-DD',
                /*setMaxDate: function (date)
                {
                    this.params.maxDate = date;
                    this.initDates();
                },*/
            });
        });
    </script>
@stop