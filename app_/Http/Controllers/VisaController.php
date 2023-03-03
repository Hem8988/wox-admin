<?php

namespace App\Http\Controllers;

use App\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;

//use App\Destination;

use Config;
use Cookie;


class VisaController extends Controller
{
	public function __construct(Request $request)
    {	
		/* $siteData = WebsiteSetting::where('id', '!=', '')->first();
		\View::share('siteData', $siteData); */
	}
	
	public function index(){
		
		//return view('under_construction');
		return view('visa');
	}

	public function store(Request $request){

		$validation = $this->validate($request,[
		"first_name" => "required",
		"last_name" => "required",
		"phone_no" => "required|numeric",
		"whatsapp_no" => "required|numeric",
		"email_id" => "required|email",
		"residence_country" => "required",
		"dob" => "required|date",
		"destination_country" => "required",
		"visa_type" => "required|in:Tourist / Family VISA,Business / Conference VISA,Transit VISA,E-VISA,Student",
		"message" => "required",
		]);

		$data = $request->except('_token');
		if(Visa::create($data)){
		return response()->json(['success'=>true,'message'=>'Visa form has been submitted successfully.'],200);
		}

		return response()->json(['success'=>false,'errors'=>'Oops something went wrong please try again.'],400);
	}
}
?>