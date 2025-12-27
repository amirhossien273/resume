<?php

namespace Modules\Notification\App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class SystemNotification extends Notification
{
    public function __construct(protected array $data) {}

    public function via($notifiable): array
    {
        return ['database']; // بعداً می‌توان mail, broadcast اضافه کرد
    }

//    public function toDatabase($notifiable): array
//    {
//        return [
//            'title' => $this->data['title'] ?? null,
//            'message' => $this->data['message'] ?? null,
//            'type' => $this->data['type'] ?? null,
//            'url' => $this->data['url'] ?? null,
//            'subject_type' => $this->data['subject_type'] ?? null,
//            'subject_id' => $this->data['subject_id'] ?? null,
//        ];
//    }
    public function toDatabase($notifiable): array
    {
        return $this->data;
    }
}
