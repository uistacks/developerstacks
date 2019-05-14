@extends('website.master')
@section('page_title')
تعليقات
@endsection
@section('content')


<div class="adslist">
    <div class="container">
        @include('website.blocks.message')
        <table class="table" dir="rtl">
            <thead>
                <tr>
                    <th> الصوره</th>  <!-- IMage -->
                    <th> تعليقات</th> <!--- TITle -->
                    <th>تاريخ الاعلان</th>   <!-- Posted Date-->
                    <th> وقت الاعلان</th>  <!--- Time -->
                    <th> تعديل الحذف</th>
                </tr>
            </thead>
            <tbody>

                @if(isset($user_comments) && count($user_comments)>0)
                @foreach($user_comments as $key=>$value)
                <tr>
                    <td>

                        @if(isset($user_comments[$key]['thumbnail']))
                        <img src="{{url('/')}}/{{ $user_comments[$key]['thumbnail'] }}" width="100" height="100">
                        </a>     
                        @else
                        <img src="{{ asset('public/images/select_main_img.png') }}" width="100" height="100"">
                        @endif 

                    </td>
                    <td>
                        <input type='hidden' id='pass_user_comment_{{ $user_comments[$key]["id"]}}' value="{{ $user_comments[$key]["comment"]}}">
                        <a href="<?php echo url('/') ?>/ar/section/{{ $user_comments[$key]['section']  }}/{{ $user_comments[$key]['ad_id'] }}">


                            <div id='user_replace_comment_{{ $user_comments[$key]["id"] }}'>
                                @if(strlen($user_comments[$key]['comment'])>50)
                                {{  substr($user_comments[$key]['comment'],0,50) }} ....

                                @else
                                {{  $user_comments[$key]['comment'] }}
                                @endif

                            </div>

                        </a> 


                    </td>
                    <td>
                        @if(isset($user_comments[$key]['created_at']))

                        {{    date('Y-m-d',strtotime($user_comments[$key]['created_at']))  }}    

                        @endif
                    </td>
                    <td>    
                        @if(isset($user_comments[$key]['created_at']))

                        {{    date('H:i:s A',strtotime($user_comments[$key]['created_at']))  }}    

                        @endif

                    </td>

                    <td>
                        <a class="btn btn-primary btn-sm" href="javascript:void(0);" onclick="showModal({{ $user_comments[$key]["id"]  }})">
                            تصحيح
                        </a>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد حذف؟')" href="{{url('/')}}/{{Lang::getLocale()}}/my-delete-comment/{{$user_comments[$key]["id"]}}">
                            حذف
                        </a>

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

        @if(isset($comment))
        {{ $comment->links() }}
        @endif


    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
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
                        <textarea class="form-control"  placeholder=" " id="comment" id="report_content"></textarea>
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
<script>
            function showModal(comment_id)
            {
            var pass_comment = "#pass_user_comment_" + comment_id;
                    var comment = $(pass_comment).val();
                    $("#comment_id").val(comment_id);
                    $("#myModal").modal("show");
                    $("#comment").val(comment);
            }
</script>  
<script>
    function saveComment()
    {
    var comment = $("#comment").val();
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
                    $("#myModal").modal("hide");
                    if (comment.length > 50)
            {
            var new_comment = comment.substr(0, 50) + "....";
            } else{
            var new_comment = comment;
            }
            var replace_comment = "#user_replace_comment_" + comment_id;
                    $(replace_comment).html(new_comment);
                    var pass_comment = "#pass_user_comment_" + comment_id;
                    $(pass_comment).val(comment);
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
@endsection