<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    protected $table = 'mhStateNation';
    protected $primaryKey = 'nationID';

    protected $fillable = ['nationName'];

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
