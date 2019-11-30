<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class vacatureCompany extends Controller
{
    public function show()
    {
        
        return view('vacature');
    }
    public function handleCompanyData(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $id = \Auth::user()->id;

        $user = \App\Internship::where('id', $id)->update(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email]);

        return redirect('/companyaccount');
    }
    public function changeCompanyData()
    {
        return view('companyAccount');
    }
}
