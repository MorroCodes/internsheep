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
    public function handleNewPassword(Request $request){
        $password1 = $request->input('password1');
        $password2 = $request->input('password2');
        $id = \Auth::user()->id;

        if($password1 === $password2){
            echo 'hi';
            $user = \App\User::where('id', $id)->update(['password' => \Hash::make($request->input('password1'))]);
            return redirect('/companyaccount');
        }
    }
   

}
