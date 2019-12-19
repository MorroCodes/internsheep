<?php

namespace App\Http\Controllers;

class CompanyController extends Controller
{
    public function show()
    {
        $type = \Auth::user()->type;
        if ($type == 'student') {
            return redirect('/home');
        }
        $user = \Auth::user();
        $company = $user->company->first();
        $data['internship'] = \App\Internship::where('company_id', $company->id)->take(6)->get();

        return view('company/yourcompany', $data);
    }

    public function index($id)
    {
        $data['internship'] = \App\Internship::where('id', $id)->first();
        $data['applications'] = \App\Apply::select('applies.id', 'applies.student_id', 'applies.internships_id', 'applies.company_id', 'applies.reason', 'applies.created_at', 'applies.response', 'users.firstname', 'users.lastname', 'users.email', 'users.profile_image')
            ->where('internships_id', $id)
            ->join('users', 'student_id', '=', 'users.id')
            ->get();

        // get student_id from application
        $data['conversations'] = \App\Conversation::where([['company_id', \Auth::user()->id]])->get();

        return view('internship/show', $data);
    }

    public function publicCompanyProfile($id)
    {
        $data['companyInfo'] = \App\Company::where('id', $id)->first();

        $data['userInfo'] = \App\User::where('id', $data['companyInfo']->user_id)->first();

        $data['surveyInfo'] = \App\CompanySurvey::where('user_id', $data['userInfo']->id)->first();

        $data['vacatures'] = \App\Internship::where('company_id', $data['companyInfo']->user_id)->get();

        return view('company/public_profile', $data);
    }

    public function publicStudentProfile($id)
    {
        $data['userInfo'] = \App\User::where('id', $id)->first();
        $data['studentInfo'] = \App\Student::where('user_id', $data['userInfo']->id)->first();

        return view('student/student', $data);
    }

    public function internshipDetail($internship)
    {
        $data['internship'] = \App\Internship::where('id', $internship)->first();

        return view('internship/create', $data);
    }
}
