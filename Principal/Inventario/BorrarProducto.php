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
                    <h2 class="mt-5">Delete Record</h2>
                    <p>Por favor llena este form y submit para borrar un Producto a la base.</p>
                    <form action="delete_producto.php" method="post">

                    <div class="col-12">
                      <label for="yourName" class="form-label">Codigo Producto</label>
                      <input type="text" name="CodigoProducto" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-6 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                            <input type="submit" name="save" class="btn btn-sm btn-primary" value="Borrar datos">
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