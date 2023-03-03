@extends('layouts.frontend')
@section('title', 'Send Query')
@section('content')

<!-- Content
		============================================= -->
		<section class="breadcumb Query_top">
	<div class="banner_txt">
		<ul class="clearfix">
			<li class="homebread"><a href="http://24hr.lightmytrip.com/"><i class="fa fa-home"></i></a></li>
			<li>
				<h1>Send Query</h1>
			</li>
		</ul>
	</div>
</section>
<br><br>
<div class="container">
	<div class="text_qsend">
	<h3>Ask our advisor for your next <span>Holiday trip</span></h3>
									<p>Planning the perfect holiday requires covering a lot of aspects. Right from deciding upon a suitable destination, to finding the best airfare, booking the right hotels and shortlisting the things to see and do, can be a fairly daunting experience. However, with Travel24hr.com you are in the right hands. Our destination specialists can save you that time and effort.</p>
									<p>Whether you simply want to know the best time to visit a place, the attractions to include, or foreign exchange rates, we will guide you through everything. All you need to do is to fill out and submit the form below, and we will get contact you to help you plan the perfect holiday.</p>
							
	</div>
<br>
<div class="row">
<div class="col-sm-6">	  
	<div class="query_sd">
		<span><img src="http://24hr.lightmytrip.com/public/images/contact_qry.svg" alt="" class="img-res"></span>
<div class="txtqrs">
<h4>Or you can call us, at this number</h4>
<a href="tel:09122195512"><i class="fa fa-phone rtss"></i>09122195512</a>
<a href="tel:09122102273"><i class="fa fa-phone rtss"></i>09122102273</a>
</div>
	</div>
									
								</div>
								<div class="col-sm-6">	   
									<div class="contact_form">
										{{ Form::open(array('url' => 'contact/send', 'name'=>"add-contact", 'autocomplete'=>'off', "enctype"=>"multipart/form-data", 'class' => "form_sec")) }}
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<input type="text" class="form-control txt_field" placeholder="Name" name="name" />
													</div>
													<div class="form-group">
														<input type="email" class="form-control txt_field" placeholder="Email Address" name="email" />
													</div>
													<div class="form-group">
														<input type="text" class="form-control txt_field" placeholder="Phone Number" name="phone" />
													</div>
													<div class="form-group">
														<label>Enquiry Type</label>
														<select class="form-control" name="enquiry_type">
															<option>Flights</option>
															<option>Hotels</option>
															<option>Tour Package</option>
															<option>Bus</option>
															<option>Visa</option>
														</select>
													</div> 
													<div class="form-group">
														<textarea class="form-control" placeholder="Your Message" name="message"></textarea>
													</div>
													<div class="form-group">
														<div class="checkbox form_checkbox">
															<label><input type="checkbox"/><span class="checkmark"></span> By clicking a submission button, I agree to Consent</label>
														</div>
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
													<div class="form-group text-center btscs">
														<input onClick='customValidate("add-contact")' type="submit" name="submit" class="form_submit_btn" value="Submit" />
													</div>
												</div>
											</div>
											{{ Form::close() }}
									</div>
								</div>
</div>


</div>
<br><br>




	

@endsection