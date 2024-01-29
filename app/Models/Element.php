<?php
 namespace App\Models;
 use App\Models\Forfait;
 class Element{
   public $categorie;
    public $valeur;
    public function __construct($content)
    {
        $tab =explode(":",$content);
      //  var_dump($tab);
        $this->categorie=str_replace("$","",$tab[0]);
        $this->valeur=$tab[1];
        //var_dump($this);
    }
    public function Template():string
    {
        return "<p><span style=''>{$this->categorie}</span> : <span style='color:blue'>{$this->valeur}</span></p>";
    }
    public function SingleTemplate():string
    {
        return "<p><span style=''>{$this->categorie}</span> : <span style='color:#41f1b6'>{$this->valeur}</span></p>";
    }
    
 }
?>