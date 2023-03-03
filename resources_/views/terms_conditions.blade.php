@extends('layouts.frontend')
@section('title', 'Terms and Conditions')
@section('content')

<!-- Content
		============================================= -->
<section class="breadcumb term_top">
	<div class="banner_txt">
		<ul class="clearfix">
			<li class="homebread"><a href="http://24hr.lightmytrip.com/"><i class="fa fa-home"></i></a></li>
			<li>
				<h1>Terms and Conditions</h1>
			</li>
		</ul>
	</div>
</section>
<section class="container pdtop_b">
	<div class="row">

	   {!!  $term->content !!}

			
		</div>
	</div>
</section>
<br> <br>

@endsection