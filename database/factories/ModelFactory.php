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

$factory->define('App\Services\Users\Data\Entities\User', function ($faker) {
    return [
        'first_name' => $first = $faker->firstName,
        'last_name' => $last = $faker->lastName,
        'email' => $faker->email,
        'username' => strtolower($first).".".strtolower($last),
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});
