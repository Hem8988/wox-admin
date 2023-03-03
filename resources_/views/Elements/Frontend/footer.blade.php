	<!--footer starts from here-->
	<footer class="footer" @if(auth()->guard('agents')->user())  style="min-height:auto" @endif>
		<div class="container">
			<div class="row hidepg1"  @if(auth()->guard('agents')->user())  style="display:none" @endif>
				<div class=" col-sm-3 col-md-3 col-xs-12 col-3 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Europe Flight</h5>
					<!--headin5_amrc-->
					<ul class="footer_ul_amrc">
						<!-- <li><a href="{{URL::to('/')}}">Flight</a></li>
						<li><a href="{{URL::to('/hotels')}}">Hotel</a></li>
						<li><a href="{{URL::to('/holiday')}}">Holidays</a></li>
						<li><a href="{{URL::to('/visa')}}">Visa</a></li> -->
						
						<li><a href="#">Flights to London</a></li>
						<li><a href="#">Flights to Istanbul
						</a></li>
						<li><a href="#">Flights to Manchester
						</a></li>
						<li><a href="#">Flights to Paris
						</a></li>
					</ul>
					<!--footer_ul_amrc ends here-->
				</div>
				<div class=" col-sm-3 col-md-3 col-xs-12  col-3 col">
					<h5 class="headin5_amrc col_white_amrc pt2">African Hotels</h5>
					<!--headin5_amrc-->
					<ul class="footer_ul_amrc">
						<!-- <li><a href="{{URL::to('/')}}/page/about-us">About Us</a></li>
						<li><a href="{{URL::to('/')}}/contact">Contact Us</a></li>
						<li><a href="{{URL::to('/')}}/career">Careers</a></li>
						<li><a href="{{URL::to('/')}}/coming_soon">Blog</a></li>
						<li><a href="{{URL::to('/')}}/faq">FAQs</a></li>
						<li><a href="{{URL::to('/')}}/page/terms-conditions">Terms & Conditions</a></li>
						<li><a href="{{URL::to('/')}}/page/privacy-security">Privacy</a></li> -->
						</a></li>
						<li><a href="#">Hotels in Nairobi
						</a></li>
						<li><a href="#">Hotels in Cape Town

						</a></li>
						<li><a href="#">Hotels in Johannesburg

						</a></li>
					</ul>
					<!--footer_ul_amrc ends here-->
				</div>
				<div class=" col-sm-3 col-md-3 col-xs-12 col-3 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Follow us!</h5>
					<!--headin5_amrc-->
					<ul class="footer_ul_amrc">
						<!-- <li><a href="{{URL::to('/FlightList/index')}}?srch=DEL-Delhi-India|BOM-Mumbai-India|{{date('Y/m/d',strtotime('+1 day'))}}&px=1-0-0&cbn=2&nt=undefined&jt=1">Delhi to Mumbai Flights</a></li>
						<li><a href="{{URL::to('/FlightList/index')}}?srch=BOM-Mumbai-India|DEL-Delhi-India|{{date('Y/m/d',strtotime('+1 day'))}}&px=1-0-0&cbn=2&nt=undefined&jt=1">Mumbai to Delhi Flights</a></li>
						<li><a href="{{URL::to('/FlightList/index')}}?srch=DEL-Delhi-India|BLR-Bangalore-India|{{date('Y/m/d',strtotime('+1 day'))}}&px=1-0-0&cbn=2&nt=undefined&jt=1">Delhi to Bangalore Flights</a></li>
						<li><a href="{{URL::to('/FlightList/index')}}?srch=BLR-Bangalore-India|CCU-Kolkata-India|{{date('Y/m/d',strtotime('+1 day'))}}&px=1-0-0&cbn=2&nt=undefined&jt=1">Bangalore to Kolkata Flights</a></li>
						<li><a href="{{URL::to('/FlightList/index')}}?srch=DEL-Delhi-India|HYD-Hyderabad-India|{{date('Y/m/d',strtotime('+1 day'))}}&px=1-0-0&cbn=2&nt=undefined&jt=1">Delhi to Hyderabad Flights</a></li>
						<li><a href="{{URL::to('/FlightList/index')}}?srch=CCU-Kolkata-India|MAA-Chennai-India|{{date('Y/m/d',strtotime('+1 day'))}}&px=1-0-0&cbn=2&nt=undefined&jt=1">Kolkata to Chennai Flights</a></li>
						<li><a href="{{URL::to('/FlightList/index')}}?srch=BOM-Mumbai-India|CCU-Kolkata-India|{{date('Y/m/d',strtotime('+1 day'))}}&px=1-0-0&cbn=2&nt=undefined&jt=1">Mumbai to Kolkata Flights</a></li>
						<li><a href="{{URL::to('/FlightList/index')}}?srch=CCU-Kolkata-India|BLR-Bangalore-India|{{date('Y/m/d',strtotime('+1 day'))}}&px=1-0-0&cbn=2&nt=undefined&jt=1">Kolkata to Bangalore Flights</a></li>
						<li><a href="{{URL::to('/FlightList/index')}}?srch=BOM-Mumbai-India|GOI-Goa-India|{{date('Y/m/d',strtotime('+1 day'))}}&px=1-0-0&cbn=2&nt=undefined&jt=1">Mumbai to Goa Flights</a></li> 
					 -->

					 <div class="stay">
						<p>Stay tuned and access the deals and discounts with:</p>
						@foreach($sites as $key => $value)
							
				        @if($value->title == 'Facebook')
						<a href="{{$value->content}}">
							<i class="fab fa-facebook"></i>
						</a>
						@endif
							
				        @if($value->title == 'Twitter')
						<a href="{{$value->content}}">
							<i class="fab fa-twitter"></i>
						</a>
						@endif
							
				        @if($value->title == 'Linkedin')
						<a href="{{$value->content}}">
							<i class="fab fa-linkedin"></i>
						</a>
						@endif
							
				        @if($value->title == 'Instagram')
						<a href="{{$value->content}}">
							<i class="fab fa-instagram"></i>
						</a>
						@endif
							
				        {{-- @if($value->title == 'Facebook')
						<a href="{{$value->content}}">
							<i class="fab fa-facebook"></i>
						</a>
						@endif --}}
						@endforeach
					</div>
					
					
					</ul> 
					<!--footer_ul_amrc ends here-->
				</div>
				<div class="col-sm-3 col-md-3 col-xs-12  col-12 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
				@foreach($sites as $key => $value)
						
				        @if($value->title == 'Contact')
					<p><i class="fa fa-phone"></i> <a href="tel:+09122195512">{{$value->content}} </a></p>
					@endif
					  @if($value->title == 'Email')
					<p><i class="fa fa fa-envelope"></i> <a href="mailto:info@travel24hr.com">{{$value->content}}</a></p>
					@endif
					@endforeach
				</div>
			</div>
		</div>
		<div class="footer_bottom"   @if(auth()->guard('agents')->user())  style="text-align: center !important" @endif>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
					<h6>TRAVEL24HR</h6>
						<ul class="foote_bottom_ul_amrc">
							<!-- <li><a href="{{URL::to('/page/indigo')}}">Indigo</a></li>
							<li><a href="{{URL::to('/page/goair')}}">GoAir</a></li>
							<li><a href="{{URL::to('/page/spicejet')}}">SpiceJet</a></li>
							<li><a href="{{URL::to('/page/air-aisa')}}">Air Asia</a></li>
							<li><a href="{{URL::to('/page/vistara')}}">Vistara</a></li>
							<li><a href="{{URL::to('/page/air-india')}}">Air India</a></li> -->

						
							<li><a href="{{url('about-us')}}">About us</a></li>
							<li><a href="{{url('terms-and-conditions')}}">Terms and Conditions
							</a></li>
							<li><a href="{{url('privacy-policy')}}">Privacy Policy
							</a></li>
							<li><a href="{{url('contact')}}">Contact Us
							</a></li>
							<li><a href="{{url('become-an-affiliate')}}">Travel24hr Affiliates
							</a></li>
							
							<li><a href="#">Refer a customer
							</a></li>
							<li><a href="#">Blog
							</a></li>
							<li><a href="{{url('career')}}">Careers
							</a></li>
						</ul>
						<!-- <p class="text-center"><img src="{!! asset('public/images/payment-cards.jpg') !!}"></p> -->
					</div>
					<div class="col-sm-6 pr-0" style="display:none;"> 
						<ul class="social_footer_ul">
							@foreach($sites as $key => $value)
							
				        @if($value->title == 'Facebook')
						<li><a href="{{$value->content}}">
							<i class="fab fa-facebook"></i>
						</a></li>
						@endif
							
				        @if($value->title == 'Twitter')
						<li><a href="{{$value->content}}">
							<i class="fab fa-twitter"></i>
						</a></li>
						@endif
							
				    
				        @if($value->title == 'Instagram')
						<li>
						<a href="{{$value->content}}">
							<i class="fab fa-instagram"></i>
						</a>
						</li>
						@endif
							@endforeach
						</ul>
					</div>	   
					<div class="col-sm-12">
						<div class="copyright_p">
							<p class="text-center">Copyright @ {{ date('Y')}} Travel24hr.com | All Rights Reserved.</p>
						</div>	
					</div>	
				</div>	
			</div>
		</div>
	</footer> 
	<div class="side-panel-menu">
		<a class="logo logo-side-panel" href="{{URL::to('/')}}">
			<img src="{!! asset('public/images/logo-header-alt.png') !!}" alt="">
			<h3><span class="colored">Travel24hr.com</span></h3>
			<span>Travel Portal</span>
		</a><!-- .logo end -->
		<div class="mobile-side-panel-menu">
			<ul id="menu-mobile" class="menu-mobile">
				
			</ul>
			<ul id="menu-mobile" class="menu-mobile"  style="margin-top: -30px;">
			<li><a href="#"  target="_blank"> Booking Status</a></li>
			
 <li><a href="/login">LOGIN/SIGNUP</a></li></ul>
			<!-- .mobile-menu-categories end -->
		</div><!-- .mobile-side-panel-menu end -->
		<div class="side-panel-close">
			<div class="hamburger hamburger--slider is-active">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div><!-- .side-panel-close end -->
	</div><!-- .side-panel-menu end -->  	