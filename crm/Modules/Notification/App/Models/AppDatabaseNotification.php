<?php

namespace Modules\Notification\App\Models;

use Illuminate\Notifications\DatabaseNotification as BaseDatabaseNotification;

class AppDatabaseNotification extends BaseDatabaseNotification
{
    /**
     * دسترسی به مدل اصلی که باعث notification شده
     */
    public function subject()
    {
        if (!isset($this->data['subject_type'], $this->data['subject_id'])) {
            return null;
        }

        $class = $this->data['subject_type'];
        return $class::find($this->data['subject_id']);
    }
}
