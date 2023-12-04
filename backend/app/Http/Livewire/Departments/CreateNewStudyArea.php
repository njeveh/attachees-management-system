<?php

namespace App\Http\Livewire\Departments;

use App\Models\StudyArea;
use App\Models\StudyAreaAccompaniment;
use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreateNewStudyArea extends Component
{

    public $feedback;
    public $alert_class;
    public $alert_type;
    public $feedback_header;
    public $confirmed_action;
    public $title;
    public $description;
    public Collection $gen_reqs;
    private $study_area;
    private $department;

    public function render()
    {
        return view('livewire.departments.create-new-study-area');
    }


    protected $rules = [
        'title' => 'required|string',
        'description' => 'required|string',
        'gen_reqs.*.gen_req' => 'required',
    ];
    protected $validationAttributes = [
        'gen_reqs.*.gen_req' => 'general requirement',
    ];
    public function mount()
    {
        $this->fill([
            'gen_reqs' => collect([['gen_req' => '']]),
        ]);
    }

    public function addInput($field)
    {
        switch ($field) {
            case 'gen_req':
                $this->gen_reqs->push(['gen_req' => '']);
                break;
        }
    }
    public function removeInput($key, $field)
    {

        switch ($field) {
            case 'gen_req':
                $this->gen_reqs->pull($key);
                break;

        }
    }

    public function createStudyArea()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $user = auth()->user();
            $this->department = $user->departmentAdmin->department;
            $this->study_area = StudyArea::create([
                'title' => $this->title,
                'department_id' => $this->department->id,
                'description' => $this->description,
            ]);
            if (count($this->gen_reqs)) {
                $this->gen_reqs->map(function ($gen_req, $key) {
                    StudyAreaAccompaniment::create([
                        'study_area_id' => $this->study_area->id,
                        'value' => $this->gen_reqs[$key]['gen_req'],
                        'type' => 'general_requirement',
                    ]);
                });
            }
            DB::commit();
        } catch (\Exception $e) {
            //Log::info($e);
            DB::rollBack();
            $this->feedback_header = 'Error Createing Study Area!!';
            $this->feedback = 'Something went wrong while creating the study area. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
            return;
        }
        return redirect('/departments/study-areas/' . $this->study_area->id);
    }
}
