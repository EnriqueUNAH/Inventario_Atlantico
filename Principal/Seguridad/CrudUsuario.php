<?php
	session_start();
	include "../db2.php";

 ?>

<?php include('../cabecera.php') ?>
<?php include('../sidebar.php') ?>
<!DOCTYPE html>
<html lang="es">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
    <link type="text/css" rel="shortcut icon" href="../img/logo-mywebsite-urian-viera.svg"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/cargando.css">
    <link rel="stylesheet" type="text/css" href="../css/maquinawrite.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- SCRIPTS JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="peticion.js"></script>

    <script type="text/javascript" src="../js/icons.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../Inventarios/sistema/style.css">


      
	</head>
  <?php
        include('../db2.php');

        $sqlCliente   = ("SELECT * FROM tbl_ms_estado e inner join tbl_ms_usuario u on e.ID_ESTADO = u.ID_ESTADO inner join tbl_ms_roles r on u.ID_ROL =r.ID_ROL ORDER BY ID_USUARIO");
        $queryCliente = mysqli_query($conexion2, $sqlCliente);
        $cantidad     = mysqli_num_rows($queryCliente);
    ?>
	<body>
    <main id="main" class="main">
    <section id="container">
		<h1> <i class="fas fa-users"></i> Lista de usuarios</h1>
		<a href="CrearUsuario.php" class="btn_new"><i class="fas fa-user-plus"></i> Crear usuario</a>
        <button type="button" onclick="window.location='ReporteUsuarios.php'" class="btn btn-warning">GENERAR PDF</button>
		<form action="buscar_usuario.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<button type="submit" class="btn_search"><i class="fas fa-search"></i></button>
		</form>
	
	<div class="containerTable">
		<table lass="table table-bordered table-striped table-hover">
        <tr>
                <th>NOMBRE USUARIO</th>
                <th scope="col">ESTADO</th>
                <th scope="col">ULTIMA CONEXIÓN</th>
                <th scope="col">INGRESOS</th>
                <th scope="col">CORREO ELECTRONICO</th>
                <th scope="col">ROL</th>
                <th scope="col">ACCIONES</th>
            </tr>
		<?php
			//Paginador
            $sql_registe = mysqli_query($conexion2,"SELECT COUNT(*) as total_registro FROM tbl_ms_usuario WHERE id_estado = 2 ");
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

            $query = mysqli_query($conexion2,"SELECT * FROM tbl_ms_estado e inner join tbl_ms_usuario u on e.ID_ESTADO = u.ID_ESTADO inner join tbl_ms_roles r on u.ID_ROL =r.ID_ROL ORDER BY ID_USUARIO");

			mysqli_close($conexion2);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {

			?>
				<tr>
                <td><?php echo $data['NOMBRE_USUARIO']; ?></td>
                    <td><?php echo $data['NOMBRE_ESTADO']; ?></td>
                    <td><?php echo $data['FECHA_ULTIMA_CONEXION']; ?></td>
                    <td><?php echo $data['PRIMER_INGRESO']; ?></td>
                    <td><?php echo $data['CORREO_ELECTRONICO']; ?></td>
                    <td><?php echo $data['ROL']; ?></td>
					<td>
						<a class="link_edit" data-toggle="modal" data-target="#editChildresn<?php echo $dataCliente['ID_USUARIO']; ?>"><i class="far fa-edit"></i> </a>
                        
					<?php if($data["ID_USUARIO"] != 1){ ?>
						|
						<a class="link_delete" href="ModalEditar.php?id=<?php echo $data["ID_USUARIO"]; ?>"><i class="far fa-trash-alt"></i> </a>
					<?php } ?>

					</td>
				</tr>


                <!--Ventana Modal para la Alerta de Eliminar--->
                <?php include('ModalEliminar.php'); ?>
                <!--Ventana Modal para Actualizar--->
                <?php  include('ModalEditar.php'); ?>

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
    
	</body>
</html>

<?php include("../footer.php")?>