<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    protected $fillable = [
        'nom_stand',
        'description',
        'utilisateur_id',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(\App\Models\User::class, 'utilisateur_id');
    }
}
