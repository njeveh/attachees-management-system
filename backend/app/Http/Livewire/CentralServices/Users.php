<?php

namespace App\Http\Livewire\CentralServices;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $status_filter;
    public $search = '';
    public $feedback;
    public $alert_class;
    public $feedback_header;
    public $confirmed_action;
    public $confirmed_action_parameter;


    protected $listeners = [
        'deleteAccount' => 'deleteAccount',
    ];

    public function mount()
    {
        $this->status_filter = '';
    }
    public function render()
    {
        //
    }


    public function warn($action, $id)
    {
        switch ($action) {
            case 'delete':
                $this->feedback_header = 'Confirm Deletion';
                $this->feedback = 'Are you sure you want to delete this user account? This action is irrevasible.';
                $this->alert_class = 'alert-danger';
                $this->confirmed_action = 'deleteAccount';
                $this->confirmed_action_parameter = $id;
                $this->dispatchBrowserEvent('action_confirm');
                break;

        }
    }


    public function toggleAccountActivation($id)
    {
        try {
            $user = User::find($id);
            if ($user->is_active) {
                $user->update(
                    [
                        'is_active' => 0,
                    ]
                );
                $this->feedback_header = 'Success!!';
                $this->feedback = 'User account deactivated successfully.';
                $this->alert_class = 'alert-success';
                $this->dispatchBrowserEvent('action_feedback');
            } else {
                $user->update(
                    [
                        'is_active' => 1,
                    ]
                );
                $this->feedback_header = 'Success!!';
                $this->feedback = 'User account activated successfully.';
                $this->alert_class = 'alert-success';
                $this->dispatchBrowserEvent('action_feedback');
            }
        } catch (\Exception $e) {
            $this->feedback_header = 'Error performing requested action!!';
            $this->feedback = 'Something went wrong. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
        }

    }

    public function deleteAccount($id)
    {
        try {
            User::where('id', $id)->delete();
        } catch (\Exception $e) {
            $this->feedback_header = 'Error performing requested action!!';
            $this->feedback = 'Something went wrong. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
        }

        $this->feedback_header = 'Success!!';
        $this->feedback = 'Account deleted successfully';
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('action_feedback');

    }

}