@extends('layouts.agent')
@section('title', 'Agent Dashboard')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<?php $userlog = \App\LoginLog::where('user_id', Auth::user()->id)->orderby('created_at', 'DESC')->first();			
				?>
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
			</div>
			<div class="book_service">
				<h3>Book Services</h3>
				<ul>
					<li><a href="{{route('agent.flights')}}" target="_blank"><span class="flight_icon book_icon"></span><span class="book_label">Flights</span></a></li>
					<li><a href="#"><span class="hotel_icon book_icon"></span><span class="book_label">Hotels</span></a></li>
					<li><a href="#"><span class="bus_icon book_icon"></span><span class="book_label">Bus</span></a></li>
					<li><a href="#"><span class="holidays_icon book_icon"></span><span class="book_label">Holidays</span></a></li>
					<li><a href="#"><span class="blog_icon book_icon"></span><span class="book_label">Blog</span></a></li>
				</ul>
			</div>
			<div class="dashboard_status_list">
				<h4>Today Status</h4>
				<div class="row dash_box">
					<div class="col-12 col-sm-6 col-md-3">
						<a href="#"><div class="info-box">
							<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Cash Balance</span>
								<span class="info-box-number">{{@Auth::user()->wallet}}</span>
							</div>
						  <!-- /.info-box-content -->
						</div></a>
						<!-- /.info-box -->
					</div>
					<?php
					$depositreq = \App\Wallet::where('user_id', Auth::user()->id)->count();
					?>
					<div class="col-12 col-sm-6 col-md-3">
						<a href="#"><div class="info-box">
							<span class="info-box-icon bg-info elevation-1"><i class="fas fa-credit-card"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Deposite Request</span>
								<span class="info-box-number">{{@$depositreq}}</span>
							</div>
						  <!-- /.info-box-content -->
						</div></a>
						<!-- /.info-box -->
					</div>
					<div class="col-12 col-sm-6 col-md-3">
						<a href="#"><div class="info-box">
							<span class="info-box-icon bg-success elevation-1"><i class="fas fa-question"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Last Login IP</span>
								<span class="info-box-number">{{@$userlog->ip}}</span>
							</div>
						  <!-- /.info-box-content -->
						</div></a>
						<!-- /.info-box -->
					</div>
					<div class="col-12 col-sm-6 col-md-3">
						<a href="#"><div class="info-box">
							<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-calendar"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">Last Login Date</span>
								<span class="info-box-number">{{date('h:i A, d M Y', strtotime(@$userlog->date))}}</span>
							</div>
						  <!-- /.info-box-content -->
						</div></a>
						<!-- /.info-box -->
					</div>
				</div>	
				<h4>Pending Work</h4>
				<div class="row dash_box">
					<div class="col-12 col-sm-6 col-md-3">
						<a href="#"><div class="info-box">
							<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-plane"></i></span>
							<div class="info-box-content">
								<span class="info-box-number">Flight</span>
								<span class="info-box-text">Refunds</span>
							</div>
						  <!-- /.info-box-content -->
						</div></a>
						<!-- /.info-box -->
					</div>
					<div class="col-12 col-sm-6 col-md-3">
						<a href="#"><div class="info-box">
							<span class="info-box-icon bg-info elevation-1"><i class="fas fa-bed"></i></span>
							<div class="info-box-content">
								<span class="info-box-number">Hotel</span>
								<span class="info-box-text">Refunds</span>
							</div>
						  <!-- /.info-box-content -->
						</div></a>
						<!-- /.info-box -->
					</div>
					<div class="col-12 col-sm-6 col-md-3">
						<a href="#"><div class="info-box">
							<span class="info-box-icon bg-success elevation-1"><i class="fas fa-bus"></i></span>
							<div class="info-box-content">
								<span class="info-box-number">Bus</span>
								<span class="info-box-text">Refunds</span>
							</div>
						  <!-- /.info-box-content -->
						</div></a>
						<!-- /.info-box -->
					</div>
				</div>
				<h4>Today's Successful Booking</h4>
				<?php $booking = \App\BookingDetail::where('agent_id', Auth::user()->id)->where('type', 'b2b')->where('status', 1)->count();			
				?>
				<div class="row dash_box">
					<div class="col-12 col-sm-6 col-md-3">
						<a href="#"><div class="info-box">
							<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-plane"></i></span>
							<div class="info-box-content">
								<span class="info-box-number">Flight</span>
								<span class="info-box-text">{{@$booking}}</span>
							</div>
						  <!-- /.info-box-content -->
						</div></a>
						<!-- /.info-box -->
					</div>
					
					<div class="col-12 col-sm-6 col-md-3">
						<a href="#"><div class="info-box">
							<span class="info-box-icon bg-info elevation-1"><i class="fas fa-bed"></i></span>
							<div class="info-box-content">
								<span class="info-box-number">Hotel</span>
								<span class="info-box-text">0</span>
							</div>
						  <!-- /.info-box-content -->
						</div></a>
						<!-- /.info-box -->
					</div>
					<div class="col-12 col-sm-6 col-md-3">
						<a href="#"><div class="info-box">
							<span class="info-box-icon bg-success elevation-1"><i class="fas fa-bus"></i></span>
							<div class="info-box-content">
								<span class="info-box-number">Bus</span>
								<span class="info-box-text">0</span>
							</div>
						  <!-- /.info-box-content -->
						</div></a>
						<!-- /.info-box -->
					</div> 
				</div>				
			</div>
		</div>
	</section>
</div>
@endsection