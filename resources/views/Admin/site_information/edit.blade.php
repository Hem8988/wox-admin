@extends('layouts.admin')
@section('title', 'New Manage Hotel')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Manage Site Information</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Manage Site Information</li>
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
						<h3 class="card-title">Edit Site Information</h3>
					  </div>
					  <!-- /.card-header -->
					  <!-- form start -->
                       <form  enctype="multipart/form-data" method="post" action="{{ url('site_information/edit') }}" novalidate>
					  {{-- {{ Form::open(array('url' => 'site_information/edit', 'name'=>"", 'autocomplete'=>'off', "enctype"=>"multipart/form-data",'novalidate')) }} --}}
						 @csrf
                         {{ Form::hidden('id', @$site->id) }}
                        <div class="card-body">
							<div class="form-group" style="text-align:right;">
								<a style="margin-right:5px;" href="{{route('admin.site_information.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>  
								{{ Form::button('<i class="fa fa-save"></i> Save Site Information', ['class'=>'btn btn-primary','type'=>'submit' ]) }}
							</div>
						 
						 
						  <div class="form-group row"> 
								<label for="name" class="col-sm-2 col-form-label">Title <span style="color:#ff0000;">*</span></label>
								<div class="col-sm-10">
								{{ Form::text('title', $site->title, array('class' => 'form-control', 'data-valid'=>'required', 'autocomplete'=>'off','placeholder'=>'Enter Hotel Name' )) }}
							
                            	@if ($errors->has('title'))
									<span class="custom-error" role="alert">
										<strong>{{ @$errors->first('title') }}</strong>
									</span> 
								@endif
								</div>
						  </div>
                          <div class="form-group row">
								<label for="dest_type" class="col-sm-2 col-form-label">Type <span style="color:#ff0000;">*</span></label>
								<div class="col-sm-10">
									<select name="type" id="site_information_type" data-valid="required" class="form-control" autocomplete="new-password">
										<option value="">-- Select Type --</option>
										<option value="text" @if(@$site->type == 'text') selected  @endif>Text</option>
										<option value="file" @if(@$site->type == 'file') selected  @endif>File</option>
										{{-- <option value="content" @if(@$site->type == 'content') selected  @endif>Content</option> --}}
										<option value="link" @if(@$site->type == 'link<') selected  @endif>Link</option>
									</select>							
									@if ($errors->has('type'))
										<span class="custom-error" role="alert">
											<strong>{{ @$errors->first('type') }}</strong>
										</span> 
									@endif
							   </div>	
						  </div>	
						 
						  <div class="form-group row">
								<label for="description" class="col-sm-2 col-form-label">Content <span style="color:#ff0000;">*</span></label>
								<div class="col-sm-10">
                                    @if($site->type == 'text')
                                	{{ Form::text('content', $site->content, array('class' => 'form-control', 'data-valid'=>'required','id'=>'text', 'autocomplete'=>'off','placeholder'=>'Enter content' )) }}
							        @endif
                                     @if($site->type == 'file')
                                     <input type="file" name="content" id="file" class="form-control"  data-valid="" />
									@endif							        
                                     {{-- @if($site->type == 'link') --}}
									@if($site->type == 'link')
								
                                	{{ Form::url('content',$link, array('class' => 'form-control','id'=>'link', 'data-valid'=>'required', 'autocomplete'=>'off','placeholder'=>'Add Link' )) }}
							        @endif
                                     {{-- @if($site->type == 'content') --}}
                                     	{{-- <textarea name="content" data-valid="required" id="content" class="form-control" placeholder="Please Add Description Here" >{{ @$site->content }}</textarea> --}}
							        {{-- @endif --}}
									@if ($errors->has('content'))
										<span class="custom-error" role="alert">
											<strong>{{ @$errors->first('content') }}</strong>
										</span> 
									@endif
								</div>
						  </div>						  
						  <div class="form-group row">
								<label for="status" class="col-sm-2 col-form-label">Status</label>
								<div class="col-sm-10">
									<input value="{{$site->status}}" type="checkbox" name="status" @if($site->status == 1) checked @endif data-bootstrap-switch>
									@if ($errors->has('status'))
										<span class="custom-error" role="alert">
											<strong>{{ @$errors->first('status') }}</strong>
										</span> 
									@endif
								</div>
						  </div>
						  <div class="form-group float-right">
							{{ Form::button('<i class="fa fa-save"></i> Save Site Information', ['class'=>'btn btn-primary','type'=>'submit']) }}
						  </div> 
						</div>  
					  {{-- {{ Form::close() }} --}}
                      </form>
					</div>	
				</div>	
			</div>
		</div>
	</section>
</div>
@endsection

@section('scripts')
<script>
jQuery(document).ready(function($){
    $(window).on('load', function () {
		$('#file').css('display','none');
       $('#text').css('display','none');
       $('#link').css('display','none');
	  
        var site = "{{ $site->type}}";
		 console.log(site)
      checkType(site)
 });
   $('#site_information_type').on('change',function(){
       $('#file').css('display','none');
       $('#text').css('display','none');
       $('#link').css('display','none');
       var result = $('#site_information_type option:selected').val();
       checkType(result)

	});

function checkType(input){
     
	 if(input == 'file'){
        $('#file').css('display','block');
	 }
	  if(input == 'link'){
        $('#link').css('display','block');
	 }
	  if(input == 'text'){
      $('#text').css('display','block');
	 }
	  
	}
});

</script>
@endsection