<?php
session_start();
require_once "../db2.php";
$usuario = $_SESSION['nombre'];
$fechaC = date('Y-m-d');

$consulta="SELECT * FROM tbl_ms_roles";        
$resultado= mysqli_query( $conexion2 , $consulta );
$filas = mysqli_num_rows( $resultado );
$filas=$filas+1;

//Variables ingresadas
$ROL = strtoupper($_POST[ 'rol' ]);
$DESCRIPCION = strtoupper($_POST[ 'descripcion' ]);

//consulta si el usuario ya existe
$consulta_="SELECT ROL FROM tbl_ms_roles WHERE ROL='$ROL'";
$resultado_= mysqli_query( $conexion2 , $consulta_ );
$ROL_CONSULTA = mysqli_num_rows( $resultado_ );


//Decisiones de validaciones
if($ROL_CONSULTA ){?>
<script> 
   alert("Rol ya existente");
   location.href= "Roles_CrearRol.php";
</SCRipt>
<?php
}else{
    //inserto datos en tabla roles
    $sql="INSERT INTO tbl_ms_roles VALUES('$filas','$ROL','$DESCRIPCION','$usuario','$fechaC','$usuario','$fechaC')";
    mysqli_query( $conexion2 , $sql);

    include("CrudRoles.php");

}

?>