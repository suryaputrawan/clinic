<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapid extends Model
{
    protected $table = 'rapidtest';
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
        // Relasi Tabel rapid ke Tabel labstaff yaitu satu rapid hanya bisa diambil satu petugas
        return $this->belongsTo(Labstaff::class);
    }

    public function plebotomis()
    {
        // Relasi Tabel rapid ke Tabel plebotomis yaitu satu rapid hanya bisa diambil satu petugas
        return $this->belongsTo(plebotomis::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function arrival()
    {
        return $this->belongsTo(Arrival::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }
}
