<?php

namespace App\Utilities;


class Utilities{


    /**
     * get the next year-quarter information
     */
    public static function get_next_year_quarter_data()
    {
        $month = date("n");
        //Calculate the year quarter.
        $yearQuarter = ceil($month / 3);
        switch ($yearQuarter){
            case 1:
                $next_quarter = 4;
                $start_date = date_format(date_create('1-04-'.date('Y')), 'jS-M-Y');
                $end_date = date_format(date_create('30-06-'.date('Y')), 'jS-M-Y');
                $application_deadline = date_format(date_create('31-March-'.date('Y')), 'jS-M-Y');
                break;
            case 2:
                $next_quarter = 1;
                $start_date = date_format(date_create('1-07-'.date('Y')), 'jS-M-Y');
                $end_date = date_format(date_create('30-09-'.date('Y')), 'jS-MY');
                $application_deadline = date_format(date_create('30-June-'.date('Y')), 'jS-M-Y');
                break;
            case 3:
                $next_quarter = 2;
                $start_date = date_format(date_create('1-10-'.date('Y')), 'jS-M-Y');
                $end_date = date_format(date_create('31-12-'.date('Y')), 'jS-M-Y');
                $application_deadline = date_format(date_create('30-09-'.date('Y')), 'jS-M-Y');
                break;
            case 4:
                $next_quarter = 3;
                $start_date = date_format(date_create('1-01-'.date('Y') + 1), 'jS-M-Y');
                $end_date = date_format(date_create('31-03-'.date('Y') + 1), 'jS-M-Y');
                $application_deadline = date_format(date_create('31-12-'.date('Y')), 'jS-M-Y');
                break;
        }
        return ([
            'next_quarter' => $next_quarter,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'application_deadline' => $application_deadline,
        ]);

    }
}