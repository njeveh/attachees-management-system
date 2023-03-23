<?php

namespace App\Http\Livewire\Attachee;

use App\Models\AttacheeBiodata;
use App\Models\AdvertAccompaniment;
use App\Models\AttacheeEducationLevel;
use App\Models\AttacheeEmergencyContact;
use App\Models\AttacheeReferee;
use App\Models\AttacheeSkill;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class Biodata extends Component
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
    public $attachee;
    public $biodata;
    // public $biodata_id;

    protected $rules = [
        'date_of_birth' => 'required|date',
        'address' => 'required|string',
        'phone_number' => 'required|string',
        'has_disability' => 'required|boolean',
        'disability' => 'required_if:has_disability,true',
        'emergency_contacts.*.name' => 'required|string',
        'emergency_contacts.*.relationship' => 'required|string',
        'emergency_contacts.*.phone_number' => 'required|string',
        'professional_summary' => 'string',
        'education_levels.*.education_level' => 'required|string',
        'education_levels.*.start_date' => 'required|date',
        'education_levels.*.end_date' => 'required|date',
        'skills.*.skill' => 'required|string',
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
        'education_levels.*.education_level' => 'education level',
        'education_levels.*.start_date' => 'education level start date',
        'education_levels.*.end_date' => 'education level end date',
        'skills.*.skill' => 'skill',
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
            'education_levels' => collect([]),
            'skills' => collect([]),
            'referees' => collect([]),
        ]);
        $this->attachee = auth()->user()->attachee;
        if ($this->attachee->attacheeBiodata) {
            $this->biodata = $this->attachee->attacheeBiodata;
            $this->date_of_birth = $this->biodata->date_of_birth;
            $this->address = $this->biodata->address;
            $this->phone_number = $this->biodata->phone_number;
            $this->has_disability = !($this->biodata->disability == null);
            $this->disability = $this->biodata->disability;
            $this->professional_summary = $this->biodata->professional_summary;
        }

        $emergency_contacts = $this->attachee->attacheeEmergencyContacts;
        $education_levels = $this->attachee->attacheeEducationLevels;
        $skills = $this->attachee->attacheeSkills;
        $referees = $this->attachee->attacheeReferees;

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
            case 'education_level':
                $this->education_levels->push([
                    'education_level' => '',
                    'start_date' => '',
                    'end_date' => '',
                    'id' => null,
                ]);
                break;
            case 'skill':
                $this->skills->push(['skill' => '', 'id' => null,]);
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
                    if (AttacheeEmergencyContact::destroy($this->emergency_contacts[$key]['id'])) {
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
            case 'education_level':
                if (!is_null($this->education_levels[$key]['id'])) {
                    if (AttacheeEducationLevel::destroy($this->education_levels[$key]['id'])) {
                        $this->education_levels->pull($key);
                    } else {
                        $this->feedback_header = 'Error deleting field!!';
                        $this->feedback = 'Something went wrong. The education level could not be deleted from the database';
                        $this->alert_class = 'alert-danger';
                        $this->dispatchBrowserEvent('biodata_action_feedback');
                    }
                } else {
                    $this->education_levels->pull($key);
                }
                break;
            case 'skill':
                if (!is_null($this->skills[$key]['id'])) {
                    if (AttacheeSkill::destroy($this->skills[$key]['id'])) {
                        $this->skills->pull($key);
                    } else {
                        $this->feedback_header = 'Error deleting field!!';
                        $this->feedback = 'Something went wrong. The skill could not be deleted from the database';
                        $this->alert_class = 'alert-danger';
                        $this->dispatchBrowserEvent('biodata_action_feedback');
                    }
                } else {
                    $this->skills->pull($key);
                }
                break;

            case 'referee':
                if (!is_null($this->referees[$key]['id'])) {
                    if (AttacheeReferee::destroy($this->referees[$key]['id'])) {
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
    public function render()
    {
        return view('livewire.attachee.biodata');
    }

    public function createUpdateBiodata()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            if ($this->biodata) {
                AttacheeBiodata::where('id', $this->biodata->id)
                    ->update([
                        'date_of_birth' => $this->date_of_birth,
                        'address' => $this->address,
                        'phone_number' => $this->phone_number,
                        'disability' => $this->disability,
                        'professional_summary' => $this->professional_summary,
                    ]);
            } else {
                $this->biodata = AttacheeBiodata::create([
                    'attachee_id' => $this->attachee->id,
                    'date_of_birth' => $this->date_of_birth,
                    'address' => $this->address,
                    'phone_number' => $this->phone_number,
                    'disability' => $this->disability,
                    'professional_summary' => $this->professional_summary,
                ]);
            }
            if (count($this->emergency_contacts)) {
                $this->emergency_contacts->map(function ($contact, $key) {
                    if (!is_null($this->emergency_contacts[$key]['id'])) {
                        Log::info('updating contact');
                        AttacheeEmergencyContact::where('id', $this->emergency_contacts[$key]['id'])->update([
                            'name' => $this->emergency_contacts[$key]['name'],
                            'relationship' => $this->emergency_contacts[$key]['relationship'],
                            'phone_number' => $this->emergency_contacts[$key]['phone_number'],
                        ]);
                    } else {
                        AttacheeEmergencyContact::create([
                            'attachee_id' => $this->attachee->id,
                            'name' => $this->emergency_contacts[$key]['name'],
                            'relationship' => $this->emergency_contacts[$key]['relationship'],
                            'phone_number' => $this->emergency_contacts[$key]['phone_number'],
                        ]);
                    }
                });
            }
            if (count($this->education_levels)) {
                $this->education_levels->map(function ($level, $key) {
                    if (!is_null($this->education_levels[$key]['id'])) {
                        AttacheeEducationLevel::where('id', $this->education_levels[$key]['id'])->update([
                            'education_level' => $this->education_levels[$key]['education_level'],
                            'start_date' => $this->education_levels[$key]['start_date'],
                            'end_date' => $this->education_levels[$key]['end_date'],
                        ]);
                    } else {
                        AttacheeEducationLevel::create([
                            'attachee_id' => $this->attachee->id,
                            'education_level' => $this->education_levels[$key]['education_level'],
                            'start_date' => $this->education_levels[$key]['start_date'],
                            'end_date' => $this->education_levels[$key]['end_date'],
                        ]);
                    }
                });
            }
            if (count($this->skills)) {
                $this->skills->map(function ($skill, $key) {
                    if (!is_null($this->skills[$key]['id'])) {
                        AttacheeSkill::where('id', $this->skills[$key]['id'])->update([
                            'skill' => $this->skills[$key]['skill'],
                        ]);
                    } else {
                        AttacheeSkill::create([
                            'attachee_id' => $this->attachee->id,
                            'skill' => $this->skills[$key]['skill'],
                        ]);
                    }
                });
            }

            if (count($this->referees)) {
                $this->referees->map(function ($referee, $key) {
                    if (!is_null($this->referees[$key]['id'])) {
                        AttacheeReferee::where('id', $this->referees[$key]['id'])->update([
                            'name' => $this->referees[$key]['name'],
                            'relationship' => $this->referees[$key]['relationship'],
                            'phone_number' => $this->referees[$key]['phone_number'],
                            'email' => $this->referees[$key]['email'],
                            'institution' => $this->referees[$key]['institution'],
                            'position_in_the_institution' => $this->referees[$key]['position'],
                        ]);
                    } else {
                        AttacheeReferee::create([
                            'attachee_id' => $this->attachee->id,
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

        } catch (\Exception $e) {
            $this->feedback_header = 'Error editing biodata!!';
            $this->feedback = 'Something went wrong while editing the biodata. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('biodata_action_feedback');
        }
        $this->feedback_header = 'Success!!';
        $this->feedback = 'Biodata updated successfully';
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('biodata_action_feedback');
        // return redirect()->route('attachee.biodata');
    }
}