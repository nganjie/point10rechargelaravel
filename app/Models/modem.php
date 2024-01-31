<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modem extends Model
{
    use HasFactory;
    public $table="modem";

    public function commandeModem(){
        return $this->hasMany(CommandeModem::class,"modem_id");
    }
    
}
?>