@extends('layouts.frontend')
@section('title', @$seoDetails->meta_title)
@section('meta_title', @$seoDetails->meta_title)
@section('meta_keyword', @$seoDetails->meta_keyword)
@section('meta_description', @$seoDetails->meta_desc)
@section('content')
<?php use App\Http\Controllers\PackageController; 

/* echo '<pre>';
								print_r($internationalesponse);
							echo '<pre>'; */
							
?>

<style>
	.search-query,#banner .banner-center-box form .input-group input.btn_search{height: 90px;}
.Holidaysvd>h4{color: #fff;}
#banner .custom_reservation_tab {
    padding: 20px 0px 10px;
}
#banner .banner-center-box form .input-group input.btn_search{width: 176px;}
.search-query,#banner .banner-center-box form .input-group input.btn_search{    border-radius: 5px;
     font-weight: bold;}
	 .search-query	{padding: 10px 10px 10px 20px;}
	 #banner .banner-center-box form .input-group{display: flex; justify-content: space-between;    column-gap: 20px;}
	 .Holidaysvd{margin-bottom: 20px;}
	</style>

<section id="banner" class="package_banner">

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
      <img src="/images/joburg-banner.png" class=deskslider_img alt="">
	  <img src="/images/joburg-banner-small.png" class="mobileslider_img" alt="">
    </div>

    <div class="item">
	<img src="/images/joburg-banner.png" class=deskslider_img alt="">
	  <img src="/images/joburg-banner-small.png" class="mobileslider_img" alt="">
    </div>

    <div class="item">
	<img src="/images/joburg-banner.png" class=deskslider_img alt="">
	  <img src="/images/joburg-banner-small.png" class="mobileslider_img" alt="">
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

<div class="bgblu">
			<div class="banner-center-box">
							<ul class="plani-icon">
								<li><a href="{{'/'}}" ><i class="fa fa-plane"></i> FLIGHTS</a></li>
								<li><a href="{{'/hotels'}}"><i class="fa fa-bed"></i> HOTELS</a></li>
								<li><a href="{{'/holiday'}}" class="actv"><i class="fa fa-umbrella-beach"></i> HOLIDAY</a></li>
								
							</ul>
							<div class="banner-reservation-tabs custom_reservation_tab">
							<div class="Holidaysvd">
						<h4>Book Domestic and International Holidays</h4>
							<!--<h1 class="font-heading-secondary">Book unique experiences</h1>
							<h4>Expolore top rated tours, 100+ Destinations worldwide</h4>-->
							<form id="searchform" action="{{URL::to('/search/')}}" method="get">
								<div id="custom-search-input">
									<div class="input-group btnsag">
										<input type="text" name="term" class="search-query" placeholder="Ex. Kerala, Goa, Bangkok  ...">
										<!-- <input type="submit" class="btn_search" value="Search"> -->
										<button class="btn_search" type="submit"><i class="fas fa-search"></i>Search</button>
									</div>
								</div>
							</form>
						</div>
							</div></div></div>











</section>
<!-- /container --> 
<div id="section-international-packages" class="section-flat section-popular-packages">
	<section class="section_content recommended_international_tour common_recommend_slider">
		<div class="container"> 
			<div class="row"> 
				<div class="col-md-12">
					<div class="section-title cus_sec_title">
						<h2>Top <strong>International Holidays</strong></h2>
						<p>Explore Top International Holidays</p>
					</div>
					<div class="slider-popular-packages">
						<ul class="slick-slider">
							<?php 
							
							foreach($internationalesponse as $ilist){
								$pprices = 0; 
								$priced  = array();
								
								if(!empty(@$ilist->mypackage)){
									foreach(@$ilist->mypackage as $poplist){
										$priced[] = $poplist->sales_price;
									}
									
									$pprices = @min(@$priced);
							
								}
						?>
							<li>
								<div class="box-preview box-tour-package">
									<div class="box-img img-bg">
										<a href="{{URL::to('/destinations/'.$ilist->slug)}}"><img src="{{URL::to('/public/img/media_gallery')}}/{{@$ilist->desmedia->images}}" alt="{{@$ilist->image_alt}}"></a>
										<div class="overlay">
											<div class="overlay-inner">
											</div><!-- .overlay-inner end -->
										</div><!-- .overlay end -->
										<span class="night-price">INR {{@$pprices}}*</span>
									</div><!-- .box-img end -->
									<div class="box-content">
										<div class="title">
											<h5><a href="{{URL::to('/destinations/'.$ilist->slug)}}">{{@$ilist->name}}</a></h5>
										</div><!-- .title end -->
									</div><!-- .box-content end -->
								</div><!-- .box-preview end -->
							</li> 
								<?php } ?>
						</ul><!-- .slick-slider end -->
						<div class="slick-arrows"></div><!-- .slick-arrows end -->
					</div><!-- .slider-top-destinations end -->
				</div>
				<div class="clearfix"></div>
			</div>	
		</div>	
	</section>
</div>
<div id="section-india-packages" class="section-flat section-popular-packages">
	<section class="section_content recommended_india_tour common_recommend_slider">
		<div class="container"> 
			<div class="row">
				<div class="col-md-12"> 
					<div class="section-title cus_sec_title">
						<h2>Top <strong>India Holidays</strong></h2>
						<p>Explore Top India Holidays</p>
					</div>
					<div class="slider-popular-packages">
						<ul class="slick-slider">
							<?php 
							
							
							foreach($domesticresponse as $ilist){
								$pprices = 0; 
								$priced  = array();
								
								if(!empty(@$ilist->mypackage)){
									foreach(@$ilist->mypackage as $poplist){
										$priced[] = $poplist->sales_price;
									}
									
									$pprices = @min(@$priced);
							
								}
						?>
							<li>
								<div class="box-preview box-tour-package">
									<div class="box-img img-bg">
										<a href="{{URL::to('/destinations/'.$ilist->slug)}}"><img src="{{URL::to('/public/img/media_gallery')}}/{{@$ilist->desmedia->images}}" alt="{{@$ilist->image_alt}}"></a>
										<div class="overlay">
											<div class="overlay-inner">
											</div><!-- .overlay-inner end -->
										</div><!-- .overlay end -->
										<span class="night-price">INR {{@$pprices}}*</span>
									</div><!-- .box-img end -->
									<div class="box-content">
										<div class="title">
											<h5><a href="{{URL::to('/destinations/'.$ilist->slug)}}">{{@$ilist->name}}</a></h5>
										</div><!-- .title end -->
									</div><!-- .box-content end -->
								</div><!-- .box-preview end -->
							</li> 
								<?php } ?>
						</ul><!-- .slick-slider end -->
						<div class="slick-arrows"></div><!-- .slick-arrows end -->
					</div><!-- .slider-top-destinations end -->
				</div>
				<div class="clearfix"></div>
			</div>	
		</div>	
	</section>
</div>
<!-- /container -->
<div id="section-services-1" class="section-flat custom_service" style="background: #f5f5f5; margin-top: 0px;"> 
	<div class="section-content">	
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6">
					<div class="box-info box-service-1 mt-md-50">
						<div class="box-icon">
							<i class="pe-7s-medal"></i>
						</div>
						<div class="box-content">
							<h4>+ 1000 Customers</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-6">
					<div class="box-info box-service-1 mt-md-50">
						<div class="box-icon">
							<i class="pe-7s-help2"></i>
						</div>
						<div class="box-content">
							<h4>H24 Support</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-6">
					<div class="box-info box-service-1 mt-md-50">
						<div class="box-icon">
							<i class="pe-7s-culture"></i>
						</div>
						<div class="box-content">
							<h4>+ 575 Locations</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-6">
					<div class="box-info box-service-1 mt-md-50">
						<div class="box-icon">
							<i class="pe-7s-headphones"></i>
						</div>
						<div class="box-content">
							<h4>Help Direct Line</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-6">
					<div class="box-info box-service-1 mt-md-50">
						<div class="box-icon">
							<i class="pe-7s-credit"></i>
						</div>
						<div class="box-content">
							<h4>Secure Payments</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-6">
					<div class="box-info box-service-1 mt-md-50">
						<div class="box-icon">
							<i class="pe-7s-chat"></i>
						</div>
						<div class="box-content">
							<h4>Support via Chat</h4>
						</div>
					</div>
				</div>
			</div>
			<!--<hr style="border-bottom: 1px solid #ececec;"/> -->
		</div>
	</div>
	<!--/row-->
</div>
<?php if($co !== 0){ ?>
<div class="bg_color_1 top_deals"> 
	<div class="container padd_30_25">
		<div class="main_title_2"> 
			<h2>Top Deals</h2> 
		</div>
		<div class="row"> 
			<div id="recommended" class="owl-carousel owl-theme cus_carousel">
				<?php 
			
				foreach($populartours as $ilist){
				?>
				<div class="item">
					<div class="box_grid">
						<figure>
							<a href="#0" class="wish_bt"></a>
							<a href="{{URL::to('/destinations/'.$ilist->packloc->slug.'/'.$ilist->slug)}}"><img src="{{URL::to('/public/img/media_gallery')}}/{{@$ilist->media->images}}" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
							<!--<small>Historic</small>-->
						</figure>
						<div class="wrapper">
							<h3><a href="{{URL::to('/destinations/'.$ilist->packloc->slug.'/'.$ilist->slug)}}">{{$ilist->package_name}}</a></h3>
							<p>{{$ilist->details_day_night}}</p>
							@if(@$ilist->price_on_request == 1)
								<span class="price">Price on Request</span>
							@else
								<span class="price">From <strong><i class="fa fa-inr"></i>  {{$ilist->offer_price}}</strong> /per person</span>
							@endif
						</div>
						<ul>
							<li><i class="icon_clock_alt"></i> {{$ilist->no_of_nights}}N/{{$ilist->no_of_days}}D</li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
				<?php }  ?>
			</div>
		</div> 
	</div>
</div>
<?php }  ?>
<div class="why_choose_sec"> 
	<div class="container padd_30"> 
		<div class="section-title cus_sec_title">
			<h2 class="text-center">Why Choose <strong>Travel24hr.com</strong> (Travel24her)?</h2>
			<p style="font-size:16px;">Travel24her is an India-based bespoke holiday planner that specialises in designing exceptional international luxury vacations for its travellers. We believe in encouraging and indulging your travel curiosity. Whatever your destination, however unusual your request, we are here to plan that dream vacation you have always desired. Our trips don’t come off the shelf, there are no pre-set itineraries. They are personalised down to the finest detail around your tastes and interests with an absolute commitment to quality. The travel crafters at Travel24her show you the best sights in a different light, and introduce you to places that others might miss.</p>
		</div>
	</div>
</div>
 

<div class="bg_color_1" style="display:none;"> 
	<div class="container padd_80_55">
		<div class="main_title_2"> 
			<h3>Browse packages through holiday THEMES</h3>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<?php
				 $typetour = json_decode($holidaytypetours);
				
				$t = 1;
			?>
				<div class="row">
				@foreach(@$typetour->data->holidaytype_pack as $typet)
					<?php if(!empty($typet->holidaytype) && $typet->holidaytype->status == 0){
								
					}else{
					?>
						
                   <div class="col-lg-2 col-md-6">
						<a href="{{URL::to('/themes/'.$typet->slug)}}" class="box_feat">
							<div class="main-cat-icon" style="margin-bottom: 10px;">
							@if(!empty($typet->holidaytype))
								@if(@$typet->holidaytype->image != '')
									<img src="{{@$typetour->data->image_gallery_path}}{{@$typet->holidaytype->image}}">
								@else
									<img src="{{@$typetour->data->image_gallery_path}}{{@$typet->image}}">
								@endif
							 @else
								<img src="{{@$typetour->data->image_gallery_path}}{{@$typet->image}}">
							 @endif
							</div>
							<div class="main-cat-name">
								<h3>{{$typet->name}}</h3>
							</div>
						</a>
					</div>
					<?php } ?>
				 @endforeach 
                </div>
			</div>
		</div>
	</div>
</div>
<script>
jQuery(document).ready(function($){
	$('.desttab-wrap li a').on('click', function(){
		$('.desttab-wrap li').removeClass('active');
		//$('.desttab-wrap li a').removeClass('active');
		$(this).parent().addClass('active');
	});
});
</script>
<script>
	$(document).ready(function() {  

	});
		
</script>
@endsection