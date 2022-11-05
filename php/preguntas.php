<?php
    include( 'db.php' );
    $respuesta=strtoupper(($_POST[ 'respuesta' ]));
    $pregunta=($_POST[ 'pregunta' ]);
    $fechaC = date('Y-m-d');

    $consulta="SELECT * FROM tbl_ms_usuario";
    $resultado= mysqli_query( $conexion , $consulta );
    $filas = mysqli_num_rows( $resultado );

    $consultar = mysqli_query( $conexion , "SELECT Usuario FROM tbl_ms_usuario WHERE Id_Usuario=$filas" );
    while ($otra=mysqli_fetch_array( $consultar )) {
        # code...
        $nombre=$otra['Usuario'];
    }


    $consultar_ = mysqli_query( $conexion , "SELECT Id_Pregunta FROM tbl_ms_preguntas WHERE Pregunta='$pregunta'");
    while ($otra_=mysqli_fetch_array( $consultar_ )) {
        # code...
        $id=$otra_['Id_Pregunta'];
    }

    $consultar__ = mysqli_query( $conexion , "SELECT Estado_usuario FROM tbl_ms_usuario WHERE Id_Usuario='$filas'");
    while ($otra__=mysqli_fetch_array( $consultar__ )) {
        # code...
        $estado=$otra__['Estado_usuario'];
    }


    //consultar valor parametro de preguntas contestadas
    $consultar_parametro_contestadas = mysqli_query( $conexion , "SELECT VALOR FROM tbl_ms_parametros WHERE ID_PARAMETRO='2'");
    while ($otra_parametro_pre=mysqli_fetch_array( $consultar_parametro_contestadas )) {
        # code...
        $valor_p_p=$otra_parametro_pre['VALOR'];
    }

    $fechaC=date('Y-m-d');


    $insertar_="INSERT INTO tbl_ms_preguntas_usuario VALUES('$id','$filas','$respuesta','$nombre','$fechaC','$nombre','$fechaC')";
    mysqli_query( $conexion , $insertar_ );

    $consultar_ = "SELECT * FROM tbl_ms_preguntas_usuario WHERE Creado_Por='$nombre'";
    $resultado_= mysqli_query( $conexion , $consultar_ );
    $filas_ = mysqli_num_rows( $resultado_ );
    $valor_p_p_ = $valor_p_p -1;

    
    if($filas_ < $valor_p_p){
         #Trae preguntas contestadas tabla ms_usuarios
         $preguntascontestadas="SELECT Preguntas_Contestadas FROM tbl_ms_usuario where Usuario = '$nombre'";
         $resultado_pregu=mysqli_query( $conexion , $preguntascontestadas );
         
         while ($preguntasco=mysqli_fetch_array( $resultado_pregu )) {
             # code...
             $contestadas=intval($preguntasco['Preguntas_Contestadas']);
             
         }
         $contestadas++;
         #Cambio valor de preguntas contestadas
         $actualizarPre = "UPDATE tbl_ms_usuario SET Preguntas_Contestadas = '$contestadas' WHERE Usuario = '$nombre'";
         mysqli_query( $conexion , $actualizarPre);
 
        
        echo '<script>alert("Respuesta Guardada");</script>';
        include ("../Login/preguntasPrimeraVez.php");
    }elseif($filas_  == $valor_p_p){
        #Trae preguntas contestadas tabla ms_usuarios
        $preguntascontestadas="SELECT Preguntas_Contestadas FROM tbl_ms_usuario where Usuario = '$nombre'";
        $resultado_pregu=mysqli_query( $conexion , $preguntascontestadas );
        
        while ($preguntasco=mysqli_fetch_array( $resultado_pregu )) {
            # code...
            $contestadas=intval($preguntasco['Preguntas_Contestadas']);
            
        }
        $contestadas++;
        #Cambio valor de preguntas contestadas
        $actualizarPre = "UPDATE tbl_ms_usuario SET Preguntas_Contestadas = '$contestadas' WHERE Usuario = '$nombre'";
        mysqli_query( $conexion , $actualizarPre);

        if($estado == "NUEVO"){
            $ALTER = "UPDATE tbl_ms_usuario SET Estado_Usuario='ACTIVO' WHERE  Usuario = '$nombre'";  //obeservar
            mysqli_query($conexion, $ALTER);
            mysqli_close($conexion);
        }else{
            $ALTER = "UPDATE tbl_ms_usuario SET Estado_Usuario='INACTIVO' WHERE  Usuario = '$nombre'";  //obeservar
            mysqli_query($conexion, $ALTER);
            mysqli_close($conexion);
        }
        
        ?>
        <script> 
           alert("Pregunta Contestadas Correctamente");
           location.href= "../Login/index.php";
        </SCRipt><?php
    }elseif($estado = 'RESETEO' and $filas_>1){
        include('../Login/cambiar_contrasena.php'); 
    }
    

/*

    if($estado = 'NUEVO' and $filas_<=$valor_p_p_){
        
        #Trae preguntas contestadas tabla ms_usuarios
        $preguntascontestadas="SELECT Preguntas_Contestadas FROM tbl_ms_usuario where Usuario = '$nombre'";
        $resultado_pregu=mysqli_query( $conexion , $preguntascontestadas );
        
        while ($preguntasco=mysqli_fetch_array( $resultado_pregu )) {
            # code...
            $contestadas=intval($preguntasco['Preguntas_Contestadas']);
            
        }
        $contestadas++;
        $actualizarPre = "UPDATE tbl_ms_usuario SET Preguntas_Contestadas = '$contestadas' WHERE Usuario = '$nombre'";
        mysqli_query( $conexion , $actualizarPre);

        if($filas_ < $valor_p_p){
            echo '<script>alert("Respuesta Guardada");</script>';
            include ("../Login/preguntasPrimeraVez.php");
        }elseif($estado = 'NUEVO' and $filas_ >=$valor_p_p){
            $ALTER = "UPDATE tbl_ms_usuario SET Estado_Usuario='ACTIVO'";  //obeservar
            mysqli_query($conexion, $ALTER);
            mysqli_close($conexion);?>
            <script> 
               alert("Pregunta Contestadas Correctamente");
               location.href= "../Login/index.php";
            </SCRipt>
            <?php
    }elseif($estado = 'RESETEO' and $filas_>1){
        include('../Login/cambiar_contrasena.php'); 
    }

    }*/

/*    echo ($estado);    
    if ($estado = 'RESETEO' and $filas_>1){
        include('../Login/cambiar_contrasena.php');        
    }elseif($estado = 'NUEVO'){
        $ALTER = "UPDATE tbl_ms_usuario SET Estado_Usuario='ACTIVO'";
        mysqli_query($conexion, $ALTER);
        mysqli_close($conexion);
        include('../Login/index.php');
    }else{
        include ("../Login/preguntasPrimeraVez.php");
    }*/
    
?>