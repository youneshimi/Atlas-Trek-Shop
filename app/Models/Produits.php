<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produits extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'titre',
        'description',
        'prix',
        'image',
        'note',
        'actif',

    ];



    public function produit()
    {
        return $this;
    }

    public function comment()
    {
        return $this->hasMany(Comments::class, 'id_comm', 'user_id', 'product_id', 'contenu', 'note')->orderBy('created_at', 'DESC');
    }

    public function produit_categorie()
    {
        return $this->belongsToMany(Categories::class, 'produits_categories', 'prod_id', 'categorie_id');
    }
    public function categorie()
    {
        return $this->belongsToMany(Categories::class, 'produits_categories', 'prod_id', 'categorie_id');
    }
}
