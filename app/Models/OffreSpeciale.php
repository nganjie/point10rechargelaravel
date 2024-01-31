<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffreSpeciale extends Model
{
    use HasFactory;
    public $table="offre_speciale";

    public function offreSpeciale(){
        if($this->type_offre=="offre_speciale_forfait")
        {
            return $this->hasOne(OffreSpecialeForfait::class);
        }else if($this->type_offre=="offre_speciale_modem_forfait"){
            return $this->hasOne(OffreSpecialeModemForfait::class);
        }else{
            return $this->hasOne(OffreSpecialeAbonnement::class);
        }
    }
    public function offre(){
        return $this->hasMany(Offre::class);
    }
    
}


?>
