<?php

namespace App\Http\Controllers;

use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{

    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('id_google', $user->getId())->first();

            if($findUser) {
                Auth::login($findUser);
                toast('Anda berhasil masuk dengan Google.','success');
                return redirect()->intended('/');
            }else {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'role' => "user",
                    'id_google' => $user->getId(),
                    'email_verified_at' => now(),
                ]);

                Auth::login($newUser);
                toast('Anda berhasil masuk dengan Google.','success');
                return redirect()->intended('/');
            }
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }
}
