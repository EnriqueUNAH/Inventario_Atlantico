<?php
// Include config file
require_once "../db2.php";
 
// Define variables and initialize with empty values
$IdPregunta = $NombrePregunta = "";
 
// Processing form data when form is submitted
if(isset($_POST["IdPregunta"]) && !empty($_POST["IdPregunta"])){
    // Get hidden input value
    $cod = $_POST["IdPregunta"];

        $sql = "DELETE FROM tbl_ms_preguntas WHERE ID_PREGUNTA = '$cod'";

        mysqli_query($conexion2 , $sql);
    }
    include("Pregunta.php");

?>