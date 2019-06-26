<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Posts::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'body' => $faker->text(),
        'photo_id' => 1,
        'user_id' => factory('App\User')->create()->id,
        'category_id' => 1,
        'status' => 1,
];
});
