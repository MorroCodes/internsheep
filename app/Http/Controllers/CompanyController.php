<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Company;
use \App\Internship;

class CompanyController extends Controller
{
    public function show()
    {
        $id = \Auth::user()->id;
        $data['internship'] = \App\Internship::where('company_id', $id)->take(3)->get();

        return view('yourCompany', $data);
    }
    
    
    public function index($id, $internship) {
        $internship = Internship::find($id);
        
        return view('show',compact('internship'));
       
}

   
}



