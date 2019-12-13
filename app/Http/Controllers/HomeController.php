<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $type = \Auth::user()->type;
        if ($type != 'student') {
            return redirect('/yourcompany');
        }
        $data['internship'] = \App\Internship::orderBy('id', 'desc')->take(6)->get();
        $companies = Company::limit(6)->get();
        // dd(\App\Internship::orderBy('id', 'desc')->where('created_at', '>=', \Carbon\Carbon::today()->subWeek().' 00:00:00')->count());
        return view('index/home', $data, compact('companies'));
    }

    public function internshipDetail($internship)
    {
        $type = \Auth::user()->type;
        if ($type != 'student') {
            return redirect('/yourcompany');
        }
        $internship = \App\Internship::where('id', $internship)->with('company')->first();
        $user_id = $internship->company_id;
        $user = \App\User::where('id', $user_id)->first();

        $company = \App\Company::where('user_id', $user_id)->first();
        // companuy_id was saved wrong, user_id was saved instead
        $others_by_company = \App\Internship::where('company_id', $user_id)->where('id', '!=', $internship->id)->take(3)->get();
        $data['internship'] = $internship;
        $data['company'] = $company;
        $data['others_by_company'] = $others_by_company;
        $data['user'] = $user;

        $mid = $this->getAverage($data['internship']['ratings']);

        $data['internship']['mid'] = $mid;

        return view('student/internshipData', $data);
    }

    public function getAverage($rating)
    {
        $mid = 0;
        $count = 0;
        foreach ($rating as $r) {
            $mid += $r['rating'];
            ++$count;
        }
        if ($mid !== 0) {
            return $mid = $mid / $count;
        } else {
            return $mid;
        }
    }

    public function internshipRating(Request $request)
    {
        $rate = $request->input('rating');
        $student_id = \Auth::user()->id;
        $internship_id = $request->input('internship');

        $row = \App\Rating::where('student_id', $student_id)->where('internship_id', $internship_id)->first();
        if ($row === null) {
            $this->insertRating($rate, $student_id, $internship_id);
        } else {
            $this->updateRating($row, $rate);
        }

        return response()->json([
            'success' => $internship_id,
        ]);
    }

    public function insertRating($rate, $student_id, $internship_id)
    {
        $rating = new \App\Rating();
        $rating->rating = $rate;
        $rating->student_id = $student_id;
        $rating->internship_id = $internship_id;
        $rating->save();
    }

    public function updateRating($row, $rate)
    {
        $row->rating = $rate;
        $row->save();
    }

    public function redirect()
    {
        $type = \Auth::user()->type;
        if ($type == 'student') {
            return redirect('/home');
        } else {
            return redirect('/yourcompany');
        }
    }
}
