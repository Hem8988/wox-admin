<!DOCTYPE html>
<html lang="en-US">
<head>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@if(View::hasSection('meta_title'))
        @yield('meta_title')
    @else
        Travel24hr.com: Flight, Hotel, Holidays, Fix Departure Packages
    @endif</title>
    <meta name="author" content="Travel24hr.com">
	@if(View::hasSection('meta_keyword'))
        
	<meta name="keywords" content="@yield('meta_keyword')">
    @else
		<meta name="keywords" content="Cheap flight booking, Cheap Hotels, Flight booking offers, Budget hotels, luxury Hotels, Online Hotel rooms, International Flight tickets, Domestic Air Tickets">
    @endif
    @if(View::hasSection('meta_keyword'))
        
	<meta name="description" content="@yield('meta_description')"> 
    @else
       
	<meta name="description" content="Find the best deals on flight tickets and hotel bookings. Grab the lowest airfares for international and domestic travel and score exclusive offers on hotels. "> 
    @endif
	
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="facebook-domain-verification" content="mvg8t7jnwfhw5eflraj3d3qeeg7r11" />
	<link href="{{URL::asset('css/Frontend/css-assets.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/Frontend/swiper.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/Frontend/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/Frontend/owl.carousel.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/Frontend/owl.theme.default.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/Frontend/intlTelInput.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/Frontend/all.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/Frontend/style.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/Frontend/daterangepicker.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/Frontend/custom.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/Frontend/mycustom.css')}}" rel="stylesheet"> 
	<link href="{{URL::asset('css/Frontend/pe-icon-7-stroke.css')}}" rel="stylesheet"> 
	<link href="{{URL::asset('css/Frontend/hotelcss.css')}}" rel="stylesheet">
	<link href="{{URL::asset('css/Frontend/responsive.css')}}" rel="stylesheet"> 
	<link rel="stylesheet" href="{{URL::asset('css/niceCountryInput.css')}}">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/black-tie/jquery-ui.css" />
	<!--<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/blitzer/jquery-ui.min.css" />-->
	<link rel="shortcut icon" href="{!! asset('images/favicon.png') !!}">
	<script src="{{URL::asset('js/Frontend/jquery.js')}}"></script>
	
	<style>
	.help-block{color:#f33;}
	</style>
	<style>
	.country_field .niceCountryInputMenu{border: 1px solid #ced4da;width: 100%; border-radius: 4px; padding: 2px 5px;}
	.location_search .is_search_from_val li, .location_search_to .is_search_to_val li{cursor: pointer;}
	.location_search .is_search_from_val li:hover, .location_search_to .is_search_to_val li:hover{
		background: #f2f2f2;
		cursor: pointer;
		border-left: 4px solid #04007f;
	}
	.location_search .is_search_from_val li, .location_search_to .is_search_to_val li {
    border-left: 4px solid #fff;}
.se-pre-con {display:none;position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;background: url(<?php echo URL::to('/img'); ?>/Rolling-1s-48px.gif) center no-repeat #fff;}
#myUL li{ display:none;}
#myULair li{ display:none;}
#mucoverinc li.insu{ display:none;}

#mucoverinc {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
}
<!--@import url("https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/blitzer/jquery-ui.min.css");-->

.ui-datepicker td span,
.ui-datepicker td a {
  padding-bottom: 1em;
}

.ui-datepicker td[title]::after {
  content: attr(title);
  display: block;
  position: relative;
  font-size: .8em;
  height: 1.25em;
  margin-top: -1.25em;
  text-align: right;
  padding-right: .25em;
  color:#fff;
}
.ui-datepicker td.ui-state-disabled[title]::after {
  content: '';
  display: none;
  position: unset;
}
.errors {
        color:red;
    }
.custom_reservation_tab form.form-banner-reservation input.add::-webkit-input-placeholder { /* Edge */
  color:#000;
}

.custom_reservation_tab form.form-banner-reservation input.add:-ms-input-placeholder { /* Internet Explorer */
	color:#000;
}

.custom_reservation_tab form.form-banner-reservation input.add::placeholder {
    color:#000;
}
.custom_reservation_tab .advanced_option{float:left;     background:transparent;}
.radio-container.radio-default{color:#4C4C4D;}
.br-tabs li.active a::after{    bottom: -3px;}
.slide-content p{font-size: 13px;
    color: #333;margin-bottom: 0;}
	.mobileAppmain {background: #eee;clear: both;display: inline-block;width: 100%; height: 228px; margin-top:77px;}
.mobileAppmain h2{font-size: 28px; font-weight: 400; color:#000;}
.mobileAppmain ul{margin:0; padding:0;}
.mobileAppmain ul li{display:inline-block; list-style-type: none; margin-right: 8px;}
.mobileAppmain .mobile{position: relative;}
.mobileAppmain .mobile img{ position: absolute; top: -47px;}
.pt-top-1 {
    margin-top: 4rem;
}

	.custom_reservation_tab form.form-banner-reservation input.add{font-size:20px; color:#000; font-weight: 600;} 
	.form-banner-reservation .form-group > i{left: 13px;    right: inherit;}
	.form-h-50 input, .form-h-50 input.form-control, .form-h-50 textarea, .form-h-50 textarea.form-control, .form-h-50 select, .form-h-50 select.form-control{height: 26px;}
.custom_reservation_tab form.form-banner-reservation .cus_loc_field span{padding-left: 39px; color:#959595;}	
.custom_reservation_tab form.form-banner-reservation .cus_loc_field p{padding-left: 39px; color:#333; display: none;}	
.custom_reservation_tab form.form-banner-reservation .form-group > i{      color: #ddd;  top: 35px;}
.custom_reservation_tab form.form-banner-reservation input{    border-color: transparent;    padding: 0 36px;     border: 1px solid #5594fa;}
.form-banner-reservation .form-group:first-child i{transform: rotate(1deg);}
.form-banner-reservation .form-group:nth-child(2) i {transform: rotate(1deg);}
.swipe{    top: 27px;}
.custom_reservation_tab{border-radius:0;}
.custom_reservation_tab form.form-banner-reservation input.htl{    padding: 15px 7px;    color: #504e4e;
    font-size: 20px;}
	.custom_reservation_tab form.form-banner-reservation input.htlnew{    padding: 15px 17px;    color: #504e4e;
    font-size: 20px;}
	.custom_reservation_tab form.form-banner-reservation .cus_calendar_field, .custom_reservation_tab form.form-banner-reservation .cus_passenger_field{     background: #fff;
    border: 1px solid #ddd;}

.custom_reservation_tab form.form-banner-reservation .cus_passenger_field span,.custom_reservation_tab form.form-banner-reservation .cus_passenger_field p{padding-left:20px; color:#a4a6a7;font-size: 11px;}
.custom_reservation_tab form.form-banner-reservation .form-group > i.add{    left: 141px;
    color: #919090;}
.form-group.cus_calendar_field.CLI{background:#191919;    height: 75px;}
.style-2 input, .style-2 input.form-control, .style-2 textarea, .style-2 textarea.form-control, .style-2 select, .style-2 select.form-control{    background-color: transparent;}
.custom_reservation_tab .br-tabs-content button.roundformsearch, .custom_reservation_tab .br-tabs-content button.multiroundformsearch{background: #f8b133;}
.rtate{    transform: rotate(-90deg) !important;}
#banner .custom_reservation_tab .br-tabs li a input{    height: 15px;
    width: 100%;}
ul.plani-icon{display: flex;}
.one_rnd_sng,.one_rnd_sng1{width: 27%;}
.custom_reservation_tab .multiwaytrip .form-banner-reservation .ismultipleway a.closem {    line-height: 79px;
    margin-left: 10px;}
 .custom_reservation_tab form.form-banner-reservation .one_rnd_sng .cus_calendar_field{width: 100%;}
ul.award{display: flex;     justify-content: flex-end;    position: absolute;
    top: 24px;
    right: 18px;}
ul.award li{    color: #4C4C4D; padding: 4px 2px;     font-size: 12px;}
.header-bar-wrap .menu-main li a{font-weight: 400;}
.header-bar .hb-content{    justify-content: space-between;}
.menu-main{    margin-right: inherit;}
.header-bar .col-md-12{padding:0;}
.stay{}
.stay a{color:#23325F; font-size:20px; background-color:#F2F1EE;    display: inline-block;
    padding: 1px 9px;}



	.droppasng{position: relative;}
.droppasng{display: flex;}
.droppasng>label{color: #fff; margin-bottom: 0;   }
.droppasng>span>i{color: #fff;}
.custom_reservation_tab form.form-banner-reservation .droppasng > input{cursor: pointer;     z-index: 1;   width: 100%; border:none; outline: none; color: #fff;  padding:0 14px 0px 12px;}
.draws{position: relative;
    left: -11px;}
.droppasng .list-dropdown-passengers{top: 28px;}
.droppasng  .list-persons-count>li>span{font-size: 13px;}
.droppasng .counter-add-item a{    background: #060181;
    border: none;
    border-radius: 50px;
    font-size: 12px;
    color: #fff;
    width: 20px;
    height: 20px}
    .custom_reservation_tab form.form-banner-reservation .droppasng .counter-add-item>input{border: none;}
    .droppasng .list-dropdown-passengers{width: 250px;}
    .clckbx_sw{font-weight: 500; color: #060181; font-size: 15px; margin-right: 10px;    padding: 5px 6px;}
    .droppasng .counter-add-item .decrease-btn, .droppasng .multidecrease-btn{background: #ddd !important;}
.custom_reservation_tab form.form-banner-reservation .desw input{padding: 0 10px;}



@media (min-width: 768px)
{
	.slide-content .custom_reservation_tab .br-tabs-content button.roundformsearch, .slide-content .custom_reservation_tab .br-tabs-content .cus_searchbtn_field button.multiroundformsearch {padding: 34px 10px;
    border-radius: 5px;
    margin-left: 10px;}
}
@media (min-width: 1200px)
{
	.custom_reservation_tab form.form-banner-reservation .cus_searchbtn_field {width: 12%;}
	.custom_reservation_tab form.form-banner-reservation .cus_loc_field{  border: 1px solid #ddd;  width: 21%;      margin-right: 12px;   background-color: #fff;}
	.custom_reservation_tab form.form-banner-reservation .cus_calendar_field, .custom_reservation_tab form.form-banner-reservation .cus_passenger_field{    width:14%;
    margin-right: 4px;}
}

.custom_reservation_tab form.form-banner-reservation .cus_calendar_field, .custom_reservation_tab form.form-banner-reservation .cus_passenger_field,.custom_reservation_tab form.form-banner-reservation .cus_loc_field{    height: 90px;border-radius: 5px;    padding: 17px 10px;}
.style-2 input:focus, .style-2 input.form-control:focus, .style-2 textarea:focus, .style-2 textarea.form-control:focus, .style-2 select:focus, .style-2 select.form-control:focus{border-color: initial;}
.custom_reservation_tab form.form-banner-reservation input.htlnew{border: none;}
.custom_reservation_tab form.form-banner-reservation input.htl:focus,.custom_reservation_tab form.form-banner-reservation input.htl, .custom_reservation_tab form.form-banner-reservation input.htl:active, .custom_reservation_tab form.form-banner-reservation input.htl, .custom_reservation_tab form.form-banner-reservation input.add:focus,.custom_reservation_tab form.form-banner-reservation input.add{    border: none !important; outline: none !important;}




.bgblu {
    padding: 0 80px; background: #02004e;
}
.custom_reservation_tab{background: none; border: none;}
.banner-center-box{margin-top: -37px;}

.radio-container.radio-default {
     color: #fff;
 }

 #banner .custom_reservation_tab .br-tabs li a{background: initial; 
    padding: 10px 10px;
    border-radius: 5px;
}
 .custom_reservation_tab .br-tabs li.active a:after{display: none;}
 .custom_reservation_tab .br-tabs .active a {
     background-color: #fff !important;
     color: #02004e !important;
 }
 .radio-container.radio-default {
    color: #fff;
    text-transform: uppercase;
    font-weight: 500;
}
.custom_reservation_tab .br-tabs li.active a>.radio-container{color: #02004e;}

.radio-container.radio-default .checkmark::after {
   
    background-color: #02004e;
}
.drop_cb{align-items: center;     padding: 5px 10px;
 }
.drop_cb>label{margin-bottom: 0;}
.drop_cb>label>i{color: #fff; }
.drop_cb>select{    background: initial;
    border: none;
    outline: none !important;
    color: #fff;
    height: auto;}
	select option[value=""] {
  background: #000;
}
.flexdps{margin-left: 20px;}

.custom_reservation_tab form.cngbxs_h,.cngbxs_h {
    display: flex;
    justify-content: space-between; 
}
.cngbxs_h1{display: flex;}
.custom_reservation_tab form.form-banner-reservation .cus_loc_field{width: 50%;}
.frm_to,.one_rnd{display: flex;}
.loc_search_field .location_search, .loc_search_field_to .location_search_to, .loc_search_field_one .one_location_search_from, .loc_search_field_one_to .one_location_search_to{width: 100%;}

.custom_reservation_tab form.form-banner-reservation .one_rnd_sng1 .cus_calendar_field{width: 100%;}

.custom_reservation_tab form.form-banner-reservation .cus_calendar_field, .custom_reservation_tab form.form-banner-reservation .cus_passenger_field{width: auto;}
.one_rnd{column-gap: 7px;}

.flexdps {
    position: absolute;
    top: -55px;
    left: 446px;
}











/*------------------------*/
</style>
<!-- Global site tag (gtag.js) - Google Analytics 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172343415-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-172343415-1');
</script> -->
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="@yield('bodyclass')"> 
<div class="loading-div">Loading&#8230;</div>
	<!--<div class="top_lanucher">
		<a href="{!! asset('images/guidelines-for-air-passengers.pdf') !!}" target="_blank">Covid-19 Travel Advisory</a>
	</div>-->
<div class="se-pre-con"></div>
<div class="searchpop1 bgnom"  style="display: none; "><div id="dvWait"></div></div>
	<div id="full-container">
		<!--Header-->
			@include('../Elements/Frontend/header')
		<!--Content-->
			@yield('content') 
		<!-- /main -->
		<!--Footer-->
			@include('../Elements/Frontend/footer')
				
	</div><!-- #full-container end -->
	<a class="scroll-top-icon scroll-top" href="javascript:;"><i class="fa fa-angle-up"></i></a>
	<div class="popup-preview popup-preview-2 popup-preview-register">
		<div class="popup-bg"></div>

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">

					<div class="popup-content">
						<div class="block-content">
							<div class="popup-close hamburger hamburger--slider is-active">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</div><!-- .popup-close -->
							<div class="block-title">
								<h3>Join Travel24hr.com.com for Free</h3>
							</div><!-- .block-title end -->
							<div class="content">
								<div class="left">
									<form id="form-register" action="{{ url('register') }}" class="rounded">
									{{-- <form id="form-register" action="{{ route('register') }}" class="rounded"> --}}
										<div class="form-content">
											<div class="form-group">
												<label for="registerFullname">Full Name</label>
												<input type="text" name="jaName" id="registerFullname" class="form-control"
													placeholder="">
												<span style="display:none;" class="help-block name-error">
													<strong></strong>
												</span> 
											</div><!-- .form-group end -->
											<div class="form-group">
												<label for="registerEmail">Email Address</label>
												<input type="text" name="registerEmail" id="registerEmail"
													class="form-control" placeholder="">
												<span style="display:none;" class="help-block email-error">
													<strong></strong>
												</span>
											</div><!-- .form-group end -->
											<div class="form-group">
												<div class="box-field">
													<label for="registerPassword">Password</label>
													<input type="password" name="password" id="registerPassword"
														class="form-control" placeholder="">
													<span style="display:none;" class="help-block password-error">
													<strong></strong>
													</span>
												</div><!-- .box-field end -->
												<div class="box-field">
													<label for="registerPasswordConfirm">Confirm Password</label>
													<input type="password" name="password_confirmation"
														id="registerPasswordConfirm" class="form-control" placeholder="">
														<span style="display:none;" class="help-block confirm-password-error">
														<strong></strong>
														</span>
												</div><!-- .box-field end -->
											</div><!-- .form-group end -->
											<div class="form-group">
											<label class="label-container checkbox-default">
													<span>By clicking this, you are agree to to our <a href="{{URL::to('/')}}/page/terms-conditions">terms of use</a> and <a href="{{URL::to('/')}}/page/privacy-security">privacy policy</a> including the use of cookies.</span>
													<input name="cc" id="cc" type="checkbox">
													<span class="checkmark"></span> 
												</label>
												<span style="display:none;" class="help-block cc-error">
													<strong></strong>
												</span>
												<input type="submit" id="usersubmit" class="form-control rounded" value="SignUp">
											</div><!-- .form-group end -->
										</div><!-- .form-content end -->
									</form><!-- #form-register end -->
								</div><!-- .left end -->
								<div class="right">
									<h5>Or Sign up With Your Socials</h5>
									<ul class="list-btns-social rounded">
										<li>
											<a class="btn-social bs-google-plus" href="{{URL::to('/auth/google')}}">
												<i class="fab fa-google-plus-g"></i>
												<span>google</span>
											</a>
										</li>
										<li>
											<a class="btn-social bs-facebook" href="{{URL::to('/auth/facebook')}}">
												<i class="fab fa-facebook-square"></i>
												<span>facebook</span>
											</a>
										</li>
										<!--<li>
											<a class="btn-social bs-twitter" href="javascript:;">
												<i class="fab fa-twitter"></i>
												<span>twitter</span>
											</a>
										</li>-->
									</ul><!-- .list-btns-social end -->
								</div><!-- .right end -->
							</div><!-- .content end -->
						</div><!-- .block-content end -->
					</div><!-- .popup-content end -->
				</div><!-- .col-md-8 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .popup-preview -->
	<div class="popup-preview popup-preview-2 popup-preview-login <?php if ($errors->has('email') || $errors->has('password')){ echo 'viewed'; } ?> ">
		<div class="popup-bg"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="popup-content">
						<div class="block-content">
							<div class="block-title">
								<h3>Welcome Back to Travel24hr.com.com</h3>
								<h5>Sign in to your account to continue using Travel24hr.com.com</h5>
							</div><!-- .block-title end -->
							<div class="content">
								<div class="left">
									{{ Form::open(array('url' => '/login', 'name'=>"login", 'autocomplete'=>'off', 'class'=>'rounded', 'id' => 'form-login')) }}
										<div class="form-content">
											<div class="form-group">
												<label for="loginUserEmail">Email Adress / Username</label>
												<input autocomplete="new-password" type="text" name="email" id="loginUserEmail" class="form-control"
													placeholder="">
													@if ($errors->has('email'))
													<span class="custom-error" role="alert">
														<strong>{{ @$errors->first('email') }}</strong>
													</span>
												@endif
											</div><!-- .form-group end -->
											<div class="form-group">
												<label for="loginPassword">Password</label>
												<input autocomplete="new-password" type="password" name="password" id="loginPassword"
													class="form-control" placeholder="">
													@if ($errors->has('password'))
													<span class="custom-error" role="alert">
														<strong>{{ @$errors->first('password') }}</strong>
													</span>
												@endif
											</div><!-- .form-group end -->
											<div class="form-group">
												{{ Form::button('Sign in!', ['class'=>'form-control rounded', 'onClick'=>'customValidate("login")']) }}
												<label class="label-container checkbox-default">
													<span>Remember Me</span>
													<input name="remember" id="remember" type="checkbox">
													<span class="checkmark"></span>
												</label>
												<a href="javascript:;" class="popup-btn-forgotpass">Forgot Password?</a>
											</div><!-- .form-group end -->
										</div><!-- .form-content end -->
									</form><!-- #form-login end -->
								</div><!-- .left end -->
								<div class="right">
									<h5>Or Sign up With Your Socials</h5>
									<ul class="list-btns-social rounded">
										<li>
											<a class="btn-social bs-google-plus" href="{{URL::to('/auth/google')}}">
												<i class="fab fa-google-plus-g"></i>
												<span>google</span>
											</a>
										</li>
										<li>
											<a class="btn-social bs-facebook" href="{{URL::to('/auth/facebook')}}">
												<i class="fab fa-facebook-square"></i>
												<span>facebook</span>
											</a>
										</li>										
									</ul><!-- .list-btns-social end -->
								</div><!-- .right end -->
								<div class="foot-msg">
									<span class="msg">Not a member yet? <a href="javascript:;" class="popup-btn-register">Sign up</a> for free</span>
									<div class="popup-close hamburger hamburger--slider is-active">
										<span class="hamburger-box"> 
											<span class="hamburger-inner"></span>
										</span>
									</div><!-- .popup-close -->
								</div><!-- .foot-msg end -->
							</div><!-- .content end -->
						</div><!-- .block-content end -->
					</div><!-- .popup-content end -->
				</div><!-- .col-md-8 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .popup-preview -->
<div class="popup-preview popup-preview-2 popup-preview-forgotpass">
		<div class="popup-bg"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="popup-content">
						<div class="block-content">
							<div class="popup-close hamburger hamburger--slider is-active">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</div><!-- .popup-close -->
							<div class="block-title">
								<h3>Welcome Back to Travel24hr.com.com</h3>
								<h5>Forgot Password to your account to continue using Travel24hr.com.com</h5>
							</div><!-- .block-title end -->
							<div class="content"> 
								<div class="left">
								<span style="display:none;" class="help-block forgot-error">
									<strong></strong>
								</span>
									{{ Form::open(array('url' => '/forgot_password', 'name'=>"forgot", 'autocomplete'=>'off', 'class'=>'rounded', 'id' => 'form-forgot')) }}
										<div class="form-content">
											<div class="form-group"> 
												<label for="loginUserEmail">Email Adress / Username</label>
												<input data-valid="required" autocomplete="new-password" type="text" name="email" id="floginUserEmail" class="form-control"
													placeholder="">
												<span style="display:none;" class="help-block femail-error">
													<strong></strong>
												</span>
											</div><!-- .form-group end -->
											<div class="form-group">
												{{ Form::button('Forgot Password', ['class'=>'form-control rounded', 'id'=>'userforgot']) }}
											</div><!-- .form-group end -->
										</div><!-- .form-content end -->
									</form><!-- #form-login end -->
								</div><!-- .left end -->
								<div class="right">
									<h5>Or Sign up With Your Socials</h5>
									<ul class="list-btns-social rounded">
										<li>
											<a class="btn-social bs-google-plus" href="{{URL::to('/auth/google')}}">
												<i class="fab fa-google-plus-g"></i>
												<span>google</span>
											</a>
										</li>
										<li>
											<a class="btn-social bs-facebook" href="{{URL::to('/auth/facebook')}}">
												<i class="fab fa-facebook-square"></i>
												<span>facebook</span>
											</a>
										</li>
									</ul><!-- .list-btns-social end -->
								</div><!-- .right end -->
							</div><!-- .content end -->
						</div><!-- .block-content end -->
					</div><!-- .popup-content end -->
				</div><!-- .col-md-8 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .popup-preview -->
	<div class="popup-preview popup-preview-2 popup-language-choice">
		<div class="popup-bg"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="popup-content">
						<div class="block-content">
							<div class="content">
								<h5>Choose Language</h5>
								<form class="form-language-choice form-inline style-2">
									<div class="form-group">
										<div class="list-select-options">
											<input type="text" id="select-language" readonly>
											<input type="hidden" id="select-language_code">
											<i class="fa fa-sort"></i>
										</div><!-- .list-select-options end -->
									</div><!-- .form-group end -->
									<div class="form-group">
										<div class="list-select-options">
											<select class="options-select2">
												<option selected>Egyptian Pound (EGP)</option>
												<option>Saudi Real (SAR)</option>
											</select>
											<i class="fa fa-sort"></i>
										</div><!-- .list-select-options end -->
									</div><!-- .form-group end -->
									<div class="form-group">
										<button type="submit" class="form-control">Save</button>
									</div><!-- .form-group end -->
								</form><!-- .form-language-choice end -->
								<div class="popup-close hamburger hamburger--slider is-active">
									<span class="hamburger-box">
										<span class="hamburger-inner"></span>
									</span>
								</div><!-- .popup-close -->
							</div><!-- .content end -->
						</div><!-- .block-content end -->
					</div><!-- .popup-content end -->
					</div><!-- .col-md-8 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div><!-- .popup-preview --> 
		<!-- COMMON SCRIPTS -->
		<script type="text/javascript">
			var site_url = "<?php echo URL::to('/'); ?>";
			var redirecturl = "<?php echo URL::to('/thanks'); ?>";
		</script>
		<script src="{{URL::asset('js/Frontend/bootstrap.min.js')}}"></script>
		<!--<script src="{{URL::asset('js/Frontend/common_scripts.js')}}"></script> -->
		<script src="{{URL::asset('js/Frontend/moment.min.js')}}"></script>
		<script src="{{URL::asset('js/Frontend/jRespond.min.js')}}"></script>
		<!--<script src="{{URL::asset('js/Frontend/jquery.fitvids.js')}}"></script>-->
		<script src="{{URL::asset('js/Frontend/superfish.js')}}"></script>
		<script src="{{URL::asset('js/Frontend/slick.min.js')}}"></script>
		<!--<script src="{{URL::asset('js/Frontend/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{URL::asset('js/Frontend/isotope.pkgd.min.js')}}"></script>-->
		<script src="{{URL::asset('js/Frontend/scrollIt.min.js')}}"></script>
		<script src="{{URL::asset('js/Frontend/jquery-ui.min.js')}}"></script>
		<script src="{{URL::asset('js/Frontend/select2.min.js')}}"></script>
		<!--<script src="{{URL::asset('js/Frontend/countrySelect.min.js')}}"></script>-->
		<script src="{{URL::asset('js/Frontend/functions.js')}}"></script>
		<script src="{{URL::asset('js/Frontend/intlTelInput.js')}}"></script>
		<script src="{{URL::asset('js/Frontend/ResizeSensor.js')}}"></script>
	<script src="{{URL::asset('js/Frontend/theia-sticky-sidebar.js')}}"></script>
		<script src="{{URL::asset('js/Frontend/daterangepicker.min.js')}}"></script>
		<script src="{{URL::asset('js/Frontend/readmore_fade.js')}}"></script>
		<script src="{{URL::asset('js/Frontend/multiselectdropdown.js')}}"></script>
		<script src="{{URL::asset('js/Frontend/callender.js')}}"></script>
		
		<script src="{{URL::asset('js/Frontend/hotelsearch.js')}}"></script>
			<script src="{{URL::asset('js/niceCountryInput.js')}}"></script>
		@yield('scripts')
		<script>
			var sticky = document.querySelector('nav.secondary_nav');
			var origOffsetY = sticky.offsetTop;

			function onScroll(e) {
			  window.scrollY >= origOffsetY ? sticky.classList.add('fixed') :
											  sticky.classList.remove('fixed');
			}

			document.addEventListener('scroll', onScroll);
			
			$("nav.secondary_nav ul li a").on('click', function(event) {
				$('.pack_tabs li a').removeClass('active');
				$(this).addClass('active');
				// Make sure this.hash has a value before overriding default behavior
				if (this.hash !== "") {
				  // Prevent default anchor click behavior
				  event.preventDefault();

				  // Store hash
				  var hash = this.hash;

				  $('html, body').animate({
					scrollTop: $(hash).offset().top -120
				  }, 800, function(){
			   
				  });
				} // End if
			  });
		
			$('article.cust_article').readmore();
			function myFunction(val) {
				if(val == 1){
					var dots = document.getElementById("dots");
					var moreText = document.getElementById("more");
					var btnText = document.getElementById("myBtn");
				}else if(val == 2){
					var dots = document.getElementById("dots1");
					var moreText = document.getElementById("more1");
					var btnText = document.getElementById("myBtn1");
				}else if(val == 3){
					var dots = document.getElementById("dots2");
					var moreText = document.getElementById("more2");
					var btnText = document.getElementById("myBtn2");
				}
			  if (dots.style.display === "none") { 
				dots.style.display = "inline";
				btnText.innerHTML = "<i class='fa fa-plus'></i> Read more"; 
				moreText.style.display = "none";
			  } else {
				dots.style.display = "none";
				btnText.innerHTML = "<i class='fa fa-minus'></i> Read less"; 
				moreText.style.display = "inline";
			  } 
			}	
		</script>
		<script>
		var airlineurl = '{{URL::to('/img/airline/')}}'; 
		var bookurl = '{{URL::to('/Review/Checkout')}}'; 
		</script>
		@if(isset($_GET['jt']) && $_GET['jt'] == 2)
			<script>
$(document).ready(function(){
  $("input[type=radio][name='inbound']:checked").trigger('click');
  $("input[type=radio][name='outbound']:checked").trigger('click');
	
});
</script>
			<script src="{{URL::asset('js/Frontend/RoundTripFilter.js')}}"></script>
		@else
			<script src="{{URL::asset('js/Frontend/OneWayFilter.js')}}"></script>
		@endif		
		<script src="{{URL::asset('js/Frontend/owl.carousel.js')}}"></script>
		<script src="{{URL::asset('js/custom-form-validation.js')}}"></script>
		<script src="{{URL::asset('js/Frontend/swiper.min.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
		<script>
			var swiper = new Swiper('.swiper-container', {
			slidesPerView: 3,
			slidesPerGroup: 1,
			  navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			  },
			   autoplay: 
				{
				  delay: 5000,
				},
				loop: true,
			}); 
		</script>	
		<?php if ($errors->has('email') || $errors->has('password')){ ?>
			<script> $(document).ready(function(){ $(".popup-preview-overlay-2").addClass("viewed"); }); </script>
		<?php	} ?>
		<script>
 function SwapDestination() {
        var source = $('.loc_search_field_one input[name="onewayfromtext"]').val();
        var Destination = $('.loc_search_field_one_to input[name="onewaytotext"]').val();
        $('.loc_search_field_one input[name="onewayfromtext"]').val(Destination);
        $('.loc_search_field_one_to input[name="onewaytotext"]').val(source);
    }
	function SwapRoundDestination() {
        var source = $('.loc_search_field input[name="roundwayfrmtext"]').val();
        var Destination = $('.loc_search_field_to input[name="roundwaytotext"]').val();
        $('.loc_search_field input[name="roundwayfrmtext"]').val(Destination);
        $('.loc_search_field_to input[name="roundwaytotext"]').val(source);
        
        var source1 = $('.loc_search_field #roundfromsearch').val();
        var Destination1 = $('.loc_search_field_to #roundtosearch').val();
        $('.loc_search_field #roundfromsearch').val(Destination1);
        $('.loc_search_field_to #roundtosearch').val(source1);
    }
      $(document).ready(function(){
		  $( document ).tooltip();
		   size_li = $("#myUL .coupon_li").length;
			  x = 2; 
			  $('#myUL .coupon_li:lt(' + x + ')').show();
			  $('#loadMore a').click(function() {
				x = (x + 5 <= size_li) ? x + 5 : size_li;
				$('#myUL .coupon_li:lt(' + x + ')').show(); 
				 if(x == size_li){
						$('#loadMore').hide();
					}
			  });
			  size_lis = $("#myUL li").length;
			  xs = 10; 
			  if(size_lis > 10){
				  $('#craftloadMore').show();
			  }else{
				  $('#craftloadMore').hide();
			  }
			  $('#myUL li:lt(' + xs + ')').show();
			  $('#craftloadMore').click(function() {
				xs = (xs + 5 <= size_lis) ? xs + 5 : size_lis;
				$('#myUL li:lt(' + xs + ')').show(); 
				 if(xs == size_lis){
						$('#craftloadMore').hide();
					}
			  });
			  size_liss = $("#myULair li").length;
			  xss = 10; 
			  if(size_liss > 10){
				  $('#airloadMore').show();
			  }else{
				  $('#airloadMore').hide();
			  }
			  $('#myULair li:lt(' + xss + ')').show();
			  $('#airloadMore').click(function() {
				xss = (xss + 5 <= size_liss) ? xss + 5 : size_liss;
				//alert(xss);
				$('#myULair li:lt(' + xss + ')').show(); 
				 if(xss == size_liss){
						$('#airloadMore').hide();
					}
			  });
		 $(document).delegate('.roundtripenable', "focus", function () { 
			
			 $(".br-tabs li").removeClass('active');
			 $('.if_oneway_trip').prop("readonly",false);
			$('.if_oneway_trip').parent().css('opacity','1');
			 $('.roundtriptab').addClass("active");
			 	$('#journey_type').val(2);
		 });
		 
		 $(".adm").click(function(){
			for(var e=2;e<7;e++){
				if("none"==document.getElementById("section-s"+e).style.display){
					document.getElementById("section-s"+e).style.display="block",
					document.getElementById("crs"+e).style.display="block";break
					} 6!=e && (document.getElementById("crs"+e).style.display="none"),5==e&&(document.getElementById("addAnFlt").style.display="none")}
					});
		 $(".br-tabs li").on("click", function () {
			
			 $(".br-tabs li").removeClass('active');
			 $(".commonway").removeClass('active');
			
			 $(this).addClass("active");
			var val =  $(this).attr('dataway');
			if(val == 'roundtrip'){
				$('.if_oneway_trip').prop("readonly",false);
				$('.if_oneway_trip').parent().css('opacity','1');
				$('.roundandoneway').css('display','list-item');
				$('.roundandoneway').addClass('active');
				$('.multiwaytrip').hide();
				$('#journey_type').val(2);
			}else if(val == 'multicity'){
				$('.if_oneway_trip').prop("readonly",true);
				$('.if_oneway_trip').parent().css('opacity','0.4');
				$('#journey_type').val(3);
				$('.multiwaytrip').css('display','list-item');
				$('.multiwaytrip').addClass('active');
				$('.roundandoneway').hide();
			}else{
				$('.roundandoneway').css('display','list-item');
				$('.roundandoneway').addClass('active');
				$('.multiwaytrip').hide();
				$('.if_oneway_trip').prop("readonly",true);
				$('.if_oneway_trip').parent().css('opacity','0.4');
				$('#journey_type').val(1);
			}
		 });
		  var typingTimer;                //timer identifier
			var doneTypingInterval = 5000;
			var minlength = 3;
				  $('.loc_search_field_one input[name="onewayfromtext"]').on("keyup", function(){
					if (typingTimer) clearTimeout(typingTimer); 
					
				 var inputVal = $(this).val();
				 if (inputVal.length >= minlength ) {
				 typingTimer = setTimeout(doneTyping(inputVal, 'if_search_val'), doneTypingInterval);
				 
				 }
				}); 
				 
				$('.loc_search_field_one input[name="onewayfromtext"]').on("keyup", function(){
						clearTimeout(typingTimer);
					});
				
				  var typingTimerto;                //timer identifier
				var doneTypingIntervalto = 5000;
				$('.loc_search_field_one_to input[name="onewaytotext"]').on("keyup", function(){
					if (typingTimerto) clearTimeout(typingTimerto); 
					
				 var inputVal = $(this).val();
				   if (inputVal.length >= minlength ) {
					typingTimerto = setTimeout(doneTyping(inputVal,'is_search_val_to'), doneTypingIntervalto);
				   }
				}); 
				   
				$('.loc_search_field_one_to input[name="onewaytotext"]').on("keyup", function(){
						clearTimeout(typingTimerto);
					});
				
				
				  var typingTimerroundfrom;                //timer identifier
				var doneTypingIntervalroundfrom = 5000;
				$('.loc_search_field input[name="roundwayfrmtext"]').on("keyup", function(){
					if (typingTimerroundfrom) clearTimeout(typingTimerroundfrom); 
					
				 var inputVal = $(this).val();
				   if (inputVal.length >= minlength ) {
					typingTimerroundfrom = setTimeout(doneTyping(inputVal,'is_search_from_val'), doneTypingIntervalto);
				   }
				}); 
				   
				$('.loc_search_field input[name="roundwayfrmtext"]').on("keyup", function(){
						clearTimeout(typingTimerroundfrom);
					});
					
					
				 var typingTimerroundto;                //timer identifier
				var doneTypingIntervalroundto = 5000;
				$('.loc_search_field_to input[name="roundwaytotext"]').on("keyup", function(){
					if (typingTimerroundto) clearTimeout(typingTimerroundto); 
					
				 var inputVal = $(this).val();
				   if (inputVal.length >= minlength ) {
					typingTimerroundto = setTimeout(doneTyping(inputVal,'is_search_to_val'), doneTypingIntervalroundto);
				   }
				}); 
				   
				$('.loc_search_field_to input[name="roundwaytotext"]').on("keyup", function(){
						clearTimeout(typingTimerroundto);
					});
				
				$(document).delegate('.farerule', 'click', function(){
					var rsindex = $(this).attr('resindex');
					var val = $('#first'+$(this).attr('resindex')).val();
					if(val == 0){
					$.ajax({
					   url:"{{URL::to('/Flight/farerules/')}}",
					   method:'GET',
					   data:{resindex:rsindex, traceid:$(this).attr('traceid')},
					   success:function(data)
					   {
						$('.showtob'+rsindex).html(data);
							$('#first'+rsindex).val(1);
					   }
					  });
					}
				});
				
				
				function doneTyping (inputVal,classname) {
					
					$.ajax({
					   url:"{{URL::to('/Flight/cities/')}}",
					   method:'GET',
					   data:{textval:inputVal, type:classname},
					   dataType:'json',
					   success:function(data)
					   {
						$('.'+classname).html(data.table_data);
					 
					   }
					  });
				}
				$(document).on("submit", "#searchform", function(e){
				e.preventDefault();
				var val = $('.search-query').val();
					if(val != ''){
					window.location = '{{URL::to('/destinations/')}}/'+ val;
					}
				return  false;
			});

				$(".myqueryli").on("click", function(){
					var dataid = $(this).attr("datapacid");
					
					$("#mpackage_id").val(dataid);
					$('input[name="traveldate"]').daterangepicker({
							singleDatePicker: true,
							
						  locale: {
							  cancelLabel: 'Clear'
						  }
					  });
				});
				$(".hotelcontent").on("click", function(){
					var dataid = $(this).attr("datid");
					
					$("#hotelcontent h4").html(gallerydata[dataid]['hotelname']);
					$("#hotelcontent .hotel_description").html(gallerydata[dataid]['description']);
					var datatml = '';
					for(var ik =0; ik < gallerydata[dataid]['star']; ik++){
						 datatml += ('<img src="{!! asset('img/star.png') !!}" alt="Star Rating" title="Star Rating">');
					}
					$("#hotelcontent .starmargin").html(datatml);
					$("#hotelcontent .loclity").html('<span class="textblack13bold ng-scope">Locality: '+gallerydata[dataid]['address']+'</span>');
					$("#hotelcontent").modal("show");
				});
			});
		$(document).ready(function() {
			$('#registerFullname').on('keyup', function(){
				$('#registerFullname').removeClass('error');
				$('.name-error').hide();
				$('.name-error').html('');
			});
			
			$('#registerEmail').on('keyup', function(){
				$('#registerEmail').removeClass('error');
				$('.email-error').hide();
				$('.email-error').html('');
			});
			$('#registerPassword').on('keyup', function(){
				$('#registerPassword').removeClass('error');
				$('.password-error').hide();
				$('.password-error').html('');
			});$('#registerPasswordConfirm').on('keyup', function(){
				$('#registerPasswordConfirm').removeClass('error');
				$('.confirm-password-error').hide();
				$('.confirm-password-error').html('');
			});
			
			$("#userforgot").on("click", function(e){
				e.preventDefault();
				var formElem = $("#form-forgot");
				var formData = new FormData(formElem[0]);
				$("#form-forgot :input").prop("disabled", true);
				$.ajax({
					url: "{{ route('forgot_password') }}",
					dataType: 'json',
					type: 'POST',
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					processData: false,
					contentType: false,
					data: formData,
					success: function( data ){
						$("#form-forgot :input").prop("disabled", false);
						$('#floginUserEmail').val('');
						$('.loading').hide();
						//var obj = $.parseJSON(data);
						if (data.success) {
						 $('.forgot-error').show();
						 $('.forgot-error').html('<p class="alert alert-success">'+data.message+'</p>');
						}else{
							$('.forgot-error').show();
							 $('.forgot-error').html('<p class="alert alert-danger">'+data.message+'</p>');
						}
					},
					error: function( jqXhr, textStatus, errorThrown ){
						$("#form-forgot :input").prop("disabled", false);
						if(jqXhr.status === 422) {
							var errors = jqXhr.responseJSON;
							console.log( errors );
		
							if(typeof  errors.errors['email']  != "undefined"){
								$('.femail-error').show();
								$('.femail-error').html(errors.errors['email']);
								$('#floginUserEmail').addClass('error');
							}
							
						
						}
					}
				});
			});
			$("#usersubmit").on("click", function(e){
				e.preventDefault();
		
		 var formElem = $("#form-register");
		console.log(formElem[0]);
		var formData = new FormData(formElem[0]);
		$("#form-register :input").prop("disabled", true);
		$.ajax({
			url: "{{ route('user.register') }}",
			dataType: 'json',
			type: 'POST',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			processData: false,
			contentType: false,
			data: formData,
			success: function( data ){
				$('.loading').hide();
				//var obj = $.parseJSON(data);
				if (data.success) {
				 window.location.href = "{{url('/user')}}";
				}else{
					alert();
				}
			},
			error: function( jqXhr, textStatus, errorThrown ){
				$("#form-register :input").prop("disabled", false);
				if(jqXhr.status === 422) {
					var errors = jqXhr.responseJSON;
					console.log( errors );
					if(typeof  errors.errors['jaName']  != "undefined"){
						$('.name-error').show();
						$('.name-error').html(errors.errors['jaName']);
						$('#registerFullname').addClass('error');
					}
					if(typeof  errors.errors['registerEmail']  != "undefined"){
						$('.email-error').show();
						$('.email-error').html(errors.errors['registerEmail']);
						$('#registerEmail').addClass('error');
					}
					if(typeof  errors.errors['password']  != "undefined"){
						$('.password-error').show();
						$('.password-error').html(errors.errors['password']);
						$('#registerPassword').addClass('error');
					}
					
					if(typeof  errors.errors['cc']  != "undefined"){
						$('.cc-error').show();
						$('.cc-error').html(errors.errors['cc']);
						$('#cc').addClass('error');
					}
					if(typeof  errors.errors['password_confirmation']  != "undefined"){
						$('.confirm-password-error').show();
						$('.confirm-password-error').html(errors.errors['password_confirmation']);
						$('#registerPasswordConfirm').addClass('error');
					}
				
				}
			}
		}); 
	});
		$("#recommended").owlCarousel({ 
			  loop:true,
			margin:10,
			nav:true, 
			dots: false,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:3
				},
				1000:{
					items:4
				}
			}
		  }); 
		$("#reccomended").owlCarousel({ 
			  loop:true,
			margin:10,
			nav:true,
			dots: false,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:3
				},
				1000:{
					items:3
				}
			}
		  }); 
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                margin: 10, 
                nav: true,
				dots: false,
                loop: false,
                responsive: {
                  0: {
                    items: 3
                  },
                  600: {
                    items: 5
                  },
                  1000: {
                    items: 7
                  }
                }
              });
			   var vc = $(".item.chk_index").attr('countno');
			  if(vc < 7){
				  $('.owl-carousel').trigger('to.owl.carousel', [vc, 500, true]);
			  }else{
				  $('.owl-carousel').trigger('to.owl.carousel', [parseInt(vc) - 3, 500, true]);
			  }
			$(document).delegate('.flight_details a.details_btn', "click", function(){
				var val = $(this).attr('dataid');
				$('.flight_details_info').removeClass('show');
				$('#show_'+val).addClass('show');
			});
			$(document).delegate('.flight_details_close a', "click", function(){
		
				$('.flight_details_info').removeClass('show');
			});			
			$(document).delegate('.flight_details a.seconddetails_btn', "click", function(){
				var val = $(this).attr('dataid');
				$('.secflight_details_info').removeClass('show');
				$('#depshow_'+val).addClass('show');
			});
			$(document).delegate('.secflight_details_close a', "click", function(){
		
				$('.secflight_details_info').removeClass('show');
			});
			$(document).delegate('.advanced_option a', "click", function(){
			
				$('.advanced_option .list_grade').toggleClass('show');
			});		
			var sel = $('.wrapper-dropdown-2'),
   txtround = $('.roundwayfrom'),
    options = $('.location_search');
sel.click(function (e) {
    e.stopPropagation();
	$('.location_search_to').hide();
    options.show();
});
$('body').click(function (e) {
    options.hide();
});
$(document).delegate('.is_search_from_val li','click',function (e) {
    e.stopPropagation();
    txtround.val($(this).attr('roundwayfrom'));
	$('#roundfromsearch').val($(this).attr('roundwayfromtop'));
    $(this).addClass('selected').siblings('li').removeClass('selected');
    options.hide();
	txtround.blur();
});
var sel_to = $('.wrapper-dropdown-3'),
    txtround1 = $('.roundwayto'),
    to_options = $('.location_search_to');
sel_to.click(function (e) {
    e.stopPropagation();
	$('.location_search').hide();
    to_options.show();
});

$('body').click(function (e) {
    to_options.hide();
});

$(document).delegate('.is_search_to_val li','click',function (e) {
    e.stopPropagation();
    txtround1.val($(this).attr('roundwayto'));
	$('#roundtosearch').val($(this).attr('roundwaytotop'));
    $(this).addClass('selected').siblings('div').removeClass('selected');
    to_options.hide();
	txtround1.blur();
});

var sel_from = $('.wrapper-dropdown-4'),
   txt1 = $('.onewayfrom'),
    from_options = $('.one_location_search_from');

sel_from.click(function (e) {
    e.stopPropagation();
	$('.one_location_search_to').hide();
	
    from_options.show();
});

$('body').click(function (e) {
    from_options.hide();
	
});

$(document).delegate('.if_search_val li','click',function (e) {
	
    e.stopPropagation();
    txt1.val($(this).attr('onewayfrom'));
	$('#onewayfromsearch').val($(this).attr('onewayfromtop'));
    $(this).addClass('selected').siblings('li').removeClass('selected');
    from_options.hide();
	txt1.blur();
});

var sel_to_one = $('.wrapper-dropdown-5'),
    txt2 = $('.onewayto'),
    to_one_options = $('.one_location_search_to');

sel_to_one.click(function (e) {
    e.stopPropagation();
	$('.one_location_search_from').hide();
    to_one_options.show();
});

$('body').click(function (e) {
    to_one_options.hide();
});
$('.book_btn a, .change_flight').on('click', function() {
		// Animate loader off screen
		$(".se-pre-con").show();
	});

$(document).delegate('.is_search_val_to li','click',function (e) {
    e.stopPropagation();
    txt2.val($(this).attr('onewayto'));
    $('#onewaytosearch').val($(this).attr('onewaytotop'));
    $(this).addClass('selected').siblings('li').removeClass('selected');
    to_one_options.hide();
	txt2.blur();
});

$(document).delegate('[id^="fromdest_show"]','click', function () {
	var v = $(this).attr('did');
	
	$('#section-'+v+' .location_search_to').hide();
    $('#section-'+v+' .location_search').show();
});
$(document).delegate('[id^="todest_show"]','click', function () {
	var v = $(this).attr('did');
	
	$('#section-'+v+' .location_search_to').show();
    $('#section-'+v+' .location_search').hide();
});
 var typingTimer;                //timer identifier
var doneTypingInterval = 5000;
var minlength = 3;
$('[id^="fromdest_show"]').each(function () {
	var v = $(this).attr('did');
	var vs = $(this).attr('ssid');
	$(document).delegate('#section-'+v+' .multi_is_search_from_val li','click',function (e) {
		e.stopPropagation();
		$('#section-'+v+' .multi_roundwayfrom').val($(this).attr('roundwayfrom'));
		$('#section-'+v+' #multi_roundfromsearch'+vs).val($(this).attr('roundwayfromtop'));
		$(this).addClass('selected').siblings('li').removeClass('selected');
		$('#section-'+v+' .location_search').hide();
		$('#section-'+v+' .multi_roundwayfrom').blur();
	});
	
	$('#section-'+v+' .loc_search_field input[name="multiwayfromtext'+vs+'"]').on("keyup", function(){
		if (typingTimer) clearTimeout(typingTimer); 

		var inputVal = $(this).val();
		if (inputVal.length >= minlength ) {
			typingTimer = setTimeout(muldoneTyping(inputVal, 'multi_is_search_from_val'), doneTypingInterval);

		}
		}); 

		$('#section-'+v+' .loc_search_field input[name="multiwayfromtext'+vs+'"]').on("keyup", function(){
		clearTimeout(typingTimer);
		});
});
$('[id^="todest_show"]').each(function () {
	var v = $(this).attr('did');
	var vs = $(this).attr('ssid');
	$(document).delegate('#section-'+v+' .multi_is_search_to_val li','click',function (e) {
		e.stopPropagation();
		$('#section-'+v+' .multi_roundwayto').val($(this).attr('roundwayto'));
		$('#section-'+v+' #multi_roundtosearch'+vs).val($(this).attr('roundwaytotop'));
		$(this).addClass('selected').siblings('li').removeClass('selected');
		$('#section-'+v+' .location_search_to').hide();
		$('#section-'+v+' .multi_roundwayto').blur();
	});
	
	$('#section-'+v+' .loc_search_field_to input[name="multiwaytotext'+vs+'"]').on("keyup", function(){
		if (typingTimer) clearTimeout(typingTimer); 

		var inputVal = $(this).val();
		if (inputVal.length >= minlength ) {
			typingTimer = setTimeout(muldoneTyping(inputVal, 'multi_is_search_to_val'), doneTypingInterval);
		}
		}); 
		$('#section-'+v+' .loc_search_field_to input[name="multiwaytotext'+vs+'"]').on("keyup", function(){
		clearTimeout(typingTimer);
		});
});

$('#onewaytosearch').on('click',function(){
	$('#round-trip-date').show();
})
$('#onewayfromsearch').on('click',function(){
	$('#round-trip-date').hide();
})
function muldoneTyping (inputVal,classname) {
	$.ajax({
	   url:"{{URL::to('/Flight/cities/')}}",
	   method:'GET',
	   data:{textval:inputVal, type:classname},
	   dataType:'json',
	   success:function(data)
	   {
		$('.'+classname).html(data.table_data);
	 }
	  });
}
		  $('.onewayformsearch').on('click', function() {
                var val1 = $('#onewayfromsearch').val();
                var val2 = $('#onewaytosearch').val();
                var onewaystartdate = $('#onewaystartdate').val();
                var onewayadult = $('#onewayadult').val();
                var onewaychild = $('#onewaychild').val();
                var onewayinfants = $('#onewayinfants').val();
                var journey_type = 1;
                var seatclass = $('.roundseatclass:checked').val();
                var is_non_stop = $('.is_non_stop:checked').val();
                var flag = true;
                if (val1 == '') {
                    flag = false;
                    alert("Source cannot be blank");
                } else if (val2 == '') {
                    flag = false;
                    alert("Destination cannot be blank");
                } else if (onewaystartdate == '') {
                    flag = false;
                    alert("Departure date cannot be blank");
                } else if (val1 == val2) {
                    flag = false;
                    alert("Source and destination cannot be same");
                }
                if (flag) {
                    window.location.href = "{{URL::to('/FlightList/index')}}?srch=" + val1 + "|" + val2 + "|" + onewaystartdate + "&px=" + onewayadult + "-" + onewaychild + "-" + onewayinfants + "&cbn=" + seatclass + "&nt=" + is_non_stop + "&jt=" + journey_type;
                }
            });

window.onload = function () {
 
    loadMoreButton();
}
function loadMoreButton(){
	var list = $(".tktlist .trip");
      var numToShow = 15;
      var button = $(".lotds");
      var numInList = list.length;
	  console.log(numInList)
      list.hide();
      if (numInList > numToShow) {
        button.show();
      }
      list.slice(0, numToShow).show();

      button.click(function(){
          var showing = list.filter(':visible').length;
          list.slice(showing - 1, showing + numToShow).fadeIn();
          var nowShowing = list.filter(':visible').length;
          if (nowShowing >= numInList) {
            button.hide();
          }
      });
}
	
            
		$('.roundseatclass').on('click',function(){
			$('.roundsearclass').attr('checked',false);
			$(this).attr('checked',true);
		})
		$('.roundformsearch').on('click', function(){
			var val1 = $('#onewayfromsearch').val();
			var val2 = $('#onewaytosearch').val();
			var from = $('#roundfromsearch').val();
		
			var to = $('#roundtosearch').val();

			var onewaystartdate = $('#datepicker1').val();
			var onewayenddate = $('#datepicker2').val();
			var onewayadult = $('#roundadult').val();
			var onewaychild = $('#roundchild').val();
			var onewayinfants = $('#roundinfant').val();
			var journey_type = $('#journey_type').val();
			
			var seatclass = $('.roundseatclass:checked').val();
			
// this is used for the stop 
			var is_non_stop = '';
			//var is_non_stop = $('#roundis_non_stop:checked').val();
			var flag = true;
			if(val1 == ''){
				flag = false;
				alert("Source cannot be blank");
			}
			else if($('#roundfromsearch').val() == ''){
				flag = false;
				alert("Destination cannot be blank");
			}
			else if($('#roundtosearch').val() == ''){
				flag = false;
				alert("Arrival cannot be blank");
			}
			else if($('#roundfromsearch').val() == $('#roundtosearch').val()){
				flag = false;
				alert("Destination and arrival cannot be same location");
			}
			else if(onewaystartdate == ''){
				flag = false;
				alert("Departure Date cannot be blank");
			}
			else if(onewayenddate == '' && journey_type == 2){
				flag = false;
				alert("Arrival Date cannot be blank");
			}
			
			
			else if(val1 == val2){
				flag = false;
				alert("Source and destination cannot be same");
			}
			
				$("#hfFromDestination").val(val1);
					$("#hfToDestination").val(val2); 
					$("#hfTripType").val(journey_type); 
					var arrD = onewaystartdate.split("/");
					$("#hfFromDate").val(arrD[2] + "/" + arrD[1] + "/" + arrD[0]);					
					if (seatclass == 2) {
						$("#select_class").val("Economy");
					}
					else if (seatclass == 3) {
						$("#select_class").val("Premium Economy");
					}
					else if (seatclass == 4) {
						$("#select_class").val("Business");
					}
					else if (seatclass == 6) {
						$("#select_class").val("First Class");
					}
					if(journey_type == 2){
					 var arrR = onewayenddate.split("/");
					$("#hfToDate").val(arrR[2] + "/" + arrR[1] + "/" + arrR[0]);
					}
					$("#hfAdult").val(onewayadult);
					$("#hfChild").val(onewaychild);
					$("#hfInfant").val(onewayinfants);
					console.log(journey_type);
		

				if(onewayenddate){
					var journey_type  = val2;
				}
				if(onewayenddate == ''){
					var journey_type  = val1;
				}
		
		        

			     if (flag) {
                    if (journey_type == 2) {
                        $("#dvWait").html(WaitSearch());
                        $('.searchpop1').show();
                       window.location.href = "{{URL::to('/FlightList/index')}}?srch=" + val1 + "|" + val2 + "&dep=" + onewaystartdate + "&ret=" + onewayenddate + "&px=" + onewayadult + "-" + onewaychild + "-" + onewayinfants + "&cbn=" + seatclass + "&nt=" + is_non_stop + "&jt=" + journey_type + "&from=" + from + "&to=" + to;
                    } else {
                        $("#dvWait").html(WaitSearch());
                        $('.searchpop1').show();
                       window.location.href = "{{URL::to('/FlightList/index')}}?srch=" + val1 + "|" + val2 + "&dep=" + onewaystartdate + "&px=" + onewayadult + "-" + onewaychild + "-" + onewayinfants + "&cbn=" + seatclass + "&nt=" + is_non_stop + "&jt=" + journey_type + "&from=" + from + "&to=" + to;
                    }
                }
		});
		

            $('.bydatesearchdata').on('click', function() {
                var val1 = $(this).attr('fromdestination');
                var val2 = $(this).attr('todestination');
                var onewaystartdate = $(this).attr('fromdate');
                var onewayenddate = '';
                var onewayadult = $(this).attr('hfadult');
                var onewaychild = $(this).attr('hfChild');
                var onewayinfants = $(this).attr('hfInfant');
                var journey_type = $(this).attr('journytype');
                var is_non_stop = $(this).attr('nonstop');
                var seatclass = $(this).attr('seatclass');

                var flag = true;
                if (val1 == '') {
                    flag = false;
                    alert("Source cannot be blank");
                } else if (onewaystartdate == '') {
                    flag = false;
                    alert("Departure Date cannot be blank");
                } else if (onewayenddate == '' && journey_type == 2) {
                    flag = false;
                    alert("Arrival Date cannot be blank");
                } else if (val2 == '') {
                    flag = false;
                    alert("Destination cannot be blank");
                } else if (val1 == val2) {
                    flag = false;
                    alert("Source and destination cannot be same");
                }
                $("#hfFromDestination").val(val1);
                $("#hfToDestination").val(val2);
                $("#hfTripType").val(journey_type);

                var arrD = onewaystartdate.split("/");

                $("#hfFromDate").val(arrD[2] + "/" + arrD[1] + "/" + arrD[0]);

                if (seatclass == 2) {
                    $("#select_class").val("Economy");
                } else if (seatclass == 3) {
                    $("#select_class").val("Premium Economy");
                } else if (seatclass == 4) {
                    $("#select_class").val("Business");
                } else if (seatclass == 6) {
                    $("#select_class").val("First Class");
                }
                if (journey_type == 2) {
                    var arrR = onewayenddate.split("/");
                    $("#hfToDate").val(arrR[2] + "/" + arrR[1] + "/" + arrR[0]);
                }
                $("#hfAdult").val(onewayadult);
                $("#hfChild").val(onewaychild);
                $("#hfInfant").val(onewayinfants);
                if (flag) {
                    if (journey_type == 2) {
                        $("#dvWait").html(WaitSearch());
                        $('.searchpop1').show();
                    } else {
                        $("#dvWait").html(WaitSearch());
                        $('.searchpop1').show();
                    }
                }
            });
		});
		function ValidateMuticity() {
			var _param = "";
		var _parameterForRecent = "";
			for (i = 1; i <= 7; i++) {
				if ($("#section-s" + i).css("display") == "block") {
					if ($("#multi_roundfromsearch" + i).val().trim() == "") {
						alert("Source cannot be Empty");
						$("#multi_roundfromsearch" + i).focus();
						return false;
					}
					if ($("#multi_roundtosearch" + i).val().trim() == "") {
						alert("Destination cannot be Empty");
						$("#multi_roundtosearch" + i).focus();
						return false;
					}
					if ($("#multi_roundfromsearch" + i).val().trim() == $("#multi_roundtosearch" + i).val().trim()) {
						alert("Source and Destination cannot be Same");
						$("#multi_roundtosearch" + i).focus();
						return false;
					}
					if ($("#multipicker" + i).val().trim() == "") {
						alert("Date cannot be Empty");
						$("#multipicker" + i).focus();
						return false;
					}
					if (i != 1) {
						_param += "^"
						_parameterForRecent += "^";
					}
					_param += $("#multi_roundfromsearch" + i).val().trim() + "|" + $("#multi_roundtosearch" + i).val().trim() + "|" + $("#multipicker" + i).val().trim();
					_parameterForRecent += $("#multi_roundfromsearch" + i).val().trim() + "#$" + $("#multi_roundtosearch" + i).val().trim() + "#$" + $("#multipicker" + i).val().trim();
					
					
				}
			}
			var noOfAdults = $("#multiroundadult").val();
			var noOfChild = $("#multiroundchild").val();
			var noOfInfants = $("#multiroundinfant").val();
			var noOfPassenger = parseInt(noOfAdults) + parseInt(noOfChild);
			if (noOfPassenger > 9) {
				alert("currently booking can only be made for upto 9 travellers.You can make multiple bookings to accommodate your entire party.");
			}
			if (noOfAdults < noOfInfants) {
				alert("The total number of Infants passengers cannot exceed the total number of Adult passengers.");
			}
			
			 var from = $("#fromdest_show1").val().trim();
			var to = $("#todest_show1").val().trim();
			var departureDate = $("#multipicker1").val().trim();
			var returnDate = "";
			var FromNew = $("#fromdest_show1").val().trim();
			var ToNew = $("#todest_show1").val().trim();
			var strRecent = from + "|" + to + "|" + departureDate + "|" + returnDate + "|" + noOfAdults + "|" + noOfChild + "|" + noOfInfants + "|" + FromNew + "|" + ToNew + "|" + _parameterForRecent;
			
			var journey_type = 3;
			var seatclass = $('.multiwaytrip  .roundseatclass:checked').val();
			var is_non_stop = $('.multiwaytrip  #roundis_non_stop:checked').val();
			
			$("#hfAdult").val(noOfAdults);
					$("#hfChild").val(noOfChild);
					$("#hfInfant").val(noOfInfants);
			$("#dvWait").html(multiWaitSearch());
					
			$('.searchpop1').show();
			window.location.href= "{{URL::to('/FlightList/index')}}?srch="+_param+"&px="+noOfAdults+"-"+noOfChild+"-"+noOfInfants+"&cbn="+seatclass+"&nt="+is_non_stop+"&jt="+journey_type;
		}
		
		function multiWaitSearch() {

        var contact = $("#hfcontact").val();
        var sData = "  <div class='mob_gif_center'><p><strong> Please wait.</strong>. <br> we are searching best fares for you.</p> <div class='clearfix'></div><div class='loading-plane-pop'></div> </div><div class='wait-popup'>" +

       // "<div class='wait-logo'> " + " </div>" +
    //    " <div id='progressbar' style='width: 577px;'>" +
    //    " <div id='progressLine'>" +
    //    " <div id='pbaranim'></div>" +
    //     "  </div>" +
    //     "</div>" +
        " <div class='wait-txe'>" +
        " <h3> Finding the best fares for you bhup</h3> " + //" <p sty'>Searching for the best deal for you. Kindly wait, this may take a little time</p> " +
        " </div>" +

        " <div class='clearfix'></div>";
		for (i = 1; i <= 7; i++) {
			if ($("#section-s" + i).css("display") == "block") {
       sData  += "<div class='wait-main'>" +
        "<div class='wait-1'>";
        if ($("#multi_roundfromsearch" + i).val().trim() != "") {
            sData += "   <span class='wait-txt-small'>" + $("#multi_roundfromsearch" + i).val().split('-')[1] + "</span><br />" +
             "  <span class='wait-txt-big'>" + $("#multi_roundfromsearch" + i).val().split('-')[0] + "</span>";
        }
       
        sData += " </div>" +
           "  <div class='wait-1'>";
       sData += "<div class='search_wtg_divider single-divider'></div>";
	   if ($("#multipicker" + i).val().trim() != "") {
       sData += "<div class='searchdate'><span class='wait-dest-txt-small'>" + $("#multipicker" + i).val() + "</span></div>";
	   }
        sData += " </div>" +
        " <div class='wait-1'>";
        
        if ($("#multi_roundtosearch" + i).val().trim() != "") {  
         sData += "   <span class='wait-txt-small'>" + $("#multi_roundtosearch" + i).val().split('-')[1] + "</span><br />" +
             "  <span class='wait-txt-big'>" + $("#multi_roundtosearch" + i).val().split('-')[0] + "</span>";
		}
        sData += "  </div>" +
          "  </div>";
		}
		}
          sData +=  " <div class='clearfix'></div>" +


          "<div class='wait-depart'>";
		  var seatclass = $('.roundseatclass:checked').val();
if (seatclass == 2) {
		$("#select_class").val("Economy");
	}
	else if (seatclass == 3) {
		$("#select_class").val("Premium Economy");
	}
	else if (seatclass == 4) {
		$("#select_class").val("Business");
	}
	else if (seatclass == 6) {
		$("#select_class").val("First Class");
	}
        sData += "   <div class='wait-2'>" +
         "     <span class='wait-dest-txt'>Class</span><br />" +
         "      <span class='wait-dest-txt-small'>" + $("#select_class").val() + "</span>" +
         "   </div>" +
         "    <div class='wait-3'>" +
         "      <span class='wait-dest-txt'>Travellers</span><br />" +
         "       <span class='wait-dest-txt-small'>";

        if (parseInt($("#hfAdult").val()) == 1) {
            sData += "" + $("#hfAdult").val() + " Adult";
        }
        else {
            sData += "" + $("#hfAdult").val() + " Adults";
        }

        if (parseInt($("#hfChild").val()) > 0) {
            if (parseInt($("#hfChild").val()) == 1) {
                sData += ", " + $("#hfChild").val() + " Child";
            }
            else {
                sData += ", " + $("#hfChild").val() + " Children";
            }
        }

        if (parseInt($("#hfInfant").val()) > 0) {
            if (parseInt($("#hfInfant").val()) == 1) {
                sData += ", " + $("#hfInfant").val() + " Infant";
            }
            else {
                sData += ", " + $("#hfInfant").val() + " Infants";
            }
        }
        sData += "</span>" +
         "   </div>" +

         " </div>" +

         " <div class='wait-talk-main'>" +
         "  <div class='talk-txt'>" +
         "    " +
         " </div>" +
         "<div class='clearfix'></div> " +
         " <div class='talk-txt-1'>" +
         "  <img src='' alt='' />&nbsp;" +
         " </div>" +
         "  </div>" +
         "<div class='search_wtg_fotter'> </div> "

        "</div>";
        return sData;
    }

function WaitSearch() {
		var contact = $("#hfcontact").val();
        var sData = "  <div class='mob_gif_center'><p><strong> Please wait.</strong>. <br> we are searching best fares for you.</p> <div class='clearfix'></div><div class='loading-plane-pop'></div> </div><div class='wait-popup'>" +

       // "<div class='wait-logo'> " + " </div>" +
    //    " <div id='progressbar' style='width: 577px;'>" +
    //    " <div id='progressLine'>" +
    //    " <div id='pbaranim'></div>" +
    //     "  </div>" +
    //     "</div>" +
        
        " <div class='wait-txe'>" +
        " <h3>Finding the best fares for you  </h3> " + //" <p>Searching for the best deal for you. Kindly wait, this may take a little time</p> " +
        " </div>" +

        " <div class='clearfix'></div>" +
        "<div class='wait-main'>" +
        "<div class='wait-1'>";
        
            sData += "   <span class='wait-txt-small'>" + $("#roundfromsearch").val().split('-')[1] + "</span><br />" +
             "  <span class='wait-txt-big'>" + $("#roundfromsearch").val().split('-')[0] + "</span>";
        
       
        sData += " </div>" + "  <div class='wait-1'>";
        /*if ($("#hfTripType").val() == 1) {

            sData += "<div class='search_wtg_divider single-divider'></div>";
        }
        else {
            sData += "<div class='search_wtg_divider double-divider'></div>";
        }*/
        sData += "<img src=\"{!! asset('public/img/giphy.gif') !!}\" />";
        sData += " </div>" +
        " <div class='wait-1'>";
        
          
         sData += "   <span class='wait-txt-small'>" + $("#roundtosearch").val().split('-')[1] + "</span><br />" +
             "  <span class='wait-txt-big'>" + $("#roundtosearch").val().split('-')[0] + "</span>";
		  
        sData += "  </div>" + "  </div>" + " <div class='clearfix'></div>" + "<div class='wait-depart'>" + " <div class='wait-2'>" + "<span class='wait-dest-txt'>Departure</span><br />" + "<span class='wait-dest-txt-small'>" + $("#datepicker1").val() + "</span>" + "   </div>";
        
        if ($("#hfTripType").val() == 2) {
            sData += "  <div class='wait-2'>" + "<span class='wait-dest-txt'>Return</span><br />" + "<span class='wait-dest-txt-small'> " + $("#datepicker2").val() + "</span>" + "</div>";
        }

        sData += "   <div class='wait-2'>" +
         "     <span class='wait-dest-txt'>Class</span><br />" +
         "      <span class='wait-dest-txt-small'>" + $('.roundseatclass:checked').val() + "</span>" +
         "   </div>" +
         "    <div class='wait-2'>" +
         "      <span class='wait-dest-txt'>Travellers</span><br />" +
         "       <span class='wait-dest-txt-small'>";

        if (parseInt($("#roundadult").val()) == 1) {
            sData += "" + $("#roundadult").val() + " Adult";
        }
        else {
            sData += "" + $("#roundadult").val() + " Adults";
        }

        if (parseInt($("#roundchild").val()) > 0) {
            if (parseInt($("#roundchild").val()) == 1) {
                sData += ", " + $("#roundchild").val() + " Child";
            }
            else {
                sData += ", " + $("#roundchild").val() + " Children";
            }
        }

        if (parseInt($("#roundinfant").val()) > 0) {
            if (parseInt($("#roundinfant").val()) == 1) {
                sData += ", " + $("#roundinfant").val() + " Infant";
            }
            else {
                sData += ", " + $("#roundinfant").val() + " Infants";
            }
        }
        sData += "</span>" +
         "   </div>" +

         " </div>" +

         " <div class='wait-talk-main'>" +
         "  <div class='talk-txt'>" +
         "    " +
         " </div>" +
         "<div class='clearfix'></div> " +
         " <div class='talk-txt-1'>" +
         "  <img src='' alt='' />&nbsp;" +
         " </div>" +
         "  </div>" +
         "<div class='search_wtg_fotter'> </div> "

        "</div>";
        return sData;
    }
	</script> 
	
	<?php if(Route::currentRouteName() == 'flightList'){ ?>
	<script> 
		 var sessionTimeout = 20;
		window.onload = DisplaySessionTimeout;
		function DisplaySessionTimeout() {
			sessionTimeout = sessionTimeout - 1;
			if (sessionTimeout >= 0)
				window.setTimeout("DisplaySessionTimeout()", 60000);
			else {
				callSessionTimeOut();
			}
		}
		function callSessionTimeOut() {
			$(".sessionpop").show();
			return true;
		}
		function ShowWait() {
			location.reload();
		} 
		</script> 
		
	<?php } ?>	  
	<script> 
		$("#telephone").intlTelInput();
		$('.filter_btn_style a.filter_btn').on( "click", function() { 
			$(this).parent().addClass('filtershow');
			$('.custom_page_search .cus_col_3').addClass('show'); 
		});
		$('.custom_sidebar a.filter_close').on( "click", function() {
			$('.custom_page_search .cus_col_3').removeClass('show');
			$('.filter_btn_style').removeClass('filtershow');
		});
		$('.custom_sidebar .applyfilter_btn button.apply_btn').on( "click", function() {
			$('.custom_page_search .cus_col_3').removeClass('show');
			$('.filter_btn_style').removeClass('filtershow');
		});
		
		$('.inner_hotel .hotel_filter_btn .filter_btn_style a').on( "click", function() { 
			$('.hotel_sidebar').addClass('filtershow');
		});
		$('.hotel_filter a.filter_close').on( "click", function() {
			$('.hotel_sidebar').removeClass('filtershow');
		});
		$('.hotel_sidebar .hotel_filter .applyfilter_btn button.apply_btn').on( "click", function() {
			$('.hotel_sidebar').removeClass('filtershow');
		});
		
		$('.search_flight a').on( "click", function() {
			$('.search_mobile.custom_reservation_tab').toggleClass('show');
		});
		$('.close_flight a').on( "click", function() {
			$('.search_mobile.custom_reservation_tab').removeClass('show');
		}); 
		 $('.cus_sidebar').theiaStickySidebar({ 
			additionalMarginTop: 80
		}); 
		$('.pack_sidebar').theiaStickySidebar({ 
			additionalMarginTop: 120
		});		
		$('input[name="datefilter"]').daterangepicker({
			  autoUpdateInput: false, 
			  locale: {    
				  cancelLabel: 'Clear'
			  }  
		  });
		$('.view_all_offer a').on( "click", function() {
			$('.view_all_offer .offersAppliedList').toggleClass('show');
		});
		 $('.multiselect-ui').multiselect({
			includeSelectAllOption: true
		});
		$('.txt_hide a').on( "click", function() {
			$(this).parent().parent().toggleClass('show');
			$('.txt_hide p.hide').toggleClass('show');
		}); 
		/* $(function () {
		  $('[data-toggle="tooltip"]').tooltip();
		}); */
		
		$('.gallerypopup').on('click', function(){
			var src = $(this).attr('ng-src');
			$('.zoomsow').attr('src',src);
			$('#myModalZoom').modal('show');
			
		});
window.onload = function () {
    $('.flight_loader').hide();
}



 function CloseSection(e,n)
		{null!=document.getElementById(e)&&(document.getElementById(e).style.display="none"),null!=document.getElementById("crs"+n)&&(document.getElementById("crs"+n).style.display="block"),5==n&&(document.getElementById("addAnFlt").style.display="block")} 
</script>
	<input type="hidden" id="hfTripType" name="hfTripType" value="false">
        <input type="hidden" id="hfFromDestination" name="hfFromDestination" value="">
        <input type="hidden" id="hfToDestination" name="hfToDestination" value="">
        <input type="hidden" id="hfFromDate" name="hfFromDate" value="">
        <input type="hidden" id="hfToDate" name="hfToDate" value="">
        <input type="hidden" id="hfAdult" name="hfAdult" value="">
        <input type="hidden" id="hfChild" name="hfChild" value="">
        <input type="hidden" id="hfInfant" name="hfInfant" value="">
        <input type="hidden" id="hfflex" name="hfflex">
        <input type="hidden" id="hfdirect" name="hfdirect">
        <input type="hidden" id="hfcontact" name="hfcontact" value="8826496095">
        <input type="hidden" id="select_class" name="select_class" value="">
		
		<!-- Modal -->		
		<div id="myModalZoom" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button> 
						<div class="modal_img">
							<img src="" class="img-fluid zoomsow" alt="" width="100%" height="533" />
						</div>
					</div>     
				</div>
			</div>
		</div>
		
		<div id="hotelcontent" class="modal fade" role="dialog">
			<div class="modal-dialog"> 
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4></h4>
						<div class="starmargin ">
						</div>
						<div class="loclity ">
							<span class="textblack13bold ng-scope">Locality:</span>
						</div>
						<div class="hotel_description">This Hotels is very comfortable and 5 star hotels. These room services is awesome.</div>
					</div>     
				</div>
			</div>
		</div>		
		
		<div class="sessionpop" style="display: none;">
			<div class="searchpopinner searchpopinner1">
				<h2>Your search expired</h2>
				<p>To ensure accurate prices and availability of the flight, you must refresh the results.</p>
				<div class="searcpoprow">
					<asp:hyperlink id="hlRefresResult" onclick="ShowWait();"><img src="{{URL::to('public')}}/images/refresh-btn.png" alt="Refresh" style="cursor:pointer;" /></asp:hyperlink>
				</div>
				<a href='{{URL::to('/')}}'>or go to homepage.</a>
				<div class="clearfix"></div>
			</div> 
		</div>	
		

		
<div id="packagetravel" class="modal fade" role="dialog">	
	<div class="modal-dialog" style="width: 61%;">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>			
			<div class="traveller_info">
		<div class="depart_date">
			<span>Departure Date: <strong class="depdates"></strong></span>
<input type="hidden" name="dpdate" id="dpdate">
<input type="hidden" name="childtotal" id="childtotal" value="0">
<input type="hidden" name="adulttotal" id="adulttotal" value="0">
		</div> 
		<div class="">Room 1</div>
		<table class="table" border="0" id="room1">
			<thead>
				<tr>
					<th>Person</th>
					<th>Number</th>
					<th>Net Cost</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><span>Adult (+12 Yrs)</span><br><span>Child (Upto 12 Yrs)</span></td>
					<td>
						<div class="counter-add-item">
						<input type="hidden" class="roomno" value="1">
							<a field="packadult" fieldid="1" class="adultdec" href="javascript:;">-</a>
							<input  name="packadult" type="text" value="2">
							<a field="packadult" fieldid="1" class="adultinc" href="javascript:;">+</a>
						</div> 
						<div class="counter-add-item">
							<a field="packchild" fieldid="1" class="childdec" href="javascript:;">-</a>
							<input name="packchild" type="text" value="0">
							<a field="packchild" fieldid="1" class="childinc" href="javascript:;">+</a>
						</div>
					</td>
					<td class="netprice"><i class="fa fa-rupee-sign"></i> 0</td>
				</tr>
				<tr class="linner_child" style="display:none;">
					<td>
						<label>Child 1</label>
						<select >
							<option>Infant (0-2 years)</option>
							<option>Child with bed</option>
							<option>Child without bed</option>
						</select>	
					</td>
					<td>1</td>
					<td><i class="fa fa-rupee-sign"></i> 0</td>
				</tr>
			</tbody>
		</table>
		<div class="showroom"></div>
		<div class="col-sm-6"><i class="fa fa-plus"></i>  <a href="javascript:;" class="addroom">Add Room</a></div>
		<div class="col-sm-6 rmrooms" style="display:none;"><i class="fa fa-times"></i> <a href="javascript:;" class="remroom">Remove Room</a></div>	
		<table class="totlpricetable">
				<tr>
					<td colspan="1">Total: </td>
					<td colspan="1"></td>
					<td colspan="1" class="ttprice"><i class="fa fa-rupee-sign"></i> 0</td>
				</tr>
		</table>
		<table class="totlpricetable">
				<tr>
					<td colspan="1"></td>
					<td colspan="1"></td>
					<td colspan="1"><a href="javascript:;" onClick="getalluserinfo()" class="btn_2">Book Online</a></td>
				</tr>
		</table>	
	</div> 
			</div>
		</div>
	</div>
</div>
	</body>
</html>