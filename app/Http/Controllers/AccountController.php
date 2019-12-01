<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function changeStudentData()
    {
        if(\Auth::user()->type == "student"){
            return view('/student/studentData');
        }else{
            return redirect('/');
        }
    }

    public function handleStudentData(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $id = \Auth::user()->id;

        $user = \App\User::where('id', $id);
        $user->update(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email]);

        return redirect('/change_student_data');
    }

    public function handleStudentNewPassword(Request $request){
        $password1 = $request->input('password1');
        $password2 = $request->input('password2');
        $id = \Auth::user()->id;

        if($password1 === $password2){
            $user = \App\User::where('id', $id);
            $user->update(['password' => \Hash::make($request->input('password1'))]);

            return redirect('/change_student_data');
        }
    }

    public function StudentProfile(){
        $id = \Auth::user()->id;
        $data['user'] = \App\User::where('id', $id)->first();

        return view('student/student', $data);
    }
}
