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

$factory->define(\App\Models\Normal\UserLoginNormalCount::class, function (Faker\Generator $faker){
   return [
       'date' => $faker->dateTimeBetween('-3 day'),
       'version1_count' => $faker->randomNumber(),
       'version2_count' => $faker->randomNumber(),
       'updated_at' => $faker->dateTimeBetween('-3 day')
   ];
});

$factory->define(\App\Models\Success\UserLoginSuccessCount::class, function (Faker\Generator $faker){
    return [
        'username' => $faker->name(),
        'tuid' => $faker->shuffleString('1aetsafdaerw'),
        'version' => rand(1, 2),
        'created_at' => $faker->dateTimeBetween('-3 day')
    ];
});

$factory->define(\App\Models\Failed\UserLoginFailedCount::class, function (Faker\Generator $faker){
    return [
        'username' => $faker->name(),
        'tuid' => $faker->shuffleString('1aetsafdaerw'),
        'version' => rand(1, 2),
        'created_at' => $faker->dateTimeBetween('-3 day')
    ];
});