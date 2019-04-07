<?php

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->words(rand(2,4), true);

    return [
        'user_id' => function () {
            return optional(User::byEditor()->inRandomOrder()->first())->id;
        },
        'name' => $name,  
        'slug' => str_slug($name),
        'description' => $faker->paragraph(2),
    ];
});

$factory->define(Blog::class, function (Faker $faker) {
    $name = $faker->sentence;

    return [
        'user_id' => function () {
            return optional(User::byEditor()->inRandomOrder()->first())->id;
        },
        'cover' => $faker->imageUrl($width = 640, $height = 480),
        'title' => $name,
        'slug' => str_slug($name),
        'excerpt' => $faker->paragraph(2),
        'content' => $faker->paragraph(8),
        'status' => $faker->randomElement([Blog::STATUS_PUBLISH, Blog::STATUS_HIDE]),
    ];
});