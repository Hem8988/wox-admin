@extends('layouts.admin')
@section('title', 'Flights APIs')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Flights APIs</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Flights APIs</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->	
	<!-- Breadcrumb start-->
	<!--<ol class="breadcrumb">
		<li class="breadcrumb-item active">
			Home / <b>Dashboard</b>
		</li>
		@include('../Elements/Admin/breadcrumb')
	</ol>-->
	<!-- Breadcrumb end-->
	
	<!-- Main content --> 
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
					<div class="card"> 
						<div class="card-header">   
							<div class="card-title">
								<a href="{{route('admin.flightsapis.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> New GSD API</a> 
							</div> 
							<div class="card-tools card_tools">
								
							</div>
						</div>  
						<div class="card-body table-responsive">
							<table id="hoteltable" class="table table-bordered table-hover text-nowrap">
							  <thead>
								<tr>
								  <th>Name</th>								  
								  <th>User Name</th>
								  <th>Password</th>
								  <th>APIs URL</th>
								  <th class="no-sort">Action</th>
								</tr> 
							  </thead>
							    <tbody class="tdata">	
							  
								@foreach (@$lists as $list)	
								<tr id="id_{{@$list->api_details_id}}">  
								  <td>{{ @$list->api_name == "" ? config('constants.empty') : str_limit(@$list->api_name, '50', '...') }}</td> 
								  <td>{{ @$list->api_username }}</td> 
								  <td>{{ @$list->api_password }}</td> 
								  <td>{{ @$list->api_url }}</td> 								   
				
								  <td>
									<!--<div class="nav-item dropdown action_dropdown">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
										<div class="dropdown-menu">
											<a href="{{URL::to('/flights-apis/edit/'.base64_encode(convert_uuencode(@$list->api_details_id)))}}"><i class="fa fa-edit"></i> Edit</a>
											
										</div>
									</div> -->
								  </td>
								</tr>	
							  @endforeach	
								
							  </tbody> 
							 
							</table>
							<div class="card-footer hide">
							{{-- {!! $lists->appends(\Request::except('page'))->render() !!} --}}
							 </div>
						  </div>
					</div>	
				</div>	
			</div>
		</div>
	</section>
</div>
@endsection