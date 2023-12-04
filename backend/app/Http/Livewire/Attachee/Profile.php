<?php

namespace App\Http\Livewire\Attachee;

use App\Models\Applicant;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Profile extends Component
{
    public $first_name;
    public $second_name;
    public $national_id;
    public $email;
    public $institution;
    public $phone_number;
    public $user;
    public $applicant;

    public function mount()
    {
        $this->user = auth()->user();
        $this->applicant = $this->user->applicant;
        $this->national_id = $this->applicant->national_id;
        $this->first_name = $this->applicant->first_name;
        $this->second_name = $this->applicant->second_name;
        $this->institution = $this->applicant->institution;
        $this->phone_number = $this->applicant->phone_number;
        $this->email = $this->user->email;
    }
    public function render()
    {
        return view('livewire.attachee.profile');
    }

    public function updateProfile()
    {
        $validatedData = Validator::make(
            [
                'national_id' => $this->national_id,
                'first_name' => $this->first_name,
                'second_name' => $this->second_name,
                'phone_number' => $this->phone_number,
                'institution' => $this->institution,
                'email' => $this->email
            ],
            [
                'national_id' => [
                    'required',
                    'string',
                    Rule::unique('applicants')->ignore($this->applicant->id),
                ],
                'first_name' => 'required|string|min:2|max:255',
                'second_name' => 'required|string|min:2|max:255',
                'phone_number' => 'required|string|min:10|max:15',
                'institution' => 'required|string',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($this->user->id),
                ],
            ],
        )->validate();
        DB::beginTransaction();
        try {
            Applicant::find($this->applicant->id)->update([
                'national_id' => $this->national_id,
                'first_name' => $this->first_name,
                'second_name' => $this->second_name,
                'phone_number' => $this->phone_number,
                'institution' => $this->institution,
            ]);
            if ($this->email != $this->user->email) {
                $this->user->email = $this->email;
                $this->user->email_verified_at = null;
                $this->user->save();
        
            }
            DB::commit();
            return back()->with('message', 'Profile updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Sorry, something went wrong while updating your profile, please try again.');
        }
    }
}