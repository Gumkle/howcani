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

$factory->define(App\Question::class, function (Faker\Generator $faker) {
    return [
        'user_id' => \App\User::inRandomOrder()->first()->id,
        'title' => $faker->title(),
        'description' => $faker->text(),
        'total_rating' => $faker->numberBetween(-100, 100),
        'has_best_answer' => 0
    ];
});
