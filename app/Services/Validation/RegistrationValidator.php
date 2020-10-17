<?php
/**
 * Created by PhpStorm.
 * User: JepreTarim
 * Date: 15/10/2020
 * Time: 8:30 PM
 */

namespace App\Services\Validation;


class RegistrationValidator extends Validator
{
    static $rules = [
        'username' => 'required|unique:users',
        'password' => 'required|min:8',
    ];
}
