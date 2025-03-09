<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conducteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'immatricullation',
        'energie',
        'DateImmatriculation',
        'nbPlace'
    ];

    public function preference()
    {
        return $this->hasOne(Preference::class);
    }
}
