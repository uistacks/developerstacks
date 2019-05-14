<input type="hidden" id="base_path" value="{{url('/')}}/" />

<header class="animate">
    <nav class="cust-head">
        <div class="head-top">
            <div class="head-top-left">
                <ul class="clearfix">
                    <li><i class="fa fa-envelope"></i><span>{{ \Uistacks\Settings\Models\Setting::find(3)->value }}</span></li>
                    <li><i class="fa fa-mobile-phone"></i><span>{{ \Uistacks\Settings\Models\Setting::find(4)->value }}</span></li>
                </ul>
            </div>
        </div>
        <div class="head-bottom clearfix animate">
            <div class="head-bot-left pull-left">
                <div class="logo">
                    <a href="{{ url('/') }}/"><img src="{{ url('/') }}/public/website-assets/images/logo.jpg"></a>
                </div>
            </div>
            <div class="head-bot-right clearfix pull-right">
                <div class="head-login-blk">
                    <ul class="clearfix">
                        <li>
                            {{--<a href="javascript:void(0)" data-toggle="modal" data-target="#login"><i class="fa fa-user "></i><span>Login</span></a>--}}
                            <a href="{{ action('Auth\LoginController@login') }}" ><i class="fa fa-user "></i><span>Login</span></a>
                        </li>
                        <li>
                            {{--<a href="javascript:void(0)" data-toggle="modal" data-target="#register"><i class="fa fa-edit"></i><span>Register</span></a>--}}
                            <a href="{{ action('Auth\RegisterController@register') }}" ><i class="fa fa-edit"></i><span>Register</span></a>
                        </li>
                    </ul>
                </div>
                <div class="head-social-blk">
                    <ul class="clearfix">
                        <li><a href="javascript:void(0)" class="bg-fb"><i class="fa fa-facebook animate"></i></a></li>
                        <li><a href="javascript:void(0)" class="bg-gp"><i class="fa fa-google-plus animate"></i></a></li>
                        <li><a href="javascript:void(0)" class="bg-tw"><i class="fa fa-twitter animate"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>