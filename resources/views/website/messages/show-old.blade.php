@extends('website.master')
@section('page_title')
    {{ $thread->subject }}
@endsection
@section('header')

@endsection
@section('content')
    {{--<div class="col-md-6">
        <h1>{{ $thread->subject }}</h1>
        @each('website.messenger.partials.messages', $thread->messages, 'message')

        @include('website.messenger.partials.form-message')
    </div>--}}
    @include('website.regions.leftbar')
    <div class="main-content">
        @include('website.regions.dash-header')

        <div class="page-title">
            <div class="title-env">
                <h1 class="title">{{ $thread->subject }}</h1>
                {{--<p class="description">User profile and story timeline</p>--}}
            </div>
            <div class="breadcrumb-env">
                <ol class="breadcrumb bc-1">
                    <li> <a href="{{ url('/') }}/"><i class="fa-home"></i>Home</a> </li>
                    <li class="active"> <strong>{{ $thread->subject }}</strong> </li>
                </ol>
            </div>
        </div>
        <section class="profile-env">
            <div class="row">
                {{--@include('website.regions.mid-section')--}}
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs nav-tabs-justified tab-cls">
                                {{--<li class=" @if(Request::Segment('2') == 'profile') active @endif">
                                    <a href="{{ route('messages.create') }}" >
                                        <span class="visible-xs"><i class="fa-home"></i></span>
                                        <span class="hidden-xs">Compose Message</span>
                                    </a>
                                </li>--}}
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1>{{ $thread->subject }}</h1>
                                            @each('website.messenger.partials.messages', $thread->messages, 'message')

                                            @include('website.messenger.partials.form-message')


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('website.regions.dash-footer')
    </div>
    @include('website.regions.chat')
@stop
@section('footer')

@stop