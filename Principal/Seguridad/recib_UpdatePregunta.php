<?php
include('../db2.php');
$idRegistros = $_REQUEST['id'];
$pregunta     = $_REQUEST['pregunta'];

$update = ("UPDATE tbl_ms_preguntas
	SET 
	PREGUNTA  ='" .$pregunta. "'

WHERE ID_PREGUNTA='" .$idRegistros. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='crud_preguntas.php';
    </script>"; 

?>