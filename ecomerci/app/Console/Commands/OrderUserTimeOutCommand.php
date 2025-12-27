<?php

namespace App\Console\Commands;

use App\Enums\OrderStateEnum;
use App\Models\Order;
use Illuminate\Console\Command;

class OrderUserTimeOutCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:order-user-time-out-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orders = Order::query()
        ->where('state_enum', OrderStateEnum::INITIALIZED)
        ->where('invoiced_at', '<=', now()->subHour()->toDateTimeString())->get();

        foreach ($orders as $order) {
            $order->update(['state_enum' => OrderStateEnum::USER_TIMEOUT]);
        }
    }
}
