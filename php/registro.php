<?php
    include( 'db.php' );
    $nombre = strtoupper($_POST[ 'name' ]);
    $usuario = strtoupper($_POST[ 'username' ]);
    $contrasena = ($_POST[ 'password' ]);
    $correo = ($_POST[ 'email' ]);
    $fechaC = date('Y-m-d');


    $consulta="SELECT * FROM tbl_ms_usuario";
        
    $resultado= mysqli_query( $conexion , $consulta );
    $filas = mysqli_num_rows( $resultado );
    $filas=$filas+1;

    #Consulta para saber si el usuario ya existe
    $consulta_="SELECT Usuario FROM tbl_ms_usuario WHERE Usuario='$usuario'";
    $resultado_= mysqli_query( $conexion , $consulta_ );
    $filas_ = mysqli_num_rows( $resultado_ );

    #select ID_USUARIO
   // $consulta_id="SELECT ID_USUARIO FROM tbl_ms_usuario WHERE Usuario='$usuario'";
    //$resultado_id= mysqli_query( $conexion , $consulta_id );
    //$filas_id = mysqli_num_rows( $resultado_id );

    #Confirmar contraseña
    $conformarContra = $_POST[ 'password1' ];


    if($filas_ ){
        echo '<script>alert("Nombre de usuario ya existente");</script>';
         include('../Login/autoRegistro.php');
    }elseif($contrasena!=$conformarContra){
        echo '<script>alert("Contraseñas no coinciden");</script>';
        include('../Login/autoRegistro.php');
    }else{
        $contrasenaA = $contrasena;
        $insertar="INSERT INTO tbl_ms_usuario VALUES('$filas','$usuario','$nombre','NUEVO','$contrasenaA','$fechaC','0','0','$fechaC','$correo','$usuario','$fechaC','$usuario','$fechaC','2')";
       //$bitacora="INSERT INTO tbl_bitacora VALUES('$filas','$fechaC','$filas','$filas','AUTOREGISTRO','AUTOREGISTRO DE USUARIO DESDE EL LOGIN')";

        mysqli_query( $conexion , $insertar );
        //mysqli_query( $conexion , $bitacora );
        echo '<script>alert("Usuario Creado satisfactoriamente");</script>';
        include('../Login/index.php');
    }
    mysqli_close($conexion);

?>
        