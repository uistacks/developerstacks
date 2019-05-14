@extends('website.master')
@section('page_title')
    إضافة إعلانات في قسم السيارات
@endsection
@section('content')
    <!-- Include Media model -->
    @include('Media::modals.modal')
    <!-- end include Media model -->
    <div class="well login-box">
        <a class="btn btn-raised btn-warning editbtn pull-left" href="javascript:history.go(-1);">
            <i class="fa fa-backward"></i>
        </a>
        <form action="{{ action('WebsiteController@addPostCarsValues') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <legend>إضافة إعلانات في قسم السيارات</legend>
            @include('website.blocks.page-message')

            <div class="form-group clearfix">
                <label for="name"> عنوان </label>
                <input id="title" name="title" value="{{ old('title') }}" type="text" class="form-control" />
            </div>

            <div class="form-group clearfix">
                <label for="country" class="col-md-2 control-label"> الدولة</label>
                <div class="col-md-10">
                    <select id="country" name="country" class="form-control">
                        <option value="">- اختر -</option>
                        @if(isset($countries) && $countries->count())
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}" @if($country->id == old('country')) selected @endif>{{ $country->trans->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group clearfix">
                <label for="area" class="col-md-2 control-label"> المنطقة</label>
                <div class="col-md-10">
                    <select id="area" name="area" class="form-control">
                        <option value="">- المنطقة -</option>
                    </select>
                </div>
            </div>


            <div class="form-group clearfix">
                <label for="country" class="col-md-2 control-label"> شركة السيارات</label>
                <div class="col-md-10">
                    <select id="company_id" name="company_id" class="form-control">
                        <option value="">- شركة السيارات -</option>
                        @if(isset($car_company) && $car_company->count())
                            @foreach($car_company as $company)
                                <option value="{{ $company->id }}" @if($company->id == old('company_id')) selected @endif>{{ $company->trans->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group clearfix">
                <label for="model" class="col-md-2 control-label">موديل السيارة </label>
                <div class="col-md-10">
                    <select id="model_id" name="model_id" class="form-control">
                        <option value="">- موديل السيارة  -</option>
                        @if(isset($car_model) && $car_model->count())
                            @foreach($car_model as $model)
                                <option value="{{ $model->id }}" @if($model->id == old('model_id')) selected @endif>{{ $model->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


            <div class="form-group clearfix">
                <label for="country" class="col-md-2 control-label">نوع السيارة</label>
                <div class="col-md-10">
                    <select id="type_id" name="type_id" class="form-control">
                        <option value="">- نوع السيارة -</option>
                        @if(isset($car_type) && $car_type->count())
                            @foreach($car_type as $type)
                                <option value="{{ $type->id }}" @if($type->id == old('type_id')) selected @endif>{{ $type->trans->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="form-group">
                <label for="area" class="col-md-2 control-label"> وصف</label>
                <div class="col-md-10 add-post-hei">
                    <textarea id="description" name="description" class="form-control">{{    old('description')  }}</textarea>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="form-group">
                <label for="area" class="col-md-2 control-label"> معلومات الاتصال</label>
                <div class="col-md-10 add-post-hei">
                    <textarea id="contact_info" name="contact_info" class="form-control">{{    old('contact_info')  }}</textarea>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="form-group">
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

            {{--<div class="form-group">--}}
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
            @include('Media::fields.gallery-field')

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="will_pay" value="1" @if(old('will_pay') == 1) checked @endif >  اتعهد أن أقوم بدفع عمولة الموقع بعد وضع الإعلان  </label>
                <br>
            </div>

            <div class="form-group text-center">
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
        $('#country').off().on("change", function () {
            loadCountryAreas(this.value);
        });

        var oldcountry = "{{ old('country') }}";
        if(oldcountry != ''){
            loadCountryAreas(oldcountry);
        }

        function loadCountryAreas(countryId) {
            $("#area option").remove();
            $.get("{{url('/')}}/{{ Lang::getLocale() }}/country-areas/"+countryId, function( data ) {

//                alert(data.attr);

                $("#area").append($("<option></option>").attr("value", "").text("- اختر -"));
                for (var i = 0; i < data.areas.length; i++) {
                    $("#area").append($("<option></option>").attr("value",data.areas[i].id).text(data.areas[i].trans.name));
                    // Check if old data equal area
                    var oldArea = "{{ old('area') }}";
                    if(oldArea != ''){
                        $('#area').val(oldArea);
                    }
                }
            });
        }
    </script>
@endsection