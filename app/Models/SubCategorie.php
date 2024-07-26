<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'valeur_sous_categorie',
        'nom_sous_categorie',
        'description',
        'categorie',
    ];
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie');
    }
}
