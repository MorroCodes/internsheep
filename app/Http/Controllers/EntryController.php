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

    public function facebookSignup()
    {
        return view('entry/facebook_signup');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (\Auth::attempt($credentials)) {
            $user = $this->getUserFromEmail($credentials['email']);
            $this->setSessionData($user);

            return redirect('/');
        } else {
            $data['error'] = 'Er is iets fout gegaan. Probeer opnieuw.';
            $data['email'] = $credentials['email'];

            return view('entry/login', $data);
        }
    }

    public function signupDataCheck($credentials)
    {
        // check if any fields were left empty
        if (in_array(null, $credentials, true)) {
            $data['error'] = 'Gelieve geen velden leeg te laten.';

            return $data;
        }

        // check if email address is available
        if ($this->checkEmailAvailability($credentials['email']) == false) {
            $data['error'] = 'Dit e-mail adres is reeds in gebruik. Probeer opnieuw.';

            return $data;
        }

        // check if password and password repeat match
        if ($credentials['password'] !== $credentials['password_repeat']) {
            $data['error'] = 'Je wachtwoorden komen niet overeen. Probeer opnieuw.';

            return $data;
        }

        return true;
    }

    public function handleCompanySignup(Request $request)
    {
        // get input values
        $credentials = $request->only(['firstname', 'lastname', 'email', 'company_name', 'company_bio', 'password', 'password_repeat']);
        $type = 'company';
        $data['user'] = $credentials;

        // check for signup errors
        $result = $this->signupDataCheck($credentials);
        if ($result !== true) {
            $data['error'] = $result['error'];

            return view('entry/company_signup', $data);
        }

        // save general user info
        $this->saveUser($credentials, $type);

        // get user information
        $user = $this->getUserFromEmail($credentials['email']);

        // save info specific to student profile
        $this->saveCompany($credentials, $user->id);

        // give user session data (name, type of user)
        $this->setSessionData($user);
        if (\Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $user)) {
            // The user is being remembered...
        }

        return redirect('/company_survey');
    }

    public function handleStudentSignup(Request $request)
    {
        // get input values
        $credentials = $request->only(['firstname', 'lastname', 'email', 'school', 'field_of_study', 'password', 'password_repeat']);
        $type = 'student';
        $data['user'] = $credentials;

        // check for signup errors
        $result = $this->signupDataCheck($credentials);
        if ($result !== true) {
            $data['error'] = $result['error'];

            return view('entry/student_signup', $data);
        }

        // save general user info
        $this->saveUser($credentials, $type);

        // get user information
        $user = $this->getUserFromEmail($credentials['email']);

        // save info specific to student profile
        $this->saveStudent($credentials, $user->id);

        // give user session data (name, type of user)
        $this->setSessionData($user);

        if (\Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $user)) {
            // The user is being remembered...
        }

        return redirect('/student_survey');
    }

    public function saveUser($credentials, $type)
    {
        $user = new \App\User();
        $user->firstname = $credentials['firstname'];
        $user->lastname = $credentials['lastname'];
        $user->description = 'Dit is mijn beschrijving.';
        $user->profile_image = 'https://ichef.bbci.co.uk/news/660/cpsprodpb/E9DF/production/_96317895_gettyimages-164067218.jpg';
        $user->email = $credentials['email'];
        $user->password = \Hash::make($credentials['password']);
        $user->type = $type;
        $user->save();
    }

    public function saveCompany($credentials, $id)
    {
        $company = new \App\Company();
        $company->user_id = $id;
        $company->company_name = $credentials['company_name'];
        $company->company_bio = $credentials['company_bio'];
        $company->save();
    }

    public function saveStudent($credentials, $id)
    {
        $student = new \App\Student();
        $student->user_id = $id;
        $student->school = $credentials['school'];
        $student->field_of_study = $credentials['field_of_study'];
        $student->save();
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
        $user = \App\User::where('email', $email)->first();

        return $user;
    }

    public function setSessionData($user)
    {
        session(['id' => $user->id, 'type' => $user->type]);
    }

    public function completeStudentSignup()
    {
        return view('entry/complete_student_signup');
    }

    public function completeCompanySignup()
    {
        return view('entry/complete_company_signup');
    }

    public function handleCompleteCompanySignup(Request $request)
    {
        $credentials = $request->only(['company_name', 'company_bio']);

        // check if any fields were left empty
        if (in_array(null, $credentials, true)) {
            $data['error'] = 'Gelieve geen velden leeg te laten.';

            return view('entry/complete_company_signup', $data);
        }

        $company = \App\Company::where('user_id', session('id'));
        $company->update(['company_name' => $credentials['company_name'], 'company_bio' => $credentials['company_bio']]);

        return redirect('/company_survey');
    }

    public function handleCompleteStudentSignup(Request $request)
    {
        $credentials = $request->only(['school', 'field_of_study']);

        // check if any fields were left empty
        if (in_array(null, $credentials, true)) {
            $data['error'] = 'Gelieve geen velden leeg te laten.';

            return view('entry/complete_student_signup', $data);
        }

        $student = \App\Student::where('user_id', session('id'));
        $student->update(['school' => $credentials['school'], 'field_of_study' => $credentials['field_of_study']]);

        return redirect('/student_survey');
    }
}
