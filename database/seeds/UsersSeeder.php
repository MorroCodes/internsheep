<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // user accounts for each team member
        $annelies = new \App\User();
        $annelies->firstname = 'Annelies';
        $annelies->lastname = 'Bellon';
        $annelies->email = 'annelies@hotmail.com';
        $annelies->email_verified_at = now();
        $annelies->password = bcrypt('annelies');
        $annelies->save();

        $dielan = new \App\User();
        $dielan->firstname = 'Dielan';
        $dielan->lastname = 'Ophals';
        $dielan->email = 'dielan@hotmail.com';
        $dielan->email_verified_at = now();
        $dielan->password = bcrypt('dielan');
        $dielan->save();

        $aqsa = new \App\User();
        $aqsa->firstname = 'Aqsa';
        $aqsa->lastname = 'Intizar';
        $aqsa->email = 'aqsa@hotmail.com';
        $aqsa->email_verified_at = now();
        $aqsa->password = bcrypt('aqsa');
        $aqsa->save();

        $mauro = new \App\User();
        $mauro->firstname = 'Mauro';
        $mauro->lastname = 'Esposito';
        $mauro->email = 'mauro@hotmail.com';
        $mauro->email_verified_at = now();
        $mauro->password = bcrypt('mauro');
        $mauro->save();

        factory(\App\User::class, 20)->create();
    }
}
