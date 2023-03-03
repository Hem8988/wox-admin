<?php

namespace App\Http\Controllers;

use App\CmsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;

//use App\Destination;

use Config;
use Cookie;


class TermsConditionsController extends Controller
{
	public function __construct(Request $request)
    {	
		/* $siteData = WebsiteSetting::where('id', '!=', '')->first();
		\View::share('siteData', $siteData); */
	}
	
	public function index(){
		
		$term = CmsPage::where('slug','terms-conditions')->first();
		return view('terms_conditions',compact('term'));  
	}
} 
?>