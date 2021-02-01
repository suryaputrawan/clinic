<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labstaff extends Model
{
    protected $table = 'labstaff';
    protected $fillable = ['name'];

    public function rapid()
    {
        // Relasi tabel labstaff ke tabel rapid. Dimana satu petugas dapat melakukan banyak rapid
        return $this->hasMany(Rapid::class);
    }

    public function antigen()
    {
        return $this->hasMany(Antigen::class);
    }
}
