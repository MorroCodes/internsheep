<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Company;
use \App\Apply;
use \App\Internship;
use \App\Http\Requests\JobPostRequest;


class vacatureCompany extends Controller
{
    public function index()
    {
        return view('vacature');
    }

    public function edit($id)
    {
        $internship = Internship::find($id);

        return view('internship.edit', compact('internship'));
    }

    public function update(Request $request, $id)
    {
        $internship = Internship::find($id);
        $internship->update($request->all());
  
        return redirect()->back()->with('message', 'succes!');
    }

    public function create(){

        return view('internship/create');
    }

    public function store(JobPostRequest $request){
        $id = \Auth::user()->id;
        $internship = new \App\Internship();
        $internship->title = $request->input('title');
        $internship->description = $request->input('description');
        $internship->company_id = $id;
        $internship->address = $request->input('address');
        $internship->functie_omschrijving = $request->input('functie_omschrijving');
        $internship->aanbod = $request->input('aanbod');
        $title = $request->input('title');
        $internship->slug = $title;
        $internship_id = $request->input('company');
        $internship->company_survey_id = 4;
        $internship->save();
        return view('internship/create')->with('message', "Vacature is toegevoegd!");
    }


    public function applicant()
    {
         $id = \Auth::user()->id;
        $applicants = Apply::where('company_id', $id)->get();

        return view('internship/applications', compact('applicants'));
    }

    


  
}
