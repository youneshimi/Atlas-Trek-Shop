<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_comm';
    protected $fillable = [
        'contenu',
        'titre',

    ];

    public function produit()
    {
        return $this->belongsTo(Produits::class, 'id', 'titre');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

//comment
