<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Swabtest extends Model
{
    protected $table = 'swabtest';

    protected $fillable = [
        'tanggal_sampling', 'tanggal_validasi', 'waktu_validasi', 'tanggal_surat',
        'nosurat', 'patient_patNRM', 'pob', 'nationality_nationID',
        'dokter_dokterID', 'laboratorium_id', 'result', 'remarks', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function laboratorium()
    {
        return $this->belongsTo(Laboratorium::class);
    }
}
