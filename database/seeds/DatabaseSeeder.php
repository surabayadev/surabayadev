<?php

use App\Models\Event;
use App\Models\Role;
use App\Models\Testimony;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Role::truncate();
        User::truncate();
        Event::truncate();
        Testimony::truncate();

        $this->call(
            [
                RoleSeeder::class,
                UserSeeder::class,
                EventSeeder::class,
            ]
        );

        Schema::enableForeignKeyConstraints();
    }
}
