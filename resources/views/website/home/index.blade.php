@extends('website.master')
@section('content')
    <!----------------------------------------Banner----------------------------------->
    @include('website.home.blocks.banner')
    <!----------------------------------------Middle Section----------------------------------->
    <!-----------------book appointment----------------->
    <section class="book-appt-blk">
        <div class="container">
            <div class="book-appt">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#bk-app" aria-controls="profile" role="tab" data-toggle="tab">Book an Appointment</a></li>
                    <li role="presentation"><a href="#src-spe" aria-controls="messages" role="tab" data-toggle="tab">Search Specialist</a></li>
                    <li role="presentation"><a href="#ask-que" aria-controls="settings" role="tab" data-toggle="tab">Ask a Question</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="bk-app">
                        <div class="book-appt-form">
                            <div class="row form-group clearfix">
                                <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                                    <div class="cust-inp">
                                        <input class="form-control" placeholder="full Name">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                                    <div class="cust-inp">
                                        <input class="form-control" placeholder="full Name">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                                    <div class="cust-inp">
                                        <input class="form-control" placeholder="full Name">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 form-group	">
                                    <div class="cust-inp">
                                        <input class="form-control" placeholder="full Name">
                                    </div>
                                </div>

                            </div>
                            <div class="row form-group clearfix">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="cust-text-area">
                                        <textarea class="form-control" placeholder="Message"></textarea>
                                        <div class="book-btn"><button class="btn" type="button">Book Now</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="src-spe">...</div>
                    <div role="tabpanel" class="tab-pane fade" id="ask-que">...</div>
                </div>
            </div>
        </div>
    </section>
    <!----------------- help request ----------------->
    <section class="help-request">
        <div class="container">
            <div class="request-holder">
                <div class="row">
                    <div class="col-md-4 col-xs-12 col-sm-4">
                        <div class="help-info">
                            <div class="more-opt">
                                <a href="javascript:void();"><i class="fa fa-eye"></i></a>
                            </div>
                            <div class="help-head">Overview</div>
                            <div class="help-desp">
                                When an unknown printer took a galley of type and scrambled it to make a type specimen book...
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-4">
                        <div class="help-info">
                            <div class="more-opt">
                                <a href="javascript:void();"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="help-head">Research</div>
                            <div class="help-desp">
                                When an unknown printer took a galley of type and scrambled it to make a type specimen book...
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-4">
                        <div class="help-info">
                            <div class="more-opt">
                                <a href="javascript:void();"><i class="fa fa-calendar"></i></a>
                            </div>
                            <div class="help-head">Appointment</div>
                            <div class="help-desp">
                                When an unknown printer took a galley of type and scrambled it to make a type specimen book...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----------------- trust and safety----------------->
    <section class="trust-category">
        <div class="container">
            <div class="main-heading">Categories</div>
            <div class="trust-holder">
                <ul>
                    <li class="active">
                        <div class="trust-info">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ url('/') }}/public/website-assets/images/1.png" alt="Dermatologist"/>
                                </div>
                                <div class="media-body media-middle">
                                    <h4 class="media-heading">Dermatologist</h4>
                                </div>
                            </div>
                            <div class="trust-bg-img"></div>
                        </div>
                    </li>
                    <li>
                        <div class="trust-info">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ url('/') }}/public/website-assets/images/2.png" alt="Cardiologist"/>
                                </div>
                                <div class="media-body media-middle">
                                    <h4 class="media-heading">Cardiologist</h4>
                                </div>
                            </div>
                            <div class="trust-bg-img"></div>
                        </div>
                    </li>
                    <li>
                        <div class="trust-info">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ url('/') }}/public/website-assets/images/3.png" alt="Obstetrics And Gynecologist"/>
                                </div>
                                <div class="media-body media-middle">
                                    <h4 class="media-heading">Obstetrics And Gynecologist</h4>
                                </div>
                            </div>
                            <div class="trust-bg-img"></div>
                        </div>
                    </li>
                    <li>
                        <div class="trust-info">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ url('/') }}/public/website-assets/images/4.png" alt="Neurologist"/>
                                </div>
                                <div class="media-body media-middle">
                                    <h4 class="media-heading">Neurologist</h4>
                                </div>
                            </div>
                            <div class="trust-bg-img"></div>
                        </div>
                    </li>
                    <li>
                        <div class="trust-info">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ url('/') }}/public/website-assets/images/5.png" alt="Gastroenterologist"/>
                                </div>
                                <div class="media-body media-middle">
                                    <h4 class="media-heading">Gastroenterologist</h4>
                                </div>
                            </div>
                            <div class="trust-bg-img"></div>
                        </div>
                    </li>
                    <li>
                        <div class="trust-info">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ url('/') }}/public/website-assets/images/6.png" alt="Dentist"/>
                                </div>
                                <div class="media-body media-middle">
                                    <h4 class="media-heading">Dentist</h4>
                                </div>
                            </div>
                            <div class="trust-bg-img"></div>
                        </div>
                    </li>
                    <li>
                        <div class="trust-info">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ url('/') }}/public/website-assets/images/7.png" alt="Homeopath"/>
                                </div>
                                <div class="media-body media-middle">
                                    <h4 class="media-heading">Homeopath</h4>
                                </div>
                            </div>
                            <div class="trust-bg-img"></div>
                        </div>
                    </li>
                    <li>
                        <div class="trust-info">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ url('/') }}/public/website-assets/images/8.png" alt="Ayurveda"/>
                                </div>
                                <div class="media-body media-middle">
                                    <h4 class="media-heading">Ayurveda</h4>
                                </div>
                            </div>
                            <div class="trust-bg-img"></div>
                        </div>
                    </li>
                    <li>
                        <div class="trust-info">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ url('/') }}/public/website-assets/images/9.png" alt="Urologist"/>
                                </div>
                                <div class="media-body media-middle">
                                    <h4 class="media-heading">Urologist</h4>
                                </div>
                            </div>
                            <div class="trust-bg-img"></div>
                        </div>
                    </li>
                    <li>
                        <div class="trust-info">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ url('/') }}/public/website-assets/images/10.png" alt="Psychiatrist"/>
                                </div>
                                <div class="media-body media-middle">
                                    <h4 class="media-heading">Psychiatrist</h4>
                                </div>
                            </div>
                            <div class="trust-bg-img"></div>
                        </div>
                    </li>
                    <li>
                        <div class="trust-info">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ url('/') }}/public/website-assets/images/11.png" alt="Ear-nose-throat ENT-specialist"/>
                                </div>
                                <div class="media-body media-middle">
                                    <h4 class="media-heading">Ear-nose-throat ENT-specialist</h4>
                                </div>
                            </div>
                            <div class="trust-bg-img"></div>
                        </div>
                    </li>
                    <li>
                        <div class="trust-info">
                            <div class="media">
                                <div class="media-left">
                                    <img src="{{ url('/') }}/public/website-assets/images/12.png" alt="Ophthalmologist"/>
                                </div>
                                <div class="media-body media-middle">
                                    <h4 class="media-heading">Ophthalmologist</h4>
                                </div>
                            </div>
                            <div class="trust-bg-img"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!----------------- latest news ----------------->
    <section class="latest-news-blk">
        <div class="container">
            <div class="main-heading">Latest News</div>
            <div class="news-holder">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="news-left-hold">
                            <div class="media-left">
                                <img src="{{ url('/') }}/public/website-assets/images/news-blk.png">
                            </div>
                            <div class="media-body news-data">
                                <h4>New Tittle</h4>
                                <p>Lorem Ipsum is simply dummy text printing and typesetting
                                    industry...<p>
                                <div class="news-time"><i class="fa fa-calendar"></i><span>28 2017</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="news-right-hold">
                            <div class="media animate">
                                <div class="media-left">
                                    <span><img src="{{ url('/') }}/public/website-assets/images/news-blk.png"></span>
                                </div>
                                <div class="media-body news-data">
                                    <h4>New Tittle</h4>
                                    <p>Lorem Ipsum is simply dummy text printing and typesetting
                                        industry...<p>
                                    <div class="news-time"><i class="fa fa-calendar"></i><span>28 2017</span></div>
                                </div>
                            </div>
                            <div class="media animate">
                                <div class="media-left">
                                    <span><img src="{{ url('/') }}/public/website-assets/images/news-blk.png"></span>
                                </div>
                                <div class="media-body news-data">
                                    <h4>New Tittle</h4>
                                    <p>Lorem Ipsum is simply dummy text printing and typesetting
                                        industry...<p>
                                    <div class="news-time"><i class="fa fa-calendar"></i><span>28 2017</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="centers-holder" >
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="center-blk">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active animate"><a href="#wel-nes" aria-controls="wel-nes" role="tab" data-toggle="tab">Wellness Centers</a></li>
                                <li role="presentation" class=" animate"><a href="#fit-ness" aria-controls="messages" role="tab" data-toggle="tab">Fitness Centers</a></li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in mCustomScrollbar "  data-mcs-theme="dark" id="wel-nes">
                                    <div class="media">
                                        <div class="media-left">
                                            <span>01</span>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h4>Hospital Name</h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry..<i class="fa fa-map-marker"></i></p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <span>01</span>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h4>Hospital Name</h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry..<i class="fa fa-map-marker"></i></p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <span>01</span>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h4>Hospital Name</h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry..<i class="fa fa-map-marker"></i></p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <span>01</span>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h4>Hospital Name</h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry..<i class="fa fa-map-marker"></i></p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <span>01</span>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h4>Hospital Name</h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry..<i class="fa fa-map-marker"></i></p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <span>01</span>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h4>Hospital Name</h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry..<i class="fa fa-map-marker"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="fit-ness">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="med-img-blk back-img" style="background-image:url(images/medical-image-stethoscope.jpg)"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!----------------- Emergency Blok ----------------->
    <section class="emerg-blk relative back-img" style="background-image:url(images/emergen_img.png)">
        <div class="emerg-cap">
            <h3>FOR EMERGENCY CAll</h3>
            <span>+1846871932</span>
        </div>
        <div class="bnr-heartbet">
            <img src="{{ url('/') }}/public/website-assets/images/heart_beat_sign.png">
        </div>
    </section>
    <!----------------- Best Services ----------------->
    <section class="best-servi-blk">
        <div class="container">
            <div class="main-heading">Our Best Services</div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="best-ser relative">
                        <div class="best-ser-no"><span>01</span></div>
                        <h4>X-Ray</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text...</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="best-ser relative">
                        <div class="best-ser-no"><span>02</span></div>
                        <h4>X-Ray</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text...</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="best-ser relative">
                        <div class="best-ser-no"><span>03</span></div>
                        <h4>X-Ray</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!----------------- subscribe ----------------->
    <section class="subs-blk">
        <div class="container">
            <div class="main-heading">Subscribe Now</div>
            <div class="sub-inp-blk relative">

                <span class="meg-icon"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control" placeholder="your Email Address">
                <div class="subs-btn"> <button class="btn"><i class="fa fa-send"></i></button></div>

            </div>
        </div>
    </section>
@endsection
@section('footer')
    <script src="{{ asset('public/website_assets/js/customize/home.js') }}" type="text/javascript"></script>
@endsection
