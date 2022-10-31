<?php include("../cabecera.php") ?>
<?php include("../sidebar.php")?>


  <main id="main" class="main">

    <div class="pagetitle">
    <div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Genero</b></h2></div>
                    <div class="col-sm-8">
                        <button type="button" onclick="window.location='AgregarGenero.php'" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Genero </button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <tbody>
                <?php
                    // Include db
                    require_once "../db2.php";
                    
                    //  query
                    $sql = "SELECT * FROM tbl_genero";
                    if($result = mysqli_query($conexion2, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Codigo Genero</th>";
                                        echo "<th>Nombre Genero</th>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['COD_GENERO'] . "</td>";
                                        echo "<td>" . $row['NOMBRE_GENERO'] . "</td>";
                                        echo '<td><a href="ActualizarGenero.php"><button type="button" class="btn btn-info add-new"><i class="fa fa-edit"></i> Editar</button></button> <a href="BorrarGenero.php"><button type="button" class="btn btn-info add-new"><i class="fa fa-trash"></i> Eliminar</button><td>';
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Liberar resultado
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No se encontraron registros.</em></div>';
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
  <?php include("../footer.php")?>