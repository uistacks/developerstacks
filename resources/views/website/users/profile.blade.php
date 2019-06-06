@php
    $breadcrumbs[] =  ['url' => route('user-dashboard'), 'name' => 'Dashboard'];
    $breadcrumbs[] =  ['url' => '', 'name' => 'Profile'];
@endphp
@extends('website.layouts.app-dash')
@section('title')
    Profile
@endsection
@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
@endsection
@section('profile-cover')
    @include('website.regions.profile-cover')
@endsection
@section('content')
    <!-- Inner container -->
    <div class="d-md-flex align-items-md-start">
        <!-- Right content -->
        <div class="tab-content w-100 overflow-auto">
            <div class="tab-pane fade active show" id="profile">

                <!-- Profile info -->
                <div class="card">
                    {{--<div class="card-header header-elements-inline">
                        <h5 class="card-title">Profile information</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" href="{{ route('user-dashboard') }}"><i class="icon-backward"></i> Back</a>
                            </div>
                        </div>
                    </div>--}}

                    <div class="card-body">
                        <form action="#">
                            <fieldset class="mb-3">
                                <legend class="text-uppercase font-size-sm font-weight-bold">Basic Information</legend>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Name</label>
                                    <div class="col-lg-10">
                                        <div class="form-control-plaintext">{{ $user->name }}</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Username</label>
                                    <div class="col-lg-10">
                                        <div class="form-control-plaintext">{{ $user->username }}</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Email</label>
                                    <div class="col-lg-10">
                                        <div class="form-control-plaintext">{{ $user->email }}</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Phone</label>
                                    <div class="col-lg-10">
                                        <div class="form-control-plaintext">{{ $user->phone }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dob" class="col-form-label col-lg-2">Birthday</label>
                                    <div class="col-lg-10">
                                        <div class="form-control-plaintext">{{ $user->dob }}</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-form-label col-lg-2">Address</label>
                                    <div class="col-lg-10">
                                        <div class="form-control-plaintext">{{ $user->address }}</div>
                                    </div>
                                </div>

                            </fieldset>

                        </form>
                    </div>
                </div>
                <!-- /profile info -->


                <!-- Messages -->
            {{--<div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Conversation with James</h6>
                    <div class="header-elements">
                        <div class="list-icons ml-3">
                            <div class="list-icons-item dropdown">
                                <a href="#" class="list-icons-item caret-0 dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-arrow-down12"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Hide user posts</a>
                                    <a href="#" class="dropdown-item"><i class="icon-user-block"></i> Block user</a>
                                    <a href="#" class="dropdown-item"><i class="icon-user-minus"></i> Unfollow user</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"><i class="icon-embed"></i> Embed post</a>
                                    <a href="#" class="dropdown-item"><i class="icon-blocked"></i> Report this post</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="media-list media-chat media-chat-scrollable mb-3">
                        <li class="media content-divider justify-content-center text-muted mx-0">Today</li>

                        <li class="media media-chat-item-reverse">
                            <div class="media-body">
                                <div class="media-chat-item">Thus superb the tapir the wallaby blank frog execrably much since dalmatian by in hot. Uninspiringly arose mounted stared one curt safe</div>
                                <div class="font-size-sm text-muted mt-2">Tue, 8:12 am <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div>
                            </div>

                            <div class="ml-3">
                                <a href="../../../../global_assets/images/placeholders/placeholder.jpg">
                                    <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="40" height="40" alt="">
                                </a>
                            </div>
                        </li>

                        <li class="media">
                            <div class="mr-3">
                                <a href="../../../../global_assets/images/placeholders/placeholder.jpg">
                                    <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="40" height="40" alt="">
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="media-chat-item">Tolerantly some understood this stubbornly after snarlingly frog far added insect into snorted more auspiciously heedless drunkenly jeez foolhardy oh.</div>
                                <div class="font-size-sm text-muted mt-2">Wed, 4:20 pm <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div>
                            </div>
                        </li>

                        <li class="media media-chat-item-reverse">
                            <div class="media-body">
                                <div class="media-chat-item">Satisfactorily strenuously while sleazily dear frustratingly insect menially some shook far sardonic badger telepathic much jeepers immature much hey.</div>
                                <div class="font-size-sm text-muted mt-2">2 hours ago <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div>
                            </div>

                            <div class="ml-3">
                                <a href="../../../../global_assets/images/placeholders/placeholder.jpg">
                                    <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="40" height="40" alt="">
                                </a>
                            </div>
                        </li>

                        <li class="media">
                            <div class="mr-3">
                                <a href="../../../../global_assets/images/placeholders/placeholder.jpg">
                                    <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="40" height="40" alt="">
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="media-chat-item">Grunted smirked and grew less but rewound much despite and impressive via alongside out and gosh easy manatee dear ineffective yikes.</div>
                                <div class="font-size-sm text-muted mt-2">13 minutes ago <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div>
                            </div>
                        </li>

                        <li class="media media-chat-item-reverse">
                            <div class="media-body">
                                <div class="media-chat-item"><i class="icon-menu"></i></div>
                            </div>

                            <div class="ml-3">
                                <a href="../../../../global_assets/images/placeholders/placeholder.jpg">
                                    <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="40" height="40" alt="">
                                </a>
                            </div>
                        </li>
                    </ul>

                    <textarea name="enter-message" class="form-control mb-3" rows="3" cols="1" placeholder="Enter your message..."></textarea>

                    <div class="d-flex align-items-center">
                        <div class="list-icons list-icons-extended">
                            <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body" title="Send photo"><i class="icon-file-picture"></i></a>
                            <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body" title="Send video"><i class="icon-file-video"></i></a>
                            <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body" title="Send file"><i class="icon-file-plus"></i></a>
                        </div>

                        <button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-auto"><b><i class="icon-paperplane"></i></b> Send</button>
                    </div>
                </div>
            </div>--}}
            <!-- /messages -->

            </div>

        </div>
        <!-- /right content -->

    </div>
    <!-- /inner container -->



    <div id="modal_remote" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Cover Image</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <div class="card" style="max-height: 500px;">
                        {{--<div class="card-header bg-info">PHP and jQuery - Crop Image and Upload using Croppie plugin</div>--}}
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div id="upload-demo"></div>
                                </div>
                                {{--<div class="col-md-4" style="padding:5%;">
                                    <strong>Select image to crop:</strong>
                                    <input type="file" id="image">

                                    <button class="btn btn-success btn-block btn-upload-image" style="margin-top:2%">Upload Image</button>
                                </div>--}}

                                <div class="col-md-4">
                                    <div id="preview-crop-image" style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
    <script type="text/javascript">
        $("#profile_cover_upload_link").on('click', function(e){
            e.preventDefault();
            $("#image-input:hidden").trigger('click');
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var resize = $('#upload-demo').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: { // Default { width: 100, height: 100, type: 'square' }
                width: 700,
                height: 250,
                type: 'square' //square
            },
            boundary: {
                width: 800,
                height: 400
            }
        });


        $('#image-input').on('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                resize.croppie('bind',{
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);

            $('#modal_remote').modal({
               show: true
            });
        });


        $('.upload-image').on('click', function (ev) {
            resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (img) {
                $.ajax({
                    url: "{{ route('croppie.upload-image') }}",
                    type: "POST",
                    data: {"image":img},
                    success: function (data) {
                        html = '<img src="' + img + '" />';
                        $("#preview-crop-image").html(html);
                    }
                });
            });
        });


    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#set-choosed-file').on('click', function () {
                if($("input[name*='main_image_id']").val() !== undefined){
//                   alert($("input[name*='main_image_id']").val());
                    $('#frm_change_picture').submit();
                }
            });
        });
    </script>
@stop