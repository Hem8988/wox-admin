@extends('layouts.admin')
@section('title', 'Site Information')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Site Information</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Site Information</li>
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
					<div class="custom-error-msg">
				</div>
					<!-- Flash Message End -->
				</div>
				<div class="col-md-12">
					<div class="card"> 
						<div class="card-header">  
							<div class="card-title">  
								<!--<a href="{{route('admin.site_information.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> New Site Information</a>-->
								<a style="display:none;" class="btn btn-primary displayifselected" href="javascript:;" onClick="deleteAllAction('exclusions')"><i class="fa fa-trash"></i> Delete</a> 
							</div> 
							<div class="card-tools card_tools">
								<!--<div class="input-group input-group-sm" style="width: 150px;">
									<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
									<div class="input-group-append">
										<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
									</div>
								</div>-->
								<div class="row">
									<div class="col-md-4">
										<a href="javascript:;" data-toggle="modal" data-target="#excusearch_modal" class="btn btn-primary"><i class="fas fa-search"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body table-responsive">
							<table id="exclustiontable"  class="table table-bordered table-hover text-nowrap">
							  <thead> 
								<tr>
								{{-- <th><input type="checkbox" id="checkedAll"></th> --}}
								<th>Sn.No</th>
								  <th>Title</th>
								   <th>Content</th>
								  <th class="no-sort">Status</th> 
								  <th class="no-sort">Action</th>
								</tr> 
							  </thead>
							  <tbody class="tdata">	
							  @foreach($informations as $key => $value)
							  <tr> 
									<td>{{@$key+1}}</td>
								   <td> {{$value->title}}</td>
								     <td> 
									 	@if($value->type == 'file')
									    {{$value->content}}
										<img src="{{asset('setting').'/'.$value->content}}"  width="100px" height="100px"/>
										@else
											{{$value->content}}
										@endif
									 
									 </td>
									   <td> 
									   @if($value->status == 1)
										    <span class="badge badge-success">Active</span>
										@else
										 <span class="badge badge-danger">Deactive</span>
										 @endif
									   </td>
									   <td>
									     
											<div class="nav-item dropdown action_dropdown">
											<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
											<div class="dropdown-menu">
											<a href="{{URL::to('/admin/site_information/edit/'.base64_encode(convert_uuencode(@$value->id)))}}"><i class="fa fa-edit"></i> Edit</a>

											</div>
										</div> 
									   </td>

									   </tr>
							  @endforeach	
							  </tbody>
							  {{-- <tbody>
									<tr>
										<td style="text-align:center;" colspan="4">
											No Record found
										</td>
									</tr>
								</tbody> --}}
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
<div class="modal fade" id="excusearch_modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				  <h4 class="modal-title">Exclusion Search</h4>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
			</div>
			<form action="{{route('admin.manageexclusion.index')}}" method="get">
				<div class="modal-body"> 
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label for="exc_id" class="col-sm-2 col-form-label">ID</label>
								<div class="col-sm-10">
									{{ Form::text('exc_id', Request::get('exc_id'), array('class' => 'form-control', 'data-valid'=>'', 'autocomplete'=>'off','placeholder'=>'ID', 'id' => 'exc_id' )) }}
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label for="name" class="col-sm-2 col-form-label">Exclusion Name</label>
								<div class="col-sm-10">
									{{ Form::text('name', Request::get('name'), array('class' => 'form-control', 'data-valid'=>'', 'autocomplete'=>'off','placeholder'=>'Destination Name', 'id' => 'name' )) }}
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="modal-footer justify-content-between">
				  <a href="{{route('admin.manageexclusion.index')}}" class="btn btn-default" >Reset</a>
				  <button type="submit" id="" class="btn btn-primary">Search</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection