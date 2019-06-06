<!-- Include Media model -->
@include('Media::modals.modal')
<!-- end include Media model -->
<div class="sidebar-content">
    <!-- User menu -->
    <div class="sidebar-user-material">
        <div class="sidebar-user-material-body">
            <div class="card-body text-center">
                @if(!request()->is('*/profile'))
                    <form class="form-horizontal" id="frm_change_picture" method="post" action="{{ action('UserController@changePicture') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                        <a data-toggle="modal" data-target="#qurative_media_modal" href="javascript:void(0)" media-data-button-name="{{ trans('Core::operations.select') }} User Image" media-data-field-name="main_image_id" media-data-required>
                            <div class="media-item">
                                @if(isset(auth()->user()->media) && isset(auth()->user()->media->main_image) && isset(auth()->user()->media->main_image->styles['thumbnail']))
                                    <img src="{{url('/')}}/{{ auth()->user()->media->main_image->styles['thumbnail'] }}" class="img-fluid rounded-circle shadow-1 mb-1" width="80" height="80" alt="{{ auth()->user()->name }}"/>
                                    <input type="hidden" name="main_image_id" value="{{auth()->user()->media->main_image->id}}">
                                @else
                                    <img src="{{ url('/') }}/assets/images/user.png" class="img-fluid rounded-circle shadow-1 mb-1" width="80" height="80" alt="{{ auth()->user()->name }}"/>
                                @endif
                            </div>
                        </a>
                    </form>
                @else
                    <div class="media-item">
                        @if(isset(auth()->user()->media) && isset(auth()->user()->media->main_image) && isset(auth()->user()->media->main_image->styles['thumbnail']))
                            <img src="{{url('/')}}/{{ auth()->user()->media->main_image->styles['thumbnail'] }}" class="img-fluid rounded-circle shadow-1 mb-1" width="80" height="80" alt="{{ auth()->user()->name }}"/>
                        @else
                            <img src="{{ url('/') }}/assets/images/user.png" class="img-fluid rounded-circle shadow-1 mb-1" width="80" height="80" alt="{{ auth()->user()->name }}"/>
                        @endif
                    </div>
                @endif
                <h6 class="mb-0 text-white text-shadow-dark">{{ auth()->user()->name }}</h6>
                <span class="font-size-sm text-white text-shadow-dark">{{ auth()->user()->address }}</span>
            </div>

            <div class="sidebar-user-material-footer">
                <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
            </div>
        </div>

        <div class="collapse" id="user-nav">
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="{{ route('user-profile') }}" class="nav-link">
                        <i class="icon-user-plus"></i>
                        <span>My profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('edit-profile') }}" class="nav-link">
                        <i class="icon-pencil"></i>
                        <span>Edit Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('messages') }}" class="nav-link">
                        <i class="icon-comment-discussion"></i>
                        <span>Messages</span>
                        <span class="badge bg-success-400 badge-pill align-self-center ml-auto">
                            @include('website.messages.unread-count')
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('account-setting') }}" class="nav-link">
                        <i class="icon-cog5"></i>
                        <span>Account settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user-logout') }}" class="nav-link">
                        <i class="icon-switch2"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /user menu -->


    <!-- Main navigation -->
    <div class="card card-sidebar-mobile">
        <ul class="nav nav-sidebar" data-nav-type="accordion">

            <!-- Main -->
            <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
            <li class="nav-item">
                <a href="{{ route('user-dashboard') }}" class="nav-link active">
                    <i class="icon-home4"></i>
                    <span>Dashboard
                        {{--<span class="d-block font-weight-normal opacity-50">No active orders</span>--}}
                    </span>
                </a>
            </li>
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Layouts</span></a>

                <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                    <li class="nav-item"><a href="../../../../layout_1/LTR/default/full/index.html" class="nav-link">Default layout</a></li>
                    <li class="nav-item"><a href="index.html" class="nav-link active">Layout 2</a></li>
                    <li class="nav-item"><a href="../../../../layout_3/LTR/default/full/index.html" class="nav-link">Layout 3</a></li>
                    <li class="nav-item"><a href="../../../../layout_4/LTR/default/full/index.html" class="nav-link">Layout 4</a></li>
                    <li class="nav-item"><a href="../../../../layout_5/LTR/default/full/index.html" class="nav-link">Layout 5</a></li>
                    <li class="nav-item"><a href="../../../../layout_6/LTR/default/full/index.html" class="nav-link disabled">Layout 6 <span class="badge bg-transparent align-self-center ml-auto">Coming soon</span></a></li>
                </ul>
            </li>
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Themes</span></a>

                <ul class="nav nav-group-sub" data-submenu-title="Themes">
                    <li class="nav-item"><a href="../../../LTR/default/full/index.html" class="nav-link">Default</a></li>
                    <li class="nav-item"><a href="index.html" class="nav-link active">Material</a></li>
                    <li class="nav-item"><a href="../../../LTR/dark/full/index.html" class="nav-link disabled">Dark <span class="badge bg-transparent align-self-center ml-auto">Coming soon</span></a></li>
                    <li class="nav-item"><a href="../../../LTR/clean/full/index.html" class="nav-link disabled">Clean <span class="badge bg-transparent align-self-center ml-auto">Coming soon</span></a></li>
                </ul>
            </li>
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link"><i class="icon-stack"></i> <span>Starter kit</span></a>

                <ul class="nav nav-group-sub" data-submenu-title="Starter kit">
                    <li class="nav-item"><a href="../seed/layout_nav_horizontal.html" class="nav-link">Horizontal navigation</a></li>
                    <li class="nav-item"><a href="../seed/sidebar_none.html" class="nav-link">No sidebar</a></li>
                    <li class="nav-item"><a href="../seed/sidebar_main.html" class="nav-link">1 sidebar</a></li>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">2 sidebars</a>
                        <ul class="nav nav-group-sub">
                            <li class="nav-item"><a href="../seed/sidebar_secondary.html" class="nav-link">Secondary sidebar</a></li>
                            <li class="nav-item"><a href="../seed/sidebar_right.html" class="nav-link">Right sidebar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">3 sidebars</a>
                        <ul class="nav nav-group-sub">
                            <li class="nav-item"><a href="../seed/sidebar_right_hidden.html" class="nav-link">Right sidebar hidden</a></li>
                            <li class="nav-item"><a href="../seed/sidebar_right_visible.html" class="nav-link">Right sidebar visible</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">Content sidebars</a>
                        <ul class="nav nav-group-sub">
                            <li class="nav-item"><a href="../seed/sidebar_content_left.html" class="nav-link">Left sidebar</a></li>
                            <li class="nav-item"><a href="../seed/sidebar_content_right.html" class="nav-link">Right sidebar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="../seed/layout_boxed.html" class="nav-link">Boxed layout</a></li>
                    <li class="nav-item-divider"></li>
                    <li class="nav-item"><a href="../seed/navbar_fixed_main.html" class="nav-link">Fixed main navbar</a></li>
                    <li class="nav-item"><a href="../seed/navbar_fixed_secondary.html" class="nav-link">Fixed secondary navbar</a></li>
                    <li class="nav-item"><a href="../seed/navbar_fixed_both.html" class="nav-link">Both navbars fixed</a></li>
                    <li class="nav-item"><a href="../seed/layout_fixed.html" class="nav-link">Fixed layout</a></li>
                </ul>
            </li>
            <li class="nav-item"><a href="../../../RTL/default/full/index.html" class="nav-link"><i class="icon-width"></i> <span>RTL version</span></a></li>
            <!-- /main -->


        </ul>
    </div>
    <!-- /main navigation -->

</div>
@include('Media::scripts.scripts')