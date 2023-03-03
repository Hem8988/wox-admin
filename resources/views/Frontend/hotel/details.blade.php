@extends('layouts.frontend')
@section('title', 'Hotel Details')
@section('content')

<!-- Content
		============================================= -->
        <div class="changes_ht">
			<section id="banner">
				<div class="slide-content">


					<div class="container">
						<div class="listserch_hotel d-flex">
							<ul class="d-flex">
								<li>Austrian Alps, AT</li>
								<li>May 28, 2022 - May 31, 2022</li>
								<li><span><i class="fa fa-user"></i></span>&nbsp;1 Room, 1 Adult</li>
							</ul>

							<div class="modify_hotel">
								<button class="btnmdy" type="button">Modify&nbsp;<i class="fa fa-edit"></i></button>
							</div>
						</div>


					</div>
				</div>
			</section>
		</div>
        <div class="container">
			<div class="headhotel_v" id="overv">
				<div class="text-head-v">
					<h3>Selina Bad Gastein</h3>
					<span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;KAISER FRANZ JOSEF STRASSE, 6, BADGASTEIN. Postal
						Code&nbsp;&nbsp;:&nbsp;&nbsp;5640</span>
				</div>

				<div class="text-toprixe">
					<div class="txtleft_topprix">
						<h4><b>&#8358;&nbsp;16,042</b>
							<span>Per night per room</span>
						</h4>
						<span><b>₦16,042 for 1 night 1 room(s)</b></span>
						<span>Includes taxes & fees</span>
					</div>

					<div class="txtright_topprix">
						<a href="#chroom">CHOOSE ROOM</a>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-7 ">
					<div class="bannes_view">
						<div id="viewslder" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#viewslder" data-slide-to="0" class="active"></li>
								<li data-target="#viewslder" data-slide-to="1"></li>
								<li data-target="#viewslder" data-slide-to="2"></li>
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item active">
									<img src="http://24hr.lightmytrip.com/public/images/viewimg1.jpg" alt="">
								</div>

								<div class="item">
									<img src="http://24hr.lightmytrip.com/public/images/viewimg2.jpg" alt="">
								</div>

								<div class="item">
									<img src="http://24hr.lightmytrip.com/public/images/viewimg1.jpg" alt="">
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="left carousel-control" href="#viewslder" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"><i class="fa fa-angle-left"></i></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#viewslder" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"><i class="fa fa-angle-right"></i></span>
								<span class="sr-only">Next</span>
							</a>
						</div>

						<div class="listfst">
							<span><img src="http://24hr.lightmytrip.com/public/images/Free-breakfast.svg"
									alt="">&nbsp;Free breakfast</span>
							<span><img src="http://24hr.lightmytrip.com/public/images/Pool.svg" alt="">&nbsp;Pool</span>
							<span><img src="http://24hr.lightmytrip.com/public/images/Free-WIFI.svg" alt="">&nbsp;Free
								WIFI</span>
							<span><img src="http://24hr.lightmytrip.com/public/images/Free-parking.svg"
									alt="">&nbsp;Free parking</span>
							<span><img src="http://24hr.lightmytrip.com/public/images/Bathtub.svg"
									alt="">&nbsp;Bathtub</span>
							<h6>
								<a href="#overv">Overview</a>
								<span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
								<a href="#">Amenities</a>
							</h6>


						</div>
					</div>
				</div>

				<div class="col-sm-5">
					<div class="maplink">
						<iframe
							src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10860.823227438128!2d13.134112!3d47.114638!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xeb514aef63d392e0!2zNDfCsDA2JzUyLjciTiAxM8KwMDgnMDIuOCJF!5e0!3m2!1sen!2sus!4v1653732901894!5m2!1sen!2sus"
							allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						<span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;KAISER FRANZ JOSEF STRASSE, 6, BADGASTEIN.
							Postal Code&nbsp;&nbsp;:&nbsp;&nbsp;5640</span>

					</div>
				</div>
			</div>



			<div class="row" id="chroom">
				<div class="col-sm-12">
					<div class="headingcls">
						<h2>Your Room Choices</h2>
					</div>

					<div class="tablebox">
						<div class="tbbox1 bggray_tb">
							<div class="box_ybtxt">
								<div class="imgsc_tb"><img src="http://24hr.lightmytrip.com/public/images/roombx.jpg"
										alt=""></span>
									<span><i class="fa fa-camera"></i>&nbsp;5</span>
								</div>
								<h3>Superior Double Room, 1 Queen Bed</h3>
								<span><i class="fa fa-bed"></i>&nbsp;1 Queen Bed</span>
								<a href="#">Show Room Information</a>
							</div>
						</div>
						<div class="tbbox1">
							<div class="headtb">
								&nbsp;
							</div>

							<div class="cnrview pdbxtb text-center">
								<span>!&nbsp;Cancellations</span>
							</div>
						</div>
						<div class="tbbox1">
							<div class="headtb">
								<h3 class="text-center">No. of Rooms</h3>
							</div>
							<div class="cnrview text-center pdbxtb">
								<span>1</span>
							</div>
						</div>
						<div class="tbbox1">
							<div class="headtb ">
								<h3 class="text-right">Average nightly price per room</h3>
							</div>

							<div class="cnrview  pdbxtb">
								<div class="txtleft_topprix">
									<h4><b>&#8358;&nbsp;16,042</b>
										<span>Per night per room</span>
									</h4>
									<span><b>₦16,042 for 1 night 1 room(s)</b></span>
									<span>Includes taxes & fees</span>
								</div>

								<div class="txtright_topprix text-right mt-10">
									<a href="#">Book Now</a>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="headingcls brtop">
						<h2>At a glance</h2>
					</div>
				</div>

				
				<div class="col-sm-4">
					<div class="at_txt">
						<h5>Size</h5>
						<ul class="listviw">
							<li>23 Rooms</li>
						</ul>
					</div>

					<div class="at_txt">
						<h5>Arriving/leaving</h5>
						<p class="grnv_cl"><i class="fa fa-comment-dots"></i>&nbsp;96% of customers were happy with check-in</p>
						<ul class="listviw">
							<li>Check-in time 3:00 PM-anytime</li>
							<li>Check-out time 11:00 AM</li>
						</ul>
					</div>


					<div class="at_txt">
						<h5>Restrictions related to your trip</h5>
						<ul class="listviw">
							<li>This destination may have COVID-19 travel restrictions in place, including specific restrictions for lodging, check any national, local, and health advisories for this destination before you book.</li>
							
						</ul>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="at_txt">
						<h5>Special check-in instructions</h5>
						<p>To make arrangements for check-in please contact the property at least 24 hour before arrival using the information on the booking confirmation. Guest must contact the property in advance for check-in instructions. Front desk staff will greet guests on arrival.</p>
					</div>

					<div class="at_txt">
						<h5>Required at check-in</h5>
						<ul class="listviw">
							<li>Credit card, debit card, or cash deposit required for incidental charges</li>
							<li>Government-issued photo ID may be required</li>
							<li>Minimum check-in age is 18</li>
						</ul>
					</div>


				</div>

				<div class="col-sm-4">
					<div class="at_txt">
						<h5>Pets</h5>
						<ul class="listviw">
							<li>Pets stay free (dogs and cats only)</li>
							<li>Service animals welcome</li>
						</ul>
					</div>

					<div class="at_txt">
						<h5>Internet</h5>
												<ul class="listviw">
						<li>Free WiFi in public areas</li>
						<li>Free WiFi in room</li>
						
						</ul>
					</div>

					
					<div class="at_txt">
						<h5>Parking</h5>
												<ul class="listviw">
						<li><i>Free onsite self parking</i>></li>
						<li>Free onsite valet parking</li>
						
						</ul>
					</div>


				</div>

				<div class="col-sm-12">
					<div class="crfr">
						<a href="#">*See fees and policies for additional details or extra changes&nbsp;&nbsp;<i class="fa fa-arrow-down"></i></a>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="headingcls brtop">
						<h2>At the property</h2>
					</div>
				</div>

				
				<div class="col-sm-4">
					<div class="at_txt">
						<h5>Taking the kids?</h5>
						<ul class="listviw">
							<li>In-room childcare (surcharge)</li>
						</ul>
					</div>

					<div class="at_txt">
						<h5>Food and drink</h5>
						<ul class="listviw">
							<li>Free full breakfast daily</li>
							<li>Restaurant</li>
							<li>Bar/lounge</li>
							<li>room service (during limited hours)</li>
							<li>Barbecue grills</li>
						</ul>
					</div>


				
				</div>

				<div class="col-sm-4">
										<div class="at_txt">
					
						<ul class="listviw">
						<li>Number of spa tubs-1</li>
						<li>Playground on site</li>
						<li>snowboarding nearby</li>
						<li>Free pool cabanas</li>
						<li>Steam room</li>
						<li>Pool sun loungers</li>
						<li>Sauna</li>
						<li>Pool umbrellas</li>
						
						</ul>
					</div>


				</div>

				<div class="col-sm-4">
					<div class="at_txt">
						
						<ul class="listviw">
							<li>Tours/ticket assistance</li>
						<li>laundry facilities</li>
						<li>Free newspapers in lobby</li>
						<li>Luggage storage</li>
					
						</ul>
					</div>

					<div class="at_txt">
						<h5>Facilities</h5>
												<ul class="listviw">
					<li>Year Built - 2018</li>
					<li>Safe-deposit box at front desk</li>
					<li>Designated smoking areas (fines apply)</li>
				
						</ul>
					</div>

					
					


				</div>

			
			</div>

		</div>



@endsection
