@extends('layouts.admin')
@section('title', 'Create Blog')

@section('content')
 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Create Blog</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{URL::to('/admin/dashboard')}}">Home</a></li>
						<li class="breadcrumb-item active">Create Blog</li>
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
					<div class="card card-primary">
					  <div class="card-header">
						<h3 class="card-title">Create Blog</h3>
					  </div> 
					  <!-- /.card-header -->
					  <!-- form start -->
					  {{ Form::open(array('url' => 'admin/news/store', 'name'=>"add-template", 'autocomplete'=>'off', "enctype"=>"multipart/form-data")) }}
					   
						<div class="card-body">
							<div class="form-group" style="text-align:right;">
								<a style="margin-right:5px;" href="{{route('admin.news.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>  
								{{ Form::button('<i class="fa fa-save"></i> Save Blog', ['class'=>'btn btn-primary', 'onClick'=>'customValidate("add-template")' ]) }}
							</div>
							<div class="form-group row"> 
								<label for="title" class="col-sm-2 col-form-label">Name <span style="color:#ff0000;">*</span></label>
								<div class="col-sm-10">
								{{ Form::text('title', '', array('class' => 'form-control', 'data-valid'=>'required', 'autocomplete'=>'off','placeholder'=>'Enter Name' )) }}
								@if ($errors->has('title'))
									<span class="custom-error" role="alert">
										<strong>{{ @$errors->first('title') }}</strong>
									</span> 
								@endif
								</div>
						  </div>
						  
						  <div class="form-group row"> 
								<label for="image" class="col-sm-2 col-form-label">Image</label> 
								<div class="col-sm-10">
									<input type="file" name="image" class="form-control" autocomplete="off"  />
									@if ($errors->has('image'))
										<span class="custom-error" role="alert">
											<strong>{{ @$errors->first('image') }}</strong>
										</span> 
									@endif
								</div>
						  </div>
						  <div class="form-group row">
								<label for="description" class="col-sm-2 col-form-label">Description <span style="color:#ff0000;">*</span></label>
								<div class="col-sm-10">
									<textarea name="description" data-valid="required" value="" class="textarea" placeholder="Please Add Description Here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
									@if ($errors->has('description'))
										<span class="custom-error" role="alert">
											<strong>{{ @$errors->first('description') }}</strong>
										</span> 
									@endif
								</div>
						  </div>
						 
						  <div class="form-group float-right">
							{{ Form::button('<i class="fa fa-save"></i> Save Blog', ['class'=>'btn btn-primary', 'onClick'=>'customValidate("add-template")' ]) }}
						  </div> 
						</div> 
					  {{ Form::close() }}
					</div>	   
				</div>	
			</div>
		</div>
	</section>
</div>
@endsection