<?php
/**
 * Created by PhpStorm.
 * User: JepreTarim
 * Date: 15/10/2020
 * Time: 1:40 PM
 */

namespace App\Http\Controllers;


use App\Services\CaptchaService;

class CaptchaController extends Controller
{
    /**
     * @var CaptchaService
     */
    private $service;

    public function __construct(CaptchaService $service)
    {
        $this->service = $service;
    }
    public function generate()
    {
        return response()->json([
            'captcha' => $this->service->generate_captcha()
        ])->withHeaders([
            'Content-type' => 'image/png'
        ]);
    }
}
