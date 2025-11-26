<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TwitterController extends Controller
{
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterCallback()
    {
        $twitterUser = Socialite::driver('twitter')->user();

        // Cari user berdasarkan twitter id atau email
        $user = User::firstOrCreate(
            ['twitter_id' => $twitterUser->id],
            [
                'name' => $twitterUser->name,
                'email' => $twitterUser->email ?? $twitterUser->id . '@twitter.com',
                'password' => bcrypt(Str::random(16)),
            ]
        );

        Auth::login($user);

        return redirect()->route('dashboard'); // ganti sesuai route dashboard kamu
    }
}
