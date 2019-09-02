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

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Article::class, function (Faker\Generator $faker) {
    //static $password;

    return [
        'name' => $faker->sentence,
        'description' => implode($faker->paragraphs(4)),
        'title' => $faker->title,
        'category_id' => $faker->numberBetween(1,6),
        'is_important' => $faker->numberBetween(0,1),
        'editor_choice' => $faker->numberBetween(0,1)
    ];
});


$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    //static $password;

    return [
        'text' => $faker->sentence,
        'article_id' => $faker->numberBetween(1,40),
        'is_validated' => $faker->numberBetween(0,1)
    ];
});

