<?php

use App\Models\Event;
use App\Models\Role;
use App\Models\User;
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
        Role::truncate();
        User::truncate();
        Event::truncate();

        $this->call(
            [
                RoleSeeder::class,
                UserSeeder::class,
                EventSeeder::class
            ]
        );
    }
}
