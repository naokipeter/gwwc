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
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'pledge'         => 10,
        'pledged_at'     => $faker->dateTimeBetween('-3 years', '-1 year'),
    ];
});

$factory->define(App\Donation::class, function (Faker\Generator $faker) {
    return [
        'charity'  => $faker->company,
        'amount'   => $faker->numberBetween(1, 1000) * 10,
        'currency' => $faker->randomElement(['EUR', 'USD', 'GBP', 'CHF']),
        'date'     => $faker->dateTimeThisYear,
        'user_id'  => $faker->numberBetween(1, 11),
    ];
});

$factory->define(App\Income::class, function (Faker\Generator $faker) {
    return [
        'amount'             => $faker->numberBetween(10, 10000) * 100,
        'currency'           => $faker->randomElement(['EUR', 'USD', 'GBP', 'CHF']),
        'year'               => date('Y'),
        'user_id'            => $faker->numberBetween(1, 11),
        'percentage_pledged' => 10,
    ];
});
