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
    public $gender;
    public $level_of_study;
    public $course_of_study;
    public $year_of_study;
    public $address;
    public $phone_number;
    public $has_disability;
    public $disability;
    public $disability_input_collapse;
    public Collection $emergency_contacts;
    public Collection $education_levels;
    public Collection $areas_of_interest;
    public Collection $referees;
    public $applicant;
    public $application;
    public $biodata;
    // public $biodata_id;

    public function mount($id)
    {
        $this->fill([
            'emergency_contacts' => collect([]),
            'areas_of_interest' => collect([]),
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
            $this->gender = $this->biodata->gender;
            $this->course_of_study = $this->biodata->course_of_study;
            $this->level_of_study = $this->biodata->level_of_study;
            $this->year_of_study = $this->biodata->year_of_study;
        }

        $emergency_contacts = $this->applicant->applicantEmergencyContacts;
        $areas_of_interest = $this->applicant->applicantInterestArea;
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
        if (count($areas_of_interest)) {
            $areas_of_interest->map(function ($area_of_interest, $key) {
                $this->areas_of_interest->push(['area_of_interest' => $area_of_interest->area_of_interest, 'id' => $area_of_interest->id]);
            });
        } else {
            $this->areas_of_interest->push(['area_of_interest' => '', 'id' => null,]);
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