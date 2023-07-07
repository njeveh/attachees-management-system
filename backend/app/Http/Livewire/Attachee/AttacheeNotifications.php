<?php

namespace App\Http\Livewire\Attachee;

use App\Http\Livewire\BaseNotifications;
use Livewire\Component;

class AttacheeNotifications extends BaseNotifications
{
    public function render()
    {
        $user = auth()->user();
        $this->notifications = $user->notifications;
        $this->read_notifications = $user->readNotifications;
        $this->unread_notifications = $user->unreadNotifications;
        return view('livewire.attachee.attachee-notifications');
    }
}