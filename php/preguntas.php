<?php
    include( 'db.php' );
    $respuesta=($_POST[ 'respuesta' ]);
    $pregunta=($_POST[ 'pregunta' ]);
    $fechaC = date('Y-m-d');

    $consulta="SELECT * FROM tbl_ms_usuario";
    $resultado= mysqli_query( $conexion , $consulta );
    $filas = mysqli_num_rows( $resultado );

    $consultar = mysqli_query( $conexion , "SELECT Usuario FROM tbl_ms_usuario WHERE Id_Usuario=$filas" );
    while ($otra=mysqli_fetch_array( $consultar )) {
        # code...
        $nombre=$otra['Usuario'];
    }


    $consultar_ = mysqli_query( $conexion , "SELECT Id_Pregunta FROM tbl_preguntas WHERE Pregunta='$pregunta'");
    while ($otra_=mysqli_fetch_array( $consultar_ )) {
        # code...
        $id=$otra_['Id_Pregunta'];
    }

    $consultar__ = mysqli_query( $conexion , "SELECT Estado_usuario FROM tbl_ms_usuario WHERE Id_Usuario='$filas'");
    while ($otra__=mysqli_fetch_array( $consultar__ )) {
        # code...
        $estado=$otra__['Estado_usuario'];
    }



    $fechaC=date('Y-m-d');

    /*if ($contrasena==$contrasena_) {
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
        include('../preguntas.html');
    }*/ 

    $insertar_="INSERT INTO tbl_ms_preguntas_usuario VALUES('$id','$respuesta','$nombre','$fechaC','$nombre','$fechaC','$filas')";
    mysqli_query( $conexion , $insertar_ );

    $consultar_ = "SELECT * FROM tbl_ms_preguntas_usuario WHERE Creado_Por='$nombre'";
    $resultado_= mysqli_query( $conexion , $consultar_ );
    $filas_ = mysqli_num_rows( $resultado_ );



    if($estado = 'NUEVO' and $filas_<2){
        include ("../Login/preguntasPrimeraVez.php");
    }elseif($estado = 'NUEVO' and $filas_>1){
        $ALTER = "UPDATE tbl_ms_usuario SET Estado_Usuario='ACTIVO'";
        mysqli_query($conexion, $ALTER);
        mysqli_close($conexion);
        include('../Login/index.php');
    }elseif($estado = 'RESETEO' and $filas_>1){
        include('../Login/cambiar_contrasena.php'); 
    }

/*    echo ($estado);    
    if ($estado = 'RESETEO' and $filas_>1){
        include('../Login/cambiar_contrasena.php');        
    }elseif($estado = 'NUEVO'){
        $ALTER = "UPDATE tbl_ms_usuario SET Estado_Usuario='ACTIVO'";
        mysqli_query($conexion, $ALTER);
        mysqli_close($conexion);
        include('../Login/index.php');
    }else{
        include ("../Login/preguntasPrimeraVez.php");
    }*/
    
?>


