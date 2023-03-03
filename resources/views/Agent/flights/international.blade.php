@extends('layouts.agentfrontend')
@section('title', @$seoDetails->meta_title)
@section('meta_title', '')
@section('meta_keyword', '')
@section('meta_description', '')
@section('bodyclass', 'ch single-page page-search')
@section('content')
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
        background: url(http://24hr.lightmytrip.com/public/images/arw-l-w.png)no-repeat;
        background-size: contain;
    }

    .sliderlist .slick-next:before {
        right: 7px;
        background: url(http://24hr.lightmytrip.com/public/images/arw-r-w.png)no-repeat;
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
<?php use App\Http\Controllers\Controller; ?>
<section id="content">
    <?php //echo '<pre>'; print_r($flightresult); die; ?>
    <div id="content-wrap">

        <!-- === Section Flat =========== -->
        <div class="section-flat single_sec_flat">
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 pos_static">
                            <!--<div class="fli_detail hide_desktop">
										<h4><i class="fa fa-arrow-left arrow_lg"></i> Delhi <i class="fa fa-arrow-right arrow_sm"></i> Mumbai</h4>
										<span>Thu 02-Jul | 1 Adult</span>
									</div>-->
                            <div class="search_flight hide_desktop">
                                <a href="javascript:;"><i class="fa fa-search"></i> Modify Search</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="banner-reservation-tabs custom_reservation_tab search_mobile">
                                <div class="close_flight hide_desktop">
                                    <a href="javascript:;"><i class="fa fa-times"></i></a>
                                </div>

                                <ul class="br-tabs">
                                    @php $from= explode('-',Request::get('from')) @endphp
                                    @php $to= explode('-',Request::get('to')) @endphp
                                    @php $timestamp = strtotime(Request::get('dep')); @endphp
                                    @php $dpDate = date("Y-m-d", $timestamp); @endphp


                                    @php $px= explode('-',Request::get('px')) @endphp
                                    <?php 
									
										$srch = Request::get('srch'); 
										
										$mytravlercount = explode('-', Request::get('px'));
										$mtcount = 0;
										for($mit =0; $mit<count($mytravlercount); $mit++){
											$mtcount += $mytravlercount[$mit];
										}
										$cbn = Request::get('cbn'); 
										$nt = Request::get('nt'); 
										$explodesearc = explode('|', $srch);
										$originexplode = explode('-', $explodesearc[0]);
										$desexplode = explode('-', $explodesearc[1]);
										$datedeparture = date('Y-m-d', strtotime(request()->get('dep')));

										$explodepass = explode('-', Request::get('px'));
									?>
                                    <li <?php if(isset($_GET['jt']) && $_GET['jt'] == 1) { ?> class="active" <?php } ?> dataway="oneway"><a href="javascript:;">One Way</a></li>
                                    <li <?php if(isset($_GET['jt']) && $_GET['jt'] == 2) { ?> class="active" <?php } ?> class="roundtriptab" dataway="roundtrip"><a href="javascript:;">Round Trip</a></li>
                                    <!--<li <?php /* if(isset($_GET['jt']) && $_GET['jt'] == 3) { ?> class="active" <?php } */ ?> dataway="multicity"><a href="javascript:;">Multi City</a></li>-->
                                </ul><!-- .br-tabs end -->
                                <ul class="br-tabs-content" style="height: 100%;">
                                    <li class="active" style="display: list-item;">
                                        <div class="ismultipleway">
                                            <form action="{{URL::to('/agent/FlightList/index')}}" class="form-banner-reservation form-inline style-2 form-h-40">
                                                <div class="form-group loc_search_field cus_loc_field">
                                                    <input type="hidden" id="roundfromsearch" value="{{@$explodesearc[0]}}">
                                                    <input type="hidden" id="journey_type" value="{{@$_GET['jt']}}">
                                                    <input type="hidden" name="isReturn" value="true">
                                                    <input style="cursor: text;" autocomplete="off" type="text" name="roundwayfrmtext" id="fromdest_show" class="roundwayfrom form-control wrapper-dropdown-2" placeholder="From" value="{{@$originexplode[1]}}({{@$originexplode[0]}})">
                                                    <i class="fas fa-plane"></i>
                                                    <div class="location_search selhide" id="location_search">
                                                        <div class="inner_loc_search">
                                                            <div class="top_city">
                                                                <span>Top Cities</span>
                                                            </div>
                                                            <ul class="is_search_from_val">
                                                                @foreach(\App\Airport::where('top_cities','1')->orderby('priority','ASC')->get() as $alist)
                                                                <li roundwayfromtop="{{$alist->city_code}}-{{$alist->city_name}}-{{$alist->country_name}}" roundwayfrom="{{$alist->city_name}}({{$alist->city_code}})">
                                                                    <div class="fli_name"><i class="fa fa-plane"></i> {{$alist->city_name}} ({{$alist->city_code}})</div>
                                                                    <div class="airport_name">{{$alist->airport_name}}<span>{{$alist->country_name}}</span></div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div id="swap" onclick="SwapRoundDestination();" class="swipe single_swipe"></div>
                                                </div><!-- .form-group end -->
                                                <div class="form-group loc_search_field_to cus_loc_field">
                                                    <input type="hidden" id="roundtosearch" value="{{@$explodesearc[1]}}">
                                                    <input style="cursor: text;" autocomplete="off" type="text" name="roundwaytotext" id="todest_show" class="roundwayto form-control wrapper-dropdown-3" placeholder="To" value="{{@$desexplode[1]}}({{@$desexplode[0]}})">
                                                    <i class="fas fa-plane"></i>
                                                    <div class="location_search_to selhide" id="location_search_to">
                                                        <div class="inner_loc_search">
                                                            <div class="top_city">
                                                                <span>Top Cities</span>
                                                            </div>
                                                            <ul class="is_search_to_val">
                                                                @foreach(\App\Airport::where('top_cities','1')->orderby('priority','ASC')->get() as $elist)
                                                                <li roundwaytotop="{{$elist->city_code}}-{{$elist->city_name}}-{{$elist->country_name}}" roundwayto="{{$elist->city_name}}({{$elist->city_code}})">
                                                                    <div class="fli_name"><i class="fa fa-plane"></i> {{$elist->city_name}} ({{$elist->city_code}})</div>
                                                                    <div class="airport_name">{{$elist->airport_name}}<span>{{$elist->country_name}}</span></div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div><!-- .form-group end -->
                                                <div class="form-group cus_calendar_field">
                                                    <input autocomplete="off" type="text" value="{{@$explodesearc[2]}}" name="brTimeStart" value="" class="form-control" id="datepicker-time-start" placeholder="2019/09/30">
                                                    <i class="far fa-calendar"></i>
                                                </div><!-- .form-group end -->
                                                <div class="form-group cus_calendar_field" style="<?php if(isset($_GET['jt']) && $_GET['jt'] == 2) { ?>  <?php }else{ echo 'opacity: 0.4;'; } ?>">
                                                    <input autocomplete="off" <?php if(isset($_GET['jt']) && $_GET['jt'] == 2) { ?> <?php }else{ echo 'readonly'; } ?> type="text" value="{{@$explodesearc[3]}}" name="brTimeEnd" value="" class="form-control if_oneway_trip roundtripenable" id="datepicker-time-end" placeholder="2019/09/30">
                                                    <i class="far fa-calendar"></i>
                                                </div><!-- .form-group end -->
                                                <div class="form-group roundtrip cus_passenger_field">
                                                    <?php $no_pessa = $explodepass[0] + $explodepass[1] + $explodepass[2]; ?>
                                                    <input autocomplete="off" type="text" id="roundpessanger" name="brPassengerNumber" class="form-control show-dropdown-passengers roundpessanger" placeholder="Passengers" value="{{$no_pessa}} Passengers">
                                                    <i class="fas fa-user"></i>
                                                    <ul class="list-dropdown-passengers">
                                                        <li>
                                                            <ul class="list-persons-count">
                                                                <li>
                                                                    <span>Adults:</span>
                                                                    <div class="counter-add-item">
                                                                        <a class="decrease-btn" href="javascript:;">-</a>
                                                                        <input id="roundadult" class="onewayadult" type="text" value="{{$explodepass[0]}}">
                                                                        <a class="increase-btn" href="javascript:;">+</a>
                                                                    </div><!-- .counter-add-item end -->
                                                                </li>
                                                                <li>
                                                                    <span>Childs:</span>
                                                                    <div class="counter-add-item">
                                                                        <a class="decrease-btn" href="javascript:;">-</a>
                                                                        <input id="roundchild" class="onewaychild" type="text" value="{{$explodepass[1]}}">
                                                                        <a class="increase-btn" href="javascript:;">+</a>
                                                                    </div><!-- .counter-add-item end -->
                                                                </li>
                                                                <li>
                                                                    <span>Infants:</span>
                                                                    <div class="counter-add-item">
                                                                        <a class="decrease-btn" href="javascript:;">-</a>
                                                                        <input id="roundinfant" class="onewayinfants" type="text" value="{{$explodepass[2]}}">
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
                                                <div class="form-group cus_searchbtn_field">
                                                    <button type="button" class="form-control roundformsearch icon"><i class="fas fa-search"></i> Search Flights</button>
                                                </div><!-- .form-group end -->
                                                <div class="clearfix"></div>
                                                <a style="display:none;" class="if_multicity_trip btn-multiple-destinations btn x-small colorful hover-dark" href="javascript:;">
                                                    <i class="fas fa-plus"></i>
                                                    Add Another Flight
                                                </a>
                                            </form><!-- .form-banner-reservation end -->
                                        </div>
                                    </li>

                                </ul><!-- .br-tabs-content end -->
                                <div class="advanced_option"><a href="javascript:;">Advanced Option <i class="fa fa-plus"></i></a>
                                    <ul class="list-select-grade list_grade">
                                        <li>
                                            <label class="radio-container radio-default">
                                                <input class="roundseatclass" value="2" <?php if($cbn == 2){ echo 'checked'; } ?> type="radio" checked="checked" name="radio">
                                                <span class="checkmark"></span>
                                                Economy
                                            </label>
                                        </li>
                                        <li>
                                            <label class="radio-container radio-default">
                                                <input class="roundseatclass" value="3" type="radio" <?php if($cbn == 3){ echo 'checked'; } ?> name="radio">
                                                <span class="checkmark"></span>
                                                Premium Economy
                                            </label>
                                        </li>
                                        <li>
                                            <label class="radio-container radio-default">
                                                <input class="roundseatclass" value="4" <?php if($cbn == 4){ echo 'checked'; } ?> type="radio" name="radio">
                                                <span class="checkmark"></span>
                                                Business
                                            </label>
                                        </li>
                                        <li>
                                            <label class="radio-container radio-default">
                                                <input class="roundseatclass" value="6" <?php if($cbn == 6){ echo 'checked'; } ?> type="radio" name="radio">
                                                <span class="checkmark"></span>
                                                First
                                            </label>
                                        </li>
                                        <li>
                                            <label class="label-container checkbox-default">
                                                <span>Nonstop</span>
                                                <input id="roundis_non_stop" value="1" <?php if($nt == 1){ echo 'checked'; } ?> type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul><!-- .list-reservation-options end -->
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- .banner-reservation-tabs end -->

                        </div><!-- .col-md-12 end -->

                        <div class="col-md-12">
                            <div class="page-single-content sidebar-left mt-10 internationtrip_search">
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-lg-push-3 col-md-push-3 col-sm-12">
                                        <div class="content-main">
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
                                                                        <span><img src="{{asset('public/images/Baggage-gray.svg')}}" />&nbsp; {{ $searchFlight["travelerPricings"][0]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] ?? '' }} kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage</span>

                                                                        {{-- <span><img src="http://24hr.lightmytrip.com/public/images/Baggage-gray.svg"  />&nbsp; {{ $searchFlight["travelerPricings"][0]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] }} kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage</span> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="prishow">
                                                                <div class="tbfare">

                                                                    <div class="bookprc">
                                                                        <h5>{{ $searchFlight["price"]["currency"] .', '.$searchFlight["price"]['total']}}</h5>
                                                                        <a href="{{ url('agent/FlightList/details?data='.json_encode($searchFlight,true).'&dictionaries='.json_encode($flightresult['dictionaries']).'&px='.Request::get('px'))}}" type="button" class="btnvw"><i class="fas fa-plane"></i>&nbsp;&nbsp;Book Now</a>
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
								
													<span><img src="http://24hr.lightmytrip.com/public/images/Baggage-gray.svg"  />&nbsp; {{ $searchFlight["travelerPricings"][0]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] }} kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage</span>
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

                                                                    <span><img src="{{asset('public/images/Baggage-gray.svg')}}" />&nbsp; {{ $searchFlight["travelerPricings"][0]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] ?? '' }} kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="prishow">
                                                            <div class="tbfare">

                                                                <div class="bookprc">
                                                                    <h5>{{ $searchFlight["price"]["currency"] .', '.$searchFlight["price"]['total']}}</h5>
                                                                    <a href="{{ url('agent/FlightList/details?data='.json_encode($searchFlight,true).'&dictionaries='.json_encode($flightresult['dictionaries']).'&px='.Request::get('px'))}}" type="button" class="btnvw"><i class="fas fa-plane"></i>&nbsp;&nbsp;Book Now</a>
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

                                        </div><!-- .content-main end -->
                                    </div>
                                <div class="col-lg-3 col-md-3 col-lg-pull-9 col-md-pull-9 col-sm-12 cus_col_3">
                                   
                                       <div class="sidebar style-1 custom_sidebar">
													<a class="filter_close"><i class="fa fa-times"></i></a> 
													<h3>Filter <span onclick="ClearAll();" class="clearfilter">Clear All</span></h3>
													<div class="inner_filter">
														<div class="box-widget">
															<h5 class="box-title">Price Range</h5>
															<div class="box-content">
																<div class="slider-dragable-range slider-range-price">
																	<input type="text" class="price">
																	<div class="slider-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-slider-min-value="609" data-slider-max-value="23369" data-range-start-value="609" data-range-end-value="23369" data-slider-value-sign="₹"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>
																</div><!-- .slider-dragable-price end --> 											 				
															</div><!-- .box-content end -->
														</div><!-- .box-widget end -->
														<div class="box-widget"> 
															<h5 class="box-title">Departure Time</h5>
															<div class="box-content">
																<div class="slider-dragable-range slider-range-price-time">
																	<input type="text" class="time">
																	<div class="slider-range-t ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-slider-min-value="0" data-slider-max-value="24" data-range-start-value="0" data-range-end-value="24" data-slider-value-sign="Hr"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>
																</div><!-- .slider-dragable-range end -->
															</div><!-- .box-content end -->
														</div><!-- .box-widget end -->
														<!--<div class="box-widget">   
															<h5 class="box-title">Return</h5>
															<div class="box-content">
																<div class="slider-dragable-range slider-range-price">
																	<input type="text" class="price">
																	<div class="slider-range" data-slider-min-value="0" data-slider-max-value="24" data-range-start-value="5"
																		data-range-end-value="18" data-slider-value-sign="hr "></div>
																</div>
															</div>
														</div> -->
														<div class="box-widget">
															<h5 class="box-title">Stops</h5>
															<div class="box-content">
																<ul class="check-boxes-custom list-checkboxes">
																	
																	<li>
																		<label for="option1" class="label-container checkbox-default">Non Stop
																			<input name="options" class="Stopfliter" id="option1" type="checkbox" value="0" onclick="doFilter('stop',0,event);">
																			<span class="checkmark"></span>
																		</label>
																	</li>
																	<li>
																		<label for="option2" class="label-container checkbox-default">1 Stop
																			<input name="options" class="Stopfliter" id="option2" type="checkbox" value="1" onclick="doFilter('stop',1,event);">
																			<span class="checkmark"></span>
																		</label>
																	</li>
																	<li>
																		<label for="option3" class="label-container checkbox-default">1+ Stops
																			<input name="options" class="Stopfliter" id="option3" type="checkbox" value="2" onclick="doFilter('stop',2,event);">
																			<span class="checkmark"></span>
																		</label>
																	</li>
																</ul><!-- .check-boxes-custom end -->
															</div><!-- .box-content end -->
														</div><!-- .box-widget end -->
														<div class="box-widget">
															<h5 class="box-title">AirLine</h5>
															<div class="box-content">
																<ul id="myULair" class="check-boxes-custom list-checkboxes">
																																			<li style="display: list-item;">
																		<label class="label-container checkbox-default">
																																					Indigo
																																				
																			<input name="airline" class="chboxAirline" type="checkbox" value="" id="Chk6E" onclick="doFilter('flight','6E',event);">
																			<span class="checkmark"></span>
																		</label>
																		</li>
																																				<li style="display: list-item;">
																		<label class="label-container checkbox-default">
																																					Air India
																																				
																			<input name="airline" class="chboxAirline" type="checkbox" value="" id="ChkAI" onclick="doFilter('flight','AI',event);">
																			<span class="checkmark"></span>
																		</label>
																		</li>
																																				<li style="display: list-item;">
																		<label class="label-container checkbox-default">
																																					SpiceJet
																																				
																			<input name="airline" class="chboxAirline" type="checkbox" value="" id="ChkSG" onclick="doFilter('flight','SG',event);">
																			<span class="checkmark"></span>
																		</label>
																		</li>
																																				<li style="display: list-item;">
																		<label class="label-container checkbox-default">
																																					Vistara
																																				
																			<input name="airline" class="chboxAirline" type="checkbox" value="" id="ChkUK" onclick="doFilter('flight','UK',event);">
																			<span class="checkmark"></span>
																		</label>
																		</li>
																																				<li style="display: list-item;">
																		<label class="label-container checkbox-default">
																																					GO FIRST
																																				
																			<input name="airline" class="chboxAirline" type="checkbox" value="" id="ChkG8" onclick="doFilter('flight','G8',event);">
																			<span class="checkmark"></span>
																		</label>
																		</li>
																																		</ul><!-- .check-boxes-custom end -->
																<a href="javascript:;" id="airloadMore" style="display: none;">Show more</a>
															</div><!-- .box-content end -->
														</div><!-- .box-widget end -->
														<div class="box-widget">
															<h5 class="box-title">AirCraft Type</h5>
															<div class="box-content">
																<ul id="myUL" class="check-boxes-custom list-checkboxes">
																																			<li style="display: list-item;">
																		<label class="label-container checkbox-default">320
																			<input name="airline" class="chboxAirline" type="checkbox" value="" id="Chk320" onclick="doFilter('craft','320',event);">
																			<span class="checkmark"></span>
																		</label>
																		</li>
																																				<li style="display: list-item;">
																		<label class="label-container checkbox-default">330
																			<input name="airline" class="chboxAirline" type="checkbox" value="" id="Chk330" onclick="doFilter('craft','330',event);">
																			<span class="checkmark"></span>
																		</label>
																		</li>
																																				<li style="display: list-item;">
																		<label class="label-container checkbox-default">32B
																			<input name="airline" class="chboxAirline" type="checkbox" value="" id="Chk32B" onclick="doFilter('craft','32B',event);">
																			<span class="checkmark"></span>
																		</label>
																		</li>
																																				<li style="display: list-item;">
																		<label class="label-container checkbox-default">737
																			<input name="airline" class="chboxAirline" type="checkbox" value="" id="Chk737" onclick="doFilter('craft','737',event);">
																			<span class="checkmark"></span>
																		</label>
																		</li>
																																				<li style="display: list-item;">
																		<label class="label-container checkbox-default">32N
																			<input name="airline" class="chboxAirline" type="checkbox" value="" id="Chk32N" onclick="doFilter('craft','32N',event);">
																			<span class="checkmark"></span>
																		</label>
																		</li>
																																				<li style="display: list-item;">
																		<label class="label-container checkbox-default">319
																			<input name="airline" class="chboxAirline" type="checkbox" value="" id="Chk319" onclick="doFilter('craft','319',event);">
																			<span class="checkmark"></span>
																		</label>
																		</li>
																																				<li style="display: list-item;">
																		<label class="label-container checkbox-default">788
																			<input name="airline" class="chboxAirline" type="checkbox" value="" id="Chk788" onclick="doFilter('craft','788',event);">
																			<span class="checkmark"></span>
																		</label>
																		</li>
																																				<li style="display: list-item;">
																		<label class="label-container checkbox-default">321
																			<input name="airline" class="chboxAirline" type="checkbox" value="" id="Chk321" onclick="doFilter('craft','321',event);">
																			<span class="checkmark"></span>
																		</label>
																		</li>
																																				<li style="display: list-item;">
																		<label class="label-container checkbox-default">789
																			<input name="airline" class="chboxAirline" type="checkbox" value="" id="Chk789" onclick="doFilter('craft','789',event);">
																			<span class="checkmark"></span>
																		</label>
																		</li>
																																		</ul><!-- .check-boxes-custom end -->
																<a href="javascript:;" id="craftloadMore" style="display: none;">View more</a>
															</div><!-- .box-content end -->
														</div><!-- .box-widget end -->
														<!--<div class="box-widget">
															<h5 class="box-title">Airport</h5>
															<div class="box-content">
																<ul class="check-boxes-custom list-checkboxes">
																	<li>
																		<label class="label-container checkbox-default">All
																			<input type="checkbox">
																			<span class="checkmark"></span>
																		</label>
																	</li>
																</ul>
															</div>
														</div> -->
														<!--<div class="box-widget">
															<h5 class="box-title">Duration</h5>
															<div class="box-content">
																<div class="slider-dragable-range slider-range-time">
																	<div class="time">
																		<span class="slider-time-1">8:00 AM</span> - <span class="slider-time-2">3:00 PM</span>
																	</div>
																	<div class="sliders_step1">
																		<div class="slider-range" data-time-start-minutes="480" data-time-end-minutes="900"></div>
																	</div>
																</div>
															</div>
														</div>--> 
													</div>
													<div class="applyfilter_btn">
														<button type="button" class="apply_btn">Apply Filter</button>
													</div>
												</div>

                                </div><!-- .sidebar end -->

                            </div><!-- .col-lg-3 end -->
                            <div class="filter_icon">
                                <a href="javascript:;"><i class="fa fa-filter"></i> <span>Filiter</span></a>
                            </div>
                        </div><!-- .row end -->

                    </div><!-- .page-single-content end -->

                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->

    </div><!-- .section-content end -->

    </div><!-- .section-flat end -->

    </div><!-- #content-wrap -->

</section>
{{-- <input id='hfFilterData' type='hidden' value='{{json_encode($dataarray)}}' /> --}}

<input type="hidden" value='0' id="multifilter">
@endsection
