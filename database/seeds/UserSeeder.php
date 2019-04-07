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
        ]);

        factory(User::class)->create([
            'role_id' => Role::EDITOR,
            'name' => 'Arek Editor',
            'username' => 'arek-editor',
            'email' => 'arek-editor@surabayadev.org',
            'is_active' => 1,
        ]);

        factory(User::class)->create([
            'role_id' => Role::EDITOR,
            'name' => 'John Editor',
            'username' => 'john-editor',
            'email' => 'john-editor@surabayadev.org',
            'is_active' => 1,
        ]);

        factory(User::class)->create([
            'name' => 'User biasa',
            'username' => 'userbiasa',
            'email' => 'userbiasa@surabayadev.org',
        ]);

        factory(User::class, 10)->create([
            'role_id' => Role::USER,
        ]);

        $this->seedTestimony();
    }

    protected function seedTestimony()
    {
        factory(Testimony::class, 12)->create();
    }
}
