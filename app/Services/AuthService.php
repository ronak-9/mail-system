<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function authentication($credentials, $guard = null)
    {
        if ($guard) {
            return Auth::guard($guard)->attempt($credentials);
        } else {
            return Auth::attempt($credentials);
        }
    }

    public function getAuthUser($guard = null){
        if ($guard)
            return Auth::guard($guard)->user();
        else
            return Auth::user();
    }

    public function getAuthUserId($guard = null){
        return $this->getAuthUser($guard)->id;
    }

    public function logout($guard = null)
    {
        if ($guard) {
            Auth::guard($guard)->logout();
        } else {
            Auth::logout();
        }
        session()->invalidate();
        session()->regenerateToken();
    }
}
