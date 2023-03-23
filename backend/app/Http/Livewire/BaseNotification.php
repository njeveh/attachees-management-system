<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BaseNotification extends Component
{
    public $notification;

    public function mount($id)
    {
        $this->notification = auth()->user()->notifications->find($id);
        $this->notification->markAsRead();
    }
    public function render()
    {
        return view('livewire.base-notification');
    }
}