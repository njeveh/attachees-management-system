<?php

namespace App\Http\Livewire\Departments;

use App\Models\Applicant;
use Livewire\Component;

class ApplicantProfileView extends Component
{
    public $first_name;
    public $second_name;
    public $national_id;
    public $email;
    public $institution;
    public $phone_number;
    public $user;
    public $applicant;

    public function mount($id)
    {
        $this->applicant = Applicant::find($id);
        $this->national_id = $this->applicant->national_id;
        $this->first_name = $this->applicant->first_name;
        $this->second_name = $this->applicant->second_name;
        $this->institution = $this->applicant->institution;
        $this->phone_number = $this->applicant->phone_number;
        $this->email = $this->user->email;
    }
    public function render()
    {
        return view('livewire.departments.applicant-profile-view');
    }
}