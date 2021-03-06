<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function studentSurvey()
    {
        $data['survey'] = \App\StudentSurvey::where('user_id', \Auth::user()->id)->first();

        return view('survey/student', $data);
    }

    public function handleStudentSurvey(Request $request)
    {
        $data = $request->only(['vibe', 'size', 'age', 'type', 'distance']);
        // check if user already has a record

        if (empty($data) || empty($data['vibe']) || empty($data['size']) || empty($data['age']) || empty($data['type']) || empty($data['distance'])) {
            $data['survey'] = \App\StudentSurvey::where('user_id', \Auth::user()->id)->first();
            $data['error'] = 'Gelieve overal een antwoord aan te duiden.';

            return view('survey/student', $data);
        }

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

        return redirect('/change_student_data');
    }

    public function companySurvey()
    {
        $data['survey'] = \App\CompanySurvey::where('user_id', \Auth::user()->id)->first();

        return view('survey/company', $data);
    }

    public function handleCompanySurvey(Request $request)
    {
        $data = $request->only(['vibe', 'size', 'age', 'type', 'transport']);

        if (empty($data) || empty($data['vibe']) || empty($data['size']) || empty($data['age']) || empty($data['type']) || empty($data['transport'])) {
            $data['error'] = 'Gelieve overal een antwoord aan te duiden.';
            $data['survey'] = \App\CompanySurvey::where('user_id', \Auth::user()->id)->first();

            return view('survey/company', $data);
        }

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
            $survey_id = $survey->id;

            \App\Internship::where('company_id', \Auth::user()->id)->update(['company_survey_id' => $survey_id]);
        } else {
            $user = \App\CompanySurvey::where('user_id', \Auth::user()->id);
            $user->update(['vibe' => $data['vibe'], 'size' => $data['size'], 'age' => $data['age'], 'type' => $data['type'], 'transport' => $data['transport']]);
        }

        return redirect('/companyaccount');
    }
}
