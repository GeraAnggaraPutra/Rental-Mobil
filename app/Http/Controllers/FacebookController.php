<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback() {
        try {
            $user = Socialite::driver('facebook')->user();
            $findUser = User::where('id_facebook', $user->getId())->first();
            toast('Anda berhasil masuk dengan Facebook.','success');
            if($findUser) {
                Auth::login($findUser);
                return redirect()->intended('/');
            }else {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'role' => "user",
                    'id_facebook' => $user->getId(),
                    'email_verified_at' => now(),
                ]);

                Auth::login($newUser);
                toast('Anda berhasil masuk dengan facebook.','success');
                return redirect()->intended('/');
            }
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
    }
}
