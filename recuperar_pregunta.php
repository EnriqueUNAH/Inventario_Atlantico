<?php
    $question=$_POST(['pregunta']);
    $answer=$_POST(['respuesta']);
    $contra=$_POST(['password']);
    $contra_=$_POST(['password_']);

    $consulta_Pregunta="SELECT Id_Usuario FROM tbl_preguntas WHERE Pregunta=$question";
    $Id=mysqli_query( $conexion , $consulta_Pregunta );

    $consulta_Respuesta="SELECT Respuesta FROM tbl_ms_preguntas WHERE Id_Usuario=$Id";
    $Respuesta=mysqli_query( $conexion , $consulta_Respuesta );

    $Id_Pregunta="SELECT Pregunta FROM tbl_preguntas WHERE Id_Usuario=$Id";
    $LaPregunta=mysqli_query( $conexion , $Id_Pregunta );

    $consulta_Contra_ante="SELECT Contrasena FROM tbl_ms_usuarios WHERE Id_Usuario=$Id";
    $Contra_ante=mysqli_query( $conexion , $consulta_Contra_ante );



    if ($pregunta==$Id_Pregunta and $respuesta==$answer and $contra==$contra_ and $contra<>$Contra_ante) {
        # code...
        $actualizarContra = "UPDATE tbl_ms_usuario SET contrasena = $contra_ WHERE Id_Usuario = $Id";
        echo '<script>alert("CONTRASEÑA CAMBIADA CON EXITO");</script>';
    }else {
        # code...
        echo '<script>alert("ERROR FATAL");</script>';
    }

?>