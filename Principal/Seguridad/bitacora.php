<?php include("../cabecera.php") ?>
<?php include("../sidebar.php")?>


  <main id="main" class="main">

    <div class="pagetitle">
    <div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>PANTALLA DE <b>BITACORA</b></h2></div>
                    <div class="col-sm-8">
                    <!--<button type="button" onclick="window.location='CrearUsuario.php'" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Nuevo Usuario</button>-->
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <tbody>
                <?php
                    // Include db
                    require_once "../db2.php";
                    
                    //  query
                    $sql = "SELECT * FROM tbl_bitacora";
                    if($result = mysqli_query($conexion2, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID BITACORA</th>";
                                        echo "<th>FECHA</th>";
                                        echo "<th>ID USUARIO</th>";
                                        echo "<th>ID OBJETO</th>";
                                        echo "<th>ACCION</th>";
                                        echo "<th>DESCRIPCION</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['ID_BITACORA'] . "</td>";
                                        echo "<td>" . $row['FECHA'] . "</td>";
                                        echo "<td>" . $row['ID_USUARIO'] . "</td>";
                                        echo "<td>" . $row['ID_OBJETO'] . "</td>";
                                        echo "<td>" . $row['ACCION'] . "</td>";
                                        echo "<td>" . $row['DESCRIPCION'] . "</td>";
                                        //echo '<td><a href="ActualizarUsuario.php"><button type="button" class="btn btn-info add-new"><i class="fa fa-edit"></i> Editar</button><p></p></button> <a href="BorrarUsuario.php"><button type="button" class="btn btn-info add-new"><i class="fa fa-trash"></i> Eliminar</button><td>';
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Liberar resultado
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No se encontraron Records.</em></div>';
                        }
                    } else{
                        echo "Oops! algo salio mal. por favor intentalo despues.";
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