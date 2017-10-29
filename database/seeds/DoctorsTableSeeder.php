<?php

use Illuminate\Database\Seeder;
use App\Models\Hospital;
use App\Models\Specialist;
use App\Models\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospitals = Hospital::all();
        $specialists = Specialist::all();
        DB::table('doctors')->truncate();

        factory(Doctor::class, 20)->create([
            'hospital_id' => $hospitals->random()->id,
            'specialist_id' => $specialists->random()->id,
        ]);
    }
}
