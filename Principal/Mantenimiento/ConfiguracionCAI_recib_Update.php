<?php

session_start();
$usuario =$_SESSION['nombre'];

include('../db2.php');
$COD_TALONARIO = $_POST['COD_TALONARIO'];
$RANGO_INICIAL = ($_POST[ 'RANGO_INICIAL' ]);
$RANGO_FINAL = ($_POST[ 'RANGO_FINAL' ]);
$RANGO_ACTUAL = ($_POST[ 'RANGO_ACTUAL' ]);
$NUMERO_CAI = strtoupper($_POST[ 'NUMERO_CAI' ]);
$fECHA_VENCIMIENTO = $_POST['FECHA_VENCIMIENTO'];


$update = ("UPDATE tbl_configuracion_cai
	SET 
	RANGO_INICIAL  ='" .$RANGO_INICIAL. "',
  	RANGO_FINAL  ='" .$RANGO_FINAL. "', 
    RANGO_ACTUAL  ='" .$RANGO_ACTUAL. "',
    NUMERO_CAI ='" .$NUMERO_CAI. "',
    FECHA_VENCIMIENTO ='" .$fECHA_VENCIMIENTO. "' 
  
WHERE COD_TALONARIO='" .$COD_TALONARIO. "'
");
$result_update = mysqli_query($conexion2, $update);

echo "<script type='text/javascript'>
        window.location='CrudConfiguracionCAI.php';
    </script>";     

?>