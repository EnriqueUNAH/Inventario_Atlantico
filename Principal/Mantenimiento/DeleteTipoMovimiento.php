<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$CodigoTipoMovimiento = $NombreMovimiento = "";
 
// Processing form data when form is submitted
if(isset($_POST["CodigoTipoMovimiento"]) && !empty($_POST["CodigoTipoMovimiento"])){
    // Get hidden input value
    $cod = $_POST["CodigoTipoMovimiento"];

        $sql = "DELETE FROM tbl_tipo_Movimiento WHERE COD_TIPO_MOVIMIENTO = '$cod'";

        mysqli_query($conexion2 , $sql);
    }
    include("Mantenimiento-tipo-Mov.php");

?>