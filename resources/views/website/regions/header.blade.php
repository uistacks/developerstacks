{{--<div class="navbar navbar-expand-md navbar-dark" style="background-color: rgba(0,0,0,0.075); border-bottom-color: rgba(255,255,255,0.35)">--}}
<div class="navbar navbar-expand-md navbar-dark" style="background: linear-gradient(to right,#f077ff,#6283ff);">
    <div class="container">
        <div class="navbar-brand wmin-0 mr-5">
            <a href="{{ route('home-page') }}" class="d-inline-block">
{{--                <img src="{{ asset('assets/images/logo_light.png') }}" alt="">--}}
                <img src="{{ asset('assets/images/qt.png') }}" alt="">
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
        </div>

        {{--<div class="justify-content-center">
            <form class="form-inline my-2 my-lg-0 ">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>--}}
        <div class="collapse navbar-collapse" id="navbar-mobile">

            <ul class="navbar-nav ml-md-auto">
                {{--<li class="nav-item">
                    <a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328/comments" class="navbar-nav-link" target="_blank">
                        Comments
                    </a>
                </li>--}}
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-sm bg-danger-400 font-weight-semibold shadow mt-2 mr-2">
                        LOG IN
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('signup') }}" class="btn btn-sm bg-orange-400 font-weight-semibold shadow mt-2">
                        SIGN UP
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="navbar navbar-expand-md navbar-dark gradient-2 navbar-sticky navbar-static" style="">
    <div class="text-center d-md-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-second">
            <i class="icon-unfold mr-2"></i>
            Alternative navbar
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-second">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link legitRipple">
                    <i class="icon-git-branch mr-2"></i>
                    Branches
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="navbar-nav-link legitRipple">
                    <i class="icon-git-merge mr-2"></i>
                    Merges
                    <span class="badge badge-pill bg-teal-800 position-static ml-auto ml-md-2">5</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="navbar-nav-link legitRipple">
                    <i class="icon-git-pull-request mr-2"></i>
                    Pull Requests
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-md-auto">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link legitRipple">
                    <i class="icon-repo-forked mr-2"></i>
                    Repositories
                    <span class="badge badge-pill bg-teal-800 position-static ml-auto ml-md-2">28</span>
                </a>
            </li>
        </ul>
    </div>
</div>