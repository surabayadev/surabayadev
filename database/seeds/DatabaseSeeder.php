<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Seeder;
use App\Models\EventParticipant;
use App\Models\EventDocumentaion;

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
        EventParticipant::truncate();
        EventDocumentaion::truncate();

        $this->call(
            [
                RoleSeeder::class,
                UserSeeder::class,
                EventSeeder::class,
                ParticipantSeeder::class,
                EventDocumentationSeeder::class
            ]
        );
    }
}
