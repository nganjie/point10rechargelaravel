<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CloturerCommandeModem extends Model
{
    use HasFactory;
    public $table="cloturer_commande_modem";

    public function commandeModem(){
        return $this->belongsTo(CommandeModem::class);
    }

    
}
?>