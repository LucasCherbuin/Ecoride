<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'fumeur',
        'animal',
        'detail',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
