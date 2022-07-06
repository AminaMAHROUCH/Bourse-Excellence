<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class LoginController extends Controller
{


    use AuthenticatesUsers{
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo(){

        $role= Auth::user()->roles('titre')->first(); 
        if($role->titre == 'candidat'){
              return route('boursier.getCandidature');
        }else{
             return route('boursier.home');
        }
        return route('login');

        // switch ($role->titre) {
        //     case 'admin':
        //         return route('boursier.home');
        //         break;
        //     case 'etudiant':
        //         return route('boursier.home');
        //         break;
        //     case 'candidat':
        //             return route('boursier.getCandidature');
        //             break;
        //     default:
        //      return route('boursier.home');
        //         break;
        // }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

   public function logout(Request $request)
    {

        $this->performLogout($request);
        return redirect()->route( 'login' );
    }
}