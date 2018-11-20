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

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    $object = $faker->randomElement(['App\Question', 'App\Answer']);
    return [
        'object_id' => $object::inRandomOrder()->first()->id,
        'object_type' => $object,
        'user_id' => \App\User::inRandomOrder()->first()->id,
        'content' => $faker->text(),
        'total_rating' => $faker->numberBetween(-100, 100)
    ];
});
