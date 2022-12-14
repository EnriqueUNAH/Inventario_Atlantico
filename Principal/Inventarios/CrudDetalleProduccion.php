<?php include('../cabecera.php') ?>
	<?php 
include('../sidebar.php');
?>
		<?php

     // Incluir db2 file   
     require_once "../db2.php";
    

?>
			<!DOCTYPE html>
			<html lang="es">

			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
				<link type="text/css" rel="shortcut icon" href="../img/logo-mywebsite-urian-viera.svg" />
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
				<script src="jquery-3.6.1.min.js"></script>

			</head>

			<body>
				<?php

//$sqlCliente   = ("SELECT * FROM tbl_detalle_produccion_temp dp inner join tbl_producto p on dp.COD_PRODUCTO-p.COD_PRODUCTO");
$sqlCliente   = ("SELECT * FROM tbl_detalle_produccion_temp dp inner join tbl_producto p on dp.COD_PRODUCTO=p.COD_PRODUCTO");

$queryCliente = mysqli_query($conexion2, $sqlCliente);

$cantidad     = mysqli_num_rows($queryCliente);

?>
					<main id="main" class="main">
						<div class="container">
							<div class="row p-4">
								<div class="col-md-5">
									<div class="card">
										<div class="card-body">
											<!-- FORM TO ADD TASKS -->
											<form id="frmdp" method="POST">
												<div class="row">
													<div class="col-sm-7">
														<h4><b>INSUMOS</b></h4>
														<div class="col-15">
															<br>
															<label for="yourName" class="form-label">SELECCIONE UN INSUMO PARA LA PRODUCCI??N</label>
															<br>
															<select name="insumo" id="insumo" class="form-control">
																<?php
                    include("../db2.php");
                        $ejecutar= mysqli_query( $conexion2 , "SELECT * FROM tbl_producto where cod_tipo_producto=1" );             
                    ?>
																	<?php foreach ($ejecutar as $opciones): ?>
																		<option value="<?php echo $opciones['COD_PRODUCTO']?>">
																			<?php echo $opciones['Nombre_PRODUCTO'] ?>
																		</option>
																		<?php endforeach ?>
															</select>
															<br>
															<label for="name" class="form-label">CANTIDAD REQUERIDA</label>
															<input type="number" class="form-control" name="cantidad_insumo" id="cantidad_insumo" required='true' placeholder="Cantidad" min="1" autofocus>
															<div class="invalid-feedback">Producto INV??LIDO!</div>
														</div>
														<div class="row justify-content-start text-center mt-5">
															<div class="col-5">
																<button class="btn btn-success" name="btnguardar" id="btnguardar" value="agregar" type="submit"> Agregar a la lista </button>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>

								<!-- TABLE  -->
								<div class="col-md-7">

									<div class="col-sm-7">
										<h4><b>LISTA DE INSUMOS PARA LA PRODUCCI??N</b></h4>
                  </div>
									<div>
										<button type="submit" onclick="window.location='Produccion_Create.php'" class="btn btn-primary">REGISTRAR PRODUCCI??N</button>
									</div>
									<table class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
												<th class="col-sm-4"> INSUMO</th>
												<th class="col-sm-4"> CANTIDAD</th>
												<th> ACCI??N</th>
											</tr>
										</thead>
										<?php
                              while ($dataCliente = mysqli_fetch_array($queryCliente)) { ?>
											<tr>
												<td>
													<?php echo $dataCliente['Nombre_PRODUCTO']; ?>
												</td>
												<td>
													<?php echo $dataCliente['cantidad']; ?>
												</td>
												<td>




												<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteINSUMO<?php echo $dataCliente['id']; ?>">
                                 						 Eliminar
                             					 </button>
												</td>

											</tr>
											<!--Ventana Modal para la Alerta de Eliminar--->
											<?php include('Insumo_ModalEliminar.php'); ?>
												<?php } ?>
									</table>
								</div>
							</div>
						</div>










						
							<script src="../js/jquery.min.js"></script>
							<script src="../js/popper.min.js"></script>
							<script src="../js/bootstrap.min.js"></script>


							 <script type="text/javascript">
							$(document).ready(function() {
								$(window).load(function() {
									$(".cargando").fadeOut(1000);
								});
								//Ocultar mensaje
								setTimeout(function() {
									$("#contenMsjs").fadeOut(1000);
								}, 3000);
								$('.btnBorrar').click(function(e) {
									e.preventDefault();
									var id = $(this).attr("id");
									var dataString = 'id=' + id;

									url = "Insumo_recib_D.php";
									$.ajax({
										type: "POST",
										url: url,
										data: dataString,
										success: function(data) {
											window.location.href = "CrudDetalleProduccion.php";
											$('#respuesta').html(data);
										}
									});
									return false;
								});
							});
							</script> 


							<script type="text/javascript">
							$(document).ready(function() {
								$('#btnguardar').click(function() {
									var datos = $('#frmdp').serialize();
									$.ajax({
										type: "POST",
										async: true,
										url: "Detalle_Produccion_Create.php",
										data: datos,
										success: function(data) {
											window.location.href = "CrudDetalleProduccion.php";
										}
									});

									return false;
								});
							});




							





			function elimina(id){
     		 alertify.confirm('Eliminar juego', '??Desea eliminar este registro?', 
              function(){ 
                  $.ajax({
                     type:"POST",
                      data:"id=" + id,
                      url:"eliminar.php",
   
                  });
              }
              ,function(){ 
                alertify.error('Cancelo')
              });
  }




</script>


	



				</main>
		</body>
</html>






<?php include('../footer.php') ?>