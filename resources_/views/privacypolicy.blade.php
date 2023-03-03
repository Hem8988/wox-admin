@extends('layouts.frontend')
@section('title', 'Privacy Policy')
@section('content')

<!-- Content
		============================================= -->
		<section class="breadcumb privacy_top">
	<div class="banner_txt">
		<ul class="clearfix">
			<li class="homebread"><a href="http://24hr.lightmytrip.com/"><i class="fa fa-home"></i></a></li>
			<li>
				<h1>Privacy Policy</h1>
			</li>
		</ul>
	</div>
</section>
<section class="container pdtop_b">
	<div class="row">
	  
	  {!! $privacy->content !!}
	
	</div>
</section>
	<br>	<br>

@endsection