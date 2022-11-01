<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 
// Load Composer's autolveder
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

//$DesdeLetra = "a";
//$HastaLetra = "z";
//$desdeletra = "A";
//$hastaletra = "Z";
//$DesdeNumero = 1;
//$HastaNumero = 10000;
//$letraAleatoria = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
//$numeroAleatorio = rand($DesdeNumero, $HastaNumero);
//$contrasena_=$letraAleatoria.$numeroAleatorio;

$key = "";
$pattern = "1234567890abcdefghijklmñnopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ.-_*/=[]{}#@|~¬&()?¿";
$max = strlen($pattern)-1;
for($i = 0; $i < 8; $i++){
    $key .= substr($pattern, mt_rand(0,$max), 1);
}

   include('../Principal/db2.php');
   $nombre=strtoupper($_POST['persona']);
    $consultar = mysqli_query( $conexion2 , "SELECT Correo_Electronico FROM tbl_ms_usuario WHERE Usuario='$nombre'" );
    while ($otra=mysqli_fetch_array( $consultar )) {
        # code...
        $correo=$otra['Correo_Electronico'];
    }
    $consulta_id="SELECT Id_Usuario FROM tbl_ms_usuario WHERE Usuario='$nombre'";
    $resultado_=mysqli_query( $conexion2 , $consulta_id );
    while ($otra__=mysqli_fetch_array( $resultado_ )) {
        # code...
        $filas=$otra__['Id_Usuario'];
    }
    $fechaC= date('Y-m-d');

    //$consulta_id_parametro="SELECT * FROM tbl_ms_parametros";
    //$resultado__=mysqli_query( $conexion2 , $consulta_id_parametro );
    //$filas_=mysqli_num_rows( $resultado__ );
    //$filas_=$filas_+1;



    $actualizarContra = "UPDATE tbl_ms_usuario SET Contrasena = '$key' WHERE Id_Usuario='$filas'";
    mysqli_query( $conexion2 , $actualizarContra );

    $actualizarEstado = "UPDATE tbl_ms_usuario SET Estado_Usuario = 'RESETEO' WHERE Id_Usuario='$filas'";
    mysqli_query( $conexion2 , $actualizarEstado );
$body="";
$body .='<!DOCTYPE html>';
$body .='<html lang="es" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">';
$body.='<head>';
$body.='<meta charset="UTF-8">';
$body.=' <meta name="viewport" content="width=device-width,initial-scale=1">';
$body.='<meta name="x-apple-disable-message-reformatting">';
$body.='<title></title>';
$body.='<!--[if mso]>';
$body.='<noscript>';
$body.='<xml>';
$body.='<o:OfficeDocumentSettings>';
$body.='<o:PixelsPerInch>96</o:PixelsPerInch>';
$body.='</o:OfficeDocumentSettings>';
$body.='</xml>';
$body.='</noscript>';
$body.='<![endif]-->';
$body.='<style>';
$body.='table, td, div, h1, p {font-family: Arial, sans-serif;}';
$body.='</style>';
$body.='</head>';
$body.='<body style="margin:0;padding:0;">';
$body.='<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">';
$body.='<tr>';
$body.='<td align="center" style="padding:0;">';
$body.='<table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">';
$body.='<tr>';
$body.='<td align="center" style="padding:40px 0 30px 0;background:#70bbd9;">';
$body.='<img src="https://assets.codepen.io/210284/h1.png" alt="" width="300" style="height:auto;display:block;" />';
$body.='</td>';
$body.='</tr>';
$body.='<tr>';
$body.='<td style="padding:36px 30px 42px 30px;">';
$body.='<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">';
$body.='<tr>';
$body.='<td style="padding:0 0 36px 0;color:#153643;">';
$body.='<h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">INVERSIONES DEL ATLANTICO</h1>';
$body.='<p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"></p>';
$body.='<p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="http://localhost/Inversiones_Atlantico/php/index.php" style="color:#ee4c50;text-decoration:underline;">INVERISONES DEL ATLANTICO</a></p>';
$body.='</td>';
$body.='</tr>';
$body.='<tr>';
$body.='<td style="padding:0;">';
$body.='<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">';
$body.='<tr>';
$body.='<td style="width:260px;padding:0;vertical-align:top;color:#153643;">';
$body.='<p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="https://assets.codepen.io/210284/left.gif" alt="" width="260" style="height:auto;display:block;" /></p>';
$body.='<p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Su nueva contraseña es:</p>'.'<p></p>'.$key;
$body.='<p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="http://localhost/Inversiones_Atlantico/php/index.php" style="color:#ee4c50;text-decoration:underline;">Entrar</a></p>';
$body.='</td>';
$body.='<td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>';
$body.='<td style="width:260px;padding:0;vertical-align:top;color:#153643;">';
$body.='<p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="https://assets.codepen.io/210284/right.gif" alt="" width="260" style="height:auto;display:block;" /></p>';
$body.='<p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Contraseña con un tiempo de validez determinado por Inversiones del Atlantico.</p>';
$body.='<p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="http://localhost/Inversiones_Atlantico/php/index.php" style="color:#ee4c50;text-decoration:underline;">Entrar</a></p>';
$body.='</td>';
$body.='</tr>';
$body.='</table>';
$body.='</td>';
$body.='</tr>';
$body.='</table>';
$body.='</td>';
$body.='</tr>';
$body.='<tr>';
$body.='<td style="padding:30px;background:#ee4c50;">';
$body.='<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">';
$body.='<tr>';
$body.='<td style="padding:0;width:50%;" align="left">';
$body.='<p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">';
$body.='&reg; Someone, Somewhere 2021<br/><a href="http://www.example.com" style="color:#ffffff;text-decoration:underline;">Unsubscribe</a>';
$body.='</p>';
$body.='</td>';
$body.='<td style="padding:0;width:50%;" align="right">';
$body.='<table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">';
$body.='<tr>';
$body.='<td style="padding:0 0 0 10px;width:38px;">';
$body.='<a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>';
$body.='</td>';
$body.='<td style="padding:0 0 0 10px;width:38px;">';
$body.='<a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>';
$body.='</td>';
$body.='</tr>';
$body.='</table>';
$body.='</td>';
$body.='</tr>';
$body.='</table>';
$body.='</td>';
$body.='</tr>';
$body.='</table>';
$body.='</td>';
$body.='</tr>';
$body.='</table>';
$body.='</body>';
$body.='</html>';

if (($filas)){
    //Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'inversiones_del_atlantico@hotmail.com';                     //SMTP username
        $mail->Password   = 'mqgxpguufuglmvhl';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('inversiones_del_atlantico@hotmail.com', 'Mailer Diseños Alpha');
        $mail->addAddress($correo);     //Add a recipient
    
        //Content
        $mail->isHTML(TRUE);                                  //Set email format to HTML
        $mail->Subject = 'Su nueva Contraseña';
        $mail->Body    =  $body;


        
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    

    //$insertar="INSERT INTO tbl_ms_parametros VALUES('$filas_','ADMIN_VIGENCIA','30','$filas','$fechaC','$fechaC')";
   // mysqli_query( $conexion2 , $insertar );



    echo '<script>alert("CORREO ENVIADO CON EXITO");</script>';

    include('../php/index.php'); 
}


if (isset($_POST['btnPregunta']) and $filas) {
    header('Location: preguntas_recuperar.php');
    die();
}
?>