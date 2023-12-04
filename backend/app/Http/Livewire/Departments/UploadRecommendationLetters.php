<?php

namespace App\Http\Livewire\Departments;

use App\Models\Attachee;
use App\Models\RecommendationLetter;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadRecommendationLetters extends Component
{
    use WithFileUploads;

    public $department;
    public $feedback;
    public $alert_class;
    public $feedback_header;
    public $recommendation_letter;

    public $search = '';

    public function mount()
    {
        $this->department = auth()->user()->departmentAdmin->department;

    }

    protected $rules = [
        'recommendation_letter' => 'file|mimes:pdf,docx,odt,jpg,jpeg,png',
    ];
    public function render()
    {
        $attachees = $this->department->attachees;
        if ($attachees->count()) {
            $attachees = Attachee::whereIn('id', $attachees->modelkeys())
                ->whereLike(['applicant.first_name', 'applicant.second_name', 'quarter', 'year', 'applicant.national_id', 'study_area',], $this->search ?? '')
                ->where('status', 'completed')
                ->where('has_filled_evaluation_form', 1)
                ->doesntHave('recommendationLetter')
                ->get();
        }
        return view('livewire.departments.upload-recommendation-letters', ['attachees' => $attachees]);
    }

    public function upload($id)
    {
        $this->validate();
        $attachee = Attachee::find($id);
        try {
            $path = $this->recommendation_letter->storePubliclyAs(
                preg_replace('/\s+/', '_', $this->department->name) . '/recommendation_letters/' .
                $attachee->applicant->national_id,
                'recommendation_letter',
                'public'
            );
            if (!RecommendationLetter::where('path', $path)->exists()) {
                RecommendationLetter::create([
                    'attachee_id' => $id,
                    'path' => $path,
                ]);
            }
        } catch (\Exception $e) {
            $this->feedback_header = 'Error Uploading Document!!';
            $this->feedback = 'Sorry! Something went wrong while uploading the document. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
            return;
        }
        $this->feedback_header = 'Success!!';
        $this->feedback = 'Recommendation Letter uploaded successfully';
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('action_feedback');
    }
}