<?php

use App\Swabtest;
use Illuminate\Database\Seeder;

class SwabTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder
        Swabtest::create([
            'tanggal_sampling' => '2021-01-03',
            'tanggal_validasi' => '2021-01-04',
            'waktu_validasi' => '10:30:00',
            'tanggal_surat' => '2021-01-04',
            'nosurat' => '001/SWB/I/2021',
            'patient_patNRM' => '000001',
            'pob' => 'Jakarta',
            'nationality_nationID' => 1,
            'dokter_dokterID' => 1,
            'laboratorium_id' => 1,
            'result' => 'Negative',
            'user_id' => 1,
        ]);
    }
}
