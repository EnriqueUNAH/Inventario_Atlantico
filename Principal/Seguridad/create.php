<?php

 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 

     // Load Composer's autolveder
     require '../PHPMailer/src/Exception.php';
     require '../PHPMailer/src/PHPMailer.php';
     require '../PHPMailer/src/SMTP.php';

     // Incluir db2 file
require_once "../db2.php";

$user = $_SESSION['nombre'];


// Definir variables e inicializarlas
/*$Usuario = $EstadoUsuario = $NombreUsuario = "";
$Contrasena = $Correo = "";
$Rol="";*/
$fechaC = date('Y-m-d');

$consulta="SELECT * FROM tbl_ms_usuario";
        
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;

//Enrique xd
$Usuario = strtoupper($_POST[ 'Usuario' ]);
$correo_electronico = ($_POST[ 'Correo' ]);
$Rol = ($_POST[ 'Rol' ]);

$NombreUsuario = strtoupper(($_POST[ 'Nombre' ]));
$Contrasena = ($_POST[ 'Contrasena' ]);


//consulta si el usuario ya existe
$consulta_="SELECT Usuario FROM tbl_ms_usuario WHERE Usuario='$Usuario'";
$resultado_= mysqli_query( $conexion2 , $consulta_ );
$filas_ = mysqli_num_rows( $resultado_ );

//consulta si el coreo ya existe
$consultaCoreeo="SELECT CORREO_ELECTRONICO FROM tbl_ms_usuario WHERE CORREO_ELECTRONICO='$correo_electronico'";
$resultado_Correo= mysqli_query( $conexion2 , $consultaCoreeo );
$_filas_ = mysqli_num_rows( $resultado_Correo );

 
//Consultar el id rol rol seleccionado de la tabla roles
$id_rol="SELECT ID_ROL FROM tbl_ms_roles WHERE ROL='$Rol'";
$resultado_rol= mysqli_query( $conexion2 , $id_rol );
    while ($ID_ROL=mysqli_fetch_array( $resultado_rol )) {
        # code...
        $id_rol_=$ID_ROL['ID_ROL'];
    }

//Decisiones de validaciones
if($filas_ ){?>
<script> 
   alert("Usuario ya existente");
   location.href= "CrearUsuario.php";
</SCRipt>
<?php
}elseif($_filas_){?>
    <script> 
       alert("Correo Electronico ya existente");
       location.href= "CrearUsuario.php";
    </SCRipt>
    <?php
}else{
    //inserto datos en tabla usuario
    $sql="INSERT INTO tbl_ms_usuario VALUES('$filas','$Usuario','$NombreUsuario','1','$Contrasena','$fechaC','0','0','$fechaC','$correo_electronico','$user','$fechaC','$user','$fechaC','$id_rol_')";
    mysqli_query( $conexion2 , $sql);


     $body="";
$body .='<!DOCTYPE html>';
$body .='<html lang="es" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">';
$body.='<head>';
$body.='<meta charset="UTF-8">';
$body.=' <meta name="viewport" content="width=device-width,initial-scale=1">';
$body.='<meta name="x-apple-disable-message-reformatting">';
$body.='<title></title>';
$body.='</head>';
$body.='<body style="margin:0;padding:0;">';
$body.='<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">';
$body.='<tr>';
$body.='<td align="center" style="padding:0;">';
$body.='<table role="presentation" style="width:340px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">';
$body.='<tr>';
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
$body.='<td style="width:200px;padding:0;vertical-align:top;color:#153643;">';
$body.='<p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="https://assets.codepen.io/210284/left.gif" alt="" width="260" style="height:auto;display:block;" /></p>';
$body.='<p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">NUEVO USUARIO CREADO</p>'.'<p></p>'.$usuario;
$body.='<p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="http://localhost/Inversiones_Atlantico/php/index.php" style="color:#ee4c50;text-decoration:underline;">Entrar</a></p>';
$body.='</td>';
//$body.='<td style="width:20px;padding:0;font-size:0;line-height:0;">&nbsp;</td>';
//$body.='<td style="width:260px;padding:0;vertical-align:top;color:#153643;">';
//$body.='<p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="https://assets.codepen.io/210284/right.gif" alt="" width="260" style="height:auto;display:block;" /></p>';
//$body.='<p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Contraseña con un tiempo de validez determinado por Inversiones del Atlantico.</p>';
//$body.='<p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="http://localhost/Inversiones_Atlantico/php/index.php" style="color:#ee4c50;text-decoration:underline;">Entrar</a></p>';
//$body.='</td>';
$body.='</tr>';
$body.='</table>';
$body.='</td>';
$body.='</tr>';
$body.='</table>';
$body.='</td>';
$body.='</tr>';
$body.='<tr>';
$body.='<td style="padding:30px;background:#1f9dc4;">';
$body.='<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">';
$body.='<tr>';
$body.='<td style="padding:0;width:50%;" align="left">';
$body.='<p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">';
$body.='&reg; Diseños Alpha, Inventarios del Atlantico 2022<br/><a href="http://www.example.com" style="color:#ffffff;text-decoration:underline;">Unsubscribe</a>';
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

    //Create a new PHPMailer instance
    $mail = new PHPMailer(true);
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'inversiones_del_atlantico@hotmail.com';                     //SMTP username
        $mail->Password   = 'nbhonhvqfrrcduei';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('inversiones_del_atlantico@hotmail.com', 'Mailer Inversiones del Atlantico');
        $mail->addAddress($correo);     //Add a recipient
    
        //Content
        $mail->isHTML(TRUE);                                  //Set email format to HTML
        $mail->Subject = 'USUARIO CREADO';
        $mail->Body    =  $body;


        
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();

    echo '<script>alert("CORREO ENVIADO CON EXITO");</script>';


    #select ID_USUARIO
    $consulta_id="SELECT ID_USUARIO FROM tbl_ms_usuario WHERE Usuario='$Usuario'";
    $resultado_id= mysqli_query( $conexion2 , $consulta_id );
    $filas_id = mysqli_num_rows( $resultado_id );

    #select ID_BITACORA
    $consulta_id_BIT="SELECT * FROM tbl_bitacora";
    $resultado_id_BIT= mysqli_query( $conexion2 , $consulta_id_BIT );
    $filas_id_BIT = mysqli_num_rows( $resultado_id_BIT );
    $filas_id_BIT++;

    $bitacora="INSERT INTO tbl_bitacora VALUES('$filas_id_BIT','$fechaC','$filas_id','2','CREAR','CREACION DE ADMIN DESDE MANTENIMIENTO USUARIO')";
    mysqli_query( $conexion2 , $bitacora);
    include("mantenimiento_usuario.php");

}


/*

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Validate Usuario
    $Usuario= trim($_POST["Usuario"]);
    if(empty($NombreRepresentante)){
        $name_err = "Por favor ingresa el nombre de Usuario.";
    } elseif(!filter_var($Usuario, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingresa un nombre valido";
    } else{
        $name = $Usuario;
    }

   
    // Validate nombre
    $NombreUsuario= trim($_POST["Nombre"]);
    if(empty($NombreUsuario)){
        $name_err3 = "Por favor ingresa el nombre de la empresa.";
    } elseif(!filter_var($NombreUsuario, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err3 = "Por favor ingresa un nombre valido";
    } else{
        $name3 = $NombreUsuario;
    }
    
        // Validate nombre
        $Rol= trim($_POST["Rol"]);
        if(empty($Rol)){
            $Rol_err = "Por favor ingresa el Rol.";
        } elseif(!filter_var($Rol, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $Rol_err = "Por favor ingresa un Rol valido";
        } else{
            $rol = $Rol;
        }

    // Validar Contsena
    $Contrasena = trim($_POST["Contrasena"]);
    if(empty($Contrasena)){
        $contra_err = "Por favor ingresa una Contraseña valida.";     
    }

    // Validate correo
    $Correo= trim($_POST["Correo"]);
    if(empty($Correo)){
        $name_err4 = "Por favor ingresa el nombre de la empresa.";
    } elseif(!filter_var($Correo, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-z\s]+$/")))){
        $name_err4 = "Por favor ingresa un nombre valido";
    } else{
        $name4 = $NombreUsuario;
    }
    
        // code
        // Prepararn el query
        if($Rol=="EMPLEADO"){
            $sql="INSERT INTO tbl_ms_usuario VALUES('$filas','$Usuario','$NombreUsuario','NUEVO','$Contrasena','$fechaC','0','0','$fechaC','$Correo','$Usuario','$fechaC','$Usuario','$fechaC','2')";
               
            mysqli_query( $conexion2 , $sql);
  
            #select ID_USUARIO
            $consulta_id="SELECT ID_USUARIO FROM tbl_ms_usuario WHERE Usuario='$Usuario'";
            $resultado_id= mysqli_query( $conexion2 , $consulta_id );
            $filas_id = mysqli_num_rows( $resultado_id );

             #select ID_BITACORA
            $consulta_id_BIT="SELECT * FROM tbl_bitacora";
            $resultado_id_BIT= mysqli_query( $conexion2 , $consulta_id_BIT );
            $filas_id_BIT = mysqli_num_rows( $resultado_id_BIT );
            $filas_id_BIT++;

            $bitacora="INSERT INTO tbl_bitacora VALUES('$filas_id_BIT','$fechaC','$filas_id','$filas_id','CREAR','CREACION DE EMPLEADO DESDE MANTENIMIENTO USUARIO')";
            mysqli_query( $conexion2 , $bitacora);

        }else{
            $sql="INSERT INTO tbl_ms_usuario VALUES('$filas','$Usuario','$NombreUsuario','NUEVO','$Contrasena','$fechaC','0','0','$fechaC','$Correo','$Usuario','$fechaC','$Usuario','$fechaC','1')";
               
            mysqli_query( $conexion2 , $sql);
            
            #select ID_USUARIO
            $consulta_id="SELECT ID_USUARIO FROM tbl_ms_usuario WHERE Usuario='$Usuario'";
            $resultado_id= mysqli_query( $conexion2 , $consulta_id );
            $filas_id = mysqli_num_rows( $resultado_id );
            
             #select ID_BITACORA
             $consulta_id_BIT="SELECT * FROM tbl_bitacora";
             $resultado_id_BIT= mysqli_query( $conexion2 , $consulta_id_BIT );
             $filas_id_BIT = mysqli_num_rows( $resultado_id_BIT );
             $filas_id_BIT++;
 
             $bitacora="INSERT INTO tbl_bitacora VALUES('$filas_id_BIT','$fechaC','$filas_id','$filas_id','CREAR','CREACION DE ADMIN DESDE MANTENIMIENTO USUARIO')";
             mysqli_query( $conexion2 , $bitacora);
        }
             
          include("mantenimiento_usuario.php");
}*/
?>