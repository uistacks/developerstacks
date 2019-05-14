@extends('website.master')
@section('content')
    <script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>
    <div class="content">
        @include('website.home.blocks.top-head')
        @include('website.regions.header')
        {{--<hr class="hredit">--}}
        <style>
            #panel {
                display: none;
            }
            .widget-script-body {
                background-color: #dedee3;
                display: block;
                padding: 1px 9px 12px 5px;
                width: 97%;
            }
        </style>

        <div class="place-page">
            <div class="">
                <section style="background:#efefe9;">
                    <div class="container">
                        <div class="board">
                            <div class="board-inner">
                                <ul class="nav nav-tabs" id="myTab">
                                    <div class="liner"></div>
                                    <li class="active">
                                        <a href="#home" data-toggle="tab" title="{{ trans('Stores::stores.info') }}">
                                            <span class="round-tabs one"><i class="glyphicon glyphicon-home"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#profile" data-toggle="tab" title="{{ trans('Stores::stores.location') }}">
                                            <span class="round-tabs two"><i class="fa fa-map-marker "></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#messages" data-toggle="tab" title="{{ trans('Stores::stores.gallery') }}">
                                            <span class="round-tabs three"><i class="fa fa-picture-o"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <div class="english-title relative">
                                        <h1>{{$item->trans->name}}</h1>
                                        <div class="rati-blk">
                                            @if(isset($is_rated))
                                                <a class="disabled" onclick="return checkIfRated();" href="javascript:void(0);">{{ trans('Stores::stores.write_a_review') }}</a>
                                            @else
                                                <a data-toggle="modal" href="#rating-modal">{{ trans('Stores::stores.write_a_review') }}</a>
                                            @endif
                                            <span id="store_avg_rating"></span>
                                            {{--<span><i class="fa fa-star"></i></span>--}}
                                            {{--<span><i class="fa fa-star"></i></span>--}}
                                            {{--<span><i class="fa fa-star"></i></span>--}}
                                            {{--<span><i class="fa fa-star-half-o"></i></span>--}}
                                            {{--<span><i class="fa fa-star-o"></i></span>--}}
                                        </div>
                                    </div>
                                    {{--{{ dd($item->trans) }}--}}
                                    <div class="place-data">
                                        <ul>
                                            <li> <i class="fa fa-globe" aria-hidden="true"></i>{{ $item->trans->location }}</li>
                                            <li> <i class="fa fa-eye" aria-hidden="true"></i>{{ ($item->view_count > 0) ? $item->view_count : "0" }} {{ trans('Stores::stores.view') }}</li>
                                            <li> <i class="fa fa-search" aria-hidden="true"></i>{{ ($item->search_count > 0) ? $item->search_count : "0" }} {{ trans('Stores::stores.search') }}</li>
                                        </ul>
                                    </div>
                                    <div class="smicons">
                                        <ul class="clearfix">
                                            @if(isset($item))
                                            <?php
                            $instagramMedia = "";
                            if(isset($item->trans) && $item->trans->instagram_media !=''){
                                $instagramMedia = $item->trans->instagram_media;
                            }else{
                                if(isset($item->trans) && $item->trans->provider == 2){
                                    $instagramMedia = $item->page_url;
                                }
                            }
                            $facebookMedia = "";
                            if(isset($item->trans) && $item->trans->facebook_media !=''){
                                $facebookMedia = $item->trans->facebook_media;
                            }else{
                                if(isset($item->trans) && $item->trans->provider == 1){
                                    $facebookMedia = $item->page_url;
                                }
                            }
                            ?>
                                            @if(isset($instagramMedia) && $instagramMedia !="")
                                                <li>
                                                    <a href="{{ $instagramMedia }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                                </li>
                                                @endif
                                                @if(isset($facebookMedia) && $facebookMedia !="")
                                                <li>
                                                    <a href="{{ $facebookMedia }}" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                                </li>
                                                @endif
                                                @if(isset($item->trans->twitter_media) && $item->trans->twitter_media !="")
                                                <li>
                                                    <a href="{{ $item->trans->twitter_media }}" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                                                </li>
                                                @endif
                                                @if(isset($item->trans->googleplus_media) && $item->trans->googleplus_media !="")
                                                <li>
                                                    <a href="{{ $item->trans->googleplus_media }}" target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                                                </li>
                                                @endif
                                                @if(isset($item->trans->youtube_media) && $item->trans->youtube_media !="")
                                                <li>
                                                    <a href="{{ $item->trans->youtube_media }}" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                                                </li>
                                                @endif
                                                @if(isset($item->trans->snapchat_media) && $item->trans->snapchat_media !="")
                                                <li>
                                                    <a href="{{ $item->trans->snapchat_media }}" target="_blank"><i class="fa fa-snapchat-square" aria-hidden="true"></i></a>
                                                </li>
                                                @endif
                                            @endif
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    {{--<iframe src="http://maps.google.com/maps?q=12.927923,77.627108&z=15&output=embed" width="100%" height="500"></iframe>--}}
                                    <iframe src="http://maps.google.com/maps?q={{ $item->trans->store_lat }},{{ $item->trans->store_lng }}&z=15&output=embed" width="100%" height="500"></iframe>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <div class="images-gallery">
                                        <h3>{{ trans('Stores::stores.images_gallery') }}</h3>
                                        <hr>
                                        <div class="demo-gallery">
                                            <ul id="lightgallery" class="list-unstyled row">
                                                @if (isset($gallery_images) && count($gallery_images) > 0)
                                                    @foreach($gallery_images as $imgKey=>$images)
                                                        <li class="col-xs-6 col-sm-4 col-md-3 img-gallery" data-responsive="{{url('/')}}/{{ $images['file'] }} 375, {{url('/')}}/{{ $images['file'] }} 480, {{url('/')}}/{{ $images['file'] }} 800" data-src="{{url('/')}}/{{ $images['file'] }}" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                                                            <a href=""> <img class="img-responsive" src="{{url('/')}}/{{ $images['file'] }}"> </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <hr>
                                    {{--<div class="images-gallery">--}}
                                    {{--<h3>Vedio gallery</h3>--}}
                                    {{--<hr>--}}
                                    {{--<!-- Hidden video div -->--}}
                                    {{--<div style="display:none;" id="video1">--}}
                                    {{--<video class="lg-video-object lg-html5" controls preload="none">--}}
                                    {{--<source src="vedio/videoplayback (1) (online-video-cutter.com).mp4" type="video/mp4"> Your browser does not support HTML5 video. </video>--}}
                                    {{--</div>--}}
                                    {{--<div style="display:none;" id="video2">--}}
                                    {{--<video class="lg-video-object lg-html5" controls preload="none">--}}
                                    {{--<source src="vedio/videoplayback (1) (online-video-cutter.com).mp4" type="video/mp4"> Your browser does not support HTML5 video. </video>--}}
                                    {{--</div>--}}
                                    {{--<!-- data-src should not be provided when you use html5 videos -->--}}
                                    {{--<div class="html5-videos-blk">--}}
                                    {{--<ul id="html5-videos" class="clearfix">--}}
                                    {{--<li class="" data-poster="img/image-3.jpg" data-sub-html="video caption1" data-html="#video1"> <img src="img/image-3.jpg" width="100%" height="150" /> </li>--}}
                                    {{--<li data-poster="img/image-3.jpg" data-sub-html="video caption2" data-html="#video2" class=""> <img src="img/image-3.jpg" width="100%" height="150" /> </li>--}}
                                    {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                            <?php
                            $place_id = $item->id;
                            $locale = \Lang::getlocale();
                                $widget_html = '<script type="text/javascript">
                                            place_id = '.$place_id.';
                                            locale = "'.$locale.'";
                            </script>
                            <script src="'.url('/').'/instafilter.js" type="text/javascript"></script>
                            <div id="example-widget-container"></div>';
                                ?>
                            <hr/>
                            <div class="">
                                <div id="flip">
                                    <button type="button" class="btn btn-warning"><i class="fa fa-share-alt"></i> </button>
                                </div>
                                &nbsp;
                                <div id="panel" class="form-group widget-script-body">
                                    <div class="form-control-static" id="post-shortlink">
                                        {{ $widget_html }}
                                    </div>
                                    {{--<textarea class="control-panel" row="40" cols="120" style="height: 150px;" id="copyTarget">{!! $widget_html !!}</textarea>--}}
                                    <div class="">
                                        {{--<button id="copyButton" aria-label="Copy to clipboard" class="" data-copied-hint="Copied!" type="button"><i class="fa fa-clipboard" aria-hidden="true"></i></button>--}}
                                        <button class="button" id="copy-button" data-clipboard-target="#post-shortlink"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <hr/>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection
@section('footer')
    <link rel="stylesheet" href="{{ asset('public/website_assets/raty-master/lib/jquery.raty.css') }}">
    <!-- Bootstrap trigger to open modal -->
    <div class="modal fade" id="rating-modal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    {{--<button type="button" class="close raty-close"--}}
                            {{--data-dismiss="modal">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                        {{--<span class="sr-only">Close</span>--}}
                    {{--</button>--}}
                    <h4 class="modal-title" id="myModalLabel">
                        {{ trans('Ratings::ratings.write_your_review') }}
                    </h4>
                </div>
                <form role="form" id="frm_store_rating" action="{{ action('StoreController@rateNow') }}" method="post">
                    <input type="hidden" name="store_id" value="{{ $item->trans->store_id }}"/>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="store_comment">{{ trans('Ratings::ratings.comment') }}</label>
                            <textarea class="form-control" name="store_comment" id="store_comment" placeholder="{{ trans('Ratings::ratings.comment') }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="store_rating">{{ trans('Ratings::ratings.name') }}</label>
                            <div id="store_rating"></div>
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            {{ trans('admin.cancel') }}
                        </button>
                        <button type="submit" class="btn btn-success">
                            {{ trans('project.submit') }}
                        </button>
                    </div>
                    <input name="language[ar]" value="ar" type="hidden"/>
                    <input name="language[en]" value="en" type="hidden"/>
                </form>
            </div>
        </div>
    </div>
    {{--{{dd($item)}}--}}
    <script src="{{ asset('public/website_assets/raty-master/lib/jquery.raty.js') }}" type="text/javascript"></script>
    <?php
    if(isset($item) && $item->rating_count > 0){
        $avg_rating = $item->avg_rating / $item->rating_count;
    }else{
        $avg_rating = $item->avg_rating;
    }
    ?>
    <script type="text/javascript">
        (function(){
            new Clipboard('#copy-button');
        })();
        $("#flip").click(function(){
            $("#panel").slideToggle("slow");
        });
        $('#store_avg_rating').raty({
            readOnly: true,
            start: "{{isset($avg_rating) ? $avg_rating : "0"}}",
            score: "{{isset($avg_rating) ? $avg_rating : "0"}}",
            path: "{{ url('/') }}/public/website_assets/raty-master/lib/images",
            half: true,
        });
        $('#store_rating').raty({
            scoreName: 'rating_val',
            path: "{{ url('/') }}/public/website_assets/raty-master/lib/images",
            half: true,
            cancel      : true,
            cancelPlace : 'right'
        });
        function checkIfRated() {
            var isLoggedIn = "{{ isset($userData) ? $userData->id : "" }}";
            if(isLoggedIn !='') {
                alert("{{ trans('Stores::stores.you_have_already_rated_this_store') }}");
            }
            else{
                alert("{{ trans('Stores::stores.please_login_to_rate_this_store') }}");
            }
        }
//        document.getElementById("copyButton").addEventListener("click", function() {
//            copyToClipboard(document.getElementById("copyTarget"));
//        });
        function copyToClipboard(elem) {
            // create hidden text element, if it doesn't already exist
            var targetId = "_hiddenCopyText_";
            var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
            var origSelectionStart, origSelectionEnd;
            if (isInput) {
                // can just use the original source element for the selection and copy
                target = elem;
                origSelectionStart = elem.selectionStart;
                origSelectionEnd = elem.selectionEnd;
            } else {
                // must use a temporary form element for the selection and copy
                target = document.getElementById(targetId);
                if (!target) {
                    var target = document.createElement("textarea");
                    target.style.position = "absolute";
                    target.style.left = "-9999px";
                    target.style.top = "0";
                    target.id = targetId;
                    document.body.appendChild(target);
                }
                target.textContent = elem.textContent;
            }
            // select the content
            var currentFocus = document.activeElement;
            target.focus();
            target.setSelectionRange(0, target.value.length);

            // copy the selection
            var succeed;
            try {
                succeed = document.execCommand("copy");
            } catch(e) {
                succeed = false;
            }
            // restore original focus
            if (currentFocus && typeof currentFocus.focus === "function") {
                currentFocus.focus();
            }
            if (isInput) {
                // restore prior selection
                elem.setSelectionRange(origSelectionStart, origSelectionEnd);
            } else {
                // clear temporary content
                target.textContent = "";
            }
            return succeed;
        }
    </script>
    <script src="{{ asset('public/website_assets/js/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/website_assets/js/customize/rating.js') }}" type="text/javascript"></script>
@stop