<?php
namespace App\Utilities;

use App\Models\Department;
use App\Models\Evaluation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportEvaluations implements FromCollection, WithHeadings
{
    public $records;
    public function __construct($records)
    {
        $this->records = $records;
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {


        $data = array();
        foreach ($this->records as $record) {
            $data = array(
                $record->year,
                $record->cohort,
                $record->course_being_pursued,
                Department::find($record->department_id)->name,
                $record->supervisor_name,
                $record->level_of_study,
                $record->attachment_duration,
            );
            array_push($data, ...$record->part1_quiz);
            array_push($data, ...$record->part2_quiz);
            array_push(
                $data,
                ...[
                    $record->recommendable_to_friends,
                    $record->reasons_if_not_recommendable,
                    $record->recommendations_to_university,
                ]
            );
        }
        return collect(array($data));
    }

    public function headings(): array
    {
        return [
            'Year',
            'Cohort',
            'Course Being Pursued',
            'Department Attached',
            'Supervisor Name',
            'Level Of Study',
            'Attachment Duration (weeks)',
            'part I quiz I',
            'part I quiz II',
            'part I quiz III',
            'part I quiz IV',
            'part I quiz V',
            'part I quiz VI',
            'part I quiz VII',
            'part II quiz I',
            'part II quiz II',
            'part II quiz III',
            'part II quiz IV',
            'part II quiz V',
            'part II quiz VI',
            'part II quiz VII',
            'Recommendable To Friends',
            'Reasons If Not Recommendable',
            'Recommendations to University',
        ];
    }

}