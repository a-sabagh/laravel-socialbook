<?php

use Josh\Faker\Faker;
use Faker\Generator as EnglishFaker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (EnglishFaker $faker) {
    return [
        'name' => Faker::fullname(),
        'phone' => Faker::mobile(),
        'national_id' => Faker::meliCode(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
