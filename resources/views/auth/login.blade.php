@extends('layouts.frontend')
@section('title', 'View Print Booking')
@section('content')
<style>
#full-container {
  
    background-color: #f9f9f9;
}
.lgsla{  margin: 8% auto;}
.loginx{    width: 50%;     margin: auto;
   box-shadow: rgb(149 157 165 / 20%) 0px 8px 24px;
    padding: 20px 80px 20px 80px;
    border-radius: 10px; background: #fff;}
.usrl{  display: block;
    margin: -63px auto 20px auto;
    text-align: center;
    width: 100px;
    height: 100px;
    background: #f9f9f9;
    border-radius: 50px;
    padding: 20px;}
	.usrl>img{max-width: 100%; max-height: 100%;}
	.loginx .prt {
    width: 100%;
  
}
.inner_print_form h3{text-align: center;     color: #0376bd; margin-bottom: 20px;}
.loginx .mgsbmbtn .mgbtn {
    display: block;
    width: 100%;
    border-radius: 50px;
    margin-top: 20px;
    background: #0376bd;
    border: 1px solid #0376bd;
    line-height: 0;
    margin-bottom: 10px;
}
.btnForgetPwd{display: block; text-align: center; color: #000;}
.btnForgetPwd>i{margin-right: 5px; }
.neslis{display: block; text-align: center; margin-top: 20px;}
.rgst{color: #0376bd;
    cursor: pointer;
    font-weight: 600;}
</style>

<script>
$(document).ready(function(){
$("#rgbox").click(function(){
$("#register_tv").show();
$("#login_tv").hide();
});

$("#loginboxs").click(function(){
$("#register_tv").hide();
$("#login_tv").show();

});

$("#frgs").click(function(){
$("#register_tv").hide();
$("#login_tv").hide();
$("#forgot_tv").show();
});

$("#loginboxd1").click(function(){
$("#register_tv").hide();
$("#login_tv").show();
$("#forgot_tv").hide();
});

	$("body").on("submit","#form-registe", function(e){
	 e.preventDefault();
		alert('hello');
		var formData = $(this).serialize();
		$.ajax({
			url: "{{ route('user.register') }}",
			dataType: 'json',
			type: 'POST',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data: formData,
			success: function( data ){
				$('.loading').hide();
				//var obj = $.parseJSON(data);
				if (data.success) {
				 window.location.href = "{{url('/user')}}";
				}else{
					alert();
				}
			},
			error: function(response, jqXhr, textStatus, errorThrown ){
			
				if (response.status === 422) {
                        var errors = $.parseJSON(response.responseText);
                        $.each(errors.errors, function(key, value) {
                               $(".form-input").each(function(){
                                if($(this).attr("id") == key){
                               //  $(this).addClass("errors");
                                  $(this).after('<span class="errors">' + value + '</span>')
                                }
                            });
                             
                        });

                    }
			}
		}); 
	});
});
	</script>

<!-- Content
		============================================= -->
<div class="container">
	<!--login-->
	<div class="lgsla" id="login_tv" >
<div class="loginx">
<span class="usrl"><img src="http://24hr.lightmytrip.com/public/images/loginl.svg" alt="" /></span>
	<div class="inner_print_form">
		{{-- <form class="prt" method="" action=""> --}}
			<form class="prt" id="" method="POST" action="{{ route('login') }}">
			@csrf
			<h3>Sign in to Travel24hr</h3>
			<div class="input-wrapper">
			<input type="text" id="user" required name="email">
			<label for="user">Enter Your Email.</label>
		  </div>

		  <div class="input-wrapper">
			<input type="password" required name="password">
			<label for="user">Password</label>
		  </div>


		  <div class="mgsbmbtn">
<input type="submit" class="mgbtn" value="Sign In" />
		  </div>

			<div class="form-group">
				<a href="javascript:void(0)" class="btnForgetPwd" id="frgs"><i class="fa fa-key"></i>Forget Password?</a>
			</div>
		</form>
	</div></div>
	<span class="neslis">New to Travel24hr? <Span class="rgst" id="rgbox">Create an account</Span></span>
	</div>


	<!--Forgot-->
	<div class="lgsla" id="forgot_tv" style="display: none;">
<div class="loginx">
<span class="usrl"><img src="http://24hr.lightmytrip.com/public/images/psw.svg" alt="" /></span>
	<div class="inner_print_form">
		<form class="prt" method="" action="">
			<h3>Forgot Your Password</h3>
			<div class="input-wrapper">
			<input type="text" id="user" required >
			<label for="user">Enter Your Email </label>
		  </div>

		  <div class="mgsbmbtn">
<input type="submit" class="mgbtn" value="Send Email" />
		  </div>

		
		</form>
	</div></div>
	<span class="neslis">Already have an account? <Span class="rgst" id="loginboxd1">Login</Span></span>
	</div>

	<!--Register-->
	<div class="lgsla" id="register_tv" style="display: none;">
<div class="loginx">
<span class="usrl"><img src="http://24hr.lightmytrip.com/public/images/userl.svg" alt="" /></span>
	<div class="inner_print_form">

	{{-- {{ Form::open(array('url' => '/','method'=>'Post', 'name'=>"login",'id'=>'form-register', 'autocomplete'=>'off', 'class'=>'login-form')) }} --}}
		 <form class="prt" method="Post" action="" id="form-registe"> 
			<h3>Create An Account</h3>
			@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
			<div class="input-wrapper">
			<label for="user">First Name</label>
			<input class="form-input" type="text" id="first_name" name="first_name" required>
		  </div>
		  <div class="input-wrapper">
			<label for="user">Last Name</label>

			<input class="form-input" type="text" id="last_name" name="last_name" required>
		  </div>

		  <div class="input-wrapper">
			<label for="user">Enter Email</label>

			<input class="form-input" type="email" id="email" required name="email">
		  </div>

		  <div class="input-wrapper">
			<label for="user">Enter Mobile No</label>

			<input class="form-input" type="text" id="phone" required name="phone">
		  </div>
		  <div class="input-wrapper">
			<label for="user">Enter Password</label>

			<input class="form-input" type="password"  id="password" required name="password">
		  </div>
		  <div class="input-wrapper">
			<label for="user">Enter Confirmation Password</label>

			<input  class="form-input" type="password" id="password_confirmation" required name="password_confirmation">
		  </div>


		  <div class="mgsbmbtn">
                    <button type="submit" class="mgbtn" value="Register" > Register </button>
		  </div>

		
		
		
		
		
	</div></div>
	<span class="neslis">Already have an account? <Span class="rgst" id="loginboxs">Login</Span></span>
	{{ Form::close() }}	 
	</form>
	</div>



	<section id="content" style="display: none;">
		<div id="content-wrap">
			<!-- === Section Flat =========== -->
			<div class="section-flat single_sec_flat viewprint_page" style="background:#e8e8e8;">
				<div class="section-content">
					<div class="inner_travelagent">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<div class="cus_breadcrumb">
										<ul>
											<li class="active"><a href="#">Home</a></li>
											<li><span><i class="fa fa-angle-right"></i></span></li>
											<li><a href="#">View Print Booking</a></li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="view_print_form">
							<div class="container">
								<div class="row">

									<div class="col-sm-6 col-xs-12 login_form_2 custom_login_form">
										<div class="login-logo">
											<img src="{!! asset('public/images/zap-icon.png') !!}" alt="" />
										</div>
										<form class="" method="get" action="{{URL::to('/view-ticket')}}">
											<h3>View/Cancel/Reschedule your Reservation</h3>
											<div class="form-group">
												<input required name="ticket" type="text" class="form-control" placeholder="Reference ID/Booking ID/PNR" value="" />
											</div>
											<div class="form-group">
												<input required name="email" type="email" class="form-control" placeholder="Email Address" value="" />
											</div>
											<div class="form-group">
												<input type="submit" class="btnSubmit" value="Submit" />
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
</section>

@endsection