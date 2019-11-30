<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Company;
use \App\Internship;

class vacatureCompany extends Controller
{
    public function index()
    {
        
        return view('vacature');
    }

    public function edit($id)
    {
       $internship = Internship::find($id);
       return view('internship.edit', compact('internship'));
    }

    


}
