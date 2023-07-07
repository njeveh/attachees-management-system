<?php

namespace App\Http\Livewire\CentralServices;

use App\Models\Department;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class DepartmentView extends Component
{
    public $department;
    public $feedback_header;
    public $feedback;
    public $alert_class;

    public $department_name, $department_description, $department_head, $department_email, $department_phone;

    public function mount($id)
    {
        $this->department = Department::find($id);
        $this->department_name = $this->department->name;
        $this->department_description = $this->department->description;
        $this->department_head = $this->department->department_head;
        $this->department_email = $this->department->email;
        $this->department_phone = $this->department->phone;
    }
    public function render()
    {
        return view('livewire.central-services.department-view');
    }

    public function updateDepartment()
    {
        $validatedData = Validator::make(
            [
                'department_name' => $this->department_name,
                'department_description' => $this->department_description,
                'department_head' => $this->department_head,
                'department_phone' => $this->department_phone,
                'department_email' => $this->department_email,
            ],
            [
                'department_name' => [
                    'required',
                    'string',
                    Rule::unique('departments', 'name')->ignore($this->department->id),

                ],
                'department_description' => 'required|string',
                'department_head' => 'required|string',
                'department_email' => 'required|email',
                'department_phone' => 'required|string',
            ],
        )->validate();
        try {
            Department::where('id', $this->department->id)->update([
                'name' => $this->department_name,
                'description' => $this->department_description,
                'department_head' => $this->department_head,
                'phone' => $this->department_phone,
                'email' => $this->department_email,
            ]);
        } catch (\Exception $e) {
            $this->feedback_header = 'Action Failed!!';
            $this->feedback = "Sorry, something went wrong. Please try again and if the error persists please contact support team to resolve the issue..";
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
        }
        $this->feedback_header = 'Success!!';
        $this->feedback = "Department has been updated successfully.";
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('action_feedback');
    }
}