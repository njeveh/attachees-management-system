<?php

namespace App\Http\Livewire\Attachee;

use App\Models\Advert;
use App\Models\Application;
use App\Models\ApplicationAccompaniment;
use App\Utilities\Utilities;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\WithFileUploads;

class Apply extends Component
{
    use WithFileUploads;

    public $feedback;
    public $alert_class;
    public $alert_type;
    public $feedback_header;
    public $application_letter;
    public $attachment_letter;
    public $insurance_cover;
    public $identification_document_front;
    public $identification_document_back;
    public $advert;
    public $application;
    public $attachment_start_date;
    public $minimum_attachment_weeks;
    public $attachment_end_date;
    public $user;
    public $link;
    public $quarter;

    protected $rules = [
        'application_letter' => 'required|file|mimes:pdf,docx,odt',
        'attachment_letter' => 'required|file|mimes:pdf,jpg,jpeg,png',
        'insurance_cover' => 'required|file|mimes:pdf,jpg,jpeg,png',
        'identification_document_front' => 'required|file|mimes:pdf,jpg,jpeg,png,',
        'identification_document_back' => 'sometimes|file|mimes:pdf,jpg,jpeg,png,',
        'attachment_start_date'  => 'required|date',
        'attachment_end_date'  => 'required|date|after:attachment_start_date|after:today',
        'minimum_attachment_weeks' => 'required|numeric|integer|min:1|max:12',
    ];
    public function mount($advert_id)
    {
        $this->advert = Advert::find($advert_id);
        $this->user = auth()->user();
        $this->quarter = Utilities::get_current_quarter_data();
    }

    public function render()
    {
        return view('livewire.attachee.apply');
    }

    public function apply()
    {
        $this->validate();
        if (
            Application::where('applicant_id', $this->user->applicant->id)
                ->where('advert_id', $this->advert->id)->exists()
        ) {
            $this->feedback_header = 'Error Creating application!!';
            $this->feedback = "You can't apply for this post more than once";
            $this->alert_class = 'alert-danger';
            $this->link = null;
            $this->dispatchBrowserEvent('application_feedback');
            return;
        }

        $date=date_create($this->attachment_start_date);
        $month = date_format($date,"n");
        //Calculate the year quarter.
        $yearQuarter = ceil($month / 3);
        $this->quarter = Utilities::get_given_quarter_data($yearQuarter);

        DB::beginTransaction();
        try {
            $collection = collect([
                ['application_letter', $this->application_letter],
                ['attachment_letter', $this->attachment_letter],
                ['insurance_cover', $this->insurance_cover],
                ['identification_document_front', $this->identification_document_front],
            ]);
            if (isset($this->identification_document_back)){
                $collection->push(['identification_document_back', $this->identification_document_back]);
            }
            $this->application = Application::create([
                'applicant_id' => $this->user->applicant->id,
                'advert_id' => $this->advert->id,
                'attachment_start_date'  => $this->attachment_start_date,
                'minimum_attachment_weeks' =>$this->minimum_attachment_weeks,
                'attachment_end_date'  => $this->attachment_end_date,
            ]);
            $collection->map(function ($item, int $key) {
                $path = $item[1]->storePubliclyAs(
                    preg_replace('/\s+/', '_', $this->application->advert->department->name) . '/' . 'application_docs/' .
                    preg_replace('/\//', '_', $this->application->advert->year) . '/' . preg_replace('/[\W\s\/]+/', '_', $this->application->advert->studyArea->title) . '/' .
                    $this->user->applicant->national_id, $item[0],
                    'public'
                );
                ApplicationAccompaniment::create([
                    'name' => $item[0],
                    'application_id' => $this->application->id,
                    'path' => $path,
                ]);
            });
            if ($this->user->applicant->engagement_level < 1) {
                $this->user->applicant->engagement_level = 1;
                $this->user->applicant->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            $this->feedback_header = 'Error Creating Application!!';
            $this->feedback = 'Something went wrong while uploading documents. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->link = null;
            $this->dispatchBrowserEvent('application_feedback');
            return;
        }


        if ($this->user->applicant->applicantBiodata) {
            $message = 'Your application has been submitted successfully';
        } else {
            $message = 'Your application has been submitted successfully. Please Follow the button link below to update your biodata and complete your application. It will act as your CV.';
            $this->link = '/attachee/biodata';
        }

        $this->feedback_header = 'success!!';
        $this->feedback = $message;
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('application_feedback');
    }
}