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
        $id = \Auth::user()->id;

        $user = \App\User::where('id', $id)->update(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email]);

        return redirect('/youraccount');
    }

    public function handleNewPassword(Request $request){
        
    }
}
