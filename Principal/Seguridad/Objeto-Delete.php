<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$IdObjeto = $NombreObjeto = "";
 
// Processing form data when form is submitted
if(isset($_POST["IdObjeto"]) && !empty($_POST["IdObjeto"])){
    // Get hidden input value
    $cod = $_POST["IdObjeto"];

        $sql = "DELETE FROM tbl_ms_Objetos WHERE ID_OBJETO = '$cod'";

        mysqli_query($conexion2 , $sql);
    }
    include("Objeto.php");

?>