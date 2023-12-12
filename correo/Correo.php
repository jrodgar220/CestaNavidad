<?php
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;


class Correo {
    private $mail;
    public function __construct() {
        $this->mail = new PHPMailer();
        $this->mail->IsSMTP();
        $this->mail->SMTPDebug  = 2;
        $this->mail->SMTPAuth   = true;
        $this->mail->SMTPSecure = "tls";
        $this->mail->Host       = "smtp.gmail.com";
        $this->mail->Port       = 587;
        $this->mail->Username   = "jmrg00021@gmail.com";
        $this->mail->Password   = "akei dyux xzpo mriu";
        $this->mail->SetFrom('jmrg00021@gmail.com', 'Juana');
    }

    public function enviarCorreo($destinatario, $asunto, $cuerpo, $adjunto = null) {
        $this->mail->Subject = $asunto;
        $this->mail->MsgHTML($cuerpo);

        if ($adjunto !== null) {
            $this->mail->addStringAttachment($adjunto, 'archivo.pdf', 'base64', 'application/pdf');
        }

        $this->mail->AddAddress($destinatario);
        
        $resultado = $this->mail->Send();
        if (!$resultado) {
            return "Error: " . $this->mail->ErrorInfo;
        } else {
            return "Enviado";
        }
    }
}
?>