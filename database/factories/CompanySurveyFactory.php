<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\CompanySurvey;
use Faker\Generator as Faker;

$user_id = 4;
$factory->define(CompanySurvey::class, function (Faker $faker) use ($user_id) {
    ++$user_id;

    return [
        'user_id' => $user_id,
        'vibe' => rand(0, 6),
        'size' => rand(0, 6),
        'age' => rand(0, 6),
        'transport' => rand(0, 6),
    ];
});
