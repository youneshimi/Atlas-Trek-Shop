<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_cat';
    protected $fillable = [
        'id_cat',
        'label',

    ];

    public function produit()
    {
        return $this->belongsToMany(Produits::class);
    }
    public function categorie_produits()
    {
        return $this->belongsToMany(Produits::class, 'produits_categories', 'categorie_id', 'prod_id');
    }
}
