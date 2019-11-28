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

    public function redirectFacebook($provider, $type)
    {
        session(['signup_type' => $type]);

        return Socialite::driver($provider)->redirect();
    }

    public function callback(Request $request, $provider)
    {
        // get referer link to decide type of user
        $referer = Request::server('HTTP_REFERER');
        // $object = $request->query('type');

        // if redirect comes from login -> redirect to signup to choose account type
        if (strpos($referer, 'login') == true) {
            // check if user has account
            $getInfo = Socialite::driver($provider)->user();
            $result = $this->getUserFromEmail($getInfo->email);

            // if user has no account yet -> redirect to page where they can choose
            if ($result == null) {
                return redirect()->to('/facebook_signup');
            }

            // check if user has signed up with facebook in the past
            if ($result->provider == 'facebook') {
                $this->setSessionData($result);

                return redirect()->to('/');
            }
            // if user has an account but not with facebook -> error
            dd('if user has an account but not with facebook -> error');
        }

        // save type of user in variable
        if (strpos($referer, 'student_signup') == true) {
            $type = 'student';
        } elseif (strpos($referer, 'company_signup') == true) {
            $type = 'company';
        } elseif (strpos($referer, 'facebook_signup') == true) {
            $type = session('signup_type');
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
         'profile_image' => 'https://ichef.bbci.co.uk/news/660/cpsprodpb/E9DF/production/_96317895_gettyimages-164067218.jpg',
         'description' => '',
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
