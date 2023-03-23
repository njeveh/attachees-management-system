<?php

namespace App\Http\Livewire\Departments;

use App\Http\Livewire\BaseNotification;
use Livewire\Component;

class DepartmentNotificationView extends BaseNotification
{
    public function mount($id)
    {
        $this->notification = auth()->user()->departmentAdmin->department->notifications->find($id);
        $this->notification->markAsRead();
    }
    public function render()
    {
        return view('livewire.departments.department-notification-view');
    }
}