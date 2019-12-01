<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Internship;
use Faker\Generator as Faker;

$factory->define(Internship::class, function (Faker $faker) {
    $title = $faker->jobTitle;
    $slug = Str::slug($title);
    $company_id = rand(1, 5);

    return [
        'title' => $title,
        'slug' => $slug,
        'catch_phrase' => $faker->catchPhrase,
        'company_id' => $company_id,
        'description' => $faker->realText(200),
        'functie_omschrijving' => $faker->realText(200),
        'aanbod' => $faker->realText(300),
        'address' => $faker->address,
        'company_survey_id' => $company_id,
    ];
});
