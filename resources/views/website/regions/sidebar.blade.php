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

            <!-- Layout -->
            <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Layout</div> <i class="icon-menu" title="Layout options"></i></li>
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link"><i class="icon-stack2"></i> <span>Page layouts</span></a>

                <ul class="nav nav-group-sub" data-submenu-title="Page layouts">
                    <li class="nav-item"><a href="layout_fixed_navbar.html" class="nav-link">Fixed navbar</a></li>
                    <li class="nav-item"><a href="layout_fixed_sidebar_custom.html" class="nav-link">Fixed sidebar - custom scroll</a></li>
                    <li class="nav-item"><a href="layout_fixed_sidebar_native.html" class="nav-link">Fixed sidebar - native scroll</a></li>
                    <li class="nav-item"><a href="layout_fixed_footer.html" class="nav-link">Fixed footer</a></li>
                    <li class="nav-item"><a href="layout_hideable_navbar.html" class="nav-link">Hideable navbar</a></li>
                    <li class="nav-item"><a href="layout_without_header.html" class="nav-link">Without page header</a></li>
                    <li class="nav-item-divider"></li>
                    <li class="nav-item"><a href="layout_boxed_default.html" class="nav-link">Boxed with default sidebar</a></li>
                    <li class="nav-item"><a href="layout_boxed_mini.html" class="nav-link">Boxed with mini sidebar</a></li>
                    <li class="nav-item"><a href="layout_boxed_full.html" class="nav-link">Boxed full width</a></li>
                    <li class="nav-item"><a href="layout_boxed_content.html" class="nav-link">Boxed content</a></li>
                </ul>
            </li>
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link"><i class="icon-page-break2"></i> <span>Headers &amp; footers</span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Content styling">
                    <li class="nav-item"><a href="content_page_header.html" class="nav-link">Page header</a></li>
                    <li class="nav-item"><a href="content_page_footer.html" class="nav-link disabled">Page footer <span class="badge bg-transparent align-self-center ml-auto">Coming soon</span></a></li>
                </ul>
            </li>
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link"><i class="icon-indent-decrease2"></i> <span>Sidebars</span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Sidebars">
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">Main sidebar</a>
                        <ul class="nav nav-group-sub">
                            <li class="nav-item"><a href="sidebar_default_collapse.html" class="nav-link">Default collapsible</a></li>
                            <li class="nav-item"><a href="sidebar_default_hide.html" class="nav-link">Default hideable</a></li>
                            <li class="nav-item"><a href="sidebar_default_hidden.html" class="nav-link">Default hidden</a></li>
                            <li class="nav-item"><a href="sidebar_mini_collapse.html" class="nav-link">Mini collapsible</a></li>
                            <li class="nav-item"><a href="sidebar_mini_hide.html" class="nav-link">Mini hideable</a></li>
                            <li class="nav-item"><a href="sidebar_mini_hidden.html" class="nav-link">Mini hidden</a></li>
                            <li class="nav-item-divider"></li>
                            <li class="nav-item"><a href="sidebar_default_color_light.html" class="nav-link">Light color</a></li>
                            <li class="nav-item"><a href="sidebar_default_color_custom.html" class="nav-link">Custom color</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">Secondary sidebar</a>
                        <ul class="nav nav-group-sub">
                            <li class="nav-item"><a href="sidebar_secondary_after.html" class="nav-link">After default</a></li>
                            <li class="nav-item"><a href="sidebar_secondary_before.html" class="nav-link">Before default</a></li>
                            <li class="nav-item"><a href="sidebar_secondary_hidden.html" class="nav-link">Hidden by default</a></li>
                            <li class="nav-item-divider"></li>
                            <li class="nav-item"><a href="sidebar_secondary_color_dark.html" class="nav-link">Dark color</a></li>
                            <li class="nav-item"><a href="sidebar_secondary_color_custom.html" class="nav-link">Custom color</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">Right sidebar</a>
                        <ul class="nav nav-group-sub">
                            <li class="nav-item"><a href="sidebar_right_default_collapse.html" class="nav-link">Show - collapse main</a></li>
                            <li class="nav-item"><a href="sidebar_right_default_hide.html" class="nav-link">Show - hide main</a></li>
                            <li class="nav-item"><a href="sidebar_right_default_toggle.html" class="nav-link">Show - fix default width</a></li>
                            <li class="nav-item"><a href="sidebar_right_mini_toggle.html" class="nav-link">Show - fix mini width</a></li>
                            <li class="nav-item"><a href="sidebar_right_secondary_hide.html" class="nav-link">Show - hide secondary</a></li>
                            <li class="nav-item"><a href="sidebar_right_visible.html" class="nav-link">Visible by default</a></li>
                            <li class="nav-item-divider"></li>
                            <li class="nav-item"><a href="sidebar_right_color_dark.html" class="nav-link">Dark color</a></li>
                            <li class="nav-item"><a href="sidebar_right_color_custom.html" class="nav-link">Custom color</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">Content sidebar</a>
                        <ul class="nav nav-group-sub">
                            <li class="nav-item"><a href="sidebar_content_left.html" class="nav-link">Left position</a></li>
                            <li class="nav-item"><a href="sidebar_content_left_stretch.html" class="nav-link">Left stretched</a></li>
                            <li class="nav-item"><a href="sidebar_content_left_hidden.html" class="nav-link">Left hidden</a></li>
                            <li class="nav-item"><a href="sidebar_content_right.html" class="nav-link">Right position</a></li>
                            <li class="nav-item"><a href="sidebar_content_right_stretch.html" class="nav-link">Right stretched</a></li>
                            <li class="nav-item"><a href="sidebar_content_right_hidden.html" class="nav-link">Right hidden</a></li>
                            <li class="nav-item"><a href="sidebar_content_sections.html" class="nav-link">Sectioned sidebar</a></li>
                            <li class="nav-item-divider"></li>
                            <li class="nav-item"><a href="sidebar_content_color_dark.html" class="nav-link">Dark color</a></li>
                            <li class="nav-item"><a href="sidebar_content_color_custom.html" class="nav-link">Custom color</a></li>
                            <li class="nav-item"><a href="sidebar_content_color_sections_custom.html" class="nav-link">Custom sections color</a></li>
                        </ul>
                    </li>
                    <li class="nav-item-divider"></li>
                    <li class="nav-item"><a href="sidebar_components.html" class="nav-link">Sidebar components</a></li>
                </ul>
            </li>
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link"><i class="icon-menu3"></i> <span>Navbars</span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Navbars">
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">Single navbar</a>
                        <ul class="nav nav-group-sub">
                            <li class="nav-item"><a href="navbar_single_top_static.html" class="nav-link">Single top static</a></li>
                            <li class="nav-item"><a href="navbar_single_top_fixed.html" class="nav-link">Single top fixed</a></li>
                            <li class="nav-item"><a href="navbar_single_bottom_static.html" class="nav-link">Single bottom static</a></li>
                            <li class="nav-item"><a href="navbar_single_bottom_fixed.html" class="nav-link">Single bottom fixed</a></li>
                            <li class="nav-item"><a href="navbar_single_header_before.html" class="nav-link">Before page header</a></li>
                            <li class="nav-item"><a href="navbar_single_header_after.html" class="nav-link">After page header</a></li>
                            <li class="nav-item"><a href="navbar_single_content_after.html" class="nav-link">After page content</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">Multiple navbars</a>
                        <ul class="nav nav-group-sub">
                            <li class="nav-item"><a href="navbar_multiple_top_static.html" class="nav-link">Multiple top static</a></li>
                            <li class="nav-item"><a href="navbar_multiple_top_fixed.html" class="nav-link">Multiple top fixed</a></li>
                            <li class="nav-item"><a href="navbar_multiple_bottom_static.html" class="nav-link">Multiple bottom static</a></li>
                            <li class="nav-item"><a href="navbar_multiple_bottom_fixed.html" class="nav-link">Multiple bottom fixed</a></li>
                            <li class="nav-item"><a href="navbar_multiple_top_bottom.html" class="nav-link">Multiple - top and bottom</a></li>
                            <li class="nav-item"><a href="navbar_multiple_secondary_sticky.html" class="nav-link">Multiple - secondary sticky</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link">Content navbar</a>
                        <ul class="nav nav-group-sub">
                            <li class="nav-item"><a href="navbar_component_single.html" class="nav-link">Single navbar</a></li>
                            <li class="nav-item"><a href="navbar_component_multiple.html" class="nav-link">Multiple navbars</a></li>
                        </ul>
                    </li>
                    <li class="nav-item-divider"></li>
                    <li class="nav-item"><a href="navbar_colors.html" class="nav-link">Color options</a></li>
                    <li class="nav-item"><a href="navbar_sizes.html" class="nav-link">Sizing options</a></li>
                    <li class="nav-item"><a href="navbar_hideable.html" class="nav-link">Hide on scroll</a></li>
                    <li class="nav-item"><a href="navbar_components.html" class="nav-link">Navbar components</a></li>
                </ul>
            </li>
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link"><i class="icon-sort"></i> <span>Vertical navigation</span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Vertical navigation">
                    <li class="nav-item"><a href="navigation_vertical_collapsible.html" class="nav-link">Collapsible menu</a></li>
                    <li class="nav-item"><a href="navigation_vertical_accordion.html" class="nav-link">Accordion menu</a></li>
                    <li class="nav-item"><a href="navigation_vertical_bordered.html" class="nav-link">Bordered navigation</a></li>
                    <li class="nav-item"><a href="navigation_vertical_right_icons.html" class="nav-link">Right icons</a></li>
                    <li class="nav-item"><a href="navigation_vertical_badges.html" class="nav-link">Badges</a></li>
                    <li class="nav-item"><a href="navigation_vertical_disabled.html" class="nav-link">Disabled items</a></li>
                </ul>
            </li>
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link"><i class="icon-transmission"></i> <span>Horizontal navigation</span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Horizontal navigation">
                    <li class="nav-item"><a href="navigation_horizontal_click.html" class="nav-link">Submenu on click</a></li>
                    <li class="nav-item"><a href="navigation_horizontal_hover.html" class="nav-link">Submenu on hover</a></li>
                    <li class="nav-item"><a href="navigation_horizontal_elements.html" class="nav-link">With custom elements</a></li>
                    <li class="nav-item"><a href="navigation_horizontal_tabs.html" class="nav-link">Tabbed navigation</a></li>
                    <li class="nav-item"><a href="navigation_horizontal_disabled.html" class="nav-link">Disabled navigation links</a></li>
                    <li class="nav-item"><a href="navigation_horizontal_mega.html" class="nav-link">Horizontal mega menu</a></li>
                </ul>
            </li>
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link"><i class="icon-tree5"></i> <span>Menu levels</span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Menu levels">
                    <li class="nav-item"><a href="#" class="nav-link"><i class="icon-IE"></i> Second level</a></li>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-firefox"></i> Second level with child</a>
                        <ul class="nav nav-group-sub">
                            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-android"></i> Third level</a></li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-apple2"></i> Third level with child</a>
                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="#" class="nav-link"><i class="icon-html5"></i> Fourth level</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link"><i class="icon-css3"></i> Fourth level</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-windows"></i> Third level</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chrome"></i> Second level</a></li>
                </ul>
            </li>
            <!-- /layout -->

        </ul>
    </div>
    <!-- /main navigation -->

</div>
@include('Media::scripts.scripts')