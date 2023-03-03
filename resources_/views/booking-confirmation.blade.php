@extends('layouts.frontend')
@section('title', 'Booking Confirmation')
@section('content')

<!-- Content
		============================================= -->
<div class="container">
    <div class="dts_heading">
        <h1 class="mtprew2">Booking Confirmation</h1>
    </div>
    <div class="nty_txt">
        <span>Departure Flight</span>
    </div>

    <div class="boxcnfim">
        <div class="confirm_bx">
		  
            <div class="imgflight_cm">
                <span>
				@if($flights['oneway']['image'])
				<img src="{{$flights['oneway']['image']}}" class="img-res" />
				@else
				<i class="fas fa-plane"></i><i class="fas fa-plane"></i>
				@endif
				</span>
              
                 <h3>{{$flights['oneway']['depature_carrierCode']}}
                    <span>{{$flights['oneway']['flight_number']}}</span>
                </h3>
                {{-- <p>Subclass Q ( Economy )</p> --}}
            </div>
            <div class="centertxt_cm">
                <div class="datetm">
                    <h5>
					
					{{ date('D, M d Y', strtotime($flights["depature_date"]["oneway"]) )}}</h5>
                </div>

                <div class="settm_txt">
                    <div class="timeset">
                        <h6 class="tom1">{{ date('H', strtotime($flights["depature_date"]["oneway"]) )}}&nbsp;:&nbsp;{{ date('i', strtotime($flights["depature_date"]["oneway"]) )}}</h6>
                        <h6 class="tom2">{{ date('H', strtotime($flights["depature_date"]["oneway_ret"]) )}}&nbsp;:&nbsp;{{ date('i', strtotime($flights["depature_date"]["oneway_ret"]) )}}</h6>
                    </div>

                    <div class="textsm">
                        <p class="mbp1">{{ $flights['oneway']['dep_city_name']}} ({{ $flights['oneway']['dep_city_code']}})
                            <span>{{ $flights['oneway']['dep_airport_name']}} - Terminal -- {{ $flights['oneway']['dep_terminal']}}</span> </p>

                        <p class="mbp2">{{ $flights['oneway']['arrival_city_name']}} ({{ $flights['oneway']['arrival_city_code']}})
						<span>{{ $flights['oneway']['arrival_airport_name']}} - Terminal -- {{ $flights['oneway']['arrival_terminal']}}
                            </span></p>
                    </div>
                </div>
                @if(count($flights['oneway']['one_way_route']) > 1)
                <div class="msgipt">
                    <h4><i class="fa fa-info-circle"></i>Stop to change planes in
                    @foreach($flights['oneway']['one_way_route'] as $key => $value)
					@php $depTime = \Carbon\Carbon::parse($value['dep_time'])@endphp
					@php $arrTime = \Carbon\Carbon::parse($value['arrival_time']) @endphp
					@php $def = $depTime->diffInSeconds($arrTime) @endphp
	                @if(!$loop->last)
					 {{$value['arr_city_name']}} ({{gmdate('H', $def)}}h:{{gmdate('i', $def)}}m)
					 @endif
					@endforeach
					 </h4>
                    <span>At this stop, you need to:</span>
                    <p><i class="fa fa-check"></i>&nbsp;Check local regulation as it may be impacted by
                        travel ban and prepare transit visa only if required
                        by this country</p>
                </div>
				@endif
            </div>
            <div class="rightid_cm">
                <div class="idtck">
                    <h4><span>Traveloka Booking ID</span>
                        {{$flights["booking_id"]}}</h4>
                    <h4><span>Airline Booking Code (PNR)</span>
                        {{$flights["booking_code"]}}</h4>
                    <span>REFUNDABLE</span>

                </div>

            </div>
        </div>
        @if($flights['trip'] == 2)
        <div class="confirm_bx">
            <div class="imgflight_cm">
                <span><img src="{{$flights['twoway']['image']}}" class="img-res" /></span>
                <h3>{{$flights['twoway']['depature_carrierCode']}}
                    <span>{{$flights['twoway']['flight_number']}}</span>
                </h3>
                {{-- <p>Subclass Q ( Economy )</p> --}}
            </div>
            <div class="centertxt_cm">
                <div class="datetm">
                    <h5>{{ date('D, M d Y', strtotime($flights["twoway"]['two_way_route'][0]['dep_time']) )}}</h5>
                </div>

                <div class="settm_txt">
                    <div class="timeset">
                        <h6 class="tom1">{{ date('H', strtotime($flights["twoway"]['two_way_route'][0]['dep_time']) )}}&nbsp;:&nbsp;{{ date('i', strtotime($flights["twoway"]['two_way_route'][0]['dep_time']) )}}</h6>
                        <h6 class="tom2">{{ date('H', strtotime($flights["twoway"]['two_way_route'][0]['arrival_time']) )}}&nbsp;:&nbsp;{{ date('i', strtotime($flights["twoway"]['two_way_route'][0]['arrival_time']) )}}</h6>
                    </div>

                    <div class="textsm">
                        <p class="mbp1">{{$flights['twoway']['dep_city_name']}} ({{$flights['twoway']['dep_city_code']}})
                            <span>{{$flights['twoway']['dep_airport_name']}}} - Terminal {{$flights['twoway']['dep_terminal']}}</span> </p>

                        <p class="mbp2">{{$flights['twoway']['arrival_city_code']}} ({{$flights['twoway']['arrival_city_name']}})<span>{{$flights['twoway']["arrival_airport_name"]}} - Terminal {{$flights['twoway']["arrival_terminal"]}}
                            </span></p>
                    </div>
                </div>


            </div>

        </div>
        @endif
    </div>



    <div class="ticketds1">
        <div class="ticketb alps">
            <p><i class="fas fa-ticket-alt"></i>Present e-ticket and
                passport at check-in</p>
        </div>

        <div class="timeb alps">
            <p><i class="fa fa-clock" aria-hidden="true"></i>Check-in <b>at least 90
                    minutes</b> before
                departure</p>
        </div>

        <div class="iftxr alps">
            <p><i class="fa fa-info-circle" aria-hidden="true"></i>All times shown are in
                local airport time</p>
        </div>
    </div>

    <div class="bagdels">
        <div class="table-responsive">
            <table class="table tblsc">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Destination</th>
                        <th>Route</th>
                        <th>Total Passengers</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td> 
                        <td>
						{{ $flights['oneway']['dep_city_name']}} ({{ $flights['oneway']['dep_city_code']}}) <br>
						{{ $flights['oneway']['arrival_city_name']}}  ({{ $flights['oneway']['arrival_city_code']}})
						</td> 
                        <td>
						  @foreach($flights['oneway']['one_way_route'] as $key=>$onewwayrt) 
						  <span class="bgvx">
						{{ $onewwayrt['dep_city_code']}} - {{ $onewwayrt['arr_city_code']}}
						</span>
						@endforeach
						</td>
                        <td><i class="fa fa-suitcase" aria-hidden="true"></i>&nbsp;{{count($flights["passengers"])}}</td>
                    </tr>
                    @if($flights['trip'] == 2)
                    <tr>
                        <td>2</td> 
                        <td>
						{{ $flights['twoway']['dep_city_name']}} ({{ $flights['twoway']['dep_city_code']}}) <br>
						{{ $flights['twoway']['arrival_city_name']}}  ({{ $flights['twoway']['arrival_city_code']}})
						</td> 
                        <td>
						  @foreach($flights['twoway']['two_way_route'] as $key=>$twowwayrt) 
						  <span class="bgvx">
						{{ $twowwayrt['dep_city_code']}} - {{ $twowwayrt['arr_city_code']}}
						</span>
						@endforeach
						</td>
                        <td><i class="fa fa-suitcase" aria-hidden="true"></i>&nbsp;{{count($flights["passengers"])}}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="psedl">
            <h3>Passenger Details</h3>
            <div class="table-responsive">
                <table class="table tblsc">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Passenger(s)</th>
                            <th>Gender</th>
                            <th>Flight Facilities</th>
                        </tr>
                    </thead>
                    <tbody>
					  @foreach($flights["passengers"] as $key=>$traveler) 
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$traveler["fullname"]}} ({{$traveler["type"]}})</td>
                            <td>{{$traveler["gender"]}}</td>
                            <td>{{$traveler["luggage"]}} {{$traveler["luggage_unit"]}}</td>
                        </tr>
                        
						@endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="contsbox borderals">
        <div class="aldsa">
            <h3>Airline Conditions of Carriage</h3>
            <p>Please read and understand the following airline's conditions of carriage</p>
        </div>
        <div class="envxs">
            <span><img src="{{asset('images/emirets_img.jpg')}}" class="img-res"></span>
            <span>Emirates&nbsp;&nbsp;:&nbsp;&nbsp;<a href="{{ URL::to('/')}}">{{ URL::to('/')}}</a></span>
        </div>
    </div>

    <div class="contsbox borderals">
        <div class="aldsa">
            <h3><i class="fa fa-info-circle"></i>&nbsp;advisory_title</h3>
            <p>advisory_rule</p>
        </div>
    </div>

    <div class="contsbox borderals">
        <div class="aldsa">
            <h3>How to Reschedule</h3>
            <ul class="lsrt_nb">
                <li>Log in to your 24hr.lightmytrip account via <a href="{{ URL::to('login')}}">24hr.lightmytrip</a> or your Traveloka App.</li>
                <li>Go to <b>My Booking</b> and open the booking you want to reschedule. If rescheduling is available for your booking, click <b>Request Reschedule.</b></li>
                <li>Don’t worry, your initial booking will still be valid until your new e-ticket is issued.</li>
                <li>Select the flight and passenger you want to reschedule.</li>
                <li>Enter your new preferred flight details. Then, select your new flight.</li>
                <li>Check your booking details and click <b>Continue</b> e to submit your reschedule request.</li>
                <li>If the price was not available when you were selecting your new flight, wait for your new ticket price to be
                    confirmed.
                </li>
                <li>If you need to pay for the fare difference or rescheduling fee, please complete your payment within the given time
                    limit.</li>
                <li>After your payment is successful, you will receive your new e-ticket in <b>My Booking</b> and email.</li>

            </ul>
        </div>
    </div>

    <div class="contsbox borderals">
        <div class="aldsa">
            <h3>How to Refund</h3>
            <ul class="lsrt_nb">
                <li>Log in to your 24hr.lightmytrip account via <a href="{{URL::to('login')}}">Travel24</a> or your lightmytrip App.</li>
                <li>Go to <b>My Booking</b> and open the booking you want to refund. Then, click <b>Request Refund.</b></li>
                <li>Don’t worry, your booking will still be valid until you have submitted your refund request</li>
                <li>Read the general refund info about your booking. If your flight is refundable, click <b>k Start My Refund</b> to begin your
                    refund process.
                </li>
                <li>Select your refund reason and the passenger you want to refund.
                </li>
                <li>Complete your refund requirements, such as uploading your refund documents or filling in your bank account
                    details.
                </li>
                <li>Review your refund details and click <b>Submit Refund.</b>
                </li>
                <li>We will review your refund request and forward it to the airline.</li>
                <li>You will be notified of every progress of your refund. But, you can also keep track of your refund status via <b>My
                        Booking.
                    </b></li>

            </ul>
        </div>

        <div class="nty_txt">
            <span>All refund should be processed through Traveloka. Otherwise, refund will not be approved by airline</span>
        </div>
    </div>



    <div class="borderals">
        <div class="inds_box">
            <p>FOR ANY QUESTIONS, VISIT TRAVELOKA HELP CENTER:
                <span><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;<a href="{{URL::to('contact')}}">Contact</a></span>
            </p>
            <p class="text-right">
                BOOKING ID
                <span><i class="fas fa-ticket-alt"></i>&nbsp;806844169</span>
            </p>
        </div>
    </div>

    <div class="trck_gr">
        <div class="boxig_tx wigg1">
            <div class="img_ft_gg">
                <img src="{{asset('public/images/printic.png')}}" class="img-res">

            </div>
            <div class="boxig_tx_gg">
                <h5>No Need to Print</h5>
                <p>Save trees, go paperless!
                    View and use your item upon
                    redemption or entry by
                    going to My Booking in
                    Traveloka App.</p>
            </div>
        </div>

        <div class=" wigg2">
            <div class="apqr">
                <div class="boxig_tx">
                    <div class="img_ft_gg smalsw">
                        <img src="{{asset('public/images/livelc.png')}}" class="img-res">
                    </div>
                    <div class="boxig_tx_gg">
                        <h5>No Need to Print</h5>
                        <p>Save trees, go paperless!
                            View and use your item upon
                            redemption or entry by
                            going to My Booking in
                            Traveloka App.</p>
                    </div>
                </div>

                <div class="qrboxsd">
                    <span>
                        <img src="{{asset('public/images/qr-codeb.png')}}" class="imgres">
                    </span>
                    <span>
                        <a href="#">
                            <img src="{{asset('public/images/g.png')}}" class="imgres">
                        </a>
                        <a href="#">
                            <img src="{{asset('public/images/a.png')}}" class="imgres">
                        </a>
                    </span>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
