<?php

namespace App\Http\Livewire\CentralServices;

use App\Models\Department;
use App\Models\Evaluation;
use Livewire\Component;
use App\Utilities\ExportEvaluations;
use Maatwebsite\Excel\Facades\Excel;

class GenerateEvaluations extends Component
{
    public $departments;
    public $year;
    public $cohort;
    public $evaluations;
    public $department;
    public $file_name;
    public $file_extension;

    public function mount()
    {
        $this->departments = Department::all();
        $this->department = "";
        $this->year = "";
        $this->cohort = "";
        $this->file_extension = 'csv';
    }
    public function render()
    {
        return view('livewire.central-services.generate-evaluations');
    }

    public function exportCSVFile()
    {
        $records = Evaluation::select(
            'course_being_pursued',
            'department_id',
            'supervisor_name',
            'level_of_study',
            'attachment_duration',
            'part1_quiz',
            'part2_quiz',
            'recommendable_to_friends',
            'reasons_if_not_recommendable',
            'recommendations_to_university',
            'cohort',
            'year',
        )->
            when($this->department != "", function ($query) {
                return $query->where('department_id', $this->department);
            })
            ->when($this->year != "", function ($query) {
                return $query->where('year', $this->year);
            })
            ->when($this->cohort != "", function ($query) {
                return $query->where('cohort', $this->cohort);
            })->get();
        if ($records->count()) {
            $to_export = new ExportEvaluations($records);
            return Excel::download($to_export, $this->file_name . '.' . $this->file_extension);
        } else {
            return back()->with('message', 'No entries for the selected filters');
        }
    }
}