<?php

namespace Modules\Notification\App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Model;

class NotificationRequested
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public Model $subject,
        public int $userId,
        public array $payload
    ) {}
}
