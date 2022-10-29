<?php
include('../php/db.php');
$pregunta=($_POST[ 'pregunta' ]);
$respuesta = ($_POST[ 'respuesta' ]);


$consultar = mysqli_query( $conexion , "SELECT Id_Pregunta,Pregunta FROM tbl_ms_preguntas WHERE Pregunta='$pregunta'" );
while ($otra=mysqli_fetch_array( $consultar )) {
    # code...
    $id=$otra['Id_Pregunta'];
    $pregunta_=$otra['Pregunta'];
}


$consultar_ = mysqli_query( $conexion , "SELECT Id_Pregunta,Respuesta FROM tbl_ms_preguntas_usuario WHERE Respuesta='$respuesta'" );
while ($otra_=mysqli_fetch_array( $consultar_ )) {
    # code...
    $id_=$otra_['Id_Pregunta'];
    $respuesta_=$otra_['Respuesta'];
}

if ($id==$id_) {
    # code...
    include('../Login/cambiar_contrasena_recu.php');
}else{
    echo '<script>alert("RESPUESTA INCORRECTA");</script>';
    include('preguntas_recuperar.php');
}
?>