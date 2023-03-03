@extends('layouts.frontend')
@section('title', @$seoDetails->meta_title)
@section('meta_title', '')
@section('meta_keyword', '')
@section('meta_description', '')
@section('bodyclass', 'homepage')
@section('content')
<style>
		.help-block {
			color: #f33;
		}
	</style>
	<style>
		.country_field .niceCountryInputMenu {
			border: 1px solid #ced4da;
			width: 100%;
			border-radius: 4px;
			padding: 2px 5px;
		}

		.location_search .is_search_from_val li,
		.location_search_to .is_search_to_val li {
			cursor: pointer;
		}

		.location_search .is_search_from_val li:hover,
		.location_search_to .is_search_to_val li:hover {
			background: #f2f2f2;
			cursor: pointer;
			border-left: 4px solid #89ad3e;
		}

		.location_search .is_search_from_val li,
		.location_search_to .is_search_to_val li {
			border-left: 4px solid #fff;
		}

		.se-pre-con {
			display: none;
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url(http://24hr.lightmytrip.com/public/img/Rolling-1s-48px.gif) center no-repeat #fff;
		}

		#myUL li {
			display: none;
		}

		#myULair li {
			display: none;
		}

		#mucoverinc li.insu {
			display: none;
		}

		#mucoverinc {
			display: grid;
			grid-template-columns: repeat(4, 1fr);
		}

		< !--@import url("https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/blitzer/jquery-ui.min.css");

		-->.ui-datepicker td span,
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
			color: #fff;
		}

		.ui-datepicker td.ui-state-disabled[title]::after {
			content: '';
			display: none;
			position: unset;
		}
	</style>>

<!-- Global site tag (gtag.js) - Google Analytics 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172343415-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-172343415-1');
</script> -->

<script src='https://www.google.com/recaptcha/api.js'></script>
</head>



<style>
    body,
    #full-container {
        background-color: #eaf0f3;
    }

    .img-res {
        max-width: 100%;
        max-height: 100%;
    }

    .rvbg {
        background-image: linear-gradient(0deg, #15457b, #051423);
        padding: 10px 0px;
    }

    .listoption>ul {
        display: flex;
        justify-content: center;
        column-gap: 20px;
    }

    .listoption>ul>li {
        width: 33.3%;
        text-align: center;
        border: 1px transparent;
        padding: 5px 5px;
    }

    .listoption>ul .step_act {
        border: 1px dashed #fff;

        border-radius: 5px;
    }

    .listoption>ul>li>span,
    .listoption>ul>li>h6 {
        display: block;
        text-align: center;
    }

    .listoption>ul>li>h6 {
        color: #fff;
        font-size: 15px;
        margin-bottom: 0;
    }

    .detailsmain {
        display: flex;
        margin-bottom: 50px;
    }

    .leftmain_rv {
        width: 75%;
        padding-right: 20px;
    }

    .rightmain_rv {
        width: 25%;
    }

    .dts_heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .dts_heading>h1 {
        font-size: 22px;
        font-weight: 600;

    }

    .mtprew1 {
        margin: 30px 0;
    }




    .whitebrd {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 2px 4px 0 rgb(0 0 0 / 5%);
    }

    .pdbox_wht {
        padding: 20px;
    }

    .bookingtimer>h6 {
        font-size: 18px;
        color: #504f4f;
        margin-bottom: 10px;
        display: block;
    }

    .bookingtimer #clockdiv {
        font-size: 40px;
        position: relative;
        color: #565656;
        line-height: normal;
    }

    .bookingtimer #clockdiv b {
        font-size: 16px;
    }

    .bookingtimer #clockdiv span {
        margin: 0 8px;
    }

    .farebox {
        margin-top: 30px;
    }

    .farebox>h3 {
        background: #020180;
        font-size: 20px;
        font-weight: bold;
        padding: 10px 10px;
        color: #fff;
        margin-bottom: 0;
    }

    .fareclps {
        padding: 15px;
    }

    .fareclps>button[aria-expanded="true"] i {
        transform: rotate(180deg);
    }

    .fareclps>button i {
        margin-left: 5px;
    }

    .fareclps button {
        border: none;
        width: 100%;
        text-align: left;
        padding: 4px 10px;
        color: #4a4949;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .basefareul>li {
        display: flex;
        justify-content: space-between;

        font-size: 13px;
        color: #424242;
    }

    .brdbase>li {
        border-bottom: 1px dashed #ddd;
        margin-top: 6px;
    }

    .paybx {
        background: #efefef;

        padding: 7px 15px;
        color: #fff;
        margin-bottom: 0;
    }

    .paybx .basefareul>li>span {
        font-size: 15px;
    }

    .bookbtn_fare {
        text-align: center;
        padding: 15px 10px;
    }

    .bookbtn_fare .cntsd_book {
        background-color: #5091fb;
        transition: all .5s ease-in-out;
    }

    .bookbtn_fare .cntsd_book:hover {
        background-color: #2461c2;
    }

    .bookbtn_fare .cntsd_book i {
        margin-left: 10px;
    }









    .mtprew2 {
        margin: 30px 0 0 0;
    }

    .nty_txt>span {
        padding: 8px 16px;
        background-color: #D8E5FF;
        border-radius: 4px;
        font-size: 14px;
        color: #000;
        display: block;
        margin-top: 10px;
    }

    .fortr {
        margin-top: 20px;
    }

    .fortr>h2 {

        font-size: 18px;
        font-weight: bold;
        color: #000;
        border-bottom: 1px dashed #ddd;
        padding-bottom: 12px;

    }

    .form_tvl {
        display: flex;
        column-gap: 20px;
    }

    .tvlbox>label {
        font-size: 15px;
        color: #000;
        font-weight: bold;
        margin-bottom: 0;
    }

    .tvlbox>label>span {
        color: red;
        margin-left: 5px;
    }

    .col4 .tvlbox {
        width: 25%;

    }

    .col2 .tvlbox {
        width: 50%;

    }

    .col4 .deps {
        width: 17%;

    }

    .datesm1 {
        width: 25%;

    }

    .datesm2 {
        width: 75%;

    }

    .input_sc {
        border: none;
        border-bottom: 2px solid #ddd;
        border-radius: initial;
        color: #000;
        padding: 8px 0px;
        height: auto;
        font-size: 14px;
        width: 100%;
        line-height: normal;
    }

    .inhegt {
        height: 37px;
    }




    .radio_gd,
    .radio_gd>li {
        display: flex;
    }

    .radio_gd {
        column-gap: 10px;
    }

    .radio_gd>li {
        align-items: center;
        border: 1px solid #ddd;
        padding: 4px 10px;
        border-radius: 3px;
    }

    .radio_gd>li>input {
        width: 15px;
        height: 15px;
        margin-top: 0;
        margin-right: 3px;
    }

    .radio_gd>li>label {
        font-size: 15px;
        margin-bottom: 0;
    }

    .input_sc:focus {
        box-shadow: none;
        border-color: #ddd;
        background: #fff;
        color: #000;
    }

    .pritotal_main {
        transition: all .5s ease-in-out;
    }

    .fixed-header-right {
        position: fixed;
        top: 50px;
    }

    .mbbx_frm {
        margin-bottom: 30px;
    }

    .fortr>span {
        margin-bottom: 15px;
        display: block;
    }


    @media screen and (max-width: 1024px) {
        .listoption>ul>li>h6 {
            font-size: 12px;
        }

        .detailsmain,
        .flexws,
        .btmlist_to {
            display: block;
        }

        .leftmain_rv {
            width: 100%;
            padding-right: 0;
        }

        .dts_heading>h1,
        .to_list>span,
        .fortr>h2 {
            font-size: 15px;
        }

        .dts_heading>span {
            font-size: 13px;
        }

        .leftlogo_rv,
        .righttxt_rv {
            width: 100%;
        }

        .tbrtvr>h4 {
            font-size: 16px;
        }

        .btmlist_to>span {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        .rightmain_rv {
            width: 100%;
        }

        .mtprew1 {
            margin: 20px 0;
        }

        .ckeck_trm input {
            width: 100px;
        }

        .form_tvl {
            display: block;
            column-gap: 0;
        }

        .col4 .deps,
        .col4 .tvlbox,
        .datesm1,
        .datesm2 {
            width: 100%;
        }

        .fixed-header-right {
            position: relative;
            top: 0;
        }

        .tvlbox {
            margin-bottom: 10px;
        }
    }

</style>
<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() >= 300) {
                $('.pritotal_main').addClass('fixed-header-right');

            } else {
                $('.pritotal_main').removeClass('fixed-header-right');

            }
        });

    });

</script>
<section class="rvbg">
    <div class="container">
        <div class="listoption">
            <ul>
                <li>
                    <span><img src="http://24hr.lightmytrip.com/public/images/Review-Booking.png" class="img-res"></span>
                    <h6>Review Booking</h6>

                </li>

                <li class="step_act">
                    <span><img src="http://24hr.lightmytrip.com/public/images/Travellers.png" class="img-res"></span>
                    <h6>Travellers</h6>

                </li>



                <li>
                    <span><img src="http://24hr.lightmytrip.com/public/images/p-Billing.png" class="img-res"></span>
                    <h6>Payment & Billing</h6>

                </li>


            </ul>
        </div>

    </div>
</section>

<div class="container">
			<div class="detailsmain">
				<div class="leftmain_rv">
					<div class="dts_heading">
						<h1 class="mtprew2">Billing Information</h1>
					</div>


                <form id="paynow">
					<div class="fortr whitebrd pdbox_wht">
						<div class="tvlbox mbbx_frm">
							{{-- <label>Billing Address<span>*</span></label> --}}
							{{-- <input type="text" placeholder="Enter Billing Address" class="input_sc inhegt"> --}}

						</div>
						<div class="form_tvl coln2 mbbx_frm">
							{{-- <div class="tvlbox">
								<label>Country<span>*</span></label>
								<select class="input_sc inhegt">
									<option>Select Country</option>
									<option>Afghanistan </option>
									<option>Albania </option>
									<option>Algeria</option>
									<option>American Samoa</option>
									<option>Andorra</option>
								</select>
							</div> --}}
                            <div class="tvlbox mbbx_frm">
								<label>Name<span>*</span></label>
								<input type="text" id="name" placeholder="Enter Name" class="input_sc inhegt">

							</div>

							<div class="tvlbox mbbx_frm">
								<label>Email<span>*</span></label>
								<input type="email" id="email" placeholder="Enter Email" class="input_sc inhegt">

							</div>

							<div class="tvlbox mbbx_frm">
								<label>Phone<span>*</span></label>
								<input type="number"id="phone" placeholder="Enter Phone" class="input_sc inhegt">

							</div>

							<div class="tvlbox mbbx_frm">
								<label>Amount<span>*</span></label>
								<input type="text" id="amount" placeholder="Enter Amount" value="{{$total['total_amount']}}" class="input_sc inhegt">
                                <input type="hidden" name="currency" id="currency" value="{{$total['currency']}}" />
							</div>

						</div>
					</div>

                    <button type="submit">Pay Now </button>
            </form>




				</div>
                @include('Frontend.flights.booking-details');
				{{-- <div class="rightmain_rv ">
					<div class="pritotal_main  mtprew1">
						<div class="bookingtimer whitebrd pdbox_wht">
							<h6>Book now before tickets run out!</h6>
							<div id="clockdiv">0<b>m</b><span>:</span>0<b>s</b></div>
							<script>
								$(document).ready(function () {
									// 10 minutes from now
									var time_in_minutes = 10;
									var current_time = Date.parse(new Date());
									var deadline = new Date(current_time + time_in_minutes * 60 * 1000);


									function time_remaining(endtime) {
										var t = Date.parse(endtime) - Date.parse(new Date());
										var seconds = Math.floor((t / 1000) % 60);
										var minutes = Math.floor((t / 1000 / 60) % 60);
										var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
										var days = Math.floor(t / (1000 * 60 * 60 * 24));
										return { 'total': t, 'days': days, 'hours': hours, 'minutes': minutes, 'seconds': seconds };
									}
									function run_clock(id, endtime) {
										var clock = document.getElementById(id);
										function update_clock() {
											var t = time_remaining(endtime);
											clock.innerHTML = '' + t.minutes + '<b>m</b>' + '<span>:</span>' + t.seconds + '<b>s</b>';
											if (t.total <= 0) { clearInterval(timeinterval); }
										}
										update_clock(); // run function once at first to avoid delay
										var timeinterval = setInterval(update_clock, 1000);
									}
									run_clock('clockdiv', deadline);

								});
							</script>
						</div>

						<div class="farebox whitebrd ">
							<h3>Price Details</h3>
							<div class="fareclps">
								<button data-toggle="collapse" data-target="#BaseFare" class="collapsed" aria-expanded="false"><span>Base Fare <b>(3
											travellers)</b><i class="fas fa-angle-down"></i></span><span><b>GBP
											310<sup>.36</sup></b></span></button>
								<div id="BaseFare" class="collapse" aria-expanded="false" style="height: 0px;">
									<ul class="basefareul brdbase">
										<li><span>1 Adult</span><span>GBP 162<sup>.04</sup></span></li>
										<li><span>1 Child</span><span>GBP 123<sup>.84</sup></span></li>
										<li><span>1 Infant</span><span>GBP 24<sup>.48</sup></span></li>
									</ul>
								</div>
							</div>

							<div class="paybx">
								<ul class="basefareul">
									<li><span><b>Pay</b></span><span><b>GBP 309<sup>.00</sup></b></span></li>
								</ul>
							</div>

							<div class="bookbtn_fare">
								<button type="submit" class="cntsd_book">Continue to Pay<i class="fas fa-long-arrow-alt-right"></i></button>
							</div>
						</div>

						{{-- flight-type: {{ $accessresponse['data']['type']}}
							flight-id: {{ $accessresponse['data']['id']}}
							confirm:{{$accessresponse['data']['ticketingAgreement']['option']}} --}}

					{{-- </div>
				</div> --}} 
			</div>
		</div>

@endsection
