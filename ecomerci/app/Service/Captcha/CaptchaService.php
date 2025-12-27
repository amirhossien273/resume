<?php

namespace App\Service\Captcha;

use Illuminate\Support\Facades\Session;

class CaptchaService
{
    private $characters;
    private $length;
    private $width;
    private $height;
    private $fontSize;
    private $lineCount;
    private $font_path;

    /**
     * CaptchaService constructor.
     * Initializes CAPTCHA configuration settings.
     */
    public function __construct()
    {
        // $backgroundImage = imagecreatefrompng(public_path('assets/front/imgs/theme/captcha.PNG'));
        // imagecopy($image, $backgroundImage, 0, 0, 0, 0, $this->width, $this->height);

        $this->characters = config('captcha.characters');
        $this->length = config('captcha.length');
        $this->width = config('captcha.width');
        $this->height = config('captcha.height');
        $this->fontSize = config('captcha.font_size');
        $this->lineCount = config('captcha.line_count');
        $this->font_path = config('captcha.font_path');
    }

    /**
     * Generates a CAPTCHA image and stores the code in session.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate()
    {
        $code = $this->generateRandomString();
        Session::put('captcha', $code);


        $image = imagecreatetruecolor($this->width, $this->height);
        $backgroundColor = imagecolorallocate($image, 188, 227, 201); // Background color #bce3c9
        $textColor = imagecolorallocate($image, 0, 0, 0);
        // $lineColor = imagecolorallocate($image, 64, 64, 64);

        imagefilledrectangle($image, 0, 0, $this->width, $this->height, $backgroundColor);

        // Add spaces between characters
        $spacedCode = implode('  ', str_split($code));
        // Add random lines to the image

        // for ($i = 0; $i < $this->lineCount; $i++) {
        //     imageline($image, 0, rand() % $this->height, $this->width, rand() % $this->height, $lineColor);
        // }


        // Calculate the coordinates to center the text
        $bbox = imagettfbbox($this->fontSize, 0, $this->font_path, $spacedCode);
        $textWidth = $bbox[2] - $bbox[0];
        $textHeight = $bbox[1] - $bbox[7];
        $x = ($this->width - $textWidth) / 2;
        $y = ($this->height - $textHeight) / 2 + $textHeight;

        // Colors array for multi-colored text
        $colors = [
            imagecolorallocate($image, 85, 187, 144),  // #55bb90
            imagecolorallocate($image, 247, 75, 129),  // #f74b81
            imagecolorallocate($image, 103, 188, 238), // #67bcee
            imagecolorallocate($image, 245, 151, 88)   // #f59758
        ];

           // Add each character with a different color to the image
            $charWidth = imagefontwidth($this->fontSize);
            $charHeight = imagefontheight($this->fontSize);

        // Add each character with a different color to the image
        for ($i = 0, $len = strlen($spacedCode); $i < $len; $i++) {
            $char = $spacedCode[$i];
            $color = $colors[array_rand($colors)];
            // imagestring($image, $this->fontSize, $x + $i * $fontWidth, $y, $char, $color);
            imagettftext($image, $this->fontSize, 0, $x + $i * ($charWidth), $y, $color, $this->font_path, $char);
        }

        // Output the image
        ob_start();
        imagepng($image);
        $contents = ob_get_contents();
        ob_end_clean();
        imagedestroy($image);

        return response($contents)->header('Content-Type', 'image/png');
    }

    /**
     * Generates a random string for the CAPTCHA code.
     *
     * @return string
     */
    private function generateRandomString()
    {

        $charactersLength = strlen($this->characters);
        $randomString = '';
        for ($i = 0; $i < $this->length; $i++) {
            $randomString .= $this->characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Validates the CAPTCHA input against the stored session value.
     *
     * @param string $input
     * @return bool
     */
    public function validate($input)
    {
        return $input === Session::get('captcha');
    }
}