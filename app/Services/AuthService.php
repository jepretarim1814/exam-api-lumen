<?php
/**
 * Created by PhpStorm.
 * User: JepreTarim
 * Date: 15/10/2020
 * Time: 9:23 PM
 */

namespace App\Services;


use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function logout()
    {
        Auth::logout();
        $this->invalidateToken();
    }

    public function invalidateToken()
    {
        Auth::invalidate(true);
    }

    public function refreshToken()
    {
        // blacklist token
        $this->invalidateToken();

        //Assign new token
        $newToken = Auth::login(Auth::user());
        Auth::setToken($newToken);

        return $newToken;
    }
}
