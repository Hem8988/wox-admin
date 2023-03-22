<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Config;
use App\UserRole;
use App\Permission;
use App\UserType;
use App\Country;
use App\Admin;
use App\State;
use App\role_has_permission;
use Illuminate\Support\Facades\Hash;

class RolesController extends Controller
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
    public function index()
    {
        $lists   = UserType::all();
        return view('Roles.index', compact(['lists']));
    }

    public function create(Request $request)
    {
        $usertype    = UserType::all();
        return view('Roles.create', compact(['usertype']));
    }


    public function saveRole(Request $request)
    {

        if (!empty($request->name && $request->position && $request->status) && count($request->permission)  > 0) {
            $roleNameExist = UserType::where('name', $request->name)->get();
            if (!empty(($roleNameExist))) {
                $UserType = new UserType;
                $UserType->name = $request->name;
                $UserType->position = $request->position;
                $UserType->status = $request->status;
                $UserType->save();
                $insert_id = $UserType->id;
                /******************inser permissions ***********/
                if (!empty($insert_id)) {
                    if (!empty($request->permission)) {
                        foreach ($request->permission as $permission) {
                            $per_store = new role_has_permission;
                            $per_store->permission_name_slug = $permission;
                            $per_store->role_id = $insert_id;
                            $per_store->save();
                            $inser_per = $per_store->id;
                        }
                        if ($inser_per) {
                            return redirect()->back()->with('message', 'Role Permissions Updated');
                        } else {
                            return redirect()->back()->with('message', 'Permissions Not Updated ! Try Again');
                        }
                    }
                }
            } else {
                return redirect()->back()->with('message', 'Permissions Not Updated ! Try Again');
            }
        } else {
            return redirect()->back()->with('message', 'All Field A re Required ! Try Again');
        }
    }


    public function subAdmin()
    {

        $admin  = Admin::all();
        return view('Roles.superAdmin', compact(['admin']));
    }


    public function subAdminAdd($id = null)
    {
        if (isset($id) && !empty($id)) {
            $id = $this->decodeString($id);
            $admin  = Admin::find($id);
        } else {
            $admin  = '';
        }
        $uertype  = UserType::get();
        $Country  = Country::get();
        return view('Roles.createSubAdmin', compact(['uertype', 'Country', 'admin']));
    }

    public function storeuser(Request $request)
    {


        if (isset($request->userId) && !empty($request->userId)) {
            $this->validate($request, [
                'first_name' => 'required',
                'role' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);
            if (isset($request) && !empty($request)) {
                $saved =  Admin::where('id', $request->userId)
                    ->update([
                        'first_name' => @$request->first_name,
                        'last_name' =>  @$request->last_name,
                        'role' => @$request->role,
                        'email' => @$request->email,
                        'password' => Hash::make(@$request->password),
                        'phone' => @$request->phone,
                    ]);
            } else {
                $saved =  Admin::where('id', $request->userId)
                    ->update([
                        'first_name' => @$request->first_name,
                        'last_name' =>  @$request->last_name,
                        'role' => @$request->role,
                        'email' => @$request->email,
                        'phone' => @$request->phone,
                    ]);
            }
            if ($saved) {
                return redirect()->back()->with('message', 'User Updated ');
            } else {
                return redirect()->back()->with('message', 'Try Agian later!');
            }
        } else {
            $this->validate($request, [
                'first_name' => 'required',
                'role' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'phone' => 'required',
            ]);
            $obj = new Admin;
            $obj->role = 2;
            $obj->first_name = @$request->first_name;
            $obj->last_name = @$request->last_name;
            $obj->role = @$request->role;
            $obj->email = @$request->email;
            $obj->password = Hash::make(@$request->password);
            $obj->decrypt_password = @$request->password;
            $obj->phone = @$request->phone;
            $saved    =    $obj->save();
            if ($saved) {
                return redirect()->back()->with('message', 'User Created');
            } else {
                return redirect()->back()->with('message', 'Try Agian later!');
            }
        }
    }


    public function viewUser($id)
    {
        if (isset($id) && !empty($id)) {
            $id = $this->decodeString($id);
            $fetchedData = Admin::find($id);
            return view('Roles.viewUsers', compact("fetchedData"));
        }
    }

    public function deleteuser($id)
    {
        if (isset($id) && !empty($id)) {
            $id = $this->decodeString($id);
            $res=Admin::where('id',$id)->delete();
            if ($res) {
                return redirect()->back()->with('message', 'User Deleted !');
            } else {
                return redirect()->back()->with('message', 'Try Agian later!');
            }
        }
    }

    public function superAdmin()
    {
        $lists  = Permission::all();
        $Country  = Country::all();
        return view('Roles.permission', compact(['lists']));
    }

    public function superAdminStore(Request $request)
    {
        Permission::create(
            [
                'categoryId' => $request->categoryId,
                'permissionName' => $request->permission_title,
                'permission_slug' => $request->permission_slug
            ]
        );
        return redirect('department/superAdmin');
    }



    public function state(Request $request)
    {
        $id = $request->country;
        if ($id) {
            $country = $id;
            // Define state and city array
            $state_list = State::where('country_id', $country)->get();
            if ($state_list) {
                if ($country !== 'Select') {
                    echo '<option value="">Select State</option>';
                    foreach ($state_list as $state) {
                        echo '<option value="' . $state->id . '">' . $state->name . '</option>';
                    }
                }
            } else {
                echo '<option value="">Select State!</option>';
                echo '<option value="no">No states found!</option>';
            }
            die();
        }
    }



    /* Hotel City data */
    // public function hotelCityData()
    // {
    //     if (isset($_POST["state"])) {
    //         $state_id = $_POST["state"];
    //         // Define state and city array
    //         $city_list = get_city_list($state_id);
    //         if ($city_list) {
    //             if ($state_id !== '') {
    //                 echo '<option value="">Select City</option>';
    //                 foreach ($city_list as $city) {
    //                     echo '<option value="' . $city->id . '">' . $city->name . '</option>';
    //                 }
    //             }
    //         } else {
    //             echo '<option value="">Select City!</option>';
    //         }
    //         die();
    //     }
    // }
}
