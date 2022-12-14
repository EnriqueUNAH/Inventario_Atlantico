<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<script src="js/functions.js"></script>	<!---->
	<script src="js/icons.js"></script>
</head>
<body>
	<?php include "../cabecera.php"; ?>
	<?php include "../sidebar.php"; ?>
	<?php include "../db2.php"; ?>
	
	<main id="main" class="main">
	<section id="container">

		<h1><i ></i> Lista de ventas</h1>
		<a href="nueva_venta.php" class="btn_new btnNewVenta"><i class="fas fa-plus"></i> Nueva venta</a>

		<form action="buscar_venta.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="No. Factura">
			<button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
		</form>

		<div>
			<h5>Buscar por Fecha</h5>
			<form action="buscar_venta.php" method="get" class="form_search_date">
				<label>De: </label>
				<input type="date" name="fecha_de" id="fecha_de" required>
				<label> A </label>
				<input type="date" name="fecha_a" id="fecha_a" required>
				<button type="submit" class="btn_view"><i class="fas fa-search"></i></button>
			</form>
		</div>
	<div class="containerTable">
	<table  class="table table-bordered table-striped table-hover">
			<tr>
				<th>No.</th>
				<th>Fecha / Hora</th>
				<th>Cliente</th>
				<th>Vendedor</th>
				<th>Estado</th>
				<th class="textright">Total Factura</th>
				<th class="textright">Acciones</th>
			</tr>
		<?php
			//Paginador
			$sql_registe = mysqli_query($conexion2,"SELECT COUNT(*) as total_registro FROM tbl_factura WHERE ESTADO != 10 ");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

			$por_pagina = 50;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);

			$query = mysqli_query($conexion2,"SELECT f.NO_FACTURA, f.FECHA, f.TOTAL_FACTURA, f.COD_CLIENTE, f.ESTADO,
													 u.NOMBRE_USUARIO as vendedor,
													 cl.NOMBRE_COMPLETO as cliente
												FROM tbl_factura f
												INNER JOIN tbl_ms_usuario u
												ON f.ID_USUARIO = u.ID_USUARIO
												INNER JOIN tbl_cliente cl
												ON f.COD_CLIENTE = cl.COD_CLIENTE
												WHERE f.ESTADO != 10
											  	ORDER BY FECHA DESC LIMIT $desde,$por_pagina");

			mysqli_close($conexion2);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {

					if($data["ESTADO"] == 1){
						$estado = '<span class="pagada">Pagada</span>';
					}else{
						$estado = '<span class="anulada">Anulada</span>';
					}
			?>
				<tr id="row_<?php echo $data["NO_FACTURA"]; ?>">
					<td><?php echo $data["NO_FACTURA"]; ?></td>
					<td><?php echo $data["FECHA"]; ?></td>
					<td><?php echo $data["cliente"]; ?></td>
					<td><?php echo $data["vendedor"]; ?></td>
					<td class="estado"><?php echo $estado; ?></td>
					<td class="textright totalfactura"><span>$.</span><?php echo $data["TOTAL_FACTURA"]; ?></td>

					<td>
						<div class="div_acciones">
							<div>
								<button class="btn_view view_factura" type="button" cl="<?php echo $data["COD_CLIENTE"]; ?>" f="<?php echo $data['NO_FACTURA'];?>"><i class="fas fa-eye"></i></button>
							</div>


						<div class="div_factura">
							<button class="btn_anular anular_factura" fac="<?php echo $data["NO_FACTURA"]; ?>"><i class="fas fa-ban"></i></button>
						</div>

						<div class="div_factura">
							<button type="button" class="btn_anular inactive" ><i class="fas fa-ban"></i></button>
						</div>
					<?php 		}
							
					?>

						</div>

					</td>
				</tr>
		<?php
			

			}
		 ?>
		</table>
	</div>
		<div class="paginador">
			<ul>
			<?php
				if($pagina != 1)
				{
			 ?>
				<li><a href="?pagina=<?php echo 1; ?>"><i class="fas fa-step-backward"></i></a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>"><i class="fas fa-backward"></i></a></li>
			<?php
				}
				for ($i=1; $i <= $total_paginas; $i++) {
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
					}
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?>"><i class="fas fa-forward"></i></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?> "><i class="fas fa-step-forward"></i></a></li>
			<?php } ?>
			</ul>
		</div>


	</section>
	</main>
	<?php include "../footer.php"; ?>
</body>
</html>