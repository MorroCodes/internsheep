<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $company1 = new \App\Company();
        $company1->user_id = 5;
        $company1->company_name = 'Studio Hyperdrive';
        $company1->slug = 'hyperdrive';
        $company1->company_bio = 'RAKET! 🚀';
        $company1->save();
        $survey1 = new \App\CompanySurvey();
        $survey1->user_id = $company1->user_id;
        $survey1->vibe = 2;
        $survey1->size = 2;
        $survey1->age = 2;
        $survey1->type = 5;
        $survey1->save();

        $company2 = new \App\Company();
        $company2->user_id = 6;
        $company2->company_name = 'Flux';
        $company2->slug = 'flux';
        $company2->company_bio = 'Geen raket!';
        $company2->save();
        $survey2 = new \App\CompanySurvey();
        $survey2->user_id = $company2->user_id;
        $survey2->vibe = 1;
        $survey2->size = 2;
        $survey2->age = 2;
        $survey2->type = 3;
        $survey2->save();

        $company3 = new \App\Company();
        $company3->user_id = 7;
        $company3->company_name = 'Intracto';
        $company3->slug = 'intracto';
        $company3->company_bio = 'Intracto niet Interacto';
        $company3->save();
        $survey3 = new \App\CompanySurvey();
        $survey3->user_id = $company3->user_id;
        $survey3->vibe = 3;
        $survey3->size = 4;
        $survey3->age = 3;
        $survey3->type = 5;
        $survey3->save();

        $company4 = new \App\Company();
        $company4->user_id = 8;
        $company4->company_name = 'Capgemini';
        $company4->slug = 'capgemini';
        $company4->company_bio = 'Geven ook soms wel geld voor hackathons';
        $company4->save();
        $survey4 = new \App\CompanySurvey();
        $survey4->user_id = $company4->user_id;
        $survey4->vibe = 5;
        $survey4->size = 5;
        $survey4->age = 5;
        $survey4->type = 4;
        $survey4->save();

        $company5 = new \App\Company();
        $company5->user_id = 8;
        $company5->company_name = 'Cegeka';
        $company5->slug = 'cegeka';
        $company5->company_bio = 'Cegeka is een groot IT-bedrijf met meerdere vestigingen in België.';
        $company5->save();
        $survey5 = new \App\CompanySurvey();
        $survey5->user_id = $company5->user_id;
        $survey5->vibe = 4;
        $survey5->size = 4;
        $survey5->age = 5;
        $survey5->type = 2;
        $survey5->save();
    }
}
