<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    private $token = 'pk.eyJ1IjoibW9ycm9jb2RlcyIsImEiOiJjazNyZm16b2EwOW94M2hwczlsNmJ4Nm45In0.-sQ-jrWzHe90UCnAw4ZSLA';

    public function matchStudentWithCompanies(Request $request)
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
        $data['request'] = $request;
        if ($request->address != null) {
            if ($request->transport_method == null) {
                $request->transport_method = 'driving';
            }
            $origin = $this->getGeoCode($request->address);
            if (!isset($origin['error'])) {
                foreach ($companySurveys as $companySurvey) {
                    foreach ($companySurvey->internships as $internship) {
                        $destination = $this->getGeoCode($internship->address);
                        $internship->distance = $this->getDistance($origin, $destination, $request->transport_method);
                    }
                    $companySurvey->internships = $companySurvey->internships->sortByDesc('distance');
                }
            } else {
                $data['error'] = $origin['error'];
            }
        }
        foreach ($companySurveys as $companySurvey) {
            $companySurvey->company = $companySurvey->user->company;
        }
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

    // public function showGeoCode()
    // {
    //     $address = 'Gladioolstraat 5';
    //     $p1 = $this->getGeoCode($address);
    //     $data['p1'] = $p1;
    //     $p2 = $this->getGeoCode('Nieuwstraat Geel');
    //     $data['p2'] = $p2;
    //     $data['distance'] = $this->getDistance($p1, $p2, 'cycling');

    //     return dd($data);
    // }

    public function getGeoCode($address)
    {
        $address = rawurlencode($address);
        $url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/'.$address.'.json?access_token='.$this->token;
        $data = file_get_contents($url);
        $json = json_decode($data, true);
        if (isset($json['features'][0])) {
            $coordinates = $json['features'][0]['geometry']['coordinates'][0].','.$json['features'][0]['geometry']['coordinates'][1];
        } else {
            $result['error'] = 'Kon deze locatie niet vinden';

            return $result;
        }

        return $coordinates;
    }

    public function getDistance($p1, $p2, $transport_method)
    {
        $url = 'https://api.mapbox.com/optimized-trips/v1/mapbox/'.$transport_method.'/'.$p1.';'.$p2.'?roundtrip=false&source=first&destination=last&access_token='.$this->token;
        $data = file_get_contents($url);
        $json = json_decode($data, true);
        if (isset($json['trips'][0])) {
            $result['distance'] = $this->metersToKm($json['trips'][0]['distance']);
            $result['duration'] = $this->secondsToTime($json['trips'][0]['duration']);

            return $result;
        }

        return null;
    }

    public function secondsToTime($secs)
    {
        $mins = $secs / 60;
        $mins = round($mins);
        if ($mins < 60) {
            $mins = $mins.' minuten';

            return $mins;
        }
        $hrs = $mins / 60;
        $hrs = round($hrs, 1);
        $hrs = $hrs.' uur';

        return $hrs;
    }

    public function metersToKm($meters)
    {
        round($meters);
        if ($meters < 1000) {
            $meters = $meters.'m';

            return $meters;
        }
        $kilometers = $meters / 1000;
        $kilometers = round($kilometers, 1);
        $kilometers = $kilometers.'km';

        return $kilometers;
    }
}
