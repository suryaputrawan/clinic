<?php

use App\Labstaff;
use Illuminate\Database\Seeder;

class LabstaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Labstaff::create([
            'name' => 'Akbar Phalopi',
        ]);
    }
}
