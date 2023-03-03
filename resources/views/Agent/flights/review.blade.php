@extends('layouts.agentfrontend')
@section('title', @$seoDetails->meta_title)
@section('meta_title', '')
@section('meta_keyword', '')
@section('meta_description', '')
@section('bodyclass', 'ch single-page page-search')
@section('content')
<?php use App\Http\Controllers\Controller; ?>
<!--<div class="flight_loader">
<div class="inner_loader">
<h4>Please wait....</h4>
<p><i class="fa fa-spinner" aria-hidden="true"></i> We are looking for the best flight for you.</p>
</div>
</div> -->
<script>
$(document).ready(function(){
 
$(window).on("load", function () {
   
const details =  localStorage.getItem('travelers-details');
   if(details !== null){
        submitFlight(details);
   }
   
});
  $('.datetime').datepicker({
            numberOfMonths: 2
            , dateFormat: 'dd/mm/yy'
        });

     $(".form-input").keyup(function(event){
             $(this).siblings('span.errors').empty();
      })  
        $(".form-input").on('change',function(event){
             $(this).siblings('span.errors').empty();
      }) 
        $(".form-input").on('click',function(event){
             $(this).siblings('span.errors').empty();
      })   
      $(function(){
	$('#payment-process').click(function(e){
		e.preventDefault();
		var name = $('#contact_name').val();
		var email = $('#contact_email').val();
		var phone = $('#contact_phone').val();
	//	var amount = ($('#amount').val());
    var amount = '5000';
	    var currency = ($('#currency').val())
        var id =  $('#bookingId').val();
		makePayment(name,email,phone,amount,currency,id)

	})
})
function makePayment(name,email,phone,amount,currency,id) {
  FlutterwaveCheckout({
    public_key: "FLWPUBK_TEST-a43a887a83c0748fc83b8eafa1ff97d8-X",
    tx_ref: "RX1_{{substr(rand(0,time()),0,7)}}",
    amount: amount,
    currency: currency,
    payment_options: "card, mobilemoneyghana, ussd",
    redirect_url: "{{url('Booking/Confirm/')}}"+'?booking_id='+id, 
    meta: {
      consumer_id: 23,
      consumer_mac: "92a3-912ba-1192a",
    },
    customer: {
      email: email,
      phone_number: phone,
      name: name,
    },
	callback:function(data){
		console.log(data);
	},
    customizations: {
      title: "The Titanic Store",
      description: "Payment for an awesome cruise",
      logo: "https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg",
    },
  });
}
                               
   $("#flightbooking-form").on('submit',function(event){
       event.preventDefault();
       var form= $(this).serialize();
       $('.loading-div').css('display','block');
       submitFlight(form);

   })

   function submitFlight(form){
        $.ajax({
        url: "{{url('agent/Flight/Booking')}}",
        type:"POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:form,
        dataType:'json',
        success:function(response){
            $('.loading-div').css('display','none');
            localStorage.removeItem("travelers-details");
            if(response.success == true){
              $('#contact_email').val(response.contact.email);
              $('#contact_phone').val(response.contact.contact);
             $('#amount').val(response.total.total_amount);
             $('#currency').val(response.total.currency);
              $('#payment').modal('show');
              $('#bookingId').val(response.booking_id);
               $('#contact_email-e').text(response.contact.email);
              $('#contact_phone-p').text(response.contact.contact);
             $('#amount-a').text(response.total.total_amount);
             $('#currency-c').text(response.total.currency);
              $('#payment').modal('show');
              $('#bookingId').val(response.booking_id);
            }
        
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
   }
    $('#login-form').click(function(e){
       $('.errors').remove();
       var email = $('#login-email').val();
       var password = $('#login-password').val();
       var type = $('select#login-type option:selected').val();
        var  _token   = $('meta[name="csrf-token"]').attr('content');
        $('.loading-div').css('display','block');
        $.ajax({
        url: "{{url('customer/login')}}",
        type:"POST",
        data:{
          email:email,
          password:password,
          type:type,
          _token: _token
        },
        success:function(response){
         $('#customer-login-form')[0].reset()
         $('#login').modal('hide');
         var form  = localStorage.getItem('travelers-details',form)
          if(form !== null){
           submitFlight(form);
          }
        },
        error: function(response) {
             $('.loading-div').css('display','none');
              if (response.status === 400) {
              $('#login-email-error').after('<span class="errors">' + response.responseJSON.errors + '</span>')
              }
   
                    if (response.status === 422) {
                        var errors = $.parseJSON(response.responseText);
                        $.each(errors.errors, function(key, value) {
                            if(key == 'email'){
                                $('#login-email').after('<span class="errors">' + value + '</span>')
                            }
                             if(key == 'password'){
                                $('#login-password').after('<span class="errors">' + value + '</span>')
                            }
                             if(key == 'type'){
                                $('#login-type').after('<span class="errors">' + value + '</span>')
                            }
                        });
                    }
        } 
     
       });
          e.preventDefault();
    })
   
})

</script>
<style>
    .help-block {
        color: #f33;
    }
    #login-email-error{
    }
    .errors{
     color: red;
    font-family: 'Font Awesome 5 Brands';
    margin-top: 2px;
    display: block;
    }

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

    /* @import url("https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/blitzer/jquery-ui.min.css");  */
    
    .ui-datepicker td span,
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

    #header .header-bar {
        background: #020180;
        width: 100%;
    }

    .header-bar .container ul.quick-menu.pull-left,
    ul.quick-menu.pull-right {
        font-size: 16px;
    }

    .header-bar .container .pull-left {
        float: left !important;
    }

    #header .header-bar ul.quick-menu>li {
        float: left;
        margin-left: 20px;
    }

    .header-bar .container .pull-right {
        float: right !important;
    }

    .header-bar .container ol,
    ul {
        list-style: none;
        margin: 0;
    }

    #header .ribbon {
        position: relative;
    }

    #header .header-bar ul.quick-menu>li>a {
        color: #fff;
        line-height: 30px;
        display: block;
        font-size: 0.8333em;
        text-transform: uppercase;
    }

    #header .ribbon>ul.menu {
        position: absolute;
        left: -15px;
        top: -9999px;
        z-index: 99;
        visibility: hidden;
    }

    ul.menu.mini {
        min-width: 180px;
        border: 2px solid #020180;
        background: #fff;
    }

    #header .ribbon>ul.menu {
        position: absolute;
        left: -15px;
        top: -9999px;
        z-index: 99;
        visibility: hidden;
    }

    body,
    #full-container {
        background-color: #eaf0f3;
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
        padding: 3px 10px;
        border-bottom: 1px solid #ddd;
    }

    .dts_heading>h1 {
        font-size: 18px;
        font-weight: 600;
        margin: 10px 0px;
    }

    .mtprew1 {
        margin: 30px 0;
    }

    .listbooking-rv {
        margin-bottom: 30px;
    }

    .dts_heading>span {
        font-size: 15px;
        background: #020180;
        color: #fff;
        display: inline-block;
        padding: 2px 10px;
        border-radius: 3px;
        cursor: pointer;
    }

    .dts_heading>span>i {
        margin-right: 5px;
    }

    .listbooking-rv>ul>li {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 2px 4px 0 rgb(0 0 0 / 5%);
        margin-bottom: 15px;

    }

    .flexws {
        display: flex;
    }

    .leftlogo_rv {
        background: #fff;

    }

    .leftlogo_rv {
        padding: 15px;
        width: 100%;
    }

    .airlogo_rv {
        display: flex;
        column-gap: 5px;
        align-items: center;
    }

    .logowt {
        width: 30px;
        height: 30px;
    }

    .righttxt_rv {
        width: 100%;
        justify-content: space-between;
        margin-top: 10px;
        align-items: center;
    }

    .airlogo_rv>span {
        font-weight: bold;
        color: #000;
    }

    .leftlogo_rv>p {
        margin-bottom: 0;
        font-size: 13px;
        color: #000;
    }

    .uktxt {
        background: #eee;
        padding: 0px 10px;
        display: inline-block;
        border-radius: 3px;
        border: 1px solid #ddd;
        color: #000;
        margin-top: 7px;
    }

    .datebx_rv {
        display: flex;
        column-gap: 10px;
        color: #000;
        font-weight: 500;
        font-size: 15px;
        margin-bottom: 10px;
        border-bottom: 1px dashed #ddd;
    }

    .dotvr {
        position: relative;
        padding-left: 20px;
    }

    .dotvr::before {
        position: absolute;
        left: 7px;
        top: 9px;
        content: '';
        width: 7px;
        height: 7px;
        background: #020180;
        border-radius: 50%;
    }

    .time_rv {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .tbrtvr {
        display: flex;
        position: relative;
    }

    .tbrtvr>h4 {
        font-weight: bold;
        font-size: 19px;
        margin-bottom: 0;
        line-height: 15px;
        white-space: nowrap !important;
    }




    .tbrtvr::after {
        bottom: 0;
    }

    .tbrtvr>h4>span {
        font-weight: 500;
        display: inline-block;

        font-size: 14px;
    }

    .tmrv_rt>h5 {
        margin-bottom: 0;
        font-weight: 500;
        font-size: 14px;
        color: #0e3056;
        display: block;
    }

    .tmrv_rt>h5>span {
        font-weight: 400;
        color: #7e7b7b;
    }

    .sle>h6 {
        margin-bottom: 0;
        border: 1px solid #020180;
        padding: 5px 10px;
        border-radius: 3px;
        color: #020180;
        cursor: pointer;
    }

    .blnspan {
        line-height: 14px;
        display: block;
        width: 86px;
        height: 1px;
        background: #ddd;
        position: relative;
        top: 10px;
        margin: 0 10px;
    }

    .btsr,
    .blnspan::before {
        position: absolute;
        left: 0;
        right: 0;
        margin: auto;
        content: "";
    }

    .blnspan::before {
        width: 10px;
        height: 10px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 50px;
        top: -5px;
    }

    .btsr {
        bottom: -20px;

        text-transform: uppercase;
        font-size: 10px;
        text-align: center;
    }

    .stopb>span {
        font-weight: 600;
        color: #000;
    }

    .tmrv_rt>span {
        font-size: 14px;
    }



    .colps_rv>h6 {
        margin: 0;
        font-size: 15px;
        cursor: pointer;
        color: #29166f;

    }

    .colps_rv>h6>i {
        margin-left: 10px;
    }

    .colps_rv>h6[aria-expanded="true"]>i {
        transform: rotate(180deg);
    }


    .colps_rv {
        background: #f9f9f9;
    }

    .clpside {
        padding: 15px;
    }

    .heading_cpl>h4 {
        font-weight: bold;
        font-size: 16px;
        color: #000;
    }

    .heading_cpl>h4>i {
        margin-right: 5px;
    }

    .suitcase_img {
        width: 78px;
        display: inline-block;
        margin-right: 10px;
        background: #fff;
        text-align: center;
        border-radius: 4px;
    }

    .cntds {
        background: #020180;
        display: inline-block;
        padding: 5px 10px;
        color: #fff !important;
        border-radius: 4px;
        margin-left: 10px;
    }

    .suitcase_txt {
        display: inline-block;
        font-size: 15px;
        color: #000;
    }

    .suitcase_txt>strong {
        margin-right: 5px;
    }

    .to_list {
        margin-top: 35px;
        border: 1px dashed #b1b1b1;
        padding: 10px;
        position: relative;
        margin-bottom: 10px;
    }

    .to_list>span {
        font-weight: bold;
        font-size: 17px;
        color: #000;
        margin-top: -18px;
        display: inline-block;
        background: #fff;
        padding: 3px 10px;
        border: 1px solid #ddd;
        position: relative;
        top: -20px;
    }

    .to_list>ul {
        padding-left: 22px;
        margin-top: -12px;
    }

    .to_list>ul>li {
        position: relative;
        list-style: disc;
        color: #000;
    }

    .btmlist_to {
        display: flex;
        column-gap: 10px;
        background: #eee;
        margin-top: 10px;
        padding: 7px;
        align-items: center;
    }

    .btmlist_to>span>strong {
        color: #020180;
        border: 1px solid #020180;
        padding: 3px 10px;
        display: inline-block;
    }

    .whitebrd {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 2px 4px 0 rgb(0 0 0 / 5%);
    }

    .Review_book>ul {
        padding: 20px 20px 0px 40px;
        max-height: 200px;
        overflow: auto;
    }

    .Review_book>ul>li {
        list-style: decimal;
        color: #464646;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .Review_book>ul>li>ul {
        padding-left: 15px;
        margin-top: 2px;
    }

    .Review_book>ul>li>ul>li {
        list-style: disc;
        font-size: 13px;
    }

    .Review_book>ul>li>ul>li::marker {
        color: #017cc2;
        font-size: 18px;
    }

    .ckeck_trm {
        display: flex;
        border-top: 1px solid #ddd;
        margin-top: 20px;
        padding: 20px;
    }

    .ckeck_trm input {
        width: 25px;
        height: 25px;
        margin: 0 10px 0 0;
    }

    .ckeck_trm label {
        margin-bottom: 0;
        font-size: 15px;
        color: #000;
        line-height: 20px;
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

    .anchor-btn {

        position: relative;
        z-index: 0;
        display: inline-block;
        padding: 0 40px;
        margin-top: 0;
        height: 45px;
        line-height: 45px;
        cursor: pointer;
        text-transform: uppercase;
        font-weight: 500;
        font-size: 14px;
        border: none;
        border-radius: 5px;
        transition: all 0.2s;
        width: auto;
        color: #fff !important;
        background-color: #89ad3e;

    }

    .drp_txt>h4 {
        font-size: 15px;
        margin-bottom: 0;
    }

    .drp_txt>h4>span {
        font-size: 13px;
        color: #9d9b9b;
        font-weight: 400;
    }

    .drp_txt {
        display: flex;
        align-items: center;
        column-gap: 10px;
    }

    .timebox>h4 {
        margin-bottom: 0;
        font-size: 15px;
    }

    .timebox {
        align-items: center;
        column-gap: 10px;
    }

    .text_tvs {
        padding: 20px 20px 0px 20px;
    }

    .text_tvs>p {
        border: 1px solid #5091fb;
        padding: 10px;
        border-radius: 2px;
        color: #5091fb;
        font-size: 12px;
    }

    .pdrs {
        padding: 0 20px;
    }

    .inpse {
        margin-bottom: 20px;
    }

    .inpse>input,
    .inpse>select {
        font-size: 13px;
    }

    .Review_book .btnadflrs {
        background: no-repeat;
        color: #020180;
        font-size: 14px;
        font-weight: 600;
        padding: 0;
        display: block;
        text-align: center;
        width: 100%;
        line-height: normal;
        height: auto;
        margin-bottom: 17px;
    }

    .dflex_INS {
        display: flex;
        align-items: center;
        column-gap: 10px;
    }

    .dflex_INS>label {
        margin-bottom: 0;
    }

    .stres {
        color: red;
        margin-left: 5px;
    }

    .txtal {
        border-top: 1px solid #ddd;
        padding-top: 10px;
        margin-top: 20px;
    }

    .txtal>h5 {
        font-size: 17px;
    }

    .txtal>h5>p {
        font-size: 12px;
        font-weight: 400;
        margin-top: 10px;
    }

    .ckrv ul {
        list-style-type: none;
    }

    .ckrv li {
        display: inline-block;
    }

    .ckrv input[type="checkbox"][id^="myCheckbox"] {
        display: none;
    }

    .ckrv label {
        border: 1px solid #fff;
        padding: 10px;
        display: block;
        position: relative;
        margin: 10px;
        cursor: pointer;
    }

    .ckrv label:before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
    }

    .ckrv label img {
        height: 100px;
        width: 100px;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
    }

    :checked+label {
        border-color: #ddd;
    }

    :checked+label:before {
        content: "✓";
        background-color: #020180;
        transform: scale(1);
    }

    :checked+label img {
        transform: scale(0.9);
        /* box-shadow: 0 0 5px #333; */
        z-index: -1;
    }

    .ckrv .brse {
        border: 1px solid #1b388a;
        border-radius: 5px;
    }

    .mels_ck {
        align-items: center;
        column-gap: 5px;
    }

    .mels_ck>span {
        width: 30px;
        display: block;
        height: 30px;
    }

    .mels_ck>h5 {
        margin-bottom: 0;
        color: #020180;
        font-size: 12px;
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
        .to_list>span {
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
    }

</style>
<section class="rvbg">
    <div class="container">
        <div class="listoption">
            <ul>
                <li class="step_act">
                    <span>1</span>
                    <h6>Flight & Traveler Details</h6>

                </li>

                <li>
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
<div class="container">
    <div class="detailsmain">
        <div class="leftmain_rv">
            <div class="nofti_gr greenbg">
                <p><i class="fa fa-check-circle"></i>&nbsp;job! You picked one of our best value flights. <strong>Book now so you don't miss out on this price.</strong></p>
            </div>


            <div class="listbooking-rv">
                @php $count = count($data->itineraries); @endphp
                <ul>
                    {{-- @if($count == 1) --}}
                    <li>
                        <div class="dts_heading">
                            <h1 class="mtprew1">Flight Details</h1>
                        <span>    <a href="{{ url()->previous() }}"><i class="fas fa-plane"></i>Change Flight</a></span>
                        </div>

                        <div class="flexws">
                            <div class="leftlogo_rv">
                                <div class="d-flex topdrt">
                                    <div class="drp_txt">
                                        <h4>Departure <span>{{ date('M d Y', strtotime($data->itineraries[0]->segments[0]->departure->at) )}}</span></h4>
                                        <div class="airlogo_rv">
                                            <span class="logowt">

                                                @php $file = getFileName($data->itineraries[0]->segments[0]->carrierCode) @endphp
																@if($file)
																	<img src="{{$file}}"
																		class="img-res" alt="{{$data->itineraries[0]->segments[0]->carrierCode}}">
																@else
																	<i class="fas fa-plane"></i><i class="fas fa-plane"></i>		
																@endif		
																</span>
                                               
                                            @php $airPlane = json_encode($dictionaries) @endphp
                                            @php $namePlane = json_decode(json_encode($dictionaries->carriers),true) @endphp

                                            <span>{{ $data->itineraries[0]->segments[0]->carrierCode }}</span>
                                        </div>
                                    </div>



                                    <div class="datetm_rv">
                                        <div class="tbrtvr">
                                            @php $city = json_decode(json_encode($dictionaries->locations),true) @endphp
                                            @php $depaturecountryDetails = getCountryName($city[$data->itineraries[0]->segments[0]->departure->iataCode]["countryCode"],$data->itineraries[0]->segments[0]->departure->iataCode); @endphp

                                            <h4>
                                                <span>({{$depaturecountryDetails->city_code }})</span></h4>
                                            <span class="blnspan">
                                                <span class="btsr">BAH</span>
                                            </span>
                                            @php $arrivalcountryDetails = getCountryName($city[$data->itineraries[0]->segments[0]->arrival->iataCode]["countryCode"],$data->itineraries[0]->segments[0]->arrival->iataCode); @endphp

                                            <h4>
                                                <span>({{ $arrivalcountryDetails->city_code}})</span></h4>
                                        </div>
                                    </div>

                                    <div class="stopb">
                                        <span>{{ (count($data->itineraries[0]->segments) - 1)}}&nbsp;Stop</span>

                                    </div>
                                </div>




                                {{-- <p>AIRLINES LTD dba VISTARA</p> --}}
                                @php $craft = json_decode(json_encode($dictionaries->aircraft),true) @endphp

                                <div class="righttxt_rv d-flex ">
                                    <div class="timebox d-flex">
                                        <h4>{{ date('H:i A', strtotime($data->itineraries[0]->segments[0]->departure->at) )}}</h4>
                                        <span><img src="{{asset('images/longarrow.svg')}}" class="img-res">
                                        
                                        </span>
                                        <h4>{{ date('H:i A', strtotime($data->itineraries[0]->segments[0]->arrival->at) )}}</h4>

                                    </div>

                                    <div class="tmrv_rt">
                                        <h5><span>Total journey duration</span>&nbsp;:&nbsp;{{ strtolower(str_replace('H','H     ',substr($data->itineraries[0]->duration, 2)))}}</h5>
                                    </div>

                                    <div class="sle">
                                        <h6 data-toggle="collapse" data-target="#ShowFlight1">Details&nbsp;<i class="fas fa-angle-down"></i></h6>
                                    </div>

                                    <!-- <div class="datebx_rv">
                                    <span>{{ date('M d Y', strtotime($data->itineraries[0]->segments[0]->departure->at) )}}</span>
                                    <span class="dotvr"><b>Cabin&nbsp;:&nbsp;</b> {{$data->travelerPricings[0]->fareDetailsBySegment[0]->class}} ,SINGLETRIP</span>
                                </div> -->

                                </div>

                            </div>

                        </div>
                        <div class="colps_rv">
                            <div id="ShowFlight1" class="collapse clpside">
                                <div class="heading_cpl">
                                    <h4><i class="fas fa-suitcase-rolling"></i>Flight and Baggage Details</h4>
                                    <div class="suitcase_rv"><span class="suitcase_img">
                                    @if($file)
																	<img src="{{$file}}"
																		class="img-res" alt="{{$data->itineraries[0]->segments[0]->carrierCode}}">
																@else
																	<i class="fas fa-plane"></i><i class="fas fa-plane"></i>		
																@endif	
                                        </span><span class="suitcase_txt"><strong>{{ date('H:i A', strtotime($data->itineraries[0]->segments[0]->departure->at) )}}
                                                - {{ date('H:i A', strtotime($data->itineraries[0]->segments[0]->arrival->at) )}},</strong> {{ strtolower(str_replace('H','H     ',substr($data->itineraries[0]->duration, 2)))}}</span></div>
                                </div>

                                <div class="to_list">
                                    <span>{{$depaturecountryDetails->city_name }}({{$depaturecountryDetails->city_code }}) to {{$arrivalcountryDetails->city_name }}({{$arrivalcountryDetails->city_code}})</span>
                                    <ul>
                                        <li>{{ $namePlane[$data->itineraries[0]->segments[0]->carrierCode] }} -- {{$craft[$data->itineraries[0]->segments[0]->aircraft->code]}}</li>
                                        <li>Cabin ({{$data->travelerPricings[0]->fareDetailsBySegment[0]->class}}) </li>
                                        <li>Operating Airline ({{ $namePlane[$data->itineraries[0]->segments[0]->carrierCode] }})</li>
                                        <li>Marketing Airline ({{ $namePlane[$data->itineraries[0]->segments[0]->carrierCode] }})</li>
                                        <li>Embraer {{$data->itineraries[0]->segments[0]->number}}</li>
                                    </ul>
                                    <div class="btmlist_to">
                                        <span>Estimated bag fees&nbsp;:&nbsp;</span>
                                        <span><strong>Carry on&nbsp;:&nbsp;No fee</strong></span>
                                        <span><strong>Bag Allowance&nbsp;:&nbsp;{{$data->travelerPricings[0]->fareDetailsBySegment[0]->includedCheckedBags->weight}}-kg</strong></span>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </li>
                    {{-- @else
                    <li>
                        <div class="flexws">
                            <div class="leftlogo_rv">
                                <div class="airlogo_rv">
                                    <span class="logowt"><img src="http://24hr.lightmytrip.com/public/images/uk.jpg" class="img-res"></span>
                                    <span>TATA SIA</span>
                                </div>

                                <p>AIRLINES LTD dba VISTARA</p>
                                <span class="uktxt">UK-927</span>
                            </div>
                            <div class="righttxt_rv">
                                <div class="datebx_rv">
                                    <span>Fri, 18 Feb 2022</span>
                                    <span class="dotvr"><b>Cabin&nbsp;:&nbsp;</b> Y , ROUNDTRIP</span>
                                </div>
                                <div class="time_rv">
                                    <div class="datetm_rv">
                                        <div class="tbrtvr">
                                            <h4>09:30,&nbsp;DEL<span>Delhi&nbsp;(DEL)</span></h4>
                                            <span class="blnspan">&nbsp;</span>
                                            <h4>11:35,&nbsp;BOM<span>Mumbai&nbsp;(BOM)</span></h4>
                                        </div>
                                    </div>
                                    <div class="tmrv_rt">
                                        <h5>2h&nbsp;5m</h5>
                                        <span>0&nbsp;Stop</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="colps_rv">
                            <div id="ShowFlight2" class="collapse clpside">
                                <div class="heading_cpl">
                                    <h4><i class="fas fa-suitcase-rolling"></i>Flight and Baggage Details</h4>
                                    <div class="suitcase_rv"><span class="suitcase_img"><img src="http://24hr.lightmytrip.com/public/images/vistara-logo.jpg" class="img-res"></span><span class="suitcase_txt"><strong>09:30
                                                - 11:35,</strong> 2h 5m</span></div>
                                </div>

                                <div class="to_list">
                                    <span>Delhi(DEL) to Mumbai(BOM)</span>
                                    <ul>
                                        <li>TATA SIA AIRLINES LTD dba VISTARA 927</li>
                                        <li>Cabin (Y) / Coach (V)</li>
                                        <li>Operating Airline (UK)</li>
                                        <li>Marketing Airline (UK)</li>
                                        <li>Embraer 320</li>
                                    </ul>
                                    <div class="btmlist_to">
                                        <span>Estimated bag fees&nbsp;:&nbsp;</span>
                                        <span><strong>Carry on&nbsp;:&nbsp;No fee</strong></span>
                                        <span><strong>Bag Allowance&nbsp;:&nbsp;15-kg</strong></span>
                                    </div>
                                </div>
                            </div>
                            <h6 data-toggle="collapse" data-target="#ShowFlight2">Show Flight and Baggage Fee
                                Details<i class="fas fa-angle-down"></i></h6>

                        </div>

                    </li>
                    @endif --}}
                </ul>
            </div>

            <div class="dts_heading">
                <h1><img src="http://24hr.lightmytrip.com/public/images/loginics.svg" class="img-res">&nbsp;Login-in your {{ env('APP_NAME') }} )</h1>
                <div class="ds">
                 @if(auth()->check())
                
                    <a href="#" class="cntds">Continue as Guest</a>
                    @else

                        <a href="#" class="cntds" data-toggle="modal" data-target="#login">Login</a>
                        @endif
                </div>
            </div>
                <form id="flightbooking-form" method="Post"> 
              @csrf
            <div class="Review_book whitebrd">
                   @foreach($ticketDetails as $key => $value)

					  @php $j =0; @endphp

                <div class="text_tvs">
                    <h4>Traveler Details&nbsp;<span>
                     (&nbsp;{{ $value['total']}} - {{$value['name']}}&nbsp;)
                     </span></h4>
                    <p>Enter traveler name(s) and date(s) of birth exactly as shown on the passport or other goverment-issued photo ID to be used on this trip.</p>
                </div>
             
                      @for( $i = 0; $i<$value['total']; $i++ )
							@php ++$j @endphp
                            							@php ++$j @endphp                            	<input type="hidden"  name="{{strtolower($value['name'])}}[{{$i}}][travelId]" value="{{$value['travelerId']}}" />
                <div class="row pdrs">
                    <div class="col-sm-4 ">
                        <div class="inpse" >
                            <input class="form-input" type="text" id="{{strtolower($value['name'])}}.{{$i}}.first_name" 
                             name="{{strtolower($value['name'])}}[{{$i}}][first_name]" placeholder="First Name">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="inpse">
                            <input type="text" class="form-input" id="{{strtolower($value['name'])}}.{{$i}}.middle_name"  name="{{strtolower($value['name'])}}[{{$i}}][middle_name]" placeholder="Middle Name">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="inpse">
                            <input type="text"  class="form-input" id="{{strtolower($value['name'])}}.{{$i}}.last_name"  name="{{strtolower($value['name'])}}[{{$i}}][last_name]" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="inpse">
                            <input type="text"  class="form-input htl datetime" id="{{strtolower($value['name'])}}.{{$i}}.dob"  name="{{strtolower($value['name'])}}[{{$i}}][dob]" placeholder="DOB">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="inpse">
                            <select class="form-input" id="{{strtolower($value['name'])}}.{{$i}}.gender"  name="{{strtolower($value['name'])}}[{{$i}}][gender]">
                                <option value="">Select Gender</option>
                                <option value="MALE">Male</option>
                                <option value="FEMALE">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        {{-- <button type="button" class="btnadflrs">- Add Frequent flyer number</button> --}}
                        <div class="inpse dflex_INS">
                            <label>SpiceJet</label>
                            <input type="text" value="SD">
                        </div>
                    </div>

                    <div class="col-sm-6">

                        <div class="inpse ">
                            <label>Nationality<span class="stres">*</span></label>
                            
                             {{-- <input type="hidden" id="roundtosearch" value="{{request()->get('to')}}">
                                    <span>To</span> --}}

                                        <div class="inner_loc_search">
                                          <select class="form-input" id="{{strtolower($value['name'])}}.{{$i}}.nationality"  name="{{strtolower($value['name'])}}[{{$i}}][nationality]">
                                              @foreach($locations as $key => $location)
                                              <option value="{{$location->country_name}}" @if( $location->country_name =='Nigeria') selected @endif>{{$location->country_name}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                        </div>
                    </div>
                </div>
                <div class="row pdrs">
            
                    <div class="col-sm-12">
                        <div class="txtal">
                            <h5>Passport Details</h5>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="inpse ">
                            <label>Passport Number<span class="stres">*</span></label>
                            <input type="text" class="form-input"  id="{{strtolower($value['name'])}}.{{$i}}.passport_no" name="{{strtolower($value['name'])}}[{{$i}}][passport_no]" placeholder="Enter Passport Number">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="inpse ">
                            <label>Passport issued Date<span class="stres">*</span></label>
                            <input type="text" class="form-input htl datetime"  id="{{strtolower($value['name'])}}.{{$i}}.passport_issued" name="{{strtolower($value['name'])}}[{{$i}}][passport_issued]"  placeholder="Enter Passport Issued Date">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="inpse ">
                            <label>Passport Expiry Date<span class="stres">*</span></label>
                            {{-- <input type="text"  placeholder="Enter Passport Issuing Authority"> --}}
                              <input type="text" class="form-input htl datetime"  id="{{strtolower($value['name'])}}.{{$i}}.passport_exp_date" name="{{strtolower($value['name'])}}[{{$i}}][passport_exp_date]"  placeholder="Enter Passport Expiry Date">
                        </div>
                    </div>
                </div>
                <hr>
                <hr>
                @endfor
                @endforeach
                <div class="row pdrs">
                    <div class="col-sm-12">
                        <div class="txtal">
                            <h5>Contact Information
                                <p>Your ticket and flights information will be sent here.</p>
                            </h5>

                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="inpse ">
                            <label>Phone Number</label>
                            <input type="text"  id="phone" name="phone" placeholder="Enter Phone Number">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="inpse ">
                            <label>Email</label>
                            <input type="text" id="email" name="email" placeholder="Enter Email">
                        </div>
                    </div>


                </div>


                <div class="row pdrs">
                    <div class="col-sm-12">
                        <div class="txtal">
                            <h5>Addon Services

                            </h5>

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="ckrv">
                            <ul>
                                <li>
                                    <input type="checkbox" id="myCheckbox1" />
                                    <label for="myCheckbox1" class="brse">
                                        <div class="mels_ck d-flex">
                                            <span><img src="http://24hr.lightmytrip.com/public/images/AddMeals.svg" class="img-res"></span>
                                            <h5>Add Meals</h5>
                                        </div>
                                    </label>
                                </li>
                                <li>

                                    <input type="checkbox" id="myCheckbox2" />
                                    <label for="myCheckbox2" class="brse">
                                        <div class="mels_ck d-flex">
                                            <span><img src="http://24hr.lightmytrip.com/public/images/AddBaggage.svg" class="img-res"></span>
                                            <h5>Add Baggage</h5>
                                        </div>
                                    </label>
                                </li>
                                <li>

                                    <input type="checkbox" id="myCheckbox3" />
                                    <label for="myCheckbox3" class="brse">
                                        <div class="mels_ck d-flex">
                                            <span><img src="http://24hr.lightmytrip.com/public/images/SeatSelection.svg" class="img-res"></span>
                                            <h5>Seat Selection</h5>
                                        </div>
                                    </label>
                                </li>

                                <li>

                                    <input type="checkbox" id="myCheckbox4" />
                                    <label for="myCheckbox4" class="brse">
                                        <div class="mels_ck d-flex">
                                            <span><img src="http://24hr.lightmytrip.com/public/images/Baggageout.svg" class="img-res"></span>
                                            <h5>Baggage out First/Priority Check-in</h5>
                                        </div>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>




                </div>
                <style>
                    .instxs {
                        border: 1px solid #9ab7f9;
                        background: #e5edff;
                        padding: 10px;
                        align-items: center;
                        height: 69px;
                        border-radius: 4px;
                        justify-content: space-between;
                    }

                    .instxs>h4 {
                        width: 70%;
                        position: relative;
                        padding-left: 17px;
                    }

                    .instxs>h4>i {
                        position: absolute;
                        left: 0;
                    }

                    .instxs>h5 {
                        width: 30%;
                        text-align: right;
                        display: block;
                    }

                    .instxs>h4,
                    .instxs>h5 {
                        font-size: 14px;
                        margin-bottom: 0;
                    }

                    .instxs>h5>span {
                        display: block;
                        font-weight: 400;
                        font-size: 11px;
                    }

                    .cks_list {
                        margin-top: 10px;
                    }

                    .cks_list>span {
                        display: block;
                        position: relative;
                        font-size: 12px;
                        padding-left: 20px;
                    }

                    .cks_list>span>i {
                        position: absolute;
                        left: 0;
                        top: 5px;
                    }

                    .cks_list>span>span {
                        color: green;
                    }

                    .cks_list>a {
                        color: #017cc2;
                        font-size: 13px;
                    }

                    .ckeck_trm label::before {
                        display: none;
                    }

                </style>
                <hr>
                <div class="row pdrs">
                    <div class="col-sm-6">
                        <div class="ins_box">
                            <div class="instxs d-flex">
                                <h4><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add the possibility to cancel your trip</h4>
                                <h5>&euro;&nbsp;25.03
                                    <span>total price</span>
                                </h5>
                            </div>
                            <div class="cks_list">
                                <span><i class="fa fa-check" aria-hidden="true"></i>For any documented reason, e.g. loss of job, exam, illness of the insured person or their relatives, cat and dog</span>
                                <span><i class="fa fa-check" aria-hidden="true"></i><strong>Resignation from travel in case of contracting COVID-19</strong></span>
                                <span><i class="fa fa-check" aria-hidden="true"></i><strong>Resignation due to obligatory quarantine before departure</strong></span>
                                <span><i class="fa fa-check" aria-hidden="true"></i>90% refund of the flight ticket costs</span>
                                <span><i class="fa fa-check" aria-hidden="true"></i><span><strong>Insurance available only now!</strong></span></span>
                                <a href="#">Insurance scope and exclusions</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="ins_box">
                            <div class="instxs d-flex">
                                <h4><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add travel insurance</h4>
                                <h5>&euro;&nbsp;4.19
                                    <span>per person per day</span>
                                    <span>(total :&euro;16.77)</span>
                                </h5>
                            </div>
                            <div class="cks_list">
                                <span><i class="fa fa-check" aria-hidden="true"></i>coverage of medical costs<strong> (including COVID-19 treatment)</strong> up to &euro;300,000</span>
                                <span><i class="fa fa-check" aria-hidden="true"></i><strong>Quarantine abroad :</strong> cover of accommodation and return ticket costs up to &euro;1,200 </span>
                                <span><i class="fa fa-check" aria-hidden="true"></i>Assistance and medical transport</span>

                            </div>
                        </div>
                    </div>
                </div>




                <!-- <ul>
                    <li>Review your trip details to make sure the dates and times are correct.</li>
                    <li>Check your spelling. Flight passenger names must match government-issued photo ID
                        exactly.</li>
                    <li>Review the terms of your booking:
                        <ul>
                            <li>We understand that sometimes plans change. We do not charge a cancel or change
                                fee. When the airline charges such fees in accordance with its own policies, the
                                cost will be passed on to you.</li>
                            <li>Please read the complete penalty rules for changes and cancellations or charter
                                contract.</li>
                            <li>Please read important information regarding airline liability limitations.</li>
                            <li>Prices may not include baggage fees or other fees charged directly by the
                                airline.</li>
                            <li>British law forbids the carriage of hazardous materials aboard aircraft in your
                                luggage or on your person.</li>
                        </ul>
                    </li>
                </ul> -->

                <div class="ckeck_trm">
                    <input class="hide-check" type="checkbox" id="acceptTnc">
                    <label for="acceptTnc" class="check-label black-text fs-xs-14">By continuing, you agree to the
                        <a href="http://24hr.lightmytrip.com/terms-and-conditions" target="blank">Terms &amp; Conditions</a>.</label>
                        <button type="submit" id="booking-details"  class="btn-primary">Submit</button>
                </div>
            </div>
            </form>
        </div>
        @include('Frontend.flights.booking-details')
    </div>
</div>
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <form id="customer-login-form">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
        <div class="col-sm-12">
            <span id="login-email-error"></span>
            <div class="inpse ">
                            <label>Email<span class="stres">*</span></label>
                            <input type="text" id="login-email" placeholder="Enter email">
             </div>
        </div>
         <div class="col-sm-12">
            <span id="login-email-error"></span>
            <div class="inpse ">
                            <label>Book As <span class="stres">*</span></label>
                            <select class="form-control" name="type" id="login-type">
                            <option value=""> Book as </option>
                            <option value="Agent">Agent </option>
                             <option value="Traveler">Traveler</option>

                            </select>
             </div>
        </div>
        <div class="col-sm-12">
            <div class="inpse ">
                            <label>Password<span class="stres">*</span></label>
                            <input type="password" id="login-password" placeholder="Enter password">
             </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="login-form">Login</button>
      </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <form id="customer-login-form">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proceed For payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
          <div class="card">
            <div class="container">
                <span>Email:<h4 id="contact_email-e"><b></b></h4></span>
                <span>Phone:<h4 id="contact_phone-p"><b></b></h4></span>
                <span>Name:<h4 id="contact_name-n"><b></b></h4></span>
                <span>Amount:<h4 id="amount-a"><b></b></h4></span>
                 <span>Amount:<h4 id="currency-c"><b></b></h4></span>
                {{-- <span>Email:<h4 id="contact_email"><b>John Doe</b></h4></span> --}}

                {{-- <p>Architect & Engineer</p> --}}
            </div>
            </div>
        <input type="hidden" id="contact_email" placeholder="Enter email">
        <input type="hidden" id="contact_phone" placeholder="Enter email">
        <input type="hidden" id="contact_name" value="{{auth()->user()->first_name ?? ''}} &nbsp; &nbsp; &nbsp;  {{auth()->user()->last_name ?? ''}}" placeholder="Enter email">
        <input type="hidden" id="amount" placeholder="Enter email">
        <input type="hidden" id="currency" placeholder="Enter email">
        <input type="hidden" id="bookingId" /> 
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="payment-process">Continue</button>
      </div>
        </form>
    </div>
  </div>
</div>

@endsection
