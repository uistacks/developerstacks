<div class="page-header page-header-light mb-0">
    <div class="page-header-content border-bottom-2 border-bottom-danger">

    </div>
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('home-page') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
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

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>