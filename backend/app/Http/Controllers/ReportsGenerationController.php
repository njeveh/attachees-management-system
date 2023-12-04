<?php

namespace App\Http\Controllers;

use App\Models\Attachee;
use App\Models\Department;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use PDF;

class ReportsGenerationController extends Controller
{
    public function downloadReport(Request $request)
    {
        $department = $request->department;
        if ($department != null)
        {
            $department_name = Department::find($department)->name;
        }
        else
        {
            $department_name = '';
        }
        $year = $request->year;
        $quarter = $request->quarter;
        $attachees = Attachee::where('year', $year)
            ->when($quarter, function ($query, $quarter) {
                return $query->where('quarter', $quarter);
            })
            ->when($department, function ($query, $department) {
                return $query->where('department_id', $department);
            })->get();
        if (!$attachees->count()) {
            return back()->with('message', "No data to download");
        }
        try {
            $dompdf = new PDF();
            $dompdf = PDF::loadView('livewire.central-services.report', ['attachees' => $attachees, 'year' => $year,
            'quarter' => $quarter, 'department_name' => $department_name,]);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            return $dompdf->stream();
        } catch (\Exception $e) {
            //\Log::info($e);
            return back()->with('message', 'Something went wrong, please try again.');
        }
    }
}