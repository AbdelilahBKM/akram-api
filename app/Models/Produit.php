<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_produit',
        'image_produit',
        'image_url',
        'description',
        'prix',
        'en_promotion',
        'remise',
        'date_limit_promotion',
        'categorie'
    ];

    // Define the relationship with the Categorie model
    public function categorie()
    {
    return $this->belongsTo(Categorie::class, 'categorie');
    }

}
