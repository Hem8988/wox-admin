@extends('layouts.frontend')
@section('title', @$seoDetails->meta_title)
@section('meta_title', @$seoDetails->meta_title)
@section('meta_keyword', @$seoDetails->meta_keyword)
@section('meta_description', @$seoDetails->meta_desc)
@section('bodyclass', 'homepage')
@section('pagespecificstyles')
	<!-- Facebook Pixel Code -->

<!-- End Facebook Pixel Code -->
@endsection
@section('content')
<?php use App\Http\Controllers\PackageController; ?>
<!-- Banner
============================================= -->
<style>
.promocode_desc { border: 1px dashed #A7A7A7; border-radius: 4px; display: inline-flex; position: relative; margin-top: 15px;}
.promcde {background: #2196f3;border-radius: 20px; text-align: center;padding: 1px 5px;font-size: 10px;font-weight: 600; text-transform: uppercase; color: #fff;position: absolute;top: -11px;left: 7px;}
.coupncde {font-size: 13px;color: #000; font-weight: 600; text-transform: uppercase;  padding: 6px 8px;  display: flex; border-right: 1px dashed #A7A7A7;}
.custom_reservation_tab form.form-banner-reservation .onewayadult,.custom_reservation_tab form.form-banner-reservation .onewaychild,.custom_reservation_tab form.form-banner-reservation .onewayinfants{    padding: 0 10px;}
</style>

<script>
$(document).ready(function(){
	$(function () {
        $('input[name="brTimeStart"]').daterangepicker({
            opens: 'left',
            singleDatePicker: true,
            autoApply: true,
        }, function (start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
	

	$("#datepicker1,#datepicker2").datepicker({
        numberOfMonths: 2,
        dateFormat: 'dd/mm/yy',
        minDate: 0
    
    });

	$(".roundtriptab ").click(function(){
$("#oneroundtp").hide();
$("#roundtp").show();
});

$(".onewy ").click(function(){
$("#oneroundtp").show();
$("#roundtp").hide();
});

$("#oneroundtp ").click(function(){
$("#oneroundtp").hide();
$("#roundtp").show();
$(".onewy").removeClass("active");
$(".roundtriptab").addClass("active");
$(".roundseatclass").prop('checked', false);
});

	$(function() {
        $('input[name="onetrip"]').daterangepicker({
            opens: 'left',
            autoApply: true,			
			numberOfMonths: 2,
        
        });
    });

	$(function() {
        $('input[name="rounddate"]').daterangepicker({
            opens: 'left',
            autoApply: true,
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
    $('.dropdown-menu').click(function(event) {
        event.stopPropagation();
    });
});
	</script>


<div class="mob_flight_link"> 
	<div class="container">
		<div class="row">
			<div class="col-sm-12 padd0">
				<h1>Hotel listing</h1>
			</div>
		</div>
	</div>
</div>


<style>
	/*=====hotel=====*/
    .plani-icon {
				display: flex;
			}

			.changes_ht #banner {
				background-color: #04007f;
			}

			.changes_ht .banner-center-box {
				padding: 20px 0px;
				margin-top: 0;
			}

		

			.list_fliter {
				display: flex;
				justify-content: space-between;
				margin-top: 30px; align-items: start;
			}

			.filter_nes {
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        width: 22%;
			}

		

			.listingbx {
				width: 78%;
				padding-left: 20px;
			}

			.ftr_headnw {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ddd;
        background: #fff;
        padding: 10px 10px;
        border-radius: 5px 5px 0px 0px;
			}

			.ftr_headnw>h1 {
				font-size: 18px;
				color: #000;
				margin-bottom: 0;
				font-weight: 500;
			}

			.ftr_headnw>span {
				display: block;
				color: #d52b1e;
				cursor: pointer; font-size: 13px;
			}




			.filtercnt_n .panel-heading a {
				display: block;
				position: relative;
				font-weight: bold;
				font-size: 15px;
				padding-bottom: 15px;
			}

			.filtercnt_n .panel-heading a::after {
				content: "";
				border: solid black;
				border-width: 0 1px 1px 0;
				display: inline-block;
				padding: 3px;
				position: absolute;
				right: 3px;
				top: 0;
				transform: rotate(45deg);
			}

			.filtercnt_n .panel-heading a[aria-expanded=true]::after {
				transform: rotate(-135deg);
				top: 6px;
			}

			.filtercnt_n {
			 padding: 15px;
			}

			.filtercnt_n .panel-group .panel {
				border: none;
				box-shadow: none;
				border-bottom: 1px solid #ddd;
				margin-bottom: 20px;
			}

			.filtercnt_n .panel-default>.panel-heading {
				background-color: initial;
				border: none;
				padding: 0;
				border-radius: inherit;
			}

			.filtercnt_n .panel-default>.panel-heading+.panel-collapse>.panel-body {
				border: none;
			}

			.filtercnt_n .panel-heading a:hover {
				color: #000;
			}

			.txtftr {
				display: flex;
				justify-content: space-between;
			}

			.txtftr>h6 {
				font-size: 14px;
				font-weight: bold;
				color: #000;
				margin-bottom: 0;
				text-transform: uppercase;
			}

			.txtftr>span {
				display: block;
				color: #d52b1e;
				cursor: pointer;
				font-weight: 500;
				padding-right: 25px;
				font-size: 13px;
			}


			/*slider*/

			.rage_price .value {
				position: absolute;
				top: 30px;
				left: 50%;
				margin: 0 0 0 -20px;
				width: 40px;
				text-align: center;
				display: block;

				/* optional */

				font-weight: normal;
				font-family: Verdana, Arial, sans-serif;
				font-size: 14px;
				color: #333;
			}

			.rage_price .price-range-both.value {
				margin: 0 0 0 -50px;
				top: 26px;
			}

			.rage_price .price-range-both {
				display: none;
			}

			.value i {
				font-style: normal;
			}

			.rage_price div.ui-slider-range.ui-widget-header {
				background: #002d62  !important;
			}

			.rage_price .ui-state-hover,
			.rage_price .ui-widget-content .ui-state-hover,
			.rage_price .ui-widget-header .ui-state-hover,
			.rage_price .ui-state-focus,
			.rage_price .ui-widget-content .ui-state-focus,
			.rage_price .ui-widget-header .ui-state-focus {
				background: #002d62 !important;
			}

			.rage_price .ui-state-default,
			.rage_price .ui-widget-content .ui-state-default,
			.rage_price .ui-widget-header .ui-state-default {
				background: #002d62 !important;
				border-radius: 50%;
				font-size: 15px;
				border: 4px solid #fff !important;
				box-shadow: 0 0 7px #306473;

			}

			.rage_price span.ui-slider-handle.ui-corner-all.ui-state-default:focus {
				outline: none;
			}

			.rage_price .ui-slider-horizontal {
				height: 0.4em;
				border: none;
				background: #eee;
			}

			.rage_price {
				padding-bottom: 40px;
			}

			.rage_price .ui-slider-horizontal .ui-slider-handle {
				top: -6px;
			}

			.rage_price .value {
				font-size: 12px;
				margin: 0;
				width: 72px;
				top: 20px;
			}

			.rage_price .price-range-max {
				text-align: right;
				left: initial;
				right: 0;
			}

			.rage_price .price-range-min {
				text-align: left;
				left: 0;
			}

			.pdmrbx {
				padding: 0 0 15px 0;
			}

			/*slider-end*/

			.checkftr .label-container.checkbox-default .checkmark {
				border-radius: 2px;
			}

			.listps {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}

			.listps li a {
				color: #333;
				font-size: 14px;
				text-align: center;
				display: block;
			}

			.listps li a span {
				display: block;
				width: 100%;
				border: 1px solid #ddd;
				text-align: center;
				padding: 6px;
				border-radius: 2px;
			}

			.listps li .activeck span {
				background: #5091fb;
				color: #fff;
			}

			.lsprc {
				font-size: 12px;
			}

			.sltxt {
				color: #999999;
				font-weight: 600;
				font-size: 14px;
			}

			.sltxt>i {
				font-size: 12px;
			}

			.rightlist>h2 {
				color: #6d8494;
				font-size: 18px;
			}

			.rightlist>h2>span {
				color: #333;
			}



			/*slider*/
			.sliderlist .slick-prev,
			.sliderlist .slick-next {
				position: absolute;
				top: 50%;
				background: #5091fb;
				border-radius: 50px;
				bottom: 0;
				transform: translate(-50%, -50%);
				z-index: 2;
				text-indent: -99999px;
				color: royalblue !important;
				width: 30px;
				height: 30px;
				padding: 0;
			}

			.sliderlist .slick-prev {
				left: -10px;
			}

			.sliderlist .slick-next {
				right: -40px;
			}

			.sliderlist .slick-prev:before,
			.sliderlist .slick-next:before {
				position: absolute;
				content: '';
				width: 13px;
				height: 13px;

				margin-top: 8px;
			}

		

			.sliderlist .slick-slider .slick-slide {
				padding-left: 3px;
				padding-right: 3px;
			}

			.bgsl {
				background: #e1ecf3;
				margin-left: 0;
				margin-right: 0;
				padding: 10px;
				display: flex;
				flex-wrap: wrap;
			}

			.ligbtm {
				align-self: flex-end;
				padding-right: 0;
			}

			.listdh {
				border: 0.5px solid #ddeaf0;
				box-shadow: none;
				text-align: center;
				margin: 0;
				overflow: hidden;
				border-radius: 3px;
				position: relative;
				display: -webkit-box;
				display: flex;
				-webkit-box-orient: vertical;
				-webkit-box-direction: normal;
				flex-direction: column;
				min-width: 0;
				word-wrap: break-word;
				background-color: #fff;
				background-clip: border-box;
			}

			.img-res {
				max-width: 100%;
				max-height: 100%;
			}

			.airline-logo1 {
				padding: 17px 10px 16px;
				font-size: 14px;
				transition: all .4s;
				border-radius: 3px;
				line-height: 20px;
				display: inline-block;
				font-weight: 400;
				color: #212529;
				text-align: center;
				vertical-align: middle;
				cursor: pointer;
			}

			.imglsdh {
				height: 37px;
				display: -webkit-box;
				display: flex;
				-webkit-box-align: center;
				align-items: center;
				margin: auto;
				justify-content: center;
			}

			.airline-name1 {
				margin-top: 11px;
				height: 24px;
				display: -webkit-box;
				display: flex;
				-webkit-box-align: center;
				align-items: center;
				-webkit-box-pack: center;
				justify-content: center;
			}

			.airline-name1 h5 {
				margin-bottom: 0;
				font-size: 11px;
				color: #399af4;
				font-weight: bold;
			}

			.list-unstyleds>li {
				text-align: center;
				color: #6d8494;
				padding: 5px;
				border-top: 0.5px solid #bed3dd;
				font-weight: 500;
			}

			.pl0 {
				padding-left: 0;
			}


			.mdbtn .mod_bt {
				padding: 13px 10px;
				line-height: 0;
				height: auto;
				float: right;
				background: #399af4;
				font-size: 14px;
				text-transform: uppercase;
				width: 100%;
			}

			.mobile-filter {
				display: none;
				position: fixed;
				bottom: 15px;
				left: 0;
				right: 0;
				width: 94%;
				background: rgba(0, 0, 0, 0.7);
				z-index: 2;
				margin: auto;
				border-radius: 5px;
				padding: 15px;
			}

			.mobile-filter>ul {
				display: flex;
				justify-content: space-between;
				column-gap: 10px;
			}

			.mobile-filter>ul>li {
				color: #fff;
				text-align: center;
				width: 25%;
				cursor: pointer;
			}

			.mobile-filter>ul>li>i {
				display: block;
				font-size: 20px;
				margin-bottom: 5px;
			}

			.mobileapply_ftr {
				display: none;
			}

			.mdf_ms {
				margin-left: 5px;
			}

			.stopmd {
				display: none;
			}

			@media screen and (max-width: 1024px) {

				.mobile-filter,
				.mobileapply_ftr {
					display: block;
				}

				.list_fliter {
					flex-wrap: wrap;
				}

				.filter_nes {
					display: none;
					width: 100%;
					position: fixed;
					top: 0;
					left: 0;
					right: 0;
					z-index: 999;
					overflow: auto;
					bottom: 0;
				}

				.ftr_head {
					position: fixed;
					left: 0;
					right: 0;
					width: 100%;
					margin: auto;
					background: #eee;
					padding: 13px 15px;
					top: 0;
					z-index: 99;
				}

				.filtercnt_n {
					margin-top: 66px;
				}

				.mobileapply_ftr {
					position: fixed;
					left: 0;
					right: 0;
					bottom: 33px;
					z-index: 99;
					display: flex;
					justify-content: center;
					column-gap: 20px;
					align-items: center;
				}

				.mobileapply_ftr .btnf_apy {
					color: #fff;
					background: #f58220;
					border-color: #f58220;
					box-shadow: 0 2px 0 #d8690a;
					width: 92%;
					border-radius: initial;
					width: 92%;
					border-radius: initial;
					padding: 4px 10px;
					height: auto;
					font-size: 17px;
				}

				.mobileapply_ftr .btnf_apy span {
					display: inline-block;
					margin-right: 70px;
				}

				.filtercnt_n .panel-group {
					padding-bottom: 50px;
				}

				.flx_md {
					flex-wrap: wrap;
				}

				.flx_md li:first-child {
					width: 100%;
					padding: 0 5px;
				}

				.flx_md li {
					border: none;
				}

				.flx_md li:nth-child(2),
				.flx_md li:nth-child(3) {
					width: auto;
					padding: 0 5px;
				}

				.flx_md li span {
					font-size: 12px;
				}

				.spcmd>span {
					width: auto;
				}

				.mdf_ms {
					display: none;
				}

				.modifyhead {
					padding: 10px 0px;
				}

				.listingbx {
					width: 100%;
					padding-left: 0;
				}



				.header-bar .container .pull-right {
					display: none;
				}

			}

		
			.list-checkboxes{max-height: 200px;  overflow-y: auto;}
			.list-checkboxes::-webkit-scrollbar {
    -webkit-appearance: none;
}

.list-checkboxes::-webkit-scrollbar:vertical {
    width: 8px;
}

.list-checkboxes::-webkit-scrollbar:horizontal {
    height: 11px;
}

.list-checkboxes::-webkit-scrollbar-thumb {
    border-radius: 8px;
    border: 2px solid white; /* should match background, can't be transparent */
    background-color: rgba(0, 0, 0, .5);
}
		

			.mr5 {
				margin-right: 5px;
			}

			.sarchftr_ht1 {
				margin-bottom: 20px;
				border-bottom: 1px solid #ddd;
				padding-bottom: 20px;
				position: relative;
			}

			.sarchftr_ht1>i {
				position: absolute;
				left: 14px;
				top: 12px;
			}

			.sr {
        font-size: 13px;
        padding: 10px 10px 10px 35px;
        width: 100%;
        border: 1px solid #ddd; outline: none !important;
			}

			.startbx>i {
        color: #f4c339;
        font-size: 16px;
			}
/* Custom Checkbox */
.label-container.checkbox-default { 
  display: flex; 
  flex-direction: row-reverse; 
  justify-content: flex-end; 
  align-items: flex-start; 
  position: relative; 
  margin-bottom: 0; 
  width: 100%; 
  cursor: pointer; 
  font-size: 12px; 
  -webkit-user-select: none; 
  -moz-user-select: none; 
  -ms-user-select: none; 
  user-select: none; 
  /* Hide the browser's default checkbox */
  /* On mouse-over, add a grey background color */
  /* When the checkbox is checked, add a blue background */
  /* Create a custom checkbox */
  /* Create the checkmark/indicator (hidden when not checked) */
  /* Show the checkmark when checked */
  /* Style the checkmark/indicator */ } 
  .label-container.checkbox-default input { 
  position: absolute; 
  opacity: 0; 
  cursor: pointer; 
  height: 0; 
  width: 0; } 
  .label-container.checkbox-default:hover input ~ .checkmark { 
  box-shadow: inset 0 0 0 2px #5091fa; } 
  .label-container.checkbox-default input:checked ~ .checkmark { 
  background-color: #002d62; 
  box-shadow: inset 0 0 0 1px #002d62; } 
  .label-container.checkbox-default .checkmark { 
  display: inline-block; 
  position: relative; 
  top: 0px; 
  left: 0; 
  margin-right: 10px; 
  height: 20px; 
  width: 20px; 
  flex: 0 0 20px; 
  border-radius: 5px; 
  box-shadow: inset 0 0 0 2px #ccc; } 
  .label-container.checkbox-default .checkmark:after { 
  content: ""; 
  position: absolute; 
  display: none; } 
  .label-container.checkbox-default input:checked ~ .checkmark:after { 
  display: block; } 
  .label-container.checkbox-default .checkmark:after { 
  left: 8px; 
  top: 4px; 
  width: 5px; 
  height: 10px; 
  border: solid white; 
  border-width: 0 2px 2px 0; 
  -webkit-transform: rotate(45deg); 
  -ms-transform: rotate(45deg); 
  transform: rotate(45deg); } 
 
 .label-container.small { 
  width: auto; } 
  .label-container.small .checkmark { 
  width: 20px; 
  height: 20px; 
  border-radius: 3px; } 
  .label-container.small .checkmark::after { 
  left: 7px; 
  top: 4px; 
  width: 6px; 
  height: 9px; } 
			.flexdrop {
				display: flex;
				justify-content: space-between;
				align-items: center;
				border-bottom: 1px solid #ddd;
				padding-bottom: 20px;
			
			}

			.flexdrop>h2 {
				margin-bottom: 0;
				font-size: 20px;
				font-weight: bold;
			}

			.flexdrop>h2>p {
				font-size: 14px;
				font-weight: 500;
				position: relative;
				top: 10px;
			}

			.lidr_pc {
				background: no-repeat;
				border: none;
				padding: 7px 10px;
				font-size: 13px;
				border-top: 1px solid #ddd;
				border-bottom: 1px solid #ddd;
				height: auto;
				color: #000 !important;
			}

			.covid_noty {
				border: 1px solid #ddd;
				border-radius: 5px;
				background: #fff;
				padding: 20px;
			}

			.covid_noty>p {
				position: relative;
				margin-bottom: 10px;
				padding: 0px 0px 0px 31px;
				font-size: 15px;
				line-height: 19px;
				color: #d99600;
			}

			.covid_noty>p>i {
				position: absolute;
				left: 0;
				top: 0;
				font-size: 20px;
				color: #d99600;
			}

			.btnc_ap {
				display: flex;
				column-gap: 20px;
			}

			.btnc_ap>a,
			.btnc_ap>span {
				text-decoration: underline;
				color: #000;
				font-size: 14px;
				cursor: pointer;
			}

			.btnc_ap>span {
				color: #d99600;
			}

			/*=====range slider=====*/


			.range-slider {
				width: 100%;
			}

			.distance_box .range-slider__range {
				-webkit-appearance: none;
				width: 100%;
				height: 10px;
				border-radius: 5px;
				background: #d7dcdf;
				outline: none;
				padding: 0;
				margin: 0;
			}

			.distance_box .range-slider__range::-webkit-slider-thumb {
				-webkit-appearance: none;
				appearance: none;
				width: 20px;
				height: 20px;
				border-radius: 50%;
				background: #399af4;
				cursor: pointer;
				-webkit-transition: background 0.15s ease-in-out;
				transition: background 0.15s ease-in-out;
			}

			.distance_box .range-slider__range::-webkit-slider-thumb:hover {
				background: #399af4;
			}

			.distance_box .range-slider__range:active::-webkit-slider-thumb {
				background: #399af4;
			}

			.distance_box .range-slider__range::-moz-range-thumb {
				width: 20px;
				height: 20px;
				border: 0;
				border-radius: 50%;
				background: #2c3e50;
				cursor: pointer;
				-moz-transition: background 0.15s ease-in-out;
				transition: background 0.15s ease-in-out;
			}

			.distance_box .range-slider__range::-moz-range-thumb:hover {
				background: #399af4;
			}

			.distance_box .range-slider__range:active::-moz-range-thumb {
				background: #399af4;
			}

			.distance_box .range-slider__range:focus::-webkit-slider-thumb {
				box-shadow: 0 0 0 3px #fff, 0 0 0 6px #399af4;
			}

			.distance_box .range-slider__value {
				display: inline-block;
				position: relative;
				width: 60px;
				color: #fff;
				line-height: 20px;
				text-align: center;
				border-radius: 3px;
				background: #399af4;
				padding: 5px 10px;


			}


			.distance_box ::-moz-range-track {
				background: #d7dcdf;
				border: 0;
			}

			.distance_box input::-moz-focus-inner,
			.distance_box input::-moz-focus-outer {
				border: 0;
			}


			/*=====range slider end=====*/
			.kmbx {
				border: 1px solid #ddd;
				margin-top: 14px;
				padding: 6px 10px;
				border-radius: 5px;
				display: flex;
				justify-content: space-between;
				align-items: center;
			}

			.lglist {
        display: flex;
        border-bottom: 1px solid #ddd;
        align-items: center;
        padding: 15px 10px 15px 0px;
			}

			.list_hotel_img {
				width:30%;
			
				padding-right: 10px;
			}
      .priceshow>h3{    font-size: 23px; margin-bottom: 10px;
        font-weight: 600;}
      .priceshow>h3>span  {    display: block;
          font-size: 13px;
          color: #2c2c2c;
          font-weight: 400;}
         .priceshow>p {    font-size: 14px;
            margin-bottom: 15px;
            display: block;}

			.list_hotel_txt {
				width: 45%;
				padding: 15px;
				background: #fff;
			}

      .pribtns{width: 25%;}

			.smallstar>i {
				font-size: 12px;
			}

			.listing_hd_hotel>h2 {
				font-size: 19px; display: flex;
				font-weight: 600;
				color: #464646;
				margin-bottom: 5px;
			
			}
.smallstar{margin-left: 20px;}
			.listbt_sml {
				display: flex;
				margin-bottom: 10px; column-gap: 10px;
			}

			.listbt_sml>li {
				position: relative;
				border-right: 1px solid #838383;
			}

			.listbt_sml>li:last-child {
				border-right: none;
			}

			.listbt_sml>li:last-child>a {
				color: #666;
				font-weight: 600;
			}

			.listbt_sml>li>a {
				color: #838383;
				font-size: 12px;
				display: block;
				padding-right: 5px;
				line-height: initial;
			}

			.listbt_sml>li:first-child>a {
				padding-left: 0;
			}

			.iconsml,
			.iconsml>li {
				display: flex;
				align-items: center;
				flex-wrap: wrap;
				column-gap: 6px;
			}

			.iconsml {
				width: 100%;
			}

			.iconsml>li {
        margin-bottom: 5px;
        background: #eee;
        padding: 3px 7px;
        border-radius: 3px;
			}

			.iconsml>li>span {
				font-size: 12px;
				color: #757588;
			}

			.green_ex>span {
				background-color: rgba(4, 141, 59, 0.1);
				color: rgb(4, 141, 59);
				display: inline-block;
				padding: 4px 14px;
				border-radius: 50px;
				font-weight: 600;
				font-size: 13px;
				margin-top: 10px;
			}

			.ht_pricelist {
				display: flex;
				margin-top: 30px;
				align-items: center;
			}

			.pr_bx1 {
				width: 48%;
				column-gap: 10px;
			}

			.list_tlc {
				display: flex;
				column-gap: 10px;
			}

			.list_tlc>span {
				font-size: 14px;
				font-weight: 500;
			}

			.list_tlc .greentxtin {
				color: #89ad3e;
				font-weight: 600;
			}

			.pcs_txt>h2 {
				font-weight: bold;
				font-size: 35px;
				margin-bottom: 0;
			}

			.pcs_txt>h2>sup {
				font-size: 16px;
				font-weight: 500;
				top: -20px;
				text-decoration: line-through;
				color: #878787;
				margin-left: 10px
			}

			.ml5 {
				margin-left: 5px;
			}

			.hotslc>a {
        background: linear-gradient(90deg, rgba(66,112,194,1) 0%, rgba(7,40,106,1) 99%);
				display: block;
				padding: 9px 10px;
				border-radius: 50px;
				text-align: center;
				color: #fff;
				font-size: 15px;
				transition: all .5s ease-in-out;
			}

			.hotslc>a:hover {
			transform: scale(1.1);
			}

			.smallall_lmg{display: flex; justify-content: space-between; flex-wrap: wrap;
    margin-top: 5px; column-gap: 5px; height: 57px;
    overflow: hidden;} 
			.smallall_lmg>li{width: 32%; overflow: hidden; margin-bottom: 20px; position: relative; }
			.seemore{    position: absolute;
    background: rgba(0,0,0,0.4);
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    text-align: center; display: flex; align-items: center;}
	.seemore>span{    line-height: 16px;
    color: #fff;
    font-size: 14px;
    display: block;}
	.fancybox-thumbs__list a:before{border: 6px solid #5091fa;}
	.mobile-filter>.cntrjst{justify-content: center;}

	@media screen and (max-width: 640px) {
				.ligbtm {
					display: none;
				}

				.bgsl {
					display: block;
				}

				.pl0 {
					padding-left: 15px;
				}

				.stopmd {
					display: block;
				}

				.tktlist>li {
					display: block;
				}

				.inuot_bx,
				.prishow {
					width: 100%;
				}

				.airnm>h6,
				.tmingtk>ul>li>p,
				.cnts {
					font-size: 12px;
				}

				.bookprc>h5 {
					font-size: 20px;
				}

				.list_fliter {
					padding-bottom: 50px;
				}

				.bookprc .btnvw {
					padding: 10px 22px;
				}

				.tooltip1 .tooltiptext {
					width: 100px;
					margin-left: -71px;
				}

				.tooltiptext>h6,
				.tooltiptext>h6>strong {
					font-size: 13px;
				}

				.tooltiptext>h6>span {
					font-size: 11px;
				}
.flexdrop,.lglist{display: block;}
.flexdrop>h2>p{top: 0;}
.rightlist>h2{margin-bottom: 10px;}
.list_hotel_img,.list_hotel_txt{width: 100%;}
.list_hotel_img{padding: 0;}
.listbt_sml{flex-wrap: wrap;}
.iconsml {
    width: 100%;
}
.listbt_sml>li>a{font-size: 11px;}
.listing_hd_hotel>h2{font-size: 16px;}
.ht_pricelist{display: block;}
.pr_bx1{width: 100%;}
.mapbox{margin-top: 60px;}
.mtmds{margin-top: 20px;}


			}
/*=====hotel listing end=====*/

</style>
  <div class="mobile-filter">
    <ul class="cntrjst">
        <li><i class="fas fa-sort-amount-up-alt"></i>FILTER</li>
        
    </ul>
</div>
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 serps cngflt">
            <div class="flsa">
                <section class="list_fliter">
                    <div class="filter_nes">

                     

                        <div class="ftr_headnw ">
                            <h1>Filter</h1>
                            <span>Clear all</span>
                        </div>



                        <div class="filtercnt_n mtmds">
                            <div class="mobileapply_ftr">
                                <button type="button" class="btnf_apy" id="aplybtn"><span>0 Filters</span>APPLY
                                </button>
                            </div>

                            <div class="sarchftr_ht1">
                                <i class="fa fa-search"></i>
                                <input type="text" placeholder="Hotel name" class="sr" />
                            </div>

                            <div class="panel-group " id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" aria-expanded="true" href="#PRICE"
                                                aria-expanded="true">
                                                <div class="txtftr">
                                                    <h6>PRICE</h6>
                                                    <span>Clear</span>
                                                </div>

                                            </a>
                                        </h4>
                                    </div>
                                    <div id="PRICE" class="panel-collapse in collapse show">
                                        <div class="panel-body">
                                            <div class="rage_price">
                                                <div id="slider"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" aria-expanded="true"
                                                href="#Popularfilters" aria-expanded="true">
                                                <div class="txtftr">
                                                    <h6>Popular filters</h6>
                                                    <span>Clear</span>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="Popularfilters" class="panel-collapse collapse in show">
                                        <div class="panel-body pdmrbx">
                                            <div class="checkftr">
                                                <ul class="check-boxes-custom list-checkboxes">
                                                    <li>
                                                        <label for="Swimmingpool1"
                                                            class="label-container checkbox-default">Swimming
                                                            pool
                                                            <input name="Swimmingpool" class="flightfilter"
                                                                id="Swimmingpool1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc"> 14 </span>
                                                    </li>
                                                    <li>
                                                        <label for="Verygoodrating1"
                                                            class="label-container checkbox-default">Very good
                                                            rating
                                                            <input name="Verygoodrating" class="Verygoodrating"
                                                                id="Verygoodrating1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">248</span>
                                                    </li>

                                                    <li>
                                                        <label for="Beachfront1"
                                                            class="label-container checkbox-default">Beachfront
                                                            <input name="Beachfront" class="flightfilter"
                                                                id="Beachfront1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">1</span>
                                                    </li>

                                                    <li>
                                                        <label for="Centrallylocated1"
                                                            class="label-container checkbox-default">Centrally
                                                            located
                                                            <input name="Centrallylocated" class="flightfilter"
                                                                id="Centrallylocated1" type="checkbox"
                                                                value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">512</span>
                                                    </li>

                                                    <li>
                                                        <label for="Hidesoldout1"
                                                            class="label-container checkbox-default">Hide sold
                                                            out
                                                            <input name="Hidesoldout1" class="flightfilter"
                                                                id="Hidesoldout1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>

                                                    </li>


                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#Stars"  aria-expanded="true"
                                                aria-expanded="true">
                                                <div class="txtftr">
                                                    <h6>Stars</h6>
                                                    <span>Clear</span>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="Stars" class="panel-collapse collapse in show">
                                        <div class="panel-body pdmrbx">
                                            <div class="checkftr">
                                                <ul class="check-boxes-custom list-checkboxes">
                                                    <li>
                                                        <label for="star1"
                                                            class="label-container checkbox-default">
                                                            <div class="startbx">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <input name="star" class="flightfilter" id="star1"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc"> 56 </span>
                                                    </li>

                                                    <li>
                                                        <label for="star2"
                                                            class="label-container checkbox-default">
                                                            <div class="startbx">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <input name="star" class="flightfilter" id="star2"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">314</span>
                                                    </li>
                                                    <li>
                                                        <label for="star3"
                                                            class="label-container checkbox-default">
                                                            <div class="startbx">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <input name="star" class="flightfilter" id="star3"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">591</span>
                                                    </li>

                                                    <li>
                                                        <label for="star4"
                                                            class="label-container checkbox-default">
                                                            <div class="startbx">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <input name="star" class="flightfilter" id="star4"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">119</span>
                                                    </li>

                                                    <li>
                                                        <label for="star5"
                                                            class="label-container checkbox-default">
                                                            <div class="startbx">
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <input name="star" class="flightfilter" id="star5"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">38</span>
                                                    </li>



                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                                href="#Hotelrating" aria-expanded="true">
                                                <div class="txtftr">
                                                    <h6>Hotel rating</h6>
                                                    <span>Clear</span>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="Hotelrating" class="panel-collapse collapse in">
                                        <div class="panel-body pdmrbx">
                                            <div class="checkftr">
                                                <ul class="check-boxes-custom list-checkboxes">
                                                    <li>
                                                        <label for="Excellent1"
                                                            class="label-container checkbox-default">Excellent
                                                            <input name="Excellent" class="flightfilter"
                                                                id="Excellent1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">172</span>
                                                    </li>
                                                    <li>
                                                        <label for="Verygood1"
                                                            class="label-container checkbox-default">Very good
                                                            <input name="Verygood" class="Verygoodrating"
                                                                id="Verygood1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">246</span>
                                                    </li>

                                                    <li>
                                                        <label for="Good1"
                                                            class="label-container checkbox-default">Good
                                                            <input name="Good" class="flightfilter" id="Good1"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">188</span>
                                                    </li>

                                                    <li>
                                                        <label for="Fair1"
                                                            class="label-container checkbox-default">Fair
                                                            <input name="Fair" class="flightfilter" id="Fair1"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">90</span>
                                                    </li>

                                                    <li>
                                                        <label for="Poor1"
                                                            class="label-container checkbox-default">Poor
                                                            <input name="Poor" class="flightfilter" id="Poor1"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">57</span>
                                                    </li>


                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                                href="#Facilities" aria-expanded="true">
                                                <div class="txtftr">
                                                    <h6>Facilities</h6>
                                                    <span>Clear</span>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="Facilities" class="panel-collapse collapse in">
                                        <div class="panel-body pdmrbx">
                                            <div class="checkftr">
                                                <ul class="check-boxes-custom list-checkboxes">
                                                    <li>
                                                        <label for="24hourfrontdesk1"
                                                            class="label-container checkbox-default">24-hour
                                                            front desk
                                                            <input name="24hourfrontdesk" class="flightfilter"
                                                                id="24hourfrontdesk1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">918</span>
                                                    </li>
                                                    <li>
                                                        <label for="24hourroomservice1"
                                                            class="label-container checkbox-default">24-hour
                                                            room service
                                                            <input name="24hourroomservice"
                                                                class="Verygoodrating" id="24hourroomservice1"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">0</span>
                                                    </li>

                                                    <li>
                                                        <label for="Airconditioning1"
                                                            class="label-container checkbox-default">Air
                                                            conditioning
                                                            <input name="Airconditioning" class="flightfilter"
                                                                id="Airconditioning1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">33</span>
                                                    </li>

                                                    <li>
                                                        <label for="Beachnearby1"
                                                            class="label-container checkbox-default">Beach
                                                            nearby
                                                            <input name="Beachnearby" class="flightfilter"
                                                                id="Beachnearby1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">1</span>
                                                    </li>

                                                    <li>
                                                        <label for="Carparking1"
                                                            class="label-container checkbox-default">Car parking
                                                            <input name="Carparking" class="flightfilter"
                                                                id="Carparking1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">241</span>
                                                    </li>

                                                    <li>
                                                        <label for="Facilitiesfordisabled1"
                                                            class="label-container checkbox-default">Facilities
                                                            for disabled
                                                            <input name="Facilitiesfordisabled"
                                                                class="flightfilter" id="Facilitiesfordisabled1"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">631</span>
                                                    </li>

                                                    <li>
                                                        <label for="Fitnesscenter1"
                                                            class="label-container checkbox-default">Fitness
                                                            center
                                                            <input name="Fitnesscenter" class="flightfilter"
                                                                id="Fitnesscenter1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">170</span>
                                                    </li>

                                                    <li>
                                                        <label for="Freecarparking1"
                                                            class="label-container checkbox-default">Free car
                                                            parking
                                                            <input name="Freecarparking" class="flightfilter"
                                                                id="Freecarparking1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">18</span>
                                                    </li>


                                                    <li>
                                                        <label for="Freewifi1"
                                                            class="label-container checkbox-default">Free wifi
                                                            <input name="Freewifi" class="flightfilter"
                                                                id="Freewifi1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">993</span>
                                                    </li>

                                                    <li>
                                                        <label for="Kitchen1"
                                                            class="label-container checkbox-default">Kitchen
                                                            <input name="Kitchen" class="flightfilter"
                                                                id="Kitchen1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">3</span>
                                                    </li>

                                                    <li>
                                                        <label for="Nonsmokingrooms1"
                                                            class="label-container checkbox-default">Non smoking
                                                            rooms
                                                            <input name="Nonsmokingrooms" class="flightfilter"
                                                                id="Nonsmokingrooms1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">40</span>
                                                    </li>

                                                    <li>
                                                        <label for="Petsallowed1"
                                                            class="label-container checkbox-default">Pets
                                                            allowed
                                                            <input name="Petsallowed" class="flightfilter"
                                                                id="Petsallowed1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">17</span>
                                                    </li>

                                                    <li>
                                                        <label for="Roomservice1"
                                                            class="label-container checkbox-default">Room
                                                            service
                                                            <input name="Roomservice" class="flightfilter"
                                                                id="Roomservice1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">16</span>
                                                    </li>

                                                    <li>
                                                        <label for="Areashuttle1"
                                                            class="label-container checkbox-default">Area
                                                            shuttle
                                                            <input name="Areashuttle" class="flightfilter"
                                                                id="Areashuttle1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">45</span>
                                                    </li>

                                                    <li>
                                                        <label for="Smokingrooms1"
                                                            class="label-container checkbox-default">Smoking
                                                            rooms
                                                            <input name="Smokingrooms" class="flightfilter"
                                                                id="Smokingrooms1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">0</span>
                                                    </li>

                                                    <li>
                                                        <label for="Spacenter1"
                                                            class="label-container checkbox-default">Spa center
                                                            <input name="Spacenter" class="flightfilter"
                                                                id="Spacenter1" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">0</span>
                                                    </li>

                                                    <li>
                                                        <label for="Swimmingpool1"
                                                            class="label-container checkbox-default">Swimming
                                                            pool
                                                            <input name="Swimmingpool" class="flightfilter"
                                                                id="Swimmingpool" type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">14</span>
                                                    </li>

                                                    <li>
                                                        <label for="Wifi1"
                                                            class="label-container checkbox-default">Wifi
                                                            <input name="Wifi" class="flightfilter" id="Wifi1"
                                                                type="checkbox" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">95</span>
                                                    </li>

                                                    <li>
                                                        <label for="Covid19HygieneProtocols1"
                                                            class="label-container checkbox-default">Covid-19
                                                            Hygiene Protocols
                                                            <input name="Covid19HygieneProtocols"
                                                                class="flightfilter"
                                                                id="Covid19HygieneProtocols1" type="checkbox"
                                                                value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span class="lsprc">0</span>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>







                            </div>
                        </div>
                    </div>

                    <div class="listingbx">
                        <div class="rightlist flexdrop">
                            <h2>Paris, France&nbsp;&nbsp;:&nbsp;&nbsp;<span>1123 hotels available</span>
                                <p>Our best prices have now loaded</p>
                            </h2>
                            <div class="ratingdrop">
                                <select class="lidr_pc">
                                    <option>Rating</option>
                                    <option>Price&nbsp;&nbsp;:&nbsp;&nbsp;low to high</option>
                                    <option>Price&nbsp;&nbsp;:&nbsp;&nbsp;high to low</option>
                                    <option>Distance</option>

                                </select>

                          
                            </div>
                        </div>

                      


                        <div class="largebox_listing">
                            <div class="lglist">
                                <div class="list_hotel_img">
                                    <div class="lgzoomimg">
                                        <a href="#">
                                                <img src="images/Hera.jpg" class="img-res" />
                                            </a>
                                    </div>
                                   
                                </div>

                                <div class="list_hotel_txt">
                                   
                                    <div class="listing_hd_hotel">
                                        <h2><span>The Hera Hotel Sapanca</span>
                                            <div class="startbx smallstar">
                                                <span>5&nbsp;-&nbsp;</span>
                                                <i class="fa fa-star"></i>
                                                
                                            </div>
                                        </h2>
                                        <ul class="listbt_sml">
                                            <li><a href="#">Cayici Mahallesi, Izmit Cd. No 44, Sapanca, 54600, Sakarya</a></li>
                                           
                                        </ul>

                                        <ul class="iconsml">
                                            <li>
                                                <span><img src="http://24hr.lightmytrip.com/public/images/Pool.png" class="img-res" /></span>
                                                <span>Pool</span>
                                            </li>

                                            <li>
                                                <span><img src="http://24hr.lightmytrip.com/public/images/FreeParking.png" class="img-res" /></span>
                                                <span>Free Parking</span>
                                            </li>

                                            <li>
                                                <span><img src="http://24hr.lightmytrip.com/public/images/Spa.png" class="img-res" /></span>
                                                <span>Spa</span>
                                            </li>

                                            <li>
                                                <span><img src="http://24hr.lightmytrip.com/public/images/Gym.png" class="img-res" /></span>
                                                <span>Gym</span>
                                            </li>

                                            <li>
                                                <span><img src="http://24hr.lightmytrip.com/public/images/Restaurant.png" class="img-res" /></span>
                                                <span>Restaurant</span>
                                            </li>

                                            <li>
                                                <span><img src="http://24hr.lightmytrip.com/public/images/Bar.png" class="img-res" /></span>
                                                <span>Bar</span>
                                            </li>

                                           
                                        </ul>

                                        <div class="green_ex">
                                            <span><i class="fa fa-star"></i>&nbsp;4.77 (48 reviews)</span>
                                        </div>

                                       


                                    </div>

                                </div>

                                <div class="pribtns">
                                    <div class="priceshow">
                                        <h3>₦10,000
                                            <span>per night</span>
                                        </h3>
                                        <p>total ₦30,000 for 3 nights
                                            Tax & fees Inclusive</p>
                                    </div>
                                    <div class="hotslc">
                                        <a href="#">Book Now<i class="fa fa-angle-right ml5"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="lglist">
                                <div class="list_hotel_img">
                                    <div class="lgzoomimg">
                                        <a href="#">
                                                <img src="http://24hr.lightmytrip.com/public/images/Hera.jpg" class="img-res" />
                                            </a>
                                    </div>
                                   
                                </div>

                                <div class="list_hotel_txt">
                                   
                                    <div class="listing_hd_hotel">
                                        <h2><span>The Hera Hotel Sapanca</span>
                                            <div class="startbx smallstar">
                                                <span>5&nbsp;-&nbsp;</span>
                                                <i class="fa fa-star"></i>
                                                
                                            </div>
                                        </h2>
                                        <ul class="listbt_sml">
                                            <li><a href="#">Cayici Mahallesi, Izmit Cd. No 44, Sapanca, 54600, Sakarya</a></li>
                                           
                                        </ul>

                                        <ul class="iconsml">
                                            <li>
                                                <span><img src="http://24hr.lightmytrip.com/public/images/Pool.png" class="img-res" /></span>
                                                <span>Pool</span>
                                            </li>

                                            <li>
                                                <span><img src="http://24hr.lightmytrip.com/public/images/FreeParking.png" class="img-res" /></span>
                                                <span>Free Parking</span>
                                            </li>

                                            <li>
                                                <span><img src="http://24hr.lightmytrip.com/public/images/Spa.png" class="img-res" /></span>
                                                <span>Spa</span>
                                            </li>

                                            <li>
                                                <span><img src="http://24hr.lightmytrip.com/public/images/Gym.png" class="img-res" /></span>
                                                <span>Gym</span>
                                            </li>

                                            <li>
                                                <span><img src="http://24hr.lightmytrip.com/public/images/Restaurant.png" class="img-res" /></span>
                                                <span>Restaurant</span>
                                            </li>

                                            <li>
                                                <span><img src="http://24hr.lightmytrip.com/public/images/Bar.png" class="img-res" /></span>
                                                <span>Bar</span>
                                            </li>

                                           
                                        </ul>

                                        <div class="green_ex">
                                            <span><i class="fa fa-star"></i>&nbsp;4.77 (48 reviews)</span>
                                        </div>

                                       


                                    </div>

                                </div>

                                <div class="pribtns">
                                    <div class="priceshow">
                                        <h3>₦10,000
                                            <span>per night</span>
                                        </h3>
                                        <p>total ₦30,000 for 3 nights
                                            Tax & fees Inclusive</p>
                                    </div>
                                    <div class="hotslc">
                                        <a href="#">Book Now<i class="fa fa-angle-right ml5"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
                </section>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.airlist').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 3,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        $("#aplybtn").click(function () {
            $(".filterbx").hide();
        });
        $(".mobile-filter>ul>li").click(function () {
            $(".filterbx").show();
        });





        function collision($div1, $div2) {
            var x1 = $div1.offset().left;
            var w1 = 40;
            var r1 = x1 + w1;
            var x2 = $div2.offset().left;
            var w2 = 40;
            var r2 = x2 + w2;

            if (r1 < x2 || x1 > r2)
                return false;
            return true;
        }
        // Fetch Url value 
        var getQueryString = function (parameter) {
            var href = window.location.href;
            var reg = new RegExp('[?&]' + parameter + '=([^&#]*)', 'i');
            var string = reg.exec(href);
            return string ? string[1] : null;
        };
        // End url 
        // // slider call
        $('#slider').slider({
            range: true,
            min: 381614,
            max: 8243008,
            step: 1,
            values: [getQueryString('minval') ? getQueryString('minval') : 0, getQueryString('maxval') ? getQueryString('maxval') : 8243008],

            slide: function (event, ui) {

                $('.ui-slider-handle:eq(0) .price-range-min').html('$' + ui.values[0]);
                $('.ui-slider-handle:eq(1) .price-range-max').html('$' + ui.values[1]);
                $('.price-range-both').html('<i>$' + ui.values[0] + ' - </i>$' + ui.values[1]);

                // get values of min and max
                $("#minval").val(ui.values[0]);
                $("#maxval").val(ui.values[1]);

                if (ui.values[0] == ui.values[1]) {
                    $('.price-range-both i').css('display', 'none');
                } else {
                    $('.price-range-both i').css('display', 'inline');
                }

                if (collision($('.price-range-min'), $('.price-range-max')) == true) {
                    $('.price-range-min, .price-range-max').css('opacity', '0');
                    $('.price-range-both').css('display', 'block');
                } else {
                    $('.price-range-min, .price-range-max').css('opacity', '1');
                    $('.price-range-both').css('display', 'none');
                }

            }
        });

        $('.ui-slider-range').append('<span class="price-range-both value"><i>$' + $('#slider').slider('values', 0) + ' - </i>' + $('#slider').slider('values', 1) + '</span>');

        $('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">$' + $('#slider').slider('values', 0) + '</span>');

        $('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">$' + $('#slider').slider('values', 1) + '</span>');
    });

    $(document).ready(function () {
        $("#cvd_btn").click(function () {
            $(".covid_noty").hide(1000);
        });


        // $('[data-fancybox="preview"]').fancybox({
        // 	thumbs: {
        // 		autoStart: true
        // 	}
        // });

        $('[data-fancybox]').fancybox({
            thumbs: {
                autoStart: true
            }
});

        // I've added annotations to make this easier to follow along at home. Good luck learning and check out my other pens if you found this useful


        // First let's set the colors of our sliders
        const settings = {
            fill: '#399af4',
            background: '#d7dcdf'
        }

        // First find all our sliders
        const sliders = document.querySelectorAll('.range-slider');

        // Iterate through that list of sliders
        // ... this call goes through our array of sliders [slider1,slider2,slider3] and inserts them one-by-one into the code block below with the variable name (slider). We can then access each of wthem by calling slider
        Array.prototype.forEach.call(sliders, (slider) => {
            // Look inside our slider for our input add an event listener
            //   ... the input inside addEventListener() is looking for the input action, we could change it to something like change
            slider.querySelector('input').addEventListener('input', (event) => {
                // 1. apply our value to the span
                slider.querySelector('span').innerHTML = event.target.value;
                // 2. apply our fill to the input
                applyFill(event.target);
            });
            // Don't wait for the listener, apply it now!
            applyFill(slider.querySelector('input'));
        });

        // This function applies the fill to our sliders by using a linear gradient background
        function applyFill(slider) {
            // Let's turn our value into a percentage to figure out how far it is in between the min and max of our input
            const percentage = 100 * (slider.value - slider.min) / (slider.max - slider.min);
            // now we'll create a linear gradient that separates at the above point
            // Our background color will change here
            const bg = `linear-gradient(90deg, ${settings.fill} ${percentage}%, ${settings.background} ${percentage + 0.1}%)`;
            slider.style.background = bg;
        }

    });
</script>

@endsection 