<?php
require "vendor/autoload.php";
use GuzzleHttp\Client;

require_once "Correo.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if( isset($_GET ['destinatario'])){
        $nombre=$_GET ['destinatario'];
        //Primer comprueba si existe en la bd
       
            $conexion=new PDO("mysql:host=datos;dbname=usuariosdb", "root", "root");
            $query = "SELECT * FROM usuarios WHERE nombre = :nombre";
            $statement = $conexion->prepare($query);
            $statement->bindParam(':data',$nombre);
            $statement->execute();
            
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if($row){
                $correo = new Correo();
                $destinatario = $row ['correo'];
                $asunto = "Regalo de navidad";
                $cuerpo = "Esta es tu cesta de navidad";
                $adjunto = null;
                $resultadoEnvio = $correo->enviarCorreo($destinatario, $asunto, $cuerpo, $adjunto);
            }
          
            
        }
    
    
    
       
        
        
        //$client = new Client();
        //$response = $client->request('GET', 'http://pdfgenerator/index.php');
        //$adjunto= $response->getBody()->getContents();

        

    }


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST ['cuerpo']) && isset($_POST ['correos'])){
       
        //$destinatarios = $_GET ['destinatario'];
        $asunto = "Prueba";
        $correos = $_POST ['correos'];
        $cuerpo = $_POST ['cuerpo'];
        
        
        $correo = new Correo();
        foreach ($correos as $destinatario) {
            $resultadoEnvio = $correo->enviarCorreo($destinatario, $asunto, $cuerpo, null);

        }

    }

}

?>