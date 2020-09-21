<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Channel;
use Faker\Generator as Faker;

$factory->define(Channel::class, function (Faker $faker) {
    return [

            'name' => $faker->name,
            'icon' => $faker->image($dir = '/tmp', $width = 300, $height = 300),


    ];
});
