<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;

use App\Testimonial;

use Auth;
use Config;

class TestimonialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {	
        $this->middleware('auth:admin');
	}
	/**
     * All Cms Page.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request)
	{
		//check authorization start	
			 $check = $this->checkAuthorizationAction('cmspages', $request->route()->getActionMethod(), Auth::user()->role);
			if($check)
			{
				return Redirect::to('/dashboard')->with('error',config('constants.unauthorized'));
			}	 
		//check authorization end
		
		$query 		= Testimonial::where('id', '!=', '');
		
		$totalData 	= $query->count();	//for all data
		
		if ($request->has('search_term')) 
		{
			$search_term 		= 	$request->input('search_term');
			if(trim($search_term) != '')
			{		
				$query->where('title', 'LIKE', '%' . $search_term . '%');
			}
		}
		if ($request->has('search_term_from')) 
		{
			$search_term_from 		= 	$request->input('search_term_from');
			if(trim($search_term_from) != '')
			{
				$query->whereDate('created_at', '>=', $search_term_from);
			}
		}
		if ($request->has('search_term_to')) 
		{	
			$search_term_to 		= 	$request->input('search_term_to');
			if(trim($search_term_to) != '')
			{
				$query->whereDate('created_at', '<=', $search_term_to);
			}	
		}

		if ($request->has('search_term') || $request->has('search_term_from') || $request->has('search_term_to')) 
		{
			$totalData 	= $query->count();//after search
		}
		
		$lists		= $query->orderby('id','DESC')->get();
		
		return view('Admin.testimonial.index',compact(['lists', 'totalData']));	
	}
	
	public function create(Request $request)
	{
		return view('Admin.testimonial.create');	
	}
	
	public function store(Request $request)
	{
		 $check = $this->checkAuthorizationAction('cmspages', $request->route()->getActionMethod(), Auth::user()->role);
			if($check)
			{
				return Redirect::to('/dashboard')->with('error',config('constants.unauthorized'));
			}	
		if ($request->isMethod('post')) 
		{
			$this->validate($request, [
					'title' => 'required|max:255',
			]);
			$requestData 		= 	$request->all();
			if($request->hasfile('image')) 
			{	
				$topinclu_image = $this->uploadFile($request->file('image'), Config::get('constants.cmspage')); 
			}
			else
			{ 
				$topinclu_image = NULL;
			}
			
			$obj				= 	new Testimonial;
			$obj->title			=	@$requestData['title'];
			$obj->content			=	@$requestData['description'];
			//$obj->status		=	@$requestData['status'];
			$obj->image		=	@$topinclu_image;
			//$obj->slug	=	$this->createlocSlug('testimonials',@$requestData['title']);
			$saved				=	$obj->save();  
			
			if(!$saved)
			{
				return redirect()->back()->with('error', Config::get('constants.server_error'));
			}
			else
			{
				return Redirect::to('/testimonial')->with('success', 'Testimonial added Successfully');
			}
		}			
	}
	
	public function edittestimonialPage(Request $request, $id = NULL)
	{	
		//check authorization start	
			 $check = $this->checkAuthorizationAction('cmspages', $request->route()->getActionMethod(), Auth::user()->role);
			if($check)
			{
				return Redirect::to('/dashboard')->with('error',config('constants.unauthorized'));
			}	
		//check authorization end
	
		if ($request->isMethod('post')) 
		{
			$requestData 		= 	$request->all();
			
			$this->validate($request, [
										'title' => 'required|max:255|unique:testimonials,title,'.@$requestData['id'],
										
									  ]);
					if($request->hasfile('image')) 
			{	
				/* Unlink File Function Start */ 
					if($requestData['image'] != '')
						{
							$this->unlinkFile($requestData['old_image'], Config::get('constants.cmspage'));
						}
				/* Unlink File Function End */
				
				$topinclu_image = $this->uploadFile($request->file('image'), Config::get('constants.cmspage'));
			}
			else
			{
				$topinclu_image = @$requestData['old_image'];
			}
			$obj				= 	Testimonial::find(@$requestData['id']);
			$obj->title			=	@$requestData['title'];
			$obj->image			=	@$topinclu_image;
			$obj->content		=	@$requestData['description'];
			//$obj->slug	=	$this->createlocSlug('testimonials',@$requestData['title'], $requestData['id']);
			//$obj->is_sidebar			=	@$requestData['is_sidebar'];
			$saved				=	$obj->save();
			
			if(!$saved)
			{
				return redirect()->back()->with('error', Config::get('constants.server_error'));
			}
			else
			{
				return Redirect::to('/testimonial')->with('success', 'Testimonial '.Config::get('constants.edited'));
			}				
		}
		else
		{	
			if(isset($id) && !empty($id))
			{
				$id = $this->decodeString($id);	
				if(Testimonial::where('id', '=', $id)->exists()) 
				{
					$fetchedData = Testimonial::find($id);
					return view('Admin.testimonial.edit', compact(['fetchedData']));
				}
				else
				{
					return Redirect::to('/testimonial')->with('error', 'Testimonial '.Config::get('constants.not_exist'));
				}	
			}
			else
			{
				return Redirect::to('/testimonial')->with('error', Config::get('constants.unauthorized'));
			}		
		}				
	}
	
}
