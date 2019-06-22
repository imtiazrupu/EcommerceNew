<?php

use Faker\Generator as Faker;

$factory->define(App\SubCategory::class, function (Faker $faker) {
    return [
        'categoryId' => $faker->numberBetween(1,10),
        'subCategoryName' => $faker->word,
        'shortDescription' => $faker->text,
        'image' => 'img/48383718_2207414212857653_2155451482348978176_o.jpg',
        'publicationStatus' => $faker->numberBetween(0,1)
    ];
});
