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
        $data['internship'] = \App\Internship::orderBy('id', 'desc')->take(6)->get();
        $companies = Company::limit(6)->get();
        // dd(\App\Internship::orderBy('id', 'desc')->where('created_at', '>=', \Carbon\Carbon::today()->subWeek().' 00:00:00')->count());
        return view('index/home', $data, compact('companies'));
    }

    public function internshipDetail($internship)
    {
        $data['internship'] = \App\Internship::where('id', $internship)->first();
        // dd($data['internship']);

        $mid = 0;
        $count = 0;
        foreach ($data['internship']['ratings'] as $r) {
            $mid += $r['rating'];
            $count++;
        }

        $mid = $mid / $count;

        $data['internship']['mid'] = $mid;

        return view('student/internshipData', $data);
    }

    public function internshipRating(Request $request)
    {
        $student_id = \Auth::user()->id;
        $rate = $request->input('rating');
        $internship_id = $request->input('internship');

        $row = \App\Rating::where('student_id', $student_id)->where('internship_id', $internship_id)->first();
        if ($row === null) {
            $rating = new \App\Rating();
            $rating->rating = $rate;
            $rating->student_id = $student_id;
            $rating->internship_id = $internship_id;
            $rating->save();
        }else{
            $row->rating = $rate;
            $row->save();
        }

        return response()->json([
            'success' => $internship_id
        ]);


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
