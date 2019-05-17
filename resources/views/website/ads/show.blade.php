@extends('website.master')
@section('page_title')

@endsection
@section('content')
<div class="caradspage">
    <div class="container">
        @include('website.blocks.message')
        <ol class="breadcrumb">
            <li><a href="{{  url('/') }}">الرئيسية</a></li>
            <li>
                @if(isset($ads->section))
                @if($ads->section == 1)
                <a href="{{url('/')}}/{{Lang::getLocale()}}/section/{{ $ads->section }}">القسم</a>
                @else
                <a href="{{url('/')}}/{{Lang::getLocale()}}/section-others/{{ $ads->section }}">القسم</a>
                @endif
                @endif
            </li>


            <li class="active"><a href="#">   @if(isset($ads->trans->name)) {{ $ads->trans->name }}   @endif    </a></li>
            <div class="clearfix"></div>
        </ol>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 adsimg">

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>

                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <?php
                        if (isset($gallery_images) && count($gallery_images) > 0) {
                            $i = 0;
                            foreach ($gallery_images as $images) {
                                if ($i == 0) {
                                    ?>
                                    <div class="item active">
                                        <a href="#">
                                            <a href="#"><img src="<?php echo url('/'); ?>/{{  $images['file']  }}" width="544" height="600" class="imgfit" alt="slide"></a>
                                        </a>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="item">
                                        <a href="#">
                                            <a href="#"><img src="<?php echo url('/'); ?>/{{  $images['file']  }}" width="544" height="600" class="imgfit" alt="slide"></a>
                                        </a>
                                    </div>
                                    <?php
                                }
                                $i++;
                            }
                        } else {
                            ?>

                            <div class="item active">
                                <a href="#">
                                    <a href="#"><img src="<?php echo url('/'); ?>/uploads/fournotfour.jpeg" width="544" height="600" class="imgfit" alt="slide"></a>
                                </a>
                            </div>


                        <?php }
                        ?>

                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="icon-prev" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="icon-next" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                </div>
                <!-- End Slider-->
                <div class="adsdetails well col-lg-12">
                    <div class="details col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ads-details-data ">
                            <h3 class="product-title">

                                @if(isset($ads->trans->name))
                                {{  $ads->trans->name  }}
                                @endif
                            </h3>
                            <div class="action add-fav">
                                @if(isset(auth()->user()->id))
                                @if(!isset($my_favourite))
                                <a href="{{ url('/')}}/ar/favourite-toogle/{{ $ads->section}}/{{  $ads->id }}"   class="btn btn-raised btn-warning"><span class="fa fa-heart"></span>اضف الى المفضلة</a>
                                @else
                                <a href="{{ url('/')}}/ar/favourite-toogle/{{ $ads->section}}/{{  $ads->id }}"   class="btn btn-raised btn-warning"><span class="fa fa-heart"></span>إزالة من المفضلة</a>
                                @endif
                                @endif

                            </div>

                            <table dir="rtl" class="table table-sm">
                                <tbody>
                                    <tr>
                                        <td class="title-color">تاريخ الاضافه</td>
                                        <td>     @if(isset($ads->created_at))

                                            {{    date('Y-m-d',strtotime($ads->created_at))  }}

                                            @endif   </td>
                                    </tr>
                                    <tr>
                                        <td class="title-color">وقت الاضافه</td>
                                        <td>   @if(isset($ads->created_at))

                                            {{    date('H:i:s A',strtotime($ads->created_at))  }}

                                            @endif         </td>
                                    </tr>

                                    @if($ads->section == 1)
                                    <!--- Car Company --->
                                    <tr>
                                        <td class="title-color">الشركه</td>
                                        <td>
                                            @if(isset($car_company->trans->name))

                                            {{    $car_company->trans->name  }}
                                            @else
                                            لم يذكر
                                            @endif   </td>
                                    </tr>


                                    </td>
                                    </tr>
                                    <!--- Car Type --->
                                    <tr>
                                        <td class="title-color">النوع</td>
                                        <td>
                                            @if(isset($car_type->trans->name))

                                            {{    $car_type->trans->name  }}
                                            @else
                                            adsdetails                 لم يذكر
                                            @endif

                                        </td>
                                    </tr>
                                    <!--- Car Model --->
                                    <tr>
                                        <td class="title-color">الموديل</td>
                                        <td>
                                            @if(isset($car_model->name))

                                            {{    $car_model->name  }}
                                            @else
                                            لم يذكر
                                            @endif


                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="title-color">الدولة</td>
                                        <td>
                                            @if(isset($ads->getCountry))

                                            {{    $ads->getCountry->trans->name  }}
                                            @else
                                            لم يذكر
                                            @endif


                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="title-color">المنطقة</td>
                                        <td>
                                            @if(isset($ads->getArea))

                                            {{    $ads->getArea->trans->name  }}
                                            @else
                                            لم يذكر
                                            @endif


                                        </td>
                                    </tr>


                                    <tr>
                                        <td class="title-color"> وسيله التواصل</td>
                                        <td>
                                            @if(($ads->author->email_show)==1)

                                            البريد الإلكتروني

                                            @endif
                                            /

                                            @if(($ads->author->phone_show)==1)

                                            هاتف


                                            @endif


                                        </td>
                                    </tr>
                                    <tr>
                                        <td > <span class="title-color"> عدد المشاهدات : </span>
                                            @if(isset($ads->view) && count($ads->view)>0)
                                            {{   ($ads->view)    }}
                                            @else
                                            0
                                            @endif

                                            مشاهده</td>
                                        <td><span class="title-color"> عدد التعليقات : </span>
                                            @if(isset($comment_count) && count($comment_count)>0)
                                            {{   count($comment_count)    }}
                                            @else
                                            0
                                            @endif تعليق

                                        </td>
                                    </tr>
                                    <tr>

                                    </tr>
                                    <tr>
                                        <td colspan="2" class="title-color">
                                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                                <a class="a2a_button_facebook"></a>
                                                <a class="a2a_button_twitter"></a>
                                                <a class="a2a_button_whatsapp"></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>

                                        @if(isset(auth()->user()->id))
                                        <td colspan="2"  class="title-color report-ads"> <a href="javascript:void(0)" class="btn btn-raised btn-danger" onclick="showModal()">ابلاغ عن محتوى</a> </td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                            <h5><b> تفاصيل الاعلان</b></h5>
                            <div class="text-cut">
                                <p>
                                    @if(isset($ads->trans->description))

                                    {{    $ads->trans->description  }}

                                    @endif


                                </p>
                            </div>

                            <h5><b>معلومات الاتصال</b></h5>
                            <div class="text-cut">
                                <p>
                                    @if(isset($ads->trans->contact_information))

                                    {{    $ads->trans->contact_information  }}

                                    @endif


                                </p>
                            </div>
                        </div>
                        <div class="rating">
                            <div class="adimages">
                                <h3 class="product-title"><i class="fa fa-picture-o" aria-hidden="true"></i>
                                    صور الاعلان</h3>
                                <hr>
                                <div class="crs-multiple clearfix">
                                    {{--<div class="owl-carousel owl-theme">--}}

                                    <?php
                                    /* if (isset($gallery_images) && count($gallery_images) > 0) {
                                      $i = 0;
                                      foreach ($gallery_images as $images) {
                                      ?>

                                      <div class="media-item">
                                      <div class=" sli-image-outer">
                                      <a href="{{ url('/') }}/{{  $images['file']  }}"  data-lightbox="roadtrip"><img class="" src="{{ url('/') }}/{{  $images['file']  }}" alt="slide" ></a>
                                      <div class="sli-zoom">
                                      <i class="fa fa-search-plus" aria-hidden="true"></i>
                                      </div>
                                      </div>
                                      </div>

                                      <?php
                                      }
                                      } */
                                    ?>

                                    {{--</div>--}}
                                    <?php
                                    if (isset($gallery_images) && count($gallery_images) > 0) {
                                        $i = 0;
                                        ?>
                                        <div class="demo-gallery">
                                            <ul id="lightgallery" class="list-unstyled row" >
                                                <?php
                                                foreach ($gallery_images as $images) {
                                                    ?>
                                                    <li class="media-item" data-responsive="{{ url('/') }}/{{  $images['file']  }} 375" data-src="{{ url('/') }}/{{  $images['file']  }}">
                                                        <a href="">
                                                            <img class="img-responsive" src="{{ url('/') }}/{{  $images['file']  }}"/>
                                                        </a>
                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!--                </div>
                        </div>
                    </div>
            -->

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class=" contactads whitecolor">
                    <div class="ads-details-data ">
                        <div class="ad-right-profile">
                            <h3 class="product-title">


                                تفاصيل الملعن


                                <div class="right-logo clearfix">
                                    @if(isset($ads->author->media) && isset($ads->author->media->main_image) && isset($ads->author->media->main_image->styles['thumbnail']))
                                    <img src="{{url('/')}}/{{ $ads->author->media->main_image->styles['thumbnail'] }}" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                    <input type="hidden" name="main_image_id" value="{{$ads->author->media->main_image->id}}">
                                    @else
                                    <img src="<?php echo url('/'); ?>/public/website_assets/images/1.jpg" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);" >
                                    @endif
                                </div>
                            </h3>
                        </div>

                        <table dir="rtl" class="table table-sm">
                            <tbody>
                                <tr>
                                    <td class="title-color"> اسم العضو</td>
                                    <td>
                                        <a href="{{url('/')}}/{{ Lang::getLocale() }}/profile/{{  $ads->author->id   }}">
                                            {{    $ads->author->name }}
                                            <a href="#">
                                            </a></td>
                                </tr>
                                <tr>
                                    <td class="title-color"> رقم الهاتف </td>
                                    <td>
                                        @if(($ads->author->phone_show)==1)

                                        {{   $ads->author->phone    }}

                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td class="title-color">البريد الالكترونى </td>
                                    <td>
                                        @if(($ads->author->email_show)==1)

                                        {{   $ads->author->email    }}

                                        @endif



                                    </td>
                                </tr>
                                <tr>
                                    <td class="title-color">وسيله الاتصال </td>
                                    <td>

                                        @if(($ads->author->email_show)==1)

                                        البريد الإلكتروني

                                        @endif
                                        /

                                        @if(($ads->author->phone_show)==1)

                                        هاتف


                                        @endif




                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><a class="btn btn-success green" href="{{url('/')}}/{{Lang::getLocale()}}/send-msg/{{$ads->author->id}}">الرسائل الخاصة</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12">


                        @if(isset($ads->media) && isset($ads->media->main_image) && isset($ads->media->main_image->styles['thumbnail']))
                        <a href="{{url('/')}}/{{Lang::getLocale()}}/section/{{$ads->section}}/{{$ads->id}}">      <img src="{{url('/')}}/{{ $ads->media->main_image->styles['thumbnail'] }}" width="100%">
                        </a>
                        @else
                        <img src="{{ asset('public/images/select_main_img.png') }}" width="100%">
                        @endif





                    </div>

                </div>

            </div>

            <div class="clearfix"></div>

        </div>


        <div class="col-md-12" id="comment_details">

            <div class="widget-area no-padding blank">
                <h3 class="comment-title"><i class="fa fa-commenting-o" aria-hidden="true"></i>
                    تعليق الزوار</h3>
                <hr>
                @if(isset($user_details) && count($user_details)>0)

                <?php
                if (count($comments) > 0)
                    $last_val = "";
                ?>
                <div id='append_comments_user'>
                    @foreach($user_details as $key=>$user)
                    <article class="row">

                        <div class="col-md-2 col-sm-2 hidden-xs picpro">
                            @if(isset($user_details[$key]['name']) && $user_details[$key]['name']!='')
                            <img src="{{url('/')}}/{{$user_details[$key]['name']}}" style="max-width: 100%;">
                            @else
                            <img src="<?php echo url('/'); ?>/public/website_assets/images/1.jpg" style="max-width: 100%;">
                            @endif
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">

                                <div class="panel-body delete-up">
                                    <div class="comment-post">
                                        <p>
                                            <a href="{{url('/')}}/{{ Lang::getLocale() }}/profile/{{  $user_details[$key]['u_id']   }}">
                                                {{  $user_details[$key]['user_id'] }}
                                            </a>
                                        </p>
                                    </div>

                                    <header class="text-left">
                                        <time class="comment-date" datetime="16-12-2014 01:05">{{date($user_details[$key]['created_at'])}}<i class="fa fa-clock-o"></i> </time>
                                    </header>
                                    <div class="comment-post">
                                        <input type='hidden' id='pass_user_comment_{{ $user_details[$key]["id"]}}' value="{{ $user_details[$key]["comment"]}}">
                                        <p>
                                            {{$user_details[$key]['comment']}}
                                        </p>



                                    </div>
                                    @if(isset(auth()->user()->id))
                                    @if($user_details[$key]['u_id'] == auth()->user()->id)
                                    <a href="javascript:void(0);" class="edit-icon  fav-icon-active "> <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"  onclick="showEditModal('{{  $user_details[$key]["comment"]  }}','{{ $user_details[$key]["id"]  }}')"></i></a>   

                                    <a href="{{url('/')}}/{{Lang::getLocale()}}/my-delete-comment/{{$user_details[$key]["id"]}}" class=" delete-icon fav-icon-active " onclick="return confirm('هل أنت متأكد أنك تريد حذف؟')"> 


                                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>   
                                    @endif    
                                    @endif

                                    <a href="#" onclick="showModalComment(<?php echo $user_details[$key]['id'] ?>)" >الابلاغ عن تعليق</a> </div>
                            </div>
                        </div>
                        <?php
                        if (count($comments) > 0) {
                            if (isset($user_details[$key]['id']))
                                $last_val = $user_details[$key]['id'];
                        }
                        ?>
                    </article>
                    @endforeach


                    @else
                    <div class="comment-post">
                        <p>
                            لم تتم إضافة تعليقات
                        </p>
                    </div>
                    @endif

                </div>
                <form method="post">
                    <input type="hidden" name="ad_id" id="ad_id"value="{{$ads->id}}">
                    <input type="hidden" name="last_val" id="last_val"value="<?php if (isset($last_val)) echo $last_val; ?>">


                    <?php
                    if (isset($comment_count) && count($comment_count) > 5) {
                        ?>
                        <button type="button" class="btn btn-success green" id="view_more_button" onclick="getMoreComments('<?php echo $ads->id ?>')"><i class="fa fa-commenting"></i>عرض المزيد</button>
                    <?php } ?>

                </form>

                <div class="status-upload">
                    <form  name='add_comment' method="post" id="add_comment" action="{{url('/')}}/{{Lang::getLocale()}}/section/comment">
                        <input type="hidden" name="section_id" id="section_id"value="{{$ads->section}}">
                        <input type="hidden" name="ad_id" id="ad_id"value="{{$ads->id}}">
                        <textarea placeholder="التعليق " name="comment" id="comment"> </textarea>
                        <button type="submit" class="btn btn-success green"><i class="fa fa-commenting"></i>اضف تعليق</button>
                    </form>
                </div>
                <!-- Status Upload  -->
            </div>
            <!-- Widget Area -->
        </div>

    </div>
</div>

<!--- Model --->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form method="post">
            <div class="modal-content otherpro">
                <div class="modal-header addmodhe">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4>   أبلغ عن   </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control"  placeholder=" " name="report" id="report_content"></textarea>
                        <input type="hidden" name="report_id" value="" id="report_id">
                        <input type="hidden" name="content_type" value="" id="content_type" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <ul>
                        <li>
                            <button type="button" class="btn btn-carsrace" onclick="validateReport()">إرسال الإبلاغ</button>
                        </li>
                        <li>
                            <button type="reset" class="btn btn-carsrace " data-dismiss="modal">إلغاء</button>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="myEditModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form method="post">
            <div class="modal-content otherpro">
                <div class="modal-header addmodhe">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4> تعديل التعليق</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control"  placeholder=" " id="user_comment" id="report_content"></textarea>
                        <input type="hidden" name="comment_id" value="" id="comment_id">                  
                    </div>
                </div>
                <div class="modal-footer">
                    <ul>
                        <li>
                            <button type="button" class="btn btn-carsrace" onclick="saveComment()">   حفظ </button>
                        </li>
                        <li>
                            <button type="reset" class="btn btn-carsrace " data-dismiss="modal">   إلغاء  </button>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
<script>
function getMoreComments(ad_id) {
            var last_value = $("#last_val").val();
                    if (ad_id != '') {
            $.ajax({
            url: javascript_site_path + "ar/show-more-comments", //The url where the server req would we made.
                    type: "POST", //The type which you want to use: GET/POST
                    dataType: "json",
                    data: {
                    ad_id: ad_id,
                            last_id: last_value,
                    },
                    success: function(data) {
                    if (data.append_comments == "0")
                    {
                    $("#view_more_button").hide();
                    }
                    else if (data != "")
                    {
                    $("#append_comments_user").append(data.append_comments);
                            $("#last_val").val(data.last_val);
                    }
                    }
            });
            }

            }
</script>
<script>
    function showModal()
    {
    $("#myModal").modal("show");
            $("#report_id").val("<?php echo $ads->id; ?>");
            $("#content_type").val("1");
    }
</script>
<script>
    function showModalComment(comment_id)
    {
    $("#myModal").modal("show");
            $("#report_id").val(comment_id);
            $("#content_type").val("2");
    }
</script>
<script>
    function validateReport()
    {
    var report = $("#report_content").val();
            var report_type = $("#content_type").val();
            var report_id = $("#report_id").val();
            var section = "<?php echo $ads->section; ?>";
//        alert("report is " + report + "Report Type is" + report_type + "Report ID is " + report_id + "Section" + section);

            if (report != "")
    {
    $.ajax({
    url: javascript_site_path + "ar/report-front", //The url where the server req would we made.
            type: "POST", //The type which you want to use: GET/POST
            dataType: "json",
            data: {
            report: report,
                    report_type: report_type,
                    report_id: report_id,
                    section: section,
            }, //The variable{"label":"' . $arr_cities[$i]['city_name'] . '", "value":"' . $arr_cities[$i]['city_name'] . '","id":"' . $arr_cities[$i]['city_id'] . '"},'s which are going. //Return data type (what we expect).
            //This is the function which will be called if ajax call is successful.
            success: function(data) {

            //data is the html of the page where the request is made.
            if (data.error == 0)
            {
//                            alert(data);
            alert("تم الإبلاغ بنجاح");
                    $("#report_content").val("");
                    $("#myModal").modal("hide");
            }
            else if (data.error == 1)
            {
            alert("الرجاء تسجيل الدخول للمتابعة");
                    $("#report_content").val("");
                    $("#myModal").modal("hide");
            }
            }
    });
    } else {
    alert("يرجى إدخال شيء");
    }

    }
</script>   
<script>
    function showEditModal(comment, comment_id)
    {
            $("#comment_id").val(comment_id);
            $("#myEditModal").modal("show");
            $("#user_comment").val(comment);
    }
</script>
<script>
    function saveComment()
    {
    var comment = $("#user_comment").val();
            var comment_id = $("#comment_id").val();
            if (comment != "" && comment_id != "")
    {
    $.ajax({
    url: javascript_site_path + "ar/update-comment", //The url where the server req would we made.
            type: "POST", //The type which you want to use: GET/POST
            data: {
            comment_id: comment_id,
                    comment: comment,
            }, //The variable{"label":"' . $arr_cities[$i]['city_name'] . '", "value":"' . $arr_cities[$i]['city_name'] . '","id":"' . $arr_cities[$i]['city_id'] . '"},'s which are going. //Return data type (what we expect).
            //This is the function which will be called if ajax call is successful.
            success: function(data) {

            //data is the html of the page where the request is made.
            if (data == 1)
            {
            alert("تم تحديث التعليق بنجاح");
                    $("#myEditModal").modal("hide");
                    window.location.href = window.location.href;
            } else{
            alert("هناك بعض المشاكل في فونتيونينغ");
            }
            }
    });
    } else{
    alert("الرجاء إدخال شيء");
    }


    }
</script>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-595a11c22fd33c67"></script> 

