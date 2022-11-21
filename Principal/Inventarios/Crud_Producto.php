<?php
	session_start();
	include "../db2.php";
 ?>
 <?php include('../cabecera.php') ?>
<?php include('../sidebar.php') ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "../includes/scripts.php"; ?>
	<title>Lista de productos</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../css/style.css">
   
    
</head>
<body>
    <main id="main" class="main">
	<?php //include "../includes/header.php"; ?>
	<section id="container">

		<h1><i class="fas fa-cube"></i> Lista de productos</h1>
		<a href="registro_producto.php" class="btn_new btnNewProducto"><i class="fas fa-plus"></i> Registrar producto</a>

		<form action="buscar_productos.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
		</form>
	<div class="containerTable">
		<table class="table table-bordered table-striped table-hover">
        <tbody>
            
			<tr>
				<th>Código</th>
				<th>Descripción</th>
				<th>Precio</th>
				<th>Existencia</th>
				<th>
				<?php

					$query_proveedor = mysqli_query($conexion2,"SELECT * FROM tbl_proveedor WHERE ESTADO = 1
																ORDER BY NOMBRE_EMPRESA ASC");
					$result_proveedor = mysqli_num_rows($query_proveedor);
				?>
				<select name="proveedor" id="search_proveedor">
					<option value="" selected>PROVEEDOR</option>
					<?php
						if($result_proveedor > 0)
						{
							while ($proveedor = mysqli_fetch_array($query_proveedor)) {
					?>
							<option value="<?php echo $proveedor["COD_PROVEEDOR"]; ?>"><?php echo $proveedor["NOMBRE_EMPRESA"] ?></option>
					<?php
								# code...
							}
						}
					 ?>
				</select>

				</th>
				<th>Foto</th>
				<th>Acciones</th>
			</tr>
            
		<?php
			//Paginador
			$sql_registe = mysqli_query($conexion2,"SELECT COUNT(*) as total_registro FROM tbl_producto WHERE ESTADO = 1 ");
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

			$query = mysqli_query($conexion2,"SELECT p.COD_PRODUCTO, p.Nombre_PRODUCTO, p.PRECIO_VENTA, p.EXISTENCIA, pr.COD_PROVEEDOR , p.FOTO
											FROM tbl_producto p
											INNER JOIN tbl_proveedor pr
											ON p.COD_PROVEEDOR = pr.COD_PROVEEDOR
											WHERE p.ESTADO = 1 ORDER BY p.COD_PROVEEDOR DESC LIMIT $desde,$por_pagina
				");

			mysqli_close($conexion2);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					if($data['FOTO'] != 'img_producto.png'){
						$foto = 'img/uploads/'.$data['FOTO'];
					}else{
						$foto = 'img/'.$data['FOTO'];
					}

			?>

				<tr class="row<?php echo $data["COD_PRODUCTO"]; ?>">
					<td><?php echo $data["COD_PRODUCTO"]; ?></td>
					<td><?php echo $data["Nombre_PRODUCTO"]; ?></td>
					<td class="celPrecio"><?php echo $data["PRECIO_VENTA"]; ?></td>
					<td class="celExistencia"><?php echo $data["EXISTENCIA"]; ?></td>
					<td><?php echo $data["COD_PROVEEDOR"]; ?></td>
					<td class="img_producto"><img src="<?php echo $foto; ?>" alt="<?php echo $data["Nombre_PRODUCTO"]; ?>"></td>
					<td>
						<a class="link_add add_product" product="<?php echo $data["COD_PRODUCTO"]; ?>" href="#"><i class="fas fa-plus"></i> </a>
						|
						<a class="link_edit" href="editar_producto.php?id=<?php echo $data["COD_PRODUCTO"]; ?>"><i class="far fa-edit"></i> </a>
						|
						<a class="link_delete del_product" href="#" product="<?php echo $data["COD_PRODUCTO"]; ?>"><i class="far fa-trash-alt"></i> </a>
					</td>
                    
				</tr>
		<?php
				}

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