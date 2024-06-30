<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::updateOrCreate([
            'google_user_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => Hash::make('Password!123'),
            'role' => 0,
            'google_user_id' => $googleUser->id,
        ]);
        // $user = User::where('google_user_id', '=', $googleUser->id)->first();

        // if ($user) {
        //     //Update
        //     $user->name = $googleUser->name;

        //     $user->save();
        // } else {
        //     $user = User::create([
        //         'name' => $googleUser->name,
        //         'email' => $googleUser->email,
        //         'password' => Hash::make('Password!123'),
        //         'role' => 0,
        //         'google_user_id' => $googleUser->id,
        //     ]);
        // }
        Auth::login($user);


        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
