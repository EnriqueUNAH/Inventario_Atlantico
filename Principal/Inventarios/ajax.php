<?php

	include "../db2.php";
	//print_r($_POST);exit;

	if(!empty($_POST)){

		//Extraer datos del producto
		if($_POST['action'] == 'infoProducto')
		{
			$producto_id = $_POST['producto'];

			$query = mysqli_query($conexion2,"SELECT COD_PRODUCTO , DESCRIPCION, EXISTENCIA, PRECIO_VENTA FROM tbl_producto
												WHERE COD_PRODUCTO = $producto_id AND ESTADO = 1");
			mysqli_close($conexion2);

			$result = mysqli_num_rows($query);
			if($result > 0){
				$data = mysqli_fetch_assoc($query);
				echo json_encode($data,JSON_UNESCAPED_UNICODE);
				exit;
			}
			echo 'error';
			exit;
		}

		//Agregar productos a entrada
		if($_POST['action'] == 'addProduct')
		{

			if(!empty($_POST['cantidad']) || !empty($_POST['precio']) || !empty($_POST['producto_id']))
			{
				$cantidad 	= $_POST['cantidad'];
				$precio 	= $_POST['precio'];
				$producto_id= $_POST['producto_id'];
				$usuario_id = $_SESSION['idUser'];

				$query_insert = mysqli_query($conexion2,"INSERT INTO entradas(codproducto,
																			  cantidad,precio,
																			  usuario_id)
																		VALUES($producto_id,
																			   $cantidad,
																			   $precio,
																			   $usuario_id)");
				if($query_insert){
					//Ejecutar procedimiento almacenado
					$query_upd = mysqli_query($conexion2,"CALL actualizar_precio_producto($cantidad,$precio,$producto_id)");
					$result_pro = mysqli_num_rows($query_upd);
					if($result_pro > 0){
						$data = mysqli_fetch_assoc($query_upd);
						$data['producto_id'] = $producto_id;
						echo json_encode($data,JSON_UNESCAPED_UNICODE);
						exit;
					}
				}else{
					echo 'error';
				}
				mysqli_close($conexion2);

			}else{
				echo 'error';
			}
			exit;
		}

		//Eliminar producto
		if($_POST['action'] == 'delProduct')
		{
			if(empty($_POST['producto_id']) || !is_numeric($_POST['producto_id'])){
				echo 'error';
			}else{
				$idproducto = $_POST['producto_id'];
				$query_delete = mysqli_query($conexion2,"UPDATE producto SET estatus = 0 WHERE codproducto = $idproducto ");
				mysqli_close($conexion2);

				if($query_delete){
					echo 'ok';
				}else{
					echo 'error';
				}
			}
			echo 'error';
			exit;
		}

		// Buscar Cliente
		if($_POST['action'] == 'searchCliente')
		{
			if(!empty($_POST['cliente'])){

				$nit = $_POST['cliente'];
				$query = mysqli_query($conexion2,"SELECT * FROM tbl_cliente WHERE RTN LIKE '$nit' and ESTADO = 1 ");
				mysqli_close($conexion2);
				$result = mysqli_num_rows($query);

				$data = '';
				if($result > 0){
					$data = mysqli_fetch_assoc($query);
				}else{
					$data = 0;
				}
				echo json_encode($data,JSON_UNESCAPED_UNICODE);
			}
			exit;
		}

		//Registra Cliente - Ventas
		if($_POST['action'] == 'addCliente')
		{
			$nit       = $_POST['nit_cliente'];
			$nombre    = $_POST['nom_cliente'];
			$telefono  = $_POST['tel_cliente'];
			$direccion = $_POST['dir_cliente'];
			$usuario_id = $_SESSION['idUser'];

			
			$consulta="SELECT * FROM tbl_cliente";
			$resultado= mysqli_query( $conexion2 , $consulta );
			$filas = mysqli_num_rows( $resultado );
			$filas=$filas+1;
			$fechaC = date('Y-m-d');

			$query_insert = mysqli_query($conexion2,"INSERT INTO tbl_cliente VALUES('$filas','$nit','$nombre','$telefono','-----','$direccion','$fechaC','1','1','1')");

		
			if($query_insert){
				$codCliente = mysqli_insert_id($conexion2);
				$msg = $codCliente;
			}else{
				$msg='error';
			}
			mysqli_close($conexion2);
			echo $msg;
			exit;
		}

		//Agregar producto al detalle temporal
		if($_POST['action'] == 'addProductoDetalle'){
			if(empty($_POST['producto']) || empty($_POST['cantidad']))
			{
				echo 'error';
			}else{
				$codproducto = $_POST['producto'];
				$cantidad 	 = $_POST['cantidad'];
				$token 		 = md5($_SESSION['idUser']);

				$query_iva = mysqli_query($conection,"SELECT iva FROM configuracion");
				$result_iva = mysqli_num_rows($query_iva);

				$query_detalle_temp 	= mysqli_query($conection,"CALL add_detalle_temp($codproducto,$cantidad,'$token')");
				$result = mysqli_num_rows($query_detalle_temp);

				$detalleTabla = '';
				$sub_total  = 0;
				$iva 		= 0;
				$total 		= 0;
				$arrayData = array();

				if($result > 0){
					if($result_iva > 0){
						$info_iva =  mysqli_fetch_assoc($query_iva);
						$iva = $info_iva['iva'];
					}

					while ($data = mysqli_fetch_assoc($query_detalle_temp)){
						$precioTotal = round($data['cantidad'] * $data['precio_venta'], 2);
						$sub_total 	 = round($sub_total + $precioTotal, 2);
						$total 	 	 = round($total + $precioTotal, 2);

						$detalleTabla .= '<tr>
											<td>'.$data['codproducto'].'</td>
											<td colspan="2">'.$data['descripcion'].'</td>
											<td class="textcenter">'.$data['cantidad'].'</td>
											<td class="textright">'.$data['precio_venta'].'</td>
											<td class="textright">'.$precioTotal.'</td>
											<td class="">
												<a class="link_delete" href="#" onclick="event.preventDefault(); del_product_detalle('.$data['correlativo'].');"><i class="far fa-trash-alt"></i></a>
											</td>
										</tr>';
					}

					$impuesto 	= round($sub_total * ($iva / 100), 2);
					$tl_sniva 	= round($sub_total - $impuesto, 2);
					$total 		= round($tl_sniva + $impuesto, 2);

					$detalleTotales = '<tr>
											<td colspan="5" class="textright">SUBTOTAL $.</td>
											<td class="textright">'.$tl_sniva.'</td>
										</tr>
										<tr>
											<td colspan="5" class="textright">IVA ('.$iva.'%)</td>
											<td class="textright">'.$impuesto.'</td>
										</tr>
										<tr>
											<td colspan="5" class="textright">TOTAL $.</td>
											<td class="textright">'.$total.'</td>
										</tr>';

					$arrayData['detalle'] = $detalleTabla;
					$arrayData['totales'] = $detalleTotales;

					echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);

				}else{
					echo 'error';
				}
				mysqli_close($conection);

			}
			exit;

		}

		//Extrae datos del detalle_temp
		if($_POST['action'] == 'serchForDetalle'){
			if(empty($_POST['user']))
			{
				echo 'error';
			}else{

				$token = md5($_SESSION['idUser']);

				$query = mysqli_query($conexion2,"SELECT tmp.CORRELATIVO,
														 tmp.token_user,
														 tmp.CANTIDAD,
														 tmp.PRECIO_VENTA,
														 p.COD_PRODUCTO,
														 p.DESCRIPCION
													FROM tbl_detalle_factura_temp tmp
													INNER JOIN TBLproducto p
													ON tmp.COD_PRODUCTO = p.COD_PRODUCTO
													WHERE token_user = '$token' ");

				$result = mysqli_num_rows($query);

				$query_iva = mysqli_query($conexion2,"SELECT iva FROM configuracion");
				$result_iva = mysqli_num_rows($query_iva);

				$detalleTabla = '';
				$sub_total  = 0;
				$iva 		= 0;
				$total 		= 0;
				$arrayData = array();

				if($result > 0){
					if($result_iva > 0){
						$info_iva =  mysqli_fetch_assoc($query_iva);
						$iva = $info_iva['iva'];
					}

					while ($data = mysqli_fetch_assoc($query)){
						$precioTotal = round($data['cantidad'] * $data['precio_venta'], 2);
						$sub_total 	 = round($sub_total + $precioTotal, 2);
						$total 	 	 = round($total + $precioTotal, 2);

						$detalleTabla .= '<tr>
											<td>'.$data['codproducto'].'</td>
											<td colspan="2">'.$data['descripcion'].'</td>
											<td class="textcenter">'.$data['cantidad'].'</td>
											<td class="textright">'.$data['precio_venta'].'</td>
											<td class="textright">'.$precioTotal.'</td>
											<td class="">
												<a class="link_delete" href="#" onclick="event.preventDefault(); del_product_detalle('.$data['correlativo'].');"><i class="far fa-trash-alt"></i></a>
											</td>
										</tr>';
					}

					$impuesto 	= round($sub_total * ($iva / 100), 2);
					$tl_sniva 	= round($sub_total - $impuesto, 2);
					$total 		= round($tl_sniva + $impuesto, 2);

					$detalleTotales = '<tr>
											<td colspan="5" class="textright">SUBTOTAL $.</td>
											<td class="textright">'.$tl_sniva.'</td>
										</tr>
										<tr>
											<td colspan="5" class="textright">ISV ('.$iva.'%)</td>
											<td class="textright">'.$impuesto.'</td>
										</tr>
										<tr>
											<td colspan="5" class="textright">TOTAL $.</td>
											<td class="textright">'.$total.'</td>
										</tr>';

					$arrayData['detalle'] = $detalleTabla;
					$arrayData['totales'] = $detalleTotales;

					echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);

				}else{
					echo 'error';
				}
				mysqli_close($conexion2);

			}
			exit;

		}

		if($_POST['action'] == 'delProductoDetalle'){
			if(empty($_POST['id_detalle']))
			{
				echo 'error';
			}else{

				$id_detalle = $_POST['id_detalle'];
				$token 		= md5($_SESSION['idUser']);

				$query_iva = mysqli_query($conexion2,"SELECT iva FROM configuracion");
				$result_iva = mysqli_num_rows($query_iva);

				$query_detalle_temp 	= mysqli_query($conexion2,"CALL del_detalle_temp($id_detalle,'$token')");
				$result = mysqli_num_rows($query_detalle_temp);

				$detalleTabla = '';
				$sub_total  = 0;
				$iva 		= 0;
				$total 		= 0;
				$arrayData = array();

				if($result > 0){
					if($result_iva > 0){
						$info_iva =  mysqli_fetch_assoc($query_iva);
						$iva = $info_iva['iva'];
					}

					while ($data = mysqli_fetch_assoc($query_detalle_temp)){
						$precioTotal = round($data['cantidad'] * $data['precio_venta'], 2);
						$sub_total 	 = round($sub_total + $precioTotal, 2);
						$total 	 	 = round($total + $precioTotal, 2);

						$detalleTabla .= '<tr>
											<td>'.$data['codproducto'].'</td>
											<td colspan="2">'.$data['descripcion'].'</td>
											<td class="textcenter">'.$data['cantidad'].'</td>
											<td class="textright">'.$data['precio_venta'].'</td>
											<td class="textright">'.$precioTotal.'</td>
											<td class="">
												<a class="link_delete" href="#" onclick="event.preventDefault(); del_product_detalle('.$data['correlativo'].');"><i class="far fa-trash-alt"></i></a>
											</td>
										</tr>';
					}

					$impuesto 	= round($sub_total * ($iva / 100), 2);
					$tl_sniva 	= round($sub_total - $impuesto, 2);
					$total 		= round($tl_sniva + $impuesto, 2);

					$detalleTotales = '<tr>
											<td colspan="5" class="textright">SUBTOTAL $.</td>
											<td class="textright">'.$tl_sniva.'</td>
										</tr>
										<tr>
											<td colspan="5" class="textright">ISV ('.$iva.'%)</td>
											<td class="textright">'.$impuesto.'</td>
										</tr>
										<tr>
											<td colspan="5" class="textright">TOTAL $.</td>
											<td class="textright">'.$total.'</td>
										</tr>';

					$arrayData['detalle'] = $detalleTabla;
					$arrayData['totales'] = $detalleTotales;

					echo json_encode($arrayData,JSON_UNESCAPED_UNICODE);

				}else{
					echo 'error';
				}
				mysqli_close($conexion2);

			}
			exit;

		}

		// Anular Venta
		if($_POST['action'] == 'anularVenta'){

			$token 		 = md5($_SESSION['idUser']);

			$query_del = mysqli_query($conexion2,"DELETE FROM detalle_temp WHERE token_user = '$token' ");
			mysqli_close($conexion2);
			if($query_del){
				echo 'ok';
			}else{
				echo 'error';
			}
			exit;
		}

		// Procesar Venta
		if($_POST['action'] == 'procesarVenta'){

			if(empty($_POST['codcliente'])){
				$codcliente = 1;
			}else{
				$codcliente = $_POST['codcliente'];
			}

			$token 		= md5($_SESSION['idUser']);
			$usuario 	= $_SESSION['idUser'];

			$query = mysqli_query($conexion2,"SELECT * FROM detalle_temp WHERE token_user = '$token' ");
			$result = mysqli_num_rows($query);

			if($result > 0)
			{
				$query_procesar = mysqli_query($conexion2,"CALL procesar_venta($usuario,$codcliente,'$token')");
				$result_detalle = mysqli_num_rows($query_procesar);

				if($result_detalle > 0){
					$data	= mysqli_fetch_assoc($query_procesar);
					echo json_encode($data,JSON_UNESCAPED_UNICODE);
				}else{
					echo "error";
				}
			}else{
				echo "error";
			}
			mysqli_close($conexion2);
			exit;
		}

		// Info Factura
		if($_POST['action'] == 'infoFactura'){
			if(!empty($_POST['nofactura'])){

				$nofactura = $_POST['nofactura'];
				$query = mysqli_query($conexion2,"SELECT * FROM factura WHERE nofactura = '$nofactura' AND estatus = 1");
				mysqli_close($conexion2);

				$result = mysqli_num_rows($query);
				if($result > 0){

					$data = mysqli_fetch_assoc($query);
					echo json_encode($data,JSON_UNESCAPED_UNICODE);
					exit;
				}
			}
			echo "error";
			exit;
		}

		// Anular Factura
		if($_POST['action'] == 'anularFactura'){

			if(!empty($_POST['noFactura']))
			{
				$noFactura = $_POST['noFactura'];

				$query_anular 	= mysqli_query($conexion2,"CALL anular_factura($noFactura)");
				mysqli_close($conexion2);
				$result = mysqli_num_rows($query_anular);
				if($result > 0){
					$data	= mysqli_fetch_assoc($query_anular);
					echo json_encode($data,JSON_UNESCAPED_UNICODE);
					exit;
				}
			}
			echo "error";
			exit;
		}

		// Cambiar contraseña
		if($_POST['action'] == 'changePassword'){

			if(!empty($_POST['passActual']) && !empty($_POST['passNuevo']))
			{
				$password = md5($_POST['passActual']);
				$newPass  = md5($_POST['passNuevo']);
				$idUser   = $_SESSION['idUser'];

				$code 		= '';
				$msg    	= '';
				$arrData 	= array();

				$query_user = mysqli_query($conexion2,"SELECT * FROM usuario 
														WHERE clave = '$password' and idusuario = $idUser ");
				$result 	 = mysqli_num_rows($query_user);
				if($result > 0)
				{
					$query_update = mysqli_query($conexion2,"UPDATE usuario SET clave = '$newPass' WHERE idusuario = $idUser ");
					mysqli_close($conexion2);

					if($query_update){
						$code = '00';
						$msg = "Su contraseña se ha actualizado con éxito.";
					}else{
						$code = '2';
						$msg = "No es posible cambiar su contraseña.";
					}
				}else{
					$code = '1';
					$msg = "La contraseña actual es incorrecta.";
				}
				$arrData = array('cod' => $code, 'msg' => $msg);
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);

			}else{
				echo "error";
			}
			exit;
		}

		//Actualizar datos empresa
		if($_POST['action'] == 'updateDataEmpresa'){

			if(empty($_POST['txtNit']) || empty($_POST['txtNombre']) ||  empty($_POST['txtTelEmpresa']) || empty($_POST['txtEmailEmpresa']) || empty($_POST['txtDirEmpresa']) || empty($_POST['txtIva']))
				{
					$code = '1';
					$msg = "Todos los campos son obligatorios";
				}else{

					$intNit 	= intval($_POST['txtNit']);
					$strNombre 	= $_POST['txtNombre'];
					$strRSocial = $_POST['txtRSocial'];
					$intTel 	= intval($_POST['txtTelEmpresa']);
					$strEmail 	= $_POST['txtEmailEmpresa'];
					$strDir 	= $_POST['txtDirEmpresa'];
					$strIva 	= $_POST['txtIva'];

					$queryUpd = mysqli_query($conexion2,"UPDATE configuracion SET nit 	= $intNit,
																			nombre	= '$strNombre',
																			razon_social='$strRSocial',
																			telefono = $intTel,
																			email 	= '$strEmail',
																			direccion = '$strDir',
																			iva 	= $strIva
																		WHERE id = 1 ");
					mysqli_close($conexion2);
					if($queryUpd){
						$code = '00';
						$msg = "Datos actualizados correctamente.";
					}else{
						$code = '2';
						$msg = "Error al actualizar los datos.";
					}
				}

				$arrData = array('cod' => $code, 'msg' => $msg);
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
				exit;
		}


	}

	exit;

?>