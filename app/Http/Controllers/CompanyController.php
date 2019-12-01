<?php

namespace App\Http\Controllers;

use App\Internship;

class CompanyController extends Controller
{
    public function show()
    {
        $id = \Auth::user()->id;
        $data['internship'] = \App\Internship::where('company_id', $id)->take(6)->get();

        return view('company/yourCompany', $data);
    }

    public function index($id, $internship)
    {
        $internship = Internship::find($id);

        return view('internship/show', compact('internship'));
    }
}
