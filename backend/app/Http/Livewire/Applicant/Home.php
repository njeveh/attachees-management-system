<?php

namespace App\Http\Livewire\Applicant;

use Livewire\Component;

class Home extends Component
{
    public $applicant;
    public $applications;
    public $pending_applications;
    public $approved_applications;
    public $rejected_applications;
    public $cancelled_applications;
    public $revoked_applications;

    public function mount()
    {
        $user = auth()->user();
        $this->applicant = $user->applicant;
        $this->applications = $this->applicant->applications->count();
        $this->pending_applications = $this->applicant->applications->where('status', 'pending')->count();
        $this->approved_applications = $this->applicant->applications->where('status', 'accepted')->count();
        $this->rejected_applications = $this->applicant->applications->where('status', 'rejected')->count();
        $this->cancelled_applications = $this->applicant->applications->where('status', 'cancelled')->count();
        $this->revoked_applications = $this->applicant->applications->where('status', 'revoked')->count();

    //     $this->national_id = $this->applicant->national_id;
    //     $this->first_name = $this->applicant->first_name;
    //     $this->second_name = $this->applicant->second_name;
    //     $this->institution = $this->applicant->institution;
    //     $this->phone_number = $this->applicant->phone_number;
    //     $this->email = $this->user->email;
    }

    public function render()
    {
        return view('livewire.applicant.home');
    }
}
