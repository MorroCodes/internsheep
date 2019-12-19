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
        $student1->cv = '';
        $student1->save();
        $survey1 = new \App\StudentSurvey();
        $survey1->user_id = $annelies->id;
        $survey1->vibe = 4;
        $survey1->size = 2;
        $survey1->age = 2;
        $survey1->type = 5;
        $survey1->distance = 2;
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
        $student2->cv = '';
        $student2->save();
        $survey2 = new \App\StudentSurvey();
        $survey2->vibe = 2;
        $survey2->size = 3;
        $survey2->age = 4;
        $survey2->type = 2;
        $survey2->distance = 4;
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
        $student3->cv = '';
        $student3->user_id = $aqsa->id;
        $student3->save();
        $survey3 = new \App\StudentSurvey();
        $survey3->vibe = 1;
        $survey3->size = 1;
        $survey3->age = 1;
        $survey3->type = 3;
        $survey3->distance = 1;
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
        $student4->cv = '';
        $student4->save();
        $survey4 = new \App\StudentSurvey();
        $survey4->user_id = $mauro->id;
        $survey4->vibe = 4;
        $survey4->size = 2;
        $survey4->age = 2;
        $survey4->type = 5;
        $survey4->distance = 2;
        $survey4->save();

        $dirk = new \App\User();
        $dirk->firstname = 'Dirk';
        $dirk->lastname = 'Peeters';
        $dirk->description = 'Ik ben dirk';
        $dirk->profile_image = 'https://ichef.bbci.co.uk/news/660/cpsprodpb/E9DF/production/_96317895_gettyimages-164067218.jpg';
        $dirk->email = 'dirk@hotmail.com';
        $dirk->email_verified_at = now();
        $dirk->password = bcrypt('dirk');
        $dirk->type = 'company';
        $dirk->save();

        $yasmine = new \App\User();
        $yasmine->firstname = 'yasmine';
        $yasmine->lastname = 'Peeters';
        $yasmine->description = 'Ik ben yasmine';
        $yasmine->profile_image = 'https://ichef.bbci.co.uk/news/660/cpsprodpb/E9DF/production/_96317895_gettyimages-164067218.jpg';
        $yasmine->email = 'yasmine@hotmail.com';
        $yasmine->email_verified_at = now();
        $yasmine->password = bcrypt('yasmine');
        $yasmine->type = 'company';
        $yasmine->save();

        $omar = new \App\User();
        $omar->firstname = 'omar';
        $omar->lastname = 'Peeters';
        $omar->description = 'Ik ben omar';
        $omar->profile_image = 'https://ichef.bbci.co.uk/news/660/cpsprodpb/E9DF/production/_96317895_gettyimages-164067218.jpg';
        $omar->email = 'omar@hotmail.com';
        $omar->email_verified_at = now();
        $omar->password = bcrypt('omar');
        $omar->type = 'company';
        $omar->save();

        $margriet = new \App\User();
        $margriet->firstname = 'margriet';
        $margriet->lastname = 'Peeters';
        $margriet->description = 'Ik ben margriet';
        $margriet->profile_image = 'https://ichef.bbci.co.uk/news/660/cpsprodpb/E9DF/production/_96317895_gettyimages-164067218.jpg';
        $margriet->email = 'margriet@hotmail.com';
        $margriet->email_verified_at = now();
        $margriet->password = bcrypt('margriet');
        $margriet->type = 'company';
        $margriet->save();

        $timothy = new \App\User();
        $timothy->firstname = 'timothy';
        $timothy->lastname = 'Peeters';
        $timothy->description = 'Ik ben timothy';
        $timothy->profile_image = 'https://ichef.bbci.co.uk/news/660/cpsprodpb/E9DF/production/_96317895_gettyimages-164067218.jpg';
        $timothy->email = 'timothy@hotmail.com';
        $timothy->email_verified_at = now();
        $timothy->password = bcrypt('timothy');
        $timothy->type = 'company';
        $timothy->save();
    }
}
