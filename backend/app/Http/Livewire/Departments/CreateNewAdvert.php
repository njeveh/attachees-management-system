<?php

namespace App\Http\Livewire\Departments;

use App\Models\Advert;
use App\Models\AdvertAccompaniment;
use App\Models\StudyArea;
use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreateNewAdvert extends Component
{
    public $feedback;
    public $alert_class;
    public $alert_type;
    public $feedback_header;
    public $confirmed_action;
    public $description;
    public $year;
    public $quarter1_vacancies;
    public $quarter2_vacancies;
    public $quarter3_vacancies;
    public $quarter4_vacancies;
    public Collection $requirements;
    private $advert;
    private $advert_id;
    public $study_areas;
    public $study_area;
    private $department;

    protected $rules = [
        'description' => 'required|string',
        'year' => 'required',
        'quarter1_vacancies' => 'required| min:0|numeric',
        'quarter2_vacancies' => 'required|min:0|numeric',
        'quarter3_vacancies' => 'required|min:0|numeric',
        'quarter4_vacancies' => 'required|min:0|numeric',
        'requirements.*.requirement' => 'required',
    ];
    protected $validationAttributes = [
        'requirements.*.requirement' => 'requirement',
    ];
    public function mount()
    {
        $this->study_areas = auth()->user()->departmentAdmin->department->studyAreas;
        $this->description = $this->study_areas[0]->description;
        $this->study_area = $this->study_areas[0]->id;
        $this->fill([
            'requirements' => collect([]),
            'year' => (date('Y') . '/' . date('Y') + 1),
        ]);
        $requirements = $this->study_areas[0]->studyAreaAccompaniments->where('type', 'general_requirement');
        $requirements->map(function ($requirement, $key) {
            $this->requirements->push(['requirement' => $requirement->value, 'id' => $requirement->id]);
        });
    }

    public function setYear($year)
    {
        $this->year = $year;
    }
    public function addInput($field)
    {
        switch ($field) {
            case 'requirement':
                $this->requirements->push(['requirement' => '']);
                break;

        }
    }
    public function removeInput($key, $field)
    {

        switch ($field) {
            case 'requirement':
                $this->requirements->pull($key);
                break;

        }
    }
    public function render()
    {
        return view('livewire.departments.create-new-advert');
    }

    public function updatedStudyArea()
    {
        $study_area = StudyArea::find($this->study_area);
        $this->description = $study_area->description;
        $this->requirements = collect([]);
        $requirements = $study_area->studyAreaAccompaniments->where('type', 'general_requirement');
        $requirements->map(function ($requirement, $key) {
            $this->requirements->push(['requirement' => $requirement->value, 'id' => $requirement->id]);
        });
    }

    public function createAdvert()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $user = auth()->user();
            $this->department = $user->departmentAdmin->department;
            $this->advert = Advert::create([
                'department_id' => $this->department->id,
                'study_area_id' => $this->study_area,
                'description' => $this->description,
                'year' => $this->year,
                'quarter1_vacancies' => $this->quarter1_vacancies,
                'quarter2_vacancies' => $this->quarter2_vacancies,
                'quarter3_vacancies' => $this->quarter3_vacancies,
                'quarter4_vacancies' => $this->quarter4_vacancies,
                'author' => $user->departmentAdmin->first_name . ' ' . $user->departmentAdmin->last_name
            ]);
            if (count($this->requirements)) {
                $this->requirements->map(function ($requirement, $key) {
                    AdvertAccompaniment::create([
                        'advert_id' => $this->advert->id,
                        'value' => $this->requirements[$key]['requirement'],
                        'type' => 'requirement',
                    ]);
                });
            }
            Log::info(1);
            DB::commit();
            $this->advert->reference_number = $this->year . '-' . $this->department->name . '#Advert' . $this->advert->id;
            $this->advert->save();
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();
            $this->feedback_header = 'Error Creating Advert!!';
            $this->feedback = 'Something went wrong while creating the advert. Please try again and if the error persists contact support team to resolve the issue';
            $this->alert_class = 'alert-danger';
            $this->dispatchBrowserEvent('action_feedback');
            return;
        }
        return redirect('/departments/view-advert/' . $this->advert->id);
    }
}