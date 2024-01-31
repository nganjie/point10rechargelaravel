<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandePack extends Model
{
    use HasFactory;
    public $table="commande_pack";

    public function puce(){
        return $this->belongsTo(Puce::class);
    }
    public function modem(){
        return $this->belongsTo(Modem::class);
    }
    public function forfait(){
        return $this->belongsTo(Forfait::class);
    }
    public function cloturerCommandePack(){
        return $this->hasOne(CloturerCommandePack::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }




    
}
?>