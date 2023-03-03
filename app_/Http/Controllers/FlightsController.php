<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;

use App\User;
use App\Admin;
use App\WebsiteSetting;
use App\TravelPlan;
use App\Coupon;
use Log;
use Mail;
use PDF;
use App\Mail\TicketMail;
use App\MyConfig;
use Carbon\Carbon;
use DB;
use Auth;
use Config;
use Cookie;
use Session;
use App\Airport;
use App\BookingDetail;
use App\FlightBooking;
use App\Http\Requests\Flight\FlightBookingRequest;
use App\PaymentDetail;
use Exception;
use FontLib\TrueType\Collection;
use Illuminate\Contracts\Session\Session as SessionSession;
use Mockery\Expectation;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Symfony\Component\Console\Helper\Helper;

class FlightsController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
	}

	public function index(Request $request) 
    {
		
	}	
	


	public function flightSearch(Request $request){
			//return view('Frontend.flights.international'); 

			
			$flghtapi = WebsiteSetting::where('id', '!=', '')->first();
			$auth = $this->GetAuthenticate();
	
			$from =  explode('-', $request->input('from'));
			$to=  explode('-', $request->get('to'));
			$originLocationCode = $from[0];
			$destinationLocationCode = $to[0];
	
			if($request->has('srch')){
				$srch 		= 	$request->input('srch');
					if(trim($srch) != '')	
					{
						$explodesearc = explode('|', $srch);
					
						$originexplode = explode('-', $explodesearc[0]);
						
						$desexplode = explode('-', $explodesearc[1]);
						
						// $datedeparture = date('Y-m-d', strtotime($explodesearc[2]));
						// $returnDate = date('Y-m-d', strtotime($explodesearc[2]));
						// if(isset($explodesearc[3])){
						// 	$returnDate = date('Y-m-d', strtotime($explodesearc[3]));
						// }
						$origin = $originexplode[0];
						$destination = $desexplode[0];
						
						// $source = $originexplode[1];
						$destin = $desexplode;
						
					}
			}
			if($request->has('dep')){
				$datedeparture =Carbon::createFromFormat('d/m/Y',request()->get('dep'))->format('Y-m-d');
	
			}
		
		
			$old = Session::get('data_lists');
			$dar = collect($old["data"]);
			$dar1 =[];
			if(request()->get('maxPrice')){
				$price = request()->get('maxPrice');
				$dar1  = $dar->where('total_price','<',$price)->toArray();
			}else if(request()->get('includedAirlineCodes')){

				$flight = request()->get('includedAirlineCodes');
				$dar1  = $dar->where('air_craft','=',$flight)->toArray();
			}else{
		 	$dar1  = $dar->toArray();
			}
			
			$flightresult['meta'] = $old["meta"];
			$flightresult['data'] = array_values($dar1);
			$flightresult['dictionaries'] = $old["dictionaries"];
			$calenderresult="";
			
				$html = view('Frontend.flights.search', compact(['flightresult','destin','datedeparture','calenderresult']))->render();
				return response()->json([
					'status' => true,
					'html' => $html,
				]);
			

		
	}
	
	public function flightList(Request $request) 
    {
		//return view('Frontend.flights.international'); 
		$flghtapi = WebsiteSetting::where('id', '!=', '')->first();
		$auth = $this->GetAuthenticate();

		

		$from =  explode('-', $request->input('from'));
		$to=  explode('-', $request->get('to'));
		$originLocationCode = $from[0];
		$destinationLocationCode = $to[0];

		Session::put('allrequest',$request->all());
		if($request->has('srch')){
			$srch 		= 	$request->input('srch');
				if(trim($srch) != '')	
				{
					$explodesearc = explode('|', $srch);
				
					$originexplode = explode('-', $explodesearc[0]);
					
					$desexplode = explode('-', $explodesearc[1]);
					
					// $datedeparture = date('Y-m-d', strtotime($explodesearc[2]));
					// $returnDate = date('Y-m-d', strtotime($explodesearc[2]));
					// if(isset($explodesearc[3])){
					// 	$returnDate = date('Y-m-d', strtotime($explodesearc[3]));
					// }
					$origin = $originexplode[0];
					$destination = $desexplode[0];
					
					// $source = $originexplode[1];
					$destin = $desexplode;
					
				}
		}
		if($request->has('dep')){
			$datedeparture =Carbon::createFromFormat('d/m/Y',request()->get('dep'))->format('Y-m-d');

		}
		$returnDate ='';
		if($request->has('ret')){
			$returnDate = Carbon::createFromFormat('d/m/Y',request()->get('ret'))->format('Y-m-d');
		}
		if($request->has('jt')){
			$jt 		= 	1;
		}
		if($request->has('cbn')){
			$cbn 		= 	$request->input('cbn');
		}
		if($request->has('nt')){
			$nt 		= 	$request->input('nt');
			if($nt == 1){
				$DirectFlight = "true";
			}else{
				$DirectFlight = "false";
			}
		}else{
			$DirectFlight = "false";
		}
		if($request->has('px')){
			$px 		= 		$request->input('px');
				if(trim($px) != '')	
				{
					$explodepass = explode('-', $px);
					$adult = $explodepass[0];
					$child = $explodepass[1];
					$infant = $explodepass[2];
				} 
		}
            $token =madeusToken();
	
			 if($returnDate){
                $url = $originLocationCode.'&destinationLocationCode='.$destinationLocationCode.'&departureDate='.$datedeparture.'&returnDate='.$returnDate.'&adults='.$adult.'&children='.$child.'&infants='.$infant.'&max=100&currencyCode=NGN';
			 }else{
				  $url = $originLocationCode.'&destinationLocationCode='.$destinationLocationCode.'&departureDate='.$datedeparture.'&adults='.$adult.'&children='.$child.'&infants='.$infant.'&max=100&currencyCode=NGN';
			 }
			//  if(request()->has('includedAirlineCodes')){
            //     $url = $url.'&includedAirlineCodes='.request()->get('includedAirlineCodes');
			//  }
			//  if(request()->has('maxPrice')){
			// 	$url = $url.'&maxPrice='.request()->get('maxPrice');
			// }
		
		$curlF = curl_init();
		curl_setopt_array($curlF, array(
		  CURLOPT_URL => 'https://test.api.amadeus.com/v2/shopping/flight-offers?originLocationCode='.$url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$token['access_token'].''
		  ),
		));

		$response = curl_exec($curlF);
		 $dataArray= json_decode($response,true);
        //echo '<pre>';
        //print_r($dataArray);
        //die;
		$flightresult1 = addDataSession( $dataArray);
	
		Session::put('data_lists', $flightresult1);
			
		$n = 10;
		$flightresult["data"]  = array_slice($flightresult1["data"],0, -$n);
		$flightresult["meta"] = $flightresult1["meta"];
		$flightresult["dictionaries"] =$flightresult1["dictionaries"];
		 $flightresult["top_data"] = array_slice($flightresult1["data"], -$n);
		//  dd( $flightresult["top_data"]);
		$calenderresult="";//file_get_contents();
		if (array_key_exists('errors', $flightresult)) {
			return redirect()->back()->withErrors([
				'title'=>$flightresult['errors'][0]['title'],
				'detail'=>$flightresult['errors'][0]['detail']
			]);
		}
		return view('Frontend.flights.international', compact(['flightresult','destin','datedeparture','calenderresult'])); 
	
	}
//IB9 OB9 2985  1974
		public function flightDetails(){
			
			$token =madeusToken();
            $data = json_decode(request()->get('data'));

		
			// dd($data->lastTicketingDate);
			$dictionaries = json_decode(request()->get('dictionaries'));
			$passangers = request()->get('px');
			$sessionData['data'] = $data;
			$sessionData['dictionaries'] = $dictionaries;
			$sessionData['passengers'] = $passangers;
			
			$explodepass = explode('-', $passangers);
			// $passenger['ADULT' ]= $explodepass[0];
			// $passenger['CHILD' ]= $explodepass[1];
			// $passenger['HELD_INFANT'] = $explodepass[2];
			// dd(	$passangers);
			$ticketsDetailsPricing =  collect($data->travelerPricings)->unique('travelerType')->values();
			// $ticketsDetailsPricing = collect(->values()); 
			// dd(	$ticketsDetailsPricing);
			foreach($ticketsDetailsPricing as $key=>$price){
				
					$details[] = [
						'name'=> $price->travelerType,
						'travelerId'=>$price->travelerId,
						'total'=>$explodepass[$key],
						'amount' => $price->price->total*$explodepass[$key],
						'currency'=> $price->price->currency
					];
			
			   
			}
			$collection = Collect($details);
			// dd($collection);
            $totalAmount = $collection->sum('amount');
			$totalPassenger = $collection->sum('total');
			$sessionData['ticket_details'] = $collection;
			// Session::put('data',$sessionData);

			$total = [
				'total_amount'=>$totalAmount,
				'total_passenger'=>$totalPassenger,
				'currency'=> $details[0]['currency']
			];
			$sessionData['total']=$total;
			$ticketDetails = $details;
			 Session::put('data',$sessionData);
			$userFlight = Session::get('data');

          return redirect()->route('flightReview');
		}

		public function flightReview(){
		
			$userFlight = Session::get('data');
			if($userFlight){
				// dd($userFlight);
				$ticketDetails = 	$userFlight['ticket_details'];
				// dd($ticketDetails);
				$total = $userFlight['total'];
				$dictionaries = $userFlight['dictionaries'];
				$data = $userFlight['data'];
				$locations = collect(Airport::orderBy('country_name','asc')->get())->unique('country_name');
				return view('Frontend.flights.review',compact('data','dictionaries','ticketDetails','total','locations'));
			}
			return redirect()->to('/');
			
		}

		public function flightBooking(){
			$userFlight = Session::get('data');
			$ticketDetails = 	$userFlight['ticket_details'];
			$total = $userFlight['total'];
			$data = $userFlight['data'];
			$dictionaries = $userFlight['dictionaries'];
			return view('Frontend.flights.booking',compact('data','dictionaries','ticketDetails','total'));
		}
		public function bookingConfirm(Request $request){
			$data = $request->except('_token');
			

			$transactionId = $request->get('transaction_id');
			$curlF = curl_init();
		curl_setopt_array($curlF, array(
		  CURLOPT_URL => 'https://api.flutterwave.com/v3/transactions/'.$transactionId.'/verify',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer FLWSECK_TEST-dca8fdc9d00301ef6def168470a13d10-X'
		  ),
		));

		$response = curl_exec($curlF);

		$flightresult= json_decode($response,true);

		// $traveler = $this->ticketBooking();
		 $booking = BookingDetail::find($request->get('booking_id'));
		 $booking->update([
			 'status'=>1,
			 'email'=>$flightresult["data"]["customer"]["email"],
			 'mobile'=>$flightresult["data"]["customer"]["phone_number"],
		 ]);
		 $payment['bookingid']=  $booking->id;
		 $payment['org_amount'] = $flightresult["data"]["charged_amount"];
		 $payment['amount'] = $flightresult["data"]["charged_amount"];
		 $payment['payment_response'] =  $response;
		 $payment['status'] = ($flightresult['data']['status'] == 'successful') ? 1 : 0;
      
         PaymentDetail::create($payment);
		curl_close($curlF);

		Mail::to($booking->email)->send(new TicketMail($booking));
		
		
		return redirect()->to('/booking-success');
		}

		public function bookingFlight(FlightBookingRequest $request){
			
			$data = $request->except('__token');
			if(auth()->guard('agents')->user()){
				return $this->bookingInfo($request,$data);
			}
			if(auth()->user()){
				return $this->bookingInfo($request,$data);
			}
	
			return response()->json(['succcess'=>false,'message'=>'Please login'],401);
		
	}
	public function bookingInfo($request,$data){
		$travelers = [];
    
		if((array_key_exists("adult",$data))){
			foreach($data['adult']  as $key=>$adult){
				//    dd($adult);
					$travelers[] = getTravelerDetails($adult);
				 }
		}
		 
		if((array_key_exists("child",$data))){
		 foreach($data['child']  as $key=>$child){
			$travelers[]= getTravelerDetails($child);
		 }
		}

		if((array_key_exists("held_infant",$data))){
		 foreach($data['held_infant']  as $key=>$infant){
			$travelers[]= getTravelerDetails($infant);
		 }
		}
		
		   $userFlight = Session::get('data');
		   Session::put('travelers', $travelers);
		   $total = $userFlight['total'];
		
		   $travele = $this->ticketBooking();
           $traveler = json_decode($travele,true);

     
		 
		   Log::info($traveler);
		   if (array_key_exists('errors', $traveler)) {
			 $errors =  ucfirst(str_replace("_"," ",$traveler["errors"][0]["detail"]));
				
			 return response()->json(['errors'=>true,'errors'=>explode(',',$errors)],400);
			}
			 $dataInput['flight_details'] = $traveler;
			 $result = bookingsDetails( $dataInput);
			 $dataOutput = addBookingsDetails($result);
			
		    $booking = BookingDetail::create($dataOutput);
		   $contact = [
			   'email'=>$request->get('email'),
			   'contact'=>$request->get('phone')
		   ];
		   
		 return response()->json(['success'=>true,'contact'=>$contact,'total'=>$total,'booking_id'=>$booking->id],200);
	}


		public function ticketBooking(){
			$token =madeusToken();
			$userFlight = Session::get('data');
		   $input['type'] ="flight-order";
		   $input['flightOffers'] = [$userFlight['data']];
           $input['travelers'] = Session::get('travelers');
		//    dd($input['travelers']);
		//    dd($input);
			$data1['data'] = $input;
			$url = "https://test.api.amadeus.com/v1/booking/flight-orders";

			   $curl = curl_init($url);
			   curl_setopt($curl, CURLOPT_URL, $url);
			   curl_setopt($curl, CURLOPT_POST, true);
			   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			   
			   $headers = array(
			      "Accept: application/json",
			      'Authorization: Bearer '.$token['access_token'].'',
			      "Content-Type: application/json",
			   );
			   curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			   
			   curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data1));
			   
			   //for debug only!
			   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			   
			   $resp = curl_exec($curl);
			   curl_close($curl);


			//    $accessresponse = json_decode( $resp, true); 
			   return $resp;
		}
		public function successBooking(){
			$accessresponse = Session::get('order');
			// dd($accessresponse['data']);
			$userFlight = Session::get('data');
		   $ticketDetails = 	$userFlight['ticket_details'];
			$total = $userFlight['total'];
			$dictionaries = $userFlight['dictionaries'];
			$data = $userFlight['data'];
			return view('Frontend.flights.booking-confirm',compact('data','ticketDetails','total','dictionaries'));
		}

		public function getFlightDetails(Request $request){
				
			$token =madeusToken();
		// dd($token);
			$carrieCode = $request->get('carrieCode');
			$flightNumber =  $request->get('flightNumber');
			$scheduleDepartureDate = $request->get('scheduleDepartureDate');
			$curlF = curl_init();
			curl_setopt_array($curlF, array(
			  CURLOPT_URL => 'https://test.api.amadeus.com/v2/schedule/flights?carrierCode='.$carrieCode.'&flightNumber='.$flightNumber.'&scheduledDepartureDate='.$scheduleDepartureDate,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'GET',
			  CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$token['access_token'].''
			  ),
			));
	
			$response = curl_exec($curlF);
	
			$flightresult= json_decode($response,true);
			// dd($flightresult);
			curl_close($curlF);

		}

	public function booking(Request $request){
		
		if (\Cache::has($request->tid)){
				$resultdataib = array();
			$resultib = \Cache::get( $request->tid);
			$resultdataibs = json_decode($resultib);
			 
			$ibkeys = array();
			if(isset($_GET['IsReturn'])){
				$keys = [];
				foreach($resultdataibs->Response->Results as $l){
					
					for ($i=0; $i<count($l); $i++) {
					
						 if (@$_GET['Index'] == $l[$i]->ResultIndex) {
							array_push($keys, $l[$i]);
						}
					}
				}
				$ibkeys = [];
				foreach($resultdataibs->Response->Results as $ls){
					
					
					for ($is=0; $is<count($ls); $is++) {
					
						 if ($_GET['IndexR'] == $ls[$is]->ResultIndex) {
							array_push($ibkeys, $ls[$is]);
						}
					}
				}
				
			}else{
				foreach($resultdataibs->Response->Results as $l){
					$keys = [];
					for ($i=0; $i<count($l); $i++) {
					
						 if ($_GET['RIndex'] == $l[$i]->ResultIndex) {
							array_push($keys, $l[$i]);
						}
					}
				}
			}
			
		
			$resultdata = $keys;
			
			$resultdataib = $ibkeys;
				
		$getplantotal = $resu = $this->GetInsurancePlan();
			return view('Frontend.flights.testing', compact(['resultdata','resultdataib','getplantotal'])); 
		}else{
		
				return Redirect::to('/booking/error')->with('error', 'Your session (TraceId) is expired.');
		}
		
	}
	
	public function searchagain(Request $request){
		return view('Frontend.flights.searchagain'); 
	}
	
	
	public function bookingerror(Request $request){
		return view('Frontend.flights.error'); 
	}

	
	
}
?>


