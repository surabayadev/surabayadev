<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Testimony;
use Illuminate\Support\Str;
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
        'api_token' => Str::random(60),
        'remember_token' => str_random(10),
        'is_active' => rand(0, 1),
        'status' => User::STATUS_NORMAL,
        'job' => $faker->jobTitle,
        'province' => $faker->state,
        'city' => $faker->city,
        'address' => $faker->streetAddress,
        'phone' => '+62'. $faker->randomNumber(),
        'website' => 'https://'. $username .'.com/',
        'github' => $username,
        'facebook' => $username,
        'instagram' => $username,
        'twitter' => $username,
        'linkedin' => $username,
    ];
});

$factory->define(Testimony::class, function (Faker $faker) {
    $isRegisteredUser = rand(0, 1);
    return [
        'user_id' => !$isRegisteredUser ? null : function () {
            return optional(User::inRandomOrder()->first())->id;
        },
        'name' => $isRegisteredUser ? null : $faker->name,
        'email' => $isRegisteredUser ? null : $faker->email,
        'job' => $isRegisteredUser ? null : $faker->jobTitle,
        'avatar' => $faker->imageUrl($width = 300, $height = 300),
        'content' => $faker->paragraph,
        'status' => $faker->randomElement([Testimony::STATUS_PUBLISH, Testimony::STATUS_HIDE]),
    ];
});
