<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');

        $this->middleware(
            'permission:home|menu-dashboard|menu-blog|menu-rol|menu-usuario',
            ['only' =>  ['home|blogs']]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        $user = User::find(Auth::user()->id);
        $role = Role::find($user->id);
        $permissions = $user->getAllPermissions();
        //$role->hasPermissionTo("universal");
        //dd($role->hasPermissionTo("menu-usuario"));
        return view('home', compact('user','role', 'permissions'));
    }
}
