@extends('website.master')
@section('page_title')

@endsection
@section('content')
    <style type="text/css">
        .view-user-img-blk img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            text-align: center;
        }
        .view-user-img-blk .media-item {
            left: 270px;
            padding: 17px;
            position: relative;
        }
    </style>
    @include('website.regions.header')
    <link rel="stylesheet" href="{{asset('public/media-dev.css')}}" />
    <!-- Include Media model -->
    @include('Media::modals.modal')
    <div class="db-main-blk">
        <div class="container">
            <div class="db-main-menu">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="{{ action('WebsiteController@dashboard') }}" >{{ trans('project.my_account') }}</a>
                    </li>
                    <li role="presentation">
                        <a href="{{ action('StoreController@index') }}" >{{ trans('project.my_stores') }}</a>
                    </li>
                    {{--<li role="presentation" class="active"><a href="#db-acc-set" aria-controls="home" role="tab" data-toggle="tab">My Account</a></li>--}}
                    {{--<li role="presentation"><a href="#db-mysho-set" aria-controls="profile" role="tab" data-toggle="tab">My Shops</a></li>--}}
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="db-acc-set">
                        <div class="prof-data comm-form">
                            <div class="comm-inner-head clearfix"> <span>{{ trans('project.account_setting') }}</span>
                                <a class="view-more pull-right" href="{{ action('WebsiteController@dashboard') }}" data-toggle="tooltip" title="{{ trans('project.back') }}"><i class="fa fa-long-arrow-left"></i>{{ trans('project.back') }}</a>
                            </div>
                            <form id="frm_change_password" method="post" action="{{ action('WebsiteController@updatePassword') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"/>
                                <div class="view-user-img-blk">
                                    <a data-toggle="modal" data-target="#qurative_media_modal" href="javascript:void(0)" media-data-button-name="{{ trans('Core::operations.select') }} {{ trans('Stores::stores.store_main_img') }}" media-data-field-name="main_image_id" media-data-required>
                                        <div class="media-item">
                                            @if(isset($item->media) && isset($item->media->main_image) && isset($item->media->main_image->styles['thumbnail']))
                                                <img src="{{url('/')}}/{{ $item->media->main_image->styles['thumbnail'] }}" >
                                                <input type="hidden" name="main_image_id" value="{{$item->media->main_image->id}}">
                                            @else
                                                <img src="{{ asset('public/images/select_main_img.png') }}" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                            @endif
                                        </div>
                                    </a>
                                </div>

                                <div class=" user-edit-form">
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
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <div class="sin-btn text-center">
                                                <button class="btn cust-btn animate text-uppercase" type="submit">{{ trans('admin.update') }}</button>
                                            </div>
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
@endsection
@section('footer')
    <script src="{{ asset('public/website_assets/js/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/website_assets/js/customize/user.js') }}" type="text/javascript"></script>
    <!--Language -->
    @include('Core::language.scripts.scripts')
    <!--Media -->
    @include('Media::scripts.scripts')
    <!--end media -->
    <script src="{{asset('public/media-dev.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Load country areas
            $('#country').off().on("change", function() {
                loadCountryAreas(this.value);
            });
            var oldcountry = "{{ old('country') }}";
            if (oldcountry != '') {
                loadCountryAreas(oldcountry);
            }
        });
        function loadCountryAreas(countryId) {
            $("#area option").remove();
            $.get("{{url('/')}}/{{ Lang::getLocale() }}/country-areas/" + countryId, function(data) {
                $("#area").append($("<option></option>").attr("value", "").text("-- {{trans('Core::operations.select'). " ". ucfirst(trans('Countries::countries.area'))}} --"));
                for (var i = 0; i < data.areas.length; i++) {
                    $("#area").append($("<option></option>").attr("value", data.areas[i].id).text(data.areas[i].trans.name));
                    // Check if old data equal area
                    var oldArea = "{{ old('area') }}";
                    if (oldArea != '') {
                        $('#area').val(oldArea);
                    }
                }
            });
        }
    </script>
    <link rel="stylesheet" href="{{ asset('public/website_assets/intl-telephone/css/intlTelInput.css') }}">
    <script src="{{ asset('public/website_assets/intl-telephone/js/intlTelInput.js') }}" type="text/javascript"></script>
    <?php
    $countries = \Innoflame\Countries\Models\Country::where(array('active'=> 1))->get();
    $all_iso = [];
    if(count($countries)){
        foreach ($countries as $cntry => $country){
//            echo $country->trans['iso_code'];
            $all_iso[] = strtolower($country->trans['iso_code']);
        }
        $isoCodes = json_encode($all_iso);
    }else{
        $isoCodes = [];
    }

    if(isset($item)){
        $cntry = strtolower($item->iso2);
    }else{
        $cntry = "";
    }
    ?>
    <script>
        var selectedFlag = '{{$cntry}}'
        $("#user_phone").intlTelInput({
//        preferredCountries: ['in','ae', 'us'],
            preferredCountries: ['in','ae', 'us'],
            autoPlaceholder: true,
            onlyCountries: {!! $isoCodes !!},
            initialCountry: selectedFlag,
            utilsScript: '{{ asset('public/website_assets/intl-telephone/js/utils.js') }}'
        });
        $("#user_phone").on("countrychange", function (e, countryData) {
            $("#phone_country_code").val(countryData.iso2);
        });
    </script>
@endsection