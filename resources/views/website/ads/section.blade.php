@extends('website.master')
@section('page_title')

@endsection
@section('content')

<div class="sectionheader">
    <div class="container">
        <div class="col-md-12 titlealign">
            <h3>
         قسم السيارات
        </h3> </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 carsearch sectionsearch well">
            
            <form id="frm_cars_search" action="" method="get">
            <div class="title">  بحث السيارة  </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
           
            <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 borderleft ">
                <div class="editform">
                    
                  
                    <!--- Car Company ---->
                    <div class="form-group ">
                        <label for="select111" class="col-md-2 control-label ">الشركة</label>
                 <div class="col-md-12">
                    <select id="select111" class="form-control" name="car_company">
                          <option value="">-- حدد شركة السيارات--</option>
                            @if(count($car_company)>0)
                                @foreach($car_company as $com)
                                    <option value="{{$com->trans->company_id}}" @if(isset($_GET['car_company'])) @if($_GET['car_company'] == $com->trans->company_id) selected  @endif @endif >{{$com->trans->name}}</option>
                                @endforeach
                            @endif
                    </select>
                </div>
<!--                        <div class="clearfix"></div>-->
                    </div>
                   
                        <!--- Car Type ---->
                    <div class="form-group ">
                        <label for="select111" class="col-md-2 control-label ">النوع</label>
                        <div class="col-md-12">
                    <select id="select111" class="form-control" name="car_type">
                        <option value="">-- اختر صنف --</option>
                            @if(count($car_type)>0)
                                @foreach($car_type as $type)
                                    <option value="{{$type->trans->type_id}}" @if(isset($_GET['car_type'])) @if($_GET['car_type'] == $type->trans->type_id ) selected  @endif @endif >{{$type->trans->name}}  </option>
                                @endforeach
                            @endif
                    </select>
                </div>
<!--                        <div class="clearfix"></div>-->
                    </div>
                    
                    
                    <!--<div class="clearfix"></div>-->
                
            </div>
        </div>
        
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                 <div class="col-md-12">
                        <label for="select111" class=" control-label">الدولة</label>
                        <select class="selectpicker col-xs-12 drobdown-data" id="country" name="country[]" multiple>
                            
                          @if(count($country)>0)
                        @foreach($country as $cn)
                            <option value="{{$cn->trans->country_id}}" @if(isset($_GET['country'])) @if(in_array($cn->trans->country_id,$_GET['country'])) selected   @endif  @endif >{{$cn->trans->name}}</option>
                        @endforeach
                    @endif
                            
                        </select>
                    </div>
                
             
                    <div class="clearfix"></div>
                     <div class="col-md-12">
                        <label for="select111" class=" control-label">المنطقة</label>
                       <select class="selectpicker col-xs-12 drobdown-data" multiple id="area" name="area[]">

                    @if(isset($_GET['area']) && $_GET['area'][0]!="")
                    @foreach($arr_areas as $key=>$new_area)
                    <option value="{{ $new_area['id']}}"  selected> {{ $new_area['name']  }}</option>     
                    @endforeach
                    @else
                    <option value="">-- اختر المنطقة --</option>
                    @endif     
                    
                    

                </select>
                    </div>  
                    
                    
                    <div class="col-md-12">
                         <label for="select111" class=" control-label">الموديل</label>
                    <!--- Model -->
                        <select class="selectpicker col-xs-12 drobdown-data" id="model" name="car_model[]" multiple>
                            
                         @if(count($car_model)>0)
                            @foreach($car_model as $model)
                                <option value="{{$model->id}}" @if(isset($_GET['car_model'])) @if($_GET['car_model'] == $model->id ) selected  @endif @endif >{{$model->name}}</option>
                            @endforeach
                        @endif
                            
                        </select>
                    </div>
                    
                    
                    
                    
            </div> </div><button type="submit" class="btn btn-raised btn-danger">بحث</button>
       
        </form>
        </div>
       
    </div>
</div>

<div class="adslist">
    <div class="container">
        <table class="table" dir="rtl">
            <thead>
                <tr>
                    <th> الصوره</th>  <!-- IMage -->
                    <th> عنوان الاعلان</th> <!--- TITle -->
                    <th>الدولة / المنطقة</th>   <!---  Country / Region  -->
                    <th>تاريخ الاعلان</th>   <!-- Posted Date-->
                    <th> وقت الاعلان</th>  <!--- Time -->
                </tr>
            </thead>
            <tbody>
                
                @if(isset($ads) && count($ads) > 0) 
                @foreach($ads as $ad)  
                <tr>
                    <td>

                            @if(isset($ad->media) && isset($ad->media->main_image) && isset($ad->media->main_image->styles['thumbnail']))
                                  <a href="{{url('/')}}/{{Lang::getLocale()}}/section/{{$ad->section}}/{{$ad->id}}">      <img src="{{url('/')}}/{{ $ad->media->main_image->styles['thumbnail'] }}" style="max-width: 50%; border: 2px solid rgb(100, 100, 100);">
                                   </a>     
                                    @else
                                        <img src="{{ asset('public/images/select_main_img.png') }}" style="max-width: 50%; border: 2px solid rgb(100, 100, 100);">
                                    @endif          
                    </td>
                    <td>
                        <a href="{{url('/')}}/{{Lang::getLocale()}}/section/{{$ad->section}}/{{$ad->id}}">
                        
                         @if(isset($ad->trans->name))   
                            {{  stripslashes($ad->trans->name)   }}
                            @endif
                        </a> </td>
                    <td>
                        @if(isset($ad->getCountry->trans->name) && isset($ad->getArea->trans->name))
                        
                        {{  stripslashes($ad->getCountry->trans->name)   }}
                       /   {{  stripslashes($ad->getArea->trans->name)   }}
                       
                       @else
                       لم يذكر
                       
                        @endif
                    </td>
                    <td>    
                    @if(isset($ad->created_at))
                       
                      {{    date('Y-m-d',strtotime($ad->created_at))  }}    
                    
                    @endif
                    </td>
                    <td> 
                         @if(isset($ad->created_at))
                       
                      {{    date('H:i:s A',strtotime($ad->created_at))  }}    
                    
                    @endif       
                    </td>
                </tr>
                
               
                @endforeach
                 
               
                
                @else
              
                <tr>
                    <td colspan="5" class="teimage">
                        <!--<img src="{{ asset('public/images/404.jpeg') }}">-->
                        <img src ="{{url('/')}}/uploads/fournotfour.jpeg">
                    </td>
            </tr>
                @endif
            </tbody>
            
        </table>

        @if(isset($ads))
        {{ $ads->links() }}
        @endif
    </div>
</div>
@endsection