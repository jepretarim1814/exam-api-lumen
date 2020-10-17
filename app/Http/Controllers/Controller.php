<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use ApiResponser;

    protected function respondWithToken($token)
    {
        $user = Auth::user();
        return $this->successResponse([
            'user' => [
                'username' => $user->username,
                'accessToken' => $token
            ],
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ], 200);
    }
}
