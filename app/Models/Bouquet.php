<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouquet extends Model
{
    use HasFactory;
    public $table="bouquet";

    public function abonnementtv(){
        return $this->belongsTo(AbonnementTv::class);
    }

   
    public function commandeBouquet(){
        return $this->hasMany(CommandeBouquet::class,"bouquet_id");
    }

    
}
?>