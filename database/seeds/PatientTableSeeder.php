<?php

use App\Patient;
use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::create([
            'patNRM' => '000001',
            'patidCardNo' => '79874298975042',
            'patSurename' => 'Alonso',
            'patGivenname' => 'Nicholas',
            'patDOB' => '1987-01-05',
            'patSex' => 'L',
            'nation_nationID' => 1,
        ]);
    }
}
