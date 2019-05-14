@extends('website.master')
@section('content')
    <div class="cms-pages faq-page">
        <div class="container">
            @include('website.home.blocks.top-head')
            <div class="login">
                <div class="main-blog-sec">
                    <div class="faq-section">
                        <div class="">
                            <div class="comm-head cms-head">{{ trans("Faqs::faqs.faq") }}</div>
                            <div class="Faq-section cust-collapse">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    @if($item)
                                        @foreach($item as $key => $faqs)
                                            <div class="panel">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h4 class="panel-title">
                                                        <a class="@if($key != "0") collapsed @endif" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{ $key }}" aria-expanded="@if($key == "0") true @else false @endif" aria-controls="collapseOne">
                                                            {{ $faqs->trans->name }} #{{ $key +1 }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne{{ $key }}" class="panel-collapse collapse @if($key == "0") in @endif" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        {!! $faqs->trans->description !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')

@stop