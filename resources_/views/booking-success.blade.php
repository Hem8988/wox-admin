@extends('layouts.frontend')
@section('title', 'FAQ')
@section('content')

<!-- Content
		============================================= -->
		<div class="container">
		<div class="bokgsuss">
<h1>Booking Confirmation</h1>
<div class="book_sus">
	<span><img src="{{asset('images/booking-sus.png')}}" class="img-res"></span>
	@if(auth()->guard('agents')->user())
	<h3>Dear Mr {{auth()->guard('agents')->user()->first_name .''. auth()->guard('agents')->user()->lastname}}</h3>
	@else
<h3>Dear Mr {{auth()->user()->first_name .''. auth()->user()->lastname}}</h3>
@endif
<p>Congratulations! Your Flight Booking is <span>Success</span></p>
<P>24hr.lightmytrip Reference Number : {{ $flight["flight_details"]["data"]["associatedRecords"][0]["reference"] }}</P>

<ul class="dpxs">
	<li><a href="{{url('booking-confirmation?id='.$booking->id)}}"><i class="fas fa-print"></i>&nbsp;Print</a></li>
	<li><a href="{{URL::to('booking-confirmation')}}"><i class="far fa-file-pdf"></i>&nbsp;Save PDF</a></li>
	<li><a href="#"><i class="fab fa-whatsapp"></i>&nbsp;Whatsapp</a></li>
	<li><a href="#"><i class="far fa-envelope"></i>&nbsp;E-mail</a></li>
	<li><a href="#"><i class="far fa-comment"></i>&nbsp;SMS</a></li>
	<li><a href="#">&#8358;&nbsp;Markup </a></li>

</ul>
</div>
			</div>

			
			

		</div>

@endsection