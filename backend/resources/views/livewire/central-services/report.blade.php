<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table {
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 5px;
        }

        div.iso-logo-container {
            position: relative;
            width: 90%;
            margin: auto;
            height: 80px;
            display: flex;
            align-items: end;
            justify-content: center;
        }

        div.iso-logo-container #left-image {
            position: absolute;
            top: -45px;
            left: 0px;
            width: 80px;
        }

        div.iso-logo-container #right-image {
            position: absolute;
            top: -45px;
            right: 0px;
            width: 80px;
        }

        .footer-div {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            bottom: 0;
            padding-bottom: 20px;
        }

        .page .page-number:after {
            content: counter(page);
        }
    </style>
</head>

<body>
    {{-- <div class="page">
        <span class="page-number">Page </span>
    </div> --}}
    <div>
        <header class="header">
            <div align="center" class="logo justified">
                <img src="assets/static/logo.png" width="120">
            </div>
            <div align="center" class="justified">
                <h3>JOMO KENYATTA UNIVERSITY OF AGRICULTURE AND TECHNOLOGY</h3>
            </div>
            <div align="center" class="justified">
                <p class="justified">P.O. BOX 62000-00200, CITY SQUARE, NAIROBI, KENYA.<br>TELEPHONE: (067)
                    52711/52181-4. FAX: 52164, THIKA</p>
            </div>
        </header>
        <section class="">
            <div class="page-title">
                <h2>Attachee {{ $quarter !== null ? 'Quarterly' : 'Annual' }} Attendance Report</h2>
                <h4>{{ $year }}{{ $department_name !== '' ? '-' . $department_name : '-All Departments' }}{{ $quarter !== null ? '/Q' . $quarter : '/All Quarters' }}
                </h4>
            </div>
            <div class="container-fluid">
                <table>
                    <thead>
                        <tr>
                            <th class="" scope="col">ATTACHEE NAME</th>
                            <th scope="col">CONTACT</th>
                            <th scope="col">ID/NO</th>
                            <th scope="col">GENDER</th>
                            <th scope="col">PWDS</th>
                            <th scope="col">INSTITUTION</th>
                            <th scope="col">SECTION ATTACHED</th>
                            <th scope="col">AREA OF STUDY</th>
                            <th scope="col">LEVEL OF EDUCATION</th>
                            <th class="" scope="col">Date Started</th>
                            <th class="" scope="col">Date Ended</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($attachees)
                            @foreach ($attachees as $attachee)
                                <tr>
                                    <td>{{ $attachee->applicant->first_name }}&nbsp;
                                        {{ $attachee->applicant->second_name }}
                                    </td>
                                    <td>{{ $attachee->applicant->phone_number }}</td>
                                    <td>{{ $attachee->applicant->national_id }}</td>
                                    <td>{{ $attachee->applicant->applicantBiodata->gender }}</td>
                                    <td>
                                        @php
                                            echo $attachee->applicant->applicantBiodata->disability == null ? 'No' : 'Yes';
                                        @endphp
                                    </td>
                                    <td>{{ $attachee->applicant->institution }}</td>
                                    <td>{{ $attachee->department->name }}</td>
                                    <td>{{ $attachee->applicant->applicantBiodata->course_of_study }}</td>
                                    <td>{{ $attachee->applicant->applicantBiodata->level_of_study }}</td>
                                    <td>{{ date_format(date_create($attachee->date_started), 'd/m/y') }}</td>
                                    <td>{{ date_format(date_create($attachee->date_terminated), 'd/m/y') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">

                                    <h2>Nothing to show</h2>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <!-- Script for setting page number on every page -->
    <script type="text/php">

        if ( isset($pdf) ) {

        $size = 10;
        $color = array(0,0,0);
        if (class_exists('Font_Metrics')) {
            $font = Font_Metrics::get_font("helvetica");
            $text_height = Font_Metrics::get_font_height($font, $size);
            $width = Font_Metrics::get_text_width("Page 1 of 2", $font, $size);
        } elseif (class_exists('Dompdf\\FontMetrics')) {
            $font = $fontMetrics->getFont("helvetica");
            $text_height = $fontMetrics->getFontHeight($font, $size);
            $width = $fontMetrics->getTextWidth("Page 1 of 2", $font, $size);
        }

        $foot = $pdf->open_object();
        
        $w = $pdf->get_width();
        $h = $pdf->get_height();

        // Draw a line along the bottom
        $y = $h - $text_height - 24;
        $pdf->line(16, $y, $w - 16, $y, $color, 0.5);

        $pdf->close_object();
        $pdf->add_object($foot, "all");

        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";  

        // Center the text
        $pdf->page_text($w / 2 - $width / 2, $y, $text, $font, $size, $color);
}
</script>

    <footer>
        <div align="center" class="footer-div">
            <div class="iso-logo-container">
                <img src="assets/static/iso-9001.jpg" id="left-image">
                <img src="assets/static/iso14001.png" alt="" id="right-image">
                <div>
                    <p align="center">JKUAT is ISO 9001:2015 and ISO 14001:2015 Certified<br>
                        Setting Trends in Higher Education, Research, Innovation and Entrepreneurship</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
