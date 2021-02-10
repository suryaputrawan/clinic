<?php

use App\Rapid;
use Illuminate\Database\Seeder;

class RapidtestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rapid::create([
            'tanggal' => '2021-01-01',
            'nosurat' => '001/RPD/I/2021',
            'patient_patNRM' => '000001',
            'pob' => 'Jakarta',
            'nationality_nationID' => 1,
            'dokter_dokterID' => 1,
            'plebotomis_id' => 1,
            'labstaff_id' => 1,
            'result' => 'Non Reactive',
            'user_id' => 1,
        ]);
    }
}
