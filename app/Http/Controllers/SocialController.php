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

        if (strpos($referer, 'login') == true) {
            return redirect()->to('/signup');
        }

        $getInfo = Socialite::driver($provider)->user();
        $result = $this->getUserFromEmail($getInfo->email);

        if ($result != null && $result->provider == 'facebook') {
            $this->setSessionData($result);

            return redirect()->to('/');
        }

        $user = $this->createUser($getInfo, $provider, $referer);

        // get user now saved in db to be able to set session data
        $newUser = $this->getUserFromEmail($getInfo->email);
        $this->setSessionData($newUser);

        auth()->login($user);

        return redirect()->to('/');
    }

    public function createUser($getInfo, $provider, $referer)
    {
        // split name property from facebook into firstname and lastname
        $firstname = strstr($getInfo->name, ' ', true);
        $lastname = str_replace($firstname.' ', '', $getInfo->name);

        if (strpos($referer, 'student_signup') == true) {
            $type = 'student';
        } else {
            $type = 'company';
        }
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
}
