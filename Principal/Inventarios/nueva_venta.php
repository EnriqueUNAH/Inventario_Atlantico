<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
    <script src="js/fun.js"></script>
    <script src="js/icons.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body>
<?php include "../cabecera.php"; ?>
	<?php include "../sidebar.php"; ?>
	<?php include "../db2.php"; ?>
	<main id="main" class="main">
	<section id="container">
		<div class="title_page">
			<h1><i></i> Nueva Venta</h1>
		</div>
		<div class="datos_cliente">
			<div class="action_cliente">
				<h4>DATOS DEL CLIENTE</h4>
				<a href="#" class="btn_new btn_new_cliente"><i class="fas fa-plus"></i> Nuevo cliente</a>
			</div>
			<form name="form_new_cliente_venta" id="form_new_cliente_venta" class="datos">
				<input type="hidden" name="action" value="addCliente" >
				<input type="hidden" id="idcliente" name="idcliente" value="" required>
				<div class="wd30">
					<label>RTN</label>
					<input type="text" name="nit_cliente" id="nit_cliente">
				</div>
				<div class="wd30">
					<label>NOMBRE</label>
					<input type="text" name="nom_cliente" id="nom_cliente" disabled required>
				</div>
				<div class="wd30">
					<label>TELÉFONO</label>
					<input type="number" name="tel_cliente" id="tel_cliente" disabled required>
				</div>
				<div class="wd100">
					<label>DIRECCION</label>
					<input type="text" name="dir_cliente" id="dir_cliente" disabled required>
				</div>
				<div id="div_registro_cliente" class="wd100">
					<button type="submit" class="btn_save"><i class="far fa-save fa-lg"></i> Guardar</button>
				</div>
			</form>
		</div>
		<div class="datos_venta">
			<h4>Datos de Venta</h4>
			<div class="datos">
				<div class="wd50">
					<label>Vendedor</label>
					<p><?php echo $_SESSION['nombre']; ?></p>
				</div>
				<div class="wd50">
					<label>Acciones</label>
					<div id="acciones_venta">
						<a href="#" class="btn_ok textcenter" id="btn_anular_venta"><i class="fas fa-ban"></i> Anular</a>
						<a href="#" class="btn_new textcenter" id="btn_facturar_venta" style="display: none;"><i class="far fa-edit"></i> Procesar</a>
					</div>
				</div>
			</div>
		</div>
	<div class="containerTable">
		<table class="tbl_venta">
			<thead>
				<tr>
					<th width="100px">CÓDIGO</th>
					<th>DESCRPCION</th>
					<th>EXISTENIAS</th>
					<th width="100px">CANTIDAD</th>
					<th class="textright">PRECIO</th>
					<th class="textright">PRECIO TOTAL</th>
					<th> ACCIÓN</th>
				</tr>
				<tr>
					<td><input type="text" name="txt_cod_producto" id="txt_cod_producto"></td>
					<td id="txt_descripcion">-</td>
					<td id="txt_existencia">-</td>
					<td><input type="text" name="txt_cant_producto" id="txt_cant_producto" value="0" min="1" disabled></td>
					<td id="txt_precio" class="textright">0.00</td>
					<td id="txt_precio_total" class="textright">0.00</td>
					<td> <a href="#" id="add_product_venta" class="link_add"><i class="fas fa-plus"></i> Agregar</a></td>
				</tr>
				<tr>
					<th>Código</th>
					<th colspan="2">Descripción</th>
					<th>Cantidad</th>
					<th class="textright">Precio</th>
					<th class="textright">Precio Total</th>
					<th> Acción</th>
				</tr>
			</thead>
			<tbody id="detalle_venta">
				<!-- CONTENIDO AJAX -->
			</tbody>
			<tfoot id="detalle_totales">
				<!-- CONTENIDO AJAX -->
			</tfoot>
		</table>
	</div>
	</section>
	</main>
	<?php include "../footer.php"; ?>


	<script type="text/javascript">
		$(document).ready(function(){
			var usuarioid = '<?php echo $_SESSION['idUser']; ?>';
			serchForDetalle(usuarioid);

		});
	</script>

    <script type="text/javascript">
    //Activa campos para registrar cliente
        $('.btn_new_cliente').click(function(e){
        e.preventDefault();
        $('#nom_cliente').removeAttr('disabled');
        $('#tel_cliente').removeAttr('disabled');
        $('#dir_cliente').removeAttr('disabled');

        $('#div_registro_cliente').slideDown();
    });
	</script>

    <script type="text/javascript">
        //Buscar Cliente
    $('#nit_cliente').keyup(function(e){
        e.preventDefault();

        var cl = $(this).val();
        var action = 'searchCliente';

        $.ajax({
            url:  './ajax.php',
            type: "POST",
            async : true,
            data: {action:action,cliente:cl},

            success: function(response)
            {
                if(response == 0){
                    $('#idcliente').val('');
                    $('#nom_cliente').val('');
                    $('#tel_cliente').val('');
                    $('#dir_cliente').val('');
                    //Mostrar boton agregar
                    $('.btn_new_cliente').slideDown();
                }else{
                    var data  = $.parseJSON(response);
                    $('#idcliente').val(data.idcliente);
                    $('#nom_cliente').val(data.NOMBRE_COMPLETO);
                    $('#tel_cliente').val(data.TELEFONO);
                    $('#dir_cliente').val(data.DIRECCION);
                    //Ocultar boton agregar
                    $('.btn_new_cliente').slideUp();

                    //Bloque campos
                    $('#nom_cliente').attr('disabled','disabled');
                    $('#tel_cliente').attr('disabled','disabled');
                    $('#dir_cliente').attr('disabled','disabled');

                    //Oculta boton guardar
                    $('#div_registro_cliente').slideUp();
                }
            },
            error: function(error) {
            }
        });

    });
    </script>

    <script type="text/javascript">
        $('#form_new_cliente_venta').submit(function(e){
        e.preventDefault();

         $.ajax({
            url:  'ajax.php',
            type: "POST",
            async : true,
            data: $('#form_new_cliente_venta').serialize(),

            success: function(response)
            {
                if(response != 'error'){
                    //Agregar id a input hiden
                    $('#idcliente').val(response);
                    //Bloque campos
                    $('#nom_cliente').attr('disabled','disabled');
                    $('#tel_cliente').attr('disabled','disabled');
                    $('#dir_cliente').attr('disabled','disabled');

                    //Oculta boton agregar
                    $('.btn_new_cliente').slideUp();
                    //Oculta boton guardar
                    $('#div_registro_cliente').slideUp();
                }


            },
            error: function(error) {
            }
        });
    });
    </script>

    <script type="text/javascript">
    // Validar Cantidad del producto antes de agregar
    $('#txt_cant_producto').keyup(function(e){
        e.preventDefault();

        var precio_total = $(this).val() * $('#txt_precio').html();
        var existencia = parseInt($('#txt_existencia').html());
        $('#txt_precio_total').html(precio_total);

        //Oculta el boton agregar si la cantidad es menor que 1
        if(  ($(this).val() < 1 || isNaN($(this).val())) || ( $(this).val() > existencia)  ){
            $('#add_product_venta').slideUp();
        }else{
            $('#add_product_venta').slideDown();
        }
    });
    </script>

    <script type="text/javascript">
        //BUSCAR PRODUCTO
         $('#txt_cod_producto').keyup(function(e){
        e.preventDefault();

        var producto = $(this).val();
        var action = 'infoProducto';

        if(producto != '')
        {
             $.ajax({
                url:  './ajax.php',
                type: "POST",
                async : true,
                data: {action:action,producto:producto},

                success: function(response)
                {
                    if(response != 'error')
                    {
                        var info = JSON.parse(response);
                        $('#txt_descripcion').html(info.DESCRIPCION);
                        $('#txt_existencia').html(info.EXISTENCIA);
                        $('#txt_cant_producto').val('0');
                        $('#txt_precio').html(info.PRECIO_VENTA);
                        $('#txt_precio_total').html(info.precio);

                        //Activar Cantidad
                        $('#txt_cant_producto').removeAttr('disabled');

                        //Mostrar botón agregar
                        $('#add_product_venta').slideDown();
                    }else{
                        $('#txt_descripcion').html('-');
                        $('#txt_existencia').html('-');
                        $('#txt_cant_producto').val('0');
                        $('#txt_precio').html('0.00');
                        $('#txt_precio_total').html('0.00');

                        //Bloquear Cantidad
                        $('#txt_cant_producto').attr('disabled','disabled');

                        //Ocultar boton agregar
                         $('#add_product_venta').slideUp();

                    }


                },
                error: function(error) {
                }
            });
        }
    });
    </script>
    
    <script type="text/javascript">
     //Agregar producto al detalle
     $('#add_product_venta').click(function(e){
        e.preventDefault();

        if($('#txt_cant_producto').val() > 0)
        {
            var codproducto = $('#txt_cod_producto').val();
            var cantidad    = $('#txt_cant_producto').val();
            var action      = 'addProductoDetalle';

            $.ajax({
                url : './ajax.php',
                type: "POST",
                async : true,
                data: {action:action,producto:codproducto,cantidad:cantidad},

                success: function(response)
                {
                    if(response != 'error')
                    {
                        var info = JSON.parse(response);
                        $('#detalle_venta').html(info.detalle);
                        $('#detalle_totales').html(info.totales);

                        $('#txt_cod_producto').val('');
                        $('#txt_descripcion').html('-');
                        $('#txt_existencia').html('-');
                        $('#txt_cant_producto').val('0');
                        $('#txt_precio').html('0.00');
                        $('#txt_precio_total').html('0.00');

                        //Bloquear Cantidad
                        $('#txt_cant_producto').attr('disabled','disabled');

                        //Ocultar boton agregar
                        $('#add_product_venta').slideUp();


                    }else{
                        console.log('no data');
                    }
                    viewProcesar();
                },
                error: function(error) {
                }
            });
        }
    });
    </script>

</body>
</html>