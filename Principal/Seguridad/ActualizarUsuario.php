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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Por favor llena este form y submit para actualizar un Usuario a la base.</p>
                    <form action="update.php" method="post">

                    <div class="col-12">
                      <label for="yourName" class="form-label">Id Usuario</label>
                      <input type="text" name="Id" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingresa un ID!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Nuevo Usuario</label>
                      <input type="text" name="Usuario" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Por favor ingresa un Usuario!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">SELECCIONE UN ROL:</label>
                      <select name="Rol" class="form-control">
                      <?php
                            include("../db2.php");
                            $ejecutar= mysqli_query( $conexion2 , "SELECT * FROM tbl_ms_roles " );
                            
                        ?>
                        <?php foreach ($ejecutar as $opciones): ?>
                            <option value="<?php echo $opciones['ROL']?>"><?php echo $opciones['ROL'] ?></option>
                        <?php endforeach ?>
                        <?php ?>
                                            
                      </select>
                      <div class="invalid-feedback">Rol INVALIDO!</div>
                    </div> 

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Nuevo Correo</label>
                      <input type="email" name="Correo" placeholder="nombre@dominio.com" class="form-control" onkeypress="javascript: return validar_espacio(event,this)" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Por favor ingresa un email valido!</div>
                    </div>
                   
                    <p>
                        
                    </P>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Actualizar Proveedor</button>
                    </div>
                    
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>