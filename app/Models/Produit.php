<?php

namespace App\Models;

use App\Models\Categorie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $table = 'produits';

    protected $fillable = [
        'nom_produits',
        'prix',
        'categorie_id'
    ];


    public function categorie()
    {

        return $this->belongsTo(Categorie::class);
        
    }

}

