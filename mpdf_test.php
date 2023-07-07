<?php

use Mpdf\Mpdf;

require_once __DIR__ . '/vendor/autoload.php';

try {
    $mpdf = new Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
    $mpdf->WriteHTML('<h1>Hello world!</h1>');
    // Other code
    $mpdf->Output();
} catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception name used for catch
    // Process the exception, log, print etc.
    echo $e->getMessage();
}
