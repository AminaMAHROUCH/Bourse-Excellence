<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\models\Role;
use App\models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        
        $users = User::all();

        return view('admin.pages.users.index', compact('users'));
    }

    public function create()
    { 
        $roles = Role::all()->pluck('titre', 'id'); 
        return view('admin.pages.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('boursier.users.index');
    }

    public function edit(User $user)
    {
        
        $roles = Role::all()->pluck('titre', 'id');

        $user->load('roles');

        return view('admin.pages.users.edit', compact('roles', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('boursier.users.index', compact('user'));
    }

    public function show(User $user)
    {
        
        $user->load('roles'); 
        return view('admin.pages.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
       
        $user->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}