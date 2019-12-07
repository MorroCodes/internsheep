<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apply;
use App\Internship;

class VacatureController extends Controller
{
    public function index()
    {
        return view('vacature');
    }

    public function edit($id)
    {
        $data['internship'] = \App\Internship::where('id', $id)->first();

        return view('internship.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $internship = Internship::find($id);
        $internship->update($request->all());

        return redirect()->back()->with('message', 'succes!');
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
        $internship = new \App\Internship();
        $internship->title = $request->input('title');
        $internship->description = $request->input('description');
        $internship->company_id = $id;
        $internship->address = $request->input('address');
        $internship->functie_omschrijving = $request->input('functie_omschrijving');
        $internship->aanbod = $request->input('aanbod');
        $internship->slug = $request->input('title');
        $internship->company_survey_id = 4;
        $internship->save();

        // redirect naar detail pagina vacature
        return view('internship/create')->with('message', 'Vacature is toegevoegd!');
    }

    public function getCompanySurveyIdFromUserId()
    {
    }

    public function applicant()
    {
        $id = \Auth::user()->id;
        $applicants = Apply::where('company_id', $id)->get();

        return view('internship/applications', compact('applicants'));
    }
}
