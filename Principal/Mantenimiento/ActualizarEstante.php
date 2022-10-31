<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Estante</title>
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
                    <h2 class="mt-5">Actualizar Estante</h2>
                    <p>Por favor llenar este formulario para actualizar un estante en la base.</p>
                    <form action="UpdateEstante.php" method="post">

                    <div class="col-12">
                      <label for="yourName" class="form-label">Codigo estante</label>
                      <input type="text" name="CodigoEstante" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Porfavor, ingrese el codigo!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Nombre estante</label>
                      <input type="text" name="NombreEstante" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Porfavor, ingrese el nombre del estante!</div>
                    </div>

                    <P>
                        
                    </P>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Actualizar</button>
                    </div>
                    
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>