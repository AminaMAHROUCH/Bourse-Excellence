<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Permission_role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    public function index()
    { 
        $roles = Role::all(); 
         
        return view('admin.pages.roles.index', compact('roles'));
    }

    public function create()
    {
              
        $permissions = Permission::all();
    
         return view('admin.pages.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {  
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('boursier.roles.index');
    }

    public function edit( $id )
    {
        $role = Role::find($id) ; 
        $perm_roles = Permission_role::select('permission_id')->where('role_id',$id)->get() ; 
        $help =  Permission::whereIn('id',$perm_roles)->get() ;
        $permissions = Permission::whereNotIn('id',$perm_roles)->get() ;
        return view('admin.pages.roles.edit', compact('permissions','role','perm_roles','help')) ;
        return $p ;
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('boursier.roles.index');
    }

    public function show($id)
    {
        $role = Role::find($id) ;  
        $role->load('permissions');  
        return view('admin.pages.roles.show', compact('role'));
        // return view('admin.pages.roles.show') ; 
    }

    public function destroy(Role $role)
    {
       
        $role->delete();

        return back();
    }


}