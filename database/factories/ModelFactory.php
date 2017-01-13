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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'father_name' => $faker->name('male'),
        'mother_name' => $faker->name('female'),
        'phone_number' => $faker->phoneNumber,
        'home_number' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'gender' => 'male',
        'roll_number' => $faker->randomNumber(),
        'reg_number' => $faker->randomNumber(),
        'department_id' => $faker->randomNumber(1),
        'shift' => 'second',
        'semester' => 'eight',
        'present_address' => $faker->address,
        'permanent_address' => $faker->address,
    ];
});