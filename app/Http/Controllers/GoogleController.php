<?php

namespace App\Http\Controllers\Auth;



use App\User;

use App\Http\Controllers\Controller;

use Laravel\Socialite\Facades\Socialite;


use Illuminate\Support\Facades\Auth;
use Mockery\Exception;


class GoogleController extends Controller

{

    public function redirectToGoogle()

    {
        return \Laravel\Socialite\Facades\Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()

    {
        try {
            return redirect()->route('home');
        } catch (Exception $e) {
            return redirect('auth/google');
        }

    }

}
