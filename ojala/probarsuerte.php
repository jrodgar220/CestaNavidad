<?php
require "vendor/autoload.php";
use GuzzleHttp\Client;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $destinatario = $_POST["cuerpo"];
  
    $client = new Client();
    
    $response = $client->request('GET', 'http://correo/Enviador.php/?destinatario='.$destinatario);
    var_dump($response);
    


} else {
    // Redireccionar si se accede directamente a este script sin enviar el formulario
    header("Location: index.php");
    exit();
}
?>
