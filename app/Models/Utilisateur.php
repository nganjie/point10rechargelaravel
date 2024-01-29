<?php 
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @mixin IdeHelperUtilisateur
 */
class Utilisateur extends Model{
    use HasFactory;
    public $table="utilisateur";
    protected $fillable=[
        "nom",
        "numero"
    ];

    public function client(){
        return $this->hasOne(Client::class);
    }

    public function admin(){
        return $this->hasOne(Admin::class);
    }
    public function message(){
        return $this->hasMany(Message::class,"Env_id");
    }
    

}
?>