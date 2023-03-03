@extends('layouts.frontend')
@section('title', 'Hotel')
@section('content')
<style>
#country-list {float: left;list-style: none;margin-top: -3px;padding: 0;width: 100%;position: absolute;}
#country-list li {padding: 10px;background: #fff;border-bottom: #bbb9b9 1px solid;}
.hotel-location_search .hotel_is_search_from_val li{cursor: pointer;}
.hotel-location_search .hotel_is_search_from_val li:hover{background: #f2f2f2;cursor: pointer; border-left: 4px solid #89ad3e;}
.hotel-location_search .hotel_is_search_from_val li{border-left: 4px solid #fff;}
.nationality_option select{width: 250px;float: right;margin-bottom: 6px;border-radius: 0px;padding: 12px 10px;font-size: 16px;height: auto;}
</style>

<section id="banner"> 
	<div class="banner-parallax" data-banner-height="550">
		<img src="{!! asset('public/images/hotel-banner.jpg') !!}" alt="">
		<div class="overlay-colored color-bg-white opacity-40"></div><!-- .overlay-colored end -->
		<div class="slide-content">
			<div class="container">
				<div class="row">  
					<div class="col-sm-12">
						<div class="hotel_search">
							<!--<h4>Find deals on hotels, homes, and much more...</h4>
							<p>From cozy country homes to funky city apartments</p>-->
							<div class="nationality_option">
							<?php
								$countries1 = json_decode($countries);
								?>
							<select class="form-control" id="nationality" name="nationality">
	<?php
	foreach($countries1 as $countr){
		?>
		<option <?php if($countr->code == 'IN'){ echo 'selected'; } ?> value="<?php echo $countr->code; ?>"><?php echo $countr->name; ?></option>
		<?php
	}
	?>
</select>
</div>
<div class="clearfix"></div>
							<div class="search_field"> 
								<form class="search_form">
									<div class="form-group loc_search_field cus_loc_field">
										<input autocomplete="off" type="text" class="hotel-roundwayfrom form-control hotel-wrapper-dropdown-2" placeholder="Where are you going?" id="search-box" name="location" value="" />
										<i class="fa fa-location-arrow"></i>
										<div class="hotel-location_search selhide" id="hotel-location_search">
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
										
									<input id="txtCity" name="txtCity" value="" style="display:none" type="text" class="input_htl_lo validate[required] minSize[3]"  autocomplete="off" aria-autocomplete="list" onclick="loadCity();" />
									<div class="form-group cus_calendar_field">
										<input autocomplete="off" type="text" name="brTimeStart" value="" class="form-control" id="hoteldatepicker-time-start" placeholder="2019/09/30">
										<sub>Check-in</sub>
										<i class="far fa-calendar"></i>
									</div><!-- .form-group end -->
									<div class="form-group cus_calendar_field">
										<input autocomplete="off" type="text" name="brTimeEnd" value="" class="form-control" id="hoteldatepicker-time-end" placeholder="2019/09/30">
										<sub>Check-out</sub> 
										<i class="far fa-calendar"></i>
									</div><!-- .form-group end -->
									<div class="form-group cus_passenger_field">
										<input autocomplete="off" readonly type="text" id="guest" name="guest" class="form-control show-dropdown-passengers roundpessanger" placeholder="" value="">
										<div class="select_guest">
											<span class="search-label">Rooms/Guests </span>
											<span class="guests_selected"><span id="guestcount">1</span> Person in <span id="guestroom">2</span> Room</span>
										</div> 
										<i class="fas fa-user"></i>
										<div class="list-dropdown-passengers">
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
															<select id="Child_Age_1_1" style="display: inline;"><option option="selected">1</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option></select>
															<select id="Child_Age_1_2" style="display: inline;"><option option="selected">1</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option></select>
														</div>
													</div> 
												</div> 
												<a id="addhotelRoom" href="javascript:;" class="cus_add_remove_btn addroom">Add Room</a>
												<a id="removehotelRoom" href="javascript:;" class="cus_add_remove_btn removeroom" style="display: none;">Remove Room</a> 
												<a class="btn-reservation-passengers btn x-small colorful hover-dark" href="javascript:;">Done</a>
												
												<div class="clearfix"></div>
												<input type="hidden" id="hdnroom" value="1">
											</div><!-- .list-persons-count end -->
										</div><!-- .list-dropdown-passengers end -->
									</div><!-- .form-group end -->
									<div class="form-group cus_searchbtn_field">
										<button onclick="HotelSearch();" type="button" class="form-control icon"><i class="fas fa-search"></i> Search</button>
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
</section>

<!-- Content
		============================================= -->
<section id="content">
	<div id="content-wrap">
		<!-- === Section Flat =========== -->
		<div class="section-flat single_sec_flat" style="background:#e8e8e8;">      
			<div class="section-content">
				<div class="container">
					<div class="row"> 
						<div class="inner_hotel">
							<!--<div class="col-sm-12">	 
								<div class="cus_breadcrumb">
									<ul>
										<li class="active"><a href="#">Home</a></li>
										<li><span><i class="fa fa-angle-right"></i></span></li>
										<li><a href="#">Hotels</a></li>
									</ul>
								</div>
							</div>-->
							<div class="col-sm-12">	 
								<div class="browse_prop_type">
									<div class="hotel_heading">
										<h4>Browse by Property Type</h4>
									</div>
									<div class="row">
										<div class="MultiCarousel" data-items="1,2,4,5" data-slide="1" id="MultiCarousel"  data-interval="1000">
											<div class="MultiCarousel-inner">  
												<div class="item">
													<div class="pad15">
														<div class="item_img">
															<img src="{!! asset('public/images/hotel_img/hotels.jpg') !!}" alt=""/>
														</div>
														<h5>Hotels</h5>
														<p>716,885 hotels</p>
													</div>
												</div>
												<div class="item">
													<div class="pad15">
														<div class="item_img">
															<img src="{!! asset('public/images/hotel_img/apartments.jpg') !!}" alt=""/>
														</div>	
														<h5>Apartments</h5>
														<p>792,547 apartments</p>
													</div>
												</div>
												<div class="item">
													<div class="pad15">
														<div class="item_img">
															<img src="{!! asset('public/images/hotel_img/resorts.jpg') !!}" alt=""/>  
														</div>
														<h5>Resorts</h5> 
														<p>20,819 resorts</p>
													</div>
												</div>
												<div class="item">
													<div class="pad15">
														<div class="item_img">
															<img src="{!! asset('public/images/hotel_img/villas.jpg') !!}" alt=""/>
														</div>	
														<h5>Villas</h5> 
														<p>403,135 villas</p>
													</div>
												</div>
												<div class="item">
													<div class="pad15">
														<div class="item_img">
															<img src="{!! asset('public/images/hotel_img/cabins.jpg') !!}" alt=""/>
														</div>	
														<h5>Cabins</h5> 
														<p>14,006 cabins</p>
													</div>
												</div>
												<div class="item">
													<div class="pad15">
														<div class="item_img">
															<img src="{!! asset('public/images/hotel_img/cottages.jpg') !!}" alt=""/>
														</div>	
														<h5>Cottages</h5> 
														<p>126,728 cottages</p>
													</div>
												</div>
												<div class="item">
													<div class="pad15">
														<div class="item_img">
															<img src="{!! asset('public/images/hotel_img/glamping.jpg') !!}" alt=""/>
														</div>
														<h5>Glamping</h5> 
														<p>10,505 Glamping Sites</p>
													</div>
												</div>
												<div class="item">
													<div class="pad15">
														<div class="item_img">
															<img src="{!! asset('public/images/hotel_img/serviced_apartment.jpg') !!}" alt=""/>
														</div>	
														<h5>Serviced Apartments</h5> 
														<p>34,925 serviced apartments</p>
													</div>
												</div>
												<div class="item">
													<div class="pad15">
														<div class="item_img">
															<img src="{!! asset('public/images/hotel_img/vacation_homes.jpg') !!}" alt=""/>
														</div>	
														<h5>Vacation Homes</h5> 
														<p>403,135 vacation homes</p>
													</div> 
												</div>
											</div>
											<button class="btn btn-primary leftLst"><</button>
											<button class="btn btn-primary rightLst">></button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12">	 
								<div class="popular_destination">
									<div class="hotel_heading">
										<h4>Book Hotels at Popular Destinations</h4>
									</div>
									<div class="popular_hotel_list">
										<div class="popular_item">
											<div class="pop_city"> 
												<img src="{!! asset('public/images/hotel_img/goa_img.jpg') !!}" alt=""/>
											</div>
											<h5>Goa</h5>
											<span>Starting at <i class="fa fa-rupees-sign"></i> 1200</span>
										</div>
										<div class="popular_item">
											<div class="pop_city">
												<img src="{!! asset('public/images/hotel_img/mumbai_img.jpg') !!}" alt=""/>
											</div>
											<h5>Mumbai</h5>
											<span>Starting at <i class="fa fa-rupees-sign"></i> 1170</span>
										</div>
										<div class="popular_item">
											<div class="pop_city">
												<img src="{!! asset('public/images/hotel_img/delhi_img.jpg') !!}" alt=""/>
											</div>
											<h5>Delhi</h5>
											<span>Starting at <i class="fa fa-rupees-sign"></i> 900</span>
										</div>
										<div class="popular_item">  
											<div class="pop_city">
												<img src="{!! asset('public/images/hotel_img/banglore_img.jpg') !!}" alt=""/>
											</div>
											<h5>Banglore</h5>
											<span>Starting at <i class="fa fa-rupees-sign"></i> 1100</span>
										</div>
										<div class="popular_item">
											<div class="pop_city">
												<img src="{!! asset('public/images/hotel_img/kolkata_img.jpg') !!}" alt=""/>
											</div>
											<h5>Kolkata</h5>
											<span>Starting at <i class="fa fa-rupees-sign"></i> 1050</span>
										</div>
										<div class="popular_item">
											<div class="pop_city">
												<img src="{!! asset('public/images/hotel_img/dubai_img.jpg') !!}" alt=""/>
											</div>
											<h5>Dubai</h5>
											<span>Starting at <i class="fa fa-rupees-sign"></i> 1500</span>
										</div>
										<div class="popular_item">
											<div class="pop_city">
												<img src="{!! asset('public/images/hotel_img/bangkok_img.jpg') !!}" alt=""/>
											</div>
											<h5>Bangkok</h5>
											<span>Starting at <i class="fa fa-rupees-sign"></i> 1400</span>
										</div>
										<div class="popular_item">
											<div class="pop_city">
												<img src="{!! asset('public/images/hotel_img/singapore_img.jpg') !!}" alt=""/>
											</div>
											<h5>Singapore</h5>
											<span>Starting at <i class="fa fa-rupees-sign"></i> 2200</span>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-sm-12">	 
								<div class="cheapest_txt">
									<h4>Cheapest Deals on Budget & Luxury Hotels are Available at Travel24her.com</h4>
									<p>Due to the huge influx of tourists in India, Travel24her.com offers a wide range of luxury, deluxe and budget hotels to them. Choose to stay in luxury and comfort with greatest discounts available on hotels bookings.</p>
									<p>We list classiest budget hotels on our site along with some of the prominent international hotel chains of India including Oberoi Group, ITC Group, Taj Group, Le Meridian Group and many others. Ranging from class hotels to luxury beach resorts, each hotel on our site gives you a memorable staying experience. Along with deluxe, budget and luxury hotels, Travel24her.com also displays a number of heritage hotels for offering you a royal stay. Enjoy cheap hotel deals for any destination with great savings.</p>
								</div>
							</div>
						</div>
					</div>	
				</div>	
				<div class="wht_bg why_book_hotel">
					<div class="container"> 
						<div class="row">
							<div class="col-sm-12 text-center">
								<h4>Why Book Hotels with Travel24her.com.com?</h4>
							</div>
						</div>
						<div class="row why_hotel_row">
							<div class="col-md-3 col-sm-6 why_col_3">
								<div class="why_hotel_box">
									<h4>Extensive Hotel Option</h4>
									<img src="{!! asset('public/images/hotel_img/extensive_icon.png') !!}" alt=""/>
									<p>Best hotels available for different destinations to offer you a stay of lifetime.</p>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 why_col_3">
								<div class="why_hotel_box">
									<h4>Savings on Hotel Booking</h4>
									<img src="{!! asset('public/images/hotel_img/wallet_icon.png') !!}" alt=""/>
									<p>Enjoy hotel bookings with best offers and discount and make your stay unforgettable.</p>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 why_col_3">
								<div class="why_hotel_box">
									<h4>Hotel Ratings</h4>
									<img src="{!! asset('public/images/hotel_img/tripadvisor_icon.png') !!}" alt=""/>
									<p>All our hotels have good ratings on Trip Advisor and recommended by users.</p>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 why_col_3">
								<div class="why_hotel_box">
									<h4>Great Deals on Travel</h4>
									<img src="{!! asset('public/images/hotel_img/grab_icon.png') !!}" alt=""/>
									<p>Also grab attractive offers on holiday packages, flights and other travel products</p>
								</div>
							</div>
						</div>
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
	$(document).ready(function () {
		
		$("#search-box").keyup(function(){
		$.ajax({
		type: "GET",
		url: "{{URL::to('/hotel-cities')}}",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
	
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();
	
    $(window).resize(function () {
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
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
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
        }
        else if (e == 1) {
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
selhotel.click(function (e) {
    e.stopPropagation();
    optionshotel.show();
});
$('body').click(function (e) {
    optionshotel.hide();
});
$(document).delegate('.hotel_is_search_from_val li','click',function (e) {
    e.stopPropagation();
    txtroundhotel.val($(this).attr('roundwayfromtop'));
	$('#txtCity').val($(this).attr('roundwayfrom'));
    $(this).addClass('selected').siblings('li').removeClass('selected');
    optionshotel.hide();
	txtroundhotel.blur();
	$('#hoteldatepicker-time-start').focus();
});


	var typingTimerhotel;                //timer identifier
	var doneTypingIntervalhotel = 5000;
	var minlength = 3;
	$('.loc_search_field input[name="location"]').on("keyup", function(){
		if (typingTimerhotel) clearTimeout(typingTimerhotel); 
		
		var inputVal = $(this).val();
		if (inputVal.length >= minlength ) {
			typingTimerhotel = setTimeout(doneTyping(inputVal, 'hotel_is_search_from_val'), doneTypingIntervalhotel);
	 
		}
	}); 
	$('.loc_search_field input[name="location"]').on("keyup", function(){
		clearTimeout(typingTimerhotel);
	});
					
	function doneTyping (inputVal,classname) {
		$.ajax({
		   url:"{{URL::to('/Hotel/cities/')}}",
		   method:'GET',
		   data:{textval:inputVal, type:classname},
		   dataType:'json',
		   success:function(data)
		   {
			$('.'+classname).html(data.table_data);
		 
		   }
		  });
	}
});
</script>
@endsection