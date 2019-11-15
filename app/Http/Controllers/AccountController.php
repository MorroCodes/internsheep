<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function show()
    {
        return view('youraccount');
    }

    public function handleData(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');

        $user = \App\User::where('id', 2)->update(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email]);

        return redirect('/youraccount');
    }

    public function handleNewPassword(){

    }
}
