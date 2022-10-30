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
                    <h2 class="mt-5">Delete Tipo Producto</h2>
                    <p>Por favor llena este form y submit para borrar un tipo producto de la base.</p>
                    <form action="DeleteTipoProducto.php" method="post">

                    <div class="col-12">
                      <label for="yourName" class="form-label">Codigo Tipo Movimiento</label>
                      <input type="text" name="CodigoTipoProducto" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Porfavor, ingrese un codigo!</div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-6 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                            <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
                            <a href="Mantenimiento-tipo-producto.php" class="btn btn-sm btn-danger">Cancelar</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>