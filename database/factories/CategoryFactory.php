<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'categoryName' => $faker->word,
        'shortDescription' => $faker->text,
        'publicationStatus' => 1
    ];
});
