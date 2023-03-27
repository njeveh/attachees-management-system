<?php

namespace App\Http\Livewire\Departments;

use App\Events\ApplicationReplied;
use App\Models\Advert;
use App\Models\Application;
use App\Notifications\ApplicationResponse;
use App\Utilities\Utilities;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class AdvertApplications extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $advert;
    public $table_title;
    public $table_title_bg_color;
    public $next_quarter;
    public $tab_filter;
    public $status_filter;
    public $active_tab_class;
    public $inactive_tab_class;
    public $all_tab_class;
    public $search = '';
    public $feedback;
    public $alert_class;
    public $feedback_header;
    public $confirmed_action;
    public $confirmed_action_parameter;
    public $revocation_reasons;


    protected $listeners = [
        'deleteApplication' => 'deleteApplication',
        'rejectApplication' => 'rejectApplication',
        'acceptApplication' => 'acceptApplication',
        //'revokeApplicationAcceptance' => 'revokeApplicationAcceptance',
    ];
    protected $rules = [
        'revocation_reasons' => 'required|string',
    ];

    public function mount($id)
    {
        $this->table_title = 'All Applications';
        $this->table_title_bg_color = 'bg-primary';
        $this->active_tab_class = 'active bg-secondary text-light';
        $this->inactive_tab_class = 'text-dark';
        $this->all_tab_class = 'text-dark';
        $this->status_filter = '';
        $this->next_quarter = Utilities::get_next_quarter_data()['quarter'];
        $this->advert = Advert::find($id);

    }
    public function render()
    {
        $applications = Application::where('advert_id', $this->advert->id)->whereLike(['applicant.first_name', 'applicant.second_name', 'quarter', 'advert.year', 'status',], $this->search ?? '')
            ->when($this->tab_filter == 'active', function ($query) {
                return $query->whereIn('quarter', [$this->next_quarter, $this->next_quarter - 1]);
            })
            ->when($this->tab_filter == 'inactive', function ($query) {
                return $query->whereNotIn('quarter', [$this->next_quarter, $this->next_quarter - 1]);
            })
            ->when($this->status_filter, function ($query, $status) {
                return $query->where('status', $status);
            })->paginate(2);
        return view('livewire.departments.advert-applications', ['applications' => $applications]);
    }

    public function updateTab($value)
    {
        switch ($value) {
            case 'active':
                $this->active_tab_class = 'active bg-secondary text-light';
                $this->reset(['inactive_tab_class', 'all_tab_class',]);
                $this->resetToTabDefault();
                $this->tab_filter = 'active';

                break;
            case 'inactive':
                $this->inactive_tab_class = 'active bg-secondary text-light';
                $this->reset(['active_tab_class', 'all_tab_class',]);
                $this->resetToTabDefault();
                $this->tab_filter = 'inactive';
                break;
            case 'all':
                $this->all_tab_class = 'active bg-secondary text-light';
                $this->reset(['inactive_tab_class', 'active_tab_class',]);
                $this->resetToTabDefault();
                $this->tab_filter = 'all';
                break;
        }

    }
    public function updatedStatusFilter()
    {
        switch ($this->status_filter) {
            case '':
                $this->table_title = 'All Applications';
                $this->table_title_bg_color = 'bg-primary';
                break;

            case 'pending':
                $this->table_title = 'Pending Applications';
                $this->table_title_bg_color = 'bg-info';
                break;

            case 'accepted':
                $this->table_title = 'Accepted Applications';
                $this->table_title_bg_color = 'bg-success';
                break;
            case 'rejected':
                $this->table_title = 'Rejected Applications';
                $this->table_title_bg_color = 'bg-danger';
                break;
            case 'canceled':
                $this->table_title = 'Canceled Applications';
                $this->table_title_bg_color = 'bg-warning';
                break;
            case 'revoked':
                $this->table_title = 'Revoked Applications';
                $this->table_title_bg_color = 'bg-danger';
                break;
        }
    }

    public function resetAllFilters()
    {
        $this->table_title = 'All Applications';
        $this->table_title_bg_color = 'bg-primary';
        $this->active_tab_class = 'active bg-secondary text-light';
        $this->inactive_tab_class = 'text-dark';
        $this->all_tab_class = 'text-dark';
        $this->status_filter = '';
        $this->tab_filter = 'active';
        $this->search = '';
    }

    public function resetToTabDefault()
    {
        $this->table_title = 'All Applications';
        $this->table_title_bg_color = 'bg-primary';
        $this->status_filter = '';
        $this->search = '';
    }


    public function warn($action, $id)
    {
        switch ($action) {
            case 'delete':
                $this->feedback_header = 'Confirm Deletion';
                $this->feedback = 'Are you sure you want to delete this application? This action is irrevasible.';
                $this->alert_class = 'alert-danger';
                $this->confirmed_action = 'deleteApplication';
                $this->confirmed_action_parameter = $id;
                $this->dispatchBrowserEvent('action_confirm');
                break;
            case 'reject':
                $this->feedback_header = 'Confirm Rejection';
                $this->feedback = 'Are you sure you want to reject this application? This action is irrevasible.';
                $this->alert_class = 'alert-warning';
                $this->confirmed_action = 'rejectApplication';
                $this->confirmed_action_parameter = $id;
                $this->dispatchBrowserEvent('action_confirm');
                break;
            case 'accept':
                $this->feedback_header = 'Confirm Acceptance';
                $this->feedback = 'Are you sure you want to accept this Application? The applicant will receive a letter of offer immediately.';
                $this->alert_class = 'alert-warning';
                $this->confirmed_action = 'acceptApplication';
                $this->confirmed_action_parameter = $id;
                $this->dispatchBrowserEvent('action_confirm');
                break;

        }
    }

    public function rejectApplication($id)
    {
        try {
            $application = Application::find($id);

            Application::where('id', $id)->update(
                [
                    'status' => 'rejected',
                    'date_replied' => \Carbon\Carbon::now(),
                ]
            );
            $applicant = $application->applicant;
            if ($applicant->engagement_level < 2) {
                $applicant->engagement_level = 2;
                $applicant->save();
            }
            $application->refresh();
            $message = 'Dear ' . $applicant->first_name . ', your application has been successfully Processed. Please follow the link below to get your response letter.';
            ApplicationReplied::dispatch($application, $message);
        } catch (\Exception $e) {
            $this->feedback_header = 'Error performing requested action!!';
            $this->feedback = 'Something went wrong. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
        }

        $this->feedback_header = 'Success!!';
        $this->feedback = 'Application rejected successfully';
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('action_feedback');

    }

    public function acceptApplication($id)
    {
        try {
            $application = Application::find($id);

            Application::where('id', $id)->update(
                [
                    'status' => 'accepted',
                    'date_replied' => \Carbon\Carbon::now(),
                ]
            );
            $applicant = $application->applicant;
            if ($applicant->engagement_level < 2) {
                $applicant->engagement_level = 2;
                $applicant->save();
            }
            $application->refresh();
            $message = 'Congratulations ' . $applicant->first_name . ', your application has been successfully Processed. Please follow the links below to get your response letter and offer acceptance form.
            You are expected to fill the acceptance form and upload a scanned copy of it on the upload link provided below ';
            ApplicationReplied::dispatch($application, $message);
        } catch (\Exception $e) {
            $this->feedback_header = 'Error performing requested action!!';
            $this->feedback = 'Something went wrong. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
        }

        $this->feedback_header = 'Success!!';
        $this->feedback = 'Application accepted successfully';
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('action_feedback');

    }

    public function revokeApplicationAcceptance($id)
    {
        $this->validate();
        try {
            $application = Application::find($id);

            Application::where('id', $id)->update(
                [
                    'status' => 'revoked',
                    'date_replied' => \Carbon\Carbon::now(),
                ]
            );
            $application->refresh();
            if ($application->applicant->engagement_level < 3) {
                $application->applicant->engagement_level = 3;
                $application->applicant->save();
            }
            $message = 'Dear ' . $application->applicant->first_name . ', Due to reasons detailed in the letter accessible via the link below, your application acceptance for the post (' . $application->advert->title . ') has been revoked.
            You may contact us for more information.';
            ApplicationReplied::dispatch($application, $message, $this->revocation_reasons);
        } catch (\Exception $e) {
            $this->feedback_header = 'Error performing requested action!!';
            $this->feedback = 'Something went wrong. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
        }

        $this->feedback_header = 'Success!!';
        $this->feedback = 'Application acceptance revoked successfully';
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('action_feedback');

    }

    public function deleteApplication($id)
    {
        try {
            Application::where('id', $id)->destroy();
        } catch (\Exception $e) {
            $this->feedback_header = 'Error performing requested action!!';
            $this->feedback = 'Something went wrong. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
        }

        $this->feedback_header = 'Success!!';
        $this->feedback = 'Application deleted successfully';
        $this->alert_class = 'alert-success';
        $this->dispatchBrowserEvent('action_feedback');

    }

}