<?php

namespace App\Http\Livewire\Attachee;

use Livewire\Component;
use App\Http\Livewire\BaseNotification;


class AttacheeNotificationView extends BaseNotification
{
    public function render()
    {
        return view('livewire.attachee.attachee-notification-view');
    }
}