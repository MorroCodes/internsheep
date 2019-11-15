<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Internship;
use Faker\Generator as Faker;

$factory->define(Internship::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'catch_phrase' => $faker->catchPhrase,
        'company_id' => $faker->randomDigit,
        'description' => $faker->realText(200),
        'address' => $faker->address,
        'img' => $faker->imageUrl(382, 216, 'business'),
    ];
});