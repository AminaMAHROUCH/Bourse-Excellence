<?php

namespace App\Http\Controllers\admin;
use App\Notifications\marketNotification ; 
use App\Notifications\forumNotification ; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Market;
use App\Models\User;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth ;
class MarketController extends Controller
{
    //
    public function index()
    {
        $markets = Market::where('cni',Auth::user()->cni)->paginate(4) ;   
        return view("admin.pages.market.createDemanPromo",compact("markets")) ; 
    }

    function store(Request $request)
    {
        $market = new Market() ; 
        $market->description = $request->input('description') ;
        $market->type = $request->input('type') ;
        $market->titre = $request->input('titre') ;
        $market->cni  = Auth::user()->cni ;    
        $market->nom  = Auth::user()->name ;
        $market->save() ; 
        if($market)
        {
            $admins = User::whereHas('roles', function ($query) {
                $query->where('titre', 'etudiant');
            })->get();
               
            \Notification::send($admins, new marketNotification($market)); 
        }
        return back() ; 
    }

    public function demandsGet()
    {
        $demandes = Market::where('type',"طلب")->paginate(4) ;   
        return view('admin.pages.market.demandes',compact("demandes")) ; 
    }
    
    public function promotionsGet()
    {
        $promotions = Market::where('type',"عرض")->paginate(4) ;   
        return view('admin.pages.market.promotions',compact("promotions")) ; 
    }
    public function showDemande($id)
    {
        $demande = Market::where('id',$id)->first() ;
        $forums = Forum::where('id_market',$id)->paginate(4) ; 
        return view('admin.pages.market.forumDemandes',compact('demande',"forums"))  ;
    }
    public function showPromotion($id)
    {
        $promotion = Market::where('id',$id)->first() ; 
        $forums = Forum::where('id_market',$id)->paginate(4) ; 
        return  view('admin.pages.market.forumPromotions',compact('promotion',"forums")) ; 
    }

    public function forumAdd(Request $request,$id)
    {
       
        $forum = new Forum() ;  
        $forum->id_market = $id ;  
        $forum->message = $request->input('forum') ; 
        $forum->nom_user = Auth::user()->name ; 
        $forum->id_user = Auth::user()->id ;  
        $forum->save() ;
        // if($forum)
        // {
        //     Auth::user()->notify(new forumNotification($forum)) ;
        // } 
        return back() ; 
    } 
}