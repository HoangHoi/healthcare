<?php

use Illuminate\Database\Seeder;
use App\Models\Hospital;

class HospitalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hospitals')->truncate();
        factory(Hospital::class, 5)->create();
    }
}
