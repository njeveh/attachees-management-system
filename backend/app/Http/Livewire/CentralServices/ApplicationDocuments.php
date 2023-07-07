<?php

namespace App\Http\Livewire\CentralServices;

use App\Models\Application;
use Livewire\Component;

class ApplicationDocuments extends Component
{
    public $application_id;
    public $application;
    public $application_accompaniments;

    public function mount($id)
    {
        $this->application_id = $id;

    }

    public function render()
    {
        $this->application = Application::find($this->application_id);
        $this->application_accompaniments = $this->application->applicationAccompaniments;
        return view('livewire.central-services.application-documents', ['application' => $this->application,], );
    }
}
