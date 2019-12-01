<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Internship;
use Faker\Generator as Faker;

$factory->define(Internship::class, function (Faker $faker) {
    $title = $faker->jobTitle;
    $slug = Str::slug($title);
    return [
        'title' => $title,
        'slug' => $slug,
        'catch_phrase' => $faker->catchPhrase,
        'company_id' => $faker->randomDigit,
        'description' => $faker->realText(200),
        'functie_omschrijving' => $faker->realText(200),
        'aanbod' => $faker->realText(300),
        'address' => $faker->address,
        'img' => ('img/intr.png'),
    ];
});

