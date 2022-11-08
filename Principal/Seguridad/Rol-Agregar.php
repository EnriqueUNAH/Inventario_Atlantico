<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Nuevo Rol</title>
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
                    <h2 class="mt-5">Agregar Nuevo Rol</h2>
                    <p>Por favor llenar este formulario para agregar un nuevo rol a la base.</p>
                    <form action="Rol-Insertar.php" method="post">

                    <div class="col-12">
                      <label for="yourName" class="form-label">Codigo rol</label>
                      <input type="text" name="IdRol" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Porfavor, ingrese el codigo!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Nombre Rol</label>
                      <input type="text" name="NombreRol" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Porfavor, ingrese el genero!</div>
                    </div>

                    <P>
                        
                    </P>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Agregar </button>
                    </div>
                    
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>