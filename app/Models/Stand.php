<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_stand',
        'description',
        'utilisateur_id'
    ];

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
