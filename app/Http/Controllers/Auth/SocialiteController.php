<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect(string $provider)
    {
        if (!$this->catchError($provider)) {
            abort(404, trans('Page Not Found'));
        }

        return Socialite::driver($provider)->redirect();
    }

    protected function catchError(string $provider): bool
    {
        if ($provider != 'google') {
            return false;
        }

        return true;
    }

    public function callback(string $provider)
    {
        try {
            $socialAccount = Socialite::driver($provider)->user();

            $user = User::firstOrNew([
                'email' => $socialAccount->getEmail(),
            ], [
                'email' => $socialAccount->getEmail(),
                'name' => $socialAccount->getName(),
                'provider_id' => $socialAccount->getId(),
                'auth_type' => $provider,
                'address' => '',
                'phone' => '',
                'password' => Hash::make(Str::random(10)),
                'email_verified_at' => Carbon::now(),
            ]);

            Auth::login($user);

            return redirect('/');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
