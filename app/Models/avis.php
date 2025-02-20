<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class avis extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'note',
        'commentaire',
        'valid'
    ];

    public function users()
    {
        return $this->HasMany(User::class);
    }

    public function covoiturages()
    {
        return $this->HasMany(Covoiturage::class);
    }

}
