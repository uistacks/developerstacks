@extends('website.master')
@section('content')
    <div class="main-content ">
        <div class="project-detail-container main-container grey-bg">
            <div id="main" class="container" aria-label="Content">

                <div class="profile-v3  PageProfile" itemscope="" itemtype="https://schema.org/Organization">
                    <meta itemprop="mainEntityOfPage" content="True">

                    <div class="profile-cover-mask">
                        <section class="profile-cover profile-cover-websites " id="profile-cover">
                            <span class="profile-cover-img" style="background-image: url(&quot;//cdn6.f-cdn.com/static/img/profiles/cover-websites.jpg&quot;); left: 0px; top: 85.5px; display: none;" data-stellar-ratio="0.75"></span>
                            <div class="profile-cover-overlay">
                            </div>
                            <script>(function() {if (window.performance && window.performance.mark && window.performance.clearMarks) {  performance.clearMarks('cover_image'); performance.mark('cover_image');  var scripts = document.getElementsByTagName('script');  var currentScript = scripts[scripts.length - 1];  var el = currentScript.previousElementSibling;  var imgUrl = el.style.backgroundImage;  imgUrl = imgUrl.substring(4, imgUrl.length-1);  if (imgUrl[0] === "'" || imgUrl[0] === '"') {    imgUrl = imgUrl.substring(1, imgUrl.length-1);  }  var img = new Image ();  img.onload = function () {    performance.clearMarks('cover_image'); performance.mark('cover_image');  };  img.src = imgUrl;}})();</script>
                        </section>
                    </div>


                    <section class="profile-intro-sticky is-sticky" id="sticky-bar" style="">
                        <div class="Container">
                            <div class="Grid Grid--verticalCenter">
                                <nav class="Grid-col Grid-col--5 Grid-col--flexContainer" data-anchor-scroll="true">
                                    <a class="profile-nav-link" href="#profile-top">About Me</a>
                                    <a class="profile-nav-link" href="#profile-portfolio">Portfolio</a>

                                    <a class="profile-nav-link" href="#profile-experience">Resume</a>
                                </nav>
                                <div class="Grid-col Grid-col--4 Grid-col--flexContainer">
                                    <figure class="profile-intro-avatar">
                                        <img class="profile-intro-avatar-image" itemprop="logo" src="//cdn3.f-cdn.com/ppic/80751074/logo/17436082/Fv8dO/profile_logo_.jpg" alt="Profile image of gkrthk">
                                    </figure>
                                    <div class="profile-intro-details-inner">
                                        <meta itemprop="url" content="https://www.freelancer.com/u/gkrthk">
                                        <h2 class="profile-intro-username" itemprop="name">
                                            Karthik G.
                                        </h2>
                                        <div class="Rating Rating--labeled" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" data-star_rating="5.0">
                        <span class="Rating-total">
                            <meta itemprop="bestRating" content="5">
                            <meta itemprop="worstRating" content="0">
                            <meta itemprop="ratingValue" content="5.0">
                            <meta itemprop="reviewCount" content="11">
                            <span class="Rating-progress"></span>
                        </span>
                                            <span class="Rating-review">
                            11 reviews
                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="Grid-col Grid-col--3 profile-intro-cta">
                                    <!-- Sticky nav buttons -->





                                    <button class="btn btn-small hireme-btn profile-intro-cta-btn hireme-modal-trigger" hireme-event="ShowModal" hireme-label="ProfilePageNavBar">
                                        <span class="fl-icon-bird"></span>Hire Me
                                    </button>



                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="profile-info" id="profile-details">
                        <span class="profile-top-anchor" id="profile-top"></span>


                        <div class="Container">
                            <div class="Grid">
                                <div class="Grid-col" id="sticky-start">


                                    <div class="profile-info-card">

                                        <!-- ngIf: profile.canViewEmployer -->

                                        <section class="profile-avatar">
                                            <figure class="profile-image">

                                                <div class="profile-image-ImageThumbnail ImageThumbnail ImageThumbnail--fluid">
                                                    <div class="profile-image-bordered  profile-image-rounded">
                                                        <div class="profile-image-wrapper">
                                                            <img class="profile-image-ImageThumbnail-image ImageThumbnail-image" src="//cdn3.f-cdn.com/ppic/80751074/logo/17436082/Fv8dO/profile_logo_.jpg" alt="Profile image of Karthik G.">
                                                        </div>
                                                        <script>(function() {if (window.performance && window.performance.mark && window.performance.clearMarks) {  performance.clearMarks('profile_image'); performance.mark('profile_image');  var scripts = document.getElementsByTagName('script');  var currentScript = scripts[scripts.length - 1];  var el = currentScript.previousElementSibling;  el.addEventListener('load', function() {    performance.clearMarks('profile_image'); performance.mark('profile_image');  });}})();</script>
                                                    </div>
                                                </div>


                                            </figure>
                                            <div class="profile-user-name">
                                                @gkrthk
                                                <ul class="profile-user-achievements">

                                                    <li class="MembershipBadge MembershipBadge--plan25-5-1" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="top" data-original-title="Plus Membership" aria-label="Plus Membership Badge">


                                                    </li></ul>
                                            </div>

                                            <div class="profile-verified" data-qtsb-sub-section="verification">
                                                <ul class="verified-list">


                                                    <li class="verified-item verified-payment" data-qtsb-engagement="truei" data-qtsb-label="payment-unverified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="disabled" data-placement="top" data-original-title="Is not Payment Verified"><span class="Icon"><svg class="Icon-image" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.447 2.106c-.34-.17-.744-.133-1.047.095L16 4.75 12.6 2.2c-.355-.266-.844-.266-1.2 0L8 4.75 4.6 2.2c-.304-.227-.708-.264-1.047-.094C3.213 2.276 3 2.622 3 3v9c0 5.524 8.2 9.72 8.55 9.894l.45.227.45-.226C12.8 21.72 21 17.524 21 12V3c0-.378-.214-.724-.553-.894zM15 10h-3.5c-.275 0-.5.225-.5.5 0 .276.225.5.5.5h1c1.38 0 2.5 1.122 2.5 2.5 0 1.208-.86 2.22-2 2.45V17h-2v-1H9v-2h3.5c.276 0 .5-.224.5-.5 0-.275-.224-.5-.5-.5h-1C10.122 13 9 11.878 9 10.5c0-1.206.86-2.217 2-2.45V7h2v1h2v2z"></path></svg>
</span>



                                                    </li><li class="is-verified verified-item verified-email" data-qtsb-engagement="true" data-qtsb-label="email-verified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="top" data-original-title="Email Verified"><span class="Icon"><svg class="Icon-image" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
  <path d="M12 10.823l8.965-5.563C20.677 5.1 20.352 5 20 5H4c-.352 0-.678.1-.965.26L12 10.823z"></path>
  <path d="M12.527 12.85c-.16.1-.344.15-.527.15s-.366-.05-.527-.15l-9.47-5.877C2.003 6.983 2 6.99 2 7v9c0 1.1.897 2 2 2h16c1.103 0 2-.9 2-2V7c0-.01-.003-.02-.003-.028l-9.47 5.877z"></path>
</svg>
</span>




                                                    </li><li class="is-verified verified-item verified-profile" data-qtsb-engagement="true" data-qtsb-label="profile-complete" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="top" data-original-title="Completed Profile 100%"><span class="Icon"><svg class="Icon-image" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  <path d="M12.002 12.006c2.206 0 4-1.795 4-4s-1.794-4-4-4-4 1.795-4 4 1.795 4 4 4zM12.002 13.006c-4.71 0-8 2.467-8 6v1h16v-1c0-3.533-3.29-6-8-6z"></path>
</svg>
</span>




                                                    </li><li class="is-verified verified-item verified-phone" data-qtsb-engagement="true" data-qtsb-label="phone-verified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="top" data-original-title="Phone Verified"><span class="Icon"><svg class="Icon-image" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
    <path d="M15,21h5a1,1,0,0,0,1-1V16a1,1,0,0,0-1-1H16a1,1,0,0,0-1,1v1a6.91,6.91,0,0,1-7-7H9a1,1,0,0,0,1-1V5A1,1,0,0,0,9,4H5A1,1,0,0,0,4,5v5A11,11,0,0,0,15,21Z"></path>
</svg>
</span>





                                                    </li><li class="verified-item verified-email" data-qtsb-engagement="true" data-qtsb-label="deposit-unmade" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="disabled" data-placement="top" data-original-title="Has not made a Deposit"><span class="Icon"><svg class="Icon-image" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
    <path d="M2 18c0 1.104.897 2 2 2h16c1.104 0 2-.896 2-2v-8H2v8zm13-6h4v2h-4v-2zM5 12h7v2H5v-2zm0 3h5v2H5v-2zM20 4H4C2.897 4 2 4.9 2 6v2h20V6c0-1.102-.896-2-2-2z"></path>
</svg>
</span>

                                                    </li></ul>
                                            </div>


                                            <div itemprop="location" itemscope="" itemtype="https://schema.org/PostalAddress" class="profile-location">

                                                <a href="/freelancers/India/">
                                                    <img alt="Flag of India" src="https://cdn5.f-cdn.com/img/flags/png/in.png?v=b0c4b5f62b04db2b53390284a5e9cc3c&amp;m=6" title="India" class="profile-location-flag small-flag india" aria-label="India">
                                                </a>


                                                <span class="PageProfile-info-locality" itemprop="addressLocality">Chennai</span>,

                                                <span class="profile-country-time">
                                <a href="/freelancers/India/">
                                    <span itemprop="addressCountry" class="profile-location-name">
                                        India
                                    </span>
                                </a>
                            <span class="" id="local-time"> <time class="profile-local-time">12:24AM</time></span>
                            </span>
                                            </div>

                                            <div class="profile-membership-length">

                                                Member since October 31, 2015

                                            </div>
                                            <div class="profile-recommendation">
                                                <span data-target="recommend-btn-val">0</span> Recommendations
                                            </div>


                                            <div class="profile-report-user">
                                                <a href="#">Report User</a>
                                            </div>

                                        </section>

                                        <section class="profile-about ">


                                            <div class="profile-username-wrapper">
                                                <h1 class="profile-intro-username">Karthik G.</h1>
                                                <div fl-online-offline-icon="" size="large" user-id="17436082" class="profile-status ng-isolate-scope online-status" ng-class="{'is-hidden': profile.mode === 'edit'}" data-size="large" data-status="offline">
                                                    <span class="online-text">Online</span>
                                                    <span class="offline-text">Offline</span>
                                                </div>
                                            </div>
                                            <div class="profile-user-byline edit-widget is-editable ng-isolate-scope" ng-class="{'is-hovered': isHover,
                'is-invalid': (flInlineEditText.length > maxLength || flInlineEditText.length < 1),
                'is-editable': mode === 'edit'}" ng-mouseenter="hoverItem(mode, true, isActive)" ng-mouseleave="hoverItem(mode, false, isActive)" ng-click="triggerEdit(mode)" ng-keydown="preventNewLine($event)" fl-inline-edit-text="profile.user.about.tagline" placeholder-text="Professional Headline - e.g. Graphic Designer" max-length="50" mode="profile.mode" save-function="profile.saveByline"><button class="edit-widget-trigger ng-hide" ng-show="showEditBtn(mode, isActive)"><fl-svg src="/static/icons/flicon-pencil.svg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flicon-pencil"><g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"><path d="M7.415 21.085l-6.5 2 2-6.5 12-12 4.5 4.5z"></path><path d="M14.915 4.585l3.086-3.086a2.005 2.005 0 0 1 2.828 0l1.672 1.672a2.005 2.005 0 0 1 0 2.828l-3.086 3.086m-2.25-2.25l-10.75 10.75m-3.5-1l1 1h2.5v2.5l1 1m-5.5-1l2 2m12.5-19l4.5 4.5"></path></g></svg></fl-svg></button><div ng-hide="isActive"><span ng-show="showPlaceholder(mode, flInlineEditText)" i18n-id="5e66cf6a5660ba5416110266b5eb1dfe" i18n-msg="Enter your Professional Headline" class="ng-hide">Enter your Professional Headline</span> <span class="ng-binding">HTML/CSS|Java/Spring | JS/jQuery/Angular|AWS</span></div><textarea ng-show="isActive" ng-model="flInlineEditText" fl-maxlength="maxLength" ng-class="{'edit-widget-input': isActive}" placeholder="Professional Headline - e.g. Graphic Designer" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-hide">    </textarea><span class="edit-widget-counter ng-binding ng-scope ng-hide" ng-show="isActive" i18n-id="a01032543aa459fdb077fc9cc029c839" i18n-msg="${maxLength - flInlineEditText.length} characters left">6 characters left </span><button class="btn btn-small btn-info edit-widget-btn ng-hide" ng-show="isActive" ng-click="save(flInlineEditText)" ng-disabled="(flInlineEditText.length > maxLength || flInlineEditText.length < 1)" i18n-id="c9cc8cce247e49bae79f15173ce97354" i18n-msg="Save">Save</button> <button class="btn-small btn edit-widget-btn ng-hide" ng-show="isActive" ng-click="cancelEdit()" i18n-id="ea4788705e6873b424c65e91c2846b19" i18n-msg="Cancel">Cancel</button></div>
                                            <div data-qtsb-section="about">
                                                <div id="profile-about-description-wrapper" class="profile-about-description-wrapper">
                                                    <div class="edit-widget is-editable ng-isolate-scope" ng-class="{'is-hovered' : isHover,
                'is-invalid': (flInlineEditTextarea.length > maxLength || flInlineEditTextarea.length < 1),
                'is-editable': mode === 'edit'}" ng-mouseenter="hoverItem(mode, true, isActive)" ng-mouseleave="hoverItem(mode, false, isActive)" ng-click="triggerEdit(mode)" fl-inline-edit-textarea="profile.user.about.profile_description" placeholder-text="Tell us a bit about yourself" max-length="1000" mode="profile.mode" save-function="profile.saveDescription"><button class="edit-widget-trigger ng-hide" ng-show="showEditBtn(mode, isActive)"><fl-svg src="/static/icons/flicon-pencil.svg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flicon-pencil"><g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"><path d="M7.415 21.085l-6.5 2 2-6.5 12-12 4.5 4.5z"></path><path d="M14.915 4.585l3.086-3.086a2.005 2.005 0 0 1 2.828 0l1.672 1.672a2.005 2.005 0 0 1 0 2.828l-3.086 3.086m-2.25-2.25l-10.75 10.75m-3.5-1l1 1h2.5v2.5l1 1m-5.5-1l2 2m12.5-19l4.5 4.5"></path></g></svg></fl-svg></button><p ng-hide="isActive"><span ng-show="showPlaceholder(mode, flInlineEditTextarea)" class="profile-about-description ng-hide" i18n-id="5534fda2f918aa647d414a30844b7f97" i18n-msg="Enter your profile summary">Enter your profile summary</span> <span class="profile-about-description ng-binding">I have over 8 years of work experience in Java Web Technologies.
I am an Oracle Certified Java Programmer.
I am a Certified AWS Associate.
Good debugging and interpersonal skill.
Hands on work experience in Java/J2EE, JavaScript, jQuery, Spring Boot, Spring MVC and Web Flow, Microservices, Angular2-6, Node.js.
I have been consulting as an AWS Architect/Enterprise Java Architect to build best-in class applications with the latest of technologies.
I am here to build the project exactly the way you want and can provide valuable input (if needed) for better result.
I take full responsibility for the work I do and will complete on time.
 My goal is to keep my clients on the leading edge of information technologies, adding significant value to their business.


Please initiate a chat in and feel free to discuss your requirements.</span></p><textarea ng-show="isActive" ng-model="flInlineEditTextarea" fl-maxlength="maxLength" ng-class="{'edit-widget-input profile-about-description-input': isActive}" placeholder="Tell us a bit about yourself" class="ng-pristine ng-untouched ng-valid ng-isolate-scope ng-hide">    </textarea><span class="edit-widget-counter ng-binding ng-scope ng-hide" ng-show="isActive" i18n-id="9382523c3216b15383b56ec1673b8297" i18n-msg="${maxLength - flInlineEditTextarea.length} characters left">163 characters left </span><button class="btn btn-small btn-info edit-widget-btn ng-hide" ng-show="isActive" ng-click="save(flInlineEditTextarea)" ng-disabled="(flInlineEditTextarea.length > maxLength || flInlineEditTextarea.length < 1)" i18n-id="c9cc8cce247e49bae79f15173ce97354" i18n-msg="Save">Save</button> <button class="btn-small btn edit-widget-btn ng-hide" ng-show="isActive" ng-click="cancelEdit()" i18n-id="ea4788705e6873b424c65e91c2846b19" i18n-msg="Cancel">Cancel</button></div>
                                                </div>

                                                <button id="profile-description-expand" class="profile-description-expand" data-expand="false">
                                                    <span class="expand-text">Read more</span>
                                                    <span class="truncate-text">Show Less</span>
                                                </button>

                                            </div>
                                        </section>


                                        <section class="profile-statistics">




                        <span class="btn-dropdown hireme-btn-group" id="profile-action-button">




                            <button class="btn btn-info btn-large
                                hireme-modal-trigger" hireme-event="ShowModal" ,="" hireme-label="ProfilePage">
                                Hire Me
                            </button>

                                                        <span class="btn-dropdown-options">
                                                                <a id="profile-invite-btn" class="signup-modal-trigger" data-target="#invite-project-modal" data-toggle="modal">
                                    Invite to project
                                </a>
                                                                    <a id="follow-trigger" class="signup-modal-trigger profile-follow-trigger" data-action="on" data-user-id="17436082">
                                                                                    Follow                                                                            </a>
                                                                <a href="#" class="signup-modal-trigger js-recommend-link" data-target="recommend-btn" data-uid="17436082" data-tooltip-size="large" data-tooltip-state="error" data-placement="bottom">
                                    Recommend
                                </a>
                            </span>
                            <button class="btn
                                btn-dropdown-trigger
                                btn-info
                                btn-large
                                ">
                        </button>
                        </span>






                                            <div class="profile-hourly-rate">
                                        <span class="hourly-rate-value">

                                                ₹737


                                        </span>
                                                INR/hr


                                            </div>




                                            <!-- Employer star rating -->
                                            <div class="Rating Rating--labeled profile-user-rating ng-hide" ng-show="profile.user.role === 'employer'" data-toggle="tooltip" data-placement="bottom" data-original-title="Average rating for all completed projects" data-star_rating="">
                                <span class="Rating-total">
                                    <span class="Rating-progress"></span>
                                </span>
                                                <!-- ngIf: profile.user.employerStats.rep.entire_history.count_all_reviews -->
                                                <!-- ngIf: !profile.user.employerStats.rep.entire_history.count_all_reviews --><span class="Rating-review ng-scope" ng-if="!profile.user.employerStats.rep.entire_history.count_all_reviews">
                                    0 reviews                                </span><!-- end ngIf: !profile.user.employerStats.rep.entire_history.count_all_reviews -->
                                            </div>


                                            <!-- Freelancer star rating -->
                                            <div class="Rating Rating--labeled profile-user-rating" ng-show="profile.user.role === 'freelancer'" data-toggle="tooltip" data-placement="bottom" data-original-title="Average rating for all completed projects" data-star_rating="5.0">
                                <span class="Rating-total">
                                    <span class="Rating-progress"></span>
                                </span>
                                                <span class="Rating-review">
                                    11 reviews
                                </span>
                                            </div>

                                            <!-- Employer earnings score -->

                                            <div class="Earnings ng-hide" ng-show="profile.user.role === 'employer'" data-user_earnings="" data-toggle="tooltip" data-placement="bottom" data-original-title="Amount earned doing projects in this skill or category.
                                    Increases as projects are successfully completed and
                                    paid through the site.">
                                <span class="Earnings-label ng-binding">

                                </span>
                                                <span class="Earnings-icon"></span>
                                                <span class="Earnings-total">
                                    <span class="Earnings-progress" style="width: NaN%">
                                    </span>
                                </span>
                                            </div>


                                            <!-- Freelancer earnings score -->
                                            <div class="Earnings" ng-show="profile.user.role === 'freelancer'" data-user_earnings="4.4" data-toggle="tooltip" data-placement="bottom" data-original-title="Amount earned doing projects in this skill or category.
                                    Increases as projects are successfully completed and
                                    paid through the site.">
                                <span class="Earnings-label">
                                    4.4
                                </span>
                                                <span class="Earnings-icon"></span>
                                                <span class="Earnings-total">
                                    <span class="Earnings-progress" style="width:44.056%">
                                    </span>
                                </span>
                                            </div>

                                            <!-- Freelancer stats -->
                                            <ul class="item-stats" ng-show="profile.user.role === 'freelancer'">
                                                <li class="is-good

                                    ">
                                                    <span class="item-stats-value">100%</span><span class="item-stats-name">Jobs Completed</span>
                                                </li><li class="is-good

                                    ">
                                                    <span class="item-stats-value">83%</span><span class="item-stats-name">On Budget</span>
                                                </li><li class="is-good

                                    ">
                                                    <span class="item-stats-value">100%</span><span class="item-stats-name">On Time</span>
                                                </li><li class="is-good

                                    ">
                                                    <span class="item-stats-value">40%</span><span class="item-stats-name">Repeat Hire Rate</span>


                                                </li></ul>

                                            <!-- Employer stats -->

                                            <ul class="item-stats ng-hide" ng-show="profile.user.role === 'employer'">
                                                <li class="item-stats-stat ng-isolate-scope is-good" ng-class="{
      'is-good': percentageValue >= good || !isPercentage,
      'is-average': percentageValue >= bad &amp;&amp; percentageValue < good,
      'is-negative': percentageValue < bad &amp;&amp; percentageValue > 0
    }" value="profile.user.employerStats.rep.entire_history.totalOpen" ispercentage="false"><!-- ngIf: value === 0 && isPercentage --><!-- ngIf: value > 0 && isPercentage --><!-- ngIf: !isPercentage --><span class="item-stats-value ng-binding ng-scope" ng-if="!isPercentage"> </span><!-- end ngIf: !isPercentage --><span class="item-stats-name" ng-transclude=""><span class="ng-scope">
                                    Open projects
                                </span></span></li>

                                                <li class="item-stats-stat ng-isolate-scope is-good" ng-class="{
      'is-good': percentageValue >= good || !isPercentage,
      'is-average': percentageValue >= bad &amp;&amp; percentageValue < good,
      'is-negative': percentageValue < bad &amp;&amp; percentageValue > 0
    }" value="profile.user.employerStats.rep.entire_history.totalActive" ispercentage="false"><!-- ngIf: value === 0 && isPercentage --><!-- ngIf: value > 0 && isPercentage --><!-- ngIf: !isPercentage --><span class="item-stats-value ng-binding ng-scope" ng-if="!isPercentage"> </span><!-- end ngIf: !isPercentage --><span class="item-stats-name" ng-transclude=""><span class="ng-scope">
                                    Active projects
                                </span></span></li>

                                                <li class="item-stats-stat ng-isolate-scope is-good" ng-class="{
      'is-good': percentageValue >= good || !isPercentage,
      'is-average': percentageValue >= bad &amp;&amp; percentageValue < good,
      'is-negative': percentageValue < bad &amp;&amp; percentageValue > 0
    }" value="profile.user.employerStats.rep.entire_history.totalCompleted" ispercentage="false"><!-- ngIf: value === 0 && isPercentage --><!-- ngIf: value > 0 && isPercentage --><!-- ngIf: !isPercentage --><span class="item-stats-value ng-binding ng-scope" ng-if="!isPercentage"> </span><!-- end ngIf: !isPercentage --><span class="item-stats-name" ng-transclude=""><span class="ng-scope">
                                    Past projects
                                </span></span></li>

                                                <li class="item-stats-stat ng-isolate-scope is-good" ng-class="{
      'is-good': percentageValue >= good || !isPercentage,
      'is-average': percentageValue >= bad &amp;&amp; percentageValue < good,
      'is-negative': percentageValue < bad &amp;&amp; percentageValue > 0
    }" value="profile.user.employerStats.rep.entire_history.total" ispercentage="false"><!-- ngIf: value === 0 && isPercentage --><!-- ngIf: value > 0 && isPercentage --><!-- ngIf: !isPercentage --><span class="item-stats-value ng-binding ng-scope" ng-if="!isPercentage"> </span><!-- end ngIf: !isPercentage --><span class="item-stats-name" ng-transclude=""><span class="ng-scope">
                                    Total projects
                                </span></span></li>
                                            </ul>




                                        </section>


                                    </div>



                                </div>
                            </div>
                        </div>

                    </section>



                    <div class="Container">
                        <h3 ng-show="profile.portfolioCount" class="profile-portfolio-header">Portfolio</h3>
                    </div>





                    <section class="profile-portfolio-section" id="profile-portfolio" data-qtsb-section="portfolio" data-qtsb-engagement="true" ng-show="profile.user.role === 'freelancer'" ng-class="{'is-edit':profile.directiveData.isEditing}" data-edit-tooltip="Edit portfolio mode">

                        <div class="section-inner">





                            <div class="profile-portfolio-wrapper" id="profile-portfolio-wrapper">
                                <ul class="profile-portfolio-items" id="profile-portfolio-items">
                                    <li data-qtsb-engagement="true" data-qtsb-subsection="item" id="4368462" ng-click="profile.openPortfolioModal(4368462, $event)" data-qtsb-label="view_more_portfolio" class="profile-portfolio-item">
                                        <div class="profile-portfolio-item-inner">
                                            <div class="profile-portfolio-hover">
                                                <h6 class="profile-portfolio-hover-title">
                                                    AWS SES - Mailwizz Integration
                                                    <span class="profile-portfolio-hover-link">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve" class="flicon-play">
<g>
    <polygon fill="none" points="1.5,1.5 38.5,20 1.5,38.5   "></polygon>
</g>
</svg>
 View
                                    </span>
                                                </h6>
                                            </div>

                                            <img alt="AWS SES - Mailwizz Integration" class="profile-portfolio-thumb" src="https://cdn3.f-cdn.com//files/download/67844681/c8eb25.jpg">





                                            <div class="profile-portfolio-placeholder has-thumbnail" data-portfolio-type="new_other" alt="This Project is for installing Mailwizz in AWS EC2 Instance and integrating the same with SES for mail delivery for one of the clients.
Installing Mailwizz in EC2 and setting up Route53 for DNS for the domain of client  and then to configure AWS SES integration with Mailwizz deliver server.">
                                                <span class="profile-portfolio-placeholder-icon"></span>
                                                <div class="profile-portfolio-placeholder-label">file</div>
                                            </div>




                                        </div>
                                    </li>
                                    <li data-qtsb-engagement="true" data-qtsb-subsection="item" id="4368456" ng-click="profile.openPortfolioModal(4368456, $event)" data-qtsb-label="view_more_portfolio" class="profile-portfolio-item">
                                        <div class="profile-portfolio-item-inner">
                                            <div class="profile-portfolio-hover">
                                                <h6 class="profile-portfolio-hover-title">
                                                    EasySales - Angular2/Node.js application
                                                    <span class="profile-portfolio-hover-link">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve" class="flicon-play">
<g>
    <polygon fill="none" points="1.5,1.5 38.5,20 1.5,38.5   "></polygon>
</g>
</svg>
 View
                                    </span>
                                                </h6>
                                            </div>

                                            <img alt="EasySales - Angular2/Node.js application" class="profile-portfolio-thumb" src="https://cdn3.f-cdn.com//files/download/67844540/9700e3.jpg">





                                            <div class="profile-portfolio-placeholder has-thumbnail" data-portfolio-type="new_other" alt="This project is for EasySales a sales company. The aim of this Project is to develop an application in Angular4/Node.Js. Admin Dashboard and a Customer Panel created in Angular4 with  login Integrated with Auth0. The backend app is a Node.Js app in Express.JS Framework.
Also there is a payment gateway integration with Stripe API.">
                                                <span class="profile-portfolio-placeholder-icon"></span>
                                                <div class="profile-portfolio-placeholder-label">file</div>
                                            </div>




                                        </div>
                                    </li>
                                    <li data-qtsb-engagement="true" data-qtsb-subsection="item" id="4336532" ng-click="profile.openPortfolioModal(4336532, $event)" data-qtsb-label="view_more_portfolio" class="profile-portfolio-item">
                                        <div class="profile-portfolio-item-inner">
                                            <div class="profile-portfolio-hover">
                                                <h6 class="profile-portfolio-hover-title">
                                                    Marketing company website
                                                    <span class="profile-portfolio-hover-link">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve" class="flicon-play">
<g>
    <polygon fill="none" points="1.5,1.5 38.5,20 1.5,38.5   "></polygon>
</g>
</svg>
 View
                                    </span>
                                                </h6>
                                            </div>

                                            <img alt="Marketing company website" class="profile-portfolio-thumb" src="https://cdn3.f-cdn.com//files/download/67025335/30ca76.jpg">








                                        </div>
                                    </li>
                                    <li data-qtsb-engagement="true" data-qtsb-subsection="item" id="2544597" ng-click="profile.openPortfolioModal(2544597, $event)" data-qtsb-label="view_more_portfolio" class="profile-portfolio-item">
                                        <div class="profile-portfolio-item-inner">
                                            <div class="profile-portfolio-hover">
                                                <h6 class="profile-portfolio-hover-title">
                                                    Interior Design Website
                                                    <span class="profile-portfolio-hover-link">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve" class="flicon-play">
<g>
    <polygon fill="none" points="1.5,1.5 38.5,20 1.5,38.5   "></polygon>
</g>
</svg>
 View
                                    </span>
                                                </h6>
                                            </div>

                                            <img alt="Interior Design Website" class="profile-portfolio-thumb" src="https://cdn3.f-cdn.com//files/download/27834631/5a893b.jpg">








                                        </div>
                                    </li>
                                    <li data-qtsb-engagement="true" data-qtsb-subsection="item" id="2402579" ng-click="profile.openPortfolioModal(2402579, $event)" data-qtsb-label="view_more_portfolio" class="profile-portfolio-item">
                                        <div class="profile-portfolio-item-inner">
                                            <div class="profile-portfolio-hover">
                                                <h6 class="profile-portfolio-hover-title">
                                                    social networking mobile website
                                                    <span class="profile-portfolio-hover-link">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve" class="flicon-play">
<g>
    <polygon fill="none" points="1.5,1.5 38.5,20 1.5,38.5   "></polygon>
</g>
</svg>
 View
                                    </span>
                                                </h6>
                                            </div>

                                            <img alt="social networking mobile website" class="profile-portfolio-thumb" src="https://cdn3.f-cdn.com//files/download/25326899/notification_mobile.png">








                                        </div>
                                    </li>
                                    <li data-qtsb-engagement="true" data-qtsb-subsection="item" id="2402573" ng-click="profile.openPortfolioModal(2402573, $event)" data-qtsb-label="view_more_portfolio" class="profile-portfolio-item">
                                        <div class="profile-portfolio-item-inner">
                                            <div class="profile-portfolio-hover">
                                                <h6 class="profile-portfolio-hover-title">
                                                    Website for Small Business Template
                                                    <span class="profile-portfolio-hover-link">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve" class="flicon-play">
<g>
    <polygon fill="none" points="1.5,1.5 38.5,20 1.5,38.5   "></polygon>
</g>
</svg>
 View
                                    </span>
                                                </h6>
                                            </div>

                                            <img alt="Website for Small Business Template" class="profile-portfolio-thumb" src="https://cdn3.f-cdn.com//files/download/25327086/b0dcc3.jpg">








                                        </div>
                                    </li>

                                </ul>
                            </div>


                            <div class="profile-portfolio-expand">


                                <div class="btn profile-portfolio-expand-btn is-hidden" id="profile-portfolio-more" data-qtsb-label="view_more">+ show more</div>

                            </div>

                        </div>
                    </section>


                    <section class="profile-components" id="resume">
                        <div class="section-inner">
                            <div class="profile-components-row">
                                <div class="profile-components-main">
                                    <div class="profile-reviews Card" id="profile-reviews" data-qtsb-section="reviews" data-qtsb-engagement="true">
                                        <h2 class="section-title">
                                            Recent Reviews
                                            <button class="signup-modal-trigger profile-reviews-btn-top" ng-click="profile.openReviewsModal()" data-qtsb-label="view_more">



                                                <!-- ngIf: profile.user.reviews[profile.user.role].length > 0 --><span ng-if="profile.user.reviews[profile.user.role].length > 0" class="ng-scope">
                View More Reviews
            </span><!-- end ngIf: profile.user.reviews[profile.user.role].length > 0 -->

                                            </button>
                                        </h2>


                                        <!-- ngIf: profile.user.reviews[profile.user.role].length > 0 --><ul class="user-reviews ng-scope" ng-if="profile.user.reviews[profile.user.role].length > 0" itemprop="reviews" itemscope="" itemtype="http://schema.org/Review">
                                            <!-- ngRepeat: review in profile.user.reviews[profile.user.role] --><li class="user-review ng-scope" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" ng-repeat="review in profile.user.reviews[profile.user.role]">
                                                <img ng-src="//cdn3.f-cdn.com/img/unknown.png" class="user-review-avatar" alt="image of drumba" src="//cdn3.f-cdn.com/img/unknown.png">
                                                <a class="user-review-title ng-binding" data-qtsb-label="pvp" ng-href="/projects/javascript/Project-for-Karthik-17847589/" ng-bind-html="review.get().review_context.context_name" href="/projects/javascript/Project-for-Karthik-17847589/">Project for Karthik G.</a>

                                                <span class="Rating Rating--labeled" data-star_rating="5.0">
                    <meta itemprop="worstRating" content="0">
                    <meta itemprop="bestRating" content="5">
                    <meta itemprop="ratingValue" content="5.0">
                    <span class="Rating-total">
                        <span class="Rating-progress"></span>
                    </span>
                </span>

                                                <span class="user-review-price ng-binding" ng-hide="review.get().sealed">
                    <span ng-show="review.get().paid_amount === 0" class="ng-binding ng-hide">
                        $350.0
                    </span>
                    <span ng-show="review.get().paid_amount !== 0" class="ng-binding">
                        $350.0
                    </span>
                    NZD
                </span>
                                                <span class="user-review-price ng-hide" ng-show="review.get().sealed">
                    [SEALED]
                </span>

                                                <p itemprop="description">“<span ng-bind="review.get().description" class="ng-binding">Excellent. He has a very good work ethic and is very focused on providing a quality output.</span>”</p>
                                                <span class="user-review-details ng-binding">
                    <a href="/u/drumba">
                        <span class="user-review-name ng-binding">drumba</span>
                    </a>
                    <img class="user-review-flag small-flag new-zealand" ng-class="profile.getCountryClassForReview(review)" ng-src="https://cdn2.f-cdn.com/img/flags/png/nz.png" alt="Flag of New Zealand" title="New Zealand" aria-label="New Zealand" src="https://cdn2.f-cdn.com/img/flags/png/nz.png">

                   5 days ago.

                </span>
                                                <ul class="user-rating-skills">
                                                    <!-- ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/javascript"><span class="user-rating-skill-item ng-binding">Javascript</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/amazon_web_services"><span class="user-rating-skill-item ng-binding">Amazon Web Services</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/jquery_prototype"><span class="user-rating-skill-item ng-binding">jQuery / Prototype</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/hire_me"><span class="user-rating-skill-item ng-binding">Hire me</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/expressjs"><span class="user-rating-skill-item ng-binding">Express JS</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/angular_js"><span class="user-rating-skill-item ng-binding">Angular.js</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs -->
                                                </ul>
                                            </li><!-- end ngRepeat: review in profile.user.reviews[profile.user.role] --><li class="user-review ng-scope" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" ng-repeat="review in profile.user.reviews[profile.user.role]">
                                                <img ng-src="//cdn3.f-cdn.com/img/unknown.png" class="user-review-avatar" alt="image of handsm71" src="//cdn3.f-cdn.com/img/unknown.png">
                                                <a class="user-review-title ng-binding" data-qtsb-label="pvp" ng-href="/projects/javascript/Project-for-Karthik-17827781/" ng-bind-html="review.get().review_context.context_name" href="/projects/javascript/Project-for-Karthik-17827781/">Project for Karthik G.</a>

                                                <span class="Rating Rating--labeled" data-star_rating="5.0">
                    <meta itemprop="worstRating" content="0">
                    <meta itemprop="bestRating" content="5">
                    <meta itemprop="ratingValue" content="5.0">
                    <span class="Rating-total">
                        <span class="Rating-progress"></span>
                    </span>
                </span>

                                                <span class="user-review-price ng-binding" ng-hide="review.get().sealed">
                    <span ng-show="review.get().paid_amount === 0" class="ng-binding ng-hide">
                        $70.0
                    </span>
                    <span ng-show="review.get().paid_amount !== 0" class="ng-binding">
                        $375.0
                    </span>
                    CAD
                </span>
                                                <span class="user-review-price ng-hide" ng-show="review.get().sealed">
                    [SEALED]
                </span>

                                                <p itemprop="description">“<span ng-bind="review.get().description" class="ng-binding">Wonderful Man Karthik. Professional and quality work. Deliver on time</span>”</p>
                                                <span class="user-review-details ng-binding">
                    <a href="/u/handsm71">
                        <span class="user-review-name ng-binding">handsm71</span>
                    </a>
                    <img class="user-review-flag small-flag canada" ng-class="profile.getCountryClassForReview(review)" ng-src="https://cdn2.f-cdn.com/img/flags/png/ca.png" alt="Flag of Canada" title="Canada" aria-label="Canada" src="https://cdn2.f-cdn.com/img/flags/png/ca.png">

                   6 days ago.

                </span>
                                                <ul class="user-rating-skills">
                                                    <!-- ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/javascript"><span class="user-rating-skill-item ng-binding">Javascript</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/amazon_web_services"><span class="user-rating-skill-item ng-binding">Amazon Web Services</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/jquery_prototype"><span class="user-rating-skill-item ng-binding">jQuery / Prototype</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/hire_me"><span class="user-rating-skill-item ng-binding">Hire me</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/expressjs"><span class="user-rating-skill-item ng-binding">Express JS</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/angular_js"><span class="user-rating-skill-item ng-binding">Angular.js</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs -->
                                                </ul>
                                            </li><!-- end ngRepeat: review in profile.user.reviews[profile.user.role] --><li class="user-review ng-scope" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" ng-repeat="review in profile.user.reviews[profile.user.role]">
                                                <img ng-src="//cdn3.f-cdn.com/img/unknown.png" class="user-review-avatar" alt="image of sulkiron" src="//cdn3.f-cdn.com/img/unknown.png">
                                                <a class="user-review-title ng-binding" data-qtsb-label="pvp" ng-href="/projects/java/Need-JAVA-HIbernate-Bootstrap-Spring/" ng-bind-html="review.get().review_context.context_name" href="/projects/java/Need-JAVA-HIbernate-Bootstrap-Spring/">Need JAVA, HIbernate, Bootstrap, Spring Framework tutor</a>

                                                <span class="Rating Rating--labeled" data-star_rating="5.0">
                    <meta itemprop="worstRating" content="0">
                    <meta itemprop="bestRating" content="5">
                    <meta itemprop="ratingValue" content="5.0">
                    <span class="Rating-total">
                        <span class="Rating-progress"></span>
                    </span>
                </span>

                                                <span class="user-review-price ng-binding" ng-hide="review.get().sealed">
                    <span ng-show="review.get().paid_amount === 0" class="ng-binding ng-hide">
                        $7.0
                    </span>
                    <span ng-show="review.get().paid_amount !== 0" class="ng-binding">
                        $70.0
                    </span>
                    USD
                </span>
                                                <span class="user-review-price ng-hide" ng-show="review.get().sealed">
                    [SEALED]
                </span>

                                                <p itemprop="description">“<span ng-bind="review.get().description" class="ng-binding">Great</span>”</p>
                                                <span class="user-review-details ng-binding">
                    <a href="/u/sulkiron">
                        <span class="user-review-name ng-binding">sulkiron</span>
                    </a>
                    <img class="user-review-flag small-flag united-states" ng-class="profile.getCountryClassForReview(review)" ng-src="https://cdn2.f-cdn.com/img/flags/png/us.png" alt="Flag of United States" title="United States" aria-label="United States" src="https://cdn2.f-cdn.com/img/flags/png/us.png">

                   2 weeks ago.

                </span>
                                                <ul class="user-rating-skills">
                                                    <!-- ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/java"><span class="user-rating-skill-item ng-binding">Java</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/jsp"><span class="user-rating-skill-item ng-binding">JSP</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/mvc"><span class="user-rating-skill-item ng-binding">MVC</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/nodejs"><span class="user-rating-skill-item ng-binding">node.js</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/angular_js"><span class="user-rating-skill-item ng-binding">Angular.js</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs -->
                                                </ul>
                                            </li><!-- end ngRepeat: review in profile.user.reviews[profile.user.role] --><li class="user-review ng-scope" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" ng-repeat="review in profile.user.reviews[profile.user.role]">
                                                <img ng-src="//cdn3.f-cdn.com/img/unknown.png" class="user-review-avatar" alt="image of drumba" src="//cdn3.f-cdn.com/img/unknown.png">
                                                <a class="user-review-title ng-binding" data-qtsb-label="pvp" ng-href="/projects/linux/AWS-Lambda-Functions-working-with/" ng-bind-html="review.get().review_context.context_name" href="/projects/linux/AWS-Lambda-Functions-working-with/">AWS Lambda Functions working with Cognito</a>

                                                <span class="Rating Rating--labeled" data-star_rating="5.0">
                    <meta itemprop="worstRating" content="0">
                    <meta itemprop="bestRating" content="5">
                    <meta itemprop="ratingValue" content="5.0">
                    <span class="Rating-total">
                        <span class="Rating-progress"></span>
                    </span>
                </span>

                                                <span class="user-review-price ng-binding" ng-hide="review.get().sealed">
                    <span ng-show="review.get().paid_amount === 0" class="ng-binding ng-hide">
                        $166.0
                    </span>
                    <span ng-show="review.get().paid_amount !== 0" class="ng-binding">
                        $176.0
                    </span>
                    NZD
                </span>
                                                <span class="user-review-price ng-hide" ng-show="review.get().sealed">
                    [SEALED]
                </span>

                                                <p itemprop="description">“<span ng-bind="review.get().description" class="ng-binding">Excellent freelancer. Great knowledge. Great attitude and great communication. Goes over and above his responsibility. Will definitely be using him again.</span>”</p>
                                                <span class="user-review-details ng-binding">
                    <a href="/u/drumba">
                        <span class="user-review-name ng-binding">drumba</span>
                    </a>
                    <img class="user-review-flag small-flag new-zealand" ng-class="profile.getCountryClassForReview(review)" ng-src="https://cdn2.f-cdn.com/img/flags/png/nz.png" alt="Flag of New Zealand" title="New Zealand" aria-label="New Zealand" src="https://cdn2.f-cdn.com/img/flags/png/nz.png">

                   2 weeks ago.

                </span>
                                                <ul class="user-rating-skills">
                                                    <!-- ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/linux"><span class="user-rating-skill-item ng-binding">Linux</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/amazon_web_services"><span class="user-rating-skill-item ng-binding">Amazon Web Services</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/nodejs"><span class="user-rating-skill-item ng-binding">node.js</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/aws_lambda"><span class="user-rating-skill-item ng-binding">Aws Lambda</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs -->
                                                </ul>
                                            </li><!-- end ngRepeat: review in profile.user.reviews[profile.user.role] --><li class="user-review ng-scope" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" ng-repeat="review in profile.user.reviews[profile.user.role]">
                                                <img ng-src="//cdn3.f-cdn.com/img/unknown.png" class="user-review-avatar" alt="image of handsm71" src="//cdn3.f-cdn.com/img/unknown.png">
                                                <a class="user-review-title ng-binding" data-qtsb-label="pvp" ng-href="/projects/javascript/rest-api-with-nodejs/" ng-bind-html="review.get().review_context.context_name" href="/projects/javascript/rest-api-with-nodejs/">rest api with nodejs</a>

                                                <span class="Rating Rating--labeled" data-star_rating="5.0">
                    <meta itemprop="worstRating" content="0">
                    <meta itemprop="bestRating" content="5">
                    <meta itemprop="ratingValue" content="5.0">
                    <span class="Rating-total">
                        <span class="Rating-progress"></span>
                    </span>
                </span>

                                                <span class="user-review-price ng-binding" ng-hide="review.get().sealed">
                    <span ng-show="review.get().paid_amount === 0" class="ng-binding ng-hide">
                        $35.0
                    </span>
                    <span ng-show="review.get().paid_amount !== 0" class="ng-binding">
                        $35.0
                    </span>
                    CAD
                </span>
                                                <span class="user-review-price ng-hide" ng-show="review.get().sealed">
                    [SEALED]
                </span>

                                                <p itemprop="description">“<span ng-bind="review.get().description" class="ng-binding">Excellent work done. Will hire him again</span>”</p>
                                                <span class="user-review-details ng-binding">
                    <a href="/u/handsm71">
                        <span class="user-review-name ng-binding">handsm71</span>
                    </a>
                    <img class="user-review-flag small-flag canada" ng-class="profile.getCountryClassForReview(review)" ng-src="https://cdn2.f-cdn.com/img/flags/png/ca.png" alt="Flag of Canada" title="Canada" aria-label="Canada" src="https://cdn2.f-cdn.com/img/flags/png/ca.png">

                   3 weeks ago.

                </span>
                                                <ul class="user-rating-skills">
                                                    <!-- ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/javascript"><span class="user-rating-skill-item ng-binding">Javascript</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/nodejs"><span class="user-rating-skill-item ng-binding">node.js</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/expressjs"><span class="user-rating-skill-item ng-binding">Express JS</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/sqlite"><span class="user-rating-skill-item ng-binding">SQLite</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/api"><span class="user-rating-skill-item ng-binding">API</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs -->
                                                </ul>
                                            </li><!-- end ngRepeat: review in profile.user.reviews[profile.user.role] --><li class="user-review ng-scope" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" ng-repeat="review in profile.user.reviews[profile.user.role]">
                                                <img ng-src="//cdn3.f-cdn.com/ppic/104268944/logo/19477886/profile_logo_19477886.jpg" class="user-review-avatar" alt="image of dfermiumlabs" src="//cdn3.f-cdn.com/ppic/104268944/logo/19477886/profile_logo_19477886.jpg">
                                                <a class="user-review-title ng-binding" data-qtsb-label="pvp" ng-href="/projects/javascript/Create-simple-frontend-only-app/" ng-bind-html="review.get().review_context.context_name" href="/projects/javascript/Create-simple-frontend-only-app/">Create a simple frontend only app for amazon s3 (browser javascript only)</a>

                                                <span class="Rating Rating--labeled" data-star_rating="3.8">
                    <meta itemprop="worstRating" content="0">
                    <meta itemprop="bestRating" content="5">
                    <meta itemprop="ratingValue" content="3.8">
                    <span class="Rating-total">
                        <span class="Rating-progress"></span>
                    </span>
                </span>

                                                <span class="user-review-price ng-binding" ng-hide="review.get().sealed">
                    <span ng-show="review.get().paid_amount === 0" class="ng-binding ng-hide">
                        €24.0
                    </span>
                    <span ng-show="review.get().paid_amount !== 0" class="ng-binding">
                        €24.0
                    </span>
                    EUR
                </span>
                                                <span class="user-review-price ng-hide" ng-show="review.get().sealed">
                    [SEALED]
                </span>

                                                <p itemprop="description">“<span ng-bind="review.get().description" class="ng-binding">Good programmer but slow on getting the requirements</span>”</p>
                                                <span class="user-review-details ng-binding">
                    <a href="/u/dfermiumlabs">
                        <span class="user-review-name ng-binding">dfermiumlabs</span>
                    </a>
                    <img class="user-review-flag small-flag italy" ng-class="profile.getCountryClassForReview(review)" ng-src="https://cdn2.f-cdn.com/img/flags/png/it.png" alt="Flag of Italy" title="Italy" aria-label="Italy" src="https://cdn2.f-cdn.com/img/flags/png/it.png">

                   1 year ago.

                </span>
                                                <ul class="user-rating-skills">
                                                    <!-- ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/javascript"><span class="user-rating-skill-item ng-binding">Javascript</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs --><li ng-repeat="skill in review.getContextDetails().jobs" class="ng-scope"><a href="/freelancers/skills/amazon_web_services"><span class="user-rating-skill-item ng-binding">Amazon Web Services</span></a></li><!-- end ngRepeat: skill in review.getContextDetails().jobs -->
                                                </ul>
                                            </li><!-- end ngRepeat: review in profile.user.reviews[profile.user.role] -->
                                        </ul><!-- end ngIf: profile.user.reviews[profile.user.role].length > 0 -->


                                        <!-- ngIf: profile.user.reviews[profile.user.role].length == 0 -->

                                        <!-- ngIf: profile.user.reviews[profile.user.role].length > 0 --><button class="profile-widget-expand signup-modal-trigger ng-scope" ng-click="profile.openReviewsModal()" ng-if="profile.user.reviews[profile.user.role].length > 0" data-qtsb-label="view_more">
                                            View More Reviews
                                        </button><!-- end ngIf: profile.user.reviews[profile.user.role].length > 0 -->




                                    </div>











                                    <div class="profile-experience Card" data-qtsb-section="education" data-qtsb-engagement="true">
                                        <h2 class="section-title">
                                            Education
                                        </h2>


                                        <div class="profile-experience-item">
                                            <h3 class="profile-experience-title">Bachelors in Engineering</h3>
                                            <span class="profile-experience-byline">
            Anna University,
            India
        </span>
                                            <span class="profile-experience-date">

                2007

                    - 2011
                    (4 years)


        </span>
                                        </div>

                                    </div>







                                    <div class="profile-experience Card" data-qtsb-section="certifications" data-qtsb-engagement="true">
                                        <h2 class="section-title">
                                            Qualifications
                                        </h2>

                                        <div class="profile-experience-item">
                                            <h3 class="profile-experience-title">
                                                Oracle Certified Java Programmer

                                                (2011)

                                            </h3>

                                            <span>Oracle</span>

                                            <p class="profile-experience-description">OCJP 6.0</p>
                                        </div>

                                        <div class="profile-experience-item">
                                            <h3 class="profile-experience-title">
                                                Amazon Certified Developer-Associate

                                                (2017)

                                            </h3>

                                            <span>Amazon Web Sevices</span>

                                            <p class="profile-experience-description">AWS Certified Developer Associate</p>
                                        </div>


                                    </div>









                                </div>
                                <div class="profile-components-side">




                                    <section class="profile-side-verifications Card" id="profile-Verifications">
                                        <h2 class="section-title">
                                            Verifications
                                        </h2>
                                        <ul class="VerificationsList profile-side-list">
                                            <li class="VerificationsList-item
            ">
            <span class="VerificationsList-label">
                <span class="VerificationsList-label-icon Icon"><svg class="Icon-image" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  <path d="M16.41 8.65h-3v-2a.8.8 0 0 1 .84-.91h2.12V2.51h-2.93a3.7 3.7 0 0 0-4 4v2.14H7.59V12h1.87v9.5h3.95V12h2.66l.34-3.35z"></path>
</svg>
</span>
                Facebook Connected
            </span>


                                                <div>

                                                    —
                                                </div>

                                            </li>
                                            <li class="VerificationsList-item
            ">
            <span class="VerificationsList-label">
                <span class="VerificationsList-label-icon Icon"><svg class="Icon-image" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
    <path d="M8.002 16.006c2.205 0 4-1.795 4-4s-1.795-4-4-4-4 1.795-4 4 1.795 4 4 4zM8.002 17.006c-4.71 0-8 2.467-8 6v1h16v-1c0-3.533-3.29-6-8-6zM18.002.006l1.714 4.286h4.286l-3.708 3.13 1.994 4.584-4.286-2.834-4.286 2.834 1.994-4.584-3.708-3.13h4.286"></path>
</svg>
</span>
                Preferred Freelancer
            </span>


                                                <div>

                                                    —
                                                </div>

                                            </li>
                                            <li class="VerificationsList-item
            ">
            <span class="VerificationsList-label">
                <span class="VerificationsList-label-icon Icon"><svg class="Icon-image" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.447 2.106c-.34-.17-.744-.133-1.047.095L16 4.75 12.6 2.2c-.355-.266-.844-.266-1.2 0L8 4.75 4.6 2.2c-.304-.227-.708-.264-1.047-.094C3.213 2.276 3 2.622 3 3v9c0 5.524 8.2 9.72 8.55 9.894l.45.227.45-.226C12.8 21.72 21 17.524 21 12V3c0-.378-.214-.724-.553-.894zM15 10h-3.5c-.275 0-.5.225-.5.5 0 .276.225.5.5.5h1c1.38 0 2.5 1.122 2.5 2.5 0 1.208-.86 2.22-2 2.45V17h-2v-1H9v-2h3.5c.276 0 .5-.224.5-.5 0-.275-.224-.5-.5-.5h-1C10.122 13 9 11.878 9 10.5c0-1.206.86-2.217 2-2.45V7h2v1h2v2z"></path></svg>
</span>
                Payment Verified
            </span>


                                                <div>

                                                    —
                                                </div>

                                            </li>
                                            <li class="VerificationsList-item
            is-VerificationsList-verified">
            <span class="VerificationsList-label">
                <span class="VerificationsList-label-icon Icon"><svg class="Icon-image" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
    <path d="M15,21h5a1,1,0,0,0,1-1V16a1,1,0,0,0-1-1H16a1,1,0,0,0-1,1v1a6.91,6.91,0,0,1-7-7H9a1,1,0,0,0,1-1V5A1,1,0,0,0,9,4H5A1,1,0,0,0,4,5v5A11,11,0,0,0,15,21Z"></path>
</svg>
</span>
                Phone Verified
            </span>

                                                <span class="VerificationsList-verifiedIcon Icon"><svg class="Icon-image" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  <path d="M19.89 0L6.51 13.38 2 8.89 0 11l6.51 6.5L22 2.1 19.89 0"></path>
</svg>
</span>


                                            </li>

                                            <li class="VerificationsList-item
            is-VerificationsList-verified">
            <span class="VerificationsList-label">
                <span class="VerificationsList-label-icon Icon"><svg class="Icon-image" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
  <path d="M12 10.823l8.965-5.563C20.677 5.1 20.352 5 20 5H4c-.352 0-.678.1-.965.26L12 10.823z"></path>
  <path d="M12.527 12.85c-.16.1-.344.15-.527.15s-.366-.05-.527-.15l-9.47-5.877C2.003 6.983 2 6.99 2 7v9c0 1.1.897 2 2 2h16c1.103 0 2-.9 2-2V7c0-.01-.003-.02-.003-.028l-9.47 5.877z"></path>
</svg>
</span>
                Email Verified
            </span>

                                                <span class="VerificationsList-verifiedIcon Icon"><svg class="Icon-image" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  <path d="M19.89 0L6.51 13.38 2 8.89 0 11l6.51 6.5L22 2.1 19.89 0"></path>
</svg>
</span>


                                            </li>
                                        </ul>
                                    </section>




                                    <section class="profile-side-skills Card" id="profile-skills" data-qtsb-section="skills" data-qtsb-engagement="true" ng-class="{'is-hidden': profile.mode === 'view' &amp;&amp; profile.user.skills.length === 0}">
                                        <h2 class="section-title">
                                            My Top Skills

                                        </h2>
                                        <div class="profile-skills-wrapper" id="profile-skills-wrapper">
                                            <ul class="VerificationsList profile-side-list" id="skills" ng-show="profile.user.skills.length > 0">
                                                <!-- ngRepeat: skill in profile.user.skills --><li class="VerificationsList-item ng-scope" ng-class="{'is-VerificationsList-verified': skill.certified}" ng-repeat="skill in profile.user.skills">
                <span class="VerificationsList-label">
                    <span ng-show="skill.certified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="right" data-original-title="Completed all Javascript exams" class="ng-hide">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 24" enable-background="new 0 0 16 24" xml:space="preserve" class="flicon-badge">
<g>
    <circle fill="none" stroke-linejoin="round" stroke-miterlimit="10" cx="8.5" cy="16" r="7.5"></circle>
    <polygon fill="none" stroke-linejoin="round" stroke-miterlimit="10" points="8.5,11.5 10,14.5 13,14.5
        10.5,16.5 11.5,20 8.5,18.1 5.5,20 6.5,16.5 4,14.5 7,14.5    "></polygon>
    <g>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            2,0.5 2,3 3.5,7.5       "></polyline>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            14,0.5 14,3 12.6,7.5        "></polyline>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="5" y1="0.5" x2="5" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="11" y1="0.5" x2="11" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8" y1="0.5" x2="8" y2="6.5"></line>
    </g>
</g>
</svg>

                    </span>

                    <a href="/freelancers/skills/javascript" class="ng-binding">
                        Javascript
                    </a>
                </span>
                                                    <span class="profile-skill-amount ng-binding" ng-hide="!skill.usages || skill.usages === 0">
                    7
                </span>
                                                </li><!-- end ngRepeat: skill in profile.user.skills --><li class="VerificationsList-item ng-scope" ng-class="{'is-VerificationsList-verified': skill.certified}" ng-repeat="skill in profile.user.skills">
                <span class="VerificationsList-label">
                    <span ng-show="skill.certified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="right" data-original-title="Completed all Angular.js exams" class="ng-hide">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 24" enable-background="new 0 0 16 24" xml:space="preserve" class="flicon-badge">
<g>
    <circle fill="none" stroke-linejoin="round" stroke-miterlimit="10" cx="8.5" cy="16" r="7.5"></circle>
    <polygon fill="none" stroke-linejoin="round" stroke-miterlimit="10" points="8.5,11.5 10,14.5 13,14.5
        10.5,16.5 11.5,20 8.5,18.1 5.5,20 6.5,16.5 4,14.5 7,14.5    "></polygon>
    <g>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            2,0.5 2,3 3.5,7.5       "></polyline>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            14,0.5 14,3 12.6,7.5        "></polyline>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="5" y1="0.5" x2="5" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="11" y1="0.5" x2="11" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8" y1="0.5" x2="8" y2="6.5"></line>
    </g>
</g>
</svg>

                    </span>

                    <a href="/freelancers/skills/angular_js" class="ng-binding">
                        Angular.js
                    </a>
                </span>
                                                    <span class="profile-skill-amount ng-binding" ng-hide="!skill.usages || skill.usages === 0">
                    5
                </span>
                                                </li><!-- end ngRepeat: skill in profile.user.skills --><li class="VerificationsList-item ng-scope" ng-class="{'is-VerificationsList-verified': skill.certified}" ng-repeat="skill in profile.user.skills">
                <span class="VerificationsList-label">
                    <span ng-show="skill.certified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="right" data-original-title="Completed all Amazon Web Services exams" class="ng-hide">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 24" enable-background="new 0 0 16 24" xml:space="preserve" class="flicon-badge">
<g>
    <circle fill="none" stroke-linejoin="round" stroke-miterlimit="10" cx="8.5" cy="16" r="7.5"></circle>
    <polygon fill="none" stroke-linejoin="round" stroke-miterlimit="10" points="8.5,11.5 10,14.5 13,14.5
        10.5,16.5 11.5,20 8.5,18.1 5.5,20 6.5,16.5 4,14.5 7,14.5    "></polygon>
    <g>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            2,0.5 2,3 3.5,7.5       "></polyline>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            14,0.5 14,3 12.6,7.5        "></polyline>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="5" y1="0.5" x2="5" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="11" y1="0.5" x2="11" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8" y1="0.5" x2="8" y2="6.5"></line>
    </g>
</g>
</svg>

                    </span>

                    <a href="/freelancers/skills/amazon_web_services" class="ng-binding">
                        Amazon Web Services
                    </a>
                </span>
                                                    <span class="profile-skill-amount ng-binding" ng-hide="!skill.usages || skill.usages === 0">
                    4
                </span>
                                                </li><!-- end ngRepeat: skill in profile.user.skills --><li class="VerificationsList-item ng-scope" ng-class="{'is-VerificationsList-verified': skill.certified}" ng-repeat="skill in profile.user.skills">
                <span class="VerificationsList-label">
                    <span ng-show="skill.certified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="right" data-original-title="Completed all jQuery / Prototype exams" class="ng-hide">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 24" enable-background="new 0 0 16 24" xml:space="preserve" class="flicon-badge">
<g>
    <circle fill="none" stroke-linejoin="round" stroke-miterlimit="10" cx="8.5" cy="16" r="7.5"></circle>
    <polygon fill="none" stroke-linejoin="round" stroke-miterlimit="10" points="8.5,11.5 10,14.5 13,14.5
        10.5,16.5 11.5,20 8.5,18.1 5.5,20 6.5,16.5 4,14.5 7,14.5    "></polygon>
    <g>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            2,0.5 2,3 3.5,7.5       "></polyline>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            14,0.5 14,3 12.6,7.5        "></polyline>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="5" y1="0.5" x2="5" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="11" y1="0.5" x2="11" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8" y1="0.5" x2="8" y2="6.5"></line>
    </g>
</g>
</svg>

                    </span>

                    <a href="/freelancers/skills/jquery_prototype" class="ng-binding">
                        jQuery / Prototype
                    </a>
                </span>
                                                    <span class="profile-skill-amount ng-binding" ng-hide="!skill.usages || skill.usages === 0">
                    4
                </span>
                                                </li><!-- end ngRepeat: skill in profile.user.skills --><li class="VerificationsList-item ng-scope" ng-class="{'is-VerificationsList-verified': skill.certified}" ng-repeat="skill in profile.user.skills">
                <span class="VerificationsList-label">
                    <span ng-show="skill.certified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="right" data-original-title="Completed all node.js exams" class="ng-hide">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 24" enable-background="new 0 0 16 24" xml:space="preserve" class="flicon-badge">
<g>
    <circle fill="none" stroke-linejoin="round" stroke-miterlimit="10" cx="8.5" cy="16" r="7.5"></circle>
    <polygon fill="none" stroke-linejoin="round" stroke-miterlimit="10" points="8.5,11.5 10,14.5 13,14.5
        10.5,16.5 11.5,20 8.5,18.1 5.5,20 6.5,16.5 4,14.5 7,14.5    "></polygon>
    <g>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            2,0.5 2,3 3.5,7.5       "></polyline>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            14,0.5 14,3 12.6,7.5        "></polyline>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="5" y1="0.5" x2="5" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="11" y1="0.5" x2="11" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8" y1="0.5" x2="8" y2="6.5"></line>
    </g>
</g>
</svg>

                    </span>

                    <a href="/freelancers/skills/nodejs" class="ng-binding">
                        node.js
                    </a>
                </span>
                                                    <span class="profile-skill-amount ng-binding" ng-hide="!skill.usages || skill.usages === 0">
                    3
                </span>
                                                </li><!-- end ngRepeat: skill in profile.user.skills --><li class="VerificationsList-item ng-scope" ng-class="{'is-VerificationsList-verified': skill.certified}" ng-repeat="skill in profile.user.skills">
                <span class="VerificationsList-label">
                    <span ng-show="skill.certified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="right" data-original-title="Completed all Express JS exams" class="ng-hide">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 24" enable-background="new 0 0 16 24" xml:space="preserve" class="flicon-badge">
<g>
    <circle fill="none" stroke-linejoin="round" stroke-miterlimit="10" cx="8.5" cy="16" r="7.5"></circle>
    <polygon fill="none" stroke-linejoin="round" stroke-miterlimit="10" points="8.5,11.5 10,14.5 13,14.5
        10.5,16.5 11.5,20 8.5,18.1 5.5,20 6.5,16.5 4,14.5 7,14.5    "></polygon>
    <g>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            2,0.5 2,3 3.5,7.5       "></polyline>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            14,0.5 14,3 12.6,7.5        "></polyline>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="5" y1="0.5" x2="5" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="11" y1="0.5" x2="11" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8" y1="0.5" x2="8" y2="6.5"></line>
    </g>
</g>
</svg>

                    </span>

                    <a href="/freelancers/skills/expressjs" class="ng-binding">
                        Express JS
                    </a>
                </span>
                                                    <span class="profile-skill-amount ng-binding" ng-hide="!skill.usages || skill.usages === 0">
                    3
                </span>
                                                </li><!-- end ngRepeat: skill in profile.user.skills --><li class="VerificationsList-item ng-scope" ng-class="{'is-VerificationsList-verified': skill.certified}" ng-repeat="skill in profile.user.skills">
                <span class="VerificationsList-label">
                    <span ng-show="skill.certified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="right" data-original-title="Completed all Java exams" class="ng-hide">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 24" enable-background="new 0 0 16 24" xml:space="preserve" class="flicon-badge">
<g>
    <circle fill="none" stroke-linejoin="round" stroke-miterlimit="10" cx="8.5" cy="16" r="7.5"></circle>
    <polygon fill="none" stroke-linejoin="round" stroke-miterlimit="10" points="8.5,11.5 10,14.5 13,14.5
        10.5,16.5 11.5,20 8.5,18.1 5.5,20 6.5,16.5 4,14.5 7,14.5    "></polygon>
    <g>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            2,0.5 2,3 3.5,7.5       "></polyline>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            14,0.5 14,3 12.6,7.5        "></polyline>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="5" y1="0.5" x2="5" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="11" y1="0.5" x2="11" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8" y1="0.5" x2="8" y2="6.5"></line>
    </g>
</g>
</svg>

                    </span>

                    <a href="/freelancers/skills/java" class="ng-binding">
                        Java
                    </a>
                </span>
                                                    <span class="profile-skill-amount ng-binding" ng-hide="!skill.usages || skill.usages === 0">
                    1
                </span>
                                                </li><!-- end ngRepeat: skill in profile.user.skills --><li class="VerificationsList-item ng-scope" ng-class="{'is-VerificationsList-verified': skill.certified}" ng-repeat="skill in profile.user.skills">
                <span class="VerificationsList-label">
                    <span ng-show="skill.certified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="right" data-original-title="Completed all WordPress exams" class="ng-hide">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 24" enable-background="new 0 0 16 24" xml:space="preserve" class="flicon-badge">
<g>
    <circle fill="none" stroke-linejoin="round" stroke-miterlimit="10" cx="8.5" cy="16" r="7.5"></circle>
    <polygon fill="none" stroke-linejoin="round" stroke-miterlimit="10" points="8.5,11.5 10,14.5 13,14.5
        10.5,16.5 11.5,20 8.5,18.1 5.5,20 6.5,16.5 4,14.5 7,14.5    "></polygon>
    <g>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            2,0.5 2,3 3.5,7.5       "></polyline>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            14,0.5 14,3 12.6,7.5        "></polyline>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="5" y1="0.5" x2="5" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="11" y1="0.5" x2="11" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8" y1="0.5" x2="8" y2="6.5"></line>
    </g>
</g>
</svg>

                    </span>

                    <a href="/freelancers/skills/wordpress" class="ng-binding">
                        WordPress
                    </a>
                </span>
                                                    <span class="profile-skill-amount ng-binding" ng-hide="!skill.usages || skill.usages === 0">
                    1
                </span>
                                                </li><!-- end ngRepeat: skill in profile.user.skills --><li class="VerificationsList-item ng-scope" ng-class="{'is-VerificationsList-verified': skill.certified}" ng-repeat="skill in profile.user.skills">
                <span class="VerificationsList-label">
                    <span ng-show="skill.certified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="right" data-original-title="Completed all Aws Lambda exams" class="ng-hide">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 24" enable-background="new 0 0 16 24" xml:space="preserve" class="flicon-badge">
<g>
    <circle fill="none" stroke-linejoin="round" stroke-miterlimit="10" cx="8.5" cy="16" r="7.5"></circle>
    <polygon fill="none" stroke-linejoin="round" stroke-miterlimit="10" points="8.5,11.5 10,14.5 13,14.5
        10.5,16.5 11.5,20 8.5,18.1 5.5,20 6.5,16.5 4,14.5 7,14.5    "></polygon>
    <g>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            2,0.5 2,3 3.5,7.5       "></polyline>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            14,0.5 14,3 12.6,7.5        "></polyline>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="5" y1="0.5" x2="5" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="11" y1="0.5" x2="11" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8" y1="0.5" x2="8" y2="6.5"></line>
    </g>
</g>
</svg>

                    </span>

                    <a href="/freelancers/skills/aws_lambda" class="ng-binding">
                        Aws Lambda
                    </a>
                </span>
                                                    <span class="profile-skill-amount ng-binding" ng-hide="!skill.usages || skill.usages === 0">
                    1
                </span>
                                                </li><!-- end ngRepeat: skill in profile.user.skills --><li class="VerificationsList-item ng-scope" ng-class="{'is-VerificationsList-verified': skill.certified}" ng-repeat="skill in profile.user.skills">
                <span class="VerificationsList-label">
                    <span ng-show="skill.certified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="right" data-original-title="Completed all J2EE exams" class="ng-hide">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 24" enable-background="new 0 0 16 24" xml:space="preserve" class="flicon-badge">
<g>
    <circle fill="none" stroke-linejoin="round" stroke-miterlimit="10" cx="8.5" cy="16" r="7.5"></circle>
    <polygon fill="none" stroke-linejoin="round" stroke-miterlimit="10" points="8.5,11.5 10,14.5 13,14.5
        10.5,16.5 11.5,20 8.5,18.1 5.5,20 6.5,16.5 4,14.5 7,14.5    "></polygon>
    <g>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            2,0.5 2,3 3.5,7.5       "></polyline>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            14,0.5 14,3 12.6,7.5        "></polyline>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="5" y1="0.5" x2="5" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="11" y1="0.5" x2="11" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8" y1="0.5" x2="8" y2="6.5"></line>
    </g>
</g>
</svg>

                    </span>

                    <a href="/freelancers/skills/j_ee" class="ng-binding">
                        J2EE
                    </a>
                </span>
                                                    <span class="profile-skill-amount ng-binding ng-hide" ng-hide="!skill.usages || skill.usages === 0">
                    0
                </span>
                                                </li><!-- end ngRepeat: skill in profile.user.skills --><li class="VerificationsList-item ng-scope" ng-class="{'is-VerificationsList-verified': skill.certified}" ng-repeat="skill in profile.user.skills">
                <span class="VerificationsList-label">
                    <span ng-show="skill.certified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="right" data-original-title="Completed all Web Services exams" class="ng-hide">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 24" enable-background="new 0 0 16 24" xml:space="preserve" class="flicon-badge">
<g>
    <circle fill="none" stroke-linejoin="round" stroke-miterlimit="10" cx="8.5" cy="16" r="7.5"></circle>
    <polygon fill="none" stroke-linejoin="round" stroke-miterlimit="10" points="8.5,11.5 10,14.5 13,14.5
        10.5,16.5 11.5,20 8.5,18.1 5.5,20 6.5,16.5 4,14.5 7,14.5    "></polygon>
    <g>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            2,0.5 2,3 3.5,7.5       "></polyline>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            14,0.5 14,3 12.6,7.5        "></polyline>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="5" y1="0.5" x2="5" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="11" y1="0.5" x2="11" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8" y1="0.5" x2="8" y2="6.5"></line>
    </g>
</g>
</svg>

                    </span>

                    <a href="/freelancers/skills/web_services" class="ng-binding">
                        Web Services
                    </a>
                </span>
                                                    <span class="profile-skill-amount ng-binding ng-hide" ng-hide="!skill.usages || skill.usages === 0">
                    0
                </span>
                                                </li><!-- end ngRepeat: skill in profile.user.skills --><li class="VerificationsList-item ng-scope" ng-class="{'is-VerificationsList-verified': skill.certified}" ng-repeat="skill in profile.user.skills">
                <span class="VerificationsList-label">
                    <span ng-show="skill.certified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="right" data-original-title="Completed all Docker exams" class="ng-hide">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 24" enable-background="new 0 0 16 24" xml:space="preserve" class="flicon-badge">
<g>
    <circle fill="none" stroke-linejoin="round" stroke-miterlimit="10" cx="8.5" cy="16" r="7.5"></circle>
    <polygon fill="none" stroke-linejoin="round" stroke-miterlimit="10" points="8.5,11.5 10,14.5 13,14.5
        10.5,16.5 11.5,20 8.5,18.1 5.5,20 6.5,16.5 4,14.5 7,14.5    "></polygon>
    <g>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            2,0.5 2,3 3.5,7.5       "></polyline>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            14,0.5 14,3 12.6,7.5        "></polyline>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="5" y1="0.5" x2="5" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="11" y1="0.5" x2="11" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8" y1="0.5" x2="8" y2="6.5"></line>
    </g>
</g>
</svg>

                    </span>

                    <a href="/freelancers/skills/docker" class="ng-binding">
                        Docker
                    </a>
                </span>
                                                    <span class="profile-skill-amount ng-binding ng-hide" ng-hide="!skill.usages || skill.usages === 0">
                    0
                </span>
                                                </li><!-- end ngRepeat: skill in profile.user.skills --><li class="VerificationsList-item ng-scope" ng-class="{'is-VerificationsList-verified': skill.certified}" ng-repeat="skill in profile.user.skills">
                <span class="VerificationsList-label">
                    <span ng-show="skill.certified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="right" data-original-title="Completed all Full Stack Development exams" class="ng-hide">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 24" enable-background="new 0 0 16 24" xml:space="preserve" class="flicon-badge">
<g>
    <circle fill="none" stroke-linejoin="round" stroke-miterlimit="10" cx="8.5" cy="16" r="7.5"></circle>
    <polygon fill="none" stroke-linejoin="round" stroke-miterlimit="10" points="8.5,11.5 10,14.5 13,14.5
        10.5,16.5 11.5,20 8.5,18.1 5.5,20 6.5,16.5 4,14.5 7,14.5    "></polygon>
    <g>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            2,0.5 2,3 3.5,7.5       "></polyline>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            14,0.5 14,3 12.6,7.5        "></polyline>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="5" y1="0.5" x2="5" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="11" y1="0.5" x2="11" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8" y1="0.5" x2="8" y2="6.5"></line>
    </g>
</g>
</svg>

                    </span>

                    <a href="/freelancers/skills/full_stack_development" class="ng-binding">
                        Full Stack Development
                    </a>
                </span>
                                                    <span class="profile-skill-amount ng-binding ng-hide" ng-hide="!skill.usages || skill.usages === 0">
                    0
                </span>
                                                </li><!-- end ngRepeat: skill in profile.user.skills --><li class="VerificationsList-item ng-scope" ng-class="{'is-VerificationsList-verified': skill.certified}" ng-repeat="skill in profile.user.skills">
                <span class="VerificationsList-label">
                    <span ng-show="skill.certified" data-toggle="tooltip" data-tooltip-size="large" data-tooltip-state="success" data-placement="right" data-original-title="Completed all Java Spring exams" class="ng-hide">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 24" enable-background="new 0 0 16 24" xml:space="preserve" class="flicon-badge">
<g>
    <circle fill="none" stroke-linejoin="round" stroke-miterlimit="10" cx="8.5" cy="16" r="7.5"></circle>
    <polygon fill="none" stroke-linejoin="round" stroke-miterlimit="10" points="8.5,11.5 10,14.5 13,14.5
        10.5,16.5 11.5,20 8.5,18.1 5.5,20 6.5,16.5 4,14.5 7,14.5    "></polygon>
    <g>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            2,0.5 2,3 3.5,7.5       "></polyline>
        <polyline fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="8,0.5
            14,0.5 14,3 12.6,7.5        "></polyline>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="5" y1="0.5" x2="5" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="11" y1="0.5" x2="11" y2="6.5"></line>

            <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="8" y1="0.5" x2="8" y2="6.5"></line>
    </g>
</g>
</svg>

                    </span>

                    <a href="/freelancers/skills/java_spring" class="ng-binding">
                        Java Spring
                    </a>
                </span>
                                                    <span class="profile-skill-amount ng-binding ng-hide" ng-hide="!skill.usages || skill.usages === 0">
                    0
                </span>
                                                </li><!-- end ngRepeat: skill in profile.user.skills -->
                                            </ul>

                                        </div>
                                        <button class="profile-widget-expand" id="expand-skills" href="#skills" data-qtsb-label="view_more_skills">Show more</button>
                                    </section>



                                    <section class="profile-side-similar-freelancer Card" data-qtsb-section="similar_users">
                                        <h2 class="section-title">
                                            Browse Similar Freelancers
                                        </h2>
                                        <ul class="Tags profile-similar-user">

                                            <li class="Tags-item">
                                                <a href="/freelancers/India/javascript/" class="btn btn-mini" data-qtsb-subsection="Javascript Developers in India" data-qtsb-label="directory">
                                                    Javascript Developers in India
                                                </a>
                                            </li>

                                            <li class="Tags-item">
                                                <a href="/freelancers/skills/javascript/" class="btn btn-mini" data-qtsb-subsection="Javascript Developers" data-qtsb-label="directory">
                                                    Javascript Developers
                                                </a>
                                            </li>

                                            <li class="Tags-item">
                                                <a href="/freelancers/skills/angular_js/" class="btn btn-mini" data-qtsb-subsection="Angular Javascript Developers" data-qtsb-label="directory">
                                                    Angular Javascript Developers
                                                </a>
                                            </li>

                                            <li class="Tags-item">
                                                <a href="/freelancers/skills/amazon_web_services/" class="btn btn-mini" data-qtsb-subsection="Amazon Web Services Experts" data-qtsb-label="directory">
                                                    Amazon Web Services Experts
                                                </a>
                                            </li>

                                            <li class="Tags-item">
                                                <a href="/freelancers/skills/jquery_prototype/" class="btn btn-mini" data-qtsb-subsection="jQuery Developers" data-qtsb-label="directory">
                                                    jQuery Developers
                                                </a>
                                            </li>

                                        </ul>
                                    </section>


                                </div>
                            </div>
                        </div>
                    </section>

                </div>

            </div>
        </div>

    </div>
    @include('website.regions.footer')
@endsection
@section('footer')

@stop