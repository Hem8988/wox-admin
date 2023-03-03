@extends('layouts.frontend')
@section('title', 'Become an Affiliate')
@section('content')

<style>
    header,.hidepg1 {
        display: none;
    }
    html {
  scroll-behavior: smooth;
}
    .footer_bottom h6,.footer_bottom .foote_bottom_ul_amrc, .footer_bottom .social_footer_ul{text-align: center;}
    footer{min-height: auto;}


</style>
<script>
    $(document).ready(function() {
        $(".csldbar").click(function() {
            $(".navmd").toggleClass("ngs");
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.testml').slick({
            dots: true,
            autoplay:true,
            infinite: false,
            nextArrow:false,
            prevArrow:false,
            speed: 300,
            slidesToShow: 2,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
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
    })
</script>
<section class="header_new">
    <div class="container">
        <div class="boxnew_hrd">
            <div class="logolf">
                <a href="{{ URL::to('become-an-affiliate')}}">
                    <img src="{{asset('public/images/logo-header.png')}}" data-logo-alt="{{asset('public/images/logo-header.png')}}" alt="">
                </a>

                <span class="csldbar"><i class="fa fa-bars"></i></span>
            </div>

            <div class="navmd">
                <ul class="clearfix">
                    <li class="nvm1"><a href="{{URL::to('become-an-affiliate')}}">Home</a></li>
                    <li class="nvm2"><a href="#fdvx">FeedBacks</a></li>
                    <li class="nvm3"><a href="{{URL::to('agent/login')}}">Sign&nbsp;In</a></li>
                    <li class="nvm4"><a href="{{URL::to('affiliate-partner')}}">Sign&nbsp;Up</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Content
		============================================= -->
<section class="topbaner_af ">
    <div class="container">
        <div class="bnrtop">
            <div class="textbnr_af">
                <h1>Earn Income on all travel products as a Travel24hr Affiliate.</h1>
                <a href="{{URL::to('affiliate-partner')}}">Get Started</a>
            </div>
        </div>
    </div>
</section>

<section class="wyaft">
    <div class="container">
        <div class="WhyBecome_txt noneb">
            <h3>Journey with Us</h3>
            <p>Travel24hr is a unique travel platform that allows travel agents to compare and
                book flights, hotel according to your client’s travel needs. Our Affiliate
                Programme allows you to bring the Travel24hr experience to your audience
                and to grow earnings with our mark-up system.</p>
        </div>

    </div>


    <div class="BecomeAffiliatebx">
        <div class="container">
            <div class="WhyBecome_txt">
                <h3>Why Become an Affiliate ?</h3>
            </div>


            <div class="flex4box">
                <div class="afflx">
                    <span> <img src="/images/Discounted.png" alt="" class="img-res"></span>
                    <h3>Discounted Travel Deals</h3>
                    <p>Take advantage of our unmatched
                        discount deals on airfares, hotels, airport
                        pickup services, and visa services.</p>
                </div>

                <div class="afflx">
                    <span> <img src="/images/Mark-up.png" alt="" class="img-res"></span>
                    <h3>Mark-up</h3>
                    <p>With our mark-up future you can earn
                        high commission on sold tickets! </p>
                </div>

                <div class="afflx">
                    <span> <img src="/images/Agent.png" alt="" class="img-res"></span>
                    <h3>Agent Portal</h3>
                    <p>Air ticket booking engine
                        Banners (active links to our website)
                        Administrator’s Panel On-line Team
                        Contact, Unlimited substantive support</p>
                </div>


            </div>
            <div class="gtst">
                <a href="#">Get Started</a>
            </div>


        </div>


    </div>


    <div class="container scs" id="fdvx">
        <div class="WhyBecome_txt">
            <h3>Feedbacks from our happy Customers</h3>
        </div>
        <div class="testml">
<div>
    <div class="tstbx">
        <p>I noticed that the Affiliate Mobile App is swift, easy to locate on App store and user friendly
        </p>
        <h6>Mr. Adamu</h6>
    </div>
</div>
<div>
    <div class="tstbx">
        <p>I noticed that the Affiliate Mobile App is swift, easy to locate on App store and user friendly
        </p>
        <h6>Mr. Adamu</h6>
    </div>
</div>
<div>
    <div class="tstbx">
        <p>I noticed that the Affiliate Mobile App is swift, easy to locate on App store and user friendly
        </p>
        <h6>Mr. Adamu</h6>
    </div>
</div>
<div>
    <div class="tstbx">
        <p>I noticed that the Affiliate Mobile App is swift, easy to locate on App store and user friendly
        </p>
        <h6>Mr. Adamu</h6>
    </div>
</div>
        </div>
    </div>

<div class="boxstep">
    <div class="container">
<div class="WhyBecome_txt">
            <h3>How does the affiliate program work?</h3>
        </div>
        <div class="stpebox">
            <div class="sp1">
                <span>1</span>
                <h3>Connect
                    <span>Sign up an an Affiliate 
                    </span>
                </h3>

            </div>

            <div class="sp1">
                <span>2</span>
                <h3>Activation
                    <span>Check Email for account activation</span>
                </h3>

            </div>

            <div class="sp1">
                <span>3</span>
                <h3>Funding
                    <span>Fund account and start selling</span>
                </h3>

            </div>
        </div>
</div></div>



       <div class="container">
       <div class="WhyBecome_txt">
            <h3>Frequently Asked Questions</h3>
        </div>
       <div class="flex4box">
<div class="grntybox">
    <span> <img src="/images/SatisfactionGuarantee.png" alt="" class="img-res"></span>
    <div class="txtgrnty">
        <h6>Satisfaction Guarantee</h6>
        <p>Receive a refund on your travel insurance premium within 10 days of purchase.</p>
    </div>
</div>

<div class="grntybox">
    <span> <img src="/images/NeedHelp.svg" alt="" class="img-res"></span>
    <div class="txtgrnty">
        <h6>Need 24hr.lightmytrip Help?</h6>
        <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
        <a href="tel:09122195512"><i class="fa fa-phone"></i>09122195512</a>
        <a href="mailto:affiliate@travel24hr.com"><i class="fa fa fa-envelope"></i>affiliate@travel24hr.com</a>
    </div>
</div>

</div>
       </div>






</section>


@endsection