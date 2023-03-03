@extends('layouts.frontend')
@section('title', 'Contact Us')
@section('content')

<!-- Content
		============================================= -->
<section id="content">
	<div id="content-wrap">
		<!-- === Section Flat =========== -->
		<div class="section-flat single_sec_flat contact_page" style="background:#e8e8e8;">      
			<div class="section-content">
				<div class="custom_banner">
					<div class="container">
						<div class="row">   
							<div class="col-sm-12">
								<div class="banner_txt">
									<div class="title">
										 <h3>Contact Us</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row"> 
						<div class="inner_contact">	  
							<div class="col-sm-12">	 
								<div class="cus_breadcrumb">
									<ul>
										<li class="active"><a href="#">Home</a></li>
										<li><span><i class="fa fa-angle-right"></i></span></li>
										<li><a href="#">Contact</a></li>
									</ul>
								</div> 
							</div>	
							<div class="clearfix"></div>
							<div class="col-sm-12">	  
							@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible" role="alert">
	
        <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show">

        <strong>{{ $message }}</strong>
</div>
@endif
								<div class="contact_map">
									<h4>Google Location</h4>
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.28805549874!2d6.674132514265838!3d6.225699428282033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1043f23aec30a8e9%3A0xe3f4244f600737a1!2sOpen%20Heaven%20Plaza%2C%20Opposite%20Legislative%20Quarters%2C%20103%20Okpanam%20Rd%2C%20GRA%20Phase%20I%20320108%2C%20Asaba%2C%20Nigeria!5e0!3m2!1sen!2sin!4v1642775112195!5m2!1sen!2sin" width="100%" height="" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="contact_detail" id="row_scroll">
								<div class="col-sm-6">	   
									<div class="contact_form">
										<h4>Get in tocuh with us</h4>
										{{ Form::open(array('url' => 'contact/send', 'name'=>"add-contact", 'autocomplete'=>'off', "enctype"=>"multipart/form-data", 'class' => "form_sec")) }}
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<input value="{{ old('name')  }}" data-valid="required" type="text" class="form-control txt_field" placeholder="Name" name="name" />
													</div>
													<div class="form-group">
														<input value="{{ old('email')  }}" data-valid="required" type="email" class="form-control txt_field" placeholder="Email Address" name="email" />
													</div>
													<div class="form-group">
														<input value="{{ old('phone')  }}" data-valid="required" type="text" class="form-control txt_field" placeholder="Phone Number" name="phone" />
													</div>
													<div class="form-group">
														<input value="{{ old('subject')  }}" data-valid="required" type="text" class="form-control txt_field" placeholder="Subject" name="subject" />
													</div>
													<div class="form-group">
														<textarea data-valid="required" class="form-control" value="" placeholder="Your Message" name="message">{{ old('message')  }}</textarea>
													</div>
													@if(config('services.recaptcha.key'))
														<div class="g-recaptcha"
															data-sitekey="{{config('services.recaptcha.key')}}">
														</div>
													@endif
													@if ($errors->has('g-recaptcha-response'))
															<span class="custom-error" role="alert">
																<strong>{{ $errors->first('g-recaptcha-response') }}</strong>
															</span>
														@endif
													<div class="form-group text-center">
									<input onClick='customValidate("add-contact")' type="button" name="submitcontact" class="form_submit_btn" value="Submit" />
													</div>
												</div>
											</div>
										{{ Form::close() }}
									</div> 
								</div>
								<div class="col-sm-6">	  
									<div class="contact_info">
										<h4>Office Location</h4>
										<p><span style="display:block;"><b>Address</b></span> Travel24her.com<br>
										OPEN HEAVEN PLAZA,<br> 
										OPPOSITE LEGISLATIVE QUARTERS,<br>
										Asaba, Delta 2345, NG</p>
										<p><b>Phone:</b> <a href="tel:+09122195512">(+91)-9122195512 </a></p>
										<p><b>Email:</b> <a href="mailto:info@travel24her.com">info@travel24her.com</a></p>
										<div class="social_link">
											<ul>
												<li><a target="_blank" href="https://www.facebook.com/Travel24her/"><i class="fab fa-facebook"></i></a></li>
												<li><a target="_blank" href="https://twitter.com/Travel24her/"><i class="fab fa-twitter"></i></a></li>
												<li><a target="_blank" href="https://www.instagram.com/Travel24her/"><i class="fab fa-instagram"></i></a></li>  
											</ul>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>	
				</div>	
			</div>	
		</div>	
	</div>	
</section>	

@endsection