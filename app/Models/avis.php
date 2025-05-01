<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Avis extends Model
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

    public function covoiturage()
    {
        return $this->belongsTo(Covoiturage::class);
    }


}
