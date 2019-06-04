@extends('website.master')
@section('page_title')
    Complete Your Freelancer Account
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('public/website_assets/chosen/chosen.css') }}" id="style-resource-8">
@endsection
@section('content')
    <div class="page-body login-page login-light">
        <div class="login-container">
            <div class="row">
                @include('website.blocks.page-message')
                <div class="col-sm-6 col-md-6 col-md-offset-3">
                    <div class="errors-container"> </div>
                    <form role="form" id="frm_complete_profile" class="login-form fade-in-effect" action="{{ action('UserController@submitCompleteProfile', Auth::user()->username) }}" method="post" autocomplete="off" novalidate>
                        <input type="hidden" name="requested_user" value="{{ $user->name }}" />
                        <div class="login-header">
                            <a href="{{ url('/') }}/" class="logo"> <img src="{{ url('/') }}/public/website_assets/img/logo.png" alt="Login" width="80" /> <span>Create Your Account</span> </a>
                            <p>Dear user, Complete Your Profile!</p>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="company_name">Company Name</label>
                            <input type="text" class="form-control" name="company_name" id="company_name" value="{{ old('company_name') }}"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="category"></label>
                            <select id="category" name="category" class="form-control chosen-select" data-placeholder="Choose a Category..." chosen="{width:'100%'}">
                                <option value="">- Select Category -</option>
                                @if(isset($categories) && $categories->count())
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == old('category')) selected @endif>{{ ucwords(strtolower($category->trans->name)) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="subcategory"></label>
                            <select id="subcategory" name="subcategory[]" multiple class="form-control">
                                {{--<option value="">- Select Subcategories -</option>--}}
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="skills"></label>
                            {{--<select id="skills" name="skills" multiple="multiple" class="chzn-select" >
                                <option value="">- Select Skills -</option>
                            </select>--}}
                            <select type="text" class="form-control" id="skills" name="skills[]" multiple ></select>
                            <small class="text-danger">Note: We are offering you @if(isset($membership)) {{ $membership->portfolio_slots }} @endif skills. Don't worry, you can increase it by upgrading your membership plan later.</small>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="country"></label>
                            <select id="country" name="country" class="form-control chosen-select" data-placeholder="Choose a Country..." chosen="{width:'100%'}">
                                <option value="">- Select Country -</option>
                                @if(isset($countries) && $countries->count())
                                    @foreach($countries as $country)
                                        @if(isset($item) && isset($item->trans->country))
                                            <option value="{{ $country->id }}" @if($country->id == old('country',isset($item) ? $item->trans->country : "")) selected @endif>{{ ucwords(strtolower($country->trans->name)) }}</option>
                                        @else
                                            <option value="{{ $country->id }}" @if($country->id == old('country')) selected @endif>{{ ucwords(strtolower($country->trans->name)) }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="state"></label>
                            <select id="state" name="state" class="form-control">
                                <option value="">- Select State -</option>
                                {{--@if(isset($states) && $states->count())
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}" @if($state->id == old('state')) selected @endif >{{ ucwords(strtolower($state->trans->name)) }}</option>
                                    @endforeach
                                @endif--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="city"></label>
                            <select id="city" name="city" class="form-control">
                                <option value="">- Select City -</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="zipcode">Zipcode</label>
                            <input type="text" class="form-control" name="zipcode" id="zipcode" value="{{ old('zipcode') }}"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="dob">Date of birth</label>
                            <input type="text" class="form-control" name="dob" id="dob" value="{{ old('dob') }}"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="about_me">Describe yourself</label>
                            <textarea class="form-control autogrow" name="about_me" id="about_me" rows="5">{{ old('about_me') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="hourly_rate">Hourly Rate</label>
                            <input type="text" class="form-control" name="hourly_rate" id="hourly_rate" value="{{ old('hourly_rate') }}"/>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block text-center"> <i class="fa-save"></i>Submit →</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @include('website.regions.footer')
@endsection
@section('footer')
    <script type="text/javascript" src="{{ asset('public/website_assets/chosen/chosen.jquery.js') }}" ></script>

    <script src="{{ asset('public/website_assets/js/jquery.validate.js') }}" type="text/javascript"></script>
    <script async defer src="{{ asset('public/website_assets/js/customize/user.js') }}" type="text/javascript" ></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#category").chosen();
//            $("#subcategory").chosen();
            $("#subcategory").chosen({
                allow_single_deselect: true
            });
            @if(isset($membership))
            $("#skills").chosen({
                allow_single_deselect: true,
                max_selected_options: '{{ $membership->portfolio_slots }}'
            });
            @endif
            $("#country").chosen();
            $("#state").chosen();
            $("#city").chosen();
            // Load country states
            $('#category').off().on("change", function() {
                loadCategorySubcategories(this.value);
            });
            var oldcategory = "{{ old('category') }}";
            if (oldcategory != '') {
                loadCategorySubcategories(oldcategory);
            }
            // Load country states
            $('#country').off().on("change", function() {
                loadCountryStates(this.value);
            });
            var oldcountry = "{{ old('country') }}";
            if (oldcountry != '') {
                loadCountryStates(oldcountry);
            }
            // Load state cities
            $('#state').on("change", function() {
                loadStateCities(this.value);
            });
            var oldstate = "{{ old('state') }}";
            if (oldstate != '') {
                loadStateCities(oldstate);
            }
        });

        function loadCategorySubcategories(categoryId) {
            $.ajax({
                {{--url: "{{url('/')}}/{{ Lang::getLocale() }}/get-category-subcategories/" + categoryId,--}}
                url: "{{url('/')}}/{{ \Request::Segment(1) }}/get-category-subcategories/" + categoryId,
                dataType: "json",
                beforeSend: function(){
                    $("#subcategory").empty();
                    $("#skills").empty();
                }
            }).done(function( data ) {
                $.each(data.subcategories, function (index, item) {
//                    console.log(item.name);
                    $('#subcategory').append('<option value="'+item.id+'">' + item.name + '</option>');
                });
                $("#subcategory").trigger("chosen:updated");
                $("#subcategory").trigger("liszt:updated");
                //skills
                $.each(data.skills, function (sk, sVal) {
                    $('#skills').append('<option value="'+sVal.id+'">' + sVal.name + '</option>');
                });
                $("#skills").trigger("chosen:updated");
                $("#skills").trigger("liszt:updated");
            });
        }

        //category
        function loadCountryStates(countryId) {
            $.ajax({
                {{--url: "{{url('/')}}/{{ Lang::getLocale() }}/get-country-states/" + countryId,--}}
                url: "{{url('/')}}/{{ \Request::Segment(1) }}/get-country-states/" + countryId,
                dataType: "json",
                beforeSend: function(){
                    $("#state").empty();
                }
            }).done(function( data ) {
                $.each(data.states, function (index, item) {
//                    console.log(item.name);
                    $('#state').append('<option value="'+item.id+'">' + item.name + '</option>');
                });
                $("#state").trigger("chosen:updated");
                $("#state").trigger("liszt:updated");
            });
        }

        function loadStateCities(stateId) {
            $.ajax({
                {{--url: "{{url('/')}}/{{ Lang::getLocale() }}/get-state-cities/" + stateId,--}}
                url: "{{url('/')}}/{{ \Request::Segment(1) }}/get-state-cities/" + stateId,
                dataType: "json",
                beforeSend: function(){
                    $("#city").empty();
                }
            }).done(function( data ) {
                $.each(data.cities, function (index, item) {
                    $('#city').append('<option value="'+item.id+'">' + item.name + '</option>');
                });
                $("#city").trigger("chosen:updated");
                $("#city").trigger("liszt:updated");
            });
        }
    </script>
@stop