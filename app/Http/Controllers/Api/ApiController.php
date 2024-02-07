<?php

namespace App\Http\Controllers\Api;

use App\Events\ChatMessageEvent;
use App\Events\ValidCommandeEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCommandeForfaitRequest;
use App\Models\CommandeForfait;
use App\Models\Forfait;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function forfaits(){
        //"id","nom","symbole","taille","type","description","nb_go","prix"
        $forfaits =Forfait::with("categorie","taille")->limit(4)->get();
        //event(new ValidCommandeEvent("commande-forfait",$forfaits));
        //event(new ChatMessageEvent("arthur","bonsoir"));
        return response()->json($forfaits);
    }
    public function sortName(Request $req){
        $f="";
        return $req->option;
        if($req->value=="all"){
            $f=Forfait::with("categorie")->get()->groupBy("categorie.nom");
        }else{
            $f=Forfait::with("categorie")->get()->where("categorie.nom",$req->value)->groupBy("categorie.nom");
        }
        
        
        return view("apiview.forfaits",[
            "groupForfait"=>$f
        ]);
    }
    public function sortGoPrix(Request $req){
        $f="";
        
        if($req->option=="nb_go"){
            $f=Forfait::with("categorie")->get()->whereBetween("nb_go",[$req->valueone,$req->valuetwo])->groupBy("categorie.nom");
        }else{
            $f=Forfait::with("categorie")->get()->whereBetween("prix",[$req->valueone,$req->valuetwo])->groupBy("categorie.nom");
        }
        
        return view("apiview.forfaits",[
            "groupForfait"=>$f
        ]);
    }
    public function sortPrix(Request $req){
        $f=Forfait::with("categorie")->get()->whereBetween("prix",[$req->valueone,$req->valuetwo])->groupBy("categorie.nom");
        return view("apiview.forfaits",[
            "groupForfait"=>$f
        ]);
    }
    public function storeCommandeForfait(Request $req){

       $commande= CommandeForfait::create(["nom"=>$req->name,
        "email"=>$req->email,
        "numero_benefice"=>$req->phone_number,
        "numero_payement"=>$req->pay_number,
        "nom_entreprise"=>$req->nom_entreprise,
        "numero_whatsapp"=>$req->whatsap_number,
        "operateur_payement"=>$req->methode,
        "numero_transaction"=>$req->transaction_number,
        "client_id"=>$req->id_client,
        "forfait_id"=>$req->id_forfait]);
        //$jc=response()->json($commande);

        event(new ValidCommandeEvent("commande-forfait",$commande));

        return response()->json($commande);

    }
}
