<style>
    .jumbotron {
        padding: 8rem 2rem !important;
    }
    .section-header .circle-wrapper {
        position: relative;
        height: 400px;
        width: 400px;
        margin: 35px auto;
    }
    .section-header .circle.circle-1 {
        width: 100px;
        height: 100px;
    }
    .section-header .circle {
        position: absolute;
        padding: 0;
        background: transparent;
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 50%;
        z-index: 2;
        left: 0;
        right: 0;
        margin-right: auto;
        margin-left: auto;
        top: 0;
        bottom: 0;
        margin: auto;
    }
    .section-header .circle.circle-2 {
        width: 250px;
        height: 250px;
    }
    .section-header .circle.circle-3 {
        width: 400px;
        height: 400px;
    }
    .section-header .circle-wrapper .icons {
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: 3;
    }
    .section-header .circle-wrapper .icons a.circle-1:nth-of-type(1) {
        left: 154px;
        right: auto;
    }
    .section-header .circle-wrapper .icons a.circle-1:nth-of-type(1) {
        left: 154px;
        right: auto;
    }
    .section-header .circle-wrapper .icons a {
        display: flex;
        position: absolute;
        align-items: center;
        justify-content: center;
        top: 50%;
        left: 50%;
        margin: -1.5em;
        border-radius: 50%;
        background-color: white;
        padding: 1px;
        box-shadow: 0 13px 27px -5px rgba(50,50,93,0.25), 0 8px 16px -8px rgba(0,0,0,0.3), 0 -6px 16px -6px rgba(0,0,0,0.025);
    }
    a, a:hover, a:focus, .btn:focus, .btn:hover, .btn:active, .btn:active:focus, .btn:active.focus, .btn.active:focus, .btn.active.focus {
        text-decoration: none;
        outline: 0;
        outline-color: transparent;
        outline-style: none;
    }

    .section-header .circle-wrapper .icons a img {
        width: 95%;
        border-radius: 50%;
    }

    .announcement {
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        width: calc(100% + 30px * 2);
        padding: 10px 30px;
        font-size: 17px;
        font-weight: 300;
        color: white;
        text-decoration: none;
        background: rgba(54,39,93,0.08);
    }

    @media (min-width: 768px) {
        .announcement {
            width: auto;
            margin-top: 60px;
            margin-bottom: 10px;
            padding: 3px 15px;
            border-radius: 30px;
        }
    }
    @media (min-width: 992px) {
        .col-md-6 {
            width: 50%;
        }
    }
    @media (min-width: 992px) {
        .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
            float: left;
        }
    }

    @media (min-width: 1200px) {
        .section-header .circle-wrapper {
            margin-left: 155px;
        }
    }
    .section-header .circle-wrapper .icons a.circle-1 {
        width: 3em;
        height: 3em;
    }

    .section-header .circle-wrapper .icons a.circle-2 {
        width: 3.3em !important;
        height: 3.3em !important;;
    }

    .section-header .circle-wrapper .icons a.circle-3 {
        width: 3.5em;
        height: 3.5em;
    }

    .section-header .circle-wrapper .icons a.circle-2:nth-of-type(1) {
        left: 124px;
        right: auto;
        top: auto;
        bottom: 99px;
    }

    .section-header .circle-wrapper .icons a.circle-3:nth-of-type(1) {
        left: 197px;
        right: auto;
        top: auto;
        bottom: 0px;
    }

    .section-header .circle-wrapper .icons a.circle-1:nth-of-type(2) {
        right: 154px;
        left: auto;
    }

    .section-header .circle-wrapper .icons a.circle-3:nth-of-type(2) {
        right: 5px;
        left: auto;
        top: auto;
        bottom: 142px;
    }

    .section-header .circle-wrapper .icons a.circle-2:nth-of-type(3) {
        top: 74px;
        left: 198px;
        right: auto;
    }

    .section-header .circle-wrapper .icons a.circle-3:nth-of-type(3) {
        top: auto;
        bottom: 142px;
        left: 5px;
        right: auto;
    }

    .section-header .circle-wrapper .icons a.circle-3:nth-of-type(4) {
        top: 65px;
        bottom: auto;
        left: 44px;
        right: auto;
    }
    .section-header .circle-wrapper .icons a.circle-3:nth-of-type(5) {
        top: 65px;
        bottom: auto;
        right: 44px;
        left: auto;
    }

    .section-header .circle-wrapper .icons a.circle-2:nth-of-type(2) {
        right:124px;
        left:auto;
        top:auto;
        bottom:99px
    }

    .section-header .circle-wrapper .icons a.circle-3:nth-of-type(3) img {
        width: 75%;
    }

</style>
<div class="jumbotron text-white rounded-0 mb-0">
    <div class="container text-center">

        {{--<div class="row flex-column-center section-header">
            <div class="col-sm-10 col-md-6">
                <div class="info text-align-left mt-5">
                    <h1 class="display-4 font-weight-thin"><span class="font-weight-light">Qurative</span> - responsive web application kit</h1>
                    <p class="lead mb-4">A powerful admin template. One style, 5 layouts, hundreds of components, thousands of pages and unlimited possibilities!</p>
                    <div class="pt-5">
                        <a href="demo/bs4/Template/layout_1/LTR/default/full/index.html" class="btn bg-dark text-uppercase font-size-sm line-height-sm font-weight-semibold py-2 px-3 shadow  d-block d-sm-inline-block mb-3 mb-sm-0" target="_blank">
                            Live preview
                            <i class="icon-circle-right2 ml-2"></i>
                        </a>
                        <a href="http://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="btn bg-pink-400 text-uppercase font-size-sm line-height-sm font-weight-semibold py-2 px-3 ml-sm-4 shadow  d-block d-sm-inline-block" target="_blank">
                            Purchase
                            <i class="icon-cart ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 ">
                <div class="circle-wrapper">
                    <div class="circle circle-1"></div>
                    <div class="circle circle-2"></div>
                    <div class="circle circle-3"></div>
                    <div class="icons">
                        <span>
                            <a href="/bootstrap-themes" class="circle-1" style="">
                                <img class="icon" rel="tooltip" title="" src="{{ url('/') }}/assets/images/sketch.jpg" data-original-title="Sketch">
                            </a>
                            <a href="/bootstrap-themes" class="circle-1" style="">
                                <img class="icon" rel="tooltip" title="" src="{{ url('/') }}/assets/images/photoshop.jpg" data-original-title="Photoshop">
                            </a>
                        </span>
                        <span>
                            <a href="/search?q=laravel" class="circle-2" style="">
                                <img class="icon" rel="tooltip" title="" src="{{ url('/') }}/assets/images/laravel.jpg" data-original-title="Laravel">
                            </a>
                            <a href="/search?q=asp.net" class="circle-2" style="">
                                <img class="icon" rel="tooltip" title="" src="{{ url('/') }}/assets/images/aspnet.jpg" data-original-title="Asp.net">
                            </a>
                            <a href="/search?q=nodejs" class="circle-2" style="">
                                <img class="icon" rel="tooltip" title="" src="{{ url('/') }}/assets/images/nodejs.jpg" data-original-title="Node.js">
                            </a>
                        </span>
                        <span>
                            <a href="/bootstrap-themes/vuejs-themes" class="circle-3" style="">
                                <img class="icon" rel="tooltip" title="" src="{{ url('/') }}/assets/images/vue.jpg" data-original-title="Vue.js">
                            </a>
                            <a href="/search?q=react+native" class="circle-3" style="">
                                <img class="icon" rel="tooltip" title="" src="{{ url('/') }}/assets/images/react-native.jpg" data-original-title="React Native">
                            </a>
                            <a href="/bootstrap-themes" class="circle-3" style="">
                                <img class="icon" rel="tooltip" title="" src="{{ url('/') }}/assets/images/bootstrap.jpg" data-original-title="Bootstrap">
                            </a>
                            <a href="/bootstrap-themes/react-themes" class="circle-3" style="">
                                <img class="icon" rel="tooltip" title="" src="{{ url('/') }}/assets/images/react.jpg" data-original-title="React">
                            </a>
                            <a href="/bootstrap-themes/angular-themes" class="circle-3" style="">
                                <img class="icon" rel="tooltip" title="" src="{{ url('/') }}/assets/images/angular.jpg" data-original-title="Angular">
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>--}}

        <h1 class="display-4 font-weight-thin"><span class="font-weight-light">Qurative</span> - responsive web application kit</h1>
        <p class="lead mb-4">A powerful admin template. One style, 5 layouts, hundreds of components, thousands of pages and unlimited possibilities!</p>

        <div class="pt-3">
            <a href="demo/bs4/Template/layout_1/LTR/default/full/index.html" class="btn bg-dark text-uppercase font-size-sm line-height-sm font-weight-semibold py-2 px-3 shadow  d-block d-sm-inline-block mb-3 mb-sm-0" target="_blank">
                Live preview
                <i class="icon-circle-right2 ml-2"></i>
            </a>
            <a href="http://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="btn bg-pink-400 text-uppercase font-size-sm line-height-sm font-weight-semibold py-2 px-3 ml-sm-4 shadow  d-block d-sm-inline-block" target="_blank">
                Purchase
                <i class="icon-cart ml-2"></i>
            </a>
        </div>

    </div>
</div>
