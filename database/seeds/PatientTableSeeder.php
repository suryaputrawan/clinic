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
            'patAddres' => 'Jalan Majapahit No. 134 Jakarta',
            'patPhone' => '0857834563',
            'patEmail' => 'alonso@gmail.com',
            'nationality_nationID' => 1,
            'user_id' => 1,
        ]);

        Patient::create([
            'patNRM' => '000002',
            'patidCardNo' => '8878999799983',
            'patRegDate' => '2020-01-02',
            'patSurename' => 'Ruben',
            'patGivenname' => 'Andreas',
            'patDOB' => '1999-03-08',
            'patSex' => 'L',
            'patAddres' => 'Jalan Anto Suroto No. 189, Jakarta',
            'patPhone' => '08798577837',
            'patEmail' => 'andreas@gmail.com',
            'nationality_nationID' => 1,
            'user_id' => 1,
        ]);
    }
}
