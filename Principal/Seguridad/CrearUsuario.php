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
                    <form action="InsertarProveedor.php" method="post">

                    <div class="col-12">
                      <label for="yourName" class="form-label">Id_Usuario</label>
                      <input type="text" name="Id_Usuario" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingresa el ID!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Usuario</label>
                      <input type="text" name="Usuario" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingresa el Usuario!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Estado Usuario</label>
                      <input type="text" name="Estado" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingresa el estado del usuario!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Nombre Usuario</label>
                      <input type="text" name="Nombre" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingresa tu nombre de usuario!</div>
                    </div>
                    <div class="col-12">

                    <div class="col-12">
                      <label for="yourName" class="form-label">Contraseña</label>
                      <input type="text" name="Contrasena" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingresa la Contraseña!</div>
                    </div>
                    <div class="col-12">
                    


                    <div class="col-12">
                      <label for="yourName" class="form-label">Correo</label>
                      <input type="text" name="Correo" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                    <div class="col-12">
                 
                    <p>
                        
                    </P>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Crear Proveedor</button>
                    </div>
                    
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>