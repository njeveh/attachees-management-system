<?php

namespace App\Http\Livewire\CentralServices;

use App\Models\Application;
use App\Models\Department;
use App\Utilities\Utilities;
use Livewire\Component;
use Livewire\WithPagination;

class Applications extends Component
{
    use WithPagination;

    public $departments;
    public $department;
    public $year;
    public $cohort;
    public $search = '';
    protected $attachees;
    public $status_filter;
    public function mount()
    {
        $this->departments = Department::all();
        $this->year = "";
        $this->cohort = "";
        $this->department = "";
        $this->status_filter = '';
    }
    public function render()
    {
        $applications = Application::whereLike(['applicant.first_name', 'applicant.second_name', 'quarter', 'advert.year', 'status',], $this->search ?? '')
        ->where(function ($query) {
            $query
            ->when($this->department != "", (function ($query) {
                return $query->whereRelation('advert', 'department_id', $this->department);
            }))
                ->when($this->year != null, (function ($query) {
                    return $query->whereRelation('advert', 'year', $this->year);
                }))
                ->when(
                    $this->cohort != null,
                    (function ($query) {
                        return $query->where('quarter', $this->cohort);
                    }))
                ->when($this->status_filter, function ($query, $status) {
                    return $query->where('status', $status);
            });
        })->latest()->paginate(10);
        return view('livewire.central-services.applications', ['applications' => $applications]);
    }

    public function resetAllFilters()
    {
        $this->department = '';
        $this->search = '';
        $this->cohort = '';
        $this->year = '';
        $this->search = '';
        $this->status_filter = '';
    }
}
