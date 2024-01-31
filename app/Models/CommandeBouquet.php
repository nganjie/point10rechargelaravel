<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeBouquet extends Model
{
    use HasFactory;
    public $table="commande_bouquet";

    public function bouquet(){
        return $this->belongsTo(Bouquet::class);
    }
    public function cloturerCommandeBouquet(){
        return $this->hasOne(CloturerCommandeBouquet::class,"commande_bouquet_id");
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
}


?>
