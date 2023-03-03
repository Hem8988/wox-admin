@extends('layouts.admin')
@section('title', 'Hotel Booking Detail')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Hotel Booking Detail</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Hotel Booking Detail</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<!-- Flash Message Start -->
					<div class="server-error">
						@include('../Elements/flash-message')
					</div>
					<!-- Flash Message End -->
				</div>
				<div class="col-md-12">
					<div class="card card-primary">
						 <div class="card-header">
							<h3 class="card-title">Guest Information</h3>
						</div>
						<?php
						//echo '<pre>'; print_r(json_decode($fetchedData->bookingib_request));
						$bookingib_request = json_decode($fetchedData->booking_request);
						//echo '<pre>'; print_r(json_decode($fetchedData->booking_request)); die;
						$hoteldetail = \App\HotelList::where('hotel_code', $fetchedData->hotel_code)->first();
						?>
						<div class="card-body">	
							<div class="row"> 
								<div class="col-sm-6">
									<div class="table-responsive">
										<table class="table">
											<tbody>
												<tr>
													<th>Hotel Code</th>
													<td>{{@$fetchedData->hotel_code}}</td>
												</tr>
												<tr>
													<th>Hotel Name</th>
													<td><?php echo $hoteldetail->hotel_name.','.$hoteldetail->city.'<br>'; ?></td>
												</tr>
												<tr>
													<th>Checkin</th>
													<td>{{date('h:i A, d m Y', strtotime($fetchedData->checkin))}}</td>
												</tr>
												<tr>
													<th>Checkout</th>
													<td>{{date('h:i A, d m Y', strtotime($fetchedData->checkout))}}</td>
												</tr>
												<tr>
													<th>Amount</th>
													<td><i class="fa fa-rupee-sign" style="vertical-align: middle;"></i> {{@$fetchedData->paymentdetail->amount}}</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>	
								<?php $toroom = 0;
									$adults = 0;
								?>
								@foreach($bookingib_request->adulttitle as $key => $roomdetail)
								<?php 
									$adults += count($roomdetail);
								$toroom++; ?>
								@endforeach
								<?php 
									$child = 0;
								?>
								@foreach($bookingib_request->childtitle as $keys => $roomcdetail)
								<?php 
									$child += count($roomcdetail);
								 ?>
								@endforeach
								<div class="col-sm-6">
									<div class="table-responsive">
										<table class="table">
											<tbody>
												<tr>
													<th>No of Rooms</th>
													<td>{{$toroom}}</td>
												</tr>
												<tr>
													<th>No of Adults</th>
													<td>{{$adults}}</td>
												</tr>
												<tr>
													<th>No of Child</th>
													<td>{{$child}}</td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>								
							</div>
						</div>
					</div>
					<div class="card card-primary profile_info">
						<div class="card-header profile_header">  
							<h3 class="card-title">Contact Information</h3>
						</div> 
						<div class="card-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="table-responsive">
										<table class="table">
											<tbody>
												<tr>
													<th>Email</th>
													<td>{{@$fetchedData->email}}</td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>	
								<div class="col-sm-6">
									<div class="table-responsive">
										<table class="table">
											<tbody>
												<tr>
													<th>Mobile</th>
													<td>{{@$fetchedData->mobile}}</td>
												</tr>
											</tbody>   
										</table>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					<div class="card card-primary profile_info">
						<div class="card-header profile_header">  
							<h3 class="card-title">Guest Information</h3>
						</div> 
						<div class="card-body">
							<div class="row">
							<?php
								$adultfirstname = $bookingib_request->firstname;
								$adultlastname = $bookingib_request->lastname;
							?>
							@foreach($bookingib_request->adulttitle as $key => $roomdetail)
							<?php //print_r(); ?>
								
									<div class="col-sm-6">
										<h4>Room {{$key}}</h4>
										<div class="table-responsive">
											<table class="table">
												<tbody>
												@foreach($roomdetail as $keys => $roompax)
												
													<tr>
														<th><?php echo $roompax; ?></th>
														<td><?php echo $adultfirstname->$key[$keys]; ?></td>
													</tr>
													@endforeach	
												</tbody>
											</table>
										</div>
									</div>
															
							@endforeach								
								
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
</div>
@endsection