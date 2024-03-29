<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageContact extends Model
{
    use HasFactory;
    public $table="message_contact";
    protected $fillable=[
        "nom",
        "numero",
        "email",
        "content"
    ];
}
