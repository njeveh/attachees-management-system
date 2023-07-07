<?php

namespace App\Http\Livewire\Departments;

use App\Models\Application;
use App\Models\Attachee;
use App\Utilities\Utilities;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
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
    public $next_quarter;

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
        $this->next_quarter = Utilities::get_next_quarter_data()['quarter'];
        $applications = $this->department->applications;
        if ($applications->count()) {
            $applications = Application::whereIn('id', $applications->modelkeys())
                ->whereLike(['applicant.first_name', 'applicant.second_name', 'advert.title', 'applicant.national_id', 'applicant.institution'], $this->search ?? '')
                ->where('quarter', $this->next_quarter)
                ->where('status', 'accepted')->get();
            if ($applications->count()) {
                $applications = $applications->filter(function ($application) {
                    return $application->applicationAccompaniments->doesntContain('status', '!==', 'accepted') &&
                        $application->applicationAccompaniments->contains('name', 'offer_acceptance_form')
                        && $application->applicant->engagement_level > 3 &&
                        !$application->attachee;
                });
            }
        }
        return view('livewire.departments.attachee-reporting', ['applications' => $applications]);
    }

    public function report($id)
    {
        $applicant = Application::find($id)->applicant;
        //acertain that this applicant is not currently attached somewhere else
        if (
            $applicant->attachees->where('status', 'active')->count()
        ) {
            $this->feedback_header = 'Error reporting attachee!!';
            $this->feedback = 'This applicant is already an active attachee in another position.';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
            return;
        }
        DB::beginTransaction();
        try {
            $application = Application::find($id);
            $position = $application->advert->title;
            Attachee::create([
                'applicant_id' => $applicant->id,
                'application_id' => $application->id,
                'department_id' => $this->department->id,
                'year' => $this->year,
                'cohort' => $this->quarter['quarter'],
                'position' => $position,
                'advert_id' => $application->advert->id,
                'date_started' => \Carbon\Carbon::now(),
                'status' => 'active',
            ]);
            Application::find($id)->applicant->update([
                'engagement_level' => 5,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
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