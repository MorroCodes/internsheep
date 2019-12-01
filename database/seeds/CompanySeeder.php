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
        $company1->user_id = 1;
        $company1->company_name = 'Studio Hyperdrive';
        $company1->slug = 'pad';
        $company1->company_bio = 'RAKET! 🚀';
        $company1->save();

        $company2 = new \App\Company();
        $company2->user_id = 1;
        $company2->company_name = 'Flux';
        $company2->slug = 'pad';
        $company2->company_bio = 'Geen raket!';
        $company2->save();
    }
}
