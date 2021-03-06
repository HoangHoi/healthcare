<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HospitalsTableSeeder::class);
        $this->call(SpecialistsTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}
