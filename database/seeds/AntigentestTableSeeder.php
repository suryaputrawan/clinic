<?php

use App\Antigen;
use Illuminate\Database\Seeder;

class AntigentestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Antigen::create([
            'tanggal' => '2021-01-02',
            'nosurat' => '001/ANTG/I/2021',
            'patient_patNRM' => '000002',
            'pob' => 'Jakarta',
            'nationality_nationID' => 1,
            'dokter_dokterID' => 1,
            'plebotomis_id' => 1,
            'labstaff_id' => 1,
            'result' => 'Negative',
            'user_id' => 1,
        ]);
    }
}
