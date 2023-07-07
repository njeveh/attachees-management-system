<?php

namespace App\Http\Livewire\CentralServices;

use App\Models\Advert;
use Exception;
use Livewire\Component;

class AdvertView extends Component
{

    public $advert_id;
    public $feedback;
    public $alert_class;
    public $feedback_header;
    public $confirmed_action;

    protected $listeners = ['disapproveAdvert' => 'disapproveAdvert',
        'approveAdvert' => 'approveAdvert', 'activateAdvert' => 'activateAdvert',
        'deactivateAdvert' => 'deactivateAdvert', 'deleteAdvert' => 'deleteAdvert'
    ];

    public function mount($id)
    {
        $this->advert_id = $id;
    }

    public function render()
    {
        $advert = Advert::find($this->advert_id);
        $gen_reqs = $advert->accompaniments->where('type', 'general_requirement');
        $prof_reqs = $advert->accompaniments->where('type', 'professional_requirement');
        $responsibilities = $advert->accompaniments->where('type', 'intern_responsibility');
        return view('livewire.central-services.advert-view', ['advert' => $advert, 'gen_reqs' => $gen_reqs,
        'prof_reqs' => $prof_reqs, 'responsibilities' => $responsibilities,]);
    }


    public function warn($action){
        switch ($action){
            case 'delete':
                $this->feedback_header = 'Confirm Deletion';
                $this->feedback = 'Are you sure you want to delete this advert? This action is irrevasible.';
                $this->alert_class = 'alert-danger';
                $this->confirmed_action = 'deleteAdvert';
                $this->dispatchBrowserEvent('advert_action_confirm');
                break;
            case 'activate':
                $this->feedback_header = 'Confirm Activation';
                $this->feedback = 'Are you sure you want to activate this advert? The advert if approved will be publicly available for view.';
                $this->alert_class = 'alert-warning';
                $this->confirmed_action = 'activateAdvert';
                $this->dispatchBrowserEvent('advert_action_confirm');
                break;
            case 'deactivate':
                $this->feedback_header = 'Confirm Deactivation';
                $this->feedback = 'Are you sure you want to deactivate this advert? This advert will be hidden from public view.';
                $this->alert_class = 'alert-warning';
                $this->confirmed_action = 'deactivateAdvert';
                $this->dispatchBrowserEvent('advert_action_confirm');
                break;
            case 'approve':
                $this->feedback_header = 'Confirm Approval';
                $this->feedback = 'Are you sure you want to approve this advert? The advert if active will be publicly available for view.';
                $this->alert_class = 'alert-warning';
                $this->confirmed_action = 'approveAdvert';
                $this->dispatchBrowserEvent('advert_action_confirm');
                break;
            case 'disapprove':
                $this->feedback_header = 'Confirm Disapproval';
                $this->feedback = 'Are you sure you want to disapprove this advert? The advert will not be publicly viewable';
                $this->alert_class = 'alert-warning';
                $this->confirmed_action = 'disapproveAdvert';
                $this->dispatchBrowserEvent('advert_action_confirm');
                break;

        }
    }    

    public function disapproveAdvert()
    {
        try{
            $advert = Advert::find($this->advert_id);
            $advert->approval_status = 'disapproved';
            $advert->save();
            $this->feedback_header = 'success!!';
            $this->feedback = 'Advert disapproved Successfully';
            $this->alert_class = 'alert-success';
            $this->dispatchBrowserEvent('advert_action_feedback');
        }catch (\Exception $e){
            $this->feedback_header = 'Error Updating!!';
            $this->feedback = 'Advert disapproval Failed';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('advert_action_feedback');
        }
    }
    public function approveAdvert()
    {
        try{
            $advert = Advert::find($this->advert_id);
            $advert->approval_status = 'approved';
            $advert->save();
            $this->feedback_header = 'success!!';
            $this->feedback = 'Advert approved Successfully';
            $this->alert_class = 'alert-success';
            $this->dispatchBrowserEvent('advert_action_feedback');
        }catch (\Exception $e){
            $this->feedback_header = 'Error Updating!!';
            $this->feedback = 'Advert approval Failed';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('advert_action_feedback');
        }
    }

    public function deleteAdvert()
    {
        try{
            if (Advert::destroy($this->advert_id) > 0){
                return redirect()->route('central_services.view_adverts');
            }
            else{
                $this->feedback_header = 'Error Deleting!!';
                $this->feedback = 'Something went wrong. Advert delition Failed';
                $this->alert_class = 'alert-danger';
                $this->dispatchBrowserEvent('advert_action_feedback');
            }
        }catch (\Exception $e){
            $this->feedback_header = 'Error Deleting!!';
            $this->feedback = 'Something went wrong. Advert delition Failed';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('advert_action_feedback');
        }
    }

    public function activateAdvert()
    {
        try{
            $advert = Advert::find($this->advert_id);
            $advert->is_active = 1;
            $advert->save();
            $this->feedback_header = 'success!!';
            $this->feedback = 'Advert activated Successfully';
            $this->alert_class = 'alert-success';
            $this->dispatchBrowserEvent('advert_action_feedback');
        }catch (\Exception $e){
            $this->feedback_header = 'Error Updating!!';
            $this->feedback = 'Advert activation Failed';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('advert_action_feedback');
        }
    }

    public function deactivateAdvert()
    {
        try{
            $advert = Advert::find($this->advert_id);
            $advert->is_active = 0;
            $advert->save();
            $this->feedback_header = 'success!!';
            $this->feedback = 'Advert deactivated Successfully';
            $this->alert_class = 'alert-success';
            $this->dispatchBrowserEvent('advert_action_feedback');
        }catch (\Exception $e){
            $this->feedback_header = 'Error Updating!!';
            $this->feedback = 'Advert deactivation Failed';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('advert_action_feedback');
        }
    }
}
