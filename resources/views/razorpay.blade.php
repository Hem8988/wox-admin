@extends('layouts.frontend')
@section('pagespecificstyles')
	<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '209301530459904');
fbq('track', 'AddPaymentInfo');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=209301530459904&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            @if($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Error!</strong> {{ $message }}
                </div>
            @endif
            {!! Session::forget('error') !!}
            @if($message = Session::get('success'))
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> {{ $message }}
                </div>
            @endif
            {!! Session::forget('success') !!}
            <div class="panel panel-default">
                <div class="panel-heading">Pay With Razorpay</div>
<?php
$rzkey = \App\MyConfig::where('meta_key','rz_paykey')->first()->meta_value;
$set = \App\Admin::where('id',1)->first();
?>
                <div class="panel-body text-center">
                    <form action="{!!route('userpaywithrazorpay')!!}" method="POST" > 
                        <!-- Note that the amount is in paise = 50 INR -->
                        <!--amount need to be in paisa-->
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{$rzkey}}"
                                data-amount="{{$amount}}"
                                data-buttontext="Pay {{$finaltotal}} INR"
                                data-name="Book Flight"
                                data-description="Order Value"
                                data-image="{{URL::to('/public/img/profile_imgs')}}/{{@$set->logo}}"
                                data-prefill.name="{{@$name}}"
                                data-prefill.email="{{@$email}}"
								data-prefill.contact="{{@$phone}}"
								 data-order_id="<?php echo $razorpayOrderId; ?>"
                                data-theme.color="#ff7529">
                        </script>
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $(window).on('load', function() {
    $('.razorpay-payment-button').click();
  });
</script>
@endsection