<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$CodigoGenero = $NombreGenero = "";
 
// Processing form data when form is submitted
if(isset($_POST["CodigoGenero"]) && !empty($_POST["CodigoGenero"])){
    // Get hidden input value
    $cod = $_POST["CodigoGenero"];

        $sql = "DELETE FROM tbl_Genero WHERE COD_GENERO = '$cod'";

        mysqli_query($conexion2 , $sql);
    }
    include("Mantenimiento-genero.php");

?>