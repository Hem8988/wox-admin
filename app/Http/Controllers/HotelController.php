<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use App\Airport;
//use App\Destination;

use Config;
use Cookie;


class HotelController extends Controller
{
	public function __construct(Request $request)
    {	
		/* $siteData = WebsiteSetting::where('id', '!=', '')->first();
		\View::share('siteData', $siteData); */
	}
	
	public function index(){
		$countries = $this->getnationality();
		//\Cache::put('singlerefetch','yyyy' , now()->addMinutes(25));
		//\Cache::forget('singlerefetch');
		return view('hotel', compact('countries'));
		//return view('under_construction');
	}
		
	public function ecash(){
		
		return view('under_construction');
	}
	
	
	public function HotelCities(Request $request){
		$output = '';
		$query = $request->get('textval');
		if($query != ''){
			//DB::enableQueryLog();
			 $airportcodelis = DB::table('hotel_cities')->where('name', 'LIKE', '%'.$query.'%');
       
         $codelist = $airportcodelis->get();
		
		
			foreach($codelist as $alist){
				$HotelCountry = \App\HotelCountry::where('country_code_1', $alist->country_code)->first();
					$output .= '<li class="" roundwayfromtops="'.$alist->city_code.', '.$HotelCountry->country_code.'" roundwayfromtop="'.$alist->name.', '.$HotelCountry->name.'" roundwayfrom="'.$alist->name.'">
					<div class="fli_name"><i class="fa fa-map-marker-alt"></i> '.$alist->name.'</div>
					<div class="airport_name">'.$HotelCountry->name.'</div></li>';
				
					
			}
			
		}else{
			$output = '';
		}
		 $data = array(
       'table_data'  => $output,
       'ddd'  => 'city_name LIKE'.$query
      );

      echo json_encode($data);
	}

	public function hotelBooking(){
		return view('Frontend.hotel.booking');
	}
	public function hotelDetails(){
		return view('Frontend.hotel.details');
	}

public function hotelListsing(){
		
		$destination = request()->get('city');
		$city = Airport::where('city_name',$destination)->first();
	   $hotels = hotelApis($city->city_code);
	//    $amenities =getAmenities($hotels);
	   $countries = $this->getnationality();
	   return view('Frontend.hotel.lists',compact('countries','hotels'));
	}
}
?>