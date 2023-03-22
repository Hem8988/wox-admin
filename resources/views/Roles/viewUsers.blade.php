@extends('layouts.admin')
@section('title', 'User')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Users</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Users</li>
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
				<div class="col-md-12 agent_view">
					<div class="card card-primary profile_info">
						 <div class="card-header profile_header">
							<h3 class="card-title">Personal Information</h3>
							<div class="nav-item dropdown action_dropdown cus_action_btn">
								<a href="javascript:;" onclick="history.go(-1);" class="nav-link btn btn-primary btn-rounded back_btn"><i class="fa fa-arrow-left"></i> Back</a>  
							</div>
						</div>
						<div class="card-body">	
							<div class="row"> 
								<div class="col-sm-6">
									<div class="table-responsive">
										<table class="table">
											<tbody>
												<tr>
                                                    @php
                                                        // dd($admin);
                                                    @endphp
													<th>Full Name</th>
													<td>{{ ucfirst(@$fetchedData->first_name)}}  {{@$fetchedData->last_name}}</td>
												</tr>
												<tr>
													<th>Email</th>
													<td>{{@$fetchedData->email}}</td>
												</tr>
												<tr>
													<th>Phone</th>
													<td>{{@$fetchedData->phone}}</td>
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
													<th>Password</th>
													<td>{{@$fetchedData->decrypt_password}}</td>
												</tr>
												<tr>
													<th>Role Name</th>
													<td>{{@UserType($fetchedData->role)}}</td>
												</tr>						
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
</div>
@endsection