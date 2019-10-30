<?php

namespace App\Http\Controllers;

use Redirect;
use Socialite;
use App\User;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();

        $result = $this->getEmailSignedUpWithFacebook($getInfo->email);

        if ($result != null && $result->provider == 'facebook') {
            return redirect()->to('/');
        }

        $user = $this->createUser($getInfo, $provider);
        auth()->login($user);

        return redirect()->to('/');
    }

    public function createUser($getInfo, $provider)
    {
        $firstname = strstr($getInfo->name, ' ', true);
        $lastname = str_replace($firstname.' ', '', $getInfo->name);
        //dd($provider);
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
         'firstname' => $firstname,
         'lastname' => $lastname,
         'email' => $getInfo->email,
         'provider' => $provider,
         'provider_id' => $getInfo->id,
     ]);
        }

        return $user;
    }

    public function getEmailSignedUpWithFacebook($email)
    {
        $user = \DB::table('users')->where('email', $email)->first();

        return $user;
    }
}
