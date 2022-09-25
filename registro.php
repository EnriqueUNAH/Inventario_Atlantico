        <?php
            include( 'db.php' );
            $nombre = strtoupper($_POST[ 'name' ]);
            $usuario = strtoupper($_POST[ 'username' ]);
            $contrasena = ($_POST[ 'password' ]);
            $correo = ($_POST[ 'email' ]);
            $fechaC = date('Y-m-d');

            $consulta="SELECT * FROM tbl_ms_usuario";
              
            $resultado= mysqli_query( $conexion , $consulta );
            $filas = mysqli_num_rows( $resultado );
            $filas=$filas+1;
            $insertar="INSERT INTO tbl_ms_usuario VALUES('$filas','$usuario','NUEVO','$nombre','$contrasena','$filas','$fechaC','1','0','0','$fechaC','$correo','$nombre','$fechaC','$nombre','$fechaC','$filas','$filas')";
            mysqli_query( $conexion , $insertar );

            mysqli_close($conexion);
            
            include('preguntas.html')
         ?>
