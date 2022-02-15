<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{
    function __construct()
    {
        $this->middleware(
            'permission:ver-rol|crear-rol|editar-rol|borrar-rol',
            ['only' =>  ['index']]
        );

        $this->middleware(
            'permission:crear-rol',
            ['only' =>  ['create','store']]
        );

        $this->middleware(
            'permission:editar-rol',
            ['only' =>  ['edit','update']]
        );

        $this->middleware(
            'permission:borrar-rol',
            ['only' =>  ['destroy']]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);        
        $permissions = $user->getAllPermissions();
        
        $roles = Role::paginate(5);

        return view('roles.index', compact('roles', 'user', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        $user = User::find(Auth::user()->id);
        return view('roles.crear', compact('permission', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'permission' => 'required'
            ]
        );

        $role = Role::create(
            ['name' => $request->input('name')]
        );
        $role->syncPermissions(
            $request->input('permission')
        );

        return redirect()->route('roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')
                            ->where('role_has_permissions.role_id', $id)
                            ->pluck(
                                'role_has_permissions.permission_id',
                                'role_has_permissions.permission_id')
                            ->all();
        $user = User::find(Auth::user()->id);
        
        return view('roles.editar', compact('role', 'permission', 'rolePermissions', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'permission' => 'required'
            ]
        );

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete();

        return redirect()->route('roles.index');
    }
}
