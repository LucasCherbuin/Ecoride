<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Role;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'image',
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
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
{
    return in_array($role, $this->roles->pluck('label')->toArray());
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
