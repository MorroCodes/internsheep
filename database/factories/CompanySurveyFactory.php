<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\CompanySurvey;
use Faker\Generator as Faker;

$factory->define(CompanySurvey::class, function (Faker $faker) {
    return [
        'user_id' => rand(0, 40),
        'vibe' => rand(0, 6),
        'size' => rand(0, 6),
        'age' => rand(0, 6),
        'transport' => rand(0, 6),
    ];
});
