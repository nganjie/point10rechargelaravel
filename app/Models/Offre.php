<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    public $table="offre";

    public function offre(){
        if($this->type_offre=="offre_forfait")
        {
            return $this->hasOne(OffreForfait::class);
        }else if($this->type_offre=="offre_modem_forfait"){
            return $this->hasOne(OffreModemForfait::class);
        }else{
            return $this->hasOne(OffreAbonnement::class);
        }
    }

    public function offreSpeciale(){
        return $this->belongsTo(OffreSpeciale::class);
    }
    public function commandeOffreSpeciale(){
        return $this->hasMany(CommandeOffreSpeciale::class);
    }
}
?>