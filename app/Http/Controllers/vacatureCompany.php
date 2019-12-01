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

    public function update(Request $request,$id)
    {
       $internship = Internship::find($id);
       $internship->update($request->all());
       return redirect()->back()->with('message', 'succes!');
    }

    public function create(){
        return('internship.create');
    }

    


}
