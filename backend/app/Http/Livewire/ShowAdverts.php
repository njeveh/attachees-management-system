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
    public $next_quarter;
    public $start_date;
    public $end_date;
    public $application_deadline;

    public function mount()
    {
        $this->department_objects = Department::all();
        $this->side_menu_class = '';
        $month = date("n");
        //Calculate the year quarter.
        $yearQuarter = ceil($month / 3);
        switch ($yearQuarter){
            case 1:
                $this->next_quarter = 4;
                $this->start_date = date_format(date_create('1-04-'.date('Y')), 'jS-M-Y');
                $this->end_date = date_format(date_create('30-06-'.date('Y')), 'jS-M-Y');
                $this->application_deadline = date_format(date_create('31-March-'.date('Y')), 'jS-M-Y');
                break;
            case 2:
                $this->next_quarter = 1;
                $this->start_date = date_format(date_create('1-07-'.date('Y')), 'jS-M-Y');
                $this->end_date = date_format(date_create('30-09-'.date('Y')), 'jS-MY');
                $this->application_deadline = date_format(date_create('30-June-'.date('Y')), 'jS-M-Y');
                break;
            case 3:
                $this->next_quarter = 2;
                $this->start_date = date_format(date_create('1-10-'.date('Y')), 'jS-M-Y');
                $this->end_date = date_format(date_create('31-12-'.date('Y')), 'jS-M-Y');
                $this->application_deadline = date_format(date_create('30-09-'.date('Y')), 'jS-M-Y');
                break;
            case 4:
                $this->next_quarter = 3;
                $this->start_date = date_format(date_create('1-01-'.date('Y') + 1), 'jS-M-Y');
                $this->end_date = date_format(date_create('31-03-'.date('Y') + 1), 'jS-M-Y');
                $this->application_deadline = date_format(date_create('31-12-'.date('Y')), 'jS-M-Y');
                break;
        }
        
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
                ->where('cohort'.$this->next_quarter.'_vacancies', '>' ,0)
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
