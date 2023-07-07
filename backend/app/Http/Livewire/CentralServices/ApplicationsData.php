<?php

namespace App\Http\Livewire\CentralServices;

use App\Models\Advert;
use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class ApplicationsData extends Component
{
    use WithPagination;

    public $department;
    public $year;
    public $departments;

    public function mount()
    {
        $this->departments = Department::all();
        $this->year = "";
        $this->department = "";

    }
    public function render()
    {
        $adverts = Advert::where('approval_status', 'approved')
            ->when($this->department != '', function ($query) {
                return $query->where('department_id', $this->department);
            })
            ->when($this->year != '', function ($query, $status) {
                return $query->where('year', $this->year);
            })->paginate(10);
        return view('livewire.central-services.applications-data', ['adverts' => $adverts]);
    }

    public function resetAllFilters()
    {
        $this->department = '';
        $this->year = '';
    }
}