<?php include("../cabecera.php") ?>
<?php include("../sidebar.php")?>


  <main id="main" class="main">

    <div class="pagetitle">
    <div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>MANTENIMIENTO DE <b>USUARIOS</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Nuevo Usuario</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <tbody>
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
                                        echo "<th>ID USUARIO</th>";
                                        echo "<th>USUARIO</th>";
                                        echo "<th>Nombre USUARIO</th>";
                                        echo "<th>ESTADO</th>";
                                        echo "<th>CONTRASEÑA</th>";
                                        echo "<th>ID ROL</th>";
                                        echo "<th>FECHA ULTIMA CONEXIÓN</th>";
                                        echo "<th>ID PREGUNTA</th>";
                                        echo "<th>PREGUNTAS CONTESTADAS</th>";
                                        echo "<th>PRIMER INGRESO</th>";
                                        echo "<th>FECHA VENCIMIENTO</th>";
                                        echo "<th>CORREO ELECTRONICO</th>";
                                        echo "<th>CREADO POR</th>";
                                        echo "<th>FECHA CREACION</th>";
                                        echo "<th>MODIFICADO POR</th>";
                                        echo "<th>FECHA MODIFICACIÓN</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['Id_Usuario'] . "</td>";
                                        echo "<td>" . $row['Usuario'] . "</td>";
                                        echo "<td>" . $row['Nombre_Usuario'] . "</td>";
                                        echo "<td>" . $row['Estado_Usuario'] . "</td>";
                                        echo "<td>" . $row['Contrasena'] . "</td>";
                                        echo "<td>" . $row['Id_Rol'] . "</td>";
                                        echo "<td>" . $row['Fecha_Ultima_Conexion'] . "</td>";
                                        echo "<td>" . $row['Id_Pregunta'] . "</td>";
                                        echo "<td>" . $row['Preguntas_Contestadas'] . "</td>";
                                        echo "<td>" . $row['Primer_Ingreso'] . "</td>";
                                        echo "<td>" . $row['Fecha_Vencimiento'] . "</td>";
                                        echo "<td>" . $row['Correo_Electronico'] . "</td>";
                                        echo "<td>" . $row['Creado_Por'] . "</td>";
                                        echo "<td>" . $row['Fecha_Creacion'] . "</td>";
                                        echo "<td>" . $row['Modificado_Por'] . "</td>";
                                        echo "<td>" . $row['Fecha_Modificacion'] . "</td>";
                                        echo "<td>";
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