<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Forfait;
use App\Models\Message;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\MessageContact;
use App\Models\CommandeForfait;
use App\Http\Requests\MessageContactRequest;
use Symfony\Component\Mime\MessageConverter;
use App\Http\Requests\MessageConctactRequest;

class visiteurController extends Controller
{
    //
    public function index(){
        $forfait =new MessageContact();
        $result =$forfait->all();
        //var_dump($result);
        return view("visiteurs.index");
    }
   
    public function contact(){
        return view("visiteurs.contact");
    }
    public function test(){
        return view("visiteurs.test");
    }
    public function se_connecter(){
       // echo "oh je vois";
        return view("visiteurs.se_connecter");
    }
    public function creer_compte(){
        return view("visiteurs.creer_compte");
    }
    public function enregistrer_message_contact(MessageContactRequest $req)
    {
       /* $message =new MessageContact();
        $result = $message->create($_POST);
       //echo " on a : ".$result;
       $valid =0;
       if($result)
       {
        $valid =1;
        return header("LOCATION: contacts?valid={$valid}");
        //return view("visiteurs.contacts",compact('valid'));
       }*/
       $messageContact = MessageContact::create($req->validated());
       //dd($messageContact);
       return redirect()->route("visiteurs.contact")->with("success","Votre message à bien été envoyer");
       
    }
    public function creation_compte()
    {
        $client =new Client();
        $result = $client->create($_POST);
       //echo " on a : ".$result;
       $valid =0;
       if($result)
       {
        $valid =1;
        //return view("visiteurs.se-connecter");
        return header("LOCATION: se-connecter");
        //return header("LOCATION: index.php");
        //return view("visiteurs.index");
        //return view("visiteurs.contacts",compact('valid'));
       }else{
       // return view("visiteurs.creer_compte");
        return header("LOCATION: creer-compte?result={$result}");
       }
    }
    public function messages_create()
    {
        //echo "je regarde admin";
        //$admin =new Admin(db,$id,1);
        $client = new Client();
        $message =new Message(); //Messages(db,$id);
        $message->create($_POST,true);
        //var_dump($client);
        return view("visiteurs.client_message");
    }
    public function connexion_client()
    {
        $client =new Client();
        $result = $client->connexion($_POST);
        
       //echo " on a : ".$result;
       $valid =0;
       if($result==1)
       {
        $valid =1;
        //dashbord_client();
        
        //return view("visiteurs.index");
        //return view("visiteurs.contacts",compact('valid'));
       }else{
        return header("LOCATION: se-connecter?result={$result}");
       }
    }
    public function forfait(){
       // $f =Forfait::all();
      /*  $f->sort(function (Forfait $a,Forfait $b) {
    return strcmp($a->categorie->nom, $b->categorie->nom);
});*/
/*$f =$f->groupBy("categorie.nom");
        dd($f);*/
        $f=Forfait::with("categorie")->get()->groupBy("categorie.nom");
        
        return view("visiteurs.forfait",[
            "forfaits"=>Forfait::all(),
            "categorie"=>Categorie::all(),
            "groupForfait"=>$f
        ]);
    }
    public function validation_forfait(Forfait $forfait){
       // var_dump($forfait);
        return view("visiteurs.validation_forfait",[
            "forfait"=>$forfait
        ]);
    }
    public function details_forfait(Forfait $forfait)
    {
        //$f=Forfait::find(13);
        //dd($forfait);
        //$otherForfait =Forfait::where("prix",">",$forfait->prix)->limit(3)->get();
        //dd($otherForfait);
        return view("visiteurs.detailsForfait",[
            "forfait"=>$forfait,
            "otherForfait"=>Forfait::where("prix",">",$forfait->prix)->limit(3)->get()
        ]);
    }
    public function facture()
    {
        $facture =$_POST["facture"];
       return view("visiteurs.pdf",compact("facture"));
    }
    public function dashbord_client()
    {
       // $client =new Client(db,$_SESSION["id_utilisateur"]);
       // $client->setInfo($_SESSION['id'],$_SESSION['ville'],$_SESSION['email']);
       return view("visiteurs.dashbord_client");
    }
    public function deconnexion()
    {
       // $client =new Client(db,$_SESSION["id_utilisateur"]);
       // $client->setInfo($_SESSION['id'],$_SESSION['ville'],$_SESSION['email']);
       return view("visiteurs.deconnexion");
    }
    public function facture_client(int $id)
    {
      //$pdo =db->getPDO();
      //echo $id;
     /* $req =$pdo->prepare("SELECT c.id,c.nom,c.email,c.numero_benefice,c.numero_payement,c.operateur_payement,nom_entreprise,numero_whatsapp,c.numero_transaction,c.date_commande,c.date_cloture,c.idclient,c.forfait_id,cl.id as idc,cl.id_commande,cl.date_cloture,cl.decision,cl.id_admin FROM commande_forfait c INNER JOIN cloturer_commande cl ON cl.id_commande=c.id WHERE c.id=:idc");
      $req->execute(array(
        "idc"=>$id
      ));
      $data=$req->fetch();
      //echo $data->id;
      $forfait =new Forfait();
      //var_dump($data);
        //$client =new Client(db,$id);
        $commande=new CommandeForfait($data);*/
       return view("visiteurs.facture_client",compact("commande","forfait"));
    }
    public function client_message()
    {
      // $client =new Client(db,$id);
       // $client->setInfo($_SESSION['id'],$_SESSION['ville'],$_SESSION['email']);
       return view("visiteurs.client_message");
    }

    public function show(int $id)
    {
       // var_dump(db->getPDO());
       $f=new Forfait();
       //echo $f->findById(1);
       //var_dump($f->findById(1));
        //$post=db->getPDO()->query("SELECT * FROM message_contact");
        //$forfait=$post->fetchAll();
        //$d=78;
        /*foreach($forfait as $elt)
        {
            echo $elt->date;
        }*/
        return view("visiteurs.show",compact('forfait'));
    }

}
