<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'title' =>  $faker->sentence(3),
        'description' =>  $faker->sentence(8),
        'email' =>  $faker->safeEmail,
        'cep' =>   $faker->postcode,
        'state' =>  $faker->stateAbbr,
        'city' =>  $faker->city,
        'district' =>  $faker->citySuffix,
        'street' =>  $faker->streetName,
        'number' =>  $faker->numberBetween(1, 300),
        'complement' =>  $faker->sentence(10),
    ];
});
