<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_categorie',
        'description_categorie',
    ];

    public function products()
    {
        return $this->belongsToMany(Produit::class, 'product_category');
    }
}
