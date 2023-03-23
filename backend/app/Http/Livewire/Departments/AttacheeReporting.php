<?php

namespace App\Http\Livewire\Departments;

use App\Models\Application;
use App\Utilities\Utilities;
use Livewire\Component;

class AttacheeReporting extends Component
{
    public $approved_applications;
    public $current_applications;
    public $department;
    public $quarter;
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

    }
    public function render()
    {
        $this->quarter = Utilities::get_current_quarter_data();
        if ($this->quarter['quarter'] < 3) {
            $this->year = date('Y') . '/' . date('Y') + 1;
        } else {
            $this->year = date('Y') - 1 . '/' . date('Y');
        }
        $applications = $this->department->applications;
        if ($applications->count()) {
            $applications = Application::whereIn('id', $applications->modelkeys())
                ->whereLike(['attachee.first_name', 'attachee.second_name', 'advert.title', 'attachee.national_id', 'attachee.institution'], $this->search ?? '')
                ->where('quarter', $this->quarter['quarter'] + 1)
                ->where('status', 'accepted')->get();
            if ($applications->count()) {
                $applications = $applications->filter(function ($application) {
                    return $application->applicationAccompaniments->doesntContain('status', '!==', 'accepted') &&
                        $application->applicationAccompaniments->contains('name', 'offer_acceptance_form')
                        && $application->attachee->engagement_level == 4;
                });
            }
        }
        return view('livewire.departments.attachee-reporting', ['applications' => $applications]);
    }

    public function report($id)
    {
        try {
            $position = Application::find($id)->advert->title;
            Application::find($id)->attachee->update([
                'date_started' => \Carbon\Carbon::now(),
                'engagement_level' => 5,
                'department_id' => $this->department->id,
                'year' => $this->year,
                'cohort' => $this->quarter['quarter'],
                'position' => $position,
            ]);
        } catch (\Exception $e) {
            $this->feedback_header = 'Error reporting attachee!!';
            $this->feedback = 'Something went wrong. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
        }

        $this->feedback_header = 'Success!!';
        $this->feedback = 'Attachee reported successfully';
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('action_feedback');
    }
}