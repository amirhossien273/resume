<?php

return [
    /*
    |--------------------------------------------------------------------------
    | CAPTCHA Characters
    |--------------------------------------------------------------------------
    |
    | This value determines the set of characters that will be used to generate
    | the CAPTCHA code. You can customize this string to include any characters
    | you want to appear in the CAPTCHA.
    |
    */
    'characters' => '1234567890',

    /*
    |--------------------------------------------------------------------------
    | CAPTCHA Code Length
    |--------------------------------------------------------------------------
    |
    | This value determines the length of the CAPTCHA code. Adjust this value
    | to set how many characters long the CAPTCHA code should be.
    |
    */
    'length' => 4,

    /*
    |--------------------------------------------------------------------------
    | CAPTCHA Image Width
    |--------------------------------------------------------------------------
    |
    | This value determines the width of the CAPTCHA image in pixels. Adjust
    | this value to set the width of the generated CAPTCHA image.
    |
    */
    'width' => 150,

    /*
    |--------------------------------------------------------------------------
    | CAPTCHA Image Height
    |--------------------------------------------------------------------------
    |
    | This value determines the height of the CAPTCHA image in pixels. Adjust
    | this value to set the height of the generated CAPTCHA image.
    |
    */
    'height' => 64,

    /*
    |--------------------------------------------------------------------------
    | CAPTCHA Font Size
    |--------------------------------------------------------------------------
    |
    | This value determines the font size of the CAPTCHA text. Adjust this
    | value to set the size of the text in the generated CAPTCHA image.
    |
    */
    'font_size' => 20,

    /*
    |--------------------------------------------------------------------------
    | CAPTCHA Line Count
    |--------------------------------------------------------------------------
    |
    | This value determines the number of random lines that will be drawn on
    | the CAPTCHA image. These lines help make the CAPTCHA more difficult to
    | read for automated systems.
    |
    */
    'line_count' => 6,

    /*
    |--------------------------------------------------------------------------
    | CAPTCHA Font Path
    |--------------------------------------------------------------------------
    |
    | Path to the TrueType font file used for CAPTCHA text.
    |
    */
    
    'font_path' => __DIR__ . '/../public/assets/front/fonts/uicons/Roboto-Bold.ttf', 
];
