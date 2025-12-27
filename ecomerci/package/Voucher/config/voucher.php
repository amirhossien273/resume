<?php

use App\Models\Order;
use App\Models\User;

return [
    'code_length' => 10,

    'usage_table' => 'users',
    'usage_model' => User::class,

    'order_table' => 'orders',
    'order_model' => Order::class
];