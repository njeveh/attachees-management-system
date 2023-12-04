<?php

namespace App\Http\Livewire\Departments;

use App\Models\Attachee;
use Livewire\Component;
use Livewire\WithFileUploads;

class RecommendationLetters extends Component
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
                ->has('recommendationLetter')
                ->get();
        }
        return view('livewire.departments.recommendation-letters', ['attachees' => $attachees]);
    }
    public function update($id)
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
        } catch (\Exception $e) {
            //Log::info($e);
            $this->feedback_header = 'Error Updating Document!!';
            $this->feedback = 'Something went wrong while updating the document. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
            return;
        }

        $this->feedback_header = 'success!!';
        $this->feedback = "Document has been updated successfully";
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('action_feedback');
    }
}