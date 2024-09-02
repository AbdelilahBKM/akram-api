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
        'parent_categorie',
    ];
    public function children()
    {
        return $this->hasMany(Categorie::class, 'parent_categorie');
    }

    /**
     * Get the parent category for this category.
     */
    public function parent()
    {
        return $this->belongsTo(Categorie::class, 'parent_categorie');
    }
}
