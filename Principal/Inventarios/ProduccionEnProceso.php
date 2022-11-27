<?php include("../cabecera3.php") ?>
<?php 
	session_start();
  if ($_SESSION['nombre']=="ADMINISTRADOR") {
    # code...
    include('../sidebar.php');
    }else{
    # code...
    include('../sidebar2.php');
    }

?>


<?php echo $Descripcion; ?> 
<?php echo $CantidadProducir; ?>