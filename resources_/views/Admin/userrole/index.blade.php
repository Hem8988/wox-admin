@extends('layouts.admin')
@section('title', 'User Role')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">User Role</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">User Role</li>
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
							<div class="float-right">
								<a href="{{route('admin.userrole.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create User Role</a>
							</div>
						</div>
						<div class="card-body table-responsive p-0">
							<table class="table table-hover text-nowrap">
							  <thead>
								<tr>
								  <th>User Role Type</th>								 
								  <th style="text-align: center;">Action</th>
								</tr> 
							  </thead>
							  <tbody class="tdata">
								@if(@$totalData !== 0)
								@foreach (@$lists as $list)	
									<?php $module_access = json_decode(@$list->module_access);
										$modu = implode(', ', $module_access);
									?>
								<tr id="id_{{@$list->id}}"> 
									<td>{{ @$list->usertypedata->name == "" ? config('constants.empty') : str_limit(@$list->usertypedata->name, '50', '...') }}</td> 
								  
									<td>
										<div class="nav-item dropdown action_dropdown">
											<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
											<div class="dropdown-menu">
												<a href="{{URL::to('/admin/userrole/edit/'.base64_encode(convert_uuencode(@$list->id)))}}"><i class="fa fa-edit"></i> Edit</a>
												<a href="javascript:;" onClick="deleteAction({{@$list->id}}, 'user_roles')"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>								  
									</td>
								</tr>	
								@endforeach								
							  </tbody>
							  @else
							  <tbody>
									<tr>
										<td style="text-align:center;" colspan="2">
											No Record found
										</td>
									</tr>
								</tbody>
							@endif	
							</table>
						  </div>
					</div>	
				</div>	
			</div>
		</div>
	</section>
</div>
@endsection