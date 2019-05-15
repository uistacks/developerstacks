<div class="sidebar-content">
    <!-- User menu -->
    <div class="sidebar-user-material">
        <div class="sidebar-user-material-body">
            <div class="card-body text-center">
                <a href="#">
                    <img src="{{ url('/') }}/assets/images/user.png" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
                </a>
                <h6 class="mb-0 text-white text-shadow-dark">{{ auth()->user()->name }}</h6>
                <span class="font-size-sm text-white text-shadow-dark">{{ auth()->user()->hasRole->role->trans->title }}</span>
            </div>

            <div class="sidebar-user-material-footer">
                <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
            </div>
        </div>

        <div class="collapse" id="user-nav">
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icon-user-plus"></i>
                        <span>My profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icon-coins"></i>
                        <span>My balance</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icon-comment-discussion"></i>
                        <span>Messages</span>
                        <span class="badge bg-teal-400 badge-pill align-self-center ml-auto">58</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="icon-cog5"></i>
                        <span>Account settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin-logout') }}" class="nav-link">
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

            <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}
            {{ request()->is(''.Lang::getlocale().'/admin') ? 'active' : '' }}">
                <a href="{{url('/')}}/{{Lang::getlocale()}}/admin" class="nav-link active">
                    <i class="icon-home4"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if(isset($adminMenu))
                @foreach($adminMenu as $list)
                    <li class="nav-item nav-item-submenu {{ Request::is(ltrim($list['list_head']['link'], '/').'*') ? 'nav-item-open' : '' }}">
                        @if($list['list_head'] && $list['list_head']['name'] && $list['list_head']['link'])
                            <a href="{{ $list['list_head']['link'] }}" class="nav-link">
                                @if(isset($list['icon']))
                                    <i class="icon-{{ $list['icon'] }}"></i>
                                @endif
                                <span>{{ $list['list_head']['name'] }}</span>
                                {{--@if(isset($list['list_tree']))
                                    <span class="fa arrow"></span>
                                @endif--}}
                            </a>
                        @endif
                        @if(isset($list['list_tree']))
                            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                @foreach($list['list_tree'] as $li)
                                    @if($li['name'] && $li['link'])
                                        <li class="nav-item">
                                            <a href="{{ $li['link'] }}" class="nav-link {{ Request::is(ltrim($li['link'], '/')) ? 'active' : '' }}">
                                                @if(Lang::getlocale() == 'en')
                                                    <i class="fa fa-angle-double-right"></i>
                                                @endif
                                                {{ $li['name'] }}
                                                @if(Lang::getlocale() == 'ar')
                                                    <i class="fa fa-angle-double-left"></i>
                                                @endif
                                                @if(isset($li['badge']))
                                                    {!! $li['badge'] !!}
                                                @endif
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <!-- /main navigation -->

</div>