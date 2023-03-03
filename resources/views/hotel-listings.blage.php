@extends('layouts.frontend')
@section('title', @$seoDetails->meta_title)
@section('meta_title', @$seoDetails->meta_title)
@section('meta_keyword', @$seoDetails->meta_keyword)
@section('meta_description', @$seoDetails->meta_desc)
@section('bodyclass', 'homepage')
@section('pagespecificstyles')
	<!-- Facebook Pixel Code -->

<!-- End Facebook Pixel Code -->
@endsection
@section('content')
<?php use App\Http\Controllers\PackageController; ?>
<!-- Banner
============================================= -->
<style>
.promocode_desc { border: 1px dashed #A7A7A7; border-radius: 4px; display: inline-flex; position: relative; margin-top: 15px;}
.promcde {background: #2196f3;border-radius: 20px; text-align: center;padding: 1px 5px;font-size: 10px;font-weight: 600; text-transform: uppercase; color: #fff;position: absolute;top: -11px;left: 7px;}
.coupncde {font-size: 13px;color: #000; font-weight: 600; text-transform: uppercase;  padding: 6px 8px;  display: flex; border-right: 1px dashed #A7A7A7;}
.custom_reservation_tab form.form-banner-reservation .onewayadult,.custom_reservation_tab form.form-banner-reservation .onewaychild,.custom_reservation_tab form.form-banner-reservation .onewayinfants{    padding: 0 10px;}
</style>

<script>
$(document).ready(function(){
	$(function () {
        $('input[name="brTimeStart"]').daterangepicker({
            opens: 'left',
            singleDatePicker: true,
            autoApply: true,
        }, function (start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
	

	$("#datepicker1,#datepicker2").datepicker({
        numberOfMonths: 2,
        dateFormat: 'dd/mm/yy',
    });

	$(".roundtriptab ").click(function(){
$("#oneroundtp").hide();
$("#roundtp").show();
});

$(".onewy ").click(function(){
$("#oneroundtp").show();
$("#roundtp").hide();
});

$("#oneroundtp ").click(function(){
$("#oneroundtp").hide();
$("#roundtp").show();
$(".onewy").removeClass("active");
$(".roundtriptab").addClass("active");
$(".roundseatclass").prop('checked', false);
});

	$(function() {
        $('input[name="onetrip"]').daterangepicker({
            opens: 'left',
            autoApply: true,			
			numberOfMonths: 2,
        
        });
    });

	$(function() {
        $('input[name="rounddate"]').daterangepicker({
            opens: 'left',
            autoApply: true,
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
    $('.dropdown-menu').click(function(event) {
        event.stopPropagation();
    });
});
	</script>


<div class="mob_flight_link"> 
	<div class="container">
		<div class="row">
			<div class="col-sm-12 padd0">
				<div class="flight_link">
					<ul>
						<li><a href="#"><img src="{!! asset('public/images/icons/flight-tab.png') !!}" alt=""/> Flight</a></li>
						<!--<li><a href="#"><img src="{!! asset('public/images/icons/hotel-tab.png') !!}" alt=""/> Hotels</a></li>
						<li><a href="#"><img src="{!! asset('public/images/icons/holiday-tab.png') !!}" alt=""/> Holiday</a></li>
						<li><a href="#"><img src="{!! asset('public/images/icons/bus-tab.png') !!}" alt=""/> Bus</a></li>
						<li><a href="#"><img src="{!! asset('public/images/icons/visa-tab.png') !!}" alt=""/> Visa</a></li>-->
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section id="banner">
	<div class="banner-parallax" data-banner-height="0">
		<!-- <img src="http://24hr.lightmytrip.com/public/images/home-banner-bg.jpg" alt=""> -->
		<div class="overlay-colored color-bg-white opacity-0"></div><!-- .overlay-colored end -->
		<div class="slide-content">

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <!-- <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol> -->

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="http://24hr.lightmytrip.com/public/images/joburg-banner.png" class=deskslider_img alt="">
	  <img src="http://24hr.lightmytrip.com/public/images/joburg-banner-small.png" class="mobileslider_img" alt="">
    </div>

    <div class="item">
	<img src="http://24hr.lightmytrip.com/public/images/joburg-banner.png" class=deskslider_img alt="">
	  <img src="http://24hr.lightmytrip.com/public/images/joburg-banner-small.png" class="mobileslider_img" alt="">
    </div>

    <div class="item">
	<img src="http://24hr.lightmytrip.com/public/images/joburg-banner.png" class=deskslider_img alt="">
	  <img src="http://24hr.lightmytrip.com/public/images/joburg-banner-small.png" class="mobileslider_img" alt="">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>







			<div class="container">
			<div class="banner-center-box">
							<ul class="plani-icon">
								<li><a href="{{'/'}}" class="actv"><i class="fa fa-plane"></i> FLIGHTS</a></li>
								<li><a href="{{'/hotels'}}"><i class="fa fa-bed"></i> HOTELS</a></li>
								<li><a href="{{'/holiday'}}"><i class="fa fa-umbrella-beach"></i> HOLIDAY</a></li>
								
							</ul>
							<div class="banner-reservation-tabs custom_reservation_tab">
								<ul class="br-tabs">
									<li class="active onewy" dataway="oneway">
										<a href="javascript:;">	
											<label class="radio-container radio-default">
												<input class="roundseatclass" value="2" type="radio" name="radio" checked="checked" >
												<span class="checkmark"></span>
												One way
											</label>							
									 </a>
									</li>
									<li class="roundtriptab" dataway="roundtrip"><a href="javascript:;">
										<label class="radio-container radio-default">
											<input class="roundseatclass" value="2" type="radio" name="radio">
											<span class="checkmark"></span>
											Round Trip
										</label>	
										</a></li> 
									<li dataway="multicity"><a href="javascript:;">
										<label class="radio-container radio-default">
											<input class="roundseatclass" value="2" type="radio" name="radio">
											<span class="checkmark"></span>
											Multi City
										</label>	
										</a></li>
									
								</ul><!-- .br-tabs end -->
								
                               <!-- <ul class="award">
								   <li><i class="fa fa-stop"></i></li>
								   <li>Award ticket</li>
								   
								   <li>-</li>
								   
								   <li>Buy a ticket with Miles</li>
							   </ul> -->

								<ul class="br-tabs-content" style="height: 100%;">
									<li class="roundandoneway commonway active" style="display: list-item;">
									<div class="ismultipleway">
										<form action="http://24hr.lightmytrip.com/FlightList/index" class="form-banner-reservation form-inline style-2 form-h-50">
											<div class="form-group loc_search_field cus_loc_field">
												<i class="fas fa-plane"></i>
												<span>From</span>
												<input type="hidden" id="roundfromsearch">
												<input type="hidden" id="journey_type" value="1">
												<input style="cursor: text;" autocomplete="off" type="text" name="roundwayfrmtext" id="fromdest_show" class="roundwayfrom form-control wrapper-dropdown-2 add" placeholder="Istanbul">
												<p>Intanbul (All)</p>
												
												<div class="location_search selhide" id="location_search">
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Top Cities</span>
														</div>
														<ul class="is_search_from_val">
																<li roundwayfromtop="DEL-Delhi-India" roundwayfrom="Delhi(DEL)">
																<div class="fli_name"><i class="fa fa-plane"></i> Delhi (DEL)</div>
																<div class="airport_name">Indira Gandhi Airport<span>India</span></div>
															</li>
																													<li roundwayfromtop="BLR-Bangalore-India" roundwayfrom="Bangalore(BLR)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangalore (BLR)</div>
																<div class="airport_name">Bengaluru Intl<span>India</span></div>
															</li>
																													<li roundwayfromtop="BOM-Mumbai-India" roundwayfrom="Mumbai(BOM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Mumbai (BOM)</div>
																<div class="airport_name">Mumbai<span>India</span></div>
															</li>
																													<li roundwayfromtop="CCU-Kolkata-India" roundwayfrom="Kolkata(CCU)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kolkata (CCU)</div>
																<div class="airport_name">Calcutta<span>India</span></div>
															</li>
																													<li roundwayfromtop="GOI-Goa-India" roundwayfrom="Goa(GOI)">
																<div class="fli_name"><i class="fa fa-plane"></i> Goa (GOI)</div>
																<div class="airport_name">Dabolim<span>India</span></div>
															</li>
																													<li roundwayfromtop="HYD-Hyderabad-India" roundwayfrom="Hyderabad(HYD)">
																<div class="fli_name"><i class="fa fa-plane"></i> Hyderabad (HYD)</div>
																<div class="airport_name">Shamsabad International Airport<span>India</span></div>
															</li>
																													<li roundwayfromtop="MAA-Chennai-India" roundwayfrom="Chennai(MAA)">
																<div class="fli_name"><i class="fa fa-plane"></i> Chennai (MAA)</div>
																<div class="airport_name">Chennai<span>India</span></div>
															</li>
																													<li roundwayfromtop="SIN-Singapore-Singapore" roundwayfrom="Singapore(SIN)">
																<div class="fli_name"><i class="fa fa-plane"></i> Singapore (SIN)</div>
																<div class="airport_name">Changi<span>Singapore</span></div>
															</li>
																													<li roundwayfromtop="DXB-Dubai-United Arab Emirates" roundwayfrom="Dubai(DXB)">
																<div class="fli_name"><i class="fa fa-plane"></i> Dubai (DXB)</div>
																<div class="airport_name">Dubai<span>United Arab Emirates</span></div>
															</li>
																													<li roundwayfromtop="BKK-Bangkok-Thailand" roundwayfrom="Bangkok(BKK)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangkok (BKK)</div>
																<div class="airport_name">Bangkok Int&#039;l<span>Thailand</span></div>
															</li>
																													<li roundwayfromtop="KTM-Kathmandu-Nepal" roundwayfrom="Kathmandu(KTM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kathmandu (KTM)</div>
																<div class="airport_name">Tribhuvan<span>Nepal</span></div>
															</li>
																												</ul>
													</div>
												</div> 
												<div id="swap" onclick="SwapRoundDestination();" class="swipe"></div>
											</div><!-- .form-group end -->
											<div class="form-group loc_search_field_to cus_loc_field">
												<i class="fas fa-plane"></i>
											<input type="hidden" id="roundtosearch">
											<span>To</span>
												<input style="cursor: text;" autocomplete="off" type="text" name="roundwaytotext" id="todest_show" class="roundwayto form-control wrapper-dropdown-3 add" placeholder="To">
												
												<p>Intanbul (All)</p>
												<div class="location_search_to selhide" id="location_search_to"> 
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Top Cities</span>
														</div>
														<ul class="is_search_to_val">
																													<li roundwaytotop="DEL-Delhi-India" roundwayto="Delhi(DEL)">
																<div class="fli_name"><i class="fa fa-plane"></i> Delhi (DEL)</div>
																<div class="airport_name">Indira Gandhi Airport<span>India</span></div>
															</li>
																													<li roundwaytotop="BLR-Bangalore-India" roundwayto="Bangalore(BLR)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangalore (BLR)</div>
																<div class="airport_name">Bengaluru Intl<span>India</span></div>
															</li>
																													<li roundwaytotop="BOM-Mumbai-India" roundwayto="Mumbai(BOM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Mumbai (BOM)</div>
																<div class="airport_name">Mumbai<span>India</span></div>
															</li>
																													<li roundwaytotop="CCU-Kolkata-India" roundwayto="Kolkata(CCU)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kolkata (CCU)</div>
																<div class="airport_name">Calcutta<span>India</span></div>
															</li>
																													<li roundwaytotop="GOI-Goa-India" roundwayto="Goa(GOI)">
																<div class="fli_name"><i class="fa fa-plane"></i> Goa (GOI)</div>
																<div class="airport_name">Dabolim<span>India</span></div>
															</li>
																													<li roundwaytotop="HYD-Hyderabad-India" roundwayto="Hyderabad(HYD)">
																<div class="fli_name"><i class="fa fa-plane"></i> Hyderabad (HYD)</div>
																<div class="airport_name">Shamsabad International Airport<span>India</span></div>
															</li>
																													<li roundwaytotop="MAA-Chennai-India" roundwayto="Chennai(MAA)">
																<div class="fli_name"><i class="fa fa-plane"></i> Chennai (MAA)</div>
																<div class="airport_name">Chennai<span>India</span></div>
															</li>
																													<li roundwaytotop="SIN-Singapore-Singapore" roundwayto="Singapore(SIN)">
																<div class="fli_name"><i class="fa fa-plane"></i> Singapore (SIN)</div>
																<div class="airport_name">Changi<span>Singapore</span></div>
															</li>
																													<li roundwaytotop="DXB-Dubai-United Arab Emirates" roundwayto="Dubai(DXB)">
																<div class="fli_name"><i class="fa fa-plane"></i> Dubai (DXB)</div>
																<div class="airport_name">Dubai<span>United Arab Emirates</span></div>
															</li>
																													<li roundwaytotop="BKK-Bangkok-Thailand" roundwayto="Bangkok(BKK)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangkok (BKK)</div>
																<div class="airport_name">Bangkok Int&#039;l<span>Thailand</span></div>
															</li>
																													<li roundwaytotop="KTM-Kathmandu-Nepal" roundwayto="Kathmandu(KTM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kathmandu (KTM)</div>
																<div class="airport_name">Tribhuvan<span>Nepal</span></div>
															</li>
																												</ul> 
													</div>
												</div>
											</div><!-- .form-group end -->
											<div class="form-group cus_calendar_field CLI " id="onetp">
											<span class="pl10">DEPARTURE</span>
												<input autocomplete="off" id="datepicker1" type="text" value="" class="form-control htl"  placeholder="2019/09/30">
												
												<i class="far fa-calendar add"></i>
											</div><!-- .form-group end -->

											<div class="form-group hideifmulticity cus_calendar_field CLI "  id="oneroundtp">
											<span class="pl10">RETURN</span>
												<p class="rtps">Tap to add a return date for bigger discounts</p>
												<i class="far fa-calendar add"></i>
											</div>


											<div class="form-group hideifmulticity cus_calendar_field CLI "  id="roundtp" style="display: none;">
											<span class="pl10">RETURN</span>
												<input autocomplete="off" readonly type="text" id="datepicker2" value="" class="form-control htl" placeholder="2019/09/30">
												
												<i class="far fa-calendar add"></i>
											</div>
											
											
											<!-- .form-group end -->
											<div class="form-group roundtrip cus_passenger_field CLI">
												<span>Cabin</span> 
												<input autocomplete="off" type="text" id="roundpessanger" name="brPassengerNumber" class="form-control htlnew show-dropdown-passengers roundpessanger"
													placeholder="Eco" value="1 Eco">
												<i class="fas fa-user add"></i>
												<p>Class</p>
												
												<ul class="list-dropdown-passengers">
												<li><h5 class="cb_sc">Cabin and passenger selection</h5></li>
													<li>
													<ul class="radio_gdn">
									<li>
										<input type="radio" id="Economy" name="cls" value="Male">
										&nbsp; <label for="Economy">Economy</label>
									</li>
									<li> <input type="radio" id="Premiumeconomy" name="cls" value="Premium economy">
										&nbsp; <label for="Premiumeconomy">Premium economy</label></li>

									<li> <input type="radio" id="Business" name="cls" value="Business">
										&nbsp; <label for="Business">Business&nbsp;</label></li>
										
										<li> <input type="radio" id="Firstclass" name="cls" value="First class">
										&nbsp; <label for="Firstclass">First class</label></li>
								</ul>


													</li>
													<li>
														<ul class="list-persons-count">
															<li>
																<span>Adults:</span>
																<div class="counter-add-item">
																	<a class="decrease-btn" href="javascript:;">-</a>
																	<input id="roundadult" class="onewayadult" type="text" value="1">
																	<a class="increase-btn" href="javascript:;">+</a>
																</div><!-- .counter-add-item end -->
															</li>
															<li>
																<span>Childs:</span>
																<div class="counter-add-item">
																	<a class="decrease-btn" href="javascript:;">-</a>
																	<input id="roundchild" class="onewaychild" type="text" value="0">
																	<a class="increase-btn" href="javascript:;">+</a>
																</div><!-- .counter-add-item end -->
															</li>
															<li>
																<span>Infants:</span>
																<div class="counter-add-item">
																	<a class="decrease-btn" href="javascript:;">-</a>
																	<input id="roundinfant" class="onewayinfants" type="text" value="0">
																	<a class="increase-btn" href="javascript:;">+</a>
																</div><!-- .counter-add-item end -->
															</li>
														</ul><!-- .list-persons-count end -->
													</li>
													<li>
														<a class="btn-reservation-passengers btn x-small colorful hover-dark"
															href="javascript:;">Done</a>
													</li>
												</ul><!-- .list-dropdown-passengers end -->
											</div><!-- .form-group end -->
											<div class="form-group cus_searchbtn_field">
												<button type="button" class="form-control roundformsearch icon"><i class="fas fa-search"></i>&nbsp;Search</button>
											</div><!-- .form-group end -->
											<a style="display:none;" class="if_multicity_trip btn-multiple-destinations btn x-small colorful hover-dark" href="javascript:;">
												<i class="fas fa-plus"></i>
												Add City
											</a>
											<div class="clearfix"></div>
										</form><!-- .form-banner-reservation end -->
										</div>
									</li>
									
									
									<li class="multiwaytrip commonway" style="display: none;">
									<form action="http://24hr.lightmytrip.com/FlightList/index" class="form-banner-reservation form-inline style-2 form-h-50">
									<div class="ismultipleway" id="section-s1">
										<div class="form-group loc_search_field cus_loc_field">
										<i class="fas fa-plane"></i>
										<span>From</span>
												<input type="hidden" id="multi_roundfromsearch1">
												<input type="hidden" id="journey_type" value="3">
												<input did="s1" ssid="1" style="cursor: text;" autocomplete="off" type="text" name="multiwayfromtext1" id="fromdest_show1" class="multi_roundwayfrom form-control wrapper-dropdown-7 add" placeholder="From">
												<p>Intanbul (All)</p>
												<div class="location_search selhide" id="location_search">
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Top Cities</span>
														</div>
														<ul class="multi_is_search_from_val">
																													<li roundwayfromtop="DEL-Delhi-India" roundwayfrom="Delhi(DEL)">
																<div class="fli_name"><i class="fa fa-plane"></i> Delhi (DEL)</div>
																<div class="airport_name">Indira Gandhi Airport<span>India</span></div>
															</li>
																													<li roundwayfromtop="BLR-Bangalore-India" roundwayfrom="Bangalore(BLR)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangalore (BLR)</div>
																<div class="airport_name">Bengaluru Intl<span>India</span></div>
															</li>
																													<li roundwayfromtop="BOM-Mumbai-India" roundwayfrom="Mumbai(BOM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Mumbai (BOM)</div>
																<div class="airport_name">Mumbai<span>India</span></div>
															</li>
																													<li roundwayfromtop="CCU-Kolkata-India" roundwayfrom="Kolkata(CCU)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kolkata (CCU)</div>
																<div class="airport_name">Calcutta<span>India</span></div>
															</li>
																													<li roundwayfromtop="GOI-Goa-India" roundwayfrom="Goa(GOI)">
																<div class="fli_name"><i class="fa fa-plane"></i> Goa (GOI)</div>
																<div class="airport_name">Dabolim<span>India</span></div>
															</li>
																													<li roundwayfromtop="HYD-Hyderabad-India" roundwayfrom="Hyderabad(HYD)">
																<div class="fli_name"><i class="fa fa-plane"></i> Hyderabad (HYD)</div>
																<div class="airport_name">Shamsabad International Airport<span>India</span></div>
															</li>
																													<li roundwayfromtop="MAA-Chennai-India" roundwayfrom="Chennai(MAA)">
																<div class="fli_name"><i class="fa fa-plane"></i> Chennai (MAA)</div>
																<div class="airport_name">Chennai<span>India</span></div>
															</li>
																													<li roundwayfromtop="SIN-Singapore-Singapore" roundwayfrom="Singapore(SIN)">
																<div class="fli_name"><i class="fa fa-plane"></i> Singapore (SIN)</div>
																<div class="airport_name">Changi<span>Singapore</span></div>
															</li>
																													<li roundwayfromtop="DXB-Dubai-United Arab Emirates" roundwayfrom="Dubai(DXB)">
																<div class="fli_name"><i class="fa fa-plane"></i> Dubai (DXB)</div>
																<div class="airport_name">Dubai<span>United Arab Emirates</span></div>
															</li>
																													<li roundwayfromtop="BKK-Bangkok-Thailand" roundwayfrom="Bangkok(BKK)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangkok (BKK)</div>
																<div class="airport_name">Bangkok Int&#039;l<span>Thailand</span></div>
															</li>
																													<li roundwayfromtop="KTM-Kathmandu-Nepal" roundwayfrom="Kathmandu(KTM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kathmandu (KTM)</div>
																<div class="airport_name">Tribhuvan<span>Nepal</span></div>
															</li>
																												</ul>
													</div>
												</div> 
										
											</div><!-- .form-group end -->
											<div class="form-group loc_search_field_to cus_loc_field">
											<input type="hidden" id="multi_roundtosearch1">
											<i class="fas fa-plane"></i>
											<span>To</span>
												<input did="s1" ssid="1" style="cursor: text;" autocomplete="off" type="text" name="multiwaytotext1" id="todest_show1" class="multi_roundwayto form-control wrapper-dropdown-8 add" placeholder="To">
												<p>Intanbul (All)</p>
												<div class="location_search_to selhide" id="location_search_to"> 
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Top Cities</span>
														</div>
														<ul class="multi_is_search_to_val">
																													<li roundwaytotop="DEL-Delhi-India" roundwayto="Delhi(DEL)">
																<div class="fli_name"><i class="fa fa-plane"></i> Delhi (DEL)</div>
																<div class="airport_name">Indira Gandhi Airport<span>India</span></div>
															</li>
																													<li roundwaytotop="BLR-Bangalore-India" roundwayto="Bangalore(BLR)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangalore (BLR)</div>
																<div class="airport_name">Bengaluru Intl<span>India</span></div>
															</li>
																													<li roundwaytotop="BOM-Mumbai-India" roundwayto="Mumbai(BOM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Mumbai (BOM)</div>
																<div class="airport_name">Mumbai<span>India</span></div>
															</li>
																													<li roundwaytotop="CCU-Kolkata-India" roundwayto="Kolkata(CCU)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kolkata (CCU)</div>
																<div class="airport_name">Calcutta<span>India</span></div>
															</li>
																													<li roundwaytotop="GOI-Goa-India" roundwayto="Goa(GOI)">
																<div class="fli_name"><i class="fa fa-plane"></i> Goa (GOI)</div>
																<div class="airport_name">Dabolim<span>India</span></div>
															</li>
																													<li roundwaytotop="HYD-Hyderabad-India" roundwayto="Hyderabad(HYD)">
																<div class="fli_name"><i class="fa fa-plane"></i> Hyderabad (HYD)</div>
																<div class="airport_name">Shamsabad International Airport<span>India</span></div>
															</li>
																													<li roundwaytotop="MAA-Chennai-India" roundwayto="Chennai(MAA)">
																<div class="fli_name"><i class="fa fa-plane"></i> Chennai (MAA)</div>
																<div class="airport_name">Chennai<span>India</span></div>
															</li>
																													<li roundwaytotop="SIN-Singapore-Singapore" roundwayto="Singapore(SIN)">
																<div class="fli_name"><i class="fa fa-plane"></i> Singapore (SIN)</div>
																<div class="airport_name">Changi<span>Singapore</span></div>
															</li>
																													<li roundwaytotop="DXB-Dubai-United Arab Emirates" roundwayto="Dubai(DXB)">
																<div class="fli_name"><i class="fa fa-plane"></i> Dubai (DXB)</div>
																<div class="airport_name">Dubai<span>United Arab Emirates</span></div>
															</li>
																													<li roundwaytotop="BKK-Bangkok-Thailand" roundwayto="Bangkok(BKK)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangkok (BKK)</div>
																<div class="airport_name">Bangkok Int&#039;l<span>Thailand</span></div>
															</li>
																													<li roundwaytotop="KTM-Kathmandu-Nepal" roundwayto="Kathmandu(KTM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kathmandu (KTM)</div>
																<div class="airport_name">Tribhuvan<span>Nepal</span></div>
															</li>
																												</ul> 
													</div>
												</div>
											</div><!-- .form-group end -->
											<div class="form-group cus_calendar_field">
												<input autocomplete="off" type="text" name="brTimeStart" value="" class="form-control htl" 
													placeholder="2019/09/30">
												<i class="far fa-calendar add"></i>
											</div><!-- .form-group end -->
											
											<div class="form-group multiroundtrip cus_passenger_field CLI">
											<span>Cabin</span>
												<input autocomplete="off" type="text" id="multiroundpessanger" name="multibrPassengerNumber" class="form-control htlnew show-dropdown-passengers roundpessanger"
												value="1 Eco"	placeholder="Passengers" value="1 Passengers">
												<i class="fas fa-user add"></i>
												<p>Class</p>
												<ul class="list-dropdown-passengers">
												<li><h5 class="cb_sc">Cabin and passenger selection</h5></li>
												<li>
													<ul class="radio_gdn">
									<li>
										<input type="radio" id="Economy" name="cls" value="Male">
										&nbsp; <label for="Economy">Economy</label>
									</li>
									<li> <input type="radio" id="Premiumeconomy" name="cls" value="Premium economy">
										&nbsp; <label for="Premiumeconomy">Premium economy</label></li>

									<li> <input type="radio" id="Business" name="cls" value="Business">
										&nbsp; <label for="Business">Business&nbsp;</label></li>
										
										<li> <input type="radio" id="Firstclass" name="cls" value="First class">
										&nbsp; <label for="Firstclass">First class</label></li>
								</ul>


													</li>
													<li>
														<ul class="list-persons-count">
															<li>
																<span>Adults:</span>
																<div class="counter-add-item">
																	<a class="multidecrease-btn" href="javascript:;">-</a>
																	<input id="multiroundadult" class="multionewayadult" type="text" value="1">
																	<a class="multiincrease-btn" href="javascript:;">+</a>
																</div><!-- .counter-add-item end -->
															</li>
															<li>
																<span>Childs:</span>
																<div class="counter-add-item">
																	<a class="multidecrease-btn" href="javascript:;">-</a>
																	<input id="multiroundchild" class="multionewaychild" type="text" value="0">
																	<a class="multiincrease-btn" href="javascript:;">+</a>
																</div><!-- .counter-add-item end -->
															</li>
															<li>
																<span>Infants:</span>
																<div class="counter-add-item">
																	<a class="multidecrease-btn" href="javascript:;">-</a>
																	<input id="multiroundinfant" class="multionewayinfants" type="text" value="0">
																	<a class="multiincrease-btn" href="javascript:;">+</a>
																</div><!-- .counter-add-item end -->
															</li>
														</ul><!-- .list-persons-count end -->
													</li>
													<li>
														<a class="btn-reservation-passengers btn x-small colorful hover-dark"
															href="javascript:;">Done</a>
													</li>
												</ul><!-- .list-dropdown-passengers end -->
											</div><!-- .form-group end -->
											<div class="form-group cus_searchbtn_field">
												<button type="button" class="form-control multiroundformsearch icon roundformsearch " onClick="ValidateMuticity()"><i class="fas fa-search"></i>&nbsp;Search</button>
											</div><!-- .form-group end -->
											<a id="crs1" onclick="CloseSection('section-s1','')" class="closem" style="display:none;" href="javascript:;">
												<i class="fas fa-times"></i>
												
											</a>
											<div class="clearfix"></div>
									
										</div>
										<div class="ismultipleway" id="section-s2">
										<div class="form-group loc_search_field cus_loc_field">
										<i class="fas fa-plane"></i>
										<span>From</span>
												<input type="hidden" id="multi_roundfromsearch2">
											
												<input did="s2" ssid="2" style="cursor: text;" autocomplete="off" type="text" name="multiwayfromtext2" id="fromdest_show2" class="multi_roundwayfrom form-control wrapper-dropdown-8 add" placeholder="From">
												<p>Intanbul (All)</p>
												<div class="location_search selhide" id="location_search">
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Top Cities</span>
														</div>
														<ul class="multi_is_search_from_val">
																													<li roundwayfromtop="DEL-Delhi-India" roundwayfrom="Delhi(DEL)">
																<div class="fli_name"><i class="fa fa-plane"></i> Delhi (DEL)</div>
																<div class="airport_name">Indira Gandhi Airport<span>India</span></div>
															</li>
																													<li roundwayfromtop="BLR-Bangalore-India" roundwayfrom="Bangalore(BLR)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangalore (BLR)</div>
																<div class="airport_name">Bengaluru Intl<span>India</span></div>
															</li>
																													<li roundwayfromtop="BOM-Mumbai-India" roundwayfrom="Mumbai(BOM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Mumbai (BOM)</div>
																<div class="airport_name">Mumbai<span>India</span></div>
															</li>
																													<li roundwayfromtop="CCU-Kolkata-India" roundwayfrom="Kolkata(CCU)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kolkata (CCU)</div>
																<div class="airport_name">Calcutta<span>India</span></div>
															</li>
																													<li roundwayfromtop="GOI-Goa-India" roundwayfrom="Goa(GOI)">
																<div class="fli_name"><i class="fa fa-plane"></i> Goa (GOI)</div>
																<div class="airport_name">Dabolim<span>India</span></div>
															</li>
																													<li roundwayfromtop="HYD-Hyderabad-India" roundwayfrom="Hyderabad(HYD)">
																<div class="fli_name"><i class="fa fa-plane"></i> Hyderabad (HYD)</div>
																<div class="airport_name">Shamsabad International Airport<span>India</span></div>
															</li>
																													<li roundwayfromtop="MAA-Chennai-India" roundwayfrom="Chennai(MAA)">
																<div class="fli_name"><i class="fa fa-plane"></i> Chennai (MAA)</div>
																<div class="airport_name">Chennai<span>India</span></div>
															</li>
																													<li roundwayfromtop="SIN-Singapore-Singapore" roundwayfrom="Singapore(SIN)">
																<div class="fli_name"><i class="fa fa-plane"></i> Singapore (SIN)</div>
																<div class="airport_name">Changi<span>Singapore</span></div>
															</li>
																													<li roundwayfromtop="DXB-Dubai-United Arab Emirates" roundwayfrom="Dubai(DXB)">
																<div class="fli_name"><i class="fa fa-plane"></i> Dubai (DXB)</div>
																<div class="airport_name">Dubai<span>United Arab Emirates</span></div>
															</li>
																													<li roundwayfromtop="BKK-Bangkok-Thailand" roundwayfrom="Bangkok(BKK)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangkok (BKK)</div>
																<div class="airport_name">Bangkok Int&#039;l<span>Thailand</span></div>
															</li>
																													<li roundwayfromtop="KTM-Kathmandu-Nepal" roundwayfrom="Kathmandu(KTM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kathmandu (KTM)</div>
																<div class="airport_name">Tribhuvan<span>Nepal</span></div>
															</li>
																												</ul>
													</div>
												</div> 
												<div id="swap" onclick="SwapRoundDestination();" class="swipe"></div>
											</div><!-- .form-group end -->
											<div class="form-group loc_search_field_to cus_loc_field">
											<input type="hidden" id="multi_roundtosearch2">
											<i class="fas fa-plane"></i>
											<span>To</span>
												<input did="s2" ssid="2" style="cursor: text;" autocomplete="off" type="text" name="multiwaytotext2" id="todest_show2" class="multi_roundwayto form-control wrapper-dropdown-9 add" placeholder="To">
												<p>Intanbul (All)</p>
												<div class="location_search_to selhide" id="location_search_to"> 
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Top Cities</span>
														</div>
														<ul class="multi_is_search_to_val">
																													<li roundwaytotop="DEL-Delhi-India" roundwayto="Delhi(DEL)">
																<div class="fli_name"><i class="fa fa-plane"></i> Delhi (DEL)</div>
																<div class="airport_name">Indira Gandhi Airport<span>India</span></div>
															</li>
																													<li roundwaytotop="BLR-Bangalore-India" roundwayto="Bangalore(BLR)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangalore (BLR)</div>
																<div class="airport_name">Bengaluru Intl<span>India</span></div>
															</li>
																													<li roundwaytotop="BOM-Mumbai-India" roundwayto="Mumbai(BOM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Mumbai (BOM)</div>
																<div class="airport_name">Mumbai<span>India</span></div>
															</li>
																													<li roundwaytotop="CCU-Kolkata-India" roundwayto="Kolkata(CCU)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kolkata (CCU)</div>
																<div class="airport_name">Calcutta<span>India</span></div>
															</li>
																													<li roundwaytotop="GOI-Goa-India" roundwayto="Goa(GOI)">
																<div class="fli_name"><i class="fa fa-plane"></i> Goa (GOI)</div>
																<div class="airport_name">Dabolim<span>India</span></div>
															</li>
																													<li roundwaytotop="HYD-Hyderabad-India" roundwayto="Hyderabad(HYD)">
																<div class="fli_name"><i class="fa fa-plane"></i> Hyderabad (HYD)</div>
																<div class="airport_name">Shamsabad International Airport<span>India</span></div>
															</li>
																													<li roundwaytotop="MAA-Chennai-India" roundwayto="Chennai(MAA)">
																<div class="fli_name"><i class="fa fa-plane"></i> Chennai (MAA)</div>
																<div class="airport_name">Chennai<span>India</span></div>
															</li>
																													<li roundwaytotop="SIN-Singapore-Singapore" roundwayto="Singapore(SIN)">
																<div class="fli_name"><i class="fa fa-plane"></i> Singapore (SIN)</div>
																<div class="airport_name">Changi<span>Singapore</span></div>
															</li>
																													<li roundwaytotop="DXB-Dubai-United Arab Emirates" roundwayto="Dubai(DXB)">
																<div class="fli_name"><i class="fa fa-plane"></i> Dubai (DXB)</div>
																<div class="airport_name">Dubai<span>United Arab Emirates</span></div>
															</li>
																													<li roundwaytotop="BKK-Bangkok-Thailand" roundwayto="Bangkok(BKK)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangkok (BKK)</div>
																<div class="airport_name">Bangkok Int&#039;l<span>Thailand</span></div>
															</li>
																													<li roundwaytotop="KTM-Kathmandu-Nepal" roundwayto="Kathmandu(KTM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kathmandu (KTM)</div>
																<div class="airport_name">Tribhuvan<span>Nepal</span></div>
															</li>
																												</ul> 
													</div>
												</div>
											</div><!-- .form-group end -->
											<div class="form-group cus_calendar_field">
												<input autocomplete="off" type="text" name="brTimeStart" value="" class="form-control htl"
													placeholder="2019/09/30">
												<i class="far fa-calendar add"></i>
											</div><!-- .form-group end -->
											
											<a id="crs2" onclick="CloseSection('section-s2','')" class="closem" style="display:none;" href="javascript:;">
												<i class="fas fa-times"></i>
												
											</a>
											
											<div class="clearfix"></div>
									
										</div>
										<div class="ismultipleway" id="section-s3" style="display:none;">
										<div class="form-group loc_search_field cus_loc_field">
										<i class="fas fa-plane"></i>
										<span>From</span>
												<input type="hidden" id="multi_roundfromsearch3">
											
												<input did="s3" ssid="3" style="cursor: text;" autocomplete="off" type="text" name="multiwayfromtext3" id="fromdest_show3" class="multi_roundwayfrom form-control wrapper-dropdown-10 add" placeholder="From">
												<p>Intanbul (All)</p>
												<div class="location_search selhide" id="location_search">
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Top Cities</span>
														</div>
														<ul class="multi_is_search_from_val">
																													<li roundwayfromtop="DEL-Delhi-India" roundwayfrom="Delhi(DEL)">
																<div class="fli_name"><i class="fa fa-plane"></i> Delhi (DEL)</div>
																<div class="airport_name">Indira Gandhi Airport<span>India</span></div>
															</li>
																													<li roundwayfromtop="BLR-Bangalore-India" roundwayfrom="Bangalore(BLR)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangalore (BLR)</div>
																<div class="airport_name">Bengaluru Intl<span>India</span></div>
															</li>
																													<li roundwayfromtop="BOM-Mumbai-India" roundwayfrom="Mumbai(BOM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Mumbai (BOM)</div>
																<div class="airport_name">Mumbai<span>India</span></div>
															</li>
																													<li roundwayfromtop="CCU-Kolkata-India" roundwayfrom="Kolkata(CCU)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kolkata (CCU)</div>
																<div class="airport_name">Calcutta<span>India</span></div>
															</li>
																													<li roundwayfromtop="GOI-Goa-India" roundwayfrom="Goa(GOI)">
																<div class="fli_name"><i class="fa fa-plane"></i> Goa (GOI)</div>
																<div class="airport_name">Dabolim<span>India</span></div>
															</li>
																													<li roundwayfromtop="HYD-Hyderabad-India" roundwayfrom="Hyderabad(HYD)">
																<div class="fli_name"><i class="fa fa-plane"></i> Hyderabad (HYD)</div>
																<div class="airport_name">Shamsabad International Airport<span>India</span></div>
															</li>
																													<li roundwayfromtop="MAA-Chennai-India" roundwayfrom="Chennai(MAA)">
																<div class="fli_name"><i class="fa fa-plane"></i> Chennai (MAA)</div>
																<div class="airport_name">Chennai<span>India</span></div>
															</li>
																													<li roundwayfromtop="SIN-Singapore-Singapore" roundwayfrom="Singapore(SIN)">
																<div class="fli_name"><i class="fa fa-plane"></i> Singapore (SIN)</div>
																<div class="airport_name">Changi<span>Singapore</span></div>
															</li>
																													<li roundwayfromtop="DXB-Dubai-United Arab Emirates" roundwayfrom="Dubai(DXB)">
																<div class="fli_name"><i class="fa fa-plane"></i> Dubai (DXB)</div>
																<div class="airport_name">Dubai<span>United Arab Emirates</span></div>
															</li>
																													<li roundwayfromtop="BKK-Bangkok-Thailand" roundwayfrom="Bangkok(BKK)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangkok (BKK)</div>
																<div class="airport_name">Bangkok Int&#039;l<span>Thailand</span></div>
															</li>
																													<li roundwayfromtop="KTM-Kathmandu-Nepal" roundwayfrom="Kathmandu(KTM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kathmandu (KTM)</div>
																<div class="airport_name">Tribhuvan<span>Nepal</span></div>
															</li>
																												</ul>
													</div>
												</div> 
												<div id="swap" onclick="SwapRoundDestination();" class="swipe"></div>
											</div><!-- .form-group end -->
											<div class="form-group loc_search_field_to cus_loc_field">
											<input type="hidden" id="multi_roundtosearch3">
											<span>To</span>
											<i class="fas fa-plane"></i>
												<input did="s3" ssid="3" style="cursor: text;" autocomplete="off" type="text" name="multiwaytotext3" id="todest_show3" class="multi_roundwayto form-control wrapper-dropdown-11 add" placeholder="To">
												<p>Intanbul (All)</p>
												<div class="location_search_to selhide" id="location_search_to"> 
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Top Cities</span>
														</div>
														<ul class="multi_is_search_to_val">
																													<li roundwaytotop="DEL-Delhi-India" roundwayto="Delhi(DEL)">
																<div class="fli_name"><i class="fa fa-plane"></i> Delhi (DEL)</div>
																<div class="airport_name">Indira Gandhi Airport<span>India</span></div>
															</li>
																													<li roundwaytotop="BLR-Bangalore-India" roundwayto="Bangalore(BLR)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangalore (BLR)</div>
																<div class="airport_name">Bengaluru Intl<span>India</span></div>
															</li>
																													<li roundwaytotop="BOM-Mumbai-India" roundwayto="Mumbai(BOM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Mumbai (BOM)</div>
																<div class="airport_name">Mumbai<span>India</span></div>
															</li>
																													<li roundwaytotop="CCU-Kolkata-India" roundwayto="Kolkata(CCU)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kolkata (CCU)</div>
																<div class="airport_name">Calcutta<span>India</span></div>
															</li>
																													<li roundwaytotop="GOI-Goa-India" roundwayto="Goa(GOI)">
																<div class="fli_name"><i class="fa fa-plane"></i> Goa (GOI)</div>
																<div class="airport_name">Dabolim<span>India</span></div>
															</li>
																													<li roundwaytotop="HYD-Hyderabad-India" roundwayto="Hyderabad(HYD)">
																<div class="fli_name"><i class="fa fa-plane"></i> Hyderabad (HYD)</div>
																<div class="airport_name">Shamsabad International Airport<span>India</span></div>
															</li>
																													<li roundwaytotop="MAA-Chennai-India" roundwayto="Chennai(MAA)">
																<div class="fli_name"><i class="fa fa-plane"></i> Chennai (MAA)</div>
																<div class="airport_name">Chennai<span>India</span></div>
															</li>
																													<li roundwaytotop="SIN-Singapore-Singapore" roundwayto="Singapore(SIN)">
																<div class="fli_name"><i class="fa fa-plane"></i> Singapore (SIN)</div>
																<div class="airport_name">Changi<span>Singapore</span></div>
															</li>
																													<li roundwaytotop="DXB-Dubai-United Arab Emirates" roundwayto="Dubai(DXB)">
																<div class="fli_name"><i class="fa fa-plane"></i> Dubai (DXB)</div>
																<div class="airport_name">Dubai<span>United Arab Emirates</span></div>
															</li>
																													<li roundwaytotop="BKK-Bangkok-Thailand" roundwayto="Bangkok(BKK)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangkok (BKK)</div>
																<div class="airport_name">Bangkok Int&#039;l<span>Thailand</span></div>
															</li>
																													<li roundwaytotop="KTM-Kathmandu-Nepal" roundwayto="Kathmandu(KTM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kathmandu (KTM)</div>
																<div class="airport_name">Tribhuvan<span>Nepal</span></div>
															</li>
																												</ul> 
													</div>
												</div>
											</div><!-- .form-group end -->
											<div class="form-group cus_calendar_field">
												<input autocomplete="off" type="text" name="brTimeStart" value="" class="form-control htl " 
													placeholder="2019/09/30">
												<i class="far fa-calendar add"></i>
											</div><!-- .form-group end -->
											
											<a id="crs3" onclick="CloseSection('section-s3','')" class="closem" href="javascript:;">
												<i class="fas fa-times"></i>
												
											</a>
											
											<div class="clearfix"></div>
									
										</div>
										<div class="ismultipleway" id="section-s4" style="display:none;">
										<div class="form-group loc_search_field cus_loc_field">
										<span>From</span>
										<i class="fas fa-plane"></i>
												<input type="hidden" id="multi_roundfromsearch4">
											
												<input did="s4" ssid="4" style="cursor: text;" autocomplete="off" type="text" name="multiwayfromtext4" id="fromdest_show4" class="multi_roundwayfrom form-control wrapper-dropdown-12 add" placeholder="From">
												<p>Intanbul (All)</p>
												<div class="location_search selhide" id="location_search">
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Top Cities</span>
														</div>
														<ul class="multi_is_search_from_val">
																													<li roundwayfromtop="DEL-Delhi-India" roundwayfrom="Delhi(DEL)">
																<div class="fli_name"><i class="fa fa-plane"></i> Delhi (DEL)</div>
																<div class="airport_name">Indira Gandhi Airport<span>India</span></div>
															</li>
																													<li roundwayfromtop="BLR-Bangalore-India" roundwayfrom="Bangalore(BLR)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangalore (BLR)</div>
																<div class="airport_name">Bengaluru Intl<span>India</span></div>
															</li>
																													<li roundwayfromtop="BOM-Mumbai-India" roundwayfrom="Mumbai(BOM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Mumbai (BOM)</div>
																<div class="airport_name">Mumbai<span>India</span></div>
															</li>
																													<li roundwayfromtop="CCU-Kolkata-India" roundwayfrom="Kolkata(CCU)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kolkata (CCU)</div>
																<div class="airport_name">Calcutta<span>India</span></div>
															</li>
																													<li roundwayfromtop="GOI-Goa-India" roundwayfrom="Goa(GOI)">
																<div class="fli_name"><i class="fa fa-plane"></i> Goa (GOI)</div>
																<div class="airport_name">Dabolim<span>India</span></div>
															</li>
																													<li roundwayfromtop="HYD-Hyderabad-India" roundwayfrom="Hyderabad(HYD)">
																<div class="fli_name"><i class="fa fa-plane"></i> Hyderabad (HYD)</div>
																<div class="airport_name">Shamsabad International Airport<span>India</span></div>
															</li>
																													<li roundwayfromtop="MAA-Chennai-India" roundwayfrom="Chennai(MAA)">
																<div class="fli_name"><i class="fa fa-plane"></i> Chennai (MAA)</div>
																<div class="airport_name">Chennai<span>India</span></div>
															</li>
																													<li roundwayfromtop="SIN-Singapore-Singapore" roundwayfrom="Singapore(SIN)">
																<div class="fli_name"><i class="fa fa-plane"></i> Singapore (SIN)</div>
																<div class="airport_name">Changi<span>Singapore</span></div>
															</li>
																													<li roundwayfromtop="DXB-Dubai-United Arab Emirates" roundwayfrom="Dubai(DXB)">
																<div class="fli_name"><i class="fa fa-plane"></i> Dubai (DXB)</div>
																<div class="airport_name">Dubai<span>United Arab Emirates</span></div>
															</li>
																													<li roundwayfromtop="BKK-Bangkok-Thailand" roundwayfrom="Bangkok(BKK)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangkok (BKK)</div>
																<div class="airport_name">Bangkok Int&#039;l<span>Thailand</span></div>
															</li>
																													<li roundwayfromtop="KTM-Kathmandu-Nepal" roundwayfrom="Kathmandu(KTM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kathmandu (KTM)</div>
																<div class="airport_name">Tribhuvan<span>Nepal</span></div>
															</li>
																												</ul>
													</div>
												</div> 
												<div id="swap" onclick="SwapRoundDestination();" class="swipe"></div>
											</div><!-- .form-group end -->
											<div class="form-group loc_search_field_to cus_loc_field">
											<input type="hidden" id="multi_roundtosearch4">
											<span>To</span>
											<i class="fas fa-plane"></i>
												<input did="s4" ssid="4" style="cursor: text;" autocomplete="off" type="text" name="multiwaytotext4" id="todest_show4" class="multi_roundwayto form-control wrapper-dropdown-13 add" placeholder="To">
												<p>Intanbul (All)</p>
												<div class="location_search_to selhide" id="location_search_to"> 
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Top Cities</span>
														</div>
														<ul class="multi_is_search_to_val">
																													<li roundwaytotop="DEL-Delhi-India" roundwayto="Delhi(DEL)">
																<div class="fli_name"><i class="fa fa-plane"></i> Delhi (DEL)</div>
																<div class="airport_name">Indira Gandhi Airport<span>India</span></div>
															</li>
																													<li roundwaytotop="BLR-Bangalore-India" roundwayto="Bangalore(BLR)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangalore (BLR)</div>
																<div class="airport_name">Bengaluru Intl<span>India</span></div>
															</li>
																													<li roundwaytotop="BOM-Mumbai-India" roundwayto="Mumbai(BOM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Mumbai (BOM)</div>
																<div class="airport_name">Mumbai<span>India</span></div>
															</li>
																													<li roundwaytotop="CCU-Kolkata-India" roundwayto="Kolkata(CCU)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kolkata (CCU)</div>
																<div class="airport_name">Calcutta<span>India</span></div>
															</li>
																													<li roundwaytotop="GOI-Goa-India" roundwayto="Goa(GOI)">
																<div class="fli_name"><i class="fa fa-plane"></i> Goa (GOI)</div>
																<div class="airport_name">Dabolim<span>India</span></div>
															</li>
																													<li roundwaytotop="HYD-Hyderabad-India" roundwayto="Hyderabad(HYD)">
																<div class="fli_name"><i class="fa fa-plane"></i> Hyderabad (HYD)</div>
																<div class="airport_name">Shamsabad International Airport<span>India</span></div>
															</li>
																													<li roundwaytotop="MAA-Chennai-India" roundwayto="Chennai(MAA)">
																<div class="fli_name"><i class="fa fa-plane"></i> Chennai (MAA)</div>
																<div class="airport_name">Chennai<span>India</span></div>
															</li>
																													<li roundwaytotop="SIN-Singapore-Singapore" roundwayto="Singapore(SIN)">
																<div class="fli_name"><i class="fa fa-plane"></i> Singapore (SIN)</div>
																<div class="airport_name">Changi<span>Singapore</span></div>
															</li>
																													<li roundwaytotop="DXB-Dubai-United Arab Emirates" roundwayto="Dubai(DXB)">
																<div class="fli_name"><i class="fa fa-plane"></i> Dubai (DXB)</div>
																<div class="airport_name">Dubai<span>United Arab Emirates</span></div>
															</li>
																													<li roundwaytotop="BKK-Bangkok-Thailand" roundwayto="Bangkok(BKK)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangkok (BKK)</div>
																<div class="airport_name">Bangkok Int&#039;l<span>Thailand</span></div>
															</li>
																													<li roundwaytotop="KTM-Kathmandu-Nepal" roundwayto="Kathmandu(KTM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kathmandu (KTM)</div>
																<div class="airport_name">Tribhuvan<span>Nepal</span></div>
															</li>
																												</ul> 
													</div>
												</div>
											</div><!-- .form-group end -->
											<div class="form-group cus_calendar_field">
												<input autocomplete="off" type="text" name="brTimeStart" value="" class="form-control htl" 
													placeholder="2019/09/30">
												<i class="far fa-calendar add"></i>
											</div><!-- .form-group end -->
											
											<a  id="crs4" class="closem" onclick="CloseSection('section-s4',3)" href="javascript:;">
												<i class="fas fa-times"></i>
											
											</a>
											
											<div class="clearfix"></div>
									
										</div>
										<div class="ismultipleway" id="section-s5" style="display:none;">
										<div class="form-group loc_search_field cus_loc_field">
										<span>From</span>
										<i class="fas fa-plane"></i>
												<input type="hidden" id="multi_roundfromsearch5">
										
												<input did="s5" ssid="5" style="cursor: text;" autocomplete="off" type="text" name="multiwayfromtext5" id="fromdest_show5" class="multi_roundwayfrom form-control wrapper-dropdown-14 add" placeholder="From">
												<p>Intanbul (All)</p>
												<div class="location_search selhide" id="location_search">
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Top Cities</span>
														</div>
														<ul class="multi_is_search_from_val">
																													<li roundwayfromtop="DEL-Delhi-India" roundwayfrom="Delhi(DEL)">
																<div class="fli_name"><i class="fa fa-plane"></i> Delhi (DEL)</div>
																<div class="airport_name">Indira Gandhi Airport<span>India</span></div>
															</li>
																													<li roundwayfromtop="BLR-Bangalore-India" roundwayfrom="Bangalore(BLR)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangalore (BLR)</div>
																<div class="airport_name">Bengaluru Intl<span>India</span></div>
															</li>
																													<li roundwayfromtop="BOM-Mumbai-India" roundwayfrom="Mumbai(BOM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Mumbai (BOM)</div>
																<div class="airport_name">Mumbai<span>India</span></div>
															</li>
																													<li roundwayfromtop="CCU-Kolkata-India" roundwayfrom="Kolkata(CCU)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kolkata (CCU)</div>
																<div class="airport_name">Calcutta<span>India</span></div>
															</li>
																													<li roundwayfromtop="GOI-Goa-India" roundwayfrom="Goa(GOI)">
																<div class="fli_name"><i class="fa fa-plane"></i> Goa (GOI)</div>
																<div class="airport_name">Dabolim<span>India</span></div>
															</li>
																													<li roundwayfromtop="HYD-Hyderabad-India" roundwayfrom="Hyderabad(HYD)">
																<div class="fli_name"><i class="fa fa-plane"></i> Hyderabad (HYD)</div>
																<div class="airport_name">Shamsabad International Airport<span>India</span></div>
															</li>
																													<li roundwayfromtop="MAA-Chennai-India" roundwayfrom="Chennai(MAA)">
																<div class="fli_name"><i class="fa fa-plane"></i> Chennai (MAA)</div>
																<div class="airport_name">Chennai<span>India</span></div>
															</li>
																													<li roundwayfromtop="SIN-Singapore-Singapore" roundwayfrom="Singapore(SIN)">
																<div class="fli_name"><i class="fa fa-plane"></i> Singapore (SIN)</div>
																<div class="airport_name">Changi<span>Singapore</span></div>
															</li>
																													<li roundwayfromtop="DXB-Dubai-United Arab Emirates" roundwayfrom="Dubai(DXB)">
																<div class="fli_name"><i class="fa fa-plane"></i> Dubai (DXB)</div>
																<div class="airport_name">Dubai<span>United Arab Emirates</span></div>
															</li>
																													<li roundwayfromtop="BKK-Bangkok-Thailand" roundwayfrom="Bangkok(BKK)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangkok (BKK)</div>
																<div class="airport_name">Bangkok Int&#039;l<span>Thailand</span></div>
															</li>
																													<li roundwayfromtop="KTM-Kathmandu-Nepal" roundwayfrom="Kathmandu(KTM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kathmandu (KTM)</div>
																<div class="airport_name">Tribhuvan<span>Nepal</span></div>
															</li>
																												</ul>
													</div>
												</div> 
												<div id="swap" onclick="SwapRoundDestination();" class="swipe"></div>
											</div><!-- .form-group end -->
											<div class="form-group loc_search_field_to cus_loc_field">
											<span>To</span>
											<i class="fas fa-plane"></i>
											<input type="hidden" id="multi_roundtosearch5">
												<input did="s5" ssid="5" style="cursor: text;" autocomplete="off" type="text" name="multiwaytotext5" id="todest_show5" class="multi_roundwayto form-control wrapper-dropdown-15 add" placeholder="To">
												<p>Intanbul (All)</p>
												<div class="location_search_to selhide" id="location_search_to"> 
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Top Cities</span>
														</div>
														<ul class="multi_is_search_to_val">
																													<li roundwaytotop="DEL-Delhi-India" roundwayto="Delhi(DEL)">
																<div class="fli_name"><i class="fa fa-plane"></i> Delhi (DEL)</div>
																<div class="airport_name">Indira Gandhi Airport<span>India</span></div>
															</li>
																													<li roundwaytotop="BLR-Bangalore-India" roundwayto="Bangalore(BLR)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangalore (BLR)</div>
																<div class="airport_name">Bengaluru Intl<span>India</span></div>
															</li>
																													<li roundwaytotop="BOM-Mumbai-India" roundwayto="Mumbai(BOM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Mumbai (BOM)</div>
																<div class="airport_name">Mumbai<span>India</span></div>
															</li>
																													<li roundwaytotop="CCU-Kolkata-India" roundwayto="Kolkata(CCU)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kolkata (CCU)</div>
																<div class="airport_name">Calcutta<span>India</span></div>
															</li>
																													<li roundwaytotop="GOI-Goa-India" roundwayto="Goa(GOI)">
																<div class="fli_name"><i class="fa fa-plane"></i> Goa (GOI)</div>
																<div class="airport_name">Dabolim<span>India</span></div>
															</li>
																													<li roundwaytotop="HYD-Hyderabad-India" roundwayto="Hyderabad(HYD)">
																<div class="fli_name"><i class="fa fa-plane"></i> Hyderabad (HYD)</div>
																<div class="airport_name">Shamsabad International Airport<span>India</span></div>
															</li>
																													<li roundwaytotop="MAA-Chennai-India" roundwayto="Chennai(MAA)">
																<div class="fli_name"><i class="fa fa-plane"></i> Chennai (MAA)</div>
																<div class="airport_name">Chennai<span>India</span></div>
															</li>
																													<li roundwaytotop="SIN-Singapore-Singapore" roundwayto="Singapore(SIN)">
																<div class="fli_name"><i class="fa fa-plane"></i> Singapore (SIN)</div>
																<div class="airport_name">Changi<span>Singapore</span></div>
															</li>
																													<li roundwaytotop="DXB-Dubai-United Arab Emirates" roundwayto="Dubai(DXB)">
																<div class="fli_name"><i class="fa fa-plane"></i> Dubai (DXB)</div>
																<div class="airport_name">Dubai<span>United Arab Emirates</span></div>
															</li>
																													<li roundwaytotop="BKK-Bangkok-Thailand" roundwayto="Bangkok(BKK)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangkok (BKK)</div>
																<div class="airport_name">Bangkok Int&#039;l<span>Thailand</span></div>
															</li>
																													<li roundwaytotop="KTM-Kathmandu-Nepal" roundwayto="Kathmandu(KTM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kathmandu (KTM)</div>
																<div class="airport_name">Tribhuvan<span>Nepal</span></div>
															</li>
																												</ul> 
													</div>
												</div>
											</div><!-- .form-group end -->
											<div class="form-group cus_calendar_field">
												<input autocomplete="off" type="text" name="brTimeStart" value="" class="form-control htl" 
													placeholder="2019/09/30">
												<i class="far fa-calendar add"></i>
											</div><!-- .form-group end -->
											
											<a  id="crs5" onclick="CloseSection('section-s5',4)" class="closem" href="javascript:;">
												<i class="fas fa-times"></i>
												
											</a>
											
											<div class="clearfix"></div>
									
										</div>
										<div class="ismultipleway" id="section-s6" style="display:none;">
										<div class="form-group loc_search_field cus_loc_field">
										<span>From</span>
										<i class="fas fa-plane"></i>
												<input type="hidden" id="multi_roundfromsearch6">
												<input type="hidden" id="journey_type" value="3">
												<input did="s6" ssid="6" style="cursor: text;" autocomplete="off" type="text" name="multiwayfromtext6" id="fromdest_show6" class="multi_roundwayfrom form-control wrapper-dropdown-16 add" placeholder="From">
												<p>Intanbul (All)</p>
												<div class="location_search selhide" id="location_search">
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Top Cities</span>
														</div>
														<ul class="multi_is_search_from_val">
																													<li roundwayfromtop="DEL-Delhi-India" roundwayfrom="Delhi(DEL)">
																<div class="fli_name"><i class="fa fa-plane"></i> Delhi (DEL)</div>
																<div class="airport_name">Indira Gandhi Airport<span>India</span></div>
															</li>
																													<li roundwayfromtop="BLR-Bangalore-India" roundwayfrom="Bangalore(BLR)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangalore (BLR)</div>
																<div class="airport_name">Bengaluru Intl<span>India</span></div>
															</li>
																													<li roundwayfromtop="BOM-Mumbai-India" roundwayfrom="Mumbai(BOM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Mumbai (BOM)</div>
																<div class="airport_name">Mumbai<span>India</span></div>
															</li>
																													<li roundwayfromtop="CCU-Kolkata-India" roundwayfrom="Kolkata(CCU)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kolkata (CCU)</div>
																<div class="airport_name">Calcutta<span>India</span></div>
															</li>
																													<li roundwayfromtop="GOI-Goa-India" roundwayfrom="Goa(GOI)">
																<div class="fli_name"><i class="fa fa-plane"></i> Goa (GOI)</div>
																<div class="airport_name">Dabolim<span>India</span></div>
															</li>
																													<li roundwayfromtop="HYD-Hyderabad-India" roundwayfrom="Hyderabad(HYD)">
																<div class="fli_name"><i class="fa fa-plane"></i> Hyderabad (HYD)</div>
																<div class="airport_name">Shamsabad International Airport<span>India</span></div>
															</li>
																													<li roundwayfromtop="MAA-Chennai-India" roundwayfrom="Chennai(MAA)">
																<div class="fli_name"><i class="fa fa-plane"></i> Chennai (MAA)</div>
																<div class="airport_name">Chennai<span>India</span></div>
															</li>
																													<li roundwayfromtop="SIN-Singapore-Singapore" roundwayfrom="Singapore(SIN)">
																<div class="fli_name"><i class="fa fa-plane"></i> Singapore (SIN)</div>
																<div class="airport_name">Changi<span>Singapore</span></div>
															</li>
																													<li roundwayfromtop="DXB-Dubai-United Arab Emirates" roundwayfrom="Dubai(DXB)">
																<div class="fli_name"><i class="fa fa-plane"></i> Dubai (DXB)</div>
																<div class="airport_name">Dubai<span>United Arab Emirates</span></div>
															</li>
																													<li roundwayfromtop="BKK-Bangkok-Thailand" roundwayfrom="Bangkok(BKK)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangkok (BKK)</div>
																<div class="airport_name">Bangkok Int&#039;l<span>Thailand</span></div>
															</li>
																													<li roundwayfromtop="KTM-Kathmandu-Nepal" roundwayfrom="Kathmandu(KTM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kathmandu (KTM)</div>
																<div class="airport_name">Tribhuvan<span>Nepal</span></div>
															</li>
																												</ul>
													</div>
												</div> 
												<div id="swap" onclick="SwapRoundDestination();" class="swipe"></div>
											</div><!-- .form-group end -->
											<div class="form-group loc_search_field_to cus_loc_field">
											<span>To</span>
											<i class="fas fa-plane"></i>
											<input type="hidden" id="multi_roundtosearch6">
												<input did="s6" ssid="6" style="cursor: text;" autocomplete="off" type="text" name="multiwaytotext6" id="todest_show6" class="multi_roundwayto form-control wrapper-dropdown-17 add" placeholder="To">
												<p>Intanbul (All)</p>
												<div class="location_search_to selhide" id="location_search_to"> 
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Top Cities</span>
														</div>
														<ul class="multi_is_search_to_val">
																													<li roundwaytotop="DEL-Delhi-India" roundwayto="Delhi(DEL)">
																<div class="fli_name"><i class="fa fa-plane"></i> Delhi (DEL)</div>
																<div class="airport_name">Indira Gandhi Airport<span>India</span></div>
															</li>
																													<li roundwaytotop="BLR-Bangalore-India" roundwayto="Bangalore(BLR)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangalore (BLR)</div>
																<div class="airport_name">Bengaluru Intl<span>India</span></div>
															</li>
																													<li roundwaytotop="BOM-Mumbai-India" roundwayto="Mumbai(BOM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Mumbai (BOM)</div>
																<div class="airport_name">Mumbai<span>India</span></div>
															</li>
																													<li roundwaytotop="CCU-Kolkata-India" roundwayto="Kolkata(CCU)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kolkata (CCU)</div>
																<div class="airport_name">Calcutta<span>India</span></div>
															</li>
																													<li roundwaytotop="GOI-Goa-India" roundwayto="Goa(GOI)">
																<div class="fli_name"><i class="fa fa-plane"></i> Goa (GOI)</div>
																<div class="airport_name">Dabolim<span>India</span></div>
															</li>
																													<li roundwaytotop="HYD-Hyderabad-India" roundwayto="Hyderabad(HYD)">
																<div class="fli_name"><i class="fa fa-plane"></i> Hyderabad (HYD)</div>
																<div class="airport_name">Shamsabad International Airport<span>India</span></div>
															</li>
																													<li roundwaytotop="MAA-Chennai-India" roundwayto="Chennai(MAA)">
																<div class="fli_name"><i class="fa fa-plane"></i> Chennai (MAA)</div>
																<div class="airport_name">Chennai<span>India</span></div>
															</li>
																													<li roundwaytotop="SIN-Singapore-Singapore" roundwayto="Singapore(SIN)">
																<div class="fli_name"><i class="fa fa-plane"></i> Singapore (SIN)</div>
																<div class="airport_name">Changi<span>Singapore</span></div>
															</li>
																													<li roundwaytotop="DXB-Dubai-United Arab Emirates" roundwayto="Dubai(DXB)">
																<div class="fli_name"><i class="fa fa-plane"></i> Dubai (DXB)</div>
																<div class="airport_name">Dubai<span>United Arab Emirates</span></div>
															</li>
																													<li roundwaytotop="BKK-Bangkok-Thailand" roundwayto="Bangkok(BKK)">
																<div class="fli_name"><i class="fa fa-plane"></i> Bangkok (BKK)</div>
																<div class="airport_name">Bangkok Int&#039;l<span>Thailand</span></div>
															</li>
																													<li roundwaytotop="KTM-Kathmandu-Nepal" roundwayto="Kathmandu(KTM)">
																<div class="fli_name"><i class="fa fa-plane"></i> Kathmandu (KTM)</div>
																<div class="airport_name">Tribhuvan<span>Nepal</span></div>
															</li>
																												</ul> 
													</div>
												</div>
											</div><!-- .form-group end -->
											<div class="form-group cus_calendar_field">
												<input autocomplete="off" type="text" name="brTimeStart6" value="" class="form-control htl" 
													placeholder="2019/09/30">
												<i class="far fa-calendar add"></i>
											</div><!-- .form-group end -->
											
											<a  id="crs6" onclick="CloseSection('section-s6',5)" class="closem" href="javascript:;">
												<i class="fas fa-times"></i>
											
											</a>
											
											<div class="clearfix"></div>
									
										</div>
										<div class="addcity" id="addAnFlt">
											<a  class="if_multicity_trip btn-multiple-destinations btn x-small colorful hover-dark adm" href="javascript:;">
												<i class="fas fa-plus"></i>
												Add City
											</a>
										</div>
									</form>
									</li>
									
								</ul><!-- .br-tabs-content end -->
								<div class="advanced_option" style="display: none;"><a href="javascript:;">Previous searches&nbsp;<i class="fas fa-chevron-down"></i></a>
									<ul class="list-select-grade list_grade">
										<li>
											<label class="radio-container radio-default">
												<input class="roundseatclass" value="2" type="radio" checked="checked" name="radio">
												<span class="checkmark"></span>
												Economy
											</label>
										</li>
										<li>
											<label class="radio-container radio-default">
												<input class="roundseatclass" value="3" type="radio"  name="radio">
												<span class="checkmark"></span>
												Premium Economy
											</label>
										</li>
										<li>
											<label class="radio-container radio-default">
												<input class="roundseatclass" value="4" type="radio" name="radio">
												<span class="checkmark"></span>
												Business
											</label>
										</li>
										<li>
											<label class="radio-container radio-default">
												<input class="roundseatclass" value="6" type="radio"  name="radio">
												<span class="checkmark"></span>
												First
											</label>
										</li>											
										<li>
											<label class="label-container checkbox-default">
												<span>Nonstop</span>
												<input id="roundis_non_stop" value="1" type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
									</ul><!-- .list-select-grade end -->
								</div>
								<div class="clearfix"></div>
							</div><!-- .banner-reservation-tabs end -->
						</div>
			</div><!-- .container end -->
		</div><!-- .slide-content end -->
	</div><!-- .banner-parallax end -->
 
</section><!-- #banner end -->




<section class="searclit">
    <div class="tabsearch">
       
        <div class="form_hotel">
            <div class="boxsearching ">
                <div class="search_location smallwt1">
                    <div class=" position-relative">
                        <h3 class="search_title">Destination</h3>
                        <div class="position-relative br_searc">
                            <i class="fa fa-map-marker fixinput_icon_l"></i>
                            <input type="text" class="input_src leftri input_hg pdlftt"
                                placeholder="Enter City, Area or Hotel Name" data-toggle="dropdown" />
                            <div class="dropdown-menu drp_plane">
                                <div class="plane_list">
                                    <span>Popular destinations nearby</span>
                                    <ul>
                                        <li>
                                            <div class="fli_name"><i class="fa fa-building"></i>Delhi</div>
                                            <div class="airport_name"><span>2088 Hotel</span></div>
                                        </li>
                                        <li>
                                            <div class="fli_name"><i class="fa fa-building"></i>Delhi</div>
                                            <div class="airport_name"><span>2088 Hotel</span></div>
                                        </li>
                                        <li>
                                            <div class="fli_name"><i class="fa fa-building"></i>Delhi</div>
                                            <div class="airport_name"><span>2088 Hotel</span></div>
                                        </li>
                                        <li>
                                            <div class="fli_name"><i class="fa fa-building"></i>Delhi</div>
                                            <div class="airport_name"><span>2088 Hotel</span></div>
                                        </li>

                                        <li>
                                            <div class="fli_name"><i class="fa fa-building"></i>Delhi</div>
                                            <div class="airport_name"><span>2088 Hotel</span></div>
                                        </li>
                                        <li>
                                            <div class="fli_name"><i class="fa fa-building"></i>Delhi</div>
                                            <div class="airport_name"><span>2088 Hotel</span></div>
                                        </li>

                                        <li>
                                            <div class="fli_name"><i class="fa fa-building"></i>Delhi</div>
                                            <div class="airport_name"><span>2088 Hotel</span></div>
                                        </li>
                                        <li>
                                            <div class="fli_name"><i class="fa fa-building"></i>Delhi</div>
                                            <div class="airport_name"><span>2088 Hotel</span></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>

                <div class="d-flex justify-content-between mball smallwt2">
                    <div class="search_date">
                        <h3 class="search_title">Check In</h3>
                        <div class="position-relative br_searc">
                            <i class="fa fa-calendar-o fixinput_icon_r"></i>
                            <input aut type="text" id="datepicker1" placeholder="DD-MM-YYYY"
                                class="input_src  input_hgt pdrttt">
                        </div>
                    </div>

                    <div class="search_date">
                        <h3 class="search_title">Check Out</h3>
                        <div class="position-relative br_searc">
                            <i class="fa fa-calendar-o fixinput_icon_r"></i>
                            <input aut type="text" id="datepicker2" placeholder="DD-MM-YYYY"
                                class="input_src  input_hgt pdrttt">
                        </div>
                    </div>


                </div>
                <div class="search_adult mball smallwt3">
                    <h3 class="search_title">Traveller and Hotel</h3>
                    <div class="position-relative br_searc1">
                        <div class="t_room">
                            <span>4&nbsp;</span>
                            <span>Traveller</span>
                            <span>s</span>
                            <span>,&nbsp;2&nbsp;</span>
                            <span>Room</span>
                            <span>s</span>
                        </div>
                        <span class="ar_tv"><i class="ml-2 fa fa-angle-down"></i></span>
                        <div class="dropslct htlshow" style="display: none;">
                            <div class="drop1_room">

                                <div class="tg_title">
                                    <h3>Room 1:</h3>
                                </div>

                                <div class="passenger_box htbx d-flex  align-items-center">
                                    <div class="iconus">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="qty_box ">
                                        <span>Adult <span class="smltxt_g">(Above 12 years)</span></span>
                                        <div id='myform' method='POST' class='quantity' action='#'>
                                            <input type='button' value='-' class='qtyminus minus'
                                                field='quantity' />
                                            <input type='text' name='quantity' value='0' class='qty' />
                                            <input type='button' value='+' class='qtyplus plus' field='quantity' />
                                        </div>
                                    </div>

                                    <div class="qty_box ">
                                        <span>Child <span class="smltxt_g">(Below 12 years)</span></span>
                                        <div id='myform' method='POST' class='quantity' action='#'>
                                            <input type='button' value='-' class='qtyminus minus'
                                                field='quantity' />
                                            <input type='text' name='quantity' value='0' class='qty' />
                                            <input type='button' value='+' class='qtyplus plus' field='quantity' />
                                        </div>
                                    </div>


                                </div>

                                <div class="mt-3" id="room2" style="display: none; ">
                                    <div class="tg_title">
                                        <h3>Room 2:</h3>
                                    </div>

                                    <div class="passenger_box htbx d-flex  align-items-center">
                                        <div class="iconus">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="qty_box ">
                                            <span>Adult <span class="smltxt_g">(Above 12 years)</span></span>
                                            <div id='myform' method='POST' class='quantity' action='#'>
                                                <input type='button' value='-' class='qtyminus minus'
                                                    field='quantity' />
                                                <input type='text' name='quantity' value='0' class='qty' />
                                                <input type='button' value='+' class='qtyplus plus'
                                                    field='quantity' />
                                            </div>
                                        </div>

                                        <div class="qty_box ">
                                            <span>Child <span class="smltxt_g">(Below 12 years)</span></span>
                                            <div id='myform' method='POST' class='quantity' action='#'>
                                                <input type='button' value='-' class='qtyminus minus'
                                                    field='quantity' />
                                                <input type='text' name='quantity' value='0' class='qty' />
                                                <input type='button' value='+' class='qtyplus plus'
                                                    field='quantity' />
                                            </div>
                                        </div>
                                        <span class="close_room"><i class="fa fa-close"></i></span>

                                    </div>
                                </div>


                                <div class="search_adult  mt-3">
                                    <div class="rm_ad">
                                        <button class="roombtn" id="roombtn" type="button"><i
                                                class="fa fa-plus mr-2"></i>Add Room</button>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>

                <div class="search_adult mball smallwt4">
                    <h3 class="search_title">Nationality</h3>
                    <div class="position-relative br_searc1 inputbx_select">
                        <select>
                            <option>India</option>
                        </select>
<i class="arwb fa fa-angle-down"></i>
                    </div>
                </div>




                <div class="searchbtn d-flex smallwt5">
                  
                    <button type="submit" class="ftbtn_src">Search&nbsp;Hotel</button>
                </div>

            </div>
        </div>




    </div>
  </section>
  <div class="mobile-filter">
    <ul class="cntrjst">
        <li><i class="fas fa-sort-amount-up-alt"></i>FILTER</li>
        
    </ul>
</div>
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 serps cngflt">
            <div class="flsa">
                <section class="list_fliter">
                    <div class="filter_nes">

                     

                        <div class="ftr_headnw ">
                            <h1>Filter</h1>
                            <span>Clear all</span>
                        </div>



                        <div class="filtercnt_n mtmds">
                            <div class="mobileapply_ftr">
                                <button type="button" class="btnf_apy" id="aplybtn"><span>0 Filters</span>APPLY
                                </button>
                            </div>

                            <div class="sarchftr_ht1">
                                <i class="fa fa-search"></i>
                                <input type="text" placeholder="Hotel name" class="sr" />
                            </div>

                            <div class="panel-group " id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" aria-expanded="true" href="#PRICE"
                                                aria-expanded="true">
                                                <div class="txtftr">
                                                    <h6>PRICE</h6>
                                                    <span>Clear</span>
                                                </div>

                                            </a>
                                        </h4>
                                    </div>
                                    <div id="PRICE" class="panel-collapse in collapse show">
                                        <div class="panel-body">
                                            <div class="rage_price">
                                                <div id="slider"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" aria-expanded="true"
                                                href="#Popularfilters" aria-expanded="true">
                                                <div class="txtftr">
                                                    <h6>Popular filters</h6>
                                                    <span>Clear</span>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="Popularfilters" class="panel-collapse collapse in show">
                                        <div class="panel-body pdmrbx">
                                            <div class="checkftr">
                                                <ul class="check-boxes-custom list-checkboxes">
                                                    <li>
                                                        <label for="Swimmingpool1"
                                                            class="label-container checkbox-default">Swimming
                                                            pool
                                                            <input name="Swimmingpool" class="flightfilter"
                                                                id="Swimmingpool1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc"> 14 </span>
                                                    </li>
                                                    <li>
                                                        <label for="Verygoodrating1"
                                                            class="label-container checkbox-default">Very good
                                                            rating
                                                            <input name="Verygoodrating" class="Verygoodrating"
                                                                id="Verygoodrating1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">248</span>
                                                    </li>

                                                    <li>
                                                        <label for="Beachfront1"
                                                            class="label-container checkbox-default">Beachfront
                                                            <input name="Beachfront" class="flightfilter"
                                                                id="Beachfront1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">1</span>
                                                    </li>

                                                    <li>
                                                        <label for="Centrallylocated1"
                                                            class="label-container checkbox-default">Centrally
                                                            located
                                                            <input name="Centrallylocated" class="flightfilter"
                                                                id="Centrallylocated1" type="checkbox"
                                                                value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">512</span>
                                                    </li>

                                                    <li>
                                                        <label for="Hidesoldout1"
                                                            class="label-container checkbox-default">Hide sold
                                                            out
                                                            <input name="Hidesoldout1" class="flightfilter"
                                                                id="Hidesoldout1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                    </li>


                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#Stars"  aria-expanded="true"
                                                aria-expanded="true">
                                                <div class="txtftr">
                                                    <h6>Stars</h6>
                                                    <span>Clear</span>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="Stars" class="panel-collapse collapse in show">
                                        <div class="panel-body pdmrbx">
                                            <div class="checkftr">
                                                <ul class="check-boxes-custom list-checkboxes">
                                                    <li>
                                                        <label for="star1"
                                                            class="label-container checkbox-default">
                                                            <div class="startbx">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <input name="star" class="flightfilter" id="star1"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc"> 56 </span>
                                                    </li>

                                                    <li>
                                                        <label for="star2"
                                                            class="label-container checkbox-default">
                                                            <div class="startbx">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <input name="star" class="flightfilter" id="star2"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">314</span>
                                                    </li>
                                                    <li>
                                                        <label for="star3"
                                                            class="label-container checkbox-default">
                                                            <div class="startbx">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <input name="star" class="flightfilter" id="star3"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">591</span>
                                                    </li>

                                                    <li>
                                                        <label for="star4"
                                                            class="label-container checkbox-default">
                                                            <div class="startbx">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <input name="star" class="flightfilter" id="star4"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">119</span>
                                                    </li>

                                                    <li>
                                                        <label for="star5"
                                                            class="label-container checkbox-default">
                                                            <div class="startbx">
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <input name="star" class="flightfilter" id="star5"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">38</span>
                                                    </li>



                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                                href="#Hotelrating" aria-expanded="true">
                                                <div class="txtftr">
                                                    <h6>Hotel rating</h6>
                                                    <span>Clear</span>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="Hotelrating" class="panel-collapse collapse in">
                                        <div class="panel-body pdmrbx">
                                            <div class="checkftr">
                                                <ul class="check-boxes-custom list-checkboxes">
                                                    <li>
                                                        <label for="Excellent1"
                                                            class="label-container checkbox-default">Excellent
                                                            <input name="Excellent" class="flightfilter"
                                                                id="Excellent1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">172</span>
                                                    </li>
                                                    <li>
                                                        <label for="Verygood1"
                                                            class="label-container checkbox-default">Very good
                                                            <input name="Verygood" class="Verygoodrating"
                                                                id="Verygood1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">246</span>
                                                    </li>

                                                    <li>
                                                        <label for="Good1"
                                                            class="label-container checkbox-default">Good
                                                            <input name="Good" class="flightfilter" id="Good1"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">188</span>
                                                    </li>

                                                    <li>
                                                        <label for="Fair1"
                                                            class="label-container checkbox-default">Fair
                                                            <input name="Fair" class="flightfilter" id="Fair1"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">90</span>
                                                    </li>

                                                    <li>
                                                        <label for="Poor1"
                                                            class="label-container checkbox-default">Poor
                                                            <input name="Poor" class="flightfilter" id="Poor1"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">57</span>
                                                    </li>


                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                                href="#Facilities" aria-expanded="true">
                                                <div class="txtftr">
                                                    <h6>Facilities</h6>
                                                    <span>Clear</span>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="Facilities" class="panel-collapse collapse in">
                                        <div class="panel-body pdmrbx">
                                            <div class="checkftr">
                                                <ul class="check-boxes-custom list-checkboxes">
                                                    <li>
                                                        <label for="24hourfrontdesk1"
                                                            class="label-container checkbox-default">24-hour
                                                            front desk
                                                            <input name="24hourfrontdesk" class="flightfilter"
                                                                id="24hourfrontdesk1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">918</span>
                                                    </li>
                                                    <li>
                                                        <label for="24hourroomservice1"
                                                            class="label-container checkbox-default">24-hour
                                                            room service
                                                            <input name="24hourroomservice"
                                                                class="Verygoodrating" id="24hourroomservice1"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">0</span>
                                                    </li>

                                                    <li>
                                                        <label for="Airconditioning1"
                                                            class="label-container checkbox-default">Air
                                                            conditioning
                                                            <input name="Airconditioning" class="flightfilter"
                                                                id="Airconditioning1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">33</span>
                                                    </li>

                                                    <li>
                                                        <label for="Beachnearby1"
                                                            class="label-container checkbox-default">Beach
                                                            nearby
                                                            <input name="Beachnearby" class="flightfilter"
                                                                id="Beachnearby1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">1</span>
                                                    </li>

                                                    <li>
                                                        <label for="Carparking1"
                                                            class="label-container checkbox-default">Car parking
                                                            <input name="Carparking" class="flightfilter"
                                                                id="Carparking1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">241</span>
                                                    </li>

                                                    <li>
                                                        <label for="Facilitiesfordisabled1"
                                                            class="label-container checkbox-default">Facilities
                                                            for disabled
                                                            <input name="Facilitiesfordisabled"
                                                                class="flightfilter" id="Facilitiesfordisabled1"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">631</span>
                                                    </li>

                                                    <li>
                                                        <label for="Fitnesscenter1"
                                                            class="label-container checkbox-default">Fitness
                                                            center
                                                            <input name="Fitnesscenter" class="flightfilter"
                                                                id="Fitnesscenter1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">170</span>
                                                    </li>

                                                    <li>
                                                        <label for="Freecarparking1"
                                                            class="label-container checkbox-default">Free car
                                                            parking
                                                            <input name="Freecarparking" class="flightfilter"
                                                                id="Freecarparking1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">18</span>
                                                    </li>


                                                    <li>
                                                        <label for="Freewifi1"
                                                            class="label-container checkbox-default">Free wifi
                                                            <input name="Freewifi" class="flightfilter"
                                                                id="Freewifi1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">993</span>
                                                    </li>

                                                    <li>
                                                        <label for="Kitchen1"
                                                            class="label-container checkbox-default">Kitchen
                                                            <input name="Kitchen" class="flightfilter"
                                                                id="Kitchen1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">3</span>
                                                    </li>

                                                    <li>
                                                        <label for="Nonsmokingrooms1"
                                                            class="label-container checkbox-default">Non smoking
                                                            rooms
                                                            <input name="Nonsmokingrooms" class="flightfilter"
                                                                id="Nonsmokingrooms1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">40</span>
                                                    </li>

                                                    <li>
                                                        <label for="Petsallowed1"
                                                            class="label-container checkbox-default">Pets
                                                            allowed
                                                            <input name="Petsallowed" class="flightfilter"
                                                                id="Petsallowed1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">17</span>
                                                    </li>

                                                    <li>
                                                        <label for="Roomservice1"
                                                            class="label-container checkbox-default">Room
                                                            service
                                                            <input name="Roomservice" class="flightfilter"
                                                                id="Roomservice1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">16</span>
                                                    </li>

                                                    <li>
                                                        <label for="Areashuttle1"
                                                            class="label-container checkbox-default">Area
                                                            shuttle
                                                            <input name="Areashuttle" class="flightfilter"
                                                                id="Areashuttle1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">45</span>
                                                    </li>

                                                    <li>
                                                        <label for="Smokingrooms1"
                                                            class="label-container checkbox-default">Smoking
                                                            rooms
                                                            <input name="Smokingrooms" class="flightfilter"
                                                                id="Smokingrooms1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">0</span>
                                                    </li>

                                                    <li>
                                                        <label for="Spacenter1"
                                                            class="label-container checkbox-default">Spa center
                                                            <input name="Spacenter" class="flightfilter"
                                                                id="Spacenter1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">0</span>
                                                    </li>

                                                    <li>
                                                        <label for="Swimmingpool1"
                                                            class="label-container checkbox-default">Swimming
                                                            pool
                                                            <input name="Swimmingpool" class="flightfilter"
                                                                id="Swimmingpool" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">14</span>
                                                    </li>

                                                    <li>
                                                        <label for="Wifi1"
                                                            class="label-container checkbox-default">Wifi
                                                            <input name="Wifi" class="flightfilter" id="Wifi1"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">95</span>
                                                    </li>

                                                    <li>
                                                        <label for="Covid19HygieneProtocols1"
                                                            class="label-container checkbox-default">Covid-19
                                                            Hygiene Protocols
                                                            <input name="Covid19HygieneProtocols"
                                                                class="flightfilter"
                                                                id="Covid19HygieneProtocols1" type="checkbox"
                                                                value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">0</span>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>







                            </div>
                        </div>
                    </div>

                    <div class="listingbx">
                        <div class="rightlist flexdrop">
                            <h2>Paris, France&nbsp;&nbsp;:&nbsp;&nbsp;<span>1123 hotels available</span>
                                <p>Our best prices have now loaded</p>
                            </h2>
                            <div class="ratingdrop">
                                <select class="lidr_pc">
                                    <option>Rating</option>
                                    <option>Price&nbsp;&nbsp;:&nbsp;&nbsp;low to high</option>
                                    <option>Price&nbsp;&nbsp;:&nbsp;&nbsp;high to low</option>
                                    <option>Distance</option>

                                </select>

                          
                            </div>
                        </div>

                      


                        <div class="largebox_listing">
                            <div class="lglist">
                                <div class="list_hotel_img">
                                    <div class="lgzoomimg">
                                        <a href="#">
                                                <img src="images/Hera.jpg" class="img-res" />
                                            </a>
                                    </div>
                                   
                                </div>

                                <div class="list_hotel_txt">
                                   
                                    <div class="listing_hd_hotel">
                                        <h2><span>The Hera Hotel Sapanca</span>
                                            <div class="startbx smallstar">
                                                <span>5&nbsp;-&nbsp;</span>
                                                <i class="fa fa-star"></i>
                                                
                                            </div>
                                        </h2>
                                        <ul class="listbt_sml">
                                            <li><a href="#">Cayici Mahallesi, Izmit Cd. No 44, Sapanca, 54600, Sakarya</a></li>
                                           
                                        </ul>

                                        <ul class="iconsml">
                                            <li>
                                                <span><img src="images/Pool.png" class="img-res" /></span>
                                                <span>Pool</span>
                                            </li>

                                            <li>
                                                <span><img src="images/FreeParking.png" class="img-res" /></span>
                                                <span>Free Parking</span>
                                            </li>

                                            <li>
                                                <span><img src="images/Spa.png" class="img-res" /></span>
                                                <span>Spa</span>
                                            </li>

                                            <li>
                                                <span><img src="images/Gym.png" class="img-res" /></span>
                                                <span>Gym</span>
                                            </li>

                                            <li>
                                                <span><img src="images/Restaurant.png" class="img-res" /></span>
                                                <span>Restaurant</span>
                                            </li>

                                            <li>
                                                <span><img src="images/Bar.png" class="img-res" /></span>
                                                <span>Bar</span>
                                            </li>

                                           
                                        </ul>

                                        <div class="green_ex">
                                            <span><i class="fa fa-star"></i>&nbsp;4.77 (48 reviews)</span>
                                        </div>

                                       


                                    </div>

                                </div>

                                <div class="pribtns">
                                    <div class="priceshow">
                                        <h3>₦10,000
                                            <span>per night</span>
                                        </h3>
                                        <p>total ₦30,000 for 3 nights
                                            Tax & fees Inclusive</p>
                                    </div>
                                    <div class="hotslc">
                                        <a href="#">Book Now<i class="fa fa-angle-right ml5"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="lglist">
                                <div class="list_hotel_img">
                                    <div class="lgzoomimg">
                                        <a href="#">
                                                <img src="images/Hera.jpg" class="img-res" />
                                            </a>
                                    </div>
                                   
                                </div>

                                <div class="list_hotel_txt">
                                   
                                    <div class="listing_hd_hotel">
                                        <h2><span>The Hera Hotel Sapanca</span>
                                            <div class="startbx smallstar">
                                                <span>5&nbsp;-&nbsp;</span>
                                                <i class="fa fa-star"></i>
                                                
                                            </div>
                                        </h2>
                                        <ul class="listbt_sml">
                                            <li><a href="#">Cayici Mahallesi, Izmit Cd. No 44, Sapanca, 54600, Sakarya</a></li>
                                           
                                        </ul>

                                        <ul class="iconsml">
                                            <li>
                                                <span><img src="images/Pool.png" class="img-res" /></span>
                                                <span>Pool</span>
                                            </li>

                                            <li>
                                                <span><img src="images/FreeParking.png" class="img-res" /></span>
                                                <span>Free Parking</span>
                                            </li>

                                            <li>
                                                <span><img src="images/Spa.png" class="img-res" /></span>
                                                <span>Spa</span>
                                            </li>

                                            <li>
                                                <span><img src="images/Gym.png" class="img-res" /></span>
                                                <span>Gym</span>
                                            </li>

                                            <li>
                                                <span><img src="images/Restaurant.png" class="img-res" /></span>
                                                <span>Restaurant</span>
                                            </li>

                                            <li>
                                                <span><img src="images/Bar.png" class="img-res" /></span>
                                                <span>Bar</span>
                                            </li>

                                           
                                        </ul>

                                        <div class="green_ex">
                                            <span><i class="fa fa-star"></i>&nbsp;4.77 (48 reviews)</span>
                                        </div>

                                       


                                    </div>

                                </div>

                                <div class="pribtns">
                                    <div class="priceshow">
                                        <h3>₦10,000
                                            <span>per night</span>
                                        </h3>
                                        <p>total ₦30,000 for 3 nights
                                            Tax & fees Inclusive</p>
                                    </div>
                                    <div class="hotslc">
                                        <a href="#">Book Now<i class="fa fa-angle-right ml5"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
                </section>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.airlist').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 3,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        $("#aplybtn").click(function () {
            $(".filterbx").hide();
        });
        $(".mobile-filter>ul>li").click(function () {
            $(".filterbx").show();
        });





        function collision($div1, $div2) {
            var x1 = $div1.offset().left;
            var w1 = 40;
            var r1 = x1 + w1;
            var x2 = $div2.offset().left;
            var w2 = 40;
            var r2 = x2 + w2;

            if (r1 < x2 || x1 > r2)
                return false;
            return true;
        }
        // Fetch Url value 
        var getQueryString = function (parameter) {
            var href = window.location.href;
            var reg = new RegExp('[?&]' + parameter + '=([^&#]*)', 'i');
            var string = reg.exec(href);
            return string ? string[1] : null;
        };
        // End url 
        // // slider call
        $('#slider').slider({
            range: true,
            min: 381614,
            max: 8243008,
            step: 1,
            values: [getQueryString('minval') ? getQueryString('minval') : 0, getQueryString('maxval') ? getQueryString('maxval') : 8243008],

            slide: function (event, ui) {

                $('.ui-slider-handle:eq(0) .price-range-min').html('$' + ui.values[0]);
                $('.ui-slider-handle:eq(1) .price-range-max').html('$' + ui.values[1]);
                $('.price-range-both').html('<i>$' + ui.values[0] + ' - </i>$' + ui.values[1]);

                // get values of min and max
                $("#minval").val(ui.values[0]);
                $("#maxval").val(ui.values[1]);

                if (ui.values[0] == ui.values[1]) {
                    $('.price-range-both i').css('display', 'none');
                } else {
                    $('.price-range-both i').css('display', 'inline');
                }

                if (collision($('.price-range-min'), $('.price-range-max')) == true) {
                    $('.price-range-min, .price-range-max').css('opacity', '0');
                    $('.price-range-both').css('display', 'block');
                } else {
                    $('.price-range-min, .price-range-max').css('opacity', '1');
                    $('.price-range-both').css('display', 'none');
                }

            }
        });

        $('.ui-slider-range').append('<span class="price-range-both value"><i>$' + $('#slider').slider('values', 0) + ' - </i>' + $('#slider').slider('values', 1) + '</span>');

        $('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">$' + $('#slider').slider('values', 0) + '</span>');

        $('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">$' + $('#slider').slider('values', 1) + '</span>');
    });

    $(document).ready(function () {
        $("#cvd_btn").click(function () {
            $(".covid_noty").hide(1000);
        });


        // $('[data-fancybox="preview"]').fancybox({
        // 	thumbs: {
        // 		autoStart: true
        // 	}
        // });

        $('[data-fancybox]').fancybox({
            thumbs: {
                autoStart: true
            }
});

        // I've added annotations to make this easier to follow along at home. Good luck learning and check out my other pens if you found this useful


        // First let's set the colors of our sliders
        const settings = {
            fill: '#399af4',
            background: '#d7dcdf'
        }

        // First find all our sliders
        const sliders = document.querySelectorAll('.range-slider');

        // Iterate through that list of sliders
        // ... this call goes through our array of sliders [slider1,slider2,slider3] and inserts them one-by-one into the code block below with the variable name (slider). We can then access each of wthem by calling slider
        Array.prototype.forEach.call(sliders, (slider) => {
            // Look inside our slider for our input add an event listener
            //   ... the input inside addEventListener() is looking for the input action, we could change it to something like change
            slider.querySelector('input').addEventListener('input', (event) => {
                // 1. apply our value to the span
                slider.querySelector('span').innerHTML = event.target.value;
                // 2. apply our fill to the input
                applyFill(event.target);
            });
            // Don't wait for the listener, apply it now!
            applyFill(slider.querySelector('input'));
        });

        // This function applies the fill to our sliders by using a linear gradient background
        function applyFill(slider) {
            // Let's turn our value into a percentage to figure out how far it is in between the min and max of our input
            const percentage = 100 * (slider.value - slider.min) / (slider.max - slider.min);
            // now we'll create a linear gradient that separates at the above point
            // Our background color will change here
            const bg = `linear-gradient(90deg, ${settings.fill} ${percentage}%, ${settings.background} ${percentage + 0.1}%)`;
            slider.style.background = bg;
        }

    });
</script>










<div id="section-services-1" class="section-flat custom_service" style="background: #f5f5f5; margin-top: 0px;">
	<div class="section-content">		
		<div class="container">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<div class="box-info box-service-1">
						<div class="box-icon">
							<i class="fas fa-tags"></i>
						</div><!-- .box-icon end -->
						<div class="box-content">
							<h4><a href="javascript:;">Best Price Guarantee</a></h4>
							<!--<p>Find a lower price? we'll refund you 200% of the difference.</p>-->
						</div><!-- .box-content end -->
					</div><!-- .box-info box-service-1 end -->
				</div><!-- .col-md-4 end -->
				<div class="col-md-2">						
					<div class="box-info box-service-1 mt-md-50">
						<div class="box-icon">
							<i class="fas fa-smile"></i>
						</div><!-- .box-icon end -->
						<div class="box-content">
							<h4><a href="javascript:;">Easy Booking</a></h4>
							<!--<p>We’re always here for you – reach us 24 hours a day, 7 days a week.</p>-->
						</div><!-- .box-content end -->
					</div><!-- .box-info box-service-1 end -->						
				</div><!-- .col-md-4 end -->
				<div class="col-md-2">						
					<div class="box-info box-service-1 mt-md-50">
						<div class="box-icon">
							<i class="fas fa-search"></i>
						</div><!-- .box-icon end -->
						<div class="box-content">
							<h4><a href="javascript:;">No Hidden Charges</a></h4>
							<!--<p>Book Flight, Hotel, Holiday and Sightseeing/Activities in 3 Simple Steps</p>-->
						</div><!-- .box-content end -->
					</div><!-- .box-info box-service-1 end -->						
				</div><!-- .col-md-4 end -->
				<div class="col-md-2">						
					<div class="box-info box-service-1 mt-md-50">
						<div class="box-icon">
							<i class="fas fa-globe"></i>
						</div><!-- .box-icon end -->
						<div class="box-content">
							<h4><a href="javascript:;">Worldwide Connectivity</a></h4>
							<!--<p>Book Flight, Hotel, Holiday and Sightseeing/Activities in 3 Simple Steps</p>-->
						</div><!-- .box-content end -->
					</div><!-- .box-info box-service-1 end -->						
				</div><!-- .col-md-4 end -->
				<div class="col-md-2">						
					<div class="box-info box-service-1 mt-md-50">
						<div class="box-icon"> 
							<i class="fas fa-headset"></i>
						</div><!-- .box-icon end -->
						<div class="box-content">
							<h4><a href="javascript:;">Awarded as Top Tour Operator by Several Tourism Board's</a></h4>
							<!--<p>Book Flight, Hotel, Holiday and Sightseeing/Activities in 3 Simple Steps</p>-->
						</div><!-- .box-content end -->
					</div><!-- .box-info box-service-1 end -->						
				</div><!-- .col-md-4 end -->
			</div><!-- .row end -->
		</div><!-- .container end -->		
	</div><!-- .section-content end -->		
</div>

<div class="best_offer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="inner_best_offer">
					<h3 style="display:none;">Best Offers</h3>
					<ul class="nav nav-tabs custom_tabs" style="display:none;">
						<li class="active"><a  href="#alloffer" aria-controls="alloffer" role="tab" data-toggle="tab">All Offers</a></li>
						<li class=""><a href="#flight" aria-controls="flight" role="tab" data-toggle="tab">Flight</a></li>
						<!--<li class=""><a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab">Hotel</a></li>-->
					</ul>   
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="alloffer">
						    <div class="banner_offer">
								<!-- <img class="img-fluid" src="{!! asset('public/images/convenience_img.jpg') !!}" alt=""> -->
								<img src="https://24hr.lightmytrip.com/public/images/switzerlanddlp-homepage-banner-desktop.jpg" alt="">
							</div>
							<div class="swiper-container" >
								<div class="swiper-wrapper">
								<?php
								$today = date('Y-m-d');
								$coupondetails = \App\Coupon::whereDate('start_date','<=', $today)->whereDate('end_date','>=', $today)->where('status',1)->get();
								?>
								@foreach($coupondetails as $coupondetail)
								<?php
									$image = \App\MediaImage::where('id', $coupondetail->image)->first();
								?>
									<div class="swiper-slide">
										<div class="item">
											<div class="item-left">
												<img class="item-left-img" src="{!! asset('public/img/media_gallery/'.$image->images) !!}" alt="">
											</div>
											<div class="item-right"> 
												
												<h2 class="title">{{$coupondetail->coupon_name}}</h2>
												<p class="desc">{{$coupondetail->shortdescription}}</p>
												<div class="promocode_desc">
													<span class="promcde">Promocode</span>
													<span class="coupncde" id="{{$coupondetail->coupon_code}}">{{$coupondetail->coupon_code}}</span>
												</div>
												<!--<a href="#" class="coupon_btn"><i class="fa fa-arrow-right"></i></a>-->
											</div>
										</div>
									</div>
									@endforeach
									
								</div>										
							</div>
							<div class="swiper_button">
								<div class="swiper-button-prev"></div>
								<div class="swiper-button-next"></div>
							</div>	
						</div>
						<div role="tabpanel" class="tab-pane" id="flight">
							<div class="banner_offer">
								<img class="img-fluid" src="{!! asset('public/images/convenience_img.jpg') !!}" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Content
		============================================= -->
<section id="content">
	<div id="content-wrap">
		<!-- === Section Top Destinations =========== -->
		<div id="section-top-destintations" class="section-flat hidden">
			<div class="section-content">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="section-title">
								<h2><strong>Top</strong> Destinations</h2>
							</div><!-- .section-title end -->

						</div><!-- .col-md-6 end -->
					</div><!-- .row end -->
				</div><!-- .container end -->
				<div class="container">
					<div class="row">
						<div class="col-md-12">				
							<div class="slider-top-destinations">
								<ul class="slick-slider">
									<li>
										<div class="box-preview box-area-destination">
											<div class="box-img img-bg">
												<a href="javascript:;"><img src="{!! asset('public/images/img-2.jpg') !!}" alt=""></a>
												<div class="overlay">
													<div class="overlay-inner">
													</div><!-- .overlay-inner end -->
												</div><!-- .overlay end -->
											</div><!-- .box-img end -->
											<div class="box-content">
												<i class="fas fa-map-marker-alt"></i>
												<div class="title">
													<h5><a href="javascript:;">South America</a></h5>
													<h6>3 Tours</h6>
												</div><!-- .title end -->
											</div><!-- .box-content end -->
										</div><!-- .box-preview end -->
									</li>
									<li>
										<div class="box-preview box-area-destination">
											<div class="box-img img-bg">
												<a href="javascript:;"><img src="{!! asset('public/images/img-3.jpg') !!}" alt=""></a>
												<div class="overlay">
													<div class="overlay-inner">
													</div><!-- .overlay-inner end -->
												</div><!-- .overlay end -->
											</div><!-- .box-img end -->
											<div class="box-content">
												<i class="fas fa-map-marker-alt"></i>
												<div class="title">
													<h5><a href="javascript:;">Europe</a></h5>
													<h6>7 Tours</h6>
												</div><!-- .title end -->
											</div><!-- .box-content end -->
										</div><!-- .box-preview end -->
									</li>
									<li>
										<div class="box-preview box-area-destination">
											<div class="box-img img-bg">
												<a href="javascript:;"><img src="{!! asset('public/images/img-5.jpg') !!}" alt=""></a>
												<div class="overlay">
													<div class="overlay-inner">
													</div><!-- .overlay-inner end -->
												</div><!-- .overlay end -->
											</div><!-- .box-img end -->
											<div class="box-content">
												<i class="fas fa-map-marker-alt"></i>
												<div class="title">
													<h5><a href="javascript:;">Aisa</a></h5>
													<h6>2 Tours</h6>
												</div><!-- .title end -->
											</div><!-- .box-content end -->
										</div><!-- .box-preview end -->
									</li>
									<li>
										<div class="box-preview box-area-destination">
											<div class="box-img img-bg">
												<a href="javascript:;"><img src="{!! asset('public/images/img-6.jpg') !!}" alt=""></a>
												<div class="overlay">
													<div class="overlay-inner">
													</div><!-- .overlay-inner end -->
												</div><!-- .overlay end -->
											</div><!-- .box-img end -->
											<div class="box-content">
												<i class="fas fa-map-marker-alt"></i>
												<div class="title">
													<h5><a href="javascript:;">Africa</a></h5>
													<h6>5 Tours</h6>
												</div><!-- .title end -->
											</div><!-- .box-content end -->
										</div><!-- .box-preview end -->
									</li>
									<li>
										<div class="box-preview box-area-destination">
											<div class="box-img img-bg">
												<a href="javascript:;"><img src="{!! asset('public/images/img-4.jpg') !!}" alt=""></a>
												<div class="overlay">
													<div class="overlay-inner">
													</div><!-- .overlay-inner end -->
												</div><!-- .overlay end -->
											</div><!-- .box-img end -->
											<div class="box-content">
												<i class="fas fa-map-marker-alt"></i>
												<div class="title">
													<h5><a href="javascript:;">Australia</a></h5>
													<h6>6 Tours</h6>
												</div><!-- .title end -->
											</div><!-- .box-content end -->
										</div><!-- .box-preview end -->
									</li>
									<li>
										<div class="box-preview box-area-destination">
											<div class="box-img img-bg">
												<a href="javascript:;"><img src="{!! asset('public/images/img-2.jpg') !!}" alt=""></a>
												<div class="overlay">
													<div class="overlay-inner">
													</div><!-- .overlay-inner end -->
												</div><!-- .overlay end -->
											</div><!-- .box-img end -->
											<div class="box-content">
												<i class="fas fa-map-marker-alt"></i>
												<div class="title">
													<h5><a href="javascript:;">South America</a></h5>
													<h6>3 Tours</h6>
												</div><!-- .title end -->
											</div><!-- .box-content end -->
										</div><!-- .box-preview end -->
									</li>
									<li>
										<div class="box-preview box-area-destination">
											<div class="box-img img-bg">
												<a href="javascript:;"><img src="{!! asset('public/images/img-3.jpg') !!}" alt=""></a>
												<div class="overlay">
													<div class="overlay-inner">
													</div><!-- .overlay-inner end -->
												</div><!-- .overlay end -->
											</div><!-- .box-img end -->
											<div class="box-content">
												<i class="fas fa-map-marker-alt"></i>
												<div class="title">
													<h5><a href="javascript:;">Europe</a></h5>
													<h6>7 Tours</h6>
												</div><!-- .title end -->
											</div><!-- .box-content end -->
										</div><!-- .box-preview end -->
									</li>
								</ul><!-- .slick-slider end -->
								<div class="slick-arrows"></div><!-- .slick-arrows end -->
							</div><!-- .slider-top-destinations end -->
				
						</div><!-- .col-md-12 end -->
					</div><!-- .row end -->
				</div><!-- .container end -->
			</div><!-- .section-content end -->
		</div><!-- .section-flat end -->	
	</div><!-- #content-wrap -->
</section><!-- #content end -->


<style>
    .potimg{position: relative;}
    .potimg>img,.rgtlogo img,.resimg{max-width: 100%; max-height: 100%;}
    .txttop,.txtbottom{    position: absolute;
    
   
    left: 0;
    right: 0;
   }
.txttop{top: 0;}
.txtbottom{bottom: 0;}

    .topbx{display: flex; justify-content: space-between; position: relative; 
        padding: 20px;}
    .topbx::before,.txtbottom::before{position: absolute; content: ''; background: -webkit-linear-gradient(rgba(8,25,43,0), rgba(8,25,43,0.85)) top;
    background: linear-gradient(rgba(8,25,43,0), rgba(8,25,43,0.85)) top; left: 0; right: 0; 


    height: 124px;}

    .topbx::before{transform: rotate(180deg); top: 0;}
    .txtbottom{bottom: 0;}

    .lefttx,.rgtlogo,.leftbtm,.rightbtm{position: relative;}
    .dflx{display: flex; align-items: center; }
.dflx>span,.dflx>h6,.dflx>i,.lefttx>p,.leftbtm>span,.leftbtm>h6{color: #fff;}
.dflx>i{margin: 0px 10px; font-size: 13px;}
.dflx>span{font-size: 14px;}
.dflx>h6{margin-bottom: 0; font-size: 18px; font-weight: 600;}
.lefttx>p{font-size: 13px;}
.rgtlogo{    width: 50px;
    height: 50px;
    background:rgba(255,255,255,0.5);
    border-radius: 50%;
    text-align: center;     display: flex;
    align-items: center;
    justify-content: center;}
    .twobtm{display: flex; justify-content: space-between; align-items: center; padding: 20px;}
.leftbtm>span{font-size: 13px;}

.leftbtm>h6{margin-bottom: 0; font-weight: 600; font-size: 18px;} 
.leftbtm>h6>span{text-decoration: line-through; display: inline-block; margin-right: 5px;}
.btnflx{display: flex; align-items: center;    background: #e57f17;
    padding: 5px 15px; border-radius: 5px;}
    .btnflx>span{margin-right: 10px;}

.serps .slick-prev,.serps .slick-next{position: absolute;    top: 50%; background: #fff; border-radius: 50px;
    bottom: 0; transform: translate(-50%, -50%); z-index: 2;     text-indent: -99999px; color: royalblue !important;}
.serps .slick-prev{left: 0;}
.serps .slick-next{right: -80px;}

.serps .slick-prev:before,.serps .slick-next:before {
    position: absolute; 
    content: ''; 
    width: 25px;
    height: 25px;
    
    margin-top: 10px;
}
.serps .slick-prev:before{left:41px;  background: url(images/arw-l.png)no-repeat; background-size: contain;}
.serps .slick-next:before {right: 41px; background: url(images/arw-r.png)no-repeat; background-size: contain; }


.serps .responsivesld {overflow: hidden;}
.logoul>ul{display: flex; flex-wrap: wrap; justify-content: center; align-items: center; margin: 20px 0px;}
	.logoul>ul>li{width: 14%;     text-align: center;}
	.grabg{background: #e6e6e6; padding: 30px 30px  0px 30px;}
	.dcard{display: flex; justify-content: center; align-items: center;}
	.newsl_txt{padding-left: 60px; text-align: center;}
	.newsl_txt>h4{margin-bottom: 0; font-size: 30px; color: #838383;}
	.newsl_txt{font-size: 20px; color: #000;}
	.newsltr{display: flex;
    width: 85%;
    justify-content: center;
    margin: auto;}
	.newsltr input{border: 1px solid #999999; margin-right: 10px; color: #000;}
	.newsltr input,.newsltr button{border-radius: 3px;}
	.newsltr button{background: #060181; font-size: 15px; color: #fff;}
	.newsl_txt>p{    font-size: 18px;
    color: #000; margin-bottom: 15px;}
	.mt10{margin-top: 15px;}
	.imgres{max-width: 100%; max-height: 100%;}
	.imgdown{display: flex;}
</style>
<script>
  $(document).ready(function(){
    $('.responsivesld').slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
  })
</script>

<section class="slidefrm">
   
   
    <div id="section-international-packages" class="section-flat section-popular-packages">
        <section class="section_content recommended_international_tour common_recommend_slider serps">
            <div class="container"> 
                <div class="row"> 
                    <div class="col-md-12">
                        <div class="section-title cus_sec_title">
                            <h2><strong>Cheap Flight Deals</strong><img src="images/check.png" class="imgres"></h2>
                            
                        </div>
                      <div class="responsivesld">
                          <div >
                              <a href="#">
                             <div class="potimg">
<img src="https://24hr.lightmytrip.com/public/images/imgt1.jpg">
<div class="txttop">

   
<div class="topbx">
    <div class="lefttx">
        <div class="dflx">
            <span>Logas</span><i class="fa fa-arrow-right"></i><h6>London</h6>
        </div>

<p>Feb 2, 2022 - Feb 8, 2022</p>

    </div>

    <div class="rgtlogo">
        <img src="https://24hr.lightmytrip.com/public/images/logo.png">
    </div>
</div>
</div>


<div class="txtbottom">
        <div class="twobtm">
            <div class="leftbtm">
                <span>Pay Now</span>
                <h6><span>N</span>500,187</h6>
            </div>
            <div class="rightbtm">
               <div class="btnflx">
                <span>
                    <img src="https://24hr.lightmytrip.com/public/images/money.png" class="resimg">
                </span>
               <div class="leftbtm">
                <span>Look this fare</span>
                <h6><span>N</span>140,052</h6>
               </div>
               </div>

            </div>
        </div>
</div>

                                </div></a>
                          </div>

                          <div >
                            <a href="#">
                           <div class="potimg">
<img src="https://24hr.lightmytrip.com/public/images/imgt1.jpg">
<div class="txttop">

 
<div class="topbx">
  <div class="lefttx">
      <div class="dflx">
          <span>Logas</span><i class="fa fa-arrow-right"></i><h6>London</h6>
      </div>

<p>Feb 2, 2022 - Feb 8, 2022</p>

  </div>

  <div class="rgtlogo">
      <img src="https://24hr.lightmytrip.com/public/images/logo.png">
  </div>
</div>
</div>


<div class="txtbottom">
      <div class="twobtm">
          <div class="leftbtm">
              <span>Pay Now</span>
              <h6><span>N</span>500,187</h6>
          </div>
          <div class="rightbtm">
             <div class="btnflx">
              <span>
                  <img src="https://24hr.lightmytrip.com/public/images/money.png" class="resimg">
              </span>
             <div class="leftbtm">
              <span>Look this fare</span>
              <h6><span>N</span>140,052</h6>
             </div>
             </div>

          </div>
      </div>
</div>

                              </div></a>
                        </div>

                        <div >
                            <a href="#">
                           <div class="potimg">
<img src="https://24hr.lightmytrip.com/public/images/imgt1.jpg">
<div class="txttop">

 
<div class="topbx">
  <div class="lefttx">
      <div class="dflx">
          <span>Logas</span><i class="fa fa-arrow-right"></i><h6>London</h6>
      </div>

<p>Feb 2, 2022 - Feb 8, 2022</p>

  </div>

  <div class="rgtlogo">
      <img src="https://24hr.lightmytrip.com/public/images/logo.png">
  </div>
</div>
</div>


<div class="txtbottom">
      <div class="twobtm">
          <div class="leftbtm">
              <span>Pay Now</span>
              <h6><span>N</span>500,187</h6>
          </div>
          <div class="rightbtm">
             <div class="btnflx">
              <span>
                  <img src="https://24hr.lightmytrip.com/public/images/money.png" class="resimg">
              </span>
             <div class="leftbtm">
              <span>Look this fare</span>
              <h6><span>N</span>140,052</h6>
             </div>
             </div>

          </div>
      </div>
</div>

                              </div></a>
                        </div>

                        <div >
                            <a href="#">
                           <div class="potimg">
<img src="https://24hr.lightmytrip.com/public/images/imgt1.jpg">
<div class="txttop">

 
<div class="topbx">
  <div class="lefttx">
      <div class="dflx">
          <span>Logas</span><i class="fa fa-arrow-right"></i><h6>London</h6>
      </div>

<p>Feb 2, 2022 - Feb 8, 2022</p>

  </div>

  <div class="rgtlogo">
      <img src="https://24hr.lightmytrip.com/public/images/logo.png">
  </div>
</div>
</div>


<div class="txtbottom">
      <div class="twobtm">
          <div class="leftbtm">
              <span>Pay Now</span>
              <h6><span>N</span>500,187</h6>
          </div>
          <div class="rightbtm">
             <div class="btnflx">
              <span>
                  <img src="https://24hr.lightmytrip.com/public/images/money.png" class="resimg">
              </span>
             <div class="leftbtm">
              <span>Look this fare</span>
              <h6><span>N</span>140,052</h6>
             </div>
             </div>

          </div>
      </div>
</div>

                              </div></a>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                </div>	
            </div>	
        </section>
    </div>

</section>
<br>
<section class="slidefrm">
   
   
    <div id="section-international-packages" class="section-flat section-popular-packages">
        <section class="section_content recommended_international_tour common_recommend_slider serps">
            <div class="container"> 
                <div class="row"> 
                    <div class="col-md-12">
                        <div class="section-title cus_sec_title">
                            <h2>Amazing <strong>Hotel Deals</strong></h2>
                            
                        </div>
                      <div class="responsivesld">
                          <div >
                              <a href="#">
                             <div class="potimg">
<img src="https://24hr.lightmytrip.com/public/images/imgt2.jpg">



<div class="txtbottom">
        <div class="twobtm">
            <div class="leftbtm">
               
                <h6>Dubai</h6>
                <span>315 Hotels</span>
            </div>
           
        </div>
</div>

                                </div></a>
                          </div>
                          <div >
                            <a href="#">
                           <div class="potimg">
<img src="https://24hr.lightmytrip.com/public/images/imgt2.jpg">



<div class="txtbottom">
      <div class="twobtm">
          <div class="leftbtm">
             
              <h6>Dubai</h6>
              <span>315 Hotels</span>
          </div>
         
      </div>
</div>

                              </div></a>
                        </div>

                        <div >
                            <a href="#">
                           <div class="potimg">
<img src="https://24hr.lightmytrip.com/public/images/imgt2.jpg">



<div class="txtbottom">
      <div class="twobtm">
          <div class="leftbtm">
             
              <h6>Dubai</h6>
              <span>315 Hotels</span>
          </div>
         
      </div>
</div>

                              </div></a>
                        </div>

                        <div >
                            <a href="#">
                           <div class="potimg">
<img src="https://24hr.lightmytrip.com/public/images/imgt2.jpg">



<div class="txtbottom">
      <div class="twobtm">
          <div class="leftbtm">
             
              <h6>Dubai</h6>
              <span>315 Hotels</span>
          </div>
         
      </div>
</div>

                              </div></a>
                        </div>
                        
                      </div>
                    </div>
                    <div class="clearfix"></div>
                </div>	
            </div>	
        </section>
    </div>

</section>


<!-- <div class="container">
	<div class="logoul">
		<ul>
			<li><a href="#"></a><img src="images/c1.jpg" class="imgres" /></li>
			<li><a href="#"></a><img src="images/c2.jpg" class="imgres" /></li>
			<li><a href="#"></a><img src="images/c3.jpg" class="imgres" /></li>
			<li><a href="#"></a><img src="images/c4.jpg" class="imgres" /></li>
			<li><a href="#"></a><img src="images/c5.jpg" class="imgres" /></li>
			<li><a href="#"></a><img src="images/c3.jpg" class="imgres" /></li>
			<li><a href="#"></a><img src="images/c7.jpg" class="imgres" /></li>
			<li><a href="#"></a><img src="images/c8.jpg" class="imgres" /></li>
			<li><a href="#"></a><img src="images/c9.jpg" class="imgres" /></li>
		</ul>
	</div>
</div> -->
<br><br>
<div class="grabg">
	<div class="container">
<div class="dcard">
	<div class="imgdcart">
		<img src="images/imgg.jpg" class="imgres">
	</div>
	<div class="newsl_txt">
		<h4>Download our mobile app</h4>
		<p>Enter your email below to download our amazing app</p>

		<div class="newsltr">
			<input type="text" placeholder="Enter your email">
			<button type="submit">Send</button>
		</div>
		<p class="mt10">or download it right away</p>

		<div class="imgdown">
			<a href="#">
				<img src="images/g.png" class="imgres"/>
			</a>
			<a href="#">
				<img src="images/a.png" class="imgres"/>
			</a>
		</div>

	</div>
</div>
	</div>
</div>










<section class="why_booking-area pb-50 pt-70 mt-20">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="why_booking-text mb-15">
					<h4>Why Travel24hr.com?</h4>
					<p>One of the leaders in the Indian travel industry, Travel24hr.com is the go-to platform for your travel needs. Find the best online flight tickets booking and hotel booking deals, and save money every time you hit the road for business or leisure.<span class="dots" id="dots">...</span><span class="more" id="more"> Visit the website, or download the iOS or Android Travel24hr.com travel app to book on-the-go. Registration Reward, HEG Coupon, exclusive coupons for air ticket and hotel discounts, user-friendly interface and secure payments channel will help you enjoy a seamless cheap flights and hotels booking experience.</span></p>
					<button onclick="myFunction(1)" id="myBtn"><i class='fa fa-plus'></i> Read more</button>
				</div>
			</div>
			<div class="col-sm-4"> 
				<div class="why_booking-text mb-15">
					<h4>Flight Booking with Travel24hr.com?</h4>
					<p>In a short span, Travel24hr.com has become a frontrunner in the online flight booking space. On a daily basis, thousands of travellers book cheap airline tickets with Travel24hr.com and score the lowest airfares in India. The success of Travel24hr.com in the<span class="dots" id="dots1">...</span><span class="more" id="more1"> flight booking industry does not only stem from its unbelievable deals and offers on international and domestic air tickets, but also the convenience of online booking. If you are planning to travel soon, then give Travel24hr.com a shot and immerse yourself in a flight booking experience that stands out.</span></p>
					<button onclick="myFunction(2)" id="myBtn1"><i class='fa fa-plus'></i> Read more</button>
				</div>  
			</div>  
			<div class="col-sm-4"> 
				<div class="why_booking-text mb-15">
					<h4>Hotel Booking with Travel24hr.com?</h4>
					<p>Stop spending hours on the internet, scouting the best hotel booking offer, and visit Travel24hr.com for guaranteed best prices for hotel rooms. From budget to luxury, choose the hotel category that suits you the best and pick your accommodation<span class="dots" id="dots2">...</span><span class="more" id="more2"> from an array of options. Whether you are going on an adventure trip or heading out on business, Travel24hr.com has the perfect hotel for you. So, what are you waiting for? Book now!</span></p>
					<button onclick="myFunction(3)" id="myBtn2"><i class='fa fa-plus'></i> Read more</button>
				</div>
			</div>
		</div> 
	</div>
</section>
<section class="subscribe-area pb-50 pt-70">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="subscribe-text mb-15">
					<span>Coupons, Special Offers and Promotions.</span>
					<h2>Sign up for Exclusive Offers</h2>
				</div>
			</div>
			<div class="col-md-6">
				<div class="subscribe-wrapper subscribe2-wrapper mb-15">
					<div class="subscribe-form">
						<form action="#">
							<input placeholder="Enter your email address" type="email">
							<button>subscribe <i class="fas fa-long-arrow-alt-right"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div> 
</section>
<div class="mob_sticky_menu"> 
	<div class="container">
		<div class="row"> 
			<ul>
				<li><a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Home</a></li>
				@if(Auth::user())
				<li><a href="{{URL::to('/my-profile')}}" class=""><i class="fa fa-user"></i> My Account</a></li>
				@else
					<li><a href="#" class="popup-btn-login"><i class="fa fa-user"></i> My Account</a></li>
				@endif
				@if(Auth::user())
				<li><a href="{{URL::to('/user')}}"><i class="fa fa-calendar"></i> My Booking</a></li>
			@else
				<li><a href="#"><i class="fa fa-calendar"></i> My Booking</a></li>
			@endif
			</ul>
		</div> 
	</div> 
</div> 
@endsection 