<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Captcha\CaptchaService;
use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    private $captchaService;

    public function __construct(CaptchaService $captchaService)
    {
        $this->captchaService = $captchaService;
    }

    public function generateCaptcha()
    {
        return generate_captcha($this->captchaService);
    }
}
