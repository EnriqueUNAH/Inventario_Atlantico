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
                    <p>Por favor llena este form y submit para agregar un Proveedor a la base.</p>
                    <form action="InsertarProveedor.php" method="post">

                    <div class="col-12">
                      <label for="yourName" class="form-label">Codigo Proveedor</label>
                      <input type="text" name="CodigoProveedor" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingrese codigo del proveedor!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Nombre Representante</label>
                      <input type="text" name="NombreRepresentante" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingrese el nombre del representante!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Nombre Empresa</label>
                      <input type="text" name="NombreEmpresa" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingrese una empresa!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">RTN</label>
                      <input type="text" name="RTN" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingrese un RTN!</div>
                    </div>
      
                    <div class="form-group">
					            <label class="col-sm-6 control-label">&nbsp;</label>
					            <div class="col-sm-6">
						          <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						          <a href="DetalleProveedores.php" class="btn btn-sm btn-danger">Cancelar</a>
					            </div>
				            </div>
                    
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>