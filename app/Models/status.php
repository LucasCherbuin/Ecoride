<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;

    protected $fillable = [
        'en prévision',
        'en cours',
        'annulé'
    ];

    public function covoiturage()
    {
        return $this->hasMany(Covoiturage::class);
    }
}
