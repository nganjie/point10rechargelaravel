<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CloturerCommande extends Model
{
    use HasFactory;
    public $table="cloturer_commande";
    public function commandeForfait(){
        return $this->belongsTo(CommandeForfait::class);
    }
}
