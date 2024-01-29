<?php 
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @mixin IdeHelperForfait
 */
class Forfait extends Model{
    use HasFactory;
    public $table="forfait";
    
    public function taille(){
        return $this->belongsTo(Taille::class);
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function commandeForfait(){
        return $this->hasMany(CommandeForfait::class);
    }
    public function forfait()
    {
      $query ="SELECT f.id as id,c.nom,t.symbole as taille,type,description,nb_go,prix FROM forfait f INNER JOIN taille t ON t.id=f.taille INNER JOIN categorie c ON c.id=f.id_nom ORDER BY f.id DESC";
      $req=$this->db->getPDO()->query($query);
      return $req->fetchAll();
     return $tab=$this->all();
    }
    public function getForfait(int $id)
    {
      $req=$this->db->getPDO()->prepare("SELECT f.id as id,c.nom,t.symbole as taille,type,description,nb_go,prix FROM forfait f INNER JOIN taille t ON t.id=f.taille INNER JOIN categorie c ON c.id=f.id_nom  WHERE f.id=:id");
      $req->bindValue("id",$id);
      $req->execute();
      $forfait =$req->fetch();
      return $forfait;
    }
    public function AllForfait()
    {
      $query ="SELECT id FROM forfait";
      $req=$this->db->getPDO()->query($query);
      $req=$req->fetchAll();
      $f="";
      for($i=0;$i<count($req);$i++)
      {
        //$f.=(new SingleForfait($this->db,$req[$i]->id))->TemplateCarousel();
      }
     // echo $f;
      return $f;
    }
    public function otherForfait()
    {
      $query ="SELECT id FROM forfait ORDER BY RAND( ) LIMIT 2";
      $req=$this->db->getPDO()->query($query);
      $req=$req->fetchAll();
      $f="";
      for($i=0;$i<count($req);$i++)
      {
       // $f.=(new SingleForfait($this->db,$req[$i]->id))->Template();
      }
     // echo $f;
      return $f;
    }
    public function AllCategorie()
    {
      $query ="SELECT nom FROM categorie";
      $req=$this->db->getPDO()->query($query);
      $req=$req->fetchAll();
      return $req;
    }
    public function desc(){
        return new Caracteristique($this->description);
    }
    public function TemplateForfait(){
        $desc =new Caracteristique($this->description);
        $a="<div class='details_wrapper'>
      <div class='details_bundles'>
        <div>
          <img src='../media/images/blue.png' alt='' />
        </div>
        <div>
          <p>Nom du forfait : <strong style='color:blue'>{$this->categorie->nom}</strong></p>
          {$desc->Template()}
          <p>Prix :<span style='color:blue'>  {$this->prix}</span></p>
        </div>
      </div>
      <div class='start_now'>
        
      </div>
    </div>";
    return $a;
    }
    public function SingleTemplate()
    {
      $desc =new Caracteristique($this->description);
      $a="<div class='details_wrapper'>
      <div class='details_bundles'>
        <div>
          <img src='../media/images/blue.png' alt='' />
        </div>
        <div>
          <p>Nom du forfait : <strong style='color:blue'>{$this->categorie->nom}</strong></p>
          {$desc->Template()}
          <p>Prix :<span style='color:blue'>  {$this->prix}</span></p>
        </div>
      </div>
      <div class='start_now'>
        
      </div>
    </div>";
    return $a;
    }
    public function TemplateDetaille()
    {
        $desc =new Caracteristique($this->description);
        $a="  <div class='details_wrapper'>
        <div class='details_bundles'>
          <div>
            <img src='../media/images/blue.png' alt='' />
          </div>
          <div>
            <p>Nom du forfait : <strong style='color:blue'>{$this->categorie->nom}</strong></p>
            {$desc->Template()}
            <p>Prix :<span style='color:blue'>  {$this->prix}</span></p>
          </div>
        </div>
        <div class='start_now'>
          
          <a href='../validation-forfait/{$this->id}' class='button green_btn'>
            <div class='slide'></div>
            <span class='text_btn' >Passer ma commande</span>
          </a>
        </div>
      </div>";
      return $a;
    }
    public function TemplateCarousel()
    {
      $desc =new Caracteristique($this->description);
      $a= "<div class='slide slide-5'>
        <a href='details-forfait/{$this->id}' class='bundle_item'>
        <div class='bundle_item_content'>
          <div class='image'>
            <img src='../media/images/blue.png' alt='' />
          </div>
          <div class='bundle_description'>
            <p class='plan'><span style='color:#41f1b6'>{$this->categorie->nom}</span></p>
            {$desc->Template()}
          </div>
          <div>
            <span class='bundle_name'>{$this->prix}</span>
          </div>
        </div>
      </a></div>";
      return $a;
    }

    public function Template():string
    {
        $desc =new Caracteristique($this->description);
        $a= "  <a href='../details-forfait/{$this->id}' class='bundle_item'>
        <div class='bundle_item_content'>
          <div class='image'>
            <img src='../media/images/blue.png' alt='' />
          </div>
          <div class='bundle_description'>
            <p class='plan'><span style='color:#41f1b6'>{$this->categorie->nom}</span></p>
            {$desc->Template()}
          </div>
          <div>
            <span class='bundle_name'>{$this->prix}</span>
          </div>
        </div>
      </a>";
      //echo "c'est de la merde ici bas ";
     // echo $a;
    //$b= $this->description->Template();
      //echo $b;
      //var_dump($this->description->Template());
      return $a;
    }
   

}
?>