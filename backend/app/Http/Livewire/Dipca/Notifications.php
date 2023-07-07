<?php

namespace App\Http\Livewire\Dipca;

use App\Http\Livewire\BaseNotifications;

class Notifications extends BaseNotifications
{
    public function mount()
    {
        $this->action_buttons_class = "btns-hidden";
        $this->mark_as_read_button_class = "btns-hidden";
        $this->mark_as_unread_button_class = "btns-hidden";


    }
    public function render()
    {
        $user = auth()->user();
        $this->notifications = $user->notifications;
        $this->read_notifications = $user->readNotifications;
        $this->unread_notifications = $user->unreadNotifications;
        return view('livewire.dipca.notifications');
    }
}