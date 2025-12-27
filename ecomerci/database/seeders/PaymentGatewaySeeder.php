<?php

namespace Database\Seeders;

use App\Models\PaymentGateway;
use Illuminate\Database\Seeder;


class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentGateway::query()->create([
            "avatar"  => "/assets/front/imgs/theme/behpardakht_logo.svg",
            "name"    => "زرین پال",
            "type"    => "zarinpal",
            "service" => "App\Service\Transaction\Payment\zarinpal\PaymentWithZarinpal"
        ]);
    }
}
