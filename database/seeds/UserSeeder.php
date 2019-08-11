<?php

use App\Models\Role;
use App\Models\Testimony;
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
        factory(User::class)->create([
            'role_id' => Role::ADMIN,
            'name' => 'SurabayaDev Admin',
            'username' => 'surabayadev',
            'email' => 'surabayadev@gmail.com',
            'password' => bcrypt(env('PASS_ADMIN', 'secret')),
            'api_token' => 'YqjpaWG3z8zlDeemfm4B915UQdWvVfkTNONplluBlPuTnWhS53oer6QFl1YY',
            'is_active' => 1,
            'last_login_at' => now(),
            'email_verified_at' => now(),
        ]);

        factory(User::class)->create([
            'role_id' => Role::EDITOR,
            'name' => 'Arek Editor',
            'username' => 'arek-editor',
            'email' => 'arek-editor@surabayadev.org',
            'is_active' => 1,
            'last_login_at' => now(),
            'email_verified_at' => now(),
        ]);

        factory(User::class)->create([
            'role_id' => Role::EDITOR,
            'name' => 'John Editor',
            'username' => 'john-editor',
            'email' => 'john-editor@surabayadev.org',
            'is_active' => 1,
            'last_login_at' => now(),
            'email_verified_at' => now(),
        ]);

        factory(User::class)->create([
            'name' => 'User biasa',
            'username' => 'userbiasa',
            'email' => 'userbiasa@surabayadev.org',
            'last_login_at' => now(),
            'email_verified_at' => now(),
        ]);

        factory(User::class)->create([
            'name' => 'Sawitri',
            'username' => 'sawitri',
            'email' => 'sawitri.center@gmail.com',
            'last_login_at' => now(),
            'email_verified_at' => now(),
        ]);

        factory(User::class)->create([
            'name' => 'Arryangga Aliev',
            'username' => 'arryangga',
            'email' => 'arryanggaputra@gmail.com',
            'last_login_at' => now(),
            'email_verified_at' => now(),
        ]);

        factory(User::class)->create([
            'name' => 'Fathoni',
            'username' => 'fathoni',
            'email' => 'achmadfatony@gmail.com',
            'last_login_at' => now(),
            'email_verified_at' => now(),
        ]);

        factory(User::class)->create([
            'name' => 'Antoni Putra',
            'username' => 'antoniputra',
            'email' => 'akiddcode@gmail.com',
            'last_login_at' => now(),
            'email_verified_at' => now(),
        ]);

        if (app()->isLocal()) {
            // Seed dummy users
            factory(User::class, 10)->create([
                'role_id' => Role::USER,
            ]);

            // seed dummy testiomny
            $this->seedTestimony();
        }
    }

    protected function seedTestimony()
    {
        factory(Testimony::class, 6)->create();
    }
}
