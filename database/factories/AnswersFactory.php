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
        'user_id' => \App\User::inRandomOrder()->first()->id,
        'question_id' => \App\Question::inRandomOrder()->first()->id,
        'total_rating' => $faker->numberBetween(-100, 100),
        'content' => $faker->text(),
        'is_best' => 0,
    ];
});
