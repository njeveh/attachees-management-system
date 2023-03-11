<?php

namespace App\Http\Livewire;

use App\Models\Advert;
use App\Models\Department;
use Livewire\Component;

class ShowAdverts extends Component
{
    public $search = '';
    public $department_id;
    public $departments;
    public $department_objects;
    public $side_menu_class;

    public function mount()
    {
        $this->department_objects = Department::all();
        $this->side_menu_class = '';
    }
    public function render()
    {
        /**
         * whereLike is a query builder macro defined on /Providers/AppserviceProvider boot method
         * 
        */
        $adverts = Advert::whereLike(['title', 'description','reference_number', 'department.name', 'accompaniments.value'], $this->search ?? '')
                ->when($this->department_id, function ($query, $department_id) {
                    return $query->where('department_id', $department_id);
                })
                ->when($this->departments, function ($query, $departments) {
                    return $query->orWhereIn('department_id', $departments);
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
        $this->reset('department_id');
    }
    public function toggleClass(){
        if ($this->side_menu_class == ''){
            $this->side_menu_class = 'active';
        }else{
            $this->side_menu_class = '';
        }
    }
}
