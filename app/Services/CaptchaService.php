<?php
/**
 * Created by PhpStorm.
 * User: JepreTarim
 * Date: 15/10/2020
 * Time: 9:48 PM
 */

namespace App\Services;


class CaptchaService
{
    const CHARS = '012345678901234567abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function generate_captcha()
    {
        $captcha_text = '';

        for ($i = 0; $i < 6; $i++) {
            $captcha_text .= self::CHARS[rand(0, strlen(self::CHARS)-1)];
        }

        $width = 200;
        $height = 50;

        $image = ImageCreate($width, $height);

        $white = imagecolorallocate($image, 255, 255, 255);
        $black = imagecolorallocate($image, 0, 0, 0);
        $green = imagecolorallocate($image, 0, 255, 0);
        $brown = imagecolorallocate($image, 139, 69, 19);
        $orange = imagecolorallocate($image, 204, 204, 204);
        $grey = imagecolorallocate($image, 204, 204, 204);

        imagefill($image, 0, 0, $black);

        $font = resource_path('images/monofont.ttf');

        imagettftext($image, 25, 10, 45, 45, $white, $font, $captcha_text);

        $img_src = imagepng($image);
        imagedestroy($image);

        return $img_src;
    }
}
