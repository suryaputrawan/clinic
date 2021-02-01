<?php

use App\Dokter;
use Illuminate\Database\Seeder;

class DokterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dokter::create([
            'doktername' => 'dr. Ahmad Sharon Nurhalim',
            'dokterAddr' => 'Jl. Panjaitan Selatan No. 3 Jakarta Selatan',
            'dokterTelp' => '0857895487321',
            'dokterEmail' => 'ahmadsharon@gmail.com',
        ]);
    }
}
