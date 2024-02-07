<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommandeForfait extends Model
{
    use HasFactory;
    public $table="commande_forfait";

    public $fillable=[
        "nom",
        "email",
        "numero_benefice",
        "numero_payement",
        "nom_entreprise",
        "numero_whatsapp",
        "operateur_payement",
        "numero_transaction",
        "client_id",
        "forfait_id"
    ];
    public function forfait(){
        return $this->belongsTo(Forfait::class);
    }
    public function cloturerCommande(){
        return $this->hasOne(CloturerCommande::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function scopeAvailable(Builder $builder):Builder{
        return $builder->where("","");
    }
}
