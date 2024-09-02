<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_client',
        'email_client',
        'message_client',
        'pays',
        'numero_tel',
        'is_new'
    ];
}
