<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antigen extends Model
{
    protected $table = 'antigenswab';

    protected $fillable = [
        'tanggal', 'nosurat', 'patient_patNRM', 'pob', 'nationality_nationID',
        'dokter_dokterID', 'plebotomis_id', 'labstaff_id',
        'result', 'remarks', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function labstaff()
    {
        return $this->belongsTo(Labstaff::class);
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
}
