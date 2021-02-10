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
        $this->call([
            DokterTableSeeder::class,
            LaboratoriumTableSeeder::class,
            LabstaffTableSeeder::class,
            NationTableSeeder::class,
            PatientTableSeeder::class,
            PlebotomisTableSeeder::class,
            UserTableSeeder::class,
            CompanyTableSeeder::class,
        ]);
    }
}
