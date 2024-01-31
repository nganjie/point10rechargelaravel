<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CloturerCommandePack extends Model
{
    use HasFactory;
    public $table="cloturer_commande_pack";
    
    public function commandePack(){
        return $this->belongsTo(CommandePack::class);
    }


    
}
?>