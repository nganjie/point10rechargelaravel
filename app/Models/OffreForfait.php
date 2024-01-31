<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffreForfait extends Model
{
    use HasFactory;
    public $table="offre_forfait";
    public function offre(){
        return $this->belongsTo(Offre::class);
    }
    public function forfait(){
        return $this->belongsTo(Forfait::class);
    }
    
    
}
?>