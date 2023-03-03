<?php use App\Http\Controllers\Controller; ?>
<?php $set = \App\Admin::where('id',1)->first(); ?>
<?php $booking = json_decode($fetchedData->booking_response); 
		$bookingib = json_decode($fetchedData->booking_response_ib);
		?>
<!DOCTYPE html>
<html lang="en-US">
<head>			
</head>
<body>
	<div style="border: 1px solid #89ad3e;padding: 30px;max-width: 1140px;width: 100%;margin: 0px auto;padding-left: 15px;padding-right: 15px;font-family: Verdana, Geneva, Tahoma, sans-serif">
		<div style="background:#f1f1f1;padding: 10px;border:1px solid #ddd;border-radius:10px;">
			<div style="width:50%; float:left; color:#214a93">
				<div style="width:100%;font-size:24px;">
					<strong style="color:#214a93;">E-Ticket</strong>
				</div>
				<span style="display:block;"><b style="color:#214a93;"> Booking ID : </b> {{$booking->booking_id}}</span>
				<span style="display:block;"><b style="color:#214a93;">Booking Date : </b> {{date('D d/m/Y', strtotime($fetchedData->created_at))}}</span>
				<span style="display:block;"><b style="color:#214a93;">Ticket No. : </b> {{$fetchedData->pnr}}</span>
			</div>  
			
			<div style="width:50%;float:right;text-align:right;">
				<img style="width:auto;" src="{{URL::to('/public/img/profile_imgs/logo-header.png')}}">
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<div style="height:20px;"></div> 
		<!-- <div style="width:100%;display: flex;flex-wrap: wrap;">
			<hr style="border: 1px solid #214a93; width:100%;">
		</div> -->
		<div style="width:100%;display: flex;flex-wrap: wrap;">
			<div style="background:#f9f9f9;color:#000;border-radius: 5px;max-width: 100%;flex: 0 0 100%;position: relative;min-height: 1px;padding-right: 0px;padding-left: 0px;border-top:3px solid #89ad3e;">
				<span style="font-size:16px;line-height:21px; padding:8px;display: block;">Passenger Details</span>
			</div>
		</div>
		<div style="max-width: 100%;flex: 0 0 100%;position: relative;min-height: 1px;padding-right:15px;padding-left: 15px;">
			<br>
			<table style=" border: 1px solid #dee2e6;border-collapse: collapse;" width="100%">
				<tbody>	
					<tr>
						<th style="border: 1px solid #dee2e6; color:#214a93;text-align:center;">Sr. No.</th>
						<th style="border: 1px solid #dee2e6; color:#214a93;text-align:center;">Passenger(s) Name/ Type</th>
						<th style="border: 1px solid #dee2e6; color:#214a93;text-align:center;">Gender</th>
							<th style="border: 1px solid #dee2e6; color:#214a93;text-align:center;">Cabin</th>
						
						<th style="border: 1px solid #dee2e6; color:#214a93;text-align:center;"> Price</th>
						<th style="border: 1px solid #dee2e6; color:#214a93;text-align:center;"> Extra Baggage/ Meal</th>
						{{-- @if(isset($bookingib->Response->Response->FlightItinerary->Passenger))
							<th style="border: 1px solid #dee2e6; color:#214a93;text-align:center;"> Extra Baggage/ Meal(R).</th>
						@endif --}}
					</tr>
					
						
						@foreach($booking->passengers as $key => $value)
							<tr>
							<td style="border: 1px solid #dee2e6; color:#214a93;text-align:center;">{{$key+1}}</td>
							<td style="border: 1px solid #dee2e6; color:#214a93;text-align:center;">{{ $value->fullname}} ({{ $value->type}})</td>
							<td style="border: 1px solid #dee2e6; color:#214a93;text-align:center;">{{ $value->gender}}</td>
							<td style="border: 1px solid #dee2e6; color:#214a93;text-align:center;">{{ $value->cabin}}  ({{ $value->class}})</td>
							<td style="border: 1px solid #dee2e6; color:#214a93;text-align:center;">{{ $value->currency}}  ({{ $value->price}})</td>
							<td style="border: 1px solid #dee2e6; color:#214a93;text-align:center;">{{ $value->luggage}}  ({{ $value->luggage_unit}})</td>
							</tr>
						@endforeach
					
				
				</tbody>
			</table>
		</div>
		<br>
		<br>
		<div style="width:100%;display: flex;flex-wrap: wrap;">
			<div style="background:#f9f9f9;color:#000;border-radius: 5px;max-width: 100%;flex: 0 0 100%;position: relative;min-height: 1px;padding-right: 0px;padding-left: 0px;border-top:3px solid #89ad3e;">
				<span style="font-size:16px;line-height:21px;padding:8px;display: block;">
				 {{$booking->oneway->dep_city_name}} - 
				{{$booking->oneway->arrival_city_name}}
				({{date('D d/m/Y', strtotime($booking->oneway->one_way_route[0]->dep_time))}}) 
				(Onward)</span>
			</div>
		</div>
		<div style="max-width: 100%;flex: 0 0 100%;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
			<br>
			<table style=" border: 1px solid #dee2e6;border-collapse: collapse;" width="100%">
				<tbody>
					<tr>
						<th style="border: 1px solid #dee2e6;color:#214a93;background: #f3f3f3; text-align:center;" width="15%">Flight(s)</th>
						<th style="border: 1px solid #dee2e6;color:#214a93;background: #f3f3f3; text-align:center;" width="25%">Departure</th>
						<th style="border: 1px solid #dee2e6;color:#214a93; background: #f3f3f3;text-align:center;" width="25%">Arrival</th>
						<th style="border: 1px solid #dee2e6;color:#214a93;background: #f3f3f3; text-align:center;" width="15%">PNR</th>
						<th style="border: 1px solid #dee2e6;color:#214a93;background: #f3f3f3; text-align:center;" width="5%">Duration</th>
					</tr>
					
					 <tr>
						<td style="border: 1px solid #dee2e6; text-align:center;">
							<img src=" {{$booking->oneway->image}}"><br>
							<small>
							{{$booking->oneway->depature_carrierCode}}-
								{{$booking->oneway->flight_number}}<br> 
							{{ (count($booking->oneway->one_way_route) -1) }}
								non-stop
						</small>
						</td>
						<td style="border: 1px solid #dee2e6; text-align:center;"><small>
						{{$booking->oneway->dep_airport_name}} 
						 						{{$booking->oneway->dep_city_name}} <br>
						  {{date('d/m/Y H:i:s', strtotime($booking->oneway->one_way_route[0]->dep_time))}}<br>
						   Terminal  {{$booking->oneway->dep_terminal}}</small>
						   </td>
						<td style="border: 1px solid #dee2e6; text-align:center;"><small>
						{{$booking->oneway->arrival_airport_name}}  
						  {{$booking->oneway->arrival_city_name}}<br> 
						  {{date('d/m/Y H:i:s', strtotime($booking->oneway->one_way_route[0]->arrival_time))}}<br> 
						  Terminal  {{$booking->oneway->dep_terminal}} </small></td>
						<td style="border: 1px solid #dee2e6; text-align:center;"><small><b>
						{{$fetchedData->pnr}}</b></small></td>
						<td style="border: 1px solid #dee2e6; text-align:center;"><b><small>
						<?php echo Controller::GetTimeduration($booking->oneway->one_way_route[0]->dep_time, $booking->oneway->one_way_route[0]->arrival_time); ?>
						</small></b></td>
					</tr> 
				</tbody>
				<tfoot>
				<tr>
					 {{-- <td colspan="5"> Cabin: {{@$booking->Response->Response->FlightItinerary->Segments[0]->CabinBaggage }}
					 | Check-In: {{@$booking->Response->Response->FlightItinerary->Segments[0]->Baggage}}</td>  --}}
				</tr>
			</tfoot>
			</table>
		</div>
		<br>
		<br>
	
	 @if($booking->trip == 2)
		<div style="width:100%;display: flex;flex-wrap: wrap;">
			<div style="background:#f9f9f9;color:#000;border-radius: 5px;max-width: 100%;flex: 0 0 100%;position: relative;min-height: 1px;padding-right: 0px;padding-left: 0px;border-top:3px solid #89ad3e;">
				<span style="font-size:16px;line-height:21px;padding:8px;display: block;">
				{{$booking->twoway->dep_city_name}} - 
				{{$booking->twoway->arrival_city_name}}
				({{date('D d/m/Y', strtotime($booking->twoway->two_way_route[0]->dep_time))}})  (Return)</span>
			</div>
		</div>
		<div style="max-width: 100%;flex: 0 0 100%;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
			<br>
			<table style=" border: 1px solid #dee2e6;border-collapse: collapse;" width="100%">
				<tbody>
					<tr>
						<th style="border: 1px solid #dee2e6;color:#214a93;background: #f3f3f3; text-align:center;" width="15%">Flight(s)</th>
						<th style="border: 1px solid #dee2e6;color:#214a93;background: #f3f3f3; text-align:center;" width="25%"> Departure</th>
						<th style="border: 1px solid #dee2e6;color:#214a93; background: #f3f3f3;text-align:center;" width="25%">Arrival</th>
						<th style="border: 1px solid #dee2e6;color:#214a93;background: #f3f3f3; text-align:center;" width="15%">PNR</th>
						<th style="border: 1px solid #dee2e6;color:#214a93;background: #f3f3f3; text-align:center;" width="5%">Duration</th>
					</tr>
					
		<tr>
			<td style="border: 1px solid #dee2e6; text-align:center;">
				<img src=" {{$booking->twoway->image}}"><br>
							<small>
							{{$booking->twoway->depature_carrierCode}}-
								{{$booking->twoway->flight_number}}<br> 
							{{ (count($booking->twoway->two_way_route) -1) }}
								non-stop
						
						</small>
			</td>
			<td style="border: 1px solid #dee2e6; text-align:center;"><small>
						{{$booking->twoway->dep_airport_name}} 
						 						{{$booking->twoway->dep_city_name}} <br>
						  {{date('d/m/Y H:i:s', strtotime($booking->twoway->two_way_route[0]->dep_time))}}<br>
						   Terminal  {{$booking->twoway->dep_terminal}}</small>
						   </td>
						<td style="border: 1px solid #dee2e6; text-align:center;"><small>
						{{$booking->twoway->arrival_airport_name}}  
						  {{$booking->twoway->arrival_city_name}}<br> 
						  {{date('d/m/Y H:i:s', strtotime($booking->twoway->two_way_route[0]->arrival_time))}}<br> 
						  Terminal  {{$booking->twoway->dep_terminal}} </small></td>
						<td style="border: 1px solid #dee2e6; text-align:center;"><small><b>
						{{$fetchedData->pnr}}</b></small></td>
						<td style="border: 1px solid #dee2e6; text-align:center;"><b><small>
						<?php echo Controller::GetTimeduration($booking->twoway->two_way_route[0]->dep_time, $booking->twoway->two_way_route[0]->arrival_time); ?>
						</small></b></td>
		</tr>
		@endif
	</tbody>
	<tfoot>
				<tr>
					{{-- <td colspan="5"> Cabin: {{@$bookingib->Response->Response->FlightItinerary->Segments[0]->CabinBaggage }}| Check-In: {{@$bookingib->Response->Response->FlightItinerary->Segments[0]->Baggage}}</td> --}}
				</tr>
			</tfoot>
</table>
</div>
<br>
<br>
<div style="width:100%;display: flex;flex-wrap: wrap;">
<div style="background:#f9f9f9;color:#000;border-radius: 5px;max-width: 100%;flex: 0 0 100%;position: relative;min-height: 1px;padding-right: 0px;padding-left: 0px;border-top:3px solid #89ad3e;">
	<span style="font-size:16px;line-height:21px;padding:8px;display: block;">Payment Details (Onward)</span>
</div>
</div>
<div style="max-width: 100%;flex: 0 0 100%;position: relative;min-height: 1px;padding-right:15px;padding-left: 15px;">
<br>
<?php
$paymentdta = \App\PaymentDetail::where('bookingid', $fetchedData->id)->first();
$discount =0;
?>
<table style=" border: 1px solid #dee2e6;border-collapse: collapse;" width="100%">
	<tbody>
		<tr>
			<th style="border: 1px solid #dee2e6;color:#214a93;background: #f3f3f3; text-align:center;" width="80%">Payment Details</th>
			<th style="border: 1px solid #dee2e6;color:#214a93;background: #f3f3f3; text-align:center;" width="20%"><i class="fa fa-inr"></i> Amount (INR)</th>
		</tr>
		<tr>
			<td style="border: 1px solid #dee2e6; text-align:center;">Total Base Fare</td>
			<td style="border: 1px solid #dee2e6; text-align:right;">{{$paymentdta->org_amount}}</td>
					</tr>
					@if(@$paymentdta->discount_amount != 0)
						<?php
					
						if($paymentdta->discount_type == 'percentage'){
							$discounttype = $paymentdta->discount_amount.'%';
							$discount = ($paymentdta->org_amount * $paymentdta->discount_amount/100);
						}else{
							$discounttype = 'INR'.$paymentdta->discount_amount;
							$discount = $paymentdta->discount;
						}
					?>
					<tr>
						<td style="border: 1px solid #dee2e6; text-align:center;">Discount {{@$paymentdta->coupon_id}} ({{@$discounttype}})</td>
						<td style="border: 1px solid #dee2e6; text-align:right;">{{round($discount)}}</td>
					</tr>
					@endif
					<!--<tr>
						<td style="border: 1px solid #dee2e6; text-align:center;">Convenience Fee</td>
						<td style="border: 1px solid #dee2e6; text-align:right;">00.00</td>
					</tr>-->
					<tr>
						<th style="border: 1px solid #dee2e6;color:#214a93;background: #f3f3f3; text-align:center;" width="80%">Grand Total</th>
						<th style="border: 1px solid #dee2e6;color:#214a93;background: #f3f3f3; text-align:right;" width="20%"><i class="fa fa-inr"></i> {{round(@$paymentdta->org_amount - $discount)}}</th>
					</tr>
				</tbody>
			</table>
		</div>
		<br>
		<br>
		
		<div style="width:100%; margin-bottom: 2px; margin-top:10px;">
		<div style="width:50%;display:inline-block;text-align:right">
		  <div class="w3-light-grey w3-round-large" style="margin-bottom: 2px; margin-top:2px;text-align:left;display:flex;justify-content:flex-end;">
			<div class="w3-container w3-blue w3-round-large" style="width:100%;text-align:center;"><b>Customer E-mail :</b><br> {{@$fetchedData->user->email}}</div>
		  </div>
		</div>
	 <div style="width:50%;display:inline-block;text-align:right">
      <div class="w3-light-grey w3-round-large" style="w3-light-grey w3-round-large" style="text-align:left;display:flex;justify-content:flex-end;">
        <div class="w3-container w3-blue w3-round-large" style="width:100%;text-align:center;float:right;"><b>Customer Contact No:</b> <br>{{@$fetchedData->mobile}}</div>
		
      </div>
	  <div style="clear:both;float:none;"></div>
    </div>
   
    
  </div>
		
		
		<div style="width:100%;display: flex;flex-wrap: wrap;">
			<hr style="border: 1px solid #214a93; width:100%;">
		</div>
		<div style="width:100%;display: flex;flex-wrap: wrap;">
			<div style="max-width: 100%;flex: 0 0 100%;position: relative;min-height: 1px;padding-right: 0px;padding-left: 0px;font-size:16px;line-height:24px;"><b>Important Information :</b><br>
				<ol>
					<li><b>Passenger Charter: </b> <a class="btn btn-link" href="#" style="color:#89ad3e;">Click Here</a></li>
					<li><b> Conditions of Carriage: </b> <a class="btn btn-link" href="#" style="color:#89ad3e;">Click Here</a></li>
					<li>All Guests, including children and infants, must present valid identification at check-in.</li>
					<li>Check-in begins 2 hours prior to the flight for seat assignment and closes 45 minutes prior to the scheduled departure.<!-- li--></li>
					<li>Carriage and other services provided by the carrier are subject to conditions of carriage, which are hereby incorporated by reference. These conditions may be obtained from the issuing carrier.<!-- li--></li>
					<li>In case of cancellations less than 6 hours before departure please cancel with the airlines directly. We are not responsible for any losses if the request is received less than 6 hours before departure.<!-- li--></li>
					<li>Please contact airlines for Terminal Queries.<!-- li--></li>
					<li>Free Baggage Allowance: Checked-in Baggage can be between 15-30 KG(s) <small>(Can be changed accordignly. Please confirm from Airline)</small> in Economy class.<!-- li--></li>
					<li>Partial cancellations are not allowed for Round-trip Fares.<!-- li--></li>
					<li>Changes to the reservation will result in the above fee plus any difference in the fare between the original fare paid and the fare for the revised booking.<!-- li--></li>
					<li>In case of cancellation of a booking, made by a Go channel partner, refund has to be collected from that respective Go Channel.<!-- li--></li>
					<li>The No Show refund should be collected within 15 days from departure date.<!-- li--></li>
					<li>If the basic fare is less than cancellation charges then only statutory taxes would be refunded.<!-- li--></li>
					<li>We are not be responsible for any Flight delay/Cancellation from airline's end.<!-- li--></li>
					<li>Kindly contact the airline at least 24 hrs before to reconfirm your flight detail giving reference of Airline PNR Number.<!-- li--></li>
					<li>We are a travel agent and all reservations made through our website are as per the terms and conditions of the concerned airlines. All modifications,cancellations and refunds of the airline tickets shall be strictly in accordance with the policy of the concerned airlines and we disclaim all liability in connection thereof.<!-- li--></li>
				</ol>
			</div>
		</div>
		<div style="width:100%;display: flex;flex-wrap: wrap;">
			<hr style="border: 1px solid #214a93; width:100%;">
		</div>
		
		<div style="width:100%; margin-bottom: 2px; margin-top:10px;">
		<div style="width:50%;display:inline-block;text-align:right">
		  <div class="w3-light-grey w3-round-large" style="margin-bottom: 2px; margin-top:2px;text-align:left;display:flex;justify-content:flex-end;">
			<div class="w3-container w3-blue w3-round-large" style="width:100%;text-align:center;"><b>Call us any time on {{$set->phone}}<br> and we will help you out.</div>
		  </div>
		</div>
	 <div style="width:50%;display:inline-block;text-align:right">
      <div class="w3-light-grey w3-round-large" style="w3-light-grey w3-round-large" style="text-align:left;display:flex;justify-content:flex-end;">
        <div class="w3-container w3-blue w3-round-large" style="width:100%;text-align:center;float:right;"><b>Contact Us</b><br><span><b>Address :</b> {{@$set->address}}</span><br><span><b>Support Email :</b> <a href="mailto:booking@zapbooking.com" style="color:#89ad3e;"> {{@$set->b2c_email}}</a></span></div>
		<div style="clear:both;float:none;"></div>
      </div>
    </div>
   
    
  </div>
		
		
		<div style="width:100%;display: flex;flex-wrap: wrap;">
			<hr style="border: 1px solid #214a93; width:100%;">
		</div>
		<footer>
			<div style="max-width: 1140px;width: 100%;margin-right: auto;margin-left: auto;padding-left: 15px;padding-right: 15px;text-align:center;">
				<small>Copyright &copy; {{ date('Y')}} &nbsp;&nbsp; <a href="{{$set->company_website}}" style="color:#89ad3e;">{{$set->company_name}}</a> </small> 
			</div>
		</footer> 
	</div>
</body>
</html>
