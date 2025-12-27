<?php

namespace App\Service\SMS;

interface SendMessageInterface {

    public function send(string $to, string $message, string $template): bool;
}