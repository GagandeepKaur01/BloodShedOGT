<?php

namespace App\Http\Controllers;

use App\SocialAuthGoogleController;
use Illuminate\Http\Request;
use Socialite;
use Session;
use Symfony\Component\HttpFoundation\Cookie;
use App\Services\SocialGoogleAccountService;
use Illuminate\Contracts\Session\Session as SessionSession;

class SocialAuthGoogleControllerController extends Controller
{
    /**
     * Create a redirect method to google api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Return a callback method from google api.
     *
     * @return callback URL from google
     */
    public function callback(SocialGoogleAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('google')->user());


        if ($user->username == '') {
            session()->flash('register_complete', 'Please Complete your details');
            Session::put('google_email', $user->email);
            Session::put('provider_user_id', $user->provider_user_id);
            return redirect('registration_complete_view');
        } else {
            Session::flush();
            session()->flash('email_exists_google', 'Your Email is already registered with us.');
            return redirect('/');
        }
    }
}
