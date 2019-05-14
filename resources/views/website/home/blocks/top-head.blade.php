<div class="login-blok-head animate">
    @if(Auth::guest())
    {{--<a href="javascript:void(0)" data-toggle="modal" data-target="#myModallogin"> <span class="user-nav animate">{{ trans('project.login_register') }}</span> <i class="fa fa-user animate"></i> </a>--}}
    <a href="javascript:void(0)" data-toggle="modal" data-target="#myModallogin"> <span class="user-nav animate">{{ trans('project.login_register') }}</span> </a>
    @else
        <ul class="navbar-nav navbar-right user-nav animate">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle user-name-nav" data-toggle="dropdown">{{Auth::user()->name}} <b class="caret"></b>&nbsp; </a>
                <ul class="dropdown-menu user-menu-nav">
                    <li><a href="{{ action('WebsiteController@dashboard') }}">{{ trans('admin.my_profile') }}</a></li>
                    <li><a href="{{ action('WebsiteController@logout') }}">{{ trans('admin.logout') }}</a></li>
                </ul>
            </li>
        </ul>
    @endif
</div>
@if(Request::segment(2) == "search-result")
    <div class="logoedit">
    <a href="{{url('/'.Lang::getLocale().'/home')}}"> <img src="{{url('/')}}/public/website_assets/images/Logo.png" width="20%" /></a>
    </div>
@else
    <div class="logo animate"><a href="{{url('/'.Lang::getLocale().'/home')}}"> <img src="{{url('/')}}/public/website_assets/images/Logo.png" width="37%" /> </a></div>
@endif