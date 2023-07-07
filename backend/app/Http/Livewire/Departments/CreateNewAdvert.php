<?php

namespace App\Http\Livewire\Departments;

use App\Models\Advert;
use App\Models\AdvertAccompaniment;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreateNewAdvert extends Component
{
    public $feedback;
    public $alert_class;
    public $alert_type;
    public $feedback_header;
    public $confirmed_action;
    public $title;
    public $description;
    public $year;
    public $how_to_apply;
    public $cohort1_vacancies;
    public $cohort2_vacancies;
    public $cohort3_vacancies;
    public $cohort4_vacancies;
    public Collection $gen_reqs;
    public Collection $prof_reqs;
    public Collection $intern_responsibilities;
    private $advert;
    private $advert_id;
    private $department;

    protected $rules = [
        'title' => 'required|string',
        'description' => 'required|string',
        'how_to_apply' => 'required',
        'cohort1_vacancies' => 'required| min:0|numeric',
        'cohort2_vacancies' => 'required|min:0|numeric',
        'cohort3_vacancies' => 'required|min:0|numeric',
        'cohort4_vacancies' => 'required|min:0|numeric',
        'gen_reqs.*.gen_req' => 'required',
        'prof_reqs.*.prof_req' => 'required',
        'intern_responsibilities.*.intern_responsibility' => 'required',
    ];
    protected $validationAttributes = [
        'gen_reqs.*.gen_req' => 'general requirement',
        'prof_reqs.*.prof_req' => 'professional requirement',
        'intern_responsibilities.*.intern_responsibility' => 'intern responsibility'
    ];
    public function mount()
    {
        $this->fill([
            'gen_reqs' => collect([['gen_req' => '']]),
            'prof_reqs' => collect([['prof_req' => '']]),
            'intern_responsibilities' => collect([['intern_responsibility' => '']]),
            'year' => (date('Y') . '/' . date('Y') + 1),
        ]);
    }

    public function setYear($year)
    {
        $this->year = $year;
    }
    public function addInput($field)
    {
        switch ($field) {
            case 'gen_req':
                $this->gen_reqs->push(['gen_req' => '']);
                break;
            case 'prof_req':
                $this->prof_reqs->push(['prof_req' => '']);
                break;
            case 'intern_responsibility':
                $this->intern_responsibilities->push(['intern_responsibility' => '']);
                break;

        }
    }
    public function removeInput($key, $field)
    {

        switch ($field) {
            case 'gen_req':
                $this->gen_reqs->pull($key);
                break;
            case 'prof_req':
                $this->prof_reqs->pull($key);
                break;
            case 'intern_responsibility':
                $this->intern_responsibilities->pull($key);
                break;

        }
    }
    public function render()
    {
        return view('livewire.departments.create-new-advert');
    }

    public function createAdvert()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $user = auth()->user();
            $this->department = $user->departmentAdmin->department;
            $this->advert = Advert::create([
                'title' => $this->title,
                'department_id' => $this->department->id,
                'description' => $this->description,
                'year' => $this->year,
                'how_to_apply' => $this->how_to_apply,
                'cohort1_vacancies' => $this->cohort1_vacancies,
                'cohort2_vacancies' => $this->cohort2_vacancies,
                'cohort3_vacancies' => $this->cohort3_vacancies,
                'cohort4_vacancies' => $this->cohort4_vacancies,
                'author' => $user->departmentAdmin->first_name . ' ' . $user->departmentAdmin->last_name
            ]);
            if (count($this->gen_reqs)) {
                $this->gen_reqs->map(function ($gen_req, $key) {
                    AdvertAccompaniment::create([
                        'advert_id' => $this->advert->id,
                        'value' => $this->gen_reqs[$key]['gen_req'],
                        'type' => 'general_requirement',
                    ]);
                });
            }
            if (count($this->prof_reqs)) {
                $this->prof_reqs->map(function ($prof_req, $key, ) {
                    AdvertAccompaniment::create([
                        'advert_id' => $this->advert->id,
                        'value' => $this->prof_reqs[$key]['prof_req'],
                        'type' => 'professional_requirement',
                    ]);
                });
            }
            if (count($this->intern_responsibilities)) {
                $this->intern_responsibilities->map(function ($intern_responsibility, $key) {
                    AdvertAccompaniment::create([
                        'advert_id' => $this->advert->id,
                        'value' => $this->intern_responsibilities[$key]['intern_responsibility'],
                        'type' => 'intern_responsibility',
                    ]);
                });
            }
            DB::commit();
            $this->advert->reference_number = $this->year . '-' . $this->department->name . '#Advert' . $this->advert->id;
            $this->advert->save();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->feedback_header = 'Error Adding Advert!!';
            $this->feedback = 'Something went wrong while creating the advert. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('advert_action_feedback');
            return;
        }
        // $this->request_feedback_header = 'Success!!';
        // $this->request_feedback = 'Advert added successfully';
        // $this->request_success = 1;
        // $this->dispatchBrowserEvent('advert_action');
        return redirect('/departments/view-advert/' . $this->advert->id);
    }
}