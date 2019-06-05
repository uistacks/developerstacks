{{--<div class="navbar navbar-expand-md navbar-dark" style="background-color: rgba(0,0,0,0.075); border-bottom-color: rgba(255,255,255,0.35)">--}}
<div class="navbar navbar-expand-md navbar-dark" style="background: linear-gradient(to right,#f077ff,#6283ff);">
    <div class="container">
        <div class="navbar-brand wmin-0 mr-5">
            <a href="{{ route('home-page') }}" class="d-inline-block">
                {{--                <img src="{{ asset('assets/images/logo_light.png') }}" alt="">--}}
                <img src="{{ asset('assets/images/qt.png') }}" alt="">
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
        </div>

        {{--<div class="justify-content-center">
            <form class="form-inline my-2 my-lg-0 ">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>--}}
        <div class="collapse navbar-collapse" id="navbar-mobile">

            <ul class="navbar-nav ml-md-auto">
                {{--<li class="nav-item">
                    <a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328/comments" class="navbar-nav-link" target="_blank">
                        Comments
                    </a>
                </li>--}}
                @auth
                    <li class="nav-item dropdown">
                        <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                            <i class="icon-bubbles4"></i>
                            <span class="d-md-none ml-2">Messages</span>
                            <span class="badge badge-mark border-pink-400 ml-auto ml-md-0"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                            <div class="dropdown-content-header">
                                <span class="font-weight-semibold">Messages</span>
                                <a href="#" class="text-default"><i class="icon-compose"></i></a>
                            </div>

                            <div class="dropdown-content-body dropdown-scrollable">
                                <ul class="media-list">
                                    <li class="media">
                                        <div class="mr-3 position-relative">
                                            <img src="{{ url('/') }}/assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                        </div>

                                        <div class="media-body">
                                            <div class="media-title">
                                                <a href="#">
                                                    <span class="font-weight-semibold">James Alexander</span>
                                                    <span class="text-muted float-right font-size-sm">04:58</span>
                                                </a>
                                            </div>

                                            <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="mr-3 position-relative">
                                            <img src="{{ url('/') }}/assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                        </div>

                                        <div class="media-body">
                                            <div class="media-title">
                                                <a href="#">
                                                    <span class="font-weight-semibold">Margo Baker</span>
                                                    <span class="text-muted float-right font-size-sm">12:16</span>
                                                </a>
                                            </div>

                                            <span class="text-muted">That was something he was unable to do because...</span>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="mr-3">
                                            <img src="{{ url('/') }}/assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title">
                                                <a href="#">
                                                    <span class="font-weight-semibold">Jeremy Victorino</span>
                                                    <span class="text-muted float-right font-size-sm">22:48</span>
                                                </a>
                                            </div>

                                            <span class="text-muted">But that would be extremely strained and suspicious...</span>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="mr-3">
                                            <img src="{{ url('/') }}/assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title">
                                                <a href="#">
                                                    <span class="font-weight-semibold">Beatrix Diaz</span>
                                                    <span class="text-muted float-right font-size-sm">Tue</span>
                                                </a>
                                            </div>

                                            <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="mr-3">
                                            <img src="{{ url('/') }}/assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-title">
                                                <a href="#">
                                                    <span class="font-weight-semibold">Richard Vango</span>
                                                    <span class="text-muted float-right font-size-sm">Mon</span>
                                                </a>
                                            </div>

                                            <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="dropdown-content-footer bg-light">
                                <a href="#" class="text-grey mr-auto">All messages</a>
                                <div>
                                    <a href="#" class="text-grey" data-popup="tooltip" title="Mark all as read"><i class="icon-radio-unchecked"></i></a>
                                    <a href="#" class="text-grey ml-2" data-popup="tooltip" title="Settings"><i class="icon-cog3"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-user">
                        <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                            @if(isset(auth()->user()->media) && isset(auth()->user()->media->main_image) && isset(auth()->user()->media->main_image->styles['thumbnail']))
                                <img src="{{url('/')}}/{{ auth()->user()->media->main_image->styles['thumbnail'] }}" class="rounded-circle" height="34" alt="{{ auth()->user()->name }}"/>
                            @else
                                <img src="{{ url('/') }}/assets/images/user.png" class="rounded-circle" height="34" alt="{{ auth()->user()->name }}"/>
                            @endif
                            <span>{{ auth()->user()->name }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('user-profile') }}" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                            <a href="{{ route('edit-profile') }}" class="dropdown-item"><i class="icon-pencil"></i> Edit Profile</a>
                            <a href="{{ route('messages') }}" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages
                                <span class="badge badge-pill bg-indigo-400 ml-auto">
                                    @include('website.messages.unread-count')
                                </span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('account-setting') }}" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                            <a href="{{ route('user-logout') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                        </div>
                    </li>
                    @else

                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-sm bg-danger-400 font-weight-semibold shadow mt-2 mr-2">
                                LOG IN
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('signup') }}" class="btn btn-sm bg-orange-400 font-weight-semibold shadow mt-2">
                                SIGN UP
                            </a>
                        </li>
                    @endauth
            </ul>
        </div>
    </div>
</div>

<div class="navbar navbar-expand-md navbar-dark gradient-2 navbar-sticky navbar-static" style="">
    <div class="text-center d-md-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-second">
            <i class="icon-unfold mr-2"></i>
            Alternative navbar
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-second">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link legitRipple">
                    <i class="icon-git-branch mr-2"></i>
                    Branches
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="navbar-nav-link legitRipple">
                    <i class="icon-git-merge mr-2"></i>
                    Merges
                    <span class="badge badge-pill bg-teal-800 position-static ml-auto ml-md-2">5</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="navbar-nav-link legitRipple">
                    <i class="icon-git-pull-request mr-2"></i>
                    Pull Requests
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-md-auto">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link legitRipple">
                    <i class="icon-repo-forked mr-2"></i>
                    Repositories
                    <span class="badge badge-pill bg-teal-800 position-static ml-auto ml-md-2">28</span>
                </a>
            </li>
        </ul>
    </div>
</div>