<?php

namespace App\Service\SMS;

class SendMessageService {

    public static function create(SendMessageInterface $sendMessageService)
    {
        return $sendMessageService;
    }
}