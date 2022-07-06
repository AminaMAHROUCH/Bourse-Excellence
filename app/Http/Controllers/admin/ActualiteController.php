<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actualite ;
use App\Jobs\SendEmailJob ;
use App\Mail\ActualiteMail ;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\ActualiteNotification ;
use App\Notifications\NewActualiteNotification ; 

class ActualiteController extends Controller
{
    
    public function index()
    {
        // abort_if(Gate::denies('actualite_acces'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actualites = Actualite::orderBy('publier','desc')->paginate(6); 
        return view("admin.pages.actualites.index")->with('actualites',$actualites) ;
    }
    public function create()
    {
        return view("admin.pages.actualites.create");
    }

    public  function store(Request $request)
    {
        $curTime = new \DateTime(); 
        $actualite = new Actualite();
        $actualite->titre  = $request->input('title') ;
        $actualite->publier  = $curTime->format("Y-m-d H:i:s");
        $actualite->contenu = $request->input('content') ; 
        $actualite->save() ;

        // notification 
        if($actualite){
            $admins = User::whereHas('roles', function ($query) {
                $query->where('titre', 'etudiant');
            })->get();
               
            \Notification::send($admins, new NewActualiteNotification($actualite)); 
        }

        $template_data = [
           'date' => $curTime->format("d-m-Y"), 
           'subject'=> 'Actualite',
           'content' => $request->input('content'),
           'title' => $actualite->titre 
           ]; 
     
        $job = new SendEmailJob($template_data); 
        dispatch($job);
        return redirect('/boursier/actualites');
    }

    public function update(Request $request , $id )
    {
        $curTime = new \DateTime();
        $actualite = Actualite::find($id);
        $actualite->titre  = $request->input('title') ;
        $actualite->publier  = $curTime->format("Y-m-d H:i:s");
        $actualite->contenu = $request->input('content') ;
        $actualite->save() ;
        return  redirect('/boursier/actualites') ; 
    }
    public function destroy(Request $request , $id )
    {
        Actualite::find($id)->delete() ;  
        return redirect('/boursier/actualites') ; 
    }
}