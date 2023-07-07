<?php

namespace App\Http\Livewire\CentralServices;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Builder;

class ApplicantUsers extends Users
{
    public function render()
    {
        $applicants = Applicant::whereLike(['first_name', 'second_name', 'national_id',], $this->search ?? '')
            ->when($this->status_filter == 'active_attachees', function ($query, $status) {
                return $query->whereHas('attachees', function (Builder $query) {
                    return $query->where('status', 'active');
                });
            })
            ->when($this->status_filter == 'non_attachee_applicants', function ($query, $status) {
                return $query->whereNot(function (Builder $query) {
                    $query->whereHas('attachees');
                });
            })
            ->when($this->status_filter == 'dismissed_attachees', function ($query, $status) {
                return $query->whereHas('attachees', function (Builder $query) {
                    return $query->where('status', '!=', 'active');
                });
            })->paginate(10);
        return view('livewire.central-services.applicant-users', ['applicants' => $applicants]);
    }

}