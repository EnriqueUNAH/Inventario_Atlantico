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
        $insertar="INSERT INTO tbl_ms_usuario VALUES('$filas','$usuario','$nombre','NUEVO','$contrasenaA','$fechaC','0','0','$fechaC','$correo','$nombre','$fechaC','$nombre','$fechaC','$filas')";
        mysqli_query( $conexion , $insertar );
        echo '<script>alert("Usuario Creado satisfactoriamente");</script>';
        include('../Login/index.php');
    }
    mysqli_close($conexion);

?>
        