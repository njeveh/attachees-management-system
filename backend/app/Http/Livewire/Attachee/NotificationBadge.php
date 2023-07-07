<?php

namespace App\Http\Livewire\Attachee;

use Livewire\Component;

class NotificationBadge extends Component
{
    public $unread_notifications_count;
    public function mount()
    {
        $this->unread_notifications_count = 0;
    }
    public function render()
    {
        $this->unread_notifications_count = auth()->user()->unreadNotifications->count();
        return view('livewire.attachee.notification-badge');
    }
}