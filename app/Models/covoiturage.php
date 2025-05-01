<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covoiturage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'date',
        'depart',
        'arrive',
        'prix',
        'heure_depart',
        'heure_arrive',
        'energie_verte',
        'creation',];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function conducteur()
    {
        return $this->hasOne(Conducteur::class);
    }

    public function status()
    {
        return $this->hasOne(Status::class);
    }

    public function avis()
    {
        return $this->hasMany(Avis::class);
    }
}
