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

$factory->define(App\Rating::class, function (Faker\Generator $faker) {
    $object = $faker->randomElement(['App\Question', 'App\Answer', 'App\Comment']);
    return [
        'object_id' => $object::inRandomOrder()->first()->id,
        'object_type' => $object,
        'user_id' => \App\User::inRandomOrder()->first()->id,
        'rating' => $faker->numberBetween(0, 1)
    ];
});
