<?php
    include('db.php');
    $primerRespuesta=$_POST['respuesta'];
    $preguntas=$_POST['Lapregunta'];
    $contrasenas=$_POST['password'];
    $contrasenas_=$_POST['password_'];

    $consulta_Pregunta="SELECT Pregunta,Id_Usuario FROM tbl_preguntas WHERE Pregunta='$preguntas'";
    $resultado=mysqli_query( $conexion , $consulta_Pregunta );
    $filas = mysqli_num_rows( $resultado );
    while ($otra=mysqli_fetch_array( $resultado )) {
        # code...
        $Id=$otra['Id_Usuario'];
    }

    $consulta_Respuesta="SELECT Respuesta FROM tbl_ms_preguntas_usuario WHERE Id_Usuario='$Id'";
    $Respuesta_=mysqli_query( $conexion , $consulta_Respuesta );
    while ($otra_=mysqli_fetch_array( $Respuesta_ )) {
        # code...
        $Respuesta=$otra_['Respuesta'];
    }

    if ($filas and $primerRespuesta==$Respuesta and $contrasenas=$contrasenas_) {
        # code...
        $actualizarContra = "UPDATE tbl_ms_usuario SET contrasena = $contrasenas_ WHERE Id_Usuario = '$Id'";
        mysqli_query( $conexion , $actualizarContra );
        echo '<script>alert("CONTRASEÑA CAMBIADA CON EXITO");</script>';
        include('login.html');
    }else {
        # code...
        echo '<script>alert("ERROR FATAL");</script>';
        include('login.html');
    }

?>