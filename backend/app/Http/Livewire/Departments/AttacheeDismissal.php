<?php

namespace App\Http\Livewire\Departments;

use App\Models\Application;
use App\Models\Attachee;
use App\Utilities\Utilities;
use Livewire\Component;

class AttacheeDismissal extends Component
{
    public $termination_reason;
    public $department;
    public $year;
    public $feedback;
    public $alert_class;
    public $feedback_header;
    public $confirmed_action;
    public $confirmed_action_parameter;

    public $search = '';

    public function mount()
    {
        $this->department = auth()->user()->departmentAdmin->department;
        $this->termination_reason = '';

    }

    protected $rules = [
        'termination_reason' => 'required|string',
    ];
    public function render()
    {
        $attachees = $this->department->attachees;
        if ($attachees->count()) {
            $attachees = Attachee::whereIn('id', $attachees->modelkeys())
                ->whereLike(['applicant.first_name', 'applicant.second_name', 'cohort', 'year', 'applicant.national_id', 'position',], $this->search ?? '')
                ->where('status', 'active')
                ->get();
        }
        return view('livewire.departments.attachee-dismissal', ['attachees' => $attachees]);
    }
    public function warn($id, $reason)
    {
        switch ($reason) {
            case 'completed':
                $this->termination_reason = 'completed';
                break;
            case 'other':
                $this->validate();
                break;
        }
        $this->feedback_header = 'Confirm Dismissal';
        $this->feedback = 'Are you sure you want to dismiss this attachee? This action is irreversible';
        $this->alert_class = 'alert-warning';
        $this->confirmed_action_parameter = $id;
        $this->dispatchBrowserEvent('action_confirm');
    }
    public function dismiss($id)
    {
        $this->validate();
        $status = $this->termination_reason === 'completed' ? 'completed' : 'terminated_before_completion';
        try {
            Attachee::find($id)->update([
                'date_terminated' => \Carbon\Carbon::now(),
                'termination_reason' => $this->termination_reason,
                'status' => $status,
            ]);
            $this->termination_reason = '';
        } catch (\Exception $e) {
            $this->feedback_header = 'Error dismissing attachee!!';
            $this->feedback = 'Something went wrong. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
        }

        $this->feedback_header = 'Success!!';
        $this->feedback = 'Attachee dismissed successfully';
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('action_feedback');
    }
}