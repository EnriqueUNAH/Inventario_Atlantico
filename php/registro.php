<?php
    include( 'db.php' );
    $nombre = strtoupper($_POST[ 'name' ]);
    $usuario = strtoupper($_POST[ 'username' ]);
    $contrasena = ($_POST[ 'password__' ]);
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
    $contraseñaNueva = $_POST[ 'password_' ];
    $conformarContra = $_POST[ 'password__' ];

    if($contraseñaNueva=$conformarContra){
        $contrasena = $contraseñaNueva;
    }else{
        echo '<script>alert("Contraseñas no coinciden");</script>';
        include('../Login/autoRegistro.php'); 
    }
    
     
    if($filas_ or $contraseñaNueva<>$conformarContra){
       echo '<script>alert("Nombre de usuario ya existente o contraseñas no coinciden");</script>';
        include('../Login/autoRegistro.php');
    }else{
        $insertar="INSERT INTO tbl_ms_usuario VALUES('$filas','$usuario','$nombre','NUEVO','$contrasena','$filas','$fechaC','1','0','0','$fechaC','$correo','$nombre','$fechaC','$nombre','$fechaC','$filas','$filas')";
        mysqli_query( $conexion , $insertar );
        echo '<script>alert("Usuario Creado Satisfactoriamente");</script>';
        include('../Login/index.php');
    }
    mysqli_close($conexion);

?>
        