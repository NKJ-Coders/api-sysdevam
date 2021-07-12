<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'client_id' => rand(1, 5),
        'categorie_id' => rand(1, 5),
        'user_id' => rand(1, 4),
        'titre' => $faker->sentence(1, true),
        'contenu' => $faker->paragraphs(2, true)
    ];
});
