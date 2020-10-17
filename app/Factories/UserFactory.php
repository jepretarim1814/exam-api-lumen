<?php
/**
 * Created by PhpStorm.
 * User: JepreTarim
 * Date: 15/10/2020
 * Time: 8:19 PM
 */

namespace App\Factories;


use App\Models\User;

class UserFactory
{
    public function create($input)
    {
        $user = new User();
        $user->username = $input['username'];
        $user->password = app('hash')->make($input['password']);
        $user->save();

        return $user;
    }
}
