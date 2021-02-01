<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    protected $table = 'laboratorium';

    protected $fillable = ['name', 'address', 'telphone'];

    public function swabtest()
    {
        return $this->hasMany(Swabtest::class);
    }

    public function serology()
    {
        return $this->hasMany(Serology::class);
    }
}
