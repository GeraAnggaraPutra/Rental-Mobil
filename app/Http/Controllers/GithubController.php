<?php

namespace App\Http\Controllers;

use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function redirectToGithub() {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback() {
        try {
            $user = Socialite::driver('github')->user();
            $findUser = User::where('id_github', $user->getId())->first();

            if($findUser) {
                Auth::login($findUser);
                toast('Anda berhasil masuk dengan Github.','success');
                return redirect()->intended('/');
            }else {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'role' => "user",
                    'id_github' => $user->getId(),
                    'email_verified_at' => now(),
                ]);

                Auth::login($newUser);
                toast('Anda berhasil masuk dengan Github.','success');
                return redirect()->intended('/');
            }
        } catch (Exception $e) {
            return redirect('auth/github');
        }
    }
}
