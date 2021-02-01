<?php

use App\Laboratorium;
use Illuminate\Database\Seeder;

class LaboratoriumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Laboratorium::create([
            'name' => 'Kimia Farma',
            'address' => 'Jl. Diponegoro No.125, Dauh Puri Klod',
            'telphone' => '0361 4747774',
        ]);
    }
}
