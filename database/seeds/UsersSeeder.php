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
        $annelies->description = 'Ik ben Annelies';
        $annelies->profile_image = '/images/studiohyperdrive.png';
        $annelies->email = 'annelies@hotmail.com';
        $annelies->email_verified_at = now();
        $annelies->password = bcrypt('annelies');
        $annelies->type = 'student';
        $annelies->save();
        $student1 = new \App\Student();
        $student1->user_id = $annelies->id;
        $student1->save();
        $survey1 = new \App\StudentSurvey();
        $survey1->user_id = $annelies->id;
        $survey1->save();

        $dielan = new \App\User();
        $dielan->firstname = 'Dielan';
        $dielan->lastname = 'Ophals';
        $dielan->description = 'Ik ben Dielan';
        $dielan->profile_image = 'https://ichef.bbci.co.uk/news/660/cpsprodpb/E9DF/production/_96317895_gettyimages-164067218.jpg';
        $dielan->email = 'dielan@hotmail.com';
        $dielan->email_verified_at = now();
        $dielan->password = bcrypt('dielan');
        $dielan->type = 'student';
        $dielan->save();
        $student2 = new \App\Student();
        $student2->user_id = $dielan->id;
        $student2->save();
        $survey2 = new \App\StudentSurvey();
        $survey2->user_id = $dielan->id;
        $survey2->save();

        $aqsa = new \App\User();
        $aqsa->firstname = 'Aqsa';
        $aqsa->lastname = 'Intizar';
        $aqsa->description = 'Ik ben Aqsa';
        $aqsa->profile_image = 'https://ichef.bbci.co.uk/news/660/cpsprodpb/E9DF/production/_96317895_gettyimages-164067218.jpg';
        $aqsa->email = 'aqsa@hotmail.com';
        $aqsa->email_verified_at = now();
        $aqsa->password = bcrypt('aqsa');
        $aqsa->type = 'student';
        $aqsa->save();
        $student3 = new \App\Student();
        $student3->user_id = $aqsa->id;
        $student3->save();
        $survey3 = new \App\StudentSurvey();
        $survey3->user_id = $aqsa->id;
        $survey3->save();

        $mauro = new \App\User();
        $mauro->firstname = 'Mauro';
        $mauro->lastname = 'Esposito';
        $mauro->description = 'Ik ben Mauro';
        $mauro->profile_image = 'https://ichef.bbci.co.uk/news/660/cpsprodpb/E9DF/production/_96317895_gettyimages-164067218.jpg';
        $mauro->email = 'mauro@hotmail.com';
        $mauro->email_verified_at = now();
        $mauro->password = bcrypt('mauro');
        $mauro->type = 'student';
        $mauro->save();
        $student4 = new \App\Student();
        $student4->user_id = $mauro->id;
        $student4->save();
        $survey4 = new \App\StudentSurvey();
        $survey4->user_id = $mauro->id;
        $survey4->save();

        factory(\App\User::class, 20)->create();
    }
}
