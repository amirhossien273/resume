<?php

namespace Modules\Notification\App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->data['title'] ?? null,
            'message' => $this->data['message'] ?? null,
            'type' => $this->data['type'] ?? null,
            'url' => $this->data['url'] ?? null,
            'read_at' => $this->read_at,
            'created_at' => $this->created_at,
            'time' => $this->created_at->locale('fa')->diffForHumans(),
            'subject' => isset($notification->data['subject_id']) ? [
                'id' => $notification->data['subject_id'],
                'type' => $notification->data['subject_type'] ?? null,
            ] : null,
        ];
    }
}
