<?php

namespace App\Http\Livewire\Attachee;

use App\Models\Advert;
use App\Models\Application;
use App\Models\AdvertAccompaniment;
use App\Models\ApplicationAccompaniment;
use App\Models\Attachee;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
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
    public $national_id_front;
    public $national_id_back;
    public $advert;
    public $application;
    public $user;
    public $link;

        protected $rules = [
                'application_letter' => 'required|file|mimes:pdf,jpg,jpeg,png',
                'attachment_letter' => 'required|file|mimes:pdf,jpg,jpeg,png',
                'insurance_cover' => 'required|file|mimes:pdf,jpg,jpeg,png',
                'national_id_front' => 'required|file|mimes:pdf,jpg,jpeg,png,',
                'national_id_back' => 'required|file|mimes:pdf,jpg,jpeg,png,',
    ];
    public function mount($advert_id)
    {
        $this->advert = Advert::find($advert_id);
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.attachee.apply');
    }

    public function apply()
    {
        $this->validate();
        if(Application::where('attachee_id', $this->user->attachee->id)
        ->where('advert_id', $this->advert->id)->exists()){
            $this->feedback_header = 'Error Creating application!!';
            $this->feedback = "You can't apply for this post more than once";
            $this->alert_class = 'alert-danger';
            $this->link = null;
            $this->dispatchBrowserEvent('application_feedback');
            return;
        }

        DB::beginTransaction();
            try{
                $collection = collect([['application_letter', $this->application_letter],['attachment_letter', $this->attachment_letter],
                ['insurance_cover', $this->insurance_cover],
                    ['national_id_front', $this->national_id_front], ['national_id_back', $this->national_id_back]]);
                $this->application = Application::create([
                    'attachee_id' => $this->user->attachee->id,
                    'advert_id' => $this->advert->id,
                ]);
                $collection->map(function($item, int $key){
                    $path = $item[1]->storePubliclyAs(
                    'application_docs/'. preg_replace('/\s+/', '_',$this->application->advert->department->name).'/'.
                    preg_replace('/\//', '_',$this->application->advert->year).'/'.preg_replace('/\s+/', '_',$this->application->advert->title).'/'.
                    $this->user->attachee->national_id, $item[0], 'public');
                     ApplicationAccompaniment::create([
                        'name' => $item[0],
                        'application_id' => $this->application->id,
                        'path' => $path,
                    ]);
                });
        DB::commit();
            } catch (\Exception $e) {
                
                $this->feedback_header = 'Error Creating Application!!';
                $this->feedback = 'Something went wrong while uploading documents. Please try again and if the error persists contact support team to resolve the issue';
                $this->alert_class = 'alert-danger';
                $this->link = null;
                $this->dispatchBrowserEvent('application_feedback');
                return;
            }


            if($this->user->attachee->attacheeBiodata)
            {
                $message = 'Your application has been submitted successfully';
            }else{
                $message = 'Your application has been submitted successfully. Please Follow the button link below to update your biodata and complete your application. It will act as your CV.';
                $this->link  = '/attachee/biodata';
            }
            
            $this->feedback_header = 'success!!';
            $this->feedback = $message;
            $this->alert_class = 'alert-success';
            $this->dispatchBrowserEvent('application_feedback');
    }
}
