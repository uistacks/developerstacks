<div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{url('/')}}/{{ App::getLocale() }}/admin" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                @if(isset($breadcrumbs))
                    @foreach($breadcrumbs as $breadcrumb)
                        @if(!empty($breadcrumb['url']))
                            <a href="{{$breadcrumb['url']}}" class="breadcrumb-item">
                                @if(!empty($breadcrumb['icon']))
                                    <i class="icon-{{ $breadcrumb['icon'] }} mr-2"></i>
                                @endif
                                {{ $breadcrumb['name'] }}
                            </a>
                        @else
                            <span class="breadcrumb-item active">{{ $breadcrumb['name'] }}</span>
                        @endif
                    @endforeach
                @endif

            </div>

            {{--<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>--}}
        </div>

        {{--<div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item">
                    <i class="icon-comment-discussion mr-2"></i>
                    Support
                </a>

                <div class="breadcrumb-elements-item dropdown p-0">
                    <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-gear mr-2"></i>
                        Settings
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
                        <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                        <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>

    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - @yield('title')</h4>
            {{--<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>--}}
        </div>

        {{--<div class="header-elements d-none">
            <div class="d-flex justify-content-center">
                <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
                    <i class="icon-bars-alt text-pink-300"></i>
                    <span>Statistics</span>
                </a>
                <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
                    <i class="icon-calculator text-pink-300"></i>
                    <span>Invoices</span>
                </a>
                <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
                    <i class="icon-calendar5 text-pink-300"></i>
                    <span>Schedule</span>
                </a>
            </div>
        </div>--}}
    </div>


</div>