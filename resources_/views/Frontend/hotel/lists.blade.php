@extends('layouts.frontend')
@section('title', 'Hotel')
@section('content')
<style>
	#country-list {
		float: left;
		list-style: none;
		margin-top: -3px;
		padding: 0;
		width: 100%;
		position: absolute;
	}

	#country-list li {
		padding: 10px;
		background: #fff;
		border-bottom: #bbb9b9 1px solid;
	}

	.hotel-location_search .hotel_is_search_from_val li {
		cursor: pointer;
	}

	.hotel-location_search .hotel_is_search_from_val li:hover {
		background: #f2f2f2;
		cursor: pointer;
		border-left: 4px solid #89ad3e;
	}

	.hotel-location_search .hotel_is_search_from_val li {
		border-left: 4px solid #fff;
	}

	.nationality_option select {
		width: 250px;
		float: right;
		margin-bottom: 6px;
		border-radius: 0px;
		padding: 12px 10px;
		font-size: 16px;
		height: auto;
	}
</style>


<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js"></script>


<script>
	$(document).ready(function() {

		$(function() {
			$('input[name="datetimes"]').daterangepicker({
				timePicker: false,
				autoApply: true,
				startDate: moment().startOf('hour'),
				endDate: moment().startOf('hour').add(32, 'hour'),
				locale: {
					format: 'DD/MM/YYYY'
				}
			});
		});

		$('.responsivesld').slick({
			dots: false,
			infinite: false,
			speed: 300,
			slidesToShow: 3,
			slidesToScroll: 3,
			responsive: [{
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
	});
</script>

<style>
.chnghtl .search_field form .cus_calendar_field.form-group input.form-control,
.chnghtl form .goings input.form-control,
.chnghtl form .form-group input.form-control,
.chnghtl .search_field .cus_searchbtn_field button {
    height: 90px;    border-radius: 5px;
    padding: 10px 10px 10px 10px; font-weight: bold;
}
.flxhotel{column-gap: 10px;}
.chnghtl .search_field form .cus_calendar_field.form-group input.form-control,
.chnghtl form .goings input.form-control,
.chnghtl form .form-group input.form-control{ padding: 22px 10px 10px 55px;}
.search_field .cus_calendar_field sub, .search_field .goings sub,.chnghtl .search_field .cus_passenger_field .select_guest span.search-label {
    position: absolute;
    top: 28px;
    bottom: auto;
    left: 55px;
    color: #818285;
    font-size: 13px;
}
.chnghtl .search_field .cus_passenger_field .select_guest span.search-label {top: 22px;}
.htltr{    position: absolute;
    left: 21px;
    font-size: 17px;
    top: 26px;
    color: #bdbaba; z-index: 1;}
	.banner-parallax{background: none;}
.chnghtl input:focus, .chnghtl input.form-control:focus, .chnghtl textarea:focus, .chnghtl textarea.form-control:focus, .chnghtl select:focus, .chnghtl select.form-control:focus{background: initial !important;}
.chnghtl .search_field .cus_passenger_field .select_guest {
	top: 0;
    height: 90px;
    border-radius: 5px;
    padding: 22px 10px 10px 55px;
}
.search_field .cus_passenger_field .select_guest span.guests_selected{padding: 18px 0px 5px; font-weight: 600; color: #000;}
.arrowb1 {
    top: 88px;
}
#search-box, .chnghtl .cus_calendar_field .form-control:focus {background: #fff !important;}
.loc_search_field .location_search, .loc_search_field_to .location_search_to, .loc_search_field .hotel-location_search{top: 89px;}

.chnghtl .search_field .cus_searchbtn_field button{padding: 20px 30px;}
</style>

<section id="banner">
	<div class="slide-content">

		<div id="myCarousel" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="{{asset('images/hotelbanner.png')}}" class=deskslider_img alt="">
					<img src="{{asset('images/hotelbanner-small.png')}}" class="mobileslider_img" alt="">
				</div>

				<div class="item">
					<img src="{{asset('images/hotelbanner.png')}}" class=deskslider_img alt="">
					<img src="{{asset('images/hotelbanner-small.png')}}" class="mobileslider_img" alt="">
				</div>

				<div class="item">
					<img src="{{asset('images/hotelbanner.png')}}" class=deskslider_img alt="">
					<img src="{{asset('images/hotelbanner-small.png')}}" class="mobileslider_img" alt="">
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

		<div class="bgblu mb-20 cnghotel_src">
			<div class="banner-center-box">
				<ul class="plani-icon">
					<li><a href="{{route('home')}}"><i class="fa fa-plane"></i> FLIGHTS</a></li>
					<li><a href="{{route('hotel.index')}}" class="actv"><i class="fa fa-bed"></i> HOTELS</a></li>
					<li><a href="{{route('holiday.index')}}"><i class="fa fa-umbrella-beach"></i> holiday</a></li>
				</ul>

				<div class="banner-reservation-tabs custom_reservation_tab">
					<div class="banner-parallax">


						<div class="slide-content">
							<div class="containerxs">

								<div class="hotel_search chnghtl">
									<!--<h4>Find deals on hotels, homes, and much more...</h4>
							<p>From cozy country homes to funky city apartments</p>-->
									<div class="nationality_option">
										<?php
										$countries1 = json_decode($countries);
										?>
										<select class="form-control" id="nationality" name="nationality" style="display: none;">
											<?php
											foreach ($countries1 as $countr) {
											?>
												<option <?php if ($countr->code == 'IN') {
															echo 'selected';
														} ?> value="<?php echo $countr->code; ?>"><?php echo $countr->name; ?></option>
											<?php
											}
											?>
										</select>
									</div>
									<div class="clearfix"></div>
									<div class="search_field">
										<form class="search_form d-flex flxhotel">
											<div class="form-group loc_search_field cus_loc_field goings ">
												<span class="htltr"><i class="fa fa-bed"></i></span>
												<sub>Going to?</sub>
												<input autocomplete="off" type="text" class="hotel-roundwayfrom form-control hotel-wrapper-dropdown-2" placeholder="Where are you going?" id="search-box" name="location" value="" />
											
												<div class="hotel-location_search selhide widthfull" id="hotel-location_search">
													<div class="inner_loc_search">
														<div class="top_city">
															<span>Popular destinations nearby</span>
														</div>
														<ul class="hotel_is_search_from_val">
															@foreach(\App\HotelCity::where('is_top','1')->orderby('priority','ASC')->get() as $alist)
															<?php
															$HotelCountry = \App\HotelCountry::where('country_code_1', $alist->country_code)->first();
															?>
															<input type="hidden" name="cityid" value="" id="cityid">
															<li roundwayfromtops="{{$alist->city_code}}, {{$alist->country_code}}" roundwayfromtop="{{$alist->name}}, {{$HotelCountry->name}}" roundwayfrom="{{$alist->name}}">
																<div class="fli_name"><i class="fa fa-map-marker-alt"></i> {{$alist->name}}</div>
																<div class="airport_name">{{$HotelCountry->name}}</div>
															</li>
															@endforeach
														</ul>
													</div>
												</div>
											</div>

											<input id="txtCity" name="txtCity" value="" style="display:none" type="text" class="input_htl_lo validate[required] minSize[3]" autocomplete="off" aria-autocomplete="list" onclick="loadCity();" />
											<div class="form-group cus_calendar_field">
											<span class="htltr"><i class="fa fa-calendar"></i></span>
												<!-- <input autocomplete="off" type="text" name="brTimeStart" value="" class="form-control" id="hoteldatepicker-time-start" placeholder="2019/09/30"> -->
												<!-- <input type="text" name="daterange" class="form-control" value="01/01/2018 - 01/15/2018" /> -->

												<input type="text" class="form-control" name="datetimes" />
												<sub>Check in - Check out</sub>
											
											</div><!-- .form-group end -->


											<!-- <div class="form-group cus_calendar_field">
										<input autocomplete="off" type="text" name="brTimeEnd" value="" class="form-control" id="hoteldatepicker-time-end" placeholder="2019/09/30">
										
										<sub>Check-out</sub> 
										<i class="far fa-calendar"></i>
									</div> -->

											<!-- .form-group end -->
											<div class="form-group cus_passenger_field">
											<span class="htltr"><i class="fa fa-user"></i></span>
												<input autocomplete="off" readonly type="text" id="guest" name="guest" class="form-control show-dropdown-passengers roundpessanger" placeholder="" value="">
												<div class="select_guest">
													<span class="search-label">Rooms/Guests </span>
													<span class="guests_selected"><span id="guestcount">1</span> Person in <span id="guestroom">2</span> Room</span>
												</div>
											
												<div class="list-dropdown-passengers arrowb1">
													<div class="list-persons-count">
														<div id="roomshtml">
															<div class="box" id="divroom1">
																<div class="roomTxt"><span id="RoomNumer1">Room 1:</span></div>
																<div class="left pull-left">
																	<span class="txt">
																		<span id="Label7">Adult <em>(Above 12 years)</em></span>
																	</span>
																</div>
																<div class="right pull-right">
																	<div id="field1" class="PlusMinusRow">
																		<a class="decrease-btn hoteladultclass" href="javascript:;">-</a>
																		<span id="Adults_room_1_1" class="PlusMinus_number">4</span>
																		<a class="increase-btn hoteladultclass" href="javascript:;">+</a>
																	</div>
																</div>
																<div class="spacer"></div>
																<div class="left pull-left">
																	<span class="txt">
																		<span id="Label9">Child <em>(Below 12 years)</em></span>
																	</span>
																</div>
																<div class="right pull-right">
																	<div id="field2" class="PlusMinusRow">
																		<a class="decrease-btn hotelchildclass" href="javascript:;">-</a>
																		<span id="Children_room_1_1" class="PlusMinus_number">2</span>
																		<a class="increase-btn hotelchildclass" href="javascript:;">+</a>
																	</div>
																</div>
																<div class="clearfix"></div>
																<div class="child_age">
																	<span>Age(s) of Children</span>
																	<select id="Child_Age_1_1" style="display: inline;">
																		<option option="selected">1</option>
																		<option>1</option>
																		<option>2</option>
																		<option>3</option>
																		<option>4</option>
																		<option>5</option>
																		<option>6</option>
																		<option>7</option>
																		<option>8</option>
																		<option>9</option>
																		<option>10</option>
																		<option>11</option>
																	</select>
																	<select id="Child_Age_1_2" style="display: inline;">
																		<option option="selected">1</option>
																		<option>1</option>
																		<option>2</option>
																		<option>3</option>
																		<option>4</option>
																		<option>5</option>
																		<option>6</option>
																		<option>7</option>
																		<option>8</option>
																		<option>9</option>
																		<option>10</option>
																		<option>11</option>
																	</select>
																</div>
															</div>
														</div>
														<a id="addhotelRoom" href="javascript:;" class="cus_add_remove_btn addroom"><i class="fa fa-plus mr6"></i>Add Room</a>
														<a id="removehotelRoom" href="javascript:;" class="cus_add_remove_btn removeroom" style="display: none;"><i class="fa fa-trash mr6"></i>Room</a>
														<a class="btn-reservation-passengers btn x-small colorful hover-dark" href="javascript:;">Done</a>

														<div class="clearfix"></div>
														<input type="hidden" id="hdnroom" value="1">
													</div><!-- .list-persons-count end -->
												</div><!-- .list-dropdown-passengers end -->
											</div><!-- .form-group end -->
											<div class="form-group cus_searchbtn_field">
												<button onclick="HotelSearch();" type="button" class="form-control icon alcntr"><i class="fas fa-search"></i> Search</button>
											</div>
											<div class="clearfix"></div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>




</section>

</section>
</div>

<!-- Content
		============================================= -->


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
											<a data-toggle="collapse" data-parent="#accordion" aria-expanded="true" href="#PRICE" aria-expanded="true">
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
											<a data-toggle="collapse" data-parent="#accordion" aria-expanded="true" href="#Popularfilters" aria-expanded="true">
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
														<label for="Swimmingpool1" class="label-container checkbox-default">Swimming
															pool
															<input name="Swimmingpool" class="flightfilter" id="Swimmingpool1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc"> 14 </span>
													</li>
													<li>
														<label for="Verygoodrating1" class="label-container checkbox-default">Very good
															rating
															<input name="Verygoodrating" class="Verygoodrating" id="Verygoodrating1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">248</span>
													</li>

													<li>
														<label for="Beachfront1" class="label-container checkbox-default">Beachfront
															<input name="Beachfront" class="flightfilter" id="Beachfront1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">1</span>
													</li>

													<li>
														<label for="Centrallylocated1" class="label-container checkbox-default">Centrally
															located
															<input name="Centrallylocated" class="flightfilter" id="Centrallylocated1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">512</span>
													</li>

													<li>
														<label for="Hidesoldout1" class="label-container checkbox-default">Hide sold
															out
															<input name="Hidesoldout1" class="flightfilter" id="Hidesoldout1" type="checkbox" value="1">
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
											<a data-toggle="collapse" data-parent="#accordion" href="#Stars" aria-expanded="true" aria-expanded="true">
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
														<label for="star1" class="label-container checkbox-default">
															<div class="startbx">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
															<input name="star" class="flightfilter" id="star1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc"> 56 </span>
													</li>

													<li>
														<label for="star2" class="label-container checkbox-default">
															<div class="startbx">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
															<input name="star" class="flightfilter" id="star2" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">314</span>
													</li>
													<li>
														<label for="star3" class="label-container checkbox-default">
															<div class="startbx">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
															<input name="star" class="flightfilter" id="star3" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">591</span>
													</li>

													<li>
														<label for="star4" class="label-container checkbox-default">
															<div class="startbx">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
															<input name="star" class="flightfilter" id="star4" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">119</span>
													</li>

													<li>
														<label for="star5" class="label-container checkbox-default">
															<div class="startbx">
																<i class="fa fa-star"></i>
															</div>
															<input name="star" class="flightfilter" id="star5" type="checkbox" value="1">
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
											<a data-toggle="collapse" data-parent="#accordion" href="#Hotelrating" aria-expanded="true">
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
														<label for="Excellent1" class="label-container checkbox-default">Excellent
															<input name="Excellent" class="flightfilter" id="Excellent1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">172</span>
													</li>
													<li>
														<label for="Verygood1" class="label-container checkbox-default">Very good
															<input name="Verygood" class="Verygoodrating" id="Verygood1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">246</span>
													</li>

													<li>
														<label for="Good1" class="label-container checkbox-default">Good
															<input name="Good" class="flightfilter" id="Good1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">188</span>
													</li>

													<li>
														<label for="Fair1" class="label-container checkbox-default">Fair
															<input name="Fair" class="flightfilter" id="Fair1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">90</span>
													</li>

													<li>
														<label for="Poor1" class="label-container checkbox-default">Poor
															<input name="Poor" class="flightfilter" id="Poor1" type="checkbox" value="1">
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
											<a data-toggle="collapse" data-parent="#accordion" href="#Facilities" aria-expanded="true">
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
														<label for="24hourfrontdesk1" class="label-container checkbox-default">24-hour
															front desk
															<input name="24hourfrontdesk" class="flightfilter" id="24hourfrontdesk1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">918</span>
													</li>
													<li>
														<label for="24hourroomservice1" class="label-container checkbox-default">24-hour
															room service
															<input name="24hourroomservice" class="Verygoodrating" id="24hourroomservice1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">0</span>
													</li>

													<li>
														<label for="Airconditioning1" class="label-container checkbox-default">Air
															conditioning
															<input name="Airconditioning" class="flightfilter" id="Airconditioning1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">33</span>
													</li>

													<li>
														<label for="Beachnearby1" class="label-container checkbox-default">Beach
															nearby
															<input name="Beachnearby" class="flightfilter" id="Beachnearby1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">1</span>
													</li>

													<li>
														<label for="Carparking1" class="label-container checkbox-default">Car parking
															<input name="Carparking" class="flightfilter" id="Carparking1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">241</span>
													</li>

													<li>
														<label for="Facilitiesfordisabled1" class="label-container checkbox-default">Facilities
															for disabled
															<input name="Facilitiesfordisabled" class="flightfilter" id="Facilitiesfordisabled1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">631</span>
													</li>

													<li>
														<label for="Fitnesscenter1" class="label-container checkbox-default">Fitness
															center
															<input name="Fitnesscenter" class="flightfilter" id="Fitnesscenter1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">170</span>
													</li>

													<li>
														<label for="Freecarparking1" class="label-container checkbox-default">Free car
															parking
															<input name="Freecarparking" class="flightfilter" id="Freecarparking1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">18</span>
													</li>


													<li>
														<label for="Freewifi1" class="label-container checkbox-default">Free wifi
															<input name="Freewifi" class="flightfilter" id="Freewifi1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">993</span>
													</li>

													<li>
														<label for="Kitchen1" class="label-container checkbox-default">Kitchen
															<input name="Kitchen" class="flightfilter" id="Kitchen1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">3</span>
													</li>

													<li>
														<label for="Nonsmokingrooms1" class="label-container checkbox-default">Non smoking
															rooms
															<input name="Nonsmokingrooms" class="flightfilter" id="Nonsmokingrooms1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">40</span>
													</li>

													<li>
														<label for="Petsallowed1" class="label-container checkbox-default">Pets
															allowed
															<input name="Petsallowed" class="flightfilter" id="Petsallowed1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">17</span>
													</li>

													<li>
														<label for="Roomservice1" class="label-container checkbox-default">Room
															service
															<input name="Roomservice" class="flightfilter" id="Roomservice1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">16</span>
													</li>

													<li>
														<label for="Areashuttle1" class="label-container checkbox-default">Area
															shuttle
															<input name="Areashuttle" class="flightfilter" id="Areashuttle1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">45</span>
													</li>

													<li>
														<label for="Smokingrooms1" class="label-container checkbox-default">Smoking
															rooms
															<input name="Smokingrooms" class="flightfilter" id="Smokingrooms1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">0</span>
													</li>

													<li>
														<label for="Spacenter1" class="label-container checkbox-default">Spa center
															<input name="Spacenter" class="flightfilter" id="Spacenter1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">0</span>
													</li>

													<li>
														<label for="Swimmingpool1" class="label-container checkbox-default">Swimming
															pool
															<input name="Swimmingpool" class="flightfilter" id="Swimmingpool" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">14</span>
													</li>

													<li>
														<label for="Wifi1" class="label-container checkbox-default">Wifi
															<input name="Wifi" class="flightfilter" id="Wifi1" type="checkbox" value="1">
															<span class="checkmark"></span>
														</label>
														<span class="lsprc">95</span>
													</li>

													<li>
														<label for="Covid19HygieneProtocols1" class="label-container checkbox-default">Covid-19
															Hygiene Protocols
															<input name="Covid19HygieneProtocols" class="flightfilter" id="Covid19HygieneProtocols1" type="checkbox" value="1">
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
										<a href="#">Book Now<i class="fa fa-angle-right ml5" aria-hidden="true"></i></a>
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
										<a href="#">Book Now<i class="fa fa-angle-right ml5" aria-hidden="true"></i></a>
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
	$(document).ready(function() {
		$('.airlist').slick({
			dots: false,
			infinite: false,
			speed: 300,
			slidesToShow: 6,
			slidesToScroll: 3,
			responsive: [{
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

		$("#aplybtn").click(function() {
			$(".filterbx").hide();
		});
		$(".mobile-filter>ul>li").click(function() {
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
		var getQueryString = function(parameter) {
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

			slide: function(event, ui) {

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

	$(document).ready(function() {
		$("#cvd_btn").click(function() {
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
@endsection
@section('scripts')
<script src="{{URL::asset('public/js/Frontend/scripthotel.js')}}"></script>
<script>
	function selectCountry(val) {
		$("#search-box").val(val);
		$("#txtCity").val(val);
		$("#suggesstion-box").hide();
	}
	$(document).ready(function() {

		$("#search-box").keyup(function() {
			$.ajax({
				type: "GET",
				url: "{{URL::to('/hotel-cities')}}",
				data: 'keyword=' + $(this).val(),
				beforeSend: function() {
					$("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
				},
				success: function(data) {
					$("#suggesstion-box").show();
					$("#suggesstion-box").html(data);
					$("#search-box").css("background", "#FFF");
				}
			});
		});

		var itemsMainDiv = ('.MultiCarousel');
		var itemsDiv = ('.MultiCarousel-inner');
		var itemWidth = "";

		$('.leftLst, .rightLst').click(function() {
			var condition = $(this).hasClass("leftLst");
			if (condition)
				click(0, this);
			else
				click(1, this)
		});

		ResCarouselSize();

		$(window).resize(function() {
			ResCarouselSize();
		});

		//this function define the size of the items
		function ResCarouselSize() {
			var incno = 0;
			var dataItems = ("data-items");
			var itemClass = ('.item');
			var id = 0;
			var btnParentSb = '';
			var itemsSplit = '';
			var sampwidth = $(itemsMainDiv).width();
			var bodyWidth = $('body').width();
			$(itemsDiv).each(function() {
				id = id + 1;
				var itemNumbers = $(this).find(itemClass).length;
				btnParentSb = $(this).parent().attr(dataItems);
				itemsSplit = btnParentSb.split(',');
				$(this).parent().attr("id", "MultiCarousel" + id);


				if (bodyWidth >= 1200) {
					incno = itemsSplit[3];
					itemWidth = sampwidth / incno;
				} else if (bodyWidth >= 992) {
					incno = itemsSplit[2];
					itemWidth = sampwidth / incno;
				} else if (bodyWidth >= 768) {
					incno = itemsSplit[1];
					itemWidth = sampwidth / incno;
				} else {
					incno = itemsSplit[0];
					itemWidth = sampwidth / incno;
				}
				$(this).css({
					'transform': 'translateX(0px)',
					'width': itemWidth * itemNumbers
				});
				$(this).find(itemClass).each(function() {
					$(this).outerWidth(itemWidth);
				});

				$(".leftLst").addClass("over");
				$(".rightLst").removeClass("over");

			});
		}


		//this function used to move the items
		function ResCarousel(e, el, s) {
			var leftBtn = ('.leftLst');
			var rightBtn = ('.rightLst');
			var translateXval = '';
			var divStyle = $(el + ' ' + itemsDiv).css('transform');
			var values = divStyle.match(/-?[\d\.]+/g);
			var xds = Math.abs(values[4]);
			if (e == 0) {
				translateXval = parseInt(xds) - parseInt(itemWidth * s);
				$(el + ' ' + rightBtn).removeClass("over");

				if (translateXval <= itemWidth / 2) {
					translateXval = 0;
					$(el + ' ' + leftBtn).addClass("over");
				}
			} else if (e == 1) {
				var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
				translateXval = parseInt(xds) + parseInt(itemWidth * s);
				$(el + ' ' + leftBtn).removeClass("over");

				if (translateXval >= itemsCondition - itemWidth / 2) {
					translateXval = itemsCondition;
					$(el + ' ' + rightBtn).addClass("over");
				}
			}
			$(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
		}

		//It is used to get some elements from btn
		function click(ell, ee) {
			var Parent = "#" + $(ee).parent().attr("id");
			var slide = $(Parent).attr("data-slide");
			ResCarousel(ell, Parent, slide);
		}



		var selhotel = $('.hotel-wrapper-dropdown-2'),
			txtroundhotel = $('.hotel-roundwayfrom'),
			optionshotel = $('.hotel-location_search');
		selhotel.click(function(e) {
			e.stopPropagation();
			optionshotel.show();
		});
		$('body').click(function(e) {
			optionshotel.hide();
		});
		$(document).delegate('.hotel_is_search_from_val li', 'click', function(e) {
			e.stopPropagation();
			txtroundhotel.val($(this).attr('roundwayfromtop'));
			$('#txtCity').val($(this).attr('roundwayfrom'));
			$(this).addClass('selected').siblings('li').removeClass('selected');
			optionshotel.hide();
			txtroundhotel.blur();
			$('#hoteldatepicker-time-start').focus();
		});


		var typingTimerhotel; //timer identifier
		var doneTypingIntervalhotel = 5000;
		var minlength = 3;
		$('.loc_search_field input[name="location"]').on("keyup", function() {
			if (typingTimerhotel) clearTimeout(typingTimerhotel);

			var inputVal = $(this).val();
			if (inputVal.length >= minlength) {
				typingTimerhotel = setTimeout(doneTyping(inputVal, 'hotel_is_search_from_val'), doneTypingIntervalhotel);

			}
		});
		$('.loc_search_field input[name="location"]').on("keyup", function() {
			clearTimeout(typingTimerhotel);
		});

		function doneTyping(inputVal, classname) {
			$.ajax({
				url: "{{URL::to('/Hotel/cities/')}}",
				method: 'GET',
				data: {
					textval: inputVal,
					type: classname
				},
				dataType: 'json',
				success: function(data) {
					$('.' + classname).html(data.table_data);

				}
			});
		}
	});
</script>
@endsection