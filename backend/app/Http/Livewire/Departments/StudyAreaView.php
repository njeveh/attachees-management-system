<?php

namespace App\Http\Livewire\Departments;

use App\Models\StudyArea;
use Livewire\Component;

class StudyAreaView extends Component
{

    protected $listeners = [
        'deleteStudyArea' => 'deleteStudyArea',
    ];
    public $study_area_id;
    public $feedback;
    public $alert_class;
    public $alert_type;
    public $feedback_header;
    public $confirmed_action;

    public function mount($id)
    {
        $this->study_area_id = $id;
    }

    public function render()
    {
        $study_area = StudyArea::find($this->study_area_id);
        $gen_reqs = $study_area->studyAreaAccompaniments->where('type', 'general_requirement');
        return view('livewire.departments.study-area-view', [
            'study_area' => $study_area,
            'gen_reqs' => $gen_reqs,
        ]);
    }
    public function warn($action)
    {
        switch ($action) {
            case 'delete':
                $this->feedback_header = 'Confirm Deletion';
                $this->feedback = 'Are you sure you want to delete this study area? This action is irrevasible.';
                $this->alert_class = 'alert-danger';
                $this->alert_type = 'confirmation_prompt';
                $this->confirmed_action = 'deleteStudyArea';
                $this->dispatchBrowserEvent('action_confirm');
                break;
        }
    }
    public function deleteStudyArea()
    {
        try {
            if (StudyArea::destroy($this->study_area_id) > 0) {
                return redirect()->route('departments.study_areas');
            } else {
                $this->feedback_header = 'Error Deleting!!';
                $this->feedback = 'Something went wrong. Study area delition Failed';
                $this->alert_class = 'alert-danger';
                $this->alert_type = 'feedback';
                $this->dispatchBrowserEvent('action_feedback');
            }
        } catch (\Exception $e) {
            $this->feedback_header = 'Error Deleting!!';
            $this->feedback = 'Something went wrong. Study area delition Failed';
            $this->alert_class = 'alert-danger';
            $this->alert_type = 'feedback';
            $this->dispatchBrowserEvent('action_feedback');
        }
    }

}