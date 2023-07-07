<?php

namespace App\Utilities;

use Illuminate\Support\Facades\Storage;
use PDF; //PDF is an aliase to Barryvdh\DomPDF\Facade::class configured in /config/app.php 

class Utilities
{


    /**
     * get all quarters data
     * @return array
     */
    public static function get_quarters_data()
    {
        $quarter4_start_date = date_format(date_create('1-04-' . date('Y')), 'jS-M-Y');
        $quarter4_end_date = date_format(date_create('30-06-' . date('Y')), 'jS-M-Y');
        $quarter4_application_deadline = date_format(date_create('31-March-' . date('Y')), 'jS-M-Y');
        $quarter1_start_date = date_format(date_create('1-07-' . date('Y')), 'jS-M-Y');
        $quarter1_end_date = date_format(date_create('30-09-' . date('Y')), 'jS-MY');
        $quarter1_application_deadline = date_format(date_create('30-June-' . date('Y')), 'jS-M-Y');
        $quarter2_start_date = date_format(date_create('1-10-' . date('Y')), 'jS-M-Y');
        $quarter2_end_date = date_format(date_create('31-12-' . date('Y')), 'jS-M-Y');
        $quarter2_application_deadline = date_format(date_create('30-09-' . date('Y')), 'jS-M-Y');
        $quarter3_start_date = date_format(date_create('1-01-' . date('Y') + 1), 'jS-M-Y');
        $quarter3_end_date = date_format(date_create('31-03-' . date('Y') + 1), 'jS-M-Y');
        $quarter3_application_deadline = date_format(date_create('31-12-' . date('Y')), 'jS-M-Y');

        return array(
            1 => [
                'quarter' => 1,
                'start_date' => $quarter1_start_date,
                'end_date' => $quarter1_end_date,
                'application_deadline' => $quarter1_application_deadline,
            ],
            2 => [
                'quarter' => 2,
                'start_date' => $quarter2_start_date,
                'end_date' => $quarter2_end_date,
                'application_deadline' => $quarter2_application_deadline,
            ],
            3 => [
                'quarter' => 3,
                'start_date' => $quarter3_start_date,
                'end_date' => $quarter3_end_date,
                'application_deadline' => $quarter3_application_deadline,
            ],
            4 => [
                'quarter' => 4,
                'start_date' => $quarter4_start_date,
                'end_date' => $quarter4_end_date,
                'application_deadline' => $quarter4_application_deadline,
            ],
        );
    }
    /**
     * get data for next quarter
     */
    public static function get_next_quarter_data()
    {
        $month = date("n");
        //Calculate the year quarter.
        $yearQuarter = ceil($month / 3);
        switch ($yearQuarter) {
            case 1:
                return self::get_quarters_data()[4];
            case 2:
                return self::get_quarters_data()[1];
            case 3:
                return self::get_quarters_data()[2];
            case 4:
                return self::get_quarters_data()[3];
        }

    }

    /**
     * get data for next quarter
     */
    public static function get_current_quarter_data()
    {
        $month = date("n");
        //Calculate the year quarter.
        $yearQuarter = ceil($month / 3);
        switch ($yearQuarter) {
            case 1:
                return self::get_quarters_data()[3];
            case 2:
                return self::get_quarters_data()[4];
            case 3:
                return self::get_quarters_data()[1];
            case 4:
                return self::get_quarters_data()[2];
        }

    }

    public static function generateReport($data)
    {
        try {
            $dompdf = new PDF();
            $dompdf = PDF::loadView('livewire.central-services.report', ['attachees' => $data]);
            $dompdf->render();
            return $dompdf->stream();
        } catch (\Exception $e) {
            \Log::info($e);
        }
        return;

    }
}