<?php

namespace App\Http\Livewire\Departments;

use App\Models\Advert;
use App\Models\AdvertAccompaniment;
use App\Models\StudyArea;
use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DepartmentEditAdvert extends Component
{
    public $feedback;
    public $alert_class;
    public $feedback_header;
    public $study_area;
    public $study_areas;
    public $description;
    public $year;
    public $how_to_apply;
    public $quarter1_vacancies;
    public $quarter2_vacancies;
    public $quarter3_vacancies;
    public $quarter4_vacancies;
    public Collection $requirements;
    public Collection $prof_reqs;
    public Collection $intern_responsibilities;
    public $advert;
    private $department;
    public $advert_id;

    protected $rules = [
        'year' => 'required',
        'description' => 'required|string',
        'quarter1_vacancies' => 'required| min:0|numeric',
        'quarter2_vacancies' => 'required|min:0|numeric',
        'quarter3_vacancies' => 'required|min:0|numeric',
        'quarter4_vacancies' => 'required|min:0|numeric',
        'requirements.*.requirement' => 'required',
    ];
    protected $validationAttributes = [
        'requirements.*.requirement' => 'requirement',
    ];
    public function mount($id)
    {
        $this->study_areas = auth()->user()->departmentAdmin->department->studyAreas;
        $this->fill([
            'requirements' => collect([]),
        ]);
        $this->advert_id = $id;
        $this->advert = Advert::find($id);
        $this->study_area = $this->advert->study_area_id;
        $this->description = $this->advert->description;
        $this->year = $this->advert->year;
        $this->quarter1_vacancies = $this->advert->quarter1_vacancies;
        $this->quarter2_vacancies = $this->advert->quarter2_vacancies;
        $this->quarter3_vacancies = $this->advert->quarter3_vacancies;
        $this->quarter4_vacancies = $this->advert->quarter4_vacancies;
        $requirements = $this->advert->advertAccompaniments->where('type', 'requirement');
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
                $this->requirements->push(['requirement' => '', 'id' => null]);
                break;

        }
    }
    public function removeInput($key, $field)
    {

        switch ($field) {
            case 'requirement':
                if (!is_null($this->requirements[$key]['id'])) {
                    if (AdvertAccompaniment::destroy($this->requirements[$key]['id'])) {
                        $this->requirements->pull($key);
                    } else {
                        $this->feedback_header = 'Error deleting field!!';
                        $this->feedback = 'Something went wrong. The general requirement could not be deleted from the database';
                        $this->alert_class = 'alert-danger';
                        $this->dispatchBrowserEvent('action_feedback');
                    }
                } else {
                    $this->requirements->pull($key);
                }
                break;

        }
    }
    public function render()
    {
        return view('livewire.departments.department-edit-advert');
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

    public function updateAdvert()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $this->department = auth()->user()->departmentAdmin->department;
            Advert::where('id', $this->advert_id)
                ->update([
                    'study_area_id' => $this->study_area,
                    'description' => $this->description,
                    'year' => $this->year,
                    'quarter1_vacancies' => $this->quarter1_vacancies,
                    'quarter2_vacancies' => $this->quarter2_vacancies,
                    'quarter3_vacancies' => $this->quarter3_vacancies,
                    'quarter4_vacancies' => $this->quarter4_vacancies,
                ]);
            if (count($this->requirements)) {
                $this->requirements->map(function ($requirement, $key) {
                    if (!is_null($this->requirements[$key]['id'])) {
                        AdvertAccompaniment::where('id', $this->requirements[$key]['id'])->update([
                            'value' => $this->requirements[$key]['requirement'],
                        ]);
                    } else {
                        AdvertAccompaniment::create([
                            'advert_id' => $this->advert->id,
                            'value' => $this->requirements[$key]['requirement'],
                            'type' => 'requirement',
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
            $this->dispatchBrowserEvent('action_feedback');
            return;
        }
        return redirect('/departments/view-advert/' . $this->advert->id);
    }
}