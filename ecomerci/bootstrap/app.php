<?php

use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckCartLimit;
use App\Http\Middleware\CheckIfUserBlocked;
use App\Http\Middleware\CheckMaxBasketLimit;
use App\Http\Middleware\CheckMinCartPrice;
use App\Http\Middleware\CheckPaymentGateway;
use App\Http\Middleware\CheckPhoneVerified;
use App\Http\Middleware\CheckVoucher;
use App\Http\Middleware\ConvertPersianNumbers;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // web: __DIR__.'/../routes/web/front.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'auth.admin'            => AdminAuthenticate::class,
            'auth.customer'         => Authenticate::class,
            'phone.verified'        => CheckPhoneVerified::class,
            'max_basket_limit'      => CheckMaxBasketLimit::class,
            'cart_limit'            => CheckCartLimit::class,
            'active.paymentgateway' => CheckPaymentGateway::class,
            'voucher'               => CheckVoucher::class,
            'minCartPrice'          => CheckMinCartPrice::class
        ]);

        $middleware->web(append: [
            CheckIfUserBlocked::class,
            ConvertPersianNumbers::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
