<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'modele',
        'marque',
        'couleur',
        'energieVerte'
    ];

    public function users()
    {
        return $this->HasMany(User::class);
    }
}
