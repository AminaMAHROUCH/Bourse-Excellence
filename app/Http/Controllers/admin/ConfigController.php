<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;

class ConfigController extends Controller
{
    public function store(Request $request){
        Config::first()->update(request()->only('anne_universitaire', 'promotion'));
        return back();
    }
}