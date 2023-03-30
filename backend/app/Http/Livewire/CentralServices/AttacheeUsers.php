<?php

namespace App\Http\Livewire\CentralServices;

use App\Models\Attachee;
use Illuminate\Database\Eloquent\Builder;

class AttacheeUsers extends Users
{
    public function render()
    {
        $attachees = Attachee::whereLike(['applicant.first_name', 'aplicant.second_name', 'applicant.national_id',], $this->search ?? '')
            ->when($this->status_filter == 'active_attachees', function ($query, $status) {
                return $query->where('status', 'active');
            })
            ->when($this->status_filter == 'dismissed_attachees', function ($query, $status) {
                return $query->whereIn('status', ['completed', 'terminated_before_completion']);
            })->paginate(1);

        return view('livewire.central-services.attachee-users');
    }
}