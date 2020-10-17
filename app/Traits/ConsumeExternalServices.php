<?php
/**
 * Created by PhpStorm.
 * User: JepreTarim
 * Date: 17/10/2020
 * Time: 11:43 AM
 */

namespace App\Traits;


use GuzzleHttp\Client;

trait ConsumeExternalServices
{
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new Client([

        ]);
    }
}
