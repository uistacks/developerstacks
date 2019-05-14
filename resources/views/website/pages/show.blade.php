@extends('website.master')
@section('content')
    <!----------------------------------------Banner----------------------------------->
    <div class="inner-banner back-img relative" style="background-image:url({{ url('/') }}/public/website-assets/images/blog2.jpg)">
        {{--<div class="inner-cap">
            <div class="ttl-blog">
                {{ $item->trans->title }}
            </div>
            <div class="sm-text-contact">
                I like the geometric visual, bold typo, easy grid and the well balan ced
                whitespace. Gallery PhotoCreative Corporate, CommunityCompany Profile,
                Agency and other.
            </div>
        </div>--}}
    </div>
    <!----------------------------------------Middle Section----------------------------------->
    <section class="middle-sec inner-pages">
        <div class="main-faq-sec">
            <div class="container">
                <div class="inner-faq">

                    <div class="about-us-section">
                        <div class="about-top-desc">
                            <div class="ttl-blog">
                                {{ $item->trans->title }}
                            </div>
                            <div class="about-sec text-center">
                                {!! $item->trans->body !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection
@section('footer')

@stop