<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbonnementTv extends Model
{
    use HasFactory;
    public $table="abonnementtv";

    public function bouquet(){
        return $this->hasMany(Bouquet::class,"abonnement_id");
    }

    
}
?>
