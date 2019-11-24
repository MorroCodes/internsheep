<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
        $data['internships'] = \DB::table('internships')->orderBy('id', 'desc')->limit(6)->get();
        return view('home', $data);
    }

    public function internshipDetail($internship){
        $data['internship'] = \App\Internship::where('id', $internship)->first();

        return view('internshipData', $data);
    }

    public function redirect(){
        $type = \Auth::user()->type;
        if($type == "student"){
            return redirect('/home');
        }else{
            return redirect('/yourCompany');
        }
    }
}
