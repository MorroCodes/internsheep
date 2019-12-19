<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apply;

class VacatureController extends Controller
{
    public function index()
    {
        return view('vacature');
    }

    public function edit($id)
    {
        $data['internship'] = \App\Internship::where('id', $id)->first();
        $data['values'] = \App\Internship::where('id', $id)->first();

        return view('internship.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $credentials = $request->only(['title', 'description', 'address', 'functie_omschrijving', 'aanbod']);

        if (in_array(null, $credentials, true)) {
            $data['error'] = 'Gelieve geen velden leeg te laten.';
            $data['values'] = $credentials;
            $data['internship'] = \App\Internship::where('id', $id)->first();

            return view('internship/edit', $data);
        }

        $internship = \App\Internship::where('id', $id);
        $internship->update(['title' => $credentials['title'], 'description' => $credentials['description'], 'address' => $credentials['address'], 'functie_omschrijving' => $credentials['functie_omschrijving'], 'aanbod' => $credentials['aanbod']]);

        return redirect('/vacature/'.$id.'/overview');
    }

    public function create()
    {
        return view('internship/create');
    }

    public function store(Request $request)
    {
        $credentials = $request->only(['title', 'description', 'address', 'functie_omschrijving', 'aanbod']);

        if (in_array(null, $credentials, true)) {
            $data['error'] = 'Gelieve geen velden leeg te laten.';
            $data['values'] = $credentials;

            return view('internship/create', $data);
        }

        $id = \Auth::user()->id;
        $user = \Auth::user();
        $company = $user->company->first();
        $internship = new \App\Internship();
        $internship->title = $request->input('title');
        $internship->description = $request->input('description');
        $internship->company_id = $company->id;
        $internship->address = $request->input('address');
        $internship->functie_omschrijving = $request->input('functie_omschrijving');
        $internship->aanbod = $request->input('aanbod');
        $internship->slug = $request->input('title');
        $internship->company_survey_id = $this->getCompanySurveyIdFromUserId($id);
        $internship->save();
        $internship_id = $internship->id;

        // redirect naar detail pagina vacature
        return redirect('/vacature/'.$internship_id.'/overview');
    }

    public function getCompanySurveyIdFromUserId($id)
    {
        $survey = \App\CompanySurvey::where('user_id', $id)->first();

        if ($survey != null) {
            return $survey->id;
        } else {
            return null;
        }
    }

    public function applicant()
    {
        $id = \Auth::user()->id;
        $applicants = Apply::where('company_id', $id)->get();

        return view('internship/applications', compact('applicants'));
    }
}
