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
            'admin' => '0',
            'zone' => '1',
            'district' => '2',
            'grade' => '10',
            'name' => 'erfan',
            'l_name' => 'gholizade',
            'password' => bcrypt('erfan'),
            'remember_token' => str_random(10),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
