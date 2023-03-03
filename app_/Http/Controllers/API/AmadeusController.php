<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
//use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Response;
use App\Destination;
use App\Location;
use App\Package;
use App\Admin;
use DB;
use App\Topinclusion;
use App\SuperTopInclusion;
use App\HolidayTheme;
use App\Inclusion;
use App\Exclusion;
use App\Holidaytype;
use App\City;

use Config;

class AmadeusController extends BaseController
{
	public function __construct(Request $request)
    {	
		//$siteData = WebsiteSetting::where('id', '!=', '')->first();
		//\View::share('siteData', $siteData);
	}
	
	public function Searchflight(Request $request)
    {	
		
		$originLocationCode = trim($_GET['originLocationCode']);
		$destinationLocationCode = trim($_GET['destinationLocationCode']);
		$departureDate = trim($_GET['departureDate']);
		$returnDate = trim($_GET['returnDate']);
		$adults = trim($_GET['adults']);
		$max = trim($_GET['max']);



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
		  CURLOPT_POSTFIELDS => 'client_id=%20kQ8QvQGMS9WKLjN9xXLpNutDGbA1tYwE&client_secret=S9dJS4uesj1sqAWS&grant_type=client_credentials',
		  CURLOPT_HTTPHEADER => array(
			'Content-Type: application/x-www-form-urlencoded'
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		$accessresponse = json_decode($response, true); 
		
		$curlF = curl_init();
		curl_setopt_array($curlF, array(
		  CURLOPT_URL => 'https://test.api.amadeus.com/v2/shopping/flight-offers?originLocationCode='.$originLocationCode.'&destinationLocationCode='.$destinationLocationCode.'&departureDate='.$departureDate.'&returnDate='.$returnDate.'&adults='.$adults.'&max='.$max,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$accessresponse['access_token'].''
		  ),
		));

		$responseF = curl_exec($curlF);

		curl_close($curlF);
		//echo $response;
		
		 return $responseF;
    } 	
}
?>