<?php

namespace App\Http\Controllers;

class CompanyController extends Controller
{
    public function show()
    {
        $id = \Auth::user()->id;
        $data['internship'] = \App\Internship::where('company_id', $id)->take(6)->get();

        return view('company/yourcompany', $data);
    }

    public function index($id)
    {
        $data['internship'] = \App\Internship::where('id', $id)->first();
        $data['applications'] = \App\Apply::select('applies.id', 'applies.student_id', 'applies.internships_id', 'applies.company_id', 'applies.reason', 'applies.created_at', 'applies.response', 'users.firstname', 'users.lastname', 'users.email', 'users.profile_image')
            ->where('internships_id', $id)
            ->join('users', 'student_id', '=', 'users.id')
            ->get();

        return view('internship/show', $data);
    }

    public function publicCompanyProfile($id)
    {
        $data['companyInfo'] = \App\Company::where('id', $id)->first();
        $data['userInfo'] = \App\User::where('id', $data['companyInfo']->user_id)->first();
        $data['surveyInfo'] = \App\CompanySurvey::where('user_id', $data['userInfo']->id)->first();
        $data['vacatures'] = \App\Internship::where('company_id', $id)->get();

        return view('company/public_profile', $data);
    }

    public function internshipDetail($internship)
    {
        $data['internship'] = \App\Internship::where('id', $internship)->first();

        return view('internship/create', $data);
    }
}
