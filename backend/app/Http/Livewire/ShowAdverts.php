<?php

namespace App\Http\Livewire;

use App\Models\Advert;
use App\Models\Department;
use Livewire\Component;

class ShowAdverts extends Component
{
    public $search = '';
    public $department;
    public $departments;
    public $department_objects;

    public function mount()
    {
        $this->department_objects = Department::all();
    }
    public function render()
    {
        /**
         * whereLike is a query builder macro defined on /Providers/AppserviceProvider boot method
         * 
        */
        $adverts = Advert::whereLike(['title', 'description','reference_number', 'department.name', 'accompaniments.value'], $this->search ?? '')
                ->when($this->department, function ($query, $department) {
                    return $query->where('department_id', $department);
                })
                ->when($this->departments, function ($query, $departments) {
                    return $query->whereIn('department_id', $departments);
                })
                ->where('approval_status', 'approved')->where('is_active', 1)
                ->get();
        return view('livewire.show-adverts', ['adverts' => $adverts, 'departments' => $this->department_objects]);
    }

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    public function updatedDepartments()
    {
        if (!is_array($this->departments)) return;
            $this->departments = array_filter($this->departments, function ($department) {
            return $department != false;
        });
    }
    public function resetFilters()
    {
        $this->reset('departments');
        $this->reset('search');
        $this->reset('department');
    }
}
