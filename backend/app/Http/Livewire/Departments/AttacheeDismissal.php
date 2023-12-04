<?php

namespace App\Http\Livewire\Departments;

use App\Events\AttacheeDismissed;
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
                ->whereLike(['applicant.first_name', 'applicant.second_name', 'quarter', 'year', 'applicant.national_id', 'study_area',], $this->search ?? '')
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
        $attachee = Attachee::find($id);
        if ($this->termination_reason == 'completed') {
            $status = 'completed';
            $message = 'Congratulations ' . $attachee->applicant->first_name . ' for successfully completing your attachment/internship at JKUAT. It was our pleasure having you
            and we hope you had a good learning experience. We welcome you to fill the evaluation form accessible via the link provided below and give us your honest
            feedback useful at improving our engagements with future attachees and interns. You are required to fill and submit the form in order to be able to receive a recommendation letter.';
        } else {
            $status = 'terminated_before_completion';
            $message = 'Dear ' . $attachee->applicant->first_name . ' Your attachment/internship at JKUAT has been terminated prematurely. If neccessary, Please contact the department you were attached in for further information.';
        }
        try {
            Attachee::find($id)->update([
                'date_terminated' => \Carbon\Carbon::now(),
                'termination_reason' => $this->termination_reason,
                'status' => $status,
            ]);
            AttacheeDismissed::dispatch($attachee, $message, $this->termination_reason);
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