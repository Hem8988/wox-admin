@extends('layouts.frontend')
@section('title', @$seoDetails->meta_title)
@section('meta_title', '')
@section('meta_keyword', '')
@section('meta_description', '')
@section('bodyclass', 'ch single-page page-search')
@section('content')
@section('pagespecificstyles')

@endsection
<?php use App\Http\Controllers\Controller; ?>

<script>
$(document).ready(function(){
$("#fltid").click(function(){
    $("#fltid").click(function(){
    $(".detaildrp").toggleClass("showdp");
  $("#fltid").toggleClass("rtws");
})

});
    </script>
<!--<div class="flight_loader">
<div class="inner_loader">
<h4>Please wait....</h4>
<p><i class="fa fa-spinner" aria-hidden="true"></i> We are looking for the best flight for you.</p>
</div>
</div> -->
<script>
    $(document).ready(function() {

        $('#datepicker2').datepicker({
            numberOfMonths: 2
            , dateFormat: 'dd/mm/yy'
            , minDate: 0
        });
        $('#datepicker1').datepicker({
            numberOfMonths: 2
            , dateFormat: 'dd/mm/yy'
            , minDate: 0
        });
        $('.airlist').slick({
            dots: false
            , infinite: false
            , speed: 300
            , slidesToShow: 6
            , slidesToScroll: 3
            , responsive: [{
                    breakpoint: 1024
                    , settings: {
                        slidesToShow: 3
                        , slidesToScroll: 3
                        , infinite: true
                        , dots: false
                    }
                }
                , {
                    breakpoint: 600
                    , settings: {
                        slidesToShow: 2
                        , slidesToScroll: 2
                    }
                }
                , {
                    breakpoint: 480
                    , settings: {
                        slidesToShow: 1
                        , slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        $("#aplybtn").click(function() {
            $(".filterbx").hide();
        });
        $(".mobile-filter>ul>li").click(function() {
            $(".filterbx").show();
        });
        $('.tktlist li').slice(0, 3).show();




        $('body').on('click', '.lotds', function() {
            var list = $(".tktlist .trip");
            var numToShow = 20;
            var button = $(".lotds");
            var numInList = list.length;
            var showing = list.filter(':visible').length;
            list.slice(showing - 1, showing + numToShow).fadeIn();
            var nowShowing = list.filter(':visible').length;
            if (nowShowing >= numInList) {
                button.hide();
            }
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
        var getQueryString = function(parameter) {
            var href = window.location.href;
            var reg = new RegExp('[?&]' + parameter + '=([^&#]*)', 'i');
            var string = reg.exec(href);
            return string ? string[1] : null;
        };
        @php
        $HIGHESTprices = $flightresult['data'];
        $single = collect($HIGHESTprices)->pluck('price');
        $price = collect($single)->pluck('grandTotal')->max();
        @endphp
        // End url 
        // // slider call
        $('.flightfilter').on('change', function() {
            $('input[type=checkbox]').each(
                function(index, checkbox) {
                    if (index != 0) {
                        checkbox.checked = false;
                    }
                });

            $(this).prop('checked', true);

            var air = $(this).val();
            var url = $(location).attr('href').split("?");
            var price = $(".price-range-max").text().replace("$", "")
            $.ajax({
                url: "{{URL::to('Flight/search')}}?" + url[1] + "&includedAirlineCodes=" + air
                , method: 'GET'
                , success: function(data) {
                    $('#Cheapest').html(data.html)
                    var list = $(".tktlist .trip");
                    var numToShow = 15;
                    var button = $(".lotds");
                    var numInList = list.length;
                    console.log(numInList)
                    list.hide();
                    if (numInList > numToShow) {
                        button.show();
                    }
                    list.slice(0, numToShow).show();
                }
            });

        });

        $('#slider').slider({
            range: true,
            min: 0,
            max: {{$price}},
            step: 1,
            values: [getQueryString('minval') ? getQueryString('minval') : 0, getQueryString('maxval') ? getQueryString('maxval') : 8243008],

            slide: function(event, ui) {

                $('.ui-slider-handle:eq(0) .price-range-min').html('$' + ui.values[0]);
                $('.ui-slider-handle:eq(1) .price-range-max').html('$' + ui.values[1]);
                $('.price-range-both').html('<i>NGN' + ui.values[0] + ' - </i>NGN' + ui.values[1]);

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
            , change: function(e, ui) {
                var url = $(location).attr('href').split("?");
                var price = $(".price-range-max").text().replace("$", "")
                $.ajax({
                    url: "{{URL::to('Flight/search')}}?" + url[1] + "&maxPrice=" + price
                    , method: 'GET'
                    , success: function(data) {
                        $('#Cheapest').html(data.html)
                        var list = $(".tktlist .trip");
                        var numToShow = 15;
                        var button = $(".lotds");
                        var numInList = list.length;
                        console.log(numInList)
                        list.hide();
                        if (numInList > numToShow) {
                            button.show();
                        }
                        list.slice(0, numToShow).show();

                    }
                });
            }
        });

        $('.ui-slider-range').append('<span class="price-range-both value"><i>$' + $('#slider').slider('values', 0) + ' - </i>' + $('#slider').slider('values', 1) + '</span>');

        $('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">$' + $('#slider').slider('values', 0) + '</span>');

        $('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">$' + $('#slider').slider('values', 1) + '</span>');
  
    });

</script>

<style>
    body,
    #full-container {
        background-color: #eaf0f3;
    }

    .list_fliter {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }

    .filterbx {
        background: #fff;
        padding: 15px;
    }

    .filterbx {
        width: 25%;
    }

    .listingbx {
        width: 75%;
        padding-left: 20px;
    }

    .ftr_head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ddd;
        padding: 10px 0 10px 0px;
    }

    .ftr_head>h1 {
        font-size: 18px;
        color: #000;
        margin-bottom: 0;
        font-weight: 500;
    }

    .ftr_head>span {
        display: block;
        color: #5091fb;
        cursor: pointer;
    }




    .filtercnt .panel-heading a {
        display: block;
        position: relative;
        font-weight: bold;
        font-size: 15px;
        padding-bottom: 15px;
    }

    .filtercnt .panel-heading a::after {
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

    .filtercnt .panel-heading a[aria-expanded=true]::after {
        transform: rotate(-135deg);
        top: 6px;
    }

    .filtercnt {
        margin-top: 25px;
    }

    .filtercnt .panel-group .panel {
        border: none;
        box-shadow: none;
        border-bottom: 1px solid #ddd;
        margin-bottom: 20px;
    }

    .filtercnt .panel-default>.panel-heading {
        background-color: initial;
        border: none;
        padding: 0;
        border-radius: inherit;
    }

    .filtercnt .panel-default>.panel-heading+.panel-collapse>.panel-body {
        border: none;
    }

    .filtercnt .panel-heading a:hover {
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
        color: #5091fb;
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
        background: #399af4 !important;
    }

    .rage_price .ui-state-hover,
    .rage_price .ui-widget-content .ui-state-hover,
    .rage_price .ui-widget-header .ui-state-hover,
    .rage_price .ui-state-focus,
    .rage_price .ui-widget-content .ui-state-focus,
    .rage_price .ui-widget-header .ui-state-focus {
        background: #2ecaf9 !important;
    }

    .rage_price .ui-state-default,
    .rage_price .ui-widget-content .ui-state-default,
    .rage_price .ui-widget-header .ui-state-default {
        background: #399af4 !important;
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

    .sliderlist .slick-prev:before {
        left: 8px;
        background: url(../images/arw-l-w.png)no-repeat;
        background-size: contain;
    }

    .sliderlist .slick-next:before {
        right: 7px;
        background: url(../images/arw-r-w.png)no-repeat;
        background-size: contain;
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

    .listnb_rtv {
        position: relative;
        top: -1px;
    }

    /*slider-end*/

    .tabsl_vs {
        margin-top: 30px;
    }

    .tbsort_ls>ul {
        display: flex;
        align-items: center;
        border-bottom: none;

    }

    .tbsort_ls>ul>li>span {
        color: #38393a;
    }

    .tbsort_ls .nav-tabs>li {
        margin-right: 20px;
    }

    .tbsort_ls .nav-tabs>li>a {
        border: none;
        color: #38393a;
        border: 1px solid #fff;
        background: #fff;
        padding: 7px 10px;
        border-radius: 5px;
        width: 167px;
    }

    .tbsort_ls .nav-tabs>li.active>a,
    .tbsort_ls .nav-tabs>li.active>a:focus,
    .tbsort_ls .nav-tabs>li.active>a:hover {
        border: 1px solid #6cb5d1;
        background: #e5f6fe;

    }

    .othlist {
        font-size: 20px;
        color: #6e6e6e;
    }

    .tktlist>li {

        background: #fff;
        border: 1px solid #ddd;


        margin-bottom: 15px;
    }

    .flexlist {
        display: flex;
        justify-content: space-between;
        column-gap: 20px;
        padding: 10px;
    }

    .largehead {
        background: #f5f5f5;
        padding: 10px 10px;
    }

    .largehead>h4 {
        margin-bottom: 0;
        font-size: 13px;
    }

    .largehead>h4>span {
        font-size: 13px;
    }

    .inuot_bx {
        width: 78%;
    }

    .prishow {
        width: 22%;
        border-left: 1px solid #ddd;

    }

    .dflex_js {
        display: flex;
        column-gap: 10px;
        align-items: center;
        justify-content: space-between;
    }

    .tmingtk>ul>li>p {
        margin-bottom: 0;
        color: #000;
        font-weight: 600;
    }

    .tmingtk>ul>li>p>span {
        color: #999999;
    }

    .airnm {
        display: flex;
        align-items: center;
        column-gap: 5px;
        flex-wrap: wrap;
    }

    .airnm>span {
        display: inline-block;
        width: 35px;
        height: 35px;
        border: 1px solid #ddd;
        border-radius: 50px;
        overflow: hidden;
        padding: 4px;
    }

    .airnm>h6 {
        font-size: 13px;
        color: #303030;
        margin-bottom: 0;
        display: block;
        width: 100%;
        margin-top: 5px;
    }

    .blkts {
        display: block;
    }

    .cnts {
        text-align: center;
    }

    .hrst {
        margin: 0;
        border-top: 1px solid #5091fb;
        position: relative;
        width: 100%;
        display: block;
    }

    .hrst::before,
    .hrst::after {
        position: absolute;
        content: '';
        width: 6px;
        height: 6px;
        background: #5091fb;
        border-radius: 50px;
        top: -3px;
    }

    .hrst::before {
        left: 0;
    }

    .hrst::after {
        right: 0;
    }


    .wrapper {
        position: relative;
        margin-left: 10%;
        margin-top: 15%;
    }

    .tooltip:hover span {
        opacity: 1;
        filter: alpha(opacity=100);
        top: -6em;
        left: 20em;
        z-index: 99;
        -webkit-transition: all 0.2s ease;
        -moz-transition: all 0.2s ease;
        -o-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }

    .box b {
        color: #fff;
    }

    .tooltip span {
        background: none repeat scroll 0 0 #222;
        /*-- some basic styling */
        color: #F0B015;
        font-family: 'Helvetica';
        font-size: 0.8em;
        font-weight: normal;
        line-height: 1.5em;
        padding: 16px 15px;
        width: 240px;
        top: -4em;
        /*-- this is the original position of the tooltip when it's hidden */
        left: 20em;
        margin-left: 0;
        /*-- set opacity to 0 otherwise our animations won't work */
        opacity: 0;
        filter: alpha(opacity=0);
        position: absolute;
        text-align: center;
        z-index: 2;
        text-transform: none;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease-in-out;
    }

    .tooltip span:after {
        border-color: #222 rgba(0, 0, 0, 0);
        border-style: solid;
        border-width: 15px 15px 0;
        bottom: -15px;
        content: "";
        display: block;
        left: 31px;
        position: absolute;
        width: 0;
    }

    .taglt {
        font-size: 13px;
        color: #fff;
        display: inline-block;
        padding: 2px 9px;
        border-radius: 3px;
        margin-bottom: 10px;
    }

    .yellow_cl {
        background-color: #f2c94c;
    }

    .blue_cl {
        background-color: #399af4;
    }

    .tooltip1 {
        position: relative;
        display: inline-block;
        border: none;
        opacity: 1;
    }

    .tooltip1 .tooltiptext {
        visibility: hidden;
        width: 200px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 10px 5px;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -100px;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .tooltip1 .tooltiptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    .tooltip1:hover .tooltiptext {
        visibility: visible;
        opacity: 1;
    }

    .tooltiptext>h6 {
        margin: 0;
    }

    .tooltiptext>h6,
    .tooltiptext>h6>strong {
        color: #fff;
        font-size: 14px;
    }

    .tooltiptext>h6>span {
        display: block;
        font-size: 13px;
    }

    .rightbook {
        display: flex;
        column-gap: 20px;
        align-items: center;
        height: 100%;
        background: #eaf0f3;
    }

    .bookb1>span {
        border-left: 2px solid #4e8ef6;
        display: block;
        font-size: 12px;
        background: #ddd;
    }

    .bookb1>span {
        padding: 5px 10px;
    }

    .pysml {
        display: flex;
        column-gap: 10px;
        align-items: center;
    }

    .pysml>h6 {
        font-size: 12px;
        margin-bottom: 0;
    }

    .pysml>h6>span {
        cursor: pointer;
        display: block;
        color: #5091fb;
        font-size: 15px;
        font-weight: bold;
    }

    .pysml>h6>span>i {
        color: #ababab;
    }

    .bookb1,
    .bookb2 {
        width: 50%;
        align-items: center;
    }

    .bookprc {
        text-align: center;
    }

    .bookprc>h5 {
        font-weight: bold;
        font-size: 20px;
        color: #261a72;
    }

    .bookprc .btnvw {
        color: #fff;
        background: #017bc2;
        font-size: 14px;
        padding: 4px 10px;
        width: 100%;
        display: block;
        border-radius: 50px;
        transition: all .5s ease-in-out;
    }

    .bookprc .btnvw:hover {
        background: #0d5178;
        color: #fff;
    }

    .mbs {
        margin-bottom: 10px;
    }

    .prishow {
        position: relative;
    }

    .bookb2 {
        border-left: 1px solid #bfbfbf;
    }

    .tbfare {
        display: flex;
        height: 100%;
        justify-content: center;
        align-items: center;
    }

    .tbfare .nav-tabs {
        background: #fff;
        width: 50%;
    }

    .tbfare .nav-tabs>li>a {
        margin-right: 0;
        font-size: 13px;
        color: #000;
    }

    .tbfare .nav-tabs>li {
        float: initial;
    }

    .tbfare .nav-tabs>li>a,
    .tbfare .nav-tabs {
        border: none;
        border-left: 2px solid #eaf0f3;
    }

    .tbfare .nav-tabs>li.active>a,
    .tbfare .nav-tabs>li.active>a:focus,
    .tbfare .nav-tabs>li.active>a:hover {
        border: none;
        background: #eaf0f3;
        border-left: 2px solid #5091fb
    }

    .tbfare .nav-tabs>li>a:hover {
        background: #eaf0f3;
    }

    .tbfare .tab-content {
        width: 50%;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .faresm1,
    faresm2 {
        text-align: left;
        color: #fff;
    }

    .faresm1 {
        font-size: 14px;
        margin: 10px 0px;
        font-weight: bold;
    }
    .custom_reservation_tab form.form-banner-reservation .onewayadult, .custom_reservation_tab form.form-banner-reservation .onewaychild, .custom_reservation_tab form.form-banner-reservation .onewayinfants {
    padding: 0 10px;
}

    .faresm2>li {
        text-align: left;
        position: relative;
        padding-left: 17px;
        margin-bottom: 5px;
    }

    .faresm2>li>i {
        position: absolute;
        left: 0;
    }

    .loadbtn .lotds {
        width: 100%;
        background: #399af4;
        font-size: 14px;
        padding: 10px 10px;
        height: auto;
        line-height: initial;
        text-transform: uppercase;
        margin-bottom: 30px;
    }

    .modifyhead {
        background: #020180;
    }

    .modifysection {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .mdtxt {
        width: 80%;
    }

    .mdbtn {
        width: 10%;
    }

    .flx_md {
        display: flex;
    }

    .flx_md li {
        border-right: 1px solid #3b3aa9;
        padding: 15px 15px;
    }

    .flx_md li:first-child {
        width: 50%;
    }

    .flx_md li:nth-child(2),
    .flx_md li:nth-child(3) {
        width: 25%;
        text-align: center;
    }

    .flx_md li span {
        color: #fff;
        font-size: 14px;
        font-weight: 600;
    }

    .spcmd {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .spcmd>span {
        width: 40%;
    }

    .spcmd>i {
        width: 17px;
        color: #fff;
    }

    .mdbtn .mod_bt {
        padding: 11px 10px;
        line-height: 0;
        height: auto;
        float: right;
        background: #1312b7;
        font-size: 13px;
        text-transform: uppercase;
        width: 100%;
        border-radius: 50px;
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

    .tbsort_ls {
        border-top: 1px solid #ddd;
        padding-top: 20px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    @media screen and (max-width: 1024px) {

        .mobile-filter,
        .mobileapply_ftr {
            display: block;
        }

        .list_fliter {
            flex-wrap: wrap;
        }

        .filterbx {
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

        .filtercnt {
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

        .filtercnt .panel-group {
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


        .list-unstyleds>li {
            display: flex;
            justify-content: center;
            column-gap: 10px;
        }

        .tbsort_ls .nav-tabs>li {
            margin-right: 10px;
        }

        .tbsort_ls .nav-tabs>li>a,
        .tbsort_ls>ul>li>span {
            font-size: 12px;
        }

        .rightlist>h2,
        .othlist {
            font-size: 15px;
        }

        .header-bar .container .pull-right {
            display: none;
        }

    }

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

    }

</style>
@php $from= explode('-',Request::get('from')) @endphp
@php $to= explode('-',Request::get('to')) @endphp
@php $dpDate = \Carbon\Carbon::createFromFormat('d/m/Y',request()->get('dep'))->format('M d Y') @endphp

@php $px= explode('-',Request::get('px')) @endphp

<script>
    $(document).ready(function() {
        $("#modify_pop").click(function() {
            $(".searchrs").show();
            $(".modifysection").hide();
        });

        $(".closersl").click(function() {
            $(".searchrs").hide();
            $(".modifysection").show();
        });
    });

</script>

<style>
.custom_reservation_tab{background: none; border: none;}
.banner-center-box{margin-top: -37px;}

.radio-container.radio-default {
     color: #fff;
 }

 #banner .custom_reservation_tab .br-tabs li a{background: initial; 
    padding: 10px 10px;
    border-radius: 5px;
}
 .custom_reservation_tab .br-tabs li.active a:after{display: none;}
 .custom_reservation_tab .br-tabs .active a {
     background-color: #fff !important;
     color: #02004e !important;
 }
 .radio-container.radio-default {
    color: #fff;
    text-transform: uppercase;
    font-weight: 500;
}
.custom_reservation_tab .br-tabs li.active a>.radio-container{color: #02004e;}

.radio-container.radio-default .checkmark::after {
   
    background-color: #02004e;
}
.drop_cb{align-items: center;     padding: 5px 10px;
 }
.drop_cb>label{margin-bottom: 0;}
.drop_cb>label>i{color: #fff; }
.drop_cb>select{    background: initial;
    border: none;
    outline: none !important;
    color: #fff;
    height: auto;}
	select option[value=""] {
  background: #000;
}
.flexdps{margin-left: 20px; }

.custom_reservation_tab form.cngbxs_h,.cngbxs_h {
    display: flex;
    justify-content: space-between; 
}
.cngbxs_h1{display: flex;}
.custom_reservation_tab form.form-banner-reservation .cus_loc_field{width: 50%;}
.frm_to,.one_rnd{display: flex;}
.loc_search_field .location_search, .loc_search_field_to .location_search_to, .loc_search_field_one .one_location_search_from, .loc_search_field_one_to .one_location_search_to{width: 100%;}

.custom_reservation_tab form.form-banner-reservation .one_rnd_sng1 .cus_calendar_field{width: 100%;}

.custom_reservation_tab form.form-banner-reservation .cus_calendar_field, .custom_reservation_tab form.form-banner-reservation .cus_passenger_field{width: auto;}
.one_rnd{column-gap: 7px;}

.flexdps {
    position: absolute;
    top: -55px;
    left: 446px; z-index: 1;
}
.page-search .custom_reservation_tab form.form-banner-reservation .form-group>i {
    color: #ddd;
    top: 35px;
}
.searchrs .custom_reservation_tab form.form-banner-reservation .cus_searchbtn_field button {
    padding: 34px 10px;
    border-radius: 5px;
    margin-left: 10px;
}
.page-search .custom_reservation_tab .br-tabs-content button.roundformsearch, .page-search .custom_reservation_tab .br-tabs-content .cus_searchbtn_field button.multiroundformsearch {
    padding: 34px 10px;
    border-radius: 5px;
    margin-left: 10px;
}
.custom_reservation_tab .multiwaytrip .form-banner-reservation .ismultipleway a.closem {
    line-height: 72px;
    margin-left: 10px;
}
    </style>

<div class="searchrs " id="banner" style="display: none;">
<div class="bgblu">
    <span class="closersl">Close x</span>
    <div class="modify-form">
        <div class="banner-center-box">

            <div class="banner-reservation-tabs custom_reservation_tab">
                <ul class="br-tabs">
                    <li class="active onewy" dataway="oneway">
                        <a href="javascript:;">
                            <label class="radio-container radio-default">
                                <input class="roundseatclass" value="1" type="radio" name="radio" checked="checked" id="onewayfromsearch">
                                <span class="checkmark"></span>
                                One way
                            </label>
                        </a>
                    </li>
                    <li class="roundtriptab" dataway="roundtrip"><a href="javascript:;">
                            <label class="radio-container radio-default">
                                <input class="roundseatclass" value="2" type="radio" name="radio" id="onewaytosearch">
                                <span class="checkmark"></span>
                                Round Trip
                            </label>
                        </a></li>
                    <li dataway="multicity"><a href="javascript:;">
                            <label class="radio-container radio-default">
                                <input class="roundseatclass" value="2" type="radio" name="radio">
                                <span class="checkmark"></span>
                                Multi City
                            </label>
                        </a></li>

                </ul><!-- .br-tabs end -->

                <!-- <ul class="award">
            <li><i class="fa fa-stop"></i></li>
            <li>Award ticket</li>
            
            <li>-</li>
            
            <li>Buy a ticket with Miles</li>
           </ul> -->

                <ul class="br-tabs-content" style="height: 100%;">
                    <li class="roundandoneway commonway active" style="display: list-item;">
                        <div class="ismultipleway">
                            <form action="http://24hr.lightmytrip.com/FlightList/index" class="cngbxs_h form-banner-reservation form-inline style-2 form-h-50">
                               
                               <div class="frm_to">
                                <div class="form-group loc_search_field cus_loc_field">
                                    <i class="fas fa-plane rtate"></i>
                                    <span>From</span>
                                    <input type="hidden" id="roundfromsearch" value="{{request()->get('from')}}">
                                    <input type="hidden" id="journey_type" value="1">
                                    <input style="cursor: text;" autocomplete="off" value="{{$from[1]}}({{$from[0]}})" type="text" name="roundwayfrmtext" id="fromdest_show" class="roundwayfrom form-control wrapper-dropdown-2 add" placeholder="">


                                    <div class="location_search selhide" id="location_search" style="display: none;">
                                        <div class="inner_loc_search">
                                            <div class="top_city">
                                                <span>Top Cities</span>
                                            </div>
                                            <ul class="is_search_from_val">
                                                <li roundwayfromtop="DEL-Delhi-India" roundwayfrom="Delhi(DEL)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Delhi (DEL)</div>
                                                    <div class="airport_name">Indira Gandhi
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="BLR-Bangalore-India" roundwayfrom="Bangalore(BLR)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangalore (BLR)</div>
                                                    <div class="airport_name">Bengaluru Intl<span>India</span>
                                                    </div>
                                                </li>
                                                <li roundwayfromtop="BOM-Mumbai-India" roundwayfrom="Mumbai(BOM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Mumbai (BOM)</div>
                                                    <div class="airport_name">Mumbai<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="CCU-Kolkata-India" roundwayfrom="Kolkata(CCU)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kolkata (CCU)</div>
                                                    <div class="airport_name">Calcutta<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="GOI-Goa-India" roundwayfrom="Goa(GOI)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Goa (GOI)</div>
                                                    <div class="airport_name">Dabolim<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="HYD-Hyderabad-India" roundwayfrom="Hyderabad(HYD)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Hyderabad (HYD)</div>
                                                    <div class="airport_name">Shamsabad International
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="MAA-Chennai-India" roundwayfrom="Chennai(MAA)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Chennai (MAA)</div>
                                                    <div class="airport_name">Chennai<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="SIN-Singapore-Singapore" roundwayfrom="Singapore(SIN)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Singapore (SIN)</div>
                                                    <div class="airport_name">Changi<span>Singapore</span>
                                                    </div>
                                                </li>
                                                <li roundwayfromtop="DXB-Dubai-United Arab Emirates" roundwayfrom="Dubai(DXB)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Dubai (DXB)</div>
                                                    <div class="airport_name">Dubai<span>United Arab
                                                            Emirates</span></div>
                                                </li>
                                                <li roundwayfromtop="BKK-Bangkok-Thailand" roundwayfrom="Bangkok(BKK)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangkok (BKK)</div>
                                                    <div class="airport_name">Bangkok
                                                        Int'l<span>Thailand</span></div>
                                                </li>
                                                <li roundwayfromtop="KTM-Kathmandu-Nepal" roundwayfrom="Kathmandu(KTM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kathmandu (KTM)</div>
                                                    <div class="airport_name">Tribhuvan<span>Nepal</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="swap" onclick="SwapRoundDestination();" class="swipe">
                                    </div>
                                </div><!-- .form-group end -->
                                <div class="form-group loc_search_field_to cus_loc_field">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <input type="hidden" id="roundtosearch" value="{{request()->get('to')}}">
                                    <span>To</span>
                                    <input style="cursor: text;" autocomplete="off" value="{{$to[1]}}({{$to[0]}})" type="text" name="roundwaytotext" id="todest_show" class="roundwayto form-control wrapper-dropdown-3 add" placeholder="To">

                                    <p>Intanbul (All)</p>
                                    <div class="location_search_to selhide" id="location_search_to" style="display: none;">
                                        <div class="inner_loc_search">
                                            <div class="top_city">
                                                <span>Top Cities</span>
                                            </div>
                                            <ul class="is_search_to_val">
                                                <li roundwaytotop="DEL-Delhi-India" roundwayto="Delhi(DEL)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Delhi (DEL)</div>
                                                    <div class="airport_name">Indira Gandhi
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="BLR-Bangalore-India" roundwayto="Bangalore(BLR)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangalore (BLR)</div>
                                                    <div class="airport_name">Bengaluru
                                                        Intl<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="BOM-Mumbai-India" roundwayto="Mumbai(BOM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Mumbai (BOM)</div>
                                                    <div class="airport_name">Mumbai<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="CCU-Kolkata-India" roundwayto="Kolkata(CCU)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kolkata (CCU)</div>
                                                    <div class="airport_name">Calcutta<span>India</span>
                                                    </div>
                                                </li>
                                                <li roundwaytotop="GOI-Goa-India" roundwayto="Goa(GOI)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Goa (GOI)</div>
                                                    <div class="airport_name">Dabolim<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="HYD-Hyderabad-India" roundwayto="Hyderabad(HYD)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Hyderabad (HYD)</div>
                                                    <div class="airport_name">Shamsabad International
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="MAA-Chennai-India" roundwayto="Chennai(MAA)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Chennai (MAA)</div>
                                                    <div class="airport_name">Chennai<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="SIN-Singapore-Singapore" roundwayto="Singapore(SIN)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Singapore (SIN)</div>
                                                    <div class="airport_name">Changi<span>Singapore</span>
                                                    </div>
                                                </li>
                                                <li roundwaytotop="DXB-Dubai-United Arab Emirates" roundwayto="Dubai(DXB)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Dubai (DXB)</div>
                                                    <div class="airport_name">Dubai<span>United Arab
                                                            Emirates</span></div>
                                                </li>
                                                <li roundwaytotop="BKK-Bangkok-Thailand" roundwayto="Bangkok(BKK)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangkok (BKK)</div>
                                                    <div class="airport_name">Bangkok
                                                        Int'l<span>Thailand</span></div>
                                                </li>
                                                <li roundwaytotop="KTM-Kathmandu-Nepal" roundwayto="Kathmandu(KTM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kathmandu (KTM)</div>
                                                    <div class="airport_name">Tribhuvan<span>Nepal</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .form-group end -->
                                </div>
<div class="one_rnd">
                                <div class="form-group hideifmulticity cus_calendar_field CLI " id="onetp">
                                    <span class="pl10">DEPARTURE</span>
                                    <input autocomplete="off" type="text" id="datepicker1" value="{{request()->get('dep')}}" class="form-control htl " placeholder="2019/09/30">

                                    <i class="far fa-calendar add"></i>
                                </div><!-- .form-group end -->
                                <div id="round-trip-date" style="@if(request()->has('to'))display:none @else display:block @endif">
                                    {{-- <div class="form-group hideifmulticity cus_calendar_field CLI " id="oneroundtp">
                                                <span class="pl10">RETURN</span>
                                                <p class="rtps">Tap to add a return date for bigger discounts</p>
                                                <i class="far fa-calendar add"></i>
                                            </div> --}}


                                    <div class="form-group hideifmulticity cus_calendar_field CLI " id="roundtp">
                                        <span class="pl10">RETURN</span>
                                        <input autocomplete="off" type="text" id="datepicker2" value="{{request()->get('ret')}}" class="form-control htl " placeholder="2019/09/30">

                                        <i class="far fa-calendar add"></i>
                                    </div>
                                </div>
                                </div>


                                <!-- .form-group end -->

                                <div class="form-group roundtrip cus_passenger_field CLI" style="display:none">
                                    <span>Cabin</span>
                                    <input autocomplete="off" type="text" id="roundpessanger" name="brPassengerNumber" class="form-control htlnew show-dropdown-passengers roundpessanger" placeholder="Eco" value="{{ ($px[0] + $px[1] +$px[2])}} {{request()->get('cbn')}}">
                                    <i class="fas fa-user add"></i>
                                    <p>Class</p>

                                    <ul class="list-dropdown-passengers">
                                        <li>
                                            <h5 class="cb_sc">Cabin and passenger selection</h5>
                                        </li>
                                        <li>
                                            <ul class="radio_gdn">
                                                <li>
                                                    <input type="radio" class="roundseatclass" @if(request()->get('cbn') == 'Economy') checked @endif id="Economy" name="cls" value="Economy">
                                                    &nbsp; <label for="Economy">Economy</label>
                                                </li>
                                                <li> <input type="radio" class="roundseatclass" @if(request()->get('cbn') == 'Premium economy') checked @endif id="Premiumeconomy" name="cls" value="Premium economy">
                                                    &nbsp; <label for="Premiumeconomy">Premium economy</label>
                                                </li>

                                                <li> <input type="radio" class="roundseatclass" @if(request()->get('cbn') == 'Business') checked @endif id="Business" name="cls" value="Business">
                                                    &nbsp; <label for="Business">Business&nbsp;</label></li>

                                                <li> <input type="radio" class="roundseatclass" @if(request()->get('cbn') == 'First class') checked @endif id="Firstclass" name="cls" value="First class">
                                                    &nbsp; <label for="Firstclass">First class</label></li>
                                            </ul>


                                        </li>
                                        <li>
                                            <ul class="list-persons-count">
                                                <li>
                                                    <span>Adults:</span>
                                                    <div class="counter-add-item">
                                                        <a class="decrease-btn" href="javascript:;">-</a>
                                                        <input id="roundadult" class="onewayadult" type="text" value="{{$px[0]}}">
                                                        <a class="increase-btn" href="javascript:;">+</a>
                                                    </div><!-- .counter-add-item end -->
                                                </li>
                                                <li>
                                                    <span>Childs:</span>
                                                    <div class="counter-add-item">
                                                        <a class="decrease-btn" href="javascript:;">-</a>
                                                        <input id="roundchild" class="onewaychild" type="text" value="{{$px[1]}}">
                                                        <a class="increase-btn" href="javascript:;">+</a>
                                                    </div><!-- .counter-add-item end -->
                                                </li>
                                                <li>
                                                    <span>Infants:</span>
                                                    <div class="counter-add-item">
                                                        <a class="decrease-btn" href="javascript:;">-</a>
                                                        <input id="roundinfant" class="onewayinfants" type="text" value="{{$px[2]}}">
                                                        <a class="increase-btn" href="javascript:;">+</a>
                                                    </div><!-- .counter-add-item end -->
                                                </li>
                                            </ul><!-- .list-persons-count end -->
                                        </li>
                                        <li>
                                            <a class="btn-reservation-passengers btn x-small colorful hover-dark" href="javascript:;">Done</a>
                                        </li>
                                    </ul><!-- .list-dropdown-passengers end -->
                                </div><!-- .form-group end -->
                                <div class="flexdps d_flex">

<div class="drop_cb d-flex">
  
    <div class=" roundtrip  CLI droppasng" >
                                            
    <label><i class="fa fa-user"></i></label>  
    <input autocomplete="off" type="text" id="roundpessanger" name="brPassengerNumber" class="show-dropdown-passengers roundpessanger" placeholder="Passenger" value="1 Passenger">
<span class="draws"><i class="fa fa-angle-down"></i></span>
                       
                                           

                                            <ul class="list-dropdown-passengers">
                                              
                                              
                                                <li>
                                                    <ul class="list-persons-count">
                                                        <li>
                                                            <span>Adults:</span>
                                                            <div class="counter-add-item">
                                                                <a class="decrease-btn" href="javascript:;">-</a>
                                                                <input id="roundadult" class="onewayadult" type="text" value="1">
                                                                <a class="increase-btn" href="javascript:;">+</a>
                                                            </div><!-- .counter-add-item end -->
                                                        </li>
                                                        <li>
                                                            <span>Childs:</span>
                                                            <div class="counter-add-item">
                                                                <a class="decrease-btn" href="javascript:;">-</a>
                                                                <input id="roundchild" class="onewaychild" type="text" value="0">
                                                                <a class="increase-btn" href="javascript:;">+</a>
                                                            </div><!-- .counter-add-item end -->
                                                        </li>
                                                        <li>
                                                            <span>Infants:</span>
                                                            <div class="counter-add-item">
                                                                <a class="decrease-btn" href="javascript:;">-</a>
                                                                <input id="roundinfant" class="onewayinfants" type="text" value="0">
                                                                <a class="increase-btn" href="javascript:;">+</a>
                                                            </div><!-- .counter-add-item end -->
                                                        </li>
                                                    </ul><!-- .list-persons-count end -->
                                                </li>
                                                <li>
                                                    <a href="javascript:;" class="clckbx_sw">Cancel</a>
                                                    <a class="btn-reservation-passengers btn x-small colorful hover-dark" href="javascript:;">Done</a>
                                                </li>
                                            </ul><!-- .list-dropdown-passengers end -->
                                        </div>
</div>

<div class="drop_cb d-flex">

    <select>
    <option value="">Select Cabin</option>
        <option value="">Economy</option>
        <option value="">Premium economy</option>
        <option value="">Business </option>
        <option value="">First class</option>

    </select>
</div>

</div>
                                <div class="form-group cus_searchbtn_field">
                                    <button type="button" class="form-control roundformsearch icon"><i class="fas fa-search"></i>&nbsp;Search</button>
                                </div><!-- .form-group end -->
                                <a style="display:none;" class="if_multicity_trip btn-multiple-destinations btn x-small colorful hover-dark" href="javascript:;">
                                    <i class="fas fa-plus"></i>
                                    Add City
                                </a>
                                <div class="clearfix"></div>
                            </form><!-- .form-banner-reservation end -->
                        </div>
                    </li>


                    <li class="multiwaytrip commonway" style="display: none;">
                        <form action="http://24hr.lightmytrip.com/FlightList/index" class="form-banner-reservation form-inline style-2 form-h-50">
                            <div class="ismultipleway" id="section-s1">
                                <div class="cngbxs_h">
                                    <div class="frm_to ">
                                <div class="form-group loc_search_field cus_loc_field">
                                    <i class="fas fa-plane rtate"></i>
                                    <span>From</span>
                                    <input type="hidden" id="multi_roundfromsearch1">
                                    <input type="hidden" id="journey_type" value="3">
                                    <input did="s1" ssid="1" style="cursor: text;" autocomplete="off" type="text" name="multiwayfromtext1" id="fromdest_show1" class="multi_roundwayfrom form-control wrapper-dropdown-7 add" placeholder="From">
                                    <p>Intanbul (All)</p>
                                    <div class="location_search selhide" id="location_search" style="display: none;">
                                        <div class="inner_loc_search">
                                            <div class="top_city">
                                                <span>Top Cities</span>
                                            </div>
                                            <ul class="multi_is_search_from_val">
                                                <li roundwayfromtop="DEL-Delhi-India" roundwayfrom="Delhi(DEL)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Delhi (DEL)</div>
                                                    <div class="airport_name">Indira Gandhi
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="BLR-Bangalore-India" roundwayfrom="Bangalore(BLR)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangalore (BLR)</div>
                                                    <div class="airport_name">Bengaluru
                                                        Intl<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="BOM-Mumbai-India" roundwayfrom="Mumbai(BOM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Mumbai (BOM)</div>
                                                    <div class="airport_name">Mumbai<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="CCU-Kolkata-India" roundwayfrom="Kolkata(CCU)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kolkata (CCU)</div>
                                                    <div class="airport_name">Calcutta<span>India</span>
                                                    </div>
                                                </li>
                                                <li roundwayfromtop="GOI-Goa-India" roundwayfrom="Goa(GOI)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Goa (GOI)</div>
                                                    <div class="airport_name">Dabolim<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="HYD-Hyderabad-India" roundwayfrom="Hyderabad(HYD)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Hyderabad (HYD)</div>
                                                    <div class="airport_name">Shamsabad International
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="MAA-Chennai-India" roundwayfrom="Chennai(MAA)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Chennai (MAA)</div>
                                                    <div class="airport_name">Chennai<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="SIN-Singapore-Singapore" roundwayfrom="Singapore(SIN)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Singapore (SIN)</div>
                                                    <div class="airport_name">Changi<span>Singapore</span>
                                                    </div>
                                                </li>
                                                <li roundwayfromtop="DXB-Dubai-United Arab Emirates" roundwayfrom="Dubai(DXB)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Dubai (DXB)</div>
                                                    <div class="airport_name">Dubai<span>United Arab
                                                            Emirates</span></div>
                                                </li>
                                                <li roundwayfromtop="BKK-Bangkok-Thailand" roundwayfrom="Bangkok(BKK)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangkok (BKK)</div>
                                                    <div class="airport_name">Bangkok
                                                        Int'l<span>Thailand</span></div>
                                                </li>
                                                <li roundwayfromtop="KTM-Kathmandu-Nepal" roundwayfrom="Kathmandu(KTM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kathmandu (KTM)</div>
                                                    <div class="airport_name">Tribhuvan<span>Nepal</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div><!-- .form-group end -->
                                <div class="form-group loc_search_field_to cus_loc_field">
                                    <input type="hidden" id="multi_roundtosearch1">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>To</span>
                                    <input did="s1" ssid="1" style="cursor: text;" autocomplete="off" type="text" name="multiwaytotext1" id="todest_show1" class="multi_roundwayto form-control wrapper-dropdown-8 add" placeholder="To">
                                    <p>Intanbul (All)</p>
                                    <div class="location_search_to selhide" id="location_search_to" style="display: none;">
                                        <div class="inner_loc_search">
                                            <div class="top_city">
                                                <span>Top Cities</span>
                                            </div>
                                            <ul class="multi_is_search_to_val">
                                                <li roundwaytotop="DEL-Delhi-India" roundwayto="Delhi(DEL)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Delhi (DEL)</div>
                                                    <div class="airport_name">Indira Gandhi
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="BLR-Bangalore-India" roundwayto="Bangalore(BLR)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangalore (BLR)</div>
                                                    <div class="airport_name">Bengaluru
                                                        Intl<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="BOM-Mumbai-India" roundwayto="Mumbai(BOM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Mumbai (BOM)</div>
                                                    <div class="airport_name">Mumbai<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="CCU-Kolkata-India" roundwayto="Kolkata(CCU)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kolkata (CCU)</div>
                                                    <div class="airport_name">Calcutta<span>India</span>
                                                    </div>
                                                </li>
                                                <li roundwaytotop="GOI-Goa-India" roundwayto="Goa(GOI)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Goa (GOI)</div>
                                                    <div class="airport_name">Dabolim<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="HYD-Hyderabad-India" roundwayto="Hyderabad(HYD)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Hyderabad (HYD)</div>
                                                    <div class="airport_name">Shamsabad International
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="MAA-Chennai-India" roundwayto="Chennai(MAA)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Chennai (MAA)</div>
                                                    <div class="airport_name">Chennai<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="SIN-Singapore-Singapore" roundwayto="Singapore(SIN)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Singapore (SIN)</div>
                                                    <div class="airport_name">Changi<span>Singapore</span>
                                                    </div>
                                                </li>
                                                <li roundwaytotop="DXB-Dubai-United Arab Emirates" roundwayto="Dubai(DXB)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Dubai (DXB)</div>
                                                    <div class="airport_name">Dubai<span>United Arab
                                                            Emirates</span></div>
                                                </li>
                                                <li roundwaytotop="BKK-Bangkok-Thailand" roundwayto="Bangkok(BKK)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangkok (BKK)</div>
                                                    <div class="airport_name">Bangkok
                                                        Int'l<span>Thailand</span></div>
                                                </li>
                                                <li roundwaytotop="KTM-Kathmandu-Nepal" roundwayto="Kathmandu(KTM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kathmandu (KTM)</div>
                                                    <div class="airport_name">Tribhuvan<span>Nepal</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .form-group end -->
                                </div>
                                <div class="one_rnd_sng">
                                <div class="form-group cus_calendar_field">
                                <span class="pl10">Date</span>
                                    <input autocomplete="off" type="text" name="brTimeStart" value="" class="form-control htl" placeholder="2019/09/30">
                                    <i class="far fa-calendar add"></i>
                                </div><!-- .form-group end -->
                                </div>
                                <div class="form-group multiroundtrip cus_passenger_field CLI" style="display: none;">
                                    <span>Cabin</span>
                                    <input autocomplete="off" type="text" id="multiroundpessanger" name="multibrPassengerNumber" class="form-control htlnew show-dropdown-passengers roundpessanger" value="1 Eco" placeholder="Passengers">
                                    <i class="fas fa-user add"></i>
                                    <p>Class</p>
                                    <ul class="list-dropdown-passengers">
                                        <li>
                                            <h5 class="cb_sc">Cabin and passenger selection</h5>
                                        </li>
                                        <li>
                                            <ul class="radio_gdn">
                                                <li>
                                                    <input type="radio" id="Economy" name="cls" value="Male">
                                                    &nbsp; <label for="Economy">Economy</label>
                                                </li>
                                                <li> <input type="radio" id="Premiumeconomy" name="cls" value="Premium economy">
                                                    &nbsp; <label for="Premiumeconomy">Premium economy</label>
                                                </li>

                                                <li> <input type="radio" id="Business" name="cls" value="Business">
                                                    &nbsp; <label for="Business">Business&nbsp;</label></li>

                                                <li> <input type="radio" id="Firstclass" name="cls" value="First class">
                                                    &nbsp; <label for="Firstclass">First class</label></li>
                                            </ul>


                                        </li>
                                        <li>
                                            <ul class="list-persons-count">
                                                <li>
                                                    <span>Adults:</span>
                                                    <div class="counter-add-item">
                                                        <a class="multidecrease-btn" href="javascript:;">-</a>
                                                        <input id="multiroundadult" class="multionewayadult" type="text" value="1">
                                                        <a class="multiincrease-btn" href="javascript:;">+</a>
                                                    </div><!-- .counter-add-item end -->
                                                </li>
                                                <li>
                                                    <span>Childs:</span>
                                                    <div class="counter-add-item">
                                                        <a class="multidecrease-btn" href="javascript:;">-</a>
                                                        <input id="multiroundchild" class="multionewaychild" type="text" value="0">
                                                        <a class="multiincrease-btn" href="javascript:;">+</a>
                                                    </div><!-- .counter-add-item end -->
                                                </li>
                                                <li>
                                                    <span>Infants:</span>
                                                    <div class="counter-add-item">
                                                        <a class="multidecrease-btn" href="javascript:;">-</a>
                                                        <input id="multiroundinfant" class="multionewayinfants" type="text" value="0">
                                                        <a class="multiincrease-btn" href="javascript:;">+</a>
                                                    </div><!-- .counter-add-item end -->
                                                </li>
                                            </ul><!-- .list-persons-count end -->
                                        </li>
                                        <li>
                                            <a class="btn-reservation-passengers btn x-small colorful hover-dark" href="javascript:;">Done</a>
                                        </li>
                                    </ul><!-- .list-dropdown-passengers end -->
                                </div><!-- .form-group end -->

                                <div class="flexdps d_flex">

<div class="drop_cb d-flex">
    <label><i class="fa fa-user"></i></label>
    <select>
        <option value="">1</option>
        <option value="">2</option>
        <option value="">3</option>
        <option value="">4</option>
        <option value="">5</option>
    </select>
</div>

<div class="drop_cb d-flex">

    <select>
        <option value="">Economy</option>
        <option value="">Premium economy</option>
        <option value="">Business </option>
        <option value="">First class</option>

    </select>
</div>

</div>

                                <div class="form-group cus_searchbtn_field">
                                    <button type="button" class="form-control multiroundformsearch icon roundformsearch " onclick="ValidateMuticity()"><i class="fas fa-search"></i>&nbsp;Search</button>
                                </div><!-- .form-group end -->
                                <a id="crs1" onclick="CloseSection('section-s1','')" class="closem" style="display:none;" href="javascript:;">
                                    <i class="fas fa-times"></i>

                                </a>
                                <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ismultipleway" id="section-s2">
                                <div class="cngbxs_h1">
                                    <div class="frm_to ">
                                <div class="form-group loc_search_field cus_loc_field">
                                    <i class="fas fa-plane rtate"></i>
                                    <span>From</span>
                                    <input type="hidden" id="multi_roundfromsearch2">

                                    <input did="s2" ssid="2" style="cursor: text;" autocomplete="off" type="text" name="multiwayfromtext2" id="fromdest_show2" class="multi_roundwayfrom form-control wrapper-dropdown-8 add" placeholder="From">
                                    <p>Intanbul (All)</p>
                                    <div class="location_search selhide" id="location_search" style="display: none;">
                                        <div class="inner_loc_search">
                                            <div class="top_city">
                                                <span>Top Cities</span>
                                            </div>
                                            <ul class="multi_is_search_from_val">
                                                <li roundwayfromtop="DEL-Delhi-India" roundwayfrom="Delhi(DEL)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Delhi (DEL)</div>
                                                    <div class="airport_name">Indira Gandhi
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="BLR-Bangalore-India" roundwayfrom="Bangalore(BLR)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangalore (BLR)</div>
                                                    <div class="airport_name">Bengaluru
                                                        Intl<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="BOM-Mumbai-India" roundwayfrom="Mumbai(BOM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Mumbai (BOM)</div>
                                                    <div class="airport_name">Mumbai<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="CCU-Kolkata-India" roundwayfrom="Kolkata(CCU)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kolkata (CCU)</div>
                                                    <div class="airport_name">Calcutta<span>India</span>
                                                    </div>
                                                </li>
                                                <li roundwayfromtop="GOI-Goa-India" roundwayfrom="Goa(GOI)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Goa (GOI)</div>
                                                    <div class="airport_name">Dabolim<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="HYD-Hyderabad-India" roundwayfrom="Hyderabad(HYD)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Hyderabad (HYD)</div>
                                                    <div class="airport_name">Shamsabad International
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="MAA-Chennai-India" roundwayfrom="Chennai(MAA)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Chennai (MAA)</div>
                                                    <div class="airport_name">Chennai<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="SIN-Singapore-Singapore" roundwayfrom="Singapore(SIN)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Singapore (SIN)</div>
                                                    <div class="airport_name">Changi<span>Singapore</span>
                                                    </div>
                                                </li>
                                                <li roundwayfromtop="DXB-Dubai-United Arab Emirates" roundwayfrom="Dubai(DXB)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Dubai (DXB)</div>
                                                    <div class="airport_name">Dubai<span>United Arab
                                                            Emirates</span></div>
                                                </li>
                                                <li roundwayfromtop="BKK-Bangkok-Thailand" roundwayfrom="Bangkok(BKK)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangkok (BKK)</div>
                                                    <div class="airport_name">Bangkok
                                                        Int'l<span>Thailand</span></div>
                                                </li>
                                                <li roundwayfromtop="KTM-Kathmandu-Nepal" roundwayfrom="Kathmandu(KTM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kathmandu (KTM)</div>
                                                    <div class="airport_name">Tribhuvan<span>Nepal</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="swap" onclick="SwapRoundDestination();" class="swipe">
                                    </div>
                                </div><!-- .form-group end -->
                                <div class="form-group loc_search_field_to cus_loc_field">
                                    <input type="hidden" id="multi_roundtosearch2">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>To</span>
                                    <input did="s2" ssid="2" style="cursor: text;" autocomplete="off" type="text" name="multiwaytotext2" id="todest_show2" class="multi_roundwayto form-control wrapper-dropdown-9 add" placeholder="To">
                                    <p>Intanbul (All)</p>
                                    <div class="location_search_to selhide" id="location_search_to" style="display: none;">
                                        <div class="inner_loc_search">
                                            <div class="top_city">
                                                <span>Top Cities</span>
                                            </div>
                                            <ul class="multi_is_search_to_val">
                                                <li roundwaytotop="DEL-Delhi-India" roundwayto="Delhi(DEL)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Delhi (DEL)</div>
                                                    <div class="airport_name">Indira Gandhi
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="BLR-Bangalore-India" roundwayto="Bangalore(BLR)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangalore (BLR)</div>
                                                    <div class="airport_name">Bengaluru
                                                        Intl<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="BOM-Mumbai-India" roundwayto="Mumbai(BOM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Mumbai (BOM)</div>
                                                    <div class="airport_name">Mumbai<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="CCU-Kolkata-India" roundwayto="Kolkata(CCU)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kolkata (CCU)</div>
                                                    <div class="airport_name">Calcutta<span>India</span>
                                                    </div>
                                                </li>
                                                <li roundwaytotop="GOI-Goa-India" roundwayto="Goa(GOI)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Goa (GOI)</div>
                                                    <div class="airport_name">Dabolim<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="HYD-Hyderabad-India" roundwayto="Hyderabad(HYD)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Hyderabad (HYD)</div>
                                                    <div class="airport_name">Shamsabad International
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="MAA-Chennai-India" roundwayto="Chennai(MAA)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Chennai (MAA)</div>
                                                    <div class="airport_name">Chennai<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="SIN-Singapore-Singapore" roundwayto="Singapore(SIN)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Singapore (SIN)</div>
                                                    <div class="airport_name">Changi<span>Singapore</span>
                                                    </div>
                                                </li>
                                                <li roundwaytotop="DXB-Dubai-United Arab Emirates" roundwayto="Dubai(DXB)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Dubai (DXB)</div>
                                                    <div class="airport_name">Dubai<span>United Arab
                                                            Emirates</span></div>
                                                </li>
                                                <li roundwaytotop="BKK-Bangkok-Thailand" roundwayto="Bangkok(BKK)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangkok (BKK)</div>
                                                    <div class="airport_name">Bangkok
                                                        Int'l<span>Thailand</span></div>
                                                </li>
                                                <li roundwaytotop="KTM-Kathmandu-Nepal" roundwayto="Kathmandu(KTM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kathmandu (KTM)</div>
                                                    <div class="airport_name">Tribhuvan<span>Nepal</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .form-group end -->
                                </div>
                                <div class="one_rnd_sng1">
                                <div class="form-group cus_calendar_field">
                                <span class="pl10">Date</span>
                                    <input autocomplete="off" type="text" name="brTimeStart" value="" class="form-control htl" placeholder="2019/09/30">
                                    <i class="far fa-calendar add"></i>
                                </div><!-- .form-group end -->
                                </div>
                                <a id="crs2" onclick="CloseSection('section-s2','')" class="closem" style="display:none;" href="javascript:;">
                                    <i class="fas fa-times"></i>

                                </a>

                                <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ismultipleway" id="section-s3" style="display:none;">
                            <div class="cngbxs_h1">
                                <div class="frm_to ">
                                <div class="form-group loc_search_field cus_loc_field">
                                    <i class="fas fa-plane rtate"></i>
                                    <span>From</span>
                                    <input type="hidden" id="multi_roundfromsearch3">

                                    <input did="s3" ssid="3" style="cursor: text;" autocomplete="off" type="text" name="multiwayfromtext3" id="fromdest_show3" class="multi_roundwayfrom form-control wrapper-dropdown-10 add" placeholder="From">
                                    <p>Intanbul (All)</p>
                                    <div class="location_search selhide" id="location_search" style="display: none;">
                                        <div class="inner_loc_search">
                                            <div class="top_city">
                                                <span>Top Cities</span>
                                            </div>
                                            <ul class="multi_is_search_from_val">
                                                <li roundwayfromtop="DEL-Delhi-India" roundwayfrom="Delhi(DEL)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Delhi (DEL)</div>
                                                    <div class="airport_name">Indira Gandhi
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="BLR-Bangalore-India" roundwayfrom="Bangalore(BLR)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangalore (BLR)</div>
                                                    <div class="airport_name">Bengaluru
                                                        Intl<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="BOM-Mumbai-India" roundwayfrom="Mumbai(BOM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Mumbai (BOM)</div>
                                                    <div class="airport_name">Mumbai<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="CCU-Kolkata-India" roundwayfrom="Kolkata(CCU)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kolkata (CCU)</div>
                                                    <div class="airport_name">Calcutta<span>India</span>
                                                    </div>
                                                </li>
                                                <li roundwayfromtop="GOI-Goa-India" roundwayfrom="Goa(GOI)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Goa (GOI)</div>
                                                    <div class="airport_name">Dabolim<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="HYD-Hyderabad-India" roundwayfrom="Hyderabad(HYD)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Hyderabad (HYD)</div>
                                                    <div class="airport_name">Shamsabad International
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="MAA-Chennai-India" roundwayfrom="Chennai(MAA)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Chennai (MAA)</div>
                                                    <div class="airport_name">Chennai<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="SIN-Singapore-Singapore" roundwayfrom="Singapore(SIN)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Singapore (SIN)</div>
                                                    <div class="airport_name">Changi<span>Singapore</span>
                                                    </div>
                                                </li>
                                                <li roundwayfromtop="DXB-Dubai-United Arab Emirates" roundwayfrom="Dubai(DXB)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Dubai (DXB)</div>
                                                    <div class="airport_name">Dubai<span>United Arab
                                                            Emirates</span></div>
                                                </li>
                                                <li roundwayfromtop="BKK-Bangkok-Thailand" roundwayfrom="Bangkok(BKK)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangkok (BKK)</div>
                                                    <div class="airport_name">Bangkok
                                                        Int'l<span>Thailand</span></div>
                                                </li>
                                                <li roundwayfromtop="KTM-Kathmandu-Nepal" roundwayfrom="Kathmandu(KTM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kathmandu (KTM)</div>
                                                    <div class="airport_name">Tribhuvan<span>Nepal</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="swap" onclick="SwapRoundDestination();" class="swipe">
                                    </div>
                                </div><!-- .form-group end -->
                                <div class="form-group loc_search_field_to cus_loc_field">
                                    <input type="hidden" id="multi_roundtosearch3">
                                    <span>To</span>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <input did="s3" ssid="3" style="cursor: text;" autocomplete="off" type="text" name="multiwaytotext3" id="todest_show3" class="multi_roundwayto form-control wrapper-dropdown-11 add" placeholder="To">
                                    <p>Intanbul (All)</p>
                                    <div class="location_search_to selhide" id="location_search_to" style="display: none;">
                                        <div class="inner_loc_search">
                                            <div class="top_city">
                                                <span>Top Cities</span>
                                            </div>
                                            <ul class="multi_is_search_to_val">
                                                <li roundwaytotop="DEL-Delhi-India" roundwayto="Delhi(DEL)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Delhi (DEL)</div>
                                                    <div class="airport_name">Indira Gandhi
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="BLR-Bangalore-India" roundwayto="Bangalore(BLR)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangalore (BLR)</div>
                                                    <div class="airport_name">Bengaluru
                                                        Intl<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="BOM-Mumbai-India" roundwayto="Mumbai(BOM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Mumbai (BOM)</div>
                                                    <div class="airport_name">Mumbai<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="CCU-Kolkata-India" roundwayto="Kolkata(CCU)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kolkata (CCU)</div>
                                                    <div class="airport_name">Calcutta<span>India</span>
                                                    </div>
                                                </li>
                                                <li roundwaytotop="GOI-Goa-India" roundwayto="Goa(GOI)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Goa (GOI)</div>
                                                    <div class="airport_name">Dabolim<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="HYD-Hyderabad-India" roundwayto="Hyderabad(HYD)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Hyderabad (HYD)</div>
                                                    <div class="airport_name">Shamsabad International
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="MAA-Chennai-India" roundwayto="Chennai(MAA)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Chennai (MAA)</div>
                                                    <div class="airport_name">Chennai<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="SIN-Singapore-Singapore" roundwayto="Singapore(SIN)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Singapore (SIN)</div>
                                                    <div class="airport_name">Changi<span>Singapore</span>
                                                    </div>
                                                </li>
                                                <li roundwaytotop="DXB-Dubai-United Arab Emirates" roundwayto="Dubai(DXB)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Dubai (DXB)</div>
                                                    <div class="airport_name">Dubai<span>United Arab
                                                            Emirates</span></div>
                                                </li>
                                                <li roundwaytotop="BKK-Bangkok-Thailand" roundwayto="Bangkok(BKK)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangkok (BKK)</div>
                                                    <div class="airport_name">Bangkok
                                                        Int'l<span>Thailand</span></div>
                                                </li>
                                                <li roundwaytotop="KTM-Kathmandu-Nepal" roundwayto="Kathmandu(KTM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kathmandu (KTM)</div>
                                                    <div class="airport_name">Tribhuvan<span>Nepal</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .form-group end -->
                                </div>
                                <div class="one_rnd_sng1">
                                <div class="form-group cus_calendar_field">
                                <span class="pl10">Date</span>
                                    <input autocomplete="off" type="text" name="brTimeStart" value="" class="form-control htl " placeholder="2019/09/30">
                                    <i class="far fa-calendar add"></i>
                                </div><!-- .form-group end -->
                                </div>
                                <a id="crs3" onclick="CloseSection('section-s3','')" class="closem" href="javascript:;">
                                    <i class="fas fa-times"></i>

                                </a>

                                <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ismultipleway" id="section-s4" style="display:none;">
                            <div class="cngbxs_h1">
                                <div class="frm_to ">
                                <div class="form-group loc_search_field cus_loc_field">
                                    <span>From</span>
                                    <i class="fas fa-plane rtate"></i>
                                    <input type="hidden" id="multi_roundfromsearch4">

                                    <input did="s4" ssid="4" style="cursor: text;" autocomplete="off" type="text" name="multiwayfromtext4" id="fromdest_show4" class="multi_roundwayfrom form-control wrapper-dropdown-12 add" placeholder="From">
                                    <p>Intanbul (All)</p>
                                    <div class="location_search selhide" id="location_search" style="display: none;">
                                        <div class="inner_loc_search">
                                            <div class="top_city">
                                                <span>Top Cities</span>
                                            </div>
                                            <ul class="multi_is_search_from_val">
                                                <li roundwayfromtop="DEL-Delhi-India" roundwayfrom="Delhi(DEL)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Delhi (DEL)</div>
                                                    <div class="airport_name">Indira Gandhi
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="BLR-Bangalore-India" roundwayfrom="Bangalore(BLR)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangalore (BLR)</div>
                                                    <div class="airport_name">Bengaluru
                                                        Intl<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="BOM-Mumbai-India" roundwayfrom="Mumbai(BOM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Mumbai (BOM)</div>
                                                    <div class="airport_name">Mumbai<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="CCU-Kolkata-India" roundwayfrom="Kolkata(CCU)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kolkata (CCU)</div>
                                                    <div class="airport_name">Calcutta<span>India</span>
                                                    </div>
                                                </li>
                                                <li roundwayfromtop="GOI-Goa-India" roundwayfrom="Goa(GOI)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Goa (GOI)</div>
                                                    <div class="airport_name">Dabolim<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="HYD-Hyderabad-India" roundwayfrom="Hyderabad(HYD)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Hyderabad (HYD)</div>
                                                    <div class="airport_name">Shamsabad International
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="MAA-Chennai-India" roundwayfrom="Chennai(MAA)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Chennai (MAA)</div>
                                                    <div class="airport_name">Chennai<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="SIN-Singapore-Singapore" roundwayfrom="Singapore(SIN)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Singapore (SIN)</div>
                                                    <div class="airport_name">Changi<span>Singapore</span>
                                                    </div>
                                                </li>
                                                <li roundwayfromtop="DXB-Dubai-United Arab Emirates" roundwayfrom="Dubai(DXB)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Dubai (DXB)</div>
                                                    <div class="airport_name">Dubai<span>United Arab
                                                            Emirates</span></div>
                                                </li>
                                                <li roundwayfromtop="BKK-Bangkok-Thailand" roundwayfrom="Bangkok(BKK)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangkok (BKK)</div>
                                                    <div class="airport_name">Bangkok
                                                        Int'l<span>Thailand</span></div>
                                                </li>
                                                <li roundwayfromtop="KTM-Kathmandu-Nepal" roundwayfrom="Kathmandu(KTM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kathmandu (KTM)</div>
                                                    <div class="airport_name">Tribhuvan<span>Nepal</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="swap" onclick="SwapRoundDestination();" class="swipe">
                                    </div>
                                </div><!-- .form-group end -->
                                <div class="form-group loc_search_field_to cus_loc_field">
                                    <input type="hidden" id="multi_roundtosearch4">
                                    <span>To</span>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <input did="s4" ssid="4" style="cursor: text;" autocomplete="off" type="text" name="multiwaytotext4" id="todest_show4" class="multi_roundwayto form-control wrapper-dropdown-13 add" placeholder="To">
                                    <p>Intanbul (All)</p>
                                    <div class="location_search_to selhide" id="location_search_to" style="display: none;">
                                        <div class="inner_loc_search">
                                            <div class="top_city">
                                                <span>Top Cities</span>
                                            </div>
                                            <ul class="multi_is_search_to_val">
                                                <li roundwaytotop="DEL-Delhi-India" roundwayto="Delhi(DEL)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Delhi (DEL)</div>
                                                    <div class="airport_name">Indira Gandhi
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="BLR-Bangalore-India" roundwayto="Bangalore(BLR)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangalore (BLR)</div>
                                                    <div class="airport_name">Bengaluru
                                                        Intl<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="BOM-Mumbai-India" roundwayto="Mumbai(BOM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Mumbai (BOM)</div>
                                                    <div class="airport_name">Mumbai<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="CCU-Kolkata-India" roundwayto="Kolkata(CCU)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kolkata (CCU)</div>
                                                    <div class="airport_name">Calcutta<span>India</span>
                                                    </div>
                                                </li>
                                                <li roundwaytotop="GOI-Goa-India" roundwayto="Goa(GOI)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Goa (GOI)</div>
                                                    <div class="airport_name">Dabolim<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="HYD-Hyderabad-India" roundwayto="Hyderabad(HYD)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Hyderabad (HYD)</div>
                                                    <div class="airport_name">Shamsabad International
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="MAA-Chennai-India" roundwayto="Chennai(MAA)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Chennai (MAA)</div>
                                                    <div class="airport_name">Chennai<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="SIN-Singapore-Singapore" roundwayto="Singapore(SIN)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Singapore (SIN)</div>
                                                    <div class="airport_name">Changi<span>Singapore</span>
                                                    </div>
                                                </li>
                                                <li roundwaytotop="DXB-Dubai-United Arab Emirates" roundwayto="Dubai(DXB)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Dubai (DXB)</div>
                                                    <div class="airport_name">Dubai<span>United Arab
                                                            Emirates</span></div>
                                                </li>
                                                <li roundwaytotop="BKK-Bangkok-Thailand" roundwayto="Bangkok(BKK)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangkok (BKK)</div>
                                                    <div class="airport_name">Bangkok
                                                        Int'l<span>Thailand</span></div>
                                                </li>
                                                <li roundwaytotop="KTM-Kathmandu-Nepal" roundwayto="Kathmandu(KTM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kathmandu (KTM)</div>
                                                    <div class="airport_name">Tribhuvan<span>Nepal</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .form-group end -->
                                </div>
                                <div class="one_rnd_sng1">
                                <div class="form-group cus_calendar_field">
                                <span class="pl10">Date</span>
                                    <input autocomplete="off" type="text" name="brTimeStart" value="" class="form-control htl" placeholder="2019/09/30">
                                    <i class="far fa-calendar add"></i>
                                </div><!-- .form-group end -->
                                </div>
                                <a id="crs4" class="closem" onclick="CloseSection('section-s4',3)" href="javascript:;">
                                    <i class="fas fa-times"></i>

                                </a>

                                <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ismultipleway" id="section-s5" style="display:none;">
                            <div class="cngbxs_h1">
                                <div class="frm_to ">
                                <div class="form-group loc_search_field cus_loc_field">
                                    <span>From</span>
                                    <i class="fas fa-plane rtate"></i>
                                    <input type="hidden" id="multi_roundfromsearch5">

                                    <input did="s5" ssid="5" style="cursor: text;" autocomplete="off" type="text" name="multiwayfromtext5" id="fromdest_show5" class="multi_roundwayfrom form-control wrapper-dropdown-14 add" placeholder="From">
                                    <p>Intanbul (All)</p>
                                    <div class="location_search selhide" id="location_search" style="display: none;">
                                        <div class="inner_loc_search">
                                            <div class="top_city">
                                                <span>Top Cities</span>
                                            </div>
                                            <ul class="multi_is_search_from_val">
                                                <li roundwayfromtop="DEL-Delhi-India" roundwayfrom="Delhi(DEL)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Delhi (DEL)</div>
                                                    <div class="airport_name">Indira Gandhi
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="BLR-Bangalore-India" roundwayfrom="Bangalore(BLR)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangalore (BLR)</div>
                                                    <div class="airport_name">Bengaluru
                                                        Intl<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="BOM-Mumbai-India" roundwayfrom="Mumbai(BOM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Mumbai (BOM)</div>
                                                    <div class="airport_name">Mumbai<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="CCU-Kolkata-India" roundwayfrom="Kolkata(CCU)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kolkata (CCU)</div>
                                                    <div class="airport_name">Calcutta<span>India</span>
                                                    </div>
                                                </li>
                                                <li roundwayfromtop="GOI-Goa-India" roundwayfrom="Goa(GOI)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Goa (GOI)</div>
                                                    <div class="airport_name">Dabolim<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="HYD-Hyderabad-India" roundwayfrom="Hyderabad(HYD)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Hyderabad (HYD)</div>
                                                    <div class="airport_name">Shamsabad International
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="MAA-Chennai-India" roundwayfrom="Chennai(MAA)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Chennai (MAA)</div>
                                                    <div class="airport_name">Chennai<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="SIN-Singapore-Singapore" roundwayfrom="Singapore(SIN)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Singapore (SIN)</div>
                                                    <div class="airport_name">Changi<span>Singapore</span>
                                                    </div>
                                                </li>
                                                <li roundwayfromtop="DXB-Dubai-United Arab Emirates" roundwayfrom="Dubai(DXB)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Dubai (DXB)</div>
                                                    <div class="airport_name">Dubai<span>United Arab
                                                            Emirates</span></div>
                                                </li>
                                                <li roundwayfromtop="BKK-Bangkok-Thailand" roundwayfrom="Bangkok(BKK)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangkok (BKK)</div>
                                                    <div class="airport_name">Bangkok
                                                        Int'l<span>Thailand</span></div>
                                                </li>
                                                <li roundwayfromtop="KTM-Kathmandu-Nepal" roundwayfrom="Kathmandu(KTM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kathmandu (KTM)</div>
                                                    <div class="airport_name">Tribhuvan<span>Nepal</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="swap" onclick="SwapRoundDestination();" class="swipe">
                                    </div>
                                </div><!-- .form-group end -->
                                <div class="form-group loc_search_field_to cus_loc_field">
                                    <span>To</span>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <input type="hidden" id="multi_roundtosearch5">
                                    <input did="s5" ssid="5" style="cursor: text;" autocomplete="off" type="text" name="multiwaytotext5" id="todest_show5" class="multi_roundwayto form-control wrapper-dropdown-15 add" placeholder="To">
                                    <p>Intanbul (All)</p>
                                    <div class="location_search_to selhide" id="location_search_to" style="display: none;">
                                        <div class="inner_loc_search">
                                            <div class="top_city">
                                                <span>Top Cities</span>
                                            </div>
                                            <ul class="multi_is_search_to_val">
                                                <li roundwaytotop="DEL-Delhi-India" roundwayto="Delhi(DEL)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Delhi (DEL)</div>
                                                    <div class="airport_name">Indira Gandhi
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="BLR-Bangalore-India" roundwayto="Bangalore(BLR)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangalore (BLR)</div>
                                                    <div class="airport_name">Bengaluru
                                                        Intl<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="BOM-Mumbai-India" roundwayto="Mumbai(BOM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Mumbai (BOM)</div>
                                                    <div class="airport_name">Mumbai<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="CCU-Kolkata-India" roundwayto="Kolkata(CCU)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kolkata (CCU)</div>
                                                    <div class="airport_name">Calcutta<span>India</span>
                                                    </div>
                                                </li>
                                                <li roundwaytotop="GOI-Goa-India" roundwayto="Goa(GOI)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Goa (GOI)</div>
                                                    <div class="airport_name">Dabolim<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="HYD-Hyderabad-India" roundwayto="Hyderabad(HYD)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Hyderabad (HYD)</div>
                                                    <div class="airport_name">Shamsabad International
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="MAA-Chennai-India" roundwayto="Chennai(MAA)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Chennai (MAA)</div>
                                                    <div class="airport_name">Chennai<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="SIN-Singapore-Singapore" roundwayto="Singapore(SIN)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Singapore (SIN)</div>
                                                    <div class="airport_name">Changi<span>Singapore</span>
                                                    </div>
                                                </li>
                                                <li roundwaytotop="DXB-Dubai-United Arab Emirates" roundwayto="Dubai(DXB)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Dubai (DXB)</div>
                                                    <div class="airport_name">Dubai<span>United Arab
                                                            Emirates</span></div>
                                                </li>
                                                <li roundwaytotop="BKK-Bangkok-Thailand" roundwayto="Bangkok(BKK)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangkok (BKK)</div>
                                                    <div class="airport_name">Bangkok
                                                        Int'l<span>Thailand</span></div>
                                                </li>
                                                <li roundwaytotop="KTM-Kathmandu-Nepal" roundwayto="Kathmandu(KTM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kathmandu (KTM)</div>
                                                    <div class="airport_name">Tribhuvan<span>Nepal</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .form-group end -->
                                </div>
                                <div class="one_rnd_sng1">
                                <div class="form-group cus_calendar_field">
                                <span class="pl10">Date</span>
                                    <input autocomplete="off" type="text" name="brTimeStart" value="" class="form-control htl" placeholder="2019/09/30">
                                    <i class="far fa-calendar add"></i>
                                </div><!-- .form-group end -->
                                </div>
                                <a id="crs5" onclick="CloseSection('section-s5',4)" class="closem" href="javascript:;">
                                    <i class="fas fa-times"></i>

                                </a>

                                <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ismultipleway" id="section-s6" style="display:none;">
                            <div class="cngbxs_h1">
                                <div class="frm_to ">
                                <div class="form-group loc_search_field cus_loc_field">
                                    <span>From</span>
                                    <i class="fas fa-plane rtate"></i>
                                    <input type="hidden" id="multi_roundfromsearch6">
                                    <input type="hidden" id="journey_type" value="3">
                                    <input did="s6" ssid="6" style="cursor: text;" autocomplete="off" type="text" name="multiwayfromtext6" id="fromdest_show6" class="multi_roundwayfrom form-control wrapper-dropdown-16 add" placeholder="From">
                                    <p>Intanbul (All)</p>
                                    <div class="location_search selhide" id="location_search" style="display: none;">
                                        <div class="inner_loc_search">
                                            <div class="top_city">
                                                <span>Top Cities</span>
                                            </div>
                                            <ul class="multi_is_search_from_val">
                                                <li roundwayfromtop="DEL-Delhi-India" roundwayfrom="Delhi(DEL)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Delhi (DEL)</div>
                                                    <div class="airport_name">Indira Gandhi
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="BLR-Bangalore-India" roundwayfrom="Bangalore(BLR)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangalore (BLR)</div>
                                                    <div class="airport_name">Bengaluru
                                                        Intl<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="BOM-Mumbai-India" roundwayfrom="Mumbai(BOM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Mumbai (BOM)</div>
                                                    <div class="airport_name">Mumbai<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="CCU-Kolkata-India" roundwayfrom="Kolkata(CCU)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kolkata (CCU)</div>
                                                    <div class="airport_name">Calcutta<span>India</span>
                                                    </div>
                                                </li>
                                                <li roundwayfromtop="GOI-Goa-India" roundwayfrom="Goa(GOI)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Goa (GOI)</div>
                                                    <div class="airport_name">Dabolim<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="HYD-Hyderabad-India" roundwayfrom="Hyderabad(HYD)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Hyderabad (HYD)</div>
                                                    <div class="airport_name">Shamsabad International
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="MAA-Chennai-India" roundwayfrom="Chennai(MAA)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Chennai (MAA)</div>
                                                    <div class="airport_name">Chennai<span>India</span></div>
                                                </li>
                                                <li roundwayfromtop="SIN-Singapore-Singapore" roundwayfrom="Singapore(SIN)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Singapore (SIN)</div>
                                                    <div class="airport_name">Changi<span>Singapore</span>
                                                    </div>
                                                </li>
                                                <li roundwayfromtop="DXB-Dubai-United Arab Emirates" roundwayfrom="Dubai(DXB)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Dubai (DXB)</div>
                                                    <div class="airport_name">Dubai<span>United Arab
                                                            Emirates</span></div>
                                                </li>
                                                <li roundwayfromtop="BKK-Bangkok-Thailand" roundwayfrom="Bangkok(BKK)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangkok (BKK)</div>
                                                    <div class="airport_name">Bangkok
                                                        Int'l<span>Thailand</span></div>
                                                </li>
                                                <li roundwayfromtop="KTM-Kathmandu-Nepal" roundwayfrom="Kathmandu(KTM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kathmandu (KTM)</div>
                                                    <div class="airport_name">Tribhuvan<span>Nepal</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="swap" onclick="SwapRoundDestination();" class="swipe">
                                    </div>
                                </div><!-- .form-group end -->
                                <div class="form-group loc_search_field_to cus_loc_field">
                                    <span>To</span>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <input type="hidden" id="multi_roundtosearch6">
                                    <input did="s6" ssid="6" style="cursor: text;" autocomplete="off" type="text" name="multiwaytotext6" id="todest_show6" class="multi_roundwayto form-control wrapper-dropdown-17 add" placeholder="To">
                                    <p>Intanbul (All)</p>
                                    <div class="location_search_to selhide" id="location_search_to" style="display: none;">
                                        <div class="inner_loc_search">
                                            <div class="top_city">
                                                <span>Top Cities</span>
                                            </div>
                                            <ul class="multi_is_search_to_val">
                                                <li roundwaytotop="DEL-Delhi-India" roundwayto="Delhi(DEL)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Delhi (DEL)</div>
                                                    <div class="airport_name">Indira Gandhi
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="BLR-Bangalore-India" roundwayto="Bangalore(BLR)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangalore (BLR)</div>
                                                    <div class="airport_name">Bengaluru
                                                        Intl<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="BOM-Mumbai-India" roundwayto="Mumbai(BOM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Mumbai (BOM)</div>
                                                    <div class="airport_name">Mumbai<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="CCU-Kolkata-India" roundwayto="Kolkata(CCU)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kolkata (CCU)</div>
                                                    <div class="airport_name">Calcutta<span>India</span>
                                                    </div>
                                                </li>
                                                <li roundwaytotop="GOI-Goa-India" roundwayto="Goa(GOI)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Goa (GOI)</div>
                                                    <div class="airport_name">Dabolim<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="HYD-Hyderabad-India" roundwayto="Hyderabad(HYD)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Hyderabad (HYD)</div>
                                                    <div class="airport_name">Shamsabad International
                                                        Airport<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="MAA-Chennai-India" roundwayto="Chennai(MAA)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Chennai (MAA)</div>
                                                    <div class="airport_name">Chennai<span>India</span></div>
                                                </li>
                                                <li roundwaytotop="SIN-Singapore-Singapore" roundwayto="Singapore(SIN)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Singapore (SIN)</div>
                                                    <div class="airport_name">Changi<span>Singapore</span>
                                                    </div>
                                                </li>
                                                <li roundwaytotop="DXB-Dubai-United Arab Emirates" roundwayto="Dubai(DXB)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Dubai (DXB)</div>
                                                    <div class="airport_name">Dubai<span>United Arab
                                                            Emirates</span></div>
                                                </li>
                                                <li roundwaytotop="BKK-Bangkok-Thailand" roundwayto="Bangkok(BKK)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Bangkok (BKK)</div>
                                                    <div class="airport_name">Bangkok
                                                        Int'l<span>Thailand</span></div>
                                                </li>
                                                <li roundwaytotop="KTM-Kathmandu-Nepal" roundwayto="Kathmandu(KTM)">
                                                    <div class="fli_name"><i class="fa fa-plane"></i>
                                                        Kathmandu (KTM)</div>
                                                    <div class="airport_name">Tribhuvan<span>Nepal</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .form-group end -->
                                </div>
                                <div class="one_rnd_sng1">
                                <div class="form-group cus_calendar_field">
                                <span class="pl10">Date</span>
                                    <input autocomplete="off" type="text" name="brTimeStart6" value="" class="form-control htl" placeholder="2019/09/30">
                                    <i class="far fa-calendar add"></i>
                                </div><!-- .form-group end -->
                                </div>
                                <a id="crs6" onclick="CloseSection('section-s6',5)" class="closem" href="javascript:;">
                                    <i class="fas fa-times"></i>

                                </a>

                                <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="addcity" id="addAnFlt">
                                <a class="if_multicity_trip btn-multiple-destinations btn x-small colorful hover-dark adm" href="javascript:;">
                                    <i class="fas fa-plus"></i>
                                    Add City
                                </a>
                            </div>
                        </form>
                    </li>

                </ul><!-- .br-tabs-content end -->
                <div class="advanced_option" style="display: none;"><a href="javascript:;">Previous
                        searches&nbsp;<i class="fas fa-chevron-down"></i></a>
                    <ul class="list-select-grade list_grade">
                        <li>
                            <label class="radio-container radio-default">
                                <input class="roundseatclass" value="2" type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                                Economy
                            </label>
                        </li>
                        <li>
                            <label class="radio-container radio-default">
                                <input class="roundseatclass" value="3" type="radio" name="radio">
                                <span class="checkmark"></span>
                                Premium Economy
                            </label>
                        </li>
                        <li>
                            <label class="radio-container radio-default">
                                <input class="roundseatclass" value="4" type="radio" name="radio">
                                <span class="checkmark"></span>
                                Business
                            </label>
                        </li>
                        <li>
                            <label class="radio-container radio-default">
                                <input class="roundseatclass" value="6" type="radio" name="radio">
                                <span class="checkmark"></span>
                                First
                            </label>
                        </li>
                        <li>
                            <label class="label-container checkbox-default">
                                <span>Nonstop</span>
                                <input id="roundis_non_stop" value="1" type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                    </ul><!-- .list-select-grade end -->
                </div>
                <div class="clearfix"></div>
            </div><!-- .banner-reservation-tabs end -->
        </div>
    </div>
</div></div>


<div class="modifyhead">
    <div class="container">
        <div class="mobile-filter">
            <ul>
                <li><i class="fas fa-sort-amount-up-alt"></i>FILTER</li>
                <li><i class="fas fa-plane"></i>AIRLINES </li>
                <li><i class="far fa-clock"></i>TIMES </li>
                <li><i class="fas fa-sort"></i>SORT </li>
            </ul>
        </div>

        <div class="modifysection">
            <div class="mdtxt">
                <ul class="flx_md">
                    <li class="spcmd">
                        <span>{{ $from[1]}} ({{$from[0]}})</span>
                        <i class="fas fa-exchange-alt"></i>
                        <span>{{ $to[1]}} ({{$to[0]}})</span>
                    </li>
                    <li>
                        <span>{{$dpDate}}&nbsp;-&nbsp;
                            @if(request()->get('ret'))
                            @php $rtDate = \Carbon\Carbon::createFromFormat('d/m/Y',request()->get('ret'))->format('M d Y') @endphp
                            {{$rtDate }}
                            @endif


                        </span>
                    </li>
                    <li><span>
                            @if($px[0] > 0)
                            {{$px[0]}} Adult,
                            @endif
                            @if($px[1] > 0)
                            {{$px[1]}} child,
                            @endif
                            @if($px[2] > 0)
                            {{$px[2]}} infants
                            @endif
                        </span></li>
                </ul>
            </div>
            <div class="mdbtn">
                <button type="button" class="mod_bt" id="modify_pop"><i class="fas fa-edit"></i><span class="mdf_ms">Modify</span></button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <section class="list_fliter">
        <div class="filterbx">
            <div class="ftr_head ">
                <h1>Filter</h1>
                <span>Clear all</span>
            </div>

            <div class="filtercnt">
                <div class="mobileapply_ftr">
                    <button type="button" class="btnf_apy" id="aplybtn"><span>0 Filters</span>APPLY </button>
                </div>
                <div class="panel-group " id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#PRICE" aria-expanded="true">
                                    <div class="txtftr">
                                        <h6>PRICE</h6>
                                        <span>Clear</span>
                                    </div>
                                </a>
                            </h4>
                        </div>
                        <div id="PRICE" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="rage_price">
                                    <div id="slider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#PAYMENTPLAN" aria-expanded="true">
                                    <div class="txtftr">
                                        <h6>PAYMENT PLAN</h6>
                                        <span>Clear</span>
                                    </div>
                                </a>
                            </h4>
                        </div>
                        <div id="PAYMENTPLAN" class="panel-collapse collapse in">
                            <div class="panel-body pdmrbx">
                                <div class="checkftr">
                                    <ul class="check-boxes-custom list-checkboxes">
                                        <li>
                                            <label for="flight" class="label-container checkbox-default">Pay
                                                Small Small
                                                <input name="flight" class="flightfilter" id="flight" type="checkbox" value="1">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="flight2" class="label-container checkbox-default">None
                                                <input name="flight" class="flightfilter" id="flight2" type="checkbox" value="0">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>-->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#STOPS" aria-expanded="true">
                                    <div class="txtftr">
                                        <h6>STOPS</h6>
                                        <span>Clear</span>
                                    </div>
                                </a>
                            </h4>
                        </div>
                        <div id="STOPS" class="panel-collapse collapse in">
                            <div class="panel-body pdmrbx">
                                <div class="priceul">
                                    <ul class="listps">
                                        <li><a href="#" class="activeck">
                                                <span>0</span>
                                                $652,918
                                            </a></li>
                                        <li><a href="#">
                                                <span>1</span>
                                                $652,918
                                            </a></li>
                                        <li><a href="#">
                                                <span>1+</span>
                                                $652,918
                                            </a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#AIRLINE" aria-expanded="true">
                                    <div class="txtftr">
                                        <h6>AIRLINE</h6>
                                        <span>Clear</span>
                                    </div>
                                </a>
                            </h4>
                        </div>
                        <div id="AIRLINE" class="panel-collapse collapse in">
                            <div class="panel-body pdmrbx">
                                <div class="checkftr">
                                    <ul class="check-boxes-custom list-checkboxes">
                                        @php $i =0 @endphp
                                        @foreach($flightresult['dictionaries']['carriers'] as $key => $value)

                                        @php $i++ @endphp
                                        <li>
                                            <label for="flights{{$i}}" class="label-container checkbox-default">{{$value}}
                                                <input name="flight" class="flightfilter" id="flights{{$i}}" type="checkbox" value="{{$key}}">
                                                <span class="checkmark"></span>
                                            </label>
                                            {{-- <span class="lsprc"> from&nbsp;₦381,614 </span> --}}
                                        </li>
                                        @endforeach
                                        {{-- <li><a href="#" class="sltxt">See All&nbsp;<i
															class="fas fa-chevron-down"></i></a></li> --}}
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#FLEXIBILITY" aria-expanded="true">
                                    <div class="txtftr">
                                        <h6>FLEXIBILITY</h6>
                                        <span>Clear</span>
                                    </div>
                                </a>
                            </h4>
                        </div>
                        <div id="FLEXIBILITY" class="panel-collapse collapse in">
                            <div class="panel-body pdmrbx">
                                <div class="checkftr">
                                    <ul class="check-boxes-custom list-checkboxes">
                                        <li>
                                            <label for="Refundable1" class="label-container checkbox-default">Refundable
                                                <input name="flight" class="flightfilter" id="Refundable1" type="checkbox" value="1">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label for="NonRefundable1" class="label-container checkbox-default">Non Refundable
                                                <input name="flight" class="flightfilter" id="NonRefundable1" type="checkbox" value="0">
                                                <span class="checkmark"></span>
                                            </label>
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
            <div class="rightlist">

                <h2>Flights from <span>{{ $from[1]}} to {{$to[1] }}</span></h2>
            </div>
            <div class="row bgsl">
                <div class="col-lg-2 col-sm-3 col-5 ligbtm">
                    <div class="listnb listnb_rtv">
                        <ul class="list-unstyleds">
                            <li> Nonstop </li>
                            <li> 1 Stop </li>
                            <li> 1+ Stops </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9 col-7 pl0">
                    <div class="listingair_bx sliderlist">
                        <div class="airlist">
                            <div>
                                <a href="#">
                                    <div class="listdh">
                                        <div class="airline-logo1">
                                            <div class="imglsdh">
                                                <img src="/images/AF.gif" class="img-res" />
                                            </div>
                                            <div class="airline-name1">
                                                <h5>Air France</h5>
                                            </div>
                                        </div>

                                        <div class="listnb">
                                            <ul class="list-unstyleds">
                                                <li><span class="stopmd">Nonstop</span> &nbsp;</li>
                                                <li><span class="stopmd">1 Stop</span> ₦511,656 </li>
                                                <li><span class="stopmd">1+ Stops</span> ₦621,816 </li>
                                            </ul>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="#">
                                    <div class="listdh">
                                        <div class="airline-logo1">
                                            <div class="imglsdh">
                                                <img src="/images/AF.gif" class="img-res" />
                                            </div>
                                            <div class="airline-name1">
                                                <h5>Air France</h5>
                                            </div>
                                        </div>

                                        <div class="listnb">
                                            <ul class="list-unstyleds">
                                                <li><span class="stopmd">Nonstop</span> &nbsp;</li>
                                                <li><span class="stopmd">1 Stop</span> ₦511,656 </li>
                                                <li><span class="stopmd">1+ Stops</span> ₦621,816 </li>
                                            </ul>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="#">
                                    <div class="listdh">
                                        <div class="airline-logo1">
                                            <div class="imglsdh">
                                                <img src="/images/AF.gif" class="img-res" />
                                            </div>
                                            <div class="airline-name1">
                                                <h5>Brussels Airlines</h5>
                                            </div>
                                        </div>

                                        <div class="listnb">
                                            <ul class="list-unstyleds">
                                                <li><span class="stopmd">Nonstop</span> &nbsp;</li>
                                                <li><span class="stopmd">1 Stop</span> ₦511,656 </li>
                                                <li><span class="stopmd">1+ Stops</span> ₦621,816 </li>
                                            </ul>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="#">
                                    <div class="listdh">
                                        <div class="airline-logo1">
                                            <div class="imglsdh">
                                                <img src="/images/AF.gif" class="img-res" />
                                            </div>
                                            <div class="airline-name1">
                                                <h5>KLM Royal Dutch Airlines</h5>
                                            </div>
                                        </div>

                                        <div class="listnb">
                                            <ul class="list-unstyleds">
                                                <li><span class="stopmd">Nonstop</span> &nbsp;</li>
                                                <li><span class="stopmd">1 Stop</span> ₦511,656 </li>
                                                <li><span class="stopmd">1+ Stops</span> ₦621,816 </li>
                                            </ul>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="#">
                                    <div class="listdh">
                                        <div class="airline-logo1">
                                            <div class="imglsdh">
                                                <img src="/images/AF.gif" class="img-res" />
                                            </div>
                                            <div class="airline-name1">
                                                <h5>Air France</h5>
                                            </div>
                                        </div>

                                        <div class="listnb">
                                            <ul class="list-unstyleds">
                                                <li><span class="stopmd">Nonstop</span> &nbsp;</li>
                                                <li><span class="stopmd">1 Stop</span> ₦511,656 </li>
                                                <li><span class="stopmd">1+ Stops</span> ₦621,816 </li>
                                            </ul>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="#">
                                    <div class="listdh">
                                        <div class="airline-logo1">
                                            <div class="imglsdh">
                                                <img src="/images/AF.gif" class="img-res" />
                                            </div>
                                            <div class="airline-name1">
                                                <h5>Air France</h5>
                                            </div>
                                        </div>

                                        <div class="listnb">
                                            <ul class="list-unstyleds">
                                                <li><span class="stopmd">Nonstop</span> &nbsp;</li>
                                                <li><span class="stopmd">1 Stop</span> ₦511,656 </li>
                                                <li><span class="stopmd">1+ Stops</span> ₦621,816 </li>
                                            </ul>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="#">
                                    <div class="listdh">
                                        <div class="airline-logo1">
                                            <div class="imglsdh">
                                                <img src="/images/AF.gif" class="img-res" />
                                            </div>
                                            <div class="airline-name1">
                                                <h5>Air France</h5>
                                            </div>
                                        </div>

                                        <div class="listnb">
                                            <ul class="list-unstyleds">
                                                <li><span class="stopmd">Nonstop</span> &nbsp;</li>
                                                <li><span class="stopmd">1 Stop</span> ₦511,656 </li>
                                                <li><span class="stopmd">1+ Stops</span> ₦621,816 </li>
                                            </ul>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="tabsl_vs">
                <div class="tbsort_ls">
                    <ul class="nav nav-tabs">

                        <li class="active"><a data-toggle="tab" href="#Cheapest">
                                <div class="tbcps d-flex align-items-center">
                                    <div class="cleapimg">
                                        <img src="/images/Cheapest-gray.svg" class="img-res cgray" />
                                        <img src="/images/Cheapest-color.svg" class="img-res ccolor" style="display: none;" />
                                    </div>
                                    <div class="textcps">
                                        <h4>Cheapest</h4>
                                        <span>From R4,429</span>
                                    </div>
                                </div>
                            </a></li>
                        <li><a data-toggle="tab" href="#Fastest">
                                <div class="tbcps d-flex align-items-center">
                                    <div class="cleapimg">
                                        <img src="/images/Fastest-gray.svg" class="img-res cgray" />
                                        <img src="/images/Fastest-color.svg" class="img-res ccolor" style="display: none;" />
                                    </div>
                                    <div class="textcps">
                                        <h4>Fastest</h4>
                                        <span>11hrs 10min</span>
                                    </div>
                                </div>
                            </a></li>
                        <li><a data-toggle="tab" href="#Earliest">
                                <div class="tbcps d-flex align-items-center">
                                    <div class="cleapimg">
                                        <img src="/images/Earliest-gray.svg" class="img-res cgray" />
                                        <img src="/images/Earliest-color.svg" class="img-res ccolor" style="display: none;" />
                                    </div>
                                    <div class="textcps">
                                        <h4>Earliest</h4>
                                        <span>01.15:00</span>
                                    </div>
                                </div>
                            </a></li>

                        <!--<li><a data-toggle="tab" href="#Latest">
                                <div class="tbcps d-flex align-items-center">
                                    <div class="cleapimg">
                                        <img src="/images/Latest-gray.svg" class="img-res cgray" />
                                        <img src="/images/Latest-color.svg" class="img-res ccolor" style="display: none;" />
                                    </div>
                                    <div class="textcps">
                                        <h4>Latest</h4>
                                        <span>23:30:00</span>
                                    </div>
                                </div>
                            </a></li>

                        <li><a data-toggle="tab" href="#Baggage">
                                <div class="tbcps d-flex align-items-center">
                                    <div class="cleapimg">
                                        <img src="/images/Baggage-gray.svg" class="img-res cgray" />
                                        <img src="/images/Baggage-color.svg" class="img-res ccolor" style="display: none;" />
                                    </div>
                                    <div class="textcps">
                                        <h4>Baggage</h4>
                                        <span>No Checked baggage</span>
                                    </div>
                                </div>
                            </a></li>-->
                    </ul>
                </div>

                <div class="tab-content">
                    <div id="Cheapest" class="tab-pane fade in active">

                        <div class="listticket">
                            <ul class="tktlist">
                                @foreach($flightresult['data'] as $searchFlight)

                                @if(count($searchFlight['itineraries']) == 1)
                                <li class="trip"> 
                                    <div class="largehead">
                                        <h4>Departure Journey &nbsp;&nbsp;|&nbsp;&nbsp;<span> {{ date('M d Y', strtotime($searchFlight['itineraries'][0]["segments"][0]['departure']['at'])) }}</h4>
                                    </div>
                                    <div class="flexlist">
                                        <div class="inuot_bx">
                                            <div class="tmingtk ">
                                                <ul class="dflex_js mbs">

                                                    <li>
                                                        <div class="airnm">
                                                            <span>
                                                                @php $file = getFileName($searchFlight['itineraries'][0]["segments"][0]['carrierCode']) @endphp
                                                                @if($file)
                                                                <img src="{{$file}}" class="img-res" alt="{{$searchFlight['itineraries'][0]["segments"][0]['carrierCode']}}">
                                                                @else
                                                                <i class="fas fa-plane"></i><i class="fas fa-plane"></i>
                                                                @endif
                                                            </span>
                                                            <h6>{{ $flightresult['dictionaries']['carriers'][$searchFlight['itineraries'][0]["segments"][0]['carrierCode']]}}</h6>
                                                        </div>
                                                    </li>
                                                    @php $depaturecountryDetails = getCountryName($flightresult['dictionaries']['locations'][$searchFlight['itineraries'][0]["segments"][0]['departure']['iataCode']]["countryCode"],$searchFlight['itineraries'][0]["segments"][0]['departure']['iataCode']); @endphp
                                                    <li class="tooltip1">
                                                        <p> {{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][0]['departure']['at'])) }}&nbsp;<span>({{$searchFlight['itineraries'][0]["segments"][0]['departure']['iataCode']}})</span></p><span class="blkts">{{ $depaturecountryDetails->country_name}} ({{ $depaturecountryDetails->city_name}})</span>
                                                        <div class="tooltiptext">
                                                            <h6><strong>{{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][0]['departure']['at'])) }} .</strong> {{ date('M-d-Y', strtotime($searchFlight['itineraries'][0]["segments"][0]['departure']['at'])) }}
                                                                <span>
                                                                    {{ $depaturecountryDetails->country_name}} ({{ $depaturecountryDetails->city_name}})
                                                                </span>
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li><span class="blkts cnts">{{ strtolower(str_replace('H','H     ',substr($searchFlight['itineraries'][0]["duration"], 2)))}}</span>
                                                        <span class="hrst"></span>
                                                        <span class="blkts cnts">{{(count($searchFlight['itineraries'][0]["segments"]) -1)}} Stop</span>
                                                    </li>
                                                    @php $arrivalcountryDetails = getCountryName($flightresult['dictionaries']['locations'][$searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['iataCode']]["countryCode"],$searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['iataCode']); @endphp

                                                    <li class="tooltip1">

                                                        <p>

                                                            {{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['at'])) }}&nbsp;<span>({{$searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['iataCode']}})</span></p>
                                                        <span class="blkts">{{ $arrivalcountryDetails->country_name ?? Null }} ({{ $arrivalcountryDetails->city_name ?? Null }})</span>
                                                        <div class="tooltiptext">
                                                            <h6><strong> {{$searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['iataCode']}} {{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['at'])) }} .</strong> {{ date('M-d-y', strtotime($searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['at'])) }}
                                                                <span>{{ $arrivalcountryDetails->country_name ?? Null   }} ({{ $arrivalcountryDetails->city_name ?? Null }})
                                                                </span>
                                                            </h6>
                                                        </div>
                                                    </li>
                                                </ul>

                                                <div class="bagbx">
                                                    <span><img src="/images/Baggage-gray.svg" />&nbsp; {{ $searchFlight["travelerPricings"][0]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] ?? '' }} kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage</span>

                                                    {{-- <span><img src="/images/Baggage-gray.svg"  />&nbsp; {{ $searchFlight["travelerPricings"][0]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] }} kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="prishow">
                                            <div class="tbfare">

                                                <div class="bookprc">
                                                    <h5>{{ $searchFlight["price"]["currency"] .', '.$searchFlight["price"]['total']}}</h5>
                                                    <a href="{{ url('FlightList/details?data='.json_encode($searchFlight,true).'&dictionaries='.json_encode($flightresult['dictionaries']).'&px='.Request::get('px'))}}" type="button" class="btnvw"><i class="fas fa-plane"></i>&nbsp;&nbsp;Book Now</a>
                                               <span id="fltid">Flight Details<i class="fa fa-angle-down"></i></span>
                                               
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                @else



                             
                                    @foreach($searchFlight['itineraries'] as $key =>$value)
									   <li class="trip">
                                    <div class="largehead">
                                        <h4>Departure Journey &nbsp;&nbsp;|&nbsp;&nbsp;<span> {{ date('M d Y', strtotime($value["segments"][0]['departure']['at'])) }}</h4>
                                    </div>
                                    <div class="flexlist">
                                        <div class="inuot_bx">
                                            <div class="tmingtk ">
                                                <ul class="dflex_js mbs">

                                                    <li>
                                                        <div class="airnm">
                                                            <span>
                                                                @php $file = getFileName($searchFlight['itineraries'][0]['segments'][0]['carrierCode']) @endphp
                                                                @if($file)
                                                                <img src="{{$file}}" class="img-res" alt="{{$searchFlight['itineraries'][0]["segments"][0]['carrierCode']}}">
                                                                @else
                                                                <i class="fas fa-plane"></i><i class="fas fa-plane"></i>
                                                                @endif
                                                            </span>
                                                            <h6>{{ $flightresult['dictionaries']['carriers'][$searchFlight['itineraries'][0]["segments"][0]['carrierCode']]}}</h6>
                                                        </div>
                                                    </li>
                                                    @php $depaturecountryDetails = getCountryName($flightresult['dictionaries']['locations'][$searchFlight['itineraries'][0]["segments"][0]['departure']['iataCode']]["countryCode"],$searchFlight['itineraries'][0]["segments"][0]['departure']['iataCode']); @endphp
                                                    <li class="tooltip1">
                                                        <p> {{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][0]['departure']['at'])) }}&nbsp;<span>({{$searchFlight['itineraries'][0]["segments"][0]['departure']['iataCode']}})</span></p><span class="blkts">{{ $depaturecountryDetails->country_name}} ({{ $depaturecountryDetails->city_name}})</span>
                                                        <div class="tooltiptext">
                                                            <h6><strong>{{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][0]['departure']['at'])) }} .</strong> {{ date('M-d-Y', strtotime($searchFlight['itineraries'][0]["segments"][0]['departure']['at'])) }}
                                                                <span>
                                                                    {{ $depaturecountryDetails->country_name}} ({{ $depaturecountryDetails->city_name}})
                                                                </span>
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li><span class="blkts cnts">{{ strtolower(str_replace('H','H     ',substr($searchFlight['itineraries'][0]["duration"], 2)))}}</span>
                                                        <span class="hrst"></span>
                                                        <span class="blkts cnts">{{$searchFlight['itineraries'][0]["segments"][0]['numberOfStops']}} Stop</span>
                                                    </li>
                                                    @php $arrivalcountryDetails = getCountryName($flightresult['dictionaries']['locations'][$searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['iataCode']]["countryCode"],$searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['iataCode']); @endphp
                                                    <li class="tooltip1">
                                                        <p>

                                                            {{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['at'])) }}&nbsp;<span>({{$searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['iataCode']}})</span></p>
                                                        <span class="blkts">{{ $arrivalcountryDetails->country_name ?? Null }} ({{ $arrivalcountryDetails->city_name ?? Null }})</span>
                                                        <div class="tooltiptext">
                                                            <h6><strong>{{ date('H:i', strtotime($searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['at'])) }} .</strong> {{ date('M-d-y', strtotime($searchFlight['itineraries'][0]["segments"][(count($searchFlight['itineraries'][0]["segments"])-1)]['arrival']['at'])) }}
                                                                <span>{{ $arrivalcountryDetails->country_name ?? Null   }} ({{ $arrivalcountryDetails->city_name ?? Null }})
                                                                </span>
                                                            </h6>
                                                        </div>
                                                    </li>

                                                </ul>

                                                {{-- <div class="bagbx">
								
													<span><img src="/images/Baggage-gray.svg"  />&nbsp; {{ $searchFlight["travelerPricings"][0]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] }} kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage</span>
                                            </div> --}}
                                             </div>

                                        <div class="tmingtk ">
                                            <ul class="dflex_js mbs">

                                                <li>
                                                    <div class="airnm">
                                                        <span>
                                                            @php $file = getFileName($searchFlight['itineraries'][1]['segments'][0]['carrierCode']) @endphp
                                                            @if($file)
                                                            <img src="{{$file}}" class="img-res" alt="{{$searchFlight['itineraries'][1]["segments"][0]['carrierCode']}}">
                                                            @else
                                                            <i class="fas fa-plane"></i><i class="fas fa-plane"></i>
                                                            @endif
                                                        </span>
                                                        <h6>{{ $flightresult['dictionaries']['carriers'][$searchFlight['itineraries'][1]["segments"][0]['carrierCode']]}}</h6>
                                                    </div>
                                                </li>
                                                @php $depaturecountryDetails = getCountryName($flightresult['dictionaries']['locations'][$searchFlight['itineraries'][1]["segments"][0]['departure']['iataCode']]["countryCode"],$searchFlight['itineraries'][1]["segments"][0]['departure']['iataCode']); @endphp
                                                <li class="tooltip1">
                                                    <p> {{ date('H:i', strtotime($searchFlight['itineraries'][1]["segments"][0]['departure']['at'])) }}&nbsp;<span>({{$searchFlight['itineraries'][1]["segments"][0]['departure']['iataCode']}})</span></p><span class="blkts">{{ $depaturecountryDetails->country_name}} ({{ $depaturecountryDetails->city_name}})</span>
                                                    <div class="tooltiptext">
                                                        <h6><strong>{{ date('H:i', strtotime($searchFlight['itineraries'][1]["segments"][0]['departure']['at'])) }} .</strong> {{ date('M-d-Y', strtotime($searchFlight['itineraries'][1]["segments"][0]['departure']['at'])) }}
                                                            <span>
                                                                {{ $depaturecountryDetails->country_name}} ({{ $depaturecountryDetails->city_name}})
                                                            </span>
                                                        </h6>
                                                    </div>
                                                </li>
                                                <li><span class="blkts cnts">{{ strtolower(str_replace('H','H     ',substr($searchFlight['itineraries'][1]["duration"], 2)))}}</span>
                                                    <span class="hrst"></span>
                                                    <span class="blkts cnts">{{$searchFlight['itineraries'][1]["segments"][0]['numberOfStops']}} Stop</span>
                                                </li>
                                                @php $arrivalcountryDetails = getCountryName($flightresult['dictionaries']['locations'][$searchFlight['itineraries'][1]["segments"][(count($searchFlight['itineraries'][1]["segments"])-1)]['arrival']['iataCode']]["countryCode"],$searchFlight['itineraries'][1]["segments"][(count($searchFlight['itineraries'][1]["segments"])-1)]['arrival']['iataCode']); @endphp
                                                <li class="tooltip1">
                                                    <p>{{ date('H:i', strtotime($searchFlight['itineraries'][1]["segments"][(count($searchFlight['itineraries'][1]["segments"])-1)]['arrival']['at'])) }}&nbsp;<span>({{$searchFlight['itineraries'][1]["segments"][(count($searchFlight['itineraries'][1]["segments"])-1)]['arrival']['iataCode']}})</span></p>
                                                    <span class="blkts">{{ $arrivalcountryDetails->country_name ?? Null }} ({{ $arrivalcountryDetails->city_name ?? Null }})</span>
                                                    <div class="tooltiptext">
                                                        <h6><strong>{{ date('H:i', strtotime($searchFlight['itineraries'][1]["segments"][(count($searchFlight['itineraries'][1]["segments"])-1)]['arrival']['at'])) }} .</strong> {{ date('M-d-y', strtotime($searchFlight['itineraries'][1]["segments"][(count($searchFlight['itineraries'][1]["segments"])-1)]['arrival']['at'])) }}
                                                            <span>{{ $arrivalcountryDetails->country_name ?? Null   }} ({{ $arrivalcountryDetails->city_name ?? Null }})
                                                            </span>
                                                        </h6>
                                                    </div>
                                                </li>
                                            </ul>

                                            <div class="bagbx">

                                                <span><img src="/images/Baggage-gray.svg" />&nbsp; {{ $searchFlight["travelerPricings"][0]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] ?? '' }} kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="prishow">
                                        <div class="tbfare">

                                            <div class="bookprc">
                                                <h5>{{ $searchFlight["price"]["currency"] .', '.$searchFlight["price"]['total']}}</h5>
                                                <a href="{{ url('FlightList/details?data='.json_encode($searchFlight,true).'&dictionaries='.json_encode($flightresult['dictionaries']).'&px='.Request::get('px'))}}" type="button" class="btnvw"><i class="fas fa-plane"></i>&nbsp;&nbsp;Book Now</a>
                                            </div>
                                        </div>
                                    </div>

                                  
<div class="detaildrp" style="display:none ;">
                                        <div class="row">
                                            <div class="col-sm-8">
                                               <div class="sdstslbox">
                                                <h3>Flight Details</h3>

                                                <div class="fltbox_ds">
                                                    <div class="headtop_flight d-flex">
                                                        <h4>Johannesburg&nbsp;&nbsp;-&nbsp;&nbsp;Dubai</h4>
                                                        <span><i class="fa fa-clock"></i>&nbsp;33hrs&nbsp;20min</span>
                                                    </div>

                                                    <div class="logoair_dts d-flex">
                                                        <Span><img src="https://www.travel24hr.com/img/airline/AI.gif" class="img-res" alt="AI"></Span>
                                                   <div class="lctpanel_dts ">
                                                    <div class="jtnpns d-flex">
                                                        <h5>jnb</h5>
                                                        <span><i class="fa fa-arrow-right"></i></span>
                                                        <h5>nbo</h5>
                                                    </div>
                                                    <span>kamya Arways <span>kq751</span></span>
                                                   </div>
                                                   
                                                    </div>

                                                    <div class="detailflitghtd d-flex">
                                                        <div class="details1_sl">
                                                            <span>21 May 22</span>
                                                            <h3>12:10</h3>
                                                            <p>Johannesburg   O.R. Tombo
International (UNB)</p>
                                                        </div>

                                                        <div class="timelinec"><span class="blkts cnts">4hrs 5min</span>
                                                        <span class="hrst"></span>
                                                        <span class="blkts cnts">Non Stop</span>
                                                    </div>

                                                        <div class="details1_sl text-right">
                                                            <span>21 May 22</span>
                                                            <h3>12:10</h3>
                                                            <p>Johannesburg   O.R. Tombo
International (UNB)</p>
                                                        </div>
                                                    </div>



                                                    <div class="bagbx desz">
                                                    <span><img src="/images/Baggage-gray.svg">&nbsp; 25 kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage</span>

                                                    
                                                </div>
                                                </div>

                                                <div class="fltbox_ds">
                                                    <div class="headtop_flight d-flex">
                                                        <h4>Johannesburg&nbsp;&nbsp;-&nbsp;&nbsp;Dubai</h4>
                                                        <span><i class="fa fa-clock"></i>&nbsp;33hrs&nbsp;20min</span>
                                                    </div>

                                                    <div class="logoair_dts d-flex">
                                                        <Span><img src="https://www.travel24hr.com/img/airline/AI.gif" class="img-res" alt="AI"></Span>
                                                   <div class="lctpanel_dts ">
                                                    <div class="jtnpns d-flex">
                                                        <h5>jnb</h5>
                                                        <span><i class="fa fa-arrow-right"></i></span>
                                                        <h5>nbo</h5>
                                                    </div>
                                                    <span>kamya Arways <span>kq751</span></span>
                                                   </div>
                                                   
                                                    </div>

                                                    <div class="detailflitghtd d-flex">
                                                        <div class="details1_sl">
                                                            <span>21 May 22</span>
                                                            <h3>12:10</h3>
                                                            <p>Johannesburg   O.R. Tombo
International (UNB)</p>
                                                        </div>

                                                        <div class="timelinec"><span class="blkts cnts">4hrs 5min</span>
                                                        <span class="hrst"></span>
                                                        <span class="blkts cnts">Non Stop</span>
                                                    </div>

                                                        <div class="details1_sl text-right">
                                                            <span>21 May 22</span>
                                                            <h3>12:10</h3>
                                                            <p>Johannesburg   O.R. Tombo
International (UNB)</p>
                                                        </div>
                                                    </div>



                                                    <div class="bagbx desz">
                                                    <span><img src="/images/Baggage-gray.svg">&nbsp; 25 kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage</span>

                                                    
                                                </div>
                                                </div>
                                             
                                               </div>
                                            </div>
                                            <div class="col-sm-4">
                                           
                                            <div class="sdstslbox">
                                                <h3> Price Breakdown</h3>
                                                <div class="listprcw">
                                                <div class="paybx cngfet">
                        <ul class="basefareul">                           
                        <li><h4>Total Price</h4><h4>R5,149</h4></li>
                             <li><span>Adult x 1</span><span><b>R2,700<sup>  </sup></b></span></li>
                             <li><span>Taxes & fees</span><span><b>R2,700<sup>  </sup></b></span></li>
                             <li><span><i>Total ticket price included taxes and fees.</i></span></li>
                        </ul>
                    </div>
                                                </div>
                                               </div>
                                            </div>
                                        </div>
                                    </div>


                           
                    	 </li>
                        @endforeach
   
                        @endif
                        @endforeach
						 </div>
                        </ul>
                    
                    <div class="loadbtn">
                        <button type="button" class="lotds">LOAD MORE RESULTS </button>
                    </div>
					</div>
                </div>
                {{-- <div id="Fastest" class="tab-pane fade">
								<h4 class="othlist">Other flight options</h4>
								<div class="listticket">
									<ul class="tktlist">
										<li>
											<div class="inuot_bx">
												<div class="tmingtk ">
													<span class="taglt yellow_cl">Cheapest</span>
													<ul class="dflex_js mbs">
														<li>
															<div class="airnm">
																<span>
																	<img src="/images/QR.gif"
																		class="img-res">
																</span>
																<h6>Qatar Airways</h6>
															</div>
														</li>
														<li class="tooltip1">
															<p>08:15&nbsp;<span>(LHR)</span></p><span
																class="blkts">London</span>
															<div class="tooltiptext">
																<h6><strong>08:15 AM .</strong> Feb 11 2022
																	<span>London (Heathrow)</span>
																</h6>
															</div>
														</li>
														<li><span class="blkts cnts">21h 30m</span>
															<span class="hrst"></span>
															<span class="blkts cnts">1 Stop</span>
														</li>
														<li class="tooltip1">
															<p>06:45&nbsp;<span>(LOS)</span></p><span
																class="blkts">Lagos</span>
															<div class="tooltiptext">
																<h6><strong>06:45 AM .</strong> Feb 12 2022
																	<span>Lagos (Murtala Muhammed International Airport)
																	</span>
																</h6>
															</div>
														</li>
													</ul>
													<ul class="dflex_js mbs">
														<li>
															<div class="airnm">
																<span>
																	<img src="/images/QR.gif"
																		class="img-res">
																</span>
																<h6>Qatar Airways</h6>
															</div>
														</li>
														<li class="tooltip1">
															<p>19:10&nbsp;<span>(LOS)</span></p><span
																class="blkts">Lagos</span>
															<div class="tooltiptext">
																<h6><strong>06:45 AM .</strong> Feb 12 2022
																	<span>Lagos (Murtala Muhammed International Airport)
																	</span>
																</h6>
															</div>

														</li>
														<li><span class="blkts cnts">19h 10m</span>
															<span class="hrst"></span>
															<span class="blkts cnts">1 Stop</span>
														</li>
														<li class="tooltip1">
															<p>13:20&nbsp;<span>(LHR)</span></p><span
																class="blkts">London</span>
															<div class="tooltiptext">
																<h6><strong>08:15 AM .</strong> Feb 11 2022
																	<span>London (Heathrow)</span>
																</h6>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<div class="prishow">
												<div class="tbfare">
													<ul class="nav nav-tabs">
														<li class="active"><a data-toggle="tab" href="#PayFullFare1">Pay
																Full Fare</a></li>
														<li><a data-toggle="tab" href="#PaySmallSmall1">
																<div class="pysml">
																	<span><img
																			src="/images/paysmallsmall.png"
																			class="img-res"></span>
																	<h6 class="tooltip1"> Pay Small Small
																		<span>₦95,394&nbsp;<i
																				class="far fa-question-circle "></i></span>

																		<div class="tooltiptext">
																			<span><img
																					src="/images/sml.jpg"
																					class="img-res"></span>
																			<h5 class="faresm1">Pay as low ₦90712 now
																				and lock this fare.</h5>
																			<ul class="faresm2">
																				<li><i
																						class="far fa-check-circle"></i>Pay
																					as low 25% initial deposit.</li>
																				<li><i
																						class="far fa-check-circle"></i>Split
																					payment up to 4</li>
																				<li><i
																						class="far fa-check-circle"></i>Low
																					service charge</li>

																			</ul>
																		</div>
																	</h6>
																</div>
															</a></li>

													</ul>

													<div class="tab-content">
														<div id="PayFullFare1" class="tab-pane fade in active">
															<div class="bookprc">
																<h5>₦352,275</h5>
																<button type="button" class="btnvw"><i
																		class="fas fa-eye"></i>&nbsp;View</button>
															</div>
														</div>
														<div id="PaySmallSmall1" class="tab-pane fade">
															<div class="bookprc">
																<h5>₦90,712</h5>
																<button type="button" class="btnvw"><i
																		class="fas fa-eye"></i>&nbsp;View</button>
															</div>
														</div>

													</div>
												</div>



											</div>
										</li>

										<li>
											<div class="inuot_bx">
												<div class="tmingtk ">
													<span class="taglt blue_cl">Time Saver</span>
													<ul class="dflex_js mbs">
														<li>
															<div class="airnm">
																<span>
																	<img src="/images/VS.gif"
																		class="img-res">
																</span>
																<h6>Virgin Atlantic</h6>
															</div>
														</li>
														<li class="tooltip1">
															<p>22:30&nbsp;<span>(LHR)</span></p><span
																class="blkts">London</span>
															<div class="tooltiptext">
																<h6><strong>08:15 AM .</strong> Feb 11 2022
																	<span>London (Heathrow)</span>
																</h6>
															</div>
														</li>
														<li><span class="blkts cnts">6h 25m</span>
															<span class="hrst"></span>
															<span class="blkts cnts">0 Stop</span>
														</li>
														<li class="tooltip1">
															<p>05:55&nbsp;<span>(LOS)</span></p><span
																class="blkts">Lagos</span>
															<div class="tooltiptext">
																<h6><strong>06:45 AM .</strong> Feb 12 2022
																	<span>Lagos (Murtala Muhammed International Airport)
																	</span>
																</h6>
															</div>
														</li>
													</ul>
													<ul class="dflex_js mbs">
														<li>
															<div class="airnm">
																<span>
																	<img src="/images/VS.gif"
																		class="img-res">
																</span>
																<h6>Virgin Atlantic</h6>
															</div>
														</li>
														<li class="tooltip1">
															<p>09:30&nbsp;<span>(LOS)</span></p><span
																class="blkts">Lagos</span>
															<div class="tooltiptext">
																<h6><strong>06:45 AM .</strong> Feb 12 2022
																	<span>Lagos (Murtala Muhammed International Airport)
																	</span>
																</h6>
															</div>

														</li>
														<li><span class="blkts cnts">6h 35m</span>
															<span class="hrst"></span>
															<span class="blkts cnts">0 Stop</span>
														</li>
														<li class="tooltip1">
															<p>15:05&nbsp;<span>(LHR)</span></p><span
																class="blkts">London</span>
															<div class="tooltiptext">
																<h6><strong>08:15 AM .</strong> Feb 11 2022
																	<span>London (Heathrow)</span>
																</h6>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<div class="prishow">
												<div class="tbfare">
													<ul class="nav nav-tabs">
														<li class="active"><a data-toggle="tab" href="#PayFullFare">Pay
																Full Fare</a></li>


													</ul>

													<div class="tab-content">
														<div id="PayFullFare" class="tab-pane fade in active">
															<div class="bookprc">
																<h5>₦654,076</h5>
																<button type="button" class="btnvw"><i
																		class="fas fa-eye"></i>&nbsp;View</button>
															</div>
														</div>


													</div>
												</div>



											</div>
										</li>
									</ul>
								</div>
							</div>
							<div id="Recommended" class="tab-pane fade">
								<h4 class="othlist">Other flight options</h4>
								<div class="listticket">
									<ul class="tktlist">
										<li>
											<div class="inuot_bx">
												<div class="tmingtk ">
													<span class="taglt yellow_cl">Cheapest</span>
													<ul class="dflex_js mbs">
														<li>
															<div class="airnm">
																<span>
																	<img src="/images/QR.gif"
																		class="img-res">
																</span>
																<h6>Qatar Airways</h6>
															</div>
														</li>
														<li class="tooltip1">
															<p>08:15&nbsp;<span>(LHR)</span></p><span
																class="blkts">London</span>
															<div class="tooltiptext">
																<h6><strong>08:15 AM .</strong> Feb 11 2022
																	<span>London (Heathrow)</span>
																</h6>
															</div>
														</li>
														<li><span class="blkts cnts">21h 30m</span>
															<span class="hrst"></span>
															<span class="blkts cnts">1 Stop</span>
														</li>
														<li class="tooltip1">
															<p>06:45&nbsp;<span>(LOS)</span></p><span
																class="blkts">Lagos</span>
															<div class="tooltiptext">
																<h6><strong>06:45 AM .</strong> Feb 12 2022
																	<span>Lagos (Murtala Muhammed International Airport)
																	</span>
																</h6>
															</div>
														</li>
													</ul>
													<ul class="dflex_js mbs">
														<li>
															<div class="airnm">
																<span>
																	<img src="/images/QR.gif"
																		class="img-res">
																</span>
																<h6>Qatar Airways</h6>
															</div>
														</li>
														<li class="tooltip1">
															<p>19:10&nbsp;<span>(LOS)</span></p><span
																class="blkts">Lagos</span>
															<div class="tooltiptext">
																<h6><strong>06:45 AM .</strong> Feb 12 2022
																	<span>Lagos (Murtala Muhammed International Airport)
																	</span>
																</h6>
															</div>

														</li>
														<li><span class="blkts cnts">19h 10m</span>
															<span class="hrst"></span>
															<span class="blkts cnts">1 Stop</span>
														</li>
														<li class="tooltip1">
															<p>13:20&nbsp;<span>(LHR)</span></p><span
																class="blkts">London</span>
															<div class="tooltiptext">
																<h6><strong>08:15 AM .</strong> Feb 11 2022
																	<span>London (Heathrow)</span>
																</h6>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<div class="prishow">
												<div class="tbfare">
													<ul class="nav nav-tabs">
														<li class="active"><a data-toggle="tab" href="#PayFullFare2">Pay
																Full Fare</a></li>
														<li><a data-toggle="tab" href="#PaySmallSmall2">
																<div class="pysml">
																	<span><img
																			src="/images/paysmallsmall.png"
																			class="img-res"></span>
																	<h6 class="tooltip1"> Pay Small Small
																		<span>₦95,394&nbsp;<i
																				class="far fa-question-circle "></i></span>

																		<div class="tooltiptext">
																			<span><img
																					src="/images/sml.jpg"
																					class="img-res"></span>
																			<h5 class="faresm1">Pay as low ₦90712 now
																				and lock this fare.</h5>
																			<ul class="faresm2">
																				<li><i
																						class="far fa-check-circle"></i>Pay
																					as low 25% initial deposit.</li>
																				<li><i
																						class="far fa-check-circle"></i>Split
																					payment up to 4</li>
																				<li><i
																						class="far fa-check-circle"></i>Low
																					service charge</li>

																			</ul>
																		</div>
																	</h6>
																</div>
															</a></li>

													</ul>

													<div class="tab-content">
														<div id="PayFullFare2" class="tab-pane fade in active">
															<div class="bookprc">
																<h5>₦352,275</h5>
																<button type="button" class="btnvw"><i
																		class="fas fa-eye"></i>&nbsp;View</button>
															</div>
														</div>
														<div id="PaySmallSmall2" class="tab-pane fade">
															<div class="bookprc">
																<h5>₦90,712</h5>
																<button type="button" class="btnvw"><i
																		class="fas fa-eye"></i>&nbsp;View</button>
															</div>
														</div>

													</div>
												</div>



											</div>
										</li>

										<li>
											<div class="inuot_bx">
												<div class="tmingtk ">
													<span class="taglt blue_cl">Time Saver</span>
													<ul class="dflex_js mbs">
														<li>
															<div class="airnm">
																<span>
																	<img src="/images/VS.gif"
																		class="img-res">
																</span>
																<h6>Virgin Atlantic</h6>
															</div>
														</li>
														<li class="tooltip1">
															<p>22:30&nbsp;<span>(LHR)</span></p><span
																class="blkts">London</span>
															<div class="tooltiptext">
																<h6><strong>08:15 AM .</strong> Feb 11 2022
																	<span>London (Heathrow)</span>
																</h6>
															</div>
														</li>
														<li><span class="blkts cnts">6h 25m</span>
															<span class="hrst"></span>
															<span class="blkts cnts">0 Stop</span>
														</li>
														<li class="tooltip1">
															<p>05:55&nbsp;<span>(LOS)</span></p><span
																class="blkts">Lagos</span>
															<div class="tooltiptext">
																<h6><strong>06:45 AM .</strong> Feb 12 2022
																	<span>Lagos (Murtala Muhammed International Airport)
																	</span>
																</h6>
															</div>
														</li>
													</ul>
													<ul class="dflex_js mbs">
														<li>
															<div class="airnm">
																<span>
																	<img src="/images/VS.gif"
																		class="img-res">
																</span>
																<h6>Virgin Atlantic</h6>
															</div>
														</li>
														<li class="tooltip1">
															<p>09:30&nbsp;<span>(LOS)</span></p><span
																class="blkts">Lagos</span>
															<div class="tooltiptext">
																<h6><strong>06:45 AM .</strong> Feb 12 2022
																	<span>Lagos (Murtala Muhammed International Airport)
																	</span>
																</h6>
															</div>

														</li>
														<li><span class="blkts cnts">6h 35m</span>
															<span class="hrst"></span>
															<span class="blkts cnts">0 Stop</span>
														</li>
														<li class="tooltip1">
															<p>15:05&nbsp;<span>(LHR)</span></p><span
																class="blkts">London</span>
															<div class="tooltiptext">
																<h6><strong>08:15 AM .</strong> Feb 11 2022
																	<span>London (Heathrow)</span>
																</h6>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<div class="prishow">
												<div class="tbfare">
													<ul class="nav nav-tabs">
														<li class="active"><a data-toggle="tab" href="#PayFullFare">Pay
																Full Fare</a></li>


													</ul>

													<div class="tab-content">
														<div id="PayFullFare" class="tab-pane fade in active">
															<div class="bookprc">
																<h5>₦654,076</h5>
																<button type="button" class="btnvw"><i
																		class="fas fa-eye"></i>&nbsp;View</button>
															</div>
														</div>


													</div>
												</div>



											</div>
										</li>
									</ul>
								</div>
							</div> --}}
        </div>
    </section>

</div>
</section>
</div>


@endsection
