@extends('layouts.frontend')
@section('title', 'Coming Soon')
@section('content')

<style>
#full-container {
  
    background-color: #f9f9f9;
}


</style>

<!--content-->
<div class="container">
<div class="row pdtop_b">
	<div class="col-sm-8">
	<div class="mgbooking_txt">
<h1>Manage Booking</h1>
<h5>View/Cancel/Reschedule your Reservation</h5>
<span>(As a Guest User)</span>
<div class="frm_mgboking">
	<div class="prt">
		<div class="input-wrapper">
			<input type="text" id="user" required>
			<label for="user">Reference ID/Booking ID/PNR</label>
		  </div>

		  <div class="input-wrapper">
			<input type="text" required>
			<label for="user">Surename</label>
		  </div>

		  <div class="input-wrapper">
			<input type="text" required>
			<label for="user">Email Address</label>
		  </div>

		  <div class="mgsbmbtn">
<button type="submit" class="mgbtn">Submit</button>
		  </div>
	</div>

	<div class="tbds">
	<span class="ord">Or</span>
		<span>
			have a travel24hr account<br>
		Login to make the process even easier
		</span>
		<a href="https://24hr.lightmytrip.com/login">Login</a>
	</div>
</div>
	</div>
	</div>

	<div class="col-sm-4">
		<div class="bookingbox_mg">
<div class="topmg_bkg">
	<h4>Check out everything
		you can do in
		"Manage My Booking"</h4>
		<span><img src="http://24hr.lightmytrip.com/public/images/bookingmg.svg" alt="" /></span>
</div>
<div class="fls">
<ul>
	<li><span><img src="http://24hr.lightmytrip.com/public/images/checkedic.svg" alt="" /></span>Check, change or cancel your booking with ease</li>
	<li><span><img src="http://24hr.lightmytrip.com/public/images/checkedic.svg" alt="" /></span>Add bags, choose seats, hotels and more</li>
	<li><span><img src="http://24hr.lightmytrip.com/public/images/checkedic.svg" alt="" /></span>Get all your boarding passes in one click</li>
	<li><span><img src="http://24hr.lightmytrip.com/public/images/checkedic.svg" alt="" /></span>No more waiting in call centre queuses!</li>
	
</ul>
<span>Log in or enter your booking reference number to manage your booking.</span>
</div>



			</div>

			<ul class="rsllink">
				<li>How to reschedule your flight? <a href="#">Click Here</a></li>
				<li>How to cancel/claim refund of your flight? <a href="#">Click Here</a></li>
				<li>How to transfer wallet money to bank? <a href="#">Click Here</a></li>
			</ul>

	</div>
</div>
	</div>


	<br>	<br>

@endsection