<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasFactory, Notifiable;
    public $table="client";

    public $fillable=[
        "utilisateur_id",
        "ville",
        "email",
        "email_verified_at",
        "password",
    ];
    
    public function utilisateur(){
        return $this->belongsTo(Utilisateur::class);
    }
    public function commandeForfait(){
        return $this->hasMany(CommandeForfait::class,"client_id");
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
