@extends('layouts.admin')
@section('title', 'Visa')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Visa</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Visa Details</li>
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
							 
							<div class="card-tools card_tools">
								
							</div>
						</div>  
						<div class="card-body table-responsive">
							<table id="hoteltable" class="table table-bordered table-hover text-nowrap">
							  <thead>
								<tr>
								  <th>First Name</th>								  
								  <th>Last Name</th>
								  <th>Email ID</th>
								  <th>Phone No</th>
								  {{-- <th>Departure Dt.</th>
								  <th>Return Dt.</th>
								  <th>Passport No.</th> --}}
								  <th>Residence</th>
								  <th>Destination</th>
								  <th>Status</th>
								  <th>Created</th>
								  <th class="no-sort">Action</th>
								</tr> 
							  </thead>
							    <tbody class="tdata">	
							  
								@foreach (@$lists as $list)	
								<tr id="id_{{@$list->id}}">  
								  <td>{{ @$list->first_name == "" ? config('constants.empty') : str_limit(@$list->first_name, '50', '...') }}</td> 
								  <td>{{ @$list->last_name }}</td> 
								  <td>{{ @$list->email_id }}</td> 
								  <td>{{ @$list->phone_no }}</td> 								   
								  {{-- <td>{{ @$list->departure_date }}</td> 								    --}}
								  {{-- <td>{{ @$list->return_date }}</td> 								    --}}
								  {{-- <td>{{ @$list->passport_no }}</td> 								    --}}
								  <td>{{ @$list->residence_country }}</td> 								   
								  <td>{{ @$list->destination_country }}</td> 								   
								  <td>{{ @$list->status }}</td> 								   
								  <td>{{ @$list->created_at->format('Y/m/d') }}</td> 								   
				
								  <td>
									<div class="nav-item dropdown action_dropdown">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
										<div class="dropdown-menu">
											<a href="{{URL::to('/admin/visa/edit/'.base64_encode(convert_uuencode(@$list->id)))}}"><i class="fa fa-edit"></i> Edit</a>
											
										</div>
									</div>
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