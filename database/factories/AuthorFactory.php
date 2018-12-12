<?php

use Josh\Faker\Faker;
use Faker\Generator as EnglishFaker;

$factory->define(App\Author::class, function (EnglishFaker $faker) {
    return [
        'name' => Faker::fullname(),
        'birthdate' => $faker->date('Y-m-d')
    ];
});
