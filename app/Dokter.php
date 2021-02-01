<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'mhDokter';

    //mendeklarasikan nama field yang dijadikan primary key pada tabel
    protected $primaryKey = 'dokterID';

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
