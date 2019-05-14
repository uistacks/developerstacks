@extends('website.master')
@section('content')
    <div class="content">
        @include('website.home.blocks.top-head')
        @include('website.regions.header')
        <hr class="hredit">
        @include('website.home.blocks.search-filter')
        <div class="results-search">
            <div class="container">
                <div class="row">
                    @if($items->count())
                        @foreach($items as $key1 => $item)
                            <div class="col-sm-6 col-md-4 col-xs-12">
                                <div class="thumbnail result-info">
                                    <h3>
                                        <a href="{{ action('SearchController@storeDetail', $item->id) }}">
                                            @if($item->trans)
                                                {{ $item->trans->name }}
                                            @endif
                                        </a>
                                    </h3>
                                    <div class="caption">
                                        <h4>
                                            @if($item->activity)
                                                {{ $item->activity->trans->name }}
                                            @endif
                                        </h4>
                                        <ul>
                                            <li>
                                                <i class="fa fa-globe" aria-hidden="true"></i>{{isset($item) ? substr($item->trans->location,0,25).'..' : ""}}
                                            </li>
                                            <li>
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                <span>
                                                            @if(isset($item))
                                                        {{ ($item->view_count > 0) ? $item->view_count : "0" }}
                                                    @endif views
                                                        </span>
                                            </li>
                                            <li>
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <span>
                                                            @if(isset($item))
                                                        {{ ($item->search_count > 0) ? $item->search_count : "0" }}
                                                    @endif search
                                                        </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <div class="insta-link"> <i class="fa fa-instagram" aria-hidden="true"></i> </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center alert alert-danger">
                            {{ trans('Core::operations.no_records') }}
                        </div>
                    @endif
                </div>
                {{--<div class="text-center">--}}
                    {{--<div class="pagination-area"> {!! $items->render() !!} </div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@endsection
@section('footer')

@stop