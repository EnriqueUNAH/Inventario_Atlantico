<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$IdParametro = $Valor = "";
 
// Processing form data when form is submitted
if(isset($_POST["IdParametro"]) && !empty($_POST["IdParametro"])){
    // Get hidden input value
    $cod = $_POST["IdParametro"];

        $sql = "DELETE FROM tbl_ms_parametros WHERE ID_PARAMETRO = '$cod'";

        mysqli_query($conexion2 , $sql);
    }
    include("Parametro.php");

?>