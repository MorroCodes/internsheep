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
}
