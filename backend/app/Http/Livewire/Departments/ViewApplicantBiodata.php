<?php

namespace App\Http\Livewire\Departments;

use Livewire\Component;

use App\Models\Application;
use Illuminate\Support\Collection;

class ViewApplicantBiodata extends Component
{
    public $feedback;
    public $alert_class;
    public $feedback_header;
    public $date_of_birth;
    public $address;
    public $phone_number;
    public $has_disability;
    public $disability;
    public Collection $emergency_contacts;
    public $professional_summary;
    public Collection $education_levels;
    public Collection $skills;
    public Collection $referees;
    public $applicant;
    public $biodata;
    public $application;
    // public $biodata_id;

    public function mount($id)
    {
        $this->fill([
            'emergency_contacts' => collect([]),
            'education_levels' => collect([]),
            'skills' => collect([]),
            'referees' => collect([]),
        ]);
        $this->application = Application::find($id);
        $this->applicant = $this->application->applicant;
        if ($this->applicant->applicantBiodata) {
            $this->biodata = $this->applicant->applicantBiodata;
            $this->date_of_birth = $this->biodata->date_of_birth;
            $this->address = $this->biodata->address;
            $this->phone_number = $this->biodata->phone_number;
            $this->has_disability = !($this->biodata->disability == null);
            $this->disability = $this->biodata->disability;
            $this->professional_summary = $this->biodata->professional_summary;
        }

        $emergency_contacts = $this->applicant->applicantEmergencyContacts;
        $education_levels = $this->applicant->applicantEducationLevels;
        $skills = $this->applicant->applicantSkills;
        $referees = $this->applicant->applicantReferees;

        if (count($emergency_contacts)) {
            $emergency_contacts->map(function ($contact, $key) {
                $this->emergency_contacts->push([
                    'name' => $contact->name,
                    'relationship' => $contact->relationship,
                    'phone_number' => $contact->phone_number,
                    'id' => $contact->id
                ]);

            });
        } else {
            $this->emergency_contacts->push([
                'name' => '',
                'relationship' => '',
                'phone_number' => '',
                'id' => null,
            ]);
        }
        if (count($education_levels)) {
            $education_levels->map(function ($level, $key) {
                $this->education_levels->push([
                    'education_level' => $level->education_level,
                    'start_date' => $level->start_date,
                    'end_date' => $level->end_date,
                    'id' => $level->id
                ]);
            });
        } else {
            $this->education_levels->push([
                'education_level' => '',
                'start_date' => '',
                'end_date' => '',
                'id' => null,
            ]);
        }
        if (count($skills)) {
            $skills->map(function ($skill, $key) {
                $this->skills->push(['skill' => $skill->skill, 'id' => $skill->id]);
            });
        } else {
            $this->skills->push(['skill' => '', 'id' => null,]);
        }
        if (count($referees)) {
            $referees->map(function ($referee, $key) {
                $this->referees->push([
                    'name' => $referee->name,
                    'relationship' => $referee->relationship,
                    'phone_number' => $referee->phone_number,
                    'email' => $referee->email,
                    'institution' => $referee->institution,
                    'position' => $referee->position_in_the_institution,
                    'id' => $referee->id
                ]);
            });
        } else {
            $this->referees->push(
                [
                    'name' => '',
                    'relationship' => '',
                    'phone_number' => '',
                    'email' => '',
                    'institution' => '',
                    'position' => '',
                    'id' => null,
                ],
                [
                    'name' => '',
                    'relationship' => '',
                    'phone_number' => '',
                    'email' => '',
                    'institution' => '',
                    'position' => '',
                    'id' => null,
                ],
            );
        }
    }
    public function render()
    {
        return view('livewire.departments.view-applicant-biodata');
    }
}