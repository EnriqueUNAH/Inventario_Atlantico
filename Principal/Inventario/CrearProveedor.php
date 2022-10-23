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
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Codigo Proveedor</label>
                            <input type="text" name="CodigoProveedor" class="form-control <?php echo (!empty($cod_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $CodigoProveedor; ?>">
                            <span class="invalid-feedback"><?php echo $cod_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>NombreRepresentante</label>
                            <textarea name="NombreRepresentante" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $NombreRepresentante; ?></textarea>
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Empresa</label>
                            <input type="text" name="NombreEmpresa" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $NombreEmpresa; ?>">
                            <span class="invalid-feedback"><?php echo $name_err2;?></span>
                        </div>
                        <div class="form-group">
                            <label>RTN</label>
                            <input type="text" name="RTN" class="form-control <?php echo (!empty($rtn_err )) ? 'is-invalid' : ''; ?>" value="<?php echo $RTN; ?>">
                            <span class="invalid-feedback"><?php echo $rtn_err ;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

<?php
// Incluir db2 file
require_once "../db2.php";
 
// Definir variables e inicializarlas
$CodigoProveedor = $NombreRepresentante = $NombreEmpresa = "";
$RTN=0;
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validar codigo proveedor
    $CodigoProveedor = trim($_POST["CodigoProveedor"]);
    if(empty($CodigoProveedor)){
        $cod_err = "Por favor ingresa un Codigo valido.";     
    } elseif(!ctype_digit($CodigoProveedor)){
        $cod_err = "Por favor ingresa un valor positivo.";
    } else{
        $cod = $CodigoProveedor;
    }


    // Validate nombre representante
    $NombreRepresentante= trim($_POST["NombreRepresentante"]);
    if(empty($NombreRepresentante)){
        $name_err = "Por favor ingresa el nombre del representante.";
    } elseif(!filter_var($NombreRepresentante, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor ingresa un nombre valido";
    } else{
        $name = $NombreRepresentante;
    }
    
    // Validate nombre empresa
    $NombreEmpresa= trim($_POST["NombreEmpresa"]);
    if(empty($NombreEmpresa)){
        $name_err2 = "Por favor ingresa el nombre de la empresa.";
    } elseif(!filter_var($NombreEmpresa, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err2 = "Por favor ingresa un nombre valido";
    } else{
        $name2 = $NombreEmpresa;
    }
    
    // Validar RTN
    $RTN = trim($_POST["RTN"]);
    if(empty($RTN)){
        $rtn_err = "Por favor ingresa un RTN valido.";     
    } elseif(!ctype_digit($RTN)){
        $rtn_err = "Por favor ingresa un valor positivo.";
    } else{
        $rtn = $RTN;
    }
    
    // Check errores en las entradas antes de insertar a la base
    if(empty($name_err) && empty($name_err2) && empty($rtn_err) && empty($cod_err)){
        // Prepararn el query
        $sql = "INSERT INTO tbl_proveedor(COD_PROVEEDOR, NOMBRE_REPRESENTANTE, NOMBRE_EMPRESA, RTN) VALUES ('$CodigoProveedor', '$NombreRepresentante', '$NombreEmpresa', '$RTN')";
         
        mysqli_query( $conexion2 , $sql);
        include ("DetalleProveedores.php");
    }

}
?>
 
