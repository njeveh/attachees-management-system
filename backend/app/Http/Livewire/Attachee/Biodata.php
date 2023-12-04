<?php

namespace App\Http\Livewire\Attachee;

use App\Models\ApplicantBiodata;
use App\Models\ApplicantEducationLevel;
use App\Models\ApplicantEmergencyContact;
use App\Models\ApplicantInterestArea;
use App\Models\ApplicantReferee;
use App\Models\ApplicantSkill;
use Exception;
use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Biodata extends Component
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
    public $biodata;
    // public $biodata_id;

    protected $rules = [
        'date_of_birth' => 'required|date',
        'address' => 'required|string',
        'phone_number' => 'required|string',
        'gender' => 'required',
        'level_of_study' => 'required|string',
        'course_of_study' => 'required|string',
        'year_of_study' => 'required|integer',
        'has_disability' => 'required|boolean',
        'disability' => 'required_if:has_disability,true|exclude_if:has_disability,false',
        'emergency_contacts.*.name' => 'required|string',
        'emergency_contacts.*.relationship' => 'required|string',
        'emergency_contacts.*.phone_number' => 'required|string',
        'education_levels.*.education_level' => 'required|string',
        'education_levels.*.start_date' => 'required|date',
        'education_levels.*.end_date' => 'required|date',
        'areas_of_interest.*.area_of_interest' => 'string',
        'referees.*.name' => 'required|string|min:3',
        'referees.*.relationship' => 'required|string',
        'referees.*.phone_number' => 'required|string',
        'referees.*.email' => 'required|email',
        'referees.*.institution' => 'required|string',
        'referees.*.position' => 'required|string',
    ];
    protected $validationAttributes = [
        'emergency_contacts.*.name' => 'emergency contact name',
        'emergency_contacts.*.relationship' => 'emergency contact relationship',
        'emergency_contacts.*.phone_number' => 'emergency contact phone number',
        'areas_of_interest.*.area_of_interest' => 'area of interest',
        'referees.*.name' => 'referee name',
        'referees.*.relationship' => 'referee relationship',
        'referees.*.phone_number' => 'referee phone number',
        'referees.*.email' => 'referee email',
        'referees.*.institution' => 'referee institution',
        'referees.*.position' => 'referee position',
    ];
    public function mount()
    {
        $this->fill([
            'emergency_contacts' => collect([]),
            'areas_of_interest' => collect([]),
            'referees' => collect([]),
        ]);
        $this->applicant = auth()->user()->applicant;
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
        $this->updatedhasDisability();
    }
    public function render()
    {
        return view('livewire.attachee.biodata');
    }

    public function updatedhasDisability()
    {
        switch ($this->has_disability) {
            case 0:
                $this->disability_input_collapse = 'collapse';
                //$this->disability = '';
                break;
            case 1:
                $this->disability_input_collapse = '';
                break;
        }
    }
    public function addInput($field)
    {
        switch ($field) {
            case 'emergency_contact':
                $this->emergency_contacts->push([
                    'name' => '',
                    'relationship' => '',
                    'phone_number' => '',
                    'id' => null,
                ]);
                break;
            case 'area_of_interest':
                $this->areas_of_interest->push(['area_of_interest' => '', 'id' => null,]);
                break;
            case 'referee':
                $this->referees->push([
                    'name' => '',
                    'relationship' => '',
                    'phone_number' => '',
                    'email' => '',
                    'institution' => '',
                    'position' => '',
                    'id' => null,
                ]);
                break;

        }
    }
    public function removeInput($key, $field)
    {

        switch ($field) {
            case 'emergency_contact':
                if (!is_null($this->emergency_contacts[$key]['id'])) {
                    if (ApplicantEmergencyContact::destroy($this->emergency_contacts[$key]['id'])) {
                        $this->emergency_contacts->pull($key);
                    } else {
                        $this->feedback_header = 'Error deleting field!!';
                        $this->feedback = 'Something went wrong. The emergency contact could not be deleted from the database';
                        $this->alert_class = 'alert-danger';
                        $this->dispatchBrowserEvent('biodata_action_feedback');
                    }
                } else {
                    $this->emergency_contacts->pull($key);
                }
                break;
            case 'area_of_interest':
                if (!is_null($this->areas_of_interest[$key]['id'])) {
                    if (ApplicantInterestArea::destroy($this->areas_of_interest[$key]['id'])) {
                        $this->areas_of_interest->pull($key);
                    } else {
                        $this->feedback_header = 'Error deleting field!!';
                        $this->feedback = 'Something went wrong. The area of interest could not be deleted from the database';
                        $this->alert_class = 'alert-danger';
                        $this->dispatchBrowserEvent('biodata_action_feedback');
                    }
                } else {
                    $this->areas_of_interest->pull($key);
                }
                break;

            case 'referee':
                if (!is_null($this->referees[$key]['id'])) {
                    if (ApplicantReferee::destroy($this->referees[$key]['id'])) {
                        $this->referees->pull($key);
                    } else {
                        $this->feedback_header = 'Error deleting field!!';
                        $this->feedback = 'Something went wrong. The referee could not be deleted from the database';
                        $this->alert_class = 'alert-danger';
                        $this->dispatchBrowserEvent('biodata_action_feedback');
                    }
                } else {
                    $this->referees->pull($key);
                }
                break;

        }
    }

    public function createUpdateBiodata()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            if ($this->biodata) {
                ApplicantBiodata::where('id', $this->biodata->id)
                    ->update([
                        'date_of_birth' => $this->date_of_birth,
                        'address' => $this->address,
                        'phone_number' => $this->phone_number,
                        'disability' => $this->disability,
                        'gender' => $this->gender,
                        'level_of_study' => $this->level_of_study,
                        'course_of_study' => $this->course_of_study,
                        'year_of_study' => $this->year_of_study,
                    ]);
            } else {
                $this->biodata = ApplicantBiodata::create([
                    'applicant_id' => $this->applicant->id,
                    'date_of_birth' => $this->date_of_birth,
                    'address' => $this->address,
                    'phone_number' => $this->phone_number,
                    'disability' => $this->disability,
                    'gender' => $this->gender,
                    'level_of_study' => $this->level_of_study,
                    'course_of_study' => $this->course_of_study,
                    'year_of_study' => $this->year_of_study,
                ]);
            }
            if (count($this->emergency_contacts)) {
                $this->emergency_contacts->map(function ($contact, $key) {
                    if (!is_null($this->emergency_contacts[$key]['id'])) {
                        ApplicantEmergencyContact::where('id', $this->emergency_contacts[$key]['id'])->update([
                            'name' => $this->emergency_contacts[$key]['name'],
                            'relationship' => $this->emergency_contacts[$key]['relationship'],
                            'phone_number' => $this->emergency_contacts[$key]['phone_number'],
                        ]);
                    } else {
                        ApplicantEmergencyContact::create([
                            'applicant_id' => $this->applicant->id,
                            'name' => $this->emergency_contacts[$key]['name'],
                            'relationship' => $this->emergency_contacts[$key]['relationship'],
                            'phone_number' => $this->emergency_contacts[$key]['phone_number'],
                        ]);
                    }
                });
            }
            if (count($this->areas_of_interest)) {
                $this->areas_of_interest->map(function ($area_of_interest, $key) {
                    if (!is_null($this->areas_of_interest[$key]['id'])) {
                        ApplicantInterestArea::where('id', $this->areas_of_interest[$key]['id'])->update([
                            'area_of_interest' => $this->areas_of_interest[$key]['area_of_interest'],
                        ]);
                    } else {
                        ApplicantInterestArea::create([
                            'applicant_id' => $this->applicant->id,
                            'area_of_interest' => $this->areas_of_interest[$key]['area_of_interest'],
                        ]);
                    }
                });
            }

            if (count($this->referees)) {
                $this->referees->map(function ($referee, $key) {
                    if (!is_null($this->referees[$key]['id'])) {
                        ApplicantReferee::where('id', $this->referees[$key]['id'])->update([
                            'name' => $this->referees[$key]['name'],
                            'relationship' => $this->referees[$key]['relationship'],
                            'phone_number' => $this->referees[$key]['phone_number'],
                            'email' => $this->referees[$key]['email'],
                            'institution' => $this->referees[$key]['institution'],
                            'position_in_the_institution' => $this->referees[$key]['position'],
                        ]);
                    } else {
                        ApplicantReferee::create([
                            'applicant_id' => $this->applicant->id,
                            'name' => $this->referees[$key]['name'],
                            'relationship' => $this->referees[$key]['relationship'],
                            'phone_number' => $this->referees[$key]['phone_number'],
                            'email' => $this->referees[$key]['email'],
                            'institution' => $this->referees[$key]['institution'],
                            'position_in_the_institution' => $this->referees[$key]['position'],
                        ]);
                    }
                });
            }

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            $this->feedback_header = 'Error editing biodata!!';
            $this->feedback = 'Something went wrong while editing the biodata. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('biodata_action_feedback');
        }
        $this->feedback_header = 'Success!!';
        $this->feedback = 'Biodata updated successfully';
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('biodata_action_feedback');
        // return redirect()->route('applicant.biodata');
    }
}