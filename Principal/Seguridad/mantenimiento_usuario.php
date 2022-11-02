<?php include("../cabecera.php") ?>
<?php include("../sidebar.php")?>


  <main id="main" class="main">

    <div class="pagetitle">
    <div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                <div class="col-sm-10"><h2>Mantenimiento de <b>Usuarios</b></h2></div>
                    </div>
                    <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                <input type="text" class="form-control" placeholder="Search&hellip;">
                            </div>
                    <button type="button" onclick="window.location='CrearUsuario.php'" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Nuevo Usuario</button>
                </div>
            </div>
            <table class="table table-bordered">
                <tbody>
                <div class="col-sm-6">

                        </div>
                <?php
                    // Include db
                    require_once "../db2.php";
                    
                    //  query
                    $sql = "SELECT * FROM tbl_ms_usuario";
                    if($result = mysqli_query($conexion2, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>USUARIO</th>";
                                        echo "<th>Nombre USUARIO</th>";
                                        echo "<th>ESTADO</th>";
                                        echo "<th>FECHA ULTIMA CONEXIÓN</th>";
                                        echo "<th>PREGUNTAS CONTESTADAS</th>";
                                        echo "<th>PRIMER INGRESO</th>";
                                          echo "<th>CORREO ELECTRONICO</th>";
                                        echo "<th>Otras Opciones</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['USUARIO'] . "</td>";
                                        echo "<td>" . $row['NOMBRE_USUARIO'] . "</td>";
                                        echo "<td>" . $row['ESTADO_USUARIO'] . "</td>";
                                        echo "<td>" . $row['FECHA_ULTIMA_CONEXION'] . "</td>";
                                        echo "<td>" . $row['PREGUNTAS_CONTESTADAS'] . "</td>";
                                        echo "<td>" . $row['PRIMER_INGRESO'] . "</td>";
                                        echo "<td>" . $row['CORREO_ELECTRONICO'] . "</td>";
                                        echo '<td><a href="ActualizarUsuario.php"><button type="button" class="btn btn-info add-new"><i class="fa fa-edit"></i> Editar</button><p></p></button> <a href="BorrarUsuario.php"><button type="button" class="btn btn-info add-new"><i class="fa fa-trash"></i> Eliminar</button><td>';
                                    echo "</tr>";
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

  <?php include("../footer.php")?>