<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IVERSIONES DEL ATLANTICO</title>
</head>
<body>
<?php
    include( 'db.php' );
    $pregunta=($_POST[ 'pregunta' ]);
    $respuesta=($_POST[ 'respuesta' ]);
    $contrasena = ($_POST[ 'password' ]);
    $contrasena_ = ($_POST[ 'password_' ]);
    $fechaC = date('Y-m-d');
    $conteoP = 0;
    if ($pregunta<>"") {
        # code...
        $conteoP = $conteoP + 1;
    }
    $consulta="SELECT * FROM tbl_ms_usuario";
    $resultado= mysqli_query( $conexion , $consulta );
    $filas = mysqli_num_rows( $resultado );

    $consultar = mysqli_query( $conexion , "SELECT Usuario FROM tbl_ms_usuario WHERE Id_Usuario=$filas" );
    while ($otra=mysqli_fetch_array( $consultar )) {
        # code...
        $nombre=$otra['Usuario'];
    }
    $fechaC=date('Y-m-d');


    if ($contrasena==$contrasena_) {
        # code...
        $insertar="INSERT INTO tbl_preguntas VALUES('$filas','$pregunta','$nombre','$fechaC','$nombre','$fechaC','$filas')";
        $actualizarContra = "UPDATE tbl_ms_usuario SET contrasena = '$contrasena_' WHERE Id_Usuario = '$filas'";
        $actualizarRespuesta = "UPDATE tbl_ms_usuario SET Preguntas_Contestadas = '$conteoP' WHERE Id_Usuario = '$filas'";
        mysqli_query( $conexion , $insertar );
        mysqli_query( $conexion , $actualizarContra );
        mysqli_query( $conexion , $actualizarRespuesta );
    } else {
        # code...
        echo '<script>alert("Contraseña Invalida No coinciden");</script>';
        include('preguntas.html');
    }

    $insertar_="INSERT INTO tbl_ms_preguntas_usuario VALUES('$filas','$respuesta','$nombre','$fechaC','$nombre','$fechaC','$filas')";
    mysqli_query( $conexion , $insertar_ );

    mysqli_close($conexion);
    include('login.html');
?>
</body>
</html>


