<?php

namespace App\Http\Livewire;

use App\Models\Advert;
use App\Models\Department;
use Livewire\Component;
use App\Utilities\Utilities;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $department;
    public $departments;
    public $department_objects;
    public $side_menu_class;
    public $next_year_quarter_data;
    public $searchOne;
    public $searchTwo;

    public function mount()
    {
        $this->department_objects = Department::all();
        $this->side_menu_class = '';
        $this->next_year_quarter_data = Utilities::get_next_quarter_data();

    }
    public function render()
    {
        /**
         * whereLike is a query builder macro defined on /Providers/AppserviceProvider boot method
         * 
         */
        $adverts = Advert::whereLike(['title', 'description', 'reference_number', 'department.name', 'accompaniments.value'], $this->search ?? '')
            ->when($this->department, function ($query, $department) {
                return $query->where('department_id', $department);
            })
            ->when($this->departments, function ($query, $departments) {
                return $query->whereIn('department_id', $departments);
            })
            ->where('approval_status', 'approved')->where('is_active', 1)
            ->where('cohort' . $this->next_year_quarter_data['quarter'] . '_vacancies', '>', 0)->latest()
            ->paginate(15);
        return view('livewire.home-page', ['adverts' => $adverts, 'departments' => $this->department_objects]);
    }

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    public function updatedDepartments()
    {
        if (!is_array($this->departments))
            return;
        $this->departments = array_filter($this->departments, function ($department) {
            return $department != false;
        });
        $this->reset('department');
    }
    public function updatedDepartment()
    {
        $this->reset('departments');
    }
    public function updatedSearchOne()
    {
        $this->reset('searchTwo');
        $this->search = $this->searchOne;
    }
    public function updatedSearchTwo()
    {
        $this->reset('searchOne');
        $this->search = $this->searchTwo;
    }
    public function resetFilters()
    {
        $this->reset('departments');
        $this->reset('search');
        $this->reset('department');
    }

    // public function resetDepartmentFilters()
    // {
    //     $this->reset('departments');
    //     $this->reset('department');
    // }
    public function toggleClass()
    {
        if ($this->side_menu_class == '') {
            $this->side_menu_class = 'active';
        } else {
            $this->side_menu_class = '';
        }
    }
}