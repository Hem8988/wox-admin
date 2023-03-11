<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Config;
use App\UserRole;
use App\Permission;
use App\UserType;

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
        $usertype         = UserType::all();
        return view('Roles.create', compact(['usertype']));
    }

    public function superAdmin()
    {
        $lists  = Permission::all();
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
}
