<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'SurabayaDev Admin',
            'email' => 'surabayadev@gmail.com',
            'password' => bcrypt(env('PASS_ADMIN')),
        ]);
    }
}
