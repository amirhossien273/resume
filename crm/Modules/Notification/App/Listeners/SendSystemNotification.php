<?php

namespace Modules\Notification\App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Modules\Notification\App\Events\NotificationRequested;
use Modules\Notification\App\Notifications\SystemNotification;
use Modules\Auth\App\Models\User;

class SendSystemNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(NotificationRequested $event): void
    {
        $user = User::find($event->userId);
        if (!$user) return;

        $user->notify(new SystemNotification([
            ...$event->payload,
            'subject_type' => get_class($event->subject),
            'subject_id' => $event->subject->getKey(),
        ]));
    }
}
