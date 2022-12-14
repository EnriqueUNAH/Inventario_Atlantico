<?php include('../cabecera.php') ?>
<?php 
if ($_SESSION['nombre']=="ADMINISTRADOR") {
	# code...
	include('../sidebar.php');
  }else{
	# code...
	include('../sidebar2.php');
  }

?>
<?php 
	session_start();
	include "../db2.php";	

 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Lista de clientes</title>

	<link rel="stylesheet" href="../style.css">
    <script type="text/javascript" src="../js/icons.js"></script>




</head>
<body>
<main id="main" class="main">
	<section id="container">
		<?php 

			$busqueda = ($_REQUEST['busqueda']);
			if(empty($busqueda))
			{
				//header("location: crudclientes.php");
			
			}


		 ?>
		
		<h1> <i class="fas fa-users"></i> Lista de clientes</h1>
		
		<form action="crudclientes.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
			<button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
		</form>
	<div class="containerTable">
	<table class="table table-bordered table-striped table-hover" id="asd">
			<tr>
            <th scope="col">RTN</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">TELEFONO</th>
            <th scope="col">CORREO ELECTONICO</th>
            <th scope="col">DIRECCION</th>
            <th scope="col">ACCIONES</th>

			</tr>
		<?php 
			//Paginador
			$sql_registe = mysqli_query($conexion2,"SELECT COUNT(*) as total_registro FROM tbl_cliente 
																WHERE ( COD_CLIENTE LIKE '%$busqueda%' OR 
																		RTN LIKE '%$busqueda%' OR 
																		NOMBRE_COMPLETO LIKE '%$busqueda%' OR 
																		TELEFONO LIKE '%$busqueda%' OR
																		CORREO_ELECTRONICO LIKE '%$busqueda%' OR
                                                                        DIRECCION LIKE '%$busqueda%'
																   ) 
																");

			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

			$por_pagina = 15;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);

			$query = mysqli_query($conexion2,"SELECT * FROM tbl_cliente WHERE 
										( COD_CLIENTE LIKE '%$busqueda%' OR 
											RTN LIKE '%$busqueda%' OR 
											NOMBRE_COMPLETO LIKE '%$busqueda%' OR 
											TELEFONO LIKE '%$busqueda%' OR 
											CORREO_ELECTRONICO LIKE  '%$busqueda%' ) OR
                                            DIRECCION LIKE  '%$busqueda%'" );
			mysqli_close($conexion2);
			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
			?>
			<tbody>
				<tr>
					<td><?php echo $data["RTN"]; ?></td>
					<td><?php echo $data["NOMBRE_COMPLETO"]; ?></td>
					<td><?php echo $data["TELEFONO"]; ?></td>
					<td><?php echo $data['CORREO_ELECTRONICO'] ?></td>
                    <td><?php echo $data['DIRECCION'] ?></td>
					<td> 
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $dataCliente['NUMERO_DNI']; ?>">
                                  Eliminar
                              </button>
                        <!--Ventana Modal para la Alerta de Eliminar--->
						<?php include('ModalDeleteCliente.php'); ?>
                            
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataCliente['NUMERO_DNI']; ?>">
                                  Modificar
                              </button>

							  <!--Ventana Modal para Actualizar--->
<?php  include('ModalEditCliente.php'); ?>
                          </td>
				</tr>

	
			
		<?php 
				}

			}
		 ?>


		</table>
	</div>
<?php 
	
	if($total_registro != 0)
	{
 ?>
		<div class="paginador">
			<ul>
			<?php 
				if($pagina != 1)
				{
			 ?>
				<li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>"><i class="fas fa-step-backward"></i></a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo $busqueda; ?>"><i class="fas fa-backward"></i></a></li>
			<?php 
				}
				for ($i=1; $i <= $total_paginas; $i++) { 
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';
					}
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?>&busqueda=<?php echo $busqueda; ?>"><i class="fas fa-forward"></i></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda; ?> "><i class="fas fa-step-forward"></i></a></li>
			<?php } ?>
			</ul>
		</div>
<?php } ?>


	</section>

    </main>
</body>
</html>
<?php include("../footer.php")?>