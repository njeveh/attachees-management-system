<?php

namespace App\Http\Livewire\Departments;

use Livewire\Component;
use App\Models\StudyArea;
use App\Models\StudyAreaAccompaniment;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EditStudyArea extends Component
{
    public $feedback;
    public $alert_class;
    public $feedback_header;
    public $title;
    public $description;
    public Collection $gen_reqs;
    public $study_area;
    private $department;
    public $study_area_id;

    protected $rules = [
        'title' => 'required|string',
        'description' => 'required|string',
        'gen_reqs.*.gen_req' => 'required',
    ];
    protected $validationAttributes = [
        'gen_reqs.*.gen_req' => 'general requirement',
    ];
    public function mount($id)
    {
        $this->fill([
            'gen_reqs' => collect([]),
        ]);
        $this->study_area_id = $id;
        $this->study_area = StudyArea::find($id);
        $this->title = $this->study_area->title;
        $this->description = $this->study_area->description;
        $gen_reqs = $this->study_area->studyAreaAccompaniments->where('type', 'general_requirement');
        $gen_reqs->map(function ($gen_req, $key) {
            $this->gen_reqs->push(['gen_req' => $gen_req->value, 'id' => $gen_req->id]);
        });
    }

    public function addInput($field)
    {
        switch ($field) {
            case 'gen_req':
                $this->gen_reqs->push(['gen_req' => '', 'id' => null]);
                break;

        }
    }
    public function removeInput($key, $field)
    {

        switch ($field) {
            case 'gen_req':
                if (!is_null($this->gen_reqs[$key]['id'])) {
                    if (StudyAreaAccompaniment::destroy($this->gen_reqs[$key]['id'])) {
                        $this->gen_reqs->pull($key);
                    } else {
                        $this->feedback_header = 'Error deleting field!!';
                        $this->feedback = 'Something went wrong. The general requirement could not be deleted from the database';
                        $this->alert_class = 'alert-danger';
                        $this->dispatchBrowserEvent('action_feedback');
                    }
                } else {
                    $this->gen_reqs->pull($key);
                }
                break;

        }
    }
    public function render()
    {
        return view('livewire.departments.edit-study-area');
    }

    public function updateStudyArea()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $this->department = auth()->user()->departmentAdmin->department;
            StudyArea::where('id', $this->study_area_id)
                ->update([
                    'title' => $this->title,
                    'description' => $this->description,
                ]);
            if (count($this->gen_reqs)) {
                $this->gen_reqs->map(function ($gen_req, $key) {
                    if (!is_null($this->gen_reqs[$key]['id'])) {
                        StudyAreaAccompaniment::where('id', $this->gen_reqs[$key]['id'])->update([
                            'value' => $this->gen_reqs[$key]['gen_req'],
                        ]);
                    } else {
                        StudyAreaAccompaniment::create([
                            'study_area_id' => $this->study_area->id,
                            'value' => $this->gen_reqs[$key]['gen_req'],
                            'type' => 'general_requirement',
                        ]);
                    }
                });
            }

            DB::commit();
        } catch (\Exception $e) {
            //Log::info($e);
            DB::rollBack();
            $this->feedback_header = 'Error editing study area!!';
            $this->feedback = 'Something went wrong while editing the study area. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
            return;
        }
        return redirect('/departments/study-areas/' . $this->study_area->id);
    }
}