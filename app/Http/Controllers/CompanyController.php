<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Company;
use \App\Internship;

class CompanyController extends Controller
{
    public function show(\App\Company $company)
    {
        $internship = Internship::paginate(3);
        return view('yourCompany',compact('internship'));
    }
    
    
    public function index($id, $internship) {
        $internship = Internship::find($id);
        
        return view('show',compact('internship'));
        
}
   
}



