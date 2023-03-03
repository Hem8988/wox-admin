<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\Admin;
use App\Destination;
use App\Amenitie;
use App\Hotel;
 
use Auth;
use Config;

class ManagehotelController extends Controller
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
     * All Vendors.
     *
     * @return \Illuminate\Http\Response 
     */
	public function index(Request $request)
	{
		//check authorization start	
			$check = $this->checkAuthorizationAction('holiday_package', $request->route()->getActionMethod(), Auth::user()->role);
			if($check)
			{
				return Redirect::to('/dashboard')->with('error',config('constants.unauthorized'));
			}	
		//check authorization end
		if(Auth::user()->role == 1){
			$query 		= Hotel::where('id','!=','' )->with(['user', 'locations']);
		}else{	
			$query 		= Hotel::where('user_id', '=', Auth::user()->id)->with(['destinations']);
		 }
		
		
		$totalData 	= $query->count();	//for all data
		if ($request->has('hotel_id')) 
		{
			$hotel_id 		= 	$request->input('hotel_id'); 
			if(trim($hotel_id) != '')
			{
				$query->where('id', '=', @$hotel_id);
			}
		}
		
		if ($request->has('name')) 
		{
			$name 		= 	$request->input('name'); 
			if(trim($name) != '')
			{
				$query->where('name', 'LIKE', '%'.@$name.'%');
			}
		}
		if ($request->has('destination')) 
		{
			$destination 		= 	$request->input('destination'); 
			if(trim($destination) != '')
			{
				$query->where('destination', '=', @$destination);
			}
		}
		if ($request->has('stars')) 
		{
			$stars 		= 	$request->input('stars'); 
			if(trim($stars) != '')
			{
				$query->where('hotel_category', '=', @$stars);
			}
		}
		if ($request->has('category')) 
		{
			$category 		= 	$request->input('category'); 
			if(trim($category) != '')
			{
				$query->where('hotel_categories', '=', @$category);
			}
		}
		
		$lists		= $query->orderby('id','desc')->get();
		
		return view('Admin.managehotel.index',compact(['lists', 'totalData']));

		//return view('Admin.managehotel.index');	  
	}
	
	public function create(Request $request)
	{
		//check authorization start	
			$check = $this->checkAuthorizationAction('holiday_package', $request->route()->getActionMethod(), Auth::user()->role);
			if($check)
			{
				return Redirect::to('/dashboard')->with('error',config('constants.unauthorized'));
			}	
		//check authorization end
		if(Auth::user()->role == 1){			
			$destination 		= Destination::all();	
			$amenitie 		= Amenitie::all(); 
		}else{
			$destination 		= Destination::where('user_id', '=', Auth::user()->id)->orderby('id', 'desc')->get(); 	
			$amenitie 		= Amenitie::where('user_id', '=', Auth::user()->id)->orderby('id', 'desc')->get();
		}		
		return view('Admin.managehotel.create',compact(['destination', 'amenitie']));
	}
	
	public function store(Request $request)
	{
		//check authorization start	
			$check = $this->checkAuthorizationAction('holiday_package', $request->route()->getActionMethod(), Auth::user()->role);
			if($check)
			{
				return Redirect::to('/dashboard')->with('error',config('constants.unauthorized'));
			}	
		//check authorization end
		if ($request->isMethod('post')) 
		{
			$this->validate($request, [
										'name' => 'required|max:255',
										'dest_type' => 'required|max:255',
										'destination' => 'required',
										'hotel_category' => 'required|max:255',
										'image_alt' => 'required|max:255',
										'description' => 'required',
										'address' => 'required|max:255',
										
									  ]);
			
			$requestData 		= 	$request->all();
			if(isset($requestData['imageids'])){
							
				$imageids = $requestData['imageids'];
				for($i=0; $i<count($imageids); $i++){
					$u .= $imageids[$i].',';
				}
			}

			$hotelbehaviour = '';
			if(isset($requestData['hotelbehaviour'])){
				
				$hotelbehaviours = $requestData['hotelbehaviour'];
				for($i=0; $i<count($hotelbehaviours); $i++){
					$hotelbehaviour .= $hotelbehaviours[$i].',';
				}
			}		
			
			$obj				= 	Hotel::find($requestData['id']);
			$obj->name			=	@$requestData['name'];
			$obj->dest_type		=	@$requestData['dest_type'];
			$obj->destination	=	@$requestData['destination'];
			$obj->hotel_category	=	@$requestData['hotel_category'];
			$obj->hotel_categories	=	@$requestData['hotel_categories'];
			$obj->image_alt			=	@$requestData['image_alt'];
			$obj->description			=	@$requestData['description'];
			$obj->amenities			=	json_encode(@$requestData['amenities']);
			$obj->help_line_no			=	@$requestData['help_line_no'];
			$obj->email			=	@$requestData['email'];			
			$obj->address	=	@$requestData['address'];
			$obj->pin_code	=	@$requestData['pin_code'];
			$obj->sale_price	=	@$requestData['sale_price'];
			$obj->b2b_price	=	@$requestData['b2b_price'];
			$obj->offer_price	=	@$requestData['offer_price'];
$obj->three_hrs	=	@$requestData['three_hrs'];
$obj->six_hrs	=	@$requestData['six_hrs'];
$obj->fix_fit	=	@$requestData['fix_fit'];
$obj->latitude	=	@$requestData['latitude'];
$obj->longitude	=	@$requestData['longitude'];
$obj->policy	=	@$requestData['policy'];
$obj->partial_payment	=	@$requestData['partial_payment'];
$obj->galleryimages	=	rtrim($u,',');
$obj->hotelbehaviour	=  json_decode($hotelbehaviour);
$obj->slug	=	$this->createSlug(Auth::user()->id,'hotels',@$requestData['name'], $requestData['id']);	
			//$obj->status	=	@$requestData['status'];
			
			// Hotel Image Upload Function Start 						  
					if($request->hasfile('image')) 
					{	
						$hotel_img = $this->uploadFile($request->file('image'), Config::get('constants.hotel_img')); 
					}
					else
					{
						$hotel_img = NULL;
					}		
				// Hotel Image Upload Function End 	
			$obj->image			=	@$hotel_img;
			$saved				=	$obj->save();  
			
			if(!$saved)
			{
				return redirect()->back()->with('error', Config::get('constants.server_error'));
			}
			else
			{
				return Redirect::to('/hotel')->with('success', 'Hotel added Successfully');
			}				
		}	

	}
	
	
	public function edit(Request $request, $id = NULL)
	{			
		
	//check authorization start	
			$check = $this->checkAuthorizationAction('holiday_package', $request->route()->getActionMethod(), Auth::user()->role);
			if($check)
			{
				return Redirect::to('/dashboard')->with('error',config('constants.unauthorized'));
			}	
		//check authorization end
		//check authorization end
		$destination 		= Destination::all();	 	
		$amenitie 		= Amenitie::all();
	
		if ($request->isMethod('post')) 
		{
			$requestData 		= 	$request->all();
			
			$this->validate($request, [
										'name' => 'required|max:255',
										'dest_type' => 'required|max:255',
										'destination' => 'required',
										'description' => 'required',
										'hotel_category' => 'required|max:255',
										'image_alt' => 'required|max:255',
										
										
										
										'address' => 'required|max:255',
										
									  ]);
									  $obj				= 	Hotel::find($requestData['id']);
									  $obj->name			=	@$requestData['name'];
									  $obj->dest_type		=	@$requestData['dest_type'];
									  $obj->destination	=	@$requestData['destination'];
									  $obj->hotel_category	=	@$requestData['hotel_category'];
									  $obj->hotel_categories	=	@$requestData['hotel_categories'];
									  $obj->image_alt			=	@$requestData['image_alt'];
									  $obj->description			=	@$requestData['description'];
									  $obj->amenities			=	json_encode(@$requestData['amenities']);
									  $obj->help_line_no			=	@$requestData['help_line_no'];
									  $obj->email			=	@$requestData['email'];			
									  $obj->address	=	@$requestData['address'];
									  $obj->pin_code	=	@$requestData['pin_code'];
									  $obj->sale_price	=	@$requestData['sale_price'];
									  $obj->b2b_price	=	@$requestData['b2b_price'];
									  $obj->offer_price	=	@$requestData['offer_price'];
						  $obj->three_hrs	=	@$requestData['three_hrs'];
						  $obj->six_hrs	=	@$requestData['six_hrs'];
						  $obj->fix_fit	=	@$requestData['fix_fit'];
						  $obj->latitude	=	@$requestData['latitude'];
						  $obj->longitude	=	@$requestData['longitude'];
						  $obj->policy	=	@$requestData['policy'];
						  $obj->partial_payment	=	@$requestData['partial_payment'];
						  $obj->galleryimages	=	rtrim($u,',');
						  $obj->hotelbehaviour	=  json_decode($hotelbehaviour);
						  $obj->slug	=	$this->createSlug(Auth::user()->id,'hotels',@$requestData['name'], $requestData['id']);	
									  //$obj->status	=	@$requestData['status'];
			//$obj->status	=	@$requestData['status'];						
			
			/* Hotel Image Upload Function Start */						  
			if($request->hasfile('image')) 
			{	
				/* Unlink File Function Start */ 
					if($requestData['image'] != '')
						{
							$this->unlinkFile($requestData['old_image'], Config::get('constants.hotel_img'));
						}
				/* Unlink File Function End */
				
				$hotel_img = $this->uploadFile($request->file('image'), Config::get('constants.hotel_img'));
			}
			else
			{
				$hotel_img = @$requestData['old_image'];
			}		
		/* Hotel Image Upload Function End */
		
			$obj->image			=	@$hotel_img;
			
			$saved				=	$obj->save();
			
			if(!$saved)
			{
				return redirect()->back()->with('error', Config::get('constants.server_error'));
			}
			else
			{
				return Redirect::to('/hotel')->with('success', 'Hotel Edited Successfully');
			}				
		}
		else
		{	
			if(isset($id) && !empty($id)) 
			{
				$id = $this->decodeString($id);	
				if(Hotel::where('id', '=', $id)->exists()) 
				{
					$fetchedData = Hotel::find($id);
					return view('Admin.managehotel.edit', compact(['fetchedData', 'destination', 'amenitie']));
				} 
				else
				{
					return Redirect::to('/hotel')->with('error', 'Hotel Not Exist');
				}	
			}
			else
			{
				return Redirect::to('/hotel')->with('error', Config::get('constants.unauthorized'));
			}		
		}				
	}
	 
	
}
