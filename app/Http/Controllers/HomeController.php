<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use DB;

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

        $var =  Role::with('permissions')->get()->toArray();

        $var2 = Permission::all();

        dd($var , $var2);

    }

    public function change(Request $request)
    {
        // dd($request->all());
        // $all = Role::with('permissions')->get()->toArray();

        $staf = [];
        
        $data = DB::table('role_has_permissions')->orderBy('role_id')->lazy()->each(function ($d)  use ($staf) {

            print_r($d->role_id);
            array_push($staf , [$d->role_id , $d->permission_id]);
            //
        });
        
        // foreach($data as $d){
        //     print_r($d->role_id ."=>".$d->permission_id);
        //     echo "<br>";
        // }


        dd($staf); //->permissions[0]->name

        $arr = $request->all();

        unset($arr["_token"]);

        foreach ($arr as $key => $ar) {

            $permissions = array_keys($ar);

            foreach ($permissions as $permis) {

                print_r($permis);

                echo "<br>";
                DB::insert('insert into role_has_permissions (permission_id, role_id) values (?, ?)', [$permis, $key]);
            }
        }

        dd($arr);
    }
}

 // You can apply assignRole() on a model instance, not a builder
// $user->assignRole(['moderator']);

// $perm = $user->getAllPermissions();
// dd($user->name , $perm->pluck('name')); to get specifc key from collection of arrays

// $all = Role::with('permissions')->get()->toArray();
// dd($all); //[0]->permissions[0]->name

// $roles = Role::all();
// $permissions = Permission::all();

// return view('home', [
//     'user' => $user,
//     'perm' => $perm,
//     'permissions' => $permissions,
//     'roles' => $roles,
//     "role_permissions" => Role::with('permissions')->get()
// ]);