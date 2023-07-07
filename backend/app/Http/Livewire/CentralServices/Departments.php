<?php

namespace App\Http\Livewire\CentralServices;

use App\Models\Department;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Departments extends Component
{
    public $departments;
    public $search = '';
    public $feedback_header;
    public $feedback;
    public $alert_class;
    public $confirmed_action_target;
    public $department_name, $department_description, $department_head, $department_email, $department_phone;


    protected $rules = [
        'department_name' => 'required|string|unique:departments,name',
        'department_description' => 'required|string',
        'department_head' => 'required|string',
        'department_email' => 'required|email',
        'department_phone' => 'required|string',
    ];
    public function render()
    {
        $this->departments = Department::whereLike(['name', 'department_head', 'description', 'email',], $this->search ?? '')
            ->get();
        return view('livewire.central-services.departments');
    }
    public function warn($id)
    {
        $this->feedback_header = 'Confirm deletion';
        $this->feedback = "Are you sure you want to delete this department? This action is irreversible.";
        $this->alert_class = 'alert-danger';
        $this->confirmed_action_target = $id;
        $this->dispatchBrowserEvent('action_confirm');
    }
    public function delete($id)
    {
        try {
            Department::destroy($id);
        } catch (\Exception $e) {
            $this->feedback_header = 'Deletion Failed!!';
            $this->feedback = "Sorry, something went wrong. Please try again and if the error persists please contact support team to resolve the issue..";
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
        }
        $this->feedback_header = 'Deletion Success';
        $this->feedback = "Department has been deleted successfully.";
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('action_feedback');
    }

    public function addDepartment()
    {
        $this->validate();
        try {
            Department::create([
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
        $this->feedback = "Department has been added successfully.";
        $this->alert_class = 'alert-success';
        $this->reset([
            'department_name',
            'department_description',
            'department_head',
            'department_email',
            'department_phone',
        ]);
        $this->dispatchBrowserEvent('action_feedback');
    }

}