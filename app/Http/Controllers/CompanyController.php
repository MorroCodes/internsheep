<?php

namespace App\Http\Controllers;

use App\Internship;

class CompanyController extends Controller
{
    public function show()
    {
        $id = \Auth::user()->id;
        $data['internship'] = \App\Internship::where('company_id', $id)->take(6)->get();

        return view('company/yourCompany', $data);
    }

    public function index($id, $internship)
    {
        $internship = Internship::find($id);

        return view('internship/show', compact('internship'));
    }

    public function publicCompanyProfile($id)
    {
        $data['companyInfo'] = \App\Company::where('id', $id)->first();
        $data['userInfo'] = \App\User::where('id', $data['companyInfo']->user_id)->first();
        $data['surveyInfo'] = \App\CompanySurvey::where('user_id', $data['userInfo']->id)->first();
        $data['vacatures'] = \App\Internship::where('company_id', $id)->get();

        return view('company/public_profile', $data);
    }
}
