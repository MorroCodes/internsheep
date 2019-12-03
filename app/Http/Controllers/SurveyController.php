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
        // check if user already has a record
        $survey = \App\StudentSurvey::where('user_id', \Auth::user()->id)->first();
        if ($survey == null) {
            // if no record -> insert
            $survey = new \App\StudentSurvey();
            $survey->user_id = \Auth::user()->id;
            $survey->vibe = $data['vibe'];
            $survey->size = $data['size'];
            $survey->age = $data['age'];
            $survey->type = $data['type'];
            $survey->distance = $data['distance'];
            $survey->save();
        } else {
            $user = \App\StudentSurvey::where('user_id', \Auth::user()->id);
            $user->update(['vibe' => $data['vibe'], 'size' => $data['size'], 'age' => $data['age'], 'type' => $data['type'], 'distance' => $data['distance']]);
        }

        // if record -> update

        return redirect('/');
    }

    public function companySurvey()
    {
        return view('survey/company');
    }

    public function handleCompanySurvey(Request $request)
    {
        $data = $request->only(['vibe', 'size', 'age', 'type', 'transport']);
        $survey = \App\CompanySurvey::where('user_id', \Auth::user()->id)->first();
        if ($survey == null) {
            $survey = new \App\CompanySurvey();
            $survey->user_id = \Auth::user()->id;
            $survey->vibe = $data['vibe'];
            $survey->size = $data['size'];
            $survey->age = $data['age'];
            $survey->type = $data['type'];
            $survey->transport = $data['transport'];
            $survey->save();
        } else {
            $user = \App\CompanySurvey::where('user_id', \Auth::user()->id);
            $user->update(['vibe' => $data['vibe'], 'size' => $data['size'], 'age' => $data['age'], 'type' => $data['type'], 'transport' => $data['transport']]);
        }

        return redirect('/');
    }
}
