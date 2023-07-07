<?php

namespace App\Http\Livewire\Attachee;

use App\Models\Attachee;
use App\Models\Department;
use App\Models\Evaluation;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Livewire\Component;

class EvaluationForm extends Component
{
    public $feedback;
    public $alert_class;
    public $feedback_header;
    public $attachee;
    public $course_being_pursued;
    public $departments;
    public $department_attached;
    public $supervisor_name;
    public $level_of_study;
    public $attachment_duration;
    public $part1_quiz;
    public $part2_quiz;
    public $recommendable_to_friends;
    public $reasons_if_not_recommendable;
    public $recommendations;
    public $collapsible_class;


    protected $rules = [
        'course_being_pursued' => 'required|string',
        'department_attached' => 'required|exists:departments,id',
        'supervisor_name' => 'required|string',
        'level_of_study' => 'required|string',
        'attachment_duration' => 'required|numeric',
        'part1_quiz.*' => 'required|numeric',
        'part2_quiz.*' => 'required|numeric',
        'recommendable_to_friends' => 'required|numeric|max:1,min:0',
        'reasons_if_not_recommendable' => 'required_if:recommendable_to_friends,0|exclude_if:recommendable_to_friends,1',
        'recommendations' => 'required|string',
    ];
    protected $messages = [
        'part1_quiz.*.required' => 'An answer selection to this question is required.',
        'part2_quiz.*.required' => 'An answer selection to this question is required.',
    ];
    public function mount($id)
    {
        $this->attachee = Attachee::find($id);
        if ($this->attachee->has_filled_evaluation_form) {
            return redirect()->route('attachee.evaluation_done');
        }
        $this->department_attached = $this->attachee->department_id;
        $this->collapsible_class = 'collapse';
        $this->departments = Department::all();
        $this->part1_quiz = [1 => null, 2 => null, 3 => null, 4 => null, 5 => null, 6 => null, 7 => null];
        $this->part2_quiz = [1 => null, 2 => null, 3 => null, 4 => null, 5 => null, 6 => null, 7 => null];
    }
    public function render()
    {
        return view('livewire.attachee.evaluation-form');
    }

    public function updatedRecommendableToFriends()
    {
        switch ($this->recommendable_to_friends) {
            case 1:
                $this->collapsible_class = 'collapse';
                break;
            case 0:
                $this->collapsible_class = '';
                break;
        }
    }

    public function createEvaluation()
    {
        $this->validate();
        if ($this->recommendable_to_friends == 1) {
            $this->reasons_if_not_recommendable = null;
        }
        DB::beginTransaction();
        try {
            Evaluation::create([
                'course_being_pursued' => $this->course_being_pursued,
                'department_id' => $this->department_attached,
                'supervisor_name' => $this->supervisor_name,
                'level_of_study' => $this->level_of_study,
                'attachment_duration' => $this->attachment_duration,
                'part1_quiz' => $this->part1_quiz,
                'part2_quiz' => $this->part2_quiz,
                'recommendable_to_friends' => $this->recommendable_to_friends,
                'reasons_if_not_recommendable' => $this->reasons_if_not_recommendable,
                'recommendations_to_university' => $this->recommendations,
                'cohort' => $this->attachee->cohort,
                'year' => $this->attachee->year,
            ]);
            $this->attachee->has_filled_evaluation_form = 1;
            $this->attachee->save();
            DB::commit();
        } catch (\Exception $e) {
            // \Log::info($e);
            DB::rollBack();
            $this->feedback_header = 'Error storing Evaluation!!';
            $this->feedback = 'Something went wrong while adding the evaluation to storage. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
        }
        $this->feedback_header = 'Success!!';
        $this->feedback = 'Evaluation stored successfully';
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('action_feedback');
    }
}