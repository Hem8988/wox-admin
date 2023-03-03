<?php

namespace App\Http\Controllers;

use App\Mail\HolidayBookingMail;
use App\Package;
use App\PackageBookingDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;

//use App\Destination;

use Config;
use Cookie;
use Illuminate\Support\Facades\Mail;

class HolidayController extends Controller
{
	public function __construct(Request $request)
    {	
		/* $siteData = WebsiteSetting::where('id', '!=', '')->first();
		\View::share('siteData', $siteData); */
	}
	
	public function index(){
		
		return view('under_construction');
	}

	public function store(Request $request){
	   
		$validator =  $this->validate($request, [
            'mobile' => 'required',
            'email' => 'required|email',
			'package_id'=>'required',
			'message'=>'required'
          
        ]);
		if(auth()->user()){
			$package = Package::find($request->package_id);
		$data = $request->except('_token');
		$data['user_id'] = auth()->user()->id;
		$data['package_date'] = $package->package_validity;
			$data['type'] = 'b2c';
		
		if($booking = PackageBookingDetail::create($data)){

             
			Mail::to($request->email)->send(new HolidayBookingMail($booking, $package));
			return response()->json(['status'=>'true','message'=>'Holiday has been booked successfully','data'=>$booking],200);
		}
		return response()->json(['status'=>'false','message'=>'Cannot book the holiday'],400);
		}
		return response()->json(['status'=>'false','message'=>'Please login'],401);
	}
}
?>