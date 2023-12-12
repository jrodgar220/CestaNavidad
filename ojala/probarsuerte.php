<?php
require "vendor/autoload.php";
use GuzzleHttp\Client;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $destinatario = $_POST["cuerpo"];
    //Llamamos al contenedor que comprueba si el usuario existe y a continuación envía el mensaje
    $client = new Client();
    $response = $client->request('GET', 'http://correo/Enviador.php/?destinatario='.$destinatario);
    if($response->getBody()!=""){
        echo json_encode ("Has recibido tu cesta");
    }else{
        echo json_encode ("No has tenido suerte");

    }
    

} else {
    // Redireccionar si se accede directamente a este script sin enviar el formulario
    header("Location: index.php");
    exit();
}
?>
