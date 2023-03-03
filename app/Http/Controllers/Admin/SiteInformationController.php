<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SiteSettingRequest;
use App\SiteInformation;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class SiteInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


	public function index(){
		$informations = SiteInformation::orderBy('title','asc')->get();
		return view('Admin.site_information.index',compact('informations'));
	}
    public function create(){
        return view('Admin.site_information.create');
    }

    public function edit($id){
        $id = $this->decodeString($id);	
        $site = SiteInformation::find($id);
        return view('Admin.site_information.edit',compact('site'));
    }

    public function update(SiteSettingRequest $request){
         $site = SiteInformation::find($request->id);
         $data = $request->except('_ hello hetoken','id','title');

         $data['status'] =0;
         if(request()->has('status')){
            $data['status'] =1;
         }
         if($request->hasfile('content')) 
		 {	
         
			$gallery_image = $this->uploadFile($request->file('content'), 'setting'); 
            $data['content'] = $gallery_image;
		}
         $site->update($data);
         return Redirect::to('/site_information')->with('success', 'Flight'.Config::get('constants.edited'));

    }
}
