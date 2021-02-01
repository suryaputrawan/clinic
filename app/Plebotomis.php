<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plebotomis extends Model
{
    protected $table = 'plebotomis';
    protected $fillable = ['name', 'user_id'];

    public function rapid()
    {
        // Relasi tabel plebotomis ke tabel rapid. Dimana satu petugas dapat melakukan banyak rapid
        return $this->hasMany(Rapid::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
