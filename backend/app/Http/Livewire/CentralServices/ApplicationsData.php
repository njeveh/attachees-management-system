<?php

namespace App\Http\Livewire\CentralServices;

use App\Models\Advert;
use App\Models\Department;
use Livewire\Component;

class ApplicationsData extends Component
{
    public $department;
    public $year;
    public $departments;

    public function mount()
    {
        $this->departments = Department::all();

    }
    public function render()
    {
        $adverts = Advert::where('approval_status', 'approved')
            ->when($this->department != '', function ($query) {
                return $query->where('department_id', $this->department);
            })
            ->when($this->year != '', function ($query, $status) {
                return $query->where('year', $this->year);
            })->get(); //->paginate(2);
        return view('livewire.central-services.applications-data', ['adverts' => $adverts]);
    }
}