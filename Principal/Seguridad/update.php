<?php
$connect = mysqli_connect("localhost", "root", "123456", "inversionesatlantico");


    $VAR=$_POST["id"];
    
    if ($VAR=="NUEVO") {
        # code...
        $VAR=1;
    }
    if ($VAR=="ACTIVO") {
        # code...
        $VAR=2;
    }
    if ($VAR=="INACTIVO") {
        # code...
        $VAR=3;
    }
    if ($VAR=="BLOQUEADO") {
        # code...
        $VAR=4;
    }
    if ($VAR=="RESETEO") {
        # code...
        $VAR=5;
    }
    if ($VAR=="PENDIENTE") {
        # code...
        $VAR=6;
    }

    $consulta="SELECT ID_USUARIO FROM tbl_ms_usuario where NOMBRE_USUARIO = '$VAR' or CORREO_ELECTRONICO='$VAR' or ID_ESTADO='$VAR'";
    $resultado=mysqli_query( $connect , $consulta );
    while ($valor=mysqli_fetch_array( $resultado )) {
        $ID=$valor['ID_USUARIO'];
    }

if ($_POST["value"]=="NUEVO") {
    # code...
    $_POST["value"]=1;
}
if ($_POST["value"]=="ACTIVO") {
    # code...
    $_POST["value"]=2;
}
if ($_POST["value"]=="INACTIVO") {
    # code...
    $_POST["value"]=3;
}
if ($_POST["value"]=="BLOQUEADO") {
    # code...
    $_POST["value"]=4;
}
if ($_POST["value"]=="RESETEO") {
    # code...
    $_POST["value"]=5;
}
if ($_POST["value"]=="PENDIENTE") {
    # code...
    $_POST["value"]=6;
}

 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE tbl_ms_usuario SET ".$_POST["column_name"]."='".$value."' WHERE ID_USUARIO='$ID'";
 if(mysqli_query($connect, $query))
 {
  echo 'DATOS ACTUALIZADOS';

 }

?>