<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CloturerCommandePuce extends Model
{
    use HasFactory;
    public $table="cloturer_commande_puce";

    public function commandePuce(){
        return $this->belongsTo(CommandePuce::class);
    }
}


?>
