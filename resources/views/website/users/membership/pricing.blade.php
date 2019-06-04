@extends('website.master')
@section('page_title')
    Pricing
@endsection
@section('header')
    <style type="text/css">
        /* PRICING TABLE STYLE 2 */

        .tsc_pricingtable02 {
            font-family: "Arimo", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 13px;
            font-weight: normal;
            color: #313131;
            width:100%;
        }
        .tsc_pricingtable02 ul {
            margin: 0px;
            padding: 0px;
            list-style: none;
        }
        .tsc_pricingtable02 ul li {
            margin: 0px;
            width: 100%;
            height: 100%;
            height: 40px;
            padding-top: 10px;
            float: left;
            text-align: center;
            padding-left: 0px;
        }

        .tsc_pricingtable02 li.pricing_header1 {
            height:36px;
            font-size: 18px;
            line-height:24px;
            /*color:#ffffff;*/
            color: #7C38BC;
            -webkit-border-radius:1px 6px 0 0;
            -khtml-border-radius:19px 6px 0 0;
            -moz-border-radius:19px 6px 0 0;
            border-radius:19px 6px 0 0;


        }
        .tsc_pricingtable02 li.pricing_header2 {
            height:60px;
            font-size: 30px;
            font-weight:bold;
            line-height:50px;
            border-bottom:1px solid #cccccc;
            color:#333;
            background-color:#eee;

        }
        .tsc_pricingtable02 li.pricing_header2 span {
            font-size: 12px;
            line-height:40px;
        }

        .tsc_pricingtable02 .pricing_column_first li.pricing_header1 {
            background:none;
        }
        .tsc_pricingtable02 .pricing_column_first li.pricing_header2 {
            background-color:#efefef;
            border-bottom:1px solid #cccccc;

            -webkit-border-radius:19px 0px 0 0;
            -khtml-border-radius:19px 0px 0 0;
            -moz-border-radius:19px 0px 0 0;
            border-radius:19px 0px 0 0;
        }
        .tsc_pricingtable02 .pricing_column_first li.pricing_header2 span {
            font-size:15px;
            font-weight:bold;
            line-height:56px;
            padding-left:16px;
        }

        .tsc_pricingtable02 .pricing_column_first,
        .tsc_pricingtable02 .pricing_column {
            height: 100%;
            float: left;
            margin-right:1px;
            position:relative;
        }
        .tsc_pricingtable02 .pricing_column_first {
            *z-index:2;
        }
        .tsc_pricingtable02 .pricing_hover_area:hover .pricing_column {
            -webkit-transition: all 0.1s ease;
            -moz-transition: all 0.1s ease;
            -o-transition: all 0.1s ease;
            -ms-transition: all 0.1s ease;
            transition: all 0.1s ease;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
            filter: alpha(opacity=80);
            -moz-opacity: 0.8;
            -khtml-opacity: 0.8;
            opacity: 0.8;
        }
        .tsc_pricingtable02 .pricing_hover_area .pricing_column:hover {

            -webkit-transform:scaleY(1.04);
            -moz-transform:scaleY(1.04);
            -o-transform:scaleY(1.04);
            -ms-transform:scaleY(1.04);
            transform:scaleY(1.04);
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
            filter: alpha(opacity=100);
            -moz-opacity: 1;
            -khtml-opacity: 1;
            opacity: 1;
        }
        .tsc_pricingtable02 .pricing_column_first li {
            text-align: left;
        }
        .tsc_pricingtable02 .pricing_column_first li span {
            padding-left:10px;
        }

        /* 2. Columns sizes */

        .pricing_six .pricing_column,
        .pricing_six .pricing_column_first {
            width: 16.5%;
        }
        .pricing_five .pricing_column,
        .pricing_five .pricing_column_first {
            width: 19.8%;
        }
        .pricing_four .pricing_column,
        .pricing_four .pricing_column_first {
            width: 24.8%;
        }
        .pricing_three .pricing_column,
        .pricing_three .pricing_column_first {
            width: 33.1%;
        }


        .tsc_pricingtable02 .odd {
            background-color: #ffffff;
            border-bottom:1px dotted #ccc;
        }
        .tsc_pricingtable02 .even {
            background-color: #efefef;
            border-bottom:1px dotted #ccc;
        }

        .tsc_pricingtable02 .pricing_yes,
        .tsc_pricingtable02 .pricing_no {
            height:20px;
            width:100%;
            float:left;
        }
        .tsc_pricingtable02 .pricing_yes {
            background:url("{{ url('/') }}/public/website_assets/img/yes.png") center top no-repeat;
        }
        .tsc_pricingtable02 .pricing_no {
            background:url("{{ url('/') }}/public/website_assets/img/no.png") center top no-repeat;
        }

        .tsc_pricingtable02 .pricing_footer {
            width: 100%;
            height: 22px;
            padding-top: 14px;
            padding-bottom: 6px;
            float: left;
            border-top: 1px solid #fff;
            border-bottom: 2px solid #ccc;
            /* background-color: #eee; */
        }

        .tooltip {
            position: absolute !important;
            z-index: 1070;
            display: block;
            visibility: visible;
            font-family: "Arimo", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 12px;
            font-weight: 400;
            line-height: 1.4;
            opacity: 1 !important;
            filter: alpha(opacity=0);
        }
        .tsc_pricingtable02 a.tooltip {
            position:relative;
            z-index:24;
            font-size:13px;
            color: #313131;
            text-decoration:none;
            background:url("{{ url('/') }}/public/website_assets/img/info.png") right center no-repeat;
            padding:0 20px 0 10px;
        }
        .tsc_pricingtable02 a.tooltip:hover {
            z-index:25;
            display:inline;
        }
        .tsc_pricingtable02 a.tooltip span {
            position:absolute;
            width: 220px;
            left: 10px;
            top: 25px;
            text-align:left;
            color: #ffffff;
            font-size:13px;
            font-family: "Arimo", "Helvetica Neue", Helvetica, Arial, sans-serif;
            line-height:16px;
            background: rgba(0,0,0,0.9);
            /*background: #000000;
            border: 1px solid #000000;*/
            background: #161E2C;
            border: 1px solid #161E2C;
            text-shadow:none;
            padding: 7px 10px 7px 10px;
            -webkit-border-radius:5px;
            -khtml-border-radius:5px;
            -moz-border-radius:5px;
            border-radius:5px;
            display:block;
            /* Hiding the tooltip */
            visibility:hidden;
            /*opacity: 0;*/
            opacity: 0;
            /* Removing transition when the mouse leaves the tooltip - Fixing a display issue */
            -webkit-transition: all 0s ease;
            -moz-transition: all 0s ease;
            -o-transition: all 0s ease;
            -ms-transition: all 0s ease;
            transition: all 0s ease;
        }
        .tsc_pricingtable02 a.tooltip:hover span {
            /* CSS3 Transition */
            -webkit-transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            -ms-transition: all 0.4s ease;
            transition: all 0.4s ease;
            /* Showing the tooltip */
            visibility:visible;
            opacity: 1;
        }

        .tsc_pricingtable02 .blue a.pricing_button, .tsc_pricingtable02 .blue li.pricing_header1 {
            background-color: #AA2090;
        }
        .tsc_pricingtable02 .green a.pricing_button,
        .tsc_pricingtable02 .green li.pricing_header1 {
            background-color: #5aad17;
        }
        .tsc_pricingtable02 .red a.pricing_button, .tsc_pricingtable02 .red li.pricing_header1 {
            background-color: #F5841A;
        }
        .tsc_pricingtable02 .black a.pricing_button, .tsc_pricingtable02 .black li.pricing_header1 {
            background-color: #4991E3;
        }

        /*****/

        .tsc_pricingtable05 table {
            width: 100%;
            background: #f8f8f8;
            font-family: "Arimo", "Helvetica Neue", Helvetica, Arial, sans-serif;

            border: 1px solid #ccc;

            -moz-border-radius: 1px;
            -webkit-border-radius: 1px;
            border-radius: 1px;
            -moz-box-shadow: 8px 0 10px -10px rgba(0, 0, 0, .15), -8px 10px 10px -10px rgba(0, 0, 0, .15);
            -webkit-box-shadow: 8px 0 10px -10px rgba(0, 0, 0, .15), -8px 10px 10px -10px rgba(0, 0, 0, .15);
            box-shadow: 8px 0 10px -10px rgba(0, 0, 0, .15), -8px 10px 10px -10px rgba(0, 0, 0, .15);
            border-collapse:collapse;
            padding:0px;margin:0;

        }

        .w_table_l_grey{
            background-color:#f6f6f6;
        }
        .w_table_d_grey{
            background-color:#eeeeee;
        }

        .tsc_pricingtable05 table th {
            border-left: 1px dotted #D5D5D5;
            border-right: 1px dotted #D5D5D5;
            border-top: 1px dotted #D5D5D5;
            color: #2F2F2F;
            font-size: 26px;
            height: 90px;
            background: #f6f6f6;
            line-height: 120%;
        }


        .tsc_pricingtable05 table th span {
            color: #23B0F1;
            font-size: 14px;}

        .tsc_pricingtable05 table tr {
            height: 30px;
            text-align: center;}

        .tsc_pricingtable05 table .grey {
            background-color:#fff;}

        .tsc_pricingtable05 table tr td {
            border-left: 1px dotted #D5D5D5;
            border-right: 1px dotted #D5D5D5;

            font-weight: bold;}

        .tsc_pricingtable05 table .btn td {
            border-left: 1px dotted #D5D5D5;
            border-right: 1px dotted #D5D5D5;
            border-bottom: 1px dotted #D5D5D5;}

        .tsc_pricingtable05 table tr .border_blue {
            border-left: 1px dotted #d7d7d7;
            border-right: 1px dotted #d7d7d7;
            background: #ededed;}

        .tsc_pricingtable05 table tr th.border_blue {
            border-left: 1px solid #d7d7d7;
            border-top: 1px solid #d7d7d7;
            border-right: 1px solid #d7d7d7;}

        .tsc_pricingtable05 table tr .border_blue_bottom {
            border-bottom: 1px solid #d7d7d7;}
        .tsc_pricingtable05 table tfoot td.border_blue{
            border-bottom: 1px solid #d7d7d7;
            border-left: 1px solid #d7d7d7;
            border-right: 1px solid #d7d7d7;
        }

        .tsc_pricingtable05 .pricing_btn {
            border-bottom: 1px solid #D5D5D5;
            height: 80px !important;
            text-align:center;
        }

        .pricing_btn .the_button{
            float: none;
            margin-top: 0;
        }

        .tsc_pricingtable05 .pricing_btn .pricing_btn_orbed {
            clear: both;
            display: block;
            float: left;
            height: 44px;
            margin: 0 0 0 52px;
            padding-left: 13px;}

        .tsc_pricingtable05 .pricing_btn .pricing_btn_orbed span {
            color: #FFFFFF;
            display: block;
            float: left;
            font-size: 24px;
            height: 44px;
            line-height: 45px;
            min-width: 100px;
            padding: 0 10px 0 0;}

        .tsc_pricingtable06 {}

        .tsc_pricingtable06 .the_button{
            border:#1b1b1b solid 1px !important;
        }

        .tsc_pricingtable06 table {
            width: 100%;
            background-color: #484848;
            font-family: "Arimo", "Helvetica Neue", Helvetica, Arial, sans-serif;
            border: 1px solid #ccc;

            -moz-border-radius: 1px;
            -webkit-border-radius: 1px;
            border-radius: 1px;
            -moz-box-shadow: 8px 0 10px -10px rgba(0, 0, 0, .15), -8px 10px 10px -10px rgba(0, 0, 0, .15);
            -webkit-box-shadow: 8px 0 10px -10px rgba(0, 0, 0, .15), -8px 10px 10px -10px rgba(0, 0, 0, .15);
            box-shadow: 8px 0 10px -10px rgba(0, 0, 0, .15), -8px 10px 10px -10px rgba(0, 0, 0, .15);
            border-collapse:collapse;
            padding:0px;margin:0;

        }

        .d_table_l_grey{
            background-color:#303030
        }
        .d_table_d_grey{
            background-color:#3a3a3a
        }

        .tsc_pricingtable06 table th {
            border-left: 1px dotted #252525;
            border-right: 1px dotted #252525;
            color: #ffffff;
            line-height: 120%;
            font-size: 26px;
            height: 90px;}

        .tsc_pricingtable06 table th span {
            color: #a9a9a9;
            font-size: 14px;}

        .tsc_pricingtable06 table tr {
            height: 30px;
            text-align: center;}

        .tsc_pricingtable06 table .grey {
            background-color:#3a3a3a;}

        .tsc_pricingtable06 table tr td {
            border-left: 1px dotted #252525;
            border-right: 1px dotted #252525;
            color: #FFFFFF;
            font-weight: bold;}

        .tsc_pricingtable06 .pricing_btn {height: 80px !important;}

        .pricing_black_btn {
            background: url("images/blue_bl_bg_black.jpg") repeat-x scroll 0 0 transparent;
            border: 1px dotted #454545;
            color: #FFFFFF;
            font-size: 24px;
            height: 44px;
            padding: 9px 10px;}

        .pricing_blue_btn {
            background: url("images/blue_bl_bg_blue.jpg") repeat-x scroll 0 0 transparent;
            color: #FFFFFF;
            font-size: 24px;
            height: 44px;
            padding: 9px 10px;}

        .the_button {
            border-bottom: 1px dotted #9f9f9f;
            border-right: 1px dotted #c5c5c5;
            border-left: 1px dotted #c5c5c5;
            float: left;
            color: #050505;
            display: inline-block;
            font-size: 12px;
            font-weight: bold;
            height: 33px;
            letter-spacing: -0.7px;
            line-height: 33px;
            margin: 0;
            text-align: center;
            width: auto;
            padding:0 15px;
            position:relative;
            z-index:1002;

            -moz-border-radius:5px;
            -khtml-border-radius:5px;
            -webkit-border-radius:5px;
            border-radius:5px;

            background: #dddddd;
            background: -webkit-gradient(linear, 0 0, 0 bottom, from(#ffffff), to(#dddddd));
            background: -webkit-linear-gradient(#ffffff, #dddddd);
            background: -moz-linear-gradient(#ffffff, #dddddd);
            background: -ms-linear-gradient(#ffffff, #dddddd);
            background: -o-linear-gradient(#ffffff, #dddddd);
            background: linear-gradient(#ffffff, #dddddd);
            -pie-background: linear-gradient(#ffffff, #dddddd);
        }

        .the_button:hover, .the_button.active {
            color: #ffffff;
            border-bottom: 1px solid #9f9f9f;
            border-right: 1px solid #c5c5c5;
            border-left: 1px solid #c5c5c5;

            background: #2e2e2e;
            background: -webkit-gradient(linear, 0 0, 0 bottom, from(#2e2e2e), to(#2e2e2e));
            background: -webkit-linear-gradient(#2e2e2e, #2e2e2e);
            background: -moz-linear-gradient(#2e2e2e, #2e2e2e);
            background: -ms-linear-gradient(#2e2e2e, #2e2e2e);
            background: -o-linear-gradient(#2e2e2e, #2e2e2e);
            background: linear-gradient(#2e2e2e, #2e2e2e);
            -pie-background: linear-gradient(#2e2e2e, #2e2e2e);
        }

        a {
            font-family: "Arimo", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size:13px;
            font-weight:normal;
            text-decoration: none;
            outline: medium none;
            color:#000;
        }
        .recommended_tl {
            background: #AF5A0A;
            color: #fff;
            display: block;
            font-size: 12px;
            left: 50%;
            margin-left: -37%;
            padding: 5px 0;
            position: absolute;
            top: -5px;
            width: 80%;
            z-index: 24;
            box-shadow: 0 1px 2px #383838;
            -moz-box-shadow: 0 1px 2px #383838;
            -webkit-box-shadow: 0 1px 2px #383838;
            -o-box-shadow: 0 1px 2px #383838;
            -ms-box-shadow: 0 1px 2px #383838;
        }
        .recommended_tl::before {
            border-bottom: 8px solid #7B2600;
            border-left: 10px solid rgba(0,0,0,0);
            content: "";
            left: -10px;
            position: absolute;
            top: 0;
        }
    </style>
@endsection
@section('content')

    <div class="main-content">
        {{--<h3 class="text-center" id="layout-variants">
            Select The Right Plan For Your Choice
        </h3>--}}
        {{--<hr/>--}}
        {{--<br /> <small>9 different layout types with fixed or static scrolling panels</small> </h3>--}}
        <div class="panel panel-default pricing-table">
            <div class="panel-heading">
                <h3 class="text-center" id="layout-variants">
                    Select The Right Plan For Your Choice
                </h3>
            </div>
            <div class="panel-body layout-variants">
                <!-- DC Pricing Tables:2 Start -->
                <div class="tsc_pricingtable02 pricing_six">
                    {{--<ul class="pricing_column_first">
                        <li class="pricing_header1"></li>
                        <li class="pricing_header2"><span>Choose a Plan</span></li>
                        <li class="odd"> <a class="tooltip" href="#">Monthly fee <span>The fee you pay Doogenie.com monthly to use the service.</span> </a> </li>
                        <li class="even"> <a class="tooltip" href="#">Fixed price project fee <span>The Fee you pay Doogenie.com when you accept to work on a fixed price project</span> </a> </li>
                        <li class="odd"><span>Domain Names</span></li>
                        <li class="even"> <a class="tooltip" href="#">Subdomains <span>Number of subdomain assigned to your account. </a> </li>
                        <li class="odd"><span>Site Builder</span></li>
                        <li class="even"><span>Backups</span></li>
                        <li class="odd"> <a class="tooltip" href="#">CPANEL <span>Web-based control panel system.</span> </a> </li>
                        <li class="even"><span>Email Accounts</span></li>
                        <li class="odd"><span>MySQL Databases</span></li>
                        <li class="even"> <a class="tooltip" href="#">Setup Fee <span>One-time joining fee that must be paid prior to account activation.</span> </a> </li>
                        <li class="odd"><span>24/7 Support</span></li>
                        <li class="even"><span>30-Days Money Back</span></li>
                        <li class="odd"><span>Templates</span></li>
                        <li class="pricing_footer"></li>
                    </ul>--}}
                    <ul class="pricing_column_first">
                        <li class="pricing_header1" style="height: 110px;"></li>
                        <li class="pricing_footer"></li>
                        {{--<li class="odd"> <a class="tooltip" href="#">Monthly fee <span>The fee you pay Doogenie.com monthly to use the service.</span> </a> </li>--}}
                        <li class="odd"> <a class="tooltip" href="#">Fixed price project fee <span>The Fee you pay Doogenie.com when you accept to work on a fixed price project</span> </a> </li>
                        <li class="even"><a class="tooltip" href="#">Hourly project <span>The Fee you pay Doogenie.com when you accept to work on a fixed price project</span> </a> </li>
                        <li class="odd"> <a class="tooltip" href="#">Bids per month <span>Number of subdomain assigned to your account.</span> </a> </li>
                        <li class="even"> <a class="tooltip" href="#">Skills <span>Number of subdomain assigned to your account.</span> </a> </li>
                        <li class="odd"> <a class="tooltip" href="#">Portfolio slots <span>Number of subdomain assigned to your account.</span> </a> </li>
                        <li class="even"> <a class="tooltip" href="#">Project bookmarks <span>Web-based control panel system.</span> </a> </li>
                        <li class="odd"> <a class="tooltip" href="#">Employer following <span>Number of subdomain assigned to your account.</span> </a> </li>
                        <li class="even"> <a class="tooltip" href="#">Verified freelancer tag <span>All bids are concealed so that freelancers cannot see what other freelancers are bidding ensuring more accurate and higher quality bids.</span> </a> </li>
                        <li class="odd"> <a class="tooltip" href="#">Concealed Project<span>All bids are concealed so that freelancers cannot see what other freelancers are bidding ensuring more accurate and higher quality bids.</span> </a> </li>
                        <li class="even"> <a class="tooltip" href="#">NON-Disclosure Project<span>All bids are concealed so that freelancers cannot see what other freelancers are bidding ensuring more accurate and higher quality bids.</span> </a> </li>
                        <li class="odd"> <a class="tooltip" href="#">Project Extension<span>All bids are concealed so that freelancers cannot see what other freelancers are bidding ensuring more accurate and higher quality bids.</span> </a> </li>
                        <li class="even"> <a class="tooltip" href="#">Milestone Payment<span>All bids are concealed so that freelancers cannot see what other freelancers are bidding ensuring more accurate and higher quality bids.</span> </a> </li>
                        <li class="odd"> <a class="tooltip" href="#">Project Posting<span>All bids are concealed so that freelancers cannot see what other freelancers are bidding ensuring more accurate and higher quality bids.</span> </a> </li>
                    </ul>
                    <div class="pricing_hover_area">
                        @if($memberships)
                            @foreach($memberships as $k => $item)
                                <?php
                                $my_array = array("red","green","blue","black");
                                $i = rand(0, count($my_array)-1);
                                //                                shuffle($my_array);
                                ?>
                                <ul class="pricing_column">
                                    {{--<span class="recommended_tl">Recommended</span>--}}
                                    <li class="pricing_header1" style="height: 110px;">
                                        <i class="fa-certificate"></i> {{ $item->trans->name }}
                                        <p>
                                            @if(\Request::Segment(1) == 'ngn')
                                                ₦{{ $item->monthly_fee_ngn }}
                                            @else
                                                ${{ $item->monthly_fee }}
                                            @endif
                                        </p>
                                        <p>
                                            @if(isset($userMembership) && $item->id == $userMembership->plan_id)
                                                <button class="btn btn-white disabled">
                                                    Current Plan<br/>
                                                    Renews {{ $userMembership->expiry_date }}
                                                </button>
                                            @else
                                                <a href="{{ action('PricingController@upgradePlan', [$item->id]) }}" class="btn btn-purple bg-lg">Subscribe</a>
                                            @endif
                                        </p>
                                    </li>
                                    <li class="pricing_footer"></li>
                                    <li class="odd">
                                        {{ $item->fixed_project_dynamic_fee }}% or
                                        @if(\Request::Segment(1) == 'ngn')
                                            ₦{{ $item->fixed_project_static_fee_ngn }}
                                        @else
                                            ${{ $item->fixed_project_static_fee }}
                                        @endif
                                    </li>
                                    <li class="even">{{ $item->hourly_project_fee }}%</li>
                                    <li class="odd">{{ $item->bid_per_month }}</li>
                                    <li class="even">{{ $item->skills }}</li>
                                    <li class="odd">{{ $item->portfolio_slots }}</li>
                                    <li class="even">{{ $item->project_bookmarks }}</li>
                                    <li class="odd">{{ $item->employer_following }}</li>
                                    <li class="even">{{ $item->verified_freelancer_tag }}</li>
                                    <li class="odd">{{ $item->concealed_project }}</li>
                                    <li class="even">{{ $item->non_disclosure_project }}</li>
                                    <li class="odd">{{ $item->project_extension }}</li>
                                    <li class="even">{{ $item->milestone_payment }}</li>
                                    <li class="odd">{{ $item->project_posting }}</li>
                                </ul>
                            @endforeach
                        @endif
                    </div>

                    <?php
                    /*
                    ?>
                    {{--<div class="pricing_hover_area">
                        @if($memberships)
                            @foreach($memberships as $k => $item)
                                <?php
                                $my_array = array("red","green","blue","black");
                                $i = rand(0, count($my_array)-1);
                                ?>
                                <ul class="pricing_column {{ $my_array[$i] }}">
                                    <li class="pricing_header1">{{ $item->trans->name }}</li>
                                    <li class="pricing_header2">${{ $item->monthly_fee }} <span>/mo.</span></li>
                                    <li class="odd">${{ $item->fixed_project_static_fee }}</li>
                                    <li class="even">{{ $item->fixed_project_dynamic_fee }}%</li>
                                    <li class="odd">{{ $item->hourly_project_fee }}%</li>
                                    <li class="even">{{ $item->bid_per_month }}</li>
                                    <li class="odd">{{ $item->skills }}</li>
                                    <li class="even">{{ $item->portfolio_slots }}</li>
                                    <li class="odd">{{ $item->project_bookmarks }}</li>
                                    <li class="even">{{ $item->employer_following }}</li>
                                    <li class="odd">{{ $item->verified_freelancer_tag }}</li>
                                    <li class="even">{{ $item->concealed_project }}</li>
                                    <li class="odd">{{ $item->non_disclosure_project }}</li>
                                    <li class="even">{{ $item->project_extension }}</li>
                                    <li class="odd">{{ $item->milestone_payment }}</li>
                                    <li class="odd">{{ $item->project_posting }}</li>
                                    <li class="pricing_footer"><a href="{{ action('PricingController@upgradePlan', [$item->id]) }}" class="tsc_buttons2 voilet">Subscribe</a></li>
                                </ul>
                            @endforeach
                        @endif
                    </div>--}}
<?php
                        */
                    ?>
                </div>
                <!-- DC Pricing Tables:2 End -->
                <div class="tsc_clear"></div> <!-- line break/clear line -->
            </div>
        </div>

    </div>

    @include('website.regions.footer')
@endsection
@section('footer')
    <script type="text/javascript">
        // table interaction
        jQuery(document).ready(function($) {
            $('.tsc_pricingtable05 td, .tsc_pricingtable05 th')
                .live('mouseenter' , function(){
                    var the_parent = $('.tsc_pricingtable05');
                    the_parent.find('*').removeClass('border_blue');
                    var index = $(this).index();
                    the_parent.find('tr').each(function(i){
                        var item = $(this);
                        if(item.hasClass('grey')){
                            item.find('th:eq('+index+') , td:eq('+index+')').addClass('w_table_l_grey');
                        }else{
                            item.find('th:eq('+index+') , td:eq('+index+')').addClass('w_table_d_grey');
                        }
                    });
                })
                .live('mouseleave' , function(){
                    $('.tsc_pricingtable05').find('*').removeClass('w_table_d_grey').removeClass('w_table_l_grey');
                });

            $('.tsc_pricingtable06 td, .tsc_pricingtable06 th')
                .live('mouseenter' , function(){
                    var the_parent = $('.tsc_pricingtable06');

                    the_parent.find('*').removeClass('pricing_blue_btn');
                    var index = $(this).index();
                    the_parent.find('tr').each(function(i){
                        var item = $(this);
                        if(item.hasClass('grey')){
                            item.find('th:eq('+index+') , td:eq('+index+')').addClass('d_table_l_grey');
                        }else{
                            item.find('th:eq('+index+') , td:eq('+index+')').addClass('d_table_d_grey');
                        }
                    });
                })
                .live('mouseleave' , function(){
                    $('.tsc_pricingtable06').find('*').removeClass('d_table_l_grey').removeClass('d_table_d_grey');
                });
        });
        // table interaction END

    </script>
@endsection