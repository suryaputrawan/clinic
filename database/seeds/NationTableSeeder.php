<?php

use App\Nationality;
use Illuminate\Database\Seeder;

class NationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nationality::create([
            'nationName' => 'Indonesia',
        ]);
    }
}
