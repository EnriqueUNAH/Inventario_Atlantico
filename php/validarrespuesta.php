<?php
include('../php/db.php');
$pregunta=($_POST[ 'pregunta' ]);
$respuesta = ($_POST[ 'respuesta' ]);
$id=$id_="";

$consultar = mysqli_query( $conexion , "SELECT ID_PREGUNTA,PREGUNTA FROM tbl_ms_preguntas WHERE PREGUNTA='$pregunta'" );
while ($otra=mysqli_fetch_array( $consultar )) {
    # code...
    $id=$otra['ID_PREGUNTA'];
    $pregunta_=$otra['PREGUNTA'];
}


$consultar_ = mysqli_query( $conexion , "SELECT ID_PREGUNTA,RESPUESTA FROM tbl_ms_preguntas_usuario WHERE RESPUESTA='$respuesta'" );
while ($otra_=mysqli_fetch_array( $consultar_ )) {
    # code...
    $id_=$otra_['ID_PREGUNTA'];
    $respuesta_=$otra_['RESPUESTA'];
}

if ($id==$id_) {
    # code...
    include('../Login/cambiar_contrasena_recu.php');
}else{
    echo '<script>alert("RESPUESTA INCORRECTA");</script>';
    include('../Login/preguntas_recuperar.php');
}
?>