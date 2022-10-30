<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Tipo Movimiento</title>
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
                    <h2 class="mt-5">Actualizar Tipo Movimiento</h2>
                    <p>Por favor llenar este formulario para actualizar un tipo de movimiento en la base.</p>
                    <form action="UpdateTipoMovimiento.php" method="post">

                    <div class="col-12">
                      <label for="yourName" class="form-label">Codigo tipo movimiento</label>
                      <input type="text" name="CodigoTipoMovimiento" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Porfavor, ingrese el codigo!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Nombre movimiento</label>
                      <input type="text" name="NombreMovimiento" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Porfavor, ingrese el tipo de movimiento!</div>
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