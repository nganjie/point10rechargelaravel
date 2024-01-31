<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeModem extends Model
{
    use HasFactory;
    public $table="commande_modem";

    public function modem(){
        return $this->belongsTo(Modem::class);
    }
    public function cloturerCommandeModem(){
        return $this->hasOne(cloturerCommandeModem::class,"commande_modem_id");
    }

    
}
?>