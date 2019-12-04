<?php

namespace App\Http\Controllers;

class MatchController extends Controller
{
    public function matchStudentWithCompanies()
    {
        if (session('id') == null) {
            return view('entry/login');
        }
        //Get survey of student
        $userSurvey = \App\StudentSurvey::where('user_id', session('id'))->first();
        //Get surveys of companies with similar results
        $vibe = $userSurvey->vibe;
        $size = $userSurvey->size;
        $age = $userSurvey->age;
        $type = $userSurvey->type;
        $companySurveys = \App\CompanySurvey::where(function ($query) use ($vibe, $size, $age, $type) {
            $query
                    ->where('vibe', '=', $vibe)
                    ->orWhere('size', '=', $size)
                    ->orWhere('age', '=', $age)
                    ->orWhere('type', '=', $type);
        })->with('user', 'internships')->get();
        $percentages = $this->countPercentages($userSurvey, $companySurveys);
        $companySurveys = $this->addMatchPercentages($companySurveys, $percentages);
        $companySurveys = $companySurveys->sortByDesc('match');
        $data['companySurveys'] = $companySurveys;

        return view('match/index', $data);
    }

    public function countPercentages($userSurvey, $companySurveys)
    {
        foreach ($companySurveys as $companySurvey) {
            $percentageVibe = 100 - abs(($userSurvey->vibe - $companySurvey->vibe) * 20);
            $percentageSize = 100 - abs(($userSurvey->size - $companySurvey->size) * 20);
            $percentageAge = 100 - abs(($userSurvey->age - $companySurvey->age) * 20);
            $percentageType = 100 - abs(($userSurvey->vibe - $companySurvey->vibe) * 20);
            $percentage = ($percentageVibe + $percentageSize + $percentageAge + $percentageType) / 4;
            $percentageArr[$companySurvey->user_id] = $percentage;
        }

        return $percentageArr;
    }

    public function addMatchPercentages($companySurveys, $percentages)
    {
        foreach ($companySurveys as $companySurvey) {
            $companySurvey->match = $percentages[$companySurvey->user_id];
        }

        return $companySurveys;
    }

    public function showGeoCode()
    {
        $address = 'Gladioolstraat 5';
        $data = $this->getGeoCode($address);

        return dd($data);
    }

    public function getGeoCode($address)
    {
        $token = 'pk.eyJ1IjoibW9ycm9jb2RlcyIsImEiOiJjazNyZm16b2EwOW94M2hwczlsNmJ4Nm45In0.-sQ-jrWzHe90UCnAw4ZSLA';
        $address = rawurlencode($address);
        $url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/'.$address.'.json?access_token='.$token;
        $data = file_get_contents($url);
        $json = json_decode($data, true);

        return $json['features'][0]['geometry']['coordinates'];
    }
}
