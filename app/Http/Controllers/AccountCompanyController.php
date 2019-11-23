<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountCompanyController extends Controller
{
    public function changeCompanyData()
    {
        return view('companyAccount');
    }

    public function handleStudentData(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $id = \Auth::user()->id;

        $user = \App\User::where('id', $id)->update(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email]);

        return redirect('/companyaccount');
    }
    

    public function handleCompanyNewPassword(Request $request){
        $password1 = $request->input('password1');
        $password2 = $request->input('password2');
        $id = \Auth::user()->id;

        if($password1 === $password2){
            $user = \App\User::where('id', $id)->update(['password' => \Hash::make($request->input('password1'))]);
            return redirect('/companyaccount');
        }
    }

}
