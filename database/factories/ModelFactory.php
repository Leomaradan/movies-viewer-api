<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Actor::class, function (Faker $faker) {
    $genders = ['female', 'male'];

    $randIndex = array_rand($genders);
    $gender = $genders[$randIndex];

    return [
        'name' => $faker->name($gender),
        'gender' => $gender,
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
    ];
});

$factory->define(App\Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'plot' => $faker->realText()
    ];
});

$factory->define(App\Studio::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->userName,
    ];
});




