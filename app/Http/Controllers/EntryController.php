<?php

namespace App\Http\Controllers;

class EntryController extends Controller
{
    public function login()
    {
        return view('entry/login');
    }

    public function signup()
    {
        return view('entry/signup');
    }

    public function studentSignup()
    {
        return view('entry/student_signup');
    }

    public function companySignup()
    {
        return view('entry/company_signup');
    }
}
