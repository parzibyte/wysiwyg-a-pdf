<?php
$payload = json_decode(file_get_contents("php://input"));
if (!$payload) {
    exit("No hay payload");
}
include_once "./vendor/autoload.php";

use Dompdf\Dompdf;

$html = $payload->html;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();
