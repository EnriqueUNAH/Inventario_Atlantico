<?php include("../cabecera.php") ?>
<?php include("../sidebar.php")?>
<?php
session_start();
$_SESSION['nombre'];
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Clientes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Ventas</li>
          <li class="breadcrumb-item active">Ventas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="consulta mt-4">
          <div class="row">
              <div class="col-6">
                  <h3>lista de pedidos</h3>
              </div>                
          </div>
          <div class="box-body">
              <div class="table table-responsive">
                  <table class="table table-hover">
                      <head>
                          <tr>
                          <th>Cod Cliente</th>
                            <th>Número DNI</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Télefono</th>
                            <th>Correo Electrónico</th>
                            <th>Dirección</th>
                            <th>Fecha Registro</th>
                            <th>Genero</th>
                              
                          </tr>
                      </head>
                      <tbody class="Ventas_clientes">
                         
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      <div class="formulario">
          <div class="row">
              <div class="col-12">
                  <h3>Agregar Proveerdores</h3>
              </div>
              <div class="col-12">
                  <label for="">ID SOCIO</label>
                  <input type="text" id="ID_socio" class="form-control" placeholder="Ingrese ID Socio">

                  <label for="">Fecha Pedido</label>
                  <input type="text" id="Fecha_pedido" class="form-control" placeholder="Ingrese fecha pedido">

                  <label for="">Detalle</label>
                  <input type="text" id="DETALLE" class="form-control" placeholder="Ingrese Detalle">

                  <label for="">Sub Total</label>
                  <input type="text" id="SubTotal" class="form-control" placeholder="Ingrese Sub Total">

                  <label for="">Total ISV</label>
                  <input type="text" id="TOTAL_ISV" class="form-control" placeholder="Ingrese Total ISV">

                  <label for="">Total</label>
                  <input type="text" id="TOTAL" class="form-control" placeholder="Ingrese Total">

                  <label for="">Fecha Entrega</label>
                  <input type="text" id="FECHA_ENTREGA" class="form-control" placeholder="Ingrese Fecha de entrega">

                  <label for="">Estado</label>
                  <input type="text" id="ESTADO" class="form-control" placeholder="Ingrese Estado de entrega">

                  <hr>
                  <div class="btnagregar">
                      <input type="submit" id="btnagregar" onclick="agregarPedido()" value="Agregar Pedido" class="btn btn-success">
                  </div>
              </div>
          </div>
      </div>
  </div>
  </main><!-- End #main -->
    <?php
      if(isset($_POST['btnagregar'])){
        $cod_cliente = $_POST ["Cod_cliente"];
        $numero_dni = $_POST ["NumeroDNI"];
        $nombres = $_POST ["Nombres"];
        $apellidos = $_POST ["Apellidos"];
        $telefono = $_POST ["Telefono"];
        $correo = $_POST ["Correo"];
        $direccion = $_POST ["Direccion"];
        $fecha = $_POST ["FechaRegistro"];
        $genero = $_POST ["Genero"];

        $insertarDatos = "INSERT INTO tbl_clientes VALUES('$numero_dni','$Nombres','$apellidos','$telefono','$correo','$direccion','$fecha','$genero')";

        $ejecutarInsert = mysqli_query($conexion, $insertarDatos);

        if(!$ejecutarInsert){
          echo"Error";
        }

      }
    ?>

<?php include("../footer.php")?>