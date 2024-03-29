<?php

namespace App\Http\Livewire\Attachee;

use App\Models\Application;
use App\Models\ApplicationAccompaniment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class ViewApplication extends Component
{
    use WithFileUploads;

    public $feedback;
    public $alert_class;
    public $alert_type;
    public $feedback_header;
    public $confirmed_action;
    public $application_letter;
    public $attachment_letter;
    public $insurance_cover;
    public $national_id_front;
    public $national_id_back;
    public $advert;
    public $application;
    public $user;
    public $application_accompaniments;

    protected $listeners = ['cancelApplication' => 'cancelApplication',];

    protected $rules = [
        'application_letter' => 'file|mimes:pdf,jpg,jpeg,png',
        'attachment_letter' => 'file|mimes:pdf,jpg,jpeg,png',
        'insurance_cover' => 'file|mimes:pdf,jpg,jpeg,png',
        'national_id_front' => 'file|mimes:pdf,jpg,jpeg,png,',
        'national_id_back' => 'file|mimes:pdf,jpg,jpeg,png,',
    ];

    public function mount($id)
    {
        $this->application = Application::find($id);
        $this->application_accompaniments = $this->application->applicationAccompaniments;
    }
    public function render()
    {
        return view('livewire.attachee.view-application', ['application' => $this->application,], );
    }

    public function warn($action)
    {
        switch ($action) {
            case 'cancel':
                $this->feedback_header = 'Confirm Cancelation';
                $this->feedback = "Are you sure you want to cancel this application? By doing this you won't be considered for shortlisting.";
                $this->alert_class = 'alert-danger';
                $this->confirmed_action = 'cancelApplication';
                $this->alert_type = 'confirmation_prompt';
                $this->dispatchBrowserEvent('action_confirm');
                break;

            //more actions will be added here

        }
    }

    public function cancelApplication()
    {
        try {
            $this->application->status = 'canceled';
            $this->application->save();

            $this->feedback_header = 'Application Cancelation Successful';
            $this->feedback = "Your application has been successfully canceled. You won't be considered for short listing in the applied post.";
            $this->alert_class = 'alert-success';
            $this->dispatchBrowserEvent('action_feedback');
        } catch (\Exception $e) {
            $this->feedback_header = 'cancelation failed';
            $this->feedback = "Sorry, something went wrong. Please try again and if the error persists contact support team for assistance.";
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
        }
    }
    public function update($field)
    {

        switch ($field) {
            case 'application_letter':
                $to_be_updated = $this->application_letter;
                break;
            case 'attachment_letter':
                $to_be_updated = $this->attachment_letter;
                break;
            case 'insurance_cover':
                $to_be_updated = $this->insurance_cover;
                break;
            case 'national_id_front':
                $to_be_updated = $this->national_id_front;
                break;
            case 'national_id_back':
                $to_be_updated = $this->national_id_back;
                break;
        }
        $this->validateOnly($field);

        try {
            $to_be_updated->storePubliclyAs(
                preg_replace('/\s+/', '_', $this->application->advert->department->name) . '/' . 'application_docs/' .
                preg_replace('/\//', '_', $this->application->advert->year) . '/' . 'quarter_' . $this->application->quarter . '/' . preg_replace('/[\W\s\/]+/', '_', $this->application->advert->title) . '/' .
                auth()->user()->applicant->national_id,
                $field,
                'public'
            );
            $target = $this->application_accompaniments->where('name', $field)->first();
            $target->status = 'pending_review';
            $target->save();
        } catch (\Exception $e) {
            //Log::info($e);
            $this->feedback_header = 'Error Updating Document!!';
            $this->feedback = 'Something went wrong while updating the document. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
            return;
        }

        $this->feedback_header = 'success!!';
        $this->feedback = "Document has been updated successfully";
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('action_feedback');
    }
}