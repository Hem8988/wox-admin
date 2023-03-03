@extends('layouts.frontend')
@section('title', 'Under Construction')
@section('content')

<!-- Content
		============================================= -->
<style>
    .main-visa {
        background: url('https://www.travelbeta.com/assets/new-assets/images/visa-bg.png') no-repeat center center;
        background-size: cover;
        padding: 40px 80px;
    }

    .search-box-wrapper.style1 {
        background: none;
    }

    .search-box-wrapper.style1 .search-tab-content {
        background: #fff;
        float: left;
        width: 69%;
        padding: 0;
    }

    .main-visa .search-box-wrapper.style1 .search-tab-content {
        width: 100%;
    }

    .search-box-wrapper.style1 .search-tab-content .title-container * {
        color: #fff;
    }

    .search-box-wrapper.style1 .search-tab-content .title-container {
        background: #fdb714;
        padding: 15px 40px 0 25px;
        height: 80px;
        position: relative;
    }

    .search-box-wrapper.style1 .search-tab-content .title-container>i {
        font-size: 48px;
        position: absolute;
        right: 25px;
        top: 50%;
        margin-top: -24px;
    }

    .search-box-wrapper.style1 .search-tab-content .title-container .search-title {
        margin: 0;
        font-weight: 500;
    }

    .search-box-wrapper.style1 .search-tab-content .search-content {
        padding: 18px 25px 25px;
    }

    .alert.alert-error {
        background: #f26879;
    }

    .search-box-wrapper.style1 .search-tab-content .search-content label {
        font-size: 13px;
        margin-bottom: 0;
        color: #7c7c7c;
    }

    .search-box-wrapper.style1 .search-tab-content .search-content .form-control {
        font-size: 14px;
    }

    .search-box-wrapper.style1 .search-tab-content .search-content .form-control:focus {
        border-color: 1px solid #ddd;
        background: #fff;
        color: #000;
    }

    .mrd {
        margin-bottom: 20px;
    }

    .cliwth {
        width: 100%;
    }

    .form-control {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }

    .main-visa .copy {
        color: white;
    }

    .main-visa .copy h1 {
        font-size: 28px;
        line-height: 1.25em;
    }

    .main-visa .copy h1,
    .main-visa .copy h2,
    .main-visa .copy h3,
    .main-visa .copy h4,
    .main-visa .copy h5,
    .main-visa .copy h6 {
        color: white;
    }

    .soap-icon-stories::before {
        content: '\e865';
    }

    [class^="soap-icon"]::before,
    [class*=" soap-icon"]::before {
        font-family: "soap-icons";
        font-style: normal;
        font-weight: normal;
        speak: none;
        display: inline-block;
        text-decoration: inherit;
        text-align: center;
        font-variant: normal;
        text-transform: none;
        line-height: 1em;
        /* font-size: 120%; */
    }

    .main-visa h2 {
        font-size: 22px;
        line-height: 1.25em;
    }

    .input-group .cloudbximg,
    .form-group .visa_cta {
        padding: 14px 14px;
        height: auto;
        line-height: normal;
        font-size: 13px;
        border-radius: 2px;
        background: #27146f;
        width: 100%;
    }
    .errors {
    color: red;
    font-size: 12px;
    font-family: initial;
}
</style>
<script>
    $(document).ready(function() {
        $("#datepicker1").datepicker({
            numberOfMonths: 1,
            dateFormat: 'dd/mm/yy',
        });
        $("#visa-enquiry").on('submit',function(event){
            $('.errors').empty();
       event.preventDefault();
       var form= $(this).serialize();
       $('.loading-div').css('display','block');
        $.ajax({
        url: "{{url('/visa/store')}}",
        type:"POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:form,
        dataType:'json',
        success:function(response){
             $('.loading-div').css('display','none');
             $("#visa-enquiry")[0].reset();
             alert(response.message)
        
        },
        error: function(response) {
            $('.loading-div').css('display','none');
              if (response.status === 400) {
                   alert(response.responseJSON.errors);
              }
                if (response.status === 401){
                  localStorage.setItem('travelers-details',form)
                    $('#login').modal('show');
              }
                    if (response.status === 422) {
                        var errors = $.parseJSON(response.responseText);
                        $.each(errors.errors, function(key, value) {
                             $("#"+key).after('<span class="errors">' + value + '</span>')
                             
                        });

                    }
        } 
     
       });

   })

    });
</script>
<section class="frmbg visabg">
    <span><img src="{!! asset('public/images/visa_bg.jpg') !!} "></span>
    <div class="formbox_visa">
        <div class="visahead">
            <h1>Get Visa Assistance Now</h1>
            <p>We're bringing you a new level of comfort.</p>
        </div>
    <form id="visa-enquiry" method="Post"> 
              @csrf
        <div class="newvisa">
            <div class="twobox">
                <div class="boxvisa wi50">
                    <i class="far fa-user iconal_visa"></i>
                    <input type="text" class="visainp" id="first_name" name="first_name" placeholder="Enter Name " />
                </div>
                <div class="boxvisa wi50">
                    <i class="far fa-user iconal_visa"></i>
                    <input type="text" class="visainp"  id="last_name" name="last_name" placeholder="Enter Surname " />
                </div>
            </div>

            <div class="twobox">

                <div class="boxvisa wi50">
                    <i class="fa fa-phone-alt iconal_visa"></i>
                    <input type="text" class="visainp"  id="phone_no" name="phone_no" placeholder="Enter Mobile No " />
                </div>

                <div class="boxvisa wi50">
                    <i class="fab fa-whatsapp iconal_visa"></i>
                    <input type="text" class="visainp"  id="whatsapp_no" name="whatsapp_no" placeholder="Enter Whatsapp No " />
                </div>
            </div>




            <div class="boxvisa">
                <i class="far fa-envelope iconal_visa"></i>
                <input type="text" class="visainp"  id="email_id" name="email_id" placeholder="Enter Email " />
            </div>

            <div class="twobox">
                <div class="boxvisa wi50">
                    <i class="fa fa-passport iconal_visa"></i>
                    <input type="text" class="visainp"  id="residence_country" name="residence_country" placeholder="Enter Passport Issue Country " />
                </div>

                <div class="boxvisa wi50">
                    <i class="fa fa-calendar iconal_visa"></i>
                    <input type="text" id="datepicker1"  id="dob" name="dob" class="visainp" placeholder="Enter Date Of Birth " />
                </div>
            </div>



            <div class="boxvisa">
                <i class="fa fa-map-marker-alt iconal_visa"></i>
                <input type="text" class="visainp"  id="destination_country" name="destination_country" placeholder="Enter Destination" />
            </div>



            <div class="boxvisa">
                <i class="fab fa-cc-visa iconal_visa"></i>
                <select class="visainp"  id="visa_type" name="visa_type">
                    <option>Select Visa Type</option>
                    <option>Tourist / Family VISA</option>
                    <option>Business / Conference VISA.</option>
                    <option>Transit VISA</option>
                    <option>E-VISA</option>
                    <option>Student</option>
                </select>
            </div>

            <div class="boxvisa msgtop_vic">
                <i class="fa fa-edit iconal_visa "></i>
                <textarea class="visainp" placeholder="Enter Additional Message"  id="message" name="message" cols="2" rows="1"></textarea>
            </div>
            <div class="boxvisa">
                <button type="submit" class="vsbtn">Submit</button>
            </div>
        </div>
        </form>
    </div>
</section>

<div class="container">
    <div class="iconchoise">
        <h3>Why are we Everyone's Choice !</h3>
        <div class="iconbox_vs">
            <div class="icnv">
                <span><img src="{!! asset('public/images/Expertic.svg') !!} "></span>
                <h6>Expert Advice for different countries</h6>
            </div>

            <div class="icnv">
                <span><img src="{!! asset('public/images/ts_spt.svg') !!}"></span>
                <h6>24 x 7 <span>availability</span></h6>
            </div>

            <div class="icnv">
                <span><img src="{!! asset('public/images/Documentation.svg') !!} "></span>
                <h6>Hassle free <span>Documentation</span></h6>
            </div>

            <div class="icnv">
                <span><img src="{!! asset('public/images/Status.svg') !!} "></span>
                <h6>Status Check <span>facility</span></h6>
            </div>

            <div class="icnv">
                <span><img src="{!! asset('public/images/Appointment.svg') !!}"></span>
                <h6>Assistance to Fix Appointment with Embassy</h6>
            </div>
        </div>

    </div>

    <div class="trvtxt">
        <p>Travel24hr visa team is made up of seasoned, specialized and experienced experts in visa processing.</p>
        <p>
            Our process includes profiling, helping you to complete your visa application forms, vetting documents, getting appointment dates, conducting pre-interview session where applicable and making sure you have 99% chances of getting the visa.
        </p>
        <p>
            We do not encourage immigration defaults and kindly note that issuance of visas is at the discretion of the embassy.</p>
    </div>

    <div class="typebox">
        <div class="tybox_d">
            <h5><i class="fa fa-passport"></i>&nbsp;Types of VISA</h5>
            <ul class="listtype_v iconaw">
                <li>Tourist / Family VISA</li>
                <li>Business / Conference VISA.</li>
                <li>Transit VISA</li>
                <li>E-VISA</li>
                <li>Student</li>
            </ul>
        </div>

        <div class="tybox_d">
            <h5><i class="fa fa-file"></i>&nbsp;Documents Required</h5>
            <ul class="listtype_v iconaw">
                <li>Original Passport</li>
                <li>Photos</li>
                <li>Application form</li>
                <li>Present employment proof</li>
                <li>Financial background proof</li>
                <li>If Sponsors available –documents</li>
                <li>If no Sponsor –Hotel confirmation...</li>
              
            </ul>
        </div>

        <div class="tybox_d">
            <h5><i class="fa fa-phone-alt "></i>&nbsp;Get in touch with us</h5>
            <ul class="listtype_v">
                <li class="callic">Call us on&nbsp;<a href="tel:2349122102273">+234 912 210 2273</a></li>
                <li class="mailic">Mail us on&nbsp;<a href="tel:mailto:visa@travel24hr.com">visa@travel24hr.com</a></li>
                <li class="wtsic">WhatsApp us on&nbsp;<a target="_blanck" href="https://api.whatsapp.com/send?phone=+234%20912%20219%205512">+234 912 219 5512</a></li>
            </ul>
        </div>

    </div>
    <p class="nttxt">Note: Documents required, Charges, Processing Time may vary depending on the VISA type, Period of Stay, Embassy and Country.</p>

</div>







<section id="content" style="display: none;">
    <div id="content-wrap">
        <!-- === Section Flat =========== -->
        <div class="section-flat single_sec_flat" style="background:#e8e8e8;">
            <div class="section-content">

                <div class="main-visa">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 copy">
                                <h1>Travel Visa Assistance Program</h1>
                                <p>Travel24hr visa team is made up of seasoned, specialized and experienced experts in visa processing.</p>
                                <p>Our process includes profiling, helping you to complete your visa application forms, vetting documents, getting appointment dates, conducting pre-interview session where applicable and making sure you have 99% chances of getting the visa.</p>
                                <p>We do not encourage immigration defaults and kindly note that issuance of visas is at the discretion of the embassy.</p>
                                <p>
                                    Contact our visa consultants for all your Travel visa related questions. <br>
                                    Email: info@Travel24hr.com<br>
                                    Phone: 09122102273
                                </p>
                            </div>
                            <div id="visa_form" class="col-md-6 col-sm-12 col-xs-12">
                                <div class="search-box-wrapper style1">
                                    <div class="search-tab-content">
                                        <form name="visaform" method="post" id="visaform" accept="image/gif,image/jpeg,image/jpg, image/png" action="#">
                                            <div class="title-container">
                                                <h2 class="search-title">Get Visa Assistance Now</h2>
                                                <p class="title-container-sub">We're bringing you a new level of comfort.</p>
                                                <i class="fas fa-file-alt"></i>
                                            </div>
                                            <div class="search-content">
                                                <div id="errorDiv" class="alert text-left alert-error hide">

                                                    <span class="close"></span>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-md-6 col-sm-12 col-xs-12 mrd">
                                                        <label>First Name</label>
                                                        <input type="text" required="" class="form-control" name="firstName" id="firstName" placeholder="First Name">
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12 mrd">
                                                        <label>Last Name</label>
                                                        <input type="text" required="" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
                                                    </div>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-md-6 col-sm-12 col-xs-12 mrd">
                                                        <label>Email</label>
                                                        <input type="text" required="" class="form-control" name="emailAddress" id="emailAddress" placeholder="Email">
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12 mrd">
                                                        <label>Phone Number</label>
                                                        <input type="text" required="" class="form-control" placeholder="Phone Number" name="phoneNumber" id="phoneNumber" onkeypress="return validateNumberField(event)">
                                                    </div>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-xs-12 mrd">
                                                        <div class="form-group">
                                                            <label class="control-label" for="singleDestDepartureDate">
                                                                Departure Date
                                                            </label>
                                                            <div class="input-group clickable cliwth">
                                                                <input class="form-control" id="singleDestDepartureDate" required="" name="departureDate" type="text" placeholder="Departure Time">
                                                                <span class="input-group-addon calendar-button">
                                                                    <img src="http://24hr.lightmytrip.com/public/images/calendar.svg" alt="">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 mrd">
                                                        <div class="form-group">
                                                            <label class="control-label" for="singleDestReturnDate">
                                                                Return Date
                                                            </label>
                                                            <div class="input-group cliwth" id="roundTripRoundDatePicker">
                                                                <input class="form-control" id="singleDestReturnDate" name="returnDate" type="text" placeholder="Return Date">
                                                                <span class="input-group-addon calendar-button">
                                                                    <img src="http://24hr.lightmytrip.com/public/images/calendar.svg" alt="">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row m-b-20">



                                                    <div class="col-xs-12 col-md-6 mrd">
                                                        <label class="control-label" for="passportNumber">
                                                            Passport Number
                                                        </label>

                                                        <input class="form-control" id="passportNumber" name="passportNumber" type="text" placeholder="Passport No.">


                                                    </div>

                                                    <div class="col-xs-12 col-md-6 mrd">
                                                        <label class="control-label" for="passportUpload">
                                                            Passport Images
                                                        </label>
                                                        <div class="input-group clickable">


                                                            <button id="upload_widget" classname="cloudinary-button" class="cloudbximg" name="passport" type="button" onclick="cloudinaryUpload()">Upload passport</button>
                                                            <span style="margin-left: 20px" id="success-tick"></span>

                                                        </div>
                                                    </div>

                                                    <input value="false" id="eventActive" hidden="">
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-md-6 col-sm-12 col-xs-12 mrd">
                                                        <label>Country of Residence</label>
                                                        <select class="form-control" required="" name="residenceCountry" id="residenceCountry">
                                                            <option value=""></option>
                                                            <option data-countrycode="AF" value="21110">Afghanistan(93)</option>
                                                            <option data-countrycode="AX" value="21123">Aland Islands(+358-18)</option>
                                                            <option data-countrycode="AL" value="21113">Albania(355)</option>
                                                            <option data-countrycode="DZ" value="21171">Algeria(213)</option>
                                                            <option data-countrycode="AS" value="21119">American Samoa(+1-684)</option>
                                                            <option data-countrycode="AD" value="21108">Andorra(376)</option>
                                                            <option data-countrycode="AO" value="21116">Angola(244)</option>
                                                            <option data-countrycode="AI" value="21112">Anguilla(+1-264)</option>
                                                            <option data-countrycode="AQ" value="21117">Antarctica()</option>
                                                            <option data-countrycode="AG" value="21111">Antigua and Barbuda(+1-268)</option>
                                                            <option data-countrycode="AR" value="21118">Argentina(54)</option>
                                                            <option data-countrycode="AM" value="21114">Armenia(374)</option>
                                                            <option data-countrycode="AW" value="21122">Aruba(297)</option>
                                                            <option data-countrycode="AU" value="21121">Australia(61)</option>
                                                            <option data-countrycode="AT" value="21120">Austria(43)</option>
                                                            <option data-countrycode="AZ" value="21124">Azerbaijan(994)</option>
                                                            <option data-countrycode="BS" value="21140">Bahamas(+1-242)</option>
                                                            <option data-countrycode="BH" value="21131">Bahrain(973)</option>
                                                            <option data-countrycode="BD" value="21127">Bangladesh(880)</option>
                                                            <option data-countrycode="BB" value="21126">Barbados(+1-246)</option>
                                                            <option data-countrycode="BY" value="21144">Belarus(375)</option>
                                                            <option data-countrycode="BE" value="21128">Belgium(32)</option>
                                                            <option data-countrycode="BZ" value="21145">Belize(501)</option>
                                                            <option data-countrycode="BJ" value="21133">Benin(229)</option>
                                                            <option data-countrycode="BM" value="21135">Bermuda(+1-441)</option>
                                                            <option data-countrycode="BT" value="21141">Bhutan(975)</option>
                                                            <option data-countrycode="BO" value="21137">Bolivia(591)</option>
                                                            <option data-countrycode="BQ" value="21138">Bonaire, Saint Eustatius and Saba (599)</option>
                                                            <option data-countrycode="BA" value="21125">Bosnia and Herzegovina(387)</option>
                                                            <option data-countrycode="BW" value="21143">Botswana(267)</option>
                                                            <option data-countrycode="BV" value="21142">Bouvet Island()</option>
                                                            <option data-countrycode="BR" value="21139">Brazil(55)</option>
                                                            <option data-countrycode="IO" value="21215">British Indian Ocean Territory(246)</option>
                                                            <option data-countrycode="VG" value="21347">British Virgin Islands(+1-284)</option>
                                                            <option data-countrycode="BN" value="21136">Brunei(673)</option>
                                                            <option data-countrycode="BG" value="21130">Bulgaria(359)</option>
                                                            <option data-countrycode="BF" value="21129">Burkina Faso(226)</option>
                                                            <option data-countrycode="BI" value="21132">Burundi(257)</option>
                                                            <option data-countrycode="KH" value="21226">Cambodia(855)</option>
                                                            <option data-countrycode="CM" value="21155">Cameroon(237)</option>
                                                            <option data-countrycode="CA" value="21146">Canada(1)</option>
                                                            <option data-countrycode="CV" value="21161">Cape Verde(238)</option>
                                                            <option data-countrycode="KY" value="21233">Cayman Islands(+1-345)</option>
                                                            <option data-countrycode="CF" value="21149">Central African Republic(236)</option>
                                                            <option data-countrycode="TD" value="21323">Chad(235)</option>
                                                            <option data-countrycode="CL" value="21154">Chile(56)</option>
                                                            <option data-countrycode="CN" value="21156">China(86)</option>
                                                            <option data-countrycode="CX" value="21163">Christmas Island(61)</option>
                                                            <option data-countrycode="CC" value="21147">Cocos Islands(61)</option>
                                                            <option data-countrycode="CO" value="21157">Colombia(57)</option>
                                                            <option data-countrycode="KM" value="21228">Comoros(269)</option>
                                                            <option data-countrycode="CK" value="21153">Cook Islands(682)</option>
                                                            <option data-countrycode="CR" value="21158">Costa Rica(506)</option>
                                                            <option data-countrycode="HR" value="21207">Croatia(385)</option>
                                                            <option data-countrycode="CU" value="21160">Cuba(53)</option>
                                                            <option data-countrycode="CW" value="21162">CuraÃ§ao(599)</option>
                                                            <option data-countrycode="CY" value="21164">Cyprus(357)</option>
                                                            <option data-countrycode="CZ" value="21165">Czech Republic(420)</option>
                                                            <option data-countrycode="CD" value="21148">Democratic Republic of the Congo(243)</option>
                                                            <option data-countrycode="DK" value="21168">Denmark(45)</option>
                                                            <option data-countrycode="DJ" value="21167">Djibouti(253)</option>
                                                            <option data-countrycode="DM" value="21169">Dominica(+1-767)</option>
                                                            <option data-countrycode="DO" value="21170">Dominican Republic(+1-809 and 1-829)</option>
                                                            <option data-countrycode="TL" value="21329">East Timor(670)</option>
                                                            <option data-countrycode="EC" value="21172">Ecuador(593)</option>
                                                            <option data-countrycode="EG" value="21174">Egypt(20)</option>
                                                            <option data-countrycode="SV" value="21318">El Salvador(503)</option>
                                                            <option data-countrycode="GQ" value="21197">Equatorial Guinea(240)</option>
                                                            <option data-countrycode="ER" value="21176">Eritrea(291)</option>
                                                            <option data-countrycode="EE" value="21173">Estonia(372)</option>
                                                            <option data-countrycode="ET" value="21178">Ethiopia(251)</option>
                                                            <option data-countrycode="FK" value="21181">Falkland Islands(500)</option>
                                                            <option data-countrycode="FO" value="21183">Faroe Islands(298)</option>
                                                            <option data-countrycode="FJ" value="21180">Fiji(679)</option>
                                                            <option data-countrycode="FI" value="21179">Finland(358)</option>
                                                            <option data-countrycode="FR" value="21184">France(33)</option>
                                                            <option data-countrycode="GF" value="21189">French Guiana(594)</option>
                                                            <option data-countrycode="PF" value="21283">French Polynesia(689)</option>
                                                            <option data-countrycode="TF" value="21324">French Southern Territories()</option>
                                                            <option data-countrycode="GA" value="21185">Gabon(241)</option>
                                                            <option data-countrycode="GM" value="21194">Gambia(220)</option>
                                                            <option data-countrycode="GE" value="21188">Georgia(995)</option>
                                                            <option data-countrycode="DE" value="21166">Germany(49)</option>
                                                            <option data-countrycode="GH" value="21191">Ghana(233)</option>
                                                            <option data-countrycode="GI" value="21192">Gibraltar(350)</option>
                                                            <option data-countrycode="GR" value="21198">Greece(30)</option>
                                                            <option data-countrycode="GL" value="21193">Greenland(299)</option>
                                                            <option data-countrycode="GD" value="21187">Grenada(+1-473)</option>
                                                            <option data-countrycode="GP" value="21196">Guadeloupe(590)</option>
                                                            <option data-countrycode="GU" value="21201">Guam(+1-671)</option>
                                                            <option data-countrycode="GT" value="21200">Guatemala(502)</option>
                                                            <option data-countrycode="GG" value="21190">Guernsey(+44-1481)</option>
                                                            <option data-countrycode="GN" value="21195">Guinea(224)</option>
                                                            <option data-countrycode="GW" value="21202">Guinea-Bissau(245)</option>
                                                            <option data-countrycode="GY" value="21203">Guyana(592)</option>
                                                            <option data-countrycode="HT" value="21208">Haiti(509)</option>
                                                            <option data-countrycode="HM" value="21205">Heard Island and McDonald Islands( )</option>
                                                            <option data-countrycode="HN" value="21206">Honduras(504)</option>
                                                            <option data-countrycode="HK" value="21204">Hong Kong(852)</option>
                                                            <option data-countrycode="HU" value="21209">Hungary(36)</option>
                                                            <option data-countrycode="IS" value="21218">Iceland(354)</option>
                                                            <option data-countrycode="IN" value="21214">India(91)</option>
                                                            <option data-countrycode="ID" value="21210">Indonesia(62)</option>
                                                            <option data-countrycode="IR" value="21217">Iran(98)</option>
                                                            <option data-countrycode="IQ" value="21216">Iraq(964)</option>
                                                            <option data-countrycode="IE" value="21211">Ireland(353)</option>
                                                            <option data-countrycode="IM" value="21213">Isle of Man(+44-1624)</option>
                                                            <option data-countrycode="IL" value="21212">Israel(972)</option>
                                                            <option data-countrycode="IT" value="21219">Italy(39)</option>
                                                            <option data-countrycode="CI" value="21152">Ivory Coast(225)</option>
                                                            <option data-countrycode="JM" value="21221">Jamaica(+1-876)</option>
                                                            <option data-countrycode="JP" value="21223">Japan(81)</option>
                                                            <option data-countrycode="JE" value="21220">Jersey(+44-1534)</option>
                                                            <option data-countrycode="JO" value="21222">Jordan(962)</option>
                                                            <option data-countrycode="KZ" value="21234">Kazakhstan(7)</option>
                                                            <option data-countrycode="KE" value="21224">Kenya(254)</option>
                                                            <option data-countrycode="KI" value="21227">Kiribati(686)</option>
                                                            <option data-countrycode="XK" value="21353">Kosovo()</option>
                                                            <option data-countrycode="KW" value="21232">Kuwait(965)</option>
                                                            <option data-countrycode="KG" value="21225">Kyrgyzstan(996)</option>
                                                            <option data-countrycode="LA" value="21235">Laos(856)</option>
                                                            <option data-countrycode="LV" value="21244">Latvia(371)</option>
                                                            <option data-countrycode="LB" value="21236">Lebanon(961)</option>
                                                            <option data-countrycode="LS" value="21241">Lesotho(266)</option>
                                                            <option data-countrycode="LR" value="21240">Liberia(231)</option>
                                                            <option data-countrycode="LY" value="21245">Libya(218)</option>
                                                            <option data-countrycode="LI" value="21238">Liechtenstein(423)</option>
                                                            <option data-countrycode="LT" value="21242">Lithuania(370)</option>
                                                            <option data-countrycode="LU" value="21243">Luxembourg(352)</option>
                                                            <option data-countrycode="MO" value="21257">Macao(853)</option>
                                                            <option data-countrycode="MK" value="21253">Macedonia(389)</option>
                                                            <option data-countrycode="MG" value="21251">Madagascar(261)</option>
                                                            <option data-countrycode="MW" value="21265">Malawi(265)</option>
                                                            <option data-countrycode="MY" value="21267">Malaysia(60)</option>
                                                            <option data-countrycode="MV" value="21264">Maldives(960)</option>
                                                            <option data-countrycode="ML" value="21254">Mali(223)</option>
                                                            <option data-countrycode="MT" value="21262">Malta(356)</option>
                                                            <option data-countrycode="MH" value="21252">Marshall Islands(692)</option>
                                                            <option data-countrycode="MQ" value="21259">Martinique(596)</option>
                                                            <option data-countrycode="MR" value="21260">Mauritania(222)</option>
                                                            <option data-countrycode="MU" value="21263">Mauritius(230)</option>
                                                            <option data-countrycode="YT" value="21355">Mayotte(262)</option>
                                                            <option data-countrycode="MX" value="21266">Mexico(52)</option>
                                                            <option data-countrycode="FM" value="21182">Micronesia(691)</option>
                                                            <option data-countrycode="MD" value="21248">Moldova(373)</option>
                                                            <option data-countrycode="MC" value="21247">Monaco(377)</option>
                                                            <option data-countrycode="MN" value="21256">Mongolia(976)</option>
                                                            <option data-countrycode="ME" value="21249">Montenegro(382)</option>
                                                            <option data-countrycode="MS" value="21261">Montserrat(+1-664)</option>
                                                            <option data-countrycode="MA" value="21246">Morocco(212)</option>
                                                            <option data-countrycode="MZ" value="21268">Mozambique(258)</option>
                                                            <option data-countrycode="MM" value="21255">Myanmar(95)</option>
                                                            <option data-countrycode="NA" value="21269">Namibia(264)</option>
                                                            <option data-countrycode="NR" value="21277">Nauru(674)</option>
                                                            <option data-countrycode="NP" value="21276">Nepal(977)</option>
                                                            <option data-countrycode="NL" value="21274">Netherlands(31)</option>
                                                            <option data-countrycode="AN" value="21115">Netherlands Antilles(599)</option>
                                                            <option data-countrycode="NC" value="21270">New Caledonia(687)</option>
                                                            <option data-countrycode="NZ" value="21279">New Zealand(64)</option>
                                                            <option data-countrycode="NI" value="21273">Nicaragua(505)</option>
                                                            <option data-countrycode="NE" value="21271">Niger(227)</option>
                                                            <option selected="" data-countrycode="NG" value="1">NIGERIA(234)</option>
                                                            <option data-countrycode="NU" value="21278">Niue(683)</option>
                                                            <option data-countrycode="NF" value="21272">Norfolk Island(672)</option>
                                                            <option data-countrycode="MP" value="21258">Northern Mariana Islands(+1-670)</option>
                                                            <option data-countrycode="KP" value="21230">North Korea(850)</option>
                                                            <option data-countrycode="NO" value="21275">Norway(47)</option>
                                                            <option data-countrycode="OM" value="21280">Oman(968)</option>
                                                            <option data-countrycode="PK" value="21286">Pakistan(92)</option>
                                                            <option data-countrycode="PW" value="21293">Palau(680)</option>
                                                            <option data-countrycode="PS" value="21291">Palestinian Territory(970)</option>
                                                            <option data-countrycode="PA" value="21281">Panama(507)</option>
                                                            <option data-countrycode="PG" value="21284">Papua New Guinea(675)</option>
                                                            <option data-countrycode="PY" value="21294">Paraguay(595)</option>
                                                            <option data-countrycode="PE" value="21282">Peru(51)</option>
                                                            <option data-countrycode="PH" value="21285">Philippines(63)</option>
                                                            <option data-countrycode="PN" value="21289">Pitcairn(870)</option>
                                                            <option data-countrycode="PL" value="21287">Poland(48)</option>
                                                            <option data-countrycode="PT" value="21292">Portugal(351)</option>
                                                            <option data-countrycode="PR" value="21290">Puerto Rico(+1-787 and 1-939)</option>
                                                            <option data-countrycode="QA" value="21295">Qatar(974)</option>
                                                            <option data-countrycode="CG" value="21150">Republic of the Congo(242)</option>
                                                            <option data-countrycode="RE" value="21296">Reunion(262)</option>
                                                            <option data-countrycode="RO" value="21297">Romania(40)</option>
                                                            <option data-countrycode="RU" value="21299">Russia(7)</option>
                                                            <option data-countrycode="RW" value="21300">Rwanda(250)</option>
                                                            <option data-countrycode="BL" value="21134">Saint BarthÃ©lemy(590)</option>
                                                            <option data-countrycode="SH" value="21307">Saint Helena(290)</option>
                                                            <option data-countrycode="KN" value="21229">Saint Kitts and Nevis(+1-869)</option>
                                                            <option data-countrycode="LC" value="21237">Saint Lucia(+1-758)</option>
                                                            <option data-countrycode="MF" value="21250">Saint Martin(590)</option>
                                                            <option data-countrycode="PM" value="21288">Saint Pierre and Miquelon(508)</option>
                                                            <option data-countrycode="VC" value="21345">Saint Vincent and the Grenadines(+1-784)</option>
                                                            <option data-countrycode="WS" value="21352">Samoa(685)</option>
                                                            <option data-countrycode="SM" value="21312">San Marino(378)</option>
                                                            <option data-countrycode="ST" value="21317">Sao Tome and Principe(239)</option>
                                                            <option data-countrycode="SA" value="21301">Saudi Arabia(966)</option>
                                                            <option data-countrycode="SN" value="21313">Senegal(221)</option>
                                                            <option data-countrycode="RS" value="21298">Serbia(381)</option>
                                                            <option data-countrycode="CS" value="21159">Serbia and Montenegro(381)</option>
                                                            <option data-countrycode="SC" value="21303">Seychelles(248)</option>
                                                            <option data-countrycode="SL" value="21311">Sierra Leone(232)</option>
                                                            <option data-countrycode="SG" value="21306">Singapore(65)</option>
                                                            <option data-countrycode="SX" value="21319">Sint Maarten(599)</option>
                                                            <option data-countrycode="SK" value="21310">Slovakia(421)</option>
                                                            <option data-countrycode="SI" value="21308">Slovenia(386)</option>
                                                            <option data-countrycode="SB" value="21302">Solomon Islands(677)</option>
                                                            <option data-countrycode="SO" value="21314">Somalia(252)</option>
                                                            <option data-countrycode="ZA" value="21356">South Africa(27)</option>
                                                            <option data-countrycode="GS" value="21199">South Georgia and the South Sandwich Islands()</option>
                                                            <option data-countrycode="KR" value="21231">South Korea(82)</option>
                                                            <option data-countrycode="SS" value="21316">South Sudan(211)</option>
                                                            <option data-countrycode="ES" value="21177">Spain(34)</option>
                                                            <option data-countrycode="LK" value="21239">Sri Lanka(94)</option>
                                                            <option data-countrycode="SD" value="21304">Sudan(249)</option>
                                                            <option data-countrycode="SR" value="21315">Suriname(597)</option>
                                                            <option data-countrycode="SJ" value="21309">Svalbard and Jan Mayen(47)</option>
                                                            <option data-countrycode="SZ" value="21321">Swaziland(268)</option>
                                                            <option data-countrycode="SE" value="21305">Sweden(46)</option>
                                                            <option data-countrycode="CH" value="21151">Switzerland(41)</option>
                                                            <option data-countrycode="SY" value="21320">Syria(963)</option>
                                                            <option data-countrycode="TW" value="21336">Taiwan(886)</option>
                                                            <option data-countrycode="TJ" value="21327">Tajikistan(992)</option>
                                                            <option data-countrycode="TZ" value="21337">Tanzania(255)</option>
                                                            <option data-countrycode="TH" value="21326">Thailand(66)</option>
                                                            <option data-countrycode="TG" value="21325">Togo(228)</option>
                                                            <option data-countrycode="TK" value="21328">Tokelau(690)</option>
                                                            <option data-countrycode="TO" value="21332">Tonga(676)</option>
                                                            <option data-countrycode="TT" value="21334">Trinidad and Tobago(+1-868)</option>
                                                            <option data-countrycode="TN" value="21331">Tunisia(216)</option>
                                                            <option data-countrycode="TR" value="21333">Turkey(90)</option>
                                                            <option data-countrycode="TM" value="21330">Turkmenistan(993)</option>
                                                            <option data-countrycode="TC" value="21322">Turks and Caicos Islands(+1-649)</option>
                                                            <option data-countrycode="TV" value="21335">Tuvalu(688)</option>
                                                            <option data-countrycode="UG" value="21339">Uganda(256)</option>
                                                            <option data-countrycode="UA" value="21338">Ukraine(380)</option>
                                                            <option data-countrycode="AE" value="21109">United Arab Emirates(971)</option>
                                                            <option data-countrycode="GB" value="21186">United Kingdom(44)</option>
                                                            <option data-countrycode="US" value="21341">United States(1)</option>
                                                            <option data-countrycode="UM" value="21340">United States Minor Outlying Islands(1)</option>
                                                            <option data-countrycode="UY" value="21342">Uruguay(598)</option>
                                                            <option data-countrycode="VI" value="21348">U.S. Virgin Islands(+1-340)</option>
                                                            <option data-countrycode="UZ" value="21343">Uzbekistan(998)</option>
                                                            <option data-countrycode="VU" value="21350">Vanuatu(678)</option>
                                                            <option data-countrycode="VA" value="21344">Vatican(379)</option>
                                                            <option data-countrycode="VE" value="21346">Venezuela(58)</option>
                                                            <option data-countrycode="VN" value="21349">Vietnam(84)</option>
                                                            <option data-countrycode="WF" value="21351">Wallis and Futuna(681)</option>
                                                            <option data-countrycode="EH" value="21175">Western Sahara(212)</option>
                                                            <option data-countrycode="YE" value="21354">Yemen(967)</option>
                                                            <option data-countrycode="ZM" value="21357">Zambia(260)</option>
                                                            <option data-countrycode="ZW" value="21358">Zimbabwe(263)</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12 mrd">
                                                        <label>Destination Country</label>
                                                        <select onchange="isPaymentRequired(this.value)" class="form-control" required="" name="destinationCountry" id="destinationCountry">
                                                            <option value=""></option>
                                                            <optgroup label="Most visited countries">
                                                                <option data-countrycode="AE" value="21109">
                                                                    United Arab Emirates(971)
                                                                </option>
                                                                <option data-countrycode="AE" value="21186">
                                                                    United Kingdom(44)
                                                                </option>
                                                                <option data-countrycode="US" value="21341">
                                                                    United States(1)
                                                                </option>
                                                                <option data-countrycode="CA" value="21146">
                                                                    Canada(1)
                                                                </option>
                                                            </optgroup>
                                                            <optgroup label="Other countries">
                                                                <option data-countrycode="AF" value="21110">Afghanistan(93)</option>
                                                                <option data-countrycode="AX" value="21123">Aland Islands(+358-18)</option>
                                                                <option data-countrycode="AL" value="21113">Albania(355)</option>
                                                                <option data-countrycode="DZ" value="21171">Algeria(213)</option>
                                                                <option data-countrycode="AS" value="21119">American Samoa(+1-684)</option>
                                                                <option data-countrycode="AD" value="21108">Andorra(376)</option>
                                                                <option data-countrycode="AO" value="21116">Angola(244)</option>
                                                                <option data-countrycode="AI" value="21112">Anguilla(+1-264)</option>
                                                                <option data-countrycode="AQ" value="21117">Antarctica()</option>
                                                                <option data-countrycode="AG" value="21111">Antigua and Barbuda(+1-268)</option>
                                                                <option data-countrycode="AR" value="21118">Argentina(54)</option>
                                                                <option data-countrycode="AM" value="21114">Armenia(374)</option>
                                                                <option data-countrycode="AW" value="21122">Aruba(297)</option>
                                                                <option data-countrycode="AU" value="21121">Australia(61)</option>
                                                                <option data-countrycode="AT" value="21120">Austria(43)</option>
                                                                <option data-countrycode="AZ" value="21124">Azerbaijan(994)</option>
                                                                <option data-countrycode="BS" value="21140">Bahamas(+1-242)</option>
                                                                <option data-countrycode="BH" value="21131">Bahrain(973)</option>
                                                                <option data-countrycode="BD" value="21127">Bangladesh(880)</option>
                                                                <option data-countrycode="BB" value="21126">Barbados(+1-246)</option>
                                                                <option data-countrycode="BY" value="21144">Belarus(375)</option>
                                                                <option data-countrycode="BE" value="21128">Belgium(32)</option>
                                                                <option data-countrycode="BZ" value="21145">Belize(501)</option>
                                                                <option data-countrycode="BJ" value="21133">Benin(229)</option>
                                                                <option data-countrycode="BM" value="21135">Bermuda(+1-441)</option>
                                                                <option data-countrycode="BT" value="21141">Bhutan(975)</option>
                                                                <option data-countrycode="BO" value="21137">Bolivia(591)</option>
                                                                <option data-countrycode="BQ" value="21138">Bonaire, Saint Eustatius and Saba (599)</option>
                                                                <option data-countrycode="BA" value="21125">Bosnia and Herzegovina(387)</option>
                                                                <option data-countrycode="BW" value="21143">Botswana(267)</option>
                                                                <option data-countrycode="BV" value="21142">Bouvet Island()</option>
                                                                <option data-countrycode="BR" value="21139">Brazil(55)</option>
                                                                <option data-countrycode="IO" value="21215">British Indian Ocean Territory(246)</option>
                                                                <option data-countrycode="VG" value="21347">British Virgin Islands(+1-284)</option>
                                                                <option data-countrycode="BN" value="21136">Brunei(673)</option>
                                                                <option data-countrycode="BG" value="21130">Bulgaria(359)</option>
                                                                <option data-countrycode="BF" value="21129">Burkina Faso(226)</option>
                                                                <option data-countrycode="BI" value="21132">Burundi(257)</option>
                                                                <option data-countrycode="KH" value="21226">Cambodia(855)</option>
                                                                <option data-countrycode="CM" value="21155">Cameroon(237)</option>
                                                                <option data-countrycode="CA" value="21146">Canada(1)</option>
                                                                <option data-countrycode="CV" value="21161">Cape Verde(238)</option>
                                                                <option data-countrycode="KY" value="21233">Cayman Islands(+1-345)</option>
                                                                <option data-countrycode="CF" value="21149">Central African Republic(236)</option>
                                                                <option data-countrycode="TD" value="21323">Chad(235)</option>
                                                                <option data-countrycode="CL" value="21154">Chile(56)</option>
                                                                <option data-countrycode="CN" value="21156">China(86)</option>
                                                                <option data-countrycode="CX" value="21163">Christmas Island(61)</option>
                                                                <option data-countrycode="CC" value="21147">Cocos Islands(61)</option>
                                                                <option data-countrycode="CO" value="21157">Colombia(57)</option>
                                                                <option data-countrycode="KM" value="21228">Comoros(269)</option>
                                                                <option data-countrycode="CK" value="21153">Cook Islands(682)</option>
                                                                <option data-countrycode="CR" value="21158">Costa Rica(506)</option>
                                                                <option data-countrycode="HR" value="21207">Croatia(385)</option>
                                                                <option data-countrycode="CU" value="21160">Cuba(53)</option>
                                                                <option data-countrycode="CW" value="21162">CuraÃ§ao(599)</option>
                                                                <option data-countrycode="CY" value="21164">Cyprus(357)</option>
                                                                <option data-countrycode="CZ" value="21165">Czech Republic(420)</option>
                                                                <option data-countrycode="CD" value="21148">Democratic Republic of the Congo(243)</option>
                                                                <option data-countrycode="DK" value="21168">Denmark(45)</option>
                                                                <option data-countrycode="DJ" value="21167">Djibouti(253)</option>
                                                                <option data-countrycode="DM" value="21169">Dominica(+1-767)</option>
                                                                <option data-countrycode="DO" value="21170">Dominican Republic(+1-809 and 1-829)</option>
                                                                <option data-countrycode="TL" value="21329">East Timor(670)</option>
                                                                <option data-countrycode="EC" value="21172">Ecuador(593)</option>
                                                                <option data-countrycode="EG" value="21174">Egypt(20)</option>
                                                                <option data-countrycode="SV" value="21318">El Salvador(503)</option>
                                                                <option data-countrycode="GQ" value="21197">Equatorial Guinea(240)</option>
                                                                <option data-countrycode="ER" value="21176">Eritrea(291)</option>
                                                                <option data-countrycode="EE" value="21173">Estonia(372)</option>
                                                                <option data-countrycode="ET" value="21178">Ethiopia(251)</option>
                                                                <option data-countrycode="FK" value="21181">Falkland Islands(500)</option>
                                                                <option data-countrycode="FO" value="21183">Faroe Islands(298)</option>
                                                                <option data-countrycode="FJ" value="21180">Fiji(679)</option>
                                                                <option data-countrycode="FI" value="21179">Finland(358)</option>
                                                                <option data-countrycode="FR" value="21184">France(33)</option>
                                                                <option data-countrycode="GF" value="21189">French Guiana(594)</option>
                                                                <option data-countrycode="PF" value="21283">French Polynesia(689)</option>
                                                                <option data-countrycode="TF" value="21324">French Southern Territories()</option>
                                                                <option data-countrycode="GA" value="21185">Gabon(241)</option>
                                                                <option data-countrycode="GM" value="21194">Gambia(220)</option>
                                                                <option data-countrycode="GE" value="21188">Georgia(995)</option>
                                                                <option data-countrycode="DE" value="21166">Germany(49)</option>
                                                                <option data-countrycode="GH" value="21191">Ghana(233)</option>
                                                                <option data-countrycode="GI" value="21192">Gibraltar(350)</option>
                                                                <option data-countrycode="GR" value="21198">Greece(30)</option>
                                                                <option data-countrycode="GL" value="21193">Greenland(299)</option>
                                                                <option data-countrycode="GD" value="21187">Grenada(+1-473)</option>
                                                                <option data-countrycode="GP" value="21196">Guadeloupe(590)</option>
                                                                <option data-countrycode="GU" value="21201">Guam(+1-671)</option>
                                                                <option data-countrycode="GT" value="21200">Guatemala(502)</option>
                                                                <option data-countrycode="GG" value="21190">Guernsey(+44-1481)</option>
                                                                <option data-countrycode="GN" value="21195">Guinea(224)</option>
                                                                <option data-countrycode="GW" value="21202">Guinea-Bissau(245)</option>
                                                                <option data-countrycode="GY" value="21203">Guyana(592)</option>
                                                                <option data-countrycode="HT" value="21208">Haiti(509)</option>
                                                                <option data-countrycode="HM" value="21205">Heard Island and McDonald Islands( )</option>
                                                                <option data-countrycode="HN" value="21206">Honduras(504)</option>
                                                                <option data-countrycode="HK" value="21204">Hong Kong(852)</option>
                                                                <option data-countrycode="HU" value="21209">Hungary(36)</option>
                                                                <option data-countrycode="IS" value="21218">Iceland(354)</option>
                                                                <option data-countrycode="IN" value="21214">India(91)</option>
                                                                <option data-countrycode="ID" value="21210">Indonesia(62)</option>
                                                                <option data-countrycode="IR" value="21217">Iran(98)</option>
                                                                <option data-countrycode="IQ" value="21216">Iraq(964)</option>
                                                                <option data-countrycode="IE" value="21211">Ireland(353)</option>
                                                                <option data-countrycode="IM" value="21213">Isle of Man(+44-1624)</option>
                                                                <option data-countrycode="IL" value="21212">Israel(972)</option>
                                                                <option data-countrycode="IT" value="21219">Italy(39)</option>
                                                                <option data-countrycode="CI" value="21152">Ivory Coast(225)</option>
                                                                <option data-countrycode="JM" value="21221">Jamaica(+1-876)</option>
                                                                <option data-countrycode="JP" value="21223">Japan(81)</option>
                                                                <option data-countrycode="JE" value="21220">Jersey(+44-1534)</option>
                                                                <option data-countrycode="JO" value="21222">Jordan(962)</option>
                                                                <option data-countrycode="KZ" value="21234">Kazakhstan(7)</option>
                                                                <option data-countrycode="KE" value="21224">Kenya(254)</option>
                                                                <option data-countrycode="KI" value="21227">Kiribati(686)</option>
                                                                <option data-countrycode="XK" value="21353">Kosovo()</option>
                                                                <option data-countrycode="KW" value="21232">Kuwait(965)</option>
                                                                <option data-countrycode="KG" value="21225">Kyrgyzstan(996)</option>
                                                                <option data-countrycode="LA" value="21235">Laos(856)</option>
                                                                <option data-countrycode="LV" value="21244">Latvia(371)</option>
                                                                <option data-countrycode="LB" value="21236">Lebanon(961)</option>
                                                                <option data-countrycode="LS" value="21241">Lesotho(266)</option>
                                                                <option data-countrycode="LR" value="21240">Liberia(231)</option>
                                                                <option data-countrycode="LY" value="21245">Libya(218)</option>
                                                                <option data-countrycode="LI" value="21238">Liechtenstein(423)</option>
                                                                <option data-countrycode="LT" value="21242">Lithuania(370)</option>
                                                                <option data-countrycode="LU" value="21243">Luxembourg(352)</option>
                                                                <option data-countrycode="MO" value="21257">Macao(853)</option>
                                                                <option data-countrycode="MK" value="21253">Macedonia(389)</option>
                                                                <option data-countrycode="MG" value="21251">Madagascar(261)</option>
                                                                <option data-countrycode="MW" value="21265">Malawi(265)</option>
                                                                <option data-countrycode="MY" value="21267">Malaysia(60)</option>
                                                                <option data-countrycode="MV" value="21264">Maldives(960)</option>
                                                                <option data-countrycode="ML" value="21254">Mali(223)</option>
                                                                <option data-countrycode="MT" value="21262">Malta(356)</option>
                                                                <option data-countrycode="MH" value="21252">Marshall Islands(692)</option>
                                                                <option data-countrycode="MQ" value="21259">Martinique(596)</option>
                                                                <option data-countrycode="MR" value="21260">Mauritania(222)</option>
                                                                <option data-countrycode="MU" value="21263">Mauritius(230)</option>
                                                                <option data-countrycode="YT" value="21355">Mayotte(262)</option>
                                                                <option data-countrycode="MX" value="21266">Mexico(52)</option>
                                                                <option data-countrycode="FM" value="21182">Micronesia(691)</option>
                                                                <option data-countrycode="MD" value="21248">Moldova(373)</option>
                                                                <option data-countrycode="MC" value="21247">Monaco(377)</option>
                                                                <option data-countrycode="MN" value="21256">Mongolia(976)</option>
                                                                <option data-countrycode="ME" value="21249">Montenegro(382)</option>
                                                                <option data-countrycode="MS" value="21261">Montserrat(+1-664)</option>
                                                                <option data-countrycode="MA" value="21246">Morocco(212)</option>
                                                                <option data-countrycode="MZ" value="21268">Mozambique(258)</option>
                                                                <option data-countrycode="MM" value="21255">Myanmar(95)</option>
                                                                <option data-countrycode="NA" value="21269">Namibia(264)</option>
                                                                <option data-countrycode="NR" value="21277">Nauru(674)</option>
                                                                <option data-countrycode="NP" value="21276">Nepal(977)</option>
                                                                <option data-countrycode="NL" value="21274">Netherlands(31)</option>
                                                                <option data-countrycode="AN" value="21115">Netherlands Antilles(599)</option>
                                                                <option data-countrycode="NC" value="21270">New Caledonia(687)</option>
                                                                <option data-countrycode="NZ" value="21279">New Zealand(64)</option>
                                                                <option data-countrycode="NI" value="21273">Nicaragua(505)</option>
                                                                <option data-countrycode="NE" value="21271">Niger(227)</option>
                                                                <option data-countrycode="NG" value="1">NIGERIA(234)</option>
                                                                <option data-countrycode="NU" value="21278">Niue(683)</option>
                                                                <option data-countrycode="NF" value="21272">Norfolk Island(672)</option>
                                                                <option data-countrycode="MP" value="21258">Northern Mariana Islands(+1-670)</option>
                                                                <option data-countrycode="KP" value="21230">North Korea(850)</option>
                                                                <option data-countrycode="NO" value="21275">Norway(47)</option>
                                                                <option data-countrycode="OM" value="21280">Oman(968)</option>
                                                                <option data-countrycode="PK" value="21286">Pakistan(92)</option>
                                                                <option data-countrycode="PW" value="21293">Palau(680)</option>
                                                                <option data-countrycode="PS" value="21291">Palestinian Territory(970)</option>
                                                                <option data-countrycode="PA" value="21281">Panama(507)</option>
                                                                <option data-countrycode="PG" value="21284">Papua New Guinea(675)</option>
                                                                <option data-countrycode="PY" value="21294">Paraguay(595)</option>
                                                                <option data-countrycode="PE" value="21282">Peru(51)</option>
                                                                <option data-countrycode="PH" value="21285">Philippines(63)</option>
                                                                <option data-countrycode="PN" value="21289">Pitcairn(870)</option>
                                                                <option data-countrycode="PL" value="21287">Poland(48)</option>
                                                                <option data-countrycode="PT" value="21292">Portugal(351)</option>
                                                                <option data-countrycode="PR" value="21290">Puerto Rico(+1-787 and 1-939)</option>
                                                                <option data-countrycode="QA" value="21295">Qatar(974)</option>
                                                                <option data-countrycode="CG" value="21150">Republic of the Congo(242)</option>
                                                                <option data-countrycode="RE" value="21296">Reunion(262)</option>
                                                                <option data-countrycode="RO" value="21297">Romania(40)</option>
                                                                <option data-countrycode="RU" value="21299">Russia(7)</option>
                                                                <option data-countrycode="RW" value="21300">Rwanda(250)</option>
                                                                <option data-countrycode="BL" value="21134">Saint BarthÃ©lemy(590)</option>
                                                                <option data-countrycode="SH" value="21307">Saint Helena(290)</option>
                                                                <option data-countrycode="KN" value="21229">Saint Kitts and Nevis(+1-869)</option>
                                                                <option data-countrycode="LC" value="21237">Saint Lucia(+1-758)</option>
                                                                <option data-countrycode="MF" value="21250">Saint Martin(590)</option>
                                                                <option data-countrycode="PM" value="21288">Saint Pierre and Miquelon(508)</option>
                                                                <option data-countrycode="VC" value="21345">Saint Vincent and the Grenadines(+1-784)</option>
                                                                <option data-countrycode="WS" value="21352">Samoa(685)</option>
                                                                <option data-countrycode="SM" value="21312">San Marino(378)</option>
                                                                <option data-countrycode="ST" value="21317">Sao Tome and Principe(239)</option>
                                                                <option data-countrycode="SA" value="21301">Saudi Arabia(966)</option>
                                                                <option data-countrycode="SN" value="21313">Senegal(221)</option>
                                                                <option data-countrycode="RS" value="21298">Serbia(381)</option>
                                                                <option data-countrycode="CS" value="21159">Serbia and Montenegro(381)</option>
                                                                <option data-countrycode="SC" value="21303">Seychelles(248)</option>
                                                                <option data-countrycode="SL" value="21311">Sierra Leone(232)</option>
                                                                <option data-countrycode="SG" value="21306">Singapore(65)</option>
                                                                <option data-countrycode="SX" value="21319">Sint Maarten(599)</option>
                                                                <option data-countrycode="SK" value="21310">Slovakia(421)</option>
                                                                <option data-countrycode="SI" value="21308">Slovenia(386)</option>
                                                                <option data-countrycode="SB" value="21302">Solomon Islands(677)</option>
                                                                <option data-countrycode="SO" value="21314">Somalia(252)</option>
                                                                <option data-countrycode="ZA" value="21356">South Africa(27)</option>
                                                                <option data-countrycode="GS" value="21199">South Georgia and the South Sandwich Islands()</option>
                                                                <option data-countrycode="KR" value="21231">South Korea(82)</option>
                                                                <option data-countrycode="SS" value="21316">South Sudan(211)</option>
                                                                <option data-countrycode="ES" value="21177">Spain(34)</option>
                                                                <option data-countrycode="LK" value="21239">Sri Lanka(94)</option>
                                                                <option data-countrycode="SD" value="21304">Sudan(249)</option>
                                                                <option data-countrycode="SR" value="21315">Suriname(597)</option>
                                                                <option data-countrycode="SJ" value="21309">Svalbard and Jan Mayen(47)</option>
                                                                <option data-countrycode="SZ" value="21321">Swaziland(268)</option>
                                                                <option data-countrycode="SE" value="21305">Sweden(46)</option>
                                                                <option data-countrycode="CH" value="21151">Switzerland(41)</option>
                                                                <option data-countrycode="SY" value="21320">Syria(963)</option>
                                                                <option data-countrycode="TW" value="21336">Taiwan(886)</option>
                                                                <option data-countrycode="TJ" value="21327">Tajikistan(992)</option>
                                                                <option data-countrycode="TZ" value="21337">Tanzania(255)</option>
                                                                <option data-countrycode="TH" value="21326">Thailand(66)</option>
                                                                <option data-countrycode="TG" value="21325">Togo(228)</option>
                                                                <option data-countrycode="TK" value="21328">Tokelau(690)</option>
                                                                <option data-countrycode="TO" value="21332">Tonga(676)</option>
                                                                <option data-countrycode="TT" value="21334">Trinidad and Tobago(+1-868)</option>
                                                                <option data-countrycode="TN" value="21331">Tunisia(216)</option>
                                                                <option data-countrycode="TR" value="21333">Turkey(90)</option>
                                                                <option data-countrycode="TM" value="21330">Turkmenistan(993)</option>
                                                                <option data-countrycode="TC" value="21322">Turks and Caicos Islands(+1-649)</option>
                                                                <option data-countrycode="TV" value="21335">Tuvalu(688)</option>
                                                                <option data-countrycode="UG" value="21339">Uganda(256)</option>
                                                                <option data-countrycode="UA" value="21338">Ukraine(380)</option>
                                                                <option data-countrycode="AE" value="21109">United Arab Emirates(971)</option>
                                                                <option data-countrycode="GB" value="21186">United Kingdom(44)</option>
                                                                <option data-countrycode="US" value="21341">United States(1)</option>
                                                                <option data-countrycode="UM" value="21340">United States Minor Outlying Islands(1)</option>
                                                                <option data-countrycode="UY" value="21342">Uruguay(598)</option>
                                                                <option data-countrycode="VI" value="21348">U.S. Virgin Islands(+1-340)</option>
                                                                <option data-countrycode="UZ" value="21343">Uzbekistan(998)</option>
                                                                <option data-countrycode="VU" value="21350">Vanuatu(678)</option>
                                                                <option data-countrycode="VA" value="21344">Vatican(379)</option>
                                                                <option data-countrycode="VE" value="21346">Venezuela(58)</option>
                                                                <option data-countrycode="VN" value="21349">Vietnam(84)</option>
                                                                <option data-countrycode="WF" value="21351">Wallis and Futuna(681)</option>
                                                                <option data-countrycode="EH" value="21175">Western Sahara(212)</option>
                                                                <option data-countrycode="YE" value="21354">Yemen(967)</option>
                                                                <option data-countrycode="ZM" value="21357">Zambia(260)</option>
                                                                <option data-countrycode="ZW" value="21358">Zimbabwe(263)</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-xs-12 mrd">
                                                        <label class="">Message</label>
                                                        <textarea rows="3" class="form-control" name="message" id="message" placeholder="Please enter your message here" maxlength="400"></textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" class="" name="middleName" value="">
                                                <div class="row form-group">
                                                    <div class="col-md-6 col-md-offset-2 captcha">
                                                        <div class="g-recaptcha" data-sitekey="6LfXMS4UAAAAAIikgY0p5X1eEsZim03cgXOQJWzp" data-callback="handleCaptchaCallback">
                                                            <div style="width: 304px; height: 78px;">
                                                                <div><iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfXMS4UAAAAAIikgY0p5X1eEsZim03cgXOQJWzp&amp;co=aHR0cHM6Ly93d3cudHJhdmVsYmV0YS5jb206NDQz&amp;hl=en&amp;v=dPctOHA2ifhWm5WzFM_B5TjT&amp;size=normal&amp;cb=p5hqp1pxw5g1" role="presentation" name="a-im8vnonbxkzy" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" width="304" height="78" frameborder="0"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                                            </div><iframe style="display: none;"></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <!--<div class="col-sms-6 col-sm-6 col-xs-6">
                                                          <a href="/" class="button btn-medium red col-xs-12 col-sms-12 col-sm-12 sky">CLOSE FORM</a>
                                                        </div> -->
                                                    <div class="col-sms-12 col-sm-12 col-xs-12">
                                                        <button type="submit" class="btn-medium col-xs-12 col-sms-12 col-sm-12 visa_cta">SUBMIT FORM</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--<div class="row copy-mobile">
                                <div class="col-md-12">
                                    <h1>Travel Visa Assistance Program</h1>
                                    <p>Travelbeta visa team is made up of seasoned, specialized and experienced experts in visa processing.</p>
                                    <p>Our process includes profiling, helping you to complete your visa application forms, vetting documents, getting appointment dates, conducting pre-interview session where applicable and making sure you have 99% chances of getting the visa.</p>
                                    <p>We do not encourage immigration defaults and kindly note that issuance of visas is at the discretion of the embassy.</p>
                                    <p>
                                        Contact our visa consultants for all your Travel visa related questions. <br>
                                        Email: visa@travelbeta.com<br>
                                        Phone: 08179704269
                                    </p>
                                </div>
                            </div>-->
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection