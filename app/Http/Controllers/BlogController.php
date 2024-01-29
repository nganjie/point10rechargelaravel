<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Forfait;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Requests\BlogFilterRequest;
use App\Http\Requests\CreatePostRequest;
use App\Models\Categorie;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    //
    public function indexVisiteur(){
        return view("visiteurs.index");
    }
    public function index(){
        //$posts= \App\Models\Forfait::all();
       /* $val=Validator::make([
            "title"=>"zezzezdfdfe",
            "content"=>"on a message"
        ],[
            "title"=>'required|min:8'
        ]);*/
       // $ca =Forfait::with("categorie")->get();
       /*$ca= Forfait::find(13);
        $nomClient="";
        dd($ca->TemplateCarousel());
        $forfaits =Forfait::all()*/
        /*foreach($utilisateur as $user){
            $nomClient.=" - ".$user->categorie->nom;
        }*/
        //echo $nomClient;
       // dd($utilisateur->utilisateur);
       // $a=[1,2,5];
        //dd($a);
        return view('blog.index',[
            "forfaits"=>\App\Models\Forfait::all()
        ]);
    }
    public function show(string $slug, Forfait $forfait){
        //$forfaitt= \App\Models\Forfait::find($forfait);
        
        if($forfait->id_nom!=$slug)
        {
            return to_route("blog.show",["slug"=>$forfait->id_nom,"forfait"=>$forfait->id]);
        }
        return $forfait."un monde";

    }
    public function create(){
        return view("blog.create");
    }
    public function store(CreatePostRequest $request){
       // dd($request->all());
       $data=$request->validated();
       /** @var UploadedFile|null $image*/
       $image=$request->validated("image");
       
       if($image !=null && !$image->getError())
       {
        $imagePath =$image->store('blog','public');
        dd($imagePath);
       }
       
        $utilisateur =Utilisateur::create($request->validated());
        return redirect()->route("blog.hello")->with("success","L'utilisateur à bien été enregistrer");
    }
    public function hello(){
        return view("blog.hello");
    }
    public function edit(Utilisateur $utilisateur){
        //dd($utilisateur);
        return view("blog.edit",[
            "utilisateur"=>$utilisateur
        ]);
    }
    public function update(Utilisateur $utilisateur,CreatePostRequest $req){
        $utilisateur->update($req->validated());
        return redirect()->route("blog.hello")->with("success","L'utilisateur à bien été modifié");
    }
}
