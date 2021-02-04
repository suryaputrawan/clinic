<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DokterTableSeeder::class);
        $this->call(LaboratoriumTableSeeder::class);
        $this->call(LabstaffTableSeeder::class);
        $this->call(NationTableSeeder::class);
        $this->call(PatientTableSeeder::class);
        $this->call(PlebotomisTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
    }
}
