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
        'first_name' => str_random(10),
        'last_name' => str_random(10),
        'created_at' => $faker->date("Y-m-d H:i:s"),
        'updated_at' => $faker->date("Y-m-d H:i:s")

        //'created_at' => date("Y-m-d H:i:s"),
        //'updated_at' => date("Y-m-d H:i:s")
    ];
});
