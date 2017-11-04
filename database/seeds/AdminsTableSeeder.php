<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();

        Admin::create([
            'name' => 'Hoang Hoi',
            'email' => 'hoanghoi1310@gmail.com',
            'password' => bcrypt('12344321'),
            'phone_number' => '0982708002',
            'is_actived' => true,
        ]);
    }
}
