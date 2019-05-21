<?php

use App\Models\Blog;
use App\Models\Role;
use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use App\Models\Testimony;
use App\Models\EventPhoto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

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
        Model::unguard();

        Role::truncate();
        User::truncate();
        Event::truncate();
        EventPhoto::truncate();
        Testimony::truncate();
        Category::truncate();
        Blog::truncate();
        DB::table('event_user')->truncate();

        $this->call(
            [
                RoleSeeder::class,
                UserSeeder::class,
                EventSeeder::class,
                BlogSeeder::class,
            ]
        );

        Model::reguard();
        Schema::enableForeignKeyConstraints();
    }
}
