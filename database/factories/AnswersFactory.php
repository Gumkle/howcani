<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Answer::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 100),
        'question_id' => $faker->numberBetween(1, 25),
        'avg_rating' => 1/$faker->numberBetween(1, 5) + $faker->numberBetween(1, 4),
        'content' => $faker->text(),
        'is_best' => 0,
    ];
});
