@extends('layouts.frontend')
@section('content')
<?php use App\Http\Controllers\PackageController; ?>
<div class="single_package"> 
	<div class="inner_single_package">
		<!--<div class="container-fluid">
			<div class="row"> 
				<div class="list_image">
					<img src="{!! asset('public/img/Frontend/img/rajastan_img.jpg') !!}" class="img-fluid" alt=""/>
					<div class="opacity_banner"></div> 
				</div>
			</div>
		</div>-->
		<div class="container">
			<div class="row"> 
				<div class="col-md-12" style="display:none;"> 
				<?php 
					$dest = $destinationdetail;
					$filterlist = json_decode($filterlist);
				?>
					<h2>{{@$myquery->name}} Holidays</h2>
					<article data-readmore="" aria-expanded="false" id="rmjs-1" class="read-more-fade cust_article" style="">  
					<?php echo htmlspecialchars_decode(stripslashes(@$dest->description)); ?>
					</article>
					
				</div>
				<div class="col-md-3">
					<div class="sidebar style-1 custom_sidebar">
						<a class="filter_close"><i class="fa fa-times"></i></a> 
						<input id="mslug" type="hidden" value="{{@$myquery->slug}}">
						<input id="mprice" type="hidden" value="">
						<h3>Filter <span onClick="ClearAll();" class="clearfilter">Clear All</span></h3>
						<div class="inner_filter">
							<div class="box-widget">
								<h5 class="box-title">Flights</h5>
								<div class="box-content">
									<ul class="check-boxes-custom list-checkboxes">
										<li>
											<label for="flight1"  class="label-container checkbox-default">With Flight
												<input name="flight" class="flightfilter" id="flight1" type="checkbox" value="1" >
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label for="flight2" class="label-container checkbox-default">Without Flight
												<input name="flight" class="flightfilter" id="flight2" type="checkbox" value="0" >
												<span class="checkmark"></span>
											</label>
										</li>
									</ul><!-- .check-boxes-custom end -->
								</div><!-- .box-content end -->
							</div><!-- .box-widget end -->
							<div class="box-widget">
								<h5 class="box-title">Holiday Type</h5>
								<div class="box-content">
									<ul class="check-boxes-custom list-checkboxes">
										<li>
											<label for="pack1"  class="label-container checkbox-default">Fixed
												<input name="package_type" class="Stopfliter myListicheck" id="pack1" type="checkbox" value="fixed" >
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label for="pack2" class="label-container checkbox-default">Customize
												<input name="package_type" class="Stopfliter myListicheck" id="pack2" type="checkbox" value="customize">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label for="pack3" class="label-container checkbox-default">Group
												<input name="package_type" class="Stopfliter myListicheck" id="pack3" type="checkbox" value="group" >
												<span class="checkmark"></span>
											</label>
										</li>
									</ul><!-- .check-boxes-custom end -->
								</div><!-- .box-content end -->
							</div><!-- .box-widget end -->
							<div class="box-widget">
								<h5 class="box-title">Budget</h5>
								<div class="box-content">
									<div class="slider-dragable-range pslider-range-price">
										<input type="text" class="price">
										<div class="pslider-range" data-slider-min-value="0" data-slider-max-value="500000" data-range-start-value="50000" data-range-end-value="200000" data-slider-value-sign="&#8377;"></div>
									</div><!-- .slider-dragable-price end -->
								</div><!-- .box-content end -->
							</div><!-- .box-widget end -->
							<div class="box-widget">
								<h5 class="box-title">Duration</h5>
								<div class="box-content"> 
									<div class="slider-dragable-range pslider-range-time">
										<input type="text" class="time">
										<div class="pslider-range-t" data-slider-min-value="0" data-slider-max-value="24" data-range-start-value="0" data-range-end-value="20" data-slider-value-sign="Hr "></div> 
									</div><!-- .slider-dragable-price end -->
								</div><!-- .box-content end --> 
							</div><!-- .box-widget end -->	
							
							<div class="box-widget">	
								<div class="filter_type duration_filter">
									<h5 class="box-title">Destination</h5>
									<div class="box-content">	
										<input type="text" id="destination" name="destination" value="" />   
									</div>	
								</div>	
							</div> 
						</div> 
					</div> 
				</div> 
				<div class="col-md-9">
					<div class="row">
						<div class="col-lg-8 padl0">
							<h2>{{@$myquery->name}} Holidays</h2>
						</div>                
						<div class="col-lg-4" style="padding-top:20px; text-align:right;">
							<div class="row">
							</div>
						</div>
					</div> 
					<div class="row">
						<div class="col-sm-12 padl0">
							<div class="sorting_sec">
								<div class="box-widget">
									<div class="box-content">
										<label>Sort by:</label>
										<select id="filterprice" name="filterprice">
											<option value="popularity">Popularity</option>
											<option value="desc">Price: Low to High</option>
											<option value="asc">Price: High to Low</option>
											<option value="desc">Duration: Low to High</option>
											<option value="asc">Duration: High to Low</option>
										</select>
									</div>
								</div> 
							</div>
						</div>
					</div> 					
					<div id="mloader" style="position: fixed;left: 45%;padding: 20px;top: 40%;opacity: 0.5;border: 1px solid rgb(102, 102, 102);z-index: 100;background-color: rgb(255, 255, 255);display: none;"><img src="{!! asset('public/img/loader.gif') !!}" alt="Loading"></div>
					<div id="ajaxResultContainer">
						<div class="row">
							<div class="col-lg-12">
								<div class="tourpack-pagtbox">
									<div class="row">
										<!--<div class="col-lg-4 col-md-4 col-sm-12 pagtextbx pagt-tetbx">Showing : 1-20 out of 62</div>                        
										<div class="col-lg-5 col-md-5 col-sm-12 pagtwrap">
											<ul class="pagination">
												<li class="disabled"><a href="#">Prev</a></li>
												<li class="active"><a href="#">1</a></li>
												<li><a href="#" onclick="showPage(1); return false;">2</a></li>
												<li><a href="#" onclick="showPage(2); return false;">3</a></li>
												<li><a href="#" onclick="showPage(3); return false;">4</a></li>
												<li><a href="#" onclick="showPage(1); return false;">Next</a></li>
											</ul>                           
										</div>                        
										<div class="col-lg-3 col-md-3 col-sm-12 pagtboxsel sorting-box">
											<div class="custom-select selct-bg">
												<select class="form-control" name="sortBy" id="SortBy">
													<option value="order_id asc" selected="selected">Sort by</option>
													<option value="days asc">Duration Short</option>
													<option value="days desc">Duration Long</option>
													<option value="price_inr asc">Price Lowest First</option>
													<option value="price_inr desc">Price Highest First</option>
												</select>
											</div>
										</div>-->
									</div>
								</div> 
							</div>
						</div>   
						<?php 
						//echo '<pre>'; print_r($dest->data->packages);
							foreach($dest as $plist){
						?>
						<div class="row">
							<div class="col-lg-12">
								<div class="row pkgwrapper d_flex">
									<div class="col-sm-3 pkgimg-box d_flex">
										<a href="{{URL::to('/destinations/'.$myquery->slug.'/'.$plist->slug)}}" class="pkg-imgbx">
											<img data-original="{{URL::to('/public/img/media_gallery')}}/{{@$plist->media->images}}" width="250" class="img-fluid lazy" alt="{{@$plist->package_image_alt}}" title="" src="{{URL::to('/public/img/media_gallery')}}/{{@$plist->media->images}}" style="display: block;">
										</a>
									</div>   
									<div class="col-sm-9 d_flex padd0">
										<div class="row d_flex mar_auto_0 wd100">
											<div class="col-sm-9 pkgtext-box">
											{{-- @if(@$plist->tour_code != '')
												<!--<span class="code_span">Tour Code: <strong>{{@$plist->tour_code}}</strong></span>-->
											@endif --}}
											<span class="pack_type">Departure</span> 
												<a class="pack_title" href= "{{URL::to('/destinations/'.$myquery->slug.'/'.$plist->slug)}}">{{@$plist->package_name}}</a>
												<span>{{@$plist->no_of_nights}} Nights / {{@$plist->no_of_days}} Days</span>
												<p>{{@$plist->details_day_night}}</p>
												<?php if(@$plist->package_topinclusions != ''){ ?>
												<i>Top Inclusion</i>
												<ul>
												<?php 
						$explodee = explode(',',@$plist->package_topinclusions);
						if(!empty($explodee)){
						for($i=0; $i<count($explodee);$i++ ){
						$query = \App\SuperTopInclusion::where('id', '=', $explodee[$i]);
						$Topinclusion		= $query->with(['topinclusion' => function($query) {
						$query->select('id','top_inc_id','name','status','image');
						}])->first();
													
												?>
		<li><div class="cus_tooltip">
		@if(!empty($Topinclusion->topinclusion))
			@if(@$Topinclusion->topinclusion->image != '')
				<img width="20" height="20" src="{{URL::to('/public/img/topinclusion_img')}}/{{@$Topinclusion->topinclusion->image}}">
			@else
				<img width="20" height="20" src="{{URL::to('/public/img/topinclusion_img')}}/{{@$Topinclusion->image}}">
			@endif
		@else
			<img width="20" height="20" src="{{URL::to('/public/img/topinclusion_img')}}/{{@$Topinclusion->image}}">
		@endif
		<span class="tooltiptext">{{@$Topinclusion->name}}</span></div></li>
												<?php } } ?>
												
												</ul>  
												<?php } ?>
												<!--<div class="pack_inclusion">
													<i>Inclusion</i>
													<ul>
														<li><div class="cus_tooltip"><i class="fa fa-plane"></i><span class="tooltiptext">Flights</span></div></li>
														<li><div class="cus_tooltip"><i class="fa fa-hotel"></i><span class="tooltiptext">Hotels</span></div></li>
														<li><div class="cus_tooltip"><i class="fa fa-shuttle-van"></i><span class="tooltiptext">Transport</span></div></li>
														<li><div class="cus_tooltip"><i class="fa fa-glasses"></i><span class="tooltiptext">Sightseeing</span></div></li>
														<li><div class="cus_tooltip"><i class="fab fa-cc-visa"></i><span class="tooltiptext">Visa</span></div></li>
														<li><div class="cus_tooltip"><i class="fa fa-utensils"></i><span class="tooltiptext">Meals</span></div></li>
														<li><div class="cus_tooltip"><i class="fa fa-percent"></i><span class="tooltiptext">Taxes</span></div></li>
													</ul>
												</div>--> 
												<div class="pack_remarks">
													<span>Remarks</span><p>Get up to Rs 1500 Cashback. Use Coupon Code: travel24her2020</p>
												</div>
											</div>			 				
											<div class="col-sm-3 txt-cntr">
												<span>
												@if($plist->price_on_request == 1)
													<div class="pkg-pricebx price_request">
														<strong>Price On Request</strong>
													</div>
												@else
													
					<?php
					//$discount = (($plist->sales_price - $plist->offer_price) /$plist->sales_price ) * 100; 
					?>
													<?php /*<div class="pkg-pricebx" style="font-size: 15px;">
														<p class="appendBottom10"><span class="font12 redText appendRight5">Save <i class="fa fa-inr"></i> <?php echo $plist->sales_price - $plist->offer_price; ?></span><span class="holidaySprite discountTag"></span><span class="discount_box font11 latoBold whiteText">{{@$discount}}%</span></p> 
														<strike><strong style="color:#aba5a5"><i class="fa fa-rupee-sign"></i> {{@$plist->sales_price}}</strong></strike>
													</div>*/ ?>
													<div class="pkg-pricebx" style="font-size: 15px;">
														<strong><i class="fa fa-rupee-sign"></i> {{@$plist->sales_price}} <sub>Price/Person</sub></strong>
													</div>
												@endif
												</span> 
												<a href="{{URL::to('/destinations/'.$myquery->slug.'/'.$plist->slug)}}" class="pkglinks-view text-center">Book Now</a>
												<!--<a href="javascript:;" datapacid="{{$plist->id}}" data-toggle="modal"  data-target="#inquirymodal" onclick="" class="pkglinks-enquire text-center myqueryli">Enquire Now</a>-->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>	 
						<!--<nav aria-label="..." class="custom_pagination">
							<ul class="pagination pagination-sm">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1">Previous</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</nav>-->
						<!-- /pagination -->	
					</div>
				</div>
			</div>  
		</div>
	</div>
</div>
<script>
var miprice = '{{@$filterlist->data->min_price}}';
var maxprice = '{{@$filterlist->data->max_price}}';
var min_nigt = '{{@$filterlist->data->min_nigt}}';
var max_day = '{{@$filterlist->data->max_day}}';
</script>
@endsection