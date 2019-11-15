<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountCompanyController extends Controller
{
    public function show()
    {
        return view('companyAccount');
    }
    public function handleData(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');

        $user = \App\User::where('id', 2)->update(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email]);

        return redirect('/companyAccount');
    }
    public function handleNewPassword(){

    }
   

}
