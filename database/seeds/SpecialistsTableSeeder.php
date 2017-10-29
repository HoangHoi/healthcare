<?php

use Illuminate\Database\Seeder;
use App\Models\Specialist;

class SpecialistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialists')->truncate();
        factory(Specialist::class, 5)->create();
    }
}
