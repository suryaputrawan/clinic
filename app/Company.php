<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    protected $table = 'company';

    protected $fillable = [
        'name', 'alias', 'address', 'kabupaten', 'provinsi',
        'telphone', 'npwp', 'logo',
    ];

    public function getTakeImageAttribute()
    {
        return "Storage/" . $this->logo;
    }
}
