<?php include('../cabecera.php') ?>
<?php include('../sidebar.php') ?>
<?php 
	include ('../db2.php');	

 ?>
<main id="main" class="main">
	<section id="container">
		<?php 

			$busqueda = ($_REQUEST['busqueda']);
			if(empty($busqueda))
			{
				//header("location: crudclientes.php");
			
			}


		 ?>
		
		<h1> <i class="fas fa-users"></i> Lista </h1>
		
		<form action="buscarbitacora.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
			<button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
		</form>
	<div class="containerTable">
	<table class="table table-bordered table-striped table-hover" id="asd">
			<tr>
            <th scope="col">NOMBRE USUARIO</th>
							<th scope="col">OBJETO</th>
							<th scope="col">ACCION</th>
							<th scope="col">DESCRIPCION</th>
			</tr>
		<?php 
			//Paginador
			$sql_registe = mysqli_query($conexion2,"SELECT COUNT(*) as total_registro FROM FROM tbl_ms_objetos ob inner join  tbl_bitacora bi on bi.ID_OBJETO=ob.ID_OBJETO inner join tbl_ms_usuario us  on bi.ID_USUARIO=us.ID_USUARIO order by FECHA DESC
																WHERE ( 
																		NOMBRE_USUARIO LIKE '%$busqueda%' OR 
																		OBJETO LIKE '%$busqueda%' OR 
																		ACCION LIKE '%$busqueda%' OR
																		DESCRIPCION LIKE '%$busqueda%'
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

			$query = mysqli_query($conexion2,"SELECT * FROM FROM tbl_ms_objetos ob inner join  tbl_bitacora bi on bi.ID_OBJETO=ob.ID_OBJETO inner join tbl_ms_usuario us  on bi.ID_USUARIO=us.ID_USUARIO order by FECHA DESC WHERE 
										( 
											NOMBRE_USUARIO LIKE '%$busqueda%' OR 
											OBJETO LIKE '%$busqueda%' OR 
											ACCION LIKE '%$busqueda%' OR 
											DESCRIPCION LIKE  '%$busqueda%' )" );
			mysqli_close($conexion2);
			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
			?>
			<tbody>
				<tr>
					<td><?php echo $data["NOMBRE_USUARIO"]; ?></td>
					<td><?php echo $data["OBJETO"]; ?></td>
					<td><?php echo $data["ACCION"]; ?></td>
					<td><?php echo $data['DESCRIPCION'] ?></td>
					<td> 
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