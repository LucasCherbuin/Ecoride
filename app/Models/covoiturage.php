<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covoiturage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'depart',
        'arrive',
        'prix',
        'time',
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
}
