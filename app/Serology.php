<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serology extends Model
{
    protected $table = 'serologytest';

    protected $guarded = ['id', 'remarks', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function plebotomis()
    {
        return $this->belongsTo(Plebotomis::class);
    }

    public function laboratorium()
    {
        return $this->belongsTo(Laboratorium::class);
    }
}
