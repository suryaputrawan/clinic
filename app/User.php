<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function plebotomis()
    {
        return $this->hasMany(Plebotomis::class);
    }

    public function rapid()
    {
        return $this->hasMany(Rapid::class);
    }

    public function swabtest()
    {
        return $this->hasMany(Swabtest::class);
    }

    public function antigen()
    {
        return $this->hasMany(Antigen::class);
    }

    public function serology()
    {
        return $this->hasMany(Serology::class);
    }
}
