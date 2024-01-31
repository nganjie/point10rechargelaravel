<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CloturerOffre extends Model
{
    use HasFactory;
    public $table="cloturer_offre";

    public function commandeOffreSpeciale(){
        return $this->belongsTo(CommandeOffreSpeciale::class);
    }
    
}
?>