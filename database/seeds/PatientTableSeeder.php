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
            'patRegDate' => '2020-01-01',
            'patSurename' => 'Alonso',
            'patGivenname' => 'Nicholas',
            'patDOB' => '1987-01-05',
            'patSex' => 'L',
            'patAddres' => 'Jalan Majapahit No. 134 Surakarta',
            'patPhone' => '0857834563',
            'patEmail' => 'alonso@gmail.com',
            'nationality_nationID' => 1,
            'user_id' => 1,
        ]);
    }
}
