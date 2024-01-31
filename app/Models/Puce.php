<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puce extends Model
{
    use HasFactory;
    public $table="puce";

    public function CommandePuce(){
        return $this->hasMany(CommandePuce::class);
    }
}
?>