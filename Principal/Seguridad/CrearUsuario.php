
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
                    <p>Por favor llena este form y submit para agregar un Usuario a la base.</p>
                    <form action="create.php" method="post">

                    <div class="col-12">
                      <label for="yourName" class="form-label">Usuario</label>
                      <input type="text" name="Usuario" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingresa el Usuario!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Nombre Usuario</label>
                      <input type="text" name="Nombre" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingresa tu nombre de usuario!</div>
                    </div>


                    <div class="col-12">
                      <label for="yourName" class="form-label">Contraseña</label>
                      <input type="text" name="Contrasena" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingresa la Contraseña!</div>
                    </div>

                    


                    <div class="col-12">
                      <label for="yourName" class="form-label">Correo</label>
                      <input type="text" name="Correo" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                 
                    <div class="form-group">
					            <label class="col-sm-6 control-label">&nbsp;</label>
					            <div class="col-sm-6">
						          <input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						          <a href="mantenimiento_usuario.php" class="btn btn-sm btn-danger">Cancelar</a>
					            </div>
				            </div>
                    
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>