<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => '0019451210',
            'admin' => '1',
            'access' => '0',
            'zone' => '1',
            'district' => '2',
            'grade' => '10',
            'gender' => 'male',
            'name' => 'عرفان',
            'l_name' => 'قلی زاده',
            'mobile' => '09305551082',
            'password' => bcrypt('erfan'),
            'remember_token' => str_random(10),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
