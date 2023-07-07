<?php

namespace App\Http\Livewire\CentralServices;

use App\Models\Attachee;
use App\Models\Department;
use App\Utilities\Utilities;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use PDF;
use Livewire\Component;
use Livewire\WithPagination;

class GenerateReports extends Component
{
    use WithPagination;
    public $departments;
    public $department;
    public $year;
    public $cohort;
    protected $attachees;
    public function mount()
    {
        $this->departments = Department::all();
        if (date('n') > 6) {
            $this->year = date('Y') . '/' . date('Y') + 1;
        } else {
            $this->year = date('Y') - 1 . '/' . date('Y');
        }
        $this->cohort = Utilities::get_current_quarter_data()['quarter'];
        $this->department = "";
    }
    public function render()
    {
        $this->attachees = Attachee::where(function ($query) {
            $query->when($this->department != "", (function ($query) {
                return $query->where('department_id', $this->department);
            }))
                ->when($this->year != null, (function ($query) {
                    return $query->where('year', $this->year);
                }))
                ->when(
                    $this->cohort != null,
                    (function ($query) {
                        return $query->where('cohort', $this->cohort);
                    })
                );
        })->paginate(50);
        return view('livewire.central-services.generate-reports', ['attachees' => $this->attachees]);
    }
    public function downloadAcceptanceLetters()
    {
        try {
            $attachees = Attachee::where(function ($query) {
                $query->when($this->department != "", (function ($query) {
                    return $query->where('department_id', $this->department);
                }))
                    ->when($this->year != null, (function ($query) {
                        return $query->where('year', $this->year);
                    }))
                    ->when(
                        $this->cohort != null,
                        (function ($query) {
                            return $query->where('cohort', $this->cohort);
                        })
                    );
            })->get();
            $zip = new \ZipArchive();
            //$tempFile = tmpfile();
            //$tempFileUri = stream_get_meta_data($tempFile)['uri'];
            $fileName = 'acceptance' . '_' . preg_replace('/\//', '_', $this->year) . '_' . 'cohort_' . $this->cohort . '.zip';
            if ($zip->open(public_path($fileName), \ZipArchive::CREATE) !== TRUE) {
                return back()->with('message', 'Sorry, something went wrong. Please try again. 1');
            }

            if ($attachees->count()) {
                foreach ($attachees as $attachee) {
                    $file = public_path('storage/' . $attachee->application->applicationAccompaniments->where('name', 'offer_acceptance_form')->first()->path);
                    if (!$zip->addFile($file, basename($file))) {
                        return back()->with('message', 'Sorry, something went wrong. Please try again. 2');
                    }
                }
                $zip->close();
                return response()->download($fileName);
            } else {
                return back()->with('message', 'No files to download.');
            }
        } catch (\Exception $e) {
            //\Log::info($e);
            return back()->with('message', 'Sorry, something went wrong. Please try again. 3');
            //return back()->with('message', public_path('storage/' . $attachee->application->applicationAccompaniments->where('name', 'offer_acceptance_form')->first()->path));
        }
    }
    public function download()
    {
        $zip = new \ZipArchive;

        $fileName = 'acceptance.zip';

        if ($zip->open(public_path($fileName), \ZipArchive::CREATE) === TRUE) {
            $files = \File::files(public_path('myFiles'));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(public_path($fileName));
    }
}