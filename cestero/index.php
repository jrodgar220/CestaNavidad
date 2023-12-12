<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;


function generarPDF($htmlContent, $outputFilename = 'output.pdf') {
    // Cargar la configuración de Dompdf
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);
    $options->set('chroot', "/var/www/html");

    // Inicializar Dompdf con las opciones
    $dompdf = new Dompdf($options);

    // Cargar el contenido HTML
    $dompdf->loadHtml($htmlContent);

    // Renderizar el PDF (output en el buffer de salida)
    $dompdf->render();

    // Obtener el contenido del PDF desde el buffer de salida
    $output = $dompdf->output();

    // Guardar el PDF en un archivo si es necesario
    // file_put_contents($outputFilename, $output);

    // Devolver el contenido del PDF
    return $output;
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['tipo'])){
        if($_GET['tipo']==="CONJAMON"){
            $htmlContent = '<html><body><h1>Aquí tienes tu cesta!</h1>'.
            '<img src="jamon.JPG"/>'.
           ' </body></html>';

        }else{
            $htmlContent = '<html><body><h1>Aquí tienes tu cesta!</h1></body></html>';

        }
    }
    $pdfContent = generarPDF($htmlContent);
    header('Content-Type: application/pdf');
    echo $pdfContent;
}




?>
