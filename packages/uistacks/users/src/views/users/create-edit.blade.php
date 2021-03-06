@php
    $pageTitle = 'Users';
    $itemTitle = 'User';

    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/users/', 'name' => $pageTitle];
    $action = action('\Uistacks\Users\Controllers\UsersController@store');
    $method = '';

    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');

    if(Request::is('*/edit')){
        $pageNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.$itemTitle];
        $action = action('\Uistacks\Users\Controllers\UsersController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.$itemTitle];
    }
@endphp

@extends('admin.master')
@section('title')
    {{ $pageTitle }}: {{ $pageNameMode }} {{ $itemTitle }}
@endsection
@section('header')
    <link rel="stylesheet" href="{{asset('media-dev.css')}}" />
@endsection
@section('content')
    <!-- Include Media model -->
    @include('Media::modals.modal')
    <!-- end include Media model -->

    <div class="card">
        <div class="card-body">
            <form id="frm_create_edit" action="{{ $action }}" method="POST" role="form">
                @if($method === 'PATCH')
                    <input type="hidden" name="_method" value="PATCH">
                @endif
                @csrf
                <input type="hidden" name="role" value="3"/>
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">{{ $pageNameMode }} {{ $itemTitle }}</legend>
                    <div class="row">
                        <div class="col-md-8">

                            @include('Core::fields.input_text', [
                                'field_name' => 'name',
                                'name' => trans('Core::operations.name'),
                                'placeholder' => ''
                            ])

                            @include('Core::fields.input_text', [
                                'field_name' => 'email',
                                'name' => trans('Core::operations.email'),
                                'placeholder' => ''
                            ])

                            @include('Core::fields.input_text', [
                                'field_name' => 'phone',
                                'name' => trans('Core::operations.mobile'),
                                'placeholder' => ""
                            ])

                            @include('Core::fields.input_text', [
                                'field_name' => 'address',
                                'name' => 'Address',
                                'placeholder' => ""
                            ])

                            @include('Core::fields.input_text', [
                                'field_name' => 'password',
                                'name' => trans('Core::operations.password'),
                                'placeholder' => '',
                                'type' => 'password'
                            ])

                            @include('Core::fields.input_text', [
                                'field_name' => 'password_confirmation',
                                'name' => trans('Core::operations.password_confirmation'),
                                'placeholder' => '',
                                'type' => 'password'
                            ])
                        </div>
                        <input type="hidden" name="iso2" id="phone_country_code" value="{{ old('iso2',isset($item) ? $item->iso2 : "in")}}"/>
                        <div class="col-md-4">
                            <!-- Media main image -->
                            <div class="form-group {{ $errors->has('main_image_id') ? 'has-error': '' }}" style="text-align: center;">
                                <label style="display: block;">{{ trans('Users::users.avatar') }}</label>

                                <a data-toggle="modal" data-target="#qurative_media_modal" href="javascript:void(0)" media-data-button-name="{{ trans('Core::operations.select') }} User Image" media-data-field-name="main_image_id" media-data-required>
                                    <div class="media-item">
                                        @if(isset($item->media) && isset($item->media->main_image) && isset($item->media->main_image->styles['thumbnail']))
                                            <img src="{{url('/')}}/{{ $item->media->main_image->styles['thumbnail'] }}" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                            <input type="hidden" name="main_image_id" value="{{$item->media->main_image->id}}">
                                        @else
                                            <img src="{{ asset('assets/images/user.png') }}" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                        @endif
                                    </div>
                                </a>
                            </div>
                            <!-- End Media main image -->

                            <hr/>

                            @php
                                $options = [];
                                $options[] = ['value' => '', 'name' => '-- '.trans('Core::operations.select').' --'];
                                if(isset($countries) && $countries->count()){
                                    foreach ($countries as $country) {
                                        $countryName = '';
                                            $countryName = ucwords(strtolower($country->name));
                                        $options[] = ['value' => $country->id, 'name' => $countryName];
                                    }
                                }
                            @endphp

                            @include('Core::fields.select', [
                                'field_name' => 'country',
                                'name' => 'Country',
                                'options' => $options
                            ])
                            <div class="form-group clearfix">
                                <label for="state" >State</label>
                                <select id="state" name="state" class="form-control @error('state') is-invalid @enderror">
                                    @if(isset($states) && $states->count())
                                        <option value="">- {{trans('Core::operations.select').' State' }} -</option>
                                        @foreach($states as $state)
                                            @if(isset($item->state_id))
                                                <option value="{{ $state->id }}" @if($state->id == old('state',$item->state_id)) selected @endif>{{ $state->name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">- State -</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group clearfix">
                                <label for="city" >City</label>
                                <select id="city" name="city" class="form-control @error('city') is-invalid @enderror">
                                    @if(isset($cities) && $cities->count())
                                        <option value="">- {{trans('Core::operations.select').' City'}} -</option>
                                        @foreach($cities as $city)
                                            @if(isset($item->city_id))
                                                <option value="{{ $city->id }}" @if($city->id == old('city',$item->city_id)) selected @endif>{{ $city->name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">- City -</option>
                                    @endif
                                </select>
                            </div>

                            {{--@include('Core::fields.checkbox', [--}}
                            {{--'field_name' => 'phone_show',--}}
                            {{--'name' => trans('Users::users.phone_show'),--}}
                            {{--'placeholder' => ''--}}
                            {{--])--}}

                            {{--@include('Core::fields.checkbox', [--}}
                            {{--'field_name' => 'email_show',--}}
                            {{--'name' => trans('Users::users.email_show'),--}}
                            {{--'placeholder' => ''--}}
                            {{--])--}}

                            <hr/>

                            @include('Core::fields.checkbox', [
                                'field_name' => 'active',
                                'name' => trans('admin.active'),
                                'placeholder' => ''
                            ])

                            @if(Request::is('*/edit'))
                                <input type="hidden" name="old_user_email" value="{{ $item->email }}">
                                <input type="hidden" name="old_user_phone" value="{{ $item->phone }}">
                                <input type="hidden" name="old_user_name" value="{{ $item->name }}">
                            @endif
                            <div class="checkbox">
                                <label><input name="back" type="checkbox" value="1" class="minimal-blue" @if(old('back') == 1) checked @endif> {{$backFieldLabel}}</label>
                            </div>

                            <button type="submit" id="btn_create" class="btn btn-outline-success btn-block"><i class="material-icons">save</i> {{ $submitButton }}</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

@endsection
@section('footer')
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}" type="text/javascript"></script>
    <!--Language -->
    @include('Core::language.scripts.scripts')
    <!--end Language -->
    <!--Media -->
    @include('Media::scripts.scripts')

    <script src="{{asset('media-dev.js')}}"></script>
    <!--end media -->
    <script src="{{ url('/') }}/assets/js/plugins/forms/validation/validate.min.js"></script>
    {{--<script src="{{ asset('assets/js/pages/add_user.js') }}" type="text/javascript"></script>--}}

    <link rel="stylesheet" href="{{ asset('assets/intl-telephone/css/intlTelInput.css') }}">
    <script src="{{ asset('assets/intl-telephone/js/intlTelInput.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        // Load country states
        $('#country').off().on("change", function () {
            loadCountryStates(this.value);
        });

        var oldcountry = "{{ old('country') }}";
        if(oldcountry != ''){
            loadCountryStates(oldcountry);
        }

        function loadCountryStates(countryId) {
            $("#state option").remove();
            $.get("{{url('/')}}/user-country-states/"+countryId, function( data ) {

//                alert(data);

                $("#state").append($("<option></option>").attr("value", "").text("- Select -"));
                for (var i = 0; i < data.states.length; i++) {
                    $("#state").append($("<option></option>").attr("value",data.states[i].id).text(data.states[i].trans.name));
                    // Check if old data equal state
                    var oldArea = "{{ old('state') }}";
                    if(oldArea != ''){
                        $('#state').val(oldArea);
                    }
                }
            });
        }

        // Load state cities
        $('#state').off().on("change", function () {
            loadStateCity(this.value);
        });
        var oldstate = "{{ old('state') }}";
        if(oldstate != ''){
            loadStateCity(oldstate);
        }
        function loadStateCity(stateId) {
            $("#city option").remove();
            $.get("{{url('/')}}/user-state-cities/"+stateId, function( data ) {
                $("#city").append($("<option></option>").attr("value", "").text("- Select -"));
                for (var i = 0; i < data.cities.length; i++) {
                    $("#city").append($("<option></option>").attr("value",data.cities[i].id).text(data.cities[i].trans.name));
                    // Check if old data equal state
                    var oldCity = "{{ old('city') }}";
                    if(oldCity != ''){
                        $('#city').val(oldCity);
                    }
                }
            });
        }
    </script>
    <?php
    $all_iso = [];
    if(count($countries)){
        foreach ($countries as $cntry => $country){
//            echo $country->trans['iso_code'];
            $all_iso[] = strtolower($country->iso2);
        }
        $isoCodes = json_encode($all_iso);
    }else{
        $isoCodes = '';
    }
    if(isset($item)){
        $cntry = strtolower($item->iso2);
    }else{
        $cntry = "";
    }
    ?>
    <script>
        var selectedFlag = '{{$cntry}}'
        $("#phone").intlTelInput({
//        preferredCountries: ['in','ae', 'us'],
            preferredCountries: ['in','us', 'au', 'ae'],
            autoPlaceholder: true,
            onlyCountries: {!! $isoCodes !!},
            initialCountry: selectedFlag,
            utilsScript: '{{ asset('public/website_assets/intl-telephone/js/utils.js') }}'
        });
        $("#phone").on("countrychange", function (e, countryData) {
            $("#phone_country_code").val(countryData.iso2);
        });
    </script>
    <script>
        function initAutocomplete() {
            new google.maps.places.Autocomplete(
                (document.getElementById('address_sample')),
                {types: ['geocode']}
            );
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfr3JNDG4YAYRdf0Ir-IBcpT4MnaZ3AQQ&libraries=places&callback=initAutocomplete"
            async defer></script>
@endsection
