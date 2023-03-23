<?php

namespace App\Http\Livewire\Departments;


use App\Models\Application;
use App\Models\ApplicationAccompaniment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Http\Livewire\Departments\AdvertApplications;

class ViewApplicationDetails extends AdvertApplications
{

    public $feedback;
    public $alert_class;
    public $feedback_header;
    public $confirmed_action;
    public $advert;
    public $application;
    public $application_accompaniments;
    public $intended_status;
    public $intended_action;
    public $review_remarks;
    public $uploads_tab_class;
    public $biodata_tab_class;
    public $profile_tab_class;
    public $application_id;

    public function mount($id)
    {
        $this->application_id = $id;
        $this->uploads_tab_class = 'active bg-secondary text-light';
        $this->biodata_tab_class = 'text-dark';
        $this->profile_tab_class = 'text-dark';

    }
    public function render()
    {
        $this->application = Application::find($this->application_id);
        $this->application_accompaniments = $this->application->applicationAccompaniments;
        return view('livewire.departments.view-application-details', ['application' => $this->application,], );
    }

    public function setIntendedStatus($status, $action)
    {
        $this->intended_status = $status;
        $this->intended_action = $action;
    }

    public function act($field)
    {
        try {

            switch ($field) {
                case 'application_letter':
                    ApplicationAccompaniment::where('application_id', $this->application->id)
                        ->where('name', 'application_letter')->update([
                            'status' => $this->intended_status,
                            'review_remarks' => $this->review_remarks == '' ? 'no remarks' : $this->review_remarks,

                        ]);

                    break;
                case 'attachment_letter':
                    ApplicationAccompaniment::where('application_id', $this->application->id)
                        ->where('name', 'attachment_letter')->update([
                            'status' => $this->intended_status,
                            'review_remarks' => $this->review_remarks == '' ? 'no remarks' : $this->review_remarks,

                        ]);
                    break;
                case 'insurance_cover':
                    ApplicationAccompaniment::where('application_id', $this->application->id)
                        ->where('name', 'insurance_cover')->update([
                            'status' => $this->intended_status,
                            'review_remarks' => $this->review_remarks == '' ? 'no remarks' : $this->review_remarks,

                        ]);
                    break;
                case 'national_id_front':
                    ApplicationAccompaniment::where('application_id', $this->application->id)
                        ->where('name', 'national_id_front')->update([
                            'status' => $this->intended_status,
                            'review_remarks' => $this->review_remarks == '' ? 'no remarks' : $this->review_remarks,

                        ]);
                    break;
                case 'national_id_back':
                    ApplicationAccompaniment::where('application_id', $this->application->id)
                        ->where('name', 'national_id_back')->update([
                            'status' => $this->intended_status,
                            'review_remarks' => $this->review_remarks == '' ? 'no remarks' : $this->review_remarks,

                        ]);
                    break;
                case 'offer_acceptance_form':
                    ApplicationAccompaniment::where('application_id', $this->application->id)
                        ->where('name', 'offer_acceptance_form')->update([
                            'status' => $this->intended_status,
                            'review_remarks' => $this->review_remarks == '' ? 'no remarks' : $this->review_remarks,

                        ]);
                    if ($this->intended_status === 'accepted') {
                        $this->application->attachee->engagement_level = 4;
                        $this->application->attachee->save();
                    }
                    break;
            }

        } catch (\Exception $e) {
            //Log::info($e);
            $this->feedback_header = 'Error Performing action!!';
            $this->feedback = 'Something went wrong while performing the intended action. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
            return;
        }

        $this->feedback_header = 'success!!';
        $this->feedback = "Action done successfully";
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('action_feedback');
    }
}