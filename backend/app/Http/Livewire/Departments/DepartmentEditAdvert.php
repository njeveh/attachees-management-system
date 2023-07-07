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

class DepartmentEditAdvert extends Component
{
    public $feedback;
    public $alert_class;
    public $feedback_header;
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
    public $advert;
    private $department;
    public $advert_id;

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
    public function mount($id)
    {
        $this->fill([
            'gen_reqs' => collect([]),
            'prof_reqs' => collect([]),
            'intern_responsibilities' => collect([]),
        ]);
        $this->advert_id = $id;
        $this->advert = Advert::find($id);
        $this->title = $this->advert->title;
        $this->description = $this->advert->description;
        $this->year = $this->advert->year;
        $this->how_to_apply = $this->advert->how_to_apply;
        $this->cohort1_vacancies = $this->advert->cohort1_vacancies;
        $this->cohort2_vacancies = $this->advert->cohort2_vacancies;
        $this->cohort3_vacancies = $this->advert->cohort3_vacancies;
        $this->cohort4_vacancies = $this->advert->cohort4_vacancies;
        $gen_reqs = $this->advert->accompaniments->where('type', 'general_requirement');
        $prof_reqs = $this->advert->accompaniments->where('type', 'professional_requirement');
        $responsibilities = $this->advert->accompaniments->where('type', 'intern_responsibility');
        $gen_reqs->map(function ($gen_req, $key) {
            $this->gen_reqs->push(['gen_req' => $gen_req->value, 'id' => $gen_req->id]);
        });
        $prof_reqs->map(function ($prof_req, $key) {
            $this->prof_reqs->push(['prof_req' => $prof_req->value, 'id' => $prof_req->id]);
        });
        $responsibilities->map(function ($responsibility, $key) {
            $this->intern_responsibilities->push(['intern_responsibility' => $responsibility->value, 'id' => $responsibility->id]);
        });
    }

    public function setYear($year)
    {
        $this->year = $year;
    }
    public function addInput($field)
    {
        switch ($field) {
            case 'gen_req':
                $this->gen_reqs->push(['gen_req' => '', 'id' => null]);
                break;
            case 'prof_req':
                $this->prof_reqs->push(['prof_req' => '', 'id' => null]);
                break;
            case 'intern_responsibility':
                $this->intern_responsibilities->push(['intern_responsibility' => '', 'id' => null]);
                break;

        }
    }
    public function removeInput($key, $field)
    {

        switch ($field) {
            case 'gen_req':
                if (!is_null($this->gen_reqs[$key]['id'])) {
                    if (AdvertAccompaniment::destroy($this->gen_reqs[$key]['id'])) {
                        $this->gen_reqs->pull($key);
                    } else {
                        $this->feedback_header = 'Error deleting field!!';
                        $this->feedback = 'Something went wrong. The general requirement could not be deleted from the database';
                        $this->alert_class = 'alert-danger';
                        $this->dispatchBrowserEvent('advert_action_feedback');
                    }
                } else {
                    $this->gen_reqs->pull($key);
                }
                break;
            case 'prof_req':
                if (!is_null($this->prof_reqs[$key]['id'])) {
                    if (AdvertAccompaniment::destroy($this->prof_reqs[$key]['id'])) {
                        $this->prof_reqs->pull($key);
                    } else {
                        $this->feedback_header = 'Error deleting field!!';
                        $this->feedback = 'Something went wrong. The professional requirement could not be deleted from the database';
                        $this->alert_class = 'alert-danger';
                        $this->dispatchBrowserEvent('advert_action_feedback');
                    }
                } else {
                    $this->prof_reqs->pull($key);
                }
                break;
            case 'intern_responsibility':
                if (!is_null($this->intern_responsibilities[$key]['id'])) {
                    if (AdvertAccompaniment::destroy($this->intern_responsibilities[$key]['id'])) {
                        $this->intern_responsibilities->pull($key);
                    } else {
                        $this->feedback_header = 'Error deleting field!!';
                        $this->feedback = 'Something went wrong. The intern responsibility could not be deleted from the database';
                        $this->alert_class = 'alert-danger';
                        $this->dispatchBrowserEvent('advert_action_feedback');
                    }
                } else {
                    $this->intern_responsibilities->pull($key);
                }
                break;

        }
    }
    public function render()
    {
        return view('livewire.departments.department-edit-advert');
    }

    public function updateAdvert()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $this->department = auth()->user()->departmentAdmin->department;
            Advert::where('id', $this->advert_id)
                ->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'year' => $this->year,
                    'how_to_apply' => $this->how_to_apply,
                    'cohort1_vacancies' => $this->cohort1_vacancies,
                    'cohort2_vacancies' => $this->cohort2_vacancies,
                    'cohort3_vacancies' => $this->cohort3_vacancies,
                    'cohort4_vacancies' => $this->cohort4_vacancies,
                ]);
            if (count($this->gen_reqs)) {
                $this->gen_reqs->map(function ($gen_req, $key) {
                    if (!is_null($this->gen_reqs[$key]['id'])) {
                        AdvertAccompaniment::where('id', $this->gen_reqs[$key]['id'])->update([
                            'value' => $this->gen_reqs[$key]['gen_req'],
                        ]);
                    } else {
                        AdvertAccompaniment::create([
                            'advert_id' => $this->advert->id,
                            'value' => $this->gen_reqs[$key]['gen_req'],
                            'type' => 'general_requirement',
                        ]);
                    }
                });
            }
            if (count($this->prof_reqs)) {
                $this->prof_reqs->map(function ($prof_req, $key) {
                    if (!is_null($this->prof_reqs[$key]['id'])) {
                        AdvertAccompaniment::where('id', $this->prof_reqs[$key]['id'])->update([
                            'value' => $this->prof_reqs[$key]['prof_req'],
                        ]);
                    } else {
                        AdvertAccompaniment::create([
                            'advert_id' => $this->advert->id,
                            'value' => $this->prof_reqs[$key]['prof_req'],
                            'type' => 'professional_requirement',
                        ]);
                    }
                });
            }
            if (count($this->intern_responsibilities)) {
                $this->intern_responsibilities->map(function ($intern_responsibility, $key) {
                    if (!is_null($this->intern_responsibilities[$key]['id'])) {
                        AdvertAccompaniment::where('id', $this->intern_responsibilities[$key]['id'])->update([
                            'value' => $this->intern_responsibilities[$key]['intern_responsibility'],
                        ]);
                    } else {
                        AdvertAccompaniment::create([
                            'advert_id' => $this->advert->id,
                            'value' => $this->intern_responsibilities[$key]['intern_responsibility'],
                            'type' => 'intern_responsibility',
                        ]);
                    }
                });
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->feedback_header = 'Error editing Advert!!';
            $this->feedback = 'Something went wrong while editing the advert. Please try again and if the error persists contact support team to resolve the issue';
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