<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;

//use App\Destination;
use Log;
use Config;
use Cookie;
use Session;
use App\HotelList;
use App\HotelData;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class HotelsearchController extends Controller
{
	public function __construct(Request $request)
    {	
	date_default_timezone_set('Asia/Kolkata');
	
		/* $siteData = WebsiteSetting::where('id', '!=', '')->first();
		\View::share('siteData', $siteData); */
	}
	
	public function index(){
		
		return view('hotel-search');
	}
	
	public function hotelCities(Request $request){
		if($request->has('keyword')){
		$hotelcodes = HotelList::where('city', 'LIKE', '%'.$request->keyword.'%')->groupBy('city')->get();
		?>
		<ul id="country-list">
		<?php
		foreach($hotelcodes as $country) {
			?>
			<li onClick="selectCountry('<?php echo $country->city; ?>');"><?php echo $country->city; ?></li>
			<?php
		}
		?>
		</ul>
		<?php
		}
		die;
	}

	public function HotelListing(Request $request){
		$countries = $this->getnationality();
		$citydat = \App\HotelCity::where('name', $request->city)->first();
		if($hotelcodes = HotelData::where('city_code', $citydat->city_code)->exists()){
		$hotelcodes = HotelData::where('city_code', $citydat->city_code)->paginate(100);
		
		$city =$request->city;
		$nationality =$request->nationality;
		Session::put('nationality', $nationality);
		$cin =$request->cin;
		$cOut =$request->cOut;
		$Rooms =$request->Rooms;
		$paxsde =$request->pax;
		foreach($hotelcodes as $hotelcode){
			$codes[] = $hotelcode->hotel_code;
		}
		
		$hotelreq['hotel_codes'] = @$codes;
		$hotelreq['checkin'] = date('Y-m-d',strtotime($request->cin));
		$hotelreq['checkout'] = date('Y-m-d',strtotime($request->cOut));
		$hotelreq['client_nationality'] = $nationality;
		$hotelreq['cutoff_time'] = '3000';
		$hotelreq['currency'] = 'INR';
		$hotelreq['rates'] = 'concise';
		//$hotelreq['more_results'] = true;
		//$hotelreq['hotel_category'] = ;
		$pax = explode('?',$request->pax);
		
		for($i=0; $i< $request->Rooms; $i++){
			$childers = array();
			$paxs = explode('_',$pax[$i]);
			$rooms[$i]['adults'] = $paxs[0];
			if(isset($paxs[1])){
				if(isset($paxs[2])){
					$childers[] = $paxs[2];
				}
				if(isset($paxs[3])){
					$childers[] = $paxs[3];
				}
				
				$rooms[$i]['children_ages'] = $childers;
			}
			 
		}
		$hotelreq['rooms'] = $rooms;
		
		$hotelreq['version'] = "2.0";
		//echo '<pre>'; print_r($hotelreq);
		 $hotelpost =  json_encode($hotelreq);
		
		$curl = curl_init();
		$hotelapi = \App\MyConfig::where('meta_key','hotel_api_key')->first()->meta_value;
		$hotel_endpoint = \App\MyConfig::where('meta_key','hotel_endpoint')->first()->meta_value;
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $hotel_endpoint.'api/v3/hotels/availability',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>	$hotelpost,
		  CURLOPT_HTTPHEADER => array(
			'api-key: '.$hotelapi,
			'Accept: application/json',
			'Content-Type: application/json'
		  ),
		));

		$hotellists = curl_exec($curl);
$log = ['request' => $hotelpost,'response' => $hotellists];
		$hotellog = new Logger('hotelrequest');
		$hotellog->pushHandler(new StreamHandler(storage_path('logs/hotelsearch.log')), Logger::INFO);
		$hotellog->info('hotelsearch', $log);
		curl_close($curl);
		$data =  json_decode($hotellists);
		//echo '<pre>'; print_r($data); die;
		 if(isset($data->errors)){
			$error = $data->errors[0]->messages[0];
			return view('hotel-error-search', compact('error'));
		}else{
			if(isset($data->hotels)) {
				$hotelprice = array();
				$faciltiess = array();
				foreach($data->hotels aS $hotels){
					$hotelprice[] = @$hotels->min_rate->price;
					$hfacility = explode(';', @$hotels->facilities);
					foreach($hfacility aS $f){
						$faciltiess[] = trim($f);
					}
				}
				$minprice = min($hotelprice);
				$maxprice = max($hotelprice);
				
				$facilties = array();
				foreach($faciltiess aS $fd){
						if(!in_array(trim($fd), $facilties)){
							$facilties[] = trim($fd);
						}
					}
			}
			
			
			return view('hotel-search', compact('data','city','cin','cOut','Rooms','paxsde','pax','minprice','maxprice','facilties','countries','hotelcodes'));
		} 
	}else{
		$error = 'Record Not Found';
		return view('hotel-error-search', compact('error'));
	}
	}

public function hotelsearchview(Request $request){
	$citydat = \App\HotelCity::where('name', $request->city)->first();
		if($hotelcodes = HotelData::where('city_code', $citydat->city_code)->exists()){
		$hotelcodes = HotelData::where('city_code', $citydat->city_code)->paginate(100);
		
		
		$city =$request->city;
		$starRating =$request->starRating;
		$cin =$request->cin;
		$cOut =$request->cOut;
		$Rooms =$request->Rooms;
		$paxsde =$request->pax;
		$sortprice =$request->sortprice;
		foreach($hotelcodes as $hotelcode){
			$codes[] = $hotelcode->hotel_code;
		}
		
		$hotelreq['hotel_codes'] = @$codes;
		$hotelreq['checkin'] = date('Y-m-d',strtotime($request->cin));
		$hotelreq['checkout'] = date('Y-m-d',strtotime($request->cOut));
		$hotelreq['client_nationality'] = 'IN';
		$hotelreq['cutoff_time'] = '30000';
		$hotelreq['currency'] = 'INR';
		$hotelreq['rates'] = 'concise';
		//$hotelreq['hotel_category'] = ;
		$pax = explode('?',$request->pax);
		
		for($i=0; $i< $request->Rooms; $i++){
			$childers = array();
			$paxs = explode('_',$pax[$i]);
			$rooms[$i]['adults'] = $paxs[0];
			if(isset($paxs[1])){
				if(isset($paxs[2])){
					$childers[] = $paxs[2];
				}
				if(isset($paxs[3])){
					$childers[] = $paxs[3];
				}
				
				$rooms[$i]['children_ages'] = $childers;
			}
			 
		}
		$hotelreq['rooms'] = $rooms;
		
		$hotelreq['version'] = "2.0";
		//echo '<pre>'; print_r($hotelreq);
		 $hotelpost =  json_encode($hotelreq);
		
		$curl = curl_init();
		$hotelapi = \App\MyConfig::where('meta_key','hotel_api_key')->first()->meta_value;
		$hotel_endpoint = \App\MyConfig::where('meta_key','hotel_endpoint')->first()->meta_value;
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $hotel_endpoint.'api/v3/hotels/availability',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>	$hotelpost,
		  CURLOPT_HTTPHEADER => array(
			'api-key: '.$hotelapi,
			'Accept: application/json',
			'Content-Type: application/json'
		  ),
		));

		$hotellists = curl_exec($curl);

		curl_close($curl);
		$data =  json_decode($hotellists);
		//echo '<pre>'; print_r($data); die;
		 if(isset($data->errors)){
			$error = $data->errors[0]->messages[0];
			//return view('hotel-error-search', compact('error'));
		}else{
			if(isset($data->hotels)) {
				$datad = array(); 
				$hotelprice = array();
				$faciltiess = array();
				foreach($data->hotels aS $hotels){
					$hotelprice[] = @$hotels->min_rate->price;
					if($request->has('hotelname') && $request->hotelname !=''){
						//echo '1';
						if (strpos(strtolower($hotels->name),strtolower($request->hotelname)) !== FALSE) {
							$datad[] = array(
								'image' =>@$hotels->images->url,
								'name' =>$hotels->name,
								'category' =>@$hotels->category,
								'address' =>@$hotels->address,
								'facilities' =>$hotels->facilities,
								'price' =>$hotels->min_rate->price,
								'search_id' =>$data->search_id,
								'hotel_code' =>$hotels->hotel_code,
							);
						}
					}else if($request->has('starRating') && !$request->has('hotelfacilties') && $request->maxprice == '' && $request->minprice == ''){
						//echo '2';
						if(in_array($hotels->category, $starRating)){
							$datad[] = array(
								'image' =>@$hotels->images->url,
								'name' =>$hotels->name,
								'category' =>@$hotels->category,
								'address' =>@$hotels->address,
								'facilities' =>$hotels->facilities,
								'price' =>$hotels->min_rate->price,
								'search_id' =>$data->search_id,
								'hotel_code' =>$hotels->hotel_code,
							);
						}
					}else if(!$request->has('starRating') && $request->has('hotelfacilties') && $request->maxprice =='' && $request->minprice ==''){
						//echo '3';
						$search_this = $request->hotelfacilties;
						$facilities = explode(';', $hotels->facilities);
						$fac = array();
						foreach($facilities as $fa){
							$fac[] = trim($fa);
						}
						 $check = (count(array_intersect($fac, $search_this))) ? true : false; 
						if ($check) {
							$datad[] = array(
								'image' =>@$hotels->images->url,
								'name' =>$hotels->name,
								'category' =>@$hotels->category,
								'address' =>@$hotels->address,
								'facilities' =>$hotels->facilities,
								'price' =>$hotels->min_rate->price,
								'search_id' =>$data->search_id,
								'hotel_code' =>$hotels->hotel_code,
							);
						}
					}else if($request->has('starRating') && $request->has('hotelfacilties') && $request->maxprice =='' && $request->minprice ==''){
						//echo '4';
						$search_this = $request->hotelfacilties;
						$facilities = explode(';', $hotels->facilities);
						$fac = array();
						foreach($facilities as $fa){
							$fac[] = trim($fa);
						}
						$check = (count(array_intersect($fac, $search_this))) ? true : false; 
						if (in_array($hotels->category, $starRating) && $check) {
							$datad[] = array(
								'image' =>@$hotels->images->url,
								'name' =>$hotels->name,
								'category' =>@$hotels->category,
								'address' =>@$hotels->address,
								'facilities' =>$hotels->facilities,
								'price' =>$hotels->min_rate->price,
								'search_id' =>$data->search_id,
								'hotel_code' =>$hotels->hotel_code,
							);
						}
					}else if(!$request->has('starRating') && !$request->has('hotelfacilties')  && $request->has('minprice')&& $request->has('maxprice') && $request->maxprice !=''&& $request->minprice !=''){
						//echo '5';
						$minprice = $request->minprice;
						$maxprice = $request->maxprice;
						
						if ($hotels->min_rate->price >= $minprice && $hotels->min_rate->price <= $maxprice) { 
							$datad[] = array(
								'image' =>@$hotels->images->url,
								'name' =>$hotels->name,
								'category' =>@$hotels->category,
								'address' =>@$hotels->address,
								'facilities' =>$hotels->facilities,
								'price' =>$hotels->min_rate->price,
								'search_id' =>$data->search_id,
								'hotel_code' =>$hotels->hotel_code,
							);
						 
							}
					}else if($request->has('starRating') && !$request->has('hotelfacilties')  && $request->has('minprice')&& $request->has('maxprice') && $request->maxprice !=''&& $request->minprice !=''){
						//echo '5';
						$minprice = $request->minprice;
						$maxprice = $request->maxprice;

						if ($hotels->min_rate->price >= $minprice && $hotels->min_rate->price <= $maxprice && in_array($hotels->category, $starRating)) { 
							$datad[] = array(
								'image' =>@$hotels->images->url,
								'name' =>$hotels->name,
								'category' =>@$hotels->category,
								'address' =>@$hotels->address,
								'facilities' =>$hotels->facilities,
								'price' =>$hotels->min_rate->price,
								'search_id' =>$data->search_id,
								'hotel_code' =>$hotels->hotel_code,
							);
						 
							}
					}else if($request->has('starRating') && $request->has('hotelfacilties')   && $request->has('minprice')&& $request->has('maxprice') && $request->maxprice !=''&& $request->minprice !=''){
						//echo '5';
						$minprice = $request->minprice;
						$maxprice = $request->maxprice;
						$search_this = $request->hotelfacilties;
						$facilities = explode(';', $hotels->facilities);
						$fac = array();
						foreach($facilities as $fa){
							$fac[] = trim($fa);
						}
						$check = (count(array_intersect($fac, $search_this))) ? true : false; 
						if ($hotels->min_rate->price >= $minprice && $hotels->min_rate->price <= $maxprice && in_array($hotels->category, $starRating) && $check) { 
							$datad[] = array(
								'image' =>@$hotels->images->url,
								'name' =>$hotels->name,
								'category' =>@$hotels->category,
								'address' =>@$hotels->address,
								'facilities' =>$hotels->facilities,
								'price' =>$hotels->min_rate->price,
								'search_id' =>$data->search_id,
								'hotel_code' =>$hotels->hotel_code,
							);
						 
							}
					}else{
						$datad[] = array(
								'image' =>@$hotels->images->url,
								'name' =>$hotels->name,
								'category' =>@$hotels->category,
								'address' =>@$hotels->address,
								'facilities' =>$hotels->facilities,
								'price' =>$hotels->min_rate->price,
								'search_id' =>$data->search_id,
								'hotel_code' =>$hotels->hotel_code,
							);
					}
					$hfacility = explode(';', @$hotels->facilities);
					foreach($hfacility aS $f){
						$faciltiess[] = trim($f);
					}
				}
				$datad = $this->sortAssociativeArrayByKey($datad, "price", $sortprice);
				$minprice = min($hotelprice);
				$maxprice = max($hotelprice);
				$facilties = array();
				foreach($faciltiess aS $fd){
						if(!in_array(trim($fd), $facilties)){
							$facilties[] = trim($fd);
						}
					}
				
				echo view('ajaxhotel', compact('datad','city','cin','cOut','Rooms','paxsde','pax','minprice','maxprice','facilties','sortprice','hotelcodes'));
			}
			
			//return view('hotel-search', compact('data','city','cin','cOut','Rooms','paxsde','pax','minprice','maxprice','facilties'));
		} 
	}else{
		$error = 'Record Not Found';
		//return view('hotel-error-search', compact('error'));
	}
	}  	
	
	public function HotelDetail(Request $request){
		$sid = $request->sid;
		$hid = $request->hid;
		$hotelapi = \App\MyConfig::where('meta_key','hotel_api_key')->first()->meta_value;
		$hotel_endpoint = \App\MyConfig::where('meta_key','hotel_endpoint')->first()->meta_value;
		$curl = curl_init();
		
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $hotel_endpoint.'api/v3/hotels/availability/'.$sid.'?hcode='.$hid.'&bundled=true',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'api-key: '.$hotelapi,
			'Accept: application/json',
			'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$detail =  json_decode($response);
		//echo '<pre>'; print_r($detail); die;
		 if(isset($detail->errors)){
			echo $detail->errors[0]->messages[0];
		}else{
			
			$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $hotel_endpoint.'api/v3/hotels/'.$hid.'/images?version=2.0',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'api-key: '.$hotelapi,
			'Accept: application/json',
			'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$images =  json_decode($response);
			
			return view('hotel-detail', compact('detail','images'));
		}
	}
}
?>