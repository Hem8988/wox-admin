<style>
    #header .header-bar {
        background: #020180;
        width: 100%;
    }

    .header-bar .container ul.quick-menu.pull-left,
    ul.quick-menu.pull-right {
        font-size: 16px;
    }

    .header-bar .container .pull-left {
        float: left !important;
    }

    #header .header-bar ul.quick-menu>li {
        float: left;
        margin-left: 10px;
    }

    .header-bar .container .pull-right {
        float: right !important;
    }

    .header-bar .container ol,
    ul {
        list-style: none;
        margin: 0;
    }

    #header .ribbon {
        position: relative;
    }
    .bkblack {
        background: #000;
    color: #fff !important;
    padding: 4px 10px;
    border-radius: 3px;
 }
    #header .header-bar ul.quick-menu>li>a {
        color: #000;
        line-height: 30px;
        display: block;
        font-size: 15px;
        text-transform: uppercase;
    }

    #header .ribbon>ul.menu {
        position: absolute;
        left: -15px;
        top: -9999px;
        z-index: 99;
        visibility: hidden;
    }

    ul.menu.mini {
        min-width: 180px;
        border: 2px solid #020180;
        background: #fff;
    }

    #header .ribbon>ul.menu {
        position: absolute;
        left: -15px;
        top: -9999px;
        z-index: 99;
        visibility: hidden;
    }





</style>
<header id="header">
    @if(!auth()->guard('agents')->user())
    <div id="header-bar-1" class="header-bar" style="display:none ;">
        <div class="header-bar-wrap">
            <div class="container">
                <div class="row">
                    <ul class="quick-menu pull-left">
                        @foreach($sites as $key => $value)

                        @if($value->title == 'Contact')
                        <li>
                            <a href="#"><i class="fa fa-phone" aria-hidden="true"></i>
                                @php $con = explode(",",$value->content) @endphp
                                {{ $con[0]}}
                            </a>
                        </li>
                        @endif
                        @if($value->title == 'Email')
                        <li><a href="mailto:{{$value->content}}"><i class="fa fa-envelope" aria-hidden="true"></i>{{$value->content}}</a></li>
                        @endif
                        @if($value->title == 'Address')
                        <li><a href="mailto:{{$value->content}}"><i class="fa fa-envelope" aria-hidden="true"></i>{{$value->content}}</a></li>
                        @endif
                        {{-- <li class="ribbon">
                            <a href="http://24hr.lightmytrip.com/contact">Contact Us</a>
                            <ul class="menu mini">
                                <!-- <li><a href="/contactUs" title="Dansk">Ikeja Office</a></li>-->
                                <!-- <li><a href="/contactUs" title="Deutsch">Lekki Office</a></li>
                                <li><a href="/contactUs" title="Español">Surulere Office</a></li>
                                <li><a href="/contactUs" title="Français">Festac Office</a></li> -->
                                <li><a href="/contactUs" title="Italiano">Abuja Office</a></li>
                                <li><a href="/contactUs" title="Magyar">Ikota Office</a></li>
                                <!-- <li><a href="/contactUs" title="Norsk">Trade Fair Office</a></li> -->
                            </ul>
                        </li> --}}
                        @endforeach
                        <li><a href="https://wa.me/message/UANCJPAHB7LZH1" target="_blank">
                                <i class="fab fa-whatsapp" aria-hidden="true"></i> chat with us</a>
                        </li>
                    </ul>
                    <style>
                        .sds {
                            position: relative;
                        }

                        .sfcrv {
                            position: absolute;
                            left: -15px;
                            top: -9999px;
                            z-index: 99;
                            visibility: hidden;
                            min-width: 180px;
                            border: 2px solid #020180;
                            background: #fff;
                        }

                        .sds:hover .sfcrv {
                            top: 35px;
                            visibility: initial;
                            border: 1px solid #ddd;
                            padding: 0;
                            font-size: 12px;
                            color: #000;
                        }

                        .sfcrv {
                            padding: auto;
                            left: initial;
                            min-width: 130px;
                            right: 0;
                        }

                        .sfcrv>li>a {
                            color: #000;
                            padding: 5px 10px;
                            display: block;
                        }

                        .sfcrv::before {
                            content: "";
                            position: absolute;
                            width: 15px;
                            height: 15px;
                            top: -8px;
                            left: auto;
                            right: 16px;
                            background-color: #fff;
                            border-color: #ddd #ddd transparent transparent;
                            border-style: solid;
                            border-width: 1px;
                            -webkit-transform: rotate(-45deg);
                            transform: rotate(-45deg);
                        }
                    </style>

                    <!--
                    <div class="col-md-12">
                    <div class="hb-content">
                    <div class="position-left">
                    <ul class="list-info">
                    <li>
                    <ul class="social-icons x4 grey hover-white icon-only">
                    <li><a class="si-youtube"><i class="fab fa-youtube"></i><i class="fa fa-youtube"></i></a></li>
                    <li><a class="si-twitter" href="javascript:;"><i class="fab fa-twitter"></i><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a class="si-facebook" href="javascript:;"><i class="fab fa-facebook-f"></i><i class="fa fa-facebook"></i></a></li>
                    <li><a class="si-instagramorange" href="javascript:;"><i class="fab fa-instagram"></i><i class="fa fa-instagram"></i></a></li>
                    </ul><!-- .social-icons end --
                    </li>
                    <li>
                    <a href="javascript:;">info@travel24her.com</a>
                    </li>
                    </ul><!-- .list-info end --
                    </div><!-- .position-left end --
                    <div class="position-right">
                    <ul class="list-info">
                    <li>Customer Care: 09122195512</li>
                    </ul><!-- .list-info end --
                    </div><!-- .position-right end --
                    </div><!-- .hb-content end --
                    </div><!-- .col-md-12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .header-bar-wrap -->
    </div><!-- #header-bar-1 end -->

    <div id="header-bar-2" class="header-bar sticky">
        <div class="header-bar-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hb-content">
                            <div class="logonav d-flex">
                                <a class="logo logo-header" href="{{URL::to('/')}}">
                                    <img src="{!! asset('public/images/logo-header.png') !!}" data-logo-alt="{!! asset('public/images/logo-header.png') !!}" alt="">
                                    <h3><span class="colored">Travel24hr.com</span></h3>
                                    <span>Travel Booking</span>
                                </a><!-- .logo end -->
                                <ul id="menu-main" class="menu-main">
                                    <!-- <li class="{{(Route::currentRouteName() == 'home') ? 'active' : ''}}"><a href="{{URL::to('/')}}">Flight</a></li>
                                <li class="{{(Route::currentRouteName() == 'hotel.index') ? 'active' : ''}}"><a href="{{URL::to('/hotels')}}">Hotels</a></li> -->
                                    <!-- <li class="{{(Route::currentRouteName() == 'holiday.index') ? 'active' : ''}}"><a href="{{URL::to('/holiday')}}">Holiday</a></li> -->
                                    <li class="{{(Route::currentRouteName() == 'visa.index') ? 'active' : ''}}"><a href="{{URL::to('/visa')}}">Visa</a></li>
                                    <li><a href="{{url('become-an-affiliate')}}" target="_blank">Become an Affiliate</a></li>
                                    <!-- <li class="{{(Route::currentRouteName() == 'offer.index') ? 'active' : ''}}"><a href="{{URL::to('/offer')}}">Offers</a></li> -->
                                    <!-- <li class=""><a  href="#">Packages</a></li> -->

                                    <!-- <li class=""><a href="{{url('manage-booking')}}">Manage Booking</a></li> -->


                                    <?php /*<li class="more_list">
									<a href="javascript:;"><i class="fa fa-plus"></i> More</a>
									<ul class="sub-menu">
										<li><a href="{{URL::to('/flightstatus')}}"><i class="fa fa-caret-right"></i> Flight Status</a></li>
										<li><a href="{{URL::to('/activities')}}"><i class="fa fa-caret-right"></i> Activities</a></li>
										<li><a href="{{URL::to('/trains')}}"><i class="fa fa-caret-right"></i> Trains</a></li>
										<li><a href="{{URL::to('/cruise')}}"><i class="fa fa-caret-right"></i> Cruise</a></li>
										<li><a href="{{URL::to('/transfers')}}"><i class="fa fa-caret-right"></i> Transfers</a></li>
										<li><a href="{{URL::to('/cabs')}}"><i class="fa fa-caret-right"></i> Cabs</a></li>
									</ul> 
								</li> */ ?>
                                </ul><!-- #menu-main end -->
                            </div>
                            <div class="spr">



                                <ul class="quick-menu d-flex align-items-center">
                                    <li class="sds">
                                        <a href="javascript:void(0)">
                                            NGN&nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </a>
                                        <ul class="sfcrv">
                                            <li class="">
                                                <a href="#" onclick="updateCurrency(event, 'usd', 'ngn');">US Dollar : $</a>
                                            </li>
                                            <li class="active">
                                                <a href="#" onclick="updateCurrency(event, 'ngn', 'ngn');">Nigerian Naira : ₦</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li >
                                        <div class="dropsupt nonedropm">
                                            <button type="button">Support<i class="fas fa-chevron-down cvdrp"></i></button>
                                            <div class="dropshow_sypt">
                                                @foreach($sites as $key => $value)
                                                @php $con = explode(",",$value->content) @endphp

                                                @if($value->title == 'Contact')
                                                <a href="tel:{{ $con[0]}}"><span><i class="fa fa-phone rtss"></i></span>{{ $con[0]}}</a>
                                                <a href="tel:{{ $con[1] ?? Null}}"><span><i class="fa fa-phone rtss"></i></span>{{ $con[1] ?? Null}}</a>
                                                @endif
                                                @endforeach
                                                <hr>
                                                <a href="https://wa.me/message/UANCJPAHB7LZH1" target="_blank"><span><img src="{{url('/images/whatsApp.png')}}" class="img-res"></span>WhatsApp</a>
                                                <!-- <a href="#"><span><img src="http://24hr.lightmytrip.com/public/images/supportb.png" class="img-res"></span>Customer Support</a> -->
                                                <a href="{{url('faq')}}"><span><i class="fa fa-question" aria-hidden="true"></i></span>FAQ</a>
                                                <a href="{{url('sendquery')}}"><span><i class="fa fa-envelope" aria-hidden="true"></i></span>Send Query</a>
                                                <a href="{{url('contact')}}"><span><i class="fa fa-phone rtss"></i></span>Contact us</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li><a href="{{url('become-an-affiliate')}}" target="_blank">Become an Affiliate</a></li> -->
                                    <li class="nonemn"><a href="https://www.travel24hr.com/manage-booking" target="_blank" class="bkblack"><i class="fa fa-suitcase" aria-hidden="true"></i>&nbsp;&nbsp;Manage Booking </a></li>
                                    @if(auth()->check())

                                    <li ><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fa fa-caret-right"></i> Logout </a></li>
                                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    @else
                                    <li class="nonemn">
                                        <a href="/login" class="bkblack"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;LOGIN/SIGNUP</a>

                                    </li>
                                    @endif

                                </ul>

                            </div>


                            <div class="mdiadr">
                                <div class="dropsupt nonedropm1">
                                    <button type="button">Support<i class="fas fa-chevron-down cvdrp"></i></button>
                                    <div class="dropshow_sypt">
                                        <a href="tel:09122195512"><span><i class="fa fa-phone"></i></span>09122195512</a>
                                        <a href="tel:09122102273"><span><i class="fa fa-phone"></i></span>09122102273</a>
                                        <hr>
                                        <a href="https://wa.me/message/UANCJPAHB7LZH1" target="_blank"><span><img src="http://travel24hr.com/images/whatsApp.png" class="img-res"></span>WhatsApp</a>
                                        <!-- <a href="#"><span><img src="http://24hr.lightmytrip.com/public/images/supportb.png" class="img-res"></span>Customer Support</a> -->
                                        <a href="{{url('contact')}}"><span><i class="fa fa-phone"></i></span>Contact us</a>
                                    </div>
                                </div>

                                <div class="menu-mobile-btn">

                                    <div class="hamburger hamburger--slider">
                                        <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                        </span>
                                    </div>
                                </div>
                                <!-- .menu-mobile-btn end -->
                                <div class="menu_right">
                                    <ul id="menu-main" class="menu-main">
                                        <li>
                                            @if (Auth::check())
                                            <a href="javascript:;">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
                                            @else
                                            <a href="javascript:;">My Account</a>
                                            @endif
                                            <ul class="sub-menu">
                                                @if (Auth::check())
                                                <div class="user_img">
                                                    <img src="{!! asset('public/images/user_img.png') !!}" alt="" />
                                                </div>
                                                <div class="sub_link">
                                                    <li><a href="{{route('dashboard.index')}}"><i class="fa fa-caret-right"></i> My Booking</a></li>
                                                    <li><a href="{{route('hotel.ecash')}}"><i class="fa fa-caret-right"></i> My eCash</a></li>
                                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fa fa-caret-right"></i> Logout </a></li>
                                                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </div>
                                                @else
                                                <li class="account_btn">
                                                    <a class="login popup-btn-login" href="javascript:;">Login</a><a class="popup-btn-register signup" href="javascript:;">Sign Up</a>
                                                </li>
                                                <li><a href="{{URL::to('/agent/login')}}"><i class="fa fa-caret-right"></i> Travel24hr.com for Travel Agents</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:;">Support</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{URL::to('/view-print-booking')}}"><i class="fa fa-caret-right"></i> My Booking</a></li>
                                                <li><a href="{{URL::to('/contact')}}"><i class="fa fa-caret-right"></i> Contact Us</a></li>
                                                <li><a href="{{URL::to('/faq')}}"><i class="fa fa-caret-right"></i> FAQ</a></li>
                                                <li><a href="{{URL::to('/sendquery')}}"><i class="fa fa-caret-right"></i> Send Query</a></li>
                                                <li><a href="{{URL::to('/payonline')}}"><i class="fa fa-caret-right"></i> Make a Payment</a></li>
                                            </ul>
                                        </li>
                                        <!--<li>     
										<a href="javascript:;"><i class="fa fa-phone-alt"></i></a> 
										<ul class="sub-menu">
											<li><a href="tel:+918826496095">09122195512</a></li>
										</ul> 
									</li>-->
                                    </ul><!-- #menu-main end -->
                                    <style>
                                        .menu-main.sf-arrows>li>a.sf-with-ul::after {
                                            display: none;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div><!-- .hb-content end -->
                    </div><!-- .col-md-12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .header-bar-wrap -->
    </div><!-- #header-bar-2 end -->
    @endif
     @if(auth()->guard('agents')->user())
    <section class="header_new">
    <div class="container">
        <div class="boxnew_hrd">
            <div class="logolf">
                <a href="http://localhost:8000/become-an-affiliate">
                    <img src="{{asset('images/logo-header.png')}}" data-logo-alt="{{asset('images/logo-header.png')}}" alt="">
                </a>

                <span class="csldbar"><i class="fa fa-bars"></i></span>
            </div>

            <div class="navmd">
                <ul class="clearfix">
                    <li class="nvm1"><a href="{{URL::to('become-an-affiliate')}}">Home</a></li>
                    <li class="nvm2"><a href="#fdvx">FeedBacks</a></li>
                      @if(auth()->guard('agents')->check())
                      <li class="nvm1"><a href="{{URL::to('agent/wallet')}}">Payment Upload</a></li>
                    <li class="nvm2"><a href="{{URL::to('agent/wallet')}}">Instant Recharge</a></li>
                      @else
                    <li class="nvm3"><a href="{{URL::to('agent/login')}}">Sign&nbsp;In</a></li>
                    <li class="nvm4"><a href="{{URL::to('affiliate-partner')}}">Sign&nbsp;Up</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    </section>
    @endif
</header><!-- #header end -->