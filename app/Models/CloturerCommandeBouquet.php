<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CloturerCommandeBouquet  extends Model
{
    use HasFactory;
    public $table="cloturer_commende_boutique";

    public function bouquet(){
        return $this->belongsTo(CommandeBouquet::class);
    }
    
}
?>