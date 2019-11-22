<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function studentSurvey()
    {
        return view('survey/student');
    }

    public function handleStudentSurvey(Request $request)
    {
        $data = $request->only(['vibe', 'size', 'age', 'type', 'distance']);
        $survey = new \App\StudentSurvey();
        $survey->user_id = session('id');
        $survey->vibe = $data['vibe'];
        $survey->size = $data['size'];
        $survey->age = $data['age'];
        $survey->type = $data['type'];
        $survey->distance = $data['distance'];
        $survey->save();

        return redirect('/');
    }

    public function companySurvey()
    {
        return view('survey/company');
    }

    public function handleCompanySurvey(Request $request)
    {
        $data = $request->only(['vibe', 'size', 'age', 'type', 'transport']);
        $survey = new \App\CompanySurvey();
        $survey->user_id = session('id');
        $survey->vibe = $data['vibe'];
        $survey->size = $data['size'];
        $survey->age = $data['age'];
        $survey->type = $data['type'];
        $survey->transport = $data['transport'];
        $survey->save();

        return redirect('/');
    }
}
