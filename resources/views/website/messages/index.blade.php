@extends('website.layouts.app-dash')
@section('title')
    Thread
@endsection
@section('header')
    <link href="{{ asset('assets/css/message.css') }}" rel="stylesheet">
@endsection
@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Inner container -->
        <div class="d-md-flex align-items-md-start">
            <!-- Right content -->
            <div class="tab-content w-100 overflow-auto">
                <div class="tab-pane fade active show" id="profile">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel messages-panel">
                                <div class="contacts-list">
                                    <div class="inbox-categories">
                                        <div data-toggle="tab" data-target="#inbox" class="active"> Inbox </div>
                                    </div>
                                    <div class="tab-content">
                                        <div id="inbox" class="contacts-outter-wrapper tab-pane active">
                                            <form class="panel-search-form info form-group has-feedback no-margin-bottom">
                                                <input type="text" class="form-control" name="search" placeholder="Search">
                                                <span class="icon-search4 form-control-feedback"></span>
                                            </form>
                                            <div class="contacts-outter">
                                                <ul class="list-unstyled contacts">
                                                    @each('website.messages.partials.thread', $threads, 'thread', 'website.messages.partials.no-threads')
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane message-body active" id="inbox-message-1">
                                        <div class="message-top">
                                            <a class="btn btn btn-success new-message" href="{{ route('messages.create') }}"> <i class="fa fa-envelope"></i> New Message </a>
                                        </div>

                                        <div class="message-chat">
                                            <div class="chat-body">
                                                @if(isset($firstMsg->messages))
                                                    @foreach($firstMsg->messages as $key => $message)
                                                        <div class="message @if($message->user->id == auth()->user()->id) my-message @else info @endif">
                                                            @if(isset($message->user->media) && isset($message->user->media->main_image) && isset($message->user->media->main_image->styles['large']))
                                                                <img class="img-circle medium-image" src="{{url('/')}}/{{ $message->user->media->main_image->styles['large'] }}" alt="user-image" />
                                                            @else
                                                                <img class="img-circle medium-image" src="{{ url('/') }}/public/website_assets/img/user.png" alt="user-image" />
                                                            @endif
                                                            {{--<img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">--}}

                                                            <div class="message-body">
                                                                <div class="message-body-inner">
                                                                    <div class="message-info">
                                                                        <h4> {{ $message->user->name }} </h4>
                                                                        <h5> <i class="fa fa-clock-o"></i> {{ $message->created_at->diffForHumans() }} </h5>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="message-text">
                                                                        {!! $message->body !!}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="message-body">
                                                                @if(isset($message->file_name))
                                                                    <div class="">
                                                                        <?php
                                                                        $ext = pathinfo($message->file_name, PATHINFO_EXTENSION);
                                                                        if($ext == 'png' || $ext == 'jpg' || $ext == 'gif' || $ext == 'bmp' || $ext == 'jpeg') {
                                                                            echo '<img src="'.url('/').'/public/uploads/message-files/'.$message->file_name.'" style="width: 150px;" />';
                                                                        } else {
                                                                            echo '<span class="fa-3x fa-file"></span> '.$message->file_name;
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <br>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <div class="img-preview pull-right" style="">

                                                </div>
                                            </div>
                                            <div class="chat-footer">
                                                {{--<textarea class="send-message-text"></textarea>
                                                <label class="upload-file">
                                                    <input type="file" required="">
                                                    <i class="fa fa-paperclip"></i>
                                                </label>
                                                <button type="button" class="send-message-button btn-info"> <i class="fa fa-send"></i> </button>--}}
                                                @if(isset($threads) && count($threads) > 0)
                                                    <form action="{{ route('messages.update', $threads[0]->id) }}" method="post" enctype="multipart/form-data">
                                                        {{ method_field('put') }}
                                                        {{ csrf_field() }}
                                                        <textarea class="send-message-text" name="message">{{ old('message') }}</textarea>
                                                        <label class="upload-file">
                                                            <input type="file" name="filename" id="inputFile" />
                                                            <i class="icon-paperplane"></i>
                                                        </label>
                                                        <input type="hidden" id="imageData" name="imageData" />
                                                        <button type="submit" class="send-message-button btn-info"> <i class="icon-forward3"></i> </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /right content -->

        </div>
        <!-- /inner container -->

    </div>
    <!-- /content area -->

@endsection
@section('footer')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var file = input.files[0];
                    var fileType = file["type"];
                    var ValidImageTypes = ["image/gif", "image/jpeg", "image/jpg", "image/png"];
                    if ($.inArray(fileType, ValidImageTypes) < 0) {
                        $('.img-preview').html('<span>'+input.files[0]['name']+'</span>');
                    } else {
                        $('.img-preview').html('<img id="image_upload_preview" class="img img-responsive img-thumbnail" style="width: 100%;" src="'+ e.target.result +'" alt="your image" />');
                    }
//                    $('#imageData').val(e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $(function(){
            $(".upload-file #inputFile").on('change', function () {
                readURL(this);
            });
        });
    </script>
@stop