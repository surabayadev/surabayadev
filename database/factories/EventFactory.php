<?php

use App\Models\Event;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $name = $faker->sentence;
    return [
        // allowed user role is: editor, admin
        'user_id' => function () {
            return optional(User::byEditor()->inRandomOrder()->first())->id;
        },
        'name' => $name,
        'slug' => str_slug($name),
        'cover' => 2,
        'description' => 2,
        'content' => 2,
        'status' => $faker->randomElement([Event::STATUS_PUBLISH, Event::STATUS_HIDE]),
        'participant_limit' => $faker->randomElement([25, 50, 100]),
    ];
});