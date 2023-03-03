@extends('layouts.frontend')
@section('title', @$seoDetails->meta_title)
@section('meta_title', '')
@section('meta_keyword', '')
@section('meta_description', '')
@section('bodyclass', 'homepage')
@section('content')
<style>
    #myUL .coupon_li {
        display: none;
    }

    .no-js #loader {
        display: none;
    }

    .js #loader {
        display: block;
        position: absolute;
        left: 100px;
        top: 0;
    }
</style>
<style>
    .help-block {
        color: #f33;
    }
</style>
<style>
    .country_field .niceCountryInputMenu {
        border: 1px solid #ced4da;
        width: 100%;
        border-radius: 4px;
        padding: 2px 5px;
    }

    .location_search .is_search_from_val li,
    .location_search_to .is_search_to_val li {
        cursor: pointer;
    }

    .location_search .is_search_from_val li:hover,
    .location_search_to .is_search_to_val li:hover {
        background: #f2f2f2;
        cursor: pointer;
        border-left: 4px solid #89ad3e;
    }

    .location_search .is_search_from_val li,
    .location_search_to .is_search_to_val li {
        border-left: 4px solid #fff;
    }

    .se-pre-con {
        display: none;
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url(http://24hr.lightmytrip.com/public/img/Rolling-1s-48px.gif) center no-repeat #fff;
    }

    #myUL li {
        display: none;
    }

    #myULair li {
        display: none;
    }

    #mucoverinc li.insu {
        display: none;
    }

    #mucoverinc {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
    }

    < !--@import url("https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/blitzer/jquery-ui.min.css");

    -->.ui-datepicker td span,
    .ui-datepicker td a {
        padding-bottom: 1em;
    }

    .ui-datepicker td[title]::after {
        content: attr(title);
        display: block;
        position: relative;
        font-size: .8em;
        height: 1.25em;
        margin-top: -1.25em;
        text-align: right;
        padding-right: .25em;
        color: #fff;
    }

    .ui-datepicker td.ui-state-disabled[title]::after {
        content: '';
        display: none;
        position: unset;
    }
</style>
<!-- Global site tag (gtag.js) - Google Analytics 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172343415-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-172343415-1');
</script> -->

<script src='https://www.google.com/recaptcha/api.js'></script>
</head>



<style>
    body,
    #full-container {
        background-color: #eaf0f3;
    }

    .errors {
        color: red;
    }

    .img-res {
        max-width: 100%;
        max-height: 100%;
    }

    .rvbg {
        background: #d6e6f3;
        padding: 10px 0px;
    }

    .listoption>ul {
        display: flex;
        justify-content: center;
        column-gap: 20px;
    }

    .listoption>ul>li {
        width: 33.3%;
        text-align: center;
        border: 1px transparent;
        padding: 5px 5px;
        position: relative;
    }

    .listoption>ul>li:first-child::after {
        display: none;
    }

    .listoption>ul>li::after {
        position: absolute;
        top: 20px;
        left: calc(-50% - 13px / 2);
        width: 100%;
        height: 1px;
        background: #b2c9db;
        content: '';
    }

    .listoption>ul>.step_act::after {
        background: #020180;
    }

    .listoption>ul>li>span {
        width: 30px;
        height: 30px;
        background: #b2c9db;
        margin: auto;
        border-radius: 50px;
        color: #fff;
        line-height: 30px;
        margin-bottom: 10px;
    }

    .listoption>ul>.step_act>span {
        background: #020180;
    }

    .listoption>ul>li>span,
    .listoption>ul>li>h6 {
        display: block;
        text-align: center;
    }

    .listoption>ul>li>h6 {
        color: #b2c9db;
        font-size: 15px;
        margin-bottom: 0;
    }

    .listoption>ul>.step_act>h6 {
        color: #020180;
    }


    .detailsmain {
        display: flex;
        margin-bottom: 50px;
    }

    .leftmain_rv {
        width: 75%;
        padding-right: 20px;
    }

    .rightmain_rv {
        width: 25%;
    }

    .dts_heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .dts_heading>h1 {
        font-size: 22px;
        font-weight: 600;

    }

    .mtprew1 {
        margin: 30px 0;
    }




    .whitebrd {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 2px 4px 0 rgb(0 0 0 / 5%);
    }

    .pdbox_wht {
        padding: 20px;
    }

    .bookingtimer>h6 {
        font-size: 18px;
        color: #504f4f;
        margin-bottom: 10px;
        display: block;
    }

    .bookingtimer #clockdiv {
        font-size: 40px;
        position: relative;
        color: #565656;
        line-height: normal;
    }

    .bookingtimer #clockdiv b {
        font-size: 16px;
    }

    .bookingtimer #clockdiv span {
        margin: 0 8px;
    }

    .farebox {
        margin-top: 30px;
    }

    .farebox>h3 {
        border-bottom: 1px solid #ddd;
        font-size: 20px;
        font-weight: bold;
        padding: 10px 10px;
        color: #000;
        margin-bottom: 0;
    }

    .fareclps {
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }

    .fareclps>button[aria-expanded="true"] i {
        transform: rotate(180deg);
    }

    .fareclps>button i {
        margin-left: 5px;
    }

    .fareclps button {
        border: none;
        width: 100%;
        text-align: left;
        padding: 4px 10px;
        color: #4a4949;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .basefareul>li {
        display: flex;
        justify-content: space-between;

        font-size: 13px;
        color: #424242;
    }

    .brdbase>li {
        border-bottom: 1px dashed #ddd;
        margin-top: 6px;
    }

    .paybx {

        padding: 7px 15px;
        color: #fff;
        margin-bottom: 0;
    }

    .paybx .basefareul>li>span {
        font-size: 15px;
    }

    .bookbtn_fare {
        text-align: center;
        padding: 15px 10px;
    }

    .bookbtn_fare .cntsd_book {
        background-color: #5091fb;
        transition: all .5s ease-in-out;
    }

    .bookbtn_fare .cntsd_book:hover {
        background-color: #2461c2;
    }

    .bookbtn_fare .cntsd_book i {
        margin-left: 10px;
    }









    .mtprew2 {
        margin: 30px 0 0 0;
    }

    .nty_txt>span {
        padding: 8px 16px;
        background-color: #D8E5FF;
        border-radius: 4px;
        font-size: 14px;
        color: #000;
        display: block;
        margin-top: 10px;
    }

    .fortr {
        margin-top: 20px;
    }

    .fortr>h2 {

        font-size: 18px;
        font-weight: bold;
        color: #000;
        border-bottom: 1px dashed #ddd;
        padding-bottom: 12px;

    }

    .form_tvl {
        display: flex;
        column-gap: 20px;
    }

    .tvlbox>label {
        font-size: 15px;
        color: #000;
        font-weight: bold;
        margin-bottom: 0;
    }

    .tvlbox>label>span {
        color: red;
        margin-left: 5px;
    }

    .col4 .tvlbox {
        width: 25%;

    }

    .col2 .tvlbox {
        width: 50%;

    }

    .col4 .deps {
        width: 17%;

    }

    .datesm1 {
        width: 25%;

    }

    .datesm2 {
        width: 75%;

    }

    .input_sc {
        border: none;
        border-bottom: 2px solid #ddd;
        border-radius: initial;
        color: #000;
        padding: 8px 0px;
        height: auto;
        font-size: 14px;
        width: 100%;
        line-height: normal;
    }

    .inhegt {
        height: 37px;
    }




    .radio_gd,
    .radio_gd>li {
        display: flex;
    }

    .radio_gd {
        column-gap: 10px;
    }

    .radio_gd>li {
        align-items: center;
        border: 1px solid #ddd;
        padding: 4px 10px;
        border-radius: 3px;
    }

    .radio_gd>li>input {
        width: 15px;
        height: 15px;
        margin-top: 0;
        margin-right: 3px;
    }

    .radio_gd>li>label {
        font-size: 15px;
        margin-bottom: 0;
    }

    .input_sc:focus {
        box-shadow: none;
        border-color: #ddd;
        background: #fff;
        color: #000;
    }

    .pritotal_main {
        transition: all .5s ease-in-out;
    }

    .fixed-header-right {
        position: fixed;
        top: 50px;
    }

    .mbbx_frm {
        margin-bottom: 30px;
    }

    .fortr>span {
        margin-bottom: 15px;
        display: block;
    }


    @media screen and (max-width: 1024px) {
        .listoption>ul>li>h6 {
            font-size: 12px;
        }

        .detailsmain,
        .flexws,
        .btmlist_to {
            display: block;
        }

        .leftmain_rv {
            width: 100%;
            padding-right: 0;
        }

        .dts_heading>h1,
        .to_list>span,
        .fortr>h2 {
            font-size: 15px;
        }

        .dts_heading>span {
            font-size: 13px;
        }

        .leftlogo_rv,
        .righttxt_rv {
            width: 100%;
        }

        .tbrtvr>h4 {
            font-size: 16px;
        }

        .btmlist_to>span {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        .rightmain_rv {
            width: 100%;
        }

        .mtprew1 {
            margin: 20px 0;
        }

        .ckeck_trm input {
            width: 100px;
        }

        .form_tvl {
            display: block;
            column-gap: 0;
        }

        .col4 .deps,
        .col4 .tvlbox,
        .datesm1,
        .datesm2 {
            width: 100%;
        }

        .fixed-header-right {
            position: relative;
            top: 0;
        }

        .tvlbox {
            margin-bottom: 10px;
        }
    }
</style>
<script>
    //     $(document).ready(function() {
    //         $(window).scroll(function() {
    //             if ($(window).scrollTop() >= 300) {
    //                 $('.pritotal_main').addClass('fixed-header-right');

    //             } else {
    //                 $('.pritotal_main').removeClass('fixed-header-right');

    //             }
    //         });

    //     });

    // 
</script>
<section class="rvbg">
    <div class="container">
        <div class="listoption">
            <ul>
                <li class="step_act">
                    <span>1</span>
                    <h6>Flight & Traveler Details</h6>

                </li>

                <li class="step_act">
                    <span>2</span>
                    <h6>Enhane your trip</h6>

                </li>

                <!-- <li>
							<span><img src="http://24hr.lightmytrip.com/public/images/Payment-Mode.png"
									class="img-res"></span>
							<h6>Choose Payment Mode</h6>

						</li> -->

                <li>
                    <span>3</span>
                    <h6>Review & Book</h6>

                </li>


            </ul>
        </div>

    </div>
</section>
<form action="{{URL::to('/Flight/Booking')}}" method="Post" class="form-banner-reservation form-inline style-2 form-h-40">
    {{ csrf_field() }}
    <div class="container">
        <div class="detailsmain">
            <div class="leftmain_rv">
                <div class="nofti_gr pdcolor">
                    <p><i class="fa fa-clock"></i>&nbsp;Prices are not guaranteed until booked. <strong>Book now! it only takes a few minutes</strong></p>
                </div>
                <div class="dts_heading">
                    <h1>Enhane your trip</h1>
                </div>

                <div class="whitebrd pdbox_wht">
                    <div class="add_incs">
                        <div class="lefttxt_enhane">
                            <h2>Flexible Travel Dates</h2>
                            <p>This add-on give you one date change to your flight without paying any airline penalty fees. Validity is up to 48 hours prior to departure of the original ticket. if the price of your new ticket is higher, you'll pay the difference.</p>
                            <a href="#">Terms & Conditons</a>
                        </div>
                        <div class="righttxt_enhane">
                            <h3>&#8356;&nbsp;11,7000</h3>
                            <span>per passenger</span>
                            <button type="submit">Add&nbsp;<i class="fa fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="add_incs">
                        <div class="lefttxt_enhane">
                            <h2>Flexible Travel Dates</h2>
                            <p>This add-on give you one date change to your flight without paying any airline penalty fees. Validity is up to 48 hours prior to departure of the original ticket. if the price of your new ticket is higher, you'll pay the difference.</p>
                            <a href="#">Terms & Conditons</a>
                        </div>
                        <div class="righttxt_enhane">
                            <h3>&#8356;&nbsp;11,7000</h3>
                            <span>per passenger</span>
                            <button type="submit">Add&nbsp;<i class="fa fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="add_incs">
                        <div class="lefttxt_enhane">
                            <h2>Flexible Travel Dates</h2>
                            <p>This add-on give you one date change to your flight without paying any airline penalty fees. Validity is up to 48 hours prior to departure of the original ticket. if the price of your new ticket is higher, you'll pay the difference.</p>
                            <a href="#">Terms & Conditons</a>
                        </div>
                        <div class="righttxt_enhane">
                            <h3>&#8356;&nbsp;11,7000</h3>
                            <span>per passenger</span>
                            <button type="submit">Add&nbsp;<i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="leftmain_rv" style="display: none;">
                <div class="dts_heading">
                    <h1 class="mtprew2">Who’s travelling?</h1>
                </div>
                <div class="nty_txt">
                    <span>Traveller names must match government issued photo ID exactly.</span>

                </div>
                @foreach($ticketDetails as $key => $value)

                @php $j =0; @endphp
                @if($value['name'] == "ADULT")
                @for( $i = 0; $i<$value['total']; $i++ ) @php ++$j @endphp <div class="fortr whitebrd pdbox_wht">
                    <h2>Traveller 1&nbsp;-&nbsp;Adult (Primary Contact)</h2>
                    <div class="form_tvl col4 mbbx_frm">
                        <div class="tvlbox deps">
                            <label>Salutation<span>*</span></label>
                            <select class="input_sc inhegt" name="adult[{{$i}}][title]" required>
                                <option value="">Select Salutation</option>
                                <option value="Mr" @if(old('adult.'.$i.'.title')=='Mr' ) selected @endif>Mr</option>
                                <option value="Mrs" @if(old('adult.'.$i.'.title')=='Mrs' ) selected @endif>Mrs</option>
                                <option value="Ms" @if(old('adult.'.$i.'.title')=='Ms' ) selected @endif>Ms</option>
                                <option value="Dr" @if(old('adult.'.$i.'.title')=='Dr' ) selected @endif>Dr</option>
                                <option value="Sr" @if(old('adult.'.$i.'.title')=='Sr' ) selected @endif>Sr</option>
                            </select>
                            @if($errors->has('adult.*.title'))

                            <span class="errors">{{$errors->first('adult.'.$i.'.title')}}</span>
                            @endif

                        </div>
                        <input type="hidden" name="adult[{{$i}}][travelId]" value="{{$value['travelerId']}}" />
                        <div class="tvlbox ">
                            <label>First Name <span>*</span></label>
                            <input type="text" placeholder="First Name" name="adult[{{$i}}][first_name]" class="input_sc inhegt" value="{{old('adult.'.$i.'.first_name')}}">
                            @if($errors->has('adult.*.first_name'))

                            <span class="errors">{{$errors->first('adult.'.$i.'.first_name')}}</span>
                            @endif
                        </div>

                        {{-- <div class="tvlbox ">
										<label>Middle Name</label>
										<input type="text" placeholder="Middle Name" class="input_sc inhegt" name="adult[{{$i}}][middle_name]">

                    </div> --}}

                    <div class="tvlbox ">
                        <label>Last Name<span>*</span></label>
                        <input type="text" placeholder="Last Name" class="input_sc inhegt" name="adult[{{$i}}][last_name]" value="{{old('adult.'.$i.'.last_name')}}">

                        @if($errors->has('adult.*.last_name'))

                        <span class="errors">{{$errors->first('adult.'.$i.'.last_name')}}</span>
                        @endif
                    </div>

                    <div class="tvlbox ">
                        <label>Email</label>
                        <input type="text" placeholder="Email" class="input_sc inhegt" name="adult[{{$i}}][email]" value="{{old('adult.'.$i.'.email')}}">
                        @if($errors->has('adult.*.email'))

                        <span class="errors">{{$errors->first('adult.'.$i.'.email')}}</span>
                        @endif

                    </div>

            </div>

            <div class="form_tvl mbbx_frm">
                <div class="tvlbox datesm1">
                    <label>Phone<span>*</span></label>
                    <input type="number" placeholder="contact" class="input_sc inhegt" name="adult[{{$i}}][contact]" value="{{old('adult.'.$i.'.contact')}}">
                    @if($errors->has('adult.*.contact'))

                    <span class="errors">{{$errors->first('adult.'.$i.'.contact')}}</span>
                    @endif

                </div>
                <div class="tvlbox datesm1">
                    <label>Date of Birth<span>*</span></label>
                    <input type="date" placeholder="DD/MM/YYYY" class="input_sc inhegt" name="adult[{{$i}}][dob]" value="{{old('adult.'.$i.'.dob')}}">
                    @if($errors->has('adult.*.dob'))

                    <span class="errors">{{$errors->first('adult.'.$i.'.dob')}}</span>
                    @endif

                </div>

                <div class="tvlbox datesm2">
                    <label>Gender<span>*</span></label>
                    <ul class="radio_gd">
                        <li>
                            <input type="radio" id="MALE" @if(old('adult.'.$i.'gender')) checked @endif value="MALE" name="adult[{{$i}}][gender]">
                            <label for="MALE">MALE</label>
                        </li>
                        <li> <input type="radio" id="FeMALE" @if(old('adult.'.$i.'gender')) checked @endif value="FEMALE" name="adult[{{$i}}][gender]">
                            <label for="FeMALE">FEMALE</label>
                        </li>

                        <li> <input type="radio" id="Others" @if(old('adult.'.$i.'gender')) checked @endif value="OTHERS" name="adult[{{$i}}][gender]">
                            <label for="Others">OTHERS</label>
                        </li>
                    </ul>
                    @if($errors->has('adult.*.gender'))

                    <span class="errors">{{$errors->first('adult.'.$i.'.gender')}}</span>
                    @endif

                </div>
            </div>
            <div class="form_tvl col4 ">

                <div class="tvlbox ">
                    <label>Passport No.</label>
                    <input type="text" placeholder="Passport No" class="input_sc inhegt" name="adult[{{$i}}][passport_no]" value="{{old('adult.'.$i.'.passport_no')}}">

                    @if($errors->has('adult.*.passport_no'))

                    <span class="errors">{{$errors->first('adult.'.$i.'.passport_no')}}</span>
                    @endif
                </div>

                <div class="tvlbox ">
                    <label>Nationality</label>
                    <input type="text" placeholder="Nationality" class="input_sc inhegt" name="adult[{{$i}}][nationality]" value="{{old('adult.'.$i.'.nationality')}}">
                    @if($errors->has('adult.*.nationality'))

                    <span class="errors">{{$errors->first('adult.'.$i.'.nationality')}}</span>
                    @endif
                </div>
                <div class="tvlbox">
                    <label>Country<span>*</span></label>
                    <select class="input_sc inhegt" name="adult[{{$i}}][country]">
                        <option>Select Country</option>
                        <option>Afghanistan </option>
                        <option>Albania </option>
                        <option>Algeria</option>
                        <option>American Samoa</option>
                        <option>Andorra</option>
                    </select>
                    @if($errors->has('adult.*.country'))

                    <span class="errors">{{$errors->first('adult.*.country')}}</span>
                    @endif
                </div>
                <div class="tvlbox datesm1">
                    <label>Passport Issued<span>*</span></label>
                    <input type="date" placeholder="DD/MM/YYYY" name="adult[{{$i}}][passport_issued]" class="input_sc inhegt" value="{{old('adult.'.$i.'.passport_issued')}}">
                    @if($errors->has('adult.*.passport_issued'))

                    <span class="errors">{{$errors->first('adult.'.$i.'.passport_issued')}}</span>
                    @endif
                </div>
                <div class="tvlbox datesm1">
                    <label>Passport Expiry<span>*</span></label>
                    <input type="date" placeholder="DD/MM/YYYY" name="adult[{{$i}}][passport_exp_date]" class="input_sc inhegt" value="{{old('adult.'.$i.'.passport_exp_date')}}">
                    @if($errors->has('adult.*.passport_exp_date'))

                    <span class="errors">{{$errors->first('adult.'.$i.'.passport_exp_date')}}</span>
                    @endif
                </div>
            </div>
        </div>
        @endfor
        @endif
        @if($value['name'] == "CHILD")
        @for( $i = 0; $i<$value['total']; $i++ ) @php ++$j @endphp <div class="fortr whitebrd pdbox_wht">
            <h2>Traveller 2&nbsp;-&nbsp; Child</h2>
            <div class="form_tvl col4 mbbx_frm">
                <div class="tvlbox deps">
                    <label>Salutation<span>*</span></label>
                    <select class="input_sc inhegt" name="child[{{$i}}]['title]">
                        <option value="">Select Salutation</option>
                        <option value="">Select Salutation</option>
                        <option value="Mr" @if(old('child.'.$i.'.title')=='Mr' ) selected @endif>Mr</option>
                        <option value="Mrs" @if(old('child.'.$i.'.title')=='Mrs' ) selected @endif>Mrs</option>
                        <option value="Ms" @if(old('child.'.$i.'.title')=='Ms' ) selected @endif>Ms</option>
                        <option value="Dr" @if(old('child.'.$i.'.title')=='Dr' ) selected @endif>Dr</option>
                        <option value="Sr" @if(old('child.'.$i.'.title')=='Sr' ) selected @endif>Sr</option>
                    </select>
                    @if($errors->has('child.*.title'))

                    <span class="errors">{{$errors->first('child.'.$i.'.title')}}</span>
                    @endif
                </div>
                <input type="hidden" name="child[{{$i}}][travelId]" value="{{$value['travelerId']}}" />
                <div class="tvlbox ">
                    <label>First Name<span>*</span></label>
                    <input type="text" placeholder="First Name" class="input_sc inhegt" name="child[{{$i}}][first_name]" value="{{old('child.'.$i.'.first_name')}}">
                    @if($errors->has('child.*.first_name'))

                    <span class="errors">{{$errors->first('child.'.$i.'.first_name')}}</span>
                    @endif
                </div>

                {{-- <div class="tvlbox ">
									<label>Middle Name</label>
									<input type="text" placeholder="Middle Name" class="input_sc inhegt" name="child[{{$i}}][middle_name]">

            </div> --}}

            <div class="tvlbox ">
                <label>Last Name<span>*</span></label>
                <input type="text" placeholder="Last Name" class="input_sc inhegt" name="child[{{$i}}][last_name]" value="{{old('child.'.$i.'.last_name')}}">
                @if($errors->has('child.*.last_name'))

                <span class="errors">{{$errors->first('child.'.$i.'.last_name')}}</span>
                @endif
            </div>
            <div class="tvlbox ">
                <label>Email<span>*</span></label>
                <input type="email" placeholder="Email" class="input_sc inhegt" name="child[{{$i}}][email]" value="{{old('child.'.$i.'.email')}}">
                @if($errors->has('child.*.email'))

                <span class="errors">{{$errors->first('child.'.$i.'.email')}}</span>
                @endif
            </div>
    </div>

    <div class="form_tvl mbbx_frm">
        <div class="tvlbox ">
            <label>Mobile No<span>*</span></label>
            <input type="number" placeholder="contact" class="input_sc inhegt" name="child[{{$i}}][contact]" value="{{old('child.'.$i.'.contact')}}">
            @if($errors->has('child.*.contact'))

            <span class="errors">{{$errors->first('child.'.$i.'.contact')}}</span>
            @endif
        </div>
        <div class="tvlbox datesm1">
            <label>Date of Birth<span>*</span></label>
            <input type="date" placeholder="DD/MM/YYYY" class="input_sc inhegt" name="child[{{$i}}][dob]" value="{{old('child.'.$i.'.dob')}}">
            @if($errors->has('child.*.dob'))

            <span class="errors">{{$errors->first('child.'.$i.'.dob')}}</span>
            @endif
        </div>

        <div class="tvlbox datesm2">
            <label>Gender<span>*</span></label>
            <ul class="radio_gd">
                <li>
                    <input type="radio" id="MALE" @if(old('child.'.$i.'gender')) checked @endif value="MALE" name="child[{{$i}}][gender]">
                    <label for="MALE">MALE</label>
                </li>
                <li> <input type="radio" id="FEMALE" @if(old('child.'.$i.'gender')) checked @endif value="FEMALE" name="child[{{$i}}][gender]">
                    <label for="FeMALE">FEMALE</label>
                </li>

                <li> <input type="radio" id="Others" @if(old('child.'.$i.'gender')) checked @endif value="OTHERS" name="child[{{$i}}][gender]">
                    <label for="Others">OTHERS</label>
                </li>
            </ul>
            @if($errors->has('child.*.gender'))

            <span class="errors">{{$errors->first('child.'.$i.'.gender')}}</span>
            @endif

        </div>
    </div>
    <div class="form_tvl col4 ">

        <div class="tvlbox ">
            <label>Passport No.</label>
            <input type="text" placeholder="Passport No" class="input_sc inhegt" name="child[{{$i}}][passport_no]" value="{{old('child.'.$i.'.passport_no')}}">
            @if($errors->has('child.*.passport_no'))

            <span class="errors">{{$errors->first('child.'.$i.'.passport_no')}}</span>
            @endif
        </div>

        <div class="tvlbox ">
            <label>Nationality</label>
            <input type="text" placeholder="Nationality" class="input_sc inhegt" name="child[{{$i}}][nationality]" value="{{old('child.'.$i.'.nationality')}}">
            @if($errors->has('child.*.nationality'))

            <span class="errors">{{$errors->first('child.'.$i.'.nationality')}}</span>
            @endif

        </div>
        <div class="tvlbox">
            <label>Country<span>*</span></label>
            <select class="input_sc inhegt" name="child[{{$i}}][country]">
                <option>Select Country</option>
                <option>Afghanistan </option>
                <option>Albania </option>
                <option>Algeria</option>
                <option>American Samoa</option>
                <option>Andorra</option>
            </select>
            @if($errors->has('child.*.country'))

            <span class="errors">{{$errors->first('child.*.country')}}</span>
            @endif
        </div>
        <div class="tvlbox datesm1">
            <label>Passport Issued<span>*</span></label>
            <input type="date" placeholder="DD/MM/YYYY" class="input_sc inhegt" name="child[{{$i}}][passport_issued]" value="{{old('child.'.$i.'.passport_issued')}}">
            @if($errors->has('child.*.passport_issued'))

            <span class="errors">{{$errors->first('child.'.$i.'.passport_issued')}}</span>
            @endif
        </div>
        <div class="tvlbox datesm1">
            <label>Passport Expiry<span>*</span></label>
            <input type="date" placeholder="DD/MM/YYYY" class="input_sc inhegt" name="child[{{$i}}][passport_exp_date]" value="{{old('child.'.$i.'.passport_exp_date')}}">
            @if($errors->has('child.*.passport_exp_date'))

            <span class="errors">{{$errors->first('child.'.$i.'.passport_exp_date')}}</span>
            @endif

        </div>
    </div>
    </div>
    @endfor
    @endif
    @if($value['name'] == "HELD_INFANT")
    @for( $i = 0; $i<$value['total']; $i++ ) @php ++$j @endphp <div class="fortr whitebrd pdbox_wht">
        <h2>Traveller 3&nbsp;-&nbsp;Infant</h2>
        <div class="form_tvl col4 mbbx_frm">
            <div class="tvlbox deps">
                <label>Salutation<span>*</span></label>
                <select class="input_sc inhegt" name="infant[{{$i}}][title]">
                    <option value="">Select Salutation</option>
                    <option value="">Select Salutation</option>
                    <option value="Mr" @if(old('infant.'.$i.'.title')=='Mr' ) selected @endif>Mr</option>
                    <option value="Mrs" @if(old('infant.'.$i.'.title')=='Mrs' ) selected @endif>Mrs</option>
                    <option value="Ms" @if(old('infant.'.$i.'.title')=='Ms' ) selected @endif>Ms</option>
                    <option value="Dr" @if(old('infant.'.$i.'.title')=='Dr' ) selected @endif>Dr</option>
                    <option value="Sr" @if(old('infant.'.$i.'.title')=='Sr' ) selected @endif>Sr</option>
                </select>
                @if($errors->has('infant.*.title'))

                <span class="errors">{{$errors->first('infant.'.$i.'.title')}}</span>
                @endif

            </div>

            <input type="hidden" name="infant[{{$i}}][travelId]" value="{{$value['travelerId']}}" />
            <div class="tvlbox ">
                <label>First Name<span>*</span></label>
                <input type="text" placeholder="First Name" class="input_sc inhegt" name="infant[{{$i}}][first_name]" value="{{old('infant.'.$i.'.first_name')}}">
                @if($errors->has('infant.*.first_name'))

                <span class="errors">{{$errors->first('infant.'.$i.'.first_name')}}</span>
                @endif
            </div>

            {{-- <div class="tvlbox ">
                                <label>Middle Name</label>
                                <input type="text" placeholder="Middle Name" class="input_sc inhegt" name="infant[{{$i}}][middle_name]">

        </div> --}}

        <div class="tvlbox ">
            <label>Last Name<span>*</span></label>
            <input type="text" placeholder="Last Name" class="input_sc inhegt" name="infant[{{$i}}][last_name]" value="{{old('infant.'.$i.'.last_name')}}">
            @if($errors->has('infant.*.last_name'))

            <span class="errors">{{$errors->first('infant.'.$i.'.last_name')}}</span>
            @endif

        </div>
        <div class="tvlbox ">
            <label>Email<span>*</span></label>
            <input type="email" placeholder="Email" class="input_sc inhegt" name="infant[{{$i}}][email]" value="{{old('infant.'.$i.'.email')}}">
            @if($errors->has('infant.*.email'))

            <span class="errors">{{$errors->first('infant.'.$i.'.email')}}</span>
            @endif
        </div>
        </div>

        <div class="form_tvl mbbx_frm">
            <div class="tvlbox datesm1">
                <label>Mobile No<span>*</span></label>
                <input type="number" placeholder="Mobile no" class="input_sc inhegt" name="infant[{{$i}}][contact]" value="{{old('infant.'.$i.'.contact')}}">
                @if($errors->has('infant.*.contact'))

                <span class="errors">{{$errors->first('infant.'.$i.'.contact')}}</span>
                @endif
            </div>
            <div class="tvlbox datesm1">
                <label>Date of Birth<span>*</span></label>
                <input type="date" placeholder="DD/MM/YYYY" class="input_sc inhegt" name="infant[{{$i}}][dob]" value="{{old('infant.'.$i.'.dob')}}">
                @if($errors->has('infant.*.dob'))

                <span class="errors">{{$errors->first('infant.'.$i.'.dob')}}</span>
                @endif
            </div>

            <div class="tvlbox datesm2">
                <label>Gender<span>*</span></label>
                <ul class="radio_gd">
                    <li>
                        <input type="radio" id="MALE" @if(old('child.'.$i.'gender')) checked @endif value="MALE" name="infant[{{$i}}][gender]">
                        <label for="MALE">MALE</label>
                    </li>
                    <li> <input type="radio" id="FEMALE" @if(old('child.'.$i.'gender')) checked @endif value="FEMALE" name="infant[{{$i}}][gender]">
                        <label for="FeMALE">FEMALE</label>
                    </li>

                    <li> <input type="radio" id="Others" @if(old('child.'.$i.'gender')) checked @endif value="OTHERS" name="infant[{{$i}}][gender]">
                        <label for="Others">OTHERS</label>
                    </li>
                </ul>
                @if($errors->has('infant.*.gender'))

                <span class="errors">{{$errors->first('infant.'.$i.'.gender')}}</span>
                @endif

            </div>
        </div>
        <div class="form_tvl col4 ">

            <div class="tvlbox ">
                <label>Passport No.</label>
                <input type="text" placeholder="Passport No" class="input_sc inhegt" name="infant[{{$i}}][passport_no]" value="{{old('infant.'.$i.'.passport_no')}}">
                @if($errors->has('infant.*.passport_no'))

                <span class="errors">{{$errors->first('infant.'.$i.'.passport_no')}}</span>
                @endif
            </div>

            <div class="tvlbox ">
                <label>Nationality</label>
                <input type="text" placeholder="Nationality" class="input_sc inhegt " name="infant[{{$i}}][nationality]" value="{{old('infant.'.$i.'.nationality')}}">
                @if($errors->has('infant.*.nationality'))

                <span class="errors">{{$errors->first('infant.'.$i.'.nationality')}}</span>
                @endif
            </div>
            <div class="tvlbox">
                <label>Country<span>*</span></label>
                <select class="input_sc inhegt" name="infant[{{$i}}][country]">
                    <option>Select Country</option>
                    <option>Afghanistan </option>
                    <option>Albania </option>
                    <option>Algeria</option>
                    <option>American Samoa</option>
                    <option>Andorra</option>
                </select>
            </div>
            <div class="tvlbox datesm1">
                <label>Passport Issued<span>*</span></label>
                <input type="date" placeholder="DD/MM/YYYY" class="input_sc inhegt" name="infant[{{$i}}][passport_issued]" value="{{old('infant.'.$i.'.passport_issued')}}">
                @if($errors->has('infant.*.passport_issued'))

                <span class="errors">{{$errors->first('infant.'.$i.'.passport_issued')}}</span>
                @endif
            </div>
            <div class="tvlbox datesm1">
                <label>Passport Expiry<span>*</span></label>
                <input type="date" placeholder="DD/MM/YYYY" class="input_sc inhegt" name="infant[{{$i}}][passport_exp_date]" value="{{old('infant.'.$i.'.passport_exp_date')}}">
                @if($errors->has('infant.*.passport_exp_date'))

                <span class="errors">{{$errors->first('infant.'.$i.'.passport_exp_date')}}</span>
                @endif

            </div>
        </div>
        </div>

        @endfor
        @endif
        @endforeach
        <div class="dts_heading">
            <h1 class="mtprew2">Contact Information</h1>
        </div>

        <div class="fortr whitebrd pdbox_wht">
            <span>Please enter your email address where you would like to receive your booking details:</span>


            <div class="form_tvl col2 ">

                <div class="tvlbox ">
                    <label>Email Address<span>*</span></label>
                    <input type="text" placeholder="Enter your email address" name="contact_email" class="input_sc inhegt" value="{{old('contact_email')}}">
                    @if($errors->has('contact_email'))
                    <span class="errors">{{$errors->first('contact_email')}}</span>
                    @endif

                </div>

                <div class="tvlbox ">
                    <label>Contact Number<span>*</span></label>
                    <input type="text" placeholder="Enter your Contact Number" name="contact_number" class="input_sc inhegt">
                    @if($errors->has('contact_number'))
                    <span class="errors">{{$errors->first('contact_number')}}</span>
                    @endif

                </div>

            </div>
        </div>
        </div>
        {{-- <div class="rightmain_rv ">
                    <div class="pritotal_main  mtprew1">
                        <div class="bookingtimer whitebrd pdbox_wht">
                            <h6>Book now before tickets run out!</h6>
                            <div id="clockdiv"></div>
                            <script>
                                $(document).ready(function() {
                                    // 10 minutes from now
                                    var time_in_minutes = 10;
                                    var current_time = Date.parse(new Date());
                                    var deadline = new Date(current_time + time_in_minutes * 60 * 1000);


                                    function time_remaining(endtime) {
                                        var t = Date.parse(endtime) - Date.parse(new Date());
                                        var seconds = Math.floor((t / 1000) % 60);
                                        var minutes = Math.floor((t / 1000 / 60) % 60);
                                        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
                                        var days = Math.floor(t / (1000 * 60 * 60 * 24));
                                        return {
                                            'total': t
                                            , 'days': days
                                            , 'hours': hours
                                            , 'minutes': minutes
                                            , 'seconds': seconds
                                        };
                                    }

                                    function run_clock(id, endtime) {
                                        var clock = document.getElementById(id);

                                        function update_clock() {
                                            var t = time_remaining(endtime);
                                            clock.innerHTML = '' + t.minutes + '<b>m</b>' + '<span>:</span>' + t.seconds + '<b>s</b>';
                                            if (t.total <= 0) {
                                                clearInterval(timeinterval);
                                            }
                                        }
                                        update_clock(); // run function once at first to avoid delay
                                        var timeinterval = setInterval(update_clock, 1000);
                                    }
                                    run_clock('clockdiv', deadline);

                                });

                            </script>
                        </div>

                        <div class="farebox whitebrd ">
                            <h3>Price Details</h3>
                            <div class="fareclps">
                                <button data-toggle="collapse" data-target="#BaseFare"><span>Base Fare <b>(3
                                            travellers)</b><i class="fas fa-angle-down"></i></span><span><b>GBP
                                            310<sup>.36</sup></b></span></button>
                                <div id="BaseFare" class="collapse">
                                    <ul class="basefareul brdbase">
                                        <li><span>1 Adult</span><span>GBP 162<sup>.04</sup></span></li>
                                        <li><span>1 Child</span><span>GBP 123<sup>.84</sup></span></li>
                                        <li><span>1 Infant</span><span>GBP 24<sup>.48</sup></span></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="paybx">
                                <ul class="basefareul">
                                    <li><span><b>Pay</b></span><span><b>GBP 309<sup>.00</sup></b></span></li>
                                </ul>
                            </div>

                            <div class="bookbtn_fare">
                                <button type="submit" class="cntsd_book">Continue to Pay<i class="fas fa-long-arrow-alt-right"></i></button>
                            </div>
                        </div>

                    </div>
                </div> --}}
        @include('Frontend.flights.booking-details')
        </div>
        </div>
        </div>
</form>


@endsection