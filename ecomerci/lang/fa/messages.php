<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SMS Messages
    |--------------------------------------------------------------------------
    |
    | These are the SMS messages used for different scenarios such as OTP, 
    | expiration notice, error, and success messages.
    |
    */
    'sms' => [
        'otp'     => 'به سمیع عطا خوش آمدید' . PHP_EOL . 'کد تایید شما: :OTP', // Welcome message with OTP
        'expired' => 'مهلت استفاده کد شما به پایان رسیده است کد دیگری برای شما ارسال شد.', // Expiration notice
        'error'   => 'کد وارد شده صحیح نمی باشد.', // Error message for incorrect OTP
        'success' => 'کد به شماره همراه شما ارسال شد.' // Success message for OTP sent
    ],

    /*
    |--------------------------------------------------------------------------
    | Generic Status Messages
    |--------------------------------------------------------------------------
    |
    | These messages are used to provide feedback to the user for different 
    | actions such as creating, updating, deleting, and changing status.
    |
    */
    "created" => "با موفقیت ایجاد شد.", // Message for successful creation
    "updated" => "با موفقیت ویرایش شد.", // Message for successful update
    "deleted" => "با موفقیت حذف شد.", // Message for successful deletion
    "status"  => "با موفقیت وضعیت تغییر کرد .", // Message for successful status change

    /*
    |--------------------------------------------------------------------------
    | Cart Messages
    |--------------------------------------------------------------------------
    |
    | These messages are used for different actions related to the shopping cart.
    |
    */
    'cart' => [
        'add'              => "محصول با موفقیت به سبد خرید اضافه شد.", // Message for successfully adding a product to the cart
        'remove'           => "محصول با موفقیت از سبد خرید حذف شد.", // Message for successfully removing a product from the cart
        'allRemove'        => "همه سبد خرید با موفقیت پاک شد.", // Message for successfully clearing the entire cart
        'max_basket_limit' => "تعداد محصول شما نباید بیشتر از :max_basket_limit باشد.", // Message for exceeding the maximum basket limit
    ],

    /*
    |--------------------------------------------------------------------------
    | Address Messages
    |--------------------------------------------------------------------------
    |
    | These messages are used for address-related actions and validations.
    |
    */
    "address" => [
        "required" => "یک آدرس را انتخاب کنید.", // Message when an address is required
        "exists"   => "آدرس انتخاب شده معتبر نمی باشد" // Message when the selected address is invalid
    ],

    /*
    |--------------------------------------------------------------------------
    | Order Messages
    |--------------------------------------------------------------------------
    |
    | These messages are used for order-related actions and validations.
    |
    */
    'order' => [
        'quantity' => "متاسفانه کالای :title در حال حاظر موجود نمی باشد" // Message when the ordered item is not available
    ],

    /*
    |--------------------------------------------------------------------------
    | Captcha Messages
    |--------------------------------------------------------------------------
    |
    | These messages are used for captcha validation.
    |
    */
    'captcha' => [
        'error' => "کد امنیتی وارد شده اشتباه است." // Message for incorrect captcha
    ],

    /*
    |--------------------------------------------------------------------------
    | Payment Gateway Messages
    |--------------------------------------------------------------------------
    |
    | These messages are used for payment gateway-related actions and validations.
    |
    */
    'paymentGateway' => [
        'is_not_active' => 'در گاه پرداخت مورد نظر در دسترس نمی باشد یک درگاه پرداخت دیگر انتخاب کنید.', // Message when the selected payment gateway is not available
        'callback' => 'در پرداخت شما خطایی رخ داده است مبغل شما تا 72 ساعت آینده باز گردانده خواهد شد.',// Message when the selected payment gateway is not available
    ]

];