@php
    $breadcrumbs = [
    ['url' => url('/').'/'.Lang::getLocale().'/admin/blogs', 'name' => trans('Blogs::blogs.blogs')],['url' => '', 'name' => trans('Blogs::blogs.blog')]
    ];

    $dbTable = '';
    if($items->count()){
    $dbTable = $items[0]['table'];
    }
@endphp

@extends('admin.master')
@section('page_title')
    {{ trans('Contactus::contactus.contactus_section') }}
@endsection
@section('content')
    <style type="text/css">
        .post-comments {
            padding-bottom: 9px;
            margin: 5px 0 5px;
        }
        .comments-nav {
            border-bottom: 1px solid #eee;
            margin-bottom: 5px;
        }
        .post-comments .comment-meta {
            border-bottom: 1px solid #eee;
            margin-bottom: 5px;
        }
        .post-comments .media {
            border-left: 1px dotted #000;
            border-bottom: 1px dotted #000;
            margin-bottom: 5px;
            padding-left: 10px;
        }
        .post-comments .media-heading {
            font-size: 12px;
            color: grey;
        }
        .post-comments .comment-meta a {
            font-size: 12px;
            color: grey;
            font-weight: bolder;
            margin-right: 5px;
        }
    </style>
    <script type="text/javascript">
        $('[data-toggle="collapse"]').on('click', function() {
            var $this = $(this),
                $parent = typeof $this.data('parent')!== 'undefined' ? $($this.data('parent')) : undefined;
            if($parent === undefined) { /* Just toggle my  */
                $this.find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                return true;
            }

            /* Open element will be close if parent !== undefined */
            var currentIcon = $this.find('.glyphicon');
            currentIcon.toggleClass('glyphicon-plus glyphicon-minus');
            $parent.find('.glyphicon').not(currentIcon).removeClass('glyphicon-minus').addClass('glyphicon-plus');

        });
    </script>
    <!-- Include single delete confirmation model -->
    @include('Core::modals.confirm-delete')
    <!-- Include bulk delete confirmation model -->
    @include('Core::modals.bulk-confirm-delete')
    <div class="row">
        <div class="col-md-12">
            {{--<div class="admin-top-operation pull-left">--}}
            {{--<h3 class="text-success">Comments</h3>--}}
            {{--</div>--}}
            {{--<div class="admin-top-operation">--}}
            {{--<a class="btn btn-default" href="{{ action('\UiStacks\Contactus\Controllers\ContactusController@createSection')}}">{{ trans('Core::operations.create') }} {{ trans('Contactus::contactus.contactus_section') }}</a>--}}
            {{--</div>--}}
            @if($items->count() || $_GET)
                {{--                @include('Contactus::contactus.filter')--}}
            @endif
            <div class="post-comments">

                <form>
                    <div class="form-group">
                        <label for="comment">Your Comment</label>
                        <textarea name="comment" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Send</button>
                </form>

                <div class="comments-nav">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                there are 2593 comments <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Best</a></li>
                                <li><a href="#">Hot</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="row">

                    <div class="media">
                        <!-- first comment -->

                        <div class="media-heading">
                            <button class="btn btn-default btn-xs" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="label label-info">12314</span> terminator 12 hours ago
                        </div>

                        <div class="panel-collapse collapse in" id="collapseOne">

                            <div class="media-left">
                                <div class="vote-wrap">
                                    <div class="save-post">
                                        <a href="#"><span class="glyphicon glyphicon-star" aria-label="Save"></span></a>
                                    </div>
                                    <div class="vote up">
                                        <i class="glyphicon glyphicon-menu-up"></i>
                                    </div>
                                    <div class="vote inactive">
                                        <i class="glyphicon glyphicon-menu-down"></i>
                                    </div>
                                </div>
                                <!-- vote-wrap -->
                            </div>
                            <!-- media-left -->


                            <div class="media-body">
                                <p>yazmayın artık amk, görmeyeyim sol framede. insan bi meraklanıyor, ümitleniyor. sonra yine özlem dolu yazıları görüp hayal kırıklığıyla okuyorum.</p>
                                <div class="comment-meta">
                                    <span><a href="#">delete</a></span>
                                    <span><a href="#">report</a></span>
                                    <span><a href="#">hide</a></span>
                                    <span>
                        <a class="" role="button" data-toggle="collapse" href="#replyCommentT" aria-expanded="false" aria-controls="collapseExample">reply</a>
                      </span>
                                    <div class="collapse" id="replyCommentT">
                                        <form>
                                            <div class="form-group">
                                                <label for="comment">Your Comment</label>
                                                <textarea name="comment" class="form-control" rows="3"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-default">Send</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- comment-meta -->

                                <div class="media">
                                    <!-- answer to the first comment -->

                                    <div class="media-heading">
                                        <button class="btn btn-default btn-collapse btn-xs" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="label label-info">12314</span> vertu 12 sat once yazmis
                                    </div>

                                    <div class="panel-collapse collapse in" id="collapseTwo">

                                        <div class="media-left">
                                            <div class="vote-wrap">
                                                <div class="save-post">
                                                    <a href="#"><span class="glyphicon glyphicon-star" aria-label="Save"></span></a>
                                                </div>
                                                <div class="vote up">
                                                    <i class="glyphicon glyphicon-menu-up"></i>
                                                </div>
                                                <div class="vote inactive">
                                                    <i class="glyphicon glyphicon-menu-down"></i>
                                                </div>
                                            </div>
                                            <!-- vote-wrap -->
                                        </div>
                                        <!-- media-left -->


                                        <div class="media-body">
                                            <p>yazmayın artık amk, görmeyeyim sol framede. insan bi meraklanıyor, ümitleniyor. sonra yine özlem dolu yazıları görüp hayal kırıklığıyla okuyorum.</p>
                                            <div class="comment-meta">
                                                <span><a href="#">delete</a></span>
                                                <span><a href="#">report</a></span>
                                                <span><a href="#">hide</a></span>
                                                <span>
                              <a class="" role="button" data-toggle="collapse" href="#replyCommentThree" aria-expanded="false" aria-controls="collapseExample">reply</a>
                            </span>
                                                <div class="collapse" id="replyCommentThree">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="comment">Your Comment</label>
                                                            <textarea name="comment" class="form-control" rows="3"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-default">Send</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment-meta -->
                                        </div>
                                    </div>
                                    <!-- comments -->

                                </div>
                                <!-- answer to the first comment -->

                            </div>
                        </div>
                        <!-- comments -->

                    </div>
                    <!-- first comment -->
                    <div class="media">
                        <!-- first comment -->

                        <div class="media-heading">
                            <button class="btn btn-default btn-xs" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="label label-info">12314</span> vertu 12 sat once yazmis
                        </div>

                        <div class="panel-collapse collapse in" id="collapseThree">

                            <div class="media-left">
                                <div class="vote-wrap">
                                    <div class="save-post">
                                        <a href="#"><span class="glyphicon glyphicon-star" aria-label="Kaydet"></span></a>
                                    </div>
                                    <div class="vote up">
                                        <i class="glyphicon glyphicon-menu-up"></i>
                                    </div>
                                    <div class="vote inactive">
                                        <i class="glyphicon glyphicon-menu-down"></i>
                                    </div>
                                </div>
                                <!-- vote-wrap -->
                            </div>
                            <!-- media-left -->


                            <div class="media-body">
                                <p>yazmayın artık amk, görmeyeyim sol framede. insan bi meraklanıyor, ümitleniyor. sonra yine özlem dolu yazıları görüp hayal kırıklığıyla okuyorum.</p>
                                <div class="comment-meta">
                                    <span><a href="#">sil</a></span>
                                    <span><a href="#">kaydet</a></span>
                                    <span><a href="#">sikayer et</a></span>
                                    <span>
                        <a class="" role="button" data-toggle="collapse" href="#replyCommentFour" aria-expanded="false" aria-controls="collapseExample">cevapla</a>
                      </span>
                                    <div class="collapse" id="replyCommentFour">
                                        <form>
                                            <div class="form-group">
                                                <label for="comment">Yorumunuz</label>
                                                <textarea name="comment" class="form-control" rows="3"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-default">Yolla</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- comment-meta -->

                                <div class="media">
                                    <!-- answer to the first comment -->

                                    <div class="media-heading">
                                        <button class="btn btn-default btn-collapse btn-xs" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="label label-info">12314</span> vertu 12 sat once yazmis
                                    </div>

                                    <div class="panel-collapse collapse in" id="collapseFour">

                                        <div class="media-left">
                                            <div class="vote-wrap">
                                                <div class="save-post">
                                                    <a href="#"><span class="glyphicon glyphicon-star" aria-label="Kaydet"></span></a>
                                                </div>
                                                <div class="vote up">
                                                    <i class="glyphicon glyphicon-menu-up"></i>
                                                </div>
                                                <div class="vote inactive">
                                                    <i class="glyphicon glyphicon-menu-down"></i>
                                                </div>
                                            </div>
                                            <!-- vote-wrap -->
                                        </div>
                                        <!-- media-left -->


                                        <div class="media-body">
                                            <p>yazmayın artık amk, görmeyeyim sol framede. insan bi meraklanıyor, ümitleniyor. sonra yine özlem dolu yazıları görüp hayal kırıklığıyla okuyorum.</p>
                                            <div class="comment-meta">
                                                <span><a href="#">sil</a></span>
                                                <span><a href="#">kaydet</a></span>
                                                <span><a href="#">sikayer et</a></span>
                                                <span>
                              <a class="" role="button" data-toggle="collapse" href="#replyCommentFive" aria-expanded="false" aria-controls="collapseExample">cevapla</a>
                            </span>
                                                <div class="collapse" id="replyCommentFive">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="comment">Yorumunuz</label>
                                                            <textarea name="comment" class="form-control" rows="3"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-default">Yolla</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment-meta -->

                                            <div class="media">
                                                <!-- first comment -->

                                                <div class="media-heading">
                                                    <button class="btn btn-default btn-xs" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="label label-info">12314</span> vertu 12 sat once yazmis
                                                </div>

                                                <div class="panel-collapse collapse in" id="collapseFive">

                                                    <div class="media-left">
                                                        <div class="vote-wrap">
                                                            <div class="save-post">
                                                                <a href="#"><span class="glyphicon glyphicon-star" aria-label="Kaydet"></span></a>
                                                            </div>
                                                            <div class="vote up">
                                                                <i class="glyphicon glyphicon-menu-up"></i>
                                                            </div>
                                                            <div class="vote inactive">
                                                                <i class="glyphicon glyphicon-menu-down"></i>
                                                            </div>
                                                        </div>
                                                        <!-- vote-wrap -->
                                                    </div>
                                                    <!-- media-left -->


                                                    <div class="media-body">
                                                        <p>yazmayın artık amk, görmeyeyim sol framede. insan bi meraklanıyor, ümitleniyor. sonra yine özlem dolu yazıları görüp hayal kırıklığıyla okuyorum.</p>
                                                        <div class="comment-meta">
                                                            <span><a href="#">sil</a></span>
                                                            <span><a href="#">kaydet</a></span>
                                                            <span><a href="#">sikayer et</a></span>
                                                            <span>
                        <a class="" role="button" data-toggle="collapse" href="#replyCommentSix" aria-expanded="false" aria-controls="collapseExample">cevapla</a>
                      </span>
                                                            <div class="collapse" id="replyCommentSix">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label for="comment">Yorumunuz</label>
                                                                        <textarea name="comment" class="form-control" rows="3"></textarea>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-default">Yolla</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- comment-meta -->

                                                        <div class="media">
                                                            <!-- answer to the first comment -->

                                                            <div class="media-heading">
                                                                <button class="btn btn-default btn-collapse btn-xs" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button> <span class="label label-info">12314</span> vertu 12 sat once yazmis
                                                            </div>

                                                            <div class="panel-collapse collapse in" id="collapseSix">

                                                                <div class="media-left">
                                                                    <div class="vote-wrap">
                                                                        <div class="save-post">
                                                                            <a href="#"><span class="glyphicon glyphicon-star" aria-label="Kaydet"></span></a>
                                                                        </div>
                                                                        <div class="vote up">
                                                                            <i class="glyphicon glyphicon-menu-up"></i>
                                                                        </div>
                                                                        <div class="vote inactive">
                                                                            <i class="glyphicon glyphicon-menu-down"></i>
                                                                        </div>
                                                                    </div>
                                                                    <!-- vote-wrap -->
                                                                </div>
                                                                <!-- media-left -->


                                                                <div class="media-body">
                                                                    <p>yazmayın artık amk, görmeyeyim sol framede. insan bi meraklanıyor, ümitleniyor. sonra yine özlem dolu yazıları görüp hayal kırıklığıyla okuyorum.</p>
                                                                    <div class="comment-meta">
                                                                        <span><a href="#">sil</a></span>
                                                                        <span><a href="#">kaydet</a></span>
                                                                        <span><a href="#">sikayer et</a></span>
                                                                        <span>
                              <a class="" role="button" data-toggle="collapse" href="#replyCommentOne" aria-expanded="false" aria-controls="collapseExample">cevapla</a>
                            </span>
                                                                        <div class="collapse" id="replyCommentOne">
                                                                            <form>
                                                                                <div class="form-group">
                                                                                    <label for="comment">Yorumunuz</label>
                                                                                    <textarea name="comment" class="form-control" rows="3"></textarea>
                                                                                </div>
                                                                                <button type="submit" class="btn btn-default">Yolla</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <!-- comment-meta -->


                                                                </div>
                                                            </div>
                                                            <!-- comments -->

                                                        </div>
                                                        <!-- answer to the first comment -->

                                                    </div>
                                                </div>
                                                <!-- comments -->
                                            </div>
                                            <!-- first comment -->
                                        </div>
                                    </div>
                                    <!-- comments -->
                                </div>
                                <!-- answer to the first comment -->
                            </div>
                        </div>
                        <!-- comments -->
                    </div>
                    <!-- first comment -->
                </div>
            </div>
            <!-- post-comments -->
        </div>
    </div>
@endsection
@section('footer')
    <!--jquery-dependency-fields -->
    <script src="/vendor/core/js/jquery-dependency-fields/scripts.js"></script>
    <!--end jquery-dependency-fields -->
    <script src="{{ asset('public/admin_assets/js/index-operations.js') }}"></script>
@endsection