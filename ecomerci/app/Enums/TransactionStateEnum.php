<?php

namespace App\Enums;

enum TransactionStateEnum: string
{
     case TRANSACTION_INIT    = 'TRANSACTION_INIT';
     case TRANSACTION_SUCCEED = 'TRANSACTION_SUCCEED';
     case TRANSACTION_FAILED  = 'TRANSACTION_FAILED';
}
