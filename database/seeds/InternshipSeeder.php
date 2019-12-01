<?php

use Illuminate\Database\Seeder;

class InternshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(\App\Internship::class, 20)->create();
        factory(\App\CompanySurvey::class, 20)->create();
    }
}
