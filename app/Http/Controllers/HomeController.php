<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        // Auth::guard('web')->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        $authed = auth()->user();

        // \App\Models\User::find($user)->assignRole(1); User::with('roles')->get()
        $user = User::find($authed)->first();

        // You can apply assignRole() on a model instance, not a builder
        // $user->assignRole(['moderator']);


        $perm = $user->getAllPermissions();
        // dd($user->name , $perm->pluck('name')); to get specifc key from collection of arrays

        $all = Role::with('permissions')->get();
        //dd($all); //[0]->permissions[0]->name

        $roles = Role::all();
        $permissions = Permission::all();

        return view('home', [
            'user' => $user,
            'perm' => $perm,
            'permissions'=>$permissions,
            'roles'=>$roles,
            "role_permissions" => Role::with('permissions')->get()
        ]);
    }

    public function change(Request $request){

        dd($request->all());
    }
}
