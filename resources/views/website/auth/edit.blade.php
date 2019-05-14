@extends('website.master')
@section('page_title')
        تعديل الملف الشخصي

@endsection
@section('content')
<div class="well login-box">
    <form action="{{ action('WebsiteController@postEdit') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <legend> تعديل الملف الشخصي</legend>
        @include('website.blocks.page-message')
        

        <div class="form-group">
            <label for="country" class="col-md-2 control-label"> الدولة</label>
            <div class="col-md-10">
                <select id="country" name="country" class="form-control">
                    <option value="">- اختر -</option>
                    @if(isset($countries) && $countries->count())
                        @foreach($countries as $country)
                             <option value="{{ $country->id }}" @if($country->id == old('country',$item->country_id)) selected @endif>{{ $country->trans->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
            <label for="area" class="col-md-2 control-label"> المنطقة</label>
            <div class="col-md-10">
                <select id="area" name="area" class="form-control">
                    
                    
                  @if(isset($areas) && $areas->count())
                        @foreach($areas as $ar)
                             <option value="{{ $ar->id }}" @if(Auth::user()->area_id == old('area',$ar->id)) selected @endif>{{ $ar->trans->name }}</option>
                        @endforeach
                    @endif
                
                
                </select>
            </div>
        </div>

        
         <div class="form-group">
            <label for="area" class="col-md-2 control-label"> البريد الالكترونى</label>
            <div class="col-md-10">
                <input id="email" name="email" value="{{ old('email',$item->email) }}" type="mail" class="form-control" />
            </div>
        </div>
        
       
       
        
        <div class="clearfix"></div>
        <div class="form-group">
		  <input type="file" id="avatar" name="avatar">
		  <div class="input-group">
		    <input type="text" readonly="" class="form-control" placeholder="اضافه صوره شخصية">
		      <span class="input-group-btn input-group-sm">
		        <button type="button" class="btn btn-fab btn-fab-mini">
		         <i class="fa fa-picture-o" aria-hidden="true"></i>

		        </button>
		      </span>
		  </div>
		</div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="phone_show" value="1" @if(old('phone_show',$item->phone_show) == 1) checked @endif> لا مانع من ظهور رقم هاتفي في الاعلان </label>
            <br>
            <label>
                <input type="checkbox" name="email_show" value="1" @if(old('email_show',$item->email_show) == 1) checked @endif> لامانع من ظهور البريد الالكتروني في الاعلان </label>
            <br>
           
        </div>
        <div class="form-group text-center">
            {{-- <input class="btn btn-success btn-login-submit" value="تسجيل" data-toggle="modal" data-target="#myModal" /> </div> --}}
            <button type="submit" class="btn btn-success btn-login-submit">تحديث</button>
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