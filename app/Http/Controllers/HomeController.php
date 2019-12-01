<?php

namespace App\Http\Controllers;

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

        return view('index/home', $data);
    }

    public function internshipDetail($internship)
    {
        $data['internship'] = \App\Internship::where('id', $internship)->first();

        return view('student/internshipData', $data);
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
