<style>
    .profile-cover-img {
        background-position: 50% 50%;
        background-repeat: no-repeat;
        background-size: cover;
        height: 24.88rem !important;
    }
    #image-input{
        display:none
    }
</style>
<div class="profile-cover border-bottom-2 border-bottom-danger">
    <div class="profile-cover-img" id="preview-crop-image" style="background-image: url({{ url('/') }}/assets/images/placeholders/cover.jpg)"></div>
    <div class="media align-items-center text-center text-md-left flex-column flex-md-row m-0">
        <div class="mr-md-3 mb-2 mb-md-0">
            {{--<a href="#" class="profile-thumb">
                <img src="{{ url('/') }}/assets/images/placeholders/placeholder.jpg" class="border-white rounded-circle" width="48" height="48" alt="">
            </a>--}}
            <form id="frm_change_picture" method="post" action="{{ action('UserController@changePicture') }}">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                <a class="profile-thumb" data-toggle="modal" data-target="#qurative_media_modal" href="javascript:void(0)" media-data-button-name="{{ trans('Core::operations.select') }} User Image" media-data-field-name="main_image_id" media-data-required>
                    <div class="media-item">
                        @if(isset(auth()->user()->media) && isset(auth()->user()->media->main_image) && isset(auth()->user()->media->main_image->styles['thumbnail']))
                            <img src="{{url('/')}}/{{ auth()->user()->media->main_image->styles['thumbnail'] }}" class="border-white rounded-circle" width="48" height="48" alt="{{ auth()->user()->name }}"/>
                            <input type="hidden" name="main_image_id" value="{{auth()->user()->media->main_image->id}}">
                        @else
                            <img src="{{ url('/') }}/assets/images/user.png" class="border-white rounded-circle" width="48" height="48" alt="{{ auth()->user()->name }}"/>
                        @endif
                    </div>
                </a>
            </form>
        </div>

        <div class="media-body text-white">
            <h1 class="mb-0">{{ auth()->user()->name }}</h1>
            <span class="d-block">{{ auth()->user()->address }}</span>
        </div>

        <div class="ml-md-3 mt-2 mt-md-0">
            <ul class="list-inline list-inline-condensed mb-0">
                <li class="list-inline-item">
                    <input id="image-input" type="file"/>
                    <a href="" id="profile_cover_upload_link" class="btn btn-light border-transparent legitRipple"><i class="icon-file-picture mr-2"></i> Cover image</a>
                </li>
                {{--<li class="list-inline-item">
                    <a href="#" class="btn btn-light border-transparent legitRipple"><i class="icon-file-stats mr-2"></i> Statistics</a>
                </li>--}}
            </ul>
        </div>
    </div>
</div>