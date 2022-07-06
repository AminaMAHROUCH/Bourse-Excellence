<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

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
    public function index()
    {
        $role= Auth::user()->roles('title')->first();
        if($role->title = 'admin'){
            return view('admin.pages.dashboardAdmin');
        }elseif($role->title = 'admin') {
            return view('admin.pages.dashboardEtudiant');
        }

    }
}