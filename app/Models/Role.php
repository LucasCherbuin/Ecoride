<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'label'];

    // Définir la relation plusieurs à plusieurs avec les utilisateurs
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

