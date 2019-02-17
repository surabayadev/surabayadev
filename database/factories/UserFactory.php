<?php

use App\Models\Role;
use App\Models\Testimony;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    $name = $faker->name;
    $username = str_slug($name);

    return [
        'role_id' => $faker->randomElement([Role::EDITOR, Role::USER]),
        'name' => $name,
        'username' => $username,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'is_active' => rand(0, 1),
        'status' => User::STATUS_NORMAL,
        'job' => $faker->jobTitle,
        'province' => $faker->state,
        'city' => $faker->city,
        'address' => $faker->streetAddress,
        'phone' => $faker->phoneNumber,
        'github' => 'https://github.com/'. $username,
        'facebook' => 'https://facebook.com/'. $username,
        'twitter' => 'https://twitter.com/'. $username,
    ];
});

$factory->define(Testimony::class, function (Faker $faker) {
    $isRegisteredUser = rand(0, 1);
    return [
        'user_id' => !$isRegisteredUser ? 0 : function () {
            return optional(User::inRandomOrder()->first())->id;
        },
        'name' => $isRegisteredUser ? null : $faker->name,
        'email' => $isRegisteredUser ? null : $faker->email,
        'job' => $isRegisteredUser ? null : $faker->jobTitle,
        'content' => $faker->paragraph,
        'status' => $faker->randomElement([Testimony::STATUS_PUBLISH, Testimony::STATUS_HIDE]),
    ];
});
