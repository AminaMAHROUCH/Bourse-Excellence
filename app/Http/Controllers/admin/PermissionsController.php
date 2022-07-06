<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends Controller
{
    public function index()
    {
    //  abort_if(Gate::denies('permission_liste'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::paginate(5);

        return view('admin.pages.permissions.index', compact('permissions'));
    }

    public function create()
    {
        //abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.permissions.create');
    }

    public function store(Request $request)
    {
        $permission = Permission::create($request->all());

        return redirect("/boursier/permissions");
    }

    public function edit(Request $request, Permission $permission)
    {
        
        return view('admin.pages.permissions.edit', compact('permission'));
    }

    public function update(Request $request , $id )
    {
        $item = Permission::find($id) ; 
        $item->titre = $request->input('title') ; 
        $item->description = $request->input('description') ;
    
        $item->save() ; 

        return redirect("/boursier/permissions");
    }

    public function show($id)
    {
        $permission = Permission::find($id) ;  
        return view('admin.pages.permissions.show', compact('permission'));
    }

    public function destroy(Permission $permission)
    {
        
        $permission->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Permission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}