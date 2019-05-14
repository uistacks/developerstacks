@extends('website.master')
@section('page_title')
    إضافة إعلانات في قسم السيارات
@endsection
@section('content')
    <!-- Include Media model -->
    @include('Media::modals.modal')
    <!-- end include Media model -->
    <div class="well login-box">
        <form class="frm-edit-post" action="{{ action('WebsiteController@editPostValues') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <legend>إضافة إعلانات في قسم السيارات</legend>
            @include('website.blocks.message')
            <div class="form-group clearfix">
                <label for="name"> عنوان </label>
                <input id="title" name="title" value="{{ old('title',$ads->trans->name) }}" type="text" class="form-control" />

                <input type="hidden" name="ad_id" value="{{ $ads->id  }}">
            </div>

            <div class="form-group clearfix">
                <label for="country" class="col-md-2 control-label"> الدولة</label>
                <div class="col-md-10">
                    <select id="country" name="country" class="form-control">
                        <option value="">- اختر -</option>
                        @if(isset($countries) && $countries->count())
                            @foreach($countries as $country)

                                @if(isset($ads->getCountry->trans->country_id))
                                    <option value="{{ $country->id }}" @if($country->id == old('country',$ads->getCountry->trans->country_id)) selected @endif>{{ $country->trans->name }}</option>
                                @else
                                    <option value="{{ $country->id }}" @if($country->id == old('country')) selected @endif>{{ $country->trans->name }}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group clearfix">
                <label for="area" class="col-md-2 control-label"> المنطقة</label>
                <div class="col-md-10">
                    <select id="area" name="area" class="form-control">
                        @if(isset($areas) && $areas->count())
                            @foreach($areas as $ar)

                                @if(isset($my_areas->id))
                                    <option value="{{ $ar->id }}" @if($my_areas->id == old('area',$ar->id)) selected @endif>{{ $ar->trans->name }}</option>
                                @else
                                    <option value="{{ $ar->id }}" @if(old('area',$ar->id)) selected @endif>{{ $ar->trans->name }}</option>
                                @endif

                            @endforeach
                        @else
                            <option value="">- المنطقة -</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group clearfix">
                <label for="section_id" class="col-md-2 control-label">الجزء</label>
                <!-- Section -->
                <div class="col-md-10">
                    <select id="section_id" class="form-control" name="section_id">
                        <option value="">-- حدد القسم--</option>
                        @if(count($sections)>0 && isset($sections))
                            @foreach($sections as $sec)
                                <option value="{{$sec->trans->section_id}}" @if($my_sections->id == old('section_id',$sec->trans->section_id)) selected @endif >{{$sec->trans->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="form-group clearfix">
                <label for="area" class="col-md-2 control-label"> وصف</label>
                <div class="col-md-10 text-repeat">
                <textarea id="description" name="description" class="form-control" rows="5">
                @if(isset($ads->trans->description)){{ trim($ads->trans->description)  }}@endif</textarea>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="form-group clearfix">
                <label for="area" class="col-md-2 control-label"> معلومات الاتصال</label>
                <div class="col-md-10 text-repeat">
                <textarea id="contact_info" name="contact_info" class="form-control" rows="5"> 
@if(isset($ads->trans->contact_information)){{ trim($ads->trans->contact_information) }}@endif</textarea>
                </div>
            </div>

            <div class="main-im clearfix">
                @if(isset($ads->media) && isset($ads->media->main_image) && isset($ads->media->main_image->styles['thumbnail']))
                    <div class="my-ad-main">
                        <a href="{{url('/')}}/{{Lang::getLocale()}}/section/{{$ads->section}}/{{$ads->id}}">      <img src="{{url('/')}}/{{ $ads->media->main_image->styles['thumbnail'] }}" width="100%">
                        </a>
                    </div>
                @else
                    <img src="{{ asset('public/images/select_main_img.png') }}" width="100%">
                @endif
            </div>

            <div class="clearfix"></div>
            <div class="form-group clearfix">
                <input type="file" id="main_image_id" name="main_image_id">
                <div class="input-group">
                    <input type="text" readonly="" class="form-control" placeholder="الصورة الرئيسية">
                    <span class="input-group-btn input-group-sm">
                    <button type="button" class="btn btn-fab btn-fab-mini">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                    </button>
                </span>
                </div>
            </div>

            <?php
/*
            ?>
            <div class="form-group clearfix">
                <div class="row">
                    <?php
                    if (isset($gallery_images) && count($gallery_images) > 0) {

                    foreach ($gallery_images as $images) {
                    ?>
                    <div class="col-md-3">
                        <div class="sli-image-outer">
                            <a href="javascript:void(0)"><img   id="deleteImage_<?php echo $images['media_id']; ?>"       src="<?php echo url('/'); ?>/{{  $images['file']  }}"  class="sli-imageiner" alt="slide"></a>
                            <div class="sli-delete"  id="deleteImageB_<?php echo $images['media_id']; ?>"  onclick="deleteMyImages('<?php echo $images['media_id']; ?>')">
                                <i class="fa fa-times" aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    }
                    ?>
                </div>
            </div>
            <?php
*/
            ?>
            @include('Media::fields.gallery-field')

            {{--<div class="form-group clearfix">--}}
                {{--<input type="file" id="galley_images" name="galley_images[]" multiple>--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" readonly="" class="form-control" placeholder="صورة معرض">--}}
                    {{--<span class="input-group-btn input-group-sm">--}}
                    {{--<button type="button" class="btn btn-fab btn-fab-mini">--}}
                        {{--<i class="fa fa-picture-o" aria-hidden="true"></i>--}}
                    {{--</button>--}}
                {{--</span>--}}
                {{--</div>--}}
            {{--</div>--}}






            <div class="form-group text-center clearfix">
                {{-- <input class="btn btn-success btn-login-submit" value="تسجيل" data-toggle="modal" data-target="#myModal" /> </div> --}}
                <button type="submit" class="btn btn-success btn-login-submit">حفظ</button>
                <br>
        </form>
    </div>

    {{-- <div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-body">
            <p>تم ارسال الكود بنجاح</p>
            <h4>برجاء ادخال الكود</h4>
            <div class="form-group label-floating">
                <label class="control-label" for="focusedInput2">code</label>
                <input class="form-control" id="focusedInput2" type="text">
                <p class="help-block"> برجاء ادخال الكود</p>
            </div>
            <input class="btn btn-success btn-login-submit" value="submit" data-dismiss="modal" data-toggle="modal" data-target="#myModal2" />
        </div>
    </div>
</div>
</div>

<div id="myModal2" class="modal fade" role="dialog">
<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="text-align:center;">
        <div class="modal-body"> <img src="/public/website_assets/images/1.jpg" />
            <h2>تم التسجيل بنجاح</h2>
            <input class="btn btn-success btn-login-submit" value="اغلاق" data-toggle="modal" data-target="#myModal2" />
        </div>
    </div>
</div>
</div> --}}

    <!--Language -->
    @include('Core::language.scripts.scripts')
    <!--end Language -->
    <!--Media -->
    @include('Media::scripts.scripts')
    <!--end media -->

@endsection
@section('footer')
    <script type="text/javascript">
        // Load country areas
        $('#country').off().on("change", function() {
            loadCountryAreas(this.value);
        });

        var oldcountry = "{{ old('country') }}";
        if (oldcountry != '') {
            loadCountryAreas(oldcountry);
        }

        function loadCountryAreas(countryId) {
            $("#area option").remove();
            $.get("{{url('/')}}/{{ Lang::getLocale() }}/country-areas/" + countryId, function(data) {

                //                alert(data.attr);

                $("#area").append($("<option></option>").attr("value", "").text("- اختر -"));
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
    <script>
        function deleteMyImages(id)
        {
            //            alert('hi');
            var galleryId = "#deleteImage_" + id;
            var buttonId = "#deleteImageB_" + id;


            if (confirm('هل أنت متأكد أنك تريد حذف'))
            {
                $.ajax({
                    url: javascript_site_path + "ar/delete-gallery-images", //The url where the server req would we made.
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