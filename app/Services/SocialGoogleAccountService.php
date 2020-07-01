<?php

namespace App\Services;

use App\SocialAuthGooglemodel;
use App\registRATION;
use Session;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialGoogleAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAuthGooglemodel::whereprovider('google')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            // print_r('account:- '.$account->user);
            // die();
            return $account->user;
        } else {
            $account = new SocialAuthGooglemodel([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'google'
            ]);
            $user = registration::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = registration::create([
                    'provider_user_id' => $providerUser->getId(),
                    'email' => $providerUser->getEmail(),
                ]);
                // print_r($user);
                // die();
            }
            // print_r($user);
            // die();
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}
