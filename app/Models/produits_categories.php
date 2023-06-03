<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produits_categories extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function produit_categorie()
    {
        return $this;
    }
}
