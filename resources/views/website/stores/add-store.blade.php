@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/stores', 'name' => trans('Stores::stores.stores')];
    $action = action('StoreController@saveStore');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $pageNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Stores::stores.store')];
        $action = action('StoreController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Stores::stores.store')];
    }
@endphp
@extends('website.master')
@section('content')
    @include('website.home.blocks.top-head')
    {{--@include('website.regions.header')--}}

    <link rel="stylesheet" href="{{asset('public/media-dev.css')}}" />
    <!-- Include Media model -->
    @include('Media::modals.modal')

    <link rel="stylesheet" href="{{ asset('public/website_assets/css/jquery-ui/jquery-ui.min.css') }}" />
    <style type="text/css">
        #gmaps-canvas {
            height: 400px;

            border: 1px solid #999;
            -moz-box-shadow:    0px 0px 5px #ccc;
            -webkit-box-shadow: 0px 0px 5px #ccc;
            box-shadow:         0px 0px 5px #ccc;
        }

        #gmaps-error {
            color: #cc0000;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('public/website_assets/css/autocomplete/chosen.css') }}">
    <div class="content">
        <div class="wrapper">
            <div class="login">
                @include('website.blocks.page-message')
                <form action="{{ $action }}" method="POST" role="form" >
                    @if($method === 'PATCH')
                        <input type="hidden" name="_method" value="PATCH">
                    @endif
                    {{ csrf_field() }}
                    <div class="titleheader">{{ $pageNameMode }} {{ trans('Stores::stores.store') }}</div>
                    <!-- Language field -->
                    {{--                        @include('Core::fields.languages')--}}
                <!-- End Language field -->
                    @include('Core::groups.languages', [
                            'fields' => [
                                0 => [
                                    'type' => 'input-text-front',
                                    'properties' => [
                                        'field_name' => 'name',
                                        'name' => trans('Core::operations.name'),
                                        'placeholder' => trans('Core::operations.name')
                                    ],
                                    'input_icon' =>[
                                        'class' => 'fa fa-id-card-o'
                                    ]
                                ]
                            ]
                        ])

                    <div class="form-group clearfix {{ $errors->has('activity_id') ? 'has-error': '' }}">
                        <select id="activity_id" name="activity_id" class="form-control">
                            <option value="">- {{trans('Core::operations.select').' '.ucfirst(trans('Activities::activities.activity'))}} -</option>
                            @if(isset($activities) && $activities->count())
                                @foreach($activities as $activity)
                                    @if(isset($item->activity_id))
                                        <option value="{{ $activity->id }}" @if($activity->id == old('activity_id',$item->activity_id)) selected @endif>{{ $activity->trans->name }}</option>
                                    @else
                                        <option value="{{ $activity->id }}" @if($activity->id == old('activity_id')) selected @endif>{{ $activity->trans->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <?php
                    if(\Request::segment(1) == 'en'){
                        $otherLang = "ar";
                    }else{
                        $otherLang = "en";
                    }
                    ?>
                    <div class="form-group clearfix {{ $errors->has('country') ? 'has-error': '' }}">
                        <select id="country" name="country" class="form-control">
                            <option value="">- {{trans('Core::operations.select').' '.ucfirst(trans('Countries::countries.country'))}} -</option>
                            @if(isset($countries) && $countries->count())
                                @foreach($countries as $country)
                                    @if(isset($country->id))
                                        @php
                                            $otherCountry = \Innoflame\Countries\Models\CountryTrans::where(array('country_id'=>$country->id,'lang'=>$otherLang))->first();
                                        @endphp
                                    @endif
                                    @if(isset($item->trans->country))
                                        <option value="{{ $country->id }}" @if($country->id == old('country',$item->trans->country)) selected @endif>{{ ucwords(strtolower($country->trans->name))." ( ".$otherCountry->name ." ) ". "+".$country->trans->phone_code }}</option>
                                    @else
                                        <option value="{{ $country->id }}" @if($country->id == old('country')) selected @endif>{{ ucwords(strtolower($country->trans->name))." ( ".$otherCountry->name ." ) ". "+".$country->trans->phone_code }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group clearfix {{ $errors->has('area') ? 'has-error': '' }}">
                        <select id="area" name="area" class="form-control">
                            <option value="">- {{trans('Core::operations.select').' '.ucfirst(trans('Countries::countries.area'))}} -</option>
                            @if(isset($areas) && $areas->count())
                                @foreach($areas as $ar)
                                    @if(isset($item->trans->area))
                                        <option value="{{ $ar->id }}" @if($ar->id == old('area',$item->trans->area)) selected @endif>{{ $ar->trans->name }}</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="">- {{ucfirst(trans('Countries::countries.area'))}} -</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group row {{ $errors->has('location') ? 'has-error': '' }}">
                        <div class="col-xs-12">
                            <div class="sin-inp relative">
                                <input type="text" name="location" id="location" placeholder="{{trans('Stores::stores.location')}}" class="form-control" value="{{isset($item) ? old('location',$item->trans->location) : ""}}"/>
                                <i class="fa fa-map-marker"></i>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="store_lat" id="store_lat" value="{!! isset($item) ? $item->trans->store_lat : "" !!}"/>
                    <input type="hidden" name="store_lng" id="store_lng" value="{!! isset($item) ? $item->trans->store_lng : "" !!}"/>
                    <hr/>
                    <div id="gmaps-canvas"></div>
                    <hr/>
                    <div class="form-group cust-img-thumb {{ $errors->has('main_image_id') ? 'has-error': '' }}" >
                        <label style="display: block;">{{ trans('Stores::stores.store_main_img') }}</label>
                        <a data-toggle="modal" data-target="#qurative_media_modal" href="javascript:void(0)" media-data-button-name="{{ trans('Core::operations.select') }} {{ trans('Stores::stores.store_main_img') }}" media-data-field-name="main_image_id" media-data-required>
                            <div class="media-item">
                                @if(isset($item->trans->media) && isset($item->trans->media->main_image) && isset($item->trans->media->main_image->styles['thumbnail']))
                                    <img src="{{url('/')}}/{{ $item->trans->media->main_image->styles['thumbnail'] }}" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                    <input type="hidden" name="main_image_id" value="{{$item->trans->media->main_image->id}}">
                                @else
                                    <img src="{{ asset('public/images/select_main_img.png') }}" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                @endif
                            </div>
                        </a>
                    </div>

                    <!-- End Media main image -->

                    <div class="form-group {{ $errors->has('is_instagram') ? 'has-error': '' }}">
                        <div class="radio">
                            <label>
                                <input type="radio" name="is_instagram" id="is_instagram" value="1" {!! isset($item) && $item->trans->is_instagram=="1" ? "checked='checked'" : "" !!}>{{trans('Stores::stores.instagram_facebook_media')}}
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="is_instagram" id="is_other" value="0" {!! isset($item) && $item->trans->is_instagram=="0" ? "checked='checked'" : "" !!}>{{trans('Stores::stores.additional_media')}}
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="{{trans('Stores::stores.images')}}">{{trans('Stores::stores.images')}}</label>
                        @include('Media::fields.gallery-field')
                    </div>

                    <div class="form-group row {{ $errors->has('instagram_media') ? 'has-error': '' }}">
                        <div class="col-xs-12">
                            <div class="sin-inp relative">
                                <input type="text" name="instagram_media" id="instagram_media" placeholder="{{trans('Stores::stores.instagram')}}" class="form-control" value="{{isset($item) ? old('instagram_media',$item->trans->instagram_media) : ""}}"/>
                                <i class="fa fa-link"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('facebook_media') ? 'has-error': '' }}">
                        <div class="col-xs-12">
                            <div class="sin-inp relative">
                                <input type="text" name="facebook_media" id="facebook_media" placeholder="{{trans('Stores::stores.facebook')}}" class="form-control" value="{{isset($item) ? old('facebook_media',$item->trans->facebook_media) : ""}}"/>
                                <i class="fa fa-link"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('youtube_media') ? 'has-error': '' }}">
                        <div class="col-xs-12">
                            <div class="sin-inp relative">
                                <input type="text" name="youtube_media" id="youtube_media" placeholder="{{trans('Stores::stores.youtube')}}" class="form-control" value="{{isset($item) ? old('youtube_media',$item->trans->youtube_media) : ""}}"/>
                                <i class="fa fa-link"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('twitter_media') ? 'has-error': '' }}">
                        <div class="col-xs-12">
                            <div class="sin-inp relative">
                                <input type="text" name="twitter_media" id="twitter_media" placeholder="{{trans('Stores::stores.twitter')}}" class="form-control" value="{{isset($item) ? old('twitter_media',$item->trans->twitter_media) : ""}}"/>
                                <i class="fa fa-link"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('googleplus_media') ? 'has-error': '' }}">
                        <div class="col-xs-12">
                            <div class="sin-inp relative">
                                <input type="text" name="googleplus_media" id="googleplus_media" placeholder="{{trans('Stores::stores.googleplus')}}" class="form-control" value="{{isset($item) ? old('googleplus_media',$item->trans->googleplus_media) : ""}}"/>
                                <i class="fa fa-link"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('snapchat_media') ? 'has-error': '' }}">
                        <div class="col-xs-12">
                            <div class="sin-inp relative">
                                <input type="text" name="snapchat_media" id="snapchat_media" placeholder="{{trans('Stores::stores.snapchat')}}" class="form-control" value="{{isset($item) ? old('snapchat_media',$item->trans->snapchat_media) : ""}}"/>
                                <i class="fa fa-link"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('website_url') ? 'has-error': '' }}">
                        <div class="col-xs-12">
                            <div class="sin-inp relative">
                                <input type="text" name="website_url" id="website_url" placeholder="{{trans('Stores::stores.website')}}" class="form-control" value="{{isset($item) ? old('website_url',$item->trans->website_url) : ""}}"/>
                                <i class="fa fa-link"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('email') ? 'has-error': '' }}">
                        <div class="col-xs-12">
                            <div class="sin-inp relative">
                                <input type="text" name="email" id="email" placeholder="{{trans('Stores::stores.email')}}" class="form-control" value="{{isset($item) ? old('email',$item->trans->email) : ""}}"/>
                                <i class="fa fa-link"></i>
                            </div>
                        </div>
                    </div>
                    <input name="language[ar]" value="ar" type="hidden"/>
                    <input name="language[en]" value="en" type="hidden"/>
                    <button type="submit" class="btn btn-block btn-primary">
                        <i class="spinner"></i>
                        <span class="state">{{ $submitButton }}</span>
                    </button>
                </form>
            </div>
            <footer>
                {{--<a target="blank" href="http://boudra.me/">boudra.me</a>--}}
            </footer>
            {{--</p>--}}
        </div>
    </div>
@endsection
@section('footer')
    <!--Language -->
    @include('Core::language.scripts.scripts')
    <!--end Language -->
    <!--Media -->
    {{--@include('Media::scripts.scripts')--}}
    <!--end media -->
    <script src="{{asset('public/media-dev.js')}}"></script>
    <!-- google maps -->
    {{--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>--}}
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD0gUQegenKzw8UN5_wPpdYjItj_RTNpfE&language={{Lang::getLocale()}}"></script>
    <!-- jquery UI -->
    <script type="text/javascript" src="{{ asset('public/website_assets/js/jquery-ui.min.js') }}"></script>
    <!-- our javascript -->
    <script src="{{ asset('public/website_assets/js/customize/gmaps.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/website_assets/js/autocomplete/chosen.jquery.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            //add marker for edit page
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
            // Load country areas
            $("#country").chosen({
                search_contains: true
            });
            $("#area").chosen({
                search_contains: true
            });
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
                $("#area").trigger("chosen:updated");
                $("#area").chosen({
                    search_contains: true
                });
            });
        }
    </script>
    <script type="text/javascript">
        function deleteMyImages(id)
        {
            //            alert('hi');
            var galleryId = "#deleteImage_" + id;
            var buttonId = "#deleteImageB_" + id;
            if (confirm('{{ trans('Core::operations.delete_confirm') }}'))
            {
                $.ajax({
                    url: '{{ action('StoreController@deleteStoreGalleryImages') }}', //The url where the server req would we made.
                    type: "POST", //The type which you want to use: GET/POST
                    data: {
                        id: id,
                    }, //The variable{"label":"' . $arr_cities[$i]['city_name'] . '", "value":"' . $arr_cities[$i]['city_name'] . '","id":"' . $arr_cities[$i]['city_id'] . '"},'s which are going. //Return data type (what we expect).
                    //This is the function which will be called if ajax call is successful.
                    success: function(data) {
                        //data is the html of the page where the request is made.
                        if (data == 1)
                        {
                            $(galleryId).hide();
                            $(buttonId).hide();
                        }
                    }
                });
            }
        }
    </script>
@endsection