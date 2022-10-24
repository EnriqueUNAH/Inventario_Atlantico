<?php include("../cabecera.php") ?>
<?php include("../sidebar.php")?>

<main id="main" class="main">

<div class="pagetitle">
<div class="container-lg">
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-8"><h2>MANTENIMIENTO DE <b>TIPO PERSONA</b></h2></div>
                <div class="col-sm-4">
                <button type="button" onclick="window.location='CrearProveedor.php'" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Nuevo Tipo persona</button>
              </div>
            </div>
        </div>
        <table class="table table-bordered">
                <tbody>
                <?php
                    // Include db
                    require_once "../db2.php";
                    
                    //  query
                    $sql = "SELECT * FROM tbl_proveedor";
                    if($result = mysqli_query($conexion2, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Codigo Proveedor</th>";
                                        echo "<th>Nombre Representante</th>";
                                        echo "<th>Nombre Empresa</th>";
                                        echo "<th>RTN</th>";
                                        echo "<th>Codigo Producto</th>";
                                        echo "<th>Otras Opciones</th>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['COD_PROVEEDOR'] . "</td>";
                                        echo "<td>" . $row['NOMBRE_REPRESENTANTE'] . "</td>";
                                        echo "<td>" . $row['NOMBRE_EMPRESA'] . "</td>";
                                        echo "<td>" . $row['RTN'] . "</td>";
                                        echo "<td>" . $row['COD_PRODUCTO'] . "</td>";
                                        echo '<td><a href="ActualizarProveedor.php"><button type="button" class="btn btn-info add-new"><i class="fa fa-edit"></i> Editar</button></button> <a href="BorrarProveedor.php"><button type="button" class="btn btn-info add-new"><i class="fa fa-trash"></i> Eliminar</button><td>';
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Liberar resultado
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // CERRAR CONEXION
                    mysqli_close($conexion2);
                    ?>
                </div>
                </tbody>
            </table>
    </div>
    </div>        
</div>     
</div><!-- End Page Title -->



</main><!-- End #main -->

  <?php include("../footer.php"); ?>