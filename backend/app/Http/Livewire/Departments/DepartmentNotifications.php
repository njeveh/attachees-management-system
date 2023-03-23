<?php

namespace App\Http\Livewire\Departments;

use Livewire\Component;
use App\Http\Livewire\BaseNotifications;

class DepartmentNotifications extends BaseNotifications
{
    public function render()
    {
        $department = auth()->user()->departmentAdmin->department;
        $this->notifications = $department->notifications;
        $this->read_notifications = $department->readNotifications;
        $this->unread_notifications = $department->unreadNotifications;
        return view('livewire.departments.department-notifications');
    }
}