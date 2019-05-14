@extends('website.master')
@section('content')
    @include('website.home.blocks.top-head')
    <input type="hidden" id="section_req_validation_msg" value="{{trans('Contactus::contactus.section_req_validation_msg')}}"/>
    <input type="hidden" id="store_name_req_validation_msg" value="{{trans('Contactus::contactus.store_name_req_validation_msg')}}"/>
    <input type="hidden" id="instagram_link_req_validation_msg" value="{{trans('Contactus::contactus.instagram_link_req_validation_msg')}}"/>
    <input type="hidden" id="instagram_link_valid_validation_msg" value="{{trans('Contactus::contactus.instagram_link_valid_validation_msg')}}"/>
    <input type="hidden" id="type_of_request_detail_req_validation_msg" value="{{trans('Contactus::contactus.type_of_request_detail_req_validation_msg')}}"/>
    <input type="hidden" id="contact_phone_req_validation_msg" value="{{trans('Contactus::contactus.contact_phone_req_validation_msg')}}"/>
    <input type="hidden" id="contact_phone_valid_validation_msg" value="{{trans('Contactus::contactus.contact_phone_valid_validation_msg')}}"/>
    <input type="hidden" id="contact_email_req_validation_msg" value="{{trans('Contactus::contactus.contact_email_req_validation_msg')}}"/>
    <input type="hidden" id="contact_email_valid_validation_msg" value="{{trans('Contactus::contactus.contact_email_valid_validation_msg')}}"/>
    <input type="hidden" id="contact_message_req_validation_msg" value="{{trans('Contactus::contactus.contact_message_req_validation_msg')}}"/>
    <div class="contact-blk">
        <div class="wrapper">
            <section id="contact">
                <div class="section-content">
                    <h1 class="section-header"> {{trans('Contactus::contactus.page_title')}}</h1>
                </div>
                <div class="contact-section">
                    <div class="container">
                        @include('website.blocks.page-message')
                        <form id="contact_form" method="post">
                            <div class="col-md-6 col-xs-12 col-sm-6 form-line">
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <div class="sin-inp relative">
                                            <label for="exampleInputUsername">{{trans('Contactus::contactus.order_type')}}</label>
                                            <div class="cust-select relative">
                                                <select class="form-control" name="section" id="section">
                                                    <option value=""> {{trans('Contactus::contactus.order_type')}}</option>
                                                    @if(isset($sections) && count($sections)>0)
                                                        @foreach($sections as $sec)
                                                            <option value="{{ $sec->id }}" @if(old('section') == $sec->id) selected="true" @endif  >
                                                                {{ $sec->trans->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <div class="sin-inp relative">
                                            <label for="exampleInputEmail">{{trans('Contactus::contactus.commercial_stores')}} </label>
                                            <input type="text" class="form-control" name="store_name" id="store_name" placeholder="{{trans('Contactus::contactus.commercial_stores')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <div class="sin-inp relative">
                                            <label for="Store URL">{{trans('Contactus::contactus.commercial_stores_instagram_link')}}</label>
                                            <input type="text" class="form-control" id="store_url" name="store_url" placeholder="{{trans('Contactus::contactus.commercial_stores_instagram_link')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <div class="sin-inp relative">
                                            <label for="description"> {{trans('Contactus::contactus.request_details')}}</label>
                                            <textarea class="form-control" id="other_info" name="other_info" placeholder="{{trans('Contactus::contactus.request_details')}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 col-sm-6">
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <div class="sin-inp relative">
                                            <label for="{{trans('Contactus::contactus.mobile')}}">{{trans('Contactus::contactus.mobile')}}</label>
                                            <input type="text" class="form-control" id="contact_phone" name="contact_phone" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <div class="sin-inp relative">
                                            <label for="{{trans('Contactus::contactus.email')}}">{{trans('Contactus::contactus.email')}} </label>
                                            <input type="text" class="form-control" id="contact_email" name="contact_email" placeholder="{{trans('Contactus::contactus.email')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <div class="sin-inp relative">
                                            <label for="{{trans('Contactus::contactus.message')}}"> {{trans('Contactus::contactus.message')}}</label>
                                            <textarea class="form-control" id="contact_message" name="contact_message" placeholder="{{trans('Contactus::contactus.message')}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xs-12">
                                        <div class="sin-btn btn-contact text-center">
                                            <button class="btn cust-btn animate submit" type="submit"><i class="fa fa-send"></i> {{trans('Contactus::contactus.send_btn')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('footer')
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
    ?>
    <script>
        $("#contact_phone").intlTelInput({
//             allowDropdown: false,
//             autoHideDialCode: false,
//             dropdownContainer: "body",
//             excludeCountries: ["us"],
//             formatOnDisplay: false,
//             geoIpLookup: function(callback) {
//               $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
//                 var countryCode = (resp && resp.country) ? resp.country : "";
//                 callback(countryCode);
//               });
//             },
//             initialCountry: "auto",
//             nationalMode: false,
//             onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
//             placeholderNumberType: "MOBILE",
//             preferredCountries: ['cn', 'jp'],
//             separateDialCode: true,
            preferredCountries: ['ae', 'in', 'us'],
            autoPlaceholder: true,
            onlyCountries: {!! $isoCodes !!},
            utilsScript: '{{ asset('public/website_assets/intl-telephone/js/utils.js') }}'
        });
    </script>
    <script src="{{ asset('public/website_assets/js/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/website_assets/js/customize/contact-us.js') }}" type="text/javascript"></script>
    {{--added for ckeditor start here--}}
    {{--<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>--}}
    <script>
        /*CKEDITOR.replace( 'contact_message',{
            toolbar: [
                ['Save','-','Source','Preview','-','Templates'],
                ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
                ['Undo','Redo','-','Find','Replace'],
                ['Link','Unlink','Anchor'],
                '/',
                ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
                ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
                ['Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
                '/',
                ['Styles','Format','Font','FontSize'],
                ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                ['Maximize'],
                '/',
                ['Hello','Hello2']
            ]
        });*/
    </script>
    {{--added for ckeditor end here--}}
@stop