<?php

namespace App\Http\Controllers;

use Redirect;
use Socialite;
use App\User;
use Request;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        // get referer link to decide type of user
        $referer = Request::server('HTTP_REFERER');

        // if redirect comes from login -> redirect to signup to choose account type
        if (strpos($referer, 'login') == true) {
            return redirect()->to('/signup');
        }

        // save type of user in variable
        if (strpos($referer, 'student_signup') == true) {
            $type = 'student';
        } else {
            $type = 'company';
        }

        $getInfo = Socialite::driver($provider)->user();
        $result = $this->getUserFromEmail($getInfo->email);

        if ($result != null && $result->provider == 'facebook') {
            $this->setSessionData($result);

            return redirect()->to('/');
        }

        $user = $this->createUser($getInfo, $provider, $type);

        // get user now saved in db to be able to set session data
        $newUser = $this->getUserFromEmail($getInfo->email);

        if ($type == 'student') {
            // save user_id in student table from $newUser
            $this->createStudentRecord($newUser->id);
        } else {
            // save user_id in company table from $newUser
            $this->createCompanyRecord($newUser->id);
        }

        $this->setSessionData($newUser);

        auth()->login($user);

        // redirect to profile completion page for student/company
        if ($type == 'student') {
            return redirect()->to('/complete_student_signup');
        } else {
            return redirect()->to('/complete_company_signup');
        }
    }

    public function createUser($getInfo, $provider, $type)
    {
        // split name property from facebook into firstname and lastname
        $firstname = strstr($getInfo->name, ' ', true);
        $lastname = str_replace($firstname.' ', '', $getInfo->name);

        //dd($provider);
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
         'firstname' => $firstname,
         'lastname' => $lastname,
         'email' => $getInfo->email,
         'type' => $type,
         'provider' => $provider,
         'provider_id' => $getInfo->id,
     ]);
        }

        return $user;
    }

    public function getUserFromEmail($email)
    {
        $user = \DB::table('users')->where('email', $email)->first();

        return $user;
    }

    public function setSessionData($user)
    {
        session(['id' => $user->id, 'type' => $user->type]);
    }

    public function createStudentRecord($id)
    {
        $student = new \App\Student();
        $student->user_id = $id;
        $student->save();
    }

    public function createCompanyRecord($id)
    {
        $company = new \App\Company();
        $company->user_id = $id;
        $company->save();
    }
}
