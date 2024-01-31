<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffreSpecialeForfait extends Model
{
    use HasFactory;
    public $table="offre_speciale_forfait";

    public function offreSpeciale(){
        return $this->belongsTo(OffreSpeciale::class);
    }
}


?>
