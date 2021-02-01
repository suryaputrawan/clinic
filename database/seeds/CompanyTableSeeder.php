<?php

use App\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'PT. Alamasan Nusantara',
            'alias' => 'Clinic Persada Nusantara',
            'address' => 'Jl. Raya Nusantara Selatan No. 15',
            'telphone' => '0361 999876',
        ]);
    }
}
