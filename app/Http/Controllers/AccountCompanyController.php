<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountCompanyController extends Controller
{
    public function changeCompanyData()
    {
        $data['surveyInfo'] = \App\CompanySurvey::where('user_id', \Auth::user()->id)->first();
        $data['company'] = \App\Company::where('user_id', \Auth::user()->id)->first();

        return view('company/companyAccount', $data);
    }

    public function handleCompanyData(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $id = \Auth::user()->id;

        $user = \App\User::where('id', $id)->update(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email]);

        return redirect('/companyaccount');
    }

    public function handleCompanyData2(Request $request)
    {
        $nameCompany = $request->input('company_name');
        $description = $request->input('company_bio');
        $id = \Auth::user()->id;

        $data['user'] = \App\Company::where('user_id', $id)->update(['company_name' => $nameCompany, 'company_bio' => $description]);

        return redirect('/companyaccount');
    }

    public function handleCompanyNewPassword(Request $request)
    {
        $req = $request->only(['pass1', 'pass2', 'password', 'email']);
        $credentials = $request->only(['email', 'password']);

        $data['surveyInfo'] = \App\CompanySurvey::where('user_id', \Auth::user()->id)->first();
        $data['company'] = \App\Company::where('user_id', \Auth::user()->id)->first();

        if (\Auth::validate($credentials) == false) {
            $data['error'] = 'Je wachtwoord is incorrect. Probeer opnieuw.';
            $data['type'] = 'alert-danger';

            return view('company/companyAccount', $data);
        }

        if ($req['pass1'] !== $req['pass2']) {
            $data['error'] = 'Je wachtwoorden komen niet overeen. Probeer opnieuw.';
            $data['type'] = 'alert-danger';

            return view('company/companyAccount', $data);
        }

        // update pass
        $user = \App\User::where('id', \Auth::user()->id)->update(['password' => \Hash::make($req['pass1'])]);
        $data['error'] = 'Je wachtwoord is ge-update!';
        $data['type'] = 'alert-success';

        return view('company/companyAccount', $data);
    }
}
