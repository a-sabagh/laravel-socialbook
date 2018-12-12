<?php

use Faker\Generator as Faker;
//    protected $fillable=['name','pages','isbn','price','published_at'];

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->name),
        'pages' => $faker->numberBetween(100,10000),
        'isbn' => $faker->numberBetween(1000000000,9999999999),
        'price' => $faker->numberBetween(10,500),
        'published_at' => $faker->date('Y-m-d')
    ];
});
