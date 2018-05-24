<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'description' => $faker->realText,
        'url' => $faker->url,
        'user_id' => function() {
        	return factory(App\User::class)->create()->id;
        },
    ];
});
