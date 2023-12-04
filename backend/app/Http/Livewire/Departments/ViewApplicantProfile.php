<?php

namespace App\Http\Livewire\Departments;

use App\Models\Applicant;
use App\Models\Application;
use Livewire\Component;

class ViewApplicantProfile extends Component
{
    public $first_name;
    public $second_name;
    public $national_id;
    public $email;
    public $institution;
    public $phone_number;
    public $applicant;
    public $application;

    public function mount($id)
    {
        $this->application = Application::find($id);
        $this->applicant = $this->application->applicant;
        $this->national_id = $this->applicant->national_id;
        $this->first_name = $this->applicant->first_name;
        $this->second_name = $this->applicant->second_name;
        $this->institution = $this->applicant->institution;
        $this->phone_number = $this->applicant->phone_number;
        $this->email = $this->applicant->user->email;
    }
    public function render()
    {
        return view('livewire.departments.view-applicant-profile');
    }
}
