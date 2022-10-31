<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Por favor llena este form y submit para agregar un Producto a la base.</p>
                    <form action="Insertar_Producto.php" method="post">

                    <div class="col-12">
                      <label for="yourName" class="form-label">Codigo Producto</label>
                      <input type="text" name="CodigoProducto" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingrese codigo del producto!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Nombre del Producto</label>
                      <input type="text" name="NombreProducto" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingrese el nombre del producto!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Descripcion</label>
                      <input type="text" name="Descripcion" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingrese una Descripcion!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Cantidad Minima de producto</label>
                      <input type="text" name="CANTIDAD_MINIMA" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingrese la cantidad minima!</div>
                    </div>
                
                    <div class="col-12">
                      <label for="yourName" class="form-label">Cantidad Maxima de producto</label>
                      <input type="text" name="CANTIDAD_MAXIMA" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingrese la cantidad maxima!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Codigo tipo producto</label>
                      <input type="text" name="COD_TIPO_PRODUCTO" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingrese el codigo del tipo de producto!</div>
                    </div>
                    
                    <div class="col-12">
                      <label for="yourName" class="form-label">Precio de Venta</label>
                      <input type="text" name="PRECIO_VENTA" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingrese el precio de venta!</div>
                    </div>

                    <div class="form-group">
					            <label class="col-sm-6 control-label">&nbsp;</label>
					            <div class="col-sm-6">
						          <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						          <a href="Detalle_Productos.php" class="btn btn-sm btn-danger">Cancelar</a>
					            </div>
				            </div>
                    
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>