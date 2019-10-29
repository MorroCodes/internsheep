<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function login()
    {
        return view('entry/login');
    }

    public function signup()
    {
        return view('entry/signup');
    }

    public function studentSignup()
    {
        return view('entry/student_signup');
    }

    public function companySignup()
    {
        return view('entry/company_signup');
    }

    public function handleStudentSignup(Request $request)
    {
        // get input values
        $credentials = $request->only(['firstname', 'lastname', 'email', 'school', 'field_of_study', 'password', 'password_repeat']);
        $data['user'] = $credentials;
        // check if any fields were left empty
        if (in_array(null, $credentials, true)) {
            $data['error'] = 'Gelieve geen velden leeg te laten.';

            return view('entry/student_signup', $data);
        }

        // check if email address is available
        if ($this->checkEmailAvailability($credentials['email']) == false) {
            $data['error'] = 'Dit e-mail adres is reeds in gebruik. Probeer opnieuw.';

            return view('entry/student_signup', $data);
        }

        // check if password and password repeat match
        if ($request->input($credentials['password']) !== $credentials['password_repeat']) {
            $data['error'] = 'Je wachtwoorden komen niet overeen. Probeer opnieuw.';

            return view('entry/student_signup', $data);
        }
    }

    public function saveUser()
    {
    }

    public function saveStudent()
    {
    }

    public function checkEmailAvailability($email)
    {
        $user = $this->getUserFromEmail($email);
        if (empty($user) == true) {
            // email is not used yet
            return true;
        } else {
            // email is already registered
            return false;
        }
    }

    public function getUserFromEmail($email)
    {
        $user = \DB::table('users')->where('email', $email)->first();

        return $user;
    }
}
