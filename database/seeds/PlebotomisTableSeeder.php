<?php

use App\Plebotomis;
use Illuminate\Database\Seeder;

class PlebotomisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plebotomis::create([
            'name' => 'Airul Salopi',
            'user_id' => 1,
        ]);
    }
}
