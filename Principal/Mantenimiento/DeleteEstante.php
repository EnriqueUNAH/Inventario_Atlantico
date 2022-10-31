<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$CodigoEstante = $NombreEstante = "";
 
// Processing form data when form is submitted
if(isset($_POST["CodigoEstante"]) && !empty($_POST["CodigoEstante"])){
    // Get hidden input value
    $cod = $_POST["CodigoEstante"];

        $sql = "DELETE FROM tbl_estante WHERE COD_ESTANTE = '$cod'";

        mysqli_query($conexion2 , $sql);
    }
    include("Mantenimiento-estante.php");

?>