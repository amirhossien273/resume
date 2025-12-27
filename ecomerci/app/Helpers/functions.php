<?php

use App\Models\Setting;
use App\Service\Captcha\CaptchaService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

if (!function_exists('persian_months')) {
    function persian_months(): array
    {
        return [
            1 => 'فروردین',
            2 => 'اردیبهشت',
            3 => 'خرداد',
            4 => 'تیر',
            5 => 'مرداد',
            6 => 'شهریور',
            7 => 'مهر',
            8 => 'آبان',
            9 => 'آذر',
            10 => 'دی',
            11 => 'بهمن',
            12 => 'اسفند',
        ];
    }
}


if (!function_exists('load_settings')) {
    function load_settings($fresh_load = false): void
    {
        // Check DB connection and catch it
        try {
            if ($fresh_load)
                Cache::forget('settings');


            // Get all settings from the database
            $settings = Cache::rememberForever('settings', function () {
                return Setting::all();
            });

            // Bind all settings to the Laravel config, so you can call them like
            if ($settings->count() > 0) {
                foreach ($settings as $setting) {
                    if (!is_null($setting->value) && is_array($setting->value)) {
                        Config::set('settings.' . $setting->key, $setting->value);
                        Config::set('settings.' . $setting->key . '.updated_at', $setting->updated_at);
                    }
                }
            }
        } catch (Exception $e) {
            Config::set('settings.error', $e->getMessage());
        }
    }
}

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

if (!function_exists('api_response')) {

    function api_response(bool $success, $data = null, $response_code = 200, $massage = null, $errors = null, $meta = null): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $massage,
            'data' => $data,
            'errors' => $errors,
        ], $response_code);
    }
}

if (!function_exists('standardiseCharactersAndNumbers')) {
    function standardiseCharactersAndNumbers($string): array|string
    {
        /**
         * Only English numbers is accepted
         */
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩',];

        $latin_numeric = str_replace(
            $arabic,
            range(0, 9),
            str_replace($persian, range(0, 9), $string)
        );

        /**
         * Convert Arabic Characters to Farsi
         */
        $characters = [
            'ك' => 'ک',
            'دِ' => 'د',
            'بِ' => 'ب',
            'زِ' => 'ز',
            'ذِ' => 'ذ',
            'شِ' => 'ش',
            'سِ' => 'س',
            'ى' => 'ی',
            'ي' => 'ی',
        ];

        return str_replace(array_keys($characters), array_values($characters), $latin_numeric);
    }
}


if (! function_exists('generate_captcha')) {
    /**
     * Generate a CAPTCHA image using CaptchaService.
     *
     * @param CaptchaService|null $captchaService
     * @return \Illuminate\Http\Response
     */
    function generate_captcha(CaptchaService $captchaService = null)
    {
        $captchaService = $captchaService ?: app(CaptchaService::class);

        return $captchaService->generate();
    }
}

if (! function_exists('validate_captcha')) {
    /**
     * Validate a CAPTCHA input against the stored session value.
     *
     * @param string $input
     * @param CaptchaService|null $captchaService
     * @return bool
     */
    function validate_captcha($input, CaptchaService $captchaService = null)
    {
        $captchaService = $captchaService ?: app(CaptchaService::class);

        return $captchaService->validate($input);
    }
}

function setting($key, $default = null)
{
    $settings = DB::table('settings')->pluck('value', 'key')->toArray();

    return $settings[$key] ?? $default;
}