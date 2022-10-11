<?php
include( 'db.php' );
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Recuperación de contraseña</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <script src="/Js/clientes.js"></script>


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">INVENTARIOS DEL ATLANTICO</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="BUSCAR" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Mi Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Ajustes de la cuenta</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Necesito ayuda</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>CERRAR SESION</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar inicio======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>INICIO</span>
        </a>
      </li><!-- End Dashboard Nav -->

  <!-- ======= Sidebar Ventas======= -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>VENTAS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Ventas clientes.html">
              <i class="bi bi-circle"></i><span>VER CLIENTES</span>
            </a>
          </li>
          <li>
            <a href="Ventas ventas.html">
              <i class="bi bi-circle"></i><span>VER VENTAS</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

  <!-- ======= Sidebar Inventarios======= -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>INVENTARIOS</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="Inventarios-compras.html">
          <i class="bi bi-circle"></i><span>VER COMPRAS</span>
        </a>
      </li>
      <li>
        <a href="Inventario-inventario.html">
          <i class="bi bi-circle"></i><span>VER INVENTARIO</span>
        </a>
      </li>
      <li>
        <a href="Inventario-productos.html">
          <i class="bi bi-circle"></i><span>VER PRODUCTOS</span>
        </a>
      </li>
      <li>
        <a href="Inventario-proveedores.html">
          <i class="bi bi-circle"></i><span>VER PROVEEDORES</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

      <!-- Dashboard Matenimiento -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>MANTENIMIENTO</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Mantinimiento-tipo-persona.html">
              <i class="bi bi-circle"></i><span>TIPO PERSONA</span>
            </a>
          </li>
          <li>
            <a href="Mantenimiento-tipo-mov.html">
              <i class="bi bi-circle"></i><span>TIPO MOVIMIENTO</span>
            </a>
          </li>
          <li>
            <a href="Mantenimiento-tipo-producto.html">
              <i class="bi bi-circle"></i><span>TIPO PRODUCTO</span>
            </a>
          </li>
          <li>
            <a href="Mantenimiento-estante.html">
              <i class="bi bi-circle"></i><span>ESTANTE</span>
            </a>
          </li>
          <li>
            <a href="Mantenimiento-Promocion.html">
              <i class="bi bi-circle"></i><span>PROMOCION</span>
            </a>
          </li>
          <li>
            <a href="Mantenimiento descuento.html">
              <i class="bi bi-circle"></i><span>DESCUENTO</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
  <!-- ======= Sidebar Seguridad======= -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>SEGURIDAD</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Seguirdad-seguridad.html">
              <i class="bi bi-circle"></i><span>GESTION DE USUARIOS</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      
    </ul>

  </aside><!-- End Sidebar-->

    </ul>

  </aside><!-- End Sidebar-->

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
                  <h3>lista de Clientes</h3>
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
                          
                          <?php
                            $consulta = "SELECT * FROM tbl_clientes";
                            $ejecutarCONSULTA = mysqli_query($conexion, $consulta);
                            $verFilas = mysqli_num_rows($ejecutarCONSULTA);
                            $fila = mysqli_fetch_array($ejecutarCONSULTA);

                            if(!$ejecutarCONSULTA){
                              echo  "error en la consulta";
                            }else{
                              if($verFilas<1){
                                echo"<tr><td>Sin registros</td></tr>";
                              }else{
                                for($i=0; $i<=$fila; $i++){
                                  echo'
                                    <tr>
                                      <td>'.$cod_cliente[0].'</td>
                                      <td>'.$numero_dni[1].'</td>
                                      <td>'.$nombres.[2]'</td>
                                      <td>'.$apellidos[3].'</td>
                                      <td>'.$telefono[4].'</td>
                                      <td>'.$correo[5].'</td>
                                      <td>'.$direccion[6].'</td>
                                      <td>'.$fecha[7].'</td>
                                      <td>'.$genero[8].'</td>
                                    </tr>
                                    ';
                            $fila = mysqli_fetch_array($ejecutarCONSULTA);
                                }
                              }
                            }

                          ?>
                      </head>
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

                <label for="">Número DNI</label>
                <input type="text" id="NumeroDNI" class="form-control" placeholder="Ingrese número identidad">

                <label for="">Nombres</label>
                <input type="text" id="Nombres" class="form-control" placeholder="Ingrese Nombres">

                <label for="">Apellidos</label>
                <input type="text" id="Apellidos" class="form-control" placeholder="Ingrese Apellidos">

                <label for="">Télefono</label>
                <input type="text" id="Telefono" class="form-control" placeholder="Ingrese número de telefono">

                <label for="">Correo Electrónico</label>
                <input type="text" id="Correo" class="form-control" placeholder="Ingrese correo electrónico">

                <label for="">Dirección</label>
                <input type="text" id="Direccion" class="form-control" placeholder="Ingrese Dirección">

                <label for="">Fecha Registro</label>
                <input type="text" id="FechaRegistro" class="form-control" placeholder="Ingrese Fecha Registro">
                
                <label for="">Genero</label>
                <input type="text" id="Genero" class="form-control" placeholder="Ingrese Genero">

                <hr>
                <div class="btnagregar">
                    <input type="submit" id="btnagregar" onclick="" value="Agregar Pedido" class="btn btn-success">
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

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span></span></strong>. Todos los derechos resevados (Diseños Alpha)
    </div>
    
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>