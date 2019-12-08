<?php

namespace App\Http\Controllers;

use App\Company;

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

        return view('student/internshipData', $data);
    }

    public function internshipRating(PostRequest $request)
    {
        $response = $request->input('data');
        return $response;
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
