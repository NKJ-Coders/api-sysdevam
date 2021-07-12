<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'nom' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'entreprise' => $faker->unique()->company,
        'tel' => $faker->phoneNumber
    ];
});
