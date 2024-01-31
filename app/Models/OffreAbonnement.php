<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffreAbonnement extends Model
{
    use HasFactory;
    public $table="offre_abonnement";

    public function offre(){
        return $this->belongsTo(Offre::class);
    }
    public function abonnementtv(){
        return $this->belongsTo(Bouquet::class);
    }
}
?>