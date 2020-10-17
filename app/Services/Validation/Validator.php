<?php
/**
 * Created by PhpStorm.
 * User: JepreTarim
 * Date: 15/10/2020
 * Time: 8:13 PM
 */

namespace App\Services\Validation;

use Illuminate\Support\Facades\Validator as V;

abstract class Validator
{
    protected $errors;

    /**
     * @param $input
     * @return bool
     */
    public function validate($input)
    {
        $validator = V::make($input, static::$rules);

        if ($validator->fails()) {
            $this->errors = $validator->errors();
            return false;
        }
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }
}
