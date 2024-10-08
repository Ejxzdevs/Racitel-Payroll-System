<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \mPDF('utf-8','A4','');
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();

?>