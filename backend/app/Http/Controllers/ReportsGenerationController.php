<?php

namespace App\Http\Controllers;

use App\Models\Attachee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use PDF;

class ReportsGenerationController extends Controller
{
    public function downloadReport(Request $request)
    {
        $department = $request->department;
        $year = $request->year;
        $cohort = $request->cohort;
        $attachees = Attachee::where('year', $year)
            ->where('cohort', $cohort)
            ->when($department, function ($query, $department) {
                return $query->where('department_id', $department);
            })->get();
        if (!$attachees->count()) {
            return back()->with('message', "No data to download");
        }
        try {
            $dompdf = new PDF();
            $dompdf = PDF::loadView('livewire.central-services.report', ['attachees' => $attachees]);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            return $dompdf->stream();
        } catch (\Exception $e) {
            //\Log::info($e);
            return back()->with('message', 'Something went wrong, please try again.');
        }
    }
}