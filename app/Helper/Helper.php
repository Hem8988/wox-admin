<?php

use App\Admin;
use App\Airport;
use Illuminate\Support\Carbon;
use App\PermissionCategory;
use App\Permission;
use App\role_has_permission;
use function foo\func;
use App\UserType;

function madeusToken()
{
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://test.api.amadeus.com/v1/security/oauth2/token',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => 'client_id=kQ8QvQGMS9WKLjN9xXLpNutDGbA1tYwE&client_secret=S9dJS4uesj1sqAWS&grant_type=client_credentials',
		CURLOPT_HTTPHEADER => array(
			'Content-Type: application/x-www-form-urlencoded'
		),
	));
	$response = curl_exec($curl);
	curl_close($curl);
	$accessresponse = json_decode($response, true);
	return $accessresponse;
}
function hotelApis($destination)
{
	$apiKey = 'd0f27614d49932fcdc296ce8bcfffb42';
	$sharedSecret = 'f09fd1ba02';
	$signature = hash("sha256", $apiKey . $sharedSecret . time());
	$r = array(
		'Content-Type:application/json',
		'Accept: application/json',
		'Api-key:d0f27614d49932fcdc296ce8bcfffb42',
		'X-Signature:' . $signature,
		'Accept-Encoding:gzip'
	);
	//  dd($r);
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://api.test.hotelbeds.com/hotel-content-api/1.0/hotels?destinationCode=' . $destination . '&language=ENG&from=1&to=10&useSecondaryLanguage=false',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Content-Type:application/json',
			'Accept: application/json',
			'Api-key:d0f27614d49932fcdc296ce8bcfffb42',
			'X-Signature:' . $signature . '',
			'Accept-Encoding:gzip'
		),
	));
	$response = curl_exec($curl);
	curl_close($curl);
	$accessresponse = json_decode($response, true);
	return $accessresponse;
}
function hotelApisAminities()
{
	$apiKey = 'd0f27614d49932fcdc296ce8bcfffb42';
	$sharedSecret = 'f09fd1ba02';
	$signature = hash("sha256", $apiKey . $sharedSecret . time());
	$r = array(
		'Content-Type:application/json',
		'Accept: application/json',
		'Api-key:d0f27614d49932fcdc296ce8bcfffb42',
		'X-Signature:' . $signature,
		'Accept-Encoding:gzip'
	);
	//  dd($r);
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://api.test.hotelbeds.com/hotel-content-api/1.0/types/amenities',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Content-Type:application/json',
			'Accept: application/json',
			'Api-key:d0f27614d49932fcdc296ce8bcfffb42',
			'X-Signature:' . $signature . '',
			'Accept-Encoding:gzip'
		),
	));
	$response = curl_exec($curl);
	curl_close($curl);
	$accessresponse = json_decode($response, true);
	return $accessresponse;
}



function getCountryName($country, $city)
{
	$airports = Airport::where(['country_code' => $country, 'city_code' => $city])->first();
	return $airports;
}

function getTravelerDetails($data)
{
	$result = [
		"id" => $data['travelId'],
		"dateOfBirth" => Carbon::createFromFormat('d/m/Y', $data['dob'])->format('Y-m-d'),
		"name" => [
			"firstName" => $data['first_name'],
			"lastName" => $data['last_name']
		],
		// "gender"=> $data['gender'],
		"gender" => $data['gender'],
		"contact" => [
			"emailAddress" => 'tets@gmail.com',
			"phones" => [
				[
					"deviceType" => "MOBILE",
					"countryCallingCode" => "34",
					"number" => '0000000000',
				]
			]
		],
		"documents" => [
			[
				"documentType" => "PASSPORT",
				"issuanceDate" => Carbon::createFromFormat('d/m/Y', $data['passport_issued'])->format('Y-m-d'),
				"number" => $data['passport_no'],
				"expiryDate" =>  Carbon::createFromFormat('d/m/Y', $data['passport_exp_date'])->format('Y-m-d'),
				"issuanceCountry" => "ES",
				"validityCountry" => "ES",
				"nationality" => "ES",
				"holder" => true
			]
		]
	];

	return $result;
}


function getFileName($fileName)
{

	$path = base_path('public/img/airline');
	$files = File::allFiles($path);
	$output = '';
	foreach ($files as $file) {
		$file1 = pathinfo($file);
		if ($file1['filename'] == $fileName) {
			$output = $file1['basename'];
		}
	}
	if ($output) {
		return url('img/airline') . '/' . $output;
	}
	return $output;
}

function getBookingDetiils($data)
{

	$id = $data['data']['id'];
	//   $url =  'https://test.api.amadeus.com/v1/booking/flight-orders/'.$id;
	$output = getInformation($id);
	//   dd($output['data']['flightOffers'][0]['itineraries']);
	$count = count($output['data']['flightOffers'][0]['itineraries']);
	if ($count > 1) {
		$out =  singleTripDetails($output);
	}
	$out =  roundTrip($output);
	return $out;
}

function getPaymentDetiils($data)
{
	dd($data);
}

function getInformation($id)
{
	$token = madeusToken();
	$curlF = curl_init();
	curl_setopt_array($curlF, array(
		CURLOPT_URL => 'https://test.api.amadeus.com/v1/booking/flight-orders/' . $id,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer ' . $token['access_token'] . ''
		),
	));

	$response = curl_exec($curlF);

	$jsonResponse = json_decode($response, true);
	curl_close($curlF);
	return  $jsonResponse;
}
function searchResults($data)
{

	$collection = collect([]);
	dd($data);
}
function singleTripDetails($outputs)
{
	// $carriercode = $output["segments"][0]['carrierCode'];
	// $depaturecountry = getCountryName($outputs['dictionaries']['locations'][$output["segments"][0]['departure']['iataCode']]["countryCode"],$output["segments"][0]['departure']['iataCode']);
	// $file = getFileName($carriercode);
	// //  $tt  = $outputs['dictionaries']['carriers'][$carriercode];
	// // dd($tt);
	//   $datas[]=[
	// 	  'file'=>$file,
	// 	//   'duration'=>strtolower(str_replace('H','H     ',substr($output['itineraries'][0]["duration"], 2))),
	// 	  'depature'=>[
	// 		  'country'=> $depaturecountry->country_name,
	// 		  'city'=>$depaturecountry->city_name,
	// 		  'time'=> date('H:i', strtotime($output["segments"][0]['departure']['at'])),
	// 		  'date'=> date('M-d-Y', strtotime($output["segments"][0]['departure']['at'])),
	// 		  'flight'=>$output["segments"][0]['carrierCode'] .'-'. $output["segments"][0]['number'],
	// 		  'status'=>$output["segments"][0]['bookingStatus']
	// 	  ]

	//   ];
}
function  roundTrip($outputs)
{

	foreach ($outputs['data']['flightOffers'][0]['itineraries'] as $key => $output) {
		//  dd($output["segments"][$key]['carrierCode']);
		$carriercode = $output["segments"][0]['carrierCode'];
		$depaturecountry = getCountryName($outputs['dictionaries']['locations'][$output["segments"][0]['departure']['iataCode']]["countryCode"], $output["segments"][0]['departure']['iataCode']);
		$file = getFileName($carriercode);
		//  $tt  = $outputs['dictionaries']['carriers'][$carriercode];
		// dd($tt);
		$datas[] = [
			'file' => $file,
			//   'duration'=>strtolower(str_replace('H','H     ',substr($output['itineraries'][0]["duration"], 2))),
			'depature' => [
				'country' => $depaturecountry->country_name,
				'city' => $depaturecountry->city_name,
				'time' => date('H:i', strtotime($output["segments"][0]['departure']['at'])),
				'date' => date('M-d-Y', strtotime($output["segments"][0]['departure']['at'])),
				'flight' => $output["segments"][0]['carrierCode'] . '-' . $output["segments"][0]['number'],
				'status' => $output["segments"][0]['bookingStatus']
			]

		];
	}

	// // dd($outputs['data']);
	foreach ($outputs['data']['flightOffers'][0]['travelerPricings'] as $key => $traveller) {

		// dd($outputs['data']['travelers'][$key], $traveller);
		$passengers[] = [
			'first_name' => $outputs['data']['travelers'][$key]['name']['firstName'],
			'last_name'  => $outputs['data']['travelers'][$key]['name']['lastName'],
			'gender' => $outputs['data']['travelers'][$key]['gender'],
			'type' => $traveller['travelerType'],
		];
	}

	$datas['passengers'] = $passengers;
	return $datas;
	//	<span>{{ $arrivalcountryDetails->country_name}}  ({{ $arrivalcountryDetails->city_name}})

}

function bookingsDetails($data)
{
	// dd($data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][0]["travelerType"]);
	$travelers = [];
	foreach ($data["flight_details"]["data"]["travelers"] as $key => $passenger) {
		$travelers[] = [
			'fullname' => $passenger["name"]["firstName"]  . ' ' . $passenger["name"]["lastName"],
			'gender' => $passenger["gender"],
			'dob' => $passenger["dateOfBirth"],
			'type' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["travelerType"],
			'price' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["price"]["total"],
			'currency' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["price"]["currency"],
			'fareOption' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareOption"],
			'cabin' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareDetailsBySegment"][0]["cabin"] ?? Null,
			'class' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareDetailsBySegment"][0]["class"] ?? Null,
			'luggage' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] ?? Null,
			'luggage_unit' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareDetailsBySegment"][0]["includedCheckedBags"]["weightUnit"]
		];
	}
	// dd($data["flight_details"]["data"]["flightOffers"][0]["itineraries"]);
	$oneWayroute = [];
	$twoWayroute = [];

	$tour = count($data["flight_details"]["data"]["flightOffers"][0]["itineraries"]);
	foreach ($data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"] as $routes) {
		$depcityCode = $routes["departure"]["iataCode"];
		$arrcityCode = $routes["arrival"]["iataCode"];
		$depcountry =  getCountryName($data["flight_details"]["dictionaries"]["locations"][$depcityCode]["countryCode"],  $depcityCode);
		$arrcountry =  getCountryName($data["flight_details"]["dictionaries"]["locations"][$arrcityCode]["countryCode"],  $arrcityCode);
		$oneWayroute[] = [
			'dep_time' => $routes["departure"]["at"],
			'arrival_time' => $routes["arrival"]["at"],
			'dep_city_code' => $depcountry->city_code,
			'dep_city_name' => $depcountry->city_name,
			'dep_airport_name' => $depcountry->airport_name,
			'dep_country_code' => $depcountry->country_code,
			'dep_country_name' => $depcountry->country_name,
			'arr_city_code' => $arrcountry->city_code,
			'arr_city_name' => $arrcountry->city_name,
			'arr_airport_name' => $arrcountry->airport_name,
			'arr_country_code' => $arrcountry->country_code,
			'arr_country_name' => $arrcountry->country_name,
		];
	}



	$segments = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"];
	$dep_city_code = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["departure"]["iataCode"];
	$dep_country_code = $data["flight_details"]["dictionaries"]["locations"][$dep_city_code]["countryCode"];
	if (count($segments) > 1) {
		$arrivalAt = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][count($segments) - 1];
		$oneWayarrival = $arrivalAt["arrival"]["at"];
		$oneway_city_code = $arrivalAt["arrival"]["iataCode"];
		$oneway_country_code = $data["flight_details"]["dictionaries"]["locations"][$oneway_city_code]["countryCode"];
		$onway_terminal = $arrivalAt["arrival"]["terminal"] ?? 'Not given';
		$flight_number = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][count($segments) - 1]['number'];
	} else {
		$oneWayarrival = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["arrival"]["at"];
		$oneway_city_code = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["arrival"]["iataCode"];
		$oneway_country_code = $data["flight_details"]["dictionaries"]["locations"][$oneway_city_code]["countryCode"];
		$onway_terminal = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["arrival"]["terminal"] ?? 'Not Give';
		$flight_number = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]['number'];
	}

	$data['depature_date'] = [
		'oneway' => $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["departure"]["at"],
		'oneway_ret' => $oneWayarrival,

	];


	$file =  getFileName($data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["carrierCode"]);
	$dep_oneway = getCountryName($dep_country_code,  $dep_city_code);
	$dep_arrival = getCountryName($oneway_country_code,  $oneway_city_code);
	$data['oneway'] = [
		'dep_city_name' => $dep_oneway->city_name,
		'dep_city_code' => $dep_oneway->city_code,
		'dep_airport_name' => $dep_oneway->airport_name,
		'dep_terminal' => $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["departure"]["terminal"] ?? 'Not Give',
		'arrival_city_code' => $dep_arrival->city_code,
		'arrival_city_name' => $dep_arrival->city_name,
		'arrival_airport_name' => $dep_arrival->airport_name,
		'arrival_terminal' => $onway_terminal,
		'flight_number' => $flight_number,
		'image' => $file,
		'depature_carrierCode' => $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["carrierCode"],
		'one_way_route' => 	 $oneWayroute

	];
	if ($tour > 1) {
		$segments = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"];
		$dep_city_code = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["departure"]["iataCode"];
		$dep_country_code = $data["flight_details"]["dictionaries"]["locations"][$dep_city_code]["countryCode"];
		if (count($segments) > 1) {
			$arrivalAt = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][count($segments) - 1];
			$oneWayarrival = $arrivalAt["arrival"]["at"];
			$oneway_city_code = $arrivalAt["arrival"]["iataCode"];
			$oneway_country_code = $data["flight_details"]["dictionaries"]["locations"][$oneway_city_code]["countryCode"];
			$onway_terminal = $arrivalAt["arrival"]["terminal"] ?? 'Not given';
			$flight_number = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][count($segments) - 1]['number'];
		} else {
			$oneWayarrival = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["arrival"]["at"];
			$oneway_city_code = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["arrival"]["iataCode"];
			$oneway_country_code = $data["flight_details"]["dictionaries"]["locations"][$oneway_city_code]["countryCode"];
			$onway_terminal = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["arrival"]["terminal"] ?? 'Not Give';
			$flight_number = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]['number'];
		}
		foreach ($data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"] as $routes) {
			$depcityCode = $routes["departure"]["iataCode"];
			$arrcityCode = $routes["arrival"]["iataCode"];
			$depcountry =  getCountryName($data["flight_details"]["dictionaries"]["locations"][$depcityCode]["countryCode"],  $depcityCode);
			$arrcountry =  getCountryName($data["flight_details"]["dictionaries"]["locations"][$arrcityCode]["countryCode"],  $arrcityCode);
			$twoWayroute[] = [
				'dep_time' => $routes["departure"]["at"],
				'arrival_time' => $routes["arrival"]["at"],
				'dep_city_code' => $depcountry->city_code,
				'dep_city_name' => $depcountry->city_name,
				'dep_airport_name' => $depcountry->airport_name,
				'dep_country_code' => $depcountry->country_code,
				'dep_country_name' => $depcountry->country_name,

				'arr_city_code' => $arrcountry->city_code,
				'arr_city_name' => $arrcountry->city_name,
				'arr_airport_name' => $arrcountry->airport_name,
				'arr_country_code' => $arrcountry->country_code,
				'arr_country_name' => $arrcountry->country_name,
			];
		}
		$file =  getFileName($data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["carrierCode"]);
		$dep_oneway = getCountryName($dep_country_code,  $dep_city_code);
		$dep_arrival = getCountryName($oneway_country_code,  $oneway_city_code);
		$data['twoway'] = [
			'dep_city_name' => $dep_oneway->city_name,
			'dep_city_code' => $dep_oneway->city_code,
			'dep_airport_name' => $dep_oneway->airport_name,
			'dep_terminal' => $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["departure"]["terminal"] ?? 'Not Give',
			'arrival_city_code' => $dep_arrival->city_code,
			'arrival_city_name' => $dep_arrival->city_name,
			'arrival_airport_name' => $dep_arrival->airport_name,
			'arrival_terminal' => $onway_terminal,
			'flight_number' => $flight_number,
			'image' => $file,
			'depature_carrierCode' => $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["carrierCode"],
			'two_way_route' => 	 $twoWayroute

		];
	}

	$data['trip'] = $tour;
	$data['passengers'] = $travelers;
	$data['booking_id'] = $data["flight_details"]["data"]['id'];
	$data['booking_code'] = $data["flight_details"]["data"]["associatedRecords"][0]["reference"];
	return $data;
}
function addBookingsDetails($data)
{
	// dd($data);
	$output['agent_id'] = auth()->guard('agents')->user() ? auth()->guard('agents')->user()->id : Null;
	$output['user_id'] = auth('web')->user() ? auth()->user()->id : Null;
	$output['depart_flight'] = $data["oneway"]["dep_city_code"] . '-' . $data["oneway"]["arrival_city_name"];
	$output['source'] = $data["oneway"]["dep_city_name"];
	$output['destination'] = $data["oneway"]["arrival_city_name"];
	$output['from_date'] = $data["oneway"]["one_way_route"][0]["dep_time"];
	$output['depart_date'] = $data["oneway"]["one_way_route"][0]["dep_time"];
	$output['to_date'] = ($data["trip"] > 1) ? $data["twoway"]["two_way_route"][0]["dep_time"] : Null;
	$output['return_date'] = ($data["trip"] > 1) ? $data["twoway"]["two_way_route"][0]["dep_time"] : Null;
	$output['return_flight'] = ($data["trip"] > 1) ? $data["oneway"]["arrival_city_name"] . '-' . $data["oneway"]["dep_city_code"] : Null;
	$output['booking_response'] = json_encode($data, true);
	$output['ticket_status'] = ($data["flight_details"]["data"]["ticketingAgreement"]["option"] == "CONFIRM") ? 1 : 0;
	$output['pnr'] = $data["booking_code"];
	$output['status'] = 0;
	$output['type'] = auth()->guard('agents')->user() ? 'b2b' : 'b2c';
	return $output;
}
function getpassengerDetails($datas)
{
	$dcode = json_decode($datas, true);

	if ($dcode) {
		if (array_key_exists("flight_details", $dcode)) {
			$passengers = bookingsDetails($dcode);
			return $passengers["passengers"];
		}
	}
	return [];
}


function addDataSession($data)
{
	$datas = [];
	foreach ($data["data"] as $key => $item) {
		$item["total_price"] = $item["price"]["total"];
		$item["air_craft"] = $item["itineraries"][0]["segments"][0]["carrierCode"];
		$item['oneway_stop'] = (count($item["itineraries"][0]["segments"]) - 1);
		$item['twoway_stop'] = (count($item["itineraries"]) > 1) ? (count($item["itineraries"][1]["segments"]) - 1) : Null;
		$item["trip"] = count($item["itineraries"]);
		$datas[] = $item;
	}
	$data['meta'] = $data["meta"];
	$collection = collect($datas);

	$data["dictionaries"] = $data["dictionaries"];
	$arrValues = $collection->sortBy(['total_price' => 'asc'])->toArray();
	$data["data"] = array_values($arrValues);
	return $data;
}

function getAmenities($data)
{

	$lists = hotelApisAminities();
	dd($lists);
	$ameni = [];

	foreach ($lists["amenities"] as $list) {
		// dd($list["description"]["content"]);
		$ameni[] = [
			'code' => $list["code"],
			'description' => $list["description"]["content"]
		];
	}
	dd($ameni);
}


function getusername($id)
{
	$user = Admin::where('id',$id)->first();
	return ucfirst($user->first_name) .' '.$user->last_name ?? '';
}
function permissionCategory()
{
	$permissionCategory = PermissionCategory::all();
	return $permissionCategory;
}

function get_permission($min_cat_id)
{
	$permissionCategory = Permission::where('categoryId', $min_cat_id)->get();
	return $permissionCategory;
}

function countTotalMainPer($rolId, $categoryId)
{

	return  0;
	// if (isset($rolId) && !empty($rolId)) {
	// 	$where = array('role_id' => $rolId);
	// 	$res = $ci->global_model->getdata('role_has_permission', $where);
	// 	$count = [];
	// 	if (!empty($res)) {
	// 		foreach ($res as $key => $result) {
	// 			// var_dump($resultcategoryId);die;
	// 			$ci->db->select('*');
	// 			$ci->db->from('user_permission');
	// 			$ci->db->where('permission_slug', $result->permission_name_slug);
	// 			$ci->db->where('category_id', $categoryId);
	// 			$per = $ci->db->get()->result();
	// 			if (!empty($per)) {
	// 				$count[] += $key;
	// 			}
	// 		}
	// 	}
	// 	return !empty($count) ? count($count) : '0';
	// } else {
	// 	return 0;
	// }
}


function UserType($id)
{
	$UserType = UserType::where('id', $id)->first();
	return $UserType->name;
}



function canAccessRoute($roleId, $specificCondition)
{
	if ($roleId == 0) {
		return $specificCondition;
	} else {
		$role_per= role_has_permission::where('role_id',$roleId)->where('permission_name_slug', $specificCondition)->first();
		return !empty($role_per->permission_name_slug) ? $role_per->permission_name_slug : '';
	}
	return '';
}
