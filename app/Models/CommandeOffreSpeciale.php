<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeOffreSpeciale  extends Model
{
    use HasFactory;
    public $table="commande_offre_speciale";

    public function offre(){
        return $this->belongsTo(Offre::class);
    }
    public function cloturerOffre(){
        return $this->hasOne(CloturerOffre::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
?>