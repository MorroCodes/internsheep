<?php

use Illuminate\Database\Seeder;

class InternshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $internship1 = new \App\Internship();
        $internship1->title = 'Stage NodeJS web developer';
        $internship1->catch_phrase = 'Eens wat anders dan PHP';
        $internship1->company_id = 1;
        $internship1->description = "Als NodeJS developer heb je maar 1 taal nodig: JavaScript. Je schrijft API's met expressJS en leert zelf deployment met Docker.";
        $internship1->functie_omschrijving = $internship1->description;
        $internship1->aanbod = $internship1->description;
        $internship1->address = 'Veldkant 35C, 2550 Kontich';
        $internship1->company_survey_id = $internship1->company_id;
        $internship1->slug = 'NodeJS-developer';
        $internship1->save();

        $internship2 = new \App\Internship();
        $internship2->title = 'Stage VR development';
        $internship2->catch_phrase = 'VR is de toekomst.';
        $internship2->company_id = 2;
        $internship2->description = "In de praktijk is het lastig en computerintensief om een geloofwaardige VR-omgeving te creëren. Een handige standaardtaal om een VR-wereld op te zetten is de taal VRML (Virtual Reality Markup Language) samen met de standaard x3d. 3D-scripttalen zijn te vergelijken hoe HTML op internet bekend werd inzake 2d technieken. Met x3d versmelten deze talen in de nieuwe xml-taal. Een voorbeeld van vrml is te vinden via het Groninger Museum. Dit museum gaf in 1999 Nederlands beeldend kunstenaar Martin Sjardijn opdracht een virtueel museum te bouwen dat via internet bereikbaar is. Sinds 2015 is er een sterke groei in software development kits voor VR-omgevingen, mede doordat VR dan een doorbraak kende in de wereld van de computerspellen. Enkele voorbeelden van zo'n kits zijn OpenVR en OSVR.";
        $internship2->functie_omschrijving = $internship2->description;
        $internship2->aanbod = $internship2->description;
        $internship2->address = 'Frankrijklei 104, 2000 Antwerpen';
        $internship2->company_survey_id = $internship2->company_id;
        $internship2->slug = 'VR-development';
        $internship2->save();

        $internship3 = new \App\Internship();
        $internship3->title = 'Stage UX/UI';
        $internship3->catch_phrase = 'Gebruiksvriendelijke webapps zijn onze specialiteit';
        $internship3->company_id = 3;
        $internship3->description = 'Aan het einde van je stage wandel je buiten met een waaier aan competenties die je goed van pas zullen komen, zoals research en analyse van gebruikservaringen, vertalen van strategie naar een concept, klantcommunicatie en efficiënt vergaderen, prototyping';
        $internship3->functie_omschrijving = $internship3->description;
        $internship3->aanbod = $internship3->description;
        $internship3->address = "Veemarktkade 8, 5222 AE 's-Hertogenbosch, Nederland";
        $internship3->company_survey_id = $internship3->company_id;
        $internship3->slug = 'UX-UI-stage';
        $internship3->save();

        $internship4 = new \App\Internship();
        $internship4->title = 'Stage Symfony Developer';
        $internship4->catch_phrase = 'Geavanceerde webapps zijn onze specialiteit';
        $internship4->company_id = 3;
        $internship4->description = 'Aan het einde van je stage wandel je buiten met een waaier aan competenties die je goed van pas zullen komen, zoals analyseren & meedenken op zoek naar mogelijke oplossingen, klantcommunicatie & meelopen in meetings, effectief development, rekening houdend met specifieke interne guidelines, werken met project-tools zoals JIRA en het gebruik van MySQL, GIT, Bamboo, diverse API’s …';
        $internship4->functie_omschrijving = $internship4->description;
        $internship4->aanbod = $internship4->description;
        $internship4->address = 'Zavelheide 15, 2200 Herentals';
        $internship4->company_survey_id = $internship4->company_id;
        $internship4->slug = 'symfony-developer';
        $internship4->save();

        $internship5 = new \App\Internship();
        $internship5->title = 'Stage VueJS Developer';
        $internship5->catch_phrase = 'Interactieve webapps zijn onze specialiteit';
        $internship5->company_id = 3;
        $internship5->description = 'In jouw dagelijkse werkzaamheden vertaal je in directe samenwerking met de back-end collega’s het visuele design naar een interactieve website. Verder denk je actief mee over optimalisaties en innovaties, waarbij je de focus op zaken als user experience en accessibility hoog hebt staan. Uiteraard zorg jij ervoor dat de website in de meest gangbare apparaten, browsers en besturingssystemen er op zijn mooist uit ziet. Jouw uitdaging is om hierin altijd kwaliteit te leveren!';
        $internship5->functie_omschrijving = $internship5->description;
        $internship5->aanbod = $internship5->description;
        $internship5->address = 'Zavelheide 15, 2200 Herentals';
        $internship5->company_survey_id = $internship5->company_id;
        $internship5->slug = 'vuejs-developer';
        $internship5->save();

        $internship6 = new \App\Internship();
        $internship6->title = 'Stage Cloud Specialist';
        $internship6->catch_phrase = 'Jij zorgt voor onze magic dust';
        $internship6->company_id = 4;
        $internship6->description = 'Als Cloud specialist drijf je de digitale transformatie van de organisatie. Jij zal actief helpen om de slagkracht van de organisatie nog verder uit te breiden aan de hand van het Cloud first beleid. Samen met jouw deskundige team zet jij maximaal in om technische ondersteuning te bieden aan bedrijf kritische systemen, en om nieuwe trajecten vorm te geven. Met behulp van een moderne ontwikkelstraat in Azure DevOps is DNB al druk bezig met het verder professionaliseren van het Agile gedachtegoed en DevOps best practices.';
        $internship6->functie_omschrijving = $internship6->description;
        $internship6->aanbod = $internship6->description;
        $internship6->address = 'Bessenveldstraat 19, 1831 Diegem';
        $internship6->company_survey_id = $internship6->company_id;
        $internship6->slug = 'cloud-specialist';
        $internship6->save();

        $internship7 = new \App\Internship();
        $internship7->title = 'Stage Grafisch Design';
        $internship7->catch_phrase = 'Een goede app begint bij een goed ontwerp.';
        $internship7->company_id = 5;
        $internship7->description = 'Eén uitdagend project (branding, concepting, animation, video,… ) dat aansluit op je interesses
        om zelfstandig van het begin tot het einde af te ronden en dat een meerwaarde heeft voor
        het brand, de solutions of services.
        • Ondersteuning bij het brainstormen en uitwerken van visuele concepten, projecten
        en campagnes om van Cegeka een nog sterker brand te maken.
        • Werken volgens de Cegeka huisstijl.
        • Digitale content vormgeven (banners, social media content, etc.)
        • Opmaken van ebooks, one pagers, use cases, sales documents & presentations.';
        $internship7->functie_omschrijving = $internship7->description;
        $internship7->aanbod = $internship7->description;
        $internship7->address = 'Universiteitslaan 9, 3500 Hasselt';
        $internship7->company_survey_id = $internship7->company_id;
        $internship7->slug = 'grafisch-design';
        $internship7->save();

        $internship8 = new \App\Internship();
        $internship8->title = 'Stage .NET development';
        $internship8->catch_phrase = 'Ben jij een toekomstige MVC consultant?';
        $internship8->company_id = 5;
        $internship8->description = 'Wij zijn op zoek naar een stagiair voor een klant die internationaal marktleider is in de
        telecomsector. Ze zijn gelegen tegenover het VTM-gebouw in Vilvoorde, 5 minuten met de
        bus vanaf het station. Je vindt er een leuke werksfeer, flexibele werkuren en een
        professionele begeleiding.
        Je wordt hier gedurende enkele maanden een volwaardig lid van een enthousiast en
        dynamisch Agile scrumteam. Je zal een eigen project ontwikkelen binnen de financiële
        afdeling. Je werkt hiervoor onder andere mee aan de automatisering van de billing
        processen, het ontwikkelen van rapporten, het schrijven van kleinere analyses samen met de
        key-users.';
        $internship8->functie_omschrijving = $internship8->description;
        $internship8->aanbod = $internship8->description;
        $internship8->address = 'Interleuvenlaan 16, 3001 Leuven';
        $internship8->company_survey_id = $internship8->company_id;
        $internship8->slug = 'dotnet-developer';
        $internship8->save();

        $internship9 = new \App\Internship();
        $internship9->title = 'Migration of automation tools (Jenkins and Svn to GIT)';
        $internship9->catch_phrase = "Don't repeat yourself!";
        $internship9->company_id = 5;
        $internship9->description = 'Wij zijn we binnen Cegeka al lange tijd bezig met automatisatie en het elimineren van
        repetitief werk. De verschillende tools die we hiervoor gebruiken maken deel uit van een
        heus corporate automatisatieplatform dat door onze engineers uit de grond gestampt werd
        In onze orchestratielaag steunen we voornamelijk op Jenkins. Uiteraard is deze, zoals alle
        tools, af en toe up te graden, met migratie en optimalisatie van automatisatieflows tot
        gevolg. Versieverhogingen brengen extra functionaliteiten met zich mee en soms ook een
        verandering van aanpak.
        Voor een specifieke opzet binnen dit platform is er nu vernieuwing nodig van deze
        orchestration laag/tool.
        De Jenkins server inclusief de flows van de Outsourcing Middleware divisie moet
        ondergebracht worden onder de nieuwe Master-Slave architectuur die momenteel de
        standaard is.';
        $internship9->functie_omschrijving = $internship9->description;
        $internship9->aanbod = $internship9->description;
        $internship9->address = 'Universiteitslaan 9, 3500 Hasselt';
        $internship9->company_survey_id = $internship9->company_id;
        $internship9->slug = 'automation-tools-developer';
        $internship9->save();

        $internship10 = new \App\Internship();
        $internship10->title = 'Stage Java/Angular development';
        $internship10->catch_phrase = 'Functionele apps voor grote klanten';
        $internship10->company_id = 5;
        $internship10->description = 'Binnen UZ Leuven ontwikkel je mee aan het volledig geïntegreerde elektronisch
        patiëntendossier KWS en de daarbij horende toepassingen voor patiënten, zorgverleners en
        de 30 Vlaamse nexuzhealth ziekenhuizen. Je mag zowel werken met client, middle-tier als
        back-end code en kan een volledig werkende toepassing vanaf het begin tot het einde volledig
        mee in productie brengen. Je krijgt feedback van zowel technische collega’s als van
        eindgebruikers of hun proxies. Je wordt opgenomen in een enthousiaste groep van 90
        developers waarbij je dagelijks nauw samenwerkt in een klein team van 10 personen.';
        $internship10->functie_omschrijving = $internship10->description;
        $internship10->aanbod = $internship10->description;
        $internship10->address = 'Interleuvenlaan 16, 3001 Leuven';
        $internship10->company_survey_id = $internship10->company_id;
        $internship10->slug = 'Java-angular-development';
        $internship10->save();

        // factory(\App\Internship::class, 20)->create();
        // factory(\App\CompanySurvey::class, 20)->create();
    }
}
