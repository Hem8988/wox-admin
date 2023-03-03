@extends('layouts.frontend')
@section('title', 'As a Affiliate Partner')
@section('content')
<style>
	header {display: none;}
    </style>
    <script>
$(document).ready(function(){
$(".csldbar").click(function(){
$(".navmd").toggleClass("ngs");
});
});
        </script>
		<section class="header_new">
<div class="container">
<div class="boxnew_hrd">
<div class="logolf">
    <a  href="{{ URL::to('become-an-affiliate')}}">
	  <img src="{{asset('public/images/logo-header.png')}}" data-logo-alt="{{asset('public/images/logo-header.png')}}" alt="">
		</a>

        <span class="csldbar"><i class="fa fa-bars"></i></span>
    </div>

    <div class="navmd">
        <ul class="clearfix">
            <li class="nvm1"><a href="{{ URL::to('become-an-affiliate')}}">Home</a></li>
            <li class="nvm2"><a href="{{ URL::to('become-an-affiliate/#fdvx')}}">FeedBacks</a></li>
            <li class="nvm3"><a href="{{ URL::to('agent/login')}}">Sign&nbsp;In</a></li>
            <li class="nvm4"><a href="{{ URL::to('affiliate-partner')}}">Sign&nbsp;Up</a></li>
        </ul>
    </div>
</div>
</div>
</section>
<!-- Content
		============================================= -->
	
	
		<section class="afform">
			<div class="container">
				<div class="row mt30">
					<div class="col-sm-8">
						<div class="whitebox_sd">
						<form action="{{URL::to('agent/signup')}}" method="post" enctype="multipart/form-data">
						@csrf
							<div class="msg_ag">
								<p>Please fill your details in the request form below and our customer service team will
									respond within next 72 hours.</p>
							</div>
							<span class="ermsg">Note: * Fields are mandatory.</span>
							<div class="formagt">
								<h3>Company Detail</h3>
 <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
								<div class="row">
									<div class="col-sm-6">
										<div class="frmagent">
											<label>Company Name<span>*</span></label>
											<div class="rtb">
												<input type="text" name="company_name" class="inpagt" placeholder="Company Name" value="{{ old('company_name')}}"/>
											</div>
												@if ($errors->has('company_name'))
													<span class="custom-error" role="alert">
														<strong>{{ @$errors->first('company_name') }}</strong>
													</span> 
												@endif
										</div>
									</div>

								

									<div class="col-sm-6">
										<div class="frmagent">
											<label>Name<span>*</span></label>
											<div class="flxagt">
												<div class="rtb wdag1">
													<select name="sur_name">
														<option value="Mr" @if(old('sur_name') == 'Mrs') selected @endif>Mr</option>
														<option value="Mrs" @if(old('sur_name') == 'Mrs') selected @endif>Mrs</option>
														<option value="Miss" @if(old('sur_name') == 'Miss') selected @endif>Miss</option>
													</select>
												</div>
												<div class="rtb wdag2">
													<input type="text" name="first_name" class="inpagt" placeholder="First Name"  value="{{old('first_name')}}"/>
												</div>

												<div class="rtb wdag2">
													<input type="text" name="last_name" class="inpagt" placeholder="Last Name" value="{{old('last_name')}}" />
												</div>
											</div>
												@if ($errors->has('sur_name'))
													<span class="custom-error" role="alert">
														<strong>{{ @$errors->first('sur_name') }}</strong>
													</span> 
												@endif
												@if ($errors->has('first_name'))
												<span class="custom-error" role="alert">
													<strong>{{ @$errors->first('first_name') }}</strong>
												</span> 
											@endif
												@if ($errors->has('last_name'))
												<span class="custom-error" role="alert">
													<strong>{{ @$errors->first('last_name') }}</strong>
												</span> 
											@endif
										</div>
									</div>

									<div class="col-sm-6">
										<div class="frmagent">
											<label>Mobile Number<span>*</span></label>
											<div class="rtb">
												<input type="text" name="mobile_no" value="{{old('mobile_no')}}" class="inpagt" placeholder="Mobile Number" />
											</div>
												@if ($errors->has('mobile_no'))
													<span class="custom-error" role="alert">
														<strong>{{ @$errors->first('mobile_no') }}</strong>
													</span> 
												@endif
										</div>
									</div>

									<div class="col-sm-6">
										<div class="frmagent">
											<label>Phone Number<span>*</span></label>
											<div class="rtb">
												<input type="text" name="phone" vlaue="{{old('phone')}}" class="inpagt" placeholder="Phone Number" />
											</div>
												@if($errors->has('phone'))
												<span class="custom-error" role="alert">
													<strong>{{ @$errors->first('phone') }}</strong>
												</span> 
											@endif
										</div>
									</div>

									<div class="col-sm-6">
										<div class="frmagent">
											<label>Email ID<span>*</span></label>
											<div class="rtb">
												<input type="text" name="email" value="{{old('email')}}" class="inpagt" placeholder="Email ID" />
											</div>
												@if ($errors->has('email'))
									<span class="custom-error" role="alert">
										<strong>{{ @$errors->first('email') }}</strong>
									</span> 
								@endif
										</div>
									</div>

									<div class="col-sm-6">
										<div class="frmagent">
											<label>Company Address<span>*</span></label>
											<div class="rtb">
												<input type="text" name="address" value="{{old('address')}}" class="inpagt" placeholder="1st Address" />
											</div>
												@if ($errors->has('address'))
									<span class="custom-error" role="alert">
										<strong>{{ @$errors->first('address') }}</strong>
									</span> 
								@endif
										</div>
									</div>

									<div class="col-sm-6">
										<div class="frmagent">
											<label>Address 2</label>
											<div class="rtb">
												<input type="text" name="address2" class="inpagt" placeholder="2nd Address" />
											</div>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="frmagent">
											<label>Country<span>*</span></label>
											<div class="rtb">
												<select class="login_input" name="country" aria-invalid="false"
													id="culture-selector-market" name="market">
													<option value="AF">Afghanistan</option>
													<option value="AL">Albania</option>
													<option value="DZ">Algeria</option>
													<option value="AS">American Samoa</option>
													<option value="AD">Andorra</option>
													<option value="AO">Angola</option>
													<option value="AI">Anguilla</option>
													<option value="AG">Antigua and Barbuda</option>
													<option value="AR">Argentina</option>
													<option value="AM">Armenia</option>
													<option value="AW">Aruba</option>
													<option value="AU">Australia</option>
													<option value="AT">Austria</option>
													<option value="AZ">Azerbaijan</option>
													<option value="BS">Bahamas</option>
													<option value="BH">Bahrain</option>
													<option value="BD">Bangladesh</option>
													<option value="BB">Barbados</option>
													<option value="BY">Belarus</option>
													<option value="BE">Belgium</option>
													<option value="BZ">Belize</option>
													<option value="BJ">Benin</option>
													<option value="BM">Bermuda</option>
													<option value="BT">Bhutan</option>
													<option value="BO">Bolivia</option>
													<option value="BA">Bosnia and Herzegovina</option>
													<option value="BW">Botswana</option>
													<option value="BR">Brazil</option>
													<option value="VG">British Virgin Islands</option>
													<option value="BN">Brunei</option>
													<option value="BG">Bulgaria</option>
													<option value="BF">Burkina Faso</option>
													<option value="BI">Burundi</option>
													<option value="KH">Cambodia</option>
													<option value="CM">Cameroon</option>
													<option value="CA">Canada</option>
													<option value="CV">Cape Verde</option>
													<option value="KY">Cayman Islands</option>
													<option value="CF">Central African Republic</option>
													<option value="TD">Chad</option>
													<option value="CL">Chile</option>
													<option value="CN">China</option>
													<option value="CX">Christmas Island</option>
													<option value="CC">Cocos (Keeling) Islands</option>
													<option value="CO">Colombia</option>
													<option value="KM">Comoros</option>
													<option value="CG">Congo</option>
													<option value="CK">Cook Islands</option>
													<option value="CR">Costa Rica</option>
													<option value="HR">Croatia</option>
													<option value="CU">Cuba</option>
													<option value="CY">Cyprus</option>
													<option value="CZ">Czech Republic</option>
													<option value="DK">Denmark</option>
													<option value="DJ">Djibouti</option>
													<option value="DM">Dominica</option>
													<option value="DO">Dominican Republic</option>
													<option value="CD">DR Congo</option>
													<option value="EC">Ecuador</option>
													<option value="EG">Egypt</option>
													<option value="SV">El Salvador</option>
													<option value="GQ">Equatorial Guinea</option>
													<option value="ER">Eritrea</option>
													<option value="EE">Estonia</option>
													<option value="SZ">Eswatini</option>
													<option value="ET">Ethiopia</option>
													<option value="FK">Falkland Islands</option>
													<option value="FO">Faroe Islands</option>
													<option value="FJ">Fiji</option>
													<option value="FI">Finland</option>
													<option value="FR">France</option>
													<option value="GF">French Guiana</option>
													<option value="PF">French Polynesia</option>
													<option value="GA">Gabon</option>
													<option value="GM">Gambia</option>
													<option value="GE">Georgia</option>
													<option value="DE">Germany</option>
													<option value="GH">Ghana</option>
													<option value="GI">Gibraltar</option>
													<option value="GR">Greece</option>
													<option value="GL">Greenland</option>
													<option value="GD">Grenada</option>
													<option value="GP">Guadeloupe</option>
													<option value="GU">Guam</option>
													<option value="GT">Guatemala</option>
													<option value="GG">Guernsey</option>
													<option value="GN">Guinea</option>
													<option value="GW">Guinea-Bissau</option>
													<option value="GY">Guyana</option>
													<option value="HT">Haiti</option>
													<option value="HN">Honduras</option>
													<option value="HK">Hong Kong</option>
													<option value="HU">Hungary</option>
													<option value="IS">Iceland</option>
													<option value="IN">India</option>
													<option value="ID">Indonesia</option>
													<option value="IR">Iran</option>
													<option value="IQ">Iraq</option>
													<option value="IE">Ireland</option>
													<option value="IL">Israel</option>
													<option value="IT">Italy</option>
													<option value="CI">Ivory Coast</option>
													<option value="JM">Jamaica</option>
													<option value="JP">Japan</option>
													<option value="JO">Jordan</option>
													<option value="KZ">Kazakhstan</option>
													<option value="KE">Kenya</option>
													<option value="KI">Kiribati</option>
													<option value="KW">Kuwait</option>
													<option value="KG">Kyrgyzstan</option>
													<option value="LA">Laos</option>
													<option value="LV">Latvia</option>
													<option value="LB">Lebanon</option>
													<option value="LS">Lesotho</option>
													<option value="LR">Liberia</option>
													<option value="LY">Libya</option>
													<option value="LI">Liechtenstein</option>
													<option value="LT">Lithuania</option>
													<option value="LU">Luxembourg</option>
													<option value="MO">Macau</option>
													<option value="MG">Madagascar</option>
													<option value="MW">Malawi</option>
													<option value="MY">Malaysia</option>
													<option value="MV">Maldives</option>
													<option value="ML">Mali</option>
													<option value="MT">Malta</option>
													<option value="MH">Marshall Islands</option>
													<option value="MQ">Martinique</option>
													<option value="MR">Mauritania</option>
													<option value="MU">Mauritius</option>
													<option value="YT">Mayotte</option>
													<option value="MX">Mexico</option>
													<option value="FM">Micronesia</option>
													<option value="MD">Moldova</option>
													<option value="MC">Monaco</option>
													<option value="MN">Mongolia</option>
													<option value="ME">Montenegro</option>
													<option value="MS">Montserrat</option>
													<option value="MA">Morocco</option>
													<option value="MZ">Mozambique</option>
													<option value="MM">Myanmar</option>
													<option value="NA">Namibia</option>
													<option value="NR">Nauru</option>
													<option value="NP">Nepal</option>
													<option value="NL">Netherlands</option>
													<option value="NC">New Caledonia</option>
													<option value="NZ">New Zealand</option>
													<option value="NI">Nicaragua</option>
													<option value="NE">Niger</option>
													<option value="NG">Nigeria</option>
													<option value="NU">Niue</option>
													<option value="KP">North Korea</option>
													<option value="MK">North Macedonia</option>
													<option value="MP">Northern Mariana Islands</option>
													<option value="NO">Norway</option>
													<option value="OM">Oman</option>
													<option value="PK">Pakistan</option>
													<option value="PW">Palau</option>
													<option value="PA">Panama</option>
													<option value="PG">Papua New Guinea</option>
													<option value="PY">Paraguay</option>
													<option value="PE">Peru</option>
													<option value="PH">Philippines</option>
													<option value="PL">Poland</option>
													<option value="PT">Portugal</option>
													<option value="PR">Puerto Rico</option>
													<option value="QA">Qatar</option>
													<option value="RE">Reunion</option>
													<option value="RO">Romania</option>
													<option value="RU">Russia</option>
													<option value="RW">Rwanda</option>
													<option value="KN">Saint Kitts and Nevis</option>
													<option value="LC">Saint Lucia</option>
													<option value="VC">Saint Vincent and the Grenadines</option>
													<option value="WS">Samoa</option>
													<option value="ST">Sao Tome and Principe</option>
													<option value="SA">Saudi Arabia</option>
													<option value="SN">Senegal</option>
													<option value="RS">Serbia</option>
													<option value="SC">Seychelles</option>
													<option value="SL">Sierra Leone</option>
													<option value="SG">Singapore</option>
													<option value="SK">Slovakia</option>
													<option value="SI">Slovenia</option>
													<option value="SB">Solomon Islands</option>
													<option value="SO">Somalia</option>
													<option value="ZA">South Africa</option>
													<option value="GS">South Georgia &amp; South Sandwich Islands
													</option>
													<option value="KR">South Korea</option>
													<option value="ES">Spain</option>
													<option value="LK">Sri Lanka</option>
													<option value="SH">St. Helena</option>
													<option value="PM">St. Pierre and Miquelon</option>
													<option value="SD">Sudan</option>
													<option value="SR">Suriname</option>
													<option value="SE">Sweden</option>
													<option value="CH">Switzerland</option>
													<option value="SY">Syria</option>
													<option value="TW">Taiwan</option>
													<option value="TJ">Tajikistan</option>
													<option value="TZ">Tanzania</option>
													<option value="TH">Thailand</option>
													<option value="TG">Togo</option>
													<option value="TO">Tonga</option>
													<option value="TT">Trinidad and Tobago</option>
													<option value="TN">Tunisia</option>
													<option value="TR">Turkey</option>
													<option value="TM">Turkmenistan</option>
													<option value="TC">Turks and Caicos Islands</option>
													<option value="TV">Tuvalu</option>
													<option value="UG">Uganda</option>
													<option value="UA">Ukraine</option>
													<option value="AE">United Arab Emirates</option>
													<option value="UK">United Kingdom</option>
													<option value="US">United States</option>
													<option value="UY">Uruguay</option>
													<option value="VI">US Virgin Islands</option>
													<option value="UZ">Uzbekistan</option>
													<option value="VU">Vanuatu</option>
													<option value="VA">Vatican City</option>
													<option value="VE">Venezuela</option>
													<option value="VN">Vietnam</option>
													<option value="WF">Wallis and Futuna Islands</option>
													<option value="YE">Yemen</option>
													<option value="ZM">Zambia</option>
													<option value="ZW">Zimbabwe</option>
												</select>
											</div>
												@if ($errors->has('country'))
									<span class="custom-error" role="alert">
										<strong>{{ @$errors->first('country') }}</strong>
									</span> 
								@endif
										</div>
									</div>

									<div class="col-sm-6">
										<div class="frmagent">
											<label>State</label>
											<div class="rtb">
												<input type="text" value="{{old('state')}}" name="state" class="inpagt" placeholder="State" />
											</div>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="frmagent">
											<label>City</label>
											<div class="rtb">
												<input type="text" name="city" value="{{old('city')}}" class="inpagt" placeholder="City" />
											</div>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="frmagent">
											<label>Postal Code</label>
											<div class="rtb">
												<input type="text" name="postal_code" value="{{old('postal_code')}}" class="inpagt" placeholder="Postal Code" />
											</div>
										</div>
									</div>


								</div>
							</div>
							<br>
							<div class="formagt">
								<h3>User Detail</h3>

								<div class="row">
									<div class="col-sm-6">
										<div class="frmagent">
											<label>Password<span>*</span></label>
											<div class="rtb">
												<input type="text" name="password" class="inpagt" placeholder="Password" />
											</div>
												@if ($errors->has('password'))
									<span class="custom-error" role="alert">
										<strong>{{ @$errors->first('password') }}</strong>
									</span> 
								@endif
											<ul class="listpass">
												<li>Lowercase & Uppercase</li>
												<li>Number (0-9)</li>
												<li>Special Character (!@#$%^&*)</li>
												<li>Atleast 8 Character</li>
											</ul>
										</div>

										<div class="frmagent">
											<label>Upload Company Logo</label>
											<div class="rtb">
												<input type="file" name="logo" class="inpagt" placeholder="" />
													@if ($errors->has('logo'))
									<span class="custom-error" role="alert">
										<strong>{{ @$errors->first('logo') }}</strong>
									</span> 
								@endif
											</div>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="frmagent">
											<label>Re-Type Password<span>*</span></label>
											<div class="rtb">
												<input type="text" name="password_confirmation" class="inpagt" placeholder="Re-Type Password" />
											</div>
												@if ($errors->has('password_confirmation'))
									<span class="custom-error" role="alert">
										<strong>{{ @$errors->first('password_confirmation') }}</strong>
									</span> 
								@endif
										</div>
									

									
									</div>










								</div>
							</div>
							<br>
							<div class="formagt">
								<h3>User Detail</h3>

								<div class="row">
									<div class="col-sm-6">
										<div class="frmagent">
											<label>Company Pan Card<span>*</span></label>
											<div class="rtb">
												<input type="file" class="inpagt" placeholder=""   name="company_pancard"/>
											</div>
												@if ($errors->has('company_pancard'))
									<span class="custom-error" role="alert">
										<strong>{{ @$errors->first('company_pancard') }}</strong>
									</span> 
								@endif
										</div>
									</div>

									<div class="col-sm-6">
										<div class="frmagent">
											<label>Aadhaar Card<span>*</span></label>
											<div class="rtb">
												<input type="file" class="inpagt" placeholder="" name="aadhaar_card" />
											</div>
												@if ($errors->has('aadhaar_card'))
									<span class="custom-error" role="alert">
										<strong>{{ @$errors->first('aadhaar_card') }}</strong>
									</span> 
								@endif
										</div>
									</div>

									<div class="col-sm-12">
										<div class="ck_ins">
											<input type="checkbox" id="clicking" name="clicking" value="accepting">
											<label for="clicking">By clicking this check box you are accepting our <a
													href="{{URL::to('terms-and-conditions')}}">Terms &
													Conditions and Disclaimer.</a></label>
										</div>
										<br>
										<div class="form_btn text-center">
										<button type="submit"  class="submit_btn">Submit</button>
											{{-- <input type="" class="submit_btn" value="Submit"> --}}
										</div>
										<br>
									</div>

								</div>
							</div>
</form>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="whitebox_sd">
							<div class="txtrits">
								<h4><i class="fa fa-phone"></i>Need Help?</h4>

								<p>Need Help? Call us or drop a message. Our agents will be in touch shortly.</p>
								<div class="dsfx">
									<a href="tel:09122195512"><i class="fa fa-phone"></i>09122195512 </a>
								<a href="tel:09122102273"><i class="fa fa-phone"></i>09122102273 </a>
								</div>
								<a href="mailto:info@travel24hr.com"><i class="fa fa-envelope"></i>info@travel24hr.com </a>
							</div>
						</div>
						<br>
						<div class="whitebox_sd">
							<div class="txtrits">
								<h4><i class="fa fa-file"></i>Why Book With Us</h4>
<ul class="flxiconag">
	<li>
		<span><img src="h{{asset('public/images/NoServiceFees.png')}}" alt=""/></span>
		<h4>No Service Fees
			<p>Hotel reservation is free of charge with mtiflight.com.</p>
		</h4>
		
	</li>

	<li>
		<span><img src="{{asset('public/images/Bookingicon.png')}}" alt=""/></span>
		<h4>Easy and Fast Booking
			<p>You will book your hotel unbelievably easy and fast!</p>
		</h4>
		
	</li>

	<li>
		<span><img src="{{asset('public/images/PaymentSystem.png')}}" alt=""/></span>
		<h4>Trusted Payment System
			<p>All booking payments are gone through mtiflight's most trusted bank Trade and Development Bank.</p>
		</h4>
		
	</li>

	<li>
		<span><img src="{{asset('public/images/TravelExperts.png')}}" alt=""/></span>
		<h4>Travel Experts to You
			<p>Our experienced travel expert work for you. We do our utmost to fulfill your travel dreams.</p>
		</h4>
		
	</li>
</ul>
								
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<br>



@endsection