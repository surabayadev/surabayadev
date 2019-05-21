<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use App\Models\EventPhoto;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $name = $faker->sentence;
    $date = $faker->dateTimeBetween('-6 months', 'now', 'Asia/Jakarta');
    $start = Carbon::createFromFormat('Y-m-d H:i:s', $date->format('Y-m-d H:i:s'))->addDays(5);

    return [
        // allowed user role is: editor, admin
        'user_id' => function () {
            return optional(User::byEditor()->inRandomOrder()->first())->id;
        },
        'name' => $name,
        'slug' => str_slug($name),
        'cover' => $faker->imageUrl($width = 640, $height = 480),
        'description' => $faker->paragraph(2),
        'content' => $faker->paragraph(6),
        'status' => $faker->randomElement([Event::STATUS_PUBLISH, Event::STATUS_HIDE]),
        'city' => $faker->city,
        'address' => $faker->address,
        'participant_limit' => $faker->randomElement([25, 50, 100]),
        'start_date' => $start,
        'end_date' => $start->copy()->addHours(3),
        'created_at' => $date,
        'updated_at' => $date,
    ];
});

$factory->define(EventPhoto::class, function (Faker $faker) {
    $name = $faker->sentence;
    $dummy = [
        [
            'https://scontent-sin6-2.cdninstagram.com/vp/5761682b21c655f995b0690a113c154c/5D6E8A35/t51.2885-15/e35/59220009_826629517710164_1612574315007450562_n.jpg?_nc_ht=scontent-sin6-2.cdninstagram.com&_nc_cat=108&se=8&ig_cache_key=MjAzNjIwODU2MzIzMzY4Mjk0Mg%3D%3D.2',
            'https://scontent-sin6-2.cdninstagram.com/vp/1ba44e879e91cf7234e3ae226587601d/5D5C042E/t51.2885-15/e35/p240x240/59220009_826629517710164_1612574315007450562_n.jpg?_nc_ht=scontent-sin6-2.cdninstagram.com&_nc_cat=108&ig_cache_key=MjAzNjIwODU2MzIzMzY4Mjk0Mg%3D%3D.2'
        ],
        [
            'https://scontent-sin6-2.cdninstagram.com/vp/7e180880e34160fe2710a955d0746be2/5D5866B6/t51.2885-15/e35/42496449_253636652021407_5641985495169560433_n.jpg?_nc_ht=scontent-sin6-2.cdninstagram.com&_nc_cat=107&ig_cache_key=MTg4NDY2MzQ0NTg0OTIwNDcxOA%3D%3D.2',
            'https://scontent-sin6-2.cdninstagram.com/vp/3f134a263354a0c729a3c35206e13170/5D5113BE/t51.2885-15/e35/s240x240/42496449_253636652021407_5641985495169560433_n.jpg?_nc_ht=scontent-sin6-2.cdninstagram.com&_nc_cat=107&ig_cache_key=MTg4NDY2MzQ0NTg0OTIwNDcxOA%3D%3D.2'
        ]
    ];

    $random = $dummy[rand(0, 1)];
    return [
        'original' => $random[0],
        'thumbnail' => $random[1],
        'provider' => 'ig',
        'source_link' => 'https://www.instagram.com/p/BodR7UFFznE/',
    ];
});
