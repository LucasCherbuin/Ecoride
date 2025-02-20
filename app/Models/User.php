<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'pseudo',
        'email',
        'password',
        'Credit'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function avis()
    {
        return $this->hasMany(Avis::class);
    }

    public function covoiturage()
    {
        return $this->hasMany(Covoiturage::class);
    }

    public function preference()
    {
        return $this->hasOne(User::class);
    }
}
