<?php

require 'vendor/autoload.php';

use Dompdf\Dompdf;

use Dompdf\Options;

$options = new Options();

$options->set('chroot', realpath(''));

$dompdf = new Dompdf($options);

$html = file_get_contents("template.html");

$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream();
