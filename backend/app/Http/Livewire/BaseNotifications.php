<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;

class BaseNotifications extends Component
{

    public $message;
    public Collection $notifications;

    public $select_notifications;

    public $action_buttons_class;
    public $mark_as_read_button_class;
    public $mark_as_unread_button_class;
    public $mark_all_button_class;
    public $unmark_all_button_class;
    public Collection $read_notifications;
    public Collection $unread_notifications;
    public function mount()
    {
        $this->action_buttons_class = "btns-hidden";
        $this->mark_as_read_button_class = "btns-hidden";
        $this->mark_as_unread_button_class = "btns-hidden";

    }

    // public function render()
    // {
    //     $user = auth()->user();
    //     $this->notifications = $user->notifications;
    //     $this->read_notifications = $user->readNotifications;
    //     $this->unread_notifications = $user->unreadNotifications;
    //     return view('livewire.attachee.notifications');
    // }

    public function render()
    {
        return view('livewire.base-notifications');
    }


    /**
     * function is called after the selected notifications are updated to determin which buttons to show and which not to
     */
    public function updatedSelectNotifications()
    {

        if (!is_array($this->select_notifications)) {
            $this->action_buttons_class = "btns-hidden";
            $this->mark_as_read_button_class = "btns-hidden";
            $this->mark_as_unread_button_class = "btns-hidden";
            $this->mark_all_button_class = "btns-hidden";
            $this->unmark_all_button_class = "btns-hidden";
            return;
        } elseif (array_search(true, $this->select_notifications)) {
            $this->select_notifications = array_filter($this->select_notifications, function ($select_notification) {
                return $select_notification != false;
            });
            $this->mark_as_unread_button_class = "btn btn-primary m-2";
            $this->mark_as_read_button_class = "btn btn-primary m-2";
            $this->mark_all_button_class = "btn btn-info m-2";
            $this->unmark_all_button_class = "btn btn-info m-2";
            if (array_diff($this->notifications->modelkeys(), array_keys($this->select_notifications))) {
                $this->mark_all_button_class = "btn btn-info m-2";
            } else {
                $this->mark_all_button_class = "btns-hidden";
            }
            if (array_intersect(array_keys($this->select_notifications), $this->read_notifications->modelkeys())) {
                $this->mark_as_read_button_class = "btns-hidden";
            }
            if (array_intersect(array_keys($this->select_notifications), $this->unread_notifications->modelkeys())) {
                $this->mark_as_unread_button_class = "btns-hidden";

            }
            $this->action_buttons_class = "d-flex justify-content-end align-content-center sticky-btns notifications-action-btns";
            return;
        } else {
            $this->action_buttons_class = "btns-hidden";
            $this->mark_as_read_button_class = "btns-hidden";
            $this->mark_as_unread_button_class = "btns-hidden";
        }
    }
    /**
     * function is called to mark all notifications
     */
    public function markAll()
    {
        $this->notifications->map(function ($notification, $key) {
            $this->select_notifications[$notification->id] = $notification->id;
        });
        $this->mark_as_read_button_class = "btns-hidden";
        $this->mark_as_unread_button_class = "btns-hidden";
        $this->mark_all_button_class = "btns-hidden";
        $this->unmark_all_button_class = "btn btn-info m-2";
        if (!$this->read_notifications->count()) {
            $this->mark_as_read_button_class = "btn btn-primary m-2";
        } elseif (!$this->unread_notifications->count()) {
            $this->mark_as_unread_button_class = "btn btn-primary m-2";

        }
    }
    /**
     * function is called to unselect all notifications
     */
    public function unMarkAll()
    {
        $this->select_notifications = null;
        $this->mark_as_read_button_class = "btns-hidden";
        $this->mark_as_unread_button_class = "btns-hidden";
        $this->unmark_all_button_class = "btns-hidden";
        $this->mark_all_button_class = "btns-hidden";
        $this->action_buttons_class = "btns-hidden";
    }
    public function markAsRead()
    {
        auth()->user()->notifications->whereIn('id', array_keys($this->select_notifications))->markAsRead();
        $this->select_notifications = null;
        $this->action_buttons_class = "btns-hidden";
        $this->mark_as_read_button_class = "btns-hidden";
        $this->mark_as_unread_button_class = "btns-hidden";
    }
    public function markAsUnRead()
    {
        auth()->user()->notifications->whereIn('id', array_keys($this->select_notifications))->markAsUnRead();
        $this->select_notifications = null;
        $this->action_buttons_class = "btns-hidden";
        $this->mark_as_read_button_class = "btns-hidden";
        $this->mark_as_unread_button_class = "btns-hidden";
        $this->unmark_all_button_class = "btns-hidden";
        $this->mark_all_button_class = "btns-hidden";
    }

    public function delete()
    {
        $user = auth()->user();
        $user->notifications()->whereIn('id', array_keys($this->select_notifications))->delete();

        $this->select_notifications = null;
        $this->action_buttons_class = "btns-hidden";
        $this->mark_as_read_button_class = "btns-hidden";
        $this->mark_as_unread_button_class = "btns-hidden";
        $this->unmark_all_button_class = "btns-hidden";
        $this->mark_all_button_class = "btns-hidden";


    }

}