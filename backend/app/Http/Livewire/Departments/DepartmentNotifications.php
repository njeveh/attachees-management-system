<?php

namespace App\Http\Livewire\Departments;

use App\Http\Livewire\BaseNotifications;

class DepartmentNotifications extends BaseNotifications
{
    public $department;
    public function mount()
    {
        $this->department = auth()->user()->departmentAdmin->department;
        $this->action_buttons_class = "btns-hidden";
        $this->mark_as_read_button_class = "btns-hidden";
        $this->mark_as_unread_button_class = "btns-hidden";


    }
    public function render()
    {
        $this->notifications = $this->department->notifications;
        $this->read_notifications = $this->department->readNotifications;
        $this->unread_notifications = $this->department->unreadNotifications;
        return view('livewire.departments.department-notifications');
    }

    public function markAsRead()
    {
        $this->department->notifications()->whereIn('id', array_keys($this->select_notifications))->markAsRead();
        $this->select_notifications = null;
        $this->action_buttons_class = "btns-hidden";
        $this->mark_as_read_button_class = "btns-hidden";
        $this->mark_as_unread_button_class = "btns-hidden";
    }
    public function markAsUnRead()
    {
        $this->department->notifications()->whereIn('id', array_keys($this->select_notifications))->markAsUnRead();
        $this->select_notifications = null;
        $this->action_buttons_class = "btns-hidden";
        $this->mark_as_read_button_class = "btns-hidden";
        $this->mark_as_unread_button_class = "btns-hidden";
        $this->unmark_all_button_class = "btns-hidden";
        $this->mark_all_button_class = "btns-hidden";
    }

    public function delete()
    {
        $this->department->notifications()->whereIn('id', array_keys($this->select_notifications))->delete();

        $this->select_notifications = null;
        $this->action_buttons_class = "btns-hidden";
        $this->mark_as_read_button_class = "btns-hidden";
        $this->mark_as_unread_button_class = "btns-hidden";
        $this->unmark_all_button_class = "btns-hidden";
        $this->mark_all_button_class = "btns-hidden";


    }
}