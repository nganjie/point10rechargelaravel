<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandePuce extends Model
{
    use HasFactory;
    public $table="commande_puce";

    public function puce(){
        return $this->belongsTo(Puce::class);
    }

    public function cloturerCommandePuce(){
        return $this->hasOne(cloturerCommandePuce::class);
    }

    
}
?>