<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'role_id' => 1,
                'name' => 'SurabayaDev Admin',
                'email' => 'surabayadev@gmail.com',
                'password' => bcrypt(env('PASS_ADMIN', 'secret')),
            ],
            [
                'role_id' => 2,
                'name' => 'Arek Tampan',
                'email' => 'arektampan@gmail.com',
                'password' => bcrypt('secret'),
            ],
        ];

        foreach ($data as $d) {
            User::create($d);
        }

    }
}
