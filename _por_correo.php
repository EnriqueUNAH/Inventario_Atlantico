<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 
// Load Composer's autolveder
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

   include('db.php');
   $nombre=strtoupper($_POST['persona']);
    $consultar = mysqli_query( $conexion , "SELECT Correo_Electronico FROM tbl_ms_usuario WHERE Usuario='$nombre'" );
    while ($otra=mysqli_fetch_array( $consultar )) {
        # code...
        $correo=$otra['Correo_Electronico'];
    }
    $consulta_id="SELECT Id_Usuario FROM tbl_ms_usuario WHERE Usuario='$nombre'";
    $resultado_=mysqli_query( $conexion , $consulta_id );
    while ($otra__=mysqli_fetch_array( $resultado_ )) {
        # code...
        $filas=$otra__['Id_Usuario'];
    }
    $fechaC= date('Y-m-d');

    $consulta_id_parametro="SELECT * FROM tbl_ms_parametros";
    $resultado__=mysqli_query( $conexion , $consulta_id_parametro );
    $filas_=mysqli_num_rows( $resultado__ );

    $consulta_contra="SELECT Contrasena FROM tbl_ms_usuario WHERE Usuario='$nombre'";
    $resultado_=mysqli_query( $conexion , $consulta_contra );
    while ($otra_=mysqli_fetch_array( $resultado_ )) {
        # code...
        $contra=$otra_['Contrasena'];
    }

if (isset($_POST['btnCorreo']) and $filas) {
    //Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'implementacion_PACIII@hotmail.com';                     //SMTP username
        $mail->Password   = 'xonmqmhhzjxjmsta';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('implementacion_PACIII@hotmail.com', 'Mailer');
        $mail->addAddress($correo);     //Add a recipient
    
        //Content
        $mail->isHTML(FALSE);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    =  $contra;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    

    $insertar="INSERT INTO tbl_ms_parametros VALUES('$filas_','ADMIN_VIGENCIA','30','$filas','$fechaC','$fechaC')";
    mysqli_query( $conexion , $insertar );



    echo '<script>alert("CORREO ENVIADO CON EXITO");</script>';
    include('login.html');
    
}


if (isset($_POST['btnPregunta']) and $filas) {
    include('preguntas_recuperar.html');
}
?>