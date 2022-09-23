<?php
        $nombre = strtoupper($_POST['name']);
        $correo = $_POST['email'];
        $contrasena = $_POST['password'];
        $nombre_usuario = strtoupper($_POST['username']);
        include( 'db.php' );
        $numero = mysqli_query( $conexion , "SELECT * FROM tbl_ms_usuario" );
        $filas = mysqli_num_rows( $numero );
        $filas =  $filas+1;
        $fechaCreacion = date('d-m-y');
        $fechaVencimiento = $_POST['Date_'];
        $estado = strtoupper($_POST['Estate']);
        $rol = strtoupper($_POST['Rol']);
        $descripcion = "";
        
        $registro="INSERT INTO tbl_ms_usuario VALUES ('$filas', '$nombre',  '$estado',  '$nombre_usuario',  '$contrasena', '$filas', '$fechaCreacion',  '$filas', '$filas', '$filas', '$fechaVencimiento', '$correo', '$nombre_usuario', '$fechaCreacion', '$nombre_usuario', '$fechaCreacion', '$filas', '$filas')";
        $registro_="INSERT INTO tbl_ms_roles VALUES ('$filas', '$rol', '$descripcion','$nombre', '$fechaCreacion','$nombre','$fechaCreacion', '$filas')";
        mysqli_query( $conexion, $registro );
        mysqli_query( $conexion, $registro_ );
        include("login.html")
?>