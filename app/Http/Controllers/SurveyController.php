<?php

namespace App\Http\Controllers;

class SurveyController extends Controller
{
    public function studentSurvey()
    {
        return view('survey/student');
    }

    public function handleStudentSurvey(Request $request)
    {
    }

    public function companySurvey()
    {
        return view('survey/company');
    }

    public function handleCompanySurvey(Request $request)
    {
    }
}
